<?php 
$nowo = $_POST['id'];
//~ echo $nowo;
?>
<center>
<table width="80%" border="1" class="table table-striped table-bordered table-hover">
	<tr>
		<td>
			Kontraktor dari luar
		</td>
		<td>&nbsp;</td>
		<td>
			<input class="ace" type="checkbox" id="id-disable-check" />
			<span class="lbl"> YA / TIDAK</span>
		</td>
	</tr>
	<tr>
		<td>Nama Kontraktor</td>
		<td>&nbsp;</td>
		<td>
			<input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="TIDAK" />
											
		</td>
	</tr>
</table>
</center>


<!--

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Readonly field </label>

										<div class="col-sm-9">
											<input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="TIDAK" />
											<span class="help-inline col-xs-12 col-sm-7">
												<label class="middle">
													<input class="ace" type="checkbox" id="id-disable-check" />
													<span class="lbl"> YA / TIDAK</span>
												</label>
											</span>
										</div>
									</div>
-->

		<!--[if !IE]> -->
<!--
		<script src="assets/js/jquery.2.1.1.min.js"></script>
-->
		<script type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('readonly')) {
						inp.setAttribute('readonly' , 'false');
						inp.removeAttribute('readonly');
						inp.value="YA";
					}
					else {
						inp.setAttribute('readonly' , 'true');
						inp.value="TIDAK";
					}
				});
			
			
				
			
			});
		</script>



		<!-- inline scripts related to this page -->
		
	</body>
</html>

