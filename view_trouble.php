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
				<li class="active">Troubleshooting</li>
			</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
							Troubleshooting
                                <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
								
								</small>
							</h1>
						</div><!-- /.page-header -->
						
															
				<div class="panel panel-default">
					
						<div class="panel-body">
						
							<div class="modal fade" id="troubelmyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:1100px; height:1000px;">
									<div class="modal-content">
										<div class="modal-header" style="background:#DA70D6">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Edit trouble</h4>
										</div>
									<div class="troubelmodal-body">
									</div>
								<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
				<div class="col-md-12">
				<div class="panel panel-default ">
					<div class="panel-heading">Details</div>
		<form  action="simpan_trouble.php" method="post" id="ftb" name="ftb"class="form-horizontal" role="form">
							<br>	
                        <table>
                        <tr>
                            <td>Tanggal :</td><td> <input class="form-control date-picker" id="tgl" name='tgl' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" /></td>
                            <td>Bagian :</td><td><input type="text" name="bagian" id="bagian"></td>
                            <td>aplikasi :</td><td><input type="text" name="apl" name="apl"></td>    
                        </tr>
                        <tr><td colspan="6"><br></td></tr>
                        <tr>
                            <td>Komplain :</td><td><textarea  cols="30" rows="2" id="komplain" name="komplain"></textarea></td>
                            <td>keterangan:</td><td><textarea  cols="30" rows="2" id="ket" name="ket"></textarea></td>
                            <td>Solusi :</td><td><textarea   cols="30" rows="2" id="solusi" name="solusi"></textarea></td>
                    
                         </tr>
                         
                         <tr>
                         <td colspan=" 6"> <br>
                                  <center>
												<button class="btn btn-info" type="button" id="btntb" name="btntb">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>
                                </center>
                        </td>
                         </tr>
                        </table>			
			</form>				
					
					

<center>
								
		
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
							
 <tr>
								<th data-sortable="true">No.</th>
                                <th  data-sortable="true" >Proses</th>
									<th  data-sortable="true">Tanggal</th>
									<th  data-sortable="true">Bagian</th>
									<th  data-sortable="true">Aplikasi / Jaringan</th>
									<th  data-sortable="true">Komplain</th>
									<th  data-sortable="true">Keterangan</th>
                                    <th  data-sortable="true">Solusi</th>
						    </tr>
							
						    </thead>
                            <tbody>
							<?php
							require_once("config.php");
							
                                $query_input=mysqli_query($koneksi,"SELECT * FROM troubleshooting where pls='$pls'");
                                	$no = 1;
                               while($dt=mysqli_fetch_array($query_input)){
                                
                               ?>
                                <tr>
                                <td><?php echo $no++;?></td>
                                <td>
                                <button class="btn btn-pink" dob="<?php echo $dt['objectid']; ?>" id="edittrouble">Edit</button>
                                </td>
                                
                                <td><?php echo $dt['tanggal'];?></td>
                                <td><?php echo $dt['bagian'];?></td>
                                <td><?php echo $dt['aplikasi'];?></td>
                                <td><?php echo $dt['komplain'];?></td>
                                <td><?php echo $dt['keterangan'];?></td>
                                <td><?php echo $dt['solusi'];?></td>
                                </tr>
                                
                              <?php  } ?>
                              </tbody>
							</table>
		</div>
</div>
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
            $(document).on('click','#edittrouble',function(e){
                e.preventDefault();
                $("#troubelmyModal").modal('show');
                $.post('edittrouble_modal.php',
                    {id:$(this).attr('dob')},
                    function(html){
                        $(".troubelmodal-body").html(html);
                    }   
                );
            });
        });
        
        //~ 
        
       
    </script>
		
	
</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
        $('#btntb').show();
		$("#btntb").click(function(){
		
            $('#btntb').hide();
       
              var data      =$('#ftb').serialize();
              var tgl       =$('#tgl').val();
              var komplain  =$('#komplain').val();
			  var bagian	=$('#bagian').val();
			  var ket		=$('#ket').val();
			  var apl		=$('#apl').val();
              var solusi	=$('#solusi').val();

		//	alert(data);
            if (tgl==""){
			 sweetAlert("Tanggal harus diisi", "", "error");
		    $('#btntb').show();
			}
			 else  if (komplain==""){
			 sweetAlert("Komplain harus diisi", "", "error");
			 $('#btntb').show();
			} 
			 else  if (bagian==""){
			 sweetAlert("Bagian harus diisi ", "", "error");
			 $('#btntb').show();
			} 
			else  if (ket==""){
			 sweetAlert("Keterangan harus diisi", "", "error");
			 $('#btntb').show();
			} 
			else  if (apl=""){
			 sweetAlert("Aplikasi harus diisi", "", "error");
			 $('#btntb').show();
			}
			else  if (solusi==""){
			 sweetAlert("Solusi harus diisi", "", "error");
			 $('#btntb').show();
			}

		$.ajax({
		type: 'POST',
		url: "simpan_trouble.php",
		data: data,														
		
		success: function(stok) {

                swal({ 
						title: "Succes!",
						text: "DATA DI SIMPAN",
						type: "success" 
					});

              $('#tgl').val("");
              $('#komplain').val("");
			  $('#bagian').val("");
			  $('#ket').val("");
			  $('#apl').val("");
              $('#solusi').val("");
			   $('#btntb').show("");
			    location.reload();
			}
		  })//CEK JML
		});

	});
	</script>

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