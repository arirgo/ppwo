<?php 
session_start();
$pls=$_SESSION['pls'];
$nopp			= $_POST['txtnopp'];
$section		= $_POST['txtsection'];
$pelapor		= $_POST['txtpelapor'];
$permasalahan	= $_POST['txtpermasalahan'];
$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');
$status_pp		= "waiting";
$validasi		= $_POST['txtno'];
$url			= "form-pp.php";

$gabung			= "$nopp "."( "."$section"." ): "."$permasalahan";

//~ echo "".$nopp." ".$section." ".$pelapor." ".$permasalahan." ".$tanggal." ".$jam." ".$status_pp." ".$validasi." ".$url;

require_once('config.php');
$sqlv = mysqli_query($koneksi,"select * from tbl_pp where no = ".$validasi." AND tgl_lapor ='".$tanggal."'");
$val = mysqli_fetch_array($sqlv);

if ($validasi==$val['no']){
					echo "<input type=hidden value='$url' id=url>";
		?>
					<script type=text/javascript>
						var url = document.getElementById('url').value;
						alert("Nomor PP Sudah ada....");
						window.location = url;
						
					</script>
				<?php
	}else{
						$sqlx = mysqli_query($koneksi,"SELECT max(no) as noac from tbl_pp where year(tgl_lapor)=year(CURDATE()) and month(tgl_lapor)=month(CURDATE())");
						$data = mysqli_fetch_array($sqlx);
						$no = strval($data['noac']);
						//echo $no;
							if ($no==''){
									$no= strval($data['noac'])+1;
								
								}else{
									$no= strval($data['noac'])+1;
								
								}
								
						$sqly 	= mysqli_query($koneksi,"SELECT max(no_a) as noan from tbl_pp where day(tgl_lapor)=day(CURDATE()) and year(tgl_lapor)=year(CURDATE()) and month(tgl_lapor)=month(CURDATE())");
						$data2 	= mysqli_fetch_array($sqly);
						$antri 	= intval($data2['noan']);
								if (($antri>=0)&&($antri<=8)){
										$antri 	= $antri+1;
										$no_antri = "IT-00".$antri."/PP/".date('m/y');
									}else if (($antri>=9)&&($antri<=98)){
									$antri 	= $antri+1;
										$no_antri = "IT-0".$antri."/PP/".date('m/y');
								}else if (($antri>=99)&&($antri<=998)){
									$antri 	= $antri+1;
									$no_antri = "IT-".$antri."/PP/".date('m/y');
								}						
/*echo $nopp."+".$section."+".$pelapor."+".$permasalahan."+".$tanggal."+".$jam."<br>";
echo $no."<br>";
echo $antri."<br>";
echo $status_pp;*/
		$perintah	=  	"no					  		='".$no."',
						 no_pp		  				='".$nopp."',
						 no_a		  				='".$antri."',
						 no_antri	  				='".$no_antri."',
						 tgl_lapor  				='".$tanggal."',
						 jam_lapor  				='".$jam."',
						 section 	 				='".$section."',
						 pelapor  					='".$pelapor."',
						 kerusakan 					='".$permasalahan."',
						 tgl_terima  				='',
						 jam_terima  				='',
						 diterima  					='',
						 tgl_m_kerja				='',
						 jam_m_kerja				='',
						 tgl_hold					='',
						 jam_hold					='',
						 status_hold				='',
 						 tgl_release				='',
						 jam_release				='',
						 tgl_s_kerja				='',
						 jam_s_kerja				='',
						 status_pp					='waiting',
						 diketahui_sh  				='',
						 diperiksa  				='',
						 dikerjakan					=''";
					
					
					$apiToken = "515348582:AAGlnbLygaT16IRPuofh-Maz7ZI563Zz5VU";

					$data = [
							'chat_id' => '148975893',
							'text' => $gabung
					
														];

					$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
					// Do what you want with result
									
					
					
					$simpan = mysqli_query($koneksi,"insert into tbl_pp set ".$perintah);
					echo "<input type=hidden value='$url' id=url>";	
					
					//require_once('config3.php');
					//$perintah2	=  	"
					//	 no_ppwo		  				='".$nopp."',
					//	 flag				='non',
					//	 tgl  				='".$tanggal."'
					//	 ";
					//$simpan2 = mysqli_query($koneksi,"insert into tbl_ppwo set ".$perintah2);
					
						//email
					
					$from_mail = 'system@plasindo.loc';
					//$to = 'it_ppwo@plasindo.loc';

					$subject = 'Pemberitahuan PP Baru dari Section'." ".$section." [NO-REPLY]";
					$message = 'Dengan hormat,<br>
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
										<td>'.$pelapor.'</td>
									</tr>
									<tr>
										<td valign="top">Rincian</td>
										<td valign="top">:</td>
										<td><textarea rows="3" cols="35" style="border: none;">'.$permasalahan.'</textarea></td>
									</tr>
								</table>
								
								<br>
								<br>
								Silahkan klik link berikut untuk mengambil :  <a href ="https://192.168.20.9/ppwo">https://192.168.20.9/ppwo</a>
								<br><br> Terima kasih,<br> PPWO IT';

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					$headers .= 'From: PPWO_Online <'.$from_mail.'>' . "\r\n";

					$sendtomail = mail($to, $subject, $message, $headers);
				
				//email	
					$from_mail = 'system@plasindo.loc';
					//$to = 'maman.nurohman@plasindo.loc';

					$subject = 'Pemberitahuan PP Baru dari Section'." ".$section." [NO-REPLY]";
					$message = 'Dengan hormat,<br>
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
										<td>'.$pelapor.'</td>
									</tr>
									<tr>
										<td valign="top">Rincian</td>
										<td valign="top">:</td>
										<td><textarea rows="3" cols="35" style="border: none;">'.$permasalahan.'</textarea></td>
									</tr>
								</table>
								
								<br>
								<br><br> Terima kasih,<br> PPWO IT';

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					$headers .= 'From: PPWO_Online <'.$from_mail.'>' . "\r\n";

					$sendtomail = mail($to, $subject, $message, $headers);
					

					
						?>
							<script type=text/javascript>
								var url = document.getElementById('url').value;
								alert("PP berhasil dikirim\nNomor tiket Anda adalah : <?php echo"".$no_antri.""; ?>");
								window.location = url;
							</script>
						<?php



	}						
?>

