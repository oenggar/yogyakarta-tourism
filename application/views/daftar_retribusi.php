<?php
include "free/function.php";
?><H2>Daftar Pengunjung</h2>
<h4>Klik input pengunjung untuk mengisi jumlah pengunjung dari bulan yang dipilih </h4>
<h6>
<table>
<tr><td>Nama Obyek Wisata</td><td>:</td><td><?php echo $nama_obyek_wisata; ?></td></tr>
</table>
</h6>
<table width=100% style="border: 1px dashed">
<tr bgcolor=#999999>
	<th width="10" class="td"> <UL> </th>
	<th class="td"> Bulan (Tahun) </th>
	<th class="td"> Jumlah Pengunjung </th>
	<th class="td"> Input pengunjung </th>
</tr>
<?php
foreach($retribusi_per_bulan->result() as $row) :
?>

<tr>
	<td class="td" style="border: 1px dotted"> <?php echo "<li>"; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo $row->nama_bulan; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo formatangka($row->retribusi); ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo anchor('cadmin/input_retribusi/'.$row->id_obyek_wisata.'/'.$row->id_bulan, 'Input Pengunjung'); ?> </td>
</tr>
<?php 
endforeach;

?>
</table>
</ul>
<?php
	echo $this->pagination->create_links();
?>
