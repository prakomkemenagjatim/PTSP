
    
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
									$h = 1436; 
									for ($i=2015;$i<=date('Y');$i++){
										$sld='';
										if ($i == date('Y')){
											$sld = 'selected="selected"';
										}
										
									echo"<option value='$i' ".$sld."> ".$h." H / ".$i." M </option>";
									$h++;
									}
									?>
								</select>
							</div>
							<div id="colexport" class="col-lg-3 col-md-3 text-left" style="display: none;">
								<sup class="green-text">Export Pdf</sup>
								<button id="btnexport" class="btn btn-primary btn-block green darken-1 mb-4" style="border-radius: 40px;font-weight: normal;font-size: 16px;">
								<span class="fa fa-file-pdf fa-fw" aria-hidden="true"></span> Export Pdf</button>
							</div>
							<div class="col-lg-12 col-md-12">  
								<header class="section-header">
									<h3 id="jdwlshlt"class="mb-5 green-text" style="font-size: 22px;" >JADWAL IMSAKIYAH KABUPATEN NGAWI</h3>
								</header>
							</div>
						<div class="col-lg-12 col-md-12">  
							<div id="jadwal_shalat">
								<div id="rowshalat" class="row">
								
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
						<small>Sumber data: <a href="https://bimasislam.kemenag.go.id/" target="_blank" style="color: #5d6778;text-decoration: none;">https://bimasislam.kemenag.go.id/</a></small>
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
		loadjadwalimsak();
		$('#stahun').change(function(){
			loadjadwalimsak();
		});
	});
	function loadjadwalimsak() {
			click=false;
			var thn = $('#stahun').val();
			judl = '';
			$('#colexport').hide();
			$.post('<?php echo base_url('index.php/ajax/getjadwalimsak')?>',{[csrfName]:csrfHash,thn:thn},function(shalat){
				$('#rowshalat').html('');
				datashalat='';
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
				if(shalat.status==1){
					datashalat = shalat;
					vtahun = $('#stahun').find(':selected').html();
					judl = 'JADWAL IMSAKIYAH KOTA MALANG '+vtahun;
					$('#jdwlshlt').html(judl);
					hijriah = shalat.hijriah;
					
					$.each(shalat.data, function(k,v){
						$('#bodytable').append(`<tr><td>${v.tanggal} Ramadan ${hijriah} H</td><td style="background-color:#a7ffed;">${v.imsak}</td><td>${v.subuh}</td><td>${v.terbit}</td><td>${v.dhuha}</td><td>${v.dzuhur}</td><td>${v.ashar}</td><td>${v.maghrib}</td><td>${v.isya}</td></tr>`);	
						$('#rowshalat').append(`<div class="col-sm-4 mb-4">
									<div class="jadwalshalat card p-3 bg-dark box-shadow-dark animated fadeInUp">
										<div class="card-content">
											<div class="text-warning margin-b-10">${v.tanggal} Ramadan ${hijriah} H</div>
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



