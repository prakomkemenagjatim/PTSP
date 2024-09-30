<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."third_party/qrcode/autoload.php");
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class LibQrcode
{
    function createQrcode($kode,$label,$base64 = false){
        $qrCode = new QrCode($kode);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
        $qrCode->setLogoPath('../assets/images/qrlogo.png');
        $qrCode->setLabel($label, 10,null, LabelAlignment::CENTER());
        if ($base64 == true){
            return "data:image/png;base64,".base64_encode($qrCode->writeString());
        } else {
            header("Content-Type: image/png");
            return $qrCode->writeString();
        }
    }
    
    function saveQrcode($kode,$label,$filepath){
        		error_reporting(E_ALL);
		ini_set('display_errors',1);
        $qrCode = new QrCode($kode);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
        $qrCode->setLogoPath('../assets/images/qrlogo.png');
        $qrCode->setLabel($label, 10,null, LabelAlignment::CENTER());
        return $qrCode->writeFile($filepath);

    }

}
?>