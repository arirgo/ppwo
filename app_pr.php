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
		<title>Approve REQUEST</title>

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
						<a href="#">Home</a>
					</li>
				<li class="active">REQUEST NO PR</li>
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
								<div class="modal-body"></div>
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
								<div class="modal-body"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				
				<!-- -->
                	<!-- -->
					<div class="panel panel-default">
					
					<div class="panel-body">
						
						<div class="modal fade" id="modal_pr" tabindex="-1" role="dialog" aria-labelledby="twoModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:380px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="twoModalLabel">Input no PR</h4>
                    </div>
                    <div class="modal-body-pr">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
				
				<!-- -->
				
		<!-- tampilan 2 row -->
<div class="panel-body">
<div class="row">
				
<div class="col-sm-12">
<div class="panel-heading">List Permintaan NO PR</div>

	

<table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
							
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor PP /WO</th>
									<th  data-sortable="true">Nomor PR</th>
									<th  data-sortable="true">Jenis</th>
									<th  data-sortable="true">Request</th>
									<th  data-sortable="true">User</th>
                                    <th  data-sortable="true">Pemohon</th>
                                    <th  data-sortable="true">Kategori</th>
                                    <th  data-sortable="true">Nama Barang</th>
                                    <th  data-sortable="true">Jumlah</th>
                                
                                    <th  data-sortable="true">tgl_req</th>
                                    <th  data-sortable="true">proses</th>
                                   
						    </tr>
							
						    </thead>
                            <tbody>
                            <?php 
   $no=1;
	require_once("config.php"); 
	session_start();
	 $usr=$_SESSION['username'];
	 $pls=$_SESSION['pls'];
	if($usr=="ssh-it" OR $usr=="sh-itho")
	{	
	$view	= mysqli_query($koneksi,"select * from request where no_pr='' and pls='$pls' and request in('service_eksternal','order')");
	}else{
	$view	= mysqli_query($koneksi,"select * from request where no_pr<>'' and pls='$pls' and user_approve='' and request in('service_eksternal','order')");
	}
                           while ($datapp	= mysqli_fetch_array($view))
                           {?>
<tr><td> <?php echo $no++; ?> </td>
<td><a href="#" class="edit-record" data-id="<?php echo $datapp['no_request']; ?>" > <?php echo $datapp['no_request']; ?></a> </td>
<td> <?php echo $datapp['no_pr']; ?> </td>
<td> <?php echo $datapp['jenis']; ?> </td>
<td> <?php echo $datapp['request']; ?> </td>
<td> <?php echo $datapp['user']; ?> </td>
<td> <?php echo $datapp['user_request'];?> </td>
<td> <?php echo $datapp['katagori']; ?> </td>
<td> <?php echo $datapp['nm_barang']; ?> </td>
<td> <?php echo $datapp['jumlah']; ?> </td>

<td> <?php echo $datapp['reqdate']; ?> </td>
<td>  
<?php if($levuser['level_user']=="h_it")
	{?>
	<a href="#" nama="tbh_pr" id="tbh_pr"  obj="<?php echo $datapp['objectid'];?>" data-no="<?php echo $datapp['no_request']; ?>"leveluser="<?php echo $levuser['level_user'] ?>" data-user="<?php echo $datapp['user_request']; ?>" jenis="<?php echo $datapp['jenis']; ?>" class="btn btn-minier btn-primary" ><i class="ace-icon fa fa-pencil-square-o"></i>NO PR</a> </td>
	<?php }else{?>
	<a href="#" nama="tbh_pr" id="tbh_pr" obj="<?php echo $datapp['objectid'];?>" data-no="<?php echo $datapp['no_request']; ?>" leveluser="<?php echo $levuser['level_user'] ?>" data-user="<?php echo $datapp['user_request']; ?>" jenis="<?php echo $datapp['jenis']; ?>" class="btn btn-minier btn-primary" ><i class="ace-icon fa fa-pencil-square-o"></i> Terima</a> </td>
	<?php } ?>
</tr>
                           <?php }?>
                            </tbody>
							</table>
</div>
		
</div>
</div> 
<!-- <iframe  width="100%" height="580px" src="http://192.168.20.3:9090/requisition/" name="iframetest" frameBorder="0"></iframe> -->
<iframe  width="100%" height="580px" src="https://192.168.20.9:8181/requisition/" name="iframetest" frameBorder="0"></iframe>

<!-- 
<iframe width="100%" height="580px" src="http://192.168.20.3/lp3/lp3_paperless/add_paperless?oid=<?php echo $oid;?>&oiddet=<?php echo $oiddet; ?>&woid=<?php echo $woidlp3;?>&wo=<?php echo $wolp3;?>&order=<?php echo $nama_orderlp3;?>&mesin=<?php echo $mesinlp3;?>&bagian=<?php echo $bagianlp3;?>&nolot=<?php echo $nolot;?>&sublot=<?php echo $sublot;?>&status=<?php echo $statuslp3;?>&opr=<?php echo $operator2lp3;?>&qty=<?php echo $qtylp3;?>&section=<?php echo $sectionlp3;?>" name="iframetest" frameBorder="0"></iframe> -->

<?php include "menu-bawah.php"; ?>
		<script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>
	<script>
        $(function(){
            $(document).on('click','#tbh_pr',function(e){
                e.preventDefault();
                $("#modal_pr").modal('show');
                $.post('no_pr_modal.php',
                    {
                        id_pr:$(this).attr('data-no'),
                        jenis:$(this).attr('jenis'),
                        user_request:$(this).attr('data-user'),
						leveluser:$(this).attr('leveluser'),
						obj:$(this).attr('obj'),
					
						
                       
                 
                    },
                    function(html){
                        $(".modal-body-pr").html(html);
                    }   
                );
            });
        });
    
    </script>
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
        
       
    </script>
		
	
</body>
</html>
