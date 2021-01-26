<?php 
$nopp = $_POST['id'];
//~ echo $nopp;
$tanggal		= date('Y-m-d');
$jam			= date('H:i');
$url			= "main_teknik.php";
?>
<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form name="f_pp" action="pp_proses.php" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor PP</label>
				<div class="col-sm-9">
					<input type="text"  class="col-xs-5 col-sm-3" value="<?php echo ''.$nopp.''; ?>" readonly />
				</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Full Length </label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
				</div>
		</div>
	</div>
</div>
