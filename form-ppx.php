<!DOCTYPE html>
<html lang="en">
<?php
include "head.php";

?>

<body class="no-skin">
<?php include "body.php";?>
	<div class="page-header">
	<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.html">Home</a>
							</li>
		<li>
			Forms
		</li>
		<li class="active">PP Online</li>
		</ul><!-- /.breadcrumb -->
		<div class="nav-search" id="nav-search">
			<form class="form-search">
				<span class="input-icon">
				<input type="text" placeholder="Pencarian ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
				<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
			</form>
		</div><!-- /.nav-search -->
	</div>

		
		<h1>
			Form PP Online
			<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
				Permintaan Perbaikan IT <br>
			</small>
		</h1>
	</div><!-- /.page-header -->
						
	<div class="row">
	<div class="col-xs-12">
		
		<form name="f_pp" action="pp_proses.php" method="POST" class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor PP</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" name="txtnopp" value="<?php 
								
								require_once('config.php');
								$sqlx = mysqli_query($koneksi,"SELECT max(no) as noac from tbl_pp where year(tgl_lapor)=year(CURDATE()) and month(tgl_lapor)=month(CURDATE())");
								$data = mysqli_fetch_array($sqlx);
								$no = strval($data['noac']);
								//echo $no;
									if ($no==''){
											$no= strval($data['noac'])+1;
											echo $no;
										}else{
												$no= strval($data['noac'])+1;
											echo $no;
											}
								
								
								$sql = mysqli_query($koneksi,"select * from user where section='".$nopp."'");
								$data2 = mysqli_fetch_array($sql);
								echo '/'.$data2['singkatan'].'/'.date('m/y');
								
					
					?>" readonly>  <input type="hidden" name="txtno" value="<?php echo $no;?>">
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Section</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" class="col-xs-10 col-sm-3" name="txtsection" value="<?php echo $data2['section'];?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pelapor</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" name="txtpelapor" placeholder="Nama Pelapor" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Permasalahan</label>

										<div class="col-sm-9">
											<textarea rows="3" cols="35 " id="form-field-8" placeholder="Permasalahan Komputer" name="txtpermasalahan"></textarea>
										</div>
									</div>
					
					
					

									<div class="clearfix form-actions" align="middle">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>

														</div>
													</div>
												</div>
											</div>
											
				
											
											<div class="col-md-10">
				<div class="panel panel-default">
					<div class="panel-heading">Details</div>
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
								<tr>
									<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor PP</th>
									<th  data-sortable="true">Nomor Tiket</th>
									<th  data-sortable="true">Status</th>
							</thead>
							<?php
							require_once("config.php");
								$result="select * from tbl_pp where section='".$nopp."'";
								$query_input=mysqli_query($koneksi,$result);
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
										<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
									<?php
										echo '<td>'.$data['no_antri'].'</td>';
										echo '<td>'.$data['status_pp'].'</td>';
										echo '</tr>';
										$no++;
									}
								}
							 ?>
						</table>
					</div>
				</div>
			</div>
							</form>
					</div>
	</div><!-- /.row -->	
	   <script src="./assets/jquery.2.1.1.min.js"></script>
        <script src="./assets/bootstrap.js"></script>
	<script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('hasil.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
	</body>
<?php
include "foot.php";
?>
</html>