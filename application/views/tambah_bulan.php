<html>
<head>
	<title> Tambah Souvenir </title>
<!--	<script type="text/javascript" src="<? echo base_url();?>jscripts/tiny_mce/tiny_mce.js"></script>-->
</head>
<body>
<H2>Manajemen Bulan</h2>
<h4> Tambah bulan baru </h4>
<?php echo form_open_multipart('cadmin/tambah_bulan'); ?>
<table>
<tr>
	<td class="td"> Nama Bulan</td>
	<td class="td"> : </td>
	<td class="td"> <?php 
	$bulan = array(
			'name' => 'bulan',
			'size' => '40',
		);
	echo form_input($bulan); ?><br>
Masukkan bulan beserta tahun </td>
</tr>
<tr>
	<td> <?php echo form_submit('submit', 'Submit', 'id="submit"'); ?> </td>
</tr>
</table>
<?php echo form_close(); ?>
</body>
</html>