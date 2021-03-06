<html>
<head>
	<title> Tambah Artikel </title>
	<script type="text/javascript" src="<? echo base_url();?>jscripts/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
        tinyMCE.init({
            mode : "textareas",
            theme : "advanced",
			width: "200px",
			height: "200px",
            plugins : "pagebreak,style,table,save,advhr,advimage,advlink,emotions,inlinepopups,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,wordcount,advlist",
 
            // Theme options
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "visualchars,nonbreaking,template,pagebreak,restoredraft",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,
			
			// Selector
			editor_selector: "test",
 
            // Example content CSS (should be your site CSS)
            content_css : "css/content.css",
 
            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",
 
            // Style formats
            style_formats : [
                {title : 'Bold text', inline : 'b'},
                {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
                {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
                {title : 'Example 1', inline : 'span', classes : 'example1'},
                {title : 'Example 2', inline : 'span', classes : 'example2'},
                {title : 'Table styles'},
                {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
            ],
 
            // Replace values for the template plugin
            template_replace_values : {
                username : "Some User",
                staffid : "991234"
            }
        });
    </script>
</head>
<body>
<?php echo form_open_multipart('cadmin/edit_obyek_wisata/'.$hasil->id_obyek_wisata); ?>
<H2>Manajemen Obyek Wisata</h2>
<h4> Edit obyek wisata </h4>

<table>
<tr>
	<td class="td" width="40"> Nama Obyek Wisata</td>
	<td class="td"> : </td>
	<td> <?php echo form_input('nama_obyek_wisata',$hasil->nama_obyek_wisata); ?> </td>
</tr>
<tr>
	<td class="td"> HTM</td>
	<td class="td"> : </td>
	<td> <?php echo form_input('htm',$hasil->htm); ?> </td>
</tr>
<tr>
	<td class="td"> Gambar Awal </td>
	<td class="td"> : </td>
	<td> <img src="<?php echo base_url();?>gambar/thumbnails/<?php echo $hasil->gambar;?>"/> </td>
</tr>
<tr>
	<td class="td"> Gambar </td>
	<td class="td"> : </td>
	<td><?php echo form_upload('userfile'); ?> </td>
</tr>
<tr valign="top">
	<td class="td"> Deskripsi </td>
	<td class="td"> : </td>
	<td> 
		<?php
		$textarea = array(
			'name' => 'deskripsi',
			'class' => 'test',
			'cols' => '20',
			'rows' => '20'
		);
		echo form_textarea($textarea,$hasil->deskripsi);
		?>
 </td>
</tr>
<tr>
	<td> <?php echo form_submit('submit', 'Submit', 'id="submit"'); ?> </td>
</tr>
</table>
<?php echo form_close(); ?>
</body>
</html>