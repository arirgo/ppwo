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
		<title>PPWO IT Online</title>
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
			#tahun{
				width:90%;   
				}
			#bulan{
				width:90%;   
				}
			#tblhis{boreder=0;}
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
						<a href="main_user.php">Home</a>
					</li>
				
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:1100px">
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
						
		<div class="row">
		<?php if (isset($_POST['tombol'])){
                
                
       $stt =$_POST['stt'];
	   $dev =$_POST['dev'];
       $tglf=$_POST['tglf'];
	   $tglt=$_POST['tglt'];
       $group=$_POST['group'];
				?>
		<form action="browse_ostanding.php" method="post">
		<table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="12" style=" background-color:#FF7C00;">Tabel Ostanding</td>
			</tr>
			<tr>
			<td>Status</td>
			<td><select name="stt" id="stt">
				<option value="">--Pilih--</option>
				<option value="waiting">Waiting</option>
				<option value="on process">on process</option>
				<option value="status">Hold</option>
				<option value="finish">Finish</option>
				</select></td>
				<td>Dev</td>
			<td><select name="dev" id="dev">
				<option value="">--Pilih--</option>
				<option value="infra">Infrastruktur</option>
				<option value="prog">Programmer</option>
				
				</select></td>
            	<td>Group</td>
			<td><select name="group" id="group">
				<option value="all">--ALL--</option>
				<option value="PP">PP</option>
				<option value="WO">WO</option>
				
				</select></td>
                
			<td>From</td>
			<td><input type="text" name="tglf" id="tglf"  class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off" ></td>
			<td>To</td>
			<td><input type="text" name="tglt" id="tglt" class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off"  ></td>
			<td><input type="submit" name="tombol" class="btnost btn btn-primary" style="border-radius:5px;" value="Status WO">
            <td><a href="export_ostanding.php?tglf=<?php echo $tglf; ?>&tglt=<?php echo $tglt; ?>&stt=<?php echo $stt; ?>&dev=<?php echo $dev; ?>&group=<?php echo $group; ?>" style="border-radius:5px;" class="btn btn-success"><i class="ace-icon fa fa-cloud-download"></i>Export</a></td>
            </td>
		
			</tr>
			
			
			
		</table>
		</form>
		<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
			<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
			<thead>
					 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Project Type</th>
									<th  data-sortable="true">Plikasi/Project name</th>
									<th  data-sortable="true">Detail</th>
									<th  data-sortable="true">Status</th>
									<th  data-sortable="true">Document Type</th>
									<th  data-sortable="true">Document Numb</th>
									<th  data-sortable="true">Requestor</th>
                                    <th  data-sortable="true">It</th>
                                    <th  data-sortable="true">Cek</th>
						    </tr>	
			</thead>

            <?php require_once("config.php");
            if($group=="WO"){

                if($stt<>'')
                    {
                        $inputdata .="and status_wo='$stt' ";
                    }else{}
                    if($dev<>'')
                    {
                        $inputdata .="and it='$dev' ";
                    }else{}
                    if($tglf<>'')
                    {
                        $inputdata .="and tgl_permohonan between '$tglf' and '$tglt' ";
                    }else{}

            ?>
           <?php   $query_input=mysqli_query($koneksi,"select * from tbl_wo where no_wo !=0 $inputdata ");
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
                                        <td></td>
										<td><?php echo $data['nama_project'];?></td>
									<?php
										echo '<td>'.$data['uraian_pekerjaan'].'</td>';
										echo '<td>'.$data['status_wo'].'</td>';
										echo '<td>WO</td>';
										echo '<td>'.$data['no_wo'].'</td>';
										echo '<td>'.$data['pemohon'].'</td>';
                                        echo '<td>'.$data['diterima'].'</td>';
                                        echo '<td>'.$data['no_wo'].'</td>';
										
										echo '</tr>';
										
										$no++;
									}
								}?>
              <?PHP } else if($group=="PP"){ ?> 
                             
                                <?php  
                                if($stt<>'')
                                    {
                                        $inputdata_pp .="and status_pp='$stt' ";
                                    }else{}
                                    if($dev<>'')
                                    {
                                        $inputdata_pp .="and it='$dev' ";
                                    }else{}
                                    if($tglf<>'')
                                    {
                                        $inputdata_pp .="and tgl_lapor between '$tglf' and '$tglt' ";
                                    }else{}

                                $query_inputpp=mysqli_query($koneksi,"select * from tbl_PP where no_pp !=0 $inputdata_pp ");
								if ($query_inputpp){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data_pp = mysqli_fetch_array($query_inputpp)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
                                        <td></td>
										<td><?php echo $data_pp['nama_project'];?></td>
									<?php
										echo '<td>'.$data_pp['kerusakan'].'</td>';
										echo '<td>'.$data_pp['status_pp'].'</td>';
										echo '<td>PP</td>';
										echo '<td>'.$data_pp['no_pp'].'</td>';
										echo '<td>'.$data_pp['pelapor'].'</td>';
                                        echo '<td>'.$data_pp['diterima'].'</td>';
                                        echo '<td>'.$data_pp['no_pp'].'</td>';
										
										echo '</tr>';
										
										$no++;
									}
								}?>
              
              
              
              <?PHP } else{ ?>
              
              <!-- pp ---------------------------------------------------------- -->
                             <?php  
                                if($stt<>'')
                                    {
                                        $inputdata_pp .="and status_pp='$stt' ";
                                    }else{}
                                    if($dev<>'')
                                    {
                                        $inputdata_pp .="and it='$dev' ";
                                    }else{}
                                    if($tglf<>'')
                                    {
                                        $inputdata_pp .="and tgl_lapor between '$tglf' and '$tglt' ";
                                    }else{}

                                $query_inputpp=mysqli_query($koneksi,"select * from tbl_PP where no_pp !=0 $inputdata_pp ");
								if ($query_inputpp){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data_pp = mysqli_fetch_array($query_inputpp)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
                                        <td></td>
										<td><?php echo $data_pp['nama_project'];?></td>
									<?php
										echo '<td>'.$data_pp['kerusakan'].'</td>';
										echo '<td>'.$data_pp['status_pp'].'</td>';
										echo '<td>PP</td>';
										echo '<td>'.$data_pp['no_pp'].'</td>';
										echo '<td>'.$data_pp['pelapor'].'</td>';
                                        echo '<td>'.$data_pp['diterima'].'</td>';
                                        echo '<td>'.$data_pp['no_pp'].'</td>';
										
										echo '</tr>';
										
										$no++;
									}
								}?>
                 <!-- WO ------------------------------------- -->
                 
           <?PHP     if($stt<>'')
                    {
                        $inputdata .="and status_wo='$stt' ";
                    }else{}
                    if($dev<>'')
                    {
                        $inputdata .="and it='$dev' ";
                    }else{}
                    if($tglf<>'')
                    {
                        $inputdata .="and tgl_permohonan between '$tglf' and '$tglt' ";
                    }else{}

            ?>
           <?php   $query_input=mysqli_query($koneksi,"select * from tbl_wo where no_wo !=0 $inputdata ");
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
                                        <td></td>
										<td><?php echo $data['nama_project'];?></td>
									<?php
										echo '<td>'.$data['uraian_pekerjaan'].'</td>';
										echo '<td>'.$data['status_wo'].'</td>';
										echo '<td>WO</td>';
										echo '<td>'.$data['no_wo'].'</td>';
										echo '<td>'.$data['pemohon'].'</td>';
                                        echo '<td>'.$data['diterima'].'</td>';
                                        echo '<td>'.$data['no_wo'].'</td>';
										
										echo '</tr>';
										
										$no++;
									}
								}?>
              
              <?php } ?>
            </table>
		
		
		
		<?php } else {?>
		
		<form action="browse_ostanding.php" method="post">
		<table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="11" style=" background-color:#FF7C00;">Tabel Ostanding</td>
			</tr>
            <tr>
			<td>Status</td>
			<td><select name="stt" id="stt">
				<option value="">--Pilih--</option>
				<option value="waiting">Waiting</option>
				<option value="on process">on process</option>
				<option value="status">Hold</option>
				<option value="finish">Finish</option>
				</select></td>
				<td>Dev</td>
			<td><select name="dev" id="dev">
				<option value="">--Pilih--</option>
				<option value="infra">Infrastruktur</option>
				<option value="prog">Programmer</option>
				
				</select></td>
            <td>Group</td>
			<td><select name="group" id="group">
				<option value="all">--ALL--</option>
				<option value="PP">PP</option>
				<option value="WO">WO</option>
				
				</select></td>
			<td>From</td>
			<td><input type="text" name="tglf" id="tglf"  class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off" ></td>
			<td>To</td>
			<td><input type="text" name="tglt" id="tglt" class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off"  ></td>
			<td><input type="submit" name="tombol" class="btnost btn btn-primary" style="border-radius:5px;" value="Status WO"></td>
		
			</tr>
			
		
			
			
		</table>
		</form>
		<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
			<thead>
					 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor WO</th>
									<th  data-sortable="true">Pemohon</th>
									<th  data-sortable="true">Section</th>
								
									<th  data-sortable="true">Tgl permohonan</th>
									<th  data-sortable="true">pemohon</th>
									<th  data-sortable="true">It</th>
									<th  data-sortable="true">Status</th>
						    </tr>	
			</thead>
            </table>
			<?php	} ?>
		
		</div>					
		</div>
									
					</div><!-- /.page-content -->
		
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
                $.post('formpp_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        //~ 
        
        
         $(function(){
            $(document).on('click','.edit-hold',function(e){
                e.preventDefault();
                $("#twoModal").modal('show');
                $.post('hold_modal.php',
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
    </script>
		
	
</body>
</html>

