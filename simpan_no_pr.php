

<?php
require_once('config.php');
		 $no_req		=$_POST['no_req'];
		  $user_req	=$_POST['user_req'];
		  $jns		=$_POST['jns'];
		   $obj		=$_POST['obj'];
		$leveluser		=$_POST['leveluser'];
      
   date_default_timezone_set('Asia/Jakarta');
            
session_start();
 $pls   =$_SESSION['pls'];
 $user=  $_SESSION['nama'];
$tgl_skr=date("Y-m-d H:s:i");

if($leveluser=='h_it'){


$nopr		=$_POST['nopr'];
 $simpan = mysqli_query($koneksi,"update request set no_pr='$nopr',pembuat_pr='$user',tgl_input_pr='$tgl_skr' where no_request='$no_req' and jenis='$jns' and user_request='$user_req' and objectid='$obj'");
}else{ 
	$simpan = mysqli_query($koneksi,"update request set user_approve='$user',tgl_approve='$tgl_skr' where no_request='$no_req' and jenis='$jns' and user_request='$user_req' and objectid='$obj'");

//simpan brg masuk
  $no_po      =$_POST['nopo'];
  $sj         =$_POST['sj'];
  $no_pr      =$_POST['nopr'];
  $js_brg     =$_POST['cb_brg'];
  $nmbrg      =$_POST['nmbrg'];
  $userinput  =$_POST['userinput'];
  $tglmsk     =$_POST['tglmsk'];
  $ketmsk     =$_POST['ketmsk'];
  $jmlbrg     =$_POST['jmlbrg'];

        require_once("config.php");
        
   date_default_timezone_set('Asia/Jakarta');
            
            $cekms =mysqli_query($koneksi,"select*from ms_category where id='$js_brg'");
            $dtms	= mysqli_fetch_array($cekms);
           $category=substr($dtms['category'],0,3);
             $tglku=date('dmy');
               $dt = '/'.$category.'/'.'IN'.'/'.$tglku;
               $nm = substr($dt,0,14);
               $sie = strtoupper($nm);
             
              
              $cekbrg =mysqli_query($koneksi,"SELECT RIGHT(kd_masuk, 14) AS 'kd', mid(kd_masuk, 1,3) AS 'angka' FROM barang_masuk WHERE kd_masuk LIKE '%$sie' ORDER BY kd_masuk DESC LIMIT 1");
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
             $no_masuk = $hasilkode.$sie;
            
       $perintah	=  	"  
                         no_po	  	  ='".$no_po."',
                         no_pr	  	  ='".$no_pr."',
                         no_sj	 	  ='".$sj."',
                         kd_masuk	  ='".$no_masuk."',
                         id_brg		  ='".$js_brg."',
                         nama         ='".$nmbrg."',
                         user_input   ='".$userinput."',
                         tgl_msk      ='".$tglmsk."',
			            			 jumlah       ='".$jmlbrg."',
                           ppwo		  ='". $no_req."',
                           pls		  ='". $pls."',
                         keterangan   ='".$ketmsk."'
                         ";

$simpan = mysqli_query($koneksi,"insert into barang_masuk set".$perintah);  

//transaction
$datatrans =" kode_trans   ='".$no_masuk."',
              subcatagory  ='".$js_brg."', 
              nama_brg     ='".$nmbrg."',
              type_trans   ='IN',
              tgl_trans    ='".$tglmsk."',
              jumlah_trans ='".$jmlbrg."',
              pls ='".$pls."',
              keterangan   ='".$ketmsk."'
               ";
$simpantransaction = mysqli_query($koneksi,"insert into trans_inventory set".$datatrans);  
//transaction

$cekstok = mysqli_query($koneksi,"select count(*)as jml from stok where kd_jenis='$js_brg' and nama_barang='$nmbrg'");  
$stoku	= mysqli_fetch_array($cekstok);
 $lihatstoku=$stoku['jml'];
if($lihatstoku==0)
{
  
    $stokbaru = mysqli_query($koneksi,"insert into stok set kd_jenis='$js_brg',jumlah_stok='$jmlbrg',nama_barang='$nmbrg', keterangan='$ketmsk'");  
}else
{
    $dtstok = mysqli_query($koneksi,"select * from stok where kd_jenis='$js_brg' and nama_barang='$nmbrg'");  
    $stokdt	= mysqli_fetch_array($dtstok);
    $stokawal=$stokdt['jumlah_stok'];
    $tambahstok=$stokawal+$jmlbrg ;
    $updatestok=mysqli_query($koneksi,"update stok set jumlah_stok='$tambahstok' where kd_jenis='$js_brg' and nama_barang='$nmbrg'");
}



//bata ssimpan barang masuk
}
?>
 <head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->

</head>
<body>
			<script type=text/javascript>
				swal({ 
						title: "Succes!",
						text: "Nomer  PP/WO : <?php echo $no_req;?>di tambahkan no PR ",
						type: "success" 
					},
					function(){
								window.location.href = 'app_pr.php';
							});
			</script>
</body>
