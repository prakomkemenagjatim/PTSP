<h3 class="page-heading mb-4"><?php echo $title;?></h3>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
		<div class="card-body padding-15">
			<div class="row">        
				<div class="col-md-2 col-xs-12 padding-r-5 margin-t-10">
					<div class="form-group">
                          <label for="search_tgl">Periode</label>
                          <input id="search_tgl" name="search_tgl" type="text" value="" class="form-control input-sm datepicker " placeholder="Tanggal">
                    </div>
                </div>
				<div class="col-md-2 col-xs-12 padding-r-5 margin-t-10">
					<div class="form-group">
                          <label for="search_tgl1">s/d</label>
                          <input id="search_tgl1" name="search_tgl1" type="text" value="" class="form-control input-sm datepicker " placeholder="Tanggal">
                    </div>
                </div>
				<div class="col-md-4 padding-r-5 margin-t-10">
					<div class="form-group">
						<label for="search_cari">Pencarian</label>
						<input id = "search_cari" class="easyui-searchbox" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch" style="width:100%;height: 35px;"></input>
						<div id="mm" style="width:200px">
							<div data-options="name:'ikm_vt_layanan'">Nilai</div>
							<div data-options="name:'ikm_saran'">Saran</div>
						</div>
					</div>
				</div>
				<div class="col-md-2 padding-r-5 margin-t-10">
					<div class="form-group">
						<label>Export Excel</label>
						<button class="btn btn-success btn-block margin-r-0" plain="true" onclick="exportdata()">
							<i class="fa fa-file-excel-o" aria-hidden="true"></i>
							Export
						</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 easyui-layout padding-r-5 margin-t-10">
					<table id="dg" class="easyui-datagrid" style="height:400px"
							url="" striped="true"  pagination="true"
							rownumbers="true"  nowrap="false" singleSelect="true">
							<thead>
								<tr>
									<th data-options="field:'tgl',width:120,align:'center'" sortable="true">TANGGAL VOTE</th> 
									<th data-options="field:'ikm_vt_layanan',width:100,align:'center'" sortable="true">NILAI</th>
									<th data-options="field:'ikm_vt',width:100,formatter:formatvote" sortable="true">VOTE</th>
									<th data-options="field:'ikm_saran',width:500" sortable="true">SARAN</th>
								</tr>
							</thead>
					</table>
				</div>
			</div>
		</div>
    </div>
</div>
</div>
<?php $this->load->view('index_js'); ?>
<script type="text/javascript">
	var selected = '';
	var sTgl = $('#search_tgl'),
		sTgl1 = $('#search_tgl1'),
		scari  = $('#search_cari');
	var tglnow = new Date();
	var tgl30 = addDay(tglnow, - 30);
	
	$(document).ready(function(){ 
		sTgl.datepicker( "setDate", tgl30 );
		sTgl1.datepicker( "setDate", tglnow );
		sTgl.change(function(){loaddata();})
		sTgl1.change(function(){loaddata();})
		$('#dg').datagrid({url:"<?php echo base_url('index.php/data/getIkm')?>",queryParams:{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			tgl:sTgl.val(),
			tgl1:sTgl1.val()
		},onError: function(index,row){
		    alert(row.message)
		  }});
	  	sTgl.change(function(){
		   loaddata();
	  	});
	  	
	})
	function addDay(date, days) {
		var result = new Date();
		result.setDate(date.getDate() + days);
		return result;
	}
	function loaddata(){
		$('#dg').datagrid('load',{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			tgl:sTgl.val(),
			tgl1:sTgl1.val()
		});
	}
	function exportdata(){
		$.post('<?php echo base_url("index.php/export/excelikm"); ?>',{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			tgl:sTgl.val(),
			tgl1:sTgl1.val()
		},function(result){
			exportToExcel(result,"Excel IKM.xls");
		});
	}
	function doSearch(ivalue,iname){
		loaddata();
	}
	
	function formatvote(val,row){
		$vtstr = ['','Sangat Tidak Puas','Tidak Puas','Cukup Puas', 'Puas', 'Sangat Puas'];
		return $vtstr[row.ikm_vt_layanan];

	}
</script>                              







