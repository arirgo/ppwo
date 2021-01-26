<form name="f_barang" method="post" action="input_barang.php">
<table>
	<tr>
		<td>FORM INPUT</td>
	</tr>
	<tr>
		<td>Kode Grup</td>
		<td>
			<select name="combo_kode" id="combo_kode">
				<option value="">--pilih--</option>
				<?php
					require_once("../config2.php");
					$sql	=	mysqli_query($koneksi,"select * from ms_grup");
					while($data = mysqli_fetch_array($sql)){
						echo'<option value="'.$data['kode_grup'].'">'.$data['nama_grup'].'</option>';
						}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Kode Barang</td>
		<td>
			<input type="text" name="txtkode" id="txtkode" readonly size="1"><input type="text" name="txtnomor" size="1" maxlength="2">
		</td>
	</tr>
	<tr>
		<td>Nama Barang</td>
		<td>
			<input type="text" name="txtnamabarang">
		</td>
	</tr>
	<tr>
		<td>Satuan</td>
		<td>
			<input type="text" name="txtsatuan">
		</td>
	</tr>
	<tr>
		<td>Stock</td>
		<td>
			<input type="text" name="txtstock" size="2" maxlength="3">
		</td>
	</tr>
	<tr>
		<td>
			<button type="submit">Submit</button>
			<button type="reset">Reset</button>
		</td>
	</tr>
</table>
</form>
<script src="jquery-1.11.1.min.js"></script>
<script>
$("#combo_kode").on("change", function() {
  $.ajax({
    type: "POST",
    data: {
      "combo_kode": $("#combo_kode").val()
    },
    url: "json.php",
    dataType: "json",
    success: function(JSONObject) {		
      // Loop through Object and create peopleHTML
      for (var key in JSONObject) {
        if (JSONObject.hasOwnProperty(key)) {
          $("#txtkode").val(JSONObject[key]["kode"]);
        }
      }

      // Replace table’s tbody html with peopleHTML
    }
  });
});
</script>
