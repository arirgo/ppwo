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
						
		<div class="row">
		<?php if (isset($_POST['tombol'])){
				
				?>
		<form action="report_project_program.php" method="post">
		<table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="9" style=" background-color:#FF7C00;">Tabel Report</td>
			</tr>
			
			<tr>
				<td style="width: 5%; border:0;">Status Project</td>
				<td style="width: 5%; border:0;">	
					<select name="statpro" id="statpro">
						<option value="all" selected>All</option>
						<option value="wait">Waiting</option>					
					</select>
				</td>
				<td style="width: 5%; border:0;">Bulan</td>
				<td style="width: 15%; border:0;">
					<select name="bulan" id="bulan">
						<?php
							$bulan = array("All", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
							for($y=0;$y<=12;$y++){
								if($y==$_POST['bulan']){ $pilih="selected";}
									else {$pilih="";}
									echo('<option value="'.$y.'"'.$pilih.'>'.$bulan[$y].'</option>'.'\n');
							}
						?>
					</select>
				</td>
				<td style="width: 5%; border:0;">Tahun</td>
				<td style="width: 15%; border:0;">
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
				<td style="width: 10%; border:0;">Urut berdasarkan</td>
				<td style="width: 15%; border:0;">
				<select name="urut" id="urut">
					<option value="no_pp" selected>Nomor PP</option>
					<option value="section">Section</option>
					<option value="tgl_lapor">Tgl Lapor</option>
					<option value="tgl_s_kerja">Tgl Selesai</option>
					<option value="diterima">Dikerjakan</option>
					<option value="status_pp">Status</option>
					<option value="downtime">Downtime</option>
				</select>
				</td>
				<td style="width: 5%; border:0;">
				<select name="from" id="from">
					<option value="ASC">ASC</option>
					<option value="DESC">DESC</option>
				</select>
				</td>
				<td style="width: 5%; border:0;"></td>
				<td style="width: 25%; border:0;">
					<button type="submit" class="btn btn-primary btn-xs" style="width: 120px;" name="tombol"  value="SEARCH" id="tombol"><i class="ace-icon fa fa-search"></i> Search</button>
				</td>
			</tr>
			
			
		</table>
		</form>
		<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
			<thead>
				<?php
				$abul = $_POST['bulan'];
				if ($abul<10){
					$abul	=	strval('0'.$abul);
				}else {
					$abul	=	strval($abul);										
					}
				$atah = $_POST['tahun'];
				?>
				<a href="export_report_project.php?tahun=<?php echo $atah; ?>&bulan=<?php echo $abul; ?>">Export ke Excell</a><br><br>							
				<th>No</th>								
				<th>Nomor PP/WO</th>
				<th>Keterangan</th>
				<th>Section</th>
				<th>Tgl Lapor</th>
				<th>Tgl Selesai</th>
				<th>Dikerjakan</th>
				<th>Status</th>
				<th>Jenis</th>
				
									
			</thead>
		<?php
			$tmp	=	$_POST['bulan'];
			$urut	=	$_POST['urut'];
			$from	=	$_POST['from'];
			$stat	=	$_POST['statpro'];
				if ($tmp<10){
					$bln	=	strval('0'.$tmp);
				}else {
					$bln	=	strval($tmp);										
					}
					$thn	=	$_POST['tahun'];
					$ed		= strval($thn.'-'.$bln);
				require_once("config.php");
				if($stat=='all'){
					$sql	=	mysqli_query($koneksi,"select * from tbl_pp where tgl_s_kerja like '".$thn."-".$bln."%' and it='prog'");
				}else{
					$sql	=	mysqli_query($koneksi,"select * from tbl_pp where it='prog' and not(status_pp in ('finish','complete'))");
				}
				$no = 1;
				while($data	=	mysqli_fetch_array($sql)){
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$data['no_pp'].'</td>';
					echo '<td>'.$data['kerusakan'].'</td>';
					echo '<td>'.$data['section'].'</td>';
					echo '<td>'.$data['tgl_lapor'].'</td>';
					echo '<td>'.$data['tgl_s_kerja'].'</td>';
					echo '<td>'.$data['diterima'].'</td>';
					echo '<td>'.$data['status_pp'].'</td>';
					echo '<td>PP</td>';
					echo '</tr>';
					$no++;
					}
				
				
				if($stat=='all'){
					$sql	=	mysqli_query($koneksi,"select * from tbl_wo where tgl_s_kerja like '".$thn."-".$bln."%' and it='prog'");
				}else{
					$sql	=	mysqli_query($koneksi,"select * from tbl_wo where it='prog' and not(status_wo in ('finish','complete'))");
				}
				$no = 1;
				while($data	=	mysqli_fetch_array($sql)){
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$data['no_wo'].'</td>';
					echo '<td>'.$data['uraian_pekerjaan'].'</td>';
					echo '<td>'.$data['section'].'</td>';
					echo '<td>'.$data['tgl_permohonan'].'</td>';
					echo '<td>'.$data['tgl_s_kerja'].'</td>';
					echo '<td>'.$data['diterima'].'</td>';
					echo '<td>'.$data['status_wo'].'</td>';
					echo '<td>WO</td>';
					echo '</tr>';
					$no++;
					}
		
		
		 } else {?>
		
		<form action="report_project_program.php" method="post">
		<table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="9" style=" background-color:#FF7C00;">Tabel Report</td>
			</tr>
			
		<tr>
				<td style="width: 5%; border:0;">Status Project</td>
				<td style="width: 5%; border:0;">	
					<select name="statpro" id="statpro">
						<option value="all" selected>All</option>
						<option value="wait">Waiting</option>					
					</select>
				</td>
				<td style="width: 5%; border:0;">Bulan</td>
				<td style="width: 15%; border:0;">
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
				<td style="width: 5%; border:0;">Tahun</td>
				<td style="width: 15%; border:0;">
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
				<td style="width: 10%; border:0;">Urut berdasarkan</td>
				<td style="width: 15%; border:0;">
				<select name="urut" id="urut" disabled>
					<option value="no_pp" selected>Nomor PP</option>
					<option value="section">Section</option>
					<option value="tgl_lapor">Tgl Lapor</option>
					<option value="tgl_s_kerja">Tgl Selesai</option>
					<option value="diterima">Dikerjakan</option>
					<option value="status_pp">Status</option>
					<option value="downtime">Downtime</option>
				</select>
				</td>
				<td style="width: 5%; border:0;">
				<select name="from" id="from">
					<option value="ASC">ASC</option>
					<option value="DESC">DESC</option>
				</select>
				</td>
				<td style="width: 5%; border:0;"></td>
				<td style="width: 25%; border:0;">
					<button type="submit" class="btn btn-primary btn-xs" style="width: 120px;" name="tombol" value="SEARCH" id="tombol"><i class="ace-icon fa fa-search"></i> Search</button>
				</td>
			</tr>
			
			
		</table>
		</form>
		<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
			<thead>
				<?php
				$abul = date('m');
				$atah = date('Y');
				?>
				<a href="export_report_project.php?tahun=<?php echo $atah; ?>&bulan=<?php echo $abul; ?>">Export ke Excell</a><br><br>							
				<th>No</th>								
				<th>Nomor PP</th>
				<th>Section</th>
				<th>Tgl Lapor</th>
				<th>Tgl Selesai</th>
				<th>Dikerjakan</th>
				<th>Status</th>
				<th>Downtime</th>
				
									
			</thead>
		<?php
			$tmp	=	$_POST['bulan'];
			$urut	=	$_POST['urut'];
			$from	=	$_POST['from'];
			$stat	=	$_POST['statpro'];
				if ($tmp<10){
					$bln	=	strval('0'.$tmp);
				}else {
					$bln	=	strval($tmp);										
					}
					$thn	=	$_POST['tahun'];
					$ed		= strval($thn.'-'.$bln);
				require_once("config.php");
				
				
				$no = 1;
				while($data	=	mysqli_fetch_array($sql)){
					echo '<tr>';
					echo '<td>'.$no.'</td>';
						?>
						<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
						<?php
					echo '<td>'.$data['section'].'</td>';
					echo '<td>'.$data['tgl_lapor'].'</td>';
					echo '<td>'.$data['tgl_s_kerja'].'aa</td>';
					echo '<td>'.$data['diterima'].'</td>';
					echo '<td>'.$data['status_pp'].'</td>';
					echo '<td>'.$data['downtime'].'</td>';
					echo '</tr>';
					$no++;
					}
		} ?>
		</table>
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

