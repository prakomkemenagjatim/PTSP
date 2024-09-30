<style>
.search-form .dropdown.bootstrap-select{padding: 6px 15px;}.search-form .dropdown.bootstrap-select .btn.dropdown-toggle{padding: 5px;background-color: transparent;border-radius: 30px;font-size: 14px;}.search-form .dropdown.bootstrap-select .btn.dropdown-toggle:focus{border: 0;}.dropdown-item.active, .dropdown-item:active{background-color: #009688;}.dropdown-menu{font-size: 14px;}.bootstrap-select .btn:focus{ outline: none !important;}.dropdown-header{color:#004d40;font-weight: 600;}.form-control{padding: .375rem .75rem;}
</style>
	<?php $this->load->view('site/web_headlayanan'); ?> 
	<section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

	  	<ol class="carousel-indicators">
		  <li data-target="#introCarousel" data-slide-to="0" class=""></li>
		  <li data-target="#introCarousel" data-slide-to="1" class=""></li>
		  <li data-target="#introCarousel" data-slide-to="2" class=""></li>
		  <li data-target="#introCarousel" data-slide-to="3" class=""></li>
		  <li data-target="#introCarousel" data-slide-to="4" class=""></li>
		</ol>

        <div class="carousel-inner" role="listbox">
		<?php 
			$i = 0;
			foreach ($qryslide as $row) {
			$aktif = '';
			if ($i == 0){
				$aktif = 'active';
			}
			$i++;
		?>
          <div class="carousel-item <?php echo $aktif;?>">
            <div class="carousel-background"><img src="<?php echo base_url();?>assets/img/slide/<?php echo $row->slideImg;?>" alt="<?php echo $row->slideJudul;?>"></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2><?php echo $row->slideJudul;?></h2>
                <p><?php echo $row->slideSubjudul;?></p>
                <div class="btn-get-started quepal">SENYUM KEMENAG KOTA MALANG</div>
              </div>
            </div>
          </div>
		<?php } ?>
        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section>   
    
    <div id="layananptsp" class="page-header text-center position-relative box-shadow-dark">
	    <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div>
	    <div  class="container">
		    
		    <div class="d-block mx-auto" style="padding-top: 3rem;padding-bottom:3rem">
			
		        <div class="w-100">
				<header class="section-header">
				<h3>Layanan SENYUM</h3>
				<p>Layanan SENYUM kementerian agama kota malang yang dapat diakses langsung oleh masyarakat secara mandiri.</p>
				</header>
					<div class="row justify-content-center">
						<?php 
							foreach ($qry as $row) {
							$link = base_url('index.php/page/').$row->menuSlug;
							$eks = 0;
							if ($row->menuHref != '' || $row->menuHref != null ){
								$link = $row->menuHref;
								$eks = 1;
							} else {
								if ($row->menuData == 1){
									$link = base_url('index.php/data/').$row->menuSlug;
								} else if ($row->menuData == 2){
									$link = base_url('index.php/layanan/').$row->menuSlug;
								} 
							}
						?>
						<div class="col-lg-3 col-md-3">  
							<div class="card card-menu text-left animated flipInY <?php echo $row->menuColor; ?>" data-eks="<?php echo $eks; ?>" data-link="<?php echo $link; ?>">
								<img src="<?php echo base_url(); ?>assets\images\menu_icons\<?php echo $row->menuImg; ?>" class="card-img-top" alt="<?php echo $row->menuJudul; ?>">
								<div class="card-body p-3">
									<h5 class="card-title card-menu-title"><?php echo $row->menuJudul; ?></h5>
									<p class="card-text card-menu-subtitle white-text"><?php echo $row->menuSubjudul; ?>.</p>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
             	</div>
            </div>
	    </div>
    </div> 
	<div class="page-header text-center position-relative bg-dark box-shadow-dark">
	    <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div>
	    <div  class="container">
		    
		    <div class="d-block mx-auto" style="padding-top: 3rem;padding-bottom:3rem">
			
		        <div class="w-100">
				<header class="section-header">
				<h3 class="yellow-text">Grafik Layanan SENYUM</h3>
				<p class="white-text">Grafik layanan SENYUM kementerian agama kota malang.</p>
				</header>
					<div class="row justify-content-center search-form ml-0">
							<div class="col-lg-3 col-md-3 text-left">  
								<sup class="green-text">Tahun</sup>
								<select id="stahun" class="selectpicker form-control search-input mb-4" title="<?php echo  date('Y');?>">
								<?php
									for ($i=2021;$i<=date('Y');$i++){
										$sld='';
										if ($i == date('Y')){
											$sld = 'selected="selected"';
										}
									echo"<option value='$i' ".$sld."> ".$i." </option>";
									}
									?>
								</select>
							</div>
							<div class="col-lg-3 col-md-3 text-left">  
								<sup class="green-text">Bulan</sup>
								<select id="sbulan" class="selectpicker form-control search-input mb-4" title="Semua Bulan">
									<option value="">Semua Bulan</option>
									<option value="01" <?php if (date('m')=='01') {echo 'selected="selected"';} ?>>Januari</option>
									<option value="02"<?php if (date('m')=='02') {echo 'selected="selected"';} ?>>Februari</option>
									<option value="03"<?php if (date('m')=='03') {echo 'selected="selected"';} ?>>Maret</option>
									<option value="04"<?php if (date('m')=='04') {echo 'selected="selected"';} ?>>April</option>
									<option value="05"<?php if (date('m')=='05') {echo 'selected="selected"';} ?>>Mei</option>
									<option value="06"<?php if (date('m')=='06') {echo 'selected="selected"';} ?>>Juni</option>
									<option value="07"<?php if (date('m')=='07') {echo 'selected="selected"';} ?>>Juli</option>
									<option value="08"<?php if (date('m')=='08') {echo 'selected="selected"';} ?>>Agustus</option>
									<option value="09"<?php if (date('m')=='09') {echo 'selected="selected"';} ?>>September</option>
									<option value="10"<?php if (date('m')=='10') {echo 'selected="selected"';} ?>>Oktober</option>
									<option value="11"<?php if (date('m')=='11') {echo 'selected="selected"';} ?>>November</option>
									<option value="12"<?php if (date('m')=='12') {echo 'selected="selected"';} ?>>Desember</option>
								</select>
							</div>
						<div class="col-lg-12 col-md-12">  
							<div class="card card-grafik text-left animated flipInY ">
								<div class="card-body p-3">
									<div id="cart" style="min-height: 450px;width: 100%"> </div> 
								</div>
							</div>
						</div>
					</div>
             	</div>
            </div>
	    </div>
    </div>                           
<?php $this->load->view('index_js'); ?> 
<script type="text/javascript" src="<?php echo base_url('assets/cart/js/highcharts.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/cart/js/modules/exporting.js')?>"></script>
<script>
	var isMobile = Math.min(window.screen.width, window.screen.height) < 768 || navigator.userAgent.indexOf("Mobi") > -1;
	 var chart;
	 var options1 = {
	  		
			  chart: {
				  type: 'column',
				  marginLeft:60,
	            marginRight:20,
	            marginBottom:130,
	            reflow: true,
				  renderTo: ''
			  },
			  title: {
				  text: ''
			  },
			  credits: {
				enabled:false
			  },
			  exporting:{
				enabled:true
			  },
			  subtitle: {
				  text: ''
			  },
			  plotOptions: {
				  column : {
					  pointWidth:null
				  },
				  bar: {
						  groupPadding:0,
						  pointPadding:0.1,
						  dataLabels: {
							  enabled: true
						  }
					  },
				  series: {
						  colorByPoint: true
					  }
			  },
			  xAxis: {
					type: 'category',
				  labels: {
					  rotation: 0,
					  style: {
						  fontSize: '10px',
					  
					  },
				  },
				  categories: [],
				  title: {
					  offset:100,
					  text: null
				  },
			  },
			  yAxis: {
				  min: 0,
				  title: {
					  text: 'JUMLAH'
				  }
			  },
			  legend: {
				  layout: 'horizontal',
				  align: 'right',
				  verticalAlign: 'bottom',
				  x: 0,
				  y: 10,
				  floating: true,
				  borderWidth: 1,
				 /* backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),*/
				  shadow: false,
				  enabled:false
			  },
			  tooltip: {
				  pointFormat: '{series.name}: <b>{point.y}</b><br/>'
			  },
			  series: [{
				  name: '',
				  data: [],
				  dataLabels: {
					  enabled: true,
					  rotation: 0,
					  color: '#111',
					  align: 'right',
					  x: -10,
					  y: -30,
					  style: {
						  fontSize: '8px',
						  fontFamily: 'Verdana, sans-serif'
					  }
				  },
			  }]
				  
			  }
		
		function loadgrafik(){
			$('#cart').html('');
			$('#loading-area').show();
			$.post("<?php echo base_url('index.php/ajax/grafiklayanan')?>",{[csrfName]: csrfHash,thn:$('#stahun').val(),bln:$('#sbulan').val()},function(hasil){
					$('.card-grafik').removeClass('animated flipInY');
					setTimeout(function(){
						$('.card-grafik').addClass('animated flipInY');
						title = hasil.title;
						options1.chart.renderTo='cart';
						options1.series[0].data= hasil.y;
						periode =  "";
						options1.xAxis.title.text = 'LAYANAN SENYUM <br /><b>TOTAL: '+hasil.total+'</b>';
						$bln = ' BULAN '+$('#sbulan option:selected').text().toUpperCase();
						if ($('#sbulan').val() == ''){
							$bln = '';
						}
						options1.subtitle.text= '<b>'+title+$bln+' TAHUN '+$('#stahun option:selected').text()+'<br/> <?php echo kantorapp();?></b>';
						options1.xAxis.categories = hasil.x;
						if(isMobile){
							options1.xAxis.labels.rotation = -45;
							options1.series[0].dataLabels.x= 0;
							options1.series[0].dataLabels.y= 0;
						} else {
							options1.xAxis.labels.rotation = 0;
							options1.series[0].dataLabels.x= -10;
							options1.series[0].dataLabels.y= -30;
						}
						
					},500);
					setTimeout(function(){
						chart = new Highcharts.Chart(options1);
					},1000);

				},'json');
			
		}

	$(function() {

		loadgrafik();
		$('#stahun').change(function(){
			loadgrafik();
		});
		$('#sbulan').change(function(){
			loadgrafik();
		})
		$('.nav-link').click(function(e){
			var href = $(this).attr('href');
			var res = href.substring(0,1);
			if (res == '#' || res == '.'){
				e.preventDefault();
				$('html, body').animate({
					scrollTop: $(href).offset().top-60
				}, 2000);
				$('.card-menu').removeClass('animated flipInY');
				setTimeout(function(){
					$('.card-menu').addClass('animated flipInY');
				},500);
				
			}
		})
		$('.card-menu').click(function(){
			var href = $(this).data('link');
			if (href == '#'){
				return false;
			}
			if ($(this).data('eks') == 1){
				window.open(href, '_blank');
			} else {
				window.open(href, '_self');
			}
			
		})
	});
</script>






