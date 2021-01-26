<?php 

$nowo			= $_POST['txtnowo'];
$section		= $_POST['txtsection'];
$pemohon		= $_POST['txtpemohon'];
$uraian			= $_POST['txturaian'];
$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');
$status_wo		= "approved by IT";
$validasi		= $_POST['txtno'];
$url			= "form-wo.php";

require_once("config.php");


//~ echo "".$nowo." ".$section." ".$pemohon." ".$uraian." ".$tanggal." ".$jam." ".$status_wo." ".$validasi." ".$url."\n".$data['nama']." ".$data['email'];
	

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
														
/*echo $nopp."+".$section."+".$pelapor."+".$permasalahan."+".$tanggal."+".$jam."<br>";
echo $no."<br>";
echo $antri."<br>";
echo $status_pp;*/
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
						 app_sh		  				='".$pemohon."',
						 app_it		  				='".$pemohon."'";
				
					$simpan = mysqli_query($koneksi,"insert into tbl_wo set ".$perintah);
				
				
					echo "<input type=hidden value='$url' id=url>";	
						?>
							<script type=text/javascript>
								var url = document.getElementById('url').value;
								alert("WO berhasil dikirim");
								window.location = url;
							</script>
					
					<?php



	}					
?>
