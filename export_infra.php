<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=nama_filenya.xls");

$getTahun = $_GET['tahun'];
$getBulan = $_GET['bulan'];
// echo $getBulan."-".$getTahun;
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
    <th>DownTime</th>
    <th>DownTime Take</th>
    <th>Status</th>
    <th>Keterangan Status</th>
    <th>Problem</th>
    <th>Penyelesaian</th>
  </tr>
  <?php
  // Load file koneksi.php
  include "config.php";
  function datediff($tgl1, $tgl2){
          $tgl1 = strtotime($tgl1);
          $tgl2 = strtotime($tgl2);
          $diff_secs = abs($tgl1 - $tgl2);
          $base_year = min(date("Y", $tgl1), date("Y", $tgl2));
          $diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
          return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
        }

  // Buat query untuk menampilkan semua data siswa
  //$sql = mysql_query("SELECT * FROM view_infra");
  $sql = mysql_query("select * from view_infra where tgl_lapor like '$getTahun-$getBulan%' order by tgl_lapor DESC");
   // Eksekusi querynya
  
  $no = 1; // Untuk penomoran tabel, di awal set dengan 1
  while($data = mysql_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    $tgl1 = $data['tgl_lapor'].' '.$data['jam_lapor'];
          $tgl2 = $data['tgl_terima'].' '.$data['jam_terima'];
          $a  = datediff($tgl1, $tgl2);
          $dt_take = strval(($a['days'] * 1440) + ($a['hours'] * 60)) + $a['minutes'];
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
    echo "<td>".$dt_take."</td>";
    echo "<td>".$data['status_pp']."</td>";
    echo "<td>".$data['status_hold']."</td>";
    echo "<td>".$data['kerusakan']."</td>";
    echo "<td>".$data['keterangan']."</td>";

    echo "</tr>";
    
    $no++; // Tambah 1 setiap kali looping
  }
  ?>
</table>