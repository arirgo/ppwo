<?php
session_start();
	date_default_timezone_set("Asia/Jakarta");
$user = $_SESSION['username'];
$pls=$_SESSION['pls'];
$nopp			= $_GET['nopp'];
$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');
$status_pp		= "waiting";
$url			= "form-pp.php";
 //~ echo $user;
require_once('config.php');
$sqlb	=	mysqli_query($koneksi,"select * from tbl_pp where no_pp='".$nopp."'");
$data	=	mysqli_fetch_array($sqlb);
$pelapor=$data['pelapor'];
$sqlr	=	mysqli_query($koneksi,"select * from user where section='".$data['section']."' and level_user='sh'");
$datar	= 	mysqli_fetch_array($sqlr);

	function datediff($tgl1, $tgl2){
	$tgl1 		= strtotime($tgl1);

	$tgl2 		= strtotime($tgl2);
	$diff_secs 	= abs($tgl1 - $tgl2);
	$base_year 	= min(date("Y", $tgl1), date("Y", $tgl2));
	$diff 		= mktime(0, 0, $diff_secs, 1, 1, $base_year);
	return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
	}
	//fungsi itung berapa menit saat hold
	function datediff2($tgl3, $tgl4){


	$tgl3 		= strtotime($tgl3);
	$tgl4 		= strtotime($tgl4);
	$diff_secs 	= abs($tgl3 - $tgl4);
	$base_year 	= min(date("Y", $tgl3), date("Y", $tgl4));
	$diff		= mktime(0, 0, $diff_secs, 1, 1, $base_year);
	return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
	}
	//perubahan perhitungan downtime ppwo 04/03/2018
$tgl1 = $data['tgl_m_kerja'].' '.$data['jam_m_kerja'];
 $tgl2 = $tanggal.' '.$jam;

	$tgl3 = $data['tgl_hold'].' '.$data['jam_hold'];
	$tgl4 = $data['tgl_release'].' '.$data['jam_release'];
	//~ $tgl2 = '2017-02-24 04:00';
	$a 	= datediff($tgl1, $tgl2);
	$a2 = datediff2($tgl3, $tgl4);
	$b = $a['hours'].':'.$a['minutes'].':'.$a['seconds'];

	$c = $a['hours'];

	$menit_dt = strval(($a['days'] * 1440) + ($a['hours'] * 60)) + $a['minutes'];

	$menit_hl = strval(($a2['days'] * 1440) + ($a2['hours'] * 60)) + $a2['minutes'];

	$menit	= ($menit_dt-$menit_hl);
	//~ echo $menit." ".$menit_dt." ".$menit_hl;
	
$sqlw = mysqli_query($koneksi,"select * from user where username='".$user."'");
$isi  = mysqli_fetch_array($sqlw);
$nama  = $isi['nama'];
$perintah 		= 		"tgl_s_kerja  				='".$tanggal."',
						 jam_s_kerja  				='".$jam."',
						 status_pp  				='finish',
						 diperiksa					='".$pelapor."',
						 downtime					=".$menit."";
						 
$syarat 	= " where no_pp='".$nopp."'";
$update 	= mysqli_query($koneksi,"update tbl_pp set ".$perintah." ".$syarat);
echo "<input type=hidden value='$url' id=url>";
				//email
					$from_mail = 'system@plasindo.loc';
					$to = $datar['email'];

					$subject = 'Pemberitahuan PP Selesai Section'." ".$datar['section']." [NO-REPLY]";
					$message = 'Dengan hormat,<br>
								Berikut pemberitahuan PP yang telah selesai dengan rincian :<br>
								<table>
									<tr>
										<td>Nomor PP</td>
										<td>:</td>
										<td>'.$nopp.'</td>
									</tr>
									<tr>
										<td>Pelapor</td>
										<td>:</td>
										<td>'.$data['pelapor'].'</td>
									</tr>
									<tr>
										<td valign="top">Rincian</td>
										<td valign="top">:</td>
										<td><textarea rows="3" cols="35" style="border: none;">'.$data['kerusakan'].'</textarea></td>
									</tr>
								</table>
								
								<br>
								Telah selesai ditangani oleh teknisi IT<br>
								Silahkan klik link berikut untuk approve :  <a href ="https://192.168.20.9/ppwo/login.php?id=app">APPROVE</a>
								<br><br> Terima kasih,<br> PPWO IT';

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					$headers .= 'From: PPWO_Online <'.$from_mail.'>' . "\r\n";

					$sendtomail = mail($to, $subject, $message, $headers);
				
				//email	
				
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
					$from_mail1 = 'system@plasindo.loc';
					$to1 = 'maman.nurohman@plasindo.loc';

					$subject1 = 'Pemberitahuan PP Selesai dari Section'." ".$datar['section']." [NO-REPLY]";
					$message1 = 'Dengan hormat,<br>
								Berikut pemberitahuan PP baru dengan rincian :<br>
								<table>
									<tr>
										<td>Nomor PP</td>
										<td>:</td>
										<td>'.$nopp.'</td>
									</tr>
									<tr>
										<td>Pelapor</td>
										<td>:</td>
										<td>'.$data['pelapor'].'</td>
									</tr>
									<tr>
										<td valign="top">Rincian</td>
										<td valign="top">:</td>
										<td><textarea rows="3" cols="35" style="border: none;">'.$data['kerusakan'].'</textarea></td>
									</tr>
								</table>
								
								<br>
								<br>
								Telah selesai ditangani oleh teknisi IT : '.$data['dikerjakan'].'<br>
								<br><br> Terima kasih,<br> PPWO IT';

					$headers1  = 'MIME-Version: 1.0' . "\r\n";
					$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					$headers1 .= 'From: PPWO_Online <'.$from_mail1.'>' . "\r\n";

					$sendtomail1 = mail($to1, $subject1, $message1, $headers1);
				}
			?>

					<script type=text/javascript>
						var url = document.getElementById('url').value;
						alert("PP dengan nomor <?php echo"".$nopp.""; ?> telah selesai");
						window.location = url;
						
					</script>
		<?php 
		

		?>			
