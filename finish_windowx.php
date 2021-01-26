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
		<title>Input</title>

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
		<script type="text/javascript" src="jquery-2.1.3.min.js"></script>
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
	<body class="no-skin" onload="hide();">
<?php include "menu-atas.php"; ?>
<?php //include "menu-kiri.php"; ?>
<?php //include "menu-kiriadmin.php"; ?>
<div class="main-content">
	<div class="main-content-inner">
		
		<?php
$nopp = $_GET['kode'];
//~ echo $nopp;
$tanggal		= date('Y-m-d');
$jam			= date('H:i');
$url			= "main_teknik.php";
require_once("config.php");
$sqla = mysqli_query($koneksi,"select * from tbl_pp where no_pp ='".$nopp."'");
$data = mysqli_fetch_array($sqla);
		?>	

		<div class="page-content">
			<div class="page-header">
				<h1>
				PP Online 
				<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Finish Process
				</small>
				</h1>
			</div><!-- /.page-header -->
							
				
	<div class="panel panel-default">
		<div class="panel-body">
		<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form name="f_finish" action="inputjob_proses.php" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor PP</label>
				<div class="col-sm-9">
					<input type="text"  name="txtnopp" class="col-xs-5 col-sm-3" value="<?php echo ''.$nopp.''; ?>" readonly />
				</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Permasalahan</label>
				<div class="col-sm-9">
					<textarea rows="3" cols="35 " id="txtmasalah" class="col" name="txtpermasalahan" readonly><?php echo $data['kerusakan'];?></textarea>
					<label style='margin-left: 5px;' id=pesan2></label>
				</div>
		</div>
<!--
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pekerjaan yang dilakukan</label>
				<div class="col-sm-9">
					<textarea rows="3" cols="35 " id="txtpekerjaan" placeholder="Pekerjaan yang dilakukan" name="txtpekerjaan"></textarea>
					<label style='margin-left: 5px;' id=pesan3></label>
				</div>
		</div>
-->
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pekerjaan Yang Dilakukan</label>
				<div class="col-sm-9">
<!--
					<a href="#" onclick="addMoreRows(this.form);" class="btn btn-white btn-primary">Tambah<i class="menu-icon fa fa-plus green"></i></a>
-->
					<a href="#" id="btn_tambah" onclick="show(this.form);" class="btn btn-white btn-primary">Tambah<i class="menu-icon fa fa-plus green"></i></a>
				</div>
		</div>
		<div class="form-group" id="hide1">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[1]">
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config2.php");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_grup");
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['kode_grup'].'">'.$datab['nama_grup'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="txtdes[1]" size="40">
				&nbsp;&nbsp;
				<a href="#" onclick="remove(1)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide2">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[2]">
					<option value="">--Pilih--</option>
					<?php
						require_once("config2.php");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_grup");
						
						while ($datac	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datac['kode_grup'].'">'.$datac['nama_grup'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="txtdes[2]" size="40">
				
				&nbsp;&nbsp;
				<a href="#" onclick="remove(2)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide3">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[3]">
					<option value="">--Pilih--</option>
					<?php	
					
					require_once("config2.php");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_grup");
						
					while ($datad	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datad['kode_grup'].'">'.$datad['nama_grup'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="txtdes[3]" size="40">
				&nbsp;&nbsp;
				<a href="#" onclick="remove(3)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide4">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[4]">
					<option value="">--Pilih--</option>
					<?php	
					require_once("config2.php");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_grup");
						
					while ($datae	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datae['kode_grup'].'">'.$datae['nama_grup'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="txtdes[4]" size="40">
				&nbsp;&nbsp;
				<a href="#" onclick="remove(4)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide5">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[5]">
					<option value="">--Pilih--</option>
					<?php
					require_once("config2.php");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_grup");
						
						while ($dataf	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$dataf['kode_grup'].'">'.$dataf['nama_grup'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="txtdes[5]" size="40">
				&nbsp;&nbsp;
				<a href="#" onclick="remove(5)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide6">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[6]">
					<option value="">--Pilih--</option>
					<?php	
					require_once("config2.php");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_grup");
						
					while ($datag	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datag['kode_grup'].'">'.$datag['nama_grup'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="txtdes[6]" size="40">
				&nbsp;&nbsp;
				<a href="#" onclick="remove(6)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide7">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[7]">
					<option value="">--Pilih--</option>
					<?php
					require_once("config2.php");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_grup");
						
						while ($datah	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datah['kode_grup'].'">'.$datah['nama_grup'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="txtdes[7]" size="40">
				&nbsp;&nbsp;
				<a href="#" onclick="remove(7)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide8">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[8]">
					<option value="">--Pilih--</option>
					<?php
					require_once("config2.php");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_grup");
						
						while ($datai	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datai['kode_grup'].'">'.$datai['nama_grup'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="txtdes[8]" size="40">
				&nbsp;&nbsp;
				<a href="#" onclick="remove(8)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide9">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[9]">
					<option value="">--Pilih--</option>
					<?php
					require_once("config2.php");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_grup");
						
						while ($dataj	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$dataj['kode_grup'].'">'.$dataj['nama_grup'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="txtdes[9]" size="40">
				&nbsp;&nbsp;
				<a href="#" onclick="remove(9)">Delete</a>
			</div>
		</div>
		
		<div class="form-group" id="hide10">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<select name="cb_brg[10]">
					<option value="">--Pilih--</option>
					<?php
					require_once("config2.php");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_grup");
						
						while ($datak	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datak['kode_grup'].'">'.$datak['nama_grup'].'</option>';
						}
						
					?>
				</select>
				&nbsp;&nbsp;
				<input type="text" name="txtdes[10]" size="40">
				&nbsp;&nbsp;
				<a href="#" onclick="remove(10)">Delete</a>
			</div>
		</div>
		
		
		
		<div id="addedRows"></div>
		<input type="hidden" name="n" id="hasil" value="">
		<input type="hidden" name="angka" id="angka">
		
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
	</form>
</div>
</div>
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
                $.post('formpp_modal.php',
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
<link rel="stylesheet" href="jquery-ui-1.9.2.css" />
<script src="jquery-1.8.3.js"></script>
<script src="jquery-ui-1.9.2.js"></script>
<script type="text/javascript">
		function hide(){
			document.getElementById('hide1').style.display='none';
			document.getElementById('hide2').style.display='none';
			document.getElementById('hide3').style.display='none';
			document.getElementById('hide4').style.display='none';
			document.getElementById('hide5').style.display='none';
			document.getElementById('hide6').style.display='none';
			document.getElementById('hide7').style.display='none';
			document.getElementById('hide8').style.display='none';
			document.getElementById('hide9').style.display='none';
			document.getElementById('hide10').style.display='none';
			
			}
		var rowCount = 0;
		var num	= 0;
		function addMoreRows(frm) {
			rowCount ++;
			var recRow = '<div class="form-group" id="rowCount'+rowCount+'"><input type="hidden" name="kd_brg'+rowCount+'" id="kd_brg'+rowCount+'"><a href="javascript:void(0);" onclick="removeRow('+rowCount+');">Delete</a></div></div>';
			jQuery('#addedRows').append(recRow);
			document.getElementById('hasil').value = rowCount;
		}
		
		function show(frm) {
			if (num==0) {
				document.getElementById('hide1').style.display='block';
				num++;
				}else if ((num>=1)&&(num<=9)){
					num++;
					document.getElementById('hide'+num).style.display='block';
					
					}else if (num==10) {
						document.getElementById('hide10').style.display='block';
						}else {
							document.getElementById('btn_tambah').disabled= true;
							}
							document.getElementById('angka').value=num;
				//~ 
			//~ num ++;
			//~ document.getElementById('hide'+num).style.display='block';
			//~ document.getElementById('angka').value=num;
			//~ if ((num>=0)&&(num<=10)){
				//~ document.getElementById('btn_tambah').disabled= false;
				//~ } else {
					//~ document.getElementById('btn_tambah').disabled= true;
					//~ }
			}
		
		function remove(a){
			num = num - 1;
			document.getElementById('hide'+a).style.display='none';
			document.getElementById('angka').value=num;
			}
		
		function removeRow(removeNum) {
			jQuery('#rowCount'+removeNum).remove();

		}
		
		
	</script>	
</body>
</html>

