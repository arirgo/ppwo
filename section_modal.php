<?php 
$id = $_POST['id'];
//~ echo $username;

require_once('config.php');
$sql	= mysqli_query($koneksi,"select * from section where id='".$id."'");
$data	= mysqli_fetch_array($sql);

?>
<script type=text/javascript>
function kosongm()
{	
    var  r			= document.getElementById('section');//1
    var  t			= document.getElementById('singkatan');//2
    
    if(r.value=='')
	{
		document.getElementById('pesan11').innerHTML = "//Nama Section Harus Diisi";
		r.focus();
		return false;
	}
	else
	{
		document.getElementById('pesan11').innerHTML = "";
	}
	
	
	if(t.value=='')
	{
		document.getElementById('pesan22').innerHTML = "//Singkatan Harus Diisi";
		t.focus();
		return false;
	}
	else
	{
		document.getElementById('pesan22').innerHTML = "";
	}
    
}
</script>
<body>
<form name="f_sec_modal" action="section_edit.php" method="POST" class="form-horizontal" role="form" onsubmit='return kosongm();'>
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Section</label>

										<div class="col-sm-9">
											<input type="text" value="<?php echo $data['nama_section'];?>" id="section" name="section">	
											<label style='margin-left: 5px;' id=pesan11></label>									
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Singkatan</label>

										<div class="col-sm-9">
											<input type="text" id="singkatan" value="<?php echo $data['singkatan'];?>" name="singkatan">	
											<label style='margin-left: 5px;' id=pesan22></label>									
										</div>
									</div>
									
									
									
									<div class="form-group">
										<center>
									<table>
										<tr>
											<td>
											
												<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Edit
											</button>
				
											</td>
										</tr>
									</table>
								</center>
									</div>
							
								
								
									
						</form>
