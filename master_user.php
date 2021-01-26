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
<script type=text/javascript>
function kosong()
{	
    var  a			= document.getElementById('txtusername');//1
    var  b			= document.getElementById('txtpassword');//3
    var  c			= document.getElementById('txtnama');//4
    var  d			= document.getElementById('section');//5
    var  e			= document.getElementById('combo_hakakses');//5
    var  f			= document.getElementById('txtemail');//5
    
    if(a.value=='')
	{
		document.getElementById('pesan1').innerHTML = "//Username Harus Diisi";
		a.focus();
		return false;
	}
	else
	{
		document.getElementById('pesan1').innerHTML = "";
	}
	
	  if(f.value=='')
	{
		document.getElementById('pesan7').innerHTML = "//Email Harus Diisi";
		f.focus();
		return false;
	}
	else
	{
		document.getElementById('pesan7').innerHTML = "";
	}
	
	if(b.value=='')
	{
		document.getElementById('pesan2').innerHTML = "//Password masalah Harus Diisi";
		b.focus();
		return false;
	}
	else
	{
		document.getElementById('pesan2').innerHTML = "";
	}
	
	if(c.value=='')
	{
		document.getElementById('pesan3').innerHTML = "//Nama Harus Diisi";
		c.focus();
		return false;
	}
	else
	{
		document.getElementById('pesan3').innerHTML = "";
	}
	
	if(d.value=='')
	{
		document.getElementById('pesan4').innerHTML = "//Section Harus Dipilih";
		d.focus();
		return false;
	}
	else
	{
		document.getElementById('pesan4').innerHTML = "";
	}
	
	 if(e.value=='')
	{
		document.getElementById('pesan5').innerHTML = "//Level user Harus Dipilih";
		e.focus();
		return false;
	}
	else
	{
		document.getElementById('pesan5').innerHTML = "";
	}
    
}

function fokus()
	{
		document.getElementById("txtusername").focus();
	}    
	
    
</script>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Master User</title>

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
	<body class="no-skin"  onload='fokus();'>
<?php include "menu-atasadmin.php"; ?>
<?php include "menu-kiriadmin.php"; ?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
						<a href="main_admin.php">Home</a>
					</li>
				<li class="active">Form User</li>
			</ul><!-- /.breadcrumb -->

					</div>
<?php
require_once('config.php');
$sqle	= mysqli_query($koneksi,"select * from user where username='".$user."'");
$akses	= mysqli_fetch_array($sqle);

?>
					<div class="page-content">
						<div class="page-header">
							<h1>
								Form User PP-WO Online
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Overview User
								</small>
							</h1>
						</div><!-- /.page-header -->
						<form name="f_usr" action="user_proses.php" method="POST" class="form-horizontal" role="form" onsubmit='return kosong();'>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Username</label>

										<div class="col-sm-9">
											<input type="text" placeholder="Username" id="txtusername" name="txtusername" autocomplete="off">	
											<label style='margin-left: 5px;' id=pesan1></label>								
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Password</label>

										<div class="col-sm-9">
											<input type="password" id="txtpassword" name="txtpassword" placeholder="Password" autocomplete="off">
											<label style='margin-left: 5px;' id=pesan2></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama</label>

										<div class="col-sm-9">
											<input type="text" placeholder="Nama User" id="txtnama" name="txtnama" autocomplete="off" >
											<label style='margin-left: 5px;' id=pesan3></label>									
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Section</label>

										<div class="col-sm-9">
											<select style="width:185px;" class="form-control" id="section" name="section">
												<option value="">--Pilih Section--</option>
												<?php
													require_once('config.php');
													if($akses['level_user']=="adminho"){
														$sqlx	= mysqli_query($koneksi,"select * from section where pls='ho'");
													}else{
															$sqlx	= mysqli_query($koneksi,"select * from section where pls='fc'");
													}
													
													while ($data = mysqli_fetch_array($sqlx)){
															$i++;
 															echo "<option value='".$data['nama_section']."'>".$data['nama_section']."</option>";
														}
												?>
											</select>
											<label style='margin-left: 5px;' id=pesan4></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Singkatan</label>

										<div class="col-sm-9">
											<input type="text" readonly id="skt" name="skt">									
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Level Akses</label>

										<div class="col-sm-9">
											
											<select style="width:185px;" class="form-control" id="combo_hakakses" name="combo_hakakses">
												<option value="">--Pilih Section--</option>	
																			
												<option value="usr">User </option>									
												<option value="sh">Section Head </option>									
												<option value="tek">Teknisi IT </option>
												<option value="pro">Programmer </option>
												
											<label style='margin-left: 5px;' id=pesan5></label>							
										</div>
										<?PHP if($akses['level_user']=="admin"){?>
										<input type="hidden" name="pls" id="pls" value="fc">
										<?php }else{?>
										
										<input type="hidden" name="pls" id="pls" value="ho">
										<?php } ?>
									</div></br></br></br>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email</label>

										<div class="col-sm-9">
											<input type="text" id="txtemail" name="txtemail">		
											<label style='margin-left: 5px;' id=pesan7></label>								
										</div>
									</div>
									<div class="form-group">
										<center>
									<table>
										<tr>
											<td>
											
												<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>
												&nbsp; 
												<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
											 
											</td>
										</tr>
									</table>
								</center>
									</div>
							
								
								
									
						</form>

				<div class="col-md-10">
				<div class="panel panel-default">
					<div class="panel-heading">Details</div>
					<div class="panel-body">
				<!-- -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:500px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit User</h4>
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
				
				<div class="panel-body">
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
							
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Username</th>
									<th  data-sortable="true">Nama</th>
									<th  data-sortable="true">Section</th>
									<th  data-sortable="true">pls</th>
									<th  data-sortable="true">Action</th>
						    </tr>
							
						    </thead>
							<?php
							require_once("config.php");
							if($akses['level_user']=="adminho")
							{
								$result="select * from user where pls='ho'";
							}else{
							echo	$result="select * from user where pls='fc'";
							}
								$query_input=mysqli_query($koneksi,$result);
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										echo '<td>'.$data['username'].'</td>';
										echo '<td>'.$data['nama'].'</td>';
										
										echo '<td>'.$data['section'].'</td>';
										echo '<td>'.$data['pls'].'</td>';
										echo '<td></td>';
										echo '</tr>';
										
										$no++;
									}
								}
							 ?>
							</table>
						</div>
					</div>
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
		
		<script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('user_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        //~ 
        
       
    </script>
    <script>
	$("#section").on("change", function() {
		$.ajax({
		type: "POST",
		data: {
		"section": $("#section").val()
			},
		url: "user_json.php",
		dataType: "json",
		success: function(JSONObject) {
		// Loop through Object and create peopleHTML
			for (var key in JSONObject) {
				if (JSONObject.hasOwnProperty(key)) {
				$("#skt").val(JSONObject[key]["singkatan"]);
				}
			}
		// Replace table’s tbody html with peopleHTML
		$("#people tbody").html(peopleHTML);
		}
		});
	});
	</script>
		
	
</body>
</html>

