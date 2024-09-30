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
		    <div class="page-intro single-col-max mx-auto text-warning"><?php echo $subhead; ?></div>
			<div class="d-block mx-auto" style="padding-top: 3rem;padding-bottom:3rem">
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
								<h3 class="mb-5 green-text" style="font-size: 22px;" >FORM PERMOHONAN</h3>
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
									<label for="nomorsurat" class="control-label text-muted">Nomor Surat <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="nomorsurat" name="nomorsurat" required>
								</div>    
							</div>
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="tglsurat" class="control-label text-muted">Tanggal Surat <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text datepicker" id="tglsurat" name="tglsurat" required>
								</div>    
							</div>
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="instansisurat" class="control-label text-muted">Instansi/Lembaga Pemohon <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="instansisurat" name="instansisurat" required>
								</div>    
							</div> 
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="tujuansurat" class="control-label text-muted">Tujuan Surat <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="tujuansurat" name="tujuansurat" required>
								</div>    
							</div> 
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="perihalsurat" class="control-label text-muted">Perihal Surat <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="perihalsurat" name="perihalsurat" required>
								</div>    
							</div> 
							<?php
								$arrket = json_decode($ketlampiran,true);
								if (count($arrket) > 0){
									echo '<label class="control-label text-warning mt-4">Dokumen yang harus diupload:</label>';
									$i = 1;
									foreach ( $arrket as $key => $value) {
							?>
								<div class='col-sm-12'>
									<div class="form-group">
										<label for="berkas[]" class="control-label text-muted d-block mb-0"><span class="green-text"><?php echo $i.'. ';?></span><i class="fa fa-upload fa-fw" aria-hidden="true"></i> Upload <?php echo $value['ket']; ?></label> 
										<label for="berkas[]" class="control-label text-muted d-block"><small>( Tipe file: pdf, Ukuran Maks.: <?php echo sizeupload(); ?> )</small></label>
										<input type="hidden"name="berkasnm[]" value="<?php echo $value['fnm']; ?>">
										<input type="hidden"name="berkasket[]" value="<?php echo $value['ket']; ?>">
										<input type="hidden"name="berkasreq[]" value="<?php echo $value['req']; ?>">
										<input type="file" class="form-control form-text"  name="berkas[]" required>
									</div>    
								</div>
							<?php
										$i++;
									}
								}
							?>
						
							<div class='col-sm-12'>
								<div class="form-group mt-5">
										<small class="text-warning"><sup class="text-danger">*</sup> Wajib diisi.</small>	
								</div> 
							</div>
							<div class="col-lg-12 col-md-12 mt-5 mb-4">  
								<button id="btnsend" class="btn btn-primary btn-block green darken-1 mb-4" style="border-radius: 40px;font-weight: normal;font-size: 16px;" onclick="simpandata();return false;">
								<span class="fa fa-paper-plane fa-fw" aria-hidden="true"></span> Kirim</button>
								<div class="rounded bg-dark p-3">
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
<?php $this->load->view('index_js'); ?> 
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
					url:  "<?php echo base_url('index.php/ajax/suratmasukPost')?>",
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



