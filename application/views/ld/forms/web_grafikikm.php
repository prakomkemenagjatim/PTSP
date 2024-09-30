
 
    <div class="page-header  py-5 text-center position-relative bg-secondary  box-shadow-dark">
	    <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div>
	    <div class="container "style="padding-bottom:3rem">
			<div class="d-block mx-auto" style="padding-top: 1rem;padding-bottom:3rem">
			
			<div class="w-100">
				<header class="section-header">
					<h3 class="mb-5 green-text" style="font-size: 22px;" ><?php echo $head; ?></h3>
				</header>
				<div class="row justify-content-center">
					<div class="col-12 col-lg-6 py-2">
						<div class="card shadow-sm">
							<div class="card-body">
								<div class="card-text" id="grafikhari">
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6 py-2">
						<div class="card shadow-sm">
							<div class="card-body">
								<div class="card-text" id="grafikbulan">
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6 py-2">
						<div class="card shadow-sm">
							<div class="card-body">
								<div class="card-text" id="grafiktahun">
								</div>
							</div>
						</div>
					</div>
				</div>
			 </div>
		</div>
	    </div>
    </div>                       
<?php $this->load->view('index_js'); ?> 
<script src="<?php echo base_url('assets/cart/js/highcharts.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/cart/js/modules/exporting.js')?>" type="text/javascript"></script>
<script type="text/javascript">
	var markers = [];
	var iw_map;
	$(document).ready(function(){
		getgrafik('hari');
		getgrafik('bulan');
		getgrafik('tahun');
	});

	var options = {
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
	            type: 'pie',
	            renderTo: '',
	            options3d: {
					enabled: true,
	                alpha: 45,
	                beta: 0
	            }
	        },
	        title: {
	            text: ''
	        },
	        tooltip: {
	            pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'

	        },
	        plotOptions: {
	            pie: {
	                allowPointSelect: true,
	                cursor: 'pointer',
	                dataLabels: {
	                    enabled: true,
	                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
	                    style: {
	                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
	                    }
	                },
                    showInLegend: true,
                    depth: 25,
                    point: {
	                events: {
	                    legendItemClick: function () {	                       
	                        	return false;
	                    }
	                }
                }
	            }

	        },
	        series: [{}],
	        legend: {
				enabled: true,
				borderWidth: 0,
                useHTML: true,
                backgroundColor: '#FCFFC5',
            	borderColor: '#C98657',
            	borderWidth: 1,
			    labelFormatter: function() {
       return '<div style="width:200px;background-color:#000"><span style="float:left">' + this.name + '</span><span style="float:right; margin-right:10px;"><a href="javascript:void=0" data-value="'+this.name+'">' + this.y + '</a> 	</span></div>';
            },
            symbolHeight: 12,
            symbolWidth: 12,
            symbolRadius: 6
			},
	        credits: {
	            enabled: false
	        }
		}
	
	function getgrafik(dasar){
		host = "<?php echo base_url(); ?>index.php/ajax/grafikikm";;
		$.post(host,{
				[csrfName]: csrfHash,
				sdasar:dasar
		},function(result){
			options.series[0].data = result.data;
	        options.title.text = "Grafik "+result.judul;
	        options.chart.renderTo = 'grafik'+dasar;
	        var chart = new Highcharts.Chart(options);
		},'json');
	}
</script>



