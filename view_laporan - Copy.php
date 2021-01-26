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
				<li class="active">Daily Report</li>
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Laporan Daily Report
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									ALL
								</small>
							</h1>
						</div><!-- /.page-header -->
							
										<!--daily  -->

								<div class="panel panel-default">
					
						<div class="panel-body">
						
							<div class="modal fade" id="mydaily" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:1300px; height:1000px;">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">INPUT DAILY</h4>
										</div>
									<div class="daily-body">
									</div>
								<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>

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
				<div class="panel panel-default">
					
					<div class="panel-body">
						
					
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
				<!-- <button class="tambah-daily btn btn-app btn-primary btn-sm"><i class="ace-icon fa fa-pencil-square-o bigger-200"></i>ADD</button> -->
				<div class="panel-body">
	<?php
			
			if(isset($_POST['tombol'])){
			?>
<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-3">
						<div>
							<form action="view_laporan.php" method="post">
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
							require_once('config.php');
  $id_user=$_SESSION['username'];
  $tgl1=$_POST['tgl1'];
  $tgl2=$_POST['tgl2'];
?>
<div><form name="fmdaily" id="fmdaily" class="fmdaily" method="post">
    <table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
   <thead>
    <input type="hidden" value="1" id="total_modul"  name="jumlahmodul">

    
    <tr style="background-color:#7EB7FD;" >
        <th >PP/WO</th>
	    <th >MODUL</th>
		 <th >APLIKASI / HARDWARE / SOFWARE</th>
        <th >PIC</th>
        <th >TGL</th>
		<th >ket</th>
    </tr>
    </thead>
    <tbody>
  <?php
   	$sql_project	= mysqli_query($koneksi,"SELECT daily_report.*,detail_project.detail_pekerjaan,modul,soft_hard FROM `daily_report`,`detail_project` where daily_report.tgl BETWEEN '$tgl1' AND '$tgl2' and detail_project.objectid=daily_report.modul group by daily_report.modul");
						while($row_project	= mysqli_fetch_array($sql_project))
		{	$modul=$row_project['modul'];?>
    <tr>
		<td><?php echo $row_project['project'];?></td>
		<td><?php echo $row_project['detail_pekerjaan'];?></td>
		<td><?php echo $row_project['soft_hard'];?></td>
        <td><?php $username=$row_project['user'];
                 $detail_daily	= mysqli_query($koneksi,"select * from user where username ='".$username."'");
		    	while($rowdetail	= mysqli_fetch_array($detail_daily))
							{	?>
          <?php echo $rowdetail['nama'];?>
                            <?php } ?>
        
        </td>
        
		<?php $sqlstatus	= mysqli_query($koneksi,"SELECT * FROM `daily_report` where modul='$modul' and tgl BETWEEN '$tgl1' AND '$tgl2' group by tgl desc ");
			  $row_status	= mysqli_fetch_array($sqlstatus)?>
			 <td><?php echo $row_status['tgl'];?></td>
			<td><?php echo $row_status['keterangan']; ?></td>
		
					 
    </tr>
 <?php } ?>
    
 </tbody>
    </table><br>

    
    </form>
	<?php
	$timestamp    = strtotime('2020-03-20');
    echo $hari         = date('l', $timestamp); 
	?>
</div>

						</div>
					</div>
				</div>
			</div>
				
									
					</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->
<?php }else{?>
<!-- -------------------------------------------------------------------------------------------------awal -->
<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-3">
						<div>
							<form action="view_laporan.php" method="post">
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
	require_once('config.php');
  $id_user=$_SESSION['username'];
 
?>
<div><form name="fmdaily" id="fmdaily" class="fmdaily" method="post">
    <table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
   <thead>
    <input type="hidden" value="1" id="total_modul"  name="jumlahmodul">

    <tr style="background-color:#7EB7FD;" >
        <th >PP/WO</th>
	    <th >MODUL</th>
		<th >APLIKASI / HARDWARE / SOFWARE</th>
        <th >PIC</th>
        <th >TGL</th>
		 <th >ket</th>
    </tr>
    </thead>
    <tbody>
 
    <?php
   	$sql_project	= mysqli_query($koneksi,"SELECT daily_report.*,detail_project.detail_pekerjaan,modul,soft_hard FROM `daily_report`,`detail_project` where daily_report.tgl BETWEEN '$tgl1' AND '$tgl2' and detail_project.objectid=daily_report.modul group by daily_report.modul");
						while($row_project	= mysqli_fetch_array($sql_project))
		{	$modul=$row_project['modul'];?>
    <tr>
		<td><?php echo $row_project['project'];?></td>
		<td><?php echo $row_project['detail_pekerjaan'];?></td>
		<td><?php echo $row_project['soft_hard'];?></td>
        <td><?php $username=$row_project['user'];
                 $detail_daily	= mysqli_query($koneksi,"select * from user where username ='".$username."'");
		    	while($rowdetail	= mysqli_fetch_array($detail_daily))
							{	?>
          <?php echo $rowdetail['nama'];?>
                            <?php } ?>
        
        </td>
		<?php $sqlstatus	= mysqli_query($koneksi,"SELECT * FROM `daily_report` where modul='$modul' and tgl BETWEEN '$tgl1' AND '$tgl2' group by tgl desc ");
			  $row_status	= mysqli_fetch_array($sqlstatus)?>
		<td><?php echo $row_status['tgl'];?></td>
		<td><?php echo $row_status['keterangan']; ?></td>
					 
    </tr>
 <?php } ?>
 </tbody>
    </table><br>

    
    </form>
</div>
	                </div>
					</div>
				</div>
			</div>
				
									
					</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->

<?php }?>


					
<?php include "menu-bawah.php"; ?>
		<script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>
		
		
		

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

