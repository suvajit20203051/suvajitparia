<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf
{
    public $dompdf;

    public function __construct()
    {
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); // allow images & external assets

        $this->dompdf = new Dompdf($options);
    }

    public function loadHtml($html)
    {
        return $this->dompdf->loadHtml($html);
    }

    public function setPaper($size, $orientation = 'portrait')
    {
        return $this->dompdf->setPaper($size, $orientation);
    }

    public function render()
    {
        return $this->dompdf->render();
    }

    public function stream($filename, $options = [])
    {
        return $this->dompdf->stream($filename, $options);
    }
}
