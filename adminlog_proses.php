<?php 
$username	= $_POST['txtusername'];
$password 	= $_POST['txtpassword'];


//echo $username."+".$password."+".$section;

require_once('config.php');
$sql = mysqli_query($koneksi,"select * from admin where username='".$username."'");
$data = mysqli_fetch_array($sql);
session_start();
$_SESSION['txtusername'] = $username;
$_SESSION['nama']	= $data['nama'];
/*echo $data['username'];
echo $data['password'];
echo $data['section'];
echo $data['singkatan'];*/

if ($username != $data['username']){
			?>
				<script type=text/javascript>
				alert('Username tidak terdaftar');
				window.location = "admin.php";
				</script>
			<?php
		}
		
		if (($username == $data['username']) && ($password != $data['password'])){
			?>
				<script type=text/javascript>
				alert('Username <?php echo"".$username.""; ?> Password Salah!!!');
				window.location = "admin.php";
				</script>
			<?php
		}
		
		if (($username == $data['username']) && ($password == $data['password'])){
			//echo"<input type=hidden value=$stat id=kode name=kode>";
			?>
				<script type=text/javascript>
				alert('Selamat <?php echo"".$data['username'].""; ?> berhasil Login');
				window.location = "waitinglist.php";
				</script>
				
			<?php

		}
		





?>

