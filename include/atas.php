
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>PREPARATION RACK</title>
 <link rel="shortcut icon" href="img/logopl.png" type="image/x-icon" />	
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<script>
window.history.forward(1);
</script> 

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<!-- page specific plugin styles -->

		<!-- text fonts -->
		 <script src="sweetalert/sweetalert-dev.js"></script>
<link rel="stylesheet" href="sweetalert/sweetalert.css">

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		
    <style>

		.preload-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
    background-color:#000;opacity:0.4;filter:alpha(opacity=40);
}
#preloader_7 {
    display: block;
    position: relative;
    left: 50%;
    top: 50%;
    width: 150px;
    height: 150px;
    margin: -75px 0 0 -75px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #3498db;

    -webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */

    z-index: 1001;
}

    #preloader_7:before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #e74c3c;

        -webkit-animation: spin 3s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 3s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }

    #preloader_7:after {
        content: "";
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #f9c922;

        -webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
          animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }

    @-webkit-keyframes spin {
        0%   { 
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }
    @keyframes spin {
        0%   { 
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }

	</style>
	</head>

	<body class="no-skin" onLoad="document.myForm.barcode1.focus()">
		<?php 
include_once 'ceksesi.php'; ?>	   
 <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
	   <script type="text/javascript">
$(window).load(function() { $(".preload-wrapper").fadeOut("slow"); })
</script>
<script type="text/javascript">
	
$(window).load(function() { $(".preload-wrapper").fadeOut("slow"); })

	</script>
<div class="preload-wrapper">
    <div id="preloader_7"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
	
</div>	
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-desktop" ></i>
							PREPARATION RACK 
						</small>
						
					</a>
				</div>
<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							

						</small>
						
					</a>
				</div>
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					
					<ul class="nav ace-nav">
						<?php
                    if(substr($_SESSION['level_user'],2,1)==1)
					{			
			?>	  
						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								
								 <?php include "koneksi.php";
	$sql = "SELECT count( nospkb ) AS nospkb FROM detailspkb WHERE STATUS = ''";
		$result=mysqli_query($koneksi,$sql);
	
		while($data = mysqli_fetch_array($result)){
		if($data['nospkb']==0) {?> 
			<i class="ace-icon fa fa-bell "></i>
			 <span class="badge badge-important"></span><?php } else { ?> 
				 <i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important"><?php echo $data['nospkb'];?></span> <?php } ?> 
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									<?php echo $data['nospkb'];?> Data yang belum di Update
								</li>
<?php  }?>
								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<table cellspacing=3>
                       <?php $sql2 = "SELECT distinct nospkb FROM detailspkb WHERE STATUS = ''";
		$result2=mysqli_query($koneksi,$sql2);
			$no=1;
		while($data2 = mysqli_fetch_array($result2)){?>
			<tr><td><?php echo $no; ?>.) &nbsp;</td>			
			<td><?php echo "<a href=detailspkbcomplete.php?nospkb=".$data2['nospkb'].">"; ?><?php echo $data2['nospkb'];?></td>
			</tr>
			
                            <?php $no++; } ?>
                            </table>
										</li>

									

									
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										
									</a>
								</li>
							</ul>
						</li>
<?php } else {} ?>
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION['nama'];?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							

								<li>
									<a href="gantipassword.php">
										<i class="ace-icon fa fa-lock"></i>
										Change Password
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a id="logout" >
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
									<script type="text/javascript">
	$(document).ready(function(){
		
		 $("#logout").click(function(){		

 swal({
    title: "Apakah Anda Yakin akan keluar?",
    text: "",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'YA!',
    cancelButtonText: "TIDAK!",
    closeOnConfirm: false,
    closeOnCancel: false
 },
 function(isConfirm){

   if (isConfirm){
      swal("ANDA KELUAR APLIKASI!", "", "success");
	window.location.href="logout.php";
    } else {
      swal("BATAL", ":)", "error");
    }
 });
		});
	});
			 </script>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						
						<button class="btn btn-danger">
							<i class="ace-icon fa fa-print"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active">
						<a href="home.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
<li>
						<a href="viewrak.php" target="blank">
					<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> VIEW RAK </span>
						</a>

						<b class="arrow"></b>
					</li>
					
				
				
							  <?php
                    if(substr($_SESSION['level_user'],1,1)==1)
					{			
			?>	  
							<li class="">
								<a href="inputpallet.php" onclick="viewdata();">
									<i class="menu-icon fa fa-pencil-square-o"></i>							
									<span class="menu-text"> Input Pallet </span>
								</a>

								<b class="arrow"></b>
							</li>
							<?php	} else {}?>
								  <?php
                    if(substr($_SESSION['level_user'],0,1)==1)
					{			
			?>	  
							<li class="">
								<a href="isirakmanual.php" onclick="viewdata();">
									<i class="menu-icon fa fa-pencil-square-o"></i>							
									<span class="menu-text"> Input Pallet Manual</span>
								</a>

								<b class="arrow"></b>
							</li>
							<?php	} else {}?>
							  <?php
                    if(substr($_SESSION['level_user'],2,1)==1)
					{			
			?>	  
							<li class="">
								<a href="outpallet.php">
									<i class="menu-icon fa fa-pencil-square-o"></i>
									<span class="menu-text"> Out Pallet </span>
								</a>

								<b class="arrow"></b>
							</li>
<?php	} else {}?>
	 <?php
                    if(substr($_SESSION['level_user'],2,1)==1)
					{			
			?>	  
							<li class="">
								<a href="batalkirim.php">
									<i class="menu-icon fa fa-pencil-square-o"></i>
									<span class="menu-text"> Batal Kirim </span>
								</a>

								<b class="arrow"></b>
							</li>
<?php	} else {}?>
 <?php
                    if(substr($_SESSION['level_user'],4,1)==1)
					{			
			?>	  
<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Report </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							  <?php
                    if(substr($_SESSION['level_user'],0,1)==1)
					{			
			?>	  
							<li class="">
								<a href="datauser.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Data User
								</a>

								<b class="arrow"></b>
							</li>
							<?php	} else {}?>
							<li class="">
								<a href="datainventory.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Data inventory
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="caritransoperator.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Racking By Operator
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="datahistoryinput.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Data History Input Pallet
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="datahistoryoutpallet.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Data History Out Pallet
								</a>

								<b class="arrow"></b>
							</li>
								<li class="">
								<a href="cariopname.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Opname
								</a>

								<b class="arrow"></b>
							</li>
								<li class="">
								<a href="stocktotallogistic.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Stock Total Logistik
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
							<?php	} else {}?>	 

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
													

<b accesskey="9" id="date-container" ></b>
<script>
function showDateTo(elemID) {

    var date = new Date();
    var second = date.getSeconds();
    var minute = date.getMinutes();
    var hour = date.getHours();
    var day = date.getDay();
    var dayMonth = date.getDate();
    var month = date.getMonth();
    var year = date.getYear();

    var dayArray = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum&#39;at", "Sabtu"];
    var monthArray = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    // Menambahkan angka nol di depan jika nilai kurang dari 10
    if (second < 10) second = '0' + second;
    if (minute < 10) minute = '0' + minute;
    if (hour < 10) hour = '0' + hour;
    if (dayMonth < 10) dayMonth = '0' + dayMonth;

    if (year < 1000) year += 1900;

    document.getElementById(elemID).innerHTML = dayArray[day] + ', ' + dayMonth + ' ' + monthArray[month] + ' ' + year + ' ' + hour + ':' + minute + ':' + second;

}

// Masukkan ke kontainer!
// Pakai interval 1 detik sekali untuk efek animasi jam
// (tanpa interval masih tetap bisa bekerja, tapi tidak akan ada efek animasi)
setInterval(function() {
    showDateTo('date-container');
}, 1000);
</script>	
							<li class="active"></li>
						</ul><!-- /.breadcrumb -->
					
						<div class="nav-search" id="nav-search">
						
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<?php
                    if($_SESSION['level_user']==111111)
					{			
			?>	  <div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container --><?php	} else {}?>
