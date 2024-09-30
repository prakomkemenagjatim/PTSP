<?php $this->load->view('site/web_headlayanan')?>
<style>
	.bg-page{background-image: url('<?php echo base_url('assets/img/slide/').$qryslide[rand(0,4)]->slideImg;?>');background-size: cover}.color-overlay{ position: absolute; top: 0; left: 0; width: 100%; height: 100vh; background-color: #c4e0cc; opacity: 0.8}.search-form .dropdown.bootstrap-select{padding: 6px 15px;}.search-form .dropdown.bootstrap-select .btn.dropdown-toggle{padding: 5px;background-color: transparent;border-radius: 30px;font-size: 14px;}.search-form .dropdown.bootstrap-select .btn.dropdown-toggle:focus{border: 0;}.dropdown-item.active, .dropdown-item:active{background-color: #009688;}.dropdown-menu{font-size: 14px;}.bootstrap-select .btn:focus{ outline: none !important;}.dropdown-header{color:#004d40;font-weight: 600;}.form-control{padding: .375rem .75rem;}.sub-lay{border-radius: 40px 0px 0px 40px;color: #fff;display: inline-block;font-size: 14px;font-weight: 400;height: 65px;text-align: left;position: relative;cursor: pointer;}a.sub-lay:hover{color: #fff;text-decoration: none;}.sub-lay img{display: inline;margin: 2px 8px 2px 10px;object-fit: cover;overflow: hidden;vertical-align: middle;z-index: 2;float: left;}.sub-lay .Qjibbc{border-radius: 30px;background-color: #1d1d1d;height: 60px;pointer-events: none;position: absolute;width: 60px;margin: 2px 8px 2px -3px;}.sub-lay .title{display: inline;width: 75%;vertical-align: top;margin-left: 5px;}.sub-lay:hover{top: -4px;}.quepal{background: linear-gradient(to bottom right, #4CAF50 0%, #1B5E20 100%) !important;}
</style>    
    
    <div class="page-header  py-5 text-center position-relative " style="height:auto">
		<div class="color-overlay"></div>
	    <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div>
	    <div class="container "style="padding-top: 1rem;padding-bottom:3rem;padding-right:15px;padding-left:15px">
		    <h1 style="color:#2c663e" class="page-heading single-col-max mx-auto  position-relative "><?php echo $head; ?></h1>
		    <div  style="color:#d65a34"class="page-intro single-col-max mx-auto position-relative "><?php echo $subhead; ?></div>
			<div class="d-block mx-auto" style="padding-top: 3rem;padding-bottom:1rem">
			<div class="w-100">
			<header class="section-header">
			<h3 class="mb-5 green-text" style="font-size: 22px;" >SUB LAYANAN</h3>
			</header>
				<div class="row justify-content-center ">
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
					<!--// quepal  sub-lay w-100 box-shadow-dark-->
					
					<div class="col-lg-4 col-md-4 ">
						<div class="bg-note menu animated fadeInLeft d-flex align-items-center " style="height:65px;cursor: pointer;margin:4px " data-eks="<?php echo $eks; ?>" data-link="<?php echo $link; ?>">
							<!--<img alt="" width="50" height="50" src="<?php echo base_url(); ?>assets\images\menu_icons\v3\<?php echo $row->layananImg; ?>" alt="<?php echo $row->layananJenis; ?>">-->
							<!--<div class=""></div>-->
							<span class="" style="margin-left:3.5rem;text-align:left;padding-right:45px;font-size:13px">
							    <font style="text-transform:capitalize;font-weight:border"><?php echo $row->layananJenis; ?></font>
							    </span>
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




