<?php
session_start();

require_once('config.php');
  $id_user=$_POST['id_user'];
  $tgl1=$_POST['tgl1'];
  $tgl2=$_POST['tgl2'];
?>
<div><form name="fmdaily" id="fmdaily" class="fmdaily" method="post">
    <table width="80%" border="1" class="table table-striped table-bordered table-hover">
    <input type="hidden" value="1" id="total_modul"  name="jumlahmodul">
     <?php

   	$cektgl	= mysqli_query($koneksi,"select * from daily_report where tgl  BETWEEN '$tgl1' AND '$tgl2' and user='$id_user' group by tgl");
                            while($group_tgl	= mysqli_fetch_array($cektgl))
    {     
        $caritgl=$group_tgl['tgl'];
        ?>  
       <tr> <td colspan=8></td></tr>
    <tr style="background-color:#7EB7FD;" ><th>TANGGAL</th>
        <th >PROJEK</th>
        <th >JENIS</th>
        <th >PIC</th>
        <th >PEKERJAAN / MODUL</th>
        <th >DIMINTA OLEH</th>
        <th >SECTION</th>
        <th >KETERANGAN</th>

        
    </tr>
                  
 
    <?php
   	$sql_project	= mysqli_query($koneksi,"select * from daily_report where tgl='$caritgl' and user='$id_user'");
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
                            <?php } ?><br>
            --<?php echo $row_project['sub_modul'];?>
        </td>       
        <td><?php echo $row_project['pemohon'];?></td>
        <td><?php echo $row_project['section'];?></td>
    
        <td><?php echo $row_project['keterangan'];?></td>
     
      
    </tr>
 <?php	}
 }?>
    </table><br>

    
    </form>
</div>

