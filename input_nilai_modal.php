<?php 
 $id 	= $_POST['id'];
 $nama 	= $_POST['username'];
 $group = $_POST['group'];
 $it    = $_POST['it'];
 
 if($group=="WO"){
 $nilai = $_POST['nilai'];
 }else{
	 $nilai='';
 }
?>
<center>
<form name="f_nilai" class="f_nilai" id="f_nilai" method="POST">
<input type="hidden" name="id" value="<?php echo $id;?>">
<input type="hidden" name="txtnama" value="<?php echo $nama;?>">
<input type="hidden" name="group" value="<?php echo $group;?>">
<table>
<?php if($group=="PP"){?>
	<tr>
		<td>
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nilai</label>
		</td>
		<td>
			<input type="text"  name="nilai" size="15" onkeypress="return hanyaAngka(event)" value="<?php echo $nilai;?>"required/>
		</td>
	</tr>
<?php }?>
<?php if($group=="WO"){?>
	
	<?php if($it=='prog' ){?>
	<tr><td><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Analisis</label></td>
		<td><input type="text"  name="nilai_analisis" size="15" onkeypress="return hanyaAngka(event)" required/></td>
	</tr>
	<tr><td><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Programing</label></td>
		<td><input type="text"  name="nilai_programing" size="15" onkeypress="return hanyaAngka(event)" required/></td>
	</tr>
	<tr><td><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Dokumentasi</label></td>
		<td><input type="text"  name="nilai_dokumentasi" size="15" onkeypress="return hanyaAngka(event)" required/></td>
	</tr>
	<?php } else if($it=='infra' ){?>
	<tr>
		<td>
		
			<table>
			<tr><th>POIN</th>
				<th style="width:10px;"></th>
				<th>1</th>
				<th><input type="radio" name="nilai_point" value="1"></th>
				<th>2</th>
				<th><input type="radio" name="nilai_point" value="2"></th>
				<th>3</th>
				<th><input type="radio" name="nilai_point" value="3"></th>
			</tr>
			</table>
		
		</td>
		
	</tr>
<?PHP  } else{ echo"Dev IT belum di isi";}
		} else{}?>
	<tr>
		<td colspan="2" align="center">
			<br>
				<button class="tombol_nilai btn btn-sm btn-primary" name="txttombol" type="button"><i class="ace-icon fa fa-check"></i>Submit</button>
			
		</td>
	</tr>
</table>
</form>
</center>
<br>
<script>
function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
</body>
</html>





<script type="text/javascript">
	$(document).ready(function(){
		$(".tombol_nilai").click(function(){
		
		
       
              var data           =$('#f_nilai').serialize();
          
			
		$.ajax({
		type: 'POST',
		url: "simpan_nilai.php",
		data: data,														
		
		success: function(stok) {
               	swal({ 
					title: "Succes!",
						text: "Nilai Succes",
						type: "success" 
					},
					function(){
							  location.reload();
							}
							);
			}
		  })//CEK JML
		});

	});
	</script>