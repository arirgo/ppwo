<?php 
date_default_timezone_set("Asia/Jakarta");
$nowo 		= $_POST['txtnowo'];
$reason		= $_POST['txtreason'];
$tanggal	= date('Y-m-d');
$jam		= date('H:i:s');
$url		= "menu_process_wo.php";
$jenis="WO";


require_once('config.php');
		$perintah	=	"tgl_hold	  				='".$tanggal."',
						 jam_hold	  				='".$jam."',
						 status_hold				='".$reason."',
						 status_wo					='hold'";
		
		$syarat 	= " where no_wo='".$nowo."'";
		$update 	= mysqli_query($koneksi,"update tbl_wo set ".$perintah." ".$syarat);


//batass
//detail_hold
//detailholdpp

$cekhold=mysqli_query($koneksi,"select * from detail_hold_wo where no_wo='$nowo' group by level desc");
$cekdt	=mysqli_fetch_array($cekhold);
 $lv	=$cekdt['level'];

 $level=trim($lv+1);
 
$detail				 =	"tgl_hold	  				='$tanggal',
						 jam_hold	  				='$jam',
						 keterangan					='$reason',
						 no_wo						='$nowo',
						 level						='$level'";
		
	// echo $detail;
		$inserthold = mysqli_query($koneksi,"insert into detail_hold_wo set ".$detail);



//batass
//detail_hold		






		echo "<input type=hidden value='$url' id=url>";
		?>

			<script type=text/javascript>
				var url = document.getElementById('url').value;
				// alert("WO Nomor <?php echo"".$nowo.""; ?> status menjadi HOLD!!\nStatus : <?php echo "".$reason.""; ?>");
				window.location = url;
			</script>
				<?php

	
?>

