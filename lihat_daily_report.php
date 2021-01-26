<?php
session_start();
$nama=$_SESSION['username'];
require_once('config.php');
 $tgl=$_POST['id'];
?>
<div><form name="fmdaily" id="fmdaily" class="fmdaily" method="post">
    <table width="80%" border="1" class="table table-striped table-bordered table-hover">
    <input type="hidden" value="1" id="total_modul"  name="jumlahmodul">
    <tr style="background:blue;color:white;" ><th>TANGGAL</th>
        <th >PROJEK</th>
        <th >JENIS</th>
        <th >PIC</th>
        <th >PEKERJAAN / MODUL /SUB</th>
        <th >DIMINTA OLEH</th>
        <th >SECTION</th>
        <th >KETERANGAN</th>

        
    </tr>
   <?php
   	$sql_project	= mysqli_query($koneksi,"select * from daily_report where tgl ='".$tgl."' and user='$nama'");
							while($row_project	= mysqli_fetch_array($sql_project))
							{	?>
    <tr>
        <td><?php echo $row_project['tgl'];?></td>
        <td><?php echo $row_project['kategori'];?></td>
        <td><?php echo $row_project['project'];?></td>
        <td><?php $username=$row_project['user'];
                 $detail_daily	= mysqli_query($koneksi,"select * from user where username ='".$username."'");
		    	while($rowdetail	= mysqli_fetch_array($detail_daily))
							{	?>
          <?php echo $rowdetail['nama'];?>
                            <?php } ?>
        
        </td>
        <td>
         <?php 
                $nomodul=$row_project['modul'];
                $detail_daily	= mysqli_query($koneksi,"select * from detail_project where objectid ='".$nomodul."'");
		    	while($rowdetail	= mysqli_fetch_array($detail_daily))
							{	?>
          <?php echo $rowdetail['detail_pekerjaan'];?>
                            <?php } ?>
                            <br>
                --<?php echo $row_project['sub_modul'];?>
        </td>       
        <td><?php echo $row_project['pemohon'];?></td>
        <td><?php echo $row_project['section'];?></td>
    
        <td><?php echo $row_project['keterangan'];?></td>
     
      
    </tr>
 <?php	}?>
    </table><br>

    
    </form>
</div>

