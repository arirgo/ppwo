

<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->

</head>
<?php
require_once("config.php");
date_default_timezone_set("Asia/Jakarta");
session_start();
 $nm=$_SESSION['nama'];
 $no_wo=$_POST['txtwo'];
 $id_modul=$_POST['id_modul'];
 $url      =$_POST['url'];

 $sttgroup=$_POST['sttgroup'];
 $tglskrg=date('Y-m-d');
 $jm=date('H:i:s');

if($sttgroup=="start")
{
    $updt=mysqli_query($koneksi,"update detail_project set status='on procces',tgl_m_kerja='$tglskrg',jam_m_kerja='$jm',username='$nm'  where no_project='$no_wo' and objectid='$id_modul'");

		
}
else if($sttgroup=="hold")
{
$updt=mysqli_query($koneksi,"update detail_project set status='hold',tgl_hold='$tglskrg',jam_hold='$jm',username='$nm'  where no_project='$no_wo' and objectid='$id_modul'");
}else if($sttgroup=="release"){
    $updt=mysqli_query($koneksi,"update detail_project set status='release',tgl_release='$tglskrg',jam_release='$jm',username='$nm'  where no_project='$no_wo' and objectid='$id_modul'");
}else{
    $updt=mysqli_query($koneksi,"update detail_project set status='finish',tgl_s_kerja='$tglskrg',jam_s_kerja='$jm',username='$nm'  where no_project='$no_wo' and objectid='$id_modul'");
}
?>



<body>
			

<script type="text/javascript" language="Javascript">
							
								 swal({  
														title: "Update modul!",  
														text: "I will close in 2 seconds.", 
														timer: 2000, 
														type: "success" },
  function(){
   
    window.location = "<?php echo $url;?>";
});
							
					</script>
					</body>