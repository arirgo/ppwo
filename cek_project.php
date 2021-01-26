    <?php 
    require_once("config.php");
 $nopp=$_GET['id'];
  $group=$_GET['group'];
			$sqlanal	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$nopp."' and group_project='$group'");
							while($datanal	= mysqli_fetch_array($sqlanal))
							{
								
								echo   "-".$datanal['detail_pekerjaan']."&nbsp(&nbsp ".$datanal['waktu']." &nbsp Hari &nbsp ) <br>";
								
							}

								
			?>