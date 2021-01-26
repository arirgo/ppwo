<?php 
session_start();
$pls=$_SESSION['pls'];

require_once('config.php');
date_default_timezone_set("Asia/Jakarta");
 $nopp 		= $_POST['txtnopp'];
 $reason 	= $_POST['txtreason'];
 $tanggal	= date('Y-m-d');
 $jam		= date('H:i:s');
$url		= "menu_process_pp.php";
//~ echo $nopp;


//~ echo $button;
require_once('config.php');
		$perintah	=	"tgl_hold	  				='".$tanggal."',
						 jam_hold	  				='".$jam."',
						 status_hold				='".$reason."',
						 status_pp					='hold'";
		
		$syarat 	= " where no_pp='".$nopp."'";
		$update 	= mysqli_query($koneksi,"update tbl_pp set ".$perintah." ".$syarat);

//detailholdpp

$cekhold=mysqli_query($koneksi,"select * from detail_hold_pp where no_pp='$nopp' group by level desc");
$cekdt	=mysqli_fetch_array($cekhold);
 $lv	=$cekdt['level'];

 $level=trim($lv+1);
 
$detail				 =	"tgl_hold	  				='$tanggal',
						 jam_hold	  				='$jam',
						 keterangan					='$reason',
						 no_pp						='$nopp',
						 pls						='$pls',
						 level						='$level'";
		
			$inserthold = mysqli_query($koneksi,"insert into detail_hold_pp set ".$detail);




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
						text: "PP dengan nomor : <?php echo $nopp;?> Status menjadi Hold : <?php echo $reason; ?>",
						type: "success" 
					},
					function(){
								window.location.href = 'menu_process_pp.php';
							});
			</script>
</body>

