<?php
session_start();
$pls=$_SESSION['pls'];
$user = $_SESSION['username'];
$nowo	=$_POST['txtnowo'];
$keterangan 	=$_POST['txtketerangan'];

//~ echo $nopp;
//~ echo $nama;
date_default_timezone_set("Asia/Jakarta");
$tanggal		= date('Y-m-d');
$jam			= date('H:i');
$url			= "menu_process_wo.php";

require_once('config.php');
$sqlb	=	mysqli_query($koneksi,"select * from tbl_wo where no_wo='".$nowo."'");
$data	=	mysqli_fetch_array($sqlb);


	function datediff($tgl1, $tgl2){
	$tgl1 = strtotime($tgl1);
	$tgl2 = strtotime($tgl2);
	$diff_secs = abs($tgl1 - $tgl2);
	$base_year = min(date("Y", $tgl1), date("Y", $tgl2));
	$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
	return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
	}
	//fungsi itung berapa menit saat hold
	function datediff2($tgl3, $tgl4){
	$tgl3 = strtotime($tgl3);
	$tgl4 = strtotime($tgl4);
	$diff_secs = abs($tgl3 - $tgl4);
	$base_year = min(date("Y", $tgl3), date("Y", $tgl4));
	$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
	return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
	}

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


//simpan nilai wo
$n_m=$_SESSION['nama'];
$perintah_nilai	=  	"
                         username		  ='".$n_m."',
                         no_wo		      ='".$nowo."'
                         
                         ";
    $simpan_nilai = mysqli_query($koneksi,"insert into nilai_wo set".$perintah_nilai);  
//simpan nilai wo


$sqlx 		= mysqli_query($koneksi,"select * from tbl_wo where no_wo ='".$nowo."'");
$data1		= mysqli_fetch_array($sqlx);

$perintah	=  			"	tgl_s_kerja					='".$tanggal."',
							jam_s_kerja					='".$jam."',
							keterangan					='".$keterangan."',
							status_wo					='finish'";

$syarat 	= " where no_wo='".$nowo."'";
$update 	= mysqli_query($koneksi,"update tbl_wo set ".$perintah." ".$syarat);
echo "<input type=hidden value='$url' id=url>";
$sqlf = mysqli_query($koneksi,"select * from user where nama='".$data['pemohon']."'");
$dataf  = mysqli_fetch_array($sqlf);
//email
					$from_mail = 'system@plasindo.loc';
					$to = $dataf['email'];

					$subject = 'Pemberitahuan WO Selesai Section'." ".$dataf['section']." [NO-REPLY]";
					$message = 'Dengan hormat,<br>
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

				}


				?>

					<script type=text/javascript>
						var url = document.getElementById('url').value;
					//	alert("WO Nomor <?php echo"".$nowo.""; ?> Selesai");
						window.location = url;
						
					</script>
				<?php

?>
