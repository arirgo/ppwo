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
		<title>Show All</title>

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
<?php //include "menu-atas.php"; ?>
<?php //include "menu-kiri.php"; ?>
<?php //include "menu-kiriadmin.php"; ?>
<div class="main-content">
	<div class="main-content-inner">
		
		<?php
			$id	=	$_GET['id'];
			$stat	=	$_GET['stat'];
			//~ echo	$status;
		?>	

		<div class="page-content">
			<div class="page-header">
				<h1>
				PP Online 
				<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Overview PPWO IT <?php echo	$stat; ?>
				</small>
				</h1>
			</div><!-- /.page-header -->
							
				
	<div class="panel panel-default">
		<div class="panel-body">
				
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:1100px">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Detail PP</h4>
									</div>
									<div class="modal-body"></div>
									<div class="modal-footer"></div>
								</div>
							</div>
							</div>
							<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:1100px">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Detail WO</h4>
									</div>
									<div class="modal-body"></div>
									<div class="modal-footer"></div>
								</div>
							</div>
							</div>


		
		
		<!--ISI Konten-->
		
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
	<?php
		if($id=='pp'){
	?>					
		<tr>
			<th  data-sortable="true">No.</th>
			<th  data-sortable="true">Nomor PP</th>
			<th  data-sortable="true">Section</th>
			<th  data-sortable="true">Tanggal Lapor</th>
			<th  data-sortable="true">Status</th>
			<th  data-sortable="true">Keterangan</th>
		</tr>
	</thead>

<?php 

require_once('config.php');
$sql	=	mysqli_query($koneksi,"select * from tbl_pp where status_pp = 'hold' order by tgl_lapor asc");
$no = 1;
while($data = mysqli_fetch_array($sql)){
	
	echo	'<tr>';
	echo	'<td>'.$no.'</td>';
	?>
	<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
	<?php
	echo	'<td>'.$data['section'].'</td>';
	echo	'<td>'.$data['tgl_lapor'].'</td>';
	echo	'<td>'.$data['status_pp'].'</td>';
	echo	'<td>'.$data['status_hold'].'</td>';
	echo	'</tr>';
	$no++;
	}
} else {
		?>
		<tr>
			<th  data-sortable="true">No.</th>
			<th  data-sortable="true">Nomor WO</th>
			<th  data-sortable="true">Section</th>
			<th  data-sortable="true">Tanggal Pengajuan</th>
			<th  data-sortable="true">Status</th>
			<th  data-sortable="true">Keterangan</th>
		</tr>
	</thead>

<?php 

require_once('config.php');
$sql	=	mysqli_query($koneksi,"select * from tbl_wo where status_wo = 'hold' order by tgl_permohonan asc");
$no = 1;
while($data = mysqli_fetch_array($sql)){
	
	echo	'<tr>';
	echo	'<td>'.$no.'</td>';
	?>
	<td><a href="#" class="edit-record1" data-id="<?php echo $data['no_wo']; ?>" ><?php echo $data['no_wo']; ?></a></td>
	<?php
	echo	'<td>'.$data['section'].'</td>';
	echo	'<td>'.$data['tgl_permohonan'].'</td>';
	echo	'<td>'.$data['status_wo'].'</td>';
	echo	'<td>'.$data['status_hold'].'</td>';
	echo	'</tr>';
	$no++;
	}
	
	}
?>
</table>
		
		<!--ISI Konten-->
				
	</div>
	</div>
</div>
				
								

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
                $.post('formpp_modal_os.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
            $(document).on('click','.edit-record1',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('formwo_modal_os.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
            
            $(document).on('click','.edit-record2',function(e){
				window.open('s_a_table.php?n=complete',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
        });
        
    </script>
		
	
</body>
</html>

