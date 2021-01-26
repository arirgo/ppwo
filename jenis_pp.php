
	
<?php
session_start();
 $usernm = $_SESSION['username'];



 $nopp	=$_POST['nopp'];
// echo $nama 	=$_POST['txtadmin'];


require_once("config.php");
$ckusr=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM user where username='$usernm' "));
$dev=$ckusr['dev'];
$nm=$ckusr['nama'];
$pls=$ckusr['pls'];

$ckpp=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_pp where no_pp='$nopp' "));
								

if($dev=='pro'){
$pr=" and jenis_group='Software'";
}else{
$pr="";
}

?>
<br>
<form action="take_pp.php" method="post">
<table style="width:100%;margin-left:10px;">
<tr>
<td><br> Jenis PP  </td>
<td>
<input type="hidden" id="txttake" name="txttake" value="<?php echo $ckpp['no_pp'];?>">
<input type="hidden" id="txtadmin" name="txtadmin" value="<?php echo $nm;?>">
<br>
<select name="jenispp" id="jenispp" style="width:80%;" required>
					
					<option value="" selected>--PILIH--  </option>
					<?php if($dev=='pro'){ ?>
					<option value="Improvement" >Improvement</option>
					<option value="Development">Development</option>
					<option value="Bug Repair">Bug Repair</option>
					<option value="Administrasi">Administrasi</option>
					<?php }else{ ?>
					<option value="Project">Project</option>
					<option value="perbaikan">Perbaikan</option>
					<option value="dll">Lain-Lain</option>
					<?php } ?>
				</select>
</td></tr>
<tr>
<td><br>Komputer</td>

<td>
<div><br>
	<select class="chosen-select " id="nmkom" name="nmkom" style="width:80%">
    <option value="" selected>--PILIH--  </option>
	<?php
	if($pls=="ho")
	{
		$result=mysqli_query($koneksi,"SELECT * FROM master_komputer where pls='ho'  ORDER BY nama_komputer asc");
	
	}else{
		$result=mysqli_query($koneksi,"SELECT * FROM master_komputer where pls !='ho' ORDER BY nama_komputer asc");
	
	}
	while($isi  = mysqli_fetch_array($result)){ ?>

		<option value="<?php echo $isi['nama_komputer'];?>"><?php echo $isi['nama_komputer']." - ".$isi['nama_pengguna'];?></option>
	<?php } ?>
	</select>
</td>
<?php if($dev=="pro"){ ?>
<tr>
<td><br> Aplikasi / Project</td>
<td><br>

	
	<select class="chosen-select pilihsf" id="apl" name="apl" style="width:80%" required>
  <option value="" selected>--PILIH--  </option>
	<?php
	if($pls=="ho")
	{
		$result=mysqli_query($koneksi,"SELECT * FROM inventarisi where objectid !='' and pls='ho'  $pr ORDER BY nama_barang asc");

	}else{
		$result=mysqli_query($koneksi,"SELECT * FROM inventarisi where objectid !='' and pls !='ho' $pr ORDER BY nama_barang asc");

	}
	
	while($isi  = mysqli_fetch_array($result)){ ?>

		<option value="<?php echo $isi['nama_barang'];?>"><?php echo $isi['kode_it']." - ".$isi['nama_barang'];?></option>
	<?php } ?>
	</select>
</td>
</tr>
	<?php } else{

		echo"<input type='hidden' name='apl' value='-' id='apl'>";
	}?>
</form>
</table>
<br>
<center>
<button type="sumbit" class="btn btn-primary" id="takepp" name="takepp"  style="width:80px;">TAKE</button>
</center>
<br><br>
<br>

<!-- <script>

$(document).ready(function() {
  $("#rt").chosen-select({
    dropdownParent: $("#jenisModal")
  });
});

</script> -->

      
  <script>
		

$(document).on('click','.pilihsf',function(e){
                e.preventDefault();

			$("#apl").chosen({
			 dropdownParent: $("#jenisModal")
			 	
			});

			// $(".chosen-select").trigger("#jenisModal");
		
		})

		
$(document).on('click','#nmkom',function(e){
                e.preventDefault();

			$("#nmkom").chosen({
			 dropdownParent: $("#jenisModal")
			 	
			});

			// $(".chosen-select").trigger("#jenisModal");
		
		})
	</script>
