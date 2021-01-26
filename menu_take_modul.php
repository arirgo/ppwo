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
		<title>Dashboard - Ace Admin</title>

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
								List MODUL PP & WO Online
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Overview Daftar Modul
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
										<h4 class="modal-title" id="myModalLabel">Detail Modul</h4>
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
						
							<div class="modal fade" id="womyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:1100px; height:1000px;">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Detail WO</h4>
										</div>
									<div class="womodal-body">
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
					<div class="modal-dialog" style="width:380px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="twoModalLabel">Pilih Status Hold</h4>
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
	<?php 
	session_start();

	$name = $_SESSION['nama'];
	$usernm = $_SESSION['username'];
	 $sec = $_SESSION['section'];
	?>			
				<div class="panel-body">
<table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>						
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor PP</th>
									<th  data-sortable="true">Nodul</th>
									<th  data-sortable="true">IT</th>
									<th  data-sortable="true">IT TAKE</th>
									<th  data-sortable="true">Jenis</th>
									<th  data-sortable="true">Action</th>
						    </tr>
							
						    </thead>
							<?php
							require_once("config.php");
								$result="SELECT tbl_pp.diterima,it, modul_pp.* FROM tbl_pp inner join modul_pp on tbl_pp.no_pp=modul_pp.no_pp where modul_pp.status='' and modul_pp.dikerjakan='' ORDER BY objectid DESC";
								$query_input=mysqli_query($koneksi,$result);
								$sqlo = mysqli_query($koneksi,"select * from user where username = '".$nopp."'");
								$isi  = mysqli_fetch_array($sqlo);
								$nama = $isi['nama']; 
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
										<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
									<?php
									$usrmodul=$data['dikerjakan'];
										echo '<td>'.$data['nama_modulpp'].'</td>';
										echo '<td>'.$data['it'].'</td>';
										echo '<td>'.$data['diterima'].'</td>';
										echo '<td>PP</td><td>';
											 if($data['status']==''){?>
										
									<form name="f_pp" id="f_pp"  method="POST"><input type="hidden" name="id_modul" value="<?php echo $data['objectid'];?>">
							
											<input type="hidden" name="nop" id="nop" value="<?php echo $data['no_pp']?>">
											<input type="hidden" name="sttgroup" id="sttgroup" value="start">
											<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
											<button type="button" id="bpp" class="btn btn-purple btn-xs">Take</button></form>
									<?php }else if($data['status']=='on procces' and $usrmodul==$name){?>
										<form name="f_pp" id="f_pp"  method="POST"><input type="hidden" name="id_modul" value="<?php echo $data['objectid'];?>">
										
											<input type="hidden" name="nop" id="nop" value="<?php echo $data['no_pp']?>">
											<input type="hidden" name="sttgroup" id="sttgroup" value="finish">
											<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
											<button type="button" id="bpp" class="btn btn-primary btn-xs">Finish</button></form>
									<?php }else{echo"-";} 
										echo '</td></tr>';
										
										$no++;
									}
								}
							 ?>
							</table>
						</div>


						<div class="tampilmodulwo panel-body">
<table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>						
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor WO</th>
									<th  data-sortable="true">Nodul</th>
									<th  data-sortable="true">Project</th>
									<th  data-sortable="true">IT</th>
									<th  data-sortable="true">IT TAKE</th>
									<th  data-sortable="true">Jenis</th>
									<th  data-sortable="true">Action</th>
						    </tr>
							
						    </thead>
							<?php
							require_once("config.php");
								$result1="SELECT tbl_wo.diterima,it, detail_project.* FROM tbl_wo inner join detail_project on tbl_wo.no_wo=detail_project.no_project where detail_project.status='' and detail_project.username='' ORDER BY objectid DESC";
								$query_input1=mysqli_query($koneksi,$result1);
								$sqlo = mysqli_query($koneksi,"select * from user where username = '".$nopp."'");
								$isi  = mysqli_fetch_array($sqlo);
								$nama = $isi['nama']; 
								if ($query_input1){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data1= mysqli_fetch_array($query_input1)){
										$usrproject=$data1['username'];
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
										<td><a href="#" class="wo-record" data-id="<?php echo $data1['no_project']; ?>" ><?php echo $data1['no_project']; ?></a></td>
									<?php
										echo '<td>'.$data1['detail_pekerjaan'].'</td>';
										echo '<td>'.$data1['soft_hard'].'</td>';
										echo '<td>'.$data1['it'].'</td>';
										echo '<td>'.$data1['diterima'].'</td>';
										echo '<td>WO</td><td>';
									 if($data['status']==''){?>
										
									<form name="f_wo"  id="f_wo"  method="POST"><input type="hidden" name="id_modul" value="<?php echo $data1['objectid'];?>">
							
											<input type="hidden" name="txtwo" id="txtwo" value="<?php echo $data1['no_project']?>">
											<input type="hidden" name="sttgroup" id="sttgroup" value="start">
											<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
											<button type="button" id="bwo" class="btn btn-purple btn-xs">Take</button></form>
									<?php }else if($data1['status']=='on procces' and $usrproject==$name){?>
										<form name="f_wo"  id="f_wo"  method="POST"><input type="hidden" name="id_modul" value="<?php echo $data1['objectid'];?>">
										
											<input type="hidden" name="txtwo" id="txtwo" value="<?php echo $data1['no_project']?>">
											<input type="hidden" name="sttgroup" id="sttgroup" value="finish">
											<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
											<button type="button" id="bwo" class="btn btn-primary btn-xs">Finish</button></form>
									<?php }else{echo"-";} 
										echo '</td></tr>';
										
										$no++;
									}
								}
							 ?>
							</table>
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
            $(document).on('click','.wo-record',function(e){
                e.preventDefault();
                $("#womyModal").modal('show');
                $.post('formwo_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".womodal-body").html(html);
                    }   
                );
            });
        });

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
        
   
	$(document).ready(function(){
		$("#bwo").click(function(){
			
			var data = $('#f_wo').serialize();
			$.ajax({
				type: 'POST',
				url: "simpan_modulku.php",
				data: data,
				success: function() {
						 swal({  
														title: "Update modul!",  
														text: "I will close in 2 seconds.", 
														timer: 2000, 
														type: "success" }),
				location.reload();
				}
			});
		});
	});

		$(document).ready(function(){
		$("#bpp").click(function(){
			
			var data = $('#f_pp').serialize();
			$.ajax({
				type: 'POST',
				url: "update_modulpp.php",
				data: data,
				success: function() {
						 swal({  
														title: "Update modul!",  
														text: "I will close in 2 seconds.", 
														timer: 2000, 
														type: "success" }),
				location.reload();
				}
			});
		});
	});

    

    </script>
		
	
</body>
</html>

