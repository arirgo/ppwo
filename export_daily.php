
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=nama_filenya.xls");
date_default_timezone_set("Asia/Jakarta");

$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];
$group = $_GET['group'];
$pls = $_GET['pls'];
?>
<center>
<h2 style="color:blue;font:bold;"><b>LAPORAN HARIAN <?php ECHO strtoupper($group);?> IT</b></h2></center>
<?php
							
require_once('config.php');
if($group=="all"){
  $tampiluser=mysqli_query($koneksi,"select*from user where dev in('inf','pro') and aktif='1' and pls='$pls'");
	}else if($group=="prog"){
  $tampiluser=mysqli_query($koneksi,"select*from user where dev in('pro') and aktif='1' and pls='$pls'");

	}else if($group=="inf"){
	$tampiluser=mysqli_query($koneksi,"select*from user where dev in('inf') and aktif='1' and pls='$pls'");

	} else{
			$tampiluser=mysqli_query($koneksi,"select * from user where username ='$group' and pls='$pls'");
	}
  while($dtuser	= mysqli_fetch_array($tampiluser)){
   $id_user=$dtuser['username'];
     $nama_user=$dtuser['nama'];		 
?>
<h3 style="color:blue;font:bold;"><b><i><?php echo $dtuser['nama'];?></i></b></h3>
<div><?php
							require_once('config.php');
// coba daily--------------------------------------------------->>
?>
<form name="fmdaily" id="fmdaily" class="fmdaily" method="post">
    <table width="80%" border="1" class="table table-striped table-bordered table-hover">
    <input type="hidden" value="1" id="total_modul"  name="jumlahmodul">
 <?php 
 	$tanggal1 = date('Y-m-d',strtotime($tgl1));
    $tanggal2 = date('Y-m-d',strtotime($tgl2));
 
    while ($tanggal1 <= $tanggal2) {
		 $tanggal1.'<br>';
		?>
     
	   <tr> <td colspan=9><i style="color:red;"><?php echo  $tanggal1;?></i></td></tr>
    	<tr style="background-color:#7EB7FD;" >
		<th>NO</th>
		<th>TANGGAL</th>
        <th >PROJEK</th>
        <th >JENIS</th>
        <th >PIC</th>
        <th >PEKERJAAN / MODUL</th>
        <th >DIMINTA OLEH</th>
        <th >SECTION</th>
        <th >KETERANGAN</th>
    </tr>
	<?php
// PP------------------------------------------------------>
		$NO=1;
			$sql_pp	= mysqli_query($koneksi,"SELECT * FROM `tbl_pp` where tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user' and tgl_m_kerja >='2020-04-01'");
							while($row_pp	= mysqli_fetch_array($sql_pp))
		{ ?>

		<tr>
		<td><?php echo $NO++;?></td>
        <td><?php echo $tanggal1;?></td>
        <td><?php echo $nop=$row_pp['no_pp'];?></td>
        <td>PP</td>
		<td><?php echo $row_pp['diterima'];?></td>
		<td><?php echo $row_pp['kerusakan'];?></td>
        <td><?php echo $row_pp['pelapor'];?></td>  
    	 <td><?php echo $row_pp['section'];?></td>  
        
        <td>
		<?php

	
	$sql_sts= mysqli_query($koneksi,"SELECT (case when tgl_hold<='$tanggal1' and (tgl_release >'$tanggal1'  OR tgl_release='0000-00-00') then 'HOLD' end )as status FROM detail_hold_pp where no_pp='$nop' and tgl_hold <='$tanggal1' and (tgl_release >='$tanggal1' OR tgl_release='0000-00-00')");
	$stts	 = mysqli_fetch_array($sql_sts);

			
$kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));


		if($stts['status']=="" and $row_pp['tgl_s_kerja'] !=$tanggal1 ){echo "on progress";}
		else if($stts['status']=="" and $row_pp['tgl_s_kerja']==$tanggal1)
		{
			echo "Finish";
		}
		else{ echo $stts['status'];}
		?>
		</td>      
    </tr>
		
		<?php }

		//modul pp
$sql_modpp	= mysqli_query($koneksi,"SELECT * FROM `modul_pp` where tgl_mulai <='$tanggal1' and (tgl_selesai >='$tanggal1' OR tgl_selesai='0000-00-00') and dikerjakan='$nama_user' ");
							while($row_modpp	= mysqli_fetch_array($sql_modpp)) {
								$objmodpp=$row_modpp['objectid'];
								?>
			
			<tr style="font-weight:bold;font-style:italic;">
			<td><?php echo $NO++;?></td>
			<td><?php echo $tanggal1;?></td>
			<td><?php echo $no_projpp=$row_modpp['no_pp'];?></td>
			<td>Modul PP</td>
			<td><?php echo $row_modpp['dikerjakan'];?></td>
			<td><?php echo $row_modpp['nama_modulpp'];?></td>

			<td colspan="3" align="center">
				<?php
			$sql_stsmodpp	= mysqli_query($koneksi,"SELECT (case when tgl_mulai<='$tanggal1'  and (tgl_selesai >'$tanggal1' OR tgl_selesai='0000-00-00') and tgl_hold<>'$tanggal1' then 'On progres'
			else case when tgl_mulai<='$tanggal1' and tgl_selesai>'$tanggal1' and tgl_hold='$tanggal1' then 'Hold' ELSE
			case when tgl_selesai='$tanggal1' then 'finish' else 0 end end end)as status FROM modul_pp where no_pp='$no_projpp' and objectid='$objmodpp' and tgl_mulai <='$tanggal1' and (tgl_selesai >='$tanggal1' OR tgl_selesai='0000-00-00') and dikerjakan='$nama_user'");
			$sttsmodpp= mysqli_fetch_array($sql_stsmodpp);
			echo  $sttsmodpp['status'];
			
			
				?>

			</td>
		</tr>
							<?php	}
//work order----------------------------------
	$sql_wo	= mysqli_query($koneksi,"SELECT * FROM `tbl_wo` where tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user' and tgl_m_kerja >='2020-04-01' ");
							while($row_wo	= mysqli_fetch_array($sql_wo))
							{?>
		<tr >
		<td><?php echo $NO++;?></td>
        <td><?php echo $tanggal1;?></td>
        <td><?php echo $now=$row_wo['no_wo'];?></td>
        <td>WO</td>
		<td><?php echo $row_wo['diterima'];?></td>
		<td><?php echo $row_wo['uraian_pekerjaan'];?></td>
        <td><?php echo $row_wo['pemohon'];?></td>  
    	 <td><?php echo $row_wo['section'];?></td>  
        
        <td>
		<?php
	// 	$sql_stswo	= mysqli_query($koneksi,"SELECT (case when tgl_m_kerja<='$tanggal1' and (tgl_s_kerja >'$tanggal1' OR tgl_s_kerja='0000-00-00') and tgl_hold<>'$tanggal1' then 'On progres'
    //    else case when tgl_m_kerja<='$tanggal1' and tgl_s_kerja>'$tanggal1' and tgl_hold='$tanggal1' then 'Hold' ELSE
    //    case when tgl_s_kerja='$tanggal1' then 'finish' else 0 end end end)as status FROM tbl_wo where no_wo='$now' and tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and diterima='$nama_user' and tgl_m_kerja >='2020-04-01'");
	// 	$sttswo= mysqli_fetch_array($sql_stswo);

		$sql_stswo	=mysqli_query($koneksi,"SELECT (case when tgl_hold<='$tanggal1' and (tgl_release >'$tanggal1'  OR tgl_release='0000-00-00') then 'HOLD' end )as status FROM detail_hold_wo where no_wo='$now' and tgl_hold <='$tanggal1' and (tgl_release >='$tanggal1' OR tgl_release='0000-00-00')"); 
		$sttswo= mysqli_fetch_array($sql_stswo);
		if($sttswo['status']=="" and $row_wo['tgl_s_kerja'] !=$tanggal1 ){echo "on progress";}
		else if($sttswo['status']=="" and $row_wo['tgl_s_kerja']==$tanggal1)
		{
			echo "Finish";
		}
		else{ echo $sttswo['status'];}
		?>
		</td>      
    </tr>

	<?php		}?>
	<!-- MODUL ------------------------------------>
		
		
		<?php $sql_mod	= mysqli_query($koneksi,"SELECT * FROM `detail_project` where tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and username='$nama_user' ");
							while($row_mod	= mysqli_fetch_array($sql_mod)) {
								$objmod=$row_mod['objectid'];
								
								?>
			
			<tr style="font-weight:bold;font-style:italic;">
			<td><?php echo $NO++;?></td>
			<td><?php echo $tanggal1;?></td>
			<td><?php echo $no_proj=$row_mod['no_project'];?></td>
			<td>Modul WO</td>
			<td><?php echo $row_mod['username'];?></td>
			<td><?php echo $row_mod['detail_pekerjaan'];?></td>

			<td colspan="3" align="center">
				<?php
			$sql_stsmod	= mysqli_query($koneksi,"SELECT (case when tgl_m_kerja<='$tanggal1'  and (tgl_s_kerja >'$tanggal1' OR tgl_s_kerja='0000-00-00') and tgl_hold<>'$tanggal1' then 'On progres'
			else case when tgl_m_kerja<='$tanggal1' and tgl_s_kerja>'$tanggal1' and tgl_hold='$tanggal1' then 'Hold' ELSE
			case when tgl_s_kerja='$tanggal1' then 'finish' else 0 end end end)as status FROM detail_project where no_project='$no_proj' and objectid='$objmod' and tgl_m_kerja <='$tanggal1' and (tgl_s_kerja >='$tanggal1' OR tgl_s_kerja='0000-00-00') and username='$nama_user'");
			$sttsmod= mysqli_fetch_array($sql_stsmod);
			
			if($sttsmod['status']=="finish"){echo "Finish";}
			else{
			
			$sql_stsmodwo	= mysqli_query($koneksi,"SELECT (case when tgl_hold<='$tanggal1' and (tgl_release >'$tanggal1' OR tgl_release='0000-00-00') then 'HOLD' end )as status FROM detail_hold_wo where no_wo='$no_proj' and tgl_hold <='$tanggal1' and (tgl_release >='$tanggal1' OR tgl_release='0000-00-00')");
			$sttsmodwo= mysqli_fetch_array($sql_stsmodwo);
			
			if($sttsmodwo['status']=="" and $row_mod['tgl_s_kerja'] !=$tanggal1 )
			{echo "on progress";}

			else if($sttsmodwo['status']=="" and $row_mod['tgl_s_kerja']==$tanggal1 )
			{
				echo "Finish";
			}
			else{ echo  $sttsmodwo['status'];}
			}		?>

			</td>
		</tr>


			</td>
		</tr>
	<?php }	
	
	$tanggal1 = date('Y-m-d',strtotime('+1 days',strtotime($tanggal1)));
   }
// coba daily--------------------------------------------------->>
?>
</table></form>
<?php } ?> <!-- /.user -->
