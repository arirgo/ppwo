<?php 
$username = $_POST['id'];
//~ echo $username;

require_once('config.php');
$sql	= mysqli_query($koneksi,"select * from user where username='".$username."'");
$data	= mysqli_fetch_array($sql);

?>
<script type=text/javascript>
function sama()
{	
    var  r			= document.getElementById('pass1');//1
    var  t			= document.getElementById('pass2');//2
    
    if(r!=t)
	{
		alert('password tidak sama');
		r.value=='';
		t.value=='';
		r.focus();
		return false;
	}
	else
	{
		return true;
	}
    
}
</script>
<body>
<form name="f_usr_modal" action="user_editpass.php" method="POST" class="form-horizontal" role="form" onsubmit='return sama();'>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Username</label>

										<div class="col-sm-9">
											<input type="text" value="<?php echo $data['username'];?>" readonly id="form-field-1" name="txtusername">									
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">New Password</label>

										<div class="col-sm-9">
											<input type="text" placeholder="Password" id="pass1" name="txtpassword1">									
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Retype Password</label>

										<div class="col-sm-9">
											<input type="text" placeholder="Password" id="pass2" name="txtpassword2">									
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

</body>

