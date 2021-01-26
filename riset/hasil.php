<?php 
$nopp = $_POST['id'];
//~ echo $nopp;

require_once("config.php");
$sqla = mysqli_query($koneksi,"select * from tbl_pp where no_pp ='".$nopp."'");
$data = mysqli_fetch_array($sqla);

?>
<div>
<h4><label>No. PP &nbsp;&nbsp;<?php echo $nopp;?></label></h4>

<table>
	<tr>
		<td><label>Pelapor</label></td><td>&nbsp;:</td>
		<td>&nbsp;&nbsp;<input type="text" value="<?php echo $data['pelapor']; ?>" readonly></td>
		<td colspan="2"><label>Tanggal Lapor</label></td><td>&nbsp;:</td>
		<td><input type="text" value="<?php echo $data['tgl_lapor']; ?>" size="8"></td>
	</tr>
	<tr>
		<td><label>Section</label></td><td>&nbsp;:</td><td>&nbsp;&nbsp;<input type="text" value="<?php echo $data['section']; ?>" readonly></td>
	</tr>
	<tr>
		<td><label>Permasalahan</label></td><td>&nbsp;:</td><td>&nbsp;&nbsp;<textarea rows="3" cols="35" readonly><?php echo $data['kerusakan']; ?></textarea></td>
	</tr>
</table>
</div>
