<?php
$id				=$_POST['id'];
$nama_section	=$_POST['section'];
$singkatan 		=$_POST['singkatan'];

//~ echo $id." ".$nama_section." ".$singkatan;

$url			= "master_section.php";

require_once('config.php');

$perintah	=  			"nama_section  				='".$nama_section."',
						 singkatan					='".$singkatan."'";

$syarat 	= " where id='".$id."'";
$update 	= mysqli_query($koneksi,"update section set ".$perintah." ".$syarat);
echo "<input type=hidden value='$url' id=url>";
				?>

					<script type=text/javascript>
						var url = document.getElementById('url').value;
						alert("Section Telah Diupdate");
						window.location = url;
						
					</script>
				<?php

?>

