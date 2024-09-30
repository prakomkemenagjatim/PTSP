 <style>
        
        .fixed-top-background {
    position: fixed;
    height: 90px;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #1d632c; /* Warna abu-abu */
    z-index: 1; /* Pastikan z-index lebih tinggi dari elemen lain untuk menempatkannya di atas */
}
.services {
    /*background-image: url('<?php echo base_url('assets/ld/img/bglayanan2.png'); ?>');*/
    background-size: cover; /* Menyebarkan gambar secara proporsional untuk mencakup seluruh area */
    background-position: center center; /* Posisikan gambar di tengah-tengah */
    background-repeat: no-repeat; /* Hindari pengulangan gambar */
    background-color: rgba(0, 0, 0, 0.2);
}
.bgputih {
    background-color: rgba(255, 255, 255, 0.9); /* Warna putih dengan opacity 0.7 */
    border-radius: 20px; /* Menerapkan border radius */
    padding: 20px;
    width: 100%;/* Atur padding sesuai kebutuhan */
    --bs-gutter-x=0 !important;
}

    </style>

<section id="services" class="services bg-secondary">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
             <br><br><br><br>
        <h2><?php echo $head; ?></h2>
        <p><?php echo $subhead; ?></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="bgputih row gy-4" style="--bs-gutter-x: 0rem !important;">
            <?php 
						foreach ($qrylayanan as $row) {
						$link = $row->layananHref;
						$eks = 0;
						if ($row->layananHref != '' || $row->layananHref != null ){
							$link = $row->layananHref;
							$eks = 1;
						} else {
							$link = base_url("index.php/layananv2/").$row->menuSlug.'/'.$row->layananView;
						}
					?>
           
							 <div class="col-lg-6 " >
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"> <img src="<?php echo base_url(); ?>assets\images\menu_icons\v3\<?php echo $row->layananImg; ?>"
                                alt="" style="width: 62px; height: 62px"></i></div>
              <div>
                <h4 class="title"><a href="<?php echo $link; ?>" class="stretched-link"><?php echo $row->layananJenis; ?></a></h4>
                
              </div>
            </div>
          </div>
                       	<?php } ?>
         
          <!-- End Service Item -->

         

        </div>

      </div>

    </section><!-- End Services Section -->