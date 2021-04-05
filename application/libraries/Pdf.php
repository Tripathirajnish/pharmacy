<?php defined('BASEPATH') OR exit('No direct script access allowed');
 require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

 
class Pdf extends Dompdf
{
    public function __construct(){
        parent::__construct();
        
        // include autoloader
        
        
        // instantiate and use the dompdf class
        $pdf = new DOMPDF();
        
        $CI =& get_instance();
        $CI->dompdf = $pdf;
        
    }
}
?>