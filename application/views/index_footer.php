<footer class="" style="background-color: #4caf50;position: fixed;
   bottom: 0;width:100%;height:50px;padding-top:5px" style="">

	    <div class="footer-bottom text-center ">
        
        <div class="row justify-content-center " >
            <img class="logo-footer float-left" src="<?php echo base_url('assets/images/logo-kemenag.png')?>" alt="kemenag" style="width: 55px;
padding-right: 10px;margin-right: 15px;border-right: 2px solid rgb(129, 199, 132);;" >
            <small class="copyright white-text float-left text-left" style="font-size:11px"><?php echo kantorapp();?><br /> <?php echo alamatapp();?></small>
        </div>
        <small class="copyright green-text" ><?php echo footerapp();?> </small>
	    </div>
        <!-- <button class='btn btn-success bg-secondary fixed-bottom mb-3 mr-2' style="left: unset;" data-target='#mdrating' data-toggle='modal' data-backdrop="static" data-keyboard="false" type='button'>  
            <i class="fa fa-star fa-fw text-warning" aria-hidden="true"></i> Beri Rating!! <i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i>
          </button> -->
    </footer>

    <div aria-hidden='true' aria-labelledby='mdratingLabel' class='modal fade white-text' id='mdrating' role='dialog' tabindex='-1' style="z-index:3000">
  <div class='modal-dialog modal-dialog-centered rads box-shadow' role='document' >
    <div class='modal-content  bg-dark' style="border-width: 6px 0 0 0;border-color: #28a745;">
      <div class='modal-header bord-dot-b bg-secondary  text-center'>
        <h5 class='modal-title w-100 white-text' id='mdratingLabel'><strong><i class="fa fa-star fa-fw text-warning" aria-hidden="true"></i> Beri Rating!! <i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i></strong></h5>
        <button aria-label='Close' class='close' data-dismiss='modal' type='button'>
          <span aria-hidden='true'/>
        </button>
      </div>
      <div class='modal-body'>
        <div class="containerrating ">
          <div class="star-widget">
            <input type="radio" name="rate" id="rate-5" value="5">
            <label for="rate-5" class="fa fa-star"></label>
            <input type="radio" name="rate" id="rate-4" value="4">
            <label for="rate-4" class="fa fa-star"></label>
            <input type="radio" name="rate" id="rate-3" value="3">
            <label for="rate-3" class="fa fa-star"></label>
            <input type="radio" name="rate" id="rate-2" value="2">
            <label for="rate-2" class="fa fa-star"></label>
            <input type="radio" name="rate" id="rate-1" value="1">
            <label for="rate-1" class="fa fa-star"></label>
            <form action="#">
              <header></header>
              
            </form>
          </div>
          <div class="textarea textarearating">
                <textarea id="ikm_saran" class="form-control" cols="50" placeholder="Sampaikan apresiasi, saran, atau kritik yang membangun.."></textarea>
              </div>
          <div> <label id="cekrating-error" class="error" for="cekrating" style="display: none;">Penilaian belum dilakukan, silakan beri kami bintang.</label></div>
        </div>
      </div>
      <div class='modal-footer bord-dot-t bg-secondary'>
        <a href="<?php echo base_url(); ?>index.php/data/grafikikm" target="_blank" class='btn btn-warning ' type='button'>Grafik IKM</a>
        <button class='btn btn-success simpanrating' type='button'>Kirim</button>
        <button class='btn btn-secondary' data-dismiss='modal' type='button'>Tutup</button>
        
      </div>
    </div>
  </div>
</div>

<div aria-hidden='true' aria-labelledby='mdbukutamuLabel' class='modal fade text-white' id='mdbukutamu' role='dialog' tabindex='-1'>
  <div class='modal-dialog bg-dark rads box-shadow  modal-lg' role='document' >
    <div class='modal-content  bg-dark' style="border-width: 6px 0 0 0;border-color: rgb(129, 199, 132);;">
      <div class='modal-header bord-dot-b bg-secondary'>
        <h5 class='modal-title text-warning' id='mdbukutamuLabel'><strong><i class="fa fa-book fa-fw" aria-hidden="true"></i> Buku Tamu</strong></h5>
        <button aria-label='Close' class='close' data-dismiss='modal' type='button'>
          <i data-dismiss='modal' class="fa fa-times fa-fw text-white" aria-hidden="true"></i>
        </button>
      </div>
      <div class='modal-body'>

              <div class="form-group">
                <label>Nama Lengkap <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control bttxt" id="bt_nama"  name="bt_nama" placeholder="Masukkan nama lengkap">
              </div>
              <div class="form-group">
                <label>Alamat Lengkap <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control bttxt" id="bt_alamat" name="bt_alamat" aria-describedby="bt_alamatHelp" placeholder="Masukkan alamat lengkap">
                <small id="bt_alamatHelp" class="form-text text-muted">Contoh : Jl. Raden Panji Suroso No.2, Polowijen, Kec. Blimbing.</small>
              </div>
              <div class="form-group">
                <label>No.HP/No.WA <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control bttxt" id="bt_hp" name="bt_hp" aria-describedby="bt_hpHelp" placeholder="Masukkan nomor HP/nomor whatsapp">
                <small id="bt_hpHelp" class="form-text text-muted">Masukkan nomor handphone atau nomor whatsapp.</small>
              </div>
              <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control bttxt" id="bt_email" name="bt_email" aria-describedby="bt_emailHelp" placeholder="Masukkan nama email">
                <small id="bt_emailHelp" class="form-text text-muted">Masukkan nama email .</small>
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
                <small id="bt_layananlainHelp" class="form-text text-muted">Masukkan layanan lainnya.</small>
              </div>
              <div class="form-group mohoncatat">
                  <label>Pesan</label>
                  <textarea type="text" class="form-control bttxt" id="bt_pesan"  name="bt_pesan" placeholder="Masukkan Pesan"></textarea>
              </div>
              <div class="form-group mt-5">
                 <small class="form-text text-muted"><sup class="text-danger">*</sup> Wajib diisi.</small>
              </div>

      </div>
      <div class='modal-footer bord-dot-t bg-secondary'>
         
        <button class='btn btn-secondary' data-dismiss='modal' type='button'>Tutup</button>
        <button class='btn btn-success simpanbukutamu' type='button'>Kirim</button>
      </div>
    </div>
  </div>
</div>


<div aria-hidden='true' aria-labelledby='mdmaklumatLabel' class='modal fade text-white' id='mdmaklumat' role='dialog' tabindex='-1'>
  <div class='modal-dialog bg-dark rads box-shadow  modal-lg' role='document' >
    <div class='modal-content  bg-dark' style="border-width: 6px 0 0 0;border-color: rgb(129, 199, 132);;">
      <div class='modal-header bord-dot-b bg-secondary'>
        <h5 class='modal-title text-warning' id='mdmaklumatLabel'><strong><i class="fa fa-book fa-fw" aria-hidden="true"></i> Maklumat</strong></h5>
        <button aria-label='Close' class='close' data-dismiss='modal' type='button'>
          <i data-dismiss='modal' class="fa fa-times fa-fw text-white" aria-hidden="true"></i>
        </button>
      </div>
      <div class='modal-body'>
        <img src="<?php echo base_url(); ?>assets\images\maklumat.png" class="card-img-top white" alt="Maklumat PTSP">
      </div>
      <div class='modal-footer bord-dot-t bg-secondary'>
         
        <button class='btn btn-secondary' data-dismiss='modal' type='button'>Tutup</button>
      </div>
    </div>
  </div>
</div> 