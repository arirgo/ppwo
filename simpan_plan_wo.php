<?php
require_once('config.php');
session_start();
$user               =$_SESSION['username'];
$nopp	          =$_POST['no_pp'];
$jml                =$_POST['jumlahrow'];
$group          	=$_POST['group'];
$jenis          	=$_POST['jenis'];


$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');

if($group=="ANALISIS"){
for ($z=1;$z<=$jml;$z++){


 $detail_pekerjaan 	=$_POST['value_'.$z];
 $waktu          	=$_POST['value2_'.$z];

//~ echo $nopp;
//~ echo $nama;

if($detail_pekerjaan!='' and $waktu!='')
{				
	$perintah	=  	"
                         jenis		  ='".$jenis."',
                         no_project		  ='".$nopp."',
                         detail_pekerjaan ='".$detail_pekerjaan."',
                         waktu            ='".$waktu."',
                      
                         group_project            ='".$group."'";
				
                         $simpan = mysqli_query($koneksi,"insert into detail_project set".$perintah);  
    }  else{}    
}

echo $nopp.'|'.$group;
}			

if($group=="PROGRAMING"){
for ($z=1;$z<=$jml;$z++){


$detail_pekerjaan 	=$_POST['prog_'.$z];
 $waktu          	=$_POST['prog2_'.$z];

//~ echo $nopp;
//~ echo $nama;
if($detail_pekerjaan!='' and $waktu!='')
{
				
	$perintah	=  	"
                         jenis		  ='".$jenis."',
                         no_project		  ='".$nopp."',
                         detail_pekerjaan ='".$detail_pekerjaan."',
                         waktu            ='".$waktu."',
                         group_project            ='".$group."'";
				
                         $simpan = mysqli_query($koneksi,"insert into detail_project set".$perintah);  
        }  else{}           
}	
echo $nopp.'|'.$group;
}			

if($group=="DOKUMENTASI"){
for ($z=1;$z<=$jml;$z++){


 $detail_pekerjaan 	=$_POST['dok_'.$z];
 $waktu          	=$_POST['dok2_'.$z];

//~ echo $nopp;
//~ echo $nama;
if($detail_pekerjaan!='' and $waktu!='')
{
				
	$perintah	=  	"
                         jenis		  ='".$jenis."',
                         no_project		  ='".$nopp."',
                         detail_pekerjaan ='".$detail_pekerjaan."',
                         waktu            ='".$waktu."',
                         group_project            ='".$group."'";
				
                         $simpan = mysqli_query($koneksi,"insert into detail_project set".$perintah);  
     }  else{}             
}	
echo $nopp.'|'.$group;
}			

if($group=="INFRA"){
for ($z=1;$z<=$jml;$z++){


 $detail_pekerjaan 	=$_POST['pkjinf_'.$z];
 $waktu          	=$_POST['inf2_'.$z];

//~ echo $nopp;
//~ echo $nama;
if($detail_pekerjaan!='' and $waktu!='')
{
				
	$perintah	=  	"
                         jenis		  ='".$jenis."',
                         no_project		  ='".$nopp."',
                         detail_pekerjaan ='".$detail_pekerjaan."',
                         waktu            ='".$waktu."',
                         group_project            ='".$group."'";
				
                         $simpan = mysqli_query($koneksi,"insert into detail_project set".$perintah);  
            }  else{}          
}	
echo $nopp.'|'.$group;
}			
       