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
			<div class="page-header">
				<h1>
					
				</h1>
			</div><!-- /.page-header -->
			<!-- -->
			
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:1100px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail Hardware</h4>
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
			<div class="modal fade" id="twoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:1100px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail Software</h4>
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
			<div class="modal fade" id="triModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:1100px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail Network</h4>
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
			<div class="modal fade" id="fourModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:1100px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail Telepon</h4>
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
			<div class="modal fade" id="tampil2Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:1100px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail Teknisi</h4>
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
			
			if(isset($_POST['tombol'])){
				
			?>
			<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-5">
						<div>
							<form action="main_section_h_it.php" method="post">
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
											$mulai= "2017";
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
									<tr>
									<td colspan="3">Downtime Infrastruktur</td>
								</tr>
								<tr>
									<td>Error downtime</td>
									<td align="right">
										<?php
										require_once("config.php");
										$sql	=	mysqli_query($koneksi,"select sum(downtime) as dt from tbl_pp where status_pp in ('finish','complete') and tgl_lapor like '".$thn."-".$bln."%' and tgl_s_kerja like '".$thn."-".$bln."%' and diterima in (select nama from user where dev = 'inf')");
										$data	=	mysqli_fetch_array($sql);
										echo "".$data['dt']." minutes";
										?>
									</td>
									<td align="right">
									<?php
										$h	=	strval($data['dt'] / 60);
										echo "".number_format($h,2)." Hours";
									?>
									</td>
								</tr>
								<?php
									$valtgl = $thn."-".$bln;
									if ($valtgl<'2018-03'){
								?>
								<tr>
									<td>Work Hour</td>
									<td align="right" colspan="2" style=" background-color:#FFC52A;">720 Hours</td>
								</tr>
								<tr>
									<td>Target</td>
									<td align="right" style=" background-color:#FFC52A;">2%</td>
									<td align="right">
										<?php
											$pdt =	strval(($h / 600)*100);
											echo	"".number_format($pdt,2)." %";
										?>
									</td>
								</tr>
								<?php
									}else {
									?>
								<tr>
									<?php
										$que = mysqli_query($koneksi,"SELECT count(nama_komputer) as jmlpc from master_komputer");
										$datq = mysqli_fetch_array($que);
										$ttlpc = $datq['jmlpc'];
										$ttlhrpc = $ttlpc * 720;
									?>
									<td>Waktu Kerja Seluruh Komputer (<?php echo $ttlpc; ?>)</td>
									
									<td align="right" colspan="2" style=" background-color:#FFC52A;"><?php echo $ttlhrpc; ?> Hours</td>
								</tr>
								<tr>
									<td>Target</td>
									<td align="right" style=" background-color:#FFC52A;">2%</td>
									<td align="right">
										<?php
											$pdt =	strval(($h / $ttlhrpc)*100);
											echo	"".number_format($pdt,2)." %";
										?>
									</td>
								</tr>
								<?php
									}
								?>
							</table>
							<br>
							<?php 
							require_once("config.php");
							$sql01	=	mysqli_query($koneksi,"select count(status_pp) as sp from tbl_pp where status_pp in('finish','complete') and diterima ='Beryl' and tgl_lapor like '".$thn."-".$bln."%'");
							$data01	=	mysqli_fetch_array($sql01);
							$sql02	=	mysqli_query($koneksi,"select count(status_pp) as sp from tbl_pp where status_pp in('finish','complete') and diterima ='Nurul' and tgl_lapor like '".$thn."-".$bln."%'");
							$data02	=	mysqli_fetch_array($sql02);
							$sql05	=	mysqli_query($koneksi,"select count(status_wo) as sw from tbl_wo where status_wo in('finish','complete') and diterima ='Beryl' and tgl_permohonan like '".$thn."-".$bln."%'");
							$data05	=	mysqli_fetch_array($sql05);
							$sql06	=	mysqli_query($koneksi,"select count(status_wo) as sw from tbl_wo where status_wo in('finish','complete') and diterima ='Nurul' and tgl_permohonan like '".$thn."-".$bln."%'");
							$data06	=	mysqli_fetch_array($sql06);
							$sql03	=	mysqli_query($koneksi,"select no_pp from tbl_pp where status_pp in('on process') and diterima='Beryl' and tgl_lapor like '".$thn."-".$bln."%'");
							$data03	=	mysqli_fetch_array($sql03);
							$sql04	=	mysqli_query($koneksi,"select no_pp from tbl_pp where status_pp in('on process') and diterima='Nurul' and tgl_lapor like '".$thn."-".$bln."%'");
							$data04	=	mysqli_fetch_array($sql04);
							
							?>
							<table width="60%" class="table table-striped table-bordered table-hover">
								<tr>
									<td colspan="4">Beryl</td>
								</tr>
								<tr>
									<td>On Process</td>
									<td><?php if ($data03['no_pp']=="") {echo "-";} else {?><a href="#" class="edit-tampil2" data-id="<?php echo $data03['no_pp']; ?>" ><?php echo $data03['no_pp']; ?></a><?php }?></td>
									<td>PP dan WO Finish/Complete</td>
									<td><?php $total = $data01['sp']+$data05['sw']; echo "".$total."";?></td>
								</tr>
								<tr>
									<td colspan="4">Nurul</td>
								</tr>
								<tr>
									<td>On Process</td>
									<td><?php if ($data04['no_pp']=="") {echo "-";} else {?><a href="#" class="edit-tampil2" data-id="<?php echo $data04['no_pp']; ?>" ><?php echo $data04['no_pp']; ?></a><?php }?></td>
									<td>PP dan WO Finish/Complete</td>
									<td><?php $total2 = $data02['sp'] + $data06['sw']; echo "".$total2."";?></td>
								</tr>
							</table>
							</form>
							
						</div>
					</div>

									<div class="vspace-12-sm"></div>

									<div class="col-sm-7">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5 class="widget-title">
													<i class="ace-icon fa fa-signal"></i>
													Pie Chart
												</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="piechart-placeholder"></div>

													<div class="hr hr8 hr-double"></div>
													<?php
														require_once("config.php");
														$thn1	=	$thn;
														$bln1	=	$bln;
														$sqla	=	mysqli_query($koneksi,"SELECT (select count(id) from dt_pp where category='Hardware' and tgl_tambah like '".$thn1."-".$bln1."%') as HW, (select count(id) from dt_pp where category='Software' and tgl_tambah like '".$thn1."-".$bln1."%') as SW, (select count(id) from dt_pp where category='Network' and tgl_tambah like '".$thn1."-".$bln1."%') as NW, (select count(id) from dt_pp where category='Telepon' and tgl_tambah like '".$thn1."-".$bln1."%') as TP from dt_pp GROUP BY 1");
														$dataa	=	mysqli_fetch_array($sqla);
													?>
													<div class="clearfix">
														<div class="grid3">
															<span class="red"><b><a class="edit-record" data-id="<?php echo "".$ed.""; ?>" style=" color:#CB0006;">Hardware</a></b></span>
															<span class="bigger pull-right"><?php echo "".$dataa['HW'].""; ?></span>
														</div>
														<div class="grid3">
															<span class="blue"><b><a class="edit-sw" data-id="<?php echo "".$ed.""; ?>" style=" color:#0000FF;">Software</a></b></span>
															<span class="bigger pull-right"><?php echo "".$dataa['SW'].""; ?></span>
														</div>
														<div class="grid3">
															<span class="green"><b><a class="edit-nw" data-id="<?php echo "".$ed.""; ?>" style=" color:#008000;">Network</a></b></span>
															<span class="bigger pull-right"><?php echo "".$dataa['NW'].""; ?></span>
														</div>
														<div class="grid3">
															<span class="purple"><b><a class="edit-tp" data-id="<?php echo "".$ed.""; ?>" style=" color:#800080;">Telepon</a></b></span>
															<span class="bigger pull-right"><?php echo "".$dataa['TP'].""; ?></span>
														</div>
													</div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
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
	$sqlm	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='complete' and tgl_lapor like '".$thn."-".$bln."%' and tgl_s_kerja like '".$thn."-".$bln."%'");
	$data1	=	mysqli_fetch_array($sqlm);
	$sqln	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='finish' and tgl_lapor like '".$thn."-".$bln."%' and tgl_s_kerja like '".$thn."-".$bln."%'");
	$data2	=	mysqli_fetch_array($sqln);
	$sqlo	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='hold' and tgl_lapor like '".$thn."-".$bln."%'  and tgl_hold like '".$thn."-".$bln."%'");
	$data3	=	mysqli_fetch_array($sqlo);
	$sqlp	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='on process' and tgl_lapor like '".$thn."-".$bln."%'  and tgl_m_kerja like '".$thn."-".$bln."%'");
	$data4	=	mysqli_fetch_array($sqlp);
	$sqlq	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='waiting' and tgl_lapor like '".$thn."-".$bln."%'");
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
	$sqlr	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='finish' and tgl_permohonan like '".$thn."-".$bln."%' and tgl_s_kerja like '".$thn."-".$bln."%'");
	$data6	=	mysqli_fetch_array($sqlr);
	$sqls	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='on process' and tgl_permohonan like '".$thn."-".$bln."%' and tgl_m_kerja like '".$thn."-".$bln."%'");
	$data7	=	mysqli_fetch_array($sqls);
	$sqlt	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='hold' and tgl_permohonan like '".$thn."-".$bln."%'");
	$data8	=	mysqli_fetch_array($sqlt);
	$sqlu	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='approved by SH' and tgl_permohonan like '".$thn."-".$bln."%'");
	$data9	=	mysqli_fetch_array($sqlu);
	$sqlv	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='waiting' and tgl_permohonan like '".$thn."-".$bln."%'");
	$data10	=	mysqli_fetch_array($sqlv);
	$sqlw	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo like 'reject%'  and tgl_permohonan like '".$thn."-".$bln."%'");
	$data11	=	mysqli_fetch_array($sqlw);
	$sqlx	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='approved by IT'  and tgl_permohonan like '".$thn."-".$bln."%'");
	$data12	=	mysqli_fetch_array($sqlx);
	$sqlz	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='accepted by IT'  and tgl_permohonan like '".$thn."-".$bln."%'");
	$data13	=	mysqli_fetch_array($sqlz);
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
				<td class="edit-record12">Approved by IT</td>
				<td><?php echo $data12['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record13">Accepted by IT</td>
				<td><?php echo $data13['jml'];?></td>
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
                $.post('dt_hw_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
            
             $(document).on('click','.edit-record1',function(e){
				window.open('s_a_table.php?n=complete&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record2',function(e){
				window.open('s_a_table.php?n=finish&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record3',function(e){
				window.open('s_a_table.php?n=hold&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record4',function(e){
				window.open('s_a_table.php?n=on process&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record5',function(e){
				window.open('s_a_table.php?n=waiting&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
            $(document).on('click','.edit-record6',function(e){
				window.open('s_a_table_wo.php?n=finish&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record7',function(e){
				window.open('s_a_table_wo.php?n=on process&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record8',function(e){
				window.open('s_a_table_wo.php?n=hold&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record9',function(e){
				window.open('s_a_table_wo.php?n=approved by SH&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record10',function(e){
				window.open('s_a_table_wo.php?n=waiting&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
            $(document).on('click','.edit-record11',function(e){
				window.open('s_a_table_wo.php?n=reject&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
             $(document).on('click','.edit-record12',function(e){
				window.open('s_a_table_wo.php?n=approved by IT&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            $(document).on('click','.edit-record13',function(e){
				window.open('s_a_table_wo.php?n=accepted by IT&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
            
        });
        
         $(function(){
            $(document).on('click','.edit-sw',function(e){
                e.preventDefault();
                $("#twoModal").modal('show');
                $.post('dt_sw_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        $(function(){
            $(document).on('click','.edit-tampil2',function(e){
                e.preventDefault();
                $("#tampil2Modal").modal('show');
                $.post('tampil_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        $(function(){
            $(document).on('click','.edit-nw',function(e){
                e.preventDefault();
                $("#triModal").modal('show');
                $.post('dt_nw_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        $(function(){
            $(document).on('click','.edit-tp',function(e){
                e.preventDefault();
                $("#fourModal").modal('show');
                $.post('dt_tp_modal.php',
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
        
        jQuery(function($) {
				
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "Hardware",  data: <?php echo "".$dataa['HW'].""; ?>, color: "#EC000C"},
				{ label: "Software",  data: <?php echo "".$dataa['SW'].""; ?>, color: "#000DFF"},
				{ label: "Network",  data: <?php echo "".$dataa['NW'].""; ?>, color: "#07A70B"},
				{ label: "Telepon",  data: <?php echo "".$dataa['TP'].""; ?>, color: "#B2008E"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var bulat = item.series['percent'].toFixed(2);
						var tip = item.series['label'] + " : " +bulat+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				
				
			
			})
    </script>

									<?php
									}else {
									
									?>
									
									<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-5">
						<div>
							<form action="main_section_h_it.php" method="post">
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
											$mulai= "2017";
											for($i = $mulai;$i<$mulai + 5;$i++){
												$sel = $i == date('Y') ? ' selected="selected"' : '';
												echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
											}
											?>
										</select>
										
										<button type="submit" name="tombol" value="SEARCH"><i class="ace-icon fa fa-search"></i>Search</button>
									</td>
								</tr>	
									
									<tr>
									<td colspan="3">Downtime Infrastruktur</td>
								</tr>
								<tr>
									<td>Error downtime</td>
									<td align="right">
										<?php
										$thn	= date('Y');
										$bln	= date('m');
										$ed		= strval($thn.'-'.$bln);
										//~ echo $ed;
										require_once("config.php");
										$sql	=	mysqli_query($koneksi,"select sum(downtime) as dt from tbl_pp where status_pp in ('finish','complete') and tgl_lapor like '".$thn."-".$bln."%' and tgl_s_kerja like '".$thn."-".$bln."%' and diterima in (select nama from user where dev = 'inf')");
										$data	=	mysqli_fetch_array($sql);
										echo "".$data['dt']." minutes";
										?>
									</td>
									<td align="right">
									<?php
										$h	=	strval($data['dt'] / 60);
										echo "".number_format($h,2)." Hours";
									?>
									</td>
								</tr>
								<tr>
									<?php
										$que = mysqli_query($koneksi,"SELECT count(nama_komputer) as jmlpc from master_komputer");
										$datq = mysqli_fetch_array($que);
										$ttlpc = $datq['jmlpc'];
										$ttlhrpc = $ttlpc * 720;
									?>
									<td>Waktu Kerja Seluruh Komputer (<?php echo $ttlpc; ?>)</td>
									
									<td align="right" colspan="2" style=" background-color:#FFC52A;"><?php echo $ttlhrpc; ?> Hours</td>
								</tr>
								<tr>
									<td>Target</td>
									<td align="right" style=" background-color:#FFC52A;">2%</td>
									<td align="right">
										<?php
											$pdt =	strval(($h / $ttlhrpc)*100);
											echo	"".number_format($pdt,2)." %";
										?>
									</td>
								</tr>						
							</table>
							<br>
							<?php 
							require_once("config.php");
							$sql01	=	mysqli_query($koneksi,"select count(status_pp) as sp from tbl_pp where status_pp in('finish','complete') and diterima ='Beryl' and tgl_lapor like '".$thn."-".$bln."%'");
							$data01	=	mysqli_fetch_array($sql01);
							$sql02	=	mysqli_query($koneksi,"select count(status_pp) as sp from tbl_pp where status_pp in('finish','complete') and diterima ='Nurul' and tgl_lapor like '".$thn."-".$bln."%'");
							$data02	=	mysqli_fetch_array($sql02);
							$sql05	=	mysqli_query($koneksi,"select count(status_wo) as sw from tbl_wo where status_wo in('finish','complete') and diterima ='Beryl' and tgl_permohonan like '".$thn."-".$bln."%'");
							$data05	=	mysqli_fetch_array($sql05);
							$sql06	=	mysqli_query($koneksi,"select count(status_wo) as sw from tbl_wo where status_wo in('finish','complete') and diterima ='Nurul' and tgl_permohonan like '".$thn."-".$bln."%'");
							$data06	=	mysqli_fetch_array($sql06);
							$sql03	=	mysqli_query($koneksi,"select no_pp from tbl_pp where status_pp in('on process') and diterima='Beryl' and tgl_lapor like '".$thn."-".$bln."%'");
							$data03	=	mysqli_fetch_array($sql03);
							$sql04	=	mysqli_query($koneksi,"select no_pp from tbl_pp where status_pp in('on process') and diterima='Nurul' and tgl_lapor like '".$thn."-".$bln."%'");
							$data04	=	mysqli_fetch_array($sql04);
							
							?>
							<table width="60%" class="table table-striped table-bordered table-hover">
								<tr>
									<td colspan="4">Beryl</td>
								</tr>
								<tr>
									<td>On Process</td>
									<td><?php if ($data03['no_pp']=="") {echo "-";} else {?><a href="#" class="edit-tampil2" data-id="<?php echo $data03['no_pp']; ?>" ><?php echo $data03['no_pp']; ?></a><?php }?></td>
									<td>PP dan WO Finish/Complete</td>
									<td><?php $total = $data01['sp']+$data05['sw']; echo "".$total."";?></td>
								</tr>
								<tr>
									<td colspan="4">Nurul</td>
								</tr>
								<tr>
									<td>On Process</td>
									<td><?php if ($data04['no_pp']=="") {echo "-";} else {?><a href="#" class="edit-tampil2" data-id="<?php echo $data04['no_pp']; ?>" ><?php echo $data04['no_pp']; ?></a><?php }?></td>
									<td>PP dan WO Finish/Complete</td>
									<td><?php $total2 = $data02['sp'] + $data06['sw']; echo "".$total2."";?></td>
								</tr>
							</table>
							</form>
						</div>
					</div>

									<div class="vspace-12-sm"></div>

									<div class="col-sm-7">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5 class="widget-title">
													<i class="ace-icon fa fa-signal"></i>
													Pie Chart
												</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="piechart-placeholder"></div>

													<div class="hr hr8 hr-double"></div>
													<?php
														require_once("config.php");
														$thn1	=	date('Y');
														$bln1	=	date('m');
														$sqla	=	mysqli_query($koneksi,"SELECT (select count(id) from dt_pp where category='Hardware' and tgl_tambah like '".$thn1."-".$bln1."%') as HW, (select count(id) from dt_pp where category='Software' and tgl_tambah like '".$thn1."-".$bln1."%') as SW, (select count(id) from dt_pp where category='Network' and tgl_tambah like '".$thn1."-".$bln1."%') as NW, (select count(id) from dt_pp where category='Telepon' and tgl_tambah like '".$thn1."-".$bln1."%') as TP from dt_pp GROUP BY 1");
														$dataa	=	mysqli_fetch_array($sqla);
													?>
													<div class="clearfix">
														<div class="grid3">
															<span class="red"><b><a class="edit-record" data-id="<?php echo "".$ed.""; ?>" style=" color:#CB0006;">Hardware</a></b></span>
															<span class="bigger pull-right"><?php echo "".$dataa['HW'].""; ?></span>
														</div>
														<div class="grid3">
															<span class="blue"><b><a class="edit-sw" data-id="<?php echo "".$ed.""; ?>" style=" color:#0000FF;">Software</a></b></span>
															<span class="bigger pull-right"><?php echo "".$dataa['SW'].""; ?></span>
														</div>
														<div class="grid3">
															<span class="green"><b><a class="edit-nw" data-id="<?php echo "".$ed.""; ?>" style=" color:#008000;">Network</a></b></span>
															<span class="bigger pull-right"><?php echo "".$dataa['NW'].""; ?></span>
														</div>
														<div class="grid3">
															<span class="purple"><b><a class="edit-tp" data-id="<?php echo "".$ed.""; ?>" style=" color:#800080;">Telepon</a></b></span>
															<span class="bigger pull-right"><?php echo "".$dataa['TP'].""; ?></span>
														</div>
														
														</div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
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
	$sqlm	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='complete' and tgl_lapor like '".$thn1."-".$bln1."%' and tgl_s_kerja like '".$thn1."-".$bln1."%'");
	$data1	=	mysqli_fetch_array($sqlm);
	$sqln	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='finish' and tgl_lapor like '".$thn1."-".$bln1."%' and tgl_s_kerja like '".$thn1."-".$bln1."%'");
	$data2	=	mysqli_fetch_array($sqln);
	$sqlo	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='hold' and tgl_lapor like '".$thn1."-".$bln1."%'  and tgl_hold like '".$thn1."-".$bln1."%'");
	$data3	=	mysqli_fetch_array($sqlo);
	$sqlp	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='on process' and tgl_lapor like '".$thn1."-".$bln1."%'  and tgl_m_kerja like '".$thn1."-".$bln1."%'");
	$data4	=	mysqli_fetch_array($sqlp);
	$sqlq	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='waiting' and tgl_lapor like '".$thn1."-".$bln1."%'");
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
	$sqlr	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='finish' and tgl_permohonan like '".$thn1."-".$bln1."%' and tgl_s_kerja like '".$thn1."-".$bln1."%'");
	$data6	=	mysqli_fetch_array($sqlr);
	$sqls	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='on process' and tgl_permohonan like '".$thn1."-".$bln1."%' and tgl_m_kerja like '".$thn1."-".$bln1."%'");
	$data7	=	mysqli_fetch_array($sqls);
	$sqlt	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='hold' and tgl_permohonan like '".$thn1."-".$bln1."%'");
	$data8	=	mysqli_fetch_array($sqlt);
	$sqlu	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='approved by SH' and tgl_permohonan like '".$thn1."-".$bln1."%'");
	$data9	=	mysqli_fetch_array($sqlu);
	$sqlv	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='waiting' and tgl_permohonan like '".$thn1."-".$bln1."%'");
	$data10	=	mysqli_fetch_array($sqlv);
	$sqlw	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo like 'reject%'  and tgl_permohonan like '".$thn1."-".$bln1."%'");
	$data11	=	mysqli_fetch_array($sqlw);
	$sqlx	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='approved by IT'  and tgl_permohonan like '".$thn."-".$bln."%'");
	$data12	=	mysqli_fetch_array($sqlx);
	$sqly	=	mysqli_query($koneksi,"select status_wo, count(status_wo) as jml from tbl_wo where status_wo='accepted by IT'  and tgl_permohonan like '".$thn."-".$bln."%'");
	$data13	=	mysqli_fetch_array($sqly);
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
				<td class="edit-record12">Approved by IT</td>
				<td><?php echo $data12['jml'];?></td>
		</tr>
		<tr>
				<td class="edit-record13">Accepted by IT</td>
				<td><?php echo $data13['jml'];?></td>
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
                $.post('dt_hw_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
            
             $(document).on('click','.edit-record1',function(e){
				window.open('s_a_table.php?n=complete&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record2',function(e){
				window.open('s_a_table.php?n=finish&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record3',function(e){
				window.open('s_a_table.php?n=hold&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record4',function(e){
				window.open('s_a_table.php?n=on process&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record5',function(e){
				window.open('s_a_table.php?n=waiting&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
            $(document).on('click','.edit-record6',function(e){
				window.open('s_a_table_wo.php?n=finish&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record7',function(e){
				window.open('s_a_table_wo.php?n=on process&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record8',function(e){
				window.open('s_a_table_wo.php?n=hold&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record9',function(e){
				window.open('s_a_table_wo.php?n=approved by SH&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
             $(document).on('click','.edit-record10',function(e){
				window.open('s_a_table_wo.php?n=waiting&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
            $(document).on('click','.edit-record11',function(e){
				window.open('s_a_table_wo.php?n=reject&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
            $(document).on('click','.edit-record12',function(e){
				window.open('s_a_table_wo.php?n=approved by IT&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            $(document).on('click','.edit-record13',function(e){
				window.open('s_a_table_wo.php?n=accepted by IT&tgl1=<?php echo "".$ed.""; ?>',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
            
        });
        
         $(function(){
            $(document).on('click','.edit-sw',function(e){
                e.preventDefault();
                $("#twoModal").modal('show');
                $.post('dt_sw_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
         $(function(){
            $(document).on('click','.edit-tampil2',function(e){
                e.preventDefault();
                $("#tampil2Modal").modal('show');
                $.post('tampil_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        $(function(){
            $(document).on('click','.edit-nw',function(e){
                e.preventDefault();
                $("#triModal").modal('show');
                $.post('dt_nw_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        $(function(){
            $(document).on('click','.edit-tp',function(e){
                e.preventDefault();
                $("#fourModal").modal('show');
                $.post('dt_tp_modal.php',
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
        
        jQuery(function($) {
				
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "Hardware",  data: <?php echo "".$dataa['HW'].""; ?>, color: "#EC000C"},
				{ label: "Software",  data: <?php echo "".$dataa['SW'].""; ?>, color: "#000DFF"},
				{ label: "Network",  data: <?php echo "".$dataa['NW'].""; ?>, color: "#07A70B"},
				{ label: "Telepon",  data: <?php echo "".$dataa['TP'].""; ?>, color: "#B2008E"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var bulat = item.series['percent'].toFixed(2);
						var tip = item.series['label'] + " : " +bulat+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				
				
			
			})
    </script>
					
														<?php
										
										}
								?>	
													
			
				
									
				
	
</body>
</html>

