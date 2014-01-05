<html>
<head>
</head>
<body>
<?php 
$hasil=$retribusi_bulan->row();
echo form_open('cadmin/update_retribusi/'.$hasil->id_obyek_wisata.'/'.$hasil->id_bulan); ?>
<h2>Manajemen Pengunjung</h2>
<h4>Input Pengunjung</h4>
<table>
<tr><td class="td" width="40">Obyek Wisata </td><td class="td">:</td><td class="td"><?php echo $hasil->nama_obyek_wisata; ?></td></tr>
<tr><td class="td">Bulan </td><td class="td">:</td><td class="td"><?php echo $hasil->nama_bulan; ?></td></tr>
<tr>
	<td class="td"> Jumlah Pengunjung</td>
	<td class="td"> : </td>
	<td class="td"> <?php 
	$bulan = array(
			'name' => 'retribusi',
			'size' => '35',
			'value' => $hasil->retribusi
		);
	echo form_input($bulan); ?> </td>
</tr>
<tr>
	<td> <?php echo form_submit('submit', 'Submit', 'id="submit"'); ?> </td>
</tr>
</table>
<?php echo form_close(); ?>
</body>
</html>