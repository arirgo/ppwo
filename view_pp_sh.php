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
		<title>Dashboard - Section Head IT</title>

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
				<li class="active">List PP</li>
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
							
				
				<div class="panel panel-default">
				
						<div class="panel-body">
						
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:900px">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Detail PP</h4>
										</div>
									<div class="modal-body">
									</div>
								<div class="modal-footer">
<!--
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
-->
                        </div>
					</div>
				</div>
				</div>

				<!-- -->
				
<div class="panel-body">
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
	$sqlm	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='complete' and section='".$akses['section']."'");
	$data1	=	mysqli_fetch_array($sqlm);
	$sqln	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='finish' and section='".$akses['section']."'");
	$data2	=	mysqli_fetch_array($sqln);
	$sqlo	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='hold' and section='".$akses['section']."'");
	$data3	=	mysqli_fetch_array($sqlo);
	$sqlp	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='on process' and section='".$akses['section']."'");
	$data4	=	mysqli_fetch_array($sqlp);
	$sqlq	=	mysqli_query($koneksi,"select status_pp, count(status_pp) as jml from tbl_pp where status_pp='waiting' and section='".$akses['section']."'");
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
	
	<!--
				<td><a href = "javascript:  window.open('s_a_table.php?n=<?php //echo $dataq['status_pp']; ?>', 'winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500');" class = "btn btn-primary">Complete</a></td>
-->
	
		
		<script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('s_a_complete_modal.php',
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
            
        });
        
    </script>
		
	
</body>
</html>

