<h3 class="page-heading mb-4"><?php echo $title;?></h3>
<div class="row">
  <div class="col-md-12 stretch-card">
        <div class="card">
		<div class="card-body">
			<div class="row">
                <div class="col-md-6 col-xs-6 padding-lr-5 margin-t-10">
				<input id="search_cari" class="easyui-searchbox padding-r-5" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch" style="width:100%;height: 40px;"></input>
				<div id="mm" style="width:200px">
					<div data-options="name:'travelnama'">Nama</div>
					<div data-options="name:'travelalamat'">Alamat</div>
					<div data-options="name:'travelijin'">Nomor SK.Ijin</div>
					<div data-options="name:'traveltgl'">Tanggal SK</div>
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
			</div>
			<div class="row">
				<div class="col-md-12 padding-lr-5 margin-t-10 easyui-layout">
					<table id="dg" class="easyui-datagrid" style="height:400px"
					        url="" striped="true"
					        toolbar="#toolbar" pagination="true"
					        rownumbers="true"  nowrap="false" singleSelect="true">
							<thead>
					            <tr>
					                <th data-options="field:'travelnama',width:300" sortable="true">NAMA TRAVEL</th>
									<th data-options="field:'travelijin',width:300" sortable="true">NO.SK IJIN</th>
									<th data-options="field:'traveltgl',width:150" sortable="true">TGL.SK IJIN</th>
					                <th data-options="field:'travelalamat',width:300" sortable="true">ALAMAT TRAVEL</th>
					                <th data-options="field:'travelstatus',width:120,formatter:function(val){
					                	if (val == 0){
											return 'Tidak Aktif';
										} else if (val == 1){
											return 'Aktif';
										}
					                }" sortable="true">STATUS</th>
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
				Detail Travel
			</h4>
		</div>
		
		<div class="modal-body">
			<form role="form">
			<input id="idx" name="idx" type="hidden" class="form-txt" style="display: none">
			<div class="row">
				<div class="col-lg-12">
                    <div class="form-group">
                        <label>Nama Travel</label>
                        <input id="iNama" name="iNama" type="text" class="form-control form-txt">
                    </div>
                    <div class="form-group">
                        <label>Nomor SK.Ijin Travel</label>
                        <input id="iSK" name="iSK" type="text" class="form-control form-txt">
                    </div>
					<div class="form-group">
							<label>Tanggal SK.Ijin Travel</label>
							<input id="iTgl" name="iTgl" type="text" class="form-control form-text datepicker">
						</div>
					<div class="form-group">
                        <label>Alamat Travel</label>
                        <input id="iAlamat" name="iAlamat" type="text" class="form-control form-txt">
                    </div>
                    <div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Status</label>      
									<select class="form-control select"  id="iStatus" name="iStatus">
										<option value="1">Aktif</option>
										<option value="0">Tidak Aktif</option>
									</select>
							</div>
						</div>
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
	  
	  $('#dg').datagrid({url:"<?php echo base_url('index.php/data/getTravel')?>",queryParams:{
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
		// if (id == 1){
		// 	$('#iNama').attr('readonly',true);
		// 	$('#iAlamat').attr('readonly',true);
		// } else {
		// 	$('#iNama').attr('readonly',false);
		// 	$('#iAlamat').attr('readonly',false);
		// }
		
		if (id == 1){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#modaldata').modal('toggle');
				$('#idx').val(row.travelid);
				$('#iNama').val(row.travelnama);
				$('#iAlamat').val(row.travelalamat);
				$('#iSK').val(row.travelijin);
				$('#iTgl').val(row.traveltgl);
				$('#iStatus').val(row.travelstatus);
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
	  	url = "<?php echo base_url('index.php/data/postTravel')?>";
		var jpost = $.post(url,
							{
								iNama:$('#iNama').val(),
								iAlamat:$('#iAlamat').val(),
								iSK:$('#iSK').val(),
								iTgl:$('#iTgl').val(),
								iStatus:$('#iStatus').val(),
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
		$('#iStatus').val(1);
	}
</script>                              







