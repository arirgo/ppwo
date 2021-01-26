<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->
</head>
<body>
<?php
$kd_ctr	=	$_POST['cb_ctr'];
$sub_ctr	=	$_POST['txtnamactr'];

require_once("config.php");
$sql	=	mysqli_query($koneksi,"select * from ms_category where subcategory='".$sub_ctr."'");
$data	=	mysqli_fetch_array($sql);
if ($data['subcategory']==$sub_ctr){
	?>
		<script>
			
				//var url = document.getElementById('url').value;
				
				//swal("Deleted!", "Your imaginary file has been deleted!", "success");
				//alert("TA DA");
				//window.location = url;
				swal({ 
						title: "Error",
						text: "Data sudah ada",
						type: "error" 
					},
					function(){
								window.location.href = 'category.php';
							});
			
		</script>
	
	<?php
	
}else {

$perintah	=	"	category	=	'".$kd_ctr."',
					subcategory	=	'".$sub_ctr."'";
$sytax	=	mysqli_query($koneksi,"insert into ms_category set ".$perintah);
?>
		<script>
				swal({ 
						title: "Succes!",
						text: "Data berhasil disimpan!",
						type: "success" 
					},
					function(){
								window.location.href = 'category.php';
							});
			
		</script>
	
	<?php

}
?>
</body>
