<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."third_party/dompdf/autoload.inc.php");
use Dompdf\Dompdf as Dompdf;

class LibPdf
{
    function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='portrait'){
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->getOptions()->setIsFontSubsettingEnabled(true);
        $dompdf->render();
        if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
    }

    function savePDF($html, $filename='',$lok, $paper='A4', $orientation='portrait'){
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->getOptions()->setIsFontSubsettingEnabled(true);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents($lok.'/'.$filename.'.pdf', $output);
    }
}
?>