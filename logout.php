<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->
</head>
<body>
<?php
session_start();
session_destroy();
?>
<script>
				swal({ 
						title: "Logout Succes!",
						text: "Anda berhasil Logout!!",
						timer: 2000,
						type: "success" 
					},
					function(){
								window.location.href = 'login.php';
							});
			
		</script>
</body>
