<script>
function warning() {
                return confirm('Apakah Anda yakin data akan dihapus?');
            }
</script>
<H2>Manajemen Obyek Wisata</h2>
<h4> Klik <?php echo anchor('cadmin/tambah_obyek_wisata', 'disini'); ?> untuk menambah obyek wisata baru </h4>
<table width=100% style="border: 1px dashed">
<tr bgcolor=#999999>
	<th width="10" class="td"><ul></th>
	<th class="td"> Nama Obyek Wisata </th>
	<th class="td"> HTM </th>
	<th class="td" colspan="2"> Aksi </th>
</tr>
<?php
foreach($hasil->result() as $row) :
?>

<tr>
	<td class="td" style="border: 1px dotted"> <?php echo "<li>"; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo $row->nama_obyek_wisata; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo $row->htm; ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo anchor('cadmin/edit_obyek_wisata/'.$row->id_obyek_wisata, 'Edit'); ?> </td>
	<td class="td" style="border: 1px dotted"> <?php echo anchor('cadmin/delete_obyek_wisata/'.$row->id_obyek_wisata, 'Hapus',array( 'onclick'=>"return warning();")); ?> </td>
</tr>
<?php 
endforeach;

?>
</table>
</ul>
<?php
	echo $this->pagination->create_links();
?>
