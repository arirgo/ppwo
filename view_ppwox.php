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
		<title>Dashboard - Section Head</title>

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
						<a href="main_section_h_it.php">Home</a>
					</li>
			</ul>
<!-- /.breadcrumb --></div>

		<div class="page-content">
			<div class="panel-body">
			
			<?php
			
			if(isset($_POST['tombol'])){
			?>
			<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-5">
						<div>
							<form action="view_ppwo.php" method="post">
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
											$mulai= date('Y');
											for($i = $mulai;$i<$mulai + 5;$i++){
												$sel = $i == $_POST['tahun'] ? ' selected="selected"' : '';
												echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
											}
											?>
										</select>
										
										<button type="submit" name="tombol" value="SEARCH"><i class="ace-icon fa fa-search"></i>Search</button>
									</td>
								</tr>
								<?php
									
										$tmp	=	$_POST['bulan'];
										if ($tmp<10){
										$bln	=	strval('0'.$tmp);
											
											}else {
												$bln	=	strval($tmp);										
												}
										$thn	=	$_POST['tahun'];
										$ed		= strval($thn.'-'.$bln);
									?>	
							</table>
							</form>
						</div>
					</div>
													<?php
														require_once("config.php");
														$thn1	=	$thn;
														$bln1	=	$bln;
														
													?>
												
									</div><!-- /.col -->
								</div><!-- /.row -->
							
							<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									<div class="col-sm-6">
										
<form method="post">					
<table data-toggle="table"   data-sort-name="name" data-sort-order="desc">
<thead>
<tr>
	<th data-sortable="true">Status Permintaan Perbaikan</th>
	<th  data-sortable="true">Total</th>
</tr>			
</thead>
<?php
	require_once('config.php');
	$sqlm	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='complete' and tgl_lapor like '".$thn."-".$bln."%' and tgl_s_kerja like '".$thn."-".$bln."%' and section = '".$akses['section']."'");
	$data1	=	mysqli_fetch_array($sqlm);
	$sqln	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='finish' and tgl_lapor like '".$thn."-".$bln."%' and tgl_s_kerja like '".$thn."-".$bln."%' and section = '".$akses['section']."'");
	$data2	=	mysqli_fetch_array($sqln);
	$sqlo	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='hold' and tgl_lapor like '".$thn."-".$bln."%'  and tgl_hold like '".$thn."-".$bln."%' and section = '".$akses['section']."'");
	$data3	=	mysqli_fetch_array($sqlo);
	$sqlp	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='on process' and tgl_lapor like '".$thn."-".$bln."%'  and tgl_m_kerja like '".$thn."-".$bln."%' and section = '".$akses['section']."'");
	$data4	=	mysqli_fetch_array($sqlp);
	$sqlq	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='waiting' and tgl_lapor like '".$thn."-".$bln."%' and section = '".$akses['section']."'");
	$data5	=	mysqli_fetch_array($sqlq);
	
	?>
		<tr>
				<td class="edit-record1">Complete</td>
				<td><?php echo $data1['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record2">Finish</td>
				<td><?php echo $data2['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record3">Hold</td>
				<td><?php echo $data3['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record4">On Process</td>
				<td><?php echo $data4['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record5">Waiting</td>
				<td><?php echo $data5['jml'];?></td>
		</tr>


						
</table>
</form>
									</div><!-- /.col -->

									<div class="col-sm-6">
<form method="post">					
<table data-toggle="table"   data-sort-name="name" data-sort-order="desc">
<thead>
<tr>
	<th data-sortable="true">Status Work Order</th>
	<th  data-sortable="true">Total</th>
</tr>			
</thead>
<?php
	require_once('config.php');
	$sqlr	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='finish' and tgl_permohonan like '".$thn."-".$bln."%' and tgl_s_kerja like '".$thn."-".$bln."%' and section = '".$akses['section']."'");
	$data6	=	mysqli_fetch_array($sqlr);
	$sqls	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='on process' and tgl_permohonan like '".$thn."-".$bln."%' and tgl_m_kerja like '".$thn."-".$bln."%' and section = '".$akses['section']."'");
	$data7	=	mysqli_fetch_array($sqls);
	$sqlt	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='hold' and tgl_permohonan like '".$thn."-".$bln."%' and tgl_hold like '".$thn."-".$bln."%' and section = '".$akses['section']."'");
	$data8	=	mysqli_fetch_array($sqlt);
	$sqlu	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='approved by SH' and tgl_permohonan like '".$thn."-".$bln."%' and section = '".$akses['section']."'");
	$data9	=	mysqli_fetch_array($sqlu);
	$sqlv	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='waiting' and tgl_permohonan like '".$thn."-".$bln."%' and section = '".$akses['section']."'");
	$data10	=	mysqli_fetch_array($sqlv);
	$sqlw	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo like 'reject%'  and tgl_permohonan like '".$thn."-".$bln."%' and tgl_reject like '".$thn."-".$bln."%' and section = '".$akses['section']."'");
	$data11	=	mysqli_fetch_array($sqlw);
	
	?>
		<tr>
				<td class="edit-record6">Finish</td>
				<td><?php echo $data6['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record7">On Process</td>
				<td><?php echo $data7['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record8">Hold</td>
				<td><?php echo $data8['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record9">Approved by SH</td>
				<td><?php echo $data9['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record10">Waiting</td>
				<td><?php echo $data10['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record11">Reject</td>
				<td><?php echo $data11['jml'];?></td>
		</tr>

						
</table>
</form>
									</div><!-- /.col -->
								</div><!-- /.row -->
								
<!-- JS ISSET -->
<script>
			
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('dt_hw_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
            
            $(document).on('click','.edit-record1',function(e){
				window.open('s_a_table_sh.php?n=complete&tgl1=<?php echo "".$ed.""; ?>&tgl2=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record2',function(e){
				window.open('s_a_table_sh.php?n=finish&tgl1=<?php echo "".$ed.""; ?>&tgl2=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record3',function(e){
				window.open('s_a_table_sh.php?n=hold&tgl1=<?php echo "".$ed.""; ?>&tgl2=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record4',function(e){
				window.open('s_a_table_sh.php?n=on process&tgl1=<?php echo "".$ed.""; ?>&tgl2=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record5',function(e){
				window.open('s_a_table_sh.php?n=waiting&tgl1=<?php echo "".$ed.""; ?>&tgl2=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
            $(document).on('click','.edit-record6',function(e){
				window.open('s_a_table_sh_wo.php?n=finish&tgl1=<?php echo "".$ed.""; ?>&tgl2=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record7',function(e){
				window.open('s_a_table_sh_wo.php?n=on process&tgl1=<?php echo "".$ed.""; ?>&tgl2=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record8',function(e){
				window.open('s_a_table_sh_wo.php?n=hold&tgl1=<?php echo "".$ed.""; ?>&tgl2=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record9',function(e){
				window.open('s_a_table_sh_wo.php?n=approved by SH&tgl1=<?php echo "".$ed.""; ?>&tgl2=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record10',function(e){
				window.open('s_a_table_sh_wo.php?n=waiting&tgl1=<?php echo "".$ed.""; ?>&tgl2=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
            $(document).on('click','.edit-record11',function(e){
				window.open('s_a_table_sh_wo.php?n=reject&tgl1=<?php echo "".$ed.""; ?>&tgl2=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
            
        });
        
    </script>


									<?php
									}else {
										?>
										
										
				<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-5">
						<div>
							<form action="view_ppwo.php" method="post">
							<table width="60%" class="table table-striped table-bordered table-hover">
								<tr>
									<?php
									
									?>
									<td colspan="3">
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
										&nbsp; - &nbsp;
										<select name="tahun" id="tahun">
										<?php
											$mulai= date('Y');
											for($i = $mulai;$i<$mulai + 5;$i++){
												$sel = $i == date('Y') ? ' selected="selected"' : '';
												echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
											}
											?>
										</select>
										
										<button type="submit" name="tombol" value="SEARCH"><i class="ace-icon fa fa-search"></i>Search</button>
									</td>
								</tr>
										
									
										<?php
										$thn1	= date('Y');
										$bln1	= date('m');
										$ed		= strval($thn1.'-'.$bln1);
										//~ echo $ed;
										?>						
							</table>
							</form>
						</div>
					</div>

									
									</div><!-- /.col -->
								</div><!-- /.row -->

								<div class="row">
									<div class="col-sm-6">
										
<form method="post">					
<table data-toggle="table"   data-sort-name="name" data-sort-order="desc">
<thead>
<tr>
	<th data-sortable="true">Status Permintaan Perbaikan</th>
	<th  data-sortable="true">Total</th>
</tr>			
</thead>
<?php
	require_once('config.php');
	$sqlm	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='complete' and tgl_lapor like '".$thn1."-".$bln1."%' and tgl_s_kerja like '".$thn1."-".$bln1."%' and section = '".$akses['section']."'");
	$data1	=	mysqli_fetch_array($sqlm);
	$sqln	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='finish' and tgl_lapor like '".$thn1."-".$bln1."%' and tgl_s_kerja like '".$thn1."-".$bln1."%' and section = '".$akses['section']."'");
	$data2	=	mysqli_fetch_array($sqln);
	$sqlo	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='hold' and tgl_lapor like '".$thn1."-".$bln1."%'  and tgl_hold like '".$thn1."-".$bln1."%' and section = '".$akses['section']."'");
	$data3	=	mysqli_fetch_array($sqlo);
	$sqlp	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='on process' and tgl_lapor like '".$thn1."-".$bln1."%'  and tgl_m_kerja like '".$thn1."-".$bln1."%' and section = '".$akses['section']."'");
	$data4	=	mysqli_fetch_array($sqlp);
	$sqlq	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='waiting' and tgl_lapor like '".$thn1."-".$bln1."%' and section = '".$akses['section']."'");
	$data5	=	mysqli_fetch_array($sqlq);
	
	?>
		<tr>
				<td class="edit-record1">Complete</td>
				<td><?php echo $data1['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record2">Finish</td>
				<td><?php echo $data2['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record3">Hold</td>
				<td><?php echo $data3['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record4">On Process</td>
				<td><?php echo $data4['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record5">Waiting</td>
				<td><?php echo $data5['jml'];?></td>
		</tr>


						
</table>
</form>
									</div><!-- /.col -->

									<div class="col-sm-6">
<form method="post">					
<table data-toggle="table"   data-sort-name="name" data-sort-order="desc">
<thead>
<tr>
	<th data-sortable="true">Status Work Order</th>
	<th  data-sortable="true">Total</th>
</tr>			
</thead>
<?php
	require_once('config.php');
	$sqlr	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='finish' and tgl_permohonan like '".$thn1."-".$bln1."%' and tgl_s_kerja like '".$thn1."-".$bln1."%' and section = '".$akses['section']."'");
	$data6	=	mysqli_fetch_array($sqlr);
	$sqls	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='on process' and tgl_permohonan like '".$thn1."-".$bln1."%' and tgl_m_kerja like '".$thn1."-".$bln1."%' and section = '".$akses['section']."'");
	$data7	=	mysqli_fetch_array($sqls);
	$sqlt	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='hold' and tgl_permohonan like '".$thn1."-".$bln1."%' and tgl_hold like '".$thn1."-".$bln1."%' and section = '".$akses['section']."'");
	$data8	=	mysqli_fetch_array($sqlt);
	$sqlu	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='approved by SH' and tgl_permohonan like '".$thn1."-".$bln1."%' and section = '".$akses['section']."'");
	$data9	=	mysqli_fetch_array($sqlu);
	$sqlv	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='waiting' and tgl_permohonan like '".$thn1."-".$bln1."%' and section = '".$akses['section']."'");
	$data10	=	mysqli_fetch_array($sqlv);
	$sqlw	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo like 'reject%'  and tgl_permohonan like '".$thn1."-".$bln1."%' and tgl_reject like '".$thn1."-".$bln1."%' and section = '".$akses['section']."'");
	$data11	=	mysqli_fetch_array($sqlw);
	
	?>
		<tr>
				<td class="edit-record6">Finish</td>
				<td><?php echo $data6['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record7">On Process</td>
				<td><?php echo $data7['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record8">Hold</td>
				<td><?php echo $data8['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record9">Approved by SH</td>
				<td><?php echo $data9['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record10">Waiting</td>
				<td><?php echo $data10['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record11">Reject</td>
				<td><?php echo $data11['jml'];?></td>
		</tr>

						
</table>
</form>
									</div><!-- /.col -->
								</div><!-- /.row -->



<!-- JS ELSE -->

<script>
			
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('dt_hw_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
            
            $(document).on('click','.edit-record1',function(e){
				window.open('s_a_table_sh.php?n=complete',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record2',function(e){
				window.open('s_a_table_sh.php?n=finish',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record3',function(e){
				window.open('s_a_table_sh.php?n=hold',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record4',function(e){
				window.open('s_a_table_sh.php?n=on process',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record5',function(e){
				window.open('s_a_table_sh.php?n=waiting',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
            $(document).on('click','.edit-record6',function(e){
				window.open('s_a_table_sh_wo.php?n=finish',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record7',function(e){
				window.open('s_a_table_sh_wo.php?n=on process',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record8',function(e){
				window.open('s_a_table_sh_wo.php?n=hold',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record9',function(e){
				window.open('s_a_table_sh_wo.php?n=approved by SH',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record10',function(e){
				window.open('s_a_table_sh_wo.php?n=waiting',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
            $(document).on('click','.edit-record11',function(e){
				window.open('s_a_table_sh_wo.php?n=reject',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
            
        });
        
    </script>



														<?php
										
										}
								?>	
													
			
				
									
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->


<?php include "menu-bawah.php"; ?>
		<script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>
		
		
	
</body>
</html>


