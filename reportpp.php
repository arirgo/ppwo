<?php
ob_start();
?>
<?php

	include "config.php";
?>
<?php

  $oid=$_GET['oid'];
	   $sql ="select * from ms_master 
		  where objectid='".$oid."'";
		  $result=mysqli_query($koneksi, $sql);


?>
<html>
<head>
	<SCRIPT Language="JavaScript">
			var timerID = null;
			function showtime(){
				var today=new Date()
				document.getElementById("jam").innerHTML = today.toLocaleString()
				TimerID=setTimeout("showtime()",1000)
			}
		</SCRIPT>
    <style type="text/css">
    table {font-size:9px;
		border-width: thin;}
    h3 {border-bottom-style: double;}
    
    </style>
	
    
</head>
<body >
		
		<table width=100% style="border:3px solid #000 ;  border-style: double; " align="center" cellpadding="3">
			  	<?php $ms = mysqli_fetch_array($result);?>
			    <tr>
			 		<td valign="top" ><img src="res/PL2011.jpg" alt="Aplikasi" width="100px" height="40px" /></td>
			 		<td>
						<table>
							<tr>
								<td colspan="3"><center> <h1>PERMINTAAN PERBAIKAN IT</h1></center></td>
							</tr>
							<tr>
								<td align="left">PP No :</td><td align="center">&nbsp;</td><td align="right"> 001</td>
							</tr>
						</table>
			 		</td>
			 	
			 		<td align="right">
						<table  cellpadding="3" cellspacing="0" style="border:1px solid #000;"><tr>
							<td style="border-bottom:1px solid #000;  border-right:1px solid #000;"> No. Form</td><td style="border-bottom:1px solid #000;">  IT-02</td></tr>
							<tr><td style="border-bottom:1px solid #000;  border-right:1px solid #000;">  No. Rev</td><td style="border-bottom:1px solid #000;">0</td></tr>
							<tr><td style="border-right:1px solid #000;">Tanggal</td><td> 25 - 11 - 2015</td></tr>
              
						</table>
                    </td>	 				 			 		
			 	</tr>
			 	<tr><td colspan=3 style="border-bottom:1px solid #000;"></td></tr>
				<tr><td align="left">Tanggal : <?PHP echo $ms['Rev']; ?></td><td align="center">Section : </td><td align="right">Nama Komputer : <?PHP echo $ms['Mesin']; ?></td></TR>
				<tr><td colspan=3 align="center" bgcolor="#E6E6FA"></td></tr>
				<tr><td colspan=3 >
                    
						<table align="center" width="800px" cellpadding="0" cellspacing="0"> 
							<tr>
								<td colspan="14">
									<textarea  style="border-color: Transparent" cols="173" rows="10">Jenis Kerusakan : </textarea>
								</td>
							</tr>
							<tr>
								<td>
									<textarea cols="41" rows="5">Yang Melaporkan</textarea>
								<td>
									<textarea cols="41" rows="5">Tanda Tangan</textarea>
								</td>
								<td>
									<textarea cols="41" rows="5">Diterima</textarea>
								</td>
								<td>
									<textarea cols="41" rows="5">Tanda Tangan</textarea>
								</td>
							</tr>
							<tr>
								<td>Tanggal</td>
								<td>Jam</td>
								<td>Tanggal</td>
								<td>Jam</td>
							</tr>
						</table>
					</td>
				</tr>
 				<tr><td colspan=3 >       
						<table align="center" width="800px" cellpadding="0" cellspacing="0"> 
							<tr>
								<td colspan="14">
									<textarea  style="border-color: Transparent" cols="173" rows="10">Pekerjaan yang dilakukan : </textarea>
								</td>
							</tr>
							<tr>
								<td colspan="4">Mulai kerja Tanggal</td>
								<td colspan="4">Jam</td>
								<td colspan="4">Selesai Tanggal</td>
								<td colspan="4">Jam</td>
							</tr>
						</table>
				</td></tr>
  
  <tr><td colspan=3 align="center"><strong>BAHAN FILM : <?PHP echo $ms['Bahan_FilmPrt_Des']; ?> </strong></td></TR>
  <tr><td colspan=3 > 
	

<table align="center" style="border:1px solid #000" width="800" cellpadding="0" cellspacing="0"> 
<tr>
	<th style='border-bottom:1px solid #000; font-size:7px;'> PROPERTIES  </th>
    <th style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'> TEST METHOD </th>
    <th style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'> STANDARD </th>
	<th style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'> NOTE </th>
</tr>

<?php  
// Perintah untuk menampilkan data

$hasil3= mysql_query ("SELECT * FROM ms_property where parentobjectid='$oid'") ;

// perintah untuk membaca dan mengambil data dalam bentuk array
while ($data3 = mysqli_fetch_array ($hasil3)){
 echo "    
        <tr>
        <td style='border-bottom:1px solid #000; font-size:7px;'>".$data3['Karakteristik'].''.$data3['Nilai']."</td>
        <td style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px; text-align:center;'>".$data3['Test_Method']."</td>
        <td style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px; text-align:center;'>".$data3['Standard']."</td>
        <td style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'>".$data3['Note']."</td>
		</tr> ";
		   
}
?>
</table>
 </td></tr>	
 <tr><td colspan=3 > 
 
 <table align="center" style="border:1px solid #000" width="800" cellpadding="0" cellspacing="0"> 
 <tr>
	<td rowspan=50 style='border-bottom:1px solid #000; border-right:1px solid #000; font-size:7px;'> KETERANGAN</td>
</tr>

<?php  
// Perintah untuk menampilkan data

$hasil3= mysql_query ("SELECT * FROM ms_keterangan where parentobjectid='$oid'") ;

// perintah untuk membaca dan mengambil data dalam bentuk array
while ($data3 = mysqli_fetch_array ($hasil3)){

		if ($data3['Format'] == 'B'){
		echo "    
        <tr>
        <td style='border-top:1px solid #000; font-size:7px;'>" ;
		echo "<b>".$data3['Keterangan']."</b></td>"; 
			echo "</tr> ";
		}
		else if ($data3['Format'] == 'I'){
			 echo "    
        <tr>
        <td style='border-top:1px solid #000; font-size:7px;'>" ;
		echo "<i>".$data3['Keterangan']."</i></td>"; 
			echo "</tr> ";
		}
		else if ($data3['Format'] == 'U'){
			 echo "    
        <tr>
        <td style='border-top:1px solid #000; font-size:7px;'>" ;
		echo "<u>".$data3['Keterangan']."</u></td>"; 
			echo "</tr> ";
		} else { echo "    
        <tr>
        <td style='border-top:1px solid #000; font-size:7px;'>" ;
		echo "".$data3['Keterangan']."</td>"; 
			echo "</tr> ";}
		
} 
?>
</table>
</td></tr>
<br>
<br>
<br>

<table align="center" style="border:1px solid #000" width="800" cellpadding="0" cellspacing="0"> 
<tr>
	<td colspan="2" style='border-bottom:1px solid #000; border-right:1px solid #000; font-size:7px; text-align:center;'> <b>DISETUJUI UNTUK DILAKSANAKAN DI BAGIAN MASING-MASING</b> </td>
</tr>
<tr>
	<td style='text-align:center; border-bottom:1px solid #000; border-right:1px solid #000;'> <br><br><br><br><br> PETRUS THEMA </td>
	<td style='text-align:center; border-bottom:1px solid #000;'> <br><br><br><br><br> AFRIANTO </td>
</tr>
<tr>
	<td style='text-align:center; border-right:1px solid #000;'>SECTION HEAD PRODUKSI</td>
	<td style='text-align:center;'>SECTION HEAD QC</td>
</tr>

 
</table>
          </table>
</body>
</html>
<?php
$out = ob_get_contents();
ob_end_clean();
include("MPDF54/mpdf.php");
$mpdf = new mPDF('c',array(216,330),'','',5,5,5,5,0,0);
$mpdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('MPDF54/mpdf.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($out);
$mpdf->Output();
?>


 
