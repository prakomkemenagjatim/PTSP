<?php

function getCI(){
	$CI =& get_instance();
	return $CI; 
}

function appname(){
	return 'Sistem Laporan Munakahat';
}

function appname_alias(){
	return 'TEMANMU';
}

function appkantor(){
	return 'Kantor Kementerian Agama Kota Malang';
}

function appkantor_alias(){
	return 'Kemenag Kota Malang';
}

function appprov(){
	return 'Provinsi Jawa Timur';
}

function appprov_alias(){
	return 'Jawa Timur';
}

function appwil(){
	return 'Kota Malang';
}

function seripor(){
	return "JT";
}
function appalamat(){
	return 'Jl. Raden Panji Suroso No. 2, Kota Malang';
}

function apptelp(){
	return 'Telp. +62 341 491605';
}

function appweb(){
	return 'Website: malangkota.kemenag.go.id';
}

function kodeprov(){
	return '16';
}
function kodekab(){
	return '1632';
}
function suffix(){
	return '_k0taNgalam';
}
function _encrypt($key=""){
	$CI =getCI();
	$CI->load->library('encrypt');
	$nid = "sandster#".$key."#".date("Ymd");
	return urlencode($CI->encrypt->encode($nid));
}

function _decrypt($key=""){
	$CI =getCI();
	$CI->load->library('encrypt');
	$nid = urldecode($CI->encrypt->decode($key));
	$nid_arr = explode("#",$nid);
	if(isset($nid_arr[1])){
		return $nid_arr[1];
	}
}

function option_prov($prov=""){
	$CI  = getCI();
	
	$CI->db->order_by('KDPROP','ASC');
	
/*	if( trim($CI->jCfg['user']['prov'])!=0 && trim($CI->jCfg['user']['prov'])!=""){
		$CI->db->where("province_id",$CI->jCfg['user']['prov']);
		if ($prov == ""){
			$prov = trim($CI->jCfg['user']['prov']);
		}
	}*/

	$q = $CI->db->get("propinsi")->result();
    $callback ='';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$selected = $value->KDPROP==$prov?"selected='selected'":"";
			$callback .= "<option value='".$value->KDPROP."' $selected >".$value->NMPROPINSI."</option>".PHP_EOL;
		}
	}
	echo $callback;		
}

function option_kabko($kabko=""){
	$CI  = getCI();
	
	$CI->db->order_by('kodeidx','ASC');
	$CI->db->where("kodeidx",kodekab());
	$q = $CI->db->get("tbkab")->result();
	if( count($q) > 0 ){
		$callback='';
		foreach ($q as $key => $value)
		{			
			//$selected = $vkab==$value->KDINDX?"selected='selected'":"";
			$callback .= "<option data-val='".$value->kabnama."' value='".$value->kodeIdx."' selected>".$value->kabnama."</option>".PHP_EOL;
		}
	}
	return $callback;		
}

function option__kabko($kabko=""){
	$CI  = getCI();
	
	$CI->db->order_by('KDINDX','ASC');
	$callback ='';
    if ($CI->session->userdata('user_kabko') != 0 && $CI->session->userdata('user_kabko') != ""){
		$vkab = $CI->session->userdata('user_kabko');
		$where = " where KDINDX = '".$CI->session->userdata('user_kabko')."'";
	} else {
		$vkab = $kabko;
		$callback = '<option value="">- Pilih Kabupaten/Kota-</option>'; 
		$where = '';
	}
	$q = $CI->db->query("select * from kabupaten ".$where)->result();
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{			
			$selected = $vkab==$value->KDINDX?"selected='selected'":"";
			$callback .= "<option data-val='".$value->KABUPATEN."' value='".$value->KDINDX."' $selected >".$value->KABUPATEN."</option>".PHP_EOL;
		}
	}
	echo $callback;		
}

function option_kabkoex($prov="",$kabko=""){
	$CI  = getCI();
	
	$CI->db->order_by('KDINDX','ASC');

	$q = $CI->db->get("kabupaten")->result();
	if ($CI->session->userdata('user_kabko') != 0 && $CI->session->userdata('user_kabko') != ""){
		$vkab = $CI->session->userdata('user_kabko');
	} else {
		$vkab = $kabko; 
	}
	if( count($q) > 0 ){
		$callback ='<option value="">- Pilih Kabupaten/Kota -</option>'.PHP_EOL;
		foreach ($q as $key => $value)
		{
			$selected = $vkab==$value->KDINDX?"selected='selected'":"";
			$callback .= "<option data-val='".$value->KABUPATEN."' value='".$value->KDINDX."' $selected >".$value->KABUPATEN."</option>".PHP_EOL;
		}
	}
	echo $callback;		
}


function option_kec($kabko="",$kec=""){
	$CI  = getCI();
	
	$CI->db->order_by('kodeIdx','ASC');
	$CI->db->where('kodeKab',kodekab());
	$q = $CI->db->get("tbkua")->result();
	$callback ='<option value="">- Pilih KUA Kecamatan -</option>'.PHP_EOL;
	if ($CI->session->userdata('user_kec') != 0 && $CI->session->userdata('user_kec') != ""){
		$vkec = $CI->session->userdata('user_kec');
	} else {
		$vkec = $kec; 
	}
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$selected = $value->kodeIdx==$vkec?"selected='selected'":"";
			$callback .= "<option data-val='".$value->namakua."' value='".$value->kodeIdx."' $selected >".$value->namakua."</option>".PHP_EOL;
		}
	}
	return $callback;		
}

function option_kel($kec="",$kel=""){
	$CI  = getCI();
	
	$CI->db->order_by('KELIDX','ASC');
	$CI->db->where('KDKEC',$kec);
	$q = $CI->db->get("kelurahan")->result();
	$callback ='<option value="">- Pilih Kelurahan/Desa -</option>'.PHP_EOL;
/*	if ($CI->session->userdata('user_kec') != 0 && $CI->session->userdata('user_kec') != ""){
		$vkec = $CI->session->userdata('user_kec');
	} else {
		$vkec = $kec; 
	}*/
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			//$selected = $value->KELIDX==$vkec?"selected='selected'":"";
			$callback .= "<option data-val='".$value->KELNM."' value='".$value->KELIDX."' >".$value->KELNM."</option>".PHP_EOL;
		}
	}
	echo $callback;		
}

function option__kec($kabko=""){
	$CI  = getCI();
	
	$CI->db->order_by('kodeIdx','ASC');
	$vkec = '';
	if ($CI->session->userdata('user_kec') != 0 && $CI->session->userdata('user_kec') != ""){
		$vkabko = $CI->session->userdata('user_kabko');
		$vkec = $CI->session->userdata('user_kec');
		$where = " where kodeKab = '".$vkabko."' and kodeIdx = '".$vkec."'";
	} else
	if ($CI->session->userdata('user_kabko') != 0 && $CI->session->userdata('user_kabko') != ""){
		$vkabko = $CI->session->userdata('user_kabko');
		$callback ='<option value="">- Pilih KUA Kecamatan -</option>'.PHP_EOL;
		$where = " where kodeKab = '".$vkabko."'";
	} else 
	 {
		$vkabko = $kabko; 
		$where = " where kodeKab = '".$vkabko."'";
		$callback ='<option value="">- Pilih KUA Kecamatan -</option>'.PHP_EOL;
	}
	$q = $CI->db->query("select * from tbkua ".$where)->result();
   // die("select * from kecamatan ".$where);
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$selected = $value->kodeIdx==$vkec?"selected='selected'":"";
			$callback .= "<option data-val='".$value->namakua."' value='".$value->kodeIdx."' $selected >".$value->namakua."</option>".PHP_EOL;
		}
	}
	return $callback;		
}

function option_penghulu(){
	$CI  = getCI();
	$callback ='<option value="">- Pilih Penghulu -</option>'.PHP_EOL;
	$where = '';
	if (user_group() == 3 ){
		$where = " where kodekua = '".user_kec()."'";
	}
	$q = $CI->db->query("select * from tbpenghulu $where order by nip")->result();
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= "<option  value='".$value->nip."'>".$value->nama."</option>".PHP_EOL;
		}
	}
	return $callback;		
}
/*function option__kec($kabko=""){
	$CI  = getCI();
	
	$CI->db->order_by('KODEINDX','ASC');
	$CI->db->where('KODEKAB',$kabko);
	$q = $CI->db->get("kecamatan")->result();
	
	if ($CI->session->userdata('user_kec') != 0 && $CI->session->userdata('user_kec') != ""){
		$vkabko = $CI->session->userdata('user_kabko');
		$where = " where KODEKAB = '".$vkabko."'";
	} else {
		$vkec = $vkabko; 
		$where = '';
		$callback ='<option value="">- Pilih KUA Kecamatan -</option>'.PHP_EOL;
	}
	
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$selected = $value->KODEINDX==$vkec?"selected='selected'":"";
			$callback .= "<option data-val='".$value->WILAYAH_KECAMATAN."' value='".$value->KODEINDX."' $selected >".$value->WILAYAH_KECAMATAN."</option>".PHP_EOL;
		}
	}
	echo $callback;		
}*/

function option_kecuser($kabko="",$kec=""){
	$CI  = getCI();
	$kabko = user_kabko();
	$CI->db->order_by('KODEINDX','ASC');
	$CI->db->where('KODEKAB',$kabko);
	$q = $CI->db->get("kecamatan")->result();
	$callback ='';
	if ($CI->session->userdata('user_kec') != 0 && $CI->session->userdata('user_kec') != ""){
		$vkec = $CI->session->userdata('user_kec');
	} else {
		$vkec = $kec; 
	}
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$selected = $value->KODEINDX==$vkec?"selected='selected'":"";
			$callback .= "<option data-val='".$value->WILAYAH_KECAMATAN."' value='".$value->KODEINDX."' $selected >".$value->WILAYAH_KECAMATAN."</option>".PHP_EOL;
		}
	}
	echo $callback;		
}

	function option_user($groupuser){
		$selected0 = $groupuser==0?"selected='selected'":"";
		$selected1 = $groupuser==1?"selected='selected'":"";
		$selected2 = $groupuser==2?"selected='selected'":"";
		$selected3 = $groupuser==3?"selected='selected'":"";
		$callback ='<option value="">- Pilih KUA Kecamatan -</option>'.PHP_EOL;
	    $callback .= "<option value='0' $selected0 >Administator</option>".PHP_EOL;
	    $callback .= "<option value='1' $selected1 >User Provinsi</option>".PHP_EOL;
	    $callback .= "<option value='2' $selected2 >User Kabupaten/Kota</option>".PHP_EOL;
	    $callback .= "<option value='3' $selected3 >User KUA Kecamatan</option>".PHP_EOL;
		echo $callback;		
	}

	function loadstok($nprov ='',$nkabko ='',$nkec ='',$tgl ='', $tgl1=''){

		$CI  = getCI();
        $wheretgl = '';
        if ($tgl != '' && $tgl1 !=''){
			$wheretgl = " and tgl between '$tgl' and '$tgl1' ";
		}
		$stokmasuk = 0;
		$stokkeluar = 0;
		$stokterpakai = 0;
		$sisastok = 0;
		if (($nkabko != '' && $nkec == '') || (user_group() == 2 && $nkec == '')){
			$kabko = user_kabko();
			if ($nkabko != ''){
				$kabko = $nkabko;
			}
			$qry = "select sum(jml_kabko) as jml from stock_bukunikah_master where stok = 2 and kabko = '$kabko'".$wheretgl;
			$result= $CI->db->query($qry)->row_array();
			$stokmasuk = (int)$result['jml'];
			$qry = "select sum(jml_kec) as jml from stock_bukunikah_master  where stok = 3 and kabko = '$kabko'".$wheretgl;
			$result= $CI->db->query($qry)->row_array();
			$stokkeluar = $result['jml'];
			
			$qry = "select * from stock_bukunikah_master where stok = 2 and kabko = '$kabko'".$wheretgl;
			$stokterpakai = 0;
			$q = $CI->db->query($qry)->result();
			if( count($q) > 0 ){
				foreach ($q as $key => $value)
				{
					$huruf = $value->seri_porporasi;
					$nomor = $value->nomor_porporasi;
					$nomor1 = $value->nomor_porporasi1;
					$nomor = " where kode_kabko = '$kabko' and seri_porporasi  = '$huruf' and nomor_porporasi  between '$nomor' and '$nomor1'";
					$qry = "select count(kddata) as jml from statistik_nikah ".$nomor;
					$result= $CI->db->query($qry)->row_array();
					$stokterpakai = $stokterpakai+(int)$result['jml'];
				}
			}
			$qry = "select sum(jml_status) as jml from stock_bukunikah_master where stok = 4 and kabko = '$kabko'".$wheretgl;
			$result= $CI->db->query($qry)->row_array();
			$stokstatus = (int)$result['jml'];
			$stokterpakai = $stokterpakai+$stokstatus;			
			$sisastok = $stokmasuk - $stokkeluar;
		} else
		if (user_group() == 3 || $nkec != ''){
			$kec = user_kec();
			if ($nkec != ''){
				$kec = $nkec;
			}
			$qry = "select sum(jml_kec) as jml from stock_bukunikah_master where stok = 3 and kec = '$kec'".$wheretgl;
			$result= $CI->db->query($qry)->row_array();
			$stokmasuk = (int)$result['jml'];			
			$qry = "select * from stock_bukunikah_master  where stok = 3 and kec = '$kec'".$wheretgl;
			$stokterpakai = 0;
			$q = $CI->db->query($qry)->result();
			if( count($q) > 0 ){
				foreach ($q as $key => $value)
				{
					$huruf = $value->seri_porporasi;
					$nomor = $value->nomor_porporasi;
					$nomor1 = $value->nomor_porporasi1;
					$nomor = " where kodewilayah = '$kec' and seri_porporasi  = '$huruf' and nomor_porporasi  between '$nomor' and '$nomor1'";
					$qry = "select count(kddata) as jml from statistik_nikah ".$nomor;
					$result= $CI->db->query($qry)->row_array();
					$stokterpakai = $stokterpakai+(int)$result['jml'];
				}
			}
			$qry = "select sum(jml_status) as jml from stock_bukunikah_master where stok = 4 and kec = '$kec'".$wheretgl;
			$result= $CI->db->query($qry)->row_array();
			$stokstatus = (int)$result['jml'];
			$stokterpakai = $stokterpakai;
			$stokkeluar = $stokterpakai+$stokstatus;
			
			$sisastok = $stokmasuk - $stokkeluar;
		} else 
		if ($nkabko == '' && $nkec == '' ){
			$qry = "select sum(jml_prov) as jml from stock_bukunikah_master where stok = 1".$wheretgl;
			$result= $CI->db->query($qry)->row_array();
			$stokmasuk = (int)$result['jml'];
			$qry = "select sum(jml_kabko) as jml from stock_bukunikah_master where stok = 2".$wheretgl;
			$result= $CI->db->query($qry)->row_array();
			$stokkeluar = $result['jml'];
		
			$qry = "select * from stock_bukunikah_master  where stok = 1";
			$stokterpakai = 0;
			$q = $CI->db->query($qry)->result();
			if( count($q) > 0 ){
				foreach ($q as $key => $value)
				{
					$huruf = $value->seri_porporasi;
					$nomor = $value->nomor_porporasi;
					$nomor1 = $value->nomor_porporasi1;
					$nomor = " where seri_porporasi  = '$huruf' and nomor_porporasi  between '$nomor' and '$nomor1'";
					$qry = "select count(kddata) as jml from statistik_nikah ".$nomor;
					$result= $CI->db->query($qry)->row_array();
					$stokterpakai = $stokterpakai+(int)$result['jml'];
					//echo $qry;
				}
			}
			$qry = "select sum(jml_status) as jml from stock_bukunikah_master where stok = 4".$wheretgl;
			$result= $CI->db->query($qry)->row_array();
			$stokstatus = (int)$result['jml'];
			$stokterpakai = $stokterpakai+$stokstatus;
			
			$sisastok = $stokmasuk - $stokterpakai;
			
			
		}
		$json['stokmasuk'] = number_format((int)$stokmasuk,0,",",".");
		$json['stokmasukint'] = (int)$stokmasuk;
		$json['stokkeluar']= number_format((int)$stokkeluar,0,",",".");
		$json['stokkeluarint'] = (int)$stokkeluar;
		$json['stokterpakai']= number_format((int)$stokterpakai,0,",",".");
		$json['stokterpakaiint'] = (int)$stokterpakai;
		$json['sisastok']= number_format((int)$sisastok,0,",",".");
		$json['sisastokint'] = (int)$sisastok;
		return $json;
}

function arraybln(){
	return array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
}

function bln_array($bln){
	$bln_array = arraybln();
	
	return $bln_array[$bln-1];
}

function hari_array($tgl){
	$tgl_array = array('MINGGU','SENIN','SELASA','RABU','KAMIS','JUMAT','SABTU');
	
	return $tgl_array[$tgl];
}

function groupuser_array($group){
	$groupuser_array = array('Administator','User Provinsi','User Kabupaten/Kota','User KUA Kecamatan');
	$group = is_null($group)?'2':$group;
	return $groupuser_array[$group];
}

function user_group(){
	$CI  = getCI();
	return $CI->session->userdata('user_group');
}

function user_nama(){
	$CI  = getCI();
	return $CI->session->userdata('user_name');
}

function user_kabko(){
	$CI  = getCI();
	return $CI->session->userdata('user_kabko');
}

function user_kec(){
	$CI  = getCI();
	return $CI->session->userdata('user_kec');
}

function user_kecnm(){
	$CI  = getCI();
	return $CI->session->userdata('namakua');
}

function user_kabnm(){
	$CI  = getCI();
	return $CI->session->userdata('kabnama');
}

function user_(){
	$CI  = getCI();
	return $CI->session->userdata();
}

function loguser($aksi = ''){
	$CI  = getCI();
	$username = $CI->session->userdata('user_name');
	$CI->db->query("insert ignore into __loguser (username,aksi) values ('$username','$aksi')");
	return $username;
}

function url_simkah(){
	return 'http://simkah.kemenag.go.id';
}

function exhij($hij){
	$ehij = explode(' ',trim($hij));
	$hijtgl='';
	$hijbln ='';
	$hijthn='';
	for($i = 0; $i < count($ehij); $i++){
		if ($i == 0){
		   $hijtgl = $ehij[$i];
		} else 
		if ($i == count($ehij)-1){
			$hijthn = $ehij[$i];
		} else {
			$hijbln .= ' '.$ehij[$i];
		}
	}
	return array($hijtgl,trim($hijbln),$hijthn) ;
}

function slshadd($str){
	
	$str = str_replace('\\', '', $str);
	return addslashes($str);
}


function formattglmmddyyyy($tglawal){
	$tgl = explode('/',$tglawal);

	if (count($tgl) == 3){
		$tglstr = $tgl[2].'-'.$tgl[0].'-'.$tgl[1];
	} else {
		$tglstr = '0000-00-00';
	}
	return $tglstr;
}

function formattglexcel($tglawal){
	if (is_numeric($tglawal)){
		$tglstr = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($tglawal)); 
	} else {
		if ($tglawal == ''){
			$tglstr ='0000-00-00';
		} else {
			$tglstr = implode("-",array_reverse(explode("/",$tglawal)));
		}
		
	}
	return $tglstr;
}

function formattglmin($tgl){
	if (is_numeric($tgl)){
		$tglstr = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($tgl)); 
	} else {
		if ($tgl == ''){
			$tglstr ='0000-00-00';
		} else {
			$tgle = explode('-',$tgl);
			if (strlen($tgle[0]) == 4){
				$tglstr = $tgl;
			} else {
				$tglstr = implode("-",array_reverse(explode("-",$tgl)));
			}
			
		}
		
	}
	return $tglstr;
}

function optionTahun(){
	$thnnow = (int) date('Y');
	$thnawal = 2019;
	$callback = '';
	for ($i=$thnawal; $i <= $thnnow; $i++) { 
	  $selected = $i==$thnnow?"selected='selected'":"";
	  $callback .= '<option value="'.$i.'"  '.$selected.'>'.$i.'</option>'.PHP_EOL;
	}
	return $callback;	
}

function optionBulan($all=1){
  if ($all == '1'){
	$callback = '<option value="">-Semua Bulan-</option>'.PHP_EOL;
  } else {
	$callback = '';
  }
  
  $blnnow = (int) date('m');
  $i = 1;
  foreach(arraybln() as $x => $val) {
	  $no = $x+1; 
	  $selected = $i==$blnnow?"selected='selected'":"";
	  $callback .= '<option value="'.$no.'" '.$selected.'>'. $val.'</option>'.PHP_EOL;
	  $i++;
	}
  return $callback;	
}


function optionPangkatgol($all=1){
	// $callback = '<option value="" data-pajak="0">-Pilih Pangkat / Gol-</option>'.PHP_EOL;
	// $callback .= '<option value="Penata Muda / III.a" data-pajak="5">Penata Muda / III.a</option>'.PHP_EOL;
	// $callback .= '<option value="Penata Muda Tk. I / III.b" data-pajak="5">Penata Muda Tk. I / III.b</option>'.PHP_EOL;
	// $callback .= '<option value="Penata / III.c" data-pajak="5">Penata / III.c</option>'.PHP_EOL;
	// $callback .= '<option value="Penata Tk. I / III.d" data-pajak="5">Penata Tk. I / III.d</option>'.PHP_EOL;
	// $callback .= '<option value="Pembina / IV.a" data-pajak="15">Pembina / IV.a</option>'.PHP_EOL;
	// $callback .= '<option value="Pembina Tk. I / IV.b" data-pajak="15">Pembina Tk. I / IV.b</option>'.PHP_EOL;
	// $callback .= '<option value="Pembina Utama Muda / IV.c" data-pajak="15">Pembina Utama Muda / IV.c</option>'.PHP_EOL;
	// $callback .= '<option value="Pembina Utama Madya / IV.d" data-pajak="15">Pembina Utama Madya / IV.d</option>'.PHP_EOL;
	// $callback .= '<option value="Pembina Utama / IV.e" data-pajak="15">Pembina Utama / IV.e</option>'.PHP_EOL;
	$callback = '<option value="" data-pajak="0">-Pilih Pangkat / Gol-</option>'.PHP_EOL;
	$arraygol = arraygol();
	foreach ($arraygol as $k => $v) {
		$pajak = $arraygol[$k]['pajak'];
		$callback .= '<option value="'.$k.'" data-pajak="'.$pajak.'">'.$k.'</option>'.PHP_EOL;
	}
	return $callback;	
  }

  function arraygol(){
		return array('Penata Muda / III.a'=>array("gol"=>'III',"pajak"=>'5'),
					 'Penata Muda Tk. I / III.b'=>array("gol"=>'III',"pajak"=>'5'),
					 'Penata / III.c'=>array("gol"=>'III',"pajak"=>'5'),
					 'Penata Tk. I / III.d'=>array("gol"=>'III',"pajak"=>'5'),
					 'Pembina / IV.a'=>array("gol"=>'IV',"pajak"=>'15'),
					 'Pembina Tk. I / IV.b'=>array("gol"=>'IV',"pajak"=>'15'),
					 'Pembina Utama Muda / IV.c'=>array("gol"=>'IV',"pajak"=>'15'),
					 'Pembina Utama Madya / IV.d'=>array("gol"=>'IV',"pajak"=>'15'),
					 'Pembina Utama / IV.e'=>array("gol"=>'IV',"pajak"=>'15'),
					);
	}

	function gol_array($gol){
		$arraygol = arraygol();
		return $arraygol[$gol];
	}

  function kepalakantor(){
		$CI  = getCI();
		$qry = $CI->db->query("select * from tbpejabat where jabatan = 'Kepala Kantor'");
		return $qry->row_array();
  }

  function ppk(){
	$CI  = getCI();
	$qry = $CI->db->query("select * from tbpejabat where jabatan = 'PPK'");
	return $qry->row_array();
  }

  function bendahara(){
	$CI  = getCI();
	$qry = $CI->db->query("select * from tbpejabat where jabatan = 'Bendahara'");
	return $qry->row_array();
  }

  function kasibimas(){
	$CI  = getCI();
	$qry = $CI->db->query("select * from tbpejabat where jabatan = 'Kasi Bimas Islam'");
	return $qry->row_array();
  }


  function getsizeDB(){
		$CI  = getCI();
		$qry = $CI->db->query("SELECT table_schema 'db_name', SUM( data_length + index_length) / 1024 / 1024 'db_size_in_mb' FROM information_schema.TABLES WHERE table_schema='db_kuasemarangkota' GROUP BY table_schema");
		return $qry->row_array();
  }


  function isgenap($bil){
	if ($bil % 2 == 0){
		return true;
	}else {
		return false;
	}
  }

  function preg_trim($subject) {
		$regex = "/((?=^)(\s*))|((\s*)(?>$))/mg";
		if (preg_match ($regex, $subject, $matches)) {
			$subject = $matches[1];
		}
		return $subject;
  }

  function aliaspendd($pendd){
		$vpend = strtoupper($pendd);
	   if ($pendd ==  'TIDAK/BELUM SEKOLAH' ||$pendd ==  'TIDAK TAMAT SD/SEDERAJATNYA' ||$pendd ==  'TAMAT SD/SEDERAJAT'){
		   $vpend = 'SD';
	   } else if ($pendd ==  'SLTP/SEDERAJAT'){
		   $vpend = 'SLTP';
	   } else if ($pendd ==  'SLTA/SEDERAJAT'){
		  $vpend = 'SLTA';
	   } else if ($pendd ==  'DIPLOMA I/II'){
		 $vpend = 'D1/D2';
	   } else if ($pendd ==  'AKADEMI/DIPLOMA III/S. MUDA'){
		$vpend = 'D3';
	   }  else if ($pendd ==  'DIPLOMA IV/STRATA I'){
		$vpend = 'D4/S1';
	   }  else if ($pendd ==  'STRATA I'){
		$vpend = 'S1';
	   }  else if ($pendd ==  'STRATA II'){
		$vpend = 'S2';
	   }  else if ($pendd ==  'STRATA III'){
		$vpend = 'S3';
	   }    

	   return $vpend;
  }

