<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=modul_pp.xls");

$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];
$it    = $_GET['it'];
if($it=="all")
				{
                    
					$itku="user.dev in ('pro','inf')";
				}else if($it=='inf' or $it=='pro'){
                    
                    $itku="user.dev ='".$it."'";
				}else{
                  $itku="user.nama='".$it."'";
                }
?>
<center>
<h3>DATA LAPORAN MODUL ( <?php  if($it=="all"){ echo "IT";}else if($it=="pro"){echo "PROGRAMMER";}else if($it=="inf"){echo "INFRASTRUKTUR";}else{ echo $it;}?> )</h3>
    </center>
	<i>
<h5>Dari tanggal: <?php echo $tgl1;?> S/D <?php echo $tgl2;?></h5>	</i>
<table border="1" cellpadding="5" width="100%">
  <tr align="center" style="color:orange;background:grey;">
	<th>No</th>								
   
    <th>Modul</th>
	 <th>Aplikasi / Project</th>
    <th>PIC</th>
	<th>Tgl Mulai</th>
	<th>Tgl Selesai</th>
	<th>Status</th>
	 <th>No PP/WO</th>
    <th>Jenis</th>
				
  </tr>
  <?php
  // Load file koneksi.php
  include "config.php";
  
                $sql	=	mysqli_query($koneksi," select modul_pp.*,user.* from modul_pp inner join user on modul_pp.dikerjakan=user.nama where user.aktif=1 and ".$itku." and modul_pp.tgl_mulai between '".$tgl1."' and '".$tgl2."' order by modul_pp.tgl_mulai");
               
                 $no = 1;
				while($data	=	mysqli_fetch_array($sql)){
					// $tgl1 = $data['tgl_lapor'].' '.$data['jam_lapor'];
					// $tgl2 = $data['tgl_terima'].' '.$data['jam_terima'];
					// $a 	= datediff($tgl1, $tgl2);
					// $dt_take = strval(($a['days'] * 1440) + ($a['hours'] * 60)) + $a['minutes'];
					echo '<tr>';
					echo '<td>'.$no.'</td>';
						
                    echo '<td>'.$data['nama_modulpp'].'</td>';
                    echo '<td>'.$data['softhard'].'</td>';
                    echo '<td>'.$data['dikerjakan'].'</td>';
					echo '<td>'.$data['tgl_mulai'].'</td>';
					echo '<td>'.$data['tgl_selesai'].'</td>';
					echo '<td>'.$data['status'].'</td>';
					?>
						<td><?php echo $data['no_pp']; ?></td>
                        <?php
                    echo '<td>'.$data['jenis'].'</td>';
					echo '</tr>';
					$no++;
					}
                     
                    $sqlwo	=	mysqli_query($koneksi," select detail_project.*,user.* from detail_project inner join user on detail_project.username=user.nama where user.aktif=1 and ".$itku." and detail_project.tgl_m_kerja between '".$tgl1."' and '".$tgl2."' order by detail_project.tgl_m_kerja ");
               
              
				while($datawo	=	mysqli_fetch_array($sqlwo)){
					// $tgl1 = $data['tgl_lapor'].' '.$data['jam_lapor'];
					// $tgl2 = $data['tgl_terima'].' '.$data['jam_terima'];
					// $a 	= datediff($tgl1, $tgl2);
					// $dt_take = strval(($a['days'] * 1440) + ($a['hours'] * 60)) + $a['minutes'];
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					
                    echo '<td>'.$datawo['detail_pekerjaan'].'</td>';
                    echo '<td>'.$datawo['soft_hard'].'</td>';
                    echo '<td>'.$datawo['nama'].'</td>';
					echo '<td>'.$datawo['tgl_m_kerja'].'</td>';
					echo '<td>'.$datawo['tgl_s_kerja'].'</td>';
					echo '<td>'.$datawo['status'].'</td>';
						?>
						<td><?php echo $datawo['no_project']; ?></td>
                        <?php
                        
                    echo '<td>Development</td>';
				
				
					echo '</tr>';
					$no++;
                    }
                    
  ?>
</table>