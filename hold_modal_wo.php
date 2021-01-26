<?php 
$nowo = $_POST['id'];
//~ echo $nopp;

require_once('config.php');
    $select =mysqli_query($koneksi,"select * from tbl_wo where no_wo='$nowo'");
    $datpp	= mysqli_fetch_array($select);
	

session_start();
 $usercek= $_SESSION['username'];
$selectcek =mysqli_query($koneksi,"select * from user where username='$usercek'");
$cekuserku	= mysqli_fetch_array($selectcek);

 $cekdev=$cekuserku['dev'];

if($cekdev=='inf'){
?>
<center>
	<!-- --------request -->
	<div class="tampil-requestku">
	<form name="reqst" id="reqst" class="reqst">
<table>
	<tr class="efek">
		<td><label class="col-sm-3 control-label no-padding-right" for="form-field-1">No WO</label></td>
		<td>
			<input type="text"  name="no_req" id="no_reqh" size="20" value="<?php echo $nowo;?>" readonly/>
            <input type="hidden"  name="jenis" id="jenish" size="20" value="WO" readonly/>
			<input type="hidden"  name="section" id="sectionh" size="20" value="<?php echo $datpp['section'];?>" readonly/>
			<input type="hidden"  name="pemohon" id="pemohonh" size="20" value="<?php echo $datpp['pemohon'];?>" readonly/>
		</td>
	</tr>
    <tr>
		<td><label class="col-sm-3 control-label no-padding-right" for="form-field-1" required>Status</label></td>
		<td>
            <select name="request" id="requesth" required>
                 <option value="" selected disabled>--pilih--</option>
                <option value="service_eksternal">SERVICE EKSTERNAL</option>
                <option value="order">ORDER</option>
				 <option value="pending">PENDING</option>
            </select>
		</td>
	</tr>
    <tr class="efek">
		<td><label class="col-sm-3 control-label no-padding-right" for="form-field-1" required>User</label></td>
		<td><input type="text"  name="user" id="userh" size="20"/></td>
	</tr>
    
    <tr class="efek">
     <td>
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kategori</label>
     </td>
     <td>
            <select name="cb_brg" id="cb_brgh">
					<option value="">--Pilih--</option>
					<?php
						
						require_once("config.php");
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Hardware'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" style="color: red;" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Software'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Network'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
						$sqla	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$sqlb	=	mysqli_query($koneksi,"select * from ms_category where category='Telepon'");
						$data1	=	mysqli_fetch_array($sqla);
						echo	'<option value="'.$data1['category'].'" disabled>'.$data1['category'].'</option>';
						while ($datab	=	mysqli_fetch_array($sqlb))
						{
							echo	'<option value="'.$datab['subcategory'].'">&nbsp;&nbsp;'.$datab['subcategory'].'</option>';
						}
						
					?>
				</select>
				   <select name="browsestok" id="browsestokh">
                        <option value="">-PILIH NAMA BARANG-</option>
                </select>
     </td>
    </tr>
    <tr class="efek"><td><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Barang</label></td>
		<td><input type="text"  name="nmbrg" size="30" id="nmbrgh" class="nmbrg"/></td>
	</tr>
	<tr class="efek"><td><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jumlah</label></td>
		<td><input type="text"  name="jml" id="jmlh" class="jmlh"size="30" onkeypress="return hanyaAngka(event)"/></td>
	</tr>
	
	</form>
	<tr class="efek"><td colspan='2' align="center"> 
	<input type="button" name="tblreq" id="tblreq" value="REQUEST" class="tblreq btn btn-primary">
	</td></tr>
	
	</table>
	</div>
	<hr>
	<!-- --------request -->

	<form name="f_hold" action="hold_proses_wo.php" method="POST">
<input type="hidden" name="txtnowo" value="<?php echo $nowo;?>">
<table>
	<tr>
		<td><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Hold karena</label></td>
		<td><input type="text"  name="txtreason" size="35"/></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><button class="btn btn-sm btn-primary" name="txttombol" type="submit"><i class="ace-icon fa fa-check"></i>Submit</button></td>
	</tr>
</table>
</form></center>
<?php }else{?>
<center>

<form name="f_hold" action="hold_proses_wo.php" method="POST">
<input type="hidden" name="txtnowo" value="<?php echo $nowo;?>">
<table>
	<tr>
		<td><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Hold karena</label></td>
		<td><input type="text"  name="txtreason" size="35"/></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><button class="btn btn-sm btn-primary" name="txttombol" type="submit"><i class="ace-icon fa fa-check"></i>Submit</button></td>
	</tr>
</table>
</form>
</center>
<?php }?>
<!--

<form name="f_hold" action="hold_proses.php" method="POST">
<input type="hidden" name="txtnopp" value="<?php //echo $nopp;?>">
<input class="btn btn-primary" name="txttombol" type="submit" value="Service ke Pusat">
<input class="btn btn-inverse" name="txttombol" type="submit" value="Tunggu sparepart">
</form>
-->

<script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js1/bootstrap-table.js"></script>
		
<script type="text/javascript">
	$(document).ready(function(){
		$('select[id="cb_brgh"]').change(function() {
           
		
			id_brg 	=$(this).val();
     
            $.ajax({
                    type:'POST',
                    url:'cek_barang_stok.php',
                    data:'pilih_id='+id_brg,
                    success:function(stok){
                      
                        $('select[id="browsestokh"]').html(stok);
                    }
                });
			
		}); 

	
	});
 
</script>


<script type="text/javascript">
	$(document).ready(function(){
		$('select[id="browsestokh"]').change(function() {
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

<script type="text/javascript">
	$(document).ready(function(){
	

		$('select[id="requesth"]').change(function() {
			stts 	=$(this).val();
			if(stts=="pending")
			{
			
			var	sttsku=0;
			$('#jmlh').val(sttsku);
			 $(".efek").hide();
			
			}else{ 
				
			var sttsku="";
			$(".efek").show();
			 $('#jmlh').val(sttsku);
			}
			
		}); 
	});
</script>




<script type="text/javascript">
	$(document).ready(function(){
		$(".tblreq").click(function(){
		
       
              var data      	=$('.reqst').serialize();
			  var cb_brgh		=$('#cb_brgh').val();
			  var requesth		=$('#requesth').val();
			  var userh			=$('#userh').val();
			  var browsestokh	=$('#browsestokh').val();
			  var nmbrgh		=$('#nmbrgh').val();
			  var jmlh			=$('#jmlh').val();
			
			 // alert(data);

			  if(cb_brgh=="") {
					sweetAlert("KATAGORI HARUS DI PILIH", "", "error");
          		$("#cb_brgh").css('border', '3px #C33 solid');	
				 }
				else if(userh=="") {
					sweetAlert("USER HARUS DI ISI", "", "error");
          		$("#userh").css('border', '3px #C33 solid');	
				 }
				 else if(requesth=="") {
					sweetAlert("STATUS HARUS DI PILIH", "", "error");
          		$("#cb_brgh").css('border', '3px #C33 solid');	
				 }
				 else if(nmbrgh=="") {
					sweetAlert("NAMA BARANG HARUS DI ISI", "", "error");
          		$("#nmbrgh").css('border', '3px #C33 solid');	
				 }
				 else if(jmlh=="") {
					sweetAlert("JUMLAH HARUS DI PILIH", "", "error");
          		$("#jmlh").css('border', '3px #C33 solid');	
				 }
				 else {

					 $.ajax({
				type: 'POST',
				url: 'simpan_request.php',
				data: data,
				success: function(msg) {
                    	swal({ 
						title: "Succes!",
						text: "REQUEST BERHASIL",
						type: "success" 
					},
					function(){
						$('#cb_brgh').val("");
						$('#requesth').val("");
						$('#userh').val("");
						$('#browsestokh').val("");
						$('#nmbrgh').val("");
						$('#jmlh').val("");

							}
							);
					}
				});
				 }





           	// $.ajax({
			// 	type: 'POST',
			// 	url: 'simpan_request.php',
			// 	data: data,
			// 	success: function(msg) {
            //         	swal({ 
			// 			title: "Succes!",
			// 			text: "TRANSAKSI BARANG KLUAR",
			// 			type: "success" 
			// 		},
			// 		function(){
			// 				  location.reload();
			// 				}
			// 				);
			// 		}
			// 	});
		});

	});
	

	
</script>