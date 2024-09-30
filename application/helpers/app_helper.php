<?php
function kantorapp(){
	return 'Kantor Kementerian Agama Kabupaten Ngawi';
}

function alamatapp(){
	return 'Jl. Kartini No.15 Ngawi, Jawa Timur';
}

function footerapp(){
	return '©2022 Sistem Anjungan Mandiri Terintegrasi (SANTU).';
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


function sufixpass(){
	return 's3nyuM';
}

function viewdoc(){
	return base_url()."index.php/data/viewdoc?file=";
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

function verifyacces($captcha){
	$secretKey = "6LeharwUAAAAAKRdg-FaWZJfj_TrYws4vJmxGRcV";
	$ip = $_SERVER['REMOTE_ADDR'];

	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array('secret' => $secretKey, 'response' => $captcha);

	$options = array(
	'http' => array(
	  'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	  'method'  => 'POST',
	  'content' => http_build_query($data)
	)
	);
	$context  = stream_context_create($options);
	$response = file_get_contents($url, false, $context);
	//echo $response;
	$responseKeys = json_decode($response,true);
	header('Content-type: application/json');
	if($responseKeys["success"]) {
		$sukses = true;
	} else {
		$sukses = false;
	}
	
	return $sukses;
}

function optionStatusMadrasah(){
	$callback = "<option value='NEGERI'>NEGERI</option>".PHP_EOL;
	$callback .= "<option value='SWASTA'>SWASTA</option>".PHP_EOL;
	echo $callback;			
}

function optionJenjang(){
	//$callback = "<option value='TK'>TK</option>".PHP_EOL;
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
	$callback .= "<option value='BELUM AKREDITASI'>BELUM AKREDITASI</option>".PHP_EOL;
	echo $callback;			
}

function optionSertifikasi(){
	$callback = "<option value='SERTIFIKASI'>SERTIFIKASI</option>".PHP_EOL;
	$callback .= "<option value='BELUM SERTIFIKASI'>BELUM SERTIFIKASI</option>".PHP_EOL;
	echo $callback;			
}

function optionLayananbukutamu(){
	$CI  = getCI();
	$q = $CI->db->get("tbbukutamulayanan")->result();
	$callback ='';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$callback .= "<option value='".$value->id."'>".$value->namalayanan."</option>".PHP_EOL;
		}
	}
	return $callback;			
}

function optionAmbildok(){
	$CI  = getCI();
	$q = $CI->db->get("tbambildok")->result();
	$callback ='';
	if( count($q) > 0 ){
		foreach ($q as $key => $value)
		{
			$selected = $value->ambildokId == 1?"selected='selected'":"";
			$callback .= "<option value='".$value->ambildokId."' $selected>".$value->ambildokNama."</option>".PHP_EOL;
		}
	}
	return $callback;			
}

function sizeupload(){
	return "5MB";
}

function sizeuploadlampiran(){
	return "30MB";
}

function uploadfile($filefolder,$filename,$fileelement,$size=10){
	$CI  = getCI();
	$CI->load->library('image_lib');
	$filename = str_replace('.','_',$filename);
	$config['upload_path'] = $filefolder; 
	$config['allowed_types'] = 'pdf|xlsx|zip|xls';
	$config['max_size']    = 1024*$size;
	$config['file_name']   =  $filename;
	$config['overwrite'] = TRUE; 
	$CI->load->library('upload', $config);
	$CI->upload->initialize($config);
	if ($CI->upload->do_upload($fileelement)){
		$datafile['error'] = '';
		$datafile['data'] = $CI->upload->data();
	} else {
		$datafile['error'] = $CI->upload->display_errors();
		$datafile['data'] = '';
	}
	return $datafile;
}
function uploadfileimg($filefolder,$filename,$fileelement,$size=5){
	$CI  = getCI();
	$CI->load->library('image_lib');
	$filename = str_replace('.','_',$filename);
	$config['upload_path'] = $filefolder; 
	$config['allowed_types'] = 'jpg|png|pdf';
	$config['max_size']    = 1024*$size;
	$config['file_name']   =  $filename;
	$config['overwrite'] = TRUE; 
	$CI->load->library('upload', $config);
	$CI->upload->initialize($config);
	if ($CI->upload->do_upload($fileelement)){
		$datafile['error'] = '';
		$datafile['data'] = $CI->upload->data();
	} else {
		$datafile['error'] = $CI->upload->display_errors();
		$datafile['data'] = '';
	}
	return $datafile;
}
function uploadfilelampiran($filefolder,$filename,$fileelement,$size=5){
	$CI  = getCI();
	$CI->load->library('image_lib');
	$filename = str_replace('.','_',$filename);
	$config['upload_path'] = $filefolder; 
	$config['allowed_types'] = 'pdf|zip';
	$config['max_size']    = 1024*$size;
	$config['file_name']   =  $filename;
	$config['overwrite'] = TRUE; 
	$CI->load->library('upload', $config);
	$CI->upload->initialize($config);
	if ($CI->upload->do_upload($fileelement)){
		$datafile['error'] = '';
		$datafile['data'] = $CI->upload->data();
	} else {
		$datafile['error'] = $CI->upload->display_errors();
		$datafile['data'] = '';
	}
	//print_r($CI->upload->data());
	return $datafile;
}

function hapusfile($filename){
	if (file_exists($filename)){
		unlink($filename);
	}
	return $filename;
}

function hapusfilearr($listfile = array()){

	foreach ($listfile as $key => $value) {
		hapusfile($value);
	}
	return 1;
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
	return $result;
	curl_close($curl);
	
}

function sendWAtombol($phone_no,$message,$layanan=''){

	$CI  = getCI();
	$CI->db->query("insert into tbwahis (nohp,msg,layanan) values ('$phone_no','$message','$layanan')");
	$phone_no = preg_replace( "/(\r)/", "", $phone_no );

     $data = [
		'sender' => '6285186800150',
       'api_key' => 'j0zucQIe7Br37Ngm3s75qDuS8V5CYP',
		'number' => $phone_no,
		'url' => null,
		'footer' => 'SANTUN KEMENAG Kabupaten Ngawi',
		'message' => $message,
		'template' => ['url|Lacak Layanan|https://ptsp.kemenagngawi.or.id/index.php/halaman/lacak-layanan']
              ];
           $curl = curl_init();
                                                    
             curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://wa.kemenagngawi.or.id/send-template',
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

function sendWA2($phone_no,$message,$layanan=''){
	//return;
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

function kirimtelegram($pesan){
    $token = "5827578487:AAEYucH3sCXvmwDFR1QkKh7gj_se9gNh4dA";

    		$data = [
    		    'text' =>  $pesan,
    		    'chat_id' => '@santun_kemenagngawi'
    		];

    		file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
}

function sendfirebase($topik,$title,$body,$data,$kat){
	//return;
// 	$API_ACCESS_KEY = 'AAAAoxATVrA:APA91bGNMUWD7TUw9vFSSUvil3krcc5S1UwzBDnSMyof-X1-8kx6B7HvlGGvoQTGXuLQulEIkcfe8c7YiwERaAfdpymmH7TJlrZHWoEsPUqOiUbh9g8Y4ARDk8y7uzayljQSkxKm87fe####';
// 	//$topik = "hahahah";
// 	$msg = array
// 		(
// 		'body' 	=> $body,
// 		'title'	=> $title,
				
// 		);
// 	$fields = array
// 			(
// 				'to'		=> "/topics/".$topik,
// 				'notification'	=> $msg,
// 				'data'            	=> array('data'=>$data,'kat'=>$kat),
// 			);
	
	
// 	$headers = array
// 			(
// 				'Authorization: key=' . $API_ACCESS_KEY,
// 				'Content-Type: application/json'
// 			);
// 		$ch = curl_init();
// 		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
// 		curl_setopt( $ch,CURLOPT_POST, true );
// 		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
// 		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
// 		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
// 		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
// 		$result = curl_exec($ch );
// 		//echo $result;
// 		curl_close( $ch );
}

function cekviewsite($view,$redir){
	if ($view == ''){
		redirect($redir, 'refresh');
	}
	$fileview = APPPATH."/views/site/".$view.'.php';
	if (!file_exists($fileview))
	{
		redirect($redir, 'refresh');
	}
}