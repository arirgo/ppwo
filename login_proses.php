<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->
</head>
<body>
<?php 

$uname = isset($_GET['uname']) ? $_GET['uname'] : '';
$appid = isset($_GET['appid']) ? $_GET['appid'] : '';



//echo $username."+".$password."+".$section;

require_once('config.php');
if($uname==''||$appid==''){
	$username	= strtolower($_POST['txtusername']);
	$password 	= md5($_POST['txtpassword']);
	$direct		= $_POST['txtdirec'];
	session_start();
	
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	$sql = mysqli_query($koneksi,"select * from user where username='".$username."'");
	$data = mysqli_fetch_array($sql);
	$_SESSION['section'] = $data['section'];
	$_SESSION['level'] = $data['level_user'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['dev'] = $data['dev'];
	$_SESSION['pls'] = $data['pls'];
	
	if ($data['username'] == ""){
			session_destroy();
			?>
				<script>
				swal({ 
						title: "Username tidak terdaftar !!!",
						text: "",
						type: "error" 
					},
					function(){
								window.location.href = 'login.php';
							});
				</script>
			<?php
		}
if (($username == $data['username']) && ($password != $data['password'])){
			?>
				<script type=text/javascript>
				
				window.location = "login.php";
				</script>
			<?php
		}
if (($username == $data['username']) && ($password == $data['password']) && ($data['level_user']=='usr')){
			//echo"<input type=hidden value=$stat id=kode name=kode>";
			?>
				<script type=text/javascript>
				
				window.location = "main_user.php";
				</script>
				
			<?php

		}
if (($username == $data['username']) && ($password == $data['password']) && ($data['level_user']=='sh') && ($direct=='')){
			//echo"<input type=hidden value=$stat id=kode name=kode>";
			
			?>
				<script type=text/javascript>
				
				window.location = "main_user.php";
				</script>
				
			<?php

		}else if (($username == $data['username']) && ($password == $data['password']) && ($data['level_user']=='sh') && ($direct=='app')){
				
			?>
				<script type=text/javascript>
				
				window.location = "app_pp.php";
				</script>
				
			<?php
		}
		
		
if (($username == $data['username']) && ($password == $data['password']) && ($data['level_user']=='tek')){
			//echo"<input type=hidden value=$stat id=kode name=kode>";
			
		?>
				<script type=text/javascript>
				
				window.location = "main_teknik.php";
				</script>
				
			<?php

		}
if (($username == $data['username']) && ($password == $data['password']) && ($data['level_user']=='h_it') && ($direct=='')){
			//echo"<input type=hidden value=$stat id=kode name=kode>";
			
		?>
				<script type=text/javascript>
				
				window.location = "main_section_h_it.php";
				</script>
				
			<?php

		}else if (($username == $data['username']) && ($password == $data['password']) && ($data['level_user']=='h_it') && ($direct=='apphit')){
		
		?>
				<script type=text/javascript>
				
				window.location = "wo_h_it.php";
				</script>
				
			<?php
		}	
		
if (($username == $data['username']) && ($password == $data['password']) && ($data['level_user']=='ho_it') && ($direct=='')){
			//echo"<input type=hidden value=$stat id=kode name=kode>";
			
		?>
				<script type=text/javascript>
				
				window.location = "main_section_h_it.php";
				</script>
				
			<?php

		}else if (($username == $data['username']) && ($password == $data['password']) && ($data['level_user']=='ho_it') && ($direct=='apphit')){
			
		?>
				<script type=text/javascript>
				
				window.location = "wo_h_it.php";
				</script>
				
			<?php
		}			

if (($username == $data['username']) && ($password == $data['password']) && ($data['level_user']=='admin' OR $data['level_user']=='adminho')){
			//echo"<input type=hidden value=$stat id=kode name=kode>";
			
		?>
				<script type=text/javascript>
				
				window.location = "main_admin.php";
				</script>
				
			<?php

		}		
	
}else{
		
	$username	= "";
	$password 	= "";
	$direct		= "";
	session_start();
	$sql = mysqli_query($koneksi,"select * from plums.application where uname='".$uname."' and appid ='".$appid."'");
	$data = mysqli_fetch_array($sql);
	$_SESSION['section'] = $data['bagian'];
	$_SESSION['level'] = $data['level_user'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['username'] = $uname;
	$_SESSION['dev'] = $data['dev'];

	
			if($uname!=""&&$appid!=""){
				if($data['level_user']=='usr'){
					?>
					<script type=text/javascript>
						window.location = "main_user.php";
					</script>
					<?php
				}else if(($data['level_user']=='sh') && ($direct=='')){
					?>
					<script type=text/javascript>
						window.location = "main_user.php";
					</script>
					<?php
				}else if(($data['level_user']=='sh') && ($direct=='app')){
					?>
					<script type=text/javascript>
						window.location = "app_pp.php";
					</script>
					<?php
				}else if(($data['level_user']=='tek')){
					?>
					<script type=text/javascript>
						window.location = "main_teknik.php";
					</script>
					<?php
				}else if(($data['level_user']=='h_it') && ($direct=='')){
					?>
					<script type=text/javascript>
						window.location = "main_section_h_it.php";
					</script>
					<?php
				}else if(($data['level_user']=='h_it') && ($direct=='apphit')){
					?>
					<script type=text/javascript>
						window.location = "wo_h_it.php";
					</script>
					<?php
				}else if(($data['level_user']=='admin')){
					?>
					<script type=text/javascript>
						window.location = "main_admin.php";
					</script>
					<?php
				}else{
					?>
					<script type=text/javascript>
						window.location = "login.php";
					</script>
					<?php
				}
			}else{
				session_destroy();
				?>
					<script>
					swal({ 
							title: "Username tidak terdaftar !!!",
							text: "",
							type: "error" 
						},
						function(){
									window.location.href = 'login.php';
								});
					</script>
				<?php
			}
}

/*echo $data['username'];
echo $data['password'];
echo $data['section'];
echo $data['singkatan'];*/

?>
</body>
