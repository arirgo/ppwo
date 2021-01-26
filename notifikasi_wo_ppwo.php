<?php

$koneksi= mysql_connect ("192.168.20.9","robby","plasindo123") or die ("Gagal Konek Database".mysqli_error());
mysql_select_db ("ppwo_it",$koneksi);
	
	$sql = mysqli_query($koneksi,"select count(no_wo) as no from notif_wo_sh");
	$data = mysqli_fetch_array($sql);
	$jum = $data['no'];
	echo $jum;
	if($jum == '0'){
		?>
			<SCRIPT type="text/javascript" language = "Javascript">
				self.close();
			</SCRIPT>
		<?php
	}else{

		$sql3 = mysqli_query($koneksi,"select * from notif_wo_sh");
		while($data3 = mysqli_fetch_array($sql3)){
	//email
		$from_mail = 'system@plasindo.loc';
		$to = 'it_ppwo@plasindo.loc';
		$subject = 'Pemberitahuan WO Baru Section'." ".$data3['section']." [NO-REPLY]";
		$message = 'Dengan hormat,<br>
		Berikut pemberitahuan Work Order baru yang telah di approve Section Head dengan rincian :<br>
		<table>
		<tr>
		<td>Nomor WO</td>
		<td>:</td>
		<td>'.$data3['no_wo'].'</td>
		</tr>
		<tr>
		<td>Pelapor</td>
		<td>:</td>
		<td>'.$data3['pemohon'].'</td>
		</tr>
		<tr>
		<td valign="top">Rincian</td>
		<td valign="top">:</td>
		<td><textarea rows="3" cols="35" style="border: none;">'.$data3['uraian_pekerjaan'].'</textarea></td>
		</tr>
		</table>
		<br>
		<br>
		Silahkan klik link berikut untuk ACCEPT :  <a href ="http://192.168.20.9/ppwo">http://192.168.20.9/ppwo</a>
		<br><br> Terima kasih,<br> PPWO IT';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: PPWO_Online <'.$from_mail.'>' . "\r\n";
		$sendtomail = mail($to, $subject, $message, $headers);
	//email
		echo $data3['pemohon']." ".$data3['section'];
		mysqli_query($koneksi,"DELETE FROM notif_wo_sh WHERE no_wo = '".$data3['no_wo']."'");
		}
		?>
			<SCRIPT type="text/javascript" language = "Javascript">
				self.close();
			</SCRIPT>
		<?php
	}

 mysql_close();

?>
