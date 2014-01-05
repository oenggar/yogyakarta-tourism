<div id="templatemo_background_section_middle">
    
    	<div class="templatemo_container">
        
        	<div id="templatemo_left_section">
            	<div class="templatemo_title">
                    	<h1>Obyek Wisata</h1>
                    </div>
					<?php
				foreach($hasil->result() as $row){
				$isi = $row->deskripsi;
				$isi = substr($isi, 0, 480);
				?>
                <div class="templatemo_post">
				<div class="templatemo_post_top">
                    	<h1><?php echo $row->nama_obyek_wisata; ?></h1>
                    </div>
                    <div class="templatemo_post_mid_top">
                    </div>                    
              <div class="templatemo_post_mid">
			  <p><img src="<?php echo base_url();?>gambar/thumbnails/<?php echo $row->gambar;?>"/>HTM:<?php echo $row->htm;?></p>
                <?php echo $isi; ?> .. <?php echo anchor('cfree/view_obyek_wisata/'.$row->id_obyek_wisata,"baca selengkapnya"); ?>
				<div class="clear"></div>                   
                    </div>
                    <div class="templatemo_post_bottom">
                    	
                    </div>
                    
				</div><!-- end of templatemo_post-->
                
                <!-- end of templatemo_post-->
                <?php 
				}
 echo $this->pagination->create_links();
?>
            </div><!-- end of left section-->
