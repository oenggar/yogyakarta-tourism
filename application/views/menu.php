<H2>Menu</h2>
<table width=100% style="border: 1px dashed">
<tr bgcolor=#999999>
	<th width="10" class="td"> No </th>
	<th class="td"> Nama Menu </th>
	<th class="td"> Edit Isi Menu</th>
</tr>
<?php
$i = 1;
foreach($daftar_menu->result() as $row) :
?>

<tr>
	<td class="td" style="border: 1px dotted"> <?php echo $i; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo $row->judul_menu; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo anchor('cadmin/edit_isi_menu/'.$row->id_menu, 'Edit Isi Menu'); ?> </td>
</tr>
<?php 
$i++;
endforeach;

?>
</table>
