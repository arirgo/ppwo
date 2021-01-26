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
		<title>Dashboard - Section Head</title>

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
		<script>
		
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
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
						<a href="#">Home</a>
				</li>
			</ul>
<!-- /.breadcrumb --></div>
	<div class="page-content">
			<div class="page-header">
				<h1>
				Inventaris IT
					<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					Overview &amp; >>
					</small>
				</h1>
			</div><!-- /.page-header -->


			<div class="panel panel-default">
					
						<div class="panel-body">
						
							<div class="modal fade" id="inventarismyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:1100px; height:1000px;">
									<div class="modal-content">
										<div class="modal-header" style="background:#DAA520">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Update & Move Inventaris</h4>
										</div>
									<div class="inventarismodal-body">
									</div>
								<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
	<div class="page-content">
			<div class="panel-body">


		
		<?php  
		$ckus=mysqli_fetch_array(mysqli_query($koneksi,"select * from user where username='$user'"));
		 $pls=$ckus['pls'];?>
							<form  action="simpaninventaris.php" method="post" id="ftb" name="ftb"class="form-horizontal" role="form">
							<div class="row">

							<div class="col-sm-3">
								<label class="control-label" for="form-field-1">Katagori</label>
										<div class="form-group">
										
										<select name="katago" id="katago" require>
							   							<option value="">---PILIH---</option>
														 <option value="Software">Software</option> 
														 <option value="Hardware">Hardware</option>
														 <option value="OS">OS</option>
														 <option value="Telepon">Telepon</option>  
							   							 <option value="Network">Network</option>
														   </select>
										</div>
 
								</div>
								<div class="col-sm-3">
								<label class="control-label" for="form-field-1">Kode assets</label>
										<div class="form-group">
										
											<input type="text"  id="kode" name="kode" required>
										<input type="hidden" id="pls" name="pls" value="<?php echo $pls;?>">
						
										</div>

								</div>
								<div class="col-sm-3">
								<label class="control-label" for="form-field-1">nama barang</label>
										<div class="form-group">
										
											<input type="text"   name="nama_barang" id="nama_barang" autocomplete="off" required>
										</div>

								</div>
								<div class="col-sm-3">
								<label class="control-label" for="form-field-1">Type</label>
										<div class="form-group">
										
											<input type="text"   name="group_brg" name="group_brg" autocomplete="off" required>
										</div>

								</div>
								
							
							</div>
							
								<div class="row">
								<div class="col-sm-3">
								<label class="control-label" for="form-field-1">IP</label>
										<div class="form-group">
										
											<input type="text"  name="ip" name="ip" autocomplete="off">
										</div>

								</div>
								<div class="col-sm-3">
									<label class="control-label" for="form-field-1">OS</label>
										<div class="form-group">
									
											<input type="text"   name="os" id="os" autocomplete="off" >
										</div>

								</div>
								<div class="col-sm-3">
								<label class="control-label" for="form-field-1">Status</label>
										<div class="form-group">
										
											<input type="text"   name="status" name="status" autocomplete="off">
										</div>

								</div>
								<div class="col-sm-3">
									<label class="control-label" for="form-field-1">Lokasi</label>
										<div class="form-group">
									
										<input type="text"id="lokasi" name="lokasi" autocomplete="off">
										</div>

								</div>
							
							</div>

						
								<div class="row">
								<div class="col-sm-3">
									<label class="control-label" for="form-field-1">Kode IT /kode location</label>
										<div class="form-group">
									
											<!-- <input type="text"  name="kode_it" id="kode_it" autocomplete="off"> -->
											  <select class="chosen-select " id="kode_it" name="kode_it" STYLE="width:90px;">
                            <option value="" selected>--PILIH--  </option>
                                    <?php
                                    if($pls=="ho")
                                    {
                                       $result=mysqli_query($koneksi,"SELECT * FROM master_komputer where pls='ho'  ORDER BY nama_komputer asc");
                                    
                                    }else{
                                       $result=mysqli_query($koneksi,"SELECT * FROM master_komputer where pls !='ho' ORDER BY nama_komputer asc");
                                    
                                    }
                                    while($isi  = mysqli_fetch_array($result)){
                                       if($dt['kode_it']==$isi['nama_komputer'])
                                       {
                                          $sec="selected";
                                       }else{$sec="";}
                                       ?>

                                       
                                       <option value="<?php echo $isi['nama_komputer']; ?>" <?php echo $sec;?>><?php echo $isi['nama_komputer'];?></option>
                                    <?php } ?>
                                    </select>
										</div>

								</div>
								<div class="col-sm-3">
									<label class="control-label" for="form-field-1">User</label>
										<div class="form-group">
									
											<input type="text"  name="user" id="user" autocomplete="off" READONLY>
										</div>

								</div>
								<div class="col-sm-3">
									<label class="control-label" for="form-field-1">Spesifikasi</label>
										<div class="form-group">
									
											<textarea name="spesifikasi" id="spesifikasi" cols="20" rows="2" autocomplete="off"></textarea>
										</div>

								</div>
								<div class="col-sm-3">
								<label class="control-label" for="form-field-1">Keterangan</label>
										<div class="form-group">
										
											<textarea name="keterangan" id="keterangan" cols="20" rows="2" autocomplete="off"></textarea>
										</div>

								</div>

								<div class="row">
								<div class="col-sm-3">
								<label class="control-label" for="form-field-1">Lisensi</label>
										<div class="form-group">
										
											<input type="text"  name="lisensi" name="lisensi" autocomplete="off">
										</div>

								</div>
								<div class="col-sm-3">
									<label class="control-label" for="form-field-1">productid</label>
										<div class="form-group">
									
											<input type="text"   name="productid" id="productid" autocomplete="off" >
										</div>

								</div>
								<div class="col-sm-3">
								<label class="control-label" for="form-field-1">Thn Peroleh</label>
										<div class="form-group">
										
											<input type="text"   name="thproleh" name="thproleh" autocomplete="off" onkeypress="return hanyaAngka(event)">
										</div>

								</div>
							</div>
							</div>
						
												<button class="btn btn-info" type="submit" id="btntb" name="btntb">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Simpan
											</button>
                              

						</form>
							<br><br><br>
							
						
			<br>
			<br>
	
		<button class="btn btn-warning" > <a href="export_inventaris.php?pls=<?php echo $pls; ?>" style="color:white;">Export Excel</a></button>
		<div class = "table-responsive">
			<table id="inven" class="table table-striped table-bordered" style="width:100%">
         	<thead style="font-size: 14px;">
            <tr>
			<th nowrap>No</th>			
            <th nowrap>Kode Asset</th>
			<th nowrap>Nama Barang</th>
			<th nowrap>Spesifikasi</th>
			<th nowrap>Lokasi</th>
			<th nowrap>Kode IT</th>
			<th nowrap>Keterangan</th>
            <th nowrap>Alamat IP</th>
            <th nowrap>OS</th>
			<th nowrap>Lisensi</th>
			<th nowrap>product id</th>
			<th nowrap>Thn proleh</th>
            <th nowrap>Type</th>
            <th nowrap>Status</th>
			<th nowrap>Pengguna</th>
			<th nowrap>Proses</th>
			</tr>					
			</thead>
            <tbody style="font-size: 12px;">
			<?php
		
			
				require_once("config.php");
				if($pls=="ho")
				{
					$sql	=	mysqli_query($koneksi," select * FROM inventarisi where pls='ho'");
				}else{
					$sql	=	mysqli_query($koneksi," select * FROM inventarisi where pls !='ho'");	
				}
               
                  $no = 1;
				while($data	=	mysqli_fetch_array($sql)){
                    if($data['status']=="RUSAK"){
                        echo '<tr style="background:pink;">';
                    }else{
                        echo '<tr>';
                    }
					echo '<td>'.$no.'</td>';
						
             
                    echo '<td nowrap height="20">'.$data['kode'].'</td>';
                    echo '<td nowrap height="20">'.$data['nama_barang'].'</td>';
                    echo '<td nowrap height="20">'.$data['spesifikasi'].'</td>';
					echo '<td nowrap height="20">'.$data['lokasi'].'</td>';
					echo '<td nowrap height="20">'.$data['kode_it'].'</td>';
                    echo '<td nowrap height="20">'.$data['keterangan'].'</td>';
                    echo '<td nowrap height="20">'.$data['ip'].'</td>';
					echo '<td nowrap height="20">'.$data['os'].'</td>';
					echo '<td nowrap height="20">'.$data['lisensi'].'</td>';
					echo '<td nowrap height="20">'.$data['productid'].'</td>';
					echo '<td nowrap height="20">'.$data['thproleh'].'</td>';

                    echo '<td nowrap height="20">'.$data['group_brg'].'</td>';
					echo '<td nowrap height="20">'.$data['status'].'</td>';
					echo '<td nowrap height="20">'.$data['user'].'</td>';
					?>
					<td nowrap height="20"> <button class="btn btn-warning btn-xs" id="editinventaris" dinv="<?php echo $data['objectid'];?>"> <i class="ace-icon fa fa-wrench  bigger-110 icon-only"></i>
					Edit</button>
				
					<button class="btn btn- btn-xs" id="moveinventaris" dinv="<?php echo $data['objectid'];?>"> <i class="ace-icon  fa fa-exchange  bigger-110 icon-only"></i>
					Move</button>
					</td>
					<?php
					echo '</tr>';
					$no++;
					}
				     
					?>
				</tbody>
			</table>
		</div>
			</div><!-- /.row -->
        </div><!-- /.page-content -->

	</div>
	
</div><!-- /.main-content -->


<?php include "menu-bawah.php"; ?>
		<script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>


<script type="text/javascript">
	
	$(document).ready(function(){
		$('select[id="katago"]').change(function() {
           
			
			id_brg 	=$(this).val();
        
            $.ajax({
                    type:'POST',
                    url:'cek_kodebarang.php',
                    data:'pilih_id='+id_brg,
                    success:function(kode){
                       // alert(stok);
                        $('#kode').val(kode);
						$('#kode_it').val(kode);
                    }
                });
			
		}); 

	
	});
 
</script>
<script>
	$(document).ready(function() {
    $('#inven').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );
</script>
<script>
        $(function(){
            $(document).on('click','#editinventaris',function(e){
                e.preventDefault();
                $("#inventarismyModal").modal('show');
                $.post('editinventaris.php',
                    {id:$(this).attr('dinv')},
                    function(html){
                        $(".inventarismodal-body").html(html);
                    }   
                );
            });
        });
        
        //~ 
    </script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('select[id="kode_it"]').change(function() {
			id_lok 	=$(this).val();
            $.ajax({
                    type:'POST',
                    url:'cek_lokasi.php',
                    data:'nama_komputer='+id_lok,
                    success:function(nm){
                       // alert(stok);
                        $('#user').val(nm);
					
                    }
                });
		}); 
	});
 
</script>
		