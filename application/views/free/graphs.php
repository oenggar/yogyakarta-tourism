		<script type="text/javascript" src="<?php echo base_url();?>jscripts/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column',
                margin: [ 12, 12, 25, 20]
            },
            title: {
                text: 'Retribusi Obyek Wisata <?php echo $nama_obyek_wisata; ?>'
            },
            xAxis: {
                categories: [
                    <?php foreach($ambilisi as $bulan){
					echo "'".$row->nama_bulan."',";
					}
					?>
                ],
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Retribusi'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Retribusi: <b>{point.y:.1f}</b>',
            },
            series: [{
                name: 'Population',
                data: [<?php foreach($ambilisi as $bulan){
					echo $row->retribusi.",";
					}
					?>
					],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
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
	</head>
	<body>
<script src="<?php echo base_url(); ?>js/highcharts.js"></script>
<script src="<?php echo base_url(); ?>js/modules/exporting.js"></script>

<div id="container" style="min-width: 500px; height: 400px; margin: 0 auto"></div>

	</body>
