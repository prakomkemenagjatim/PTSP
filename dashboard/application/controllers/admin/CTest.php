<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(SITE_URI.'application/controllers/Admincontroller'.EXT);

class CTest extends Admincontroller {

	public function __construct()
	{
       	parent::__construct();
        $this->isLogin();
        $this->load->helper('app_helper');
    }

	public function index()
	{
		$data['userSess'] = userSess();
		$this->load->view('index',$data);
	}

    function getQR(){
        error_reporting(E_ALL);
		ini_set('display_errors',1);
        $folder_file = '../media/';
        $noreg = '210000000';
		echo $noreg;
		$this->load->library('LibQrcode');
		$kode =str_replace('dashboard/','',base_url('data/cek-rekom-umroh')).'?q='.md5($noreg.':::SENYUM');
        echo $this->libqrcode->saveQrcode($kode,$noreg.'-Kementerian Agama Kota Malang',$folder_file.$noreg.'.png');
    }
	function suruqQr(){
		error_reporting(E_ALL);
		ini_set('display_errors',1);
		$noreg = '210000000';
		//echo $noreg;
		$this->load->library('LibQrcode');
		$kode =str_replace('dashboard/','',base_url('data/cek-rekom-umroh')).'?q='.md5($noreg.':::SENYUM');
		//$qrcode = $this->libqrcode->createQrcode($kode,$noreg.'-Kementerian Agama Kota Malang',true);
		$folder_file = '../media/';
		$qrfile = $folder_file.$noreg.'.png';
		$this->libqrcode->saveQrcode($kode,$noreg.'-Kementerian Agama Kota Malang',$folder_file.$noreg.'.png');
		$html ='
							<!doctype html>
							<html lang="en">
							<head>
								<meta http-equiv="Content-Type" content="text/html; charset="utf-8">
								<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
								<title></title>
							</head>
							<body>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tr align="center">
								<td width="20%"><img src="../assets/images/logorekom.png" height=90 width=100></td>
								<td width="80%" valign="center">
											<font size="+1" class="style1">
												<strong>
													KEMENTERIAN AGAMA REPUBLIK INDONESIA<BR>
												</strong>
											</font>
											<font size="+0" class="style1">
												<strong>
													KANTOR KEMENTERIAN AGAMA KOTA MALANG<BR>
												</strong>
											</font>
											<font size="-1" class="style1">
													Jl. Raden Panji Suroso No. 2 Kota Malang 65126<br>
													Telepon (0341) 491605; e-mail: kotamalang@kemenag.go.id<br>
													Website: https://malangkota.kemenag.go.id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e-mail: kotamalang@kemenag.go.id<br>
											</font>
								</td>
							</table>
							<hr>
							<br>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="center" colspan="2">
										<font size="+3" class="style1">REKOMENDASI</font><br>
										<font size="+0" class="style1">Nomor: XXXXXXXX</font>
										<br>
										<br>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
								<td colspan="3"><font size="+0" class="style1">Kepala Kantor Kementerian Agama Kota Malang dengan ini menerangkan bahwa: <br>
								</td>
							</tr>
							<br>
							<tr class="style1">
								<td width="25%">Nama</td>
								<td width="2%">:</td>
								<td width="73%">XXXXXXXXX</td>
							</tr>
							<tr class="style1">
								<td width="25%">Tempat, Tgl. Lahir </td>
								<td width="2%">:</td>
								<td width="73%">XXXXXXX</td>
							</tr>
							<tr class="style1" valign="top">
								<td width="25%">Alamat</td>
								<td width="2%">:</td>
								<td width="73%" align="left">XXXXXXXX</td>
							</tr>
							<tr class="style1">
								<td width="25%">No. Handphone </td>
								<td width="2%">:</td>
								<td width="73%">XXXXXXXXXXX</td>
							</tr>
							<tr class="style1">
								<td colspan="3"><br></td>
							</tr>
							<tr class="style1" align="justify">
								<td colspan="3">Adalah calon jemaah Umroh yang terdaftar pada XXXXXXXXX yang tercatat sebagai Penyelenggara Perjalanan Ibadah Umroh yang resmi pada Kementerian Agama dengan Nomor 1376 TAHUN 2019 Tanggal 28 Oktober 2019. 
								</td>
							</tr>
							<tr class="style1" align="justify">
								<td colspan="3">
								<br>
								Rekomendasi ini dibuat berdasarkan Surat Permohonan Rekomendasi dari XXXXXXXXXX Nomor Surat XXXXXXXXXX Tanggal XXXXXXXXXXXXXXX sebagai pertimbangan dalam pembuatan paspor untuk keperluan Ibadah Umroh yang bersangkutan. <br /></td>
							</tr>
							<tr class="style1" align="justify">
								<td colspan="3">
									<br>
									Demikian Rekomendasi ini kami buat, untuk dipergunakan sebagaimana mestinya.
									<br>
									<br>
									<br>
								</td>
							</tr>
							</table>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="style1">
							<tr>
								<td width="50%" rowspan="5" align="center" valign="middle"> 
								<img height=147 width=147 src="'.$qrfile.'"> </td>
								<td width="5%"></td>
								<td width="45%">XXXXXXXXXXXXXXX<br><br></td>
							</tr>
							<tr>
								<td width="5%"  align="left">a.n</td>
								<td width="45%">Kepala</td>
							</tr>
							<tr>
								<td width="5%"></td>
								<td width="45%">Kasi Peny. Haji dan Umroh </td>
							</tr>
							<tr>
								<td width="5%"></td>
								<td width="45%"><img src="../assets/images/ttd.png" height=90 width=250>
								</td>
								<br>
							</tr>
							<tr>
								<td width="5%"></td>
								<td width="45%">&nbsp;</td>
							</tr>
							<tr>
								<td width="50%" align="center" valign="top">&nbsp;</td>
								<td width="5%"></td>
								<td width="45%">H. Amsiyono, SH, S.Ag, M.Sy </td>
							</tr>
							<tr>
								<td width="50%" align="center" valign="top">&nbsp;</td>
								<td width="5%"></td>
								<td width="45%">NIP. 196406041987031003 </td>
							</tr>
							</table>
							</body>
							</html>
						';
						echo $html;
						$this->load->library('LibPdf');
						//$this->libpdf->createPDF($html, $noreg);
						$this->libpdf->savePDF($html, $noreg, $folder_file);
	}
}
