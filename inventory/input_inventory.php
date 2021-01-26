<head>
<!-- This is what you need -->
  <script src="../dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../dist/sweetalert.css">
  <!--.......................-->
</head>
<body>
<?php
$kd_grup	=	strtoupper($_POST['txtkodegrup']);
$nm_grup	=	$_POST['txtnamagrup'];

require_once("../config2.php");
$sql	=	mysqli_query($koneksi,"select * from ms_grup where kode_grup='".$kd_grup."'");
$data	=	mysqli_fetch_array($sql);
if ($data['kode_grup']==$kd_grup){
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
								window.location.href = 'grup_inventory.php';
							});
			
		</script>
	
	<?php
	
}else {

$perintah	=	"	kode_grup	=	'".$kd_grup."',
					nama_grup	=	'".$nm_grup."'";
$sytax	=	mysqli_query($koneksi,"insert into ms_grup set ".$perintah);
?>
		<script>
				swal({ 
						title: "Succes!",
						text: "Data berhasil disimpan!",
						type: "success" 
					},
					function(){
								window.location.href = 'grup_inventory.php';
							});
			
		</script>
	
	<?php

}
?>
</body>
