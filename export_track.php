<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=tracking_ppwo.xls");

 $apl   = $_GET['apl'];
 $mkom   = $_GET['mkom'];
 $tgl     = $_GET['tgl'];
 $pls     = $_GET['pls'];
                if($apl==''){}
                else{$input ="and dt_pp.inventaris ='$apl'";}
                if($mkom==''){}
                else{$input ="and tbl_pp.komputer ='$mkom'";}
                if($tgl==''){}
                else{$input ="and dt_pp.tgl_tambah like '$tgl%'";}


?>
<center><h3 style="color:gray;">DAFTAR PERMINTAAN PERBAIKAN</h3></center>
<table border="1" cellpadding="5" width="100%">
			<thead>
				<?php
			
				$crtgl="";
				?>
                <tr align="center" style="color:orange;background:grey;">
				<th>No</th>	
											
             <th>Group</th>
			 <th>Kode APP/PART</th>
			 	 <th>Aplikasi / PROJECT</th>
                <th>perbaikan</th>
				
              
                
                <th>Jenis</th>
                <th>Pelapor</th>
				<th>Komputer</th>
                <th>IT</th>
				
				
				<th>Status</th>
				<th>Detail</th>
			</tr>
				 
				
									
			</thead>
		<?php
			
            
				require_once("config.php");
			
			   
				$sql	=	mysqli_query($koneksi,"  select dt_pp.*,inventarisi.*,tbl_pp.*,master_komputer.*  from dt_pp inner join inventarisi on dt_pp.inventaris=inventarisi.objectid  join tbl_pp on tbl_pp.no_pp=dt_pp.no_pp left join master_komputer on tbl_pp.komputer=master_komputer.nama_komputer where dt_pp.no_pp !='' and tbl_pp.pls='$pls' $input ");
               
                 $no = 1;
				while($data	=	mysqli_fetch_array($sql)){
					
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					
				  echo '<td>'.$data['category'].'</td>';
				   echo '<td>'.$data['kode_it'].'</td>';
                    echo '<td>'.$data['subcategory'].'</td>';
                    echo '<td>'.$data['deskripsi_kerusakan'].'</td>'; 
                   
                    echo '<td>'.$data['jenis_project'].'</td>';
					echo '<td>'.$data['pelapor'].'</td>';
					echo '<td>'.$data['nama_komputer'].'</td>';
                    echo '<td>'.$data['diterima'].'</td>';
					
				
					echo '<td>'.$data['status_pp'].'</td>';
						?>
						<td><?php echo $data['no_pp']; ?></td>
                        <?php
		
				
					echo '</tr>';
					$no++;
                    }

