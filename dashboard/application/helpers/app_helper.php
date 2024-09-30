<?php

function kantorapp(){
	return 'Kantor Kementerian Agama Kabupaten Ngawi';
}

function alamatapp(){
	return 'Jl. Kartini Nomor 15 Ngawi';
}

function footerapp(){
	$currentYear = date("Y");
    return "©$currentYear Santun Kemenag Ngawi";
}

function getCI(){
	$CI =& get_instance();
	return $CI; 
}

function kodeprov(){
	return '35';
}

function kodekota(){
	return '3573';
}

function option_prov($prov=""){
	$CI  = getCI();
	
	$CI->db->order_by('provKode','ASC');
	$CI->db->limit('1');
	$userSess = userSess();
	$userProv = $userSess['userProv'];
	$callback='';
    if ($userProv != 0 && $userProv != ""){
		$vprov = $userProv;
		$CI->db->where('provKode',$vprov);
	} else{
		$vprov = $prov;
	}
	$q = $CI->db->get("tbprov")->result();
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$selected = $value->provKode==$prov?"selected='selected'":"";
			$callback = "<option value='".$value->provKode."' selected='selected' >".$value->provNama."</option>".PHP_EOL;
		}
	} else {
		$callback = '<option value="">- Pilih Prov -</option>';
	}
	echo $callback;		
}

function _option_prov($prov=""){
	$CI  = getCI();
	
	$CI->db->order_by('provKode','ASC');
	$callback='';
	$callback = '<option value="">- Pilih Prov -</option>';
	$q = $CI->db->get("tbprov")->result();
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$selected = $value->provKode==$prov?"selected='selected'":"";
			$callback .= "<option value='".$value->provKode."' $selected >".$value->provNama."</option>".PHP_EOL;
		}
	} else {
		$callback = '<option value="">- Pilih Prov-</option>';
	}
	echo $callback;		
}

function option_kabko($prov="",$kabko=""){
	$CI  = getCI();
	
	$CI->db->order_by('provKode','ASC');
	$CI->db->order_by('kabkoKode','ASC');
	$userSess = userSess();
	$userProv = $userSess['userProv'];
	$userKabko = $userSess['userKabko'];
	$callback = '<option value="">- Pilih Kabupaten/Kota -</option>';
    if ($userKabko != 0 && $userKabko != ""){
		$vkab = $userKabko;
		$CI->db->where('kabkoKode',$vkab);
		$callback ='';
	} else {
		$vkab = $kabko; 
	}
	$q = $CI->db->get("tbkabko")->result();
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{			
			$selected = $kabko==$value->kabkoKode?"selected='selected'":"";
			$callback .= "<option data-val='".$value->kabkoNama."' value='".$value->kabkoKode."' $selected >".$value->kabkoNama."</option>".PHP_EOL;
		}
	} else {
		$callback = '<option value="">- Pilih Kabupaten/Kota -</option>';
	}
	echo $callback;		
}

function option_kec($prov="35",$kabko="3573",$kec=""){
	$CI  = getCI();
	$CI->db->order_by('kecId','ASC');
	$callback = '<option value="">- Pilih Kecamatan -</option>';
	$vprov = $prov;
	$CI->db->where('provKode',$vprov);
	$vkab = $kabko;
	$CI->db->where('kabkoKode',$vkab);
	$q = $CI->db->get("tbkec")->result();
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{			
			$selected = $kec==$value->kecKode?"selected='selected'":"";
			$callback .= "<option value='".$value->kecId."' $selected >".$value->kecNama."</option>".PHP_EOL;
		}
	} else {
		$callback = '<option value="">- Pilih Kecamatan -</option>';
	}
	echo $callback;		
}

function option_kel($prov="35",$kabko="3573",$kec="",$kel=""){
	$CI  = getCI();
	$CI->db->order_by('kelId','ASC');
	$callback = '<option value="">- Pilih Kelurahan -</option>';
	$vprov = $prov;
	$CI->db->where('provKode',$vprov);
	$vkab = $kabko;
	$CI->db->where('kabkoKode',$vkab);
	$vkec = $kec;
	$CI->db->where('kecKode',$vkec);
	$q = $CI->db->get("tbkel")->result();
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{			
			$selected = $kel==$value->kelId?"selected='selected'":"";
			$callback .= "<option value='".$value->kelId."' $selected >".$value->kelNama."</option>".PHP_EOL;
		}
	} else {
		$callback = '<option value="">- Pilih Kelurahan -</option>';
	}
	//echo $CI->db->last_query(); 
	echo $callback;		
}

function optionJenis(){
	$CI  = getCI();
	$CI->db->order_by('jenisId','ASC');
	$q = $CI->db->get("tbjenis")->result();
	$callback ='';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= "<option value='".$value->jenisId."'>".$value->jenisNama."</option>".PHP_EOL;
		}
	}
	echo $callback;			
}

function optionTipeuser(){
	$CI  = getCI();
	$q = $CI->db->get("tbtypeuser")->result();
	$callback ='';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= "<option value='".$value->typeId."'>".$value->typeNama."</option>".PHP_EOL;
		}
	}
	return $callback;			
}


function generateStatusColors() {
	$CI = &get_instance();
	$CI->load->database();

	$query = $CI->db->get("tbstatus")->result();
	$statusColors = [];
	foreach ($query as $row) {
		// Assuming tbstatus has 'statusId', 'statusName', and 'color' columns
		$statusColors[$row->idstatus] = $row->warna;
	}

	// Convert the PHP array to a JSON object
	return json_encode($statusColors);
}

function optionUnitsurat(){
	$CI  = getCI();
	$CI->db->where('typeId > 1 and typeId <> 12 ');
	$q = $CI->db->get("tbtypeuser")->result();
	$callback ='';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= "<option value='".$value->typeId."'>".$value->typeNama."</option>".PHP_EOL;
		}
	}
	return $callback;			
}

function optionUnitkerja(){
	$CI  = getCI();
	$CI->db->where('typeId > 1 and typeId <= 12 ');
	$q = $CI->db->get("tbtypeuser")->result();
	$callback ='';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= "<option value='".$value->typeId."'>".$value->typeNama."</option>".PHP_EOL;
		}
	}
	return $callback;			
}
function optionKodesurat(){
	$CI  = getCI();
	$CI->db->where('status = 1 ');
	$q = $CI->db->get("vwunitkodesurat")->result();
	$callback ='';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= "<option value='".$value->unitsurat."' data-chained='".$value->unitkerja."'>".$value->kdsurat." | ".$value->subnm."</option>".PHP_EOL;
		}
	}
	return $callback;			
}
function optionDispojab(){
	$CI  = getCI();
	$CI->db->where("typeId between 2 and 19");
	$q = $CI->db->get("tbtypeuser")->result();
	$callback ='';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= '
			<div class="form-check">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input" data-jab="'.$value->typeJab.'" value="'.$value->typeId.'" name="disposisi[]" id="disposisi'.$value->typeId.'">'.$value->typeJab.'
				</label>
			</div>'.PHP_EOL;
		}
	}
	return $callback;			
}
function optionDisposisi(){
	$CI  = getCI();
	$CI->db->where('typeId <> 1');
	$q = $CI->db->get("tbtypeuser")->result();
	$callback ="<option value=''>-Disposisi-</option>".PHP_EOL;
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= "<option value='".$value->typeId."'>".$value->typeNama."</option>".PHP_EOL;
		}
	}
	return $callback;			
}

function optionStatus(){
	$userSess = userSess();
	$userType = $userSess['userType'];
	$CI  = getCI();
	if ($userType > 1){
		$CI->db->where('idstatus > 1');
	}
	$q = $CI->db->get("tbstatus")->result();

	$callback ='';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= "<option value='".$value->idstatus."'>".$value->nmstatus."</option>".PHP_EOL;
		}
	}
	return $callback;			
}

function optionTravel(){
	$CI  = getCI();
	$q = $CI->db->query("select *,date_format(traveltgl,'%d-%m-%Y') as tgltravel from tbtravel where travelstatus = 1")->result();
	$callback ='';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= "<option value='".$value->travelid."' data-sk='".$value->travelijin."' data-tglsk='".$value->tgltravel."'>".$value->travelnama."</option>".PHP_EOL;
		}
	}
	return $callback;			
}
function group_array($groupid){
	$group_array = array('Pondok Pesantren','Madrasah Diniyah','TPQ','Majelis Taklim');
	
	return $group_array[$groupid];
}

function tipe_array($tipe){
	$tipe_array = array('Permohonan Baru Ijin Operasional','Permohonan Perpanjangan Ijin Operasional');
	
	return $tipe_array[$tipe];
}

function bln_array($bln){
	$bln_array = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	
	return $bln_array[$bln-1];
}

function userTypearr($group){
	$groupuser_array = array('','Administrator','Verifikator','Pondok Pesantren','Madrasah Diniyah','TPQ','Majelis Taklim');
	$group = is_null($group)?'0':$group;
	return $groupuser_array[$group];
}
function userTingkatarr($group){
	$groupuser_array = array('Administrator','','Provinsi','Kab/Kota');
	$group = is_null($group)?'2':$group;
	return $groupuser_array[$group];
}

function optionJenjangkristen(){
	$callback = "<option value='SD'>SD</option>".PHP_EOL;
	$callback .= "<option value='SMP'>SMP</option>".PHP_EOL;
	$callback .= "<option value='SMA'>SMA</option>".PHP_EOL;
	$callback .= "<option value='SMK'>SMK</option>".PHP_EOL;
	echo $callback;			
}

function optionStatusPNS(){
	$callback = "<option value='PNS'>PNS</option>".PHP_EOL;
	$callback .= "<option value='Non PNS'>Non PNS</option>".PHP_EOL;
	echo $callback;			
}

function optionInpassing(){
	$callback = "<option value='Inpassing'>Inpassing</option>".PHP_EOL;
	$callback .= "<option value='Non Inpassing'>Non Inpassing</option>".PHP_EOL;
	echo $callback;			
}

function optionAkreditasi(){
	$callback = "<option value='A'>A</option>".PHP_EOL;
	$callback .= "<option value='B'>B</option>".PHP_EOL;
	$callback .= "<option value='C'>C</option>".PHP_EOL;
	$callback .= "<option value='BELUM AKREDITASI' selected>BELUM AKREDITASI</option>".PHP_EOL;
	echo $callback;			
}

function optionSertifikasi(){
	$callback = "<option value='SERTIFIKASI'>SERTIFIKASI</option>".PHP_EOL;
	$callback .= "<option value='BELUM SERTIFIKASI' selected>BELUM SERTIFIKASI</option>".PHP_EOL;
	echo $callback;			
}

function optionSekolahkristen($prov,$kabko,$kec,$kel){
	$CI  = getCI();
	$CI->db->where('kecKode',$kec);
	if ($kel != ''){
		$CI->db->where('kelKode',$kel);
	}
	$CI->db->where('sekolah_tipe','1');
	$CI->db->order_by('sekolah_npsn','ASC');
	$q = $CI->db->get("tbmastersekolah")->result();
	$callback = '<option value="">- Pilih Sekolah -</option>';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= "<option value='".$value->sekolah_npsn."'>".$value->sekolah_npsn.'-'.$value->sekolah_nama."</option>".PHP_EOL;
		}
	} else {
		$callback = '<option value="">- Pilih Sekolah -</option>';
	}
	echo $callback;		
}

function optionSekolahkatolik($prov,$kabko,$kec,$kel){
	$CI  = getCI();
	$CI->db->where('kecKode',$kec);
	if ($kel != ''){
		$CI->db->where('kelKode',$kel);
	}
	$CI->db->where('sekolah_tipe','2');
	$CI->db->order_by('sekolah_npsn','ASC');
	$q = $CI->db->get("tbmastersekolah")->result();
	$callback = '<option value="">- Pilih Sekolah -</option>';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= "<option value='".$value->sekolah_npsn."'>".$value->sekolah_npsn.'-'.$value->sekolah_nama."</option>".PHP_EOL;
		}
	} else {
		$callback = '<option value="">- Pilih Sekolah -</option>';
	}
	echo $callback;		
}

function userSess(){
	$CI  = getCI();
	return $CI->session->userdata();
}

function logUser($aksi = ''){
	$CI  = getCI();
	$username = $CI->session->userdata('userId');
	$CI->db->query("insert ignore into __loguser (username,aksi) values ('$username','$aksi')");
	return $username;
}

function aksesmenu($tipe){
	$CI  = getCI();
	$usertipe= $CI->session->userdata('userType');
	if ($usertipe > 1 && $tipe != $usertipe){
		redirect(base_url('index.php/login'));
	}
}
function _encrypt($key=""){
	$CI =getCI();
	$CI->load->library('encrypt');
	$nid = "appditamanis#".$key."#".date("Ymd");
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

function sizeupload(){
	return "5MB";
}

function sizeuploadlampiran(){
	return "30MB";
}

function sufixpass(){
	return 's3nyuM';
}

function viewdoc(){
	return str_replace('dashboard/','',base_url())."index.php/data/viewdoc?file=";
}
function validateDate($date)
{

	if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
	if(checkdate(substr($date, 5, 2),substr($date, 8, 2), substr($date, 0, 4))){
		
	return TRUE;
	} else
	return FALSE;
	} else {
	return FALSE;
	}
}

function optionAmbildok(){
	$CI  = getCI();
	$q = $CI->db->get("tbambildok")->result();
	$callback ='';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= "<option value='".$value->ambildokId."' >".$value->ambildokNama."</option>".PHP_EOL;
		}
	}
	return $callback;			
}

function kirimkepala($phone_no,$message,$layanan=''){
	
	$CI  = getCI();
	$CI->db->query("insert into tbwahis (nohp,msg,layanan) values ('$phone_no','$message','$layanan')");
	$phone_no = preg_replace( "/(\r)/", "", $phone_no );
	$data = [
		'api_key' => 'j0zucQIe7Br37Ngm3s75qDuS8V5CYP',
		'sender' => '6285186800150',
		'number' => $phone_no,
		'message' => $message
	];
 $curl = curl_init();
                                                    
             curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://wa.kemenagngawi.or.id/send-message',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => json_encode($data),
              CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
              ),
              ));

	$result = curl_exec($curl);
	return $result;
	curl_close($curl);
}

function sendWA($phone_no,$message,$layanan=''){


	$CI  = getCI();
	$CI->db->query("insert into tbwahis (nohp,msg,layanan) values ('$phone_no','$message','$layanan')");
	$phone_no = preg_replace( "/(\r)/", "", $phone_no );
	$data = [
		'api_key' => 'j0zucQIe7Br37Ngm3s75qDuS8V5CYP',
		'sender' => '6285186800150',
		'number' => $phone_no,
		'message' => $message
	];

 $curl = curl_init();
                                                    
             curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://wa.kemenagngawi.or.id/send-message',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => json_encode($data),
              CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
              ),
              ));
	$result = curl_exec($curl);
	
	
	
	
if (curl_errno($curl)) {
    $result = array(
        "status" => false,
        "msg" => "cURL Error: " . curl_error($curl),
    );
} else {
    // Check if the response is empty (timeout occurred)
    if (empty($result)) {
        $result = array(
             "status"=> true,
            "msg"=> "Message sent successfully!",
        );
    } else {
        // Successful response
        $result = array(
            "status" => true,
            "msg" => "Message sent successfully!",
            "data" => json_decode($result), // You can include the response data here if needed
        );
    }
}
	//return $result;
	curl_close($curl);
}

function logokemenag(){
	return "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAV0AAAFACAYAAAAfwK/yAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAxFpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDYuMC1jMDAyIDc5LjE2NDQ2MCwgMjAyMC8wNS8xMi0xNjowNDoxNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QTE0MDBDMjI5RTU5MTFFQjkxNDlFMUREQUYzMUM0RUEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QTE0MDBDMjE5RTU5MTFFQjkxNDlFMUREQUYzMUM0RUEiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDIwMjAgV2luZG93cyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSI0MUI4RjA4NUQ0RjYyMUIyQ0JGNERBQTM2NEZGQkE3QSIgc3RSZWY6ZG9jdW1lbnRJRD0iNDFCOEYwODVENEY2MjFCMkNCRjREQUEzNjRGRkJBN0EiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4nVQalAACySklEQVR42uydCbid0/XGj4iiYigxU0kaCRJEJBGzpCghCRGCEEOIKWIsShJD1BxqjBBBI5TEPCeCIEivsYoWrbaiNVZbdPDXnv/32857rLPvd875zsm9Z7p7P89+knvvGb5vf3u/e+13vWutJdLpdCq00EILLbTKtHZhCEILLbTQAuiGFlpooQXQDS200EILLYBuaKGFFloA3dBCCy200ALohhZaaKEF0A0ttNBCC6AbWmihhRZaAN3QQqPdeOONm1x++eXbhJEIrd5a+zAEodVbO+qoow679tprj+D/zz777Kzbb7/9ojAqodVLWyKEAYdWL+2pp5767siRI2cuWrRoneHDh/dZZpllUrfccssL3/ve9/520003HTRkyJA/h1EKreYboBt66LXezzjjjD2i6drElL3kkkvSaldddRVWA73pmGOOOTiMVei13sMghF7zvXfv3lMB1c022yz94osvpv32+uuvp7faaisHvF27dr3tiSee6BDGLfQAuqGHXmKfPHnydhnrtimydNP/93//lwXa//73v67bNmnSpKzVO378+D3CGIYeQDf00BP2H/3oRz8FPDt16pR+/PHHm4Gt39WeeeaZ9IYbbuiAt2/fvlPCWIYeQDf00Av0KVOm9JF1O2bMmPQXX3xRFHB94P33v/+dPu6449L6nGuuuaZfGNvQA+iGHrrXhwwZMhGQXH755dP33HNPYrDNB74PPfRQepVVVnHgu/vuu58dxjj0ALqhhx71WbNmdfrud787H3AcPnx4+sMPPywbcH3g/eyzz9IHHHCAA96ll156wa233totjHnoAXRDb7P92GOPHSUp2PXXX7/YYJsPfG+55ZZ0+/btHfjut99+J4axDz2AbuhtqhPo0KlTp1mA4HbbbZd+6623SuZuS339H/7wh/SPfvQjB7wdO3Z8+L777lsrPIvQA+iG3vB94sSJQ2TdXnjhhWUB6JNPPpmeO3du4vf973//y7728ssvz0rLxo0bNyo8k9AD6IbesL1Pnz5TALtNNtkkJ9ChFNCcPHmyQDN97rnnZn/Pa5KC9q9//ev0Flts4YC3W7duMxcuXNguPJ/QA+iG3jD9ggsu2FESrlNPPTU20KEYUL799tvp3XbbLQu46j/84Q9dVFo59MQ555yTtXrPO++8ncOzCj2Abuh13wcMGHAxoLbOOuuk58yZk9gytdbtzTffLPlXbF9hhRXSU6dOLcvqnT9/fvoHP/hBOsMvTw7PLPQAuqHXZb/uuut6y7odPXp0+vPPPy/ZGkU+NnLkyGYge/755zuaoV27djm/R3L23nvvlfw9//rXv9Jjx47NBlRcf/31vcIzDD2Abuh10/faa6/TFOhwxx13lGWBEiBBGLAF1W7duqUffvjh7GsIEd54441zXrPWWmulf/GLX5T1nffee2965ZVXduA7bNiw08OzDD2Abug13SOA7RId9edlQCv95z//OQtoX3/9dSLg+/LLL9Pjxo1rZt0efvjh6b///e85YOpZqc1e/7e//S2R1cu1qX3yySfp/fff3wEvQRu33357l/BsQw+gG3rN9Qj4DpYU7Nprry0p0MHyq77lusYaa+RYroWs1O9///s57+3evXv60UcfLetafv7zn6eXXHJJB74HHXTQ2PCMQw+gG3pN9Llz56603nrr3alAh9/+9rclW5e0iRMnNrNW4WgXLVpU9PPUPvroI4X95nQUE9YxlxR433333fTOO+/sgHfNNde8/8knnwy5ekMPoBt69fpPfvKTYbJucW6VE+jw2muvpbfeeusckIyO9elrrrmmJF7Wfub06dPTK620Us5nbr755mVrgy+77LKstOyUU07ZJzz70APohl7x3qtXr+sBIfLXNjU1lXWE/9nPfpZeZpllcsBx++23T2wtF7NSd9lll5zPhi6wUXClBlRE9+yAt2fPnjeGORB6AN3QK9IvueSSHSStOvnkk3NoglIAcciQIc1ogJ/+9KclWctJAiCQli211FI53wNl8Jvf/KasgIrx48dnpWUXX3zxDmFOhB5AN/RW6zvttNP5gA2yrFIcVPaoPmPGjGaBDn369Ek/++yziw22+cDypZdeSm+55ZbNAipsZrNSrF5yP3Tp0sWB78CBAy8McyP0ALqht2gnWEDW3cEHH5wj3UoKVEixRo0a1cy6Pemkk9L/+c9/Whxw/e/HIs9YqTl9xIgROdK2pJ+HtO3II4/MWr3Tp0/fJMyV0APohr7YfZ999jkFUFluueVKCjqw1i1yrkyobY6c68EHH2w1sM0HlmQn82Vp6667btlBHHfffXc2oGL48OGnhTkTegDd0MvqDz300GpRexAwGTp0aNnhtccff3wz6/KQQw5xlm+lANe/LkKSM1ZqTud35YYrR5uTA94OHTo8cdttt3UNcyj0ALqhJ+7kmZUUbMqUKYksQEWc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";
}
