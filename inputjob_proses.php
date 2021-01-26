
<?php
session_start();

$pls=$_SESSION['pls'];
$tgl_tambah		= date('Y-m-d');
$jam_tambah		= date('H:i:s');
$nopp	= $_POST['txtnopp'];

	$a	= $_POST['angka'];
	for ($i = 1; $i <= $a; $i++){
	require_once("config.php");
		

	
	
			$kb		=	$_POST['cb_brg'][$i];
			
			
			 $pecah = explode(" / ", $kb);
			 $c   = $pecah[0];
			 $sc = $pecah[1];
			 $inventari=$pecah[2];

			// $sql	= mysqli_query($koneksi,"select * from invetarisi where objectid ='".$inventari."'");
			// $data	= mysqli_fetch_array($sql);
			$kodeit		=	$pecah['3'];
			$loc		=	$pecah['4'];
			$pgg		=	$pecah['5'];
			// $sc		=	$data['subcategory'];
			$dk 	=	$_POST['txtdes'][$i];
				
			$sqlp	= mysqli_query($koneksi,"insert into dt_pp set 	no_pp		='".$nopp."',
															tgl_tambah			='".$tgl_tambah."',
															jam_tambah  		='".$jam_tambah."',
															category			='".$c."',
															subcategory			='".$sc."',
															inventaris			='".$inventari."',
															pls					='".$pls."',
															kodeit				='".$kodeit."',
															loc					='".$loc."',
															pgg					='".$pgg."',
															deskripsi_kerusakan ='".$dk."'");
			// $project=$sc;												
			// $updatepp=mysqli_query($koneksi,"update tbl_pp set nama_project='$project' where no_pp='$nopp'");			
	}

	//statuss finishhh--------------------------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	session_start();
	date_default_timezone_set("Asia/Jakarta");
$usernm 			= $_SESSION['username'];

$nopp			=  $_POST['txtnopp'];
$tanggal		= date("Y-m-d");
$jam			= date("H:i:s");
$status_pp		= "waiting";
$url			= "form-pp.php";
require_once('config.php');
$sqluser	=	mysqli_query($koneksi,"select * from user where username='$usernm'");
$datauser	= 	mysqli_fetch_array($sqluser);
$dev		=$datauser['dev'];


 //~ echo $usernm;

$sqlb	=	mysqli_query($koneksi,"select * from tbl_pp where no_pp='".$nopp."'");
$data	=	mysqli_fetch_array($sqlb);
$komputer		= $data['komputer'];
$pelapor=$data['pelapor'];
$take_user=$data['diterima'];
$sqlr	=	mysqli_query($koneksi,"select * from user where section='".$data['section']."' and level_user='sh'");
$datar	= 	mysqli_fetch_array($sqlr);

	// function datediff($tgl1, $tgl2){
	// $tgl1 		= strtotime($tgl1);

	// $tgl2 		= strtotime($tgl2);
	// $diff_secs 	= abs($tgl1 - $tgl2);
	// $base_year 	= min(date("Y", $tgl1), date("Y", $tgl2));
	// $diff 		= mktime(0, 0, $diff_secs, 1, 1, $base_year);
	// return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
	// }
	// //fungsi itung berapa menit saat hold
	// function datediff2($tgl3, $tgl4){

	// $tgl3 		= strtotime($tgl3);
	// $tgl4 		= strtotime($tgl4);
	// $diff_secs 	= abs($tgl3 - $tgl4);
	// $base_year 	= min(date("Y", $tgl3), date("Y", $tgl4));
	// $diff		= mktime(0, 0, $diff_secs, 1, 1, $base_year);
	// return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
	// }
	//perubahan perhitungan downtime ppwo 04/03/2018
if($dev=="inf"){
$tgl1 = $data['tgl_lapor'].' '.$data['jam_lapor'];
}else{
$tgl1 = $data['tgl_m_kerja'].' '.$data['jam_m_kerja'];
}
echo"<br>";
 $tgl2 = $tanggal.' '.$jam;
// echo"<br>";
// 	$tgl3 = $data['tgl_hold'].' '.$data['jam_hold'];
// 	$tgl4 = $data['tgl_release'].' '.$data['jam_release'];
// 	//~ $tgl2 = '2017-02-24 04:00';
// 	$a 	= datediff($tgl1, $tgl2);
// 	$a2 = datediff2($tgl3, $tgl4);
// 	$b = $a['hours'].':'.$a['minutes'].':'.$a['seconds'];
// echo "<br>";
// 	$c = $a['hours'];
// echo "<br>";
// 	$menit_dt = strval(($a['days'] * 1440) + ($a['hours'] * 60)) + $a['minutes'];
// echo "<br>";
// 	$menit_hl = strval(($a2['days'] * 1440) + ($a2['hours'] * 60)) + $a2['minutes'];
// echo "<br>";
// 	$menit	= ($menit_dt-$menit_hl);
// echo "<br>";

//perubahan downrime 2020-05 anggimf

$sqlms	=	mysqli_query($koneksi,"select * from master_komputer where nama_komputer='".$komputer."'");
$dtmskom	=	mysqli_fetch_array($sqlms);
$wktukom=$dtmskom['waktu'];
if($wktukom==8 OR $dev=="pro")
{
//downtime 8 jam-------------------------	
		if($data['tgl_lapor']==$tanggal and $dev=="inf")
		{
			//proses downtime tanggal yang sama-----------
			if($dev=="inf"){
			$tglcek  	=strtotime($data['tgl_lapor'].' '.$data['jam_lapor']);
			}else{
			$tglcek  	=strtotime($data['tgl_m_kerja'].' '.$data['jam_m_kerja']);	
			}
			$tglcek2 	=strtotime($tanggal.' '.$jam);
			$ttlselisih	=abs($tglcek-$tglcek2);
			 $tttlproses=$ttlselisih/60; //echo"total_proses_8))".
			//detail hold
			echo "<br>";
			$ttlholddetail="";
			$sqlhold		=	mysqli_query($koneksi,"select * from detail_hold_pp where no_pp='".$nopp."'");
			while($dtdetail	=	mysqli_fetch_array($sqlhold))
			{
				$hold_detailhl		=strtotime($dtdetail['tgl_hold'].' '.$dtdetail['jam_hold']);
				$release_detailhl	=strtotime($dtdetail['tgl_release'].' '.$dtdetail['jam_release']);

				$selsih_detail	=abs($hold_detailhl-$release_detailhl);
				$menit_detail	=($selsih_detail/60);
				$ttlholddetail	=$ttlholddetail+$menit_detail;
			}
				// echo"total_detailhold_8))". $ttlholddetail;
				echo "<br>";
			echo "hasildowntime_8))".		$hasil_ttldowntime=round(($tttlproses-$ttlholddetail)); //echo "hasildowntime_8))".	
		
			//proses downtime tanggal yang sama-----------
		}else if($data['tgl_m_kerja']==$tanggal and $dev="pro"){
			//proses downtime tanggal yang sama-----------
			if($dev=="inf"){
			$tglcek  	=strtotime($data['tgl_lapor'].' '.$data['jam_lapor']);
			}else{
			$tglcek  	=strtotime($data['tgl_m_kerja'].' '.$data['jam_m_kerja']);	
			}
			$tglcek2 	=strtotime($tanggal.' '.$jam);
			$ttlselisih	=abs($tglcek-$tglcek2);
			 $tttlproses=$ttlselisih/60; //echo"total_proses_8))".
			//detail hold
			echo "<br>";
			$ttlholddetail="";
			$sqlhold		=	mysqli_query($koneksi,"select * from detail_hold_pp where no_pp='".$nopp."'");
			while($dtdetail	=	mysqli_fetch_array($sqlhold))
			{
				$hold_detailhl		=strtotime($dtdetail['tgl_hold'].' '.$dtdetail['jam_hold']);
				$release_detailhl	=strtotime($dtdetail['tgl_release'].' '.$dtdetail['jam_release']);

				$selsih_detail	=abs($hold_detailhl-$release_detailhl);
				$menit_detail	=($selsih_detail/60);
				$ttlholddetail	=$ttlholddetail+$menit_detail;
			}
				// echo"total_detailhold_8))". $ttlholddetail;
				echo "<br>";
			echo "hasildowntime_8))".		$hasil_ttldowntime=round(($tttlproses-$ttlholddetail)); //echo "hasildowntime_8))".	
		
		
		}else{

			// proses downtime berhari2----------------
			if($dev=="inf"){
			$tgl_mcek	=$data['tgl_lapor'];
			$jam_mcek	=$data['jam_lapor'];
			}else{
				$tgl_mcek	=$data['tgl_m_kerja'];
				$jam_mcek	=$data['jam_m_kerja'];
			}

			$tgl_scek	=$tanggal;
			$jam_scek	=$jam;
			
			$_tglm		=strtotime($tgl_mcek.' '.$jam_mcek);
			$_tgldata	=strtotime($tgl_mcek.' '."16:00:00");
			$_tgl_sdata	=strtotime($tgl_scek.' '."08:00:00");
			$_tgls		=strtotime($tgl_scek.' '.$jam_scek);
			
			$selisihmulai	=abs($_tglm-$_tgldata)/60;
			$selisihselesai	=abs($_tgl_sdata-$_tgls)/60;

			$ttlselisih=$selisihmulai+$selisihselesai;
		echo "<br>";	
			$tanggal1 	= date('Y-m-d',strtotime($tgl_mcek));
			$tanggal2 	= date('Y-m-d',strtotime($tgl_scek));
			$tal 		= date('Y-m-d',strtotime('+1 days',strtotime($tanggal1)));
			$ttltgl		=0;
			while ($tal < $tanggal2) {
				$ttltgl++;
				 $tal.'<br>';
				$tal = date('Y-m-d',strtotime('+1 days',strtotime($tal)));
				}
			
				$ttl_proses=($ttltgl*480)+$ttlselisih; //echo "TTL WAKTU PROSES ".
				echo "<br>";
				$ttlholddetail_1="";
				$ttlholddetail_2="";
				$sqlhold		=	mysqli_query($koneksi,"select * from detail_hold_pp where no_pp='$nopp'");
				while($dtdetail	=	mysqli_fetch_array($sqlhold))
				{ 
					
					$tgl_holddt=$dtdetail['tgl_hold'];
					$jam_holddt=$dtdetail['jam_hold'];
					$tgl_reldt=$dtdetail['tgl_release'];
					$jam_reldt=$dtdetail['jam_release'];

					if($tgl_holddt==$tgl_reldt){
						// downtime detail hold di hari yang sama----
						$tglcek_hold 	 	=strtotime($tgl_holddt.' '.$jam_holddt);
						$tglcek2_hold 		=strtotime($tgl_reldt.' '.$jam_reldt);
						$selisih_hari_hold	=(abs($tglcek_hold-$tglcek2_hold))/60;
					
						$ttlholddetail_1=$ttlholddetail_1+$selisih_hari_hold;
						// downtime detail hold di hari yang sama---
					}else{

							// detail hold di beberapa hari berbeda-------------
							$_tglm_hold		=strtotime($tgl_holddt.' '.$jam_holddt);
							$_tgldata_hold	=strtotime($tgl_holddt.' '."16:00:00");
							$_tgl_sdata_hold=strtotime($tgl_reldt.' '."08:00:00");
							$_tgls_hold		=strtotime($tgl_reldt.' '.$jam_reldt);
							
							$selisihmulai_hold=abs($_tglm_hold-$_tgldata_hold)/60;
							$selisihselesai_hold=abs($_tgl_sdata_hold-$_tgls_hold)/60;
							$ttlselisih_hold=$selisihmulai_hold+$selisihselesai_hold;
							
							$tgl_hl_cek1	=date('Y-m-d',strtotime($tgl_holddt));
							$tgl_hl_cek2	=date('Y-m-d',strtotime($tgl_reldt));
							$tal_hold 		=date('Y-m-d',strtotime('+1 days',strtotime($tgl_hl_cek1)));
							$ttlhl=0;
							while ($tal < $tgl_hl_cek2) {
								$ttlhl++;
									$tal_hold.'<br>';
								$tal_hold = date('Y-m-d',strtotime('+1 days',strtotime($tal_hold)));
							}
							 $selisih_hari_hold=($ttlhl*480)+$ttlselisih_hold;
							 $ttlholddetail_2=$ttlholddetail_2+$selisih_hari_hold;
							 // detail hold di beberapa hari berbeda-------------
					 }
					
					echo "<br>";
				
					
				}
						$ttlproses_hold=$ttlholddetail_2+$ttlholddetail_1;
				//  echo "TTL DETAIL HOLD".$ttlproses_hold;
			
			$hasil_ttldowntime=round($ttl_proses-$ttlproses_hold); //echo "hasil downtime " .
			// proses downtime berhari2----------------
		}

//downtime 8 jam-------------------------
}else{
//downtime 24 jam-------------------------

		$tgl_m 		= strtotime($tgl1);
		$tgl_s 		= strtotime($tgl2);
		$diff		=abs($tgl_m - $tgl_s);

			$mnt_proses=$diff/60; //echo "TTL_PROSES_24))".

//hold di tabel pp,masih pertimbangan		
		$tgl3_h 	= strtotime($data['tgl_hold'].' '.$data['jam_hold']);
		$tgl4_h 	= strtotime($data['tgl_release'].' '.$data['jam_release']);
		$diffhl		=abs($tgl3_h-$tgl4_h);
		$mnt_hold	=$diffhl/60;
		
		//hold di tabel pp,masih pertimbangan
//detail hold
$ttlholddetail="";
$sqlhold		=	mysqli_query($koneksi,"select * from detail_hold_pp where no_pp='".$nopp."'");
while($dtdetail	=	mysqli_fetch_array($sqlhold))
{
	$hold_detailhl		=strtotime($dtdetail['tgl_hold'].' '.$dtdetail['jam_hold']);
	$release_detailhl	=strtotime($dtdetail['tgl_release'].' '.$dtdetail['jam_release']);

	$selsih_detail	=abs($hold_detailhl-$release_detailhl);
	$menit_detail	=($selsih_detail/60);
	$ttlholddetail	=$ttlholddetail+$menit_detail;
}
		// echo"total_detailhold_24))". $ttlholddetail;
		$hasil_ttldowntime=round(($mnt_proses-$ttlholddetail)); 
//downtime 24 jam-------------------------		
}


 	$perintah_nilai	=  	"
                         username		  ='".$take_user."',
                         no_pp		      ='".$nopp."'
                         
                         ";

    $simpan_nilai = mysqli_query($koneksi,"insert into nilai_pp set".$perintah_nilai);  
    			
// simpan nilai			
// perubahan downtime 2020-05- anggimf

// ~ echo $menit." ".$menit_dt." ".$menit_hl;
	
$sqlw = mysqli_query($koneksi,"select * from user where username='".$usernm."'");
$isi  = mysqli_fetch_array($sqlw);
$nama  = $isi['nama'];
$perintah 		= 	"tgl_s_kerja  				='".$tanggal."',
						 jam_s_kerja  				='".$jam."',
						 status_pp  				='finish',
						 diperiksa					='".$pelapor."',
						 downtime					=".$hasil_ttldowntime."";
						 
$syarat 	= " where no_pp='".$nopp."'";
$update 	= mysqli_query($koneksi,"update tbl_pp set ".$perintah." ".$syarat);

$sqlf = mysqli_query($koneksi,"select * from user where nama='".$data['pelapor']."'");
$dataf  = mysqli_fetch_array($sqlf);
echo "<input type=hidden value='$url' id=url>";


			//	email
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
								Silahkan klik link berikut untuk approve :  <a href ="http://192.168.20.9/ppwo/app_pp.php">APPROVE</a>
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
								
								Telah selesai ditangani oleh teknisi IT<br>
								Silahkan klik link berikut untuk approve :  <a href ="http://192.168.20.9/ppwo/app_pp.php">APPROVE</a>
						
								
								<br><br> Terima kasih,<br> PPWO IT';

					$headers1  = 'MIME-Version: 1.0' . "\r\n";
					$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					$headers1 .= 'From: PPWO_Online <'.$from_mail1.'>' . "\r\n";

					$sendtomail1 = mail($to1, $subject1, $message1, $headers1);
				}
			?>

					<!-- <script type=text/javascript>
						var url = document.getElementById('url').value;
						alert("PP dengan nomor <?php echo"".$nopp.""; ?> telah selesai");
						window.location = url;
						
					</script> -->
		<?php 
		

		?>			


	<script type=text/javascript>
	// alert("data di simpan")
	window.close();
	opener.location.reload(true);
	</script>
<?php
?>
