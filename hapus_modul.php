
<?php

  //  $kd_msk =$_POST['kd_msdk'];
   $objectid    =$_GET['obj'];

    require_once("config.php");
  
 $hapuskom=mysqli_query($koneksi,"delete from detail_project where objectid='$objectid' ");
    
  

?>

<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->

</head>
<body>
			<script type=text/javascript>
				swal({ 
						title: "Succes!",
						text: "DATA BERHASIL DI HAPUS",
						type: "success" 
					},
					function(){
								window.location.href = 'menu_process_wo.php';
							});
			</script>
</body>

