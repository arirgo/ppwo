
<center>
<?php $id=$_POST['obj'];
include "config.php";
$query = mysqli_query($koneksi,"SELECT * from master_komputer where id='$id'");
					 $data = mysqli_fetch_array($query) 
?>
<hr>
<h3>UPDATE MASTER KOMPUTER</h3>
<hr>
<br><br>
  <form action="simpan_editkom.php" method="post" name="edms">
    <table>
    <tr><td>Nama Komputer /Kode lokasi</td>
        <td><input type="hidden" name="idkom" id="idkom" value="<?php echo $data['id'];?>">
            <input type="text"  name="namakomp" value="<?php echo $data['nama_komputer'];?>" style="text-transform:uppercase" readonly/>
            <input type="hidden"  name="namakompawal" value="<?php echo $data['nama_komputer'];?>" style="text-transform:uppercase" /></td>
    </tr>
    <tr><td>Nama Pengguna</td>
        <td><input type="text"  placeholder="Nama Pengguna" name="namapengguna" value="<?php echo $data['nama_pengguna'];?>" /></td>
    </tr>
    <tr><td>Bagian/lokasi</td>
        <td><input type="text"  placeholder="Bagian" name="bagian" value="<?php echo $data['bagian'];?>" />
			</td></tr>
    <tr><td>Waktu kerja</td>
        <td>	<input type="text"  placeholder="waktu" name="waktu"  onkeypress="return hanyaAngka(event)" value="<?php echo $data['waktu'];?>"/></td></tr>
  
    <tr><td colspan><button class="btn btn-info" type="Submit">
								<i class="ace-icon fa fa-check bigger-110"></i>
								UPDATE
							</button></td></tr>
    </table>
    </form>
	</center>

		
	
		
	
</body>
</html>



<script>
function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
