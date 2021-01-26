<?php
session_start();
$user = $_SESSION['username'];
$nowo			= $_GET['nowo'];
$status_wo		= "approved by IT";
$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');
$url			= "wo_h_it.php";
 //~ echo $user;
require_once('config.php');
$sqlu 	= mysqli_query($koneksi,"select nama from user where username='".$user."'");
$datau	= mysqli_fetch_array($sqlu);
$sqlp	= mysqli_query($koneksi,"select pemohon, section, uraian_pekerjaan from tbl_wo where no_wo='".$nowo."'");
$datap	= mysqli_fetch_array($sqlp);	
$perintah 		= 		"	tgl_diterima			='".$tanggal."',
							jam_diterima			='".$jam."',
							status_wo				='".$status_wo."',
							app_it					='".$datau['nama']."'";
						 
$syarat 	= " where no_wo='".$nowo."'";
$update 	= mysqli_query($koneksi,"update tbl_wo set ".$perintah." ".$syarat);
echo "<input type=hidden value='$url' id=url>";
	//email
					
					$from_mail = 'system@plasindo.loc';
					$to = 'it_ppwo@plasindo.loc';

					$subject = 'Pemberitahuan WO Section'." ".$datap['section']." Telah Di Setujui [NO-REPLY]";
					$message = 'Dengan hormat,<br>
								Berikut pemberitahuan WO baru yang telah disetujui Section Head IT dengan rincian :<br>
								<table>
									<tr>
										<td>Nomor WO</td>
										<td>:</td>
										<td>'.$nowo.'</td>
									</tr>
									<tr>
										<td>Pelapor</td>
										<td>:</td>
										<td>'.$datap['pemohon'].'</td>
									</tr>
									<tr>
										<td valign="top">Rincian</td>
										<td valign="top">:</td>
										<td><textarea rows="3" cols="35" style="border: none;">'.$datap['uraian_pekerjaan'].'</textarea></td>
									</tr>
								</table>
								
								<br>
								<br>
								Silahkan klik link berikut untuk mengambil :  <a href ="https://192.168.20.9/ppwo.php">https://192.168.20.9/ppwo</a>
								<br><br> Terima kasih,<br> PPWO IT';

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					$headers .= 'From: PPWO_Online <'.$from_mail.'>' . "\r\n";

					$sendtomail = mail($to, $subject, $message, $headers);
				
				?>

					<script type=text/javascript>
						var url = document.getElementById('url').value;
						window.location = url;
						
					</script>
		<?php 
		
		?>			
		

