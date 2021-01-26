<!DOCTYPE html>
<html lang="en">
	<head>
<script src="assets/js/sweetalert-dev.js"></script>
<link rel="stylesheet" href="assets/css/sweetalert.css">
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
  
  $("#btnsubmit").click(function(){
  	$('#loadproses').show();
  	$('#btnsubmit').hide();
  });

  });

</script>
<?php include "menu-atas.php"; ?>
<?php include "menu-kiri.php"; 
require_once('config.php');
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
				<li class="active">Form Master Komputer</li>
			</ul><!-- /.breadcrumb -->

		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					Form Master Komputer
					<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					Overview &amp; Master Komputer
					</small>
				</h1>
			</div><!-- /.page-header -->
		
		</div><!-- /.page-content -->
		<div class="row">
			<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
				<form name="f_pp" action="in_master_komputer.php" method="POST" class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Komputer/kode lokasi</label>
						<div class="col-sm-9">
							<input type="text" id="form-field-1" placeholder="Nama Komputer" name="namakomp" class="col-xs-10 col-sm-4" style="text-transform:uppercase" />
						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Pengguna</label>
						<div class="col-sm-9">
							<input type="text" id="form-field-1" placeholder="Nama Pengguna" name="namapengguna" class="col-xs-10 col-sm-5" />
						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Bagian/lokasi</label>
						<div class="col-sm-9">
							<input type="text" id="form-field-1" placeholder="Bagian" name="bagian" class="col-xs-10 col-sm-3" />
						</div>
					</div>
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Waktu komputer</label>
						<div class="col-sm-9">
							<input type="text" id="form-field-1" placeholder="waktu" name="waktu" class="col-xs-10 col-sm-3"  onkeypress="return hanyaAngka(event)"/>
						</div>
					</div>

					<div class="space-4"></div>

					<!-- <div class="clearfix form-actions"> -->
						<br><br>
						<div class="col-md-offset-3 col-md-9">
							<button class="btn btn-info" type="Submit">
								<i class="ace-icon fa fa-check bigger-110"></i>
								Submit
							</button>
							&nbsp; &nbsp; &nbsp;
							<button class="btn" type="reset">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								Reset
							</button>
						</div>
					<!-- </div> -->

				</form>
			</div><!-- PAGE CONTENT ENDS -->
		</div><!-- /.row -->
		


<div class="modal fade" id="myModaleditkom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:900px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">ROSES</h4>
                    </div>
                    <div class="modaleditkom-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
				


		<div class="hr hr32 hr-dotted"></div>
		<div class="row">
			<div class="col-xs-12">

  					
  			<div class="table-responsive">
  				<table id="inven" class="table table-striped table-bordered" style="width:100%">
				  <thead>
				  <th>No</th>
				  <th>Komputer</th>
				  <th>Pengguna</th>
				  <th>Bagian</th>
				  <th>Wktu operasi</th>
				  <th>Update</th>
				  <th>Proses</th>

				  </thead>
				  <tbody>
						  <?php 
						 	$no=1; 
						  $cekkom=mysqli_query($koneksi,"select * from master_komputer");
							while($kom =mysqli_fetch_array($cekkom))
							{ ?>
							<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $kom['nama_komputer'];?></td>
							<td><?php echo $kom['nama_pengguna'];?></td>
							<td><?php echo $kom['bagian'];?></td>
							<td><?php echo $kom['waktu'];?></td>
					
							<td><?php echo $kom['tgl_update'];?></td>
							<td>
							<button class="edit-kom btn btn-warning btn-xs" data-id="<?php echo $kom['id']; ?>"><i class="ace-icon fa fa-pencil-square-o bigger-110 icon-only"></i></button>
							<a href="hapus_kom.php?obj=<?php echo $kom['id'];?>" onclick="return confirm('Apakah anda yakin ingin mengHapus data ini?');"><button class="btn btn-danger btn-xs"><i class="ace-icon glyphicon glyphicon-remove bigger-110 icon-only" ></i></button></a>
							</td>
							
							</tr>
						
				    	<?php } ?>
				  </tbody>
				  </table>
			 </div>	

				<!-- <div>
					<center>
					<iframe width="95%" height="780px" src="tb_master_komputer.php" name="iframetest" frameBorder="0" style="overflow:hidden;"></iframe> 
					</center>
				</div> -->
			</div>
		</div>
	</div>
</div><!-- /.main-content -->

<?php include "menu-bawah.php"; ?>
	<script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>
		
		<script>
        $(function(){
            $(document).on('click','.edit-kom',function(e){
			var c=	$(this).attr('data-id');
		
                e.preventDefault();
                $("#myModaleditkom").modal('show');
                $.post('from_editkom.php',
                    {obj:$(this).attr('data-id')},
                    function(html){
                        $(".modaleditkom-body").html(html);
                    }   
                );
            });
        });
        
        //~ 
        
       
    </script>
		
	
</body>
</html>


<script>
	$(document).ready(function() {
    $('#inven').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );
</script>
<script>
function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>

	
