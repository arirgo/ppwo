<link rel="stylesheet" type="text/css" href="assets/css/animate.css">	 
<?php 
require_once("config.php");
session_start();
$userlog=$_SESSION['username'];
$pls=$_SESSION['pls'];
$ceklog=mysqli_query($koneksi,"select*from user where username='$userlog'");
$dtlog=mysqli_fetch_array($ceklog);
 $dev=$dtlog['dev'];
$nowo = $_POST['id'];
//~ echo $nopp;
$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');
$url			= "menu_process_wo.php";

$sqla = mysqli_query($koneksi,"select * from tbl_wo where no_wo ='".$nowo."'");
$data = mysqli_fetch_array($sqla);
?>
<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
<?php if($dev=="inf" and $pls !='ho'){?>
	<form name="fmbrg_klr" id="fmbrg_klr"  method="POST" class="form-horizontal" role="form" >
									
								
									<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor WO</label>
													<div class="col-sm-9">
														<input type="text"  name="project" id="project" class="col-xs-5 col-sm-3" value="<?php echo ''.$nowo.''; ?>" readonly />
													</div>
											</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jenis Barang</label>
									
																			<div class="col-sm-9">
																				 <select name="cb_brg" id="cb_brg" >
														<option value="">--Pilih--</option>
														<?php
															
															require_once("config.php");
															$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
															$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
															$data1	=	mysqli_fetch_array($sqla);
															echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
															while ($datab	=	mysqli_fetch_array($sqlb))
															{
																echo	'<option value="'.$datab['id'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
															}
															
															$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
															$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
															$data1	=	mysqli_fetch_array($sqla);
															echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
															while ($datab	=	mysqli_fetch_array($sqlb))
															{
																echo	'<option value="'.$datab['id'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
															}
															
															$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
															$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
															$data1	=	mysqli_fetch_array($sqla);
															echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
															while ($datab	=	mysqli_fetch_array($sqlb))
															{
																echo	'<option value="'.$datab['id'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
															}
															
															$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
															$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
															$data1	=	mysqli_fetch_array($sqla);
															echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
															while ($datab	=	mysqli_fetch_array($sqlb))
															{
																echo	'<option value="'.$datab['id'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
															}
															
														?>
													</select>
													
																				<label style='margin-left: 5px;' id=pesan1></label>
																			</div>
																		</div>
									
																			<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Barang</label>
																				 
																			<div class="col-sm-9">
																				
																				<select name="nmbrgklr" id="nmbrgklr">
																						<option value="">-PILIH NAMA BARANG-</option>
																				</select>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jumlah</label>
									
																			<div class="col-sm-9">
																				<input type="text" class="col-xs-10 col-sm-3" name="jmlbrgklr" id="jmlbrgklr"   onkeypress="return hanyaAngka(event)">
																			</div>
																		</div>
																		
									
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">User input</label>
									
																			<div class="col-sm-9">
																				<input type="text"  name="userinputklr" id="userinputklr" value="<?php echo $_SESSION['nama'];?>" class="col-xs-10 col-sm-5" readonly />
																				<label style='margin-left: 5px;' id=pesan1></label>
																			</div>
																		</div>
																		
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal Keluar</label>
									
									
																			<div class="col-sm-9">
																				<input type="text"  class="col-xs-10 col-sm-3 date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklr"  id="tglklr" value="<?php echo $tanggal;?>" >
																				
																					<i class="col-xs-10 col-sm-1  fa fa-calendar bigger-110"></i>
																			 
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kterangan</label>
									
																			<div class="col-sm-9">
																				<input type="text" class="col-xs-10 col-sm-3" name="ketklr" id="ketklr">
																			</div>
																		</div>
																	<center>
																		<table>
																			<tr>
																				<td>
																					<!-- <div id="loadproses">
																						<p><img src="loader.gif" /> Loading...</p>
																					</div> -->
																				
																					 <button class="f_simpanklr btn btn-info" type="button"  id="f_simpanklr" >
																					<i class="ace-icon fa fa-check bigger-110"></i>
																				SIMPAN BARANG KELUAR
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
									<br>
									<br>
														<?php } else{}?>

	
	<form name="f_finish" action="finish_wo.php" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor WO</label>
				<div class="col-sm-9">
					<input type="text"  name="txtnowo" class="col-xs-5 col-sm-4" value="<?php echo ''.$nowo.''; ?>" readonly />
				</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Uraian Pekerjaan</label>
				<div class="col-sm-9">
					<textarea rows="3" cols="35 " id="txturaian" class="col" name="txturaian" readonly><?php echo $data['uraian_pekerjaan'];?></textarea>
					<label style='margin-left: 5px;' id=pesan2></label>
				</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Keterangan</label>
				<div class="col-sm-9">
					<textarea rows="3" cols="35 " id="txtketerangan" placeholder="Keterangan" name="txtketerangan"></textarea>
					<label style='margin-left: 5px;' id=pesan3></label>
				</div>
		</div>
<!--
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Rusak pada bagian</label>
				<div class="col-sm-4">
					<select class="form-control" name="combo_j_kerusakan">
						<option value="">--Pilih Bagian--</option>
						<option value="keyboard">Keyboard</option>
						<option value="mouse">Mouse</option>
						<option value="monitor">Monitor</option>
					</select>
				</div>
		</div>
-->
		
		
		<center>
		<?php
		$select_wo =mysqli_query($koneksi,"select count(*)as jml from detail_project where no_project='$nowo' and status !='finish'");
    	$datwo	= mysqli_fetch_array($select_wo);
    	$cek=$datwo['jml'];
		
		if($cek >0){ echo "<h5  class='animated infinite fadeOut' style='color:red;'>".$cek. " Modul Belum selesai</h5>";}else{
	?>
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
		<?php } ?>
	</form>
</div>
</div>

<!-- form ambil barang -->

<script type="text/javascript">
	$(document).ready(function(){
		$(".f_simpanklr").click(function(){
		
	
       
              var data           =$('#fmbrg_klr').serialize();
              var jenis_barang   =$('#cb_brg').val();
              var nama_barang    =$('#nmbrgklr').val();
			  var jmlbrg		 =$('#jmlbrgklr').val();
			  var ketklr		 =$('#ketklr').val();
			  var ppwo			 =$('#project').val();
		//	alert(data);
		$.ajax({
		type: 'POST',
		url: "cek_stok.php",
		data: data,														
		
		success: function(stok) {

			  dt=stok.split("&");
           var jmlstok = parseInt(dt[0]);
			
		
			if (jenis_barang==""){
			 sweetAlert("PILIH JENIS BARANG", "", "error");
			 $("#simpanklr").show();
			}
			 else  if (nama_barang==""){
			 sweetAlert("PILIH NAMA BARANG", "", "error");
			 $("#simpanklr").show();
			} 
			 else  if (ppwo==""){
			 sweetAlert("PILIH NO PP/WO ", "", "error");
			 $("#simpanklr").show();
			} 
			else  if (jmlbrg==""){
			 sweetAlert("JUMLAH BARANG HARUS DIISI", "", "error");
			 $("#simpanklr").show();
			} 
			else  if (jmlbrg > jmlstok){
			 sweetAlert("STOK TIDAK MENCUKUPI", "", "error");
			 $("#simpanklr").show();
			}
			else  if (jmlstok==0){
			 sweetAlert("STOK  NOL 0", "", "error");
			 $("#simpanklr").show();
			}
			else{
			$.ajax({
				type: 'POST',
				url: 'simpan_brg_klr.php',
				data: data,
				success: function(msg) {
                    	swal({ 
						title: "Succes!",
						text: "TRANSAKSI BARANG KLUAR",
						type: "success" 
					},
					function(){
							$('#cb_brg').val("");
							$('#nmbrgklr').val("");
							$('#jmlbrgklr').val("");
							$('#ketklr').val("");
							}
							);
					}
				});
        	} //ELSE--
			}
		  })//CEK JML
		});

	});
	</script>


<script type="text/javascript">
	$(document).ready(function(){

		

		$('select[id="cb_brg"]').change(function() {
           
			
			id_brg 	=$(this).val();
     
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                      //  alert(stok);
                        $('select[id="nmbrgklr"]').html(stok);
                    }
                });
			
		}); 

	
	});
 
</script>



