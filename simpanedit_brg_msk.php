<?php
session_start();
 $kd_msk     =$_POST['kd_msk'];
 $obj        =$_POST['obj'];
 $cb_brg     =$_POST['cb_brg'];
  $nmbrg      =$_POST['nmbrg'];
  $jmlbrg     =$_POST['jmlbrg'];
  $jmlawal    =$_POST['jmlawal'];
  $userinput   =$_POST['userinput'];
 $tglmsk     =$_POST['tglmsk'];
$tglmskawal =$_POST['tglmskawal'];
 $ketmsk     =$_POST['ketmsk'];
 $ketmskawal =$_POST['ketmskawal'];


        require_once("config.php");
        $tgl_revisi=date('Y-m-d');
        date_default_timezone_set('Asia/Jakarta');
            $user_revisi=$_SESSION['nama'];
         // $jmlakhir=$jmlbrg+($jmlawal-$jmlawal);


            $sqlstok =mysqli_query($koneksi,"select*from stok where kd_jenis='$cb_brg' and nama_barang='$nmbrg'");
            $datstoks	= mysqli_fetch_array($sqlstok);
            $lihat=$datstoks['jumlah_stok'];
            $hasilstok=($lihat-$jmlawal)+$jmlbrg;

            if($hasilstok<0){?>

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
								window.location.href = 'form_barang_masuk.php';
							});
			</script>
            </body>
                

<?php  }else{
            $updtbrg =mysqli_query($koneksi,"update barang_masuk set jumlah='$jmlbrg', tgl_msk='$tglmsk', tgl_revisi='$tgl_revisi',user_revisi='$user_revisi'
            where objectid='$obj' and kd_masuk='$kd_msk' and user_input='$userinput'");
              $updttrans =mysqli_query($koneksi,"update trans_inventory set jumlah_trans='$jmlbrg', tgl_revisi='$tgl_revisi'
                where  kode_trans='$kd_msk'");


             $updtstok =mysqli_query($koneksi,"update stok set jumlah_stok='$hasilstok' where kd_jenis='$cb_brg' and nama_barang='$nmbrg'");


           
?>  <head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->

            </head>
            <body>
			<script type=text/javascript>
				swal({ 
						title: "SUCCES!",
						text: "BARANG MASUK BERHASIL DI UPDATE ",
						type: "succes" 
					},
					function(){
								window.location.href = 'form_barang_masuk.php';
							});
			</script>
            </body>
            
            <?php } ?>