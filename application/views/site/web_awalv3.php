
<style>
.bg-page{background-image: url('<?php echo base_url('assets/img/slide/').$qryslide[rand(0,4)]->slideImg;?>');background-size: cover}.color-overlay{ position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: #b1dcbe; opacity: 0.8}.card-menu{ min-height: 150px !important}.navbar-expand-lg{ flex-flow: row nowrap; justify-content: center !important}.navbar-brand{ margin-right: 0 !important}.main-wrapper{ width: 100%; max-width: 900px; margin: 1em auto; text-align: center}.badge{ position: relative; margin: 1.2em 2.47em; width: 6em; height: 9.2em; border-radius: 10px; display: inline-block; top: 0; transition: all 0.2s ease; cursor: pointer}.badge:before, .badge:after{ position: absolute; width: inherit; height: inherit; border-radius: inherit; background: inherit; content: ""; top: 0; left: 0; right: 0; bottom: 0; margin: auto}.badge:before{ transform: rotate(60deg)}.badge:after{ transform: rotate(-60deg)}.badge:hover{ top: -4px}.badge .badge-container{display: flex;position: relative;width: 100%;height: 100%;justify-content: center;justify-items: center;cursor: pointer}.badge .circle{display: flex;justify-content: center;align-items: center; width: 80px; height: 80px; position: absolute; background: #00000000; z-index: 10; border-radius: 50%}.badge .circle i.fa{ font-size: 2em; margin-top: 8px}.badge .circle img{width: 98%}.badge .font{ display: inline-block; margin-top: 1em}.badge .ribbon{display: flex;font-size: 10px;align-items: center;justify-content: center;letter-spacing: 1.1px; position: absolute; border-radius: 4px; padding: 5px 5px 4px; width: 120px; z-index: 11; color: #fff; bottom: -16px; height: 25px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.27); text-shadow: 0 2px 2px rgba(0, 0, 0, 0.1); text-transform: uppercase; background: linear-gradient(to bottom right, #52a856 0%, #333 100%); cursor: pointer; font-family: Arial, Helvetica, sans-serif}.sunrise{ background: linear-gradient(to bottom right, #ffc107 0%, #52a856 100%) !important; color: #f68401}.quepal{ background: linear-gradient(to bottom right, #4CAF50 0%, #1B5E20 100%) !important; color: #00944a}@media only screen and (max-width: 768px){ .badge{width: 4em;height: 6.2em;} .badge .circle{width: 60px; height: 60px;}.badge .ribbon {
    letter-spacing: .9px;;width: 110px;}}.search-form .dropdown.bootstrap-select{padding: 6px 15px;}.search-form .dropdown.bootstrap-select .btn.dropdown-toggle{padding: 5px;background-color: transparent;border-radius: 30px;font-size: 14px;}.search-form .dropdown.bootstrap-select .btn.dropdown-toggle:focus{border: 0;}.dropdown-item.active, .dropdown-item:active{background-color: #009688;}.dropdown-menu{font-size: 12px;}.bootstrap-select .btn:focus{ outline: none !important;}.dropdown-header{color:#004d40;font-weight: 600;}.form-control{padding: .375rem .75rem;}
</style>
<style>
	.bg-page{background-image: url('<?php echo base_url('assets/img/slide/').$qryslide[rand(0,4)]->slideImg;?>');background-size: cover}.color-overlay{ position: absolute; top: 0; left: 0; width: 100%; height: 100vh; background-color: #c4e0cc; opacity: 0.8}.search-form .dropdown.bootstrap-select{padding: 6px 15px;}.search-form .dropdown.bootstrap-select .btn.dropdown-toggle{padding: 5px;background-color: transparent;border-radius: 30px;font-size: 14px;}.search-form .dropdown.bootstrap-select .btn.dropdown-toggle:focus{border: 0;}.dropdown-item.active, .dropdown-item:active{background-color: #009688;}.dropdown-menu{font-size: 14px;}.bootstrap-select .btn:focus{ outline: none !important;}.dropdown-header{color:#004d40;font-weight: 600;}.form-control{padding: .375rem .75rem;}.sub-lay{border-radius: 40px 0px 0px 40px;color: #fff;display: inline-block;font-size: 14px;font-weight: 400;height: 65px;text-align: left;position: relative;cursor: pointer;}a.sub-lay:hover{color: #fff;text-decoration: none;}.sub-lay img{display: inline;margin: 2px 8px 2px 10px;object-fit: cover;overflow: hidden;vertical-align: middle;z-index: 2;float: left;}.sub-lay .Qjibbc{border-radius: 30px;background-color: #1d1d1d;height: 60px;pointer-events: none;position: absolute;width: 60px;margin: 2px 8px 2px -3px;}.sub-lay .title{display: inline;width: 75%;vertical-align: top;margin-left: 5px;}.sub-lay:hover{top: -4px;}.quepal{background: linear-gradient(to bottom right, #4CAF50 0%, #1B5E20 100%) !important;}
</style>   
	<!--<?php $this->load->view('site/web_headv2'); ?> -->
		<?php $this->load->view('site/web_headlayanan'); ?> 
    <div id="layananptsp" class="page-header text-center position-relative " style="height:100%">
		<div class="color-overlay"></div>
	    <!-- <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div> -->
	    <div  class="container" style="padding-right:5px;padding-left:5px">
		    
		    <div class="d-block mx-auto " style="padding-top: 1.2rem;padding-bottom:3rem">
			
		
		        <div class="w-100">
					<header >
					    	<img  style="height:7rem;width:auto;z-index:1000;position:relative" src="<?php echo base_url('assets/images/zi.png')?>" alt="PTSP KEMENAG KAB. NGAWI">
                          
					    	
					    	
					    	<?php
    // Check if the request is coming from an Android device
    $isAndroid = stripos($_SERVER['HTTP_USER_AGENT'], "android") !== false;
    
    // Check if the request is not coming from the specific Android app
    $isNotSpecificApp = ($_SERVER['HTTP_X_REQUESTED_WITH'] != "com.santun.ngawi");
    
    // If the request is from an Android device and not from the specific app
    if ($isAndroid && $isNotSpecificApp) {
?>
        <!-- Place your content here -->
        <a href='https://play.google.com/store/apps/details?id=com.santun.ngawi&hl=en&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'>
            <img style="height:6rem;width:auto;z-index:1000;position:relative" alt='Get it on Google Play' src='https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png'/>
        </a>
        <br>
<?php
    }
?>

					    	
					    	
					<!--<h3 class="" style="color: #e17d02">Layanan SANTUN</h3>-->
					<p style="color: #1e672f;font-size:14px " class="position-relative ">Dengan SANTUN (Sistem Anjungan Terintegrasi Untuk Ngawi) Kemenag Ngawi menuju Zona Integritas menuju Wilayah Bebas Korupsi (WBK) dan Wilayah Birokrasi Bersih dan Melayani (WBBM) </p>
					</header>
					<div class="main-search-box d-block mx-auto" style="text-align: right">
						<div class="main-search-box d-block mx-auto" style="text-align: right">
							<form class="search-form w-100 text-left">
								<select id="cariLayanan" class="selectpicker form-control search-input mb-4" title="Cari Layanan" data-live-search="true">
										<?php 
											$grpmenu = '';
											foreach ($layanan as $row) {
												$link = $row->layananHref;
												$kode= $row->menuKode.$row->layananKode;
												$eks = 0;
												if ($row->layananHref != '' || $row->layananHref != null ){
													$link = $row->layananHref;
													$eks = 1;
												} else {
													$link = base_url("index.php/layanan/").$row->menuSlug.'/'.$row->layananView;
												}
												$lynm = $row->layananJenis;
												$menuinfo = $row->menuSubjudul;
												if ($grpmenu != $row->menuJudul){
													echo "<optgroup label='".$row->menuJudul."'>";
												}
												
												
										?>
	<option value="<?php echo $link; ?>"><?php echo $lynm; ?></option>
										<?php 
										$grpmenu = $row->menuJudul; 
										if ($grpmenu != $row->menuJudul){
											echo "</optgroup>";
										}
										}?>
								</select>
							</form>
						</div>
					</div>
					<div class="main-wrapper mt-0">
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
							<div class="badge animated flipInY <?php echo $row->menuColor; ?>" data-eks="<?php echo $eks; ?>" data-link="<?php echo $link; ?>">
								<div class="badge-container">
									<div class="circle"> <img src="<?php echo base_url(); ?>assets\images\menu_icons\v3\<?php echo $row->menuImg; ?>" alt="<?php echo $row->menuJudul; ?>"></div>
									<div class="ribbon"><?php echo $row->menuJudul; ?></div>
								</div>
							</div>
							<?php } ?>
					</div>
             	</div>
            </div>
	    </div>
    </div>                         
<?php $this->load->view('index_js'); ?>
<script>
	var isMobile = Math.min(window.screen.width, window.screen.height) < 768 || navigator.userAgent.indexOf("Mobi") > -1;


	$(function() {
		$('.nav-link').click(function(e){
			var href = $(this).attr('href');
			var res = href.substring(0,1);
			if (res == '#' || res == '.'){
				e.preventDefault();
				$('html, body').animate({
					scrollTop: $(href).offset().top-60
				}, 2000);
				$('.badge').removeClass('animated flipInY');
				setTimeout(function(){
					$('.badge').addClass('animated flipInY');
				},500);
				
			}
		})
		$('.badge').click(function(){
			var href = $(this).data('link');
			if (href == '#'){
				return false;
			}
			if ($(this).data('eks') == 1){
				window.open(href, '_self');
			} else {
				window.open(href, '_self');
			}
			
		})
		$('#cariLayanan').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
			setTimeout(function(){window.open(e.target.value, '_self');},1000);
			
		});

	});
</script>
<script>
	$(function() {
		$('.menu').click(function(){
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





