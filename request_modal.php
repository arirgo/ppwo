<?php 
$nopp = $_POST['id'];
//~ echo $nopp;
       require_once('config.php');
    $select =mysqli_query($koneksi,"select * from tbl_pp where no_pp='$nopp'");
    $datpp	= mysqli_fetch_array($select);

?>
<center>
<form name="f_hold" action="simpan_request.php" method="POST">

<table>
	<tr>
		<td>
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">No PP</label>
		</td>
		<td>
			<input type="text"  name="no_req" size="20" value="<?php echo $nopp;?>" readonly/>
            <input type="hidden"  name="jenis" size="20" value="PP" readonly/>
		</td>
	</tr>
    <tr>
		<td>
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1" required>Perbaikan</label>
		</td>
		<td>
            <select name="request" id="request">
                 <option value="" selected disabled>--pilih--</option>
                <option value="service_eksternal">SERVICE EKSTERNAL</option>
                <option value="order">ORDER</option>
             
            </select>
		</td>
	</tr>
    <tr>
		<td>
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1" required>User</label>
		</td>
		<td>
			<input type="text"  name="user" size="20"/>
		</td>
	</tr>
    <tr>
		<td>
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pemohon</label>
		</td>
		<td>
			<input type="text"  name="pemohon" size="20" value="<?php echo $datpp['pelapor'];?>" readonly/>
		</td>
	</tr>
    <tr>
		<td>
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Section</label>
		</td>
		<td>
			<input type="text"  name="section" size="20" value="<?php echo $datpp['section'];?>" readonly/>
		</td>
	</tr>
    <tr>
     <td>
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kategori</label>
     </td>
     <td>
            <select name="cb_brg">
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
					?>
				</select>
     </td>
    </tr>
    <tr>
		<td>
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Barang</label>
		</td>
		<td>
			<input type="text"  name="nmbrg" size="30" required/>
		</td>
	</tr>
      <tr>
		<td>
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jumlah</label>
		</td>
		<td>
			<input type="text"  name="jml" size="30" onkeypress="return hanyaAngka(event)" required/>
		</td>
	</tr>
      <tr>
		<td>
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Keterangan</label>
		</td>
		<td>
			<input type="text"  name="ket" size="30"/>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			
				<button class="btn btn-sm btn-primary" name="txttombol" type="submit"><i class="ace-icon fa fa-check"></i>Submit</button>
			
		</td>
	</tr>
</table>
</form>
</center>


<script>
function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
