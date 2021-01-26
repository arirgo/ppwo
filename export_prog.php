<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=nama_filenya.xls");

$getBulan = $_GET['bulan'];
$getTahun = $_GET['tahun'];

?>
<h3>Data Laporan Infrastruktur</h3>
    
<table border="1" cellpadding="5">
  <tr>
    <th>No</th>
    <th>No PP</th>
    <th>Section</th>
    <th>Tgl Lapor</th>
    <th>Tgl Start</th>
    <th>Jam Start</th>
    <th>Tgl Finish</th>
    <th>Jam Finish</th>
    <th>Dikerjakan</th>
    <th>Down Time</th>
    <th>Status</th>
    <th>Keterangan Status</th>
    <th>Problem</th>
    <th>Penyelesaian</th>
  </tr>
  <?php
  // Load file koneksi.php
  include "config.php";
  
  // Buat query untuk menampilkan semua data siswa
  //$sql = mysqli_query($koneksi,"SELECT * FROM view_infra");
  $sql = mysqli_query($koneksi,"select * from view_prog where tgl_lapor like '".$getTahun."-".$getBulan."%' order by tgl_lapor DESC");
   // Eksekusi querynya
  
  $no = 1; // Untuk penomoran tabel, di awal set dengan 1
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$no."</td>";
    echo "<td>".$data['no_pp']."</td>";
    echo "<td>".$data['section']."</td>";
    echo "<td>".$data['tgl_lapor']."</td>";
    echo "<td>".$data['tgl_m_kerja']."</td>";
    echo "<td>".$data['jam_m_kerja']."</td>";
    echo "<td>".$data['tgl_s_kerja']."</td>";
    echo "<td>".$data['jam_s_kerja']."</td>";
    echo "<td>".$data['diterima']."</td>";
    echo "<td>".$data['downtime']."</td>";
    echo "<td>".$data['status_pp']."</td>";
    echo "<td>".$data['status_hold']."</td>";
    echo "<td>".$data['kerusakan']."</td>";
    echo "<td>".$data['keterangan']."</td>";

    echo "</tr>";
    
    $no++; // Tambah 1 setiap kali looping
  }
  ?>
</table>