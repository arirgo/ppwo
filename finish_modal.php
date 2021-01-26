<?php 
$nopp = $_POST['id'];
//~ echo $nopp;
$tanggal		= date('Y-m-d');
$jam			= date('H:i');
$url			= "main_teknik.php";
require_once("config.php");
$sqla = mysqli_query($koneksi,"select * from tbl_pp where no_pp ='".$nopp."'");
$data = mysqli_fetch_array($sqla);
?>
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
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pekerjaan yang dilakukan</label>
				<div class="col-sm-9">
					<textarea rows="3" cols="35 " id="txtpekerjaan" placeholder="Pekerjaan yang dilakukan" name="txtpekerjaan"></textarea>
					<label style='margin-left: 5px;' id=pesan3></label>
				</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Suku cadang yang dipakai</label>
				<div class="col-sm-9">
					<select name="part" id="part">
						<option value="">--pilih--</option>
					</select>
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
</div>
