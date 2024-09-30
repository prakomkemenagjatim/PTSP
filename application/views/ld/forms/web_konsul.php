
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
				<div class="row justify-content-center">
					<div class='col-sm-6 text-left box-shadow-dark <?php echo $dnoneket; ?>'>
							<div class="rounded bg-layanan p-3 mt-4 mb-4">
								<?php echo $layananket; ?>
							</div>
					</div>
					<div class='col-sm-6 text-left box-shadow-dark'>
						<form id="frmdok" action="" method="POST" enctype="multipart/form-data" >
						<header class="section-header mt-4">
								<h3 class="mb-5 green-text" style="font-size: 22px;" >FORM PERMOHONAN</h3>
							</header>
							<div class='col-sm-12  mt-4'>
								<div class="form-group">
									<label for="nama" class="control-label text-muted">Nama Lengkap <sup class="text-danger">*</sup></label>
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
									<label for="tanya" class="control-label text-muted">Isi Konsultasi <sup class="text-danger">*</sup></label>
									<textarea rows="8" class="form-control form-text" id="tanya" name="tanya" required></textarea>
								</div>    
							</div>
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="file1" class="control-label text-muted">Upload file <br/> 
									<small>( Tipe file: jpg | png | pdf, Ukuran Maks.: <?php echo sizeupload(); ?> )</small></label>
									<input type="file" class="form-control form-text" id="file1" name="file1" required>
								</div>    
							</div>
						</form>
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
			 </div>
		</div>
	    </div>
    </div>                       
<?php $this->load->view('index_js'); ?> 
<script type="text/javascript">
	function simpandata(){
		var formData = new FormData($('#frmdok')[0]);
		var el =  '#btnsend';//event.srcElement;
		$(el).html('');
		buttonon(el,0);
		formData.append([csrfName], csrfHash);
		formData.append('kd', '<?php echo isset($kd)?$kd:''; ?>');
		formData.append('kd1', '<?php echo isset($kd1)?$kd1:''; ?>');
		setTimeout(function(){
			$.ajax({
					url:  "<?php echo base_url('index.php/ajax/konsulPost')?>",
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
		},100);
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



