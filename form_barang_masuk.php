<!DOCTYPE html>
<html lang="en">
	<head>
	<script src="sweetalert/sweetalert-dev.js"></script>
<link rel="stylesheet" href="sweetalert/sweetalert.css">
<script type=text/javascript>
function kosong()
{	
    var  pelapor			= document.getElementById('txtpelapor');//1
    var  masalah			= document.getElementById('txtmasalah');//2
    
    if(pelapor.value=='')
	{
		document.getElementById('pesan1').innerHTML = "//Nama Pelapor Harus Diisi";
		pelapor.focus();
		return false;
	}
	else
	{
		document.getElementById('pesan1').innerHTML = "";
	}
	
	
	if(masalah.value=='')
	{
		document.getElementById('pesan2').innerHTML = "//Detail masalah Harus Diisi";
		masalah.focus();
		return false;
	}
	else
	{
		document.getElementById('pesan2').innerHTML = "";
	}
    
}

function fokus()
	{
		document.getElementById("txtmasalah").focus();

	}    
    
</script>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>PPWO IT</title>

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
		<script src="jquery-2.1.3.min.js"></script> 
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
	<body class="no-skin" onload='fokus();'>

<script>
  $(document).ready(function()
  {
        $("#loadproses").hide();
  
//   $("#btnsubmit").click(function(){
//   	$('#loadproses').show();
//   	$('#btnsubmit').hide();
//   });

  });

</script>
<?php include "menu-atas.php"; ?>
<?php include "menu-kiri.php"; 
session_start();
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
				<li class="active">Form Barang</li>
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Form Barang Masuk
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Overview &amp;  IT
								</small>
							</h1>
						</div><!-- /.page-header -->
						<form name="f_pp" action="simpan_brg_msk.php" method="POST" class="form-horizontal" role="form" onsubmit='return kosong();'>
									
								<?PHP
								 date_default_timezone_set('Asia/Jakarta');
            					$tgl=date('Y-m-d');
								$sql = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
								$data2 = mysqli_fetch_array($sql);
								
					
					?>
									
								 <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">NO PO</label>

										<div class="col-sm-9">
											<input type="text" id="nopo" class="col-xs-10 col-sm-3" name="nopo" required>
										</div>
									</div>
									 <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">NO PR</label>

										<div class="col-sm-9">
											<input type="text" id="nopr" class="col-xs-10 col-sm-3" name="nopr" required>
										</div>
									</div>
									 <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Surat Jalan</label>

										<div class="col-sm-9">
											<input type="text" id="sj" class="col-xs-10 col-sm-3" name="sj" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jenis Barang</label>

										<div class="col-sm-3">
										
					   <select name="cb_brg" id="cb_brg" class="chosen-select pilihsf" style="width:70px;" required>
				
				
  					<option value="" >--PILIH--  </option>
					<?php
					$result=mysqli_query($koneksi,"SELECT * FROM inventarisi where objectid !=''  and pls='$pls' ORDER BY nama_barang asc");
					while($isi  = mysqli_fetch_array($result)){ ?>
					<option value="<?php echo $isi['objectid'];?>"><?php echo $isi['kode_it']." - ".$isi['nama_barang'];?></option>
					
					<?php } ?>
					</select>
				
			
                
                 <select name="browsestok" id="browsestok" >
                        <option value="">-PILIH NAMA BARANG-</option>
                </select>
											<label style='margin-left: 5px;' id=pesan1></label>
										</div>
									</div>

                                    	<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Barang</label>
                                             
										<div class="col-sm-9">
											<input type="text" id="form-field-1" class="nmbrg col-xs-10 col-sm-3" name="nmbrg" id="nmbrg" required>
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jumlah</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" class="col-xs-10 col-sm-3" name="jmlbrg" id="jmlbrg" required  onkeypress="return hanyaAngka(event)">
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">User input</label>

										<div class="col-sm-9">
											<input type="text"  name="userinput" id="userinput" value="<?php echo $data2['nama'];?>" class="col-xs-10 col-sm-5" readonly required />
											<label style='margin-left: 5px;' id=pesan1></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right " for="form-field-1">Tanggal Masuk</label>

										<div class="col-sm-9">
											<input type="text" id="tglmsk" class="col-xs-10 col-sm-3 date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglmsk" value="<?php echo $tgl;?>" >
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kterangan</label>

										<div class="col-sm-9">
											<input type="text" id="ketmsk" class="col-xs-10 col-sm-3" name="ketmsk">
										</div>
									</div>
<center>
									<table>
										<tr>
											<td>
												<div id="loadproses">
													<p><img src="loader.gif" /> Loading...</p>
												</div>
												<button class="btn btn-info" type="submit" id="btnsubmit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>
												&nbsp; 
												<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
											 
											</td>
										</tr>
									</table>
								</center>
								</div>
				<div class="col-md-10">
				<div class="panel panel-default">
					<div class="panel-heading">Details</div>
					<div class="panel-body">
				<!-- -->
				<div class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:900px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">EDIT BARANG MASUK</h4>
                    </div>
                    <div class="modaledit-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
				
				<!-- -->
				
				
				<div class="panel-body">

				
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
							
 <tr>
									<th data-sortable="true">No.</th>
									<th  data-sortable="true">NO. PO</th>
									<th  data-sortable="true">NO. SJ</th>
                               		<th  data-sortable="true">category</th>
									<th  data-sortable="true">Subcategory</th>
									<th  data-sortable="true">Nama Barang</th>
									<th  data-sortable="true">User input</th>
									<th  data-sortable="true">tgl masuk</th>
									<th  data-sortable="true">Keterangan</th>
									<th  data-sortable="true">jumlah</th>
									<th  data-sortable="true">proses</th>
						    </tr>
							
						    </thead>
							<?php
							require_once("config.php");
								$result="select * from barang_masuk";
								$query_input=mysqli_query($koneksi,$result);
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
                                        
                                        $kd=$data['id_brg'];
                                        $cekkd=mysqli_query($koneksi,"select * from inventarisi where objectid='$kd' and pls='$pls'");
                                        $kd_tampil	=	mysqli_fetch_array($cekkd);
                                     
                                        ?>
										<td><?php echo $data['no_po']; ?></td>
										<td><?php echo $data['no_sj']; ?></td>
                                        <td><?php echo $kd_tampil['jenis_group']; ?></td>
										<td><?php echo $kd_tampil['group_brg']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['user_input']; ?></td>
										<td><?php echo $data['tgl_msk']; ?></td>
                                        <td><?php echo $data['keterangan']; ?></td>
										 <td><?php echo $data['jumlah']; ?></td>
										 <td><a href="#" class="edit-brgmsk btn btn-primary" kd-msk="<?php echo $data['kd_masuk']; ?>" obj="<?php echo $data['objectid']; ?>" >EDIT </a>
										 <!-- <a href="hapus_brgmsk.php?obj=<?php echo $data['objectid'];?>"  kd-msk="<?php echo $data['kd_masuk']; ?>" obj="<?php echo $data['objectid']; ?>" onclick="return confirm('Apakah anda yakin ingin mengHapus data ini?');">HAPUS </a> -->
									
										 </td>
									
									<?php	$no++;
									}
								}
							 ?>
							</table>
						</div>
					</div>
				</div>
			</div>
	
													</div>
												</div>
							</form>
									
									
									
					</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->

<?php include "menu-bawah.php"; ?>
		<script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>
		
		
		
	
</body>
</html>


	
		<script>
        $(function(){
            $(document).on('click','.edit-brgmsk',function(e){
                e.preventDefault();
                $("#myModaledit").modal('show');
                $.post('formedit_brgmsk.php',
                    {id:$(this).attr('kd-msk'),
					obj:$(this).attr('obj')
					 
					},
                    function(html){
                        $(".modaledit-body").html(html);
                    }   
                );
            });

			$(document).on('click','.hapus-brgmsk',function(e){
                e.preventDefault();
                $("#myModalhapus").modal('show');
                $.post('hapus_brgmsk.php',
                    {id:$(this).attr('kd-msk'),
					obj:$(this).attr('obj')
					 
					},
                    function(html){
                        $(".modalhapus-body").html(html);
                    }   
                );
            });

        });
        
        //~ 


		
		
        
       
    </script>

<script type="text/javascript">
	$(document).ready(function(){
		$('select[id="cb_brg"]').change(function() {
           
			
			id_brg 	=$(this).val();
        
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                       // alert(stok);
                        $('#browsestok').html(stok);
                    }
                });
			
		}); 

	
	});
 
</script>


<script type="text/javascript">
	$(document).ready(function(){
		$('select[id="browsestok"]').change(function() {
			ikl 	=$(this).val();
           $('.nmbrg').val(ikl);
			
		}); 

	
	});
 
</script>



<script>
function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
