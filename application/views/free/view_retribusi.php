<?php
include "function.php";
?>
<div id="templatemo_background_section_middle">
    
    	<div class="templatemo_container">
        
        	<div id="templatemo_left_section">
            	<div class="templatemo_title">
                    	<h1>Pengunjung</h1>
                    </div>
                <div class="templatemo_post">
				<div class="templatemo_post_top">
                    	<h1><?php echo $ambilobwis->nama_obyek_wisata; ?></h1>
                    </div>
                    <div class="templatemo_post_mid_top">
                    </div>                    
              <div class="templatemo_post_mid_graph">
			  <p align="center"><img src="<?php echo base_url();?>gambar/thumbnails/<?php echo $ambilobwis->gambar;?>"/></p>
				<p><br><div id="container" style="width: 500px; height: 400px; margin: 0 auto"></div></p>
				<br><br>
				<p>
			  Jumlah pengunjung obyek wisata <?php echo $ambilobwis->nama_obyek_wisata; ?> setiap bulan
			  </p>
				<table width=100% style="border: 1px dashed"><UL>
<tr bgcolor=#999999>
	<th class="td"> Bulan (Tahun) </th>
	<th class="td"> Jumlah Pengunjung </th>
</tr>
<?php
foreach($daftar_retribusi->result() as $row) :
?>

<tr>
	<td class="td" align="center" style="border: 1px dotted"> <?php echo $row->nama_bulan; ?> </td>
	<td class="td" align="center" style="border: 1px dotted"> <?php echo formatangka($row->retribusi); ?> </td>
</tr>
<?php 
endforeach;
?>
</table>
</ul>
<br><br>
				<p><a href=javascript:history.go(-1)> Kembali </a><p>&nbsp;</p></p>
				<div class="clear"></div>                   
                    </div>
                    <div class="templatemo_post_bottom">
                    	<span class="post"></span>
                    </div>
    			</div><!-- end of templatemo_post-->
            </div><!-- end of left section-->