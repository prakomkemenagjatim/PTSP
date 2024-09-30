 <main id="main">

    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

      <img src="<?php echo base_url('assets/ld/img/bg9.png'); ?>" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100">Selamat datang</h2>
            <p data-aos="fade-up" style="font-size:1.2rem" data-aos-delay="200">PTSP Kementerian Agama Provinsi Jawa Timur <br>Silahkan masukan jenis layanan yang anda cari pada kolom dibawah ini</p>
          </div>
          <div class="col-lg-5">
            <form class="search-form w-100 text-left">
                        	<select  style="width:100%;height:100px;" class="js-example-basic-single" name="state" placeholder="Silahkan Cari Layanan">
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

    </section><!-- End Call-to-action Section -->

    <!-- Services Section - Home Page -->
    <section id="services" class="services">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Layanan</h2>
        <p>Dengan SANTUN (Sistem Anjungan Terintegrasi Untuk Ngawi) Kemenag Ngawi menuju Zona Integritas menuju Wilayah Bebas Korupsi (WBK) dan Wilayah Birokrasi Bersih dan Melayani (WBBM)</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
            
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
										$link = base_url('index.php/layanan/').$row->menuSlug;
									} 
								}
							?>
							 <div class="col-lg-6 " >
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"> <img src="<?php echo base_url(); ?>assets\images\menu_icons\v3\<?php echo $row->menuImg; ?>"
                                alt="" style="width: 82px; height: 82px"></i></div>
              <div>
                <h4 class="title"><a href="<?php echo $link; ?>" class="stretched-link"><?php echo $row->menuJudul; ?></a></h4>
                <p class="description"><?php echo $row->menuSubjudul; ?></p>
              </div>
            </div>
          </div>
                       	<?php } ?>
         
          <!-- End Service Item -->

         

        </div>

      </div>

    </section><!-- End Services Section -->

   
    <!-- Faq Section - Home Page -->
    <section id="faq" class="faq" style="background-color:#f1f1f1">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="content px-xl-5">
              <h3><span>Alur Pengajuan </span><strong>Layanan</strong></h3>
              <p>
               Layanan SANTUN kantor kementerian agama kabupaten ngawi dapat diakses dari halaman web berikut https://ptsp.kemenagngawi.or.id/ atau melalui aplikasi Santun dari Playstore Android <br>
               <a href='https://play.google.com/store/apps/details?id=com.santun.ngawi&hl=en&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'>
            <img style="height:6rem;width:auto;z-index:1000;position:relative" alt='Get it on Google Play' src='https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png'/>
        </a>
              </p>
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <div class="faq-container">
              <div class="faq-item faq-active">
                <h3><span class="num">1.</span> <span>Buka Aplikasi atau Halaman Santun Kemenag Ngawi</span></h3>
                <div class="faq-content">
                  <p>ntuk memulai, pengguna dapat membuka aplikasi "Santun" yang tersedia di Google Play Store untuk perangkat Android atau mengunjungi halaman web resmi Santun Kantor Kementerian Agama Kabupaten Ngawi di https://ptsp.kemenagngawi.or.id/.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">2.</span> <span>Cari jenis layanan atau pilih sesuai kategori</span></h3>
                <div class="faq-content">
                  <p>Setelah masuk ke aplikasi atau halaman web Santun, pengguna dapat mencari jenis layanan yang dibutuhkan atau memilih dari kategori yang tersedia. Layanan yang ditawarkan meliputi berbagai aspek administratif keagamaan seperti izin nikah, surat keterangan, atau layanan lainnya..</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">3.</span> <span>Isikan data yang diperlukan pada form yang tersedia</span></h3>
                <div class="faq-content">
                  <p>Setelah menemukan jenis layanan yang diinginkan, pengguna diminta untuk mengisi data yang diperlukan melalui formulir online yang disediakan</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">4.</span> <span>Pemohon mendapatkan notifikasi melalui pesan whatsapp</span></h3>
                <div class="faq-content">
                  <p>Setelah mengirimkan permohonan layanan, pemohon akan menerima notifikasi melalui pesan WhatsApp yang memberitahukan bahwa permohonan telah diterima dan sedang diproses oleh pihak terkait. Pesan WhatsApp ini juga dapat berisi informasi tambahan terkait proses selanjutnya..</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">5.</span> <span>Progres layanan yang diajukan akan selalu di infokan melalui pesan Whatsapp</span></h3>
                <div class="faq-content">
                  <p>Selama proses pengajuan layanan, pemohon akan terus mendapatkan informasi terkait progres dari permohonan tersebut melalui pesan WhatsApp. Informasi tersebut meliputi tahapan proses, perkiraan waktu penyelesaian, dan instruksi tambahan jika diperlukan</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>
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