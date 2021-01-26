<div class="panel-body">
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>					
		<tr>
			<th  data-sortable="true">No.</th>
			<th  data-sortable="true">Nomor PP</th>
			<th  data-sortable="true">Nomor Tiket</th>
			<th  data-sortable="true">Section</th>
			<th  data-sortable="true">Tanggal Lapor</th>
			<th  data-sortable="true">Tanggal Pengerjaan</th>
			<th  data-sortable="true">Tanggal Selesai</th>
		</tr>
	</thead>

<?php 
$status = "complete";


require_once('config.php');
$sql	=	mysqli_query($koneksi,"select * from tbl_pp where status_pp = '".$status."'");
$no = 1;
while($data = mysqli_fetch_array($sql)){
	
	echo	'<tr>';
	echo	'<td>'.$no.'</td>';
	echo	'<td>'.$data['no_pp'].'</td>';
	echo	'<td>'.$data['no_antri'].'</td>';
	echo	'<td>'.$data['section'].'</td>';
	echo	'<td>'.$data['tgl_lapor'].'</td>';
	echo	'<td>'.$data['tgl_m_kerja'].'</td>';
	echo	'<td>'.$data['tgl_s_kerja'].'</td>';
	echo	'</tr>';
	$no++;
	}
?>
</table>
</div>
<script src="js1/bootstrap-table.js"></script>
