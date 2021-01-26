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
<script type=text/javascript>
function pindah(){
	var a = document.getElementById("txturaian1");
	var b = document.getElementById("txturaian2");
	a.reset();	
	b.reset();	
	}
function kosong()
{	
   var  uraian			= document.getElementById('txturaian');//2
    
   
	if(uraian.value=='')
	{
		document.getElementById('pesan2').innerHTML = "//Detail masalah Harus Diisi";
		uraian.focus();
		return false;
	}
	else
	{
		document.getElementById('pesan2').innerHTML = "";
	}
    
}

function fokus()
	{
		document.getElementById("txturaian").focus();
	}    
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))

return false;
return true;
}

    
</script>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Browse PPWO</title>

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
	<body class="no-skin" onload='hide();'>
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
						<a href="#">Home</a>
					</li>
				
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:1100px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail</h4>
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
							<table width="80%" border="1" class="table table-striped table-bordered table-hover">
								<tr>
									<td style=" background-color:#7EB7FD;">PP/WO Browse</td>
								</tr>
							</table>
							<div class="tabbable">
											
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#home4">WO Pekerjaan</a>
												</li>

												<li>
													<a data-toggle="tab" href="#profile4">WO Pengadaan</a>
												</li>

												<li>
													<a data-toggle="tab" href="#dropdown14">More</a>
												</li>
											</ul>
											
											<div class="tab-content">
												<div id="home4" class="tab-pane in active">
													<form name="f_wo" action="wo_proses.php" method="POST" class="form-horizontal" role="form" onsubmit='return kosong();'>
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor WO</label>
														<div class="col-sm-9">
														<input type="text" id="form-field-1" name="txtnowo" value="<?php 
								
															require_once('config.php');
															$sqlw = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
															$isi  = mysqli_fetch_array($sqlw);
															$sec  = $isi['section'];
															$sqlx = mysqli_query($koneksi,"SELECT max(no) as nowo from tbl_wo where year(tgl_permohonan)=year(CURDATE()) and month(tgl_permohonan)=month(CURDATE())");
															$data = mysqli_fetch_array($sqlx);
															$no = intval($data['nowo']);
															//echo $no;
																if (($no>=0)&&($no<=8)){
																		$no= $no+1;
																		 echo "00".$no;
																	}else if (($no>=9)&&($no<=98)){
																			$no= $no+1;
																		 echo "0".$no;
																		}else if (($no>=99)&&($no<=998)){
																			$no= $no+1;
																		 echo $no;
																		}
															
															
															$sql = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
															$data2 = mysqli_fetch_array($sql);
															echo '/'.$data2['singkatan'].'/'.date('m/y');
															?>" readonly>  <input type="hidden" name="txtno" value="<?php echo $no;?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pemohon</label>

														<div class="col-sm-9">
															<input type="text" id="txtpemohon" name="txtpemohon" value="<?php echo $data2['nama'];?>" class="col-xs-10 col-sm-5" readonly />
															<label style='margin-left: 5px;' id=pesan1></label>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Section</label>

														<div class="col-sm-9">
															<input type="text" id="form-field-1" class="col-xs-10 col-sm-3" name="txtsection" value="<?php echo $data2['section'];?>" readonly>
														</div>
													</div>
									
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Uraian Pekerjaan</label>

														<div class="col-sm-9">
															<textarea rows="3" cols="35 " id="txturaian1" placeholder="Uraian Pekerjaan" name="txturaian"></textarea>
															<label style='margin-left: 5px;' id="pesan2"></label>
														</div>
													</div>
					
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

												<div id="profile4" class="tab-pane">
													<form name="f_wo" action="wo_proses.php" method="POST" class="form-horizontal" role="form" onsubmit='return kosong();'>
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor WO</label>
														<div class="col-sm-9">
														<input type="text" id="form-field-1" name="txtnowo" value="<?php 
								
															require_once('config.php');
															$sqlw = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
															$isi  = mysqli_fetch_array($sqlw);
															$sec  = $isi['section'];
															$sqlx = mysqli_query($koneksi,"SELECT max(no) as nowo from tbl_wo where year(tgl_permohonan)=year(CURDATE()) and month(tgl_permohonan)=month(CURDATE())");
															$data = mysqli_fetch_array($sqlx);
															$no = intval($data['nowo']);
															//echo $no;
																if (($no>=0)&&($no<=8)){
																		$no= $no+1;
																		 echo "00".$no;
																	}else if (($no>=9)&&($no<=98)){
																			$no= $no+1;
																		 echo "0".$no;
																		}else if (($no>=99)&&($no<=998)){
																			$no= $no+1;
																		 echo $no;
																		}
															
															
															$sql = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
															$data2 = mysqli_fetch_array($sql);
															echo '/'.$data2['singkatan'].'/'.date('m/y');
															?>" readonly>  <input type="hidden" name="txtno" value="<?php echo $no;?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pemohon</label>

														<div class="col-sm-9">
															<input type="text" id="txtpemohon" name="txtpemohon" value="<?php echo $data2['nama'];?>" class="col-xs-10 col-sm-5" readonly />
															<label style='margin-left: 5px;' id=pesan1></label>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Section</label>

														<div class="col-sm-9">
															<input type="text" id="form-field-1" class="col-xs-10 col-sm-3" name="txtsection" value="<?php echo $data2['section'];?>" readonly>
														</div>
													</div>
									
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Uraian Pengadaan</label>

														<div class="col-sm-9">
															<input type="text" id="txturaian2" class="col-xs-10 col-sm-7" name="txturaian" placeholder="Alasan pengadaan">
															<label style='margin-left: 5px;' id="pesan2"></label>
														</div>
													</div>
													<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tambah Item</label>
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
																Nama Barang &nbsp;<input type="text" id="brg1" name="txtbrg[1]">
																&nbsp;&nbsp;
																Qty &nbsp;<input type="text" id="qty1" name="txtqty[1]" size="4" onkeypress="return isNumberKey(event)" maxlength="2">
																&nbsp;&nbsp;
																<a href="#" onclick="remove(1)">Delete</a>
															</div>
														</div>
														
														<div class="form-group" id="hide2">
															<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
															<div class="col-sm-9">
																Nama Barang &nbsp;<input type="text" id="brg2" name="txtbrg[2]">
																&nbsp;&nbsp;
																Qty &nbsp;<input type="text" id="qty2" name="txtqty[2]" size="4" onkeypress="return isNumberKey(event)" maxlength="2">
																&nbsp;&nbsp;
																<a href="#" onclick="remove(2)">Delete</a>
															</div>
														</div>
														
														<div class="form-group" id="hide3">
															<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
															<div class="col-sm-9">
																Nama Barang &nbsp;<input type="text" id="brg3" name="txtbrg[3]">
																&nbsp;&nbsp;
																Qty &nbsp;<input type="text" id="qty3" name="txtqty[3]" size="4" onkeypress="return isNumberKey(event)" maxlength="2">
																&nbsp;&nbsp;
																<a href="#" onclick="remove(3)">Delete</a>
															</div>
														</div>
														
														<div class="form-group" id="hide4">
															<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
															<div class="col-sm-9">
																Nama Barang &nbsp;<input type="text" id="brg4" name="txtbrg[4]">
																&nbsp;&nbsp;
																Qty &nbsp;<input type="text" id="qty4" name="txtqty[4]" size="4" onkeypress="return isNumberKey(event)" maxlength="2">
																&nbsp;&nbsp;
																<a href="#" onclick="remove(4)">Delete</a>
															</div>
														</div>
														
														<div class="form-group" id="hide5">
															<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
															<div class="col-sm-9">
																Nama Barang &nbsp;<input type="text" id="brg5" name="txtbrg[5]">
																&nbsp;&nbsp;
																Qty &nbsp;<input type="text" id="qty5" name="txtqty[5]" size="4" onkeypress="return isNumberKey(event)" maxlength="2">
																&nbsp;&nbsp;
																<a href="#" onclick="remove(5)">Delete</a>
															</div>
														</div>
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

												<div id="dropdown14" class="tab-pane">
													<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
												</div>
											</div>
										</div>
										</div>						
										
							
						
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
<link rel="stylesheet" href="jquery-ui-1.9.2.css" />
<script src="jquery-1.8.3.js"></script>
<script src="jquery-ui-1.9.2.js"></script>
<script type="text/javascript">
		
		$(document).ready(function(){
				$("#brg1").autocomplete({
					minLength:2,
					source:'get_brg.php',
					select:function(event, ui){
						
						$("#brg1").val(ui.item.nama);
						$("#qty1").focus();   
					}
				});
			});
		$(document).ready(function(){
				$("#brg2").autocomplete({
					minLength:2,
					source:'get_brg.php',
					select:function(event, ui){
						
						$("#brg2").val(ui.item.nama);
						$("#qty2").focus();   
					}
				});
			});
		$(document).ready(function(){
				$("#brg3").autocomplete({
					minLength:2,
					source:'get_brg.php',
					select:function(event, ui){
						
						$("#brg3").val(ui.item.nama);
						$("#qty3").focus();   
					}
				});
			});
		$(document).ready(function(){
				$("#brg4").autocomplete({
					minLength:2,
					source:'get_brg.php',
					select:function(event, ui){
						
						$("#brg4").val(ui.item.nama);
						$("#qty4").focus();   
					}
				});
			});
		$(document).ready(function(){
				$("#brg5").autocomplete({
					minLength:2,
					source:'get_brg.php',
					select:function(event, ui){
						
						$("#brg5").val(ui.item.nama);
						$("#qty5").focus();   
					}
				});
			});
		
		
		
		
		
		function hide(){
			document.getElementById('hide1').style.display='none';
			document.getElementById('hide2').style.display='none';
			document.getElementById('hide3').style.display='none';
			document.getElementById('hide4').style.display='none';
			document.getElementById('hide5').style.display='none';
			
			
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
				}else if ((num>=1)&&(num<=4)){
					num++;
					document.getElementById('hide'+num).style.display='block';
					
					}else if (num==5) {
						document.getElementById('hide5').style.display='block';
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

