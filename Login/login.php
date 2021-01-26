<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Form Elements - Ace Admin</title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/colorpicker.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<?php 
require_once('../config.php');
$sql = mysqli_query($koneksi,"select * from user");
?>
<form action="login_proses.php" method="post">
        <table>
  <tr>
    <td height="36"><strong>Section</strong></td>
      <td>
		<select id = "section" name = "combo_section">
					<option 
			<?php while($data = mysqli_fetch_array($sql))
			       	{
						$i++;
 
						echo " <option value>".$data['section']."</option>";
					}
			?>
			</select>
    </td></tr> 
  <tr>
    <td><strong>Password</strong></td>
    <td><input name="txtpassword" type="password" id="textfield2" size="12" maxlength="14" required/></td>
    </tr>
  <tr>
  <tr>
    
  <tr>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td width="147">&nbsp;</td>
    <td width="222"><input type="submit" name="button" id="button" value="Login" />&nbsp;<a href=index.php><input type=button value="Back"></a></td>
  </tr>
</table>
</form>
