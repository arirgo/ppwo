<?php
require_once('config.php');

if(isset($_GET['action']) && $_GET['action'] == "getSection") {
$nama_section = $_GET['nama_section'];
//ambil data barang
$query = "SELECT nama_section, singkatan_section FROM section WHERE nama_section='".$nama_section."'";
$sql = mysqli_query($koneksi,$query);
$row = mysqli_fetch_array($sql);
echo json_encode($row);
exit;
}


?>
<head>
<script type="text/javascript"src="assets/js/jquery.2.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#nama_section').change(function(){
		$.getJSON('tesoption.php',{action:'getSection',nama_section:$(this).val()}, function(json){
			if (json == null) {
				$('#skode').text('');	
				$('#txtskt').val('');
				
			} else {
					$('#skode').text(json.nama_section);
					$('#txtskt').val(json.nama_section);
					});
		$('#txtskt').val(json.txtskt);
		}		
	});
});
</script>	
</head>
<body>
	<form>
		<table>
			<tr>
				<td>
					Pilih Section
				</td>
				<td>
					<select name="nama_section" id="nama_section">
						<option value="">--Pilih--</option>
						<?php
							$sqlx = mysqli_query($koneksi,"select * from section");
							while ($data = 	mysqli_fetch_array($sqlx)){
									echo "<option value='".$data['nama_section']."'>".$data['nama_section']."</option>";
								}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Singkatan</td>
				<td>
					<span id="skode"></span>
					<input type="text" name="txtskt" id="txtskt">
				</td>
			</tr>
		</table>
	</form>
</body>
