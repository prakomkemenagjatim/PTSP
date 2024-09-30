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
			
			<div class="w-100">
				<div class="row justify-content-center">
					<div class='col-sm-6 text-left box-shadow-dark'>
						<form id="frmdok" action="" method="POST" enctype="multipart/form-data" >
						<header class="section-header mt-4">
								<h3 class="mb-5 green-text" style="font-size: 22px;" >FORM PERMOHONAN</h3>
							</header>
							<div class='col-sm-12  mt-4'>
								<div class="form-group">
									<label for="nama" class="control-label text-muted">Nama lengkap pemohon <sup class="text-danger">*</sup></label>
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
									<label for="nomorsurat" class="control-label text-muted">Nomor surat <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="nomorsurat" name="nomorsurat" required>
								</div>    
							</div>
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="tglsurat" class="control-label text-muted">Tanggal surat <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text datepicker" id="tglsurat" name="tglsurat" required>
								</div>    
							</div>
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="instansisurat" class="control-label text-muted">Instansi/lembaga pemohon/pengirim <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="instansisurat" name="instansisurat" required>
								</div>    
							</div> 
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="perihalsurat" class="control-label text-muted">Perihal surat <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="perihalsurat" name="perihalsurat" required>
								</div>    
							</div> 
							<div class='col-sm-12' style="display: none;">
								<div class="form-group">
									<label for="ambildok" class="control-label text-muted">Pengambilan Dokumen <sup class="text-danger">*</sup></label>
									<select class="form-control form-text" id="ambildok" name="ambildok">
										<?php echo optionAmbildok(); ?>
									</select>
								</div>    
							</div> 
							<div class='col-sm-12' id="colalamatpengirim" style="display: none;">
								<div class="form-group">
									<label for="alamatpengirim" class="control-label text-muted">Alamat Lengkap Pengiriman <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="alamatpengirim" name="alamatpengirim" required>
								</div>    
							</div> 
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="file1" class="control-label text-muted">Upload file surat permohonan <sup class="text-danger">*</sup><br/> 
									<small>( Tipe file: pdf, Ukuran Maks.: <?php echo sizeupload(); ?> )</small><br/>
									<small class="text-danger">File Proposal yang memuat profil masjid.musholla, struktur organisasi masjid, gambar masjid/musholla, surat keterangan domisili masjid dari kelurahan, peta lokasi masjid.</small>
									</label>
									<input type="file" class="form-control form-text" id="file1" name="file1" required>
								</div>    
							</div>
						<div class='col-sm-12'>
								<div class="form-group mt-5">
										<small class="text-warning"><sup class="text-danger">*</sup> Wajib diisi.</small>	
								</div> 
							</div>
						<div class="col-lg-12 col-md-12 mt-5 mb-4">  
							<button class="btn btn-primary btn-block green darken-1 mb-4" style="border-radius: 40px;font-weight: normal;font-size: 16px;" onclick="simpandata();return false;">
							<span class="fa fa-paper-plane fa-fw" aria-hidden="true"></span> Kirim</button>
							<div class="rounded bg-dark p-3">
							<small class="text-warning">
								Jika proses permohonan berhasil, pemohon akan mendapatkan <u>NOMOR LAYANAN</u> yang akan tampil melalui dialog box dan juga dikirim melalui pesan whatsapp <i>(jika nomor HP pemohon nomor whatsapp)</i>.
							</small>
						</div>
						</div> 
					</div>
				</div>
			 </div>
		</div>
	    </div>
    </div>                       
<?php $this->load->view('index_js'); ?> 
<script type="text/javascript">
	$(function() {
		$('#ambildok').change(function(){
			if ($(this).val() == 2){
				$('#colalamatpengirim').fadeIn(500);
			} else {
				$('#colalamatpengirim').fadeOut(500);
			}
		})
	});
	function simpandata(){
		var formData = new FormData($('#frmdok')[0]);
		var el =  event.srcElement;
		buttonon(el,0);
		formData.append([csrfName], csrfHash);
		formData.append('kd', '<?php echo isset($kd)?$kd:''; ?>');
		formData.append('kd1', '<?php echo isset($kd1)?$kd1:''; ?>');
		setTimeout(function(){
			$.ajax({
					url:  "<?php echo base_url('index.php/ajax/permintaanidmasjidmushollaPost')?>",
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



