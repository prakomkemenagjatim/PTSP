<?php $this->load->view('site/web_headlayanan')?>
<style>
	.search-form .dropdown.bootstrap-select{
		padding: 6px 15px;
	}
	.search-form .dropdown.bootstrap-select .btn.dropdown-toggle {
		padding: 5px;
		background-color: transparent;
		border-radius: 30px;
		font-size: 14px;
	}
	.search-form .dropdown.bootstrap-select .btn.dropdown-toggle:focus {
		border: 0;
	}
	.dropdown-item.active, .dropdown-item:active{
		background-color: #009688;
	}
	.dropdown-menu{
		font-size: 14px;
	}
	.bootstrap-select .btn:focus {
	    outline: none !important;
	}
	.dropdown-header {
		color:#004d40;
		font-weight: 600;
	}
	.form-control{
		padding: .375rem .75rem;
	}
</style>    
    
    <div class="page-header  py-5 text-center position-relative bg-secondary  box-shadow-dark">
	    <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div>
	    <div class="container "style="padding-top: 3rem;padding-bottom:3rem">
		    <h1 class="page-heading single-col-max mx-auto white-text"><?php echo $head; ?></h1>
		    <div class="page-intro single-col-max mx-auto yellow-text"><?php echo $subhead; ?></div>
			<div class="d-block mx-auto" style="padding-top: 3rem;padding-bottom:3rem">
			
			<div class="w-100">
			<header class="section-header">
			<h3 class="mb-5 green-text" style="font-size: 22px;" >SUB LAYANAN</h3>
			</header>
				<div class="row justify-content-center">
					<?php 
						foreach ($qrylayanan as $row) {
						$link = $row->layananHref;
						$eks = 0;
						if ($row->layananHref != '' || $row->layananHref != null ){
							$link = $row->layananHref;
							$eks = 1;
						} else {
							$link = base_url("index.php/layanan/").$row->menuSlug.'/'.$row->layananView;
						}
					?>
					<div class="col-lg-3 col-md-3">  
						<div class="card card-menulayanan text-left animated flipInY quepal bg-note" data-eks="<?php echo $eks; ?>" data-link="<?php echo $link; ?>">
							<img src="<?php echo base_url(); ?>assets\images\menu_icons\<?php echo $row->layananImg; ?>" class="card-img-top white" alt="<?php echo $row->layananJenis; ?>">
							<div class="card-body p-3">
								<h5 class="card-title card-menulayanan-title"><?php echo $row->layananJenis; ?></h5>
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
	$(function() {
		$('.card-menulayanan').click(function(){
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




