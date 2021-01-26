	
    <?php require_once("config.php");
    $kd_klr=$_POST['id'];
    $objectid=$_POST['obj'];
    $sqlbrgklr = mysqli_query($koneksi,"select * from barang_keluar where kd_keluar='$kd_klr' and objectid='$objectid'");
	$databrgklr = mysqli_fetch_array($sqlbrgklr);
    ?>
    
    <form name="f_pp" action="simpanedit_brg_klr.php" method="POST" class="form-horizontal" role="form" onsubmit='return kosong();'>
									
								<?PHP
								 date_default_timezone_set('Asia/Jakarta');
            					$tgl=date('Y-m-d');
								
								
					
					?>
						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kode KELUAR</label>
                                             
										<div class="col-sm-9">
											<input type="text" id="form-field-1" class="nmbrg col-xs-10 col-sm-3" name="kd_klr" id="kd_klr" value="<?php echo $databrgklr['kd_keluar'];?>" required readonly>
                                            <input type="hidden" id="form-field-1" class="nmbrg col-xs-10 col-sm-3" name="obj" id="obj" value="<?php echo $databrgklr['objectid'];?>" required readonly>
									
                                    	</div>			
                                        </div>
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">NO PP / WO</label>

										<div class="col-sm-9"><select name="cek_pilih" id="cek_pilih">
                                    <option value="">-PILIH-</option>
                                    <option value="PP">PP</option>
                                    <option value="WO">WO</option>
                                    </select>
  											<select name="editppwo" id="editppwo" required>
									<option value="<?php echo $databrgklr['no_pp_wo'];?>"><?php echo $databrgklr['no_pp_wo'];?></option>		  
                                    <option value="">-PILIH-</option>
                                
                                    </select>
									</div>
				</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jenis Barang</label>

										<div class="col-sm-9">
											 <select name="cb_brg" id="cb_brg"  readonly>
					
                  
                    
					<?php
                       $idms= $databrgklr['id_brg'];
                        require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where id='$idms'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						// while ($datab	=	mysqli_fetch_array($sqla))
						// {
							echo	'<option value="'.$data1['id'].'">&nbsp;&nbsp;'.$data1['subcategory'].'</option>';
					//	}
						
						// require_once("config.php");
						// $sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						// $sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						// $data1	=	mysqli_fetch_array($sqla);
						// echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						// while ($datab	=	mysqli_fetch_array($sqlb))
						// {
						// 	echo	'<option value="'.$datab['id'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						// }
						
						// $sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						// $sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						// $data1	=	mysqli_fetch_array($sqla);
						// echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						// while ($datab	=	mysqli_fetch_array($sqlb))
						// {
						// 	echo	'<option value="'.$datab['id'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						// }
						
						// $sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						// $sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						// $data1	=	mysqli_fetch_array($sqla);
						// echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						// while ($datab	=	mysqli_fetch_array($sqlb))
						// {
						// 	echo	'<option value="'.$datab['id'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						// }
						
						// $sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						// $sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						// $data1	=	mysqli_fetch_array($sqla);
						// echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						// while ($datab	=	mysqli_fetch_array($sqlb))
						// {
						// 	echo	'<option value="'.$datab['id'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						// }
						
					?>
				</select>
                
                 <select name="browsestok" id="browsestok" readonly>
                        <option value="<?php echo $databrgklr['nama_brg'];?>"><?php echo $databrgklr['nama_brg'];?></option>
                </select>
											<label style='margin-left: 5px;' id=pesan1></label>
										</div>
									</div>

                                    	<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Barang</label>
                                             
										<div class="col-sm-9">
											<input type="text" id="form-field-1" class="nmbrg col-xs-10 col-sm-3" name="nmbrg" id="nmbrg" value="<?php echo $databrgklr['nama_brg'];?>" required readonly>
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jumlah</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" class="col-xs-10 col-sm-3" name="jmlbrg" id="jmlbrg" value="<?php echo $databrgklr['jumlah_keluar']?>"onkeypress="return hanyaAngka(event)" required>
                                       		<input type="hidden" id="form-field-1" class="col-xs-10 col-sm-3" name="jmlawal" id="jmlawal" value="<?php echo $databrgklr['jumlah_keluar']?>" required>
									     </div>
									</div>
                                    
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">User input</label>

										<div class="col-sm-9">
											<input type="text"  name="userinput" value="<?php echo $databrgklr['user_input'];?>" class="col-xs-10 col-sm-5" readonly required />
											<label style='margin-left: 5px;' id=pesan1></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right " for="form-field-1">Tanggal Keluar</label>

										<div class="col-sm-9">
											<input type="text" id="tglklr" class="col-xs-10 col-sm-3 date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklr" value="<?php echo $databrgklr['tgl_keluar'];?>" readonly >
                                           	<input type="hidden" id="tglklrawal" class="col-xs-10 col-sm-3 date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglklrawal" value="<?php echo $databrgklr['tgl_keluar'];?>" readonly >
									
                                        </div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kterangan</label>

										<div class="col-sm-9">
											<input type="text" id="ketklr" class="col-xs-10 col-sm-3" name="ketklr" value="<?php echo $databrgklr['keterangan']; ?>">
											<input type="hidden" id="ketklrawal" class="col-xs-10 col-sm-3" name="ketklrawal" value="<?php echo $databrgklr['keterangan']; ?>">
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

     <script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>      
		
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


<script type="text/javascript">
	$(document).ready(function(){
		$('select[id="cek_pilih"]').change(function() {
           
			
			cek_project 	=$(this).val();
		
           // alert(cek_project);
            $.ajax({
                    type:'POST',
                    url:'ambil_daily.php',
                    data:'pilih_id='+cek_project,
                    success:function(vb){
                        // alert(vb);
                        $('#editppwo').html(vb);
                    }
                });
			
		}); 
        $('select[id="project"]').click(function() {
           
			
			project 	=$(this).val();
            cek_pilih 	=$('#cek_pilih').val();
          //  alert(project);
            $.ajax({
                    type:'POST',
                    url:'ambil_daily.php',
                    data:{ pilih_id :project,
						   cek_pilih:cek_pilih,	
						},
                    success:function(msg){
                        var [vb,section,peminta]=msg.split("|");
                        $('#modul').html(vb);
                        $('#section').val(section);
                        $('#peminta').val(peminta);
                    }
                });
			          
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