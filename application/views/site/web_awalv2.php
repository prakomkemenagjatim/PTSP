<style>
.card-menu {
    min-height: 120px !important;
}
.navbar-expand-lg {
    flex-flow: row nowrap;
    justify-content: center !important;
}
.navbar-brand {
    margin-right: 0 !important;
}
.search-form .dropdown.bootstrap-select{padding: 6px 15px;}.search-form .dropdown.bootstrap-select .btn.dropdown-toggle{padding: 5px;background-color: transparent;border-radius: 30px;font-size: 14px;}.search-form .dropdown.bootstrap-select .btn.dropdown-toggle:focus{border: 0;}.dropdown-item.active, .dropdown-item:active{background-color: #009688;}.dropdown-menu{font-size: 14px;}.bootstrap-select .btn:focus{ outline: none !important;}.dropdown-header{color:#004d40;font-weight: 600;}.form-control{padding: .375rem .75rem;}
</style>
	<?php $this->load->view('site/web_headv2'); ?>     
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
						<div class="col-lg-2 col-md-2 col-6">  
							<div class="card card-menu text-left animated flipInY <?php echo $row->menuColor; ?>" data-eks="<?php echo $eks; ?>" data-link="<?php echo $link; ?>">
								<img src="<?php echo base_url(); ?>assets\images\menu_icons\<?php echo $row->menuImg; ?>" class="card-img-top" alt="<?php echo $row->menuJudul; ?>">
								<div class="card-body p-3">
									<h5 class="card-title card-menu-title"><?php echo $row->menuJudul; ?></h5>
									<!-- <p class="card-text card-menu-subtitle white-text"><?php echo $row->menuSubjudul; ?>.</p> -->
								</div>
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






