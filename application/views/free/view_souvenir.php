<div id="templatemo_background_section_middle">
    
    	<div class="templatemo_container">
        
        	<div id="templatemo_left_section">
            	<div class="templatemo_title">
                    	<h1>Souvenir</h1>
                    </div>
                <div class="templatemo_post">
				<div class="templatemo_post_top">
                    	<h1><?php echo $ambilisi->nama_souvenir; ?></h1>
                    </div>
                    <div class="templatemo_post_mid_top">
                    </div>                    
              <div class="templatemo_post_mid">
			  <p><img src="<?php echo base_url();?>gambar/thumbnails/<?php echo $ambilisi->gambar;?>"/>Harga:<?php echo $ambilisi->harga;?></p>
                <?php echo $ambilisi->deskripsi; ?>
				<br><br>
				<p><a href=javascript:history.go(-1)> Kembali </a><p>&nbsp;</p></p>
				<div class="clear"></div>                   
                    </div>
                    <div class="templatemo_post_bottom">
                    </div>
    			</div><!-- end of templatemo_post-->
            </div><!-- end of left section-->