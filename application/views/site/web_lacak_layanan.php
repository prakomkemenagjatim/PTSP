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
    
    <div class="page-header  py-5 text-center position-relative bg-secondary  box-shadow-dark" style="height:100vh">
	    <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div>
	    <div class="container "style="padding-top: 3rem;padding-bottom:3rem">
		    <h1 class="page-heading single-col-max mx-auto white-text"><?php echo $head; ?></h1>
		    <div class="page-intro single-col-max mx-auto yellow-text"><?php echo $subhead; ?></div>
		    <div class="main-search-box pt-3 d-block mx-auto" style="text-align: right">
				<div class="main-search-box pt-3 d-block mx-auto" style="text-align: right">
					<div id="frmlacak" action="" class="search-form w-100 text-left">
						<sup class="green-text">Masukkan 7 digit nomor layanan</sup>
						<input id="snoLayanan" name="snoLayanan"  class="form-control search-input mb-4" placeholder="Masukkan 7 digit nomor layanan">
						<sup class="green-text">Nomor WA/HP yang terdaftar</sup>
						<input id="snoWA" name="snoWA"  class="form-control search-input mb-4" placeholder="Masukkan nomor WA/HP yang digunakan saat melakukan permohonan">
						<button class="btn btn-primary btn-block green darken-1" style="border-radius: 40px;font-weight: normal;font-size: 16px;" onclick="lacak();return false;">
							<span class="fa fa-search fa-fw" aria-hidden="true"></span> Lacak layanan</button>
					</div>
				</div>
		        <div id="detailLayanan" class="search-form  w-100" style="text-align: right;display:none">
					<div id="boxcari" class="col-lg-12 margin-t-5">
						<div  class="card shadow-sm ">
							<div id="statusLayanan" class="card-body padding-10 black-text " style="text-align: left;font-size: 12px;">
								<div class='col-sm-12  mt-4'>
									<div class="form-group">
										<label for="nolayanan" class="control-label text-muted black-text">Nomor Layanan</label>
										<span class="form-control form-text" id="nolayanan"> </span>
									</div>    
								</div>  
								<div class='col-sm-12'>
									<div class="form-group">
										<label for="nama" class="control-label text-muted black-text">Nama Pemohon/Pengirim</label>
										<span class="form-control form-text" id="nama"> </span>
									</div>    
								</div> 
								<div class='col-sm-12'>
									<div class="form-group">
										<label for="layanan" class="control-label text-muted black-text">Layanan</label>
										<span class="form-control form-text" id="layanan" style="height: 100%;"> </span>
									</div>    
								</div> 
								<div class='col-sm-12'>
									<div class="form-group">
										<label class="control-label text-muted black-text">Status Layanan (<span id="tgl" style="font-style: italic;"></span>)</label>
										<div class="h2 text-center mt-3 orange-text" id="status"></div>
										<div class="text-center mt-3" id="status1"></div>
										<div class="text-center mt-3" id="status2">  </div>
									</div>    
								</div> 
							</div>
						</div>
					</div>
				</div>
            </div>
	    </div>
    </div>                       
<?php $this->load->view('index_js'); ?> 
<script>
	var urlajx = "<?php echo base_url(); ?>";
	$(function() {
		$('#detailLayanan').hide();
		
	})

	function lacak(){
		$('#detailLayanan').hide();
		var nolay = $('#snoLayanan').val(); 
		var nowa = $('#snoWA').val(); 
		if (nolay == ''){
			swal("Peringatan", 'Nomor Layanan belum diisi', "warning");
		} else if (nolay.length != 7){
			swal("Peringatan", 'Nomor Layanan 7 digit', "warning");
		} else if (nowa == ''){
			swal("Peringatan", 'Nomor WA/HP belum diisi', "warning");
		} else {
			$.post("<?php echo base_url('index.php/ajax/lacakLayanan')?>",{[csrfName] : csrfHash,nolayanan:nolay,nowa:nowa},function(result){
				if (result.success != ''){
					$('#nolayanan').html(result.data.noreg);
					$('#nama').html(result.data.nama);
					$('#layanan').html(result.data.layanan);
					$('#status').html('<strong>'+result.data.status+'</strong>');
					$('#status1').html(result.data.status1);
					$('#status2').html(result.data.status2);
					$('#tgl').html("updated: "+result.data.tgl);
					$('#detailLayanan').fadeIn('500');
												
				} else
				if (result.error != ''){
					swal("Peringatan", result.error, "warning");
				}
			},'json')
			.fail( function(xhr, textStatus, errorThrown) {
				swal("Peringatan", "Gagal melakukan pelacakan!", "warning");
			});
		}
	}

	function downrate(downurl){
          var rate0 = $("input[type='radio'][name='drate']:checked").val();
          var ikm_saran = $('#dikm_saran').val();
          if(rate0 == undefined){
            swal("Peringatan", "Tingkat kepuasan layanan belum dipilih.", "warning");
            return false;
          }
          $.post('<?php echo base_url(); ?>index.php/ajax/simpanrating',{[csrfName]: csrfHash,rate:rate0,ikm_saran:ikm_saran},function(result){
            if (result.status == 1){  
				  window.open(downurl, '_blank');                
                  swal({
                    title: "Terima kasih atas waktu dan penilainnya 😍",
                    text: "",
                    type: "success",
                    timer: 10000
                    });
					setTimeout(function(){
                        location.reload();
                      },12000);
                } else {
                  swal("Peringatan", "Gagal menyampaikan penilaian", "warning");
                }
          },'json')
          .fail(function(response) {
            swal("Peringatan", "Gagal menyampaikan penilaian", "warning");
          });
	}
</script>




