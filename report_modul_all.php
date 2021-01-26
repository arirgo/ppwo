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
		<title>PPWO IT Online</title>
		<link rel="icon" type="image/png" sizes="16x16" href="assets/img/pw.png">
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
			#tahun{
				width:90%;   
				}
			#bulan{
				width:90%;   
				}
			#tblhis{boreder=0;}
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
<?php //include "menu-kiriadmin.php"; ?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
						<a href="main_user.php">Home</a>
					</li>
				
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:1100px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail PP</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
						
		<div class="row">
		<?php if (isset($_POST['tombol'])){
					$tgl1	=	$_POST['tgl1'];
				$tgl2	=	$_POST['tgl2'];
				$urut	=	$_POST['urut'];
				$from	=	$_POST['from'];
				$abul 	= $_POST['bulan'];
				?>
		<form action="report_modul_all.php" method="post">
		<table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="10" style=" background-color:pink;">TABLE REPORT MODUL</td>
			</tr>
			
			<tr>
				<td>Dari :</td>					
                <td><input class="form-control date-picker" id="tgl1" name='tgl1' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo $tgl1;?>"/>                        
				</td>
				<td> S/D :</td>
				<td> <input class="form-control date-picker" id="tgl2" name='tgl2' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo $tgl2;?>"/>
                 </td>
				<td style="width: 10%; border:0;">Urut berdasarkan</td>
				<td style="width: 15%; border:0;">
				<select name="urut" id="urut">
					<option value="no_pp" selected>Nomor Project</option>
				
					<option value="tgl_mulai">Tgl Mulai</option>
					<option value="tgl_selesai">Tgl Selesai</option>
					<option value="diterima">Dikerjakan</option>
					<option value="status">Status</option>
					<option value="dikerjakan">PIC</option>
				</select>
				</td>
				<td style="width: 5%; border:0;">
				<select name="from" id="from">
					<option value="ASC">ASC</option>
					<option value="DESC">DESC</option>
				</select>
				</td>
				<td>

					<select name="it" id="it">
                    <option value="all">ALL</option>
                    <option value="inf">Infra</option>
                    <option value="pro">Programmer</option>
                    <?php
                    $sqldtuser= mysqli_query($koneksi," select *from user where section='IT' and aktif=1");
                    while($datauser	=	mysqli_fetch_array($sqldtuser)){ ?>

                        <option value="<?php echo $datauser['nama'];?>"><?php echo $datauser['nama']?></option>
                    <?php }
                    ?>
					
				</select>
				</td>
				<td style="width: 5%; border:0;"></td>
				<td style="width: 10%; border:0;">
					<button type="submit" class="btn btn-primary btn-xs" style="width: 120px;" name="tombol"  value="SEARCH" id="tombol"><i class="ace-icon fa fa-search"></i> Search</button>
				</td>
			</tr>
			
			
		</table>
		</form>
		<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
			<thead>
				<?php
			
				if ($abul<10){
					$abul	=	strval('0'.$abul);
				}else {
					$abul	=	strval($abul);										
					}
				$atah = $_POST['tahun'];
				$it	  = $_POST['it'];
				if($it=="all")
				{
					$itku="user.dev in ('pro','inf')";
				}else if($it=='inf' or $it=='pro'){
					$itku="user.dev ='".$it."'";
				}else{
                  $itku="user.nama='".$it."'";
                }

				?>
				<a href="export_modul_all.php?tgl1=<?php echo $tgl1; ?>&tgl2=<?php echo $tgl2; ?>&it=<?php echo $it;?>">Export ke Excell</a><br><br>							
				<th>No</th>								
               
             
                <th>Modul</th>
				<th>Aplikasi / PROJECT</th>
                <th>PIC</th>
				<th>Tgl Mulai</th>
				<th>Tgl Selesai</th>
				<th>Status</th>
				 <th>No PP/WO</th>
				   <th>Jenis</th>
									
			</thead>
		<?php
		
				// if ($tmp<10){
				// 	$bln	=	strval('0'.$tmp);
				// }else {
				// 	$bln	=	strval($tmp);										
				// 	}
				// 	$thn	=	$_POST['tahun'];
				// 	$ed		= strval($thn.'-'.$bln);
				require_once("config.php");
				// function datediff($tgl1, $tgl2){
				// 	$tgl1 = strtotime($tgl1);
				// 	$tgl2 = strtotime($tgl2);
				// 	$diff_secs = abs($tgl1 - $tgl2);
				// 	$base_year = min(date("Y", $tgl1), date("Y", $tgl2));
				// 	$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
				// 	return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
				// }


				//$sql	=	mysqli_query($koneksi,"select * from tbl_pp where diterima in $infra and tgl_lapor like '".$thn."-".$bln."%' order by ".$urut." ".$from."");
               
                $sql	=	mysqli_query($koneksi," select modul_pp.*,user.* from modul_pp inner join user on modul_pp.dikerjakan=user.nama where user.aktif=1 and ".$itku." and modul_pp.tgl_mulai between '".$tgl1."' and '".$tgl2."' order by ".$urut." ".$from." ");
                  $no = 1;
				while($data	=	mysqli_fetch_array($sql)){
					// $tgl1 = $data['tgl_lapor'].' '.$data['jam_lapor'];
					// $tgl2 = $data['tgl_terima'].' '.$data['jam_terima'];
					// $a 	= datediff($tgl1, $tgl2);
					// $dt_take = strval(($a['days'] * 1440) + ($a['hours'] * 60)) + $a['minutes'];
					echo '<tr>';
					echo '<td>'.$no.'</td>';
						
                   
                    echo '<td>'.$data['nama_modulpp'].'</td>';
                     echo '<td>'.$data['softhard'].'</td>';
                    echo '<td>'.$data['dikerjakan'].'</td>';
					echo '<td>'.$data['tgl_mulai'].'</td>';
					echo '<td>'.$data['tgl_selesai'].'</td>';
					echo '<td>'.$data['status'].'</td>';
				
					?>
						<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
                        <?php
						 echo '<td>'.$data['jenis'].'</td>';
					echo '</tr>';
					$no++;
					}
				     
                $sqlwo	=	mysqli_query($koneksi," select detail_project.*,user.*,inventarisi.* from detail_project join user on detail_project.username=user.nama where user.aktif=1 and ".$itku." and detail_project.tgl_m_kerja between '".$tgl1."' and '".$tgl2."'  ");
               
              
				while($datawo	=	mysqli_fetch_array($sqlwo)){
					// $tgl1 = $data['tgl_lapor'].' '.$data['jam_lapor'];
					// $tgl2 = $data['tgl_terima'].' '.$data['jam_terima'];
					// $a 	= datediff($tgl1, $tgl2);
					// $dt_take = strval(($a['days'] * 1440) + ($a['hours'] * 60)) + $a['minutes'];
					echo '<tr>';
					echo '<td>'.$no.'</td>';
						
                        
                   
                    echo '<td>'.$datawo['detail_pekerjaan'].'</td>';
                    echo '<td>'.$datawo['soft_hard'].'</td>';
                    echo '<td>'.$datawo['nama'].'</td>';
					echo '<td>'.$datawo['tgl_m_kerja'].'</td>';
					echo '<td>'.$datawo['tgl_s_kerja'].'</td>';
					echo '<td>'.$datawo['status'].'</td>';
					?>
						<td><a href="#" class="edit-wo" data-id="<?php echo $datawo['no_project']; ?>" ><?php echo $datawo['no_project']; ?></a></td>
                        <?php
				 echo '<td>Development</td>';
				
					echo '</tr>';
					$no++;
                    }
                    
		
		
		
		 } else {?>
		
		<form action="report_modul_all.php" method="post">
		<table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="10" style=" background-color:pink;">TABLE REPORT MODUL</td>
			</tr>	
			<tr>
				<td>Dari :</td>					
                <td><input class="form-control date-picker" id="tgl1" name='tgl1' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" />                        
				</td>
				<td> S/D :</td>
				<td> <input class="form-control date-picker" id="tgl2" name='tgl2' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" />
                 </td>
				<td style="width: 10%; border:0;">Urut berdasarkan</td>
				<td style="width: 15%; border:0;">
				<select name="urut" id="urut">
					<option value="no_pp" selected>Nomor PP/WO</option>
					<option value="tgl_mulai">Tgl Mulai</option>
					<option value="tgl_selesai">Tgl Selesai</option>
					<option value="diterima">Dikerjakan</option>
					<option value="status">Status</option>
					<option value="dikerjakan">PIC</option>
				</select>
				</td>
				<td style="width: 5%; border:0;">
				<select name="from" id="from">
					<option value="ASC">ASC</option>
					<option value="DESC">DESC</option>
				</select>
				
				</td>
				<td>
					<select name="it" id="it">
                    <option value="all">ALL</option>
                    <option value="inf">Infra</option>
                    <option value="pro">Programmer</option>
                    <?php
                    $sqldtuser= mysqli_query($koneksi," select *from user where section='IT' and aktif=1");
                    while($datauser	=	mysqli_fetch_array($sqldtuser)){ ?>

                        <option value="<?php echo $datauser['nama'];?>"><?php echo $datauser['nama']?></option>
                    <?php }
                    ?>
					
				</select>
				</td>
				<td style="width: 5%; border:0;"></td>
				<td style="width: 10%; border:0;">
					<button type="submit" class="btn btn-primary btn-xs" style="width: 120px;" name="tombol" value="SEARCH" id="tombol"><i class="ace-icon fa fa-search"></i> Search</button>
				</td>
			</tr>
			
			
		</table>
		</form>
		<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
			<thead>
				<?php
				$abul = date('m');
				$atah = date('Y');
				$tgl1= date("Y-m-d");
				$tgl2=date("Y-m-d");
				?>
				<a href="export_pp.php?tahun=<?php echo $atah; ?>&tgl1=<?php echo $tgl1; ?>&tgl2=<?php echo $tgl2; ?>&it=all">Export ke Excell</a><br><br>					
				<th>No</th>								
           
            
                <th>Modul</th>
				<th>Aplikasi / PROJECT</th>
                <th>PIC</th>
				<th>Tgl Mulai</th>
				<th>Tgl Selesai</th>
				<th>Status</th>
				<th>No PP/WO</th>
				 <th>Jenis</th>
				 
				
									
			</thead>
		<?php
			$tmp	=	$_POST['bulan'];
			$urut	=	$_POST['urut'];
			$from	=	$_POST['from'];
				if ($tmp<10){
					$bln	=	strval('0'.$tmp);
				}else {
					$bln	=	strval($tmp);										
					}
					$thn	=	$_POST['tahun'];
					$ed		= strval($thn.'-'.$bln);
				require_once("config.php");
				// function datediff($tgl1, $tgl2){
				// 	$tgl1 = strtotime($tgl1);
				// 	$tgl2 = strtotime($tgl2);
				// 	$diff_secs = abs($tgl1 - $tgl2);
				// 	$base_year = min(date("Y", $tgl1), date("Y", $tgl2));
				// 	$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
				// 	return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
				// }

			   
                $sql	=	mysqli_query($koneksi," select modul_pp.*,user.* from modul_pp inner join user on modul_pp.dikerjakan=user.nama where user.aktif=1 and modul_pp.tgl_mulai like '".date('Y')."-".date('m')."%' order by tgl_mulai DESC");
               
                 $no = 1;
				while($data	=	mysqli_fetch_array($sql)){
					// $tgl1 = $data['tgl_lapor'].' '.$data['jam_lapor'];
					// $tgl2 = $data['tgl_terima'].' '.$data['jam_terima'];
					// $a 	= datediff($tgl1, $tgl2);
					// $dt_take = strval(($a['days'] * 1440) + ($a['hours'] * 60)) + $a['minutes'];
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					
                    
                    echo '<td>'.$data['nama_modulpp'].'</td>';
                    echo '<td>'.$data['softhard'].'</td>';
                    echo '<td>'.$data['dikerjakan'].'</td>';
					echo '<td>'.$data['tgl_mulai'].'</td>';
					echo '<td>'.$data['tgl_selesai'].'</td>';
					echo '<td>'.$data['status'].'</td>';
						?>
						<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
                        <?php
				 echo '<td>'.$data['jenis'].'</td>';
				
				
					echo '</tr>';
					$no++;
                    }



                    
                $sqlwo	=	mysqli_query($koneksi," select detail_project.*,user.* from detail_project inner join user on detail_project.username=user.nama where user.aktif=1 and modul_pp.tgl_m_kerja like '".date('Y')."-".date('m')."%' order by tgl_m_kerja DESC");
               
                 $no = 1;
				while($datawo	=	mysqli_fetch_array($sqlwo)){
					// $tgl1 = $data['tgl_lapor'].' '.$data['jam_lapor'];
					// $tgl2 = $data['tgl_terima'].' '.$data['jam_terima'];
					// $a 	= datediff($tgl1, $tgl2);
					// $dt_take = strval(($a['days'] * 1440) + ($a['hours'] * 60)) + $a['minutes'];
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					
                    echo '<td>'.$datawo['detail_pekerjaan'].'</td>';
                    echo '<td>'.$datawo['soft_hard'].'</td>';
                    echo '<td>'.$datawo['nama'].'</td>';
					echo '<td>'.$datawo['tgl_m_kerja'].'</td>';
					echo '<td>'.$datawo['tgl_s_kerja'].'</td>';
					echo '<td>'.$datawo['status'].'</td>';
						?>
						<td><a href="#" class="edit-wo" data-id="<?php echo $datawo['no_project']; ?>" ><?php echo $datawo['no_project']; ?></a></td>
                        <?php
                   
				 	echo '<td>Development</td>';
				
					echo '</tr>';
					$no++;
                    }
                    

		} ?>
        </table>
        


        
		</div>					
		</div>
									
					</div><!-- /.page-content -->
		
		</div><!-- /.main-content -->


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
                $.post('formpp_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        //~ 
		   $(document).on('click','.edit-wo',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('formwo_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        
        
         $(function(){
            $(document).on('click','.edit-hold',function(e){
                e.preventDefault();
                $("#twoModal").modal('show');
                $.post('hold_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
         $(function(){
            $(document).on('click','.edit-finish',function(e){
                e.preventDefault();
                $("#finishModal").modal('show');
                $.post('finish_modal.php',
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

