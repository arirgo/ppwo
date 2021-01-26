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
		<title>PPWO</title>

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
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
						<a href="main_teknik.php">Home</a>
					</li>
				<li class="active">Waiting List PP</li>
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								List PP Online
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Overview Permintaan Perbaikan IT
								</small>
							</h1>
						</div><!-- /.page-header -->
							
								
				<div class="panel panel-default">
					
						<div class="panel-body">
						
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:900px; height:1000px;">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Detail PP</h4>
										</div>
									<div class="modal-body">
									</div>
								<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>

									
				<div class="panel panel-default">
					
						<div class="panel-body">
						
							<div class="modal fade" id="modulppmyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:1000px; height:1000px;">
									<div class="modal-content">
										<div class="modal-header" style="background:pink">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<center><h4 class="modal-title" id="myModalLabel">DAFTAR MODUL</h4></center>
										</div>
									<div class="modulppmodal-body">
									</div>
								<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
				
				<!-- -->
				<div class="panel panel-default">
					
					<div class="panel-body">
						
						<div class="modal fade" id="twoModal" tabindex="-1" role="dialog" aria-labelledby="twoModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:800px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="twoModalLabel">Pilih Status Hold</h4>
                    </div>
                    <div class="twomodal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
				<!-- -->
					<div class="panel-body">
						
							<div class="modal fade" id="finishModal" tabindex="-1" role="dialog" aria-labelledby="finishModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:700px">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="finishModalLabel">Input Pekerjaan</h4>
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

					<!-- -->
					<!-- <div class="panel-body">
						
							<div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:700px">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="finishModalLabel">REQUEST</h4>
										</div>
									<div class="modalrequest-body">
									</div>
								<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div> -->
				<!-- -->
				
<div class="panel-body">
<?php
	if(isset($_POST['tombol'])){
	
	?>
	
	<form action="menu_process_pp.php" method="post">
		<table width="60%" class="table table-striped table-bordered table-hover">
			<tr>
				<?php
					?>
				<td colspan="3">
				<select name="bulan" id="bulan">
					<?php
						$bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
						for($y=1;$y<=12;$y++){
						if($y==$_POST['bulan']){ $pilih="selected";}
						else {$pilih="";}
						echo('<option value="'.$y.'"'.$pilih.'>'.$bulan[$y].'</option>'.'\n');
						}
						?>
				</select>
				&nbsp; - &nbsp;
				<select name="tahun" id="tahun">
					<?php
						$mulai= '2017';
						for($i = $mulai;$i<$mulai + 5;$i++){
						$sel = $i == $_POST['tahun'] ? ' selected="selected"' : '';
						echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
						}
					?>
				</select>
				<button type="submit" name="tombol" value="SEARCH"><i class="ace-icon fa fa-search"></i>Search</button>
				</td>
			</tr>
		</table>
	</form>	
				
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>

							
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor PP</th>
									<th  data-sortable="true">Nomor Tiket</th>
									<th  data-sortable="true">Tgl Lapor</th>
									<th  data-sortable="true">Tgl Take</th>
									<th  data-sortable="true">Status</th>
									<th  data-sortable="true">Action</th>
						    </tr>
							
						    </thead>
							<?php
								$tmp	=	$_POST['bulan'];
								if ($tmp<10){
									$bln	=	strval('0'.$tmp);
									}else {
										$bln	=	strval($tmp);										
										}
								$thn	=	$_POST['tahun'];
								$ed		= strval($thn.'-'.$bln);
							
							
							require_once("config.php");
								$sqlo = mysqli_query($koneksi,"select * from user where username = '".$nopp."'");
								$isi  = mysqli_fetch_array($sqlo);
								$nama = $isi['nama'];
								$result="SELECT * FROM tbl_pp where status_pp IN ('on process','hold','finish','complete') and diterima = '".$nama."' and year(tgl_terima)='".$thn."' and month(tgl_terima)='".$bln."' ORDER BY tgl_terima DESC";
								$query_input=mysqli_query($koneksi,$result);
								
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										$sqlh = mysqli_query($koneksi,"select count('no_pp') as a from dt_pp where no_pp ='".$data['no_pp']."'");
										list($pkjn) = mysqli_fetch_row($sqlh);
								
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
										<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
									<?php
										echo '<td>'.$data['no_antri'].'</td>';
										echo '<td>'.$data['tgl_lapor'].'</td>';
										echo '<td>'.$data['tgl_terima'].'</td>';
										echo '<td>'.$data['status_pp'].'</td>';
										if($data['status_pp']=='waiting'){
												echo '<td><form name="f_take" action="take_pp.php" method="POST"><input type="hidden" name="txttake" value="'.$data['no_pp'].'"><input type="hidden" name="txtadmin" value="'.$nama.'"><button type="submit" class="btn btn-danger btn-xs">TAKE</button></form></td>';
											}else if($data['status_pp']=='on process'){?>
												<td><a href="#" class="edit-hold" data-id="<?php echo $data['no_pp'];?>" ><button type="submit" class="btn btn-inverse btn-xs">HOLD</button></a>
												<a href="#" class="tambahmodul" data-id="<?php echo $data['no_pp']; ?>" ><button type="submit" class="btn btn-danger btn-xs"><i class="ace-icon glyphicon glyphicon-plus"></i>MODUL</button></a>
												 <?php 
												 
												 	$ckmodul = mysqli_query($koneksi,"select count(*) as jl from modul_pp where no_pp ='$nop' and status !='finish'");
													$jml   = mysqli_fetch_array($ckmodul);
													 if($jml['jl'] > 0)
													 {?>
														<a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><input type="button" class="btn btn-primary btn-xs" value="Check"></a>
													 <?php }else{
												 ?>
												<button type="submit" class="btn btn-primary btn-xs" onclick="window.open('finish_window.php?kode=<?php echo $data['no_pp'];?>','winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=900,height=580');">Finish</button>
											<!-- <a href="pp_approve.php?nopp=<?php echo $data['no_pp'];?>" class="btn  btn-minier btn-primary">	<i class="ace-icon fa fa-pencil-square-o"></i>FINISH</a> -->
													 <?php }?>
												<!-- <a href="pp_approve.php?nopp=<?php echo $data['no_pp'];?>" class="btn  btn-minier btn-primary">	<i class="ace-icon fa fa-pencil-square-o"></i>FINISH</a> -->
												</td>
												
										
										<?php	}else if($data['status_pp']=='hold'){
												echo '<td><form name="f_release" action="release_pp.php" method="POST"><input type="hidden" name="txtrelease" value="'.$data['no_pp'].'"><input type="hidden" name="txtadmin" value="'.$nama.'"><button type="submit" class="btn btn-purple btn-xs">RELEASE</button></form></td>';
											}else if(($data['status_pp']=='finish')&&($pkjn==0)){
												?><td><button type="submit" class="btn btn-primary btn-xs" onclick="window.open('finish_window.php?kode=<?php echo $data['no_pp'];?>','winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=900,height=580');">INPUT PEKERJAAN</button></td>
											<?php }else if(($data['status_pp']=='complete')&&($pkjn==0)){
												?><td><button type="submit" class="btn btn-primary btn-xs" onclick="window.open('finish_window.php?kode=<?php echo $data['no_pp'];?>','winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=900,height=580');">INPUT PEKERJAAN</button></td>
											<?php
											}
										echo '</tr>';
										
										$no++;
									}
								}
							 ?>
							</table>
							<?php } else {
							
							?>
		<form action="menu_process_pp.php" method="post">
		<table width="60%" class="table table-striped table-bordered table-hover">
			<tr>
				<?php
					?>
				<td colspan="3">
										<select name="bulan" id="bulan">
										<?php
										echo"<option value='all'>--ALL--</option>";
											$bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
											for($y=1;$y<=12;$y++){
												if($y==date('m')){ $pilih="selected";}
												else {$pilih="";}
						
												echo('<option value="'.$y.'"'.$pilih.'>'.$bulan[$y].'</option>'.'\n');
											}
										?>
										</select>
										&nbsp; - &nbsp;
										<select name="tahun" id="tahun">
										<?php
											$mulai= '2017';
											for($i = $mulai;$i<$mulai + 5;$i++){
												$sel = $i == date('Y') ? ' selected="selected"' : '';
												echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
											}
											?>
										</select>
										
										<button type="submit" name="tombol" value="SEARCH"><i class="ace-icon fa fa-search"></i>Search</button>
									</td>
			</tr>
		</table>
	</form>	
				
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>

							
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor PP</th>
									<th  data-sortable="true">Nomor Tiket</th>
									<th  data-sortable="true">Tgl Lapor</th>
									<th  data-sortable="true">Tgl Take</th>
									<th  data-sortable="true">Status</th>
									<th  data-sortable="true">Action</th>
						    </tr>
							
						    </thead>
							<?php
							require_once("config.php");
								$sqlo = mysqli_query($koneksi,"select * from user where username = '".$nopp."'");
								$isi  = mysqli_fetch_array($sqlo);
								$nama = $isi['nama'];
								$result="SELECT * FROM tbl_pp where status_pp IN ('on process','hold','finish','complete') and diterima = '".$nama."' and year(tgl_terima)=year(CURDATE()) and month(tgl_terima)=month(CURDATE()) ORDER BY tgl_terima DESC";
								$query_input=mysqli_query($koneksi,$result);
								
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										$sqlh = mysqli_query($koneksi,"select count('no_pp') as a from dt_pp where no_pp ='".$data['no_pp']."'");
										list($pkjn) = mysqli_fetch_row($sqlh);
										$nop=$data['no_pp'];
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
										<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
									<?php
										echo '<td>'.$data['no_antri'].'</td>';
										echo '<td>'.$data['tgl_lapor'].'</td>';
										echo '<td>'.$data['tgl_terima'].'</td>';
										echo '<td>'.$data['status_pp'].'</td>';
										if($data['status_pp']=='waiting'){
												echo '<td><form name="f_take" action="take_pp.php" method="POST"><input type="hidden" name="txttake" value="'.$data['no_pp'].'"><input type="hidden" name="txtadmin" value="'.$nama.'"><button type="submit" class="btn btn-danger btn-xs">TAKE</button></form></td>';
											}else if($data['status_pp']=='on process'){?>
												<td><a href="#" class="edit-hold" data-id="<?php echo $data['no_pp']; ?>" ><button type="submit" class="btn btn-inverse btn-xs">HOLD</button></a>
												 <a href="#" class="tambahmodul" data-id="<?php echo $data['no_pp']; ?>" data2="<?php echo $data['jenis_project'];?>" data3="<?php echo $data['nama_project'];?>" ><button type="submit" class="btn btn-danger btn-xs"><i class="ace-icon glyphicon glyphicon-plus"></i>MODUL</button></a>
												 <?php 
												 
												 	$ckmodul = mysqli_query($koneksi,"select count(*) as jl from modul_pp where no_pp ='$nop' and status !='finish'");
													$jml   = mysqli_fetch_array($ckmodul);
													 if($jml['jl'] > 0)
													 {?>
														<a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><input type="button" class="btn btn-primary btn-xs" value="Check"></a>
													 <?php }else{
												 ?>
												<button type="submit" class="btn btn-primary btn-xs" onclick="window.open('finish_window.php?kode=<?php echo $data['no_pp'];?>','winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=900,height=580');">Finish</button>
											<!-- <a href="pp_approve.php?nopp=<?php echo $data['no_pp'];?>" class="btn  btn-minier btn-primary">	<i class="ace-icon fa fa-pencil-square-o"></i>FINISH</a> -->
													 <?php }?>
												</td>
										<?php	}else if($data['status_pp']=='hold'){
												echo '<td><form name="f_release" action="release_pp.php" method="POST"><input type="hidden" name="txtrelease" value="'.$data['no_pp'].'"><input type="hidden" name="txtadmin" value="'.$nama.'"><button type="submit" class="btn btn-purple btn-xs">RELEASE</button></form></td>';
											}else if(($data['status_pp']=='finish')&&($pkjn==0)){
												?><td><button type="submit" class="btn btn-primary btn-xs" onclick="window.open('finish_window.php?kode=<?php echo $data['no_pp'];?>','winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=900,height=580');">INPUT PEKERJAAN</button></td>
											<?php }else if(($data['status_pp']=='complete')&&($pkjn==0)){
												?><td><button type="submit" class="btn btn-primary btn-xs" onclick="window.open('finish_window.php?kode=<?php echo $data['no_pp'];?>','winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=900,height=580');">INPUT PEKERJAAN</button></td>
											<?php
											}
										echo '</tr>';
										
										$no++;
									}
								}
							 ?>
							</table>
							<?php }?>
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
        });
        
         $(function(){
            $(document).on('click','.edit-hold',function(e){
                e.preventDefault();
                $("#twoModal").modal('show');
                $.post('hold_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".twomodal-body").html(html);
                    }   
                );
            });
		});

		  $(function(){
            $(document).on('click','.tambahmodul',function(e){
                e.preventDefault();
                $("#modulppmyModal").modal('show');
                $.post('tambah_modulpp.php',
                    {id:$(this).attr('data-id'),
					jenis_project:$(this).attr('data2'),
					nama_project:$(this).attr('data3')
					},
                    function(html){
                        $(".modulppmodal-body").html(html);
                    }   
                );
            });
		});
		
		$(function(){
            $(document).on('click','.edit-request',function(e){
                e.preventDefault();
                $("#requestModal").modal('show');
                $.post('request_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modalrequest-body").html(html);
                    }   
                );
            });
        });
        
         $(function(){
            $(document).on('click','.edit-finish',function(e){
                e.preventDefault();
                $("#finishModal").modal('show');
                $.post('finish_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
		
	
</body>
</html>




