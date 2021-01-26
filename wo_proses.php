<?php 
session_start();
$pls=$_SESSION['pls'];
$nowo			= $_POST['txtnowo'];
$section		= $_POST['txtsection'];
$pemohon		= $_POST['txtpemohon'];
$uraian			= $_POST['txturaian'];
$dev			= $_POST['radio'];
$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');
$status_wo		= "waiting";
$validasi		= $_POST['txtno'];
$sifat			= $_POST['sifat'];
$url			= "form-wo.php";
$an		= $_POST['an'];
$kadiv		= $_POST['kadiv'];
$exp		= $_POST['exp'];
require_once("config.php");


//~ echo "".$nowo." ".$section." ".$pemohon." ".$uraian." ".$tanggal." ".$jam." ".$status_wo." ".$validasi." ".$url."\n".$data['nama']." ".$data['email'];
//2021-01 anggimf
$akses=$_POST['aks'];

  $jmlakses    =count($akses);
        for($x=0;$x<$jmlakses;$x++){
	
			$dtakses="akses ='$akses[$x]',
			
					  id_order='$nowo'";
			$simpanakses = mysqli_query($koneksi,"insert into detail_akses  set ".$dtakses);
			
			
		}
	
		$prm=$_POST['prm'];
  $jmlprm    =count($prm);
        for($p=0;$p<$jmlprm;$p++){
	
			$dtprm="id_permintaan ='$prm[$p]',
					  id_order='$nowo'";
			$simpanakses = mysqli_query($koneksi,"insert into detail_permohonan  set ".$dtprm);
			
			
		}	

$sqlv = mysqli_query($koneksi,"select * from tbl_wo where no = ".$validasi." AND tgl_permohonan ='".$tanggal."'");
$val = mysqli_fetch_array($sqlv);
if ($validasi==$val['no']){
					echo "<input type=hidden value='$url' id=url>";
		?>
					<script type=text/javascript>
						var url = document.getElementById('url').value;
						alert("Nomor WO Sudah ada....");
						window.location = url;
						
					</script>
				<?php
	}else{
						$sqlx = mysqli_query($koneksi,"SELECT max(no) as noac from tbl_wo where year(tgl_permohonan)=year(CURDATE()) and month(tgl_permohonan)=month(CURDATE())");
						$data = mysqli_fetch_array($sqlx);
						$no = strval($data['noac']);
						//echo $no;
							if ($no==''){
									$no= strval($data['noac'])+1;
								
								}else{
									$no= strval($data['noac'])+1;
								
								}
														

		$perintah	=  	"no					  		='".$no."',
						 no_wo		  				='".$nowo."',						 
						 pemohon	  				='".$pemohon."',						 
						 section	  				='".$section."',						 
						 uraian_pekerjaan			='".$uraian."',						 
						 tgl_permohonan				='".$tanggal."',
						 jam_permohonan 			='".$jam."',
						 status_wo 	 				='".$status_wo."',
						 diterima  					='',						
						 tgl_diterima  				='',
						 jam_diterima  				='',
						 tgl_m_kerja				='',
						 jam_m_kerja				='',
						 kontrak_luar				='',
						 nama_kontraktor			='',
						 tgl_s_kerja				='',
						 jam_s_kerja				='',
						 keterangan					='',
						 app_user	  				='".$pemohon."',
						 app_sh		  				='',
						 pls		  				='".$pls."',
						 it		  					='".$dev."',
						 an		  					='".$an."',
						 kadiv		  					='".$kadiv."',
						  exp		  					='".$exp."',
						  sifat		  					='".$sifat."',
						 app_it		  				=''";
				
					$simpan = mysqli_query($koneksi,"insert into tbl_wo set ".$perintah);
				
				//email
				$sqlr	=	mysqli_query($koneksi,"select * from user where section='".$section."' and level_user='sh'");
				while($datar	= 	mysqli_fetch_array($sqlr)){
					$from_mail = 'system@plasindo.loc';
					$to = $datar['email'];

					$subject = 'Pemberitahuan WO Baru Section'." ".$datar['section']." [NO-REPLY]";
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
										<td>'.$pemohon.'</td>
									</tr>
									<tr>
										<td valign="top">Rincian</td>
										<td valign="top">:</td>
										<td><textarea rows="3" cols="35" style="border: none;">'.$uraian.'</textarea></td>
									</tr>
								</table>
								
								<br>
								Silahkan klik link :  <a href ="https://192.168.20.9/ppwo/login.php?id=app">https://192.168.20.9/ppwo/login.php?id=app</a>
								<br> Terima kasih,<br> PPWO IT';

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					$headers .= 'From: PPWO_Online <'.$from_mail.'>' . "\r\n";

					$sendtomail = mail($to, $subject, $message, $headers);
				}
				//email	
					echo "<input type=hidden value='$url' id=url>";	
						?>
							<script type=text/javascript>
								var url = document.getElementById('url').value;
								// alert("WO berhasil dikirim");
								window.location = url;
							</script>
					
					<?php



	}					
?>
