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

		
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/bootstrap-duallistbox.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-multiselect.min.css" />
		<link rel="stylesheet" href="assets/css/select2.min.css" />
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
  
  $("#btnsubmit").click(function(){
  	$('#loadproses').show();
  	// $('#btnsubmit').hide();
  });
	  
  });

</script>
<?php include "menu-atas.php"; ?>
<?php include "menu-kiri.php"; 
 $user;
$cekpls=mysqli_fetch_array(mysqli_query($koneksi,"select * from user where username='$user'"));
$pls=$cekpls['pls'];
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
				<li class="active">Form PP Online</li>
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Form PP Online
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Overview &amp; Permintaan Perbaikan IT
								</small>
							</h1>
						</div><!-- /.page-header -->
						<form name="f_pp" action="pp_proses.php" method="POST" class="form-horizontal" role="form" onsubmit='return kosong();'>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor PP</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" name="txtnopp" value="<?php 
								
								require_once('config.php');
								$sqlw = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
								$isi  = mysqli_fetch_array($sqlw);
								$sec  = $isi['section'];
								$sqlx = mysqli_query($koneksi,"SELECT max(no) as noac from tbl_pp where year(tgl_lapor)=year(CURDATE()) and month(tgl_lapor)=month(CURDATE())");
								$data = mysqli_fetch_array($sqlx);
								$no = intval($data['noac']);
								//echo $no;
									if (($no>=0)&&($no<=8)){
											$no= $no+1;
											 echo "00".$no;
										}else if (($no>=9)&&($no<=98)){
												$no= $no+1;
											 echo "0".$no;
											}else if (($no>=99)&&($no<=998)){
												$no= $no+1;
											 echo $no;
											}
								
								
								$sql = mysqli_query($koneksi,"select * from user where username='".$nopp."'");
								
								$data2 = mysqli_fetch_array($sql);
								
								if($data2['pls']=="ho")
								{
									echo '/'.$data2['singkatan'].'/'.'PP/HO/'.date('m/y');
								}else{
									echo '/'.$data2['singkatan'].'/'.'PP'.'/'.date('m/y');
								}
								
								
					
					?>" readonly>  
									<?php
									if($data2['pls']=="ho"){
										echo "<input type='hidden' name='pls' value='ho'>";
									}else{
									echo "<input type='hidden' name='pls' value='fc'>";	
									}
									?>
									<input type="hidden" name="txtno" value="<?php echo $no;?>">
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Section</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" class="col-xs-10 col-sm-3" name="txtsection" value="<?php echo $data2['section'];?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pelapor</label>

										<div class="col-sm-9">
											<input type="text" id="txtpelapor" name="txtpelapor" value="<?php echo $data2['nama'];?>" class="col-xs-10 col-sm-5" readonly />
											<label style='margin-left: 5px;' id=pesan1></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Permasalahan</label>

										<div class="col-sm-9">
											<textarea rows="3" cols="35 " id="txtmasalah"  name="txtpermasalahan" required></textarea>
											<label style='margin-left: 5px;' id="pesan2"></label>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ditujukan ( HARAP DIPILIH )</label>

										<div class="col-sm-9">
												<select name="radio" id="radio" required>
												<option value="">--PILIH--</option>
										<option value="infra">Infrastruktur</option>
										<option value="prog">Programmer</option>
										</select>
											<!-- <input type="radio" name="radio" value="infra">Infrastruktur
											<input type="radio" name="radio" value="prog">Programmer
											</select
											<label style='margin-left: 5px;' id="pesan2"></label> -->
										</div>
									</div>

									
					
					

<center>
									<table>
										<tr>
											<td>
												<div id="loadproses">
													<!-- <p><img src="loader.gif" /> Loading...</p> -->
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
									</form>
								</center>
								</div>
				<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Details</div>
					<div class="panel-body">
				<!-- -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:900px">
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
				
				<!-- -->
				
				<div class="panel-body">
<!-- Hasil pencarian----------------------------				 -->
<?php 	if(isset($_POST['tombol'])){
	
	    $stt =$_POST['stt'];
		$dev =$_POST['dev'];
    	$tglf=$_POST['tglf'];
		$tglt=$_POST['tglt'];
		$caripp=$_POST['caripp'];
		$group="PP";


if($caripp<>'')
{
	$inputdata .="and no_pp='$caripp' ";
}else{}
if($stt<>'')
{
	$inputdata .="and status_pp='$stt' ";
}else{}
if($dev<>'')
{
	$inputdata .="and it='$dev' ";
}else{}
if($tglf<>'')
{
	$inputdata .="and tgl_lapor between '$tglf' and '$tglt' ";
}else{}

		?>
		
<form action="form-pp.php" method="post" name="ostpp" id="ostpp">
		<table style="float:right;">
		<tr>
		<td>PP</td>
			<td><input type="text" name="caripp" id="caripp"></td>
			<td>Status</td>
			<td><select name="stt" id="stt">
				<option value="">--Pilih--</option>
				<option value="waiting">Waiting</option>
				<option value="on process">on process</option>
				<option value="status">Hold</option>
				<option value="finish">Finish</option>
				</select></td>
				<td>Dev</td>
			<td><select name="dev" id="dev">
				<option value="">--Pilih--</option>
				<option value="infra">Infrastruktur</option>
				<option value="prog">Programmer</option>
				
				</select></td>
			<td>From</td>
			<td><input type="text" name="tglf" id="tglf"  class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off" ></td>
			<td>To</td>
			<td><input type="text" name="tglt" id="tglt" class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off"  ></td>
			<td><input type="submit" name="tombol" class="btnost btn btn-primary" style="border-radius:5px;" value="Status PP"></td>
			<td><a href="export_ostanding.php?tglf=<?php echo $tglf; ?>&tglt=<?php echo $tglt; ?>&stt=<?php echo $stt; ?>&dev=<?php echo $dev; ?>&group=<?php echo $group; ?>&pls=<?php echo $pls; ?>" style="border-radius:5px;" class="btn btn-success"><i class="ace-icon fa fa-cloud-download"></i>Export PP</a></td>

			</tr></table>

</form>		
<br><br><br><br>
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
							
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor PP</th>
									<th  data-sortable="true">Tgl Lapor</th>
									<th  data-sortable="true">Nomor Tiket</th>
									<th  data-sortable="true">Status</th>
									<th  data-sortable="true">It</th>
									<th  data-sortable="true">Action</th>
						    </tr>
							
						    </thead>
							<?php
							require_once("config.php");
							
								$query_input=mysqli_query($koneksi,"select * from tbl_pp where no_pp !=0 and pls='$pls' $inputdata order by tgl_lapor asc");
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
										<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
									<?php
										echo '<td>'.$data['tgl_lapor'].'</td>';
										echo '<td>'.$data['no_antri'].'</td>';
										echo '<td>'.$data['status_pp'].'</td>';
										if(($data['status_pp']=='waiting')or($data['status_pp']=='hold')){
											echo '<td>'.$data['it'].'</td>';
											echo '<td>-</td>';
										}else if($data['status_pp']=='on process'){
											echo '<td>'.$data['it'].'</td>';
											echo '<td>
											<a href="pp_approve.php?nopp='.$data['no_pp'].'" class="btn  btn-minier btn-primary">
											<i class="ace-icon fa fa-pencil-square-o"></i>
											APPROVE
																					</a></td>';
										}else if ($data['status_pp']=='finish'){
											echo '<td>'.$data['it'].'</td>';
											echo'<td>-</td>';
											}
										echo '</tr>';
										
										$no++;
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
							
									



<?php }else{?>	
<!-- akhir Hasil pencarian----------------------------				 -->	
<?php session_start();
$userlog=$_SESSION['username'];
$cekuser=mysqli_query($koneksi,"select *from user where username='$userlog'");
$logdev=mysqli_fetch_array($cekuser);

if($logdev['section']=="IT"){?>
<form action="form-pp.php" method="post" name="ostpp" id="ostpp">
		<table style="float:right">
		<tr>
			<td>PP</td>
			<td><input type="text" name="caripp" id="caripp"></td>
			<td>Status</td>
			<td><select name="stt" id="stt">
				<option value="">--Pilih--</option>
				<option value="waiting">Waiting</option>
				<option value="on process">on process</option>
				<option value="status">Hold</option>
				<option value="finish">Finish</option>
				</select></td>
				<td>Dev</td>
			<td><select name="dev" id="dev">
				<option value="">--Pilih--</option>
				<option value="infra">Infrastruktur</option>
				<option value="prog">Programmer</option>
				
				</select></td>
			<td>From</td>
			<td><input type="text" name="tglf" id="tglf"  class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off" ></td>
			<td>To</td>
			<td><input type="text" name="tglt" id="tglt" class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off"  ></td>
			<td><input type="submit" name="tombol" class="btnost btn btn-primary" style="border-radius:5px;" value="Status PP"></td>
			</tr></table>

</form>		
<?php }  else{}?>
<br>
<br>
<br>
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
							
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor PP</th>
									<th  data-sortable="true">Nomor Tiket</th>
									<th  data-sortable="true">Status</th>
									<th  data-sortable="true">It</th>
									<th  data-sortable="true">Action</th>
						    </tr>
							
						    </thead>
							<?php
							require_once("config.php");
								$result="select * from tbl_pp where section='".$sec."' and pls='$pls' and status_pp not in('finish','complete') order by tgl_lapor asc";
								$query_input=mysqli_query($koneksi,$result);
								if ($query_input){
								   // mengulangi data agar tidak hanya 1 yang tampil
									$no = 1;
									while($data = mysqli_fetch_array($query_input)){
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
										<td><a href="#" class="edit-record" data-id="<?php echo $data['no_pp']; ?>" ><?php echo $data['no_pp']; ?></a></td>
									<?php
										echo '<td>'.$data['no_antri'].'</td>';
										echo '<td>'.$data['status_pp'].'</td>';
										if(($data['status_pp']=='waiting')or($data['status_pp']=='hold')){
											echo '<td>'.$data['it'].'</td>';
											echo '<td>-</td>';
										}else if($data['status_pp']=='on process'){
											echo '<td>'.$data['it'].'</td>';
											echo '<td>
											<a href="pp_approve.php?nopp='.$data['no_pp'].'" class="btn  btn-minier btn-primary">
											<i class="ace-icon fa fa-pencil-square-o"></i>
											APPROVE
																					</a></td>';
										}else if ($data['status_pp']=='finish'){
											echo '<td>'.$data['it'].'</td>';	
											echo'<td>-</td>';
											}
										echo '</tr>';
										
										$no++;
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
							
									
									
	<?php } ?>						
					</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->

<?php include "menu-bawah.php"; ?>
		<script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>
	

		



		

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.bootstrap-duallistbox.min.js"></script>
		<script src="assets/js/jquery.raty.min.js"></script>
		<script src="assets/js/bootstrap-multiselect.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/typeahead.jquery.min.js"></script>

		<!-- ace scripts -->
	
		<script src="assets/js/ace.min.js"></script>
		
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


<script type="text/javascript">
			jQuery(function($){
			    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'});
				var container1 = demo1.bootstrapDualListbox('getContainer');
				container1.find('.btn').addClass('btn-white btn-info btn-bold');
			
				/**var setRatingColors = function() {
					$(this).find('.star-on-png,.star-half-png').addClass('orange2').removeClass('grey');
					$(this).find('.star-off-png').removeClass('orange2').addClass('grey');
				}*/
				$('.rating').raty({
					'cancel' : true,
					'half': true,
					'starType' : 'i'
					/**,
					
					'click': function() {
						setRatingColors.call(this);
					},
					'mouseover': function() {
						setRatingColors.call(this);
					},
					'mouseout': function() {
						setRatingColors.call(this);
					}*/
				})//.find('i:not(.star-raty)').addClass('grey');
				
				
				
				//////////////////
				//select2
				$('.select2').css('width','200px').select2({allowClear:true})
				$('#select2-multiple-style .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('.select2').addClass('tag-input-style');
					 else $('.select2').removeClass('tag-input-style');
				});
				
				//////////////////
				$('.multiselect').multiselect({
				 enableFiltering: true,
				 buttonClass: 'btn btn-white btn-primary',
				 templates: {
					button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"></button>',
					ul: '<ul class="multiselect-container dropdown-menu"></ul>',
					filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
					filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
					li: '<li><a href="javascript:void(0);"><label></label></a></li>',
					divider: '<li class="multiselect-item divider"></li>',
					liGroup: '<li class="multiselect-item group"><label class="multiselect-group"></label></li>'
				 }
				});
				
				
				///////////////////
					
				//typeahead.js
				//example taken from plugin's page at: https://twitter.github.io/typeahead.js/examples/
				var substringMatcher = function(strs) {
					return function findMatches(q, cb) {
						var matches, substringRegex;
					 
						// an array that will be populated with substring matches
						matches = [];
					 
						// regex used to determine if a string contains the substring `q`
						substrRegex = new RegExp(q, 'i');
					 
						// iterate through the pool of strings and for any string that
						// contains the substring `q`, add it to the `matches` array
						$.each(strs, function(i, str) {
							if (substrRegex.test(str)) {
								// the typeahead jQuery plugin expects suggestions to a
								// JavaScript object, refer to typeahead docs for more info
								matches.push({ value: str });
							}
						});
			
						cb(matches);
					}
				 }
			
				 $('input.typeahead').typeahead({
					hint: true,
					highlight: true,
					minLength: 1
				 }, {
					name: 'states',
					displayKey: 'value',
					source: substringMatcher(ace.vars['US_STATES'])
				 });
					
					
				///////////////
				
				
				//in ajax mode, remove remaining elements before leaving page
				$(document).one('ajaxloadstart.page', function(e) {
					$('[class*=select2]').remove();
					$('select[name="duallistbox_demo1[]"]').bootstrapDualListbox('destroy');
					$('.rating').raty('destroy');
					$('.multiselect').multiselect('destroy');
				});
			
			});
		</script>