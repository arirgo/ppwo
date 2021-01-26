<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->
</head>
<body>
<?php
session_start();
$user = $_SESSION['username'];
$nowo			= $_GET['nowo'];
$status_wo		= "approved by SH";
$url			= "app_pp.php";
 //~ echo $user;
require_once('config.php');
$sqlu 	= mysqli_query($koneksi,"select * from user where username='".$user."'");
$datau	= mysqli_fetch_array($sqlu);
$sqlp	= mysqli_query($koneksi,"select * from tbl_wo where no_wo='".$nowo."'");
$datap	= mysqli_fetch_array($sqlp);	
$perintah 		= 		"	status_wo				='".$status_wo."',
							app_sh					='".$datau['nama']."'";
						 
$syarat 	= " where no_wo='".$nowo."'";
$update 	= mysqli_query($koneksi,"update tbl_wo set ".$perintah." ".$syarat);
$cek	=	mysqli_query($koneksi,"select count(no_wo) as no_wo from notif_wo_sh where no_wo = '".$nowo."'");
$dtcek = mysqli_fetch_array($cek);
if ($dtcek['no_wo']=='0') {
	$task	=	" no_wo 	='".$nowo."',
				  pemohon	='".$datap['pemohon']."',
				  section 	='".$datap['section']."',
				  uraian_pekerjaan = '".$datap['uraian_pekerjaan']."'";
	$ins	=	mysqli_query($koneksi,"insert into notif_wo_sh set ".$task);
	echo "<input type=hidden value='$url' id=url>";


				?>

					<script>
						swal({
  								title: "Approved!",
							 	text: "Data berhasil di approve!",
							 	timer: 3000,
							  	icon: "success",
							},function(){
								var url = document.getElementById('url').value;
								window.location = url;
							});
						// var url = document.getElementById('url').value;
						// window.location = url;
						
					</script>
		<?php 
	
}else{
echo "<input type=hidden value='$url' id=url>";


				?>

					<script>
						swal({
  								title: "Approved!",
							 	text: "Data berhasil di approve!",
							 	timer: 3000,
							  	icon: "success",
							},function(){
								var url = document.getElementById('url').value;
								window.location = url;
							});
						// var url = document.getElementById('url').value;
						// window.location = url;
						
					</script>
		<?php 
}
		?>			
</body>		

