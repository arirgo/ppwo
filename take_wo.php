<?php
session_start();
$pls=$_SESSION['pls'];
$user = $_SESSION['username'];
$nowo	=$_POST['txttake'];
$nama 	=$_POST['txtadmin'];

//~ echo $nopp;
//~ echo $nama;
date_default_timezone_set('Asia/Jakarta');
$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');
$url			= "menu_take_wo.php";

require_once('config.php');


$sqlx 		= mysqli_query($koneksi,"select pemohon, section, uraian_pekerjaan from tbl_wo where no_wo ='".$nowo."'");
$data1		= mysqli_fetch_array($sqlx);

$perintah	=  			"tgl_diterima  				='".$tanggal."',
						 jam_diterima  				='".$jam."',
						 diterima  					='".$nama."',
						 status_wo					='accepted by IT'";

$syarat 	= " where no_wo='".$nowo."'";
$update 	= mysqli_query($koneksi,"update tbl_wo set ".$perintah." ".$syarat);
echo "<input type=hidden value='$url' id=url>";
//email
if($pls=='ho')
{
	$from_mail1 = 'system@plasindo.loc';
					$to1 = 'ari.mujianto@plasindo.loc';

					$subject1 = 'Pemberitahuan WO Selesai Section'." ".$dataf['section']." [NO-REPLY]";
					$message1 = 'Dengan hormat,<br>
								Berikut pemberitahuan WO yang telah selesai dengan rincian :<br>
								<table>
									<tr>
										<td>Nomor WO</td>
										<td>:</td>
										<td>'.$nowo.'</td>
									</tr>
									<tr>
										<td>Pemohon</td>
										<td>:</td>
										<td>'.$data1['pemohon'].'</td>
									</tr>
									<tr>
										<td valign="top">Rincian</td>
										<td valign="top">:</td>
										<td><textarea rows="3" cols="35" style="border: none;">'.$data1['uraian_pekerjaan'].'</textarea></td>
									</tr>
									<tr>
										<td valign="top">Keterangan</td>
										<td valign="top">:</td>
										<td><textarea rows="3" cols="35" style="border: none;">'.$keterangan.'</textarea></td>
									</tr>
									<tr>
										<td valign="top">Dikerjakan</td>
										<td valign="top">:</td>
										<td><textarea rows="3" cols="35" style="border: none;">'.$data1['diterima'].'</textarea></td>
									</tr>
								</table>
								
								<br><br> Terima kasih,<br> PPWO IT';

					$headers1  = 'MIME-Version: 1.0' . "\r\n";
					$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					$headers1 .= 'From: PPWO_Online <'.$from_mail1.'>' . "\r\n";

					$sendtomail1 = mail($to1, $subject1, $message1, $headers1);
			
}else{
					$from_mail = 'system@plasindo.loc';
					$to = 'maman.nurohman@plasindo.loc';

					$subject = 'Pemberitahuan WO Baru dari Section'." ".$data1['section']." [NO-REPLY]";
					$message = 'Dengan hormat,<br>
								Berikut pemberitahuan WO baru dengan rincian :<br>
								<table>
									<tr>
										<td>Nomor WO</td>
										<td>:</td>
										<td>'.$nowo.'</td>
									</tr>
									<tr>
										<td>Pemohon</td>
										<td>:</td>
										<td>'.$data1['pemohon'].'</td>
									</tr>
									<tr>
										<td valign="top">Rincian</td>
										<td valign="top">:</td>
										<td><textarea rows="5" cols="45" style="border: none;">'.$data1['uraian_pekerjaan'].'</textarea></td>
									</tr>
								</table>
								
								<br>
								Telah disetujui oleh Section Head/Sub Section Head dan telah diperiksa oleh teknisi '.$nama.'.<br>
								Silahkan klik link :  <a href ="https://192.168.20.9/ppwo/login.php?id=apphit">https://192.168.20.9/ppwo/login.php?id=apphit</a>
								<br> Terima kasih,<br> PPWO IT';

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					$headers .= 'From: PPWO_Online <'.$from_mail.'>' . "\r\n";

					$sendtomail = mail($to, $subject, $message, $headers);
				
				//email	

}
				?>

					<script type=text/javascript>
						var url = document.getElementById('url').value;
					//	alert("Anda telah menerima WO Nomor <?php echo"".$nowo.""; ?>");
						window.location = url;
						
					</script>
				<?php

?>
