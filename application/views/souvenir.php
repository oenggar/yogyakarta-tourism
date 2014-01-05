<script>
function warning() {
                return confirm('Apakah Anda yakin data akan dihapus?');
            }
</script>
<h2>Manajemen Souvenir</h2>
<h4> Klik <?php echo anchor('cadmin/tambah_souvenir', 'disini'); ?> untuk menambah souvenir baru</h4>
<table width=100% style="border: 1px dashed">
<tr bgcolor=#999999>
	<th width="10" class="td"> <ul> </th>
	<th class="td"> Nama Souvenir </th>
	<th class="td"> Harga </th>
	<th class="td" colspan="2"> Aksi </th>
</tr>
<?php
foreach($hasil->result() as $row) :
?>

<tr>
	<td class="td" style="border: 1px dotted"> <?php echo "<li>"; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo $row->nama_souvenir; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo $row->harga; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo anchor('cadmin/edit_souvenir/'.$row->id_souvenir, 'Edit'); ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo anchor('cadmin/delete_souvenir/'.$row->id_souvenir, 'Hapus',array( 'onclick'=>"return warning();")); ?> </td>
</tr>
<?php
endforeach;
?>
</table>
</ul>
<?php
	echo $this->pagination->create_links();
?>
