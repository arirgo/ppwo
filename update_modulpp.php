<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->
</head>
<?php
date_default_timezone_set("Asia/Jakarta");

$tgl=date('Y-m-d');
$jam=date('H:i:s');
require_once('config.php');

$status =$_POST['sttgroup'];
$nop    =$_POST['nop'];
$obj    =$_POST['id_modul'];
 echo $url    =$_POST['url'];

if($status=="start")
{
    $st="on procces";
}else{
    $st="finish";
}

// echo "<input type='text' id='url' name='url' value='".$url."'>";
session_start();
$id=$_SESSION['username'];
$us=mysqli_query($koneksi,"select*from user where username='$id'");
$dt=mysqli_fetch_array($us);
$nma=$dt['nama'];


if($st=="on procces"){
$perintah 	= "	status	    ='$st',
                tgl_mulai	='$tgl',
                jam_mulai	='$jam',
				dikerjakan	='$nma'";

                }else{
$perintah 	= "	status	    ='$st',
                jam_selesai	='$jam',
                dikerjakan	='$nma',
                tgl_selesai	='$tgl'";
    
}
$syarat 	= " where objectid='".$obj."' and no_pp='".$nop."'";
$update 	= mysqli_query($koneksi,"update modul_pp set ".$perintah." ".$syarat);

 if($update ){?>

 <!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->

</head>

<body>
     <script type="text/javascript" language="Javascript">
	
		     	swal({ 
						title: "succes",
						text: "berhasil",
						type: "success" 
					},
					function(){
								window.location.href ="<?php echo $url;?>";;
							});
			
		</script>
	</body>	
 <?php } else {?>
 
<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->

</head>

<body>
           <script type="text/javascript" language="Javascript">
	
				swal({ 
						title: "Error",
						text: "Modul Gagal Ditambah",
						type: "error" 
					},
					function(){
								window.location.href ="<?php echo $url;?>";
							});
			
		</script>

</body>	
 <?php }


?>

