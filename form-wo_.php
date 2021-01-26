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
	<body class="no-skin" onload='fokus();'>
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
								echo '/'.$data2['singkatan'].'/'.date('m/y');
								
					
					?>" readonly>  <input type="hidden" name="txtno" value="<?php echo $no;?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pemohon</label>

										<div class="col-sm-9">
											<input type="text" id="txtpemohon" name="txtpemohon" value="<?php echo $data2['nama'];?>" class="col-xs-10 col-sm-5" readonly />
											<label style='margin-left: 5px;' id=pesan1></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Section</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" class="col-xs-10 col-sm-3" name="txtsection" value="<?php echo $data2['section'];?>" readonly>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Uraian Pekerjaan</label>

										<div class="col-sm-9">
											<textarea rows="3" cols="35 " id="txturaian" placeholder="Uraian Pekerjaan" name="txturaian"></textarea>
											<label style='margin-left: 5px;' id="pesan2"></label>
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
				<div class="col-md-10">
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
								$result="select * from tbl_wo where section='".$sec."' and year(tgl_permohonan)=year(CURDATE()) and month(tgl_permohonan)=month(CURDATE())";
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
								$result="select * from tbl_wo where section ='".$sec."'  order by status_wo DESC";
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
			}
	?>
						</div>
					</div>
				</div>
			</div>
	
													</div>
												</div>
							</form>
									
									
									
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
