<?php
session_start();
$tgl=date('d-m-Y');
?>


<div><form name="fmdaily" id="fmdaily" class="fmdaily" method="post">
    <table width="80%" border="1" class="table table-striped table-bordered table-hover">
    <input type="hidden" value="1" id="total_modul"  name="jumlahmodul">
    <tr><th>KODE PROJECT</th>
        <th>TANGGAL</th>
        <th>PIC</th>
        <th>PEKERJAAN / MODUL</th>
        <th>DIMINTA OLEH</th>
        <th>SECTION</th>
        <th>KETERANGAN</th>
        <th>BARIS</th>
        
    </tr>
    <tr><td><select name="cek_pilih" id="cek_pilih">
            <option value="">-PILIH-</option>
            <option value="PP">PP</option>
            <option value="WO">WO</option>
            </select><br>
            
             <select name="project" id="project">
            <option value="">-PILIH-</option>
          
             </select>
            </td>
      
      
        	<td><div class="input-group">
                                            <input class="form-control date-picker" id="tgl" name='tgl' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo date('Y-m-d');?>"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div></td>
        <td><input type="text" name="user_project" id="user_project" value="<?php echo $_SESSION['nama'];?>"></td>
        <td> <select name="modul" id="modul">
            <option value="">-PILIH-</option>
          
             </select><br>
             <textarea name="submodul" id="submodul" cols="26" rows="2"></textarea>
             </td>
        <td><input type="text" id="peminta" name="peminta"></td>
        <td ><input type="text" name="section" id="section" style="width:80px;"></td>
        <td><select name="ket" id="ket">
             <option value="">--Pilih--</option>
             <option value="pending">PENDING</option>
             <option value="on progress">ON PROGRESS</option>
             <option value="done">DONE</option>
             <option value="finish">FINISH</option>
            </select></td>
        <td> <button  type="button" onclick="add_modul()" class="btn btn-xs btn-success"><i class=" glyphicon-plus"></i></button>
             <button  type="button" onclick="remove_modul()" class="btn btn-xs btn-danger"><i class="glyphicon-minus"></i></button>
        </td>
    </tr>
    <tr id="tampil_project"></tr>
    
    </table><br>
 <center>   <button type="button" class="simpan_daily btn btn-danger" >SIMPAN DAILY</button> <center> 
    
    </form>
</div>




<script type="text/javascript">
	$(document).ready(function(){
		$('select[id="cek_pilih"]').change(function() {
           
			
			cek_project 	=$(this).val();
           // alert(cek_project);
            $.ajax({
                    type:'POST',
                    url:'ambil_daily.php',
                    data:'pilih_id='+cek_project,
                    success:function(vb){
                        // alert(vb);
                        $('#project').html(vb);
                    }
                });
			
		}); 
        $('select[id="project"]').click(function() {
           
			
			project 	=$(this).val();
            cek_pilih 	=$('#cek_pilih').val();
          //  alert(project);
            $.ajax({
                    type:'POST',
                    url:'ambil_daily.php',
                    data:{ pilih_id :project,
						   cek_pilih:cek_pilih,	
						},
                    success:function(msg){
                        var [vb,section,peminta]=msg.split("|");
                        $('#modul').html(vb);
                        $('#section').val(section);
                        $('#peminta').val(peminta);
                    }
                });
			          
		}); 

        //simpan daily report
        	$(".simpan_daily").click(function(){
            
                var cek_pilih   = $('#cek_pilih').val();
                var project     = $('#project').val();
                var modul       = $('#modul').val();
                var submodul    = $('#submodul').val();
                var ket         = $('#ket').val();

                var data        = $('#fmdaily').serialize();
                
                if(cek_pilih==''){
					sweetAlert("JENIS PP / WO HARUS DI PILIH", "", "error");   	
			 	$("#simpan_daily ").show();	
                 $("#cek_pilih").css('border', '3px #C33 solid');
				}else if(project==''){
					sweetAlert("NO PP/WO HARUS DI PILIH", "", "error");   	
			 	$("#simpan_daily").show();
                  $("#project").css('border', '3px #C33 solid');	
				}else if( modul==''){
					sweetAlert("MODUL HARUS DI PILIH", "", "error");   	
			 	$("#simpan_daily ").show();	
                 	$("#simpan_daily").show();
                  $("#modul").css('border', '3px #C33 solid');	
				}else if(submodul==''){
					sweetAlert("DETAIL PEKERJAAN HARUS DI ISI", "", "error");   	
			 	$("#simpan_daily ").show();	
                    $("#submodul").css('border', '3px #C33 solid');	
				}else if(ket==''){
					sweetAlert("KETERANGAN HARUS DI PILIH", "", "error");   	
			 	$("#simpan_daily ").show();	
                    $("#ket").css('border', '3px #C33 solid');
                }	
				else{
				
				
			$.ajax({
				type: 'POST',
				url: 'simpan_daily_report.php',
				data: data,
				success: function(msg) {
				
					 swal({ 
	                          title: "Transaksi Berhasil!", 
                                    text: "I will close in 2 seconds.",
                                 
                                    type: "success"
	                    });
                       		 window.location.href="menu_dailyreport.php".trim();
					

				}
			});
            }
		});

	
	});
 
</script>
<script>
function add_modul(){
    alert("cek");
      var new_chq_no = parseInt($('#total_modul').val())+1;
      var new_input="document.write ("<br>");";
      $('#tampil_project').append(new_input);
      $('#total_modul').val(new_chq_no);
    }

     function remove_modul(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
      
        $('#value_'+last_chq_no).remove();
        $('#value2_'+last_chq_no).remove();
        $('#add_'+last_chq_no).remove();
        $('#remove_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }


</script>
<script>
	$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true,
					 dateFormat: 'yy-mm-dd'
				});
	</script>