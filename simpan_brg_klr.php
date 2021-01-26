<?php

   // $kdklr        =$_POST['kdklr'];
    $js_brg       =$_POST['cb_brg'];
    $nmbrgklr     =$_POST['nmbrgklr'];
    $userinputklr =$_POST['userinputklr'];
    $tglklr       =$_POST['tglklr'];
    $ketklr       =$_POST['ketklr'];
    $jmlbrgklr    =$_POST['jmlbrgklr'];
     $ppwo    =$_POST['project'];

        require_once("config.php");
        date_default_timezone_set('Asia/Jakarta');
            
            $cekms =mysqli_query($koneksi,"select*from inventarisi where objectid='$js_brg'");
            $dtms	= mysqli_fetch_array($cekms);
           
           $category=substr($dtms['jenis_group'],0,3);
             $tglku=date('dmy');
      $dt = '/'.$category.'/'.'OT'.'/'.$tglku;
           echo     $nm = substr($dt,0,14);
                 $sie = strtoupper($nm);
             
              
              $cekbrg =mysqli_query($koneksi,"SELECT RIGHT(kd_keluar, 14) AS 'kd', mid(kd_keluar, 1,3) AS 'angka' FROM barang_keluar WHERE kd_keluar LIKE '%$sie' ORDER BY kd_keluar DESC LIMIT 1");
            $dtbrg	= mysqli_fetch_array($cekbrg);
             
            if($dtbrg=="")
             {
               $ang=0;
             }else{
          $ang = $dtbrg['angka'];
             }
              $kd=($ang+1);
        $hasilkode = str_pad($kd, 3, "0", STR_PAD_LEFT);
              $tg = date('my');
            //  if($bagian=='LMN'){
             $no_keluar = $hasilkode.$sie;
            


       $perintah	=  	"
                        no_pp_wo	  ='".$ppwo."',
                         kd_keluar	  ='".$no_keluar."',
                         id_brg		  ='".$js_brg."',
                         nama_brg         ='".$nmbrgklr."',
                         user_input   ='".$userinputklr."',
                         tgl_keluar      ='".$tglklr."',
                         jumlah_keluar     ='".$jmlbrgklr."',
                         keterangan   ='".$ketklr."'
                         ";

    $simpan = mysqli_query($koneksi,"insert into barang_keluar set".$perintah);  

//transaction
$jmltrans="-".$jmlbrgklr;
$datatrans =" kode_trans   ='".$no_keluar."',
              subcatagory  ='".$js_brg."', 
              nama_brg     ='".$nmbrgklr."',
              type_trans   ='OUT',
              tgl_trans    ='".$tglklr."',
              jumlah_trans ='".$jmltrans."',
              keterangan   ='".$ketklr."'
               ";
$simpantransaction = mysqli_query($koneksi,"insert into trans_inventory set".$datatrans);  
//transaction

    $dtstok = mysqli_query($koneksi,"select * from stok where kd_jenis='$js_brg' and nama_barang='$nmbrgklr'");  
    $stokdt	= mysqli_fetch_array($dtstok);
    $stokawal=$stokdt['jumlah_stok'];
    $tambahstok=$stokawal-$jmlbrgklr ;
    $updatestok=mysqli_query($koneksi,"update stok set jumlah_stok='$tambahstok' where kd_jenis='$js_brg' and nama_barang='$nmbrgklr'");


?>