
<?php
ob_start();
?>
<?php

require_once("config.php");
    include "config.php";
   $no_wo=$_POST['textwo'];
    $dt=mysqli_fetch_array(mysqli_query($koneksi,"select * from tbl_wo where no_wo='$no_wo'"));
    $cekkad=$dt['kadiv'];
    $kadiv=mysqli_fetch_array(mysqli_query($koneksi,"select * from user where username='$cekkad'"));
?>

	
	<head>
<style type="text/css">
		.table-data{
			width: 100%;			
			border-collapse: collapse;			
		}

		.table-data tr th,
		.table-data tr td{
			height: 10px;
			border:1px solid black;
			font-size: 10pt;
			font-family: Verdana, Geneva, sans-serif;
            padding : 6px;
			
		
       
		}		

		h3 {
 
			font-family: Verdana, Geneva, sans-serif;
		}
		h2 {
 
			font-family: Verdana, Geneva, sans-serif;
		}

 @page {
            margin: 40px 40px 40px 40px !important;
            padding: 40px 40px 40px 40px !important;
        }
	</style>
</head>
<br>

<table class="table-data">
<tr><td>
<table class="table-data">
<tr>
    <td ><img src="assets/img/plasindologo.jpg" width="160px" height="31px" ></src></td>
    <td colspan=2 > <h3>
    
                   <p>FORMULIR PERMINTAAN </p>
                   <p>   AKSES SISTEM / APLIKASI <br> /  USB </p></h3>
                     
                     </td>
    <td  >
        <table class="table-data">
            <tr><td>No.form</td><td>IT-18</td></tr>
             <tr><td>No.revisi</td><td>0</td></tr>
             <tr><td>Tanggal</td><td>31-07-2020</td></tr>
        </table>
    </td>
</tr>
<tr><td colspan=2>Pemohon : <?php echo $dt['pemohon']." a/n : (".$dt['an']." )";?></td><td colspan=2>Tanggal: <?php echo $dt['tgl_permohonan'];?></td></tr>
<tr><td colspan=2>Dept / DIV : <?PHP echo $dt['section'];?></td><td colspan=2>Email:</td></tr>
<tr><td colspan=2>Telepon : </td><td colspan=2>Tiket : <?php echo $dt['no_wo'];?> </td></tr>
<tr> <td colspan=4> 
<br>
     Permintaan :

       <?php 
      $a=1;
    $cekprm = mysqli_query($koneksi,"select * from jenis_permintaan");
    while($dtaprm = mysqli_fetch_array($cekprm))
    {
        $idprm=$dtaprm['id_permintaan'];
         $pr= mysqli_fetch_array(mysqli_query($koneksi,"select * from detail_permohonan where id_permintaan='$idprm' and id_order='$no_wo'"));
        $cpr=count($pr);
        if($cpr >0)
        {
            $ckheked="checked=''";
        }else{$ckheked="";}
       ?>
        <input name="prm[]"  id="" type="checkbox" class="ace" <?php echo $ckheked;?> />
				<span class="lbl"> <?php echo $dtaprm['permintaan'];?></span>

     <?php 
   } ?>
     <br><br>
     Jenis Akses :
     <br>
      <?php 
      $a=1;
    $cekakses = mysqli_query($koneksi,"select * from jenis_akses");
    while($dtakses = mysqli_fetch_array($cekakses))
    { 
        $idakses=$dtakses['idakses'];
         $as= mysqli_fetch_array(mysqli_query($koneksi,"select * from detail_akses where akses='$idakses' and id_order='$no_wo'"));
      
        $aks=count($as);
        if($aks >0)
        {
            $ckheked1="checked=''";
        }else{$ckheked1="";}
        ?>
        <input name="prm[]"  id="" type="checkbox" class="ace" <?php echo $ckheked1;?>/>
				<span class="lbl"> <?php echo $dtakses['jenis_akses'];?></span>

     <?php $a++;
		$t=$a-1;
	if($t %5===0){
	echo "<br>";
											}
   } ?>
     
     <br><br>
     Dengan memenuhi ketentuan dan syarat berikut :
     <br>
  
     Keperluan dan alasan akses :
     <br><br>
    <i> <?php echo $dt['uraian_pekerjaan'];?></i>
    <br><br>
    Sifat Akses :
    <?php if($dt['sifat']=="Sementara"){?>
                <input  id="" type="checkbox" class="ace" checked='' />
				<span class="lbl"> Sementara</span>
                <input   id="" type="checkbox" class="ace" />
                <span class="lbl"> Permanen</span>
			
    <?PHP }else if($dt['sifat']=="Pementara"){?>
                <input  id="" type="checkbox" class="ace"  />
				<span class="lbl"> Sementara</span>
                <input   id="" type="checkbox" class="ace" checked='' />
                <span class="lbl"> Permanen</span>
    <?PHP }else{?>
                 <input  id="" type="checkbox" class="ace"  />
				<span class="lbl"> Sementara</span>
                <input   id="" type="checkbox" class="ace"  />
                <span class="lbl"> Permanen</span>
    <?php }?>
    <br>
    Masa berlaku akses sampai dengan  : <?php $dt['exp'];?>   
    <br>
    Ketentuan Akses :
    <p>
    <br>
    1. User menyetujui dan mematuhi kenijakan keamanan informasi, Kebijakan pengamanan <br> sistem / aplikasi dan prosedur terkait.
    <br>
    2. User dilarang mengalihkan atau meminjamkan hak akses kepada pihak lain.
    <br>
    3. User dilarang menyalahgunakan akses untuk kepentingan selain penugasan yang telah ditetapkan.
    <br>
    4. User harus memberitahukan dan mengembalikan hak akses kepada atasannya atau penanggung jawab hak akses, <br>
       apabila sudah tidak lagi bekerja dibidang yang menjadi dasar pemberian hak akses.
       <br>
    5. Pelanggaran terhadap pengamanan sistem atau aplikasi dan prosedur terkait akan menyebabkan pancabutan<br> 
        hak akses,tindakan disiplin, atau sanksi sesuai peraturan yang erlaku
        <br><br>
        <i>"Saya menyetujui dan bersedia mematuhi ketentuan ini. Saya akan menggunakan hak akses ke <br> 
            Sistem / Aplikasi sesuai tugas dan pekerjaan saya dan akan melaporkan setiap masalah atau insiden <br> 
            keamanan informasi yang saya ketahui"</i>
            <br><br>
    </p>
     </td>
     <tr>
        <td colspan=2 ><center>  Pemohon,
            <br><br><br><br><br>
            <?php echo $dt['pemohon'];?>
             <br>.................................................
            </center>
            <br>
        </td>
        <td colspan=2><center>
             Kepala Divisi Pemohon,
            <br><br><br><br><br>
            <?php echo $kadiv['nama'];?>
            <br>.................................................
            </center>
            <br>
        </td>
    </tr>
     <tr>
        <td colspan=2>
        <center>
         IT,
            <br><br><br><br><br>
            <?php
            if($dt['app_sh']=="Maman Nurohman" OR $dt['app_sh']=="ARI" ){
                echo $dt['app_sh'];
                  echo"<br>.................................................";
            } else if($dt['app_sh'] !="Maman Nurohman" AND $dt['app_sh'] !="Ari" AND($dt['app_it']=="Maman Nurohman" OR $dt['app_it']=="Ari"))
            {
               echo $dt['app_it'];
                echo"<br>.................................................";
            }else{
            echo "................................................."; }?>
       </center>
       <br>
        </td>
        <td colspan=2> <br></td>
    </tr>
     </tr>

</table>
</td></tr></table>

<?php
	$out = ob_get_contents();
ob_end_clean();
include("mpdf/Mpdf.php");
$mpdf = new mPDF('c',A4,'','',5,5,5,5,0,0);
$mpdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('mpdf/mpdf.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($out);
$mpdf->Output();
?>