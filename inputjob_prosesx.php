<?php
$nopp 			= $_POST['txtnopp'];
$pekerjaan		= $_POST['txtpekerjaan'];
$url		= "main_teknik.php";
//~ echo $nopp." ".$pekerjaan;

require_once('config.php');
$perintah	=			"pekerjaan						='".$pekerjaan."'";
$syarat 	= " where no_pp='".$nopp."'";
$update 	= mysqli_query($koneksi,"update tbl_pp set ".$perintah." ".$syarat);
		echo "<input type=hidden value='$url' id=url>";
?>

			<script type=text/javascript>
				var url = document.getElementById('url').value;
				alert("PP Nomor <?php echo"".$nopp.""; ?> pekerjaan yang di lakukan telah di tambahkan");
				window.location = url;
			</script>
				<?php

?>
