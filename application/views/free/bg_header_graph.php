<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem informasi Pariwisata Kota Yogyakarta - UIN Suka Yogyakarta</title>
<meta name="keywords" content="free css template, XHTML, CSS, food blog template" />
<meta name="description" content="Food Blog Template - free CSS website layout, XHTML CSS template" />
<link href="<?php echo base_url(); ?>css/templatemo_style.css" rel="stylesheet" type="text/css" />
				<?php
			$text_graph="Jumlah Pengunjung Obyek Wisata ".$ambilobwis->nama_obyek_wisata;
            $i = 0;
            $nilai2 = '';
            $data2 = '';
            foreach ($view->result() AS $row) {
                $i++;
                if ($i < count($view)){
                    $data2 = $data2."'".$row->nama_bulan."";
                    $nilai2 = $nilai2.$row->retribusi."";
                } else {
                    $data2 = $data2."'".$row->nama_bulan."',";
                    $nilai2 = $nilai2.$row->retribusi.",";
                }
            }
        ?>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column',
                margin: [ 25, 25, 50, 40]
            },
            title: {
                text: '<?php echo $text_graph; ?>'
            },
            xAxis: {
                categories: [
                    <?php
					echo $data2;
					?>
                ],
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '9px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Pengunjung'
                }
            },
            legend: {
                enabled: false
            },
            series: [{
                name: 'Jumlah Pengunjung',
                data: [<?php
					echo $nilai2;
					?>],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 2,
                    y: 5,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif',
                        textShadow: '0 0 3px black'
                    }
                }
            }]
        });
    });
    

		</script>
<script src="<?php echo base_url(); ?>jscripts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>jscripts/modules/exporting.js"></script>

<!--  Designed by w w w . t e m p l a t e m o . c o m  --> 
</head>
<body>
	<div id="templatemo_background_section_top">
	  <div class="templatemo_container">
	    <div id="templatemo_header">
	      <div id="templatemo_logo_section">
	        <h1>Sistem Informasi Pariwisata</h1>            
		  <h2>Kota Yogyakarta</h2>
				</div>
               
    </div><!-- end of headder -->
                
    		<div id="templatemo_menu_panel">
            
    			<div id="templatemo_menu_section">
                
            		<ul>
		                <li><?php
						if ($jenis=="home")
						echo anchor('cfree/menu/1', 'Home', array('class' => 'current'));
						else
						echo anchor('cfree/menu/1', 'Home');
							?></li>
        		        <li><?php
						if ($jenis=="obyek wisata")
						echo anchor('cfree/obyek_wisata', 'Obyek Wisata', array('class' => 'current'));
						else
						echo anchor('cfree/obyek_wisata', 'Obyek Wisata');
							?></li>
		                <li><?php
						if ($jenis=="souvenir")
						echo anchor('cfree/souvenir', 'Souvenir', array('class' => 'current'));
						else
						echo anchor('cfree/souvenir', 'Souvenir');
							?></li>
		                <li><?php
						if ($jenis=="retribusi")
						echo anchor('cfree/retribusi', 'Pengunjung', array('class' => 'current'));
						else
						echo anchor('cfree/retribusi', 'Pengunjung');
							?></li>  
        		        <li><?php
						if ($jenis=="about")
						echo anchor('cfree/menu/2', 'About', array('class' => 'current'));
						else
						echo anchor('cfree/menu/2', 'About');
							?></li> 
                		<li><?php
						if ($jenis=="contact")
						echo anchor('cfree/menu/3', 'Contact', array('class' => 'current'));
						else
						echo anchor('cfree/menu/3', 'Contact');
							?></li>                     
		            </ul> 
                    
				</div>
                
		    </div> <!-- end of menu -->
            
		</div><!-- end of container-->
        
	</div><!-- end of templatemo_background_section_top-->
