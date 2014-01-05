<html>
<body>
<?php echo form_open('cadmin/target_ganti_password'); ?>
<h2>Ganti Password</h2>
<table>
<tr>
	<td class="td"> Username </td>
	<td class="td"> : </td>
	<td class="td"> <?php 
	echo $username; ?> </td>
</tr>
<tr>
	<td class="td"> Password Lama </td>
	<td class="td"> : </td>
	<td class="td"> <?php 
	echo form_password('passwordlama'); ?> </td>
</tr>
<tr>
	<td class="td"> Password Baru </td>
	<td class="td"> : </td>
	<td class="td"> <?php 
	echo form_password('password1'); ?> </td>
</tr>
<tr>
	<td class="td"> Ulangi Password Baru </td>
	<td class="td"> : </td>
	<td class="td"> <?php 
	echo form_password('password2'); ?> </td>
</tr><tr>
	<td> <?php echo form_submit('submit', 'Submit', 'id="submit"'); ?> </td>
</tr>
</table>
<?php echo form_close(); ?>
</body>
</html>