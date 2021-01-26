
<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=NILAI_PPWO_IT.xls");
date_default_timezone_set("Asia/Jakarta");


$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];

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
<br>
<h3>NILAI PERMINTAAN PERBAIKAN DAN WORK ORDER IT</h3>
<h5>Periode : <?php echo $tgl1?> s/d <?php echo $tgl2;?></h5>
<br>
<table class="table-data" data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
							
 <tr class="table-data">
		<th data-sortable="true">No.</th>
		<th  data-sortable="true">Nomor PP</th>
		<th>Pekerjaan</th>
		<th  data-sortable="true">Tgl Mulai</th>
		<th  data-sortable="true">Action</th>
		<th  data-sortable="true">Downtime</th>
		<th  data-sortable="true">%</th>
		<th  data-sortable="true">Nilai</th>
</tr>
							
</thead>
<tbody>
   <?php 
   $no=1;
    require_once("config.php"); 
	$view	= mysqli_query($koneksi,"select * from tbl_pp where status_pp in('finish','complete') AND tgl_s_kerja between '$tgl1' and '$tgl2' and tgl_s_kerja>'2020-6-25'");
                           while ($datapp	= mysqli_fetch_array($view))
                           {
	   $nopp		=$datapp['no_pp'];   
	   $diterima_pp	=$datapp['diterima'];  
	   $ceknilai	= mysqli_query($koneksi,"select * from nilai_pp where username='$diterima_pp' and no_pp='$nopp'");
	   $datanilai	= mysqli_fetch_array($ceknilai);					
				
		
		?>
  
		<tr><td> <?php echo $no++; ?> </td>
		<td> <?php echo $datapp['no_pp']; ?> </td>
		<td> <?php echo $datapp['kerusakan']; ?> </td>
		<!-- <td> <?php echo $datapp['diterima']; ?> </td> -->
		<td> <?php echo $datapp['tgl_m_kerja']; ?> </td>
		<td> <?php echo $datapp['status_pp']; ?> </td>
		<td> <?php echo $datapp['downtime']; ?> </td>
		<td><?php 
			$ttldown	=strval($datapp['downtime']/60);
			$que 		= mysqli_query($koneksi,"SELECT count(nama_komputer) as jmlpc from master_komputer");
			$datq 		= mysqli_fetch_array($que);
			$ttlpc	 	= $datq['jmlpc'];
			$ttlhrpc 	= $ttlpc * 720;
			$pdt =	strval(($ttldown / $ttlhrpc)*100);
			echo	"".number_format($pdt,2)." %";
			?> 	
		</td>
		<td> <?php if($datanilai['nilai_pp']==''){    ?>  
			BELUM </td>
		<?php } else{ echo $datanilai['nilai_pp'];}?>
</td>
</tr>

		<?php
						}?>
                            </tbody>
							</table>

			
		<br><br>		
<table class="table-data" data-toggle="table"  id="example2"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc" >
<thead>						
	<tr class="table-data">
		<th data-sortable="true">No.</th>
		<th  data-sortable="true">Nomor WO</th>
		<!-- <th  data-sortable="true">Pemohon</th> -->
		<th  data-sortable="true" >pekerjaan</th>
		<th  data-sortable="true" >Awal pekerjaan</th>
		<th  data-sortable="true">Planing/Hari</th>
		<th  data-sortable="true">Planing Selesai</th>
        <th  data-sortable="true">Status</th>
		<th  data-sortable="true">Aktual</th>
		<th  data-sortable="true">Losetime</th>
		<th  data-sortable="true">Analisi</th>
		<th  data-sortable="true">Programing</th>
		<th  data-sortable="true">Dokumentasi</th>
		<th  data-sortable="true">Point</th>	
		<th  data-sortable="true">IT</th>
	

		
</thead>

<tbody>
<?php 
   $no=1;
    require_once("config.php"); 
	$view	= mysqli_query($koneksi,"select * from tbl_wo where status_wo in('finish') AND tgl_s_kerja between '$tgl1' and '$tgl2' and tgl_s_kerja >'2020-6-25'");
                           while ($datawo	= mysqli_fetch_array($view))
                           {
	$diterima_wo=$datawo['diterima'];
	$nowo		=$datawo['no_wo'];
	
								   
	$ceknilai	= mysqli_query($koneksi,"select * from nilai_wo where username='$diterima_wo' and no_wo='$nowo'");
	$datanilai	= mysqli_fetch_array($ceknilai);						 
							 ?>
	<tr><td> <?php echo $no; ?> </td>
	<td> <?php echo $datawo['no_wo']; ?> </a></td>
	<td> <?php echo $datawo['uraian_pekerjaan']; ?> </td>
	<td> <?php echo $datawo['tgl_m_kerja']; ?> </td>
	<td> 
		<?php $plan=mysqli_query($koneksi,"select sum(waktu) as hari from  detail_project where no_project='$nowo'");
			  $planing=mysqli_fetch_array($plan);
			  if($planing==''){echo "0";}else{
			  echo $cekplan=$planing['hari'];}
		?>
	</td>
	<td >
				<?php 
				$mulai=$datawo['tgl_m_kerja'];
				echo "<i style='color:#FFA500;'>".$kemarin = date('Y-m-d', strtotime("+$cekplan day", strtotime(date($mulai))))."</i>"; ?>
	</td>
	<td> <?php echo $datawo['status_wo']; ?> </td>
	<td><i style='color:green;' > <?php echo $datawo['tgl_s_kerja']; ?></i> </td>
	<td ><i style="color:red;" > <?php $mulai=$datawo['tgl_m_kerja'];
			   $selesai=$datawo['tgl_s_kerja'];
			  if($selesai !="0000-00-00") {	
				$total=((abs(strtotime ($mulai) - strtotime ($selesai)))/(60*60*24)); 
				$totallose=$cekplan-$total;
				if($totallose>0)
				{
					echo "+".$totallose;
				}
				else{
					echo round($totallose,1);
				}
			}else{ echo "on process";}	?> 
		</i> 
	</td>

	<td><?php echo $datanilai['analisis'];?></td>
	<td><?php echo $datanilai['programing'];?></td>
	<td><?php echo $datanilai['dokumentasi'];?></td>
	<td><?php echo $datanilai['point'];?></td>
	<td colspan>
				<?php	 if($datawo['it']=='infra'){echo "Infrastruktur";}else if($datawo['it']=='prog'){echo "Programmer";}else{}
					?>
	</td>
		
		</tr> 
		
		
	<?php	$no++;}?>
		
</table>
</body>