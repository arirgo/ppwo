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
		<!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" /> -->

		<!-- page specific plugin styles -->
		<!-- <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/colorpicker.min.css" /> -->
      

		<!-- text fonts -->
		<!-- <link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" /> -->

		<!-- ace styles -->
		
		<!-- <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<script src="assets/js/ace-extra.min.js"></script>
		<script src="jquery-1.11.1.min.js"></script> 
		<script src="jquery-1.12.3.js"></script> 
		<link href="css1/bootstrap-table.css" rel="stylesheet"> -->
<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/bootstrap-duallistbox.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-multiselect.min.css" />
		<link rel="stylesheet" href="assets/css/select2.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>		
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
				<li class="active">Daily Report</li>
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								List Daily Report
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo $_SESSION['nama'];?>
								</small>
							</h1>
						</div><!-- /.page-header -->
							
					

                
								<div class="panel panel-default">
					
						<div class="panel-body">
						
							<div class="modal fade" id="statusdaily" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:200px; height:1000px;">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Edit Status</h4>
										</div>
									<div class="dailystatus-body">
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
						
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:1100px; height:1000px;">
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
				


<!-- menu input daily -->
    <table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
	<thead>
 	<tr>
	<th data-sortable="true">No.</th>
	<th  data-sortable="true">Nomor WO</th>
	<th  data-sortable="true">Pemohon</th>
	<th  data-sortable="true">Section</th>
		<th  data-sortable="true">IT</th>
	<th  data-sortable="true">Status</th>
	<!-- <th  data-sortable="true">Action</th> -->
   </tr>
							
						    </thead>

	<?php 
	$NO=1;
	$s_wo	= mysqli_query($koneksi,"SELECT * from tbl_wo inner join detail_project on tbl_wo.no_wo=detail_project.no_project where status_wo in('on process') group by tbl_wo.no_wo ");
	while($dtwo	= mysqli_fetch_array($s_wo)){?>

		<tr>
			<td><?PHP 	echo $NO++;?></td>
			<td><a href="#" class="edit-record" data-id="<?php echo $dtwo['no_wo']; ?>" ><?php echo $dtwo['no_wo']; ?></td>
			<td><?php echo $dtwo['pemohon'];?></td>
			<td><?php echo $dtwo['section'];?></td>
			<td><?php echo $dtwo['it'];?></td>
			<td><?php echo $dtwo['status_wo'];?></td>
			<!-- <td><a href="#" class="cekmodul" data-id="<?php echo $dtwo['no_wo']; ?>" ><button type="button" class="btn btn-danger btn-xs">MODUL</button></a></td> -->
		
		</tr>
		<tr id="<?php echo $dtwo['no_wo'];?>"></tr>					
                     
	<?php	}?>
	</table>
<!-- menu input daily -->

				<!-- <button class="tambah-daily btn btn-app btn-primary btn-sm"><i class="ace-icon fa fa-pencil-square-o bigger-200"></i>ADD</button> -->
				<div class="panel-body">
	<?php
			
			if(isset($_POST['tombol'])){
  $id_user=$_SESSION['username'];
  $nama_user=$_SESSION['nama'];
  $tgl1=$_POST['tgl1'];
  $tgl2=$_POST['tgl2'];
		?>
<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-12">
						<div>
							<form action="menu_dailyreport.php" method="post">
							
                            <table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="9" style=" background-color:pink;color:red;"><b> Daily Report Browse </b></td>
			</tr>
			
			<tr>
				<td>From </td>
                <td><input type="text" id="tgl1" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tgl1" value="<?php echo $tgl;?>" ></td>
                <td>To</td>
                <td><input type="text" id="tgl2" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tgl2" value="<?php echo $tgl;?>" ></td>
                <td><button type="submit" name="tombol" value="SEARCH" class="btn btn-primary" ><i class="ace-icon fa fa-search"></i>Search</button>
					<a href="export_dailyreport.php?tgl1=<?php echo $tgl1; ?>&tgl2=<?php echo $tgl2; ?>&id_user=<?php echo $id_user; ?>" class="btn btn-success"><i class="ace-icon fa fa-cloud-download"></i>Export ke Excell</a>
                             
				</td>
			</tr>
			
			
		</table>
                            
<!--                             
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
								
							</table> -->
							</form>
						</div>
					</div>
												
									</div><!-- /.col -->
								</div><!-- /.row -->
						
<?php
							require_once('config.php');
// coba daily--------------------------------------------------->>
?>
<div id="tbl_dailyreport"><form name="fmdaily" id="fmdaily" class="fmdaily" method="post">
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
        <th >PROJEK</th>
        <th >JENIS</th>
        <th >PIC</th>
        <th >PEKERJAAN / MODUL</th>
        <th >DIMINTA OLEH</th>
        <th >SECTION</th>
        <th >KETERANGAN</th>
    

        
    </tr>
	<?php

		$NO=1;
		$sql_pp	= mysqli_query($koneksi,"SELECT * FROM `tbl_pp` where tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user' ");
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
		$sql_sts	= mysqli_query($koneksi,"SELECT (case when tgl_m_kerja<='$tanggal1' and (tgl_s_kerja >'$tanggal1' OR tgl_s_kerja='0000-00-00') and tgl_hold<>'$tanggal1' then 'On progres'
       else case when tgl_m_kerja<='$tanggal1' and tgl_s_kerja>'$tanggal1' and tgl_hold='$tanggal1' then 'Hold' ELSE
       case when tgl_s_kerja='$tanggal1' then 'finish' else 0 end end end)as status FROM tbl_pp where no_pp='$nop' and tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user'");
		$stts= mysqli_fetch_array($sql_sts);
		echo $stts['status'];
		?>
		</td>      
    </tr>
		
		<?php }

	$sql_wo	= mysqli_query($koneksi,"SELECT * FROM `tbl_wo` where tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user' ");
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
		$sql_stswo	= mysqli_query($koneksi,"SELECT (case when tgl_m_kerja<='$tanggal1' and (tgl_s_kerja >'$tanggal1' OR tgl_s_kerja='0000-00-00') and tgl_hold<>'$tanggal1' then 'On progres'
       else case when tgl_m_kerja<='$tanggal1' and tgl_s_kerja>'$tanggal1' and tgl_hold='$tanggal1' then 'Hold' ELSE
       case when tgl_s_kerja='$tanggal1' then 'finish' else 0 end end end)as status FROM tbl_wo where no_wo='$now' and tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user'");
		$sttswo= mysqli_fetch_array($sql_stswo);
		echo $sttswo['status'];
		?>
		</td>      
	</tr>
		
					<?php }?>

		<!-- MODUL ------------------------------------>
		<?php $sql_mod	= mysqli_query($koneksi,"SELECT * FROM `detail_project` where tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and username='$nama_user' ");
							while($row_mod	= mysqli_fetch_array($sql_mod)) {?>
			<tr style="font-weight:bold;font-style:italic;">
			<td><?php echo $NO++;?></td>
			<td><?php echo $tanggal1;?></td>
			<td><?php echo $no_proj=$row_mod['no_project'];?></td>
			<td>Modul</td>
			<td><?php echo $row_mod['username'];?></td>
			<td><?php echo $row_mod['detail_pekerjaan'];?></td>

			<td colspan="3" align="center">
				<?php
			$sql_stsmod	= mysqli_query($koneksi,"SELECT (case when tgl_m_kerja<='$tanggal1' and (tgl_s_kerja >'$tanggal1' OR tgl_s_kerja='0000-00-00') and tgl_hold<>'$tanggal1' then 'On progres'
			else case when tgl_m_kerja<='$tanggal1' and tgl_s_kerja>'$tanggal1' and tgl_hold='$tanggal1' then 'Hold' ELSE
			case when tgl_s_kerja='$tanggal1' then 'finish' else 0 end end end)as status FROM detail_project where no_project='$no_proj' and tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and username='$nama_user'");
			$sttsmod= mysqli_fetch_array($sql_stsmod);
			echo  $sttsmod['status'];
				?>

			</td>
		</tr>
	<?php		}
		$tanggal1 = date('Y-m-d',strtotime('+1 days',strtotime($tanggal1)));
   }
// coba daily--------------------------------------------------->>
?>

<div id="tbl_dailyreport"><form name="fmdaily" id="fmdaily" class="fmdaily" method="post">
    <table width="80%" border="1" class="table table-striped table-bordered table-hover">
    <input type="hidden" value="1" id="total_modul"  name="jumlahmodul">
     <?php

   	$cektgl	= mysqli_query($koneksi,"select * from daily_report where tgl  BETWEEN '$tgl1' AND '$tgl2' and user='$id_user' group by tgl");
                            while($group_tgl	= mysqli_fetch_array($cektgl))
    {     
        $caritgl=$group_tgl['tgl'];
        ?>  
       <tr> <td colspan=8></td></tr>
    <tr style="background-color:#7EB7FD;" >
		<th>NO</th>
		<th>TANGGAL</th>
        <th >PROJEK</th>
        <th >JENIS</th>
        <th >PIC</th>
        <th >PEKERJAAN / MODUL</th>
        <th >DIMINTA OLEH</th>
        <th >SECTION</th>
        <th >KETERANGAN</th>
       

        
    </tr>
                  
 
    <?php
		$NO=1;
   	$sql_project	= mysqli_query($koneksi,"select * from daily_report where tgl='$caritgl' and user='$id_user'");
							while($row_project	= mysqli_fetch_array($sql_project))
							{	?>
    <tr>
		<td><?php echo $NO;?></td>
        <td><?php echo $row_project['tgl'];?></td>
        <td><?php echo $row_project['kategori'];?></td>
        <td><?php echo $row_project['project'];?></td>
        <td><?php $username=$row_project['user'];
                 $detail_daily	= mysqli_query($koneksi,"select * from user where username ='".$username."'");
		    	while($rowdetail	= mysqli_fetch_array($detail_daily))
							{	?>
          <?php echo $rowdetail['nama'];?>
                            <?php } ?>
        
        </td>
        <td>
         <?php 
                $nomodul=$row_project['modul'];
                $detail_daily	= mysqli_query($koneksi,"select * from detail_project where objectid ='".$nomodul."'");
		    	while($rowdetail	= mysqli_fetch_array($detail_daily))
							{	?>
          <?php echo $rowdetail['detail_pekerjaan'];?>
                            <?php } ?><br>
            <?php echo $row_project['sub_modul'];?>
        </td>       
        <td><?php echo $row_project['pemohon'];?></td>
        <td><?php echo $row_project['section'];?></td>
        <td><select name="ktstatus" id="ktstatus" id-OBJ="<?php echo $row_project['objectid'];?>" id-modul="<?php echo $row_project['modul'];?>">
            <option value="<?php $row_project['keterangan'];?>"><?php echo $row_project['keterangan']; ?></option>
            <option value="finish">finish</option>
            <option value="on progress">On Progress</option>
            <option value="done">Done</option>
        </select>
            <!-- <input type="HIDDEN" name="objdaily" id="objdaily<?PHP echo $NO;?>" value="<?php echo $row_project['objectid'];?>"> -->
		</td>
       
     
      
    </tr>
 <?php	$NO++;}
 }?>
    </table><br>

    
    </form>
</div>
<?php }else{
	   $id_user		=$_SESSION['username'];
	   $nama_user	=$_SESSION['nama'];
                           $tgl1=date('Y-m-d');
                           $tgl2=date('Y-m-d');
	?>

<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-12">
						<div>
							<form action="menu_dailyreport.php" method="post">
							              <table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
                                            <tr>
                                                <td colspan="9" style=" background-color:pink;color:red;"><b> Daily Report Browse </b></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>From </td>
                                                <td><input type="text" id="tgl1" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tgl1" value="<?php echo $tgl;?>" ></td>
                                                <td>To</td>
                                                <td><input type="text" id="tgl2" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tgl2" value="<?php echo $tgl;?>" ></td>
                                                <td><button type="submit" name="tombol" value="SEARCH" class="btn btn-primary"><i class="ace-icon fa fa-search"></i>Search</button>
													<a href="export_dailyreport.php?tgl1=<?php echo $tgl1; ?>&tgl2=<?php echo $tgl2; ?>&id_user=<?php echo $id_user; ?>" class="btn btn-success"><i class="ace-icon fa fa-cloud-download"></i>Export ke Excell</a>
                             
												</td>
                                            </tr>
							</form>
						</div>
					</div>
												
									</div><!-- /.col -->
								</div><!-- /.row -->
					  <?php
//   $tgl1=$_POST['tgl1'];
//   $tgl2=$_POST['tgl2'];
						   
                            ?>		
<?php
	require_once('config.php');
 

?>
<div><form name="fmdaily" id="fmdaily" class="fmdaily" method="post">
    <table width="80%" border="1" class="table table-striped table-bordered table-hover">
    <input type="hidden" value="1" id="total_modul"  name="jumlahmodul">
     <?php

   	$cektgl	= mysqli_query($koneksi,"select * from daily_report where tgl  BETWEEN '$tgl1' AND '$tgl2' and user='$id_user' group by tgl");
                            while($group_tgl	= mysqli_fetch_array($cektgl))
    {     
        $caritgl=$group_tgl['tgl'];
        ?>  
       <tr> <td colspan=8></td></tr>
    <tr style="background-color:#7EB7FD;" >
		<th>NO</th>
		<th>TANGGAL</th>
        <th >PROJEK</th>
        <th >JENIS</th>
        <th >PIC</th>
        <th >PEKERJAAN / MODUL</th>
        <th >DIMINTA OLEH</th>
        <th >SECTION</th>
        <th >KETERANGAN</th>
   
        
    </tr>
                  
 
    <?php
	$NO=1;
   	$sql_project	= mysqli_query($koneksi,"select * from daily_report where tgl='$caritgl' and user='$id_user'");
							while($row_project	= mysqli_fetch_array($sql_project))
							{	?>
    <tr>
	 	<td><?php echo $NO;?></td>
        <td><?php echo $row_project['tgl'];?></td>
        <td><?php echo $row_project['kategori'];?></td>
        <td><?php echo $row_project['project'];?></td>
        <td><?php $username=$row_project['user'];
                 $detail_daily	= mysqli_query($koneksi,"select * from user where username ='".$username."'");
		    	while($rowdetail	= mysqli_fetch_array($detail_daily))
							{	?>
          <?php echo $rowdetail['nama'];?>
                            <?php } ?>
        
        </td>
        <td>
         <?php 
                $nomodul=$row_project['modul'];
                $detail_daily	= mysqli_query($koneksi,"select * from detail_project where objectid ='".$nomodul."'");
		    	while($rowdetail	= mysqli_fetch_array($detail_daily))
							{	?>
          <?php echo $rowdetail['detail_pekerjaan'];?>
                            <?php } ?><br>
            <?php echo $row_project['sub_modul'];?>
        </td>       
        <td><?php echo $row_project['pemohon'];?></td>
        <td><?php echo $row_project['section'];?></td>
        <td><select name="ktstatus" id="ktstatus" id-OBJ="<?php echo $row_project['objectid'];?>" id-modul="<?php echo $row_project['modul'];?>">
            <option value="<?php $row_project['keterangan'];?>"><?php echo $row_project['keterangan']; ?></option>
            <option value="finish">finish</option>
            <option value="on progress">On Progress</option>
            <option value="done">Done</option>
        </select>
        
     </td>
       
     
      
    </tr>
 <?php $NO++;	}
 }?>
    </table><br>

    
    </form>
</div>


<?php }?>

						</div>
					</div>
				</div>
			</div>
				
									
					</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->

<?php include "menu-bawah.php"; ?>
		<!-- <script src="js/jquery-1.11.2.min.js"></script> -->
        <!-- <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>
		<script src="assets/js/bootstrap-multiselect.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		 -->
		 	<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.bootstrap-duallistbox.min.js"></script>
		<script src="assets/js/jquery.raty.min.js"></script>
		<script src="assets/js/bootstrap-multiselect.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/typeahead.jquery.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		
	
<script type="text/javascript">
	$(document).ready(function(){
		$('select[id="ktstatus"]').change(function() {
           
			
			status 	=$(this).val();
            //objdaily=$('#objdaily').val();
			
        alert(status);
        // alert(objdaily);
            $.ajax({
                    type:'POST',
                    url:'edit_status_daily.php',
                    data:{objdaily  :$(this).attr('id-OBJ'),
						  modul  :$(this).attr('id-modul'),
                           status   :status,
                          },
                    success:function(cek){
                      	swal({ 
						title: "Succes!",
						text: "status keterangan di update",
						type: "success" 
					},
					function(){
								window.location.href = 'menu_dailyreport.php';
							});
                    }
                });
			
		}); 

	
	});
 
</script>	

		<script>

				 $(function(){
            $(document).on('click','.lihat_daily_report',function(e){
                e.preventDefault();
                $("#mydailyreport").modal('show');
                $.post('lihat_daily_report.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".dailyreport-body").html(html);
                    }   
                );
            });
        });


		 $(function(){
            $(document).on('click','.tambah-daily',function(e){
                e.preventDefault();
                $("#mydaily").modal('show');
                $.post('forminput_daily.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".daily-body").html(html);
                    }   
                );
            });
        });
				 $(function(){
            $(document).on('click','.tambah-plan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('formwo_plan_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
       
        
        
         $(function(){
            $(document).on('click','.lihat_daily',function(e){
                e.preventDefault();
                $("#finishModal").modal('show');
                $.post('finish_wo_modal.php',
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

<!-- input -->


<script type="text/javascript">
	$(document).ready(function(){
		$('select[id="cek_pilih"]').change(function() {
           
			
			cek_project 	=$(this).val();
           // alert(cek_project);
            $.ajax({
                    type:'POST',
                    url:'ambil_daily.php',
                    data:'pilih_id='+cek_project,
                    success:function(vb){
                        // alert(vb);
                        $('#project').html(vb);
                    }
                });
			
		}); 
		
        $('select[id="project"]').click(function() {
           
			
			project 	=$(this).val();
            cek_pilih 	=$('#cek_pilih').val();
          //  alert(project);
            $.ajax({
                    type:'POST',
                    url:'ambil_daily.php',
                    data:{ pilih_id :project,
						   cek_pilih:cek_pilih,	
						},
                    success:function(msg){
                        var [vb,section,peminta]=msg.split("|");
                        $('#modul').html(vb);
                        $('#section').val(section);
                        $('#peminta').val(peminta);
                    }
                });
			          
		}); 

        //simpan daily report
        	$(".simpan_daily").click(function(){
            
                var cek_pilih   = $('#cek_pilih').val();
                var project     = $('#project').val();
                var modul       = $('#modul').val();
                var submodul    = $('#submodul').val();
                var ket         = $('#ket').val();
				var tgl         = $('#tgl').val();

                var data        = $('#fmdaily').serialize();
                
                if(cek_pilih==''){
					sweetAlert("JENIS PP / WO HARUS DI PILIH", "", "error");   	
			 	$("#simpan_daily ").show();	
                 $("#cek_pilih").css('border', '3px #C33 solid');
				}else if(project==''){
					sweetAlert("NO PP/WO HARUS DI PILIH", "", "error");   	
			 	$("#simpan_daily").show();
                  $("#project").css('border', '3px #C33 solid');	
				}
				else if(tgl==''){
					sweetAlert("TANGGAL HARUS DI PILIH", "", "error");   	
			 	$("#simpan_daily").show();
                  $("#tgl").css('border', '3px #C33 solid');	
				}
				else if( modul==''){
					sweetAlert("MODUL HARUS DI PILIH", "", "error");   	
			 	$("#simpan_daily ").show();	
                 	$("#simpan_daily").show();
                  $("#modul").css('border', '3px #C33 solid');	
				}else if(submodul==''){
					sweetAlert("DETAIL PEKERJAAN HARUS DI ISI", "", "error");   	
			 	$("#simpan_daily ").show();	
                    $("#submodul").css('border', '3px #C33 solid');	
				}else if(ket==''){
					sweetAlert("KETERANGAN HARUS DI PILIH", "", "error");   	
			 	$("#simpan_daily ").show();	
                    $("#ket").css('border', '3px #C33 solid');
                }	
				else{
				
				
			$.ajax({
				type: 'POST',
				url: 'simpan_daily_report.php',
				data: data,
				success: function(msg) {
				
					 swal({ 
	                          title: "Transaksi Berhasil!", 
                                    text: "I will close in 2 seconds.",
                                 
                                    type: "success"
	                    });
                       		 window.location.href="menu_dailyreport.php".trim();
					

				}
			});
            }
		});

	
	});
 
</script>
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
</script>
<script>
function add_modul(){
    alert("cek");
      var new_chq_no = parseInt($('#total_modul').val())+1;
      var new_input="document.write ("<br>");";
      $('#tampil_project').append(new_input);
      $('#total_modul').val(new_chq_no);
    }

     function remove_modul(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
      
        $('#value_'+last_chq_no).remove();
        $('#value2_'+last_chq_no).remove();
        $('#add_'+last_chq_no).remove();
        $('#remove_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }


</script>
<script>
	$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true,
					 dateFormat: 'yy-mm-dd'
				});
	</script>


    

    <script>
    $(function(){
            $(document).on('click','#id_daily',function(e){
                e.preventDefault();
                $("#statusdaily").modal('show');
                $.post('edit_status_daily.php',
                    {id:$(this).attr('data-id'),
                    ket:$(this).attr('ket')
                    },
                    function(html){
                        $(".dailystatus-body").html(html);
                    }   
                );
            });
        });
    </script>




	<script type="text/javascript">
			jQuery(function($){
			    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'});
				var container1 = demo1.bootstrapDualListbox('getContainer');
				container1.find('.btn').addClass('btn-white btn-info btn-bold');
			
				/**var setRatingColors = function() {
					$(this).find('.star-on-png,.star-half-png').addClass('orange2').removeClass('grey');
					$(this).find('.star-off-png').removeClass('orange2').addClass('grey');
				}*/
				$('.rating').raty({
					'cancel' : true,
					'half': true,
					'starType' : 'i'
					/**,
					
					'click': function() {
						setRatingColors.call(this);
					},
					'mouseover': function() {
						setRatingColors.call(this);
					},
					'mouseout': function() {
						setRatingColors.call(this);
					}*/
				})//.find('i:not(.star-raty)').addClass('grey');
				
				
				
				//////////////////
				//select2
				$('.select2').css('width','200px').select2({allowClear:true})
				$('#select2-multiple-style .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('.select2').addClass('tag-input-style');
					 else $('.select2').removeClass('tag-input-style');
				});
				
				//////////////////
				$('.multiselect').multiselect({
				 enableFiltering: true,
				 buttonClass: 'btn btn-white btn-primary',
				 templates: {
					button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"></button>',
					ul: '<ul class="multiselect-container dropdown-menu"></ul>',
					filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
					filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
					li: '<li><a href="javascript:void(0);"><label></label></a></li>',
					divider: '<li class="multiselect-item divider"></li>',
					liGroup: '<li class="multiselect-item group"><label class="multiselect-group"></label></li>'
				 }
				});
				
				
				///////////////////
					
				//typeahead.js
				//example taken from plugin's page at: https://twitter.github.io/typeahead.js/examples/
				var substringMatcher = function(strs) {
					return function findMatches(q, cb) {
						var matches, substringRegex;
					 
						// an array that will be populated with substring matches
						matches = [];
					 
						// regex used to determine if a string contains the substring `q`
						substrRegex = new RegExp(q, 'i');
					 
						// iterate through the pool of strings and for any string that
						// contains the substring `q`, add it to the `matches` array
						$.each(strs, function(i, str) {
							if (substrRegex.test(str)) {
								// the typeahead jQuery plugin expects suggestions to a
								// JavaScript object, refer to typeahead docs for more info
								matches.push({ value: str });
							}
						});
			
						cb(matches);
					}
				 }
			
				 $('input.typeahead').typeahead({
					hint: true,
					highlight: true,
					minLength: 1
				 }, {
					name: 'states',
					displayKey: 'value',
					source: substringMatcher(ace.vars['US_STATES'])
				 });
					
					
				///////////////
				
				
				//in ajax mode, remove remaining elements before leaving page
				$(document).one('ajaxloadstart.page', function(e) {
					$('[class*=select2]').remove();
					$('select[name="duallistbox_demo1[]"]').bootstrapDualListbox('destroy');
					$('.rating').raty('destroy');
					$('.multiselect').multiselect('destroy');
				});
			
			});
		</script>