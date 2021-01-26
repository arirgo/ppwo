<?php
require_once('config.php');
$id=$_POST['id'];
   $query_input =mysqli_query($koneksi,"SELECT * FROM troubleshooting where objectid='$id'");
   $dt          =mysqli_fetch_array($query_input);
?>
<form  action="simpanedit_trouble.php" method="post" id="ftb" name="ftb"class="form-horizontal" role="form">
							<br>	
                        <table>
                        <tr>
                            <td>Tanggal :</td><td> <input class="form-control date-picker" id="tgl" name='tgl' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo $dt['tanggal'];?>"/></td>
                            <td>Bagian :</td><td><input type="text" name="bagian" id="bagian" value="<?php echo $dt['bagian'];?>"></td>
                            <td>aplikasi :</td><td><input type="text" name="apl" name="apl" value="<?php echo $dt['aplikasi'];?>"> </td>    
                        </tr>
                        <tr><td colspan="6"><br></td></tr>
                        <tr>
                            <td>Komplain :</td><td><textarea  cols="30" rows="4" id="komplain" name="komplain" ><?php echo $dt['komplain'];?></textarea></td>
                            <td>keterangan:</td><td><textarea  cols="30" rows="4" id="ket" name="ket" ><?php echo $dt['keterangan'];?></textarea></td>
                            <td>Solusi :</td><td><textarea   cols="30" rows="4" id="solusi" name="solusi" ><?php echo $dt['solusi'];?></textarea></td>
                    <input type="hidden" name="obj" id="obj" value="<?php echo $id;?>">
                         </tr>
                         
                         <tr>
                         <td colspan=" 6"> <br>
                                  <center>
												<button class="btn btn-info" type="button" id="btntb" name="btntb">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>
                                </center>
                        </td>
                         </tr>
                        </table>			
			</form>				