<?php
$wo = $_POST['id'];
//~ echo $nopp;
  require_once('config.php');
    $select =mysqli_query($koneksi,"select count(*)as jml from detail_project where no_project='$wo' and status !='finish'");
    $datwo	= mysqli_fetch_array($select);
    
    $cek=$datwo['jml'];
    echo $cek

?>