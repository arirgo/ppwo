	
    <?php require_once("config.php");
    $kd_msk=$_POST['id'];
    $objectid=$_POST['obj'];
    $sqlbrgmsk = mysqli_query($koneksi,"select * from barang_masuk where kd_masuk='$kd_msk' and objectid='$objectid'");
	$databrgmsk = mysqli_fetch_array($sqlbrgmsk);
    ?>
    
    <form name="f_pp" action="simpanedit_brg_msk.php" method="POST" class="form-horizontal" role="form" onsubmit='return kosong();'>
									
								<?PHP
								 date_default_timezone_set('Asia/Jakarta');
            					$tgl=date('Y-m-d');
								
								
					
					?>
						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kode Masuk</label>
                                             
										<div class="col-sm-9">
											<input type="text" id="form-field-1" class="nmbrg col-xs-10 col-sm-3" name="kd_msk" id="kd_msk" value="<?php echo $databrgmsk['kd_masuk'];?>" required readonly>
                                            <input type="hidden" id="form-field-1" class="nmbrg col-xs-10 col-sm-3" name="obj" id="obj" value="<?php echo $databrgmsk['objectid'];?>" required readonly>
									
                                    	</div>			
                                        </div>
								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jenis Barang</label>

										<div class="col-sm-9">
											 <select name="cb_brg" id="cb_brg"  readonly>
					
                  
                    
					<?php
                       $idms= $databrgmsk['id_brg'];
                        require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from inventarisi where objectid='$idms'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['group_brg'].'" style="color: red;" disabled>'.$data1['group_brg'].'</option>';
						// while ($datab	=	mysqli_fetch_array($sqla))
						// {
							echo	'<option value="'.$data1['objectid'].'">&nbsp;&nbsp;'.$data1['nama_barang'].'</option>';
					
						
					?>
				</select>
               
											<label style='margin-left: 5px;' id=pesan1></label>
										</div>
									</div>

                                    	<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Barang</label>
                                             
										<div class="col-sm-9">
											<input type="text" id="form-field-1" class="nmbrg col-xs-10 col-sm-3" name="nmbrg" id="nmbrg" value="<?php echo $databrgmsk['nama'];?>" required readonly>
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jumlah</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" class="col-xs-10 col-sm-3" name="jmlbrg" id="jmlbrg" value="<?php echo $databrgmsk['jumlah']?>"onkeypress="return hanyaAngka(event)" required>
                                       		<input type="hidden" id="form-field-1" class="col-xs-10 col-sm-3" name="jmlawal" id="jmlawal" value="<?php echo $databrgmsk['jumlah']?>" required>
									     </div>
									</div>
                                    
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">User input</label>

										<div class="col-sm-9">
											<input type="text"  name="userinput" value="<?php echo $databrgmsk['user_input'];?>" class="col-xs-10 col-sm-5" readonly required />
											<label style='margin-left: 5px;' id=pesan1></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right " for="form-field-1">Tanggal Masuk</label>

										<div class="col-sm-9">
											<input type="text" id="tglmsk" class="col-xs-10 col-sm-3 date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglmsk" value="<?php echo $databrgmsk['tgl_msk'];?>" readonly >
                                           	<input type="hidden" id="tglmskawal" class="col-xs-10 col-sm-3 date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglmskawal" value="<?php echo $databrgmsk['tgl_msk'];?>" readonly >
									
                                        </div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kterangan</label>

										<div class="col-sm-9">
											<input type="text" id="ketmsk" class="col-xs-10 col-sm-3" name="ketmsk" value="<?php echo $databrgmsk['keterangan']; ?>">
											<input type="hidden" id="ketmskawal" class="col-xs-10 col-sm-3" name="ketmskawal" value="<?php echo $databrgmsk['keterangan']; ?>">
									</div>
									</div>
<center>
									<table>
										<tr>
											<td>
												<!-- <div id="loadproses">
													<p><img src="loader.gif" /> Loading...</p>
												</div> -->
												<button class="btn btn-info" type="submit" id="btnsubmit">
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

           
		
<script type="text/javascript">
	$(document).ready(function(){
		$('select[id="cb_brg"]').change(function() {
           
			
			id_brg 	=$(this).val();
        
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                       // alert(stok);
                        $('select[id="browsestok"]').html(stok);
                    }
                });
			
		}); 

	
	});
 
</script>


<script type="text/javascript">
	$(document).ready(function(){
		$('select[id="browsestok"]').change(function() {
			ikl 	=$(this).val();
           $('.nmbrg').val(ikl);
			
		}); 

	
	});
 
</script>


<script>
function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>