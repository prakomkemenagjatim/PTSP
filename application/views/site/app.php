<!DOCTYPE html>
<html lang="zxx">

<head lang="id">
<title>SANTUN V2 </title>
<meta name="author" content="MAHFUD DUWI SAPUTRO" />
<meta name="email" content="mahfudds@gmail.com" />
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="com.websantun.ngawi">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/icons/icon-512x512.png">
<meta name="theme-color" content="#4caf50">
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="Santun V2">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Santun V2">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="Googlebot" content="noindex" />
<meta name="description" content="Pusaka">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="manifest" href="<?php echo base_url('assets/manifest.json')?>">
<link rel="shortcut icon" href="<?php echo base_url('assets/images/santunkecil.ico'); ?>" type="image/png">
<link rel="icon" sizes="192x192" href="images/icon-192x192.png">
<link rel="apple-touch-icon" href="images/icon-192x192.png">
<link href="<?php echo base_url('assets/css/select2.css'); ?>" rel="stylesheet" /> 
<link rel="stylesheet" href="<?php echo base_url('assets/css/swiper-bundle.min.css?q=1'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.min.css?q=1'); ?>">

<script type="text/javascript">
   
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('<?php echo base_url('assets/pwabuilder-sw.js')?>', {
            scope: '.'
        }).then(function (registration) {
            
            console.log('PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            
            console.log('PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>
    <style>
        .product-gallery-details {
            padding: 20px 20px;
        }

        .product-gallery-details p {
            margin-bottom: 20px;
        }

        .user-event-area,
        .user-event-area .user-event--merging {
            gap: 45px;
        }

        .horizontal-line {
            display: flex;
            align-items: center;
            text-align: center;
            color: #999;
        }

        .horizontal-line::before,
        .horizontal-line::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #999;
        }

        .horizontal-line::before {
            margin-right: 1em;
        }

        .horizontal-line::after {
            margin-left: 1em;
        }
    </style>

    
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0E1X3YLY3E%22%3E"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-0E1X3YLY3E');
    </script>

</head>

<style>
    .background_keagamaan {
        background: linear-gradient(180deg, #4caf50 0%, #c8efca 70%);
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    @media (max-width: 767px) {
    .text-tabs-top {
        display: inline-block !important; /* Ensure the text is always shown on mobile */
    }

    .catagories-nav-2 a {
        display: flex;
        align-items: center;
    }

    .catagories-nav-2 svg {
        margin-right: 5px; /* Adjust spacing between icon and text */
    }
}

</style>

<body class="background_keagamaan">

    <main class="main-wrapper">

        <div class="container">

            
            <div class="tabs-navbar-top">
    <div class="catagories-area">
        <div class="catagories-nav-2">
            
            <div style="display: flex;flex-wrap: wrap; justify-content: center;">
                
                <div class="($title=='home_keagamaan') ? tabs-menu-top-active : tabs-menu-top ">
                    <a href="https://ptsp.kemenagngawi.or.id/" aria-label="keagamaan"
                        class=" btn-active ">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.5625 1.31249C5.84281 1.31249 5.25 1.9053 5.25 2.62499L5.257 2.55324L4.82606 5.13887L3.99919 7.40162C3.98344 7.42218 3.96462 7.43749 3.9375 7.43749H3.5V6.99999H1.3125V12.6875H3.5V11.375H5.21762C5.93687 11.375 6.58481 11.0263 7 10.4847C7.41563 11.0263 8.06312 11.375 8.78237 11.375H10.5V12.6875H12.6875V6.99999H10.5V7.43749H10.0625C10.0349 7.43749 10.0166 7.42218 10.0013 7.40162L9.17394 5.13887L8.743 2.55324L8.75 2.62499C8.75 1.9053 8.15719 1.31249 7.4375 1.31249C7.28875 1.31249 7.1365 1.34137 7 1.4118C6.86408 1.34454 6.71414 1.3105 6.5625 1.31249ZM6.54719 2.19449C6.55594 2.25749 6.5625 2.40099 6.5625 2.62499V9.37912C6.50519 9.69392 6.33914 9.9786 6.09334 10.1835C5.84754 10.3883 5.5376 10.5003 5.21762 10.5H3.5V8.31249H3.9375C4.10673 8.31224 4.27288 8.26718 4.41904 8.18188C4.56521 8.09658 4.68617 7.97409 4.76963 7.82687L4.78713 7.79449L5.67394 5.36112L6.125 2.66087V2.62499C6.125 2.38437 6.30963 2.2028 6.54719 2.19449ZM7.45281 2.19449C7.69037 2.20324 7.875 2.38393 7.875 2.62499V2.66087L8.32606 5.36112L9.21331 7.79449L9.23037 7.8273C9.31392 7.97441 9.43492 8.09679 9.58107 8.18201C9.72722 8.26723 9.89332 8.31224 10.0625 8.31249H10.5V10.5H8.78237C8.46234 10.5003 8.15235 10.3882 7.90654 10.1833C7.66073 9.97834 7.49472 9.69356 7.4375 9.37868V2.62499C7.4375 2.40099 7.4445 2.25749 7.45281 2.19449ZM2.1875 7.87499H2.625V11.8125H2.1875V7.87499ZM11.375 7.87499H11.8125V11.8125H11.375V7.87499Z"
                                fill=" #171717 " />
                        </svg>&nbsp;

                        <span class="text-tabs-top" >Layanan </span>

                    </a>
                </div>
                <div class="($title=='home_keagamaan') ? tabs-menu-top-active : tabs-menu-top ">
                    <a href="../../index.php/kua" aria-label="KUA"
                        class=" btn-active ">

                        <svg width="14" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>&nbsp;


                        <span class="text-tabs-top" >KUA </span>
                    </a>
                </div>
               
                <div class="($title=='home_internal') ? tabs-menu-top-active : tabs-menu-top ">
                    <a href="https://ptsp.kemenagngawi.or.id/dashboard/index.php/login" aria-label="internal"
                        class=" btn ">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.0833 2.5H8.33333V1.91667C8.33333 1.60725 8.21041 1.3105 7.99162 1.09171C7.77283 0.872916 7.47608 0.75 7.16666 0.75H4.83333C4.52391 0.75 4.22717 0.872916 4.00837 1.09171C3.78958 1.3105 3.66666 1.60725 3.66666 1.91667V2.5H1.91666C1.45254 2.5 1.00742 2.68437 0.679227 3.01256C0.351039 3.34075 0.166664 3.78587 0.166664 4.25V9.5C0.166664 9.96413 0.351039 10.4092 0.679227 10.7374C1.00742 11.0656 1.45254 11.25 1.91666 11.25H10.0833C10.5475 11.25 10.9926 11.0656 11.3208 10.7374C11.649 10.4092 11.8333 9.96413 11.8333 9.5V4.25C11.8333 3.78587 11.649 3.34075 11.3208 3.01256C10.9926 2.68437 10.5475 2.5 10.0833 2.5ZM4.83333 1.91667H7.16666V2.5H4.83333V1.91667ZM10.6667 9.5C10.6667 9.65471 10.6052 9.80308 10.4958 9.91248C10.3864 10.0219 10.238 10.0833 10.0833 10.0833H1.91666C1.76195 10.0833 1.61358 10.0219 1.50419 9.91248C1.39479 9.80308 1.33333 9.65471 1.33333 9.5V6.2275L4.06333 7.16667C4.12527 7.17507 4.18806 7.17507 4.25 7.16667H7.75C7.81326 7.1655 7.87606 7.15568 7.93666 7.1375L10.6667 6.2275V9.5ZM10.6667 4.99667L7.65666 6H4.34333L1.33333 4.99667V4.25C1.33333 4.09529 1.39479 3.94692 1.50419 3.83752C1.61358 3.72812 1.76195 3.66667 1.91666 3.66667H10.0833C10.238 3.66667 10.3864 3.72812 10.4958 3.83752C10.6052 3.94692 10.6667 4.09529 10.6667 4.25V4.99667Z"
                                fill=" #2C2C2C " />
                        </svg>&nbsp;
                        <span class="text-tabs-top"> Login </span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
            

            
            <div class="hero-section section-gap-top-50 ph-15px"
                style="padding-top:170px;background-image: url('<?php echo base_url('assets/images/atas3.png'); ?>');background-repeat: no-repeat; /* Prevent horizontal repetition */
  background-size: 100% auto; /* Set width to 390px and height to auto */
  background-position: top; ">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="hero-area hero-area--style-2 hero-slider-active">
                            
                            <div class="swiper2">
                                
                                <div class="swiper-wrapper wr-banner">
                                                                        
                                    <div class="swiper-slide">
                                         <div class="hero-singel-slide">
                                            <img class="img-full" src="<?php echo base_url('assets/images/b.png'); ?>"
                                                alt="/path_banner/path_banner_20230404090752.webp" class="lazyload"
                                                style="width: 100%; height: auto;">
                                        </div>
                                    </div>
                                     <div class="swiper-slide">
                                         <div class="hero-singel-slide">
                                            <img class="img-full" src="<?php echo base_url('assets/images/a.png'); ?>"
                                                alt="/path_banner/path_banner_20230404090752.webp" class="lazyload"
                                                style="width: 100%; height: auto;">
                                        </div>
                                    </div>                                    
                                  
                            </div>

                        </div>
                        
                    </div>
                </div>
            </div>
            

            <div class="ph-15px">
                <div class="product-gallery-details">
                    
                       <!--<select style="width:100%" class="js-example-basic-single" name="state">-->
                       <!--   <option value="AL">Alabama</option>-->
                       <!--     ...-->
                       <!--   <option value="WY">Wyoming</option>-->
                       <!-- </select>-->
                        <form class="search-form w-100 text-left">
                        	<select  style="width:100%" class="js-example-basic-single" name="state">
                        	    <option value="#">Silahkan Cari Layanan</option>
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
													$link = base_url("index.php/layananv2/").$row->menuSlug.'/'.$row->layananView;
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

            
            <div class="ph-15px section-title-menu">
                <div class="title">Layanan Terpadu</div>
            </div>

            <div class="ph-15px">
                <div class="product-gallery-details">
                    <div class="catagories-nav-3">
                        
                       
                       <?php 
								foreach ($qry as $row) {
								$link = base_url('index.php/halaman/').$row->menuSlug;
								$eks = 0;
								if ($row->menuHref != '' || $row->menuHref != null ){
									$link = $row->menuHref;
									$eks = 1;
								} else {
									if ($row->menuData == 1){
										$link = base_url('index.php/data/').$row->menuSlug;
									} else if ($row->menuData == 2){
										$link = base_url('index.php/layananv2/').$row->menuSlug;
									} 
								}
							?>
							<a href="<?php echo $link; ?>"
                            align="center">
                            <img src="<?php echo base_url(); ?>assets\images\menu_icons\v3\<?php echo $row->menuImg; ?>"
                                alt="" style="width: 62px; height: 62px">
                            <div class="text"><?php echo $row->menuJudul; ?></div>
                        </a>
                       
                       	<?php } ?>
                    </div>
            
                </div>
            </div>
            
            <div class="ph-15px section-title-menu">
                <div class="title">Aplikasi</div>
            </div>

            <div class="ph-15px">
                <div class="product-gallery-details">
                    <div class="catagories-nav-3">
                        <a href="https://srikandi.arsip.go.id/auth/login"
                            align="center">
                            <img src="<?php echo base_url('assets/images/srikandi.png'); ?>"
                                alt="" style="width: 62px; height: 62px">
                            <div class="text">Srikandi</div>
                        </a>
                        <a href="https://kinerja.bkn.go.id/login"
                            align="center">
                            <img src="<?php echo base_url('assets/images/kinerja.png'); ?>"
                                alt="" style="width: 62px; height: 62px">
                            <div class="text">E Kinerja</div>
                        </a>
                        <a href="https://simpeg5.kemenag.go.id/"
                            align="center">
                            <img src="<?php echo base_url('assets/images/simpeg.png'); ?>"
                                alt="" style="width: 62px; height: 62px">
                            <div class="text">Simpeg 5</div>
                        </a>
                         <a href="https://absensi.kemenag.go.id/"
                            align="center">
                            <img src="<?php echo base_url('assets/images/schedule.png'); ?>"
                                alt="" style="width: 62px; height: 62px">
                            <div class="text">Absensi Kemenag</div>
                        </a>
                        <a href="https://pusaka.kemenag.go.id/home"
                            align="center">
                            <img src="<?php echo base_url('assets/images/pusaka.png'); ?>"
                                alt="" style="width: 80px; height: 107px">
                            <!--<div class="text">Pusaka</div>-->
                        </a>
                        <a href="https://tte.kemenag.go.id/login"
                            align="center">
                            <img src="<?php echo base_url('assets/images/tte.png'); ?>"
                                alt="" style="width: 80px; height: 80px">
                            <div class="text">T T E</div>
                        </a>
                         <!-- <a href="https://triharakah.hdngawi.my.id/"
                            align="center">
                            <img src="https://triharakah.hdngawi.my.id/public/harakah/images/triharakah.png"
                                alt="" style="width: 62px; height: 62px">
                            <div class="text">TRI HARAKAH</div>
                        </a> -->
                    </div>
                </div>
            </div>
            

            <div class="ph-15px section-title-menu">
                <div class="title">Madrasah Digital</div>
                
            </div>

            <div class="ph-15px">
                <div class="product-gallery-details">
                    <div class="catagories-nav-3 category-man">
                        <!-- <a href="https://ceria.manngawi.sch.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/man1.png'); ?>" 
                                alt="">
                            <div class="text">MAN 1</div>
                        </a>
                        
                        <a href="https://mawida.kemenagngawi.or.id" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/man2.png'); ?>" 
                                alt="">
                            <div class="text">MAN 2</div>
                        </a> -->
                        
                         <a href="https://www.man3ngawi.sch.id" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/man3.png'); ?>" 
                                alt="">
                            <div class="text">MAN 3</div>
                        </a>
                        <a href="https://jibas.man4ngawi.sch.id" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/man4.png'); ?>" 
                                alt="">
                            <div class="text">MAN 4</div>
                        </a>
                        
                    </div>
                    <hr>
                     <div class="catagories-nav-3 category-mtsn">

                          <a href="https://mtsn1ngawi.sch.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/mtsn1.png'); ?>" 
                                alt="">
                            <div class="text">MTSN 1</div>
                        </a>

                        <a href="https://mtsn2.kemenagngawi.or.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/mtsn2.png'); ?>" 
                                alt="">
                            <div class="text">MTSN 2</div>
                        </a>
                        
                        <a href="https://mtsn3.kemenagngawi.or.id" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/md.png'); ?>" 
                                alt="">
                            <div class="text">MTSN 3</div>
                        </a>
                        
                         <a href="https://jibas.mtsn4ngawi.sch.id" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/mtsn4.png'); ?>" 
                                alt="">
                            <div class="text">MTSN 4</div>
                        </a>
                        <a href="https://portal.mtsn5ngawi.sch.id" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/mtsn5.png'); ?>" 
                                alt="">
                            <div class="text">MTSN 5</div>
                        </a>
                         <!-- <a href="https://jibas.mtsn6ngawi.sch.id" align="center">
                            <img style="height:70px;width:90px" src="<?php echo base_url('assets/images/mtsn6.png'); ?>" 
                                alt="">
                            <div class="text">MTSN 6</div>
                        </a> -->
                        

                         <a href="https://mtsn7.kemenagngawi.or.id" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/mtsn7.png'); ?>" 
                                alt="">
                            <div class="text">MTSN 7</div>
                        </a>

                         <a href="https://mtsn8.kemenagngawi.or.id" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/mtsn8.png'); ?>" 
                                alt="">
                            <div class="text">MTSN 8</div>
                        </a>
                        <a href="https://mtsn9.kemenagngawi.or.id" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/mtsn9.png'); ?>" 
                                alt="">
                            <div class="text">MTSN 9</div>
                        </a>
                       
                        <a href="https://mtsn10ngawi.sch.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/mtsn10.png'); ?>" 
                                alt="">
                            <div class="text">MTSN 10</div>
                        </a>
                        <a href="https://portaldigital.mtsn11ngawi.my.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/mtsn11.png'); ?>" 
                                alt="">
                            <div class="text">MTSN 11</div>
                        </a>



                        <a href="https://portal.mtsn12ngawi.sch.id" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/mtsn12.png'); ?>" 
                                alt="">
                            <div class="text">MTSN 12</div>
                        </a>


                         <a href="https://portal.mtsn13ngawi.sch.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/mtsn13.png'); ?>" 
                                alt="">
                            <div class="text">MTSN 13</div>
                        </a>
                    </div>
                    <hr>
                     <div class="catagories-nav-3 category-mtsn">
                        <a href="https://portal.min1ngawi.sch.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/min1.png'); ?>" 
                                alt="">
                            <div class="text">MIN 1</div>
                        </a>
                        <a href="https://min2.kemenagngawi.or.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/min2.png'); ?>" 
                                alt="">
                            <div class="text">MIN 2</div>
                        </a>
                         <a href="https://min3.kemenagngawi.or.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/min3.png'); ?>" 
                                alt="">
                            <div class="text">MIN 3</div>
                        </a>
                         <a href="https://min4.kemenagngawi.or.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/min4.png'); ?>" 
                                alt="">
                            <div class="text">MIN 4</div>
                        </a>
                        <a href="https://min5.kemenagngawi.or.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/min5.png'); ?>" 
                                alt="">
                            <div class="text">MIN 5</div>
                        </a>
                         <a href="https://min6.kemenagngawi.or.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/min6.png'); ?>" 
                                alt="">
                            <div class="text">MIN 6</div>
                        </a>
                         <a href="https://min8.kemenagngawi.or.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/min8.png'); ?>" 
                                alt="">
                            <div class="text">MIN 8</div>
                        </a>
                        <a href="https://min9.kemenagngawi.or.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/min9.png'); ?>" 
                                alt="">
                            <div class="text">MIN 9</div>
                        </a>
                         <a href="https://min11.kemenagngawi.or.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/min11.png'); ?>" 
                                alt="">
                            <div class="text">MIN 11</div>
                        </a>
                         <a href="https://min14.kemenagngawi.or.id/" align="center">
                            <img style="height:70px;width:70px" src="<?php echo base_url('assets/images/min14.png'); ?>" 
                                alt="">
                            <div class="text">MIN 14</div>
                        </a>
                        

                    </div>
                   
                </div>
                <br><br>
            </div>

    </main>
<!-- iziToast -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/iziToast.min.css'); ?>">

<!-- FontAwesome -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/all.min.css'); ?>">

<!-- FontAwesome Animation -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome-animation.min.css'); ?>">

<!-- Lato Font -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/Lato.css'); ?>">

<!-- Amiri Font -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/Amiri.css'); ?>">

<!-- ion.rangeSlider -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/ion.rangeSlider.min.css'); ?>">

<style>
    .swal-modal {
        background-color: rgba(63, 255, 106, 0.69);
        border-radius: 10px;
    }
</style>









<!-- Swiper -->
<script src="<?php echo base_url('assets/js/swiper-bundle.min.js'); ?>"></script>

<!-- App.js -->
<script src="<?php echo base_url('assets/js/app.js'); ?>"></script>

<!-- ion.rangeSlider -->
<script src="<?php echo base_url('assets/js/ion.rangeSlider.min.js'); ?>"></script>

<!-- iziToast -->
<script src="<?php echo base_url('assets/js/iziToast.min.js'); ?>"></script>

<!-- FontAwesome -->
<script src="<?php echo base_url('assets/js/all.min.js'); ?>"></script>

<!-- lazysizes -->
<script src="<?php echo base_url('assets/js/lazysizes.min.js'); ?>"></script>

<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/js/sweetalert2@11.js'); ?>"></script>

<!-- jQuery Cookie -->
<script src="<?php echo base_url('assets/js/jquery.cookie.min.js'); ?>"></script>

<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery-3.7.1.js'); ?>"></script>

<!-- Select2 -->
<script src="<?php echo base_url('assets/js/select2.min.js'); ?>"></script>




<script>
    $(document).ready(function() {
         $('.js-example-basic-single').select2();
        
$(".js-example-basic-single").select2({
      containerCss : {"display":"block"}
});
        $("#preloader").delay(100).fadeOut("slow");
        $("#status").fadeOut();

        $("a").click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            if (url == "#") {
                return window.location.href = url;
            }

            $("#preloader").show();
            $("#status").show();

            window.location.href = url

            setTimeout(function() {
                $("#preloader").fadeOut("slow");
            }, 8000)
        })
    });

    function filterFunction(that, event) {
        let container, input, filter, li, input_val;
        container = $(that).closest(".searchable");
        input_val = container.find("input").val().toUpperCase();
        if (["ArrowDown", "ArrowUp", "Enter"].indexOf(event.key) != -1) {
            keyControl(event, container);
        } else {
            li = container.find("ul li");
            li.each(function(i, obj) {
                if ($(this).text().toUpperCase().indexOf(input_val) > -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            container.find("ul li").removeClass("selected");
            setTimeout(function() {
                container.find("ul li:visible").first().addClass("selected");
            }, 100);
        }
    }

    function keyControl(e, container) {
        if (e.key == "ArrowDown") {
            if (container.find("ul li").hasClass("selected")) {
                if (
                    container
                    .find("ul li:visible")
                    .index(container.find("ul li.selected")) +
                    1 <
                    container.find("ul li:visible").length
                ) {
                    container
                        .find("ul li.selected")
                        .removeClass("selected")
                        .nextAll()
                        .not('[style*="display: none"]')
                        .first()
                        .addClass("selected");
                }
            } else {
                container.find("ul li:first-child").addClass("selected");
            }
        } else if (e.key == "ArrowUp") {
            if (
                container.find("ul li:visible").index(container.find("ul li.selected")) >
                0
            ) {
                container
                    .find("ul li.selected")
                    .removeClass("selected")
                    .prevAll()
                    .not('[style*="display: none"]')
                    .first()
                    .addClass("selected");
            }
        } else if (e.key == "Enter") {
            container.find("input").val(container.find("ul li.selected").text()).blur();
            onSelect(container.find("ul li.selected").text());
        }
    }

    function onSelect(val) {}
    $(".searchable input").focus(function() {
        $(this).closest(".searchable").find("ul").show();
        $(this).closest(".searchable").find("ul li").show();
        $('.submit__btn').css({
            "display": "block"
        })
        $('.close__btn').css({
            "display": "block"
        })
        $('.search__btn').css({
            'display': "none"
        })
    });
    $(".searchable input").blur(function() {
        let that = this;
        setTimeout(function() {
            $(that).closest(".searchable").find("ul").hide();
            $('.search__btn').css({
                'display': "block"
            })
            $('.submit__btn').css({
                "display": "none"
            })
            $('.close__btn').css({
                "display": "none"
            })
        }, 300);
    });
    $('.search__btn').on("click", function() {
        $(this).closest(".searchable").find("input").val($(this).text()).blur();
        onSelect($(this).text());
    });
    $(document).on("click", ".searchable ul li", function() {
        $(this).closest(".searchable").find("input").val($(this).text()).blur();
        onSelect($(this).text());
    });
    $(".searchable ul li").hover(function() {
        $(this).closest(".searchable").find("ul li.selected").removeClass("selected");
        $(this).addClass("selected");
    });
    $('.close__btn').on('click', function() {
        $('.searchable').find("input").val($(this).text()).blur();
        $(this).css({
            "display": "none"
        })
    })

    function notification_success_with_confirm(message = null, route = null) {
        iziToast.question({
            message: message,
            displayMode: 'once',
            close: false,
            timeout: 9999999,
            progressBar: false,
            position: 'topCenter',
            buttons: [
                ['<button><b>Ya</b></button>', function(instance, toast) {

                    instance.hide({
                        transitionOut: 'fadeOut'
                    }, toast, 'button');

                    window.location.href = route

                }, true],
                ['<button>Tidak</button>', function(instance, toast) {

                    instance.hide({
                        transitionOut: 'fadeOut'
                    }, toast, 'button');

                }],
            ]
        });
    }

    function notification_success(message = null) {
        iziToast.success({
            title: 'Success',
            message: message,
            position: 'topCenter',
        });
    }

    function notification_error(message = null) {
        iziToast.error({
            title: 'Error',
            message: message,
            position: 'topCenter',
        });
    }

    function open_modal(selector = null, func = null, modal = null){
        if (func) {
            func($(selector));
        }

        if (modal) {
            $(modal).addClass('show');
        } else {
            $('#' + $(selector).attr('data-modal')).addClass('show');
        }
    }

    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() == 0) {
                $(".tabs-navbar-top").css({
                    "background-color": "transparent"
                });
            } else if ($(window).scrollTop() > 80) {
                                    $(".tabs-navbar-top").css({
                        "background-color": "#4caf50"
                    });
                            } else {
                $(".tabs-navbar-top").css({
                    "background-color": "transparent"
                });
            }
        })
    })

    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() == 0) {
                $(".navbar-top").css({
                    "background-color": "transparent"
                });
            } else if ($(window).scrollTop() > 80) {
                $(".navbar-top").css({
                    "background-color": "#55DBC5"
                });
            } else {
                $(".navbar-top").css({
                    "background-color": "transparent"
                });
            }
    
        })
    })
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"
    integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
 
    <script>
    $(function() {
        $('.js-example-basic-single').on('change', function () {
            var selectedOption = $(this).val();
            if(selectedOption) {
                window.open(selectedOption, '_self');
            }
        });
    });
    $(function() {
            $('.shimmer').show();
            setTimeout(loadajax(), 200);
        });

        new Swiper(".hero-slider-active .swiper2", {
            slidesPerView: 1,
            speed: 1500,
            watchSlidesProgress: true,
            loop: true,
            spaceBetween: 10,
            autoplay: true,
            autoplay: {
                delay: 3000,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
</script>

</body>

</html>