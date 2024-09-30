<?php $this->load->view('site/web_headlayanan')?>
<link rel="stylesheet" href="<?php echo base_url('assets/easyui/style.css')?>">
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
		    <h3 class="page-heading single-col-max mx-auto white-text" style="font-size: 22px;"><?php echo $head; ?></h3>
            <div class="page-intro single-col-max mx-auto text-warning">Pencarian Data</div>
				<div class="main-search-box pt-3 d-block mx-auto" style="text-align: right">
					<form class="search-form w-100">
						<input type="text" placeholder="Pencarian berdasarkan Nama Guru Agama" id="search" name="search" class="form-control search-input">
						<button type="submit" class="btn search-btn" value="Search" onclick="caridata();return false;"><i class="fa fa-search"></i></button>
					</form>
					<div class="search-form  w-100" style="text-align: right">
					<!--<span id="alatcari" class="white-text fz-12" style="cursor: pointer;">Alat Penelusuran</span>-->
					<div id="boxcari" class="col-lg-12 margin-t-5">
							<div  class="card shadow-sm ">
								<div class="card-body padding-10 black-text " style="text-align: left;font-size: 12px;">
								<div class="row">
									<div class="col-lg-4 margin-t-5" >
										<label class="margin-b-0">Berdasarkan</label>
											<select class="form-control input-sm black-text" id="search_pilih" name="search_pilih">
												<option value="guru_nama">Nama Guru Agama</option>
												<option value="guru_nip">NIP (Guru PNS)</option>
												<option value="sekolah_nama">Nama Sekolah</option>
											</select>
									</div>
									<div class="col-lg-4 col-md-4 margin-t-5">   
										<label class="margin-b-0">Kecamatan</label>                                   
										<select id="search_kec" class="form-control input-sm black-text">
											<?php option_kec();?>
										</select>
									</div>
									<div class="col-lg-4 col-md-4 margin-t-5">  
										<label class="margin-b-0">Status Guru</label>                                    
										<select class="form-control input-sm black-text" id="search_status">
											<option value="">- Semua Status -</option>
											<?php optionStatusPNS();?>
										</select>
									</div>
									<div class="col-lg-4 col-md-4 margin-t-5">  
										<label class="margin-b-0">Sertifikasi</label>                                    
										<select class="form-control input-sm black-text" id="search_sertifikasi">
											<option value="">- Semua Sertifikasi -</option>
											<?php optionSertifikasi();?>
										</select>
									</div>
									<div class="col-lg-4 col-md-4 margin-t-5">  
										<label class="margin-b-0">Jenjang Sekolah</label>                                    
										<select class="form-control input-sm black-text" id="search_jenjang">
											<option value="">- Semua Jenjang -</option>
											<?php optionJenjang();?>
										</select>
									</div>
									
								</div>
								<div class="row justify-content-center">
								<div class="col-lg-4 col-md-4 margin-t-15">  
										<button class="btn btn-primary btn-block green darken-1" style="border-radius: 40px;font-weight: normal;font-size: 14px;" onclick="caridata();return false;"><span class="fa fa-search fa-fw" aria-hidden="true"></span> Cari</button>
									</div>
								</div>  
								</div>
							</div>
						</div>
					</div>
				</div>
	   	</div>
        <div class="page-content" style="background-color: #f5f6f8;">
            <div class="container">
                <div class="docs-overview py-5">
                    <div class="row justify-content-center">
                        <div class="col-md-12 easyui-layout padding-r-5 margin-t-10">
                            <h5 class="section-heading green-text text-darken-4 "><i class="fa fa-table fa-fw" aria-hidden="true"></i> Data <?php echo $head; ?> <span id="katacari" style="font-size: 14px;font-weight: normal;font-style: italic;"></span></h5>
                            <table id="tblguruagama" class="easyui-datagrid" style="height:400px"
                                    url="" striped="true"  pagination="true" 
                                    rownumbers="true"  nowrap="false" singleSelect="true" pageSize="50" pageList="[50,100,200,300,400,500]">
                                    <thead>
                                    <tr>
                                            <th rowspan="2" data-options="field:'guru_nama',width:200,align:'left'" sortable="true">NAMA</th>
                                            <th rowspan="2" data-options="field:'guru_status',width:110" sortable="true">STATUS</th>
                                            <th rowspan="2" data-options="field:'guru_sertifikasi',width:120" sortable="true">SERTIFIKASI</th>
                                            <th rowspan="2" data-options="field:'guru_nip',width:150" sortable="true">NIP</th>
                                            <th colspan="3">IDENTITAS SEKOLAH</th>
                                            <th colspan="3">WILAYAH SEKOLAH</th>
                                        </tr>
                                        <tr>
                                            <th data-options="field:'sekolah_nama',width:200" sortable="true">NAMA</th>
                                            <th data-options="field:'sekolah_jenjang',width:110" sortable="true">JENJANG</th>
                                            <th data-options="field:'sekolah_alamat',width:300" sortable="true">ALAMAT</th>

                                            <th data-options="field:'kabkoNama',width:200" sortable="true">KOTA</th> 
                                            <th data-options="field:'kecNama',width:200" sortable="true">KECAMATAN</th> 
                                            <th data-options="field:'kelNama',width:200" sortable="true">KELURAHAN</th>
                                        </tr>
                                    </thead>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-2 col-md-4 margin-t-5">  
                            <button class="btn btn-primary btn-block green lighten-1" style="border-radius: 40px;font-weight: normal;font-size: 14px;" 
                            onclick="exportexcel($('#tblguruagama'),'data_guruagama_kristen');return false;">
                            <span class="fa fa-file-excel-o fa-fw" aria-hidden="true"></span> Export Excel
                        </button>
                        </div>
                        <div class="col-lg-2 col-md-4 margin-t-5">  
                            <button class="btn btn-primary btn-block green lighten-1" style="border-radius: 40px;font-weight: normal;font-size: 14px;" 
                            onclick="printgrid($('#tblguruagama'),'Data <?php echo $head; ?>');return false;">
                            <span class="fa fa-print fa-fw" aria-hidden="true"></span> Print
                        </button>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h5 class="section-heading text-warning margin-t-20"><i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i> Grafik <?php echo $head; ?></h5>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 py-2">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">
                                <span class="card-title-text" style="font-size: 16px"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i> Status Guru Agama</span>
                            </h5>
                            <div id="grafikstatus">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 py-2">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">
                                <span class="card-title-text" style="font-size: 16px"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i> Jenjang Sekolah</span>
                            </h5>
                            <div class="card-text" id="grafikjenjang">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 py-2">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">
                                <span class="card-title-text" style="font-size: 16px"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i> Sertifikasi</span>
                            </h5>
                            <div class="card-text" id="grafiksertifikasi">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 py-2">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">
                                <span class="card-title-text" style="font-size: 16px"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i> Kecamatan</span>
                            </h5>
                            <div class="card-text" id="grafikkec">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
	</div>
                    
<?php $this->load->view('index_js'); ?> 
<script src="<?php echo base_url('assets/cart/js/highcharts.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/cart/js/modules/exporting.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/easyui/jquery.easyui.min.js')?>"></script>
<script src="<?php echo base_url('assets/easyui/datagrid-export.js')?>"></script>
<script type="text/javascript">
	var markers = [];
	var iw_map;
	$(document).ready(function(){
		$('#tblguruagama').datagrid({
		    rowStyler:function(index,row){
				if (row.status == 'PNS'){
			            return 'color:blue;';
			        }
		    }
		});	
		$('#search_pilih').change(function(){
		   $('#search').attr('placeholder','Pencarian berdasarkan '+$(this).find(':selected').html());
	  	});
	})
	
	function caridata(){
		
		$('#tblguruagama').datagrid({url:"<?php echo base_url('index.php/ajax/getGuruagamakristen')?>",queryParams:{
			[csrfName]: csrfHash,
			icari: $('#search_pilih').val(),
			ncari: $('#search').val(),
			skec: $('#search_kec').val(),
			sstatus: $('#search_status').val(),
			sjenjang: $('#search_jenjang').val(),
			ssertifikasi: $('#search_sertifikasi').val(),
		},onError: function(index,row){

		}});
		getgrafik('status');
		getgrafik('jenjang');
		getgrafik('sertifikasi');
		getgrafik('kec');

		if ($('#search').val() != ""){
			//$('#katacari').html('"Pencarian data: '+$('#search').val()+'"');	
		}
			
	}

	function exportexcel(dg,jdl){
      dg.datagrid('toExcel',{
          filename: jdl+'.xls',
          worksheet: jdl
      }); 
    }
    function printgrid(dg,jdl){
      dg.datagrid('print',jdl); 
    }

	var options = {
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
	            type: 'pie',
	            renderTo: '',
	            options3d: {
					enabled: true,
	                alpha: 45,
	                beta: 0
	            }
	        },
	        title: {
	            text: ''
	        },
	        tooltip: {
	            pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'

	        },
	        plotOptions: {
	            pie: {
	                allowPointSelect: true,
	                cursor: 'pointer',
	                dataLabels: {
	                    enabled: true,
	                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
	                    style: {
	                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
	                    }
	                },
                    showInLegend: true,
                    depth: 25,
                    point: {
	                events: {
	                    legendItemClick: function () {	                       
	                        	return false;
	                    }
	                }
                }
	            }

	        },
	        series: [{}],
	        legend: {
				enabled: true,
				borderWidth: 0,
                useHTML: true,
                backgroundColor: '#FCFFC5',
            	borderColor: '#C98657',
            	borderWidth: 1,
			    labelFormatter: function() {
       return '<div style="width:200px;background-color:#000"><span style="float:left">' + this.name + '</span><span style="float:right; margin-right:10px;"><a href="javascript:void=0" data-value="'+this.name+'">' + this.y + '</a> 	</span></div>';
            },
            symbolHeight: 12,
            symbolWidth: 12,
            symbolRadius: 6
			},
	        credits: {
	            enabled: false
	        }
		}
	
	function getgrafik(dasar){
		host = "<?php echo base_url('index.php/ajax/grafikGuruagamakristen'); ?>";;
		$.post(host,{
				[csrfName]: csrfHash,
				icari: $('#search_pilih').val(),
				ncari: $('#search').val(),
				skec: $('#search_kec').val(),
				sstatus: $('#search_status').val(),
				sjenjang: $('#search_jenjang').val(),
				ssertifikasi: $('#search_sertifikasi').val(),
				sdasar:dasar
		},function(result){
			options.series[0].data = result.data;
	        options.title.text = "Grafik "+result.judul;
	        options.chart.renderTo = 'grafik'+dasar;
	        var chart = new Highcharts.Chart(options);
		},'json');
	}
	
</script>



