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
		<title>Penilaian PP/WO</title>

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
				<li class="active">Penilaian PP/WO</li>
			</ul><!-- /.breadcrumb -->

					</div>

<?php
if(isset($_POST['tombol'])){?>
	<div class="panel-body">
<div class="row">

	
<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-3">
						<div>
							<form action="view_performance.php" method="post">
							<table width="60%" class="table table-striped table-bordered table-hover">
								<tr>
									
									<td colspan="3">
										<div class="input-group">
                                            <input class="form-control date-picker" id="tgl1" name='tgl1' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
									
										&nbsp; - &nbsp;
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="tgl2" name='tgl2' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
										<button type="submit" name="tombol" value="SEARCH"><i class="ace-icon fa fa-search"></i>Search</button>
									</td>
								</tr>
								
							</table>
							</form>
						</div>
					</div>
												
									</div><!-- /.col -->
								</div><!-- /.row -->
					  <?php

$tgl1=$_POST['tgl1'];
  $tgl2=$_POST['tgl2'];
                            ?>		
	<h3>PERIODE : <?php echo $tgl1 ?> S/D <?php echo $tgl2; ?></h3>	
<?php 

$no=1;
$sqlmcek	=	mysqli_query($koneksi,"select*from user where dev in('inf','pro') and username in('it01','it02','it08','it10','robby','inf03','it09')");
    while($dat1	= mysqli_fetch_array($sqlmcek))
	{?>
	

<div class="col-sm-6">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5 class="widget-title">
													<i class="ace-icon fa fa-signal"></i>
													<?php echo $user=$dat1['nama'];?>
												</h5>
											</div>
									
											<div class="widget-body">
												<div class="widget-main">
													<div id="piechart-placeholder<?php echo $no;?>"></div>
												
													<div class="hr hr8 hr-double"></div>
													<?php
														require_once("config.php");
														$thn1	=	date('Y');
														$bln1	=	date('m');
														$sqla	=	mysqli_query($koneksi,"SELECT (select count(id) from dt_pp where category='Hardware' and tgl_tambah like '2020-01') as HW, (select count(id) from dt_pp where category='Software' and tgl_tambah like '2020-01%') as SW, (select count(id) from dt_pp where category='Network' and tgl_tambah like '2020-01%') as NW, (select count(id) from dt_pp where category='Telepon' and tgl_tambah like '2020-01%') as TP from dt_pp GROUP BY 1");
														$dataa	=	mysqli_fetch_array($sqla);

														$cekpp =mysqli_query($koneksi,"select *,sum(downtime)as down,count(no_pp)as ttl_pp from tbl_pp where diterima='$user' and tgl_s_kerja between '$tgl1' and '$tgl2' ");
														$pp	=	mysqli_fetch_array($cekpp);
														
														$cekwo =mysqli_query($koneksi,"select count(no_wo)as ttl_wo from tbl_wo where diterima='$user' and tgl_s_kerja between '$tgl1' and '$tgl2' ");
														$wo	=	mysqli_fetch_array($cekwo);
														
														$ceknilai =mysqli_query($koneksi,"SELECT *,sum(nilai_wo.nilai_wo)as nilaiwo_ku,count(nilai_wo.no_wo) as jmlwo_ku FROM `tbl_wo` inner join nilai_wo on tbl_wo.no_wo=nilai_wo.no_wo WHERE diterima='$user' and tbl_wo.tgl_diterima BETWEEN '$tgl1' and '$it2'");
														$nilai_wo	=mysqli_fetch_array($ceknilai);

														$ceknilaipp =mysqli_query($koneksi,"SELECT *,sum(nilai_pp.nilai_pp)as nilaipp_ku,count(nilai_pp.no_pp) as jmlpp_ku FROM `tbl_pp` inner join nilai_pp on tbl_pp.no_pp=nilai_pp.no_pp WHERE tbl_pp.diterima='$user' and tbl_pp.tgl_terima BETWEEN '$tgl1' and '$tgl2'");
														$nilai_pp	=mysqli_fetch_array($ceknilaipp);


													
														$ttldown  =strval($pp['down']/60);
														$que 		= mysqli_query($koneksi,"SELECT count(nama_komputer) as jmlpc from master_komputer");
														$datq 		= mysqli_fetch_array($que);
														$ttlpc	 	= $datq['jmlpc'];
														$ttlhrpc 	= $ttlpc * 720;
														//data
														$errordown		=$pp['down'];
														

														$ttlpp			=$pp['ttl_pp'];
														$ttlwo			=$wo['ttl_wo'];
														$ttlnilai_pp	=$nilai_pp['nilaipp_ku']/$nilai_pp['jmlpp_ku'];
														$ttlnilai_wo	=$nilai_wo['nilaiwo_ku']/$nilai_wo['jmlwo_ku'];

														$pdt =	strval(($ttldown / $ttlhrpc)*100);
														$downtime=number_format($pdt,2);
													
														//coba dulu

														$totallostwo=0;

														$cekwo2 =mysqli_query($koneksi,"select * from tbl_wo where diterima='$user' and tgl_m_kerja between '$tgl1' and '$tgl2' ");
														while($wo2	=	mysqli_fetch_array($cekwo2)){
														$nowo=$wo2['no_wo'];
														$plan=mysqli_query($koneksi,"select sum(waktu) as hari from  detail_project where no_project='$nowo'");
														$planing=mysqli_fetch_array($plan);
														if($planing==''){echo "0";}else{
														$cekplan=$planing['hari'];
														}
														
														$mulai=$wo2['tgl_m_kerja'];
														$selesai=$wo2['tgl_s_kerja'];
														if($selesai=='0000-00-00'){

																$totallose='0';
															}else{	
															$total=((abs(strtotime ($mulai) - strtotime ($selesai)))/(60*60*24)); 
																$totallose=round(($cekplan-$total),2);
															}
														echo"</br>";
														$totallostwo=$totallostwo+$totallose;
														}
														//coba dulu
													
														echo "total downtime wo".$totallostwo;
													
													?>
													<div class="clearfix">
														<div class="grid3">
															<span class="red"><b><a class="edit-record" data-id="<?php echo "".$ed.""; ?>" style=" color:#CB0006;">DOWNTIME</a></b></span>
															<span class="bigger pull-right"><?php echo $downtime." %"; ?></span>
															<input type="hidden" name="down" id="down<?php echo $no;?>" value="<?php echo $downtime;?>">
														</div>
														<div class="grid3">
															<span class="blue"><b><a class="edit-sw" data-id="<?php echo "".$ed.""; ?>" style=" color:#0000FF;">Error Downtime</a></b></span>
															<span class="bigger pull-right"><?php echo $errordown."&nbsp;minutes"."<br>"."$ttldown"."&nbsp;Hours"; ?></span>
															<input type="hidden" name="errordown" id="errordown<?php echo $no;?>" value="0">
														</div>
														<!-- <div class="grid3">
															<span class="green"><b><a class="edit-nw" data-id="<?php echo "".$ed.""; ?>" style=" color:#008000;">PP</a></b></span>
															<span class="bigger pull-right"><?php echo $ttlpp; ?></span>
															<input type="hidden" name="ttlpp" id="ttlpp<?php echo $no;?>" value="<?php echo $ttlpp;?>">
														</div>
														<div class="grid3">
															<span class="purple"><b><a class="edit-tp" data-id="<?php echo "".$ed.""; ?>" style=" color:#800080;">WO</a></b></span>
															<span class="bigger pull-right"><?php echo $ttlwo; ?></span>
															<input type="hidden" name="ttlwo" id="ttlwo<?php echo $no;?>" value="<?php echo $ttlwo;?>">
														</div> -->
														<div class="grid3">
															<span class="yellow"><b><a class="edit-tp" data-id="<?php echo "".$ed.""; ?>" style=" color:#FFD700">Nilai PP</a></b></span>
															<span class="bigger pull-right"><?php echo $ttlnilai_pp; ?></span>
															<input type="hidden" name="ttlnilaipp" id="ttlnilaipp<?php echo $no;?>" value="<?php echo  $ttlnilai_pp;?>">
														</div>
														<div class="grid3">
															<span class="pink"><b><a class="edit-tp" data-id="<?php echo "".$ed.""; ?>" style=" color:#FF1493;">Nilai WO</a></b></span>
															<span class="bigger pull-right"><?php echo $ttlnilai_wo; ?></span>
															<input type="hidden" name="ttlnilaiwo" id="ttlnilaiwo<?php echo $no;?>" value="<?php echo $ttlnilai_wo;?>">
														</div>
														
														</div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->

	<?php $no++; }?>				
	<!-- <div class="vspace-12-sm"></div>				 -->
	<!-- ROW 2 -->
<input type="hidden" name="jmluser" id="jmluser" value="<?php echo $no-(1);?>">
		
</div>

<?php }else{?>				
<div class="panel-body">
<div class="row">

	
<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-3">
						<div>
							<form action="view_performance.php" method="post">
							<table width="60%" class="table table-striped table-bordered table-hover">
								<tr>
									
									<td colspan="3">
										<div class="input-group">
                                            <input class="form-control date-picker" id="tgl1" name='tgl1' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
									
										&nbsp; - &nbsp;
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="tgl2" name='tgl2' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
										<button type="submit" name="tombol" value="SEARCH"><i class="ace-icon fa fa-search"></i>Search</button>
									</td>
								</tr>
								
							</table>
							</form>
						</div>
					</div>
												
									</div><!-- /.col -->
								</div><!-- /.row -->
					  <?php

                           $tgl1=date('Y-m-d');
                           $tgl2=date('Y-m-d');
                            ?>			
<?php 

$no=1;
$sqlmcek	=	mysqli_query($koneksi,"select*from user where dev in('inf','pro') and username in('it01','it02','it08','it10','robby','inf03','it09')");
    while($dat1	= mysqli_fetch_array($sqlmcek))
	{?>
	

<div class="col-sm-6">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5 class="widget-title">
													<i class="ace-icon fa fa-signal"></i>
													<?php echo $user=$dat1['nama'];?>
												</h5>
											</div>
									
											<div class="widget-body">
												<div class="widget-main">
													<div id="piechart-placeholder<?php echo $no;?>"></div>
												
													<div class="hr hr8 hr-double"></div>
													<?php
														require_once("config.php");
														$thn1	=	date('Y');
														$bln1	=	date('m');
														$sqla	=	mysqli_query($koneksi,"SELECT (select count(id) from dt_pp where category='Hardware' and tgl_tambah like '2020-01') as HW, (select count(id) from dt_pp where category='Software' and tgl_tambah like '2020-01%') as SW, (select count(id) from dt_pp where category='Network' and tgl_tambah like '2020-01%') as NW, (select count(id) from dt_pp where category='Telepon' and tgl_tambah like '2020-01%') as TP from dt_pp GROUP BY 1");
														$dataa	=	mysqli_fetch_array($sqla);

														$cekpp =mysqli_query($koneksi,"select *,sum(downtime)as down,count(no_pp)as ttl_pp from tbl_pp where diterima='$user' and tgl_s_kerja between '$tgl1' and '$tgl2' ");
														$pp	=	mysqli_fetch_array($cekpp);
														
														$cekwo =mysqli_query($koneksi,"select count(no_wo)as ttl_wo from tbl_wo where diterima='$user' and tgl_s_kerja between '$tgl1' and '$tgl2' ");
														$wo	=	mysqli_fetch_array($cekwo);
														
														$ceknilai =mysqli_query($koneksi,"SELECT *,sum(nilai_wo.nilai_wo)as nilaiwo_ku,count(nilai_wo.no_wo) as jmlwo_ku FROM `tbl_wo` inner join nilai_wo on tbl_wo.no_wo=nilai_wo.no_wo WHERE diterima='$user' and tbl_wo.tgl_diterima BETWEEN '$tgl1' and '$it2'");
														$nilai_wo	=mysqli_fetch_array($ceknilai);

														$ceknilaipp =mysqli_query($koneksi,"SELECT *,sum(nilai_pp.nilai_pp)as nilaipp_ku,count(nilai_pp.no_pp) as jmlpp_ku FROM `tbl_pp` inner join nilai_pp on tbl_pp.no_pp=nilai_pp.no_pp WHERE tbl_pp.diterima='$user' and tbl_pp.tgl_terima BETWEEN '$tgl1' and '$tgl2'");
														$nilai_pp	=mysqli_fetch_array($ceknilaipp);


													
														$ttldown  =strval($pp['down']/60);
														$que 		= mysqli_query($koneksi,"SELECT count(nama_komputer) as jmlpc from master_komputer");
														$datq 		= mysqli_fetch_array($que);
														$ttlpc	 	= $datq['jmlpc'];
														$ttlhrpc 	= $ttlpc * 720;
														//data
														$errordown		=$pp['down'];
														
													
														$ttlpp			=$pp['ttl_pp'];
														$ttlwo			=$wo['ttl_wo'];
													
														$ttlnilai_pp	=$nilai_pp['nilaipp_ku']/$nilai_pp['jmlpp_ku'];
														$ttlnilai_wo	=$nilai_wo['nilaiwo_ku']/$nilai_wo['jmlwo_ku'];

														$pdt =	strval(($ttldown / $ttlhrpc)*100);
														$downtime=number_format($pdt,2);

														//data
													
														
													
													?>
													<div class="clearfix">
														<div class="grid3">
															<span class="red"><b><a class="edit-record" data-id="<?php echo "".$ed.""; ?>" style=" color:#CB0006;">DOWNTIME</a></b></span>
															<span class="bigger pull-right"><?php echo $downtime."%"; ?></span>
															<input type="text" name="down" id="down<?php echo $no;?>" value="<?php echo $downtime;?>">
														</div>
														<div class="grid3">
															<span class="blue"><b><a class="edit-sw" data-id="<?php echo "".$ed.""; ?>" style=" color:#0000FF;">Error Downtime</a></b></span>
															<span class="bigger pull-right"><?php echo $errordown."&nbsp;minutes"."<br>"."$ttldown"."&nbsp;Hours"; ?></span>
															<input type="hidden" name="errordown" id="errordown<?php echo $no;?>" value="0">
														</div>
														<!-- <div class="grid3">
															<span class="green"><b><a class="edit-nw" data-id="<?php echo "".$ed.""; ?>" style=" color:#008000;">PP</a></b></span>
															<span class="bigger pull-right"><?php echo $ttlpp; ?></span>
															<input type="hidden" name="ttlpp" id="ttlpp<?php echo $no;?>" value="<?php echo $ttlpp;?>">
														</div>
														<div class="grid3">
															<span class="purple"><b><a class="edit-tp" data-id="<?php echo "".$ed.""; ?>" style=" color:#800080;">WO</a></b></span>
															<span class="bigger pull-right"><?php echo $ttlwo; ?></span>
															<input type="hidden" name="ttlwo" id="ttlwo<?php echo $no;?>" value="<?php echo $ttlwo;?>">
														</div> -->
														<div class="grid3">
															<span class="yellow"><b><a class="edit-tp" data-id="<?php echo "".$ed.""; ?>" style=" color:#FFD700">Nilai PP</a></b></span>
															<span class="bigger pull-right"><?php echo $ttlnilai_pp; ?></span>
															<input type="hidden" name="ttlnilaipp" id="ttlnilaipp<?php echo $no;?>" value="<?php echo  $ttlnilai_pp;?>">
														</div>
														<div class="grid3">
															<span class="pink"><b><a class="edit-tp" data-id="<?php echo "".$ed.""; ?>" style=" color:#FF1493;">Nilai WO</a></b></span>
															<span class="bigger pull-right"><?php echo $ttlnilai_wo; ?></span>
															<input type="hidden" name="ttlnilaiwo" id="ttlnilaiwo<?php echo $no;?>" value="<?php echo $ttlnilai_wo;?>">
														</div>
														
														</div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->

	<?php $no++; }?>				
	<!-- <div class="vspace-12-sm"></div>				 -->
	<!-- ROW 2 -->
<input type="hidden" name="jmluser" id="jmluser" value="<?php echo $no-(1);?>">
		
</div>

	<?php }?>
</div>
</div>
<br>

<?php include "menu-bawah.php"; ?>
										<script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>
		<script>
			
      
       
        
        jQuery(function($) {
				
				var jmluser=$('#jmluser').val();
				

			
		for(var i=1;i<=jmluser;i++)
			{	
				var down=$('#down'+i).val();
				
				var errordown=$('#errordown'+i).val();
				var ttlpp=$('#ttlpp'+i).val();
				var ttlwo=$('#ttlwo'+i).val();
				var ttlnilaipp=$('#ttlnilaipp'+i).val();
				var ttlnilaiwo=$('#ttlnilaiwo'+i).val();
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder'+i).css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "DOWNTIME",  data:down, color: "#EC000C"},
				{ label: "Error Downtime",  data:errordown, color: "#000DFF"},
				// { label: "PP",  data: ttlpp, color: "#07A70B"},
				// { label: "WO",  data:ttlwo, color: "#B2008E"},
				{ label: "NILAI PP",  data:ttlnilaipp, color: "#FFD700"},
				{ label: "NILAI WO",  data:ttlnilaiwo, color: "#FF1493"},
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
				
				
			}//looping
			})
    </script>
