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
						<a href="#">Home</a>
					</li>
			</ul>
<!-- /.breadcrumb --></div>
            <!--  -->
				<div class="panel panel-default">
					
						<div class="panel-body">
						
							<div class="modal fade" id="mydailyreport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:1100px; height:1000px;">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Daily Report</h4>
										</div>
									<div class="dailyreport-body">
									</div>
								<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
				
				<!-- -->
		<div class="page-content">
			<div class="panel-body">
			
			<?php
	$ckus=mysqli_fetch_array(mysqli_query($koneksi,"select * from user where username='$user'"));
	$pls=$ckus['pls'];		
			if(isset($_POST['tombol'])){

			?>
            	
                            <?php
                            $tgl1	=$_POST['tgl1'];
							$tgl2	=$_POST['tgl2'];
							$group	=$_POST['group'];
                            ?>
			
			
			<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-3">
						<div>
							<form action="view_dailyreport.php" method="post">
							<table width="60%" class="table table-striped table-bordered table-hover">
								<tr>
									
									<td colspan="3">
										From
										<div class="input-group">
                                            <input class="form-control date-picker" id="tgl1" name='tgl1' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo $tgl1;?>"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
									
										&nbsp; To &nbsp;
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="tgl2" name='tgl2' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo $tgl2;?>"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
										   <div class="input-group">
                                            <select name="group" id="group">
											<option value="all">ALL</option>
											<option value="prog">Programer</option>
											<option value="inf">Infrastruktur</option>
											<?php 
											
											 if($pls=='ho')
											 {
											$ck=mysqli_query($koneksi,"select * from user where dev in('inf','pro') and aktif='1' and pls='ho'");
											 }else{
											$ck=mysqli_query($koneksi,"select * from user where dev in('inf','pro') and aktif='1' and pls='fc'");
											}
											while($du=mysqli_fetch_array($ck))
											{ ?>
											
											<option value=<?php echo $du['username'];?>><?php echo $du['nama'];?></option>
											<?php } ?>
											
<!-- 											
											<option value="inf03">Nurul</option>
											<option value="it09">Yusuf</option>
											<option value="it01">GUGUN</option>
											<option value="it02">Sopian</option>
											<option value="it08">Deni Setiyo</option>
											<option value="it10">Anggi MF</option>
											<option value="robby">Robby</option> -->
											</select>
                                        </div>
                                        <br>
										<button type="submit" name="tombol" value="SEARCH" class="btn btn-primary"><i class="ace-icon fa fa-search"></i>Search</button>
                                        <a href="export_daily.php?tgl1=<?php echo $tgl1; ?>&tgl2=<?php echo $tgl2; ?>&group=<?php echo $group; ?>&pls=<?php echo $pls; ?>" class="btn btn-success"><i class="ace-icon fa fa-cloud-download"></i>Export ke Excell</a>
                                    </td>
								</tr>
								
							</table>
							</form>
						</div>
					</div>
												
									</div><!-- /.col -->
								</div><!-- /.row -->
						

								<div class="row">
									<div class="col-sm-12">
										

									</div><!-- /.col -->
<?php										
require_once('config.php');
if($group=="all"){
  $tampiluser=mysqli_query($koneksi,"select*from user where dev in('inf','pro') and aktif='1' and pls='$pls'");
	}else if($group=="prog"){
  $tampiluser=mysqli_query($koneksi,"select*from user where dev in('pro') and aktif='1' and pls='$pls'");

	}else if($group=="inf"){
	$tampiluser=mysqli_query($koneksi,"select*from user where dev in('inf') and aktif='1' and pls='$pls'");

	} else{
	
		$tampiluser=mysqli_query($koneksi,"select*from user where username ='$group' ");
	}
  while($dtuser	= mysqli_fetch_array($tampiluser)){
   $id_user=$dtuser['username'];
     $nama_user=$dtuser['nama'];		 
?>
<h3 style="color:blue;font:bold;"><b><i><?php echo $dtuser['nama'];?></i></b></h3>
<div><?php
							require_once('config.php');
// coba daily--------------------------------------------------->>
?>
<form name="fmdaily" id="fmdaily" class="fmdaily" method="post">
    <table width="80%" border="1" class="table table-striped table-bordered table-hover">
    <input type="hidden" value="1" id="total_modul"  name="jumlahmodul">
 <?php 
 	$tanggal1 = date('Y-m-d',strtotime($tgl1));
    $tanggal2 = date('Y-m-d',strtotime($tgl2));
 
    while ($tanggal1 <= $tanggal2) {
		 $tanggal1.'<br>';
		?>
     
	   <tr> <td colspan=9><i style="color:red;"><?php echo  $tanggal1;?></i></td></tr>
    	<tr style="background-color:#7EB7FD;" >
		<th>NO</th>
		<th>TANGGAL</th>
        <th >NO.PROJEK</th>
        <th >PP/WO</th>
	
        <th >PIC</th>
        <th >PEKERJAAN / MODUL</th>
        <th >DIMINTA OLEH</th>
        <th >SECTION</th>
        <th >KETERANGAN</th>
    </tr>
	<?php
//PP-----------------------------------------
		$NO=1;
		$sql_pp	= mysqli_query($koneksi,"SELECT * FROM `tbl_pp` where tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user' and tgl_m_kerja >='2020-04-01'");
							while($row_pp	= mysqli_fetch_array($sql_pp))
		{ ?>

		<tr>
		<td><?php echo $NO++;?></td>
        <td><?php echo $tanggal1;?></td>
        <td><?php echo $nop=$row_pp['no_pp'];?></td>
        <td>PP</td>
		
		<td><?php echo $row_pp['diterima'];?></td>
		<td><?php echo $row_pp['kerusakan'];?></td>
        <td><?php echo $row_pp['pelapor'];?></td>  
    	 <td><?php echo $row_pp['section'];?></td>  
        
        <td>
		<?php

	
	$sql_sts= mysqli_query($koneksi,"SELECT (case when tgl_hold<='$tanggal1' and (tgl_release >'$tanggal1'  OR tgl_release='0000-00-00') then 'HOLD' end )as status FROM detail_hold_pp where no_pp='$nop' and tgl_hold <='$tanggal1' and (tgl_release >='$tanggal1' OR tgl_release='0000-00-00')");
	$stts	 = mysqli_fetch_array($sql_sts);

			
$kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));


		if($stts['status']=="" and $row_pp['tgl_s_kerja'] !=$tanggal1 ){echo "on progress";}
		else if($stts['status']=="" and $row_pp['tgl_s_kerja']==$tanggal1)
		{
			echo "Finish";
		}
		else{ echo $stts['status'];}
		?>
		</td>      
    </tr>
		
		<?php }
//modul pp
$sql_modpp	= mysqli_query($koneksi,"SELECT * FROM `modul_pp` where tgl_mulai <='$tanggal1' and (tgl_selesai >='$tanggal1' OR tgl_selesai='0000-00-00') and dikerjakan='$nama_user' ");
							while($row_modpp	= mysqli_fetch_array($sql_modpp)) {
								$objmodpp=$row_modpp['objectid'];
								?>
			
			<tr style="font-weight:bold;font-style:italic;">
			<td><?php echo $NO++;?></td>
			<td><?php echo $tanggal1;?></td>
			<td><?php echo $no_projpp=$row_modpp['no_pp'];?></td>
			
			<td>Modul PP</td>
		
			<td><?php echo $row_modpp['dikerjakan'];?></td>
			<td><?php echo $row_modpp['nama_modulpp'];?></td>

			<td colspan="3" align="center">
				<?php
			$sql_stsmodpp	= mysqli_query($koneksi,"SELECT (case when tgl_mulai<='$tanggal1'  and (tgl_selesai >'$tanggal1' OR tgl_selesai='0000-00-00') and tgl_hold<>'$tanggal1' then 'On progres'
			else case when tgl_mulai<='$tanggal1' and tgl_selesai>'$tanggal1' and tgl_hold='$tanggal1' then 'Hold' ELSE
			case when tgl_selesai='$tanggal1' then 'finish' else 0 end end end)as status FROM modul_pp where no_pp='$no_projpp' and objectid='$objmodpp' and tgl_mulai <='$tanggal1' and (tgl_selesai >='$tanggal1' OR tgl_selesai='0000-00-00') and dikerjakan='$nama_user'");
			$sttsmodpp= mysqli_fetch_array($sql_stsmodpp);
			echo  $sttsmodpp['status'];
			
			
				?>

			</td>
		</tr>
							<?php	}
//work order----------------------------------
	$sql_wo	= mysqli_query($koneksi,"SELECT * FROM `tbl_wo` where tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user' and tgl_m_kerja >='2020-04-01' ");
							while($row_wo	= mysqli_fetch_array($sql_wo))
							{?>
		<tr >
		<td><?php echo $NO++;?></td>
        <td><?php echo $tanggal1;?></td>
        <td><?php echo $now=$row_wo['no_wo'];?></td>
        <td>WO</td>
	
		<td><?php echo $row_wo['diterima'];?></td>
		<td><?php echo $row_wo['uraian_pekerjaan'];?></td>
        <td><?php echo $row_wo['pemohon'];?></td>  
    	 <td><?php echo $row_wo['section'];?></td>  
        
        <td>
		<?php
	// 	$sql_stswo	= mysqli_query($koneksi,"SELECT (case when tgl_m_kerja<='$tanggal1' and (tgl_s_kerja >'$tanggal1' OR tgl_s_kerja='0000-00-00') and tgl_hold<>'$tanggal1' then 'On progres'
    //    else case when tgl_m_kerja<='$tanggal1' and tgl_s_kerja>'$tanggal1' and tgl_hold='$tanggal1' then 'Hold' ELSE
    //    case when tgl_s_kerja='$tanggal1' then 'finish' else 0 end end end)as status FROM tbl_wo where no_wo='$now' and tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user' and tgl_m_kerja >='2020-04-01'");
	// 	$sttswo= mysqli_fetch_array($sql_stswo);

		$sql_stswo	=mysqli_query($koneksi,"SELECT (case when tgl_hold<='$tanggal1' and (tgl_release >'$tanggal1'  OR tgl_release='0000-00-00') then 'HOLD' end )as status FROM detail_hold_wo where no_wo='$now' and tgl_hold <='$tanggal1' and (tgl_release >='$tanggal1' OR tgl_release='0000-00-00')"); 
		$sttswo= mysqli_fetch_array($sql_stswo);
		if($sttswo['status']=="" and $row_wo['tgl_s_kerja'] !=$tanggal1 ){echo "on progress";}
		else if($sttswo['status']=="" and $row_wo['tgl_s_kerja']==$tanggal1)
		{
			echo "Finish";
		}
		else{ echo $sttswo['status'];}
		?>
		</td>      
    </tr>

	<?php		}?>
		<!-- MODUL ------------------------------------>
		<?php $sql_mod	= mysqli_query($koneksi,"SELECT * FROM `detail_project` where tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and username='$nama_user' ");
							while($row_mod	= mysqli_fetch_array($sql_mod)) {
								$objmod=$row_mod['objectid'];
								
								?>
			
			<tr style="font-weight:bold;font-style:italic;">
			<td><?php echo $NO++;?></td>
			<td><?php echo $tanggal1;?></td>
			<td><?php echo $no_proj=$row_mod['no_project'];?></td>
			<td>Modul WO</td>
			
			<td><?php echo $row_mod['username'];?></td>
			<td><?php echo $row_mod['detail_pekerjaan'];?></td>

			<td colspan="3" align="center">
				<?php
			$sql_stsmod	= mysqli_query($koneksi,"SELECT (case when tgl_m_kerja<='$tanggal1'  and (tgl_s_kerja >'$tanggal1' OR tgl_s_kerja='0000-00-00') and tgl_hold<>'$tanggal1' then 'On progres'
			else case when tgl_m_kerja<='$tanggal1' and tgl_s_kerja>'$tanggal1' and tgl_hold='$tanggal1' then 'Hold' ELSE
			case when tgl_s_kerja='$tanggal1' then 'finish' else 0 end end end)as status FROM detail_project where no_project='$no_proj' and objectid='$objmod' and tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and username='$nama_user'");
			$sttsmod= mysqli_fetch_array($sql_stsmod);
			
			if($sttsmod['status']=="finish"){echo "Finish";}
			else{
			
			$sql_stsmodwo	= mysqli_query($koneksi,"SELECT (case when tgl_hold<='$tanggal1' and (tgl_release >'$tanggal1' OR tgl_release='0000-00-00') then 'HOLD' end )as status FROM detail_hold_wo where no_wo='$no_proj' and tgl_hold <='$tanggal1' and (tgl_release >='$tanggal1' OR tgl_release='0000-00-00')");
			$sttsmodwo= mysqli_fetch_array($sql_stsmodwo);
			
			if($sttsmodwo['status']=="" and $row_mod['tgl_s_kerja'] !=$tanggal1 )
			{echo "on progress";}

			else if($sttsmodwo['status']=="" and $row_mod['tgl_s_kerja']==$tanggal1 )
			{
				echo "Finish";
			}
			else{ echo  $sttsmodwo['status'];}
			}		?>

			</td>
		</tr>
							<?php	}	
							$tanggal1 = date('Y-m-d',strtotime('+1 days',strtotime($tanggal1)));
   }
// coba daily--------------------------------------------------->>
?>
</table></form>
<?php } ?> <!-- /.user -->



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

								
<!-- JS ISSET -->
<script>
			
        $(function(){
            $(document).on('click','#dailyreport_user',function(e){
            //   $("#loadingtambahcosume1").show();
			    
				e.preventDefault();
                $("#mydailyreport").modal('show');
                $.post('dailyreport_user.php',
                    {
                         tgl1	:$(this).attr('tgl1'),
						tgl2	:$(this).attr('tgl2'),
                        id_user	:$(this).attr('id_user')
                       
						
                        
                    },
                    function(html){
                        $(".dailyreport-body").html(html);
                    }   
                );
				
				
            });

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
            
           
            
        });
        
    </script>


									<?php
									}else {
										?>
					<?php
										$thn1	= date('Y');
										$bln1	= date('m');
										$ed		= strval($thn1.'-'.$bln1);
										$group	="all";
										$tgl1=date('Y-m-d');
										$tgl2=date('Y-m-d');
										//~ echo $ed;
										?>									
										
			                   
			<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-12">
						<div>
							<form action="view_dailyreport.php" method="post">
							<table width="60%" class="table table-striped table-bordered table-hover">
								<tr>
									
									<td colspan="3">
										From
										<div class="input-group">
                                            <input class="form-control date-picker" id="tgl1" name='tgl1' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
									
										&nbsp; To &nbsp;
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="tgl2" name='tgl2' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>

										   <div class="input-group">
                                            <select name="group" id="group">
											<option value="all">ALL</option>
											<option value="prog">Programer</option>
											<option value="inf">Infrastruktur</option>
											<!-- <option value="inf03">Nurul</option>
											<option value="it09">Yusup</option>
											<option value="it01">GUGUN</option>
											<option value="it02">Sopian</option>
											<option value="it08">Deni Setiyo</option>
											<option value="it10">Anggi MF</option>
											<option value="robby">Robby</option> -->
											<?php 
											$ckus=mysqli_fetch_array(mysqli_query($koneksi,"select * from user where username='$user'"));
											$pls=$ckus['pls'];
											 if($pls=='ho')
											 {
											$ck=mysqli_query($koneksi,"select * from user where dev in('inf','pro') and aktif='1' and pls='ho'");
											 }else{
											$ck=mysqli_query($koneksi,"select * from user where dev in('inf','pro') and aktif='1' and pls='fc'");
											}
											while($du=mysqli_fetch_array($ck))
											{ ?>
											
											<option value=<?php echo $du['username'];?>><?php echo $du['nama'];?></option>
											<?php } ?>
											</select>
                                        </div>
                                        <br>
										<button type="submit" name="tombol" value="SEARCH" class="btn btn-primary"><i class="ace-icon fa fa-search"></i>Search</button>
                                        <a href="export_daily.php?tgl1=<?php echo $tgl1; ?>&tgl2=<?php echo $tgl2; ?>&group=<?php echo $group; ?>&pls=<?php echo $pls; ?>" class="btn btn-success"><i class="ace-icon fa fa-cloud-download"></i>Export ke Excell</a>
                                    </td>
								</tr>
								
							</table>
							</form>
						</div>
					</div>
												
									</div><!-- /.col -->
								</div><!-- /.row -->
						

								<div class="row">
									<div class="col-sm-12">
										

									</div><!-- /.col -->
<?php										
require_once('config.php');

if($group=="all"){
  $tampiluser=mysqli_query($koneksi,"select*from user where dev in('inf','pro') and aktif='1' and pls='$pls'");
	}else if($group=="prog"){
  $tampiluser=mysqli_query($koneksi,"select*from user where dev in('pro') and aktif='1' and pls='$pls'");

	}else{
	$tampiluser=mysqli_query($koneksi,"select*from user where dev in('inf') and aktif='1' and pls='$pls'");

	} 
  while($dtuser	= mysqli_fetch_array($tampiluser)){
   $id_user=$dtuser['username'];
     $nama_user=$dtuser['nama'];		 
?>
<h3 style="color:blue;font:bold;"><b><i><?php echo $dtuser['nama'];?></i></b></h3>
<div><?php
							require_once('config.php');
// coba daily--------------------------------------------------->>
?>
<form name="fmdaily" id="fmdaily" class="fmdaily" method="post">
    <table width="80%" border="1" class="table table-striped table-bordered table-hover">
    <input type="hidden" value="1" id="total_modul"  name="jumlahmodul">
 <?php 
 	$tanggal1 = date('Y-m-d',strtotime($tgl1));
    $tanggal2 = date('Y-m-d',strtotime($tgl2));
 
    while ($tanggal1 <= $tanggal2) {
		 $tanggal1.'<br>';
		?>
     
	   <tr> <td colspan=9><i style="color:red;"><?php echo  $tanggal1;?></i></td></tr>
    	<tr style="background-color:#7EB7FD;" >
		<th>NO</th>
		<th>TANGGAL</th>
        <th >NO.PROJEK</th>
        <th >PP/WO</th>

        <th >PIC</th>
        <th >PEKERJAAN / MODUL</th>
        <th >DIMINTA OLEH</th>
        <th >SECTION</th>
        <th >KETERANGAN</th>
		
    </tr>
	<?php
//PP-----------------------------------------
		$NO=1;
		$sql_pp	= mysqli_query($koneksi,"SELECT * FROM `tbl_pp` where tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user' and tgl_m_kerja >='2020-04-01'");
							while($row_pp	= mysqli_fetch_array($sql_pp))
		{ ?>

		<tr>
		<td><?php echo $NO++;?></td>
        <td><?php echo $tanggal1;?></td>
        <td><?php echo $nop=$row_pp['no_pp'];?></td>
        <td>PP</td>
	
		<td><?php echo $row_pp['diterima'];?></td>
		<td><?php echo $row_pp['kerusakan'];?></td>
        <td><?php echo $row_pp['pelapor'];?></td>  
    	 <td><?php echo $row_pp['section'];?></td>  
        
        <td>
		<?php

	// 	$sql_sts	= mysqli_query($koneksi,"SELECT (case when tgl_m_kerja<='$tanggal1' and (tgl_s_kerja >'$tanggal1' OR tgl_s_kerja='0000-00-00') and tgl_hold<>'$tanggal1' then 'On progres'
    //    else case when tgl_m_kerja<='$tanggal1' and tgl_s_kerja>'$tanggal1' and tgl_hold='$tanggal1' then 'Hold' ELSE
    //    case when tgl_s_kerja='$tanggal1' then 'finish' else 0 end end end)as status FROM tbl_pp where no_pp='$nop'   and tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user' and tgl_m_kerja >='2020-04-01'");
	// 	$stts= mysqli_fetch_array($sql_sts);
		// echo $stts['status'];
	$sql_sts= mysqli_query($koneksi,"SELECT (case when tgl_hold<='$tanggal1' and (tgl_release >'$tanggal1'  or tgl_release='0000-00-00') then 'HOLD' end )as status FROM detail_hold_pp where no_pp='$nop' and tgl_hold <='$tanggal1' and (tgl_release >='$tanggal1' OR tgl_release='0000-00-00')");
	$stts	 = mysqli_fetch_array($sql_sts);

		if($stts['status']=="" and $row_pp['tgl_s_kerja'] !=$tanggal1 ){echo "on progress";}
		else if($stts['status']=="" and $row_pp['tgl_s_kerja']==$tanggal1)
		{
			echo "Finish";
		}
		else{ echo $stts['status'];}
		?>
		</td>      
    </tr>
		
		<?php }
//modul pp
$sql_modpp	= mysqli_query($koneksi,"SELECT * FROM `modul_pp` where tgl_mulai <='$tanggal1' and (tgl_selesai >='$tanggal1' OR tgl_selesai='0000-00-00') and dikerjakan='$nama_user' ");
							while($row_modpp	= mysqli_fetch_array($sql_modpp)) {
								$objmodpp=$row_modpp['objectid'];
								?>
			
			<tr style="font-weight:bold;font-style:italic;">
			<td><?php echo $NO++;?></td>
			<td><?php echo $tanggal1;?></td>
			<td><?php echo $no_projpp=$row_modpp['no_pp'];?></td>
			<td>Modul PP</td>
		
			<td><?php echo $row_modpp['dikerjakan'];?></td>
			<td><?php echo $row_modpp['nama_modulpp'];?></td>

			<td colspan="3" align="center">
				<?php
			$sql_stsmodpp	= mysqli_query($koneksi,"SELECT (case when tgl_mulai<='$tanggal1'  and (tgl_selesai >'$tanggal1' OR tgl_selesai='0000-00-00') and tgl_hold<>'$tanggal1' then 'On progres'
			else case when tgl_mulai<='$tanggal1' and tgl_selesai>'$tanggal1' and tgl_hold='$tanggal1' then 'Hold' ELSE
			case when tgl_selesai='$tanggal1' then 'finish' else 0 end end end)as status FROM modul_pp where no_pp='$no_projpp' and objectid='$objmodpp' and tgl_mulai <='$tanggal1' and (tgl_selesai >='$tanggal1' OR tgl_selesai='0000-00-00') and dikerjakan='$nama_user'");
			$sttsmodpp= mysqli_fetch_array($sql_stsmodpp);
			echo  $sttsmodpp['status'];
			
			
				?>

			</td>
		</tr>
							<?php	}

//work order----------------------------------
	$sql_wo	= mysqli_query($koneksi,"SELECT * FROM `tbl_wo` where tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user' and tgl_m_kerja >='2020-04-01' ");
							while($row_wo	= mysqli_fetch_array($sql_wo))
							{?>
		<tr >
		<td><?php echo $NO++;?></td>
        <td><?php echo $tanggal1;?></td>
        <td><?php echo $now=$row_wo['no_wo'];?></td>
        <td>WO</td>
	
		<td><?php echo $row_wo['diterima'];?></td>
		<td><?php echo $row_wo['uraian_pekerjaan'];?></td>
        <td><?php echo $row_wo['pemohon'];?></td>  
    	 <td><?php echo $row_wo['section'];?></td>  
        
        <td>
		<?php
	// 	$sql_stswo	= mysqli_query($koneksi,"SELECT (case when tgl_m_kerja<='$tanggal1' and (tgl_s_kerja >'$tanggal1' OR tgl_s_kerja='0000-00-00') and tgl_hold<>'$tanggal1' then 'On progres'
    //    else case when tgl_m_kerja<='$tanggal1' and tgl_s_kerja>'$tanggal1' and tgl_hold='$tanggal1' then 'Hold' ELSE
    //    case when tgl_s_kerja='$tanggal1' then 'finish' else 0 end end end)as status FROM tbl_wo where no_wo='$now' and tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user' and tgl_m_kerja >='2020-04-01'");
	// 	$sttswo= mysqli_fetch_array($sql_stswo);

		$sql_stswo	=mysqli_query($koneksi,"SELECT (case when tgl_hold<='$tanggal1' and (tgl_release >'$tanggal1' OR tgl_release='0000-00-00') then 'HOLD' end )as status FROM detail_hold_wo where no_wo='$now' and tgl_hold <='$tanggal1' and (tgl_release >='$tanggal1' OR tgl_release='0000-00-00')"); 
		$sttswo= mysqli_fetch_array($sql_stswo);
		if($sttswo['status']=="" and $row_wo['tgl_s_kerja'] !=$tanggal1 ){echo "on progress";}
		else if($sttswo['status']=="" and $row_wo['tgl_s_kerja']==$tanggal1)
		{
			echo "Finish";
		}
		else{ echo $sttswo['status'];}
		?>
		</td>      
    </tr>

	<?php		}?>
		<!-- MODUL ------------------------------------>
		<?php 
			$sql_mod	= mysqli_query($koneksi,"SELECT * FROM `detail_project` where tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and username='$nama_user' ");
							while($row_mod	= mysqli_fetch_array($sql_mod)) {
								$objmod=$row_mod['objectid'];
								?>
			
			<tr style="font-weight:bold;font-style:italic;">
			<td><?php echo $NO++;?></td>
			<td><?php echo $tanggal1;?></td>
			<td><?php echo $no_proj=$row_mod['no_project'];?></td>
			<td>Modul WO</td>
		
			<td><?php echo $row_mod['username'];?></td>
			<td><?php echo $row_mod['detail_pekerjaan'];?></td>

			<td colspan="3" align="center">
				<?php
			$sql_stsmod	= mysqli_query($koneksi,"SELECT (case when tgl_m_kerja<='$tanggal1'  and (tgl_s_kerja >'$tanggal1' OR tgl_s_kerja='0000-00-00') and tgl_hold<>'$tanggal1' then 'On progres'
			else case when tgl_m_kerja<='$tanggal1' and tgl_s_kerja>'$tanggal1' and tgl_hold='$tanggal1' then 'Hold' ELSE
			case when tgl_s_kerja='$tanggal1' then 'finish' else 0 end end end)as status FROM detail_project where no_project='$no_proj' and objectid='$objmod' and tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and username='$nama_user'");
			$sttsmod= mysqli_fetch_array($sql_stsmod);
			echo  $sttsmod['status'];
			
			
				?>

			</td>
		</tr>
							<?php	}

		
			
			$tanggal1 = date('Y-m-d',strtotime('+1 days',strtotime($tanggal1)));
   }
// coba daily--------------------------------------------------->>
?>
</table></form>
<?php } ?> <!-- /.user -->




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

								
<!-- JS ISSET -->
<script>
			
        $(function(){
            $(document).on('click','#dailyreport_user',function(e){
            //   $("#loadingtambahcosume1").show();
			    
				e.preventDefault();
                $("#mydailyreport").modal('show');
                $.post('dailyreport_user.php',
                    {
                         tgl1	:$(this).attr('tgl1'),
						tgl2	:$(this).attr('tgl2'),
                        id_user	:$(this).attr('id_user')
                       
						
                        
                    },
                    function(html){
                        $(".dailyreport-body").html(html);
                    }   
                );
				
				
            });

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
            
           
            
        });
        
    </script>		<?php	}
?>	
													
			
				
									
				
		
	
</body>
</html>


