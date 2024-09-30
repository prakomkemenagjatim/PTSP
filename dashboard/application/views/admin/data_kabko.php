<h3 class="page-heading mb-4"><?php echo $title;?></h3>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
		<div class="card-body">
			<div class="row">      
			<div class="col-md-4 col-xs-6 padding-lr-5 margin-t-10">                                       
                    <select id="search_prov" class="form-control select">
                    	<?php option_prov();?>
                    </select>
                    
                </div>     
				<div class="col-md-4 padding-lr-5 margin-t-10">
				<input id = "search_cari" class="easyui-searchbox" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch" style="width:100%;height: 40px;"></input>
				<div id="mm" style="width:200px">
				<div data-options="name:'kabkoNama'">Kabupaten/Kota</div>
				<div data-options="name:'provNama'">Provinsi</div>
				<div data-options="name:'kabkoKode'">Kode Kab/Kota</div>
				<div data-options="name:'provKode'">Kode Prov</div>
				</div>
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
	            	<button id="btnadd" class="btn btn-primary btn-block"onclick="prosesData(0)"><i class="fa fa-plus" aria-hidden="true"></i>Tambah</button>
	       		</div>	
	       		<div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
	            	<button id="btnedit" class="btn btn-warning btn-block" onclick="prosesData(1)"><i class="fa fa-pencil" aria-hidden="true"></i>Ganti</button>
	       		</div>
	       		<div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
	            	<button id="btndel" class="btn btn-danger btn-block" onclick="prosesData(2)"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</button>
	       		</div>
			</div>
			<div class="row">
		        <div class="col-md-12  padding-lr-5 margin-t-10 easyui-layout">
					<table id="dg" class="easyui-datagrid" style="height:400px"
				            url="" striped="true"  pagination="true"
				            rownumbers="true"  nowrap="false" singleSelect="true">
							<thead>
					            <tr>
					                <th data-options="field:'provKode',width:100,align:'center'" sortable="true">KODE PROV</th>
					                <th data-options="field:'kabkoKode',width:120,align:'center'" sortable="true">KODE KAB/KOTA</th>
					                <th data-options="field:'provNama',width:200" sortable="true">PROVINSI</th>
					                <th data-options="field:'kabkoNama',width:200" sortable="true">KABUPATEN/KOTA</th>          
					            </tr>
					        </thead>
					</table>
				</div>
			</div>
		</div>
    </div>
</div>
</div>
<div id="modalkabko" class="modal fade" role="dialog">
<div class="modal-dialog">
	<div class="modal-content " style="border: 0">
		<div class="modal-header modal-header-primary indigo darken-4" style="border-radius: 0;">
			<h4 class="modal-title white-text">
				Detail <?php echo $title;?>
			</h4>
		</div>
		<div class="modal-body">
			
					<form role="form">
					<input id="idx" name="idx" type="password" class="form-control" style="display: none">
					<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
	                        <label>Provinsi</label>      
	                            <select class="form-control select"  id="iProv" name="iProv">
	                                <?php option_prov();?>
	                            </select>
                    	</div>
                        <div class="form-group">
                            <label>Kode Kabupaten/Kota (2 digit)</label>
                            <input id="iKabkokode" name="iKabkokode"  maxlength="2" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Kabupaten/Kota (Awalan KAB. / KOTA)</label>
                            <input id="iKabkonama" name="iKabkonama" type="text" class="form-control">
                        </div>
                     </div>			
					</div>                                 
                    </form>
             </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary  pull-right margin-l-5" data-dismiss="modal">
					Batal
				</button>
				<button type="button" class="btn btn-success  pull-right simpan">
					Simpan
				</button>
			</div>
	</div>
</div>
</div>
<?php $this->load->view('index_js'); ?>
<script type="text/javascript">
	var selected = '';
	var scari = $("#search_cari"),
		sProv = $('#search_prov'),
		iProv = $('#iProv'),
		iKabkokode = $('#iKabkokode'),
		iKabkonama = $('#iKabkonama'),
		iLat = $('#iLat'),
		iLng = $('#iLng');
	
	$(document).ready(function(){	  
	  $('#dg').datagrid({url:"<?php echo base_url('index.php/data/getkabko')?>",queryParams:{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			prov:sProv.val()
		},onError: function(index,row){
		    alert(row.message)
		  }});
		sProv.change(function(){
		   loaddata();
	  	});
		get_prov(iProv,iProv.val());
		//iProv.selectpicker('refresh');
	})
		function get_prov(el,id){
		 $.post("<?php echo base_url();?>index.php/data/ajaxprov",{prov:id},function(obj){
				el.html(obj);
				//el.selectpicker('refresh');
			});	
	}	
	function loaddata(){
		$('#dg').datagrid('load',{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			prov:sProv.val()
		});
	}

	function doSearch(ivalue,iname){
		$('#dg').datagrid('load',{
			icari: iname,
			ncari: ivalue,
			prov:sProv.val()
		});	
	}
	function prosesData(id)
	{
		if (id == 2){
			var row = $('#dg').datagrid('getSelected');
			if (row){
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
				  var jpost = $.post("<?php echo base_url('index.php/data/delKabko')?>",
									{
										idx:row.kabkoId
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
			} else {
				swal({title: "Warning!!",text: 'Silakan Pilih Data Terlebih Dahulu.',type: "warning",});	
			}			
		} else {
			cleardata();
			if (id == 1){
				var row = $('#dg').datagrid('getSelected');
			    if (row){
					$('#idx').val(row.kabkoId);
					$('#iKabkokode').val(row.kabkoKode);
					$('#iKabkonama').val(row.kabkoNama);
					$('#iLat').val(row.kabkoLat);
					$('#iLng').val(row.kabkoLng);
					
					$('#modalkabko').on('shown.bs.modal', function (e) {
						setMarker(row.kabkoLat,row.kabkoLng);
					});
					get_prov(iProv,row.provKode);
					$(".simpan").unbind('click');
					$(".simpan").click(function(){simpandata(id);})
					$('#modalkabko').modal('toggle');
			    } else {
					swal({title: "Warning!!",text: 'Silakan Pilih Data Terlebih Dahulu.',type: "warning",});	
				}
		    } else {
		    	$('#modalkabko').on('shown.bs.modal', function (e) {
					
					});
				$(".simpan").unbind('click');
				$(".simpan").click(function(){simpandata(id);})
				$('#modalkabko').modal('toggle');
			}
		    
		}
	}
	
	function simpandata(id){
		if ($('#iKabkokode').val().length != 2)
		{
			swal({title: "ERROR!!",text: 'Kode Kabupaten/Kota min/max 2 digit.',type: "error",});	
			return;
		}
		if (Number($('#iKabkokode').val()) == 0)
		{
			swal({title: "ERROR!!",text: 'Kode Kabupaten/Kota tidak boleh 0.',type: "error",});	
			return;
		}
	  	url = "<?php echo base_url('index.php/data/postKabko')?>";
		var jpost = $.post(url,
							{
								iKabkokode:$('#iKabkokode').val(),
								iKabkonama:$('#iKabkonama').val(),
								iProv:$('#iProv').val(),
								idx:$('#idx').val()
							},
							function(result){
								if (result.status == 1){
									$('#modalkabko').modal('hide');
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
					,'json');
		jpost.fail(function(e){swal({title: "ERROR!!",text: 'Proses Gagal.',type: "error",});})
	}
    
    function cleardata(){
    	$('#idx').val('');
		$('#iKeckode').val('');
		$('#iKecnama').val('');
		$('#iKabko').val('');
	}
</script>                              







