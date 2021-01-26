<script>
function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
<?php


require_once('config.php');
$id=$_POST['id'];
   $query_input =mysqli_query($koneksi,"SELECT * FROM inventarisi where objectid='$id'");
   $dt          =mysqli_fetch_array($query_input);
?>
<form  action="simpanedit_inventaris.php" method="post" id="ftb" name="ftb"class="form-horizontal" role="form">
							<br>	
                        <table>
                        <tr>
                          <td>Katagori:</td><td><select name="katago" id="katago">
							   							<option value="<?php echo $dt['jenis_group']?>"><?php echo $dt['jenis_group']?></option>
														
														 <option value="Software">Software</option> 
														 <option value="Hardware">Hardware</option>
														 <option value="OS">OS</option>
														 <option value="Telepon">Telepon</option>  
							   							 <option value="Network">Network</option>
							   							
														   </select> </td> 
                            <td>Kode :</td><td> <input  id="kode" name='kode' type="text"  value="<?php echo $dt['kode'];?>" readonly/></td>
                            <td>Nama Barang :</td><td><input type="text" name="nama_barang" id="nama_barang" value="<?php echo $dt['nama_barang'];?>" readonly></td>
                               <td>Group :</td><td><input type="text" name="group_brg" id="group_brg" value="<?php echo $dt['group_brg'];?>"> </td> 
                                              
                        </tr>
                        <tr>
                         <td>IP :</td><td><input type="text" name="ip" id="ip" value="<?php echo $dt['ip'];?>"> </td>  
                            <td>OS :</td><td><input type="text" name="os" id="os" value="<?php echo $dt['os'];?>"> </td>
                           
                            <td>Status :</td><td><input type="text" name="status" id="status" value="<?php echo $dt['status'];?>"> </td>
							<td>Pengguna :</td><td><input type="text" name="user" id="user" value="<?php echo $dt['user'];?>" readonly> </td>
                        </tr>
                        <tr><td colspan="6"><br></td></tr>
                        <tr>
                            <td>Lokasi :</td><td><input type="text" name="lokasi" id="lokasi" value="<?php echo $dt['lokasi'];?>"></td>

                            
                            <td>Kode IT:</td><td>
                            <!-- <input type="text" id="kode_it" name="kode_it" value="<?php echo $dt['kode_it'];?>"> -->
                            <select class="chosen-select " id="kode_it" name="kode_it" style="width:80%">
                            <option value="" selected>--PILIH--  </option>
                                    <?php
                                    if($pls=="ho")
                                    {
                                       $result=mysqli_query($koneksi,"SELECT * FROM master_komputer where pls='ho'  ORDER BY nama_komputer asc");
                                    
                                    }else{
                                       $result=mysqli_query($koneksi,"SELECT * FROM master_komputer where pls !='ho' ORDER BY nama_komputer asc");
                                    
                                    }
                                    while($isi  = mysqli_fetch_array($result)){
                                       if($dt['kode_it']==$isi['nama_komputer'])
                                       {
                                          $sec="selected";
                                       }else{$sec="";}
                                       ?>

                                       
                                       <option value="<?php echo $isi['nama_komputer']; ?>" <?php echo $sec;?>><?php echo $isi['nama_komputer'];?></option>
                                    <?php } ?>
                                    </select>
                            </td>

                            <td>Lisensi:</td><td><input type="text" id="lisensi" name="lisensi" value="<?php echo $dt['lisensi'];?>"></td>
                            <td>productid:</td><td><input type="text" id="productid" name="productid" value="<?php echo $dt['productid'];?>"></td>
                          
                            <input type="hidden" name="obj" id="obj" value="<?php echo $id;?>">
                         </tr>
                         <tr>
                            <td>Spesifikasi :</td><td><textarea  cols="20" rows="2" id="spesifikasi" name="spesifikasi" ><?php echo $dt['spesifikasi'];?></textarea> </td> 
                         
                           <td>Keterangan :</td><td><textarea   cols="20" rows="2" id="keterangan" name="keterangan" ><?php echo $dt['keterangan'];?></textarea></td>
                             <td>Thn proleh:</td><td><input type="text" id="thproleh" name="thproleh" value="<?php echo $dt['thproleh'];?>" onkeypress="return hanyaAngka(event)"></td>
                         </tr>
                         
                         <tr>
                         <td colspan=" 6"> <br>
                                  <center>
												<button class="btn btn-warning" type="submit" id="btntb" name="btntb">
												<i class="ace-icon  fa fa-exchange  bigger-110 icon-only"></i>
												Update OR Move
											</button>
                                </center>
                        </td>
                         </tr>
                        </table>			
			</form>				
 <script type="text/javascript">
	$(document).ready(function(){
		$('select[id="kode_it"]').change(function() {
			id_lok 	=$(this).val();
            $.ajax({
                    type:'POST',
                    url:'cek_lokasi.php',
                    data:'nama_komputer='+id_lok,
                    success:function(nm){
                       // alert(stok);
                        $('#user').val(nm);
					
                    }
                });
		}); 
	});
 
</script>


<script type="text/javascript">	
$(document).on('click','#kode_it',function(e){
                e.preventDefault();

			$("#kode_it").chosen({
			 dropdownParent: $("#inventarismyModal")
			 	
			});

		
		})
	</script>