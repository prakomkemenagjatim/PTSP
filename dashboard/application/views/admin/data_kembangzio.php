<h3 class="page-heading mb-4"><?php echo $title;?></h3>
<div class="row">
  <div class="col-md-12 stretch-card">
        <div class="card">
		<div class="card-body">
			<div class="row">
                <div class="col-md-6 col-xs-6 padding-lr-5 margin-t-10">
				<input id="search_cari" class="easyui-searchbox padding-r-5" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch" style="width:100%;height: 40px;"></input>
				<div id="mm" style="width:200px">
					<div data-options="name:'kategori'">Kategori</div>
					
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
	            	<button id="btnhapus" class="btn btn-danger btn-block" onclick="hapusData()"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</button>
	       		</div>
			</div>
			<div class="row">
				<div class="col-md-12 padding-lr-5 margin-t-10 easyui-layout">
					<table id="dg" class="easyui-datagrid" style="height:400px"
					        url="" striped="true"
					        toolbar="#toolbar" pagination="true"
					        rownumbers="true"  nowrap="false" singleSelect="true">
							<thead>
					            <tr>
					                <th data-options="field:'kategori',width:300" sortable="true">KATEGORI</th>
					                <th data-options="field:'linkdownload',width:150,align:'center',formatter:formatlink" sortable="true">LINK DOWNLOAD</th>
									<th data-options="field:'ket',width:300" sortable="true">KETERANGAN</th>
					            </tr>
					        </thead>
					</table>
				</div>
			</div>
		</div>
    </div>
</div>
</div>

<div id="modaldata" class="modal fade" role="dialog">
<div class="modal-dialog ">
	<div class="modal-content "  style="border: 0">
		<div class="modal-header teal darken-3" style="border-radius: 0;background-color: #33414e;">
			<h4 class="modal-title white-text">
				Detail Data
			</h4>
		</div>
		
		<div class="modal-body">
			<form role="form">
			<input id="idx" name="idx" type="password" class="form-control form-txt" style="display: none">
			<div class="row">
				<div class="col-lg-12">
                    <div class="form-group">
                        <label>Kategori</label>
                        <input id="iKategori" name="iKategori" type="text" class="form-control form-txt">
                    </div>
                    <div class="form-group">
                        <label>Link Download</label>
                        <input id="iLink" name="iLink" type="text" class="form-control form-txt">
                    </div>
					<div class="form-group">
                        <label>Keterangan</label>
                        <input id="iKet" name="iKet" type="text" class="form-control form-txt">
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
		btncari = $('#btncari');
	$(document).ready(function(){ 
	  
	  $('#dg').datagrid({url:"<?php echo base_url('index.php/data/getKembangzio')?>",queryParams:{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			},onError: function(index,row){
	    		alert(row.message)
	  }});
		btncari.click(function(){
		   loaddata();
		});
	})

	function loaddata(){
		$('#dg').datagrid('load',{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue")
		});
	}
	
	function doSearch(ivalue,iname){
		$('#dg').datagrid('load',{
			icari: iname,
			ncari: ivalue
		});
		
	}

	function prosesData(id)
	{
		cleardata();
		if (id == 1){
			$('#iNama').attr('readonly',true);
			$('#iAlamat').attr('readonly',true);
		} else {
			$('#iNama').attr('readonly',false);
			$('#iAlamat').attr('readonly',false);
		}
		
		if (id == 1){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#modaldata').modal('toggle');
				$('#idx').val(row.id);
				$('#iKategori').val(row.kategori);
				$('#iLink').val(row.linkdownload);
				$('#iKet').val(row.ket);
				$(".simpan").unbind('click');
				$(".simpan").click(function(){simpandata(id);})
			} else {
				swal({title: "Warning!!",text: 'Silakan Pilih Data Terlebih Dahulu.',type: "warning",});	
			}
		} else {
			$('#modaldata').modal('toggle');
			$(".simpan").unbind('click');
			$(".simpan").click(function(){simpandata(id);})
		}
	}
	
	function simpandata(id){
	  	url = "<?php echo base_url('index.php/data/postKembangzio')?>";
		var jpost = $.post(url,
							{
								iKategori:$('#iKategori').val(),
								iLink:$('#iLink').val(),
								iKet:$('#iKet').val(),
								idx:$('#idx').val()
							},
							function(result){
								if (result.status == 1){
									$('#modaldata').modal('hide');
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
    	$('.form-txt').val('');
	}

	function formatlink(val,row){
		return '<a href="'+val+'" target="_blank">Link Download</a>';
	}

	function hapusData(id)
	{
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
				  var jpost = $.post("<?php echo base_url('index.php/data/delKembangzio')?>",
									{
										idx:row.id
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
	}
</script>                              







