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
<?php //include "menu-kiriadmin.php";
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

			
				$apl	=	$_POST['apl'];
             $mkom 	= $_POST['nmkom'];
                
                if($apl=='')
                {}else
                {
					// $input .="and dt_pp.subcategory ='$apl'";
					$input .="and dt_pp.inventaris ='$apl'";
                }
                if($mkom==''){}
                else{$input .="and tbl_pp.komputer ='$mkom'";}
				?>
		<form action="view_trackpp.php" method="post">
		<table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="10" style=" background-color:#B22222;color:white;">Tracking Permintaan Perbaikan</td>
			</tr>	
			<tr>
				<td>Komputer :</td>					
                <td>
                <select class="chosen-select " id="nmkom" name="nmkom" style="width:80%">
                <option value="" selected>--PILIH--  </option>
                <?php
                $result=mysqli_query($koneksi,"SELECT * FROM master_komputer where pls='$pls'  ORDER BY nama_komputer asc");
                while($isi  = mysqli_fetch_array($result)){ ?>

                    <option value="<?php echo $isi['nama_komputer'];?>"><?php echo $isi['nama_komputer']." - ".$isi['nama_pengguna'];?></option>
                <?php } ?>
                </select>                        
				</td>
				<td> Aplikasi / Hardware:</td>
				<td>
                	<select class="chosen-select pilihsf" id="apl" name="apl" style="width:80%" required>
                    <option value="" selected>--PILIH--  </option>
                        <?php
                        $result=mysqli_query($koneksi,"SELECT * FROM inventarisi where pls='$pls' ORDER BY nama_barang asc");
                        while($isi  = mysqli_fetch_array($result)){ ?>

                            <option value="<?php echo $isi['objectid'];?>"><?php echo $isi['kode_it']." - ".$isi['nama_barang'];?></option>
                        <?php } ?>
                        </select>
                 </td>
			
				<td style="width: 5%; border:0;">
				<select name="from" id="from">
					<option value="ASC">ASC</option>
					<option value="DESC">DESC</option>
				</select>
				
				</td>
				
				<td style="width: 10%; border:0;">
					<button type="submit" class="btn btn-primary btn-xs" style="width: 120px;" name="tombol" value="SEARCH" id="tombol"><i class="ace-icon fa fa-search"></i> Search</button>
				</td>
			</tr>
			
			
		</table>
		</form>
		<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
			<thead>
				<?php
			
				$crtgl="";
				?>
				<a href="export_track.php?apl=<?php echo $apl; ?>&mkom=<?php echo $mkom; ?>&tgl=<?php echo $tgl; ?>&pls=<?php echo $pls; ?>">Export ke Excell</a><br><br>					
				<tr>
				<th>No</th>								
          		 <th>Group</th>
				<th>Kode APP/PART</th>
			 	 <th>Aplikasi / PROJECT</th>
                <th>Perbaikan</th>
				
              
                
                <th>Jenis</th>
                <th>Pelapor</th>
				<th>Komputer</th>
                <th>IT</th>
				
				
				<th>Status</th>
				<th>Detail</th>
			
				 </tr>
				
									
			</thead>
		<?php
			$tmp	=	$_POST['bulan'];
			$urut	=	$_POST['urut'];
			$from	=	$_POST['from'];
                
            
				require_once("config.php");
			
			   
				$sql	=	mysqli_query($koneksi,"  select dt_pp.*,inventarisi.*,tbl_pp.*,master_komputer.*  from dt_pp inner join inventarisi on dt_pp.inventaris=inventarisi.objectid  join tbl_pp on tbl_pp.no_pp=dt_pp.no_pp left join master_komputer on tbl_pp.komputer=master_komputer.nama_komputer where tbl_pp.pls='$pls' and dt_pp.no_pp !='' $input ");
               
                 $no = 1;
				while($data	=	mysqli_fetch_array($sql)){
					
				
					
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$data['category'].'</td>';
					echo '<td>'.$data['kode_it'].'</td>';
                    echo '<td>'.$data['subcategory'].'</td>';
                    echo '<td>'.$data['deskripsi_kerusakan'].'</td>'; 
                  
                    echo '<td>'.$data['jenis_project'].'</td>';
					echo '<td>'.$data['pelapor'].'</td>';
					echo '<td>'.$data['nama_komputer'].'</td>';
                    echo '<td>'.$data['diterima'].'</td>';
					
				
					echo '<td>'.$data['status_pp'].'</td>';
					
						?>
						<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
                        <?php
		
				
					echo '</tr>';
					$no++;
                    }


		
		
		
		 } else {?>
		
		<form action="view_trackpp.php" method="post">
		<table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="10" style=" background-color:#B22222;color:white;">Tracking Permintaan Perbaikan</td>
			</tr>	
			<tr>
				<td>Komputer :</td>					
                <td>
                <select class="chosen-select pilihsf " id="nmkom" name="nmkom" style="width:80%">
                <option value="" selected>--PILIH--  </option>
                <?php
                $result=mysqli_query($koneksi,"SELECT * FROM master_komputer  where pls='$pls' ORDER BY nama_komputer asc");
                while($isi  = mysqli_fetch_array($result)){ ?>

                    <option value="<?php echo $isi['nama_komputer'];?>"><?php echo $isi['nama_komputer']." - ".$isi['nama_pengguna'];?></option>
                <?php } ?>
                </select>                        
				</td>
				<td> Aplikasi / Hardware:</td>
				<td>
                	<select class="chosen-select pilihsf" id="apl" name="apl" style="width:80%" >
                    <option value="" selected>--PILIH--  </option>
                        <?php
                        $result=mysqli_query($koneksi,"SELECT * FROM inventarisi where pls='$pls' ORDER BY nama_barang asc");
                        while($isi  = mysqli_fetch_array($result)){ ?>

                            <option value="<?php echo $isi['objectid'];?>"><?php echo $isi['kode_it']." - ".$isi['nama_barang'];?></option>
                        <?php } ?>
                        </select>
                 </td>
				<!-- <td style="width: 10%; border:0;">Urut berdasarkan</td> -->
				<!-- <td style="width: 15%; border:0;">
				<select name="urut" id="urut">
					<option value="tgl_mulai">Tgl Mulai</option>
					<option value="tgl_selesai">Tgl Selesai</option>
					
				</select>
				</td> -->
				<td style="width: 5%; border:0;">
				<select name="from" id="from">
					<option value="ASC">ASC</option>
					<option value="DESC">DESC</option>
				</select>
				
				</td>
				
				<td style="width: 10%; border:0;">
					<button type="submit" class="btn btn-primary btn-xs" style="width: 120px;" name="tombol" value="SEARCH" id="tombol"><i class="ace-icon fa fa-search"></i> Search</button>
				</td>
			</tr>
			
			
		</table>
		</form>
		<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
			<thead>
				<?php
				$mkom="";
				$apl="";
				$crtgl= date("Y-m");
				?>
				<a href="export_track.php?tgl=<?php echo $crtgl; ?>&apl=<?php echo $apl; ?>&mkom=<?php echo $mkom; ?>&pls=<?php echo $pls; ?>">Export ke Excell</a><br><br>					
				<th>No</th>								
           
            
			 	 <th>Group</th>
				 <th>Kode APP/PART</th>
			 	 <th>Aplikasi / PROJECT</th>
                <th>Perbaikan</th>
				
              
                
                <th>Jenis</th>
                <th>Pelapor</th>
				<th>Komputer</th>
                <th>IT</th>
				
				
				<th>Status</th>
				<th>Detail</th>
			
				 
				
									
			</thead>
		<?php
		
				
				require_once("config.php");
			
			   
                $sql	=	mysqli_query($koneksi," select dt_pp.*,inventarisi.*,tbl_pp.*,master_komputer.*  from dt_pp inner join inventarisi on dt_pp.inventaris=inventarisi.objectid   join tbl_pp on tbl_pp.no_pp=dt_pp.no_pp left join master_komputer on tbl_pp.komputer=master_komputer.nama_komputer where tbl_pp.pls='$pls' and dt_pp.tgl_tambah like '$crtgl%'");
               
                 $no = 1;
				while($data	=	mysqli_fetch_array($sql)){
					
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$data['category'].'</td>';
					 echo '<td>'.$data['kode_it'].'</td>';
                    echo '<td>'.$data['subcategory'].'</td>';
                    echo '<td>'.$data['deskripsi_kerusakan'].'</td>'; 
                   
                    echo '<td>'.$data['jenis_project'].'</td>';
					echo '<td>'.$data['pelapor'].'</td>';
					echo '<td>'.$data['nama_komputer'].'</td>';
                    echo '<td>'.$data['diterima'].'</td>';
					
				
					echo '<td>'.$data['status_pp'].'</td>';
						?>
						<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
                        <?php
		
				
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

