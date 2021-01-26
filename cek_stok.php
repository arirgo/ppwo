<?php

    $js_brg     =$_POST['cb_brg'];
    $nmbrg      =$_POST['nmbrgklr'];
 
        require_once("config.php");
   
    $dtstok = mysqli_query($koneksi,"select * from stok where kd_jenis='$js_brg' and nama_barang='$nmbrg'");  
    $stokdt	= mysqli_fetch_array($dtstok);

    $stok=$stokdt['jumlah_stok'];
  if($stok=='')
  {
       $nol='0';
     
         echo $nol."&SUKSES";
     
  }else{
   
      $nilai=$stokdt['jumlah_stok'];
      echo $nilai."&SUKSES";
  }

      

?>