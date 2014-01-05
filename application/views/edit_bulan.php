<html>
<head>
	<title> Edit Souvenir </title>
	<script type="text/javascript" src="<? echo base_url();?>jscripts/tiny_mce/tiny_mce.js"></script>
    </head>
<body>
<?php echo form_open('cadmin/edit_bulan/'.$hasil->id_bulan); ?>
<h2>Manajemen Bulan</h2>
<h4>Edit Bulan</h4>
<table>
<tr>
	<td class="td"> Nama Bulan</td>
	<td class="td"> : </td>
	<td class="td"> <?php 
	$bulan = array(
			'name' => 'bulan',
			'size' => '40',
			'value' => $hasil->nama_bulan
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