<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=INVENTARIS_IT.xls");
?>
<table border="1" cellpadding="5" width="100%">
  <tr align="center" style="color:orange;background:grey;">
         	<thead>
			<th>No</th>								
            <th>Kode</th>
			<th>Nama Barang</th>
			<th>Spesifikasi</th>
			<th>Lokasi</th>
			<th>Kode IT</th>
			<th>Keterangan</th>
            <th>Alamat IP</th>
            <th>OS</th>
            <th>Lisensi</th>
            <th>Productid</th>
            <th>Thn.peroleh</th>
            <th>Type Barang</th>
            <th>Status</th>
			<th>Pengguna</th>
			<th>Group Barang</th>
			</tr>		
			</thead>
            <tbody>
		<?php
		 $pls   = $_GET['pls'];
			
				require_once("config.php");
			
                $sql	=	mysqli_query($koneksi," select * FROM inventarisi where pls='$pls' ");
                  $no = 1;
				while($data	=	mysqli_fetch_array($sql)){
                    if($data['status']=="RUSAK"){
                        echo '<tr style="background:red;">';
                    }else{
                        echo '<tr>';
                    }
					
					echo '<td>'.$no.'</td>';
						
                   
                    echo '<td>'.$data['kode'].'</td>';
                     echo '<td>'.$data['nama_barang'].'</td>';
                    echo '<td>'.$data['spesifikasi'].'</td>';
					echo '<td>'.$data['lokasi'].'</td>';
					echo '<td>'.$data['kode_it'].'</td>';
                    echo '<td>'.$data['keterangan'].'</td>';
                    echo '<td>'.$data['ip'].'</td>';
                    echo '<td>'.$data['os'].'</td>';
                    echo '<td>'.$data['lisensi'].'</td>';
                    echo '<td>'.$data['productid'].'</td>';
                    echo '<td>'.$data['thproleh'].'</td>';

                    echo '<td>'.$data['group_brg'].'</td>';
                    echo '<td>'.$data['status'].'</td>';
					echo '<td>'.$data['user'].'</td>';
                    echo '<td>'.$data['jenis_group'].'</td>';
			
					echo '</tr>';
					$no++;
					}
				     
                ?>
</tbody>
  </table>