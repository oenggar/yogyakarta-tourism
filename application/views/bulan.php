<H2>Manajemen Bulan</h2>
<h4> Klik <?php echo anchor('cadmin/tambah_bulan', 'disini'); ?> untuk menambah bulan baru </h4>
<table width=100% style="border: 1px dashed">
<tr bgcolor=#999999>
	<th width="10" class="td"> <ul> </th>
	<th class="td"> Nama Bulan </th>
	<th class="td" colspan="2"> Aksi </th>
</tr>
<?php
$i = 1;
foreach($hasil->result() as $row) :
?>

<tr>
	<td class="td" style="border: 1px dotted"> <?php echo "<li>"; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo $row->nama_bulan; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo anchor('cadmin/edit_bulan/'.$row->id_bulan, 'Edit'); ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo anchor('cadmin/delete_bulan/'.$row->id_bulan, 'Hapus'); ?> </td>
</tr>
</ul>
<?php 
$i++;
endforeach;

?>
</table>
<?php
	echo $this->pagination->create_links();
?>
