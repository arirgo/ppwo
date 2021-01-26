
<?php 


session_start();
 $nm=$_SESSION['username'];
$nopp = $_POST['id'];
//~ echo $nopp;

require_once("config.php");
$userdata = mysqli_query($koneksi,"select * from user where username ='".$nm."'");
$userdt = mysqli_fetch_array($userdata);

$sqla = mysqli_query($koneksi,"select * from tbl_wo where no_wo ='".$nopp."'");
$data = mysqli_fetch_array($sqla);


?>
<script> 

function hanyaAngka(evt) {
	


		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if ( charCode !=46 && charCode > 31 && (charCode < 48 || charCode > 58))
		    return false;
           if(charCode == 46 && value.indexOf('.') != -1)
           return false;

		  return true;
		}
	</script>

<div>
<table width="80%">
<tr>
	<td><h4>Nomor PP</h4></td>
	<td><h4>&nbsp;:&nbsp;</h4></td>
	<td><h4><?php echo $nopp;?></h4></td>
	<td style="width: 30%">&nbsp;</td>
	<td><h4>Pemohon</h4></td>
	<td><h4>&nbsp;:&nbsp;</h4></td>
	<td><h4><?php echo $data['pemohon'];?></h4></td>
	
</tr>
</table>
<center>
<table width="80%" border="1" class="table table-striped table-bordered table-hover">
	<tr>
		<th colspan="5" style=" background-color:#7EB7FD;">&nbsp;</th>
	</tr>
	<tr>
        <td colspan=2><h6 style="color:green" align="center">PROJECT PLANING</h6> </td>
        <td></td>
        <td colspan=2><h6 style="color:green" align="center"> DAILY</h6></td>
    </tr>
	<tr>
		<th>Dikerjakan</th><td><?php echo $data['diterima'];?></td>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Tanggal Diterima</th><td><?php 
							if($data['tgl_diterima']=='0000-00-00'){
									echo "-";
								}else{
									echo $data['tgl_diterima'];
									}
					?></td>
	</tr>
	<tr>
		<?php if (($data['status_hold']=='')&&($data['status_wo']=='waiting')){
			?>
			
		<th>Status WO</th><td> <?php echo $data['status_wo']; ?></td>
		<?php 
		}else if (($data['status_hold']=='')&&($data['status_wo']=='on process')or($data['status_wo']=='finish')or($data['status_wo']=='complete')){
			?>
			
		<th>Status WO</th><td> <?php echo $data['status_wo']; ?></td>
		<?php 
		}else if (($data['status_hold']!='')&&($data['status_wo']=='on process')or($data['status_wo']=='finish')or($data['status_wo']=='complete')){
			?>
			
		<th>Status WO</th><td> <?php echo $data['status_wo']; ?></td>
		<?php 
		}else { ?>
		<th>Status WO/Status Hold</th><td> <?php echo $data['status_wo']."/".$data['status_hold']; ?></td>
		<?php 
		} ?>
		
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Jam Diterima</th><td><?php 
							if($data['jam_diterima']=='00:00:00'){
									echo "-";
								}else{
									echo $data['jam_diterima'];
									}
					?></td>
	</tr>
	<tr>
		<th rowspan="4">Permasalahan Komputer</th>
		<td rowspan="4"><textarea readonly rows="4" cols="29"><?php echo $data['uraian_pekerjaan']; ?></textarea></td>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Tanggal Pengerjaan</th><td> <?php 
							if($data['tgl_m_kerja']=='0000-00-00'){
									echo "-";
								}else{
									echo $data['tgl_m_kerja'];
									}
					?></td>
	</tr>
	<tr>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Jam Pengerjaan</th>
		<td><?php 
							if($data['jam_m_kerja']=='00:00:00'){
									echo "-";
								}else{
									echo $data['jam_m_kerja'];
									}
					?></td>
	</tr>
	<tr>
		
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Tanggal Finish</th>
		<td><?php 
							if($data['tgl_s_kerja']=='0000-00-00'){
									echo "-";
								}else{
									echo $data['tgl_s_kerja'];
									}
					?></td>
	</tr>
	<tr>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Jam Finish</th>
		<td><?php 
							if($data['jam_s_kerja']=='00:00:00'){
									echo "-";
								}else{
									echo $data['jam_s_kerja'];
									}
					?></td>
	</tr>
	<tr style="background-color:#7EB7FD;color:white;"><th></th><th><center>
	MODUL &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HARI</center></th></tr>
	<?php 
	if($data['it']=="prog"){?>
    <tr><th>Analisis</th>           
            <td>
			<div class="tampil-analis">
				<table class=" table table-striped table-bordered table-hover">
				<?php
					$sqlanal	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$nopp."' and group_project='ANALISIS'");
							while($datanal	= mysqli_fetch_array($sqlanal))
							{?>
							<tr><td><?php echo $datanal['detail_pekerjaan'];?></td>
								<td><?php echo $datanal['waktu']."/Hari";?></td>
								<td><a href="hapus_modul.php?obj=<?php echo $datanal['objectid'];?>" style="border-radius:10px;color:red;" onclick="return confirm('Apakah anda yakin ingin mengHapus data ini?');">X</a></td>
							</tr>	
								
			<?php				}
				?>
				</table>
			</div>
			
			  	<form  class="fmanalis" id="fmanalis" name="fmanalis" method="POST">  
			<input type="hidden" value="1" id="total_chq" name="jumlahrow">
                <input type="hidden" value="<?php echo $nopp;?>" id="no_pp" name="no_pp">
				<input type="hidden" value="ANALISIS" id="group" name="group">
				 <input type="hidden" value="WO" id="jenis_analis" name="jenis">
               
                <table>
           
                  <tr >
                    <td><textarea  rows="2" cols="29" id="value_1" name="value_1" autocomplete="off" onkeyup="cek_query()"></textarea><br></td>
                    <td style="vertical-align:TOP"><input type="text" id="value2_1" name="value2_1" autocomplete="off" onkeypress="return hanyaAngka(event)" style="width:50px;"></td>
                    <td style="vertical-align:TOP"><button  type="button" onclick="add()" class="btn btn-xs btn-success"><i class=" glyphicon-plus"></i></button></td>
                    <td style="vertical-align:TOP"><button type="button" onclick="remove()" class="btn btn-xs btn-danger"><i class="glyphicon-minus"></i></button></td>
                  </tr>
               
                </table>
                <table id="new_chq"></table>
				  </form>
                <input type="button" class="simpan_analis btn btn-sm btn-primary" name="simpan_analis" id="simpan_analis" value="SIMPAN" onclick="this.style.visibility='hidden';">
		    </td>       
    </tr>
    <tr><th>Programing</th>
  
        <td>
			<div class="tampil-programing">
			<table class=" table table-striped table-bordered table-hover">
			<?php $sqlprog	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$nopp."' and group_project='PROGRAMING'");
							while($datprog	= mysqli_fetch_array($sqlprog))
							{ ?>
			<tr><td><?php echo $datprog['detail_pekerjaan'];?></td>
				<td><?php echo $datprog['waktu']."/hari";?></td>
				<td> <a href="hapus_modul.php?obj=<?php echo $datprog['objectid'];?>" style="border-radius:10px;color:red;" onclick="return confirm('Apakah anda yakin ingin mengHapus data ini?');">X</a></td></tr>
			<?php }	?>
			</table> 
			</div>
		  <form  id="fmprog" name="fmprog" method="post">	
		<input type="hidden" value="1" id="total_chq_prog"  name="jumlahrow">
            <input type="hidden" value="<?php echo $nopp;?>" id="no_pp" name="no_pp">
			<input type="hidden" value="PROGRAMING" id="group" name="group">
			<input type="hidden" value="WO" name="jenis" id="jenis_prog">
                <table>
               
                  <tr>
                    <td><textarea  rows="2" cols="29" id="prog_1" name="prog_1" autocomplete="off" onkeyup="cek_query_prog()"></textarea></td>
                    <td style="vertical-align:TOP"><input type="text" id="prog2_1" name="prog2_1" autocomplete="off" onkeypress="return hanyaAngka(event)" style="width:50px;"></td>
                    <td style="vertical-align:TOP"><button  type="button" onclick="add_prog()" class="btn btn-xs btn-success"><i class=" glyphicon-plus"></i></button></td>
                    <td style="vertical-align:TOP"><button  type="button" onclick="remove_prog()" class="btn btn-xs btn-danger"><i class="glyphicon-minus"></i></button></td>
                  </tr>
               
                </table>
				<table id="new_chq_prog"></table>
				</form>
               <input type="button" class="simpan_prog btn btn-sm btn-primary" name="simpan_prog" id="simpan_prog" value="SIMPAN"  onclick="this.style.visibility='hidden';">
            </td> 
    </tr>
    <tr><th> Dokumentasi</th>
     
            <td>
				<div class="tampil-dokumentasi">
					<table class=" table table-striped table-bordered table-hover">
							<?php 
			$sqldok	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$nopp."' and group_project='DOKUMENTASI'");
							while($datdok	= mysqli_fetch_array($sqldok))
							{	?>
						<tr><td><?php echo $datdok['detail_pekerjaan'];?></td>
							<td><?php echo $datdok['waktu']."/Hari"; ?></td>
							<td> <a href="hapus_modul.php?obj=<?php echo $datdok['objectid'];?>" style="border-radius:10px;color:red;" onclick="return confirm('Apakah anda yakin ingin mengHapus Modul ini?');">X</a></td>
					  </tr>
			
				<?php	}	?>
			</table>
			</div>
			<form  class="fmdok" id="fmdok" name="fmdok" method="post">	
			<input type="hidden" value="1" id="total_chq_dok" name="jumlahrow">
                 <input type="hidden" value="<?php echo $nopp;?>" id="no_pp" name="no_pp">
				 <input type="hidden" value="DOKUMENTASI" id="group" name="group">
				 <input type="hidden" value="WO" name="jenis" id="jenis_prog">
                <table>
           
                  <tr>
                    <td><textarea  rows="2" cols="29" id="dok_1" name="dok_1" autocomplete="off" onkeyup="cek_query_dok()"></textarea></td>
                    <td style="vertical-align:TOP"><input type="text" id="dok2_1" name="dok2_1" autocomplete="off" onkeypress="return hanyaAngka(event)" style="width:50px;"></td>
                    <td style="vertical-align:TOP"><button  type="button" onclick="add_dok()" class="btn btn-xs btn-success"><i class=" glyphicon-plus"></i></button></td>
                    <td style="vertical-align:TOP"><button  type="button" onclick="remove_dok()" class="btn btn-xs btn-danger"><i class="glyphicon-minus"></i></button></td>
                  </tr>
               
                </table>
                <table id="new_chq_dok"></table>
               <input type="button" class="simpan_dok btn btn-sm btn-primary" name="simpan_dok" id="simpan_dok" value="SIMPAN" onclick="this.style.visibility='hidden';">
			  </form>
			</td>
    </tr>
	<?php }
	else if($data['it']=="infra")
	{ ?>
	<tr><th>Detail Pekerjaan</th>
		<td><div class="tampil-infra">
			<table class=" table table-striped table-bordered table-hover">
				<?php 
			$sqlinf	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$nopp."' and group_project='INFRA'");
							while($datinf	= mysqli_fetch_array($sqlinf))
							{	?>
			
			<tr><td><?php echo $datinf['detail_pekerjaan'];?></td>
				<td><?php echo $datinf['waktu']."/Hari";?></td>
				<td><a href="hapus_modul.php?obj=<?php echo $datinf['objectid'];?>" style="border-radius:10px;color:red;" onclick="return confirm('Apakah anda yakin ingin mengHapus Modul ini?');">X</a></td>
			</tr>
								
				<?php	}	?>
					</table>
			</div>
			<form  class="fminf" id="fminf" name="fminf" method="post">	
			<table>
			<tr><th>PEKERJAAN</th><th>HARI</th></tr>
			<tr><input type="hidden" value="1" id="total_chq_inf" name="jumlahrow">
			 	<input type="hidden" value="INFRA" id="group" name="group">
				 <input type="hidden" value="WO" name="jenis" id="jenis_inf">
				 <input type="hidden" value="<?php echo $nopp;?>" id="no_pp" name="no_pp">
				<td><textarea name="pkjinf_1" id="pkjinf_1" cols="29" rows="4"></textarea></td>
			
				<td style="vertical-align:TOP"><input type="text" id="inf2_1" name="inf2_1" autocomplete="off" onkeypress="return hanyaAngka(event)" style="width:50px;"></td>
                <td style="vertical-align:TOP"><button  type="button" onclick="add_inf()" class="btn btn-xs btn-success"><i class=" glyphicon-plus"></i></button></td>
                <td style="vertical-align:TOP"><button  type="button" onclick="remove_inf()" class="btn btn-xs btn-danger"><i class="glyphicon-minus"></i></button></td>
  
			</tr>
			
			</table>
			   <table id="new_chq_inf"></table>
			    <input type="button" class="simpan_inf btn btn-sm btn-primary" name="simpan_inf" id="simpan_inf" value="SIMPAN" onclick="this.style.visibility='hidden';">
			
			 </form>
		</td>
	</tr>
	<?php }else{}
	?>
	
</table>
	
<?php	
 $name = $_SESSION['nama'];
if($data['status_wo']=='approved by IT'){?>
<form name="f_take" action="process_wo.php" method="POST">
<table  border="1" class="table table-striped table-bordered table-hover">
<tr><th width="23%" >NAMA PROJECT</th>
	<td><input type="text" name="soft_hard" id="soft_hard" required>
	 	<input type="hidden" name="txttake" value="<?php echo $data['no_wo'];?>">
		<input type="hidden" name="txtadmin" value="<?php echo $name;?>">	
	</td>
	</tr>
</table>
 <button type="submit" class="btn btn-danger btn-xs">START PROCESS</button>
			 
			 </form>
			<?php	}?>
</center>
<br>
<div class="panel-body">
	<div align="center">

	</div>
</div>


<script>

function add(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
      var new_input="<tr><td><textarea rows='2' cols='28' id='value_"+new_chq_no+"' name='value_"+new_chq_no+"' class='form-control' onkeyup='cek_query();' onclick='cek_query();' onchange='cek_query();' autocomplete='off'></textarea></td> <td style='vertical-align:TOP' ><input type='text' id='value2_"+new_chq_no+"' name='value2_"+new_chq_no+"' class='form-control' onkeypress='return hanyaAngka(event)' onclick='cek_query();' onchange='cek_query();' autocomplete='off' style='width:50px;'></><td style='vertical-align:TOP' ><button type='button'  onclick='add()' id='add_"+new_chq_no+"' class='btn btn-xs btn-success'><i class='glyphicon-plus'></i></button></td><td style='vertical-align:TOP' ><button type='button'  onclick='remove()' id='remove_"+new_chq_no+"'  class='btn btn-xs btn-danger'><i class='glyphicon-minus'></i></button></td></tr>";
      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no);
    }

 function add_prog(){
      var new_chq_no_prog = parseInt($('#total_chq_prog').val())+1;
      var new_input_prog="<tr><td><textarea rows='2' cols='28' id='prog_"+new_chq_no_prog+"' name='prog_"+new_chq_no_prog+"' class='form-control' onkeyup='cek_query_prog();' onclick='cek_query_prog();' onchange='cek_query_prog();' autocomplete='off'></textarea></td> <td style='vertical-align:TOP' ><input type='text' id='prog2_"+new_chq_no_prog+"' name='prog2_"+new_chq_no_prog+"' class='form-control' onkeypress='return hanyaAngka(event)' onclick='cek_query_prog();' onchange='cek_query_prog();' autocomplete='off' style='width:50px;'></td><td style='vertical-align:TOP' ><button type='button'  onclick='add_prog()' id='add_prog"+new_chq_no_prog+"' class='btn btn-xs btn-success'><i class='glyphicon-plus'></i></button></td><td style='vertical-align:TOP' ><button type='button' onclick='remove_prog()' id='remove_prog"+new_chq_no_prog+"'  class='btn btn-xs btn-danger'><i class='glyphicon-minus'></i></button></td></tr>";
      $('#new_chq_prog').append(new_input_prog);
      $('#total_chq_prog').val(new_chq_no_prog);
    }   

    function add_dok(){
      var new_chq_no_dok = parseInt($('#total_chq_dok').val())+1;
      var new_input_dok="<tr><td><textarea rows='2' cols='28' id='dok_"+new_chq_no_dok+"' name='dok_"+new_chq_no_dok+"' class='form-control' onkeyup='cek_query_dok();' onclick='cek_query_dok();' onchange='cek_query_dok();' autocomplete='off'></textarea></td> <td style='vertical-align:TOP'  ><input type='text' id='dok2_"+new_chq_no_dok+"' name='dok2_"+new_chq_no_dok+"' class='form-control'onkeypress='return hanyaAngka(event)' onclick='cek_query_dok();' onchange='cek_query_prog();' autocomplete='off' style='width:50px;'></td><td style='vertical-align:TOP' ><button type='button' onclick='add_dok()' id='add_dok"+new_chq_no_dok+"' class='btn btn-xs btn-success'><i class='glyphicon-plus'></i></button></td><td style='vertical-align:TOP' ><button type='button' onclick='remove_dok()' id='remove_dok"+new_chq_no_dok+"'  class='btn btn-xs btn-danger'><i class='glyphicon-minus'></i></button></td></tr>";
      $('#new_chq_dok').append(new_input_dok);
      $('#total_chq_dok').val(new_chq_no_dok);
    } 
	function add_inf(){
      var new_chq_no_inf = parseInt($('#total_chq_inf').val())+1;
      var new_input_inf="<tr><td><textarea rows='4' cols='27' id='pkjinf_"+new_chq_no_inf+"' name='pkjinf_"+new_chq_no_inf+"' class='form-control' onkeyup='cek_query_dok();' onclick='cek_query_dok();' onchange='cek_query_dok();' autocomplete='off'></textarea></td> <td style='vertical-align:TOP'  ><input type='text' id='inf2_"+new_chq_no_inf+"' name='inf2_"+new_chq_no_inf+"' class='form-control'onkeypress='return hanyaAngka(event)' onclick='cek_query_dok();' onchange='cek_query_prog();' autocomplete='off' style='width:50px;'></td><td style='vertical-align:TOP' ><button type='button' onclick='add_inf()' id='add_inf"+new_chq_no_inf+"' class='btn btn-xs btn-success'><i class='glyphicon-plus'></i></button></td><td style='vertical-align:TOP' ><button type='button' onclick='remove_inf()' id='remove_inf"+new_chq_no_inf+"'  class='btn btn-xs btn-danger'><i class='glyphicon-minus'></i></button></td></tr>";
      $('#new_chq_inf').append(new_input_inf);
      $('#total_chq_inf').val(new_chq_no_inf);
    }   
</script>

<script>

    function remove(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
      
        $('#value_'+last_chq_no).remove();
        $('#value2_'+last_chq_no).remove();
        $('#add_'+last_chq_no).remove();
        $('#remove_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }

     function remove_prog(){
      var last_chq_no_prog = $('#total_chq_prog').val();
      if(last_chq_no_prog>1){
      
        $('#prog_'+last_chq_no_prog).remove();
        $('#prog2_'+last_chq_no_prog).remove();
        $('#add_prog'+last_chq_no_prog).remove();
        $('#remove_prog'+last_chq_no_prog).remove();
        $('#total_chq_prog').val(last_chq_no_prog-1);
      }
    }
     function remove_dok(){
      var last_chq_no_dok = $('#total_chq_dok').val();
      if(last_chq_no_dok>1){
      
        $('#dok_'+last_chq_no_dok).remove();
        $('#dok2_'+last_chq_no_dok).remove();
        $('#add_dok'+last_chq_no_dok).remove();
        $('#remove_dok'+last_chq_no_dok).remove();
        $('#total_chq_dok').val(last_chq_no_dok-1);
      }
    }

	function remove_inf(){
      var last_chq_no_inf = $('#total_chq_inf').val();
      if(last_chq_no_inf>1){
      
        $('#pkjinf_'+last_chq_no_inf).remove();
        $('#inf2_'+last_chq_no_inf).remove();
        $('#add_inf'+last_chq_no_inf).remove();
        $('#remove_inf'+last_chq_no_inf).remove();
        $('#total_chq_inf').val(last_chq_no_inf-1);
      }
    }
</script>

<!-- 
<script type="text/javascript">
	$(document).ready(function(){
		$("#simpan_analis").click(function(){
            var data 			= $('#value_1').val();
              var cob           =    $('.fmanalis').serialize();
        	alert(coba);
		
		});
	});
	</script> -->

	

<script type="text/javascript">
	$(document).ready(function(){
		$("#simpan_analis").click(function(){

			


            // var data 			= $('#value_1').val();
              var data           =    $('#fmanalis').serialize();
        
			$.ajax({
				type: 'POST',
				url: 'simpan_plan_wo.php',
				data: data,
				success: function(nopp) {
				
				var [id,group]=nopp.split("|");
					 swal({ 
	                          title: "Transaksi Berhasil!", 
                                    text: "I will close in 2 seconds.",
                                 
                                    type: "success"
	                    });
				  // location.load();
							$('.tampil-analis').load('cek_project.php?id='+id+'&&group='+group);
					
					
					
				}
			});
	
	
		});

		$("#simpan_prog").click(function(){
            // var data 			= $('#value_1').val();
              var data           =    $('#fmprog').serialize();
        
			$.ajax({
				type: 'POST',
				url: 'simpan_plan_wo.php',
				data: data,
				success: function(msg) {
					var [id,group]=msg.split("|");
					 swal({ 
	                          title: "Transaksi Berhasil!", 
                                    text: "I will close in 2 seconds.",
                                 
                                    type: "success"
	                    });
					$('.tampil-programing').load('cek_project.php?id='+id+'&&group='+group);

				}
			});
		});


		$("#simpan_dok").click(function(){
            // var data 			= $('#value_1').val();
              var data           =    $('#fmdok').serialize();
        	
			$.ajax({
				type: 'POST',
				url: 'simpan_plan_wo.php',
				data: data,
				success: function(msg2) {
					var [id,group]=msg2.split("|");
					 swal({ 
	                          title: "Transaksi Berhasil!", 
                                    text: "I will close in 2 seconds.",
                                 
                                    type: "success"
	                    });
				 	$('.tampil-dokumentasi').load('cek_project.php?id='+id+'&&group='+group);

				}
			});
		});


		$("#simpan_inf").click(function(){
            // var data 			= $('#value_1').val();
              var data           =    $('#fminf').serialize();
     
			$.ajax({
				type: 'POST',
				url: 'simpan_plan_wo.php',
				data: data,
				success: function(msg2) {
					var [id,group]=msg2.split("|");
					 swal({ 
	                          title: "Transaksi Berhasil!", 
                                    text: "I will close in 2 seconds.",
                                 
                                    type: "success"
	                    });
				 	$('.tampil-infra').load('cek_project.php?id='+id+'&&group='+group);

				}
			});
		});




	});
	</script>

<!-- 

	<script>
	$(document).ready(function(){
  // jika terjadi event submit pada form
  $('.cobaaa').submit(function(e) {
	  alert("teshela");
    // mencegah agar halaman tidak pindah halaman / refresh
    e.preventDefault()
    // ambil data
    var data = $(this).serialize()
    // ambil method dari method di form
    var method = $(this).attr('method')
    // ke mana data akan dikirim
    // diambil dari action di form
    var action = $(this).attr('action')
    // memulai kirim ajax
    $.ajax({
      url: action,
      data: data,
      method: method,
      beforeSend: function() {
        // lakukan sesuatu sebelum data dikirim
        // misalkan memulai loading
      },
      success: function(data) {
        // lakukan sesuatu jika data sudah terkirim
      }
    })
  })
})
	
	</script> -->