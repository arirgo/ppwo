<?php
	require_once("config.php");
  $obj   	=$_POST['objdaily'];
  $ket   	=$_POST['status'];
  $modul  	=$_POST['modul'];




$update	=mysqli_query($koneksi,"update daily_report set keterangan='$ket' where objectid='$obj'");

if($ket=='finish'){
	
	$updatemodul	=mysqli_query($koneksi,"update detail_project set status='finish' where objectid='$modul'");
}else{
$cek	=mysqli_query($koneksi,"select count(*) as jml from daily_report where modul='$modul' and keterangan='finish'");
$ck		=mysqli_fetch_array($cek);

	if($ck['jml'] >0)
	{
		$updatemodul	=mysqli_query($koneksi,"update detail_project set status='finish' where objectid='$modul'");	
	}else{
		$updatemodul	=mysqli_query($koneksi,"update detail_project set status='on progress' where objectid='$modul'");
	}
}


?>
