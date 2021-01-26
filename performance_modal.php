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

<?php require_once('config.php');
 
  $nama     =$_POST['nama'];
  $tgl1     =$_POST['tgl1'];
  $tgl2     =$_POST['tgl2'];
  $tabel    =$_POST['tabel'];
  $cek_user =mysqli_query($koneksi,"select * from user where nama='$nama'");
  $dt       =mysqli_fetch_array($cek_user);
  $id_user  =$dt['username'];
  $dev      =$dt['nama'];
  
  
?>
<!-- --------------------------------------------------------------------------------wo -->
<?php if($tabel=="WO"){?>

    
          <form name="formnilai" method="POST" class="form-horizontal" role="form" id="formnilai">
            <div class="form-group">
	        	<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kode Project</label>
			<div class="col-sm-9">
				<input type="text" id="txtproject" class="col-xs-10 col-sm-5" name="txtproject"  readonly required>
			</div>
			</div>
                                    
            <div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama</label>
			<div class="col-sm-9">
				<input type="text" id="username" class="col-xs-10 col-sm-5" name="txtuser" value="<?php echo $nama;?>" readonly required>
                <input type="hidden" id="id_user" class="col-xs-10 col-sm-5" name="txtid" value="<?php echo $nama;?>" readonly required>
	        </div>
			</div>

            <div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nilai Project</label>
	    	<div class="col-sm-9">
		    	<input type="text" id="nilai" class="col-xs-10 col-sm-3" name="nilai" onkeypress="return hanyaAngka(event)" required>
                <input type="hidden"  class="col-xs-10 col-sm-3" name="group" id="group" value="WO" >
			</div>
			</div>
            <CENTER> <input type="button"class="simpan_nilai btn btn-info"   value="SIMPAN" id="simpan_nilai"></CENTER>
		 <br><br>
          </form>
						
        <table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
        <thead>						
            <tr>
                <th data-sortable="true">No.</th>
                <th  data-sortable="true">Nomor WO</th>
                <th  data-sortable="true">Status</th>
                <th  data-sortable="true">Nilai</th>
                
        </thead>
        <tbody>
        <?php 
        $no=1;
        require_once("config.php"); 
        $view	= mysqli_query($koneksi,"select * from tbl_wo where diterima='$nama' and tgl_diterima between '$tgl1' and '$tgl2'");
         while ($datawo	= mysqli_fetch_array($view))
        { 
            $nowo=$datawo['no_wo'];?>
        <tr><td> <?php echo $no++; ?> </td>
        <td><a href="#" class="edit-record2" data-id="<?php echo $datawo['no_wo']; ?>" > <?php echo $datawo['no_wo']; ?> </a></td>
        <td> <?php echo $datawo['status_wo']; ?> </td>
        <td> <?php  $ceknilai	= mysqli_query($koneksi,"select * from nilai_wo where username='$nama' and no_wo='$nowo'");
                            $datanilai	= mysqli_fetch_array($ceknilai)    
            ?>
           <?php echo  $nilaiku= $datanilai['nilai_wo']; ?>                     
         </td>
        </tr>
                                <?php }?>
                                
        </table>

  <?php }  else if($tabel=="PP"){?>
<!-- --------------------------------------------------------------------------------pp -->
                <form name="formnilai" method="POST" class="form-horizontal" role="form" id="formnilai">
                 <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kode Project</label>
					<div class="col-sm-9">
						<input type="text" id="txtproject" class="col-xs-10 col-sm-5" name="txtproject"  readonly required>
					</div>
				</div>
                                    
                <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama</label>
					<div class="col-sm-9">
						<input type="text" id="username" class="col-xs-10 col-sm-5" name="txtuser" value="<?php echo $nama;?>" readonly required>
                        <input type="hidden" id="id_user" class="col-xs-10 col-sm-5" name="txtid" value="<?php echo $nama;?>" readonly required>
			     </div>
				</div>

                <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nilai Project</label>
					<div class="col-sm-9">
						<input type="text" id="nilai" class="col-xs-10 col-sm-3" name="nilai" required onkeypress="return hanyaAngka(event)">
    				</div>
				</div>
                                    
               <CENTER> <input type="button"class="simpan_nilai btn btn-info"   value="SIMPAN" id="simpan_nilai"></CENTER>
                        <input type="hidden"  class="col-xs-10 col-sm-3" name="group" id="group" value="PP" >
			    <br><br>
                </form>

                <table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
        <thead>						
            <tr>
                <th data-sortable="true">No.</th>
                <th  data-sortable="true">Nomor PP</th>
                <th  data-sortable="true">Status</th>
                <th  data-sortable="true">Downtime</th>
                <th  data-sortable="true">Nilai</th>
                
        </thead>

        <tbody>
        <?php 
        $no=1;
            require_once("config.php"); 
            $view	= mysqli_query($koneksi,"select * from tbl_pp where diterima='$nama' and tgl_terima between '$tgl1' and '$tgl2'");
                                while ($datawo	= mysqli_fetch_array($view))
                                {$nopp=$datawo['no_pp'];?>
        <tr><td> <?php echo $no++; ?> </td>
        <td><a href="#" class="edit-record" data-id="<?php echo $datawo['no_pp']; ?>" > <?php echo $datawo['no_pp']; ?> </a></td>
       
        <td> <?php echo $datawo['status_pp']; ?> </td>
        <td> <?php echo $datawo['downtime']; ?> </td>
        <td> <?php  $ceknilai	= mysqli_query($koneksi,"select * from nilai_pp where username='$nama' and no_pp='$nopp'");
                            $datanilai	= mysqli_fetch_array($ceknilai)    
            ?>
           <?php echo  $nilaiku= $datanilai['nilai_pp']; ?>                     
         </td>

        </tr>
                                <?php }?>
                                
        </table>
  <?php }else if($tabel=="MODUL"){ ?>
<!-- --------------------------------------------------------------------------------MODULL -->
    <table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
        <thead>						
            <tr>
                <th data-sortable="true">No.</th>
                <th  data-sortable="true">Project</th>
                <th  data-sortable="true" >Modul</th>
                <th  data-sortable="true" >Jenis</th>
                
        </thead>

        <tbody>
        <?php 
        $no=1;
            require_once("config.php"); 
            $view	= mysqli_query($koneksi,"select * from detail_project where username='$id_user' and tgl_kerja between '$tgl1' and '$tgl2'");
                                while ($datawo	= mysqli_fetch_array($view))
                                {?>
        <tr><td> <?php echo $no++; ?> </td>
        <td><a href="#" class="#" data-id="<?php echo $datawo['no_project']; ?>" > <?php echo $datawo['no_project']; ?> </a></td>
        <td> <?php echo $datawo['detail_pekerjaan']; ?> </td>
        <td> <?php echo $datawo['group_project']; ?> </td>

        </tr>
                                <?php }?>
                                
        </table>

  <?php } else{ ?>

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
											<textarea rows="3" cols="35 " id="txtmasalah" placeholder="Permasalahan Komputer" name="txtpermasalahan"></textarea>
											<label style='margin-left: 5px;' id="pesan2"></label>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ditujukan ( HARAP DIPILIH )</label>

										<div class="col-sm-9">
											<input type="radio" name="radio" value="infra">Infrastruktur
											<input type="radio" name="radio" value="prog">Programmer
											</select
											<label style='margin-left: 5px;' id="pesan2"></label>
										</div>
									</div>

  <?php } ?>

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
                        $(".modal-body").html(html);
                    }   
                );
            });
            
            $(document).on('click','.edit-record2',function(e){
                e.preventDefault();
                $("#myModal2").modal('show');
                $.post('view_planing_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
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




<script type="text/javascript">
	$(document).ready(function(){
		$("#simpan_nilai").click(function(){

       
              var data           =    $('#formnilai').serialize();
              var project           =    $('#txtproject').val();
               var nilai           =    $('#nilaiwo').val();
            
         if (nilai==""){
			 sweetAlert("NILAI HARUS DIISI", "", "error");
			 $("#simpan_nilai").show();
			}
          else  if (project==""){
			 sweetAlert("NO PROJECT WO HARUS DI ISI", "", "error");
			 $("#simpan_nilai").show();
			}else{
			$.ajax({
				type: 'POST',
				url: 'simpan_nilai.php',
				data: data,
				success: function(msg) {
                        
                       data=msg.split("&");
                              typealert = data[1];
                            //   alert(typealert);
						 	if (typealert== 'ERROR'){
			            	  sweetAlert("NILAI PROJECT SUDAH ADA", "", "error");
                              $("#simpan_nilai").show();
                              
                            

                        }else{
                               
                              swal({ 
	                          title: "Transaksi Berhasil!", 
                                    text: "I will close in 2 seconds.",
                                 
                                    type: "success"
	                             });
                            
                        }
					
				}
			});
            }
	
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