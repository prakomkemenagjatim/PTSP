<h3 class="page-heading mb-4"><?php echo $title;?></h3>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body padding-15">
				<div class="row">        
					<div class="col-md-3 col-xs-12 padding-r-5 margin-t-10">  
						<label for="search_status"><sup>Kecamatan</sup></label>                                     
						<select id="search_kec" class="form-control select">
							<?php option_kec();?>
						</select>
					</div> 
					<div class="col-md-3 col-xs-12 padding-r-5 margin-t-10">    
						<label for="search_status"><sup>Kelurahan</sup></label>                                   
						<select id="search_kel" class="form-control select">
						</select>
					</div>  
					<div class="col-md-2 col-xs-12 padding-r-5 margin-t-10">   
						<label for="search_status"><sup>Jenjang</sup></label>                                    
						<select class="form-control input-sm" id="search_jenjang">
						<option value="">- Jenjang  -</option>
							<?php optionJenjangkristen();?>
						</select>
					</div> 
					<div class="col-md-4 padding-r-5 margin-t-10">
						<label for="search_cari"><sup>Kata Kunci Pencarian</sup></label>
						<input id = "search_cari" class="easyui-searchbox" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch" style="width:100%;height: 35px;"></input>
						<div id="mm" style="width:200px">
						<div data-options="name:'sekolah_npsn'">NPSN</div>
						<div data-options="name:'sekolah_nama'">Nama Sekolah</div>
						<div data-options="name:'sekolah_alamat'">Alamat</div>
						<div data-options="name:'sekolah_jenjang'">Jenjang</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 col-xs-12 padding-r-5 margin-t-10"> 
						<button id="btnadd" class="btn btn-primary btn-block"onclick="tambahData()"><i class="fa fa-plus" aria-hidden="true"></i>Tambah</button>
					</div>
				</div>
				<div class="row">
						<div class="col-md-12 easyui-layout padding-r-5 margin-t-10">
						<table id="dg" class="easyui-datagrid" style="height:400px"
								url="" striped="true"  pagination="true"
								rownumbers="true"  nowrap="false" singleSelect="true">
								<thead>
									<tr>
										<th rowspan="2" data-options="field:'hapus',width:70,align:'center',formatter:formathapus" sortable="true">HAPUS</th>
										<th rowspan="2" data-options="field:'ganti',width:70,align:'center',formatter:formatganti" sortable="true">GANTI</th>
										<th rowspan="2" data-options="field:'sekolah_npsn',width:110" sortable="true">NPSN</th>
										<th rowspan="2" data-options="field:'sekolah_nama',width:200" sortable="true">NAMA</th>
										<th rowspan="2" data-options="field:'sekolah_jenjang',width:110" sortable="true">JENJANG</th>
										<th rowspan="2" data-options="field:'sekolah_alamat',width:300" sortable="true">ALAMAT</th>
										<th colspan="3">WILAYAH</th>
									</tr>
									<tr>
										<th data-options="field:'kabkoNama',width:200" sortable="true">KOTA</th> 
										<th data-options="field:'kecNama',width:200" sortable="true">KECAMATAN</th> 
										<th data-options="field:'kelNama',width:200" sortable="true">KELURAHAN</th>
									</tr>
								</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="modalform" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 60%">
		<div class="modal-content" style="border: 0">
			<div class="modal-header teal darken-3">
				<h4 class="modal-title white-text">
					Detail <?php echo $title;?>
				</h4> 
			</div>
			<div class="modal-body padding-b-0">
				<form role="form">
				<input id="idx" name="idx" type="text" class="form-control" style="display: none">
				<ul class="nav nav-tabs">
					<li ><a href="#tabid" data-toggle="tab" class="active show">Identitas</a></li>
					<li ><a href="#tabadd"  data-toggle="tab">Alamat</a></li>
				</ul>
				<div class="tab-content clearfix">
					<div class="tab-pane active  padding-10 padding-b-0" id="tabid">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="row">	
										<div class="col-lg-6 margin-t-10">
											<label>NPSN (8 digit)<span class="red-text">*</span></label>
											<input id="iNPSN" name="iNPSN" type="text" value="" class="form-control input-sm required">
										</div>		
										<div class="col-lg-6 margin-t-10">
											<label>Nama Sekolah <span class="red-text">*</span></label>
											<input id="iNama" name="iNama" type="text" value="" class="form-control input-sm required">
										</div>
										<div class="col-lg-6 margin-t-10">
											<label>Jenjang</label>
											<select class="form-control input-sm" id="iJenjang" name="iJenjang">
												<?php optionJenjangkristen();?>
											</select>
										</div>
									</div>
								</div>
							</div>		
						</div>
					</div>		
					<div class="tab-pane padding-10 padding-b-0" id="tabadd">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6 margin-t-10">
											<label>Kecamatan <span class="red-text">*</span></label>      
											<select class="form-control select input-sm"  id="iKec" name="iKec">
												<?php option_kec();?>
											</select>
										</div>
										<div class="col-lg-6 margin-t-10">
											<label>Kelurahan/Desa <span class="red-text">*</span></label>
											<select class="form-control select input-sm"  id="iKel" name="iKel">
											</select>
										</div>
										<div class="col-lg-12 margin-t-10">
											<label>Alamat Sekolah</label>
											<textarea class="form-control input-sm" rows="1" id="iAlamat" name="iAlamat"></textarea>
										</div>
									</div>
								</div>
							</div>						
						</div>					
					</div>
				</div>               
				</form>
			</div>
			<div class="modal-footer padding-t-0" >
				<div class="row">
					<div class="col-lg-6">
						<button type="button" class="btn btn-danger  btn-block" data-dismiss="modal">
							Batal
						</button>
					</div>
					<div class="col-lg-6">
						<button type="button" class="btn btn-success  btn-block simpan">
							Simpan
						</button>
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('index_js'); ?>
<script type="text/javascript">
	var selected = '';
	var scari = $("#search_cari"),
		sKec = $('#search_kec'),
		sKel = $('#search_kel'),
		sJenjang = $('#search_jenjang'),
		
		iKec = $('#iKec'),
		iKel = $('#iKel'),
		iAlamat = $('#iAlamat'),
		iNPSN = $('#iNPSN'),
		iNama = $('#iNama'),
		iJenjang = $('#iJenjang');          

	$(document).ready(function(){
		$('#dg').datagrid({
			    rowStyler:function(index,row){
			        if (row.baru == '1'){
			            return 'color:red;';
			        }
			    }
			});	  
	  	$('#dg').datagrid({url:"<?php echo base_url('index.php/data/getSekolahkatolik')?>",queryParams:{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			kel:sKel.val(),
			kec:sKec.val(),
			jenjang:sJenjang.val()
		},onError: function(index,row){
		    alert(row.message)
		  }});
		get_kel(sKel,sKec.val(),sKel.val());
		sKec.change(function(){
		   loaddata();
		   get_kel(sKel,sKec.val(),sKel.val());
	  	});
	  	iKec.change(function(){
		   get_kel(iKel,iKec.val(),iKel.val());
	  	});
	  	sKel.change(function(){
		   loaddata();
		  });
		sJenjang.change(function(){
		   loaddata();
	  	});
	  	
	  	
	  	
	})
	function get_kel(el,vk,vl){
	 $.post("<?php echo base_url();?>index.php/data/ajaxkel",{kec:vk,kel:vl},function(obj){
			el.html(obj);
		});	
	}
	function loaddata(){
		$('#dg').datagrid('load',{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			kel:sKel.val(),
			kec:sKec.val(),
			jenjang:sJenjang.val()
		});
	}

	function doSearch(ivalue,iname){
		$('#dg').datagrid('load',{
			icari: iname,
			ncari: ivalue,
			kel:sKel.val(),
			kec:sKec.val(),
			jenjang:sJenjang.val()
		});	
	}
	
	function tambahData(){
		cleardata();
		get_kel(iKel,iKec.val(),iKel.val());
    	$('#modalform').on('shown.bs.modal', function (e) {
//
			});
		$('#modalform').on('hidden.bs.modal', function (e) {
				$('html').css('overflow-y','auto');
			});
		$(".simpan").unbind('click');
		$(".simpan").click(function(){simpandata();})
		$('#modalform').modal({keyboard: false,backdrop: 'static'});
	}
	
	
	function simpandata(){
		npsn = iNPSN.val();
		if (npsn == ''){
			swal({title: "ERROR!!",text: 'NPSN harus diisi.',type: "error",});
			return false;
		} else
		if (npsn.length != 8){
			swal({title: "ERROR!!",text: 'NPSN harus 8 digit.',type: "error",});
			return false;
		} else 
		if (iNama.val() == ''){
			swal({title: "ERROR!!",text: 'Nama sekolah harus diisi.',type: "error",});
			return false;
		} 
		url = "<?php echo base_url('index.php/data/postSekolahkatolik')?>";
		var fd = new FormData($('form')[0]);
	  	 $.ajax({
		        url:  url,
		        type: 'POST',
		        data: fd,
		        async: false,
			    cache: false,
			    contentType: false,
			    processData: false,
		        dataType: 'JSON',
		        success: function (result) {
		        	if (result.status == 1){
						$('#modalform').modal('hide');
						$('#dg').datagrid('reload');
						cleardata();									
					} else
					if (result.status == 2){
						swal({title: "ERROR!!",text: 'Data Tidak Lengkap.',type: "error",});	
					}
					else {
						swal({title: "ERROR!!",text: 'Data tidak dapat disimpan.',type: "error",});	
					}
		        }
		    });
	}
    
    function cleardata(){
    	$('#idx').val('');
    			
		iKec.val("");
		iKel.val("");
		iAlamat.val("");
		iNPSN.val("");
		iNama.val("");
		iJenjang.val("");
		$("#cari_lokasi").val('');
	}

	function gantiData(idValue){
		
	    $('#dg').datagrid('unselectAll');
		$('#dg').datagrid('selectRow', idValue);
    	var row = $('#dg').datagrid('getSelected');
	    if (row){
	    	iKec.val(row.kecKode);
			iAlamat.val(row.sekolah_alamat);
			$('#idx').val(row.sekolah_id);
			iNPSN.val(row.sekolah_npsn);
			iNama.val(row.sekolah_nama);
			iJenjang.val(row.sekolah_jenjang);
			get_kel(iKel,row.kecKode,row.kelKode);
			$('#modalform').on('shown.bs.modal', function (e) {
//
			});
			$('#modalform').on('hidden.bs.modal', function (e) {
				$('html').css('overflow-y','auto');
			});
			$(".simpan").unbind('click');
			$(".simpan").click(function(){simpandata();})
			$('#modalform').modal({keyboard: false,backdrop: 'static'});
	    } else {
			swal({title: "Warning!!",text: 'Silakan Pilih Data Terlebih Dahulu.',type: "warning",});	
		}	
	}
	
	function hapusData(id,nama,jenjang){
			swal({
				  title:'',
				  text: 'Apakah anda ingin menghapus data ini?',
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  cancelButtonText: 'Tidak',
				  confirmButtonText: 'Ya'
				}).then(function () {
				  var jpost = $.post("<?php echo base_url('index.php/data/delSekolahkatolik')?>",
									{
										idx:id,
										nama:nama,
										jenjang:jenjang,

									},
									function(result){
										if (result.status == 1){
											swal({title: "SUKSES!!",text: 'Data Sukses Terhapus.',type: "success",});
											$('#dg').datagrid('reload');									
										} else
										if (result.status == 2){
											swal({title: "ERROR!!",text: 'Data Tidak Lengkap.',type: "error",});	
										}
										else {
											swal({title: "ERROR!!",text: 'Data Tidak Dapat Diproses.',type: "error",});
										}
									}
							,'json');
				jpost.fail(function(e){swal({title: "ERROR!!",text: 'Proses Gagal.',type: "error",})})
				})			
	}
	
	
	function formatlink(val,row){
		if (val == undefined || val == '' || val == null || val == 'x' || val == '-'){
			return '';
		} else {
			
			return '<a href="'+val+'" target="_blank"><span style="color:#5cb85c;cursor:pointer"><i class="fa fa-search-plus fa-lg fa-fw" aria-hidden="true"></i> Lihat File</span></a>';
		}
	}
	
	function formatganti(val,row,index){
			return '<button id="btnedit" class="btn btn-grid btn-warning btn-rounded" onclick="gantiData(\''+index+'\')"><span class="fa fa-pencil"></span></button>';
	}
	
	function formathapus(val,row,index){
			return '<button id="btndel" class="btn btn-grid btn-danger btn-rounded" onclick="hapusData(\''+row.sekolah_id+'\',\''+row.sekolah_nama+'\',\''+row.sekolah_jenjang+'\')"><span class="fa fa-trash""></span></button>';	
		
	}
	function formatstatus(val,row){
	    if (val == 2){
	    	hasil =  '<center><span style="color:red;text-align:center" title="Permohonan Ditolak."><i class="fa fa-times fa-lg fa-fw" aria-hidden="true"></i></span></center>';
	    } else  
	    if (val == 1){
	        hasil =  '<center><span style="color:green;" title="Permohonan Disetujui."><i class="fa fa-check fa-lg fa-fw" aria-hidden="true"></i></span></center>';
	    } else {
			hasil =  '<center><span style="color:blue;" title="Menunggu persetujuan."><i class="fa fa-clock-o fa-lg fa-fw" aria-hidden="true"></i></span></center>';
		}
		return hasil;
	}
</script>                              







