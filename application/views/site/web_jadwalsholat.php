<?php $this->load->view('site/web_headlayanan')?>
<style>
.search-form .dropdown.bootstrap-select{padding: 6px 15px;}.search-form .dropdown.bootstrap-select .btn.dropdown-toggle{padding: 5px;background-color: transparent;border-radius: 30px;font-size: 14px;}.search-form .dropdown.bootstrap-select .btn.dropdown-toggle:focus{border: 0;}.dropdown-item.active, .dropdown-item:active{background-color: #009688;}.dropdown-menu{font-size: 14px;}.bootstrap-select .btn:focus{ outline: none !important;}.dropdown-header{color:#004d40;font-weight: 600;}.form-control{padding: .375rem .75rem;}.jadwalshalat i.icon{display: inline-block;background-size: 100%;background-repeat: no-repeat;margin: 10px;width: 24px;height: 24px;}.jadwalshalat .waktushalat{display: inline-block;}.jadwalshalat .row{margin-right: 0;margin-left: 0;}.jadwalshalat .items{border-radius: 8px;background-color: #1d1d1d;padding: 10px;}.jadwalshalat .waktushalat .title, .jadwalshalat .waktushalat .waktu{display: block;line-height: 18px;font-size: 12px;}.jadwalshalat .waktushalat .waktu{font-size: 14px;font-weight: 700;}
</style>    
    
    <div class="page-header  py-5 text-center position-relative bg-secondary  box-shadow-dark">
	    <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div>
	    <div class="container "style="padding-top: 3rem;padding-bottom:3rem">
		    <h1 class="page-heading single-col-max mx-auto white-text"><?php echo $head; ?></h1>
		    <div class="page-intro single-col-max mx-auto yellow-text"><?php echo $subhead; ?></div>
			<div class="d-block mx-auto" style="padding-top: 3rem;padding-bottom:3rem">
			
			<div class="w-100">
			<div class="row justify-content-center search-form ml-0">
							<div class="col-lg-3 col-md-3 text-left mb-4">  
								<sup class="green-text">Tahun</sup>
								<select id="stahun" class="selectpicker form-control search-input mb-4" title="<?php echo  date('Y');?>">
								<?php
									for ($i=2000;$i<=date('Y')+10;$i++){
										$sld='';
										if ($i == date('Y')){
											$sld = 'selected="selected"';
										}
									echo"<option value='$i' ".$sld."> ".$i." </option>";
									}
									?>
								</select>
							</div>
							<div class="col-lg-3 col-md-3 text-left">  
								<sup class="green-text">Bulan</sup>
								<select id="sbulan" class="selectpicker form-control search-input mb-4" title="Semua Bulan">
									<option value="">Semua Bulan</option>
									<option value="1" <?php if (date('m')=='01') {echo 'selected="selected"';} ?>>Januari</option>
									<option value="2"<?php if (date('m')=='02') {echo 'selected="selected"';} ?>>Februari</option>
									<option value="3"<?php if (date('m')=='03') {echo 'selected="selected"';} ?>>Maret</option>
									<option value="4"<?php if (date('m')=='04') {echo 'selected="selected"';} ?>>April</option>
									<option value="5"<?php if (date('m')=='05') {echo 'selected="selected"';} ?>>Mei</option>
									<option value="6"<?php if (date('m')=='06') {echo 'selected="selected"';} ?>>Juni</option>
									<option value="7"<?php if (date('m')=='07') {echo 'selected="selected"';} ?>>Juli</option>
									<option value="8"<?php if (date('m')=='08') {echo 'selected="selected"';} ?>>Agustus</option>
									<option value="9"<?php if (date('m')=='09') {echo 'selected="selected"';} ?>>September</option>
									<option value="10"<?php if (date('m')=='10') {echo 'selected="selected"';} ?>>Oktober</option>
									<option value="11"<?php if (date('m')=='11') {echo 'selected="selected"';} ?>>November</option>
									<option value="12"<?php if (date('m')=='12') {echo 'selected="selected"';} ?>>Desember</option>
								</select>
							</div>
							<div id="colexport"  class="col-lg-3 col-md-3 text-left" style="display: none;">
								<sup class="green-text">Export Pdf</sup>
								<button id="btnexport" class="btn btn-primary btn-block green darken-1 mb-4" style="border-radius: 40px;font-weight: normal;font-size: 16px;">
								<span class="fa fa-file-pdf fa-fw" aria-hidden="true"></span> Export Pdf</button>
							</div>
							<div class="col-lg-12 col-md-12">  
								<header class="section-header">
									<h3 id="jdwlshlt"class="mb-5 green-text" style="font-size: 22px;" >JADWAL SHOLAT KABUPATEN NGAWI</h3>
								</header>
							</div>
						<div class="col-lg-12 col-md-12">  
							<div id="jadwal_shalat">
								<div id="rowshalat" class="row">
								
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
						<small>Sumber data: <a href="https://bimasislam.kemenag.go.id/" target="_blank" style="color: #5d6778;text-decoration: none;">https://bimasislam.kemenag.go.id</a></small>
						</div>
					</div>
			 </div>
		</div>
	    </div>
    </div>  
	<table id="datatable" class="d-none">
      <thead>
		<tr>
			<td id="titletable" colspan="9" class="text-center"></td>
		</tr>
        <tr>
 			<th>TANGGAL</th><th>IMSAK</th><th>SUBUH</th><th>TERBIT</th><th>DHUHA</th><th>DZUHUR</th><th>ASHAR</th><th>MAGRIB</th><th>ISYA'</th>
        </tr>
      </thead>
      <tbody id="bodytable">
      </tbody>
	  <tfoot><tr><td colspan="9" class="text-center">Sumber data: https://bimasislam.kemenag.go.id</td></tr></tfoot>
    </table>                    
<?php $this->load->view('index_js'); ?> 
<script src="<?php echo base_url('assets/js/jspdf.umd.js')?>"></script>
<script src="<?php echo base_url('assets/js/jspdf.plugin.autotable.js')?>"></script>
<script type="text/javascript">
	var click = true;
	var judl = '';
	$(function() {
		loadjadwalshalat();
		$('#stahun').change(function(){
			loadjadwalshalat();
		});
		$('#sbulan').change(function(){
			loadjadwalshalat();
		});
	});
	function loadjadwalshalat() {
			click=false;
			var bln = $('#sbulan').val();
			var thn = $('#stahun').val();
			judl = '';
			$('#colexport').hide();
			$.post('<?php echo base_url('index.php/ajax/getjadwalsholat')?>',{[csrfName]:csrfHash,bln:bln,thn:thn},function(shalat){
				$('#rowshalat').html('');
				$('#colexport').show();
				$('#btnexport').unbind('click');
				$('#btnexport').click(function(){
					if (judl != ''){
						var doc = new jspdf.jsPDF();
						$('#titletable').html(judl.toUpperCase());
						doc.autoTable({ html: '#datatable',theme:'grid' });
						doc.save(judl.toUpperCase()+'.pdf');
					}
					
				})
				datashalat='';
				if(shalat.status==1){
					datashalat = shalat;
					vtahun = $('#stahun').find(':selected').html();
					vbulan = $('#sbulan').find(':selected').html();
					judl = 'JADWAL SHOLAT KABUPATEN NGAWI '+vbulan+' '+vtahun;
					$('#jdwlshlt').html(judl);
					$.each(shalat.data, function(k,v){	
						$('#bodytable').append(`<tr><td>${v.tanggal}</td><td>${v.imsak}</td><td>${v.subuh}</td><td>${v.terbit}</td><td>${v.dhuha}</td><td>${v.dzuhur}</td><td>${v.ashar}</td><td>${v.maghrib}</td><td>${v.isya}</td></tr>`);
						$('#rowshalat').append(`<div class="col-sm-4 mb-4">
									<div class="jadwalshalat card p-3 bg-dark box-shadow-dark animated fadeInUp">
										<div class="card-content">
											<div class="text-warning margin-b-10">${v.tanggal}</div>
												<div class="row">
													<div class="col-sm-3 col-3" style="padding:3px">
														<div class="items">
															<div class="waktushalat">
																<span class="title white-text">IMSAK</span>
																<span class="waktu bold green-text">${v.imsak}</span>
															</div>
														</div>
													</div>
													<div class="col-sm-3 col-3" style="padding:3px">
														<div class="items">
															<div class="waktushalat">
																<span class="title white-text">SUBUH</span>
																<span class="waktu bold green-text">${v.subuh}</span>
															</div>
														</div>
													</div>
													<div class="col-sm-3 col-3" style="padding:3px">
														<div class="items">
															<div class="waktushalat">
																<span class="title white-text">TERBIT</span>
																<span class="waktu bold green-text">${v.terbit}</span>
															</div>
														</div>
													</div>
													<div class="col-sm-3 col-3" style="padding:3px">
														<div class="items">
															<div class="waktushalat">
																<span class="title white-text">DHUHA</span>
																<span class="waktu bold green-text">${v.dhuha}</span>
															</div>
														</div>
													</div>
													<div class="col-sm-3 col-3" style="padding:3px">
														<div class="items">
															<div class="waktushalat">
																<span class="title white-text">DZUHUR</span>
																<span class="waktu bold green-text">${v.dzuhur}</span>
															</div>
														</div>
													</div>
													<div class="col-sm-3 col-3" style="padding:3px">
														<div class="items">
															<div class="waktushalat">
																<span class="title white-text">ASHAR</span>
																<span class="waktu bold green-text">${v.ashar}</span>
															</div>
														</div>
													</div>
													<div class="col-sm-3 col-3" style="padding:3px">
														<div class="items">
															<div class="waktushalat">
																<span class="title white-text">MAGRIB</span>
																<span class="waktu bold green-text">${v.maghrib}</span>
															</div>
														</div>
													</div>
													<div class="col-sm-3 col-3" style="padding:3px">
														<div class="items">
															<div class="waktushalat">
																<span class="title white-text">ISYA'</span>
																<span class="waktu bold green-text">${v.isya}</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>`);
					})
				}
				$('.progress').hide();
				click=true;
			},'json');	
		 }
</script>



