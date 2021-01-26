<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->
</head>
<body>
<?php
session_start();
$nm = $_SESSION['nama'];

date_default_timezone_set("Asia/Jakarta");
$tgl		= date("Y-m-d H:i:s");

$namakomp		= strtoupper($_POST['namakomp']);
$namakompawal 	= strtoupper($_POST['namakompawal']);
$namauser 		= $_POST['namapengguna'];
$bagian 		= $_POST['bagian'];
$waktu 			= $_POST['waktu'];
$id 			= $_POST['idkom'];


//echo $namakomp." ".$namauser." ".$bagian;
include "config.php";


$que = mysqli_query($koneksi,"SELECT count(nama_komputer) as val from master_komputer where nama_komputer = '$namakomp'");
$datq = mysqli_fetch_array($que);
$val = strval($datq['val']);



if($namakomp==$namakompawal OR $val==0){
?><?php
$input	= "	nama_komputer		='".$namakomp."',
			nama_pengguna	 	='".$namauser."',
			waktu	 			='".$waktu."',
			tgl_update	 		='".$tgl."',
			user_update	 		='".$nm."',
			bagian				='".$bagian."'";

$que2	= mysqli_query($koneksi,"update master_komputer set $input where id='$id'" );
if ($que2) {

		$history =mysqli_query($koneksi,"insert into  historycom_user set nama_komputer='".$namakomp."',
																	  user		 ='".$namauser."',
																	  waktu		 ='".$waktu."',
																	  lokasi	 ='".$bagian."',
																	  tgl		 ='".$tgl."',
																	  status	 ='update',
																	  user_update='".$nm."'");
		
	?>
	
	<script>
		swal({ 
			title: "Berhasil UPDATE!",
			text: "Pengisian Master Komputer Berhasil!",
			timer: 3000,
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
			title: "Gagal UPDATE!",
			text: "Pengisian Master Komputer GAGAL!",
			timer: 2000,
			type: "error" 
			},
			function(){
				window.location.href = 'form_pc.php';
			});
			
	</script>


<?php





}?>

<?php
}else{?>


<script>
	swal({ 
		title: "Nama Komputer Sudah Ada!",
		text: "Siahkan isi dengan nama komputer lain!!",
		timer: 2000,
		type: "error" 
		},
		function(){
			window.location.href = 'form_pc.php.php';
		});
			
		</script>

<?php }


?>
</body>