<?php
			$from_mail = 'system@plasindo.loc';
					$to = 'pratama@plasindo.loc';

					$subject = "Pemberitahuan WO Baru dari Section";
					$message = 'Dengan hormat,<br>
								Berikut pemberitahuan WO baru yang telah disetujui SH dengan rincian :<br>
								<table>
									<tr>
										<td>Nomor WO</td>
										<td>:</td>
										<td></td>
									</tr>
									<tr>
										<td>Pelapor</td>
										<td>:</td>
										<td></td>
									</tr>
									<tr>
										<td valign="top">Rincian</td>
										<td valign="top">:</td>
										<td><textarea rows="3" cols="35" style="border: none;"></textarea></td>
									</tr>
								</table>
								
								<br>
								<br>
								Silahkan klik link berikut :  <a href ="https://192.168.20.9/ppwo.php">https://192.168.20.9/ppwo.php</a>
								<br><br> Terima kasih,<br> PPWO IT';

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					$headers .= 'From: PPWO_Online <'.$from_mail.'>' . "\r\n";

					$sendtomail = mail($to, $subject, $message, $headers);
?>