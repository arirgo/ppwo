<?php
date_default_timezone_set("Asia/Jakarta");
require_once('config.php');
$no_req     =$_POST['no_req'];
$request    =$_POST['request'];
$user       =$_POST['userh'];
$pemohon    =$_POST['pemohon'];
$section    =$_POST['section'];
$cb_brg     =$_POST['cb_brgh'];
// echo $nm_brg     =$_POST['nmbrg'];
session_start();
$pls=$_SESSION['pls'];
 $pecah = explode(" / ", $cb_brg);
			 $c   = $pecah[0];
			 $sc = $pecah[1];
      
       
$jml        =$_POST['jml'];
     $tgl        =date('Y-m-d');


$jenis      =$_POST['jenis'];

 $perintah	=  	"
                         no_request		  ='".$no_req."',
                         request		  ='".$request."',
                         user		      ='".$user."',
                         user_request	  ='".$pemohon."',
                         katagori		  ='".$c."',
                         nm_barang		  ='".$sc."',
                         jumlah		      ='".$jml."',
                         reqdate    ='".$tgl."',
                         pls    ='".$pls."',
                         jenis		      ='".$jenis."'
                       
                         
                         ";

    $simpan = mysqli_query($koneksi,"insert into request set".$perintah);  

?>
<!-- <head> -->
<!-- This is what you need -->
  <!-- <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css"> -->
  <!--.......................-->
<!-- 
</head>
<body>
			<script type=text/javascript>
				swal({ 
						title: "Succes!",
						text: "PP dengan nomor : <?php echo $no_req;?> Status perbaikan : <?php echo $request; ?>",
						type: "success" 
					},
					function(){
								window.location.href = 'menu_process_pp.php';
							});
			</script>
</body> -->
