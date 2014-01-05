<div id="templatemo_background_section_middle">
    
    	<div class="templatemo_container">
        
        	<div id="templatemo_left_section">
            	<div class="templatemo_title">
                    	<h1>Pengunjung</h1>
                    </div>
					<?php
				foreach($hasil->result() as $row){
				?>
                <div class="templatemo_post">
				<div class="templatemo_post_top">
                    	<h1><?php echo $row->nama_obyek_wisata; ?></h1>
                    </div>
                    <div class="templatemo_post_mid_top">
                    </div>                    
              <div class="templatemo_post_mid">
			  <p><img src="<?php echo base_url();?>gambar/thumbnails/<?php echo $row->gambar;?>"/></p>
                 Klik <?php echo anchor('cfree/view_retribusi/'.$row->id_obyek_wisata,"disini"); ?> untuk melihat jumlah pengunjung
				 obyek wisata <?php echo $row->nama_obyek_wisata;?>.
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
