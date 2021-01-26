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
		<title>Input</title>

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
		<script type="text/javascript" src="jquery-2.1.3.min.js"></script>
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
	<body class="no-skin" onload="hide();">
<?php include "menu-atas.php"; ?>
<?php //include "menu-kiri.php"; ?>
<?php //include "menu-kiriadmin.php"; ?>
<div class="main-content">
	<div class="main-content-inner">
		
		<?php
$nopp = $_GET['kode'];
//~ echo $nopp;
$tanggal		= date('Y-m-d');
$jam			= date('H:i');
$url			= "main_teknik.php";
require_once("config.php");

session_start();
$userlog=$_SESSION['username'];
$ceklog=mysqli_query($koneksi,"select*from user where username='$userlog'");
$dtlog=mysqli_fetch_array($ceklog);
 $dev=$dtlog['dev'];

$sqla = mysqli_query($koneksi,"select * from tbl_pp where no_pp ='".$nopp."'");
$data = mysqli_fetch_array($sqla);
		?>	

		<div class="page-content">
			<div class="page-header">
				<h1>
				PP Online 
				<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Finish Process
				</small>
				</h1>
			</div><!-- /.page-header -->
							
				
	<div class="panel panel-default">
		<div class="panel-body">
		<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
<?php if($dev=="inf"){?>
	<form name="fmbrg_klr" id="fmbrg_klr"  method="POST" class="form-horizontal" role="form" >
									
								
<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor PP</label>
				<div class="col-sm-9">
					<input type="text"  name="project" id="project" class="col-xs-5 col-sm-3" value="<?php echo ''.$nopp.''; ?>" readonly />
				</div>
		</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jenis Barang</label>

										<div class="col-sm-9">
											 <select name="cb_brg" id="cb_brg" >
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['id'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['id'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['id'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['id'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
					?>
				</select>
                
											<label style='margin-left: 5px;' id=pesan1></label>
										</div>
									</div>

                                    	<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Barang</label>
                                             
										<div class="col-sm-9">
											
											<select name="nmbrgklr" id="nmbrgklr">
													<option value="">-PILIH NAMA BARANG-</option>
											</select>
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jumlah</label>

										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-3" name="jmlbrgklr" id="jmlbrgklr"   onkeypress="return hanyaAngka(event)">
										</div>
									</div>
                                    

                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">User input</label>

										<div class="col-sm-9">
											<input type="text"  name="userinputklr" id="userinputklr" value="<?php echo $_SESSION['nama'];?>" class="col-xs-10 col-sm-5" readonly />
											<label style='margin-left: 5px;' id=pesan1></label>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal Keluar</label>


										<div class="col-sm-9">
											<input type="text"  class="col-xs-10 col-sm-3 date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklr"  id="tglklr" value="<?php echo $tgl;?>" >
											
                                                <i class="col-xs-10 col-sm-1  fa fa-calendar bigger-110"></i>
                                         
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kterangan</label>

										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-3" name="ketklr" id="ketklr">
										</div>
									</div>
								<center>
									<table>
										<tr>
											<td>
												<!-- <div id="loadproses">
													<p><img src="loader.gif" /> Loading...</p>
												</div> -->
												<button class="btn btn-info" type="button"  id="simpanklr">
												<i class="ace-icon fa fa-check bigger-110"></i>
												SIMPAN BARANG KELUAR
											</button>
												&nbsp; 
												<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
											 
											</td>
										</tr>
									</table>
								</center>
								</div>
								</form>
					<?php }else{}?>
<br>
<br>
<hr style="width:100%;color:purpel;height:29;">
	<form name="f_finish" action="inputjob_proses.php" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor PP</label>
				<div class="col-sm-9">
					<input type="text"  name="txtnopp" class="col-xs-5 col-sm-3" value="<?php echo ''.$nopp.''; ?>" readonly />
				</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Permasalahan</label>
				<div class="col-sm-9">
					<textarea rows="3" cols="35 " id="txtmasalah" class="col" name="txtpermasalahan" readonly><?php echo $data['kerusakan'];?></textarea>
					<label style='margin-left: 5px;' id=pesan2></label>
				</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Komputer</label>
				<div class="col-sm-9">
					<select name="kom" id="kom" class="select2">
						<option value="">--Pilih--</option>
					<?php
					require_once("config.php");
						$cekkom	=	mysqli_query($koneksi,"select * from master_komputer");
					 while($datakom	=	mysqli_fetch_array($cekkom))
					 {
						echo	'<option value="'.$datakom['nama_komputer'].'">&nbsp;&nbsp;'.$datakom['nama_komputer'].'&nbsp;('.$datakom['bagian'].')</option>';
					 }
						?>
					</select>
				</div>
		</div>


		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pekerjaan Yang Dilakukan</label>
				<div class="col-sm-9">
<!--
					<a href="#" onclick="addMoreRows(this.form);" class="btn btn-white btn-primary">Tambah<i class="menu-icon fa fa-plus green"></i></a>
-->
					<a href="#" id="btn_tambah" onclick="show(this.form);" class="btn btn-white btn-primary">Tambah<i class="menu-icon fa fa-plus green"></i></a>
				</div>
		</div>
		<div class="form-group" id="hide1">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[1]" id="cb_brg1">
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				<!-- <select name="nmbrg[1]" id="nmbrg1">
				<option value="">--Nama Barang--</option>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="stok[1]" size="5" id="stok1"placeholder="Stok" readonly>
				&nbsp;
				<input type="text" name="txtjml[1]" size="5" id="jml1" placeholder="Jumlah" onkeypress="return hanyaAngka(event)">
				&nbsp;&nbsp;-->
				<input type="text" name="txtdes[1]" size="30">
				
				&nbsp;&nbsp;
				<!-- <input type="text" id="tgl[1]" size="10" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklr[1]" value="<?php echo date('Y-m-d');?>" >
				&nbsp;&nbsp; -->
				
				<a href="#" onclick="remove(1)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide2">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[2]" id="cb_brg2">
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
<!-- 			
				<select name="nmbrg[2]" id="nmbrg2">
				<option value="">--Nama Barang--</option>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="stok[2]" size="5" id="stok2"placeholder="Stok" readonly>
				&nbsp;
				<input type="text" name="txtjml[2]" size="5" id="jml2"placeholder="Jumlah" onkeypress="return hanyaAngka(event)">
				&nbsp;&nbsp;-->
			
				<input type="text" name="txtdes[2]" size="30"> 
				&nbsp;&nbsp; 
				<!-- <input type="text" id="tgl[2]" size="10" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklr[2]" value="<?php echo date('Y-m-d');?>" >
				&nbsp;&nbsp;
				&nbsp;&nbsp; -->
				<a href="#" onclick="remove(2)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide3">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[3]" id="cb_brg3">
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				
				<!-- <select name="nmbrg[3]" id="nmbrg3">
				<option value="">--Nama Barang--</option>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="stok[3]" size="5" id="stok3"placeholder="Stok" readonly>
				&nbsp;
				<input type="text" name="txtjml[3]" size="5" id="jml3"placeholder="Jumlah" onkeypress="return hanyaAngka(event)">
				&nbsp;&nbsp;-->
				<input type="text" name="txtdes[3]" size="30">
				&nbsp;&nbsp;
				<!-- <input type="text" id="tgl[3]" size="10" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklr[3]" value="<?php echo date('Y-m-d');?>" >
				&nbsp;&nbsp;
				&nbsp;&nbsp; -->
				<a href="#" onclick="remove(3)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide4">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[4]" id="cb_brg4">
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				
				<!-- <select name="nmbrg[4]" id="nmbrg4">
				<option value="">--Nama Barang--</option>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="stok[4]" size="5" id="stok4" placeholder="Stok" readonly>
				&nbsp;
				<input type="text" name="txtjml[4]" size="5" id="jml4"placeholder="Jumlah" onkeypress="return hanyaAngka(event)">
				&nbsp;&nbsp; -->
				<input type="text" name="txtdes[4]" size="30">
				&nbsp;&nbsp;
				<!-- <input type="text" id="tgl[4]" size="10" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklr[4]" value="<?php echo date('Y-m-d');?>" >
				&nbsp;&nbsp;
				&nbsp;&nbsp; -->
				<a href="#" onclick="remove(4)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide5">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[5]" id="cb_brg5">
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
			
				<!-- <select name="nmbrg[5]" id="nmbrg5">
				<option value="">--Nama Barang--</option>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="stok[5]" size="5" id="stok5"placeholder="Stok" readonly>
				&nbsp;
				<input type="text" name="txtjml[5]" size="5" id="jml5" placeholder="Jumlah" onkeypress="return hanyaAngka(event)">
				&nbsp;&nbsp;-->
				<input type="text" name="txtdes[5]" size="30">
				&nbsp;&nbsp;
				<!-- <input type="text" id="tgl[5]" size="10" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklr[5]" value="<?php echo date('Y-m-d');?>" >
				&nbsp;&nbsp;
				&nbsp;&nbsp; -->
				<a href="#" onclick="remove(5)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide6">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[6]" id="cb_brg6">
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				
				<!-- <select name="nmbrg[6]" id="nmbrg6">
				<option value="">--Nama Barang--</option>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="stok[6]" size="5" id="stok6"placeholder="Stok" readonly>
				&nbsp;
				<input type="text" name="txtjml[6]" size="5" id="jml6" placeholder="Jumlah" onkeypress="return hanyaAngka(event)">
				&nbsp;&nbsp; -->
				<input type="text" name="txtdes[6]" size="30">
				<!-- &nbsp;&nbsp;
				<input type="text" id="tgl[6]" size="10" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklr[6]" value="<?php echo date('Y-m-d');?>" >
				&nbsp;&nbsp; -->
				&nbsp;&nbsp;
				<a href="#" onclick="remove(6)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide7">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[7]" id="cb_brg7">
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
			
				<!-- <select name="nmbrg[7]" id="nmbrg7">
				<option value="">--Nama Barang--</option>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="stok[7]" size="5" id="stok7" placeholder="Stok" readonly>
				&nbsp;
				<input type="text" name="txtjml[7]" size="5" id="jml7" placeholder="Jumlah" onkeypress="return hanyaAngka(event)">
				&nbsp;&nbsp; -->
				<input type="text" name="txtdes[7]" size="30">
				<!-- &nbsp;&nbsp;
				<input type="text" id="tgl[7]" size="10" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklr[7]" value="<?php echo date('Y-m-d');?>" >
				&nbsp;&nbsp; -->
				&nbsp;&nbsp;
				<a href="#" onclick="remove(7)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide8">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[8]" id="cb_brg8">
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				
				<!-- <select name="nmbrg[8]" id="nmbrg8">
				<option value="">--Nama Barang--</option>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="stok[8]" size="5" id="stok8" placeholder="Stok" readonly>
				&nbsp;
				<input type="text" name="txtjml[8]" size="5" id="jml8"placeholder="Jumlah" onkeypress="return hanyaAngka(event)">
				&nbsp;&nbsp; -->
				<input type="text" name="txtdes[8]" size="30">
				&nbsp;&nbsp; 
				<!-- <input type="text" id="tgl[8]" size="10" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklr[8]" value="<?php echo date('Y-m-d');?>" >
				&nbsp;&nbsp;
				&nbsp;&nbsp; -->
				<a href="#" onclick="remove(8)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide9">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[9]" id="cb_brg9">
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
			
				<!-- <select name="nmbrg[9]" id="nmbrg9">
				<option value="">--Nama Barang--</option>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="stok[9]" size="5" id="stok9" placeholder="Stok" readonly>
				&nbsp;
				<input type="text" name="txtjml[9]" size="5" id="jml9" placeholder="Jumlah" onkeypress="return hanyaAngka(event)">
				&nbsp;&nbsp; -->
				<input type="text" name="txtdes[9]" size="30">
				<!-- &nbsp;&nbsp; 
				<input type="text" id="tgl[9]" size="10" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklr[9]" value="<?php echo date('Y-m-d');?>" >
				&nbsp;&nbsp;
				&nbsp;&nbsp; -->
				<a href="#" onclick="remove(9)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide10">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[10]" id="cb_brg10">
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				
				<!-- <select name="nmbrg[10]" id="nmbrg10">
				<option value="">--Nama Barang--</option>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="stok[10]" size="5" id="stok10" placeholder="Stok" readonly>
				&nbsp;
				<input type="text" name="txtjml[10]" size="5" id="jml10" placeholder="Jumlah" onkeypress="return hanyaAngka(event)">
				&nbsp;&nbsp; -->
				<input type="text" name="txtdes[10]" size="30">
				&nbsp;&nbsp;
				<!-- <input type="text" id="tgl[10]" size="10" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklr[10]" value="<?php echo date('Y-m-d');?>" >
				&nbsp;&nbsp;
				&nbsp;&nbsp; -->
				<a href="#" onclick="remove(10)">Delete</a>
			</div>
		</div>
		
	
		
		<div id="addedRows"></div>
		<input type="hidden" name="n" id="hasil" value="">
		<input type="hidden" name="angka" id="angka">
		
		<center>
		<table>
			
			<tr>
			    <td>
					<button class="btn btn-info" type="submit" id="cektombol">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Finish
					</button>
					&nbsp; 
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>
				</td>
			</tr>
		</table>
		</center>
	</form>
</div>
</div>
		</div>
	</div>
</div>							

<?php include "menu-bawah.php"; ?>
		<!-- <script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script> -->

		<script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>
	

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.bootstrap-duallistbox.min.js"></script>
		<script src="assets/js/jquery.raty.min.js"></script>
		<script src="assets/js/bootstrap-multiselect.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/typeahead.jquery.min.js"></script>

		<!-- ace scripts -->
	
	
	<!--
				<td><a href = "javascript:  window.open('s_a_table.php?n=<?php //echo $dataq['status_pp']; ?>', 'winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500');" class = "btn btn-primary">Complete</a></td>
-->
	
		
		<script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('formpp_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
            
            $(document).on('click','.edit-record2',function(e){
				window.open('s_a_table.php?n=complete',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
        });
        
    </script>
<link rel="stylesheet" href="jquery-ui-1.9.2.css" />
<script src="jquery-1.8.3.js"></script>
<script src="jquery-ui-1.9.2.js"></script>
<script type="text/javascript">
		function hide(){
			document.getElementById('hide1').style.display='none';
			document.getElementById('hide2').style.display='none';
			document.getElementById('hide3').style.display='none';
			document.getElementById('hide4').style.display='none';
			document.getElementById('hide5').style.display='none';
			document.getElementById('hide6').style.display='none';
			document.getElementById('hide7').style.display='none';
			document.getElementById('hide8').style.display='none';
			document.getElementById('hide9').style.display='none';
			document.getElementById('hide10').style.display='none';
			
			}
		var rowCount = 0;
		var num	= 0;
		function addMoreRows(frm) {
			rowCount ++;
			var recRow = '<div class="form-group" id="rowCount'+rowCount+'"><input type="hidden" name="kd_brg'+rowCount+'" id="kd_brg'+rowCount+'"><a href="javascript:void(0);" onclick="removeRow('+rowCount+');">Delete</a></div></div>';
			jQuery('#addedRows').append(recRow);
			document.getElementById('hasil').value = rowCount;
		}
		
		function show(frm) {
			if (num==0) {
				document.getElementById('hide1').style.display='block';
				num++;
				}else if ((num>=1)&&(num<=9)){
					num++;
					document.getElementById('hide'+num).style.display='block';
					
					}else if (num==10) {
						document.getElementById('hide10').style.display='block';
						}else {
							document.getElementById('btn_tambah').disabled= true;
							}
							document.getElementById('angka').value=num;
				//~ 
			//~ num ++;
			//~ document.getElementById('hide'+num).style.display='block';
			//~ document.getElementById('angka').value=num;
			//~ if ((num>=0)&&(num<=10)){
				//~ document.getElementById('btn_tambah').disabled= false;
				//~ } else {
					//~ document.getElementById('btn_tambah').disabled= true;
					//~ }
			}
		
		function remove(a){
			num = num - 1;
			document.getElementById('hide'+a).style.display='none';
			document.getElementById('angka').value=num;
			}
		
		function removeRow(removeNum) {
			jQuery('#rowCount'+removeNum).remove();

		}
		
		
	</script>	
</body>
</html>


<script>
function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>


	
<script type="text/javascript">
	
		//alert(i);
	 
		$('select[id="cb_brg1"]').change(function() {	
			id_brg 	=$(this).val();
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                        
                        $('#nmbrg1').html(stok);
						  
                    }
                });

		}); 
		$('select[id="nmbrg1"]').change(function() {	
			nmbrg 	=$(this).val();
			
            $.ajax({
                    type:'POST',
                    url:'cek_stok2.php',
                    data:'nmbrg='+nmbrg,
                    success:function(jmlstok){
                        $('#stok1').val(jmlstok);
						  
                    }
                });

		}); 
			

		////////////2
		$('select[id="cb_brg2"]').change(function() {	
			id_brg 	=$(this).val();
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                        
                        $('#nmbrg2').html(stok);
                    }
                });

		}); 
			$('select[id="nmbrg2"]').change(function() {	
			nmbrg 	=$(this).val();
			
            $.ajax({
                    type:'POST',
                    url:'cek_stok2.php',
                    data:'nmbrg='+nmbrg,
                    success:function(jmlstok){
                        $('#stok2').val(jmlstok);
						  
                    }
                });

		}); 
//3
		$('select[id="cb_brg3"]').change(function() {	
			id_brg 	=$(this).val();
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                        
                        $('#nmbrg3').html(stok);
                    }
                });

		}); 
			$('select[id="nmbrg3"]').change(function() {	
			nmbrg 	=$(this).val();
			
            $.ajax({
                    type:'POST',
                    url:'cek_stok2.php',
                    data:'nmbrg='+nmbrg,
                    success:function(jmlstok){
                        $('#stok3').val(jmlstok);
						  
                    }
                });

		}); 
//4
		
		$('select[id="cb_brg4"]').change(function() {	
			id_brg 	=$(this).val();
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                        
                        $('#nmbrg4').html(stok);
                    }
                });

		}); 
			$('select[id="nmbrg4"]').change(function() {	
			nmbrg 	=$(this).val();
			
            $.ajax({
                    type:'POST',
                    url:'cek_stok2.php',
                    data:'nmbrg='+nmbrg,
                    success:function(jmlstok){
                        $('#stok4').val(jmlstok);
						  
                    }
                });

		}); 
//5
		$('select[id="cb_brg5"]').change(function() {	
			id_brg 	=$(this).val();
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                        
                        $('#nmbrg5').html(stok);
                    }
                });

		}); 

			$('select[id="nmbrg5"]').change(function() {	
			nmbrg 	=$(this).val();
			
            $.ajax({
                    type:'POST',
                    url:'cek_stok2.php',
                    data:'nmbrg='+nmbrg,
                    success:function(jmlstok){
                        $('#stok5').val(jmlstok);
						  
                    }
                });

		}); 
//6

		$('select[id="cb_brg6"]').change(function() {	
			id_brg 	=$(this).val();
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                        
                        $('#nmbrg6').html(stok);
                    }
                });

		}); 
			$('select[id="nmbrg6"]').change(function() {	
			nmbrg 	=$(this).val();
			
            $.ajax({
                    type:'POST',
                    url:'cek_stok2.php',
                    data:'nmbrg='+nmbrg,
                    success:function(jmlstok){
                        $('#stok6').val(jmlstok);
						  
                    }
                });

		}); 
//7
		$('select[id="cb_brg7"]').change(function() {	
			id_brg 	=$(this).val();
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                        
                        $('#nmbrg7').html(stok);
                    }
                });

		}); 
			$('select[id="nmbrg7"]').change(function() {	
			nmbrg 	=$(this).val();
			
            $.ajax({
                    type:'POST',
                    url:'cek_stok2.php',
                    data:'nmbrg='+nmbrg,
                    success:function(jmlstok){
                        $('#stok7').val(jmlstok);
						  
                    }
                });

		}); 
//8

		$('select[id="cb_brg8"]').change(function() {	
			id_brg 	=$(this).val();
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                        
                        $('#nmbrg8').html(stok);
                    }
                });

		}); 
			$('select[id="nmbrg8"]').change(function() {	
			nmbrg 	=$(this).val();
			
            $.ajax({
                    type:'POST',
                    url:'cek_stok2.php',
                    data:'nmbrg='+nmbrg,
                    success:function(jmlstok){
                        $('#stok8').val(jmlstok);
						  
                    }
                });

		});
//9 
		$('select[id="cb_brg9"]').change(function() {	
			id_brg 	=$(this).val();
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                        
                        $('#nmbrg9').html(stok);
                    }
                });

		}); 
			$('select[id="nmbrg9"]').change(function() {	
			nmbrg 	=$(this).val();
			
            $.ajax({
                    type:'POST',
                    url:'cek_stok2.php',
                    data:'nmbrg='+nmbrg,
                    success:function(jmlstok){
                        $('#stok9').val(jmlstok);
						  
                    }
                });

		}); 
//10
		$('select[id="cb_brg10"]').change(function() {	
			id_brg 	=$(this).val();
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                        
                        $('#nmbrg10').html(stok);
                    }
                });

		}); 
			$('select[id="nmbrg10"]').change(function() {	
			nmbrg 	=$(this).val();
			
            $.ajax({
                    type:'POST',
                    url:'cek_stok2.php',
                    data:'nmbrg='+nmbrg,
                    success:function(jmlstok){
                        $('#stok10').val(jmlstok);
						  
                    }
                });

		}); 

		

	
 
</script>






<!-- form ambil barang -->

<script type="text/javascript">
	$(document).ready(function(){
		$("#simpanklr").click(function(){
		
		
       
              var data           =$('#fmbrg_klr').serialize();
              var jenis_barang   =$('#cb_brg').val();
              var nama_barang    =$('#nmbrgklr').val();
			  var jmlbrg		 =parseInt($('#jmlbrgklr').val());
			  var ketklr		 =$('#ketklr').val();
			  var ppwo			=$('#project').val();
			
		$.ajax({
		type: 'POST',
		url: "cek_stok.php",
		data: data,														
		
		success: function(stok) {

			  dt=stok.split("&");
           var jmlstok = parseInt(dt[0]);
			
		
			if (jenis_barang==""){
			 sweetAlert("PILIH JENIS BARANG", "", "error");
			 $("#simpanklr").show();
			}
			 else  if (nama_barang==""){
			 sweetAlert("PILIH NAMA BARANG", "", "error");
			 $("#simpanklr").show();
			} 
			 else  if (ppwo==""){
			 sweetAlert("PILIH NO PP/WO ", "", "error");
			 $("#simpanklr").show();
			} 
			else  if (jmlbrg==""){
			 sweetAlert("JUMLAH BARANG HARUS DIISI", "", "error");
			 $("#simpanklr").show();
			} 
			else  if (jmlbrg > jmlstok){
			 sweetAlert("STOK TIDAK MENCUKUPI", "", "error");
			 $("#simpanklr").show();
			}
			else  if (jmlstok==0){
			 sweetAlert("STOK  NOL 0", "", "error");
			 $("#simpanklr").show();
			}
			else{
			$.ajax({
				type: 'POST',
				url: 'simpan_brg_klr.php',
				data: data,
				success: function(msg) {
                    	swal({ 
						title: "Succes!",
						text: "TRANSAKSI BARANG KLUAR",
						type: "success" 
					},
					function(){
							  location.reload();
							}
							);
					}
				});
        	} //ELSE--
			}
		  })//CEK JML
		});

	});
	</script>

<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('click','.edit-brgklr',function(e){
                e.preventDefault();
                $("#myModaledit").modal('show');
                $.post('formedit_brgklr.php',
                    {id:$(this).attr('kd-klr'),
					obj:$(this).attr('obj')
					 
					},
                    function(html){
                        $(".modaledit-body").html(html);
                    }   
                );
            });

		$('select[id="cb_brg"]').change(function() {
           
			
			id_brg 	=$(this).val();
     
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                      //  alert(stok);
                        $('#nmbrgklr').html(stok);
                    }
                });
			
		}); 

	
	});
 
</script>




<script type="text/javascript">
			jQuery(function($){
			    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'});
				var container1 = demo1.bootstrapDualListbox('getContainer');
				container1.find('.btn').addClass('btn-white btn-info btn-bold');
			
				/**var setRatingColors = function() {
					$(this).find('.star-on-png,.star-half-png').addClass('orange2').removeClass('grey');
					$(this).find('.star-off-png').removeClass('orange2').addClass('grey');
				}*/
				$('.rating').raty({
					'cancel' : true,
					'half': true,
					'starType' : 'i'
					/**,
					
					'click': function() {
						setRatingColors.call(this);
					},
					'mouseover': function() {
						setRatingColors.call(this);
					},
					'mouseout': function() {
						setRatingColors.call(this);
					}*/
				})//.find('i:not(.star-raty)').addClass('grey');
				
				
				
				//////////////////
				//select2
				$('.select2').css('width','200px').select2({allowClear:true})
				$('#select2-multiple-style .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('.select2').addClass('tag-input-style');
					 else $('.select2').removeClass('tag-input-style');
				});
				
				//////////////////
				$('.multiselect').multiselect({
				 enableFiltering: true,
				 buttonClass: 'btn btn-white btn-primary',
				 templates: {
					button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"></button>',
					ul: '<ul class="multiselect-container dropdown-menu"></ul>',
					filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
					filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
					li: '<li><a href="javascript:void(0);"><label></label></a></li>',
					divider: '<li class="multiselect-item divider"></li>',
					liGroup: '<li class="multiselect-item group"><label class="multiselect-group"></label></li>'
				 }
				});
				
				
				///////////////////
					
				//typeahead.js
				//example taken from plugin's page at: https://twitter.github.io/typeahead.js/examples/
				var substringMatcher = function(strs) {
					return function findMatches(q, cb) {
						var matches, substringRegex;
					 
						// an array that will be populated with substring matches
						matches = [];
					 
						// regex used to determine if a string contains the substring `q`
						substrRegex = new RegExp(q, 'i');
					 
						// iterate through the pool of strings and for any string that
						// contains the substring `q`, add it to the `matches` array
						$.each(strs, function(i, str) {
							if (substrRegex.test(str)) {
								// the typeahead jQuery plugin expects suggestions to a
								// JavaScript object, refer to typeahead docs for more info
								matches.push({ value: str });
							}
						});
			
						cb(matches);
					}
				 }
			
				 $('input.typeahead').typeahead({
					hint: true,
					highlight: true,
					minLength: 1
				 }, {
					name: 'states',
					displayKey: 'value',
					source: substringMatcher(ace.vars['US_STATES'])
				 });
					
					
				///////////////
				
				
				//in ajax mode, remove remaining elements before leaving page
				$(document).one('ajaxloadstart.page', function(e) {
					$('[class*=select2]').remove();
					$('select[name="duallistbox_demo1[]"]').bootstrapDualListbox('destroy');
					$('.rating').raty('destroy');
					$('.multiselect').multiselect('destroy');
				});
			
			});
		</script>