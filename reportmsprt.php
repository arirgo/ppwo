<?php
ob_start();
?>
<?php

	include "koneksi.php";
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
			 		<td valign="top" ><img src="img/plasindologo.png" alt="Aplikasi magang logo" width="216px" height="31px" /></td>
			 		<td><h1><?PHP echo $ms['Area']; ?></h1> </td>
			 	
			 		<td align="right">
						<table  cellpadding="3" cellspacing="0" style="border:1px solid #000;"><tr>
							<td style="border-bottom:1px solid #000;  border-right:1px solid #000;"> No. Form</td><td style="border-bottom:1px solid #000;">  RD - 10</td></tr>
              <tr><td style="border-bottom:1px solid #000;  border-right:1px solid #000;">  No. Rev</td><td style="border-bottom:1px solid #000;">0</td></tr>
              <tr><td style="border-right:1px solid #000;">Tanggal</td><td>16 - 05 - 2011</td></tr>
              
              </table>
            
              </td>
			 				 			 		
			 		
			 		</tr>
			 	<tr><td colspan=3 style="border-bottom:1px solid #000;"></td></tr>
        <tr><td align="left">Rev : <?PHP echo $ms['Rev']; ?></td><td align="center">&nbsp;</td><td align="right">Mesin : <?PHP echo $ms['Mesin']; ?></td></TR>
        <tr><td align="left">Tgl : <?PHP echo substr($ms['Tgl'],0,10); ?></td><td align="center">&nbsp;</td><td align="right">&nbsp;</td></TR>
         <tr><td colspan=3 align="center" bgcolor="#E6E6FA"><H1><?PHP echo $ms['Kode_FG']; ?> </H1></td></TR>
        	<tr><td colspan=3 >
          
          
<table align="center" style="border:1px solid #000" width="800" cellpadding="0" cellspacing="0"> 
<tr>
	<th style='border-bottom:1px solid #000; font-size:7px;'> Unit </th>
    <th style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'> 1 </th>
    <th style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'> 2 </th>
	<th style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'> 3 </th>
    <th style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'> 4 </th>
    <th style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'> 5	</th>
    <th style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'> 6 </th>
	<th style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'> 7	</th>
    <th style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'> 8 </th>
	<th style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'> 9 </th>
	<th style='border-left:1px solid #000; border-bottom:1px solid #000; font-size:7px;'> 10 </th>
    
</tr>
<?php  
// Perintah untuk menampilkan data

$hasil= mysql_query ("SELECT * FROM ms_bahantintanew where parentobjectid='$oid'") ;

// perintah untuk membaca dan mengambil data dalam bentuk array
while ($data = mysqli_fetch_array ($hasil)){
 echo "    
        <tr>
        <td style='border-bottom:1px solid #000; font-size:7px;'>".$data['Deskripsi']."</td>
        <td style='border-left:1px solid #000; font-size:7px; border-bottom:1px solid #000; text-align:center;'>".$data['satu']."</td> 
        <td style='border-left:1px solid #000; font-size:7px; border-bottom:1px solid #000; text-align:center;'>".$data['dua']."</td>
        <td style='border-left:1px solid #000; font-size:7px; border-bottom:1px solid #000; text-align:center;'>".$data['tiga']."</td>
        <td style='border-left:1px solid #000; font-size:7px; border-bottom:1px solid #000; text-align:center;'>".$data['empat']."</td>
        <td style='border-left:1px solid #000; font-size:7px; border-bottom:1px solid #000; text-align:center;'>".$data['lima']."</td>
        <td style='border-left:1px solid #000; font-size:7px; border-bottom:1px solid #000; text-align:center;'>".$data['enam']."</td>
        <td style='border-left:1px solid #000; font-size:7px; border-bottom:1px solid #000; text-align:center;'>".$data['tujuh']." </td>
        <td style='border-left:1px solid #000; font-size:7px; border-bottom:1px solid #000; text-align:center;'>".$data['delapan']."</td>
		<td style='border-left:1px solid #000; font-size:7px; border-bottom:1px solid #000; text-align:center;'>".$data['sembilan']." </td>
		<td style='border-left:1px solid #000; font-size:7px; border-bottom:1px solid #000; text-align:center;'>".$data['sepuluh']." </td></tr> ";

}

?>
</table>
          </td></tr>
 <tr><td colspan=3 >       


<table align="center" style="border:1px solid #000" width="800" cellpadding="0" cellspacing="0"> 
<tr>
  <th colspan=6 style='border-bottom:1px solid #000; font-size:8px;' > KOMPOSISI TINTA </th>
    
</tr>
<?php  
// Perintah untuk menampilkan data
$no=1;
$hasil= mysql_query ("SELECT * FROM ms_kompostintanew where parentobjectid='$oid'") ;

// perintah untuk membaca dan mengambil data dalam bentuk array
while ($data = mysqli_fetch_array ($hasil)){
 echo " <tr><td font-size:7px; rowspan2><strong>UNIT".$no."</strong></td>
			<td style='border-left:1px solid #000; border-bottom:0.5px solid #000;  border-bottom-style:dashed; border-right:1px solid #000; font-size:7px; text-align:center;'>".$data['desc1']."</td>
			<td style='border-bottom:0.5px solid #000;  border-bottom-style:dashed; border-right:1px solid #000; font-size:7px; text-align:center;'>".$data['desc2']."</td>
			<td style='border-bottom:0.5px solid #000;  border-bottom-style:dashed; border-right:1px solid #000; font-size:7px; text-align:center;'>".$data['desc3']."</td>
			<td style='border-bottom:0.5px solid #000;  border-bottom-style:dashed; border-right:1px solid #000; font-size:7px; text-align:center;'>".$data['desc4']."</td>
			<td style='border-bottom:0.5px solid #000;  border-bottom-style:dashed; border-right:1px solid #000; font-size:7px; text-align:center;'>".$data['desc5']."</td>
		</tr> "; 
 echo " <tr><td style='border-bottom:1px solid #000;'></td>
			<td style='border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000; font-size:7px; text-align:center;'>".$data['val1']."</td>
			<td style='border-bottom:1px solid #000; border-right:1px solid #000; font-size:7px; text-align:center;'>".$data['val2']."</td>
			<td style='border-bottom:1px solid #000; border-right:1px solid #000; font-size:7px; text-align:center;'>".$data['val3']."</td>
			<td style='border-bottom:1px solid #000; border-right:1px solid #000; font-size:7px; text-align:center;'>".$data['val4']."</td>
			<td style='border-bottom:1px solid #000; border-right:1px solid #000; font-size:7px; text-align:center;'>".$data['val5']."</td>
		</tr> ";
		$no++;
     
}

?>
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


 
