<?php
$no_request     =$_POST['id_pr'];
$jenis          =$_POST['jenis'];
$user_request   =$_POST['user_request'];
$obj   =$_POST['obj'];

session_start();
 $usernm   =$_SESSION['username'];
  $pls   =$_SESSION['pls'];
require_once('config.php');
$cekuser = mysqli_query($koneksi,"select * from user where username='".$usernm."'");
$dtusrcek  = mysqli_fetch_array($cekuser);
$dtusr=$dtusrcek['level_user']
?>

<?php 
	

if($dtusr=="h_it")
{?>
<form name="f_hold" action="simpan_no_pr.php" method="post">
<table>
    <tr>
		<td>
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1" required>No. PR</label>
		</td>
		<td>
			<input type="text"  name="nopr" size="20" required/>
			<input type="hidden"  name="obj" size="20" value="<?php echo $obj;?>" required/>
			<input type="hidden"  name="jns" size="20" value="<?php echo $jenis;?>" required/>
			<input type="hidden"  name="user_req" size="20" value="<?php echo $user_request;?>" required/>
			<input type="hidden"  name="no_req" size="20" value="<?php echo $no_request;?>" required/>
			<input type="hidden"  name="leveluser" size="20" value="<?php echo $dtusr;?>" required/>

	</tr>
	<tr>
		<td colspan="2" align="center">
		<!-- <button class="btn btn-sm btn-primary" name="tombolreq" type="submit"><i class="ace-icon fa fa-check"></i>Submit</button> -->
		<input type="submit" value="SUMBIT" name="tombolreq">	
		</td>
	</tr>
</table>
</form>
<?php }else{
	?>

<center>


									
								<?PHP
								 date_default_timezone_set('Asia/Jakarta');
            					$tgl=date('Y-m-d');
								$sql = mysqli_query($koneksi,"select * from user where username='".$usernm."'");
								$data2 = mysqli_fetch_array($sql);
								///tessss
								$sqlreq = mysqli_query($koneksi,"select * from request where objectid='".$obj."' and no_request='$no_request' ");
								$datareq = mysqli_fetch_array($sqlreq);
								$sub=$datareq['katagori'];
								$nmbrg=$datareq['nm_barang'];
								$sqlkom = mysqli_query($koneksi,"select * from inventarisi where group_brg='$sub' and nama_barang='$nmbrg' ");
								$datakom = mysqli_fetch_array($sqlkom);
					
					?>
					<form name="f_hold" action="simpan_no_pr.php" method="post" >
					<input type="hidden" name="obj" id="obj" value="<?php echo $obj;?>">
								<table align="center">
								<tr><td>PPWO</td>
									<td><input type="text" id="ppwo" name="ppwo" value="<?php echo $no_request;?>" readonly></td>
								</tr>
								<tr><td>NO PO</td>
									<td><input type="text" id="nopo" name="nopo" required></td>
								</tr>
								<tr><td>NO PR</td>
									<td><input type="text" id="nopr" name="nopr"  value="<?php echo $datareq['no_pr'];?>" required readonly></td>
								</tr>
								<tr><td>Surat Jalan</td>
									<td><input type="text" id="sj"  name="sj" required></td>
								</tr>
								<tr><td>Jenis Barang</td>
									<td> 
									<input hidden type="text" name="cb_brg" id="cb_brg" value="<?php echo $datakom['objectid']; ?>">
									 
										<input type="text" name="subnmbrg" id="subcategory" value="<?php echo $datakom['group_brg']; ?>" readonly>
									
									</td>
								</tr>
								<tr><td>Nama Barang</td>
									<td><input type="text" id="form-field-1"  name="nmbrg" id="nmbrg" value="<?php echo $datareq['nm_barang']?>" required readonly>
										
									</td>
								</tr>
								<tr><td>Jumlah</td>
									<td><input type="text" id="form-field-1"  name="jmlbrg" id="jmlbrg" value="<?php echo $datareq['jumlah'];?>" required readonly  onkeypress="return hanyaAngka(event)"></td>
								</tr>
								<tr><td>User Input</td>
									<td><input type="text"  name="userinput" id="userinput" value="<?php echo $data2['nama'];?>" class="col-xs-10 col-sm-5" readonly required /></td>
								</tr>
								<tr><td>Tanggal Masuk</td>
									<td><input type="text" id="tglmsk"   data-date-format="yyyy-mm-dd" autocomplete="off" name="tglmsk" value="<?php echo $tgl;?>" ></td>
								</tr>
								<tr><td>Keterangan</td>
									<td><input type="text" id="ketmsk"  name="ketmsk"></td>
								</tr>
									<input type="hidden"  name="jns" size="20" value="<?php echo $jenis;?>" required/>
			<input type="hidden"  name="user_req" size="20" value="<?php echo $user_request;?>" required/>
			<input type="hidden"  name="no_req" size="20" value="<?php echo $no_request;?>" required/>
			<input type="hidden"  name="leveluser" size="20" value="<?php echo $dtusr;?>" required/>

<tr><td align="center"><input type="submit" value="TERIMA BARANG" name="tombolreq" class="btn btn-primary"></td></tr>
								</table>
							
</center>




		

</form>
<?php } ?>