<?php
$nopp	=	$_POST['txtnopp'];
$reason	=	$_POST['txtalasan'];
$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');
require_once("config.php");
$perintah	=	"	tgl_reject 		='".$tanggal."',
					jam_reject	 	='".$jam."',
					keterangan 		='".$reason."',
					status_pp		='reject by IT'";
					
$syarat 	= " where no_pp='".$nopp."'";
$update 	= mysqli_query($koneksi,"update tbl_pp set ".$perintah." ".$syarat);
//email
$syn = mysqli_query($koneksi,"select pelapor from tbl_pp where no_pp ='".$nopp."'");
$akun = mysqli_fetch_array($syn);
$namapl = $akun['pelapor'];
$syn2 = mysqli_query($koneksi,"select email from user where nama ='".$namapl."'");
$date = mysqli_fetch_array($syn2);
					
					$from_mail = 'system@plasindo.loc';
					$to = $date['email'];

					$subject = 'Pemberitahuan PP dari IT [NO-REPLY]';
					$message = 'Dengan hormat,<br>
								Berikut pemberitahuan PP telah di reject dengan rincian :<br>
								<table>
									<tr>
										<td>Nomor PP</td>
										<td>:</td>
										<td>'.$nopp.'</td>
									</tr>
									<tr>
										<td valign="top">Alasan Reject</td>
										<td valign="top">:</td>
										<td><textarea rows="3" cols="35" style="border: none;">'.$reason.'</textarea></td>
									</tr>
								</table>
								<br><br> Terima kasih,<br> PPWO IT';

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					$headers .= 'From: PPWO_Online <'.$from_mail.'>' . "\r\n";

					$sendtomail = mail($to, $subject, $message, $headers);
				
				//email	
	?>	
	<script type=text/javascript>
	
	window.close();
	opener.location.reload(true);
	</script>
<?php
?>
  
