<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->
</head>
<body>
<?php
session_start();
$nmku=$_SESSION['username'];
$namakomp = strtoupper($_POST['namakomp']);
$namauser = $_POST['namapengguna'];
$bagian = $_POST['bagian'];
$waktu=$_POST['waktu'];


$nm = $_SESSION['nama'];

date_default_timezone_set("Asia/Jakarta");
$tgl		= date("Y-m-d H:i:s");


include "config.php";
$sqlw = mysqli_query($koneksi,"select * from user where username='".$nmku."'");
$isi  = mysqli_fetch_array($sqlw);
$pls=$isi['pls'];
$que = mysqli_query($koneksi,"SELECT count(nama_komputer) as val from master_komputer where nama_komputer = '$namakomp'");
$datq = mysqli_fetch_array($que);
$val = strval($datq['val']);

if ($val > 0){
?>
<script>
	swal({ 
		title: "Nama Komputer Sudah Ada!",
		text: "Siahkan isi dengan nama komputer lain!!",
		timer: 2000,
		type: "error" 
		},
		function(){
			window.location.href = 'form_pc.php';
		});
			
		</script>
<?php
}else{

$input	= "	nama_komputer		='".$namakomp."',
			nama_pengguna	 	='".$namauser."',
			waktu			 	='".$waktu."',
			pls					='".$pls."',
			bagian				='".$bagian."'";

$que2	= mysqli_query($koneksi,"INSERT into master_komputer set ".$input);
if ($que2) {

	 $history =mysqli_query($koneksi,"insert into  historycom_user set nama_komputer='$namakomp',
																	  user='$namauser',
																	  waktu='$waktu',
																	  lokasi='$bagian',
																	  tgl='".$tgl."',
																	  status='input',
																	  user_update='".$nm."'");


	?>
	<script>
		swal({ 
			title: "Berhasil Disimpan!",
			text: "Pengisian Master Komputer Berhasil!",
			timer: 2000,
			type: "success" 
			},
			function(){
				window.location.href = 'form_pc.php';
			});
			
	</script>
<?php
}else {
	?>
	<script>
		swal({ 
			title: "Gagal Disimpan!",
			text: "Pengisian Master Komputer GAGAL!",
			timer: 2000,
			type: "error" 
			},
			function(){
				window.location.href = 'form_pc.php';
			});
			
	</script>
<?php
}
}


?>
</body>