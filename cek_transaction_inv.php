    <?php
error_reporting(0);
	
?>
<head>
<style type="text/css">
		.table-data{
			width: 100%;			
			border-collapse: collapse;			
		}

		.table-data tr th,
		.table-data tr td{
			height: 20px;
			border:1px solid black;
			font-size: 9pt;
			font-family: "Arial", sans-serif;
          
		}		

		h3 {
 
			font-family: "Arial", sans-serif;
}

	</style>
</head>
<body>

<?php

   require_once("config.php");
    	$barang =$_POST['cb_brg'];
    // $tglfrom=$_POST['tglfrom'];
	// $tglto  =$_POST['tglto'];
        $nm_barang =$_POST['nmbrg'];
     $bulan     =$_POST['bulan'];
        $tahun     =$_POST['tahun'];
        $lapor     =$_POST['lapor'];
        $namaBulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
     
    if ($bulan >0 and  $bulan<10){
		$bln	=	strval('0'.$bulan);
        }else if($bulan=""){
            $bln="";	
        }
        else {
		$bln	=	strval($bulan);										
        }
        

    
     $blnsblm=$bulan-(1);
    if($blnsblm < 1 )
    {
        $thnsblm=$tahun-(1);
        $jmlhari=cal_days_in_month(CAL_GREGORIAN,"12",$thnsblm);
    echo    $tglsebelum=$thnsblm."-12"."-".$jmlhari;
        $a="a";
    }else if($blnsblm > 0 and $blnsblm <10  ) 
    {
        $blnsebelum=strval('0'.$blnsblm);
        $jmlhari=cal_days_in_month(CAL_GREGORIAN,$blnsebelum,$tahun);
     echo   $tglsebelum=$tahun."-".$blnsebelum."-".$jmlhari;
      $a="b";
    }else{
        $blnsebelum=strval($blnsblm);
        $jmlhari=cal_days_in_month(CAL_GREGORIAN,$blnsebelum,$tahun);
     echo   $tglsebelum=$tahun."-".$blnsebelum."-".$jmlhari;
        
     $a="c";

    }       
    
   
   

	
?>
<?php if($lapor=="history"){
    echo $a;
    ?>
<!-- transaksi stok -------------------------------------------------------------------------------------------->

<br>
 <table ><tr>
        <td width="50%;"> <img src="assets/img/plasindologo.jpg" width="316px" height="51px" style="margin-top:-8px;"></src></td>
        <td width="30%;"></td>
        <td width="50%;">
            <table class="table-data"><tr><td>No.Form</td ><td  style="width:100%;" >IT-14</td></tr>
                             <tr><td>No.Revisi</td><td>1</td></tr>
                             <tr><td>Tanggal</td><td>14-10-2017</td></tr>
            </table>
        </td></tr></table>

<?php

if($barang<>''){
$idbrg =" and id_brg='$barang' ";
}else{ $idbrg=''; }


 $cekkd     =mysqli_query($koneksi,"select * from inventarisi where objectid='$barang'");
                    $kd_tampil	=	mysqli_fetch_array($cekkd);
                    if($kd_tampil['nama_barang']=='')
                    { 
                        $brgku="ALL";
                    }else{
                     $brgku= strtoupper($kd_tampil['nama_barang']);
                    }
$cekbrgmsk  =mysqli_query($koneksi,"select sum(jumlah) as jmlmsk from barang_masuk where objectid !=0  $idbrg and nama='$nm_barang' and tgl_msk  between '%' and '$tglsebelum'");
$dtbrgmsk   =mysqli_fetch_array($cekbrgmsk);

$cekbrgklr  =mysqli_query($koneksi,"select sum(jumlah_keluar) as jmlklr from barang_keluar where  objectid !=0  $idbrg and nama_brg='$nm_barang' and tgl_keluar  between '%' and '$tglsebelum' ");
$dtbrgklr   =mysqli_fetch_array($cekbrgklr);
$brg_masuk  =$dtbrgmsk['jmlmsk'];
$brg_keluar =$dtbrgklr['jmlklr'];
$stokawal   =$brg_masuk-$brg_keluar;
?>

<br><br>
<table class="table-data" class="table-data">
<center>
        <tr  class="table-data" ><td colspan="7" align="center"><h3>KARTU STOK</h3></td></tr>
        <tr><td colspan="2">Nama</td> <td colspan="5"><?php echo  $brgku;?></td></tr>
        <tr><td colspan="2">Janis Barang</td> <td colspan="5" ><?php if($nm_barang==''){echo "ALL";}else{echo $nm_barang;}?></td></tr>
        <tr ><td colspan="2" >Periode</td> <td colspan="5"> <?php echo $namaBulan[$bulan]."-".$tahun;?></td></tr>
        <tr><td style="width:5%;">IN</td><td style="width:10%;">Tanggal</td><td style="width:30%;">Keterangan</td><td style="width:5%;">Out</td><td style="width:10%;">Tanggal</td><td style="width:30%;">Keterangan</td><td style="width:10%;">TOTAL</td></tr>
        <tr><td></td><td></td><td></td><td></td><td></td><td>Stok</td><td><?php echo $stokawal;?></td></tr>
</center>

							<?php
						
							// 	if($tglfrom<>''){
							// 	$input .="and tgl_trans between '$tglfrom' and '$tglto' ";
							// }else{ }
							if($barang<>''){
								$input .="and  subcatagory='$barang'  ";
                            }else{ }
                            if($nm_barang<>''){
								$input .="and  nama_brg='$nm_barang'  ";
							}else{ }
							
                                $result="select * from trans_inventory where objectid !=0 $input and tgl_trans like '".$tahun."-".$bln."%' order by tgl_trans asc";
                               echo" select * from trans_inventory where objectid !=0 $input and tgl_trans like '".$tahun."-".$bln."%' order by tgl_trans asc";
								$trans=mysqli_query($koneksi,$result);
                                      $TTLBR=$stokawal;
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 2;
									while($data = mysqli_fetch_array($trans)){
									
                                       $cekbrg=$data['nama_barang'];
                                        $cekkd=mysqli_query($koneksi,"select * from inventarisi where objectid='$cekbrg'");
                                        $kd_tampil	=	mysqli_fetch_array($cekkd);
                                        
                                      $TTLBR+= $data['jumlah_trans'];
                                      $kodetrans=$data['kode_trans'];
                                        ?>
                                        <tr>

                                        <?php if($data['type_trans']=="IN"){?>
                                        <td ><?php echo  $data['jumlah_trans']; ?></td>
                                        <td ><?php echo $data['tgl_trans']; ?></td>
										<td >
                                        <?php 
                                                                                
                                      //  if($data['type_trans']=="IN"){
                                             $brgin=mysqli_query($koneksi,"select * from barang_masuk where kd_masuk='$kodetrans'");
                                             $cekbrgin=mysqli_fetch_array($brgin);
                                           echo $nopin= $cekbrgin['ppwo'];
                                           echo"<br>";
                                           echo $prin= $cekbrgin['no_pr'];
                                           echo"<br>";
                                           
                                            echo $data['keterangan'];
                                        
                                 //       }else{ } 
                                        
                                        ?></td>
                                        <?php } else{echo"<td></td><td></td><td></td>";}?>

                                         
                                         <?php if($data['type_trans']=="OUT"){?>
                                        <td ><?php   $data['jumlah_trans']; ?></td>
                                        <td ><?php  $data['tgl_trans']; ?></tdid>
										<td style="overflow-wrap:break-word;" >
                                        <?php
                                        //  if($data['type_trans']=="OUT"){
                                             $brgout=mysqli_query($koneksi,"select * from barang_keluar where kd_keluar='$kodetrans'");
                                             $cekbrgout=mysqli_fetch_array($brgout);
                                           echo $nop1= $cekbrgout['no_pp_wo'];
                                           
                                           $cekpp=mysqli_query($koneksi,"select * from tbl_pp where no_pp='$nop1'");
                                           $pp=mysqli_fetch_array($cekpp);
                                           if($pp['komputer']==''){}else{ echo"<br>". $pp['komputer'];}
                                           echo"<br>".$data['keterangan'];
                                        //    }else{}
                                            ?>
                                           </td>
                                        <?php } else{echo"<td></td><td></td><td></td>";}?>
                                     
                                        <td ><?php echo $TTLBR; ?></td>
                                     	</tr>
									
									<?php	$no++;
										$ttl=$ttl+$data['jumlah_trans'];
									}
							 ?>
</table>


<?php } else if($lapor=="barang_masuk"){?>
<!-- BARANG MASUK -------------------------------------------------------------------------------------------->
<img src="assets/img/plasindologo.jpg" width="216px" height="31px" style="margin-top:-8px;"></src>
  <?PHP
 

 
 $cekkd     =mysqli_query($koneksi,"select * from inventarisi where objectid='$barang'");
                    $kd_tampil	=	mysqli_fetch_array($cekkd);
                    if($kd_tampil['nama_barang']=='')
                    { 
                        $brgku="ALL";
                    }else{
                     $brgku= strtoupper($kd_tampil['nama_barang']);
                    }
  ?>


<center><h3 ><b>TRANSAKSI BARANG MASUK </b></h3></center>
<table style="font-size:12px;">
<tr>
    <td>Nama Barang</td><td>: <?php echo $brgku;?></td>
</tr>
<tr>
    <td>Jenis</td><td>: <?php if($nm_barang==''){ echo "ALL";}else{echo $nm_barang;}?></td>
</tr>
<tr>
    <td>Section</td><td>: IT</td>
</tr>
<tr>
    <td>Periode</td><td>: <?php echo $namaBulan[$bulan]."-".$tahun;?>  </td>
</tr>
</table>

<br>

   <table class="table-data">
      <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>No PR</th>
            <th>No PO</th>
            <th>No SJ</thorder-top:1px>
            <th>Subcategory</th>
            <th>Detail</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
        </tr>
        </thead>
        <tbody>
<?php   


 		
  		  if($barang<>''){
			$input .="and id_brg='$barang'   ";
        }else{ }
        
  		  if($nm_barang<>''){
			$input .="and nama='$nm_barang'   ";
		}else{ }
		
	$no=1;
    $brgmsk=mysqli_query($koneksi,"select*from barang_masuk where objectid !=0 $input and tgl_msk like '".$tahun."-".$bln."%'  ");
    while($dtbrgmsk=mysqli_fetch_array($brgmsk))
    {?>
    <tr  class="table-data">
		<td ><?php echo $no;?></td>
        <td><?php echo $dtbrgmsk['tgl_msk'];?></td>
        <td><?php echo $dtbrgmsk['no_pr'];?></td>
        <td ><?php echo $dtbrgmsk['no_po'];?></td>
        <td ><?php echo $dtbrgmsk['no_sj'];?></td>
        <td >
            
            <?php
      
            $kd=$dtbrgmsk['id_brg'];
                $cekkd2=mysqli_query($koneksi,"select * from inventarisi where objectid='$kd'");
                $kd_tampil2	=	mysqli_fetch_array($cekkd2);

                echo $kd_tampil2['nama_barang'];
            ?>
        </td >
        <td ><?php echo $dtbrgmsk['nama'];?></td>
        <td ><?php echo $dtbrgmsk['jumlah'];?></td>
        <td ><?php echo $dtbrgmsk['keterangan'];?></td>
        
    </tr>
		<?php $no++;
		$ttlmsk=$ttlmsk+$dtbrgmsk['jumlah'];
		?>
    <?php }?>
	 <?php if($ttlmsk==''){ $total='0';}else{$total=$ttlmsk;}?>
							 <tr><td colspan='7' style="border-right:1px solid #000;border-bottom:1px solid #000;border-left:1px solid #000;"><b>TOTAL</b></td>
							 <td  style="border-right:1px solid #000;border-bottom:1px solid #000;" ><b><?php echo $total; ?></b></td><td style="border-right:1px solid #000;border-bottom:1px solid #000;"></td></tr>
							 
  </tbody>
    </table>
    
<?php } else if($lapor=="barang_keluar") {?>
<!-- BARANG KELUAR -------------------------------------------------------------------------------------------->
<img src="assets/img/plasindologo.jpg" width="216px" height="31px" style="margin-top:-8px;"></src>
 <?PHP
 

 
 $cekkd     =mysqli_query($koneksi,"select * from inventarisi where objectid='$barang'");
                    $kd_tampil	=	mysqli_fetch_array($cekkd);
                    if($kd_tampil['nama_barang']=='')
                    { 
                        $brgku="ALL";
                    }else{
                     $brgku= strtoupper($kd_tampil['nama_barang']);
                    }
  ?>

<center>
<h3 ><b>TRANSAKSI BARANG KELUAR</b></h3></center>


<table style="font-size:12px;">
<tr>
    <td>Nama Barang</td><td>: <?php echo $brgku;?></td>
</tr>
<tr>
    <td>Jenis</td><td>: <?php if($nm_barang==''){ echo "ALL";}else{echo $nm_barang;}?></td>
</tr>
<tr>
    <td>Section</td><td>: IT</td>
</tr>
<tr>
    <td>Periode</td><td>: <?php echo $namaBulan[$bulan]."-".$tahun;?>  </td>
</tr>
</table>
<br>

    <table class="table-data">
       <thead>
        <tr>
            <th >No</thrder-right:1px>
            <th >Tanggal</th>
            <th >NO PP/WO</th>
            <th >Subcategory</th>
            <th >Detail</th>
            <th >Jumlah</th>
            <th >Keterangan</th>
        </tr>
        </thead>
<?php   



 		
  		  if($barang<>''){
			$input .="and id_brg='$barang'   ";
		}else{ }
		
	$no=1;
    $brgklr=mysqli_query($koneksi,"select*from barang_keluar where objectid !=0 $input and tgl_keluar like '".$tahun."-".$bln."%' ");
    while($dtbrgklr=mysqli_fetch_array($brgklr))
    {?>
    <tr>
		<td ><?php echo $no;?></td>
        <td ><?php echo $dtbrgklr['tgl_keluar'];?></td>
        <td ><?php echo $dtbrgklr['no_pp_wo'];?></td>
        <td >
            
            <?php
            $kd=$dtbrgklr['id_brg'];
                $cekkd=mysqli_query($koneksi,"select * from inventarisi where objectid='$kd'");
                $kd_tampil	=	mysqli_fetch_array($cekkd);

                echo $kd_tampil['nama_barang'];
            ?>
        </td >
        <td ><?php echo $dtbrgklr['nama_brg'];?></td>
        <td ><?php echo $dtbrgklr['jumlah_keluar'];?></td>
        <td ><?php echo $dtbrgklr['keterangan'];?></td>
        
    </tr>
		<?php $no++;
		$ttlklr=$ttlklr+$dtbrgklr['jumlah_keluar'];
		?>
    <?php }?>
	 <?php if($ttlklr==''){ $total='0';}else{$total=$ttlklr;}?>
							 <tr><td colspan='5' ><b>TOTAL</b></td>
							 <td ><b><?php echo $total; ?></b></td><td style="border-right:1px solid #000;border-bottom:1px solid #000;"></td></tr>
							 
    <tbody>
    </table>
 
    <?php



}else{}?>

</body>
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
