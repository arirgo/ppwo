<html>
<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->
</head>
<body>
	<form action="coba.php" method="post" name="f_coba">
		<table>
			<tr>
				<td colspan="2">Coba Diinput</td>
			</tr>
			<tr>
				<td>Teks</td>
				<td>
					<input type="text" name="txt1" placeholder="inputan">
				</td>
			</tr>
			<tr>
				<td>Pilih</td>
				<td>
					<select name="txt2">
						<option value="">--pilih--</option>
						<option value="1">pilihan 1</option>
						<option value="2">pilihan 2</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit" name="btn1" value="tombol">Submit</button>
				</td>
				<td>
					<button type="reset" name="btn2">Reset</button>
				</td>
			</tr>
		</table>
	</form>
	<br>
	<br>
	
	<?php
		if(isset($_POST['btn1'])){
		$tesk	=	$_POST['txt1'];
		$pilih	=	$_POST['txt2'];
	?>
		<table>
			<tr>
				<td>Teks</td>
				<td>Pilihan</td>
			</tr>
			<tr>
				<td><?php echo $teks; ?></td>
				<td><?php echo $pilih; ?></td>
			</tr>
			<tr>
			
			</tr>
		</table>
	<?php }?>
</body>
</html>
