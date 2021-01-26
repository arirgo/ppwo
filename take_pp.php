<?php
session_start();
$user = $_SESSION['username'];
 $nopp	=$_POST['txttake'];
 $nama 	=$_POST['txtadmin'];
 $jenispp 	=$_POST['jenispp'];
 $apl        =$_POST['apl'];
 $nmkom        =$_POST['nmkom'];
//~ echo $nopp;
//~ echo $nama;
date_default_timezone_set('Asia/Jakarta');
$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');
$url		= "menu_take_pp.php";

require_once('config.php');
//simpan
// $jenis				=$_POST['txtjenis'];
// $group				=$_POST['group_project'];

// $detail_pekerjaan	=$_POST['txtkerusahan'];

	
		

//simpan ok

// $sqlx 		= mysqli_query($koneksi,"select * from tbl_pp where no_pp ='".$nopp."'");
// $data1		= mysqli_fetch_array($sqlx);

$perintah	=  			"tgl_terima  				='".$tanggal."',
						 jam_terima  				='".$jam."',
						 diterima  					='".$nama."',
						 tgl_m_kerja				='".$tanggal."',
						 jam_m_kerja				='".$jam."',
						 status_pp					='on process',
						 dikerjakan					='".$nama."',
						 jenis_project				='".$jenispp."',
						 komputer					='".$nmkom."',
                         nama_project				='".$apl."'";

$syarat 	= " where no_pp='".$nopp."'";
$update 	= mysqli_query($koneksi,"update tbl_pp set ".$perintah." ".$syarat);

echo "<input type=hidden value='$url' id=url>";
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
						text: "PP dengan nomor : <?php echo $nopp;?> ",
						type: "success" 
					},
					function(){
								window.location.href = 'menu_take_pp.php';
							});
			</script>
</body>


