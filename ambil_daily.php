<?php
session_start();
$nama=$_SESSION['nama'];
require_once('config.php');

$pilih_id=$_POST['pilih_id'];
$tabel=$_POST['cek_pilih'];
if($pilih_id=="PP"){
        
   $vb="";

            	$sql_project	= mysqli_query($koneksi,"select * from tbl_pp where status_pp not in('waiting','complete')");
							while($row_project	= mysqli_fetch_array($sql_project))
							{
                                
								  $vb.= '<option value="'.$row_project['no_pp'].'">'.$row_project['no_pp'].'</option>';
							
							}

 echo $vb;
}else if ($pilih_id=="WO"){

    $vb="";

            	$sql_project	= mysqli_query($koneksi,"select * from tbl_wo where  status_wo='on process'");
							while($row_project	= mysqli_fetch_array($sql_project))
							{
								  $vb.='<option value="'.$row_project['no_wo'].'">'.$row_project['no_wo'].'</option>';
							
							}

 echo $vb;


}
else{
			$vb="";

            	$sql_project	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$pilih_id."' and status!='finish'");
							while($row_project	= mysqli_fetch_array($sql_project))
							{
								  $vb.='<option value="'.$row_project['objectid'].'">'.$row_project['group_project'].'&nbsp-'.$row_project['detail_pekerjaan'].'</option>';
							
							}
									if($tabel=="PP")
									{
										$tbl=mysqli_query($koneksi,"select * from tbl_pp where no_pp ='".$pilih_id."'");
										while($cek_row	= mysqli_fetch_array($tbl))
												{
													$section=$cek_row['section'];
													$peminta=$cek_row['pelapor'];
												
												}
									}else{
										$tbl=mysqli_query($koneksi,"select * from tbl_wo where no_wo ='".$pilih_id."'");
										while($cek_row	= mysqli_fetch_array($tbl))
												{
													$section=$cek_row['section'];
													$peminta=$cek_row['pemohon'];
												
												}

									}
echo $vb.'|'.$section.'|'.$peminta;


//  echo $nopp.'|'.$group;

}

?>