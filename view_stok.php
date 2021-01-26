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
						<a href="#">Home</a>
					</li>
				<li class="active">Form Barang</li>
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								inventory 
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									STOK 
								</small>
							</h1>
						</div><!-- /.page-header -->
						
				<div class="col-md-12">
				
				
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
                               		<th  data-sortable="true">category</th>
									<th  data-sortable="true">Subcategory</th>
									<th  data-sortable="true">Nama Barang</th>
                                    <th  data-sortable="true">STOK</th>
									<th  data-sortable="true">Keterangan</th>
									 </tr>
							
						    </thead>
							<?php
							require_once("config.php");
								$result="select * from stok";
								$query_input=mysqli_query($koneksi,$result);
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
                                        
                                        $kd=$data['kd_jenis'];
                                        $cekkd=mysqli_query($koneksi,"select * from inventarisi where objectid='$kd'");
                                        $kd_tampil	=	mysqli_fetch_array($cekkd);
                                     
                                        ?>
                                        <td><?php echo $kd_tampil['jenis_group']; ?></td>
										<td><?php echo $kd_tampil['nama_barang']; ?></td>
                                        <td><?php echo $data['nama_barang']; ?></td>
                                        <td><?php echo $data['jumlah_stok']; ?></td>
                                        <td><?php echo $data['keterangan']; ?></td>
										
									
									<?php	$no++;
									}
								}
							 ?>
							</table>
						</div>
					</div>
				
			</div>
	
			 <form action='cek_transaction_inv.php' name="trans" id="trans" method="post" enctype="multipart/form-data" target="transactionbrowse">
            <?php $tgl=date('Y-m-d');?>
		<table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="9" style=" background-color:#FF7C00;">Transaction  </td>
			</tr>
			
			<tr>
				<!-- <td>From </td> -->
                <!-- <td><input type="text" id="tglfrom" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglfrom" value="<?php echo $tgl;?>" ></td>
                <td>To</td>
                <td><input type="text" id="tglto" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglto" value="<?php echo $tgl;?>" ></td> -->
			<td colspan="3">
										<select name="bulan" id="bulan">
										<option value="">--Bulan--</option>
										<?php
											$bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
											for($y=1;$y<=12;$y++){
												if($y==date('m')){ $pilih="selected";}
												else {$pilih="";}
						
												echo('<option value="'.$y.'"'.$pilih.'>'.$bulan[$y].'</option>'.'\n');
											}
										?>
										</select>
										&nbsp; - &nbsp;
										<select name="tahun" id="tahun">
										<?php
											$mulai= date('Y') -10;
											$thnini= date('Y');
											for($i = $mulai;$i<= $thnini;$i++){
												$sel = $i == date('Y') ? ' selected="selected"' : '';
												echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
											}
											?>
										</select>
										
										<!-- <button type="submit" name="tombol" value="SEARCH"><i class="ace-icon fa fa-search"></i>Search</button> -->
									</td>
			
			<td>
               					
										
					   <select name="cb_brg" id="cb_brg" class="chosen-select pilihsf" style="width:70px;" required>
				
				
  					<option value="" >--PILIH--  </option>
					<?php
					$result=mysqli_query($koneksi,"SELECT * FROM inventarisi where objectid !=''  $pr ORDER BY nama_barang asc");
					while($isi  = mysqli_fetch_array($result)){ ?>
					<option value="<?php echo $isi['objectid'];?>"><?php echo $isi['kode_it']." - ".$isi['nama_barang'];?></option>
					
					<?php } ?>
					</select>
				
					<select name="nmbrg" id="nmbrg">
					<option value="">--PILIH--</option>
					</select>  
                </td>
					
			
                <td style="width: 5%; border:0;">
				<select name="lapor" id="lapor">
				<option value="">--PILIHAN--</option>
				<option value="history">History</option>
					<option value="barang_masuk">IN</option>
					<option value="barang_keluar">OUT</option>
				</select>      
			        
				</td>
				<td style="width: 5%; border:0;"></td>
				<td style="width: 25%; border:0;">
					<button type="submit" class="tombol_trans btn btn-primary btn-xs" style="width: 120px;" name="tombol_trans"  value="SEARCH" id="tombol_trans"><i class="ace-icon fa fa-search"></i> Search</button>
				</td>
			</tr>
			
			
		</table>
		</form>
		<!-- <div class="tampil-trans"></div> -->
 <iframe width="100%" height="580px" src=""  name="transactionbrowse" id="transactionbrowse" frameBorder="0"></iframe>

            <!-- <form action="report_inventory.php" method="post" target="framereportinv">
            <?php $tgl=date('Y-m-d');?>
		<table width="80%" id="tblhis" border="0" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="9" style=" background-color:#FF7C00;">Browse Report </td>
			</tr>
			
			<tr>
				<td>From </td>
                <td><input type="text" id="tglfrom" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglfrom" value="<?php echo $tgl;?>" ></td>
                <td>To</td>
                <td><input type="text" id="tglto" class="date-picker"  data-date-format="yyyy-mm-dd" autocomplete="off" name="tglto" value="<?php echo $tgl;?>" ></td>
			<td>
                <select name="inv" id="inv" required>
                <option value="">----Pilih--</option>
					<option value="barang_masuk">Barang Masuk</option>
					<option value="barang_keluar">Barang Keluar</option>
				</select>
                </td>

                <td style="width: 5%; border:0;">
				<select name="from" id="from">
					<option value="ASC">ASC</option>
					<option value="DESC">DESC</option>
				</select>                
				</td>
				<td style="width: 5%; border:0;"></td>
				<td style="width: 25%; border:0;">
					<button type="submit" class="btn btn-primary btn-xs" style="width: 120px;" name="tombol"  value="SEARCH" id="tombol"><i class="ace-icon fa fa-search"></i> Search</button>
				</td>
			</tr>
			
			
		</table>
		</form>


													</div>
												</div>
							
									
                                                <center>
	
    <iframe width="100%" height="580px" src=""  name="framereportinv" id="framereportinv" frameBorder="0"></iframe>
   -->
</center>
                          
									
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
	<!-- <script>
        $(function(){
            $(document).on('click','.tombol_trans',function(e){
                e.preventDefault();
              
                $.post('cek_transaction_inv.php',
                    {tglfrom:$("#tglfrom").val(),
					  tglto:$("#tglto").val(),
					 barang :$("#cb_brg").val(),
					},
                    function(html){
                        $(".tampil-trans").html(html);
                    }   
                );
            });
        });
        
        //~ 
       
    </script> -->
<!-- tessss -->


<script type="text/javascript">
	$(document).ready(function(){

	
		$('select[id="cb_brg"]').change(function() {
           
			
			id_brg 	=$(this).val();
     
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                      //  alert(stok);
                        $('#nmbrg').html(stok);
                    }
                });
			
		}); 

	
	});
 
</script>
