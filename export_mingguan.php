<?php 
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Week_Report_IT.xls");
date_default_timezone_set("Asia/Jakarta");

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
<?php
$tgl1=$_GET['tgl1'];
$tgl2=$_GET['tgl2'];

require_once('config.php');

  
$periode_awal  = $tgl1;
$periode_akhir = $tgl2;

// pisahkan tanggal, bulan tahun dari periode_awal
$explodeTgl1 = explode("-", $periode_awal);

// membaca bagian-bagian dari periode_awal
$tglpriod1 = $explodeTgl1[2];
$blnpriod1 = $explodeTgl1[1];
$thnpriod1 = $explodeTgl1[0];
 
// echo "<p>Hari Minggu pada Periode $periode_awal s/d $periode_akhir Jatuh pada Tanggal-Tanggal Berikut:</p>";


?>
<?php for($group=1;$group<=2;$group++){
	
	if($group==1)
	{
	echo"<h3><b>PROGRAMMER WEEKS REPORT</b></h3><br>";
		$personil="'Anggi Mulyana Fauji','Gugun','Deni Setiyo','Robby Tirta','Sopian'";
	}else{
		echo"<h3><b>INFRASTRUKTUR WEEKS REPORT</b></h3><br>";
		$personil="'Nurul','Mochamad Yusuf'";
	}
	
	?>	
<div><form name="fmdaily" id="fmdaily" class="fmdaily" method="post">
<?php
// counter looping
$i = 0;
// counter untuk jumlah hari minggu
$sum = 0;
 
do
{
    // mengenerate tanggal berikutnya
	$tanggal = date("Y-m-d", mktime(0, 0, 0, $blnpriod1, $tglpriod1+$i, $thnpriod1));

    // cek jika harinya minggu, maka counter $sum bertambah satu, lalu tampilkan tanggalnya
    if (date("w", mktime(0, 0, 0, $blnpriod1, $tglpriod1+$i, $thnpriod1)) == 0)
    {
	
		     $sum++;
		// echo $tanggal."<br>";
	
		//mencri awal minggu
		$explodeTgl2 = explode("-", $tanggal);
		$tglawalmggu2 = $explodeTgl2[2];
		$blnawalmggu2 = $explodeTgl2[1];
		$thnawalmggu2 = $explodeTgl2[0];

			$awalminggu = date("Y-m-d", mktime(0, 0, 0, $blnawalmggu2, $tglawalmggu2-6, $thnawalmggu2));
		
?>	<h5><b> PRIODE : <?php echo $awalminggu;?> S/D <?php echo $tanggal;?></b></h3>
	

   <table class="table-data" data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
   	<thead>
    <input type="hidden" value="1" id="total_modul"  name="jumlahmodul">
    <tr style="background-color:#7EB7FD;" >
        <th >NO</th>
	    <th >Uraian</th>
		<th >PROJECT / APLIKASI</th>
        <th >Modul</th>
		<th >PIC</th>
        <th >TGL SELESAI</th>
		<th >PP/WO</th>
		<th >ket</th>
    </tr>
    </thead>
    <tbody>
		
	<?php 
	 $tanggal1 = date('Y-m-d',strtotime($awalminggu));
     $tanggal2 = date('Y-m-d',strtotime($tanggal));
		  $NO=1;
	// while ($tanggal1 <= $tanggal2) {
	// 	 $tanggal1.'<br>';
	 
	$sql_pp	= mysqli_query($koneksi,"SELECT * FROM `tbl_pp` where (tgl_m_kerja between '$tanggal1' and '$tanggal2' and diterima in($personil)) or (tgl_s_kerja between '$tanggal1' and '$tanggal2' and diterima in ($personil)) or tgl_s_kerja='0000-00-00' and diterima in ($personil) group by no_pp ");
							while($row_pp	= mysqli_fetch_array($sql_pp))
		{ 
		
			$nop=$row_pp['no_pp'];
		$sql_sts	= mysqli_query($koneksi,"SELECT * FROM tbl_pp where no_pp='$nop'");
		$stts= mysqli_fetch_array($sql_sts);
		
		?>
	<tr><td><?php echo $NO++;?></td>
		<td><?php echo $row_pp['kerusakan']?></td>
		<td></td>
		<td ></td>
		<td><?php echo $row_pp['diterima'];?></td>
		<td><?php echo $stts['tgl_s_kerja'];?></td>
		<td><?php echo $row_pp['no_pp'];?></td>
		<td>
	<?php
		if($stts['tgl_s_kerja'] <= $tanggal2 && $stts['tgl_s_kerja']!='0000-00-00')
		{
			echo "finish";
		}else if($stts['tgl_hold'] <= $tanggal2 && $stts['tgl_s_kerja']=='0000-00-00')
					{ 	if(($stts['tgl_release']=='0000-00-00' && $stts['tgl_hold'] !='0000-00-00')or $stts['tgl_release']<=$tanggal1)
						 {
							echo"hold";
						 } 
						else{echo"on progress";}
		}
		
		else{ echo"on progress";}
		
		?>
		</td>
		</tr>
		<?php }	// --------------------------------------work order
		
			$sql_wo	= mysqli_query($koneksi,"SELECT * FROM `tbl_wo` where (tgl_m_kerja between '$tanggal1' and '$tanggal2' and diterima in($personil)) or (tgl_s_kerja between '$tanggal1' and '$tanggal2' and diterima in ($personil))or tgl_s_kerja='0000-00-00' and diterima in($personil) group by no_wo ");
							while($row_wo	= mysqli_fetch_array($sql_wo))
		{ 
			$now=$row_wo['no_wo'];
		$sql_stswo	= mysqli_query($koneksi,"SELECT * FROM tbl_wo where no_wo='$now'");
		$sttswo= mysqli_fetch_array($sql_stswo);
		
		?>
	<tr><td ><?php echo $NO++;?></td>
		<td><?php echo $row_wo['uraian_pekerjaan']?></td>
		<td></td>
		<td ></td>
		<td><?php echo $row_wo['diterima'];?></td>
		<td><?php echo $sttswo['tgl_s_kerja'];?></td>
		<td><?php echo $row_wo['no_wo'];?></td>
		<td>
	<?php
	 $sttswo['tgl_s_kerja'] ;
		if($sttswo['tgl_s_kerja'] <= $tanggal2 && $sttswo['tgl_s_kerja']!='0000-00-00')
		{
			echo "finish";
		}else if($sttswo['tgl_hold'] <= $tanggal2 && $sttswo['tgl_s_kerja']=='0000-00-00'){ if(($sttswo['tgl_release']=='0000-00-00' && $sttswo['tgl_hold'] !='0000-00-00')or $sttswo['tgl_release']<=$tanggal1){echo"hold"; } 
		else{echo"on progress";}
		}
		
		else{ echo"on progress";}
		
		?>
		</td>
		</tr>
		<?php }
//-----------------------------------modulllllll
		$sql_proj	= mysqli_query($koneksi,"SELECT * FROM `detail_project` where (tgl_m_kerja between '$tanggal1' and '$tanggal2' and username in($personil)) or (tgl_s_kerja between '$tanggal1' and '$tanggal2' and username in($personil))or tgl_s_kerja='0000-00-00' and username in($personil) group by objectid ");
							while($row_proj	= mysqli_fetch_array($sql_proj))
		{ 
		$objproj=$row_proj['objectid'];
		$proj=$row_proj['no_project'];
		$sql_stsproj	= mysqli_query($koneksi,"SELECT * FROM detail_project where objectid='$objproj'");
		$sttsproj= mysqli_fetch_array($sql_stsproj);
		
		$sql_cek	= mysqli_query($koneksi,"SELECT * FROM tbl_wo where no_wo='$proj'");
		$sttscek= mysqli_fetch_array($sql_cek);
		$woku=$sttscek['uraian_pekerjaan'];
		?>
	<tr><td><?php echo $NO++;?></td>
		<td><?php echo $woku;?></td>
		<td><?php echo $row_proj['soft_hard'];?></td>
		<td ><?php echo $row_proj['detail_pekerjaan']."(".$row_proj['group_project'].")"?></td>
		<td><?php echo $row_proj['username'];?></td>
		<td><?php echo $sttsproj['tgl_s_kerja'];?></td>
		<td><?php echo $row_proj['no_project'];?></td>
		<td>
	<?php
	 $sttsproj['tgl_s_kerja'] ;
		if($sttsproj['tgl_s_kerja'] <= $tanggal2 && $sttsproj['tgl_s_kerja']!='0000-00-00')
		{
			echo "finish";
		}else if($sttsproj['tgl_hold'] <= $tanggal2 && $sttsproj['tgl_s_kerja']=='0000-00-00'){ if(($sttsproj['tgl_release']=='0000-00-00' && $sttsproj['tgl_hold'] !='0000-00-00')or $sttsproj['tgl_release']<=$tanggal1){echo"hold"; } 
		else{echo"on progress";}
		}
		
		else{ echo"on progress";}
		
		?>
		</td>
		</tr>
		<?php }?>

    
 </tbody>
    </table><br>
<?php

   
    }    

    // increment untuk counter looping
    $i++;
}


while ($tanggal != $periode_akhir);  
// looping di atas akan terus dilakukan selama tanggal yang digenerate tidak sama dengan periode awal.

// tampilkan jumlah hari Minggu
// echo "<p>Jumlah hari minggu antara ".$periode_awal." s/d ".$periode_akhir." adalah: ".$sum."</p>";
?>	
    
    </form>

</div>
<?PHP } ?>