<?php 

$username		= $_POST['txtusername'];
$password		= $_POST['txtpassword'];
$nama			= $_POST['txtnama'];
$section		= $_POST['section'];
$singkatan		= $_POST['skt'];
$hakakses		= $_POST['combo_hakakses'];
$email			= $_POST['txtemail'];
$pls			= $_POST['pls'];
$url			= "master_user.php";
if($hakakses=="tek")
{
	$dev="inf";
	$aktif="1";
}else if($hakakses=="pro"){
	$dev="pro";
	$aktif="1";
}else{$dev="";
$aktif="0";}
//~ echo "".$username." ".$password." ".$nama." ".$section." ".$singkatan." ".$hakakses." ".$url;

require_once('config.php');
$sqlv = mysqli_query($koneksi,"select * from user where username = '".$username."'");
$val = mysqli_fetch_array($sqlv);
if ($username==$val['username']){
					echo "<input type=hidden value='$url' id=url>";
		?>
					<script type=text/javascript>
						var url = document.getElementById('url').value;
						alert("Username Sudah ada....");
						window.location = url;
						
					</script>
				<?php
	}else{
						
		$perintah	=  	"username					='".$username."',
						 password		  			='".md5($password)."',
						 nama		  				='".$nama."',
						 section	  				='".$section."',
						 singkatan  				='".$singkatan."',
						 level_user  				='".$hakakses."',
						 pls		  				='".$pls."',
						 dev		  				='".$dev."',
						 aktif		  				='".$aktif."',
						 email		  				='".$email."'";
				
					$simpan = mysqli_query($koneksi,"insert into user set ".$perintah);
					echo "<input type=hidden value='$url' id=url>";	
						?>
							<script type=text/javascript>
								var url = document.getElementById('url').value;
								alert("Username telah tersimpan");
								window.location = url;
							</script>
						<?php



	}						
?>

