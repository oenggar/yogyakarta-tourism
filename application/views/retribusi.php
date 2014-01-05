<H2>Manajemen Pengunjung</h2>
<h4> Klik daftar pengunjung untuk melihat jumlah retribusi per bulan dari obyek wisata yang dipilih </h4>
<table width=100% style="border: 1px dashed">
<tr bgcolor=#999999>
	<th width="10" class="td"> <ul> </th>
	<th class="td"> Nama Obyek Wisata </th>
	<th class="td"> Daftar Pengunjung </th>
</tr>
<?php
$i = 1;
foreach($hasil->result() as $row) :
?>
<tr>
	<td class="td" style="border: 1px dotted"> <?php echo "<li>"; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo $row->nama_obyek_wisata; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo anchor('cadmin/daftar_retribusi/'.$row->id_obyek_wisata, 'Daftar Pengunjung'); ?> </td>
</tr>
<?php 
endforeach;
?>
</table>
</ul>
<?php
	echo $this->pagination->create_links();
?>
