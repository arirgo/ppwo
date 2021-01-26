<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=nama_filenya.xls");

$getBulan = $_GET['bulan'];
$getTahun = $_GET['tahun'];

?>
<h3>Report Project Programer</h3>
<table border="1" cellpadding="5">
<thead>
	<th>No</th>								
	<th>Nomor PP/WO</th>
	<th>Keterangan</th>
	<th>Section</th>
	<th>Tgl Lapor</th>
	<th>Tgl Selesai</th>
	<th>Dikerjakan</th>
	<th>Status</th>
	<th>Jenis</th>
</thead>
<?php
	require_once("config.php");
				
	$sql	=	mysqli_query($koneksi,"select * from tbl_pp where tgl_s_kerja like '".$getTahun."-".$getBulan."%' and it='prog'");
	$no = 1;
	while($data	=	mysqli_fetch_array($sql)){
		echo '<tr>';
		echo '<td>'.$no.'</td>';
		echo '<td>'.$data['no_pp'].'</td>';
		echo '<td>'.$data['kerusakan'].'</td>';
		echo '<td>'.$data['section'].'</td>';
		echo '<td>'.$data['tgl_lapor'].'</td>';
		echo '<td>'.$data['tgl_s_kerja'].'</td>';
		echo '<td>'.$data['diterima'].'</td>';
		echo '<td>'.$data['status_pp'].'</td>';
		echo '<td>PP</td>';
		echo '</tr>';
		$no++;
	}
				
				
				
	$sql	=	mysqli_query($koneksi,"select * from tbl_wo where tgl_s_kerja like '".$getTahun."-".$getBulan."%' and it='prog'");
	$no = 1;
	while($data	=	mysqli_fetch_array($sql)){
		echo '<tr>';
		echo '<td>'.$no.'</td>';
		echo '<td>'.$data['no_wo'].'</td>';
		echo '<td>'.$data['uraian_pekerjaan'].'</td>';
		echo '<td>'.$data['section'].'</td>';
		echo '<td>'.$data['tgl_permohonan'].'</td>';
		echo '<td>'.$data['tgl_s_kerja'].'</td>';
		echo '<td>'.$data['diterima'].'</td>';
		echo '<td>'.$data['status_wo'].'</td>';
		echo '<td>WO</td>';
		echo '</tr>';
		$no++;
	}
?>
</table>
		