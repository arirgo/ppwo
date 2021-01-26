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
		<title>PPWO IT Online</title>
<link rel="icon" type="image/png" sizes="16x16" href="assets/img/pw.png">
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
						<a href="#">Home</a>
					</li>
				<li class="active">Waiting List PP</li>
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								List WO Online
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Overview Work Order IT
								</small>
							</h1>
						</div><!-- /.page-header -->
							
										<div class="col-md-10">
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
				
				<!-- -->
				<div class="panel panel-default">
					
					<div class="panel-body">
						
						<div class="modal fade" id="twoModal" tabindex="-1" role="dialog" aria-labelledby="twoModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:500px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="twoModalLabel">Detail</h4>
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
				
				<div class="panel-body">
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>

							
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor WO</th>
									<th  data-sortable="true">Pemohon</th>
									<th  data-sortable="true">Section</th>
									<th  data-sortable="true">Status</th>
									<th  data-sortable="true">Action</th>
						    </tr>
							
						    </thead>
							<?php
							require_once("config.php");
								$result="SELECT * FROM tbl_wo ORDER BY status_wo ASC";
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
										<td><a href="#" class="edit-record" data-id="<?php echo $data['no_wo']; ?>" ><?php echo $data['no_wo']; ?></a></td>
									<?php
										echo '<td>'.$data['pemohon'].'</td>';
										echo '<td>'.$data['section'].'</td>';
										echo '<td>'.$data['status_wo'].'</td>';
										if($data['status_wo']=='approved SH'){
												echo '<td><form name="f_take" action="take_wo.php" method="POST"><input type="hidden" name="txttake" value="'.$data['no_wo'].'"><input type="hidden" name="txtadmin" value="'.$nama.'"><button type="submit" class="btn btn-danger btn-xs">TAKE</button></form></td>';
											}else if($data['status_wo']=='accepted'){
												echo '<td><form name="f_take" action="process_wo.php" method="POST"><input type="hidden" name="txttake" value="'.$data['no_wo'].'"><input type="hidden" name="txtadmin" value="'.$nama.'"><button type="submit" class="btn btn-danger btn-xs">PROCESS</button></form></td>';
											}else if($data['status_wo']=='on process'){
												echo '<td><form name="f_take" action="finish_wo.php" method="POST"><input type="hidden" name="txttake" value="'.$data['no_wo'].'"><input type="hidden" name="txtadmin" value="'.$nama.'"><button type="submit" class="btn btn-danger btn-xs">FINISH</button></form></td>';
											}
										echo '</tr>';
										
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
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('hasil.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
         $(function(){
            $(document).on('click','.edit-process',function(e){
                e.preventDefault();
                $("#twoModal").modal('show');
                $.post('process_wo_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
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

