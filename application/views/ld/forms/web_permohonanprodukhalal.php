
    
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
							<div class="rounded bg-dark p-3 mt-4 mb-4">
								<small class="text-warning"> PROSEDUR SERTIFIKASI PRODUK HALAL:</small>
								<small>
								<ol class="text-muted">
								<li>Setelah Semua Lengkap dan telah Memenuhi Persyaratan Di PDF Dan Dicetak , setelah sebelumnya konsultasi  dengan operator Satgas Halal yaitu Petugas Bagian Sertifikat Halal Kantor Kementerian Agama Kabupaten/Kota.</li>
								<li>Untuk Pendaftaran ONLINE SI HALAL Oleh Operator Satgas Halal Kab. Ngawi. Setelah mendapat nomor pendaftaran dari aplikasi Si Halal Pelaku Usaha bisa ceroll ke LPPOM – MUI dan Layanan LPH SUCOFINDO : <a href='https://.sucofindo.co.id' target='_blank'><small>Link Web Sucofindo</small></a>
.</li>
								<li>Pelaku Usaha Bisa  Online Ke LPPOM Jawa Timur Melalui:
									<ul>
										<li>WEB : reg-e-lppommui.org / https://regs.elppommui.org/index.php</li>
										<li>Email : lppommuijtm@yahoo.co.id / ceroljatim@gmail.com</li>
										<li>LPPOM MUI : HP/WA 085645355147/081943243330</li>
										<li>LPPOM MUI Konsultasi : 081943243330</li>
										<li>Link Pendaftaran NIB (Bagi Yang Belum Punya)  : https://oss.go.id/portal/</li>
									</ul>
								</li>
								</ol>
								</small>
								<div class=" mt-5"><small class="text-warning"> Untuk PENDAFTARAN PRODUK HALAL silakan klik tombol dibawah ini:</small></div> 
								<div class="col-lg-12 col-md-12 mt-2 mb-4">  
									<a href="https://ptsp.halal.go.id " target="_blank" id="btnsend" class="btn btn-primary btn-block green darken-1 mb-4" style="border-radius: 40px;font-weight: normal;font-size: 16px;">
									<span class="fa fa-external-link-square  fa-fw" aria-hidden="true"></span> ptsp.halal.go.id </a>
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
					url:  "<?php echo base_url('index.php/ajax/permohonanPost')?>",
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



