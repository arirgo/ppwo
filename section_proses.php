<?php 

$nama_section	= $_POST['txtsection'];
$singkatan		= $_POST['txtsingkatan'];
$pls			= $_POST['pls'];
$url			= "master_section.php";

//~ echo "".$username." ".$password." ".$nama." ".$section." ".$singkatan." ".$hakakses." ".$url;

require_once('config.php');
$sqlv = mysqli_query($koneksi,"select * from section where nama_section = '".$nama_section."'");
$val = mysqli_fetch_array($sqlv);
if ($nama_section==$val['nama_section']){
					echo "<input type=hidden value='$url' id=url>";
		?>
					<script type=text/javascript>
						var url = document.getElementById('url').value;
						alert("Nama Section Sudah ada....");
						window.location = url;
						
					</script>
				<?php
	}else{
		
					
		$perintah	=  	"	nama_section		  		='".$nama_section."',
							pls		  					='".$pls."',
						    singkatan		  			='".$singkatan."'";
				
					$simpan = mysqli_query($koneksi,"insert into section set ".$perintah);
					echo "<input type=hidden value='$url' id=url>";	
						?>
							<script type=text/javascript>
								var url = document.getElementById('url').value;
								alert("Section telah tersimpan");
								window.location = url;
							</script>
						<?php



	}						
?>


