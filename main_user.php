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
		<title>Dashboard</title>

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
			#tahun{
				width:90%;   
				}
			#bulan{
				width:90%;   
				}
			#tblhis{boreder=0;}
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
						<a href="main_user.php">Home</a>
					</li>
				
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:1100px">
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
						
						
						<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-star green"></i>

									Welcome to
									<strong class="blue">
										PPWO IT Online
									</strong>,
	silahkan pilih menu form pp untuk membuat permintaan perbaikan dan menu form wo untuk membuat work order.
						</div>
						<div class="hr hr32 hr-dotted"></div>	
						<div class="row">
							<table width="80%" border="1" class="table table-striped table-bordered table-hover">
								<tr>
									<td style=" background-color:#7EB7FD;">Tabel Approval User</td>
								</tr>
							</table>
							<table data-toggle="table"  data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
								<thead>
										
										<th>No</th>
										<th>Nomor PP</th>
										<th>Nomor Antri</th>
										<th>Status PP</th>
										<th>Tanggal Lapor</th>
										<th>Tanggal Pengerjaan</th>
										<th>Action</th>
									
								</thead>
								<?php
								$sqlw = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
								$isi  = mysqli_fetch_array($sqlw);
								$sec  = $isi['section'];
								$sqla	=	mysqli_query($koneksi,"select * from tbl_pp where status_pp in ('on process') and section ='".$sec."'");
								$no = 1;
								while($data = mysqli_fetch_array($sqla)){
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td>
											<a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a>
										</td>
										<td><?php echo $data['no_antri']; ?></td>
										<td><?php echo $data['status_pp']; ?></td>
										<td><?php echo $data['tgl_lapor']; ?></td>
										<td><?php echo $data['tgl_m_kerja']; ?></td>
									<?php
									echo '<td>
											<a href="pp_approve.php?nopp='.$data['no_pp'].'" class="btn  btn-minier btn-primary">
											<i class="ace-icon fa fa-pencil-square-o"></i>
											APPROVE
																					</a></td>
										</tr>';
									}
								?>
							</table>
						</div>
		<div class="hr hr32 hr-dotted"></div>
		<div class="row">
		<?php if (isset($_POST['tombol'])){
				
				?>
		<form action="main_user.php" method="post">
		<table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="6" style=" background-color:#FF7C00;">Tabel History</td>
			</tr>
			
			<tr>
				<td style="width: 10%; border:0;">Bulan</td>
				<td style="width: 25%; border:0;">
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
				</td>
				<td style="width: 10%; border:0;">Tahun</td>
				<td style="width: 20%; border:0;">
				<select name="tahun" id="tahun">
					<?php
						$mulai= "2017";
						for($i = $mulai;$i<$mulai + 5;$i++){
							$sel = $i == $_POST['tahun'] ? ' selected="selected"' : '';
							echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
						}
						?>
										</select>
				</td>
				<td style="width: 5%; border:0;"></td>
				<td style="width: 30%; border:0;">
					<button type="submit" class="btn btn-primary btn-xs" style="width: 120px;" name="tombol"  value="SEARCH" id="tombol"><i class="ace-icon fa fa-search"></i> Search</button>
				</td>
			</tr>
			
			
		</table>
		</form>
		<table data-toggle="table" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
			<thead>
										
				<th>No</th>								
				<th>Nomor PP</th>
				<th>Status PP</th>
				<th>Tanggal Lapor</th>
				<th>Tanggal Pengerjaan</th>
				
									
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
				$sqlw = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
					$isi  = mysqli_fetch_array($sqlw);
					$sec  = $isi['section'];
				$sql	=	mysqli_query($koneksi,"select * from tbl_pp where section='".$sec."' and tgl_lapor like '".$thn."-".$bln."%'");
				$no = 1;
				while($data	=	mysqli_fetch_array($sql)){
					echo '<tr>';
					echo '<td>'.$no.'</td>';
						?>
						<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
						<?php
					echo '<td>'.$data['status_pp'].'</td>';
					echo '<td>'.$data['tgl_lapor'].'</td>';
					echo '<td>'.$data['tgl_m_kerja'].'</td>';
					echo '</tr>';
					$no++;
					}
				
		
		
		
		 } else {?>
		
		<form action="main_user.php" method="post">
		<table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="6" style=" background-color:#FF7C00;">Tabel History</td>
			</tr>
			
		<tr>
				<td style="width: 10%; border:0;">Bulan</td>
				<td style="width: 25%; border:0;">
					<select name="bulan" id="bulan">
										<?php
											$bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
											for($y=1;$y<=12;$y++){
												if($y==date('m')){ $pilih="selected";}
												else {$pilih="";}
						
												echo('<option value="'.$y.'"'.$pilih.'>'.$bulan[$y].'</option>'.'\n');
											}
										?>
										</select>
				</td>
				<td style="width: 10%; border:0;">Tahun</td>
				<td style="width: 20%; border:0;">
				<select name="tahun" id="tahun">
										<?php
											$mulai= "2017";
											for($i = $mulai;$i<$mulai + 5;$i++){
												$sel = $i == date('Y') ? ' selected="selected"' : '';
												echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
											}
											?>
										</select>
				</td>
				<td style="width: 5%; border:0;"></td>
				<td style="width: 30%; border:0;">
					<button type="submit" class="btn btn-primary btn-xs" style="width: 120px;" name="tombol" value="SEARCH" id="tombol"><i class="ace-icon fa fa-search"></i> Search</button>
				</td>
			</tr>
			
			
		</table>
		<table data-toggle="table" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
			<thead>
										
				<th>No</th>								
				<th>Nomor PP</th>
				<th>Status PP</th>
				<th>Tanggal Lapor</th>
				<th>Tanggal Pengerjaan</th>
				
									
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
				$sqlw = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
					$isi  = mysqli_fetch_array($sqlw);
					$sec  = $isi['section'];
				$sql	=	mysqli_query($koneksi,"select * from tbl_pp where section='".$sec."' and tgl_lapor like '".date('Y')."-".date('m')."%'");
				$no = 1;
				while($data	=	mysqli_fetch_array($sql)){
					echo '<tr>';
					echo '<td>'.$no.'</td>';
						?>
						<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
						<?php
					echo '<td>'.$data['status_pp'].'</td>';
					echo '<td>'.$data['tgl_lapor'].'</td>';
					echo '<td>'.$data['tgl_m_kerja'].'</td>';
					echo '</tr>';
					$no++;
					}
		} ?>
		</div>					
		</div>
									
					</div><!-- /.page-content -->
		
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
        
        //~ 
        
        
         $(function(){
            $(document).on('click','.edit-hold',function(e){
                e.preventDefault();
                $("#twoModal").modal('show');
                $.post('hold_modal.php',
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

