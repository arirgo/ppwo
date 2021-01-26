<?php
ob_start();
//Koneksi ke database
//include("../mpdf/config.php");
?>
SAYA BELAJAR MEMBUAT REPORT PDF
<?php
$out = ob_get_contents();
ob_end_clean();
include("mpdf.php");
$mpdf = new mPDF('c','A4','');
$mpdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('mpdf.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($out);
$mpdf->Output();
?>
