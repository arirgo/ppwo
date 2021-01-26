<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->
</head>
<body>
<?php
/*Semua file harus di-include-kan file ini, untuk mengecek sesi apakah sudah login atau belum, kecuali file main.php
  karena digunakan untuk proses login.*/
  include "config.php";
	error_reporting(0);
	if(!isset($_SESSION))
{
session_start();
} 

	//cek user logged in, jika belum login ditampilkan menu login untuk guest 
	if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){ 
		 ?>
		<script type="text/javascript" language="Javascript">
							
							 alert("Anda Belum Login");	
							window.location = "index.php";
							
					</script>
                    <?php
	} 
	session_start();
	$inactive = 2500; // Set timeout period in seconds

if (isset($_SESSION['timeout'])) {
    $session_life = time() - $_SESSION['timeout'];
    if ($session_life > $inactive) {
		$tglsekarang = date("Y-m-d H:i:s");
	$USERNAME=$_SESSION['username'];
  
        session_destroy();
        ?>
		<script type="text/javascript" language="Javascript">
							
								 swal({  
														title: "Session Expired, Anda Harus login lagi!",  
														text: "I will close in 2 seconds.", 
														timer: 2000, 
														type: "error" },
  function(){
    window.location = "index.php";
});
							
					</script>
                    <?php
    }
}
$_SESSION['timeout'] = time();
?>
</body>
