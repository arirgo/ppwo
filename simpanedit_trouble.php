<?php
require_once('config.php');
session_start();
$user       =$_SESSION['nama'];
$obj        =$_POST['obj'];
$tgl        =$_POST['tgl'];
$apl        =$_POST['apl'];
$bagian     =$_POST['bagian'];
$solusi     =$_POST['solusi'];
$ket        =$_POST['ket'];
$komplain   =$_POST['komplain'];


$perintah	=  	"
                         tanggal	='".$tgl."',
                         bagian		='".$bagian."',
                         aplikasi   ='".$apl."',
                         komplain   ='".$komplain."',
                         keterangan ='".$ket."',
                         solusi     ='".$solusi."',
                         user_input='".$user."'";
$syarat="where objectid='".$obj."'";				
 $simpan = mysqli_query($koneksi,"update troubleshooting set".$perintah."".$syarat);


       
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
						title: "Success!",
						text: "DATA BERHASIL DI PERBARUAI ",
						type: "success" 
					},
					function(){
								window.location.href = 'view_trouble.php';
							});
			</script>
            </body>