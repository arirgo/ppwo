<?php

							
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<script src="sweetalert/sweetalert-dev.js"></script>
<link rel="stylesheet" href="sweetalert/sweetalert.css">
<script>
  $(document).ready(function()
  {
        $("#loading").hide();
  

  });
</script>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>PPWO</title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/colorpicker.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		
		<link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<script src="assets/js/ace-extra.min.js"></script>
		<script src="jquery-1.11.1.min.js"></script> 
		<script src="jquery-1.12.3.js"></script> 
		<link href="css1/bootstrap-table.css" rel="stylesheet">
		
		<style>
            .pilih:hover{
                cursor: pointer;
            }
        </style>
		<style>
            .pilih1:hover{
                cursor: pointer;
            }
        </style>
		<style>
            .pilih2:hover{
                cursor: pointer;
            }
        </style>
		
	</head>
	<body class="no-skin">
<?php include "menu-atas.php"; ?>
<?php include "menu-kiri.php"; ?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
						<a href="main_teknik.php">Home</a>
					</li>
				<li class="active"> Report Mingguan</li>
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Laporan Mingguan
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									ALL
								</small>
							</h1>
						</div><!-- /.page-header -->
							
										<!--daily  -->

								<div class="panel panel-default">
					
						<div class="panel-body">
						
							<div class="modal fade" id="mydaily" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:1300px; height:1000px;">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">INPUT DAILY</h4>
										</div>
									<div class="daily-body">
									</div>
								<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>

				<!--  -->
				<div class="panel panel-default">
					
						<div class="panel-body">
						
							<div class="modal fade" id="mydailyreport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:1100px; height:1000px;">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Daily Report</h4>
										</div>
									<div class="dailyreport-body">
									</div>
								<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
				
				<!-- -->
				<div class="panel panel-default">
					
					<div class="panel-body">
						
					
				<!-- -->
					<div class="panel-body">
						
							<div class="modal fade" id="finishModal" tabindex="-1" role="dialog" aria-labelledby="finishModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:700px">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="finishModalLabel">Input Pekerjaan</h4>
										</div>
									<div class="modal-body">
									</div>
								<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
				<!-- -->
				<!-- <button class="tambah-daily btn btn-app btn-primary btn-sm"><i class="ace-icon fa fa-pencil-square-o bigger-200"></i>ADD</button> -->
				<div class="panel-body">
	<?php
			
			if(isset($_POST['tombol'])){
  $tgl1=$_POST['tgl1'];
  $tgl2=$_POST['tgl2'];
  $group=$_POST['group'];
		?>
<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-4">
						<div>
							<form action="view_laporan.php" method="post">
							<table width="60%" class="table table-striped table-bordered table-hover">
								<tr>
									
									<td colspan="3">From
										<div class="input-group">
                                            <input class="form-control date-picker" id="tgl1" name='tgl1' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
									
										&nbsp; To &nbsp;
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="tgl2" name='tgl2' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
										</div><br>
										<div class="input-group">
                                            <select name="group" id="group">
											<option value="all">ALL</option>
											<option value="prog">Programer</option>
											<option value="inf">Infrastruktur</option>
											<option value="inf03">Nurul</option>
											<option value="it09">Yusup</option>
											<option value="it01">GUGUN</option>
											<option value="it02">Sopian</option>
											<option value="it08">Deni Setiyo</option>
											<option value="it10">Anggi MF</option>
											<option value="robby">Robby</option>
											</select>
                                        </div><br>
										<button type="submit" name="tombol" value="SEARCH" class="btn btn-primary"><i class="ace-icon fa fa-search" class="btn btn-primary"></i>Search</button>
										<a href="export_mingguan.php?tgl1=<?php echo $tgl1; ?>&tgl2=<?php echo $tgl2; ?>" class="btn btn-success"><i class="ace-icon fa fa-cloud-download"></i>Export ke Excell</a>
                             
									</td>
								</tr>
								
							</table>
							</form>
						</div>
					</div>
												
									</div><!-- /.col -->
								</div><!-- /.row -->
						
<?php
require_once('config.php');
$id_user	   =$_SESSION['username'];
  
$periode_awal  = $tgl1;
$periode_akhir = $tgl2;

// pisahkan tanggal, bulan tahun dari periode_awal
$explodeTgl1 = explode("-", $periode_awal);

// membaca bagian-bagian dari periode_awal
$tglpriod1 = $explodeTgl1[2];
$blnpriod1 = $explodeTgl1[1];
$thnpriod1 = $explodeTgl1[0];
 
// echo "<p>Hari Minggu pada Periode $periode_awal s/d $periode_akhir Jatuh pada Tanggal-Tanggal Berikut:</p>";


?>
<?php 

// if($group=="all"){
// 	$bg=2;
//   $tampiluser=mysqli_query($koneksi,"select*from user where dev in('inf','pro') and username in('it01','it02','it08','it10','robby','inf03','it09')");
// 	}else if($group=="prog"){
// 		$bg=1;
//   $tampiluser=mysqli_query($koneksi,"select*from user where dev in('pro') and username in('it01','it02','it08','it10','robby')");

// 	}else if($group=="inf"){
// 		$bg=1;
// 	$tampiluser=mysqli_query($koneksi,"select*from user where dev in('inf') and username in('inf03','it09')");

// 	} else{
// 	  $bg=1;
// 		$tampiluser=mysqli_query($koneksi,"select*from user where username ='$group'");
// 	}
if($group=="all")
{
	$bg=2;
}else{$bg=1;}


for($bagi=1;$bagi<=$bg;$bagi++){
	
	if($bg=="2" and $bagi=="1")
	{
	echo"<h3><b>PROGRAMMER WEEKS REPORT</b></h3><br>";
		$personil="'Anggi Mulyana Fauji','Gugun','Deni Setiyo','Robby Tirta','Sopian'";
	}else if($bg=="2" and $bagi=="2"){
		echo"<h3><b>INFRASTRUKTUR WEEKS REPORT</b></h3><br>";
		$personil="'Nurul','Mochamad Yusuf'";
	}else if($bg=="1" and $group=="prog"){
		echo"<h3><b>PROGRAMMER WEEKS REPORT</b></h3><br>";
		$personil="'Anggi Mulyana Fauji','Gugun','Deni Setiyo','Robby Tirta','Sopian'";
	}else if($bg=="1" and $group=="inf"){
		echo"<h3><b>INFRASTRUKTUR WEEKS REPORT</b></h3><br>";
		$personil="'Nurul','Mochamad Yusuf'";
	}else{
			
			$tampiluser=mysqli_query($koneksi,"select*from user where username ='$group'");
	
  		$dtuser	= mysqli_fetch_array($tampiluser);
   		$id_user=$dtuser['username'];
		 $nama_user=$dtuser['nama'];	
		 	echo"<h3><b>".$nama_user." WEEKS REPORT</b></h3><br>";
			$personil="'".$nama_user."'";
	}
	?>	
<div><form name="fmdaily" id="fmdaily" class="fmdaily" method="post">
<?php
// counter looping
$i = 0;
// counter untuk jumlah hari minggu
$sum = 0;
 
do
{
    // mengenerate tanggal berikutnya
	$tanggal = date("Y-m-d", mktime(0, 0, 0, $blnpriod1, $tglpriod1+$i, $thnpriod1));

    // cek jika harinya minggu, maka counter $sum bertambah satu, lalu tampilkan tanggalnya
    if (date("w", mktime(0, 0, 0, $blnpriod1, $tglpriod1+$i, $thnpriod1)) == 0)
    {
	
		     $sum++;
		// echo $tanggal."<br>";
	
		//mencri awal minggu
		$explodeTgl2 = explode("-", $tanggal);
		$tglawalmggu2 = $explodeTgl2[2];
		$blnawalmggu2 = $explodeTgl2[1];
		$thnawalmggu2 = $explodeTgl2[0];

			$awalminggu = date("Y-m-d", mktime(0, 0, 0, $blnawalmggu2, $tglawalmggu2-6, $thnawalmggu2));
		
?>	<h5><b> PRIODE : <?php echo $awalminggu;?> S/D <?php echo $tanggal;?></b></h3>
	

   <table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
   	<thead>
    <input type="hidden" value="1" id="total_modul"  name="jumlahmodul">
    <tr style="background-color:#7EB7FD;" >
        <th >NO</th>
	    <th >Uraian</th>
		<th >PROJECT / APLIKASI</th>
        <th >Modul</th>
		<th >PIC</th>
        <th >TGL SELESAI</th>
		<th >PP/WO</th>
		<th >ket</th>
    </tr>
    </thead>
    <tbody>
		
	<?php 
	 $tanggal1 = date('Y-m-d',strtotime($awalminggu));
     $tanggal2 = date('Y-m-d',strtotime($tanggal));
		  $NO=1;
	// while ($tanggal1 <= $tanggal2) {
	// 	 $tanggal1.'<br>';
	 
	$sql_pp	= mysqli_query($koneksi,"SELECT * FROM `tbl_pp` where (tgl_m_kerja between '$tanggal1' and '$tanggal2' and diterima in($personil)) or (tgl_s_kerja between '$tanggal1' and '$tanggal2' and diterima in ($personil)) or tgl_s_kerja='0000-00-00' and diterima in ($personil) group by no_pp ");
							while($row_pp	= mysqli_fetch_array($sql_pp))
		{ 
		
			$nop=$row_pp['no_pp'];
		$sql_sts	= mysqli_query($koneksi,"SELECT * FROM tbl_pp where no_pp='$nop'");
		$stts= mysqli_fetch_array($sql_sts);
		
		?>
	<tr><td><?php echo $NO++;?></td>
		<td><?php echo $row_pp['kerusakan'];?></td>
		<td><?php echo $row_pp['nama_project'];?></td>
		<td ></td>
		<td><?php echo $row_pp['diterima'];?></td>
		<td><?php echo $stts['tgl_s_kerja'];?></td>
		<td><?php echo $row_pp['no_pp'];?></td>
		<td>
	<?php
		if($stts['tgl_s_kerja'] <= $tanggal2 && $stts['tgl_s_kerja']!='0000-00-00')
		{
			echo "finish";
		}else if($stts['tgl_hold'] <= $tanggal2 && $stts['tgl_s_kerja']=='0000-00-00'){ if(($stts['tgl_release']=='0000-00-00' && $stts['tgl_hold'] !='0000-00-00')){echo"hold"; } 
		else{echo"on progress";}
		}
		
		else{ echo"on progress";}
		
		
		?>
		</td>
		</tr>
		<?php }	
		//-----------------------------------modul PP
		$sql_projpp	= mysqli_query($koneksi,"SELECT * FROM `modul_pp` where (tgl_mulai between '$tanggal1' and '$tanggal2' and dikerjakan in($personil)) or (tgl_selesai between '$tanggal1' and '$tanggal2' and dikerjakan in($personil))or tgl_selesai='0000-00-00' and dikerjakan in($personil) group by objectid ");
							while($row_projpp	= mysqli_fetch_array($sql_projpp))
		{ 
		$objprojpp=$row_projpp['objectid'];
		$projpp=$row_projpp['no_pp'];
		$sql_stsprojpp	= mysqli_query($koneksi,"SELECT * FROM modul_pp where objectid='$objprojpp'");
		$sttsprojpp= mysqli_fetch_array($sql_stsprojpp);
		
		$sql_cekpp	= mysqli_query($koneksi,"SELECT * FROM tbl_pp where no_pp='$projpp'");
		$sttscekpp= mysqli_fetch_array($sql_cekpp);
		$wokupp=$sttscekpp['kerusakan'];
		?>
		<tr><td><?php echo $NO++;?></td>
		<td><?php echo $wokupp;?></td>
		<td><?php echo $sttscekpp['nama_project'];?></td>
		<td ><?php echo $row_projpp['nama_modulpp']." (PP)"?></td>
		<td><?php echo $row_projpp['dikerjakan'];?></td>
		<td><?php echo $sttsprojpp['tgl_selesai'];?></td>
		<td><?php echo $row_projpp['no_pp'];?></td>
		<td>
	<?php
	 $sttsprojpp['tgl_selesai'] ;
		if($sttsprojpp['tgl_selesai'] <= $tanggal2 && $sttsproj['tgl_s_selesai']!='0000-00-00')
		{
			echo "finish";
		}else if($sttsprojpp['tgl_hold'] <= $tanggal2 && $sttsprojpp['tgl_selesai']=='0000-00-00')
			{ 
				if(($sttsprojpp['tgl_release']=='0000-00-00' && $sttsprojpp['tgl_hold'] !='0000-00-00'))
				{echo"hold"; } else{echo"on progress";}
		}
		
		else{ echo"on progress";}
		
		?>
		</td>
		</tr>
		<?php }?>

		 <!-- --------------------------------------work order -->
		
		<?php	$sql_wo	= mysqli_query($koneksi,"SELECT * FROM `tbl_wo` where (tgl_m_kerja between '$tanggal1' and '$tanggal2' and diterima in($personil)) or (tgl_s_kerja between '$tanggal1' and '$tanggal2' and diterima in ($personil))or tgl_s_kerja='0000-00-00' and diterima in($personil) group by no_wo ");
							while($row_wo	= mysqli_fetch_array($sql_wo))
		{ 
			$now=$row_wo['no_wo'];
		$sql_stswo	= mysqli_query($koneksi,"SELECT * FROM tbl_wo where no_wo='$now'");
		$sttswo= mysqli_fetch_array($sql_stswo);
		
		?>
	<tr><td ><?php echo $NO++;?></td>
		<td><?php echo $row_wo['uraian_pekerjaan'];?></td>
		<td><?php echo $row_wo['nama_project'];?></td>
		<td ></td>
		<td><?php echo $row_wo['diterima'];?></td>
		<td><?php echo $sttswo['tgl_s_kerja'];?></td>
		<td><?php echo $row_wo['no_wo'];?></td>
		<td>
	<?php
	 $sttswo['tgl_s_kerja'] ;
		if($sttswo['tgl_s_kerja'] <= $tanggal2 && $sttswo['tgl_s_kerja']!='0000-00-00')
		{
			echo "finish";
		}else if($sttswo['tgl_hold'] <= $tanggal2 && $sttswo['tgl_s_kerja']=='0000-00-00'){ if(($sttswo['tgl_release']=='0000-00-00' && $sttswo['tgl_hold'] !='0000-00-00')){echo"hold"; } 
		else{echo"on progress";}
		}
		
		else{ echo"on progress";}
		
		?>
		</td>
		</tr>
		<?php }
//-----------------------------------modulllllll
		$sql_proj	= mysqli_query($koneksi,"SELECT * FROM `detail_project` where (tgl_m_kerja between '$tanggal1' and '$tanggal2' and username in($personil)) or (tgl_s_kerja between '$tanggal1' and '$tanggal2' and username in($personil))or tgl_s_kerja='0000-00-00' and username in($personil) group by objectid ");
							while($row_proj	= mysqli_fetch_array($sql_proj))
		{ 
		$objproj=$row_proj['objectid'];
		$proj=$row_proj['no_project'];
		$sql_stsproj	= mysqli_query($koneksi,"SELECT * FROM detail_project where objectid='$objproj'");
		$sttsproj= mysqli_fetch_array($sql_stsproj);
		
		$sql_cek	= mysqli_query($koneksi,"SELECT * FROM tbl_wo where no_wo='$proj'");
		$sttscek= mysqli_fetch_array($sql_cek);
		$woku=$sttscek['uraian_pekerjaan'];
		?>
	<tr><td><?php echo $NO++;?></td>
		<td><?php echo $woku;?></td>
		<td><?php echo $row_proj['soft_hard'];?></td>
		<td ><?php echo $row_proj['detail_pekerjaan']."(".$row_proj['group_project'].")"?></td>
		<td><?php echo $row_proj['username'];?></td>
		<td><?php echo $sttsproj['tgl_s_kerja'];?></td>
		<td><?php echo $row_proj['no_project'];?></td>
		<td>
	<?php
	 $sttsproj['tgl_s_kerja'] ;
		if($sttsproj['tgl_s_kerja'] <= $tanggal2 && $sttsproj['tgl_s_kerja']!='0000-00-00')
		{
			echo "finish";
		}else if($sttsproj['tgl_hold'] <= $tanggal2 && $sttsproj['tgl_s_kerja']=='0000-00-00')
			{ 
				if(($sttsproj['tgl_release']=='0000-00-00' && $sttsproj['tgl_hold'] !='0000-00-00'))
				{echo"hold"; } else{echo"on progress";}
		}
		
		else{ echo"on progress";}
		
		?>
		</td>
		</tr>
		<?php }?>

    
 </tbody>
    </table><br>
<?php

   
    }    

    // increment untuk counter looping
    $i++;
}


while ($tanggal != $periode_akhir);  
// looping di atas akan terus dilakukan selama tanggal yang digenerate tidak sama dengan periode awal.

// tampilkan jumlah hari Minggu
// echo "<p>Jumlah hari minggu antara ".$periode_awal." s/d ".$periode_akhir." adalah: ".$sum."</p>";
?>	
    
    </form>

</div>
 <?php }?>    <!--group-->
						</div>
					</div>
				</div>
			</div>
				
									
					</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->
<?php }else{?>
<!-- -------------------------------------------------------------------------------------------------awal -->
 <?php
			               $tgl1=date('Y-m-d');
						   $tgl2=date('Y-m-d');
						
                            ?>	
<div class="row">
				<div class="space-6"></div>
					<div class="col-sm-4">
						<div>
							<form action="view_laporan.php" method="post">
							<table width="60%" class="table table-striped table-bordered table-hover">
								<tr>
									
									<td colspan="3">From
										<div class="input-group">
                                            <input class="form-control date-picker" id="tgl1" name='tgl1' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
									
										&nbsp; To &nbsp;
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="tgl2" name='tgl2' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
										</div> <br>
										<div class="input-group">
                                            <select name="group" id="group">
											<option value="all">ALL</option>
											<option value="prog">Programer</option>
											<option value="inf">Infrastruktur</option>
											<option value="inf03">Nurul</option>
											<option value="it09">Yusup</option>
											<option value="it01">GUGUN</option>
											<option value="it02">Sopian</option>
											<option value="it08">Deni Setiyo</option>
											<option value="it10">Anggi MF</option>
											<option value="robby">Robby</option>
											</select>
                                        </div><br>
										<button type="submit" name="tombol" value="SEARCH" class="btn btn-primary"><i class="ace-icon fa fa-search"></i>Search</button>
										<a href="export_mingguan.php?tgl1=<?php echo $tgl1; ?>&tgl2=<?php echo $tgl2; ?>&group=<?php echo $group; ?>" class="btn btn-success"><i class="ace-icon fa fa-cloud-download"></i>Export ke Excell</a>
                             
									</td>
								</tr>
								
							</table>
							</form>
						</div>
					</div>
												
									</div><!-- /.col -->
								</div><!-- /.row -->

								
					 	

<?php }?>


					
<?php include "menu-bawah.php"; ?>
		<script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>
		
		
		

		<script>

				 $(function(){
            $(document).on('click','.lihat_daily_report',function(e){
                e.preventDefault();
                $("#mydailyreport").modal('show');
                $.post('lihat_daily_report.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".dailyreport-body").html(html);
                    }   
                );
            });
        });

		 $(function(){
            $(document).on('click','.tambah-daily',function(e){
                e.preventDefault();
                $("#mydaily").modal('show');
                $.post('forminput_daily.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".daily-body").html(html);
                    }   
                );
            });
        });
				 $(function(){
            $(document).on('click','.tambah-plan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('formwo_plan_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
       
        
        
         $(function(){
            $(document).on('click','.lihat_daily',function(e){
                e.preventDefault();
                $("#finishModal").modal('show');
                $.post('finish_wo_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
		
	
</body>
</html>

