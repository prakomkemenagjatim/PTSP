<style>
	.select{
		height: 35px;

	}
	.bootstrap-select .dropdown-toggle:focus {
		outline: none !important;
	}
	.btn.dropdown-toggle{
		padding: 0.56rem 0.75rem;
    	line-height: 14px;
	}
	.form-span{
		display: block;
		margin-top: 0.25rem;
	}
    .shadow-sm {
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
    }
	.page-header {
    margin: 0 !important;
}

</style>
    <div class="page-header text-center position-relative">
	    <div  class="container" style="max-width:100%">
		    <div class="d-block mx-auto" style="padding-top: 1rem;padding-bottom:3rem">
		        <div class="w-100">
				<header class="section-header">
				<img src="<?php echo base_url('assets/images/5budaya2.svg') ?>" style="width: 100%; border-top-left-radius: 30px; border-top-right-radius: 30px;" alt="Budaya Image">

</header>
<br>
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">Profil Pengguna</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse">
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-2 d-flex align-items-center justify-content-center">
            <img class="img-thumbnail" src="<?php 
              $photo = isset($userSess['userPhoto']) ? $userSess['userPhoto'] : '';
              if ($photo == '') {
                echo base_url('assets/img/users/no-image.jpg') . '?nocache=' . time();
              } else {
                echo base_url('media/user/photo/profil/' . $userSess['userPhoto']) . '?nocache=' . time();
              }
            ?>" alt="Profile Image">
          </div>
          <div class="col-lg-10">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>NIP BARU</th>
                  <td><?php echo $userSess['NIP_BARU']; ?></td>
                </tr>
                <tr>
                  <th>NAMA LENGKAP</th>
                  <td><?php echo $userSess['NAMA_LENGKAP']; ?></td>
                </tr>
                <tr>
                  <th>JABATAN</th>
                  <td><?php echo $userSess['TAMPIL_JABATAN']; ?></td>
                </tr>
                <tr>
                  <th>SATKER</th>
                  <td><?php echo $userSess['SATKER_1'] . ', ' . $userSess['SATKER_3'] . ', ' . $userSess['SATKER_4']; ?></td>
                </tr>
                <tr>
                  <th>ROLE</th>
                  <td><?php echo $userSess['typeNama']; ?></td>
                </tr>
                <!-- Add more rows as needed -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<br>
					<div class="row justify-content-center search-form ml-0">
							<div class="col-lg-3 col-md-3 text-left">  
								<!-- <sup class="black-text">Tahun</sup> -->
								<select id="stahun" class="selectpicker form-control search-input mb-4" title="<?php echo  date('Y');?>">
								<?php
									for ($i=2021;$i<=date('Y');$i++){
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
								<!-- <sup class="black-text">Bulan</sup> -->
								<select id="sbulan" class="selectpicker form-control search-input mb-4" title="Semua Bulan">
									<option value="">Semua Bulan</option>
									<option value="01" <?php if (date('m')=='01') {echo 'selected="selected"';} ?>>Januari</option>
									<option value="02"<?php if (date('m')=='02') {echo 'selected="selected"';} ?>>Februari</option>
									<option value="03"<?php if (date('m')=='03') {echo 'selected="selected"';} ?>>Maret</option>
									<option value="04"<?php if (date('m')=='04') {echo 'selected="selected"';} ?>>April</option>
									<option value="05"<?php if (date('m')=='05') {echo 'selected="selected"';} ?>>Mei</option>
									<option value="06"<?php if (date('m')=='06') {echo 'selected="selected"';} ?>>Juni</option>
									<option value="07"<?php if (date('m')=='07') {echo 'selected="selected"';} ?>>Juli</option>
									<option value="08"<?php if (date('m')=='08') {echo 'selected="selected"';} ?>>Agustus</option>
									<option value="09"<?php if (date('m')=='09') {echo 'selected="selected"';} ?>>September</option>
									<option value="10"<?php if (date('m')=='10') {echo 'selected="selected"';} ?>>Oktober</option>
									<option value="11"<?php if (date('m')=='11') {echo 'selected="selected"';} ?>>November</option>
									<option value="12"<?php if (date('m')=='12') {echo 'selected="selected"';} ?>>Desember</option>
								</select>
							</div>
						<div class="col-lg-12 col-md-12 mb-3">  
							<div class="card card-grafik text-left animated flipInY shadow-sm rounded">
								<div class="card-body p-3">
									<div id="cart" style="min-height: 450px;width: 100%"> </div> 
								</div>
							</div>
						</div>
                        <div class="col-lg-3 col-md-2 mb-2">  
							<div class="card card-grafik text-left animated flipInY shadow-sm rounded">
                                <div class="card-body p-3">
                                    <div class="clearfix">
                                        <div class="float-left">
                                        <i class="fa fa-envelope brown-text fa-3x fa-fw"></i>
                                        </div>
                                        <div class="float-right">
                                        <p class="card-text text-right">Layanan Masuk</p>
                                        <div class="fluid-container">
                                            <h3 id="vlay" class="card-title font-weight-bold text-right mb-0">0</h3>
                                        </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0">
                                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total
                                    </p>
                                </div>
							</div>
						</div>
						<div class="col-lg-3 col-md-2 mb-2">  
							<div class="card card-grafik text-left animated flipInY shadow-sm rounded">
                                <div class="card-body p-3">
                                    <div class="clearfix">
                                        <div class="float-left">
                                        <i class="fa fa-envelope green-text fa-3x fa-fw"></i>
                                        </div>
                                        <div class="float-right">
                                        <p class="card-text text-right">Surat masuk</p>
                                        <div class="fluid-container">
                                            <h3 id="vsm" class="card-title font-weight-bold text-right mb-0">0</h3>
                                        </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0">
                                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total
                                    </p>
                                </div>
							</div>
						</div>
                        <div class="col-lg-3 col-md-2 mb-2">  
							<div class="card card-grafik text-left animated flipInY shadow-sm rounded">
                                <div class="card-body p-3">
                                    <div class="clearfix">
                                        <div class="float-left">
                                        <i class="fa fa-envelope blue-text fa-3x fa-fw"></i>
                                        </div>
                                        <div class="float-right">
                                        <p class="card-text text-right">Surat Keluar</p>
                                        <div class="fluid-container">
                                            <h3 id="vsk" class="card-title font-weight-bold text-right mb-0">0</h3>
                                        </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0">
                                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total
                                    </p>
                                </div>
							</div>
						</div>
                        <div class="col-lg-3 col-md-2 mb-2">  
							<div class="card card-grafik text-left animated flipInY shadow-sm rounded">
                                <div class="card-body p-3">
                                    <div class="clearfix">
                                        <div class="float-left">
                                        <i class="fa fa-star orange-text fa-3x fa-fw"></i>
                                        </div>
                                        <div class="float-right">
                                        <p class="card-text text-right"> IKM</p>
                                        <div class="fluid-container">
                                            <h3 id="vikm" class="card-title font-weight-bold text-right mb-0">0</h3>
                                        </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0">
                                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Nilai/Responden
                                    </p>
                                </div>
							</div>
						</div>
					</div>
             	</div>
            </div>
	    </div>
    </div>   
<?php $this->load->view('index_js'); ?>	
<script type="text/javascript" src="<?php echo base_url('../assets/cart/js/highcharts.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('../assets/cart/js/modules/exporting.js')?>"></script>
<script>
	var isMobile = Math.min(window.screen.width, window.screen.height) < 768 || navigator.userAgent.indexOf("Mobi") > -1;
    var chart;
	var options1 = {
	  		
			  chart: {
				  type: 'column',
				  marginLeft:80,
				  marginRight:20,
				  marginBottom:140,
				  renderTo: ''
			  },
			  title: {
				  text: ''
			  },
			  credits: {
				enabled:false
			  },
			  exporting:{
				enabled:true
			  },
			  subtitle: {
				  text: ''
			  },
			  plotOptions: {
				  column: {
					  pointPadding: 0.2,
					  borderWidth: 0
				  },
				  series: {
					cursor: 'pointer',
					point: {
						events: {
							click: function () {
								ckat = this.series.index;
								cbln = $(this.series.data).index(this);
								clay = this.series.name;
								cblns = this.category;
								showdetail();
							}
						}
					}
				}
			  },
			  xAxis: {
                  type: 'category',
				  labels: {
					  rotation: 0,
					  style: {
						  fontSize: '10px',
					  
					  },
				  },
				  categories: [],
				  title: {
					  text: ''
				  },
			  },
			  yAxis: {
				  min: 0,
				  title: {
					  text: 'JUMLAH'
				  }
			  },
			  legend: {
				  floating: true,
				  align: 'center',
				  y:-50,
				  x: 50, // = marginLeft - default spacingLeft
				  itemStyle: {
					   fontSize:'10px'
					},
				  itemMarginTop:35,
				  itemMarginBottom:-35,  
				  symbolHeight: 10,
				  symbolWidth: 10,
				  symbolRadius: 5,
                  labelFormatter: function() {
                    var total = 0;
                    for(var i=this.yData.length; i--;) { total += this.yData[i]; };
                    return this.name + ' (Total: ' + total+')';
                }
			  },
			  tooltip: {
				  headerFormat: '<span style="font-size:11px">{point.key}</span><table width="100px"',
				  pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:12px">{series.name}: </td>' +
					  '<td style="padding:0;font-size:12px;font-weight:bold">{point.y}</td></tr>',
				  footerFormat: '</table>',
				  shared: true,
				  useHTML: true,
				  positioner: function (labelWidth, labelHeight, point) {
					  var tooltipX, tooltipY;
					  tooltipX = point.plotX + chart.plotLeft-80;
					  tooltipY = 50;
					  return {
						  x: tooltipX,
						  y: tooltipY
					  };
				  }
				  
			  },
			  series: [{}]
				  
			  }

        function loadgrafik(){
			$('#cart').html('');
			$.post("<?php echo base_url('index.php/data/getgrafiklayanan')?>",{thn:$('#stahun').val(),bln:$('#sbulan').val()},function(hasil){
                    title = hasil.title;
					options1.chart.renderTo='cart';
					options1.series= hasil.series;
					periode =  "";
                    bln = ' BULAN '+$('#sbulan option:selected').text().toUpperCase();
					options1.xAxis.title.text = 'UNIT KERJA';
		            options1.subtitle.text= '<b>'+title+' SANTUN '+bln+' TAHUN '+$('#stahun option:selected').text()+'<br/> <?php echo kantorapp();?></b>';
		            options1.xAxis.categories = hasil.x;
					if(isMobile){
						options1.chart.type= 'bar';
						options1.legend.y = 100;
						options1.legend.layout = 'vertical';
						options1.legend.align= 'left';
						options1.legend.height= 200;
						options1.xAxis.labels.style.fontSize = '6px';
						options1.chart.marginLeft = 100;
					} else {
						options1.chart.type= 'column';
						options1.xAxis.labels.rotation = 0;
						options1.legend.layout = 'horizontal';
						options1.legend.y = -50;
						options1.legend.align= 'center';
						options1.xAxis.labels.style.fontSize = '10px';
						options1.chart.marginLeft = 80;
					}
		        	chart = new Highcharts.Chart(options1);
					$('#vlay').html(hasil.totallay);
                    $('#vsm').html(hasil.totalsm);
                    $('#vsk').html(hasil.totalsk);
                    $('#vikm').html(hasil.ikmavg+'/'+hasil.ikmrespon);
			},'json');
			
		}

        $(function() {
            loadgrafik();
            $('#stahun').change(function(){
                loadgrafik();
            });
            $('#sbulan').change(function(){
                loadgrafik();
            });
        });
</script>
