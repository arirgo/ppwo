<?php

?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<script src="sweetalert/sweetalert-dev.js"></script>
<link rel="stylesheet" href="sweetalert/sweetalert.css">
<script>
  $(document).ready(function()
  {
        $("#loading").hide();
  

  });
</script>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - User</title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/colorpicker.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		
		<link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<script src="assets/js/ace-extra.min.js"></script>
		<script src="jquery-1.11.1.min.js"></script> 
		<script src="jquery-1.12.3.js"></script> 
		<link href="css1/bootstrap-table.css" rel="stylesheet">
		
		<style>
            .pilih:hover{
                cursor: pointer;
            }
        </style>
		<style>
            .pilih1:hover{
                cursor: pointer;
            }
        </style>
		<style>
            .pilih2:hover{
                cursor: pointer;
            }
        </style>
		
	</head>
	<body class="no-skin">
<?php include "menu-atas.php"; ?>
<?php include "menu-kiri.php"; ?>
<?php //include "menu-kiriadmin.php"; ?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
						<a href="#">Home</a>
					</li>
				
			</ul><!-- /.breadcrumb -->

					</div>

					
					<div class="page-content">
						<div class="page-header">
							<h1>
								Ganti Password
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Form ganti password
								</small>
							</h1>
						</div><!-- /.page-header -->
						<form name="f_cp" action="change_pwd.php" method="POST" class="form-horizontal" role="form" onsubmit='return kosong();'>	
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Username</label>
								<div class="col-sm-9">
									<input type="text" id="txtpelapor" name="txtpelapor" value="<?php echo $_SESSION['username'];?>" class="col-xs-6 col-sm-5" readonly />
									<label style='margin-left: 5px;' id=pesan1></label>
								</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Password Lama</label>
								<div class="col-sm-9">
									<input type="password" class="span6 typeahead" id="nama"  data-provide="typeahead" name ="passwordlama" required />
									<label style='margin-left: 5px;' id=pesan1></label>
								</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Password Baru</label>
								<div class="col-sm-9">
									<input type="password" class="span4 typeahead" id="Nik"  data-provide="typeahead" name ="pass" required />
									<label style='margin-left: 5px;' id=pesan1></label>
								</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Konfirmasi Password</label>
								<div class="col-sm-9">
									<input type="password" class="span4 typeahead" id="jabatan"  data-provide="typeahead" name ="pass2" required>
								<label class="checkbox inline">
								<input type="checkbox" class="span4 typeahead" id="tampil"  data-provide="typeahead" name ="tampil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Show Password
							 </div>
						</div>	
						
							<div class="form-actions">
							<center>
							  <button type="submit" class="btn btn-primary" name = "ganti" onclick = "return confirm ('Apakah data sudah benar?')">Proses</button>
							  <button type="reset" class="btn">Bersih</button>
							</center>
							</div>
						</form>  
				
									
					</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->
<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>

<?php include "menu-bawah.php"; ?>
		<script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>
		<script>
							$(function(){
							$("#tampil").click(function(){ // #showPass -> id Checkbox
							if($("[name=pass2]").attr('type')=='password'){
							$("[name=pass2]").attr('type','text');
							}else{
							$("[name=pass2]").attr('type','password');
							}
							
							if($("[name=pass]").attr('type')=='password'){
							$("[name=pass]").attr('type','text');
							}else{
							$("[name=pass]").attr('type','password');
							}
							
							if($("[name=passwordlama]").attr('type')=='password'){
							$("[name=passwordlama]").attr('type','text');
							}else{
							$("[name=passwordlama]").attr('type','password');
							}
							});
							}); // indonesiakode.blogspot.com
							</script>
		
		
	
</body>
</html>
<?php
require_once "config.php";
if(isset($_POST['ganti'])){
$passwordlama = $_POST['passwordlama'];
$cekuser = "select * from user where username ='".$_SESSION['username']."' and password = '".md5($passwordlama)."'";
$querycekuser = mysqli_query($koneksi,$cekuser);
$count = mysqli_num_rows($querycekuser);
        if ($count >= 1){
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
        $updatepassword = "update user";
        if(!empty($pass) && !empty($pass2)){
        if($pass == $pass2){
        $updatepassword .= " set password='".md5($pass)."'";
        } else {  ?>
        <script type="text/javascript" language="Javascript">
                                alert("Password dan confirm password harus sama!");
                            window.location = "change_pwd.php";
                    </script>
                    <?php
        }
    }
        $updatepassword .= " where username = '".$_SESSION['username']."'";
        $updatequery = mysqli_query($koneksi,$updatepassword);
                    if($updatequery){
                        ?>
                        <script type="text/javascript" language="Javascript">
                           alert("Password Sudah Update! Silakan Login kembali untuk Verifikasi :)")
                            window.location = "logout.php";
                        </script>
                        <?php
                            } else { ?>
                        <script type="text/javascript" language="Javascript">
                        alert("Password belum Terganti!");
                        </script>
                        <?php    }

        } else { ?>
        <script type="text/javascript" language="Javascript">
            alert("Password LAMA SALAH!");
        </script>
        <?php    }
}
else
{ }?>
