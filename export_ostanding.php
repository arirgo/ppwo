<?php 
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=OSTANDING.xls");
date_default_timezone_set("Asia/Jakarta");

?>
<head>
<style type="text/css">
		.table-data{
			width: 100%;			
			border-collapse: collapse;			
		}

		.table-data tr th,
		.table-data tr td{
			height: 20px;
			border:1px solid black;
			font-size: 10pt;
			font-family: "Arial", sans-serif;
          
		}		

		h3 {
 
			font-family: "Arial", sans-serif;
}

	</style>
</head>
<?php
$tglf   =$_GET['tglf'];
$tglt   =$_GET['tglt'];
$dev    =$_GET['dev'];
$group  =$_GET['group'];
$stt    =$_GET['stt'];
$pls    =$_GET['pls'];



require_once('config.php');
?>
<table class="table-data">
    <tr  style="background:#C0C0C0;color:white;">
        <th>Project Type</th>
        <th>Application Name / Aplikasi Name</th>
        <th>Detail</th>
        <th>Status</th>
        <th>Document Type</th>
        <th>Document Numb</th>
        <th>Requestor</th>
        <th>It</th>
        <th>CEK</th>
        </tr>
        <?php if($group=="PP"){?>
                    <?php 
                    if($stt !='')
                    {
                        $input .="and status_pp='$stt' ";
                    }else{}
                    if($dev !='')
                    {
                        $input .="and it='$dev' ";
                    }else{}
                    if($tglf !='')
                    {
                        $input .="and tgl_lapor between '$tglf' and '$tglt' ";
                    }else{}

                    
                    $cekpp=mysqli_query($koneksi,"select * from tbl_pp where no_pp !=0 and pls='$pls' $input");
                    while ($dtpp=mysqli_fetch_array($cekpp)){
                    
                    $cekst=$dtpp['status_pp'];
                    if($cekst=="waiting"){
                        $warna="style='background:white;color:black'";
                        }
                    else if($cekst=="reject"){
                        $warna="style='background:#FF0000;color:black'";
                    } else if($cekst=="finish"){
                        $warna="style='background:	#6B8E23;color:black'";
                    }
                    else if($cekst=="on process"){
                        $warna="style='background:yellow;color:black'";
                    }else{}
                    ?>
                    <tr <?php echo $warna;?>>
                    <td></td>
                    <td></td>
                    <td><?php echo $dtpp['kerusakan'];?></td>
                    <td><?php  if($dtpp['status_pp']=="finish")
                                { echo"Done";}
                                else if($dtpp['status_pp']=="hold")
                                {
                                    echo"Pending";
                                }else{
                                echo  $dtpp['status_pp'];
                                }
                                ?></td>
                    <td><?php echo $group;?></td>
                    <td><?php echo $dtpp['no_pp'];?></td>
                    <td><?php echo $dtpp['pelapor'];?></td>
                    <td><?php echo $dtpp['diterima'];?></td>
                    <td><?php echo $dtpp['no_pp'];?></td>

                    </tr>
                    <?php } ?>
       <?PHP } else if($group=="WO"){?>
            
                      <?php 
                    if($stt !='')
                    {
                        $input .="and status_wo='$stt' ";
                    }else{}
                    if($dev !='')
                    {
                        $input .="and it='$dev' ";
                    }else{}
                    if($tglf !='')
                    {
                        $input .="and tgl_permohonan between '$tglf' and '$tglt' ";
                    }else{}

                    
                    $cekwo=mysqli_query($koneksi,"select * from tbl_wo where no_wo !=0 $input and pls='$pls'");
                    while ($dtwo=mysqli_fetch_array($cekwo)){
                    
                    $cekst=$dtwo['status_wo'];
                    if($cekst=="waiting"){
                        $warna="style='background:white;color:black'";
                        }
                    else if($cekst=="reject"){
                        $warna="style='background:#FF0000;color:black'";
                    } else if($cekst=="finish"){
                        $warna="style='background:	#6B8E23;color:black'";
                    }
                    else if($cekst=="on process"){
                        $warna="style='background:yellow;color:black'";
                    }else{}
                    ?>
                    <tr <?php echo $warna;?>>
                    <td></td>
                    <td><?php echo $dtwo['nama_project'];?></td>
                    <td><?php echo $dtwo['uraian_pekerjaan'];?></td>
                    <td><?php  if($dtwo['status_wo']=="finish")
                                { echo"Done";}
                                else if($dtwo['status_wo']=="hold")
                                {
                                    echo"Pending";
                                }else{
                                echo  $dtwo['status_wo'];
                                }
                                ?></td>
                    <td><?php echo $group;?></td>
                    <td><?php echo $dtwo['no_wo'];?></td>
                    <td><?php echo $dtwo['pemohon'];?></td>
                    <td><?php echo $dtwo['diterima'];?></td>
                    <td><?php echo $dtwo['no_wo'];?></td>

                    </tr>
                    <?php } ?>
    <?php } else{ ?>
        
              <!-- pp ---------------------------------------------------------- -->
                             <?php  
                                if($stt<>'')
                                    {
                                        $inputdata_pp .="and status_pp='$stt' ";
                                    }else{}
                                    if($dev<>'')
                                    {
                                        $inputdata_pp .="and it='$dev' ";
                                    }else{}
                                    if($tglf<>'')
                                    {
                                        $inputdata_pp .="and tgl_lapor between '$tglf' and '$tglt' ";
                                    }else{}

                                $query_inputpp=mysqli_query($koneksi,"select * from tbl_PP where no_pp !=0 and pls='$pls' $inputdata_pp ");
								if ($query_inputpp){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data_pp = mysqli_fetch_array($query_inputpp)){

                                           $cekst=$data_pp['status_pp'];
                                            if($cekst=="waiting"){
                                                $warna="style='background:white;color:black'";
                                                }
                                            else if($cekst=="reject"){
                                                $warna="style='background:#FF0000;color:black'";
                                            } else if($cekst=="finish"){
                                                $warna="style='background:	#6B8E23;color:black'";
                                            }
                                            else if($cekst=="on process"){
                                                $warna="style='background:yellow;color:black'";
                                            }else{}
										
										?>
                                        <tr  <?php echo $warna;?>>
									
                                        <td></td>
										<td><?php echo $data_pp['nama_project'];?></td>
									<?php
										echo '<td>'.$data_pp['kerusakan'].'</td>';
										echo '<td>'.$data_pp['status_pp'].'</td>';
										echo '<td>PP</td>';
										echo '<td>'.$data_pp['no_pp'].'</td>';
										echo '<td>'.$data_pp['pelapor'].'</td>';
                                        echo '<td>'.$data_pp['diterima'].'</td>';
                                        echo '<td>'.$data_pp['no_pp'].'</td>';
										
										echo '</tr>';
										
										$no++;
									}
								}?>
                 <!-- WO ------------------------------------- -->
                 
           <?PHP     if($stt<>'')
                    {
                        $inputdata .="and status_wo='$stt' ";
                    }else{}
                    if($dev<>'')
                    {
                        $inputdata .="and it='$dev' ";
                    }else{}
                    if($tglf<>'')
                    {
                        $inputdata .="and tgl_permohonan between '$tglf' and '$tglt' ";
                    }else{}

            ?>
           <?php   $query_input=mysqli_query($koneksi,"select * from tbl_wo where no_wo !=0 and pls='$pls' $inputdata ");
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){

                                        
                                           $cekst_wo=$data['status_wo'];
                                            if($cekst_wo=="waiting"){
                                                $warna_wo="style='background:white;color:black'";
                                                }
                                            else if($cekst_wo=="reject"){
                                                $warna_wo="style='background:#FF0000;color:black'";
                                            } else if($cekst_wo=="finish"){
                                                $warna_wo="style='background:	#6B8E23;color:black'";
                                            }
                                            else if($cekst_wo=="on process"){
                                                $warna_wo="style='background:yellow;color:black'";
                                            }else{}
										?>
                                        <tr <?php echo $warna_wo;?>>
                                        <td></td>
										<td><?php echo $data['nama_project'];?></td>
									<?php
										echo '<td>'.$data['uraian_pekerjaan'].'</td>';
										echo '<td>'.$data['status_wo'].'</td>';
										echo '<td>WO</td>';
										echo '<td>'.$data['no_wo'].'</td>';
										echo '<td>'.$data['pemohon'].'</td>';
                                        echo '<td>'.$data['diterima'].'</td>';
                                        echo '<td>'.$data['no_wo'].'</td>';
										
										echo '</tr>';
										
										$no++;
									}
								}?>
              
              <?php } ?>
    
   
</table>