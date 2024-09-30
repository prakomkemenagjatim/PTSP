 <style>
  #searchBox {
    width: 100%;
    height: 40px;
    padding: 10px;
    border-radius: 54px !important;
    border: 1px solid #dfe1e5;
    box-shadow: 0 1px 6px rgba(32, 33, 36, 0.28);
    font-size: 16px;
    transition: box-shadow 0.3s ease-in-out;
}

#searchBox:focus {
    outline: none;
    box-shadow: 0 1px 6px rgba(32, 33, 36, 0.56);
}

.js-example-basic-single {
    width: 100% !important;
    height: 100px !important;
    appearance: none;
    background: #fff url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 20 20'><polygon points='0,0 20,0 10,10' fill='%23a6a6a6'/></svg>") no-repeat right 10px center;
    background-size: 12px;
}

.js-example-basic-single option {
    padding: 10px;
}

 </style>
 <main id="main">

    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

      <img src="<?php echo base_url('assets/ld/img/bgkua3.png'); ?>" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-10" style="color:#277547">
            <h2 style="color:#277547" data-aos="fade-up" data-aos-delay="100">Selamat datang di KUA Keren</h2>
            <p style="color:#000" data-aos="fade-up" style="font-size:1.2rem" data-aos-delay="200">Layanan Digital Terpadu Satu Pintu KUA Kementerian Agama Kabupaten Ngawi <br>Silahkan pilih Layanan KUA pada kolom dibawah ini</p>
          </div>
          <div class="col-lg-5">
            <form class="search-form w-100 text-left">
                	<select id="searchBox"  style="width:100%;height:100px;" class="js-example-basic-single" name="state" placeholder="Silahkan Cari Layanan">
                        <option value="#"> </option>
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
      </div>

    </section><!-- End Hero Section -->


   
<section id="call-to-action" class="call-to-action">
      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Visi Kemanag Ngawi</h3>
              <p>Terwujudnya masyarakat yang taat beragama, maju, sejahtera, cerdas, dan saling menghormati antar pemeluk agama dalam rangka mewujudkan manusia Indonesia yang berdaulat, mandiri, dan berkepribadian berdasarkan gotong royong.</p>
              <a class="cta-btn" href="https://kemenagngawi.or.id/tentang-kami">Tentang Kami</a>
            </div>
          </div>
        </div>
      </div>
</section>
<!-- End Call-to-action Section -->
    
<section id="mapkua" class="">
<div id="map" class="">
</div>
</section><!-- End Call-to-action Section -->
    
    
<section id="layanan" class="faq section-bg">
 <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title">

          <h2>Daftar Layanan</h2>


          <p>Daftar layanan PTSP pada KUA Kecamatan se-Kabupaten Ngawi dan persyaratan yang diperlukan untuk masing-masing layanan : </p>
        </div>
        <div class="accordion" id="accordionExample">
          <?php 
            foreach ($layanankua as $rowlayanan) {
              // Split the 'syarat' content into an array by new lines
              $syarat_items = explode("\n", $rowlayanan->syarat);
          ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?php echo $rowlayanan->no; ?>">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $rowlayanan->no; ?>" aria-controls="collapse<?php echo $rowlayanan->no; ?>">
                <?php echo $rowlayanan->jenis_layanan; ?>
              </button>
            </h2>
              <div id="collapse<?php echo $rowlayanan->no; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $rowlayanan->no; ?>" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Persyaratan Layanan:</p>
                
                    <?php 
                      // Loop through each line and create a list item
                      foreach ($syarat_items as $item) {
                        // Trim whitespace from the beginning and end of each line
                        $item = trim($item);
                        if (!empty($item)) {
                          echo "$item</br>";
                        }
                      }
                    ?>
                </div>
              </div>
          </div>
          <?php } ?>
        </div>

</section>

    <!-- Services Section - Home Page -->
    

   
    <!-- Faq Section - Home Page -->
    <section id="services" class="services" style="background-color:#f1f1f1">

      <div class="container section-title">
      
      <h2>Aplikasi BIMAS Islam</h2>
      <p>Membimbing, melayani, memberdayakan dan mengembangkan masyarakat islam</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">
         	<div class="col-lg-6 " >
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"> <img src="<?php echo base_url(); ?>assets\images\majalah.png"
                                alt="" style="width: 82px; height: 82px"></i></div>
              <div>
                <h4 class="title"><a target="_blank" href="https://bimasislam.kemenag.go.id/site/informasi/berita" class="stretched-link">Berita</a></h4>
                <p class="description">Berita dan Informasi Direktorat Jendral Bimbingan Masyarakat Islam</p>
              </div>
            </div>
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"> <img src="<?php echo base_url(); ?>assets\images\info_masjid.png"
                                alt="" style="width: 82px; height: 82px"></i></div>
              <div>
                <h4 class="title"><a target="_blank" href="https://simas.kemenag.go.id/" class="stretched-link">Info Masjid</a></h4>
                <p class="description">Aplikasi pendafataran dan layanan masjid dan mushola</p>
              </div>
            </div>
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"> <img src="<?php echo base_url(); ?>assets\images\pustaka.png"
                                alt="" style="width: 82px; height: 82px"></i></div>
              <div>
                <h4 class="title"><a target="_blank" href="https://simbi.kemenag.go.id/eliterasi/" class="stretched-link">Pustaka Digital</a></h4>
                <p class="description">Tempat pengetahuan Islam berkumpul dalam sebuah platform digital Elektronik Literasi Pustaka Keagamaan Islam (ELIPSKI) yang menginspirasi.</p>
              </div>
            </div>
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"> <img src="<?php echo base_url(); ?>assets\images\dakwah_islam.png"
                                alt="" style="width: 82px; height: 82px"></i></div>
              <div>
                <h4 class="title"><a target="_blank" href="https://simbi.kemenag.go.id/emtq/" class="stretched-link">Aplikasi e-MTQ Nasional</a></h4>
                <p class="description">Pendaftaran Dewan Hakim / Peserta,e-Maqra, e-Scoring, Live Score</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 " >
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"> <img src="<?php echo base_url(); ?>assets\images\info_nikah.png"
                                alt="" style="width: 82px; height: 82px"></i></div>
              <div>
                <h4 class="title"><a href="https://simkah4.kemenag.go.id/" class="stretched-link" target="_blank">Simkah</a></h4>
                <p class="description">Aplikasi Resmi untuk pendaftaran dan informasi terkait pernikahan</p>
              </div>
            </div>
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"> <img src="<?php echo base_url(); ?>assets\images\info_shalat.png"
                                alt="" style="width: 82px; height: 82px"></i></div>
              <div>
                <h4 class="title"><a href="https://bimasislam.kemenag.go.id/jadwalshalat" class="stretched-link" target="_blank">Jadwal Sholat</a></h4>
                <p class="description">Aplikasi untuk mendapatkan jadwal sholat secara lengkap</p>
              </div>
            </div>
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"> <img src="<?php echo base_url(); ?>assets\images\zakat.png"
                                alt="" style="width: 82px; height: 82px"></i></div>
              <div>
                <h4 class="title"><a href="https://baznas.go.id/kalkulatorzakat/" class="stretched-link" target="_blank">Kalkulator Zakat</a></h4>
                <p class="description">Kalkulator zakat adalah layanan untuk mempermudah perhitungan jumlah zakat yang harus ditunaikan oleh setiap umat muslim sesuai ketetapan syariah.</p>
              </div>
            </div>
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"> <img src="<?php echo base_url(); ?>assets\images\info_wakaf.png"
                                alt="" style="width: 82px; height: 82px"></i></div>
              <div>
                <h4 class="title"><a href="https://siwak.kemenag.go.id/" class="stretched-link" target="_blank">Info Wakaf</a></h4>
                <p class="description">Sistem Informasi Wakaf Kementerian Agama</p>
              </div>
            </div>
            
          </div>
          <!-- End Service Item -->
        </div>
       
      </div>

    </section><!-- End Faq Section -->

    <!-- Team Section - Home Page -->
   

    <!-- Call-to-action Section - Home Page -->




    <!-- Contact Section - Home Page -->
    <section id="contact" class="contact">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Buku Tamu</h2>
        <p>Silahkan isikan pesan, saran atau kritik pada form dibawah ini</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Alamat</h3>
                  <p>Jl. Raden Ajeng Kartini No.15, Kerek, Margomulyo, Kec. Ngawi, Kabupaten Ngawi, Jawa Timur 63217</p>
                
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Hubungi Kami</h3>
                  <p>0851-8680-0150</p><br>
                  <p>&nbsp</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Kami</h3>
                  <p>humaskemenagngawi@gmail.com</p><br>
                  
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Jam Pelayanan</h3>
                  <p>Senin - Jumat</p>
                  <p>8:00AM - 15:00PM</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-6">
           
            <div class="form-group">
                <label>Nama Lengkap <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control bttxt" id="bt_nama"  name="bt_nama" placeholder="Masukkan nama lengkap">
              </div>
              <div class="form-group">
                <label>Alamat Lengkap <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control bttxt" id="bt_alamat" name="bt_alamat" aria-describedby="bt_alamatHelp" placeholder="Masukkan alamat lengkap">
                
              </div>
              <div class="form-group">
                <label>No.HP/No.WA <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control bttxt" id="bt_hp" name="bt_hp" aria-describedby="bt_hpHelp" placeholder="Masukkan nomor HP/nomor whatsapp">
                
              </div>
              <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control bttxt" id="bt_email" name="bt_email" aria-describedby="bt_emailHelp" placeholder="Masukkan nama email">
                
              </div>
							<div class="form-group">
								<label for="bt_layanan" class="control-label">Layanan yang diterima <sup class="text-danger">*</sup></label>
								<select id="bt_layanan" name="bt_layanan" class="form-control select2 bttxt" required style="padding: .375rem .75rem;">
									<option value="">- Pilih layanan diterima -</option>	
                  <?php echo optionLayananbukutamu(); ?>		
								</select>
							</div>
              <div class="form-group" id="glayananlain" style="display: none;">
                <label>Layanan Lainnya <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control bttxt" id="bt_layananlain" name="bt_layananlain" aria-describedby="bt_layananlainHelp" placeholder="Masukkan layanan lainnya">
                
              </div>
              <div class="form-group mohoncatat">
                  <label>Pesan</label>
                  <textarea type="text" class="form-control bttxt" id="bt_pesan"  name="bt_pesan" placeholder="Masukkan Pesan"></textarea>
              </div>
              <div class="form-group">
                 <small class="form-text text-muted"><sup class="text-danger">*</sup> Wajib diisi.</small>
              </div>
            <button class='btn btn-lg btn-success simpanbukutamu' type='button'>Kirim</button>
           
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main>