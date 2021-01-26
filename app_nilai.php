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
		<title>Approve PPWO</title>

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
<?php include "menu-kiri.php"; 
$pls=$_SESSION['pls'];
?>
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
				<li class="active">Approve Permintaan Perbaikan</li>
			</ul><!-- /.breadcrumb -->

					</div>
		<!-- -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="width:1000px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel">Detail PP</h4>
								</div>
								<div class="pp_modal-body"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				
				<!-- -->
				
				<!-- -->
					<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
						<div class="modal-dialog" style="width:1100px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel2">Detail WO</h4>
								</div>
								<div class="WO_modal-body"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				
				<!-- -->
				
		<!-- tampilan 2 row -->
<div class="panel-body">
<div class="row">
		

<div class="col-sm-12">
<div class="panel-heading">LIST NILAI PERMINTAAN PERBAIKAN FINISH</div>						
<table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>						
	<tr>
		<th data-sortable="true">No.</th>
		<th  data-sortable="true">Nomor PP</th>
		<th  data-sortable="true">Pemohon</th>
		<th  data-sortable="true">Tgl Pengajuan</th>
		<th  data-sortable="true">Tgl Selesai</th>
		<th  data-sortable="true">IT</th>
		<th  data-sortable="true">Status</th>
		<th  data-sortable="true">SPV</th>
		<th  data-sortable="true">SSHIT</th>
	
	</tr>
</thead>
	<?php
		$shead = $_SESSION['username'];
		$sql3	= mysqli_query($koneksi,"select tbl_pp.*,nilai_pp.*,user.* from tbl_pp inner join nilai_pp on tbl_pp.no_pp=nilai_pp.no_pp join user on tbl_pp.diterima=user.nama where tbl_pp.pls='$pls' and tbl_pp.tgl_s_kerja >'2020-07-05'");
		
		$no1	=1	;	
		while($data3 = mysqli_fetch_array($sql3)){
			
			
			if($shead=='ssh-it' and $data3['dev']=='inf' and $data3['sshit']=='')
			
			{
			echo '<tr>';
			echo '<td>'.$no1++.'</td>';
			?>
			<td><a href="#" class="edit-record" data-id="<?php echo $data3['no_pp']; ?>" ><?php echo $data3['no_pp']; ?></a></td>
			<?php
			echo '<td>'.$data3['pelapor'].'</td>';
			echo '<td>'.$data3['tgl_lapor'].'</td>';
			echo '<td>'.$data3['tgl_s_kerja'].'</td>';
			echo '<td>'.$data3['dev'].'</td>';
			echo '<td>'.$data3['status_pp'].'</td>';
			echo '<td>'.$data3['spv'].'</td>';
			echo '<td>'.$data3['sshit'].'</td>';
			
			}else if($shead=='ssh-it' and $data3['dev']=='pro' and $data3['sshit']=='' and $data3['spv'] !='')
			{
			echo '<tr>';
			echo '<td>'.$no1++.'</td>';
			?>
			<td><a href="#" class="edit-record" data-id="<?php echo $data3['no_pp']; ?>" ><?php echo $data3['no_pp']; ?></a></td>
			<?php
			echo '<td>'.$data3['pelapor'].'</td>';
			echo '<td>'.$data3['tgl_lapor'].'</td>';
			echo '<td>'.$data3['tgl_s_kerja'].'</td>';
			echo '<td>'.$data3['dev'].'</td>';
			echo '<td>'.$data3['status_pp'].'</td>';
			echo '<td>'.$data3['spv'].'</td>';
			echo '<td>'.$data3['sshit'].'</td>';
			
			}else if($shead=='it01' and $data3['dev']=='pro' and $data3['spv'] ==''){
				echo '<tr>';
			echo '<td>'.$no1++.'</td>';
			?>
			<td><a href="#" class="edit-record" data-id="<?php echo $data3['no_pp']; ?>" ><?php echo $data3['no_pp']; ?></a></td>
			<?php
			echo '<td>'.$data3['pelapor'].'</td>';
			echo '<td>'.$data3['tgl_lapor'].'</td>';
			echo '<td>'.$data3['tgl_s_kerja'].'</td>';
			echo '<td>'.$data3['dev'].'</td>';
			echo '<td>'.$data3['status_pp'].'</td>';
			echo '<td>'.$data3['spv'].'</td>';
			echo '<td>'.$data3['sshit'].'</td>';
			
			}
			
			
		}


	
		?>
				</table>
		</div>			
</div>
<br>


<div class="col-sm-12">
<div class="panel-heading">LIST NILAI WORK ORDER FINISH</div>						
<table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>						
	<tr>
		<th data-sortable="true">No.</th>
		<th  data-sortable="true">Nomor WO</th>
		<th  data-sortable="true">Pemohon</th>
		<th  data-sortable="true">Tgl Pengajuan</th>
		<th  data-sortable="true">Tgl Selesai</th>
		<th  data-sortable="true">IT</th>
		<th  data-sortable="true">Status</th>
	
	</tr>
</thead>
	<?php
		
	
		$sql3_	= mysqli_query($koneksi,"select tbl_wo.*,nilai_wo.*,user.* from tbl_wo  join nilai_wo on tbl_wo.no_wo=nilai_wo.no_wo join user on tbl_wo.diterima=user.nama where tbl_wo.pls='$pls' and tbl_wo.tgl_s_kerja >'2020-07-05'");
		$no1_	=	1;
		
		while($data3_ = mysqli_fetch_array($sql3_)){
		
			if($shead=='ssh-it' and $data3_['dev']=='inf' and $data3_['sshit']=='')
			{
				
				echo '<tr>';
				echo '<td>'.$no1_++.'</td>';
				?>
				<td><a href="#" class="edit-record2" data-id="<?php echo $data3_['no_wo']; ?>" ><?php echo $data3_['no_wo']; ?></a></td>
				<?php
				echo '<td>'.$data3_['pemohon'].'</td>';
				echo '<td>'.$data3_['tgl_permohonan'].'</td>';
				echo '<td>'.$data3_['tgl_s_kerja'].'</td>';
				echo '<td>'.$data3_['dev'].'</td>';
				echo '<td>'.$data3_['status_wo'].'</td>';
				
			}
			else if($shead=='ssh-it' and $data3_['dev']=='pro' and $data3_['sshit']=='' and $data3_['spv'] !='')
			{
				
				echo '<tr>';
				echo '<td>'.$no1_++.'</td>';
				?>
				<td><a href="#" class="edit-record2" data-id="<?php echo $data3_['no_wo']; ?>" ><?php echo $data3_['no_wo']; ?></a></td>
				<?php
				echo '<td>'.$data3_['pemohon'].'</td>';
				echo '<td>'.$data3_['tgl_permohonan'].'</td>';
				echo '<td>'.$data3_['tgl_s_kerja'].'</td>';
				echo '<td>'.$data3_['dev'].'</td>';
				echo '<td>'.$data3_['status_wo'].'</td>';
				
			}
			else if($shead=='it01' and $data3_['dev']=='pro' and $data3_['spv'] =='')
			{
				
				echo '<tr>';
				echo '<td>'.$no1_++.'</td>';
				?>
				<td><a href="#" class="edit-record2" data-id="<?php echo $data3_['no_wo']; ?>" ><?php echo $data3_['no_wo']; ?></a></td>
				<?php
				echo '<td>'.$data3_['pemohon'].'</td>';
				echo '<td>'.$data3_['tgl_permohonan'].'</td>';
				echo '<td>'.$data3_['tgl_s_kerja'].'</td>';
				echo '<td>'.$data3_['dev'].'</td>';
				echo '<td>'.$data3_['status_wo'].'</td>';
				
			}

		}
		
		?>
				</table>
		</div>			


</div>
<br><br>
</div>
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
                        $(".pp_modal-body").html(html);
                    }   
                );
            });
            
            $(document).on('click','.edit-record2',function(e){
                e.preventDefault();
                $("#myModal2").modal('show');
                $.post('formwo_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".WO_modal-body").html(html);
                    }   
                );
            });
        });
        
        //~ 
        
       
    </script>
		
	
</body>
</html>
