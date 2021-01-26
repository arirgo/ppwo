<?php
require_once('config.php');
session_start();
date_default_timezone_set("Asia/Jakarta");
$bagianpenilai=$_SESSION['username'];
if($bagianpenilai=='it01')
{
  $tgl1      =date('Y-m-d H:i:s');
echo  $penilai1  =$_SESSION['nama'];
  
}else
{
  $tgl2      =date('Y-m-d H:i:s');
echo  $penilai2  =$_SESSION['nama'];
}


    $no_project         =$_POST['id'];
    $nilai              =$_POST['nilai'];
    $id_user            =$_POST['txtnama'];
    $group              =$_POST['group']; 

     if($group=="WO"){

    $nilai_analisis     =$_POST['nilai_analisis'];
    $nilai_programing   =$_POST['nilai_programing'];
    $nilai_dokumentasi  =$_POST['nilai_dokumentasi'];
    $nilai_point        =$_POST['nilai_point'];
       
         require_once('config.php');
   
  $cek=mysqli_query($koneksi,"select count(*)jmlnilaiwo from nilai_wo where no_wo='$no_project' ");
  $cek1=mysqli_fetch_array($cek);

  if($cek1['jmlnilaiwo'] > 0){
     
        if($bagianpenilai=="it01")
        {
        $update 	= mysqli_query($koneksi,"update nilai_wo set nilai_wo='$nilai',analisis='$nilai_analisis',
                                programing='$nilai_programing',dokumentasi='$nilai_dokumentasi',
                                point='$nilai_point',tgl_spvit='$tgl1',spv='$penilai1' where no_wo='$no_project'");
        }else{
                 $update 	= mysqli_query($koneksi,"update nilai_wo set nilai_wo='$nilai',analisis='$nilai_analisis',
                                programing='$nilai_programing',dokumentasi='$nilai_dokumentasi',
                                point='$nilai_point',tgl_sshit='$tgl2',sshit='$penilai2' where no_wo='$no_project'");
  
        }
    }else{

      
    $perintah	=  	"
                         username		  ='".$id_user."',
                         no_wo		    ='".$no_project."',
                         nilai_wo     ='".$nilai."',
                         analisis     ='".$nilai_analisis."',
                         programing   ='".$nilai_programing."',
                         dokumentasi  ='".$nilai_dokumentasi."',
                         point        ='".$nilai_point."',
                         tgl_spvit    ='".$tgl1."',
                         spv          ='".$penilai1."',
                         tgl_sshit    ='".$tgl2."',
                         sshit        ='".$penilai2."'
                          ";

    $simpan = mysqli_query($koneksi,"insert into nilai_wo set".$perintah);  
  }
?>

         <!-- <head> -->
<!-- This is what you need -->
  <!-- <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css"> -->
  <!--.......................-->
<!-- 
</head>
<body>
			<script type=text/javascript>
				swal({ 
						title: "Succes!",
						text: "Nilai WO Berhasil Di Input",
						type: "success" 
					},
					function(){
								window.location.href = 'view_planing.php';
							});
			</script>
</body>    
     -->
    
<?php }else{

      require_once('config.php');
     $cek_=mysqli_query($koneksi,"select COUNT(*) as jmlpp from nilai_pp where no_pp='$no_project'  ");
    $cek1_=mysqli_fetch_array($cek_);

  if($cek1_['jmlpp'] > 0){

       if($bagianpenilai=="it01")
		  {

        $update 	= mysqli_query($koneksi,"update nilai_pp set nilai_pp='$nilai',tgl_spvit='$tgl1',spv='$penilai1' where no_pp='$no_project'");
      }else{
               $update 	= mysqli_query($koneksi,"update nilai_pp set nilai_pp='$nilai',tgl_sshit='$tgl2',sshit='$penilai2' where no_pp='$no_project'");
      }


    }else{
    $perintah	=  	"
                         username		  ='".$id_user."',
                         no_pp		    ='".$no_project."',
                         nilai_pp     ='".$nilai."',
                          tgl_spvit     ='".$tgl1."',
                         spv          ='".$penilai1."',
                         tgl_sshit    ='".$tgl2."',
                         sshit        ='".$penilai2."'
                         
                         ";

    $simpan = mysqli_query($koneksi,"insert into nilai_pp set".$perintah);  
    }
?>
     <head>
<!-- This is what you need -->
  <!-- <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css"> -->
  <!--.......................-->
<!-- 
</head>
<body>
			<script type=text/javascript>
				swal({ 
						title: "Succes!",
						text: "Nilai PP Berhasil Di Simpan ",
						type: "success" 
					},
					function(){
								window.location.href = 'view_planing.php';
							});
			</script>
</body> -->

<?php }
?>