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
		    <div class="page-intro single-col-max mx-auto yellow-text"><?php echo $subhead; ?></div>
			<div class="d-block mx-auto" style="padding-top: 3rem;padding-bottom:3rem">
			
			<div class="w-100">
			<header class="section-header">
			<h3 class="mb-5 green-text" style="font-size: 22px;" >FORM PERMOHONAN</h3>
			</header>
				<div class="row justify-content-center">
					<div class='col-sm-6 text-left box-shadow-dark'>
						<form id="frmdok" action="" method="POST" enctype="multipart/form-data" >
							<div class='col-sm-12  mt-4'>
								<div class="form-group">
									<label for="nama" class="control-label text-muted">Nama pemohon <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="nama" name="nama" required>
								</div>    
							</div>  
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="nowa" class="control-label text-muted">Nomor WA/HP pemohon <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="nowa" name="nowa" required>
								</div>    
							</div>
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="nomorpt" class="control-label text-muted">Nomor PT/CV <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="nomorpt" name="nomorpt" required>
								</div>    
							</div>
							<div class='col-sm-12'>
								<div class="form-group">
									<label for="nomorspk" class="control-label text-muted">Nomor SPK<sup class="text-danger">*</sup></label>
									<input type="text" class="form-control form-text" id="nomorspk" name="nomorspk" required>
								</div>    
							</div>
						</form>
						<div class="form-group mt-5">
							<small class="text-warning"><sup class="text-danger">*</sup> Wajib diisi.</small>
						</div>  
						<div class="col-lg-12 col-md-12 mt-5 mb-4">  
							<button class="btn btn-primary btn-block green darken-1 mb-4" style="border-radius: 40px;font-weight: normal;font-size: 16px;" onclick="simpandata();return false;">
							<span class="fa fa-paper-plane fa-fw" aria-hidden="true"></span> Kirim</button>
							<small class="text-warning"><sup>#NOMOR LAYANAN akan tampil melalui dialog dan juga dikirim melalui pesan whatsapp (<i>jika nomor HP pemohon nomor whatsapp</i>) setelah proses berhasil.</sup></small>
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
		var el =  event.srcElement;
		buttonon(el,0);
		formData.append([csrfName], csrfHash);
		formData.append('kd', '<?php echo isset($kd)?$kd:''; ?>');
		formData.append('kd1', '<?php echo isset($kd1)?$kd1:''; ?>');
		setTimeout(function(){
			$.ajax({
					url:  "<?php echo base_url('index.php/ajax/pengadaanPost')?>",
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



