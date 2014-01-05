<html>
<head>
	<link href="<?php echo base_url() ?>css/menu_admin.css" media="screen,projection,print" rel="stylesheet" type="text/css" >
		<title>
			Halaman Administrator
		</title>
</head>
<body>
<table border="0" width="780" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center"> 
		<?php
		$gambar = array(
			'src' => base_url().'css/images/admin.jpg',
			'alt' => 'Logo CI',
			'width' => '820',
			'height' => '200'
		);
		echo img($gambar);
		?>
</td>
	</tr>
</table>

<table align="center" width="820" cellpadding="0" cellspacing="0">
	<tr>
		<td width="170" bgcolor="#FFFFFF" valign="top">
		
<div id="menu">
<ul><li> <?php echo anchor('cadmin/home', 'Home'); ?> </li>
	<li> <?php echo anchor('cadmin/ganti_password', 'Ganti Password'); ?> </li>
	<li> <?php echo anchor('cadmin/manajemen_obyek_wisata', 'Manajemen Obyek Wisata'); ?> </li>
	<li> <?php echo anchor('cadmin/manajemen_souvenir', 'Manajemen Souvenir'); ?> </li>
	<li> <?php echo anchor('cadmin/manajemen_retribusi', 'Manajemen Pengunjung'); ?> </li>
	<li> <?php echo anchor('cadmin/manajemen_bulan', 'Manajemen Bulan'); ?> </li>
	<li> <?php echo anchor('cadmin/manajemen_menu', 'Manajemen Menu'); ?> </li>
	<li> <?php echo anchor('cadmin/logout', 'Logout'); ?> </li>
</ul>
</div>

<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	  </td>
	  <td width="20" bgcolor="#FFFFFF"></td>
	  <td width="640" bgcolor="#FFFFFF" valign="top">
		  <p>&nbsp;</p>

	<p align=justify> <?php include("content.php"); ?> </p>
		<p>&nbsp;</p>
	  <p></td>
	  	  <td width="30" bgcolor="#FFFFFF">&nbsp;</td>

	</tr>
	<tr>
		<td colspan="4" align="center" bgcolor="#C0C0C0" height=50><font color="#333333" face=tahoma size=2>

<font color="#333333" face=tahoma size=2>
		
		Copyright &copy; 2013  All Right Reserved.</font></td>
	</tr>
</table>
</body>
</html>