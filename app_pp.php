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
				
<div class="col-sm-6">
<div class="panel-heading">List Permintaan Perbaikan</div>
<table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
							
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor PP</th>
									<th  data-sortable="true">Nomor Tiket</th>
									<th  data-sortable="true">Status</th>
									<th  data-sortable="true">IT</th>
									<th  data-sortable="true">Action</th>
						    </tr>
							
						    </thead>
							<?php
							require_once("config.php");
								$sqls	= mysqli_query($koneksi,"select * from user where username ='".$user."'");
								$datap	= mysqli_fetch_array($sqls);
								$sec	= $datap['section'];
								$shead = $_SESSION['username'];
		if ($shead =='sh-lmnpl2'){
				$result="SELECT * FROM tbl_pp WHERE section in ('PL2 LAMINASI','PL2 SLITTER') AND status_pp IN ('finish') order by status_pp DESC, no_pp ASC";
				}
		else if ($shead =='ssh-coating'){
				$result="SELECT * FROM tbl_pp WHERE section in ('COATING','RND') AND status_pp IN ('finish') order by status_pp DESC, no_pp ASC";
				}
		else if ($shead =='sh-cpp01'){
				$result="SELECT * FROM tbl_pp WHERE section in ('PL3 CPP', 'PL 3 METALIZE', 'PL 3 RECYCLE') AND status_pp IN ('finish') order by status_pp DESC, no_pp ASC";
				}else{								
								$result="SELECT * FROM tbl_pp WHERE section='".$sec."' AND status_pp IN ('finish') order by status_pp DESC, no_pp ASC";
						}
								$query_input=mysqli_query($koneksi,$result);
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){

										$usrpp=$data['diterima'];
										$ckus	= mysqli_query($koneksi,"select * from user where nama ='".$usrpp."'");
										$uspp	= mysqli_fetch_array($ckus);

										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
										<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
									<?php
										echo '<td>'.$data['no_antri'].'</td>';
										echo '<td>'.$data['status_pp'].'</td>';
										echo '<td>'.$uspp['dev'].'</td>';
										if($data['status_pp']=='finish'){
											echo '<td>
											<a href="pp_complete.php?nopp='.$data['no_pp'].'" class="btn  btn-minier btn-primary">
											<i class="ace-icon fa fa-pencil-square-o"></i>
											APPROVE
																					</a></td>';
										}else if ($data['status_pp']=='complete'){
											echo'<td><button class="btn btn-minier btn-success" disabled>
												<i class="ace-icon fa fa-check"></i>
												Success
											</button></td>';
											}
										echo '</tr>';
										
										$no++;
									}
								}
							 ?>
							</table>
</div>
					
	<div class="vspace-12-sm"></div>				
	<!-- ROW 2 -->
<div class="col-sm-6">
<div class="panel-heading">List Work Order</div>						
<table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>						
	<tr>
		<th data-sortable="true">No.</th>
		<th  data-sortable="true">Nomor WO</th>
		<th  data-sortable="true">Pemohon</th>
		<th  data-sortable="true">Tgl Pengajuan</th>
		<th  data-sortable="true">IT</th>
		<th  data-sortable="true">Status</th>
		<th  data-sortable="true">Action</th>
	</tr>
</thead>
	<?php
		$shead = $_SESSION['username'];
		if ($shead =='sh-lmnpl2'){
				$sql1	= mysqli_query($koneksi,"select * from tbl_wo where section in ('PL2 LAMINASI','PL2 SLITTER') and status_wo IN ('waiting') order by tgl_permohonan");
			}else if ($shead =='ssh-coating'){
				$sql1	= mysqli_query($koneksi,"select * from tbl_wo where section in ('COATING','RND') and status_wo IN ('waiting') order by tgl_permohonan");
			}else if ($shead =='sh-cpp01'){
				$sql1	= mysqli_query($koneksi,"select * from tbl_wo where section in ('PL3 CPP', 'PL 3 METALIZE', 'PL 3 RECYCLE') and status_wo IN ('waiting') order by tgl_permohonan");
			}else{
		$sql1	= mysqli_query($koneksi,"select * from tbl_wo where section='".$sec."' and status_wo IN ('waiting') order by tgl_permohonan");
		}
		$no1	=	1;
		while($data1 = mysqli_fetch_array($sql1)){
			$usrwo=$data1['diterima'];
			$ckuswo	= mysqli_query($koneksi,"select * from user where nama ='".$usrwo."'");
			$usppwo	= mysqli_fetch_array($ckuswo);
			
			echo '<tr>';
			echo '<td>'.$no1.'</td>';
			?>
			<td><a href="#" class="edit-record2" data-id="<?php echo $data1['no_wo']; ?>" ><?php echo $data1['no_wo']; ?></a></td>
			<?php
			echo '<td>'.$data1['pemohon'].'</td>';
			echo '<td>'.$data1['tgl_permohonan'].'</td>';
			echo '<td>'.$usppwo['dev'].'</td>';
			echo '<td>'.$data1['status_wo'].'</td>';
			if($data1['status_wo']=='waiting'){
				echo '<td>
				<a href="app_wo.php?nowo='.$data1['no_wo'].'" class="btn  btn-minier btn-primary">
				<i class="ace-icon fa fa-pencil-square-o"></i>
					APPROVE
				</a>
				';
				?>
				&nbsp;
				<button type="submit" class="btn btn-danger btn-minier" onclick="window.open('reject_window.php?kode=<?php echo $data1['no_wo'];?>','winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=500,height=580');"><i class="ace-icon fa fa-trash-o"></i> REJECT</button>
				
				</td>
				<?php
				}
			
			$no1++;
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
