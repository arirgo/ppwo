
<?php
session_start();
$nm = $_SESSION['nama'];

date_default_timezone_set("Asia/Jakarta");
$tgl		= date("Y-m-d H:i:s");

  //  $kd_msk =$_POST['kd_msdk'];
   $id    =$_GET['obj'];

    require_once("config.php");
 $dtkom=mysqli_fetch_array(mysqli_query($koneksi,"select * from master_komputer where id='$id' "));
 
 $hapuskom=mysqli_query($koneksi,"delete from master_komputer where id='$id' ");
    
  $history =mysqli_query($koneksi,"insert into  historycom_user set nama_komputer='".$dtkom['nama_komputer']."',
																	  user='".$dtkom['nama_pengguna']."',
																	  waktu='".$dtkom['waktu']."',
																	  lokasi='".$dtkom['bagian']."',
																	  tgl='".$tgl."',
																	  status='delete',
																	  user_update='".$nm."'");


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
						text: "DATA BERHASIL DI HAPUS",
						type: "success" 
					},
					function(){
								window.location.href = 'form_pc.php';
							});
			</script>
</body>

