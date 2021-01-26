<?php
session_start();
 $kd_klr     =$_POST['kd_klr'];
 $obj        =$_POST['obj'];
 $cb_brg     =$_POST['cb_brg'];
 $nmbrg     =$_POST['nmbrg'];
 $jmlbrg     =$_POST['jmlbrg'];
 $jmlawal    =$_POST['jmlawal'];
 $userinput   =$_POST['userinput'];
 $tglklr     =$_POST['tglklr'];
 $tglklrawal =$_POST['tglklrawal'];
 $ketklr     =$_POST['ketklr'];
 $ketklrawal =$_POST['ketklrawal'];
    $pp_wo =$_POST['editppwo'];


        require_once("config.php");
        $tgl_revisi=date('Y-m-d');
        date_default_timezone_set('Asia/Jakarta');
          $user_revisi=$_SESSION['nama'];
          $jmlakhir=$jmlbrg+($jmlawal-$jmlawal);

          //cek jumlah stok terakhir
          $sqlstok =mysqli_query($koneksi,"select*from stok where kd_jenis='$cb_brg' and nama_barang='$nmbrg'");
          $datstoks	= mysqli_fetch_array($sqlstok);
      echo    $stokterakhir=$datstoks['jumlah_stok'];
         
        //batalstok
        $hasilstok=($stokterakhir+$jmlawal)-$jmlbrg;
       echo $hasilstok;
        if($hasilstok <0)
        { ?>

<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->

            </head>
            <body>
			<script type=text/javascript>
				swal({ 
						title: "GAGAL!",
						text: "STOK KURANG ",
						type: "error" 
					},
					function(){
								window.location.href = 'form_barang_keluar.php';
							});
			</script>
            </body>
    

       <?php }else{

            $updtbrg =mysqli_query($koneksi,"update barang_keluar set jumlah_keluar='$jmlbrg', tgl_keluar='$tglklr', tgl_revisi='$tgl_revisi',user_revisi='$user_revisi',no_pp_wo='$pp_wo'
                where objectid='$obj' and kd_keluar='$kd_klr' and user_input='$userinput'");
                
             $updttrans =mysqli_query($koneksi,"update trans_inventory set jumlah_trans='-$jmlbrg', tgl_revisi='$tgl_revisi'
                where  kode_trans='$kd_klr'");

            $updtstok =mysqli_query($koneksi,"update stok set jumlah_stok='$hasilstok' where kd_jenis='$cb_brg' and nama_barang='$nmbrg'");

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
						title: "Succes update!",
						text: "QTY AWAL : <?php echo $jmlawal ;?>QTY AKHIR. : <?php echo $jmlakhir; ?>",
						type: "success" 
					},
					function(){
								window.location.href = 'form_barang_keluar.php';
							});
			</script>
</body>


       <?php }?>
