<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'third_party/Srcmail/PHPMailerAutoload.php';

class Sendmail {

  public function kirim($data=array())
  {
  	if (count($data) > 0){
		$username = 'ditamanis.kemenagkotamalang@gmail.com';
		$password = '100kali100';
		$to		=$data['to'];
		$judul  =$data['judul'];
		$body =$data['body'];
		$fromapp	=isset($data['fromapp'])?$data['fromapp']:'Digitalisasi Data Madrasah Diniyah dan Lembaga Keagamaan Islam Kemenag Kota Malang';
		if ($to != ''){
			$mail             = new PHPMailer();
		    $mail->IsSMTP();
		    $mailserver = 'gmail';
		    $mail->Host       = "mail.gmail.com"; 
		    $mail->SMTPDebug  = 0;
		    $mail->SMTPAuth   = true;
		    $mail->SMTPSecure = "tls";
		    $mail->Host       = "smtp.gmail.com";
		    $mail->Port       = 587;
		    $mail->Username   = $username;
		    $mail->Password   = $password;

		    $mail->SetFrom($username, $fromapp);
		    $mail->Subject    = $judul;
		    $mail->Body = $body;
		    $mail->IsHTML(true);
		    $mail->AddAddress($to); 
		    if (!$mail->Send()){
				$error =  'gagal';
			} else {
				$error = 'sukses';  	
			}
		         	
		} else {
			$error =  'gagal';
		}
		
		return $error;	
	}

  }


}
