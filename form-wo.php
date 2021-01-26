<!DOCTYPE html>
<html lang="en">
	<head>
	<script src="sweetalert/sweetalert-dev.js"></script>
<link rel="stylesheet" href="sweetalert/sweetalert.css">
<script src="assets/js/jquery.2.1.1.min.js"></script>



<script>
 //Inisiasi awal penggunaan jQuery
 $(document).ready(function(){
  //Pertama sembunyikan elemen class gambar
        $('#an').hide(); 
		$('#sembunyian').hide();
		$('#tampil-an').show();        

  //Ketika elemen class tampil di klik maka elemen class gambar tampil
        $('#tampil-an').click(function(){
   $('#an').show();
   $('#sembunyian').show(); 
    $('#tampil-an').hide(); 
        });

  //Ketika elemen class sembunyi di klik maka elemen class gambar sembunyi
        $('#sembunyian').click(function(){
   //Sembunyikan elemen class gambar
   $('#an').hide();
   $('#tampil-an').show(); 
    $('#sembunyian').hide();       
        });
 });
 </script>

<script type=text/javascript>
function kosong()
{	
   var  uraian			= document.getElementById('txturaian');//2
    
   
	if(uraian.value=='')
	{
		document.getElementById('pesan2').innerHTML = "//Detail masalah Harus Diisi";
		uraian.focus();
		return false;
	}
	else
	{
		document.getElementById('pesan2').innerHTML = "";
	}
    
}

function fokus()
	{
		document.getElementById("txturaian").focus();
	}    
    
</script>


		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Work Order</title>

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

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/bootstrap-duallistbox.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-multiselect.min.css" />
		<link rel="stylesheet" href="assets/css/select2.min.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		
		<link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<script src="assets/js/ace-extra.min.js"></script>
		<!-- <script src="jquery-1.11.1.min.js"></script> 
		<script src="jquery-1.12.3.js"></script>  -->
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
	<body class="no-skin" onload='fokus();'>
<?php include "menu-atas.php"; ?>
<?php include "menu-kiri.php";
 $user;
$cekpls=mysqli_fetch_array(mysqli_query($koneksi,"select * from user where username='$user'"));
$pls=$cekpls['pls'];

?>

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
				<li class="active">Form WO Online</li>
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Form WO Online
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Overview &amp; Work Order IT
								</small>
							</h1>
						</div><!-- /.page-header -->
						<?php
						if ($_SESSION['level']=='h_it'){
							?>
							<form name="f_wo" action="wo_proses_hit.php" method="POST" class="form-horizontal" role="form" onsubmit='return kosong();'>
							<?php
							}else{
								?>
							<form name="f_wo" action="wo_proses.php" method="POST" class="form-horizontal" role="form" onsubmit='return kosong();'>
								<?php
								}
						?>
						
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor WO</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" name="txtnowo" value="<?php 
								
								require_once('config.php');
								$sqlw = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
								$isi  = mysqli_fetch_array($sqlw);
								$sec  = $isi['section'];
								$sqlx = mysqli_query($koneksi,"SELECT max(no) as nowo from tbl_wo where year(tgl_permohonan)=year(CURDATE()) and month(tgl_permohonan)=month(CURDATE())");
								$data = mysqli_fetch_array($sqlx);
								$no = intval($data['nowo']);
								//echo $no;
									if (($no>=0)&&($no<=8)){
											$no= $no+1;
											 echo "00".$no;
										}else if (($no>=9)&&($no<=98)){
												$no= $no+1;
											 echo "0".$no;
											}else if (($no>=99)&&($no<=998)){
												$no= $no+1;
											 echo $no;
											}
								
								
								$sql = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
								$data2 = mysqli_fetch_array($sql);
								if($pls=='ho')
								{
									echo '/'.$data2['singkatan'].'/'.'WO/HO'.'/'.date('m/y');
								}else{
									echo '/'.$data2['singkatan'].'/'.'WO'.'/'.date('m/y');
								}
								
								
					
					?>" readonly>  <input type="hidden" name="txtno" value="<?php echo $no;?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pemohon</label>

										<div class="col-sm-6">
											<input type="text" id="txtpemohon" style="width:30%" name="txtpemohon" value="<?php echo $data2['nama'];?>" class="col-xs-10 col-sm-5" readonly />
											<label style='margin-left: 5px;' id=pesan1></label>
											<button type="button" class="btn btn-xs btn-danger" id="tampil-an">A/n <i class="ace-icon fa fa-arrow-left icon-on-left"></i></button>
											<button type="button" class="btn btn-xs btn-success" id="sembunyian">A/n <i class="ace-icon fa fa-arrow-left icon-on-left"></i></button>
											<input type="text" id="an" style="width:30%" name="an"  class="an col-xs-10 col-sm-5" placeholder="Atas nama"/>
										
											</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Section</label>

										<div class="col-sm-7">
											<input type="text" id="form-field-1" class="col-xs-10 col-sm-3" name="txtsection" value="<?php echo $data2['section'];?>" readonly>
									
										</div>
									</div>
									<?php if($pls=='ho'){}else{?>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kepala divisi</label>
									<div class="col-sm-2">
									<select class="chosen-select " id="kadiv" name="kadiv" style="width:10%" required>
									<option value="" selected>--PILIH--  </option>
										<?php

											$result1=mysqli_query($koneksi,"SELECT * FROM user where level_user ='kadiv'");										
											while($isi1  = mysqli_fetch_array($result1)){ ?>
												<option value="<?php echo $isi1['username'];?>"><?php echo $isi1['nama'];?></option>
											<?php } ?>
										</select>
										
									</div>
									</div>
									<?php }?>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Uraian Pekerjaan</label>

										<div class="col-sm-9">
											<textarea rows="3" cols="35 " id="txturaian"  name="txturaian"  required></textarea>
											<label style='margin-left: 5px;' id="pesan2"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">permintaan</label>

										<div class="col-sm-9">
										
											<?php
										$x=1;
										$ak = mysqli_query($koneksi,"select * from jenis_permintaan");
										while($akses = mysqli_fetch_array($ak)){
											
										?>
													<label>
														<input name="prm[]"  id="" type="checkbox" class="ace" value="<?php echo $akses['id_permintaan']?>"/>
														<span class="lbl"> <?php echo $akses['permintaan'];?></span>
													</label>
									
										<?php $x++;
											$t=$x-1;
											if($t %5===0){
												echo "<br>";
											}
											} 					
										?>
<!-- 
										<select name="minta" id="minta" required>
										<option value="">--PILIH--</option>
										<option value="permohonan">Permohonan</option>
										<option value="penghapusan">Penghapusan</option>
										<option value="pendaftaran">Pendaftaran</option>
										
										</select> -->
										
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jenis akses</label>

										<div class="col-sm-9">
										
										<?php
										$z=1;
										$ak = mysqli_query($koneksi,"select * from jenis_akses");
										while($akses = mysqli_fetch_array($ak)){
											
										?>
													<label>
														<input name="aks[]" id="" type="checkbox" class="ace" value="<?php echo $akses['idakses'];?>"/>
														<span class="lbl"> <?php echo $akses['jenis_akses'];?></span>
													</label>
									
										<?php $z++;
											$t=$z-1;
											if($t %5===0){
												echo "<br>";
											}
											} 					
										?>
										<input type="hidden" name="jmlakses" id="jmlakses" value="<?php echo $x-(1);?>">
									
										
										</div>
									</div>
										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sifat Akses</label>

										<div class="col-sm-9">
										<select name="sifat" id="sifat" required>
										<option value="">--PILIH--</option>
										<option value="Sementara">Sementara</option>
										<option value="Permanen">Permanen</option>
										</select>
											
										</div>
									</div>

									<div class="form-group" id="tampil-exp" class="tampil-exp">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sampai</label>

										<div class="col-sm-2">
											   <input class="form-control date-picker" id="exp" name='exp' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" />
										
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ditujukan (HARAP DIPILIH)</label>

										<div class="col-sm-9">
										<select name="radio" id="radio" required>
										<option value="">--PILIH--</option>
										<option value="infra">Infrastruktur</option>
										<option value="prog">Programmer</option>
										</select>
										
										</div>
									</div>
									
					
									</div>
					
					

<center>
									<table>
										<tr>
											<td>
											
												<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
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
							
				<div class="col-md-12">
				
				<div class="panel panel-default">
					<div class="panel-heading">Details</div>
					<div class="panel-body">
				<!-- -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:1100px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail WO</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
				
				<!-- -->
				
				<div class="panel-body">
	<?php 
	//pembagian tampilan tabel berdasar hak akses
	if ($isi['level_user']=='usr') {
				?>

		
</form>		
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
							
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor WO</th>
									<th  data-sortable="true">Pemohon</th>
									<th  data-sortable="true">Section</th>
									<th  data-sortable="true">Status</th>
						    </tr>
							
						    </thead>
							<?php
							require_once("config.php");
								$result="select * from tbl_wo where section='".$sec."' and status_wo not in('finish') and pls='$pls'";
								$query_input=mysqli_query($koneksi,$result);
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
										<td><a href="#" class="edit-record" data-id="<?php echo $data['no_wo']; ?>" ><?php echo $data['no_wo']; ?></a></td>
									<?php
										echo '<td>'.$data['pemohon'].'</td>';
										echo '<td>'.$data['section'].'</td>';
										echo '<td>'.$data['status_wo'].'</td>';
										
										echo '</tr>';
										
										$no++;
									}
								}
							 ?>
							</table>
	<?php 
	} else if ($isi['level_user']=='sh') {					
		?>
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>

							
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor WO</th>
									<th  data-sortable="true">Pemohon</th>
									<th  data-sortable="true">Status</th>
									<th  data-sortable="true">Action</th>
						    </tr>
							
						    </thead>
							<?php
							require_once("config.php");
								//~ echo $nopp;
								$result="select * from tbl_wo where section ='".$sec."' and status_wo not in('finish') and pls='$pls' order by status_wo DESC";
								$query_input=mysqli_query($koneksi,$result);
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										echo '<tr>';
										echo '<td>'.$no.'</td>'; ?>
										<td><a href="#" class="edit-record" data-id="<?php echo $data['no_wo']; ?>" ><?php echo $data['no_wo']; ?></a></td>
										<?php
										echo '<td>'.$data['pemohon'].'</td>';
										echo '<td>'.$data['status_wo'].'</td>';
										if ($data['status_wo'] == 'waiting'){
										echo '<td><a href="app_wo.php?nowo='.$data['no_wo'].'" class="btn  btn-minier btn-primary">
											<i class="ace-icon fa fa-pencil-square-o"></i>
											APPROVE
											</a></td>';
										}else if (($data['status_wo'] == 'approved SH') or ($data['status_wo'] == 'on process') or ($data['status_wo'] == 'finish') or ($data['status_wo'] == 'complete')){
												echo '<td><a href="app_wo.php?nowo='.$data['no_wo'].'" class="btn  btn-minier btn-primary" disabled>
											<i class="ace-icon fa fa-pencil-square-o"></i>
											APPROVE
											</a></td>';
												}
										$no++;
										echo '</tr>';
									}
								}
							 ?>
							</table>
	<?php 
			} else if ($isi['section']=='IT') {					
		?>

<?php 	if(isset($_POST['tombolwoost'])){
	
	    $stt =$_POST['stt'];
	 	$dev =$_POST['dev'];
     	$tglf=$_POST['tglf'];
		 $tglt=$_POST['tglt'];
		 $cariwo=$_POST['cariwo'];
		$group="WO";

if($cariwo<>'')
{
	$inputdata .="and no_wo='$cariwo' ";
}else{}
if($stt<>'')
{
	$inputdata .="and status_wo='$stt' ";
}else{}
if($dev<>'')
{
	$inputdata .="and it='$dev' ";
}else{}
if($tglf<>'')
{
	$inputdata .="and tgl_permohonan between '$tglf' and '$tglt' ";
}else{}

		?>
				
<form action="form-wo.php" method="post" name="ostwo" id="ostwo">
		<table style="float:righr;">
		<tr>
		<td>WO</td>
		<td><input type="text" name="cariwo" id="cariwo" ></td>
			<td>Status</td>
			<td><select name="stt" id="stt">
				<option value="">--Pilih--</option>
				<option value="waiting">Waiting</option>
				<option value="on process">on process</option>
				<option value="status">Hold</option>
				<option value="finish">Finish</option>
				</select></td>
				<td>Dev</td>
			<td><select name="dev" id="dev">
				<option value="">--Pilih--</option>
				<option value="infra">Infrastruktur</option>
				<option value="prog">Programmer</option>
				
				</select></td>
			<td>From</td>
			<td><input type="text" name="tglf" id="tglf"  class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off" ></td>
			<td>To</td>
			<td><input type="text" name="tglt" id="tglt" class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off"  ></td>
			<td><input type="submit" name="tombolwoost" class="btnost btn btn-primary" style="border-radius:5px;" value="Status WO"></td>
			<td><a href="export_ostanding.php?tglf=<?php echo $tglf; ?>&tglt=<?php echo $tglt; ?>&stt=<?php echo $stt; ?>&dev=<?php echo $dev; ?>&group=<?php echo $group; ?>&pls=<?php echo $pls; ?>" style="border-radius:5px;" class="btn btn-success"><i class="ace-icon fa fa-cloud-download"></i>Export WO</a></td>

			</tr></table>
</form>
<br><br><br>
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
							
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor WO</th>
									<th  data-sortable="true">Pemohon</th>
									<th  data-sortable="true">Section</th>
								
									<th  data-sortable="true">Tgl permohonan</th>
									<th  data-sortable="true">pemohon</th>
										<th  data-sortable="true">It</th>
									<th  data-sortable="true">Status</th>
						    </tr>
							
						    </thead>
							<?php
							require_once("config.php");
								//$result="select * from tbl_wo where no_wo !=0 $inputdata ";
								$query_input=mysqli_query($koneksi,"select * from tbl_wo where no_wo !=0 $inputdata and pls='$pls' ");
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
										<td><a href="#" class="edit-record" data-id="<?php echo $data['no_wo']; ?>" ><?php echo $data['no_wo']; ?></a></td>
									<?php
										echo '<td>'.$data['pemohon'].'</td>';
										echo '<td>'.$data['section'].'</td>';
									
										echo '<td>'.$data['tgl_permohonan'].'</td>';
										echo '<td>'.$data['pemohon'].'</td>';
										echo '<td>'.$data['it'].'</td>';
										echo '<td>'.$data['status_wo'].'</td>';
										
										echo '</tr>';
										
										$no++;
									}
								}
							 ?>
							</table>
	<?php 
			} else{?>


<form action="form-wo.php" method="post" name="ostwo" id="ostwo">
		<table style="float:right;">
		<tr>
			<td>NO WO</td>
			<td><input type="text" name="cariwo" id="cariwo"></td>
			<td>Status</td>
			<td><select name="stt" id="stt">
				<option value="">--Pilih--</option>
				<option value="waiting">Waiting</option>
				<option value="on process">on process</option>
				<option value="status">Hold</option>
				<option value="finish">Finish</option>
				</select></td>
				<td>Dev</td>
			<td><select name="dev" id="dev">
				<option value="">--Pilih--</option>
				<option value="infra">Infrastruktur</option>
				<option value="prog">Programmer</option>
				
				</select></td>
			<td>From</td>
			<td><input type="text" name="tglf" id="tglf"  class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off" ></td>
			<td>To</td>
			<td><input type="text" name="tglt" id="tglt" class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off"  ></td>
			<td><input type="submit" name="tombolwoost" class="btnost btn btn-primary" style="border-radius:5px;" value="Status WO"></td>
		
			</tr></table>
</form>
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
							
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor WO</th>
									<th  data-sortable="true">Pemohon</th>
									<th  data-sortable="true">Section</th>
								
									<th  data-sortable="true">Tgl permohonan</th>
									<th  data-sortable="true">pemohon</th>
									<th  data-sortable="true">It</th>
									<th  data-sortable="true">Status</th>
						    </tr>
							
						    </thead>
							<?php
							require_once("config.php");
								$result="select * from tbl_wo where status_wo not in('finish') and pls='$pls'";
								$query_input=mysqli_query($koneksi,$result);
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
										<td><a href="#" class="edit-record" data-id="<?php echo $data['no_wo']; ?>" ><?php echo $data['no_wo']; ?></a></td>
									<?php
										echo '<td>'.$data['pemohon'].'</td>';
										echo '<td>'.$data['section'].'</td>';
									
										echo '<td>'.$data['tgl_permohonan'].'</td>';
										echo '<td>'.$data['pemohon'].'</td>';
										echo '<td>'.$data['it'].'</td>';
										echo '<td>'.$data['status_wo'].'</td>';
										
										echo '</tr>';
										
										$no++;
									}
								}
							} ?>
							</table>

	<?php }?>
						</div>
					</div>
				</div>
			</div>
	
													</div>
												</div>
							
									
									
									
					</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->

<?php include "menu-bawah.php"; ?>
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
		<script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('formwo_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        //~ 
        
       
    </script>
		
	
</body>
</html>

<script>
$('#sifat').on('change', function() {
  var value = $(this).val();
  if(value=="Sementara"){
	  $("#tampil-exp").show();
  }else{
	   $("#tampil-exp").hide();
  }
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