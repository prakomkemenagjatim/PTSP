 
      
	  
    <div class="page-header  py-5 text-center position-relative bg-secondary  box-shadow-dark">
	    <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div>
	    <div class="container "style="padding-top: 3rem;padding-bottom:3rem">
	        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><?php echo $head; ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $subhead; ?></li>
  </ol>
</nav>
		    <!--<h1 class="page-heading single-col-max mx-auto white-text"><?php echo $head; ?></h1>-->
		    <!--<div class="page-intro single-col-max mx-auto text-warning"><?php echo $subhead; ?></div>-->
			<div class="d-block mx-auto" style="padding-top: 1rem;padding-bottom:3rem">
			<?php 
				$layananket = isset($layananket)?$layananket:''; 
				if ($layananket == ''){
					$dnoneket = 'd-none';
				} else {
					$dnoneket = '';
				}
			?>
			<div class="w-100">
				<form id="frmdok" action="" method="POST" enctype="multipart/form-data" >
					<div class="row justify-content-center">
						<div class='col-sm-6 text-left box-shadow-dark <?php echo $dnoneket; ?>'>
							<div class="rounded bg-layanan p-3 mt-4 mb-4">
                           
								<?php echo $layananket; ?>
							</div>
						</div>
						<div class='col-sm-6 text-left box-shadow-dark'>
							<header class="section-header mt-4">
								<h3 class="mb-1 green-text" style="font-size: 22px;" >FORM PERMOHONAN</h3>
							</header>
							<label class="control-label text-warning mt-4">Identitas Pemohon:</label>
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="nama" class="control-label text-muted">Nama Lengkap Pemohon <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="nama" name="nama" required>
								</div>    
							</div>  
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="nowa" class="control-label text-muted">Nomor WhatsApp/HP Pemohon  
									<sup class="text-danger">*</sup><br><small>( Nomor WhatsApp/HP yang dapat dihubungi, contoh: 08123456789 )</small></label>
									<input type="text" class="form-control form-text" id="nowa" name="nowa" required>
								</div>    
							</div> 
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="nomorsurat" class="control-label text-muted">NIK <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="nomorsurat" name="nomorsurat" required>
								</div>    
							</div>
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="tglsurat" class="control-label text-muted">Tanggal Permohonan <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control datepicker" id="tglsurat" name="tglsurat" required>
								</div>    
							</div>
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="instansisurat" class="control-label text-muted">Alamat <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="instansisurat" name="instansisurat" required>
								</div>    
							</div> 
							<div class='col-sm-12'>
                                <div class="form-group">
                                    <label for="tujuansurat" class="control-label text-muted">Tujuan KUA <sup class="text-danger">*</sup></label>
                                    <select class="form-control form-text" id="tujuansurat" name="tujuansurat" required>
										<option value="">Select Tujuan KUA</option>
										<?php foreach ($kua_data as $kua): ?>
											<option value="<?php echo $kua['KODE_SATKER_2']; ?>">
												<?php echo $kua['SATKER_2']; ?>
											</option>
										<?php endforeach; ?>
									</select>

                                </div>    
                            </div>

							<div class='col-sm-12'>
								<div class="form-group">
									<label for="perihalsurat" class="control-label text-muted">Keterangan </label>
									<input type="text" class="form-control form-text" id="perihalsurat" name="perihalsurat" >
								</div>    
							</div> 
							<?php
								$arrket = json_decode($ketlampiran,true);
								if (count($arrket) > 0){
									echo '<label class="control-label text-warning mt-4">Dokumen yang harus diupload:</label>';
									$i = 0;
									foreach ( $arrket as $key => $value) {
							?>
								<div class='col-sm-12'>
								<div class="form-group">
									<label for="berkas[]" class="control-label  d-block mb-0">
										<span class="green-text"><?php echo $i + 1 . '. ';?></span>
										<i class="fa fa-upload fa-fw" aria-hidden="true"></i> Upload <?php echo $value['ket']; ?>
										<?php if ($value['req'] == '1'): ?>
											<span style="color: red;">* Wajib diisi</span>
										<?php endif; ?>
									</label> 
									<label for="berkas[]" class="control-label text-muted d-block">
										<small>( Tipe file: pdf, Ukuran Maks.: <?php echo sizeupload(); ?> )</small>
									</label>
									<input type="hidden" name="berkasnm[]" value="<?php echo $value['fnm']; ?>">
									<input type="hidden" name="berkasket[]" value="<?php echo $value['ket']; ?>">
									<input type="hidden" name="berkasreq[]" value="<?php echo $value['req']; ?>">
									<input type="file" class="form-control form-text" name="berkas[]" accept=".pdf" <?php echo ($value['req'] == '1') ? 'required' : ''; ?>>
								</div>
								</div>
							<?php
										$i++;
									}
								}
							?>
						
							
							<div class="col-lg-12 col-md-12 mt-5 mb-4">  
								<button id="btnsend" class="btn btn-success btn-lg btn-block green darken-1 mb-4" style="border-radius: 40px;font-weight: normal;font-size: 16px;" onclick="simpandata();return false;">
								<span class="fa fa-paper-plane fa-fw" aria-hidden="true"></span> Kirim</button>
								<div class="rounded bg-dark2 p-3">
									<small class="text-warning">
										Jika proses permohonan berhasil, pemohon akan mendapatkan <u>NOMOR LAYANAN</u> yang akan tampil melalui dialog box dan juga dikirim melalui pesan whatsapp <i>(jika nomor HP pemohon nomor whatsapp)</i>.
									</small>
								</div>
							</div>
						</div>
					</div>
				</form>
				</div>
			 </div>
		</div>
	    </div>
    </div>   
	<script src="<?php echo base_url('assets/ld/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>                    
    <script src="<?php echo base_url('assets/leaflet.js'); ?>"></script>
<script type="text/javascript">
	$(function() {
//
	});
	function simpandata(){
		var formData = new FormData($('#frmdok')[0]);
		var el =  '#btnsend';
		buttonon(el,0);
		formData.append([csrfName], csrfHash);
		formData.append('kd', '<?php echo isset($kd)?$kd:''; ?>');
		formData.append('kd1', '<?php echo isset($kd1)?$kd1:''; ?>');
		setTimeout(function(){
			$.ajax({
					url:  "<?php echo base_url('index.php/ajax/kuakerenPost')?>",
					type: 'POST',
					data: formData,
					async: false,
					cache: false,
					contentType: false,
					processData: false,
					dataType: 'JSON',
					success: function (result) {
							if (result.success != ''){
								swal("Sukses", result.success, "success");
								$('.form-text').val('');
								$('#ambildok').val(1);
															
							} else
							if (result.error != ''){
								swal("Peringatan", result.error, "warning");
							} else {
								swal("Peringatan", "Gagal mengirim File, pastikan ukuran dan format file sesuai!", "warning");
							}
							buttonon(el,1);

					},
					error: function (r, s, e) {
						swal("Peringatan", "Gagal mengirim!", "warning");
						buttonon(el,1);
					}
			});
		},500);
	}

	function buttonon(el,on){
		if (on == 1){
			$(el).prop('disabled',false);
			$(el).html('<span class="fa fa-paper-plane fa-fw" aria-hidden="true"></span> Kirim');
		} else {
			$(el).html('<span class="fa fa-spinner fa-pulse fa-fw"></span> Proses kirim data...');
			$(el).prop('disabled',true);
		}
	}
</script>


