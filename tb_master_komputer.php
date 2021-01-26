<?php
include "config.php";
include "head.php";
session_start();
$nm=$_SESSION['username'];
$ck=mysqli_fetch_array(mysqli_query($koneksi,"select *from user where username='$nm'"));

 $pls=$ck['pls'];
?>
<body style="background: #ffffff;">
	<!-- -->
				<div class="modal fade" id="myModaleditkom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:900px">
					<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">EDIT KOMPUTER</h4>
                    </div>
                    <div class="modaleditkom-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
				
				<!-- -->
				
				
	<center>
		<table id="example4" width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>NO</th>
					<th>NAMA KOMPUTER</th>
					<th>NAMA PENGGUNA</th>
					<th>NAMA BAGIAN</th>
					<th>WAKTU OPERASI</th>
					<th>PROSES</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					if($pls=="ho")
					{
						$query = mysqli_query($koneksi,"SELECT * from master_komputer where pls='ho' order by nama_komputer asc, bagian asc");
					
					}else{
						$query = mysqli_query($koneksi,"SELECT * from master_komputer where pls !='ho' order by nama_komputer asc, bagian asc");
						
					}
					while ($data = mysqli_fetch_array($query)) {
					?>
						<tr>
							<td><?php echo $no; $no++; ?></td>
							<td><?php echo $data['nama_komputer'] ?></td>
							<td><?php echo $data['nama_pengguna'] ?></td>
							<td><?php echo $data['bagian'] ?></td>
							<td><?php echo $data['waktu'] ?></td>
							<td>
							<a href="from_editkom.php?obj=<?php echo $data['id']; ?>" class="edit-kom btn btn-primary"  style="border-radius:3px;" >EDIT </a>
								 <a href="hapus_kom.php?obj=<?php echo $data['id'];?>" class="btn btn-danger" style="border-radius:3px;" onclick="return confirm('Apakah anda yakin ingin mengHapus data ini?');">HAPUS </a>
							</td>
						</tr>
					<?php
					}
				?>
			</tbody>
		</table>
	</center>
<script src="assets/js/jquery-2.1.3.min.js"></script>
<script src="assets/js/jquery.dataTables.js"></script>
<script src="assets/js/dataTables.bootstrap.js"></script>
<script>
			 $(function () {
		           $("#example1").DataTable({});
		           $("#example3").DataTable({});
		           $("#example4").DataTable({});
		        $('#example2').DataTable({
		          "paging": true,
		          "lengthChange": false,
		          "searching": true,
		          "ordering": true,
		          "info": true,
		          "autoWidth": false
		        });
		      });
</script>
</body>


		<script>
        $(function(){
            $(document).on('click','.edit-kom',function(e){
				
				alert("tes");
                e.preventDefault();
                $("#myModaleditkom").modal('show');
                $.post('formedit_brgmsk.php',
                    {
					obj:$(this).attr('obj')
					 
					},
                    function(html){
                        $(".modaleditkom-body").html(html);
                    }   
                );
            });

			

        });
        
        //~ 

		//   

	
        


		
		
        
       
    </script>
