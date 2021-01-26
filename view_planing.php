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
		<title>Penilaian PP/WO</title>

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
<?php include "menu-kiri.php"; 
$pls=$_SESSION['pls'];
?>

<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
						<a href="#">Home</a>
					</li>
				<li class="active">Penilaian PP/WO</li>
			</ul><!-- /.breadcrumb -->

					</div>
				<!-- -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="width:1200px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel">Detail PP</h4>
								</div>
								<div class="pp-modal-body"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				
				<!-- -->
				
				<!-- -->
					<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
						<div class="modal-dialog" style="width:1200px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel2">Detail WO</h4>
								</div>
								<div class="wo-modal-body"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				
				<!-- -->
					<div class="modal fade" id="myModalnilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
						<div class="modal-dialog" style="width:300px">
							<div class="modal-content">
								<div class="modal-header" style="background:#87CEEB;">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<center><h4 class="modal-title" id="myModalLabel2" style="color:white;">NILAI </h4></center>
								</div><br>
								<div class="modalnilai-body"></div>
								<div class="modal-footer" style="background:#87CEEB;">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
		<!-- tampilan 2 row -->
<?php date_default_timezone_set("Asia/Jakarta");


 if(isset($_POST['tombolplan'])){
$tgl1=$_POST['tgl1'];
$tgl2=$_POST['tgl2'];
?>
<div class="panel-body">
<form action="view_planing.php" method="post">
<table>
<tr>
	<td>FROM</td><td><input type="text" name="tgl1" id="tgl1" class="form-control date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"></td>
	<td>To</td><td><input type="text" name="tgl2" id="tgl2" class="form-control date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"></td>
	<td><button type="submit" name="tombolplan" value="SEARCH" class="btn btn-primary"><i class="ace-icon fa fa-search"></i>Search</button></td>
	<td><a href="export_nilai.php?tgl1=<?php echo $tgl1; ?>&tgl2=<?php echo $tgl2; ?>" class="btn btn-success"><i class="ace-icon fa fa-cloud-download"></i>Export  ke Excell</a> </td>
</tr>
</table>
</form>
<div class="row">
				
<div class="col-sm-12">
<div class="panel-heading">List penilaianPermintaan Perbaikan</div>

<table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
							
 <tr>
	<th data-sortable="true">No.</th>
	<th  data-sortable="true">Nomor PP</th>
	<th  data-sortable="true">pekerjaan</th>
	<th  data-sortable="true">Action</th>
	<th  data-sortable="true">Downtime</th>
	<th  data-sortable="true">Komputer</th>
	<th  data-sortable="true">%</th>
	<th  data-sortable="true">Nilai</th>
	<th  data-sortable="true">IT</th>
	<th  data-sortable="true">Proses</th>
    </tr>
   </thead>
   <tbody>
   <?php 
   $no=1;
    require_once("config.php"); 
	$view	= mysqli_query($koneksi,"select * from tbl_pp where status_pp in('finish','complete') AND tgl_s_kerja between '$tgl1' and '$tgl2' and pls='$pls' and tgl_s_kerja >'2020-07-05'");
                           while ($datapp	= mysqli_fetch_array($view))
                           {
	   $nopp		=$datapp['no_pp'];   
	   $diterima_pp	=$datapp['diterima'];  
	   $ceknilai	= mysqli_query($koneksi,"select * from nilai_pp where username='$diterima_pp' and no_pp='$nopp' ");
	   $datanilai	= mysqli_fetch_array($ceknilai);					
					
		
		?>
  
		<tr><td> <?php echo $no++; ?> </td>
		<td><a href="#" class="edit-record" data-id="<?php echo $datapp['no_pp']; ?>" > <?php echo $datapp['no_pp']; ?></a> </td>
		<!-- <td> <?php echo $datapp['diterima']; ?> </td> -->
		<td> <?php echo $datapp['tgl_m_kerja']; ?> </td>
		<td> <?php echo $datapp['status_pp']; ?> </td>
		<td> <?php echo $datapp['downtime']; ?> </td>
		<td> <?php echo $datapp['komputer']; ?> </td>
		<td><?php 
			$komp=$datapp['komputer'];
			$ttldown	=strval($datapp['downtime']);
			$que 		= mysqli_query($koneksi,"SELECT * from master_komputer where nama_komputer='$komp' and pls='$pls'");
			$datq 		= mysqli_fetch_array($que);
			
			$wktukom	 	= $datq['waktu'];
		//	$ttlpc	 	= $datq['waktu'];
			// $ttlhrpc 	= (25*($ttlpc * 60));
			//  $pdt =	strval(($ttldown / $ttlhrpc)*100);
			// echo	"".number_format($pdt,2)." %";
		
		
		if($wktukom==8 OR $datapp['it']=="prog")
			{
			$ttlpc="8";
			}else 
			{
 			$ttlpc="24";
			}
			$ttlpc;
			$ttlhrpc 	= (25*($ttlpc * 60));
			$pdt =	strval(($data['downtime'] / $ttlhrpc)*100);
			echo	"".number_format($pdt,2)." %";
			// $cekpersen=round($pdt,1);
		
		
		?> 	
		</td>
		<td>
			 <?php if($datanilai['nilai_pp']==''){  } else{ echo $datanilai['nilai_pp'];}?>
		</td>
		<td><?php echo $datapp['it'];?></td>
		<td>
		<?php session_start();
			 $usernm=$_SESSION['username'];
			require_once("config.php"); 
			$cekuser=mysqli_query($koneksi,"select *from user where username='$usernm'");
			$levuser=mysqli_fetch_array($cekuser);
			 $levuser['level_user'];

					if($levuser['level_user']=="h_it" OR $levuser['username']=="it01")
						{
							if($datanilai['nilai_pp']==''){?>
							<a href="#" nama="nilaipp" id="nilaipp" it="<?php echo $datapp['it']; ?>" data-pp="<?php echo $datapp['no_pp']; ?>" data-user="<?php echo $datapp['diterima']; ?>" data-group="PP"  class="btn btn-minier btn-primary" ><i class="ace-icon fa fa-pencil-square-o"></i>NILAI</a> </td>
								<?php	}else{?>
								
									<a href="#" nama="nilaipp" id="nilaipp" it="<?php echo $datapp['it']; ?>" data-pp="<?php echo $datapp['no_pp']; ?>" data-user="<?php echo $datapp['diterima']; ?>" data-group="PP"  class="btn btn-minier btn-succes" ><i class="ace-icon fa fa-pencil-square-o"></i>UPDATE</a> </td>
		
								<?php }?>   			
						<?php } else{
									if($datanilai['nilai_pp']==''){?>
									on process </td>				
									<?php }else{ ?>
									
								- </td>
								
								<?php }
							}?> 
		</td>
	</tr>

		<?php
						}?>
                            </tbody>
							</table>
</div>
					
	<div class="vspace-12-sm"></div>				
	<!-- ROW 2 -->
</div>
<div class="row">
	<div class="col-sm-12">
<div class="panel-heading">Penilaian Work Order

</div>	
					
<table data-toggle="table"  id="example2"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc" >
<thead>						
	<tr>
		<th data-sortable="true">No.</th>
		<th  data-sortable="true">Nomor WO</th>
		<!-- <th  data-sortable="true">Pemohon</th> -->
		<th  data-sortable="true" >pekerjaan</th>
		<th  data-sortable="true">Planing/Hari</th>
		<th  data-sortable="true">Planing Selesai</th>
        <th  data-sortable="true">Status</th>
		<th  data-sortable="true">Aktual</th>
		<th  data-sortable="true">Losetime</th>
		<th  data-sortable="true">Analisi</th>
		<th  data-sortable="true">Programing</th>
		<th  data-sortable="true">Dokumentasi</th>
		<th  data-sortable="true">Point</th>
		<!-- <th  data-sortable="true" >Nilai</th> -->
		<th  data-sortable="true">IT</th>
		<th  data-sortable="true">PROSES NILAI</th>

		
</thead>

<tbody>
<?php 
   $no=1;
    require_once("config.php"); 
	$view	= mysqli_query($koneksi,"select * from tbl_wo where status_wo in('finish') AND tgl_s_kerja between '$tgl1' and '$tgl2' and pls='$pls' and tgl_s_kerja >'2020-07-05'");
                           while ($datawo	= mysqli_fetch_array($view))
                           {
	$diterima_wo=$datawo['diterima'];
	$nowo		=$datawo['no_wo'];
	
							   
	$ceknilai	= mysqli_query($koneksi,"select * from nilai_wo where username='$diterima_wo' and no_wo='$nowo'");
	$datanilai	= mysqli_fetch_array($ceknilai);						 
							 ?>
	<tr><td> <?php echo $no; ?> </td>
	<td><a href="#" class="edit-record2" data-id="<?php echo $datawo['no_wo']; ?>" > <?php echo $datawo['no_wo']; ?> </a></td>
	<!-- <td> <?php echo $datawo['pemohon']; ?> </td> -->
	<td> <?php echo $datawo['tgl_m_kerja']; ?> </td>
	<td> 
		<?php $plan=mysqli_query($koneksi,"select sum(waktu) as hari from  detail_project where no_project='$nowo'");
			  $planing=mysqli_fetch_array($plan);
			  if($planing==''){echo "0";}else{
			  echo $cekplan=$planing['hari'];}
		?>
	</td>
	<td >
				<?php 
				$mulai=$datawo['tgl_m_kerja'];
				echo "<i style='color:#FFA500;'>".$kemarin = date('Y-m-d', strtotime("+$cekplan day", strtotime(date($mulai))))."</i>"; ?>
	</td>
	<td> <?php echo $datawo['status_wo']; ?> </td>
	<td><i style='color:green;' > <?php echo $datawo['tgl_s_kerja']; ?></i> </td>
	<td ><i style="color:red;" > <?php $mulai=$datawo['tgl_m_kerja'];
			   $selesai=$datawo['tgl_s_kerja'];
			  if($selesai !="0000-00-00") {	
				$total=((abs(strtotime ($mulai) - strtotime ($selesai)))/(60*60*24)); 
				$totallose=$cekplan-$total;
				if($totallose>0)
				{
					echo "+".$totallose;
				}
				else{
					echo round($totallose,1);
				}
			}else{ echo "on process";}	?> 
		</i> 
	</td>

	<td><?php echo $datanilai['analisis'];?></td>
	<td><?php echo $datanilai['programing'];?></td>
	<td><?php echo $datanilai['dokumentasi'];?></td>
	<td><?php echo $datanilai['point'];?></td>

		<?php 					
		if($datanilai['nilai_wo']==''){   
					
					// echo "<td hidde>";
					// if($totallose >0){
					// 	echo $hasilnilai="100";	
					// }else
					// {
					// 	// echo $hasilnilai=round(((100)+$totallose),1);
					// }	
					// echo"</td>";
					echo"<td colspan>";
					 if($datawo['it']=='infra'){echo "Infrastruktur";}else if($datawo['it']=='prog'){echo "Programmer";}else{}
					echo"</td>";
					echo "<td>";
					if($datawo['status_wo']=="finish"){
					
					  session_start();
						 $usernm=$_SESSION['username'];
						require_once("config.php"); 
						$cekuser=mysqli_query($koneksi,"select *from user where username='$usernm'");
						$levuser=mysqli_fetch_array($cekuser);
						 $levuser['level_user'];

								if($levuser['level_user']=="h_it" OR $levuser['username']=="it01")
								{?>   
								<a href="#" nama="nilaiwo" id="nilaiwo" it="<?php echo $datawo['it']; ?>"  data-wo="<?php echo $datawo['no_wo']; ?>" data-user="<?php echo $datawo['diterima']; ?>" data-nilai="<?php echo $hasilnilai;?>" data-group="WO" class="btn btn-minier btn-primary" ><i class="ace-icon fa fa-pencil-square-o"></i>NILAI </a> </td>
								<?php } else{?>
								- </td>
								<?php }?>
							
							<?php }else{
								if($levuser['level_user']=="h_it" OR $levuser['username']=="it01")
								{?>  
								
									
								<a href="#" nama="nilaiwo" id="nilaiwo" it="<?php echo $datawo['it']; ?>" data-wo="<?php echo $datawo['no_wo']; ?>" data-user="<?php echo $datawo['diterima']; ?>" data-nilai="<?php echo $hasilnilai;?>" data-group="WO" class="btn btn-minier btn-primary" ><i class="ace-icon fa fa-pencil-square-o"></i>NILAI </a> </td>
								<?php } else{?>

										- </td>
								<?php }?>
					
					<?php	}
					echo"</td>";
		} else{ 
				// echo"<td hidden>";
				// echo $datanilai['nilai_wo'];
				// echo"</td>";
				echo"<td colspan>";
				 if($datawo['it']=='infra'){echo "Ifrastruktur";}else if($datawo['it']=='prog'){echo "Programmer";}else{}
				echo"</td>";
				echo"<td colspan>";
				if($levuser['level_user']=="h_it")
								{
				?>
			    <a href="#" nama="nilaiwo" id="nilaiwo" it="<?php echo $datawo['it']; ?>" data-wo="<?php echo $datawo['no_wo']; ?>" data-user="<?php echo $datawo['diterima']; ?>" data-nilai="<?php echo $hasilnilai;?>" data-group="WO" class="btn btn-minier btn-succes" ></i>UPDATE </a>
			<?php	
								}else{echo "-";}
			
			echo"</td>";
				}
		?>

		</tr> 
			  
		
	<?php	$no++;}?>
		
</table>
</div>			

</div>
</div>
<?php }else{
$tgl1=date('Y-m-d');
$tgl2=date('Y-m-d');	
	?>
<div class="panel-body">
<form action="view_planing.php" method="post">
<table>
<tr>
	<td>FROM</td><td><input type="text" name="tgl1" id="tgl1" class="form-control date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"></td>
	<td>To</td><td><input type="text" name="tgl2" id="tgl2" class="form-control date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"></td>
	<td><button type="submit" name="tombolplan" value="SEARCH" class="btn btn-primary"><i class="ace-icon fa fa-search"></i>Search</button></td>
	<td><a href="export_nilai.php?tgl1=<?php echo $tgl1; ?>&tgl2=<?php echo $tgl2; ?>" class="btn btn-success"><i class="ace-icon fa fa-cloud-download"></i>Export  ke Excell</a> </td>
</tr>
</table>
</form>
</div>
<?php } ?>
<?php include "menu-bawah.php"; ?>
		<script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>
		
		<script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('view_planing_pp_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".pp-modal-body").html(html);
                    }   
                );
            });
            
            $(document).on('click','.edit-record2',function(e){
                e.preventDefault();
                $("#myModal2").modal('show');
                $.post('view_planing_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".wo-modal-body").html(html);
                    }   
                );
            });
        });
        
        //~ 
        
       
    </script>
		
	<!-- //penilaian -->

	  <script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('view_planing_pp_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".pp-modal-body").html(html);
                    }   
                );
            });
            
            $(document).on('click','.edit-record2',function(e){
                e.preventDefault();
                $("#myModal2").modal('show');
                $.post('view_planing_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".wo-modal-body").html(html);
                    }   
                );
            });

			  
            $(document).on('click','#nilaipp',function(e){
                e.preventDefault();
                $("#myModalnilai").modal('show');
                $.post('input_nilai_modal.php',
                    {id:$(this).attr('data-pp'),
					 username:$(this).attr('data-user'),
					 it   :$(this).attr('it'),
					 group:$(this).attr('data-group')
					},
                    function(html){
                        $(".modalnilai-body").html(html);
                    }   
                );
            });

			 $(document).on('click','#nilaiwo',function(e){
                e.preventDefault();
                $("#myModalnilai").modal('show');
                $.post('input_nilai_modal.php',
                    { id:$(this).attr('data-wo'),
					 username:$(this).attr('data-user'),
					 nilai:$(this).attr('data-nilai'),
					 it   :$(this).attr('it'),
					 group:$(this).attr('data-group')
					},
                    function(html){
                        $(".modalnilai-body").html(html);
                    }   
                );
            });
        });
        
        //~ 
         
    
    </script>


    <script type="text/javascript">
            jQuery(function($) {
        
            $(document).on('click', '.edit-record2', function (e) {

				
            	document.getElementById("txtproject").value = $(this).attr('data-id');
            	
		
				
            });

        })
</script>

<script type="text/javascript">
            jQuery(function($) {
        
            $(document).on('click', '.edit-record', function (e) {

				
            	document.getElementById("txtproject").value = $(this).attr('data-id');
            	
		
				
            });

        })
</script>

<script>
function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
</body>
</html>





