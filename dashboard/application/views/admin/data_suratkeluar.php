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
</style>
<h3 class="page-heading mb-4"><?php echo $title;?></h3>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
		<div class="card-body padding-15">
			<div class="row">        
				<div class="col-md-2 col-xs-12 padding-r-5 margin-t-10">
					<div class="form-group">
                          <label for="search_tgl">Periode Tgl.Keluar</label>
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
							<div data-options="name:'suratperihal'">Perihal</div>
							<div data-options="name:'kodesurat'">Kode Surat</div>
							<div data-options="name:'surattujuan'">Tujuan</div>
							<div data-options="name:'surattgl'">Tgl.Surat</div>
							<div data-options="name:'ket'">Keterangan</div>
							<div data-options="name:'nourut'">Nomor Urut</div>
							<div data-options="name:'typeNama'">Unit Kerja</div>
							<div data-options="name:'userNama'">Pengambil No.Surat</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
	            	<button id="btnadd" class="btn btn-primary btn-block" onclick="tambahData()"><i class="fa fa-plus" aria-hidden="true"></i>Tambah</button>
	       		</div>	
	       		<div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
	            	<button id="btnedit" class="btn btn-warning btn-block" onclick="gantiData()"><i class="fa fa-pencil" aria-hidden="true"></i>Ganti</button>
	       		</div>
				<div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10">
					<button class="btn btn-success btn-block margin-r-0" plain="true" onclick="exportdata()">
						<i class="fa fa-file-excel-o" aria-hidden="true"></i>
						Export Excel
					</button>
				</div>
			</div>
			 <div class="row">
			        <div class="col-md-12 easyui-layout padding-r-5 margin-t-10">
						<table id="dg" class="easyui-datagrid" style="height:550px"
					            url="" striped="true"  pagination="true"
					            rownumbers="false"  nowrap="false" singleSelect="true">
								<thead>
						            <tr>
										<th data-options="field:'nourut',width:150,align:'center'" formatter="formatno" sortable="true"><b>NOMOR URUT</b></th> 
										<th data-options="field:'tgl',width:120,align:'center'" sortable="true">TGL.KELUAR</th>
										<th data-options="field:'surattgl',width:120,align:'center'" sortable="true">TGL.SURAT</th>
										<th data-options="field:'kodesurat',width:100" sortable="true">KODE SURAT</th>
										<th data-options="field:'typeNama',width:200" sortable="true">UNIT KERJA</th>
										<th data-options="field:'suratperihal',width:250" sortable="true">PERIHAL</th>
										<th data-options="field:'surattujuan',width:250" sortable="true">TUJUAN</th>
										<th data-options="field:'userNama',width:200" sortable="true">PENGAMBIL NO.SURAT</th>
										<th data-options="field:'ket',width:300" sortable="true">KETERANGAN</th>
										<th data-options="field:'filedok',width:150,align:'center',formatter:formatdok" sortable="true">FILE SURAT</th>
						            </tr>
						        </thead>
						</table>
					</div>
			    </div>
		</div>
    </div>
</div>
</div>

<div id="modalsurat" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content "  style="border: 0">
			<div class="modal-header teal darken-3" style="border-radius: 0;background-color: #33414e;">
				<h4 class="modal-title white-text">
					Detail Surat Keluar
				</h4>
			</div>
			
			<div class="modal-body">
				<form role="form">
				<input id="idx" name="idx" type="hidden" class="form-text" style="display: none">
				<div class="row">
					<div  class="col-lg-6">
						<div class="form-group">
							<label>Nomor Urut</label>
							<input id="nourut" name="nourut" type="text" class="form-control form-span" ></input>
						</div>
						<div class="form-group">
							<label>Unit Kerja</label>      
								<select class="form-control form-text select selectpicker" id="iunitkerja" name="iunitkerja">
									<option value="">-Unit Kerja-</option>
									<?php echo optionUnitsurat(); ?>
								</select>
						</div>
						<div class="form-group">
							<label>Kode Surat</label>      
								<select class="form-control form-text select selectpicker"  id="ikodesurat" name="ikodesurat" data-live-search="true">
									<option value="">-Kode Surat-</option>
									<?php echo optionKodesurat(); ?>
								</select>
						</div>
					</div>
					<div  class="col-lg-6">
						<div class="form-group">
							<label>Tanggal Surat</label>
							<input id="itglsurat" name="itglsurat" type="text" class="form-control form-text datepicker">
						</div>
						<div class="form-group">
							<label>Perihal Surat</label>
							<input id="iperihalsurat" name="iperihalsurat" type="text" class="form-control form-text">
						</div>  
						<div class="form-group">
							<label>Tujuan Surat</label>
							<input id="itujuansurat" name="itujuansurat" type="text" class="form-control form-text">
						</div> 
						<div class="form-group head margin-t-15 margin-b-10">
							<span id="dok" style="display: none;"></span>
							<label for="inputdefault" class="head">
								<i class="fa fa-file fa-fw" aria-hidden="true"></i>
								Upload file surat (.pdf, Max size .<?php echo sizeupload(); ?> )
							</label>
							<input type="file" class="form-control form-text" id="hasildok" name="hasildok">
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<input id="iketsurat" name="iketsurat" type="text" class="form-control form-text">
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
	var sTgl = $('#search_tgl'),
		sTgl1 = $('#search_tgl1'),
		scari  = $('#search_cari');
	var tglnow = new Date();
	var tgl30 = addDay(tglnow, - 30);
	
	$(document).ready(function(){ 
		sTgl.datepicker( "setDate", tgl30 );
		sTgl1.datepicker( "setDate", tglnow );
		$('.selectpicker').selectpicker();
		$('#dg').datagrid({url:"<?php echo base_url('index.php/data/getSuratkeluar')?>",queryParams:{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			tgl:sTgl.val(),
			tgl1:sTgl1.val(),
			tipe:<?php echo $tipe; ?>
		},onError: function(index,row){
		    alert(row.message)
		  }});
	  	sTgl.change(function(){
		   loaddata();
	  	});
		sTgl1.change(function(){
		   loaddata();
	  	});

		$('#modalsurat').on('hidden.bs.modal', function (e) {
			cleardata();
		})
		$("#iunitkerja").change(function(){
			$("#ikodesurat option").hide();
			$("#ikodesurat option[data-chained='"+$(this).val()+"']").show();
			$('.selectpicker').selectpicker('refresh');
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
			tgl1:sTgl1.val(),
			tipe:<?php echo $tipe; ?>
		});
	}

	function doSearch(ivalue,iname){
		loaddata();
	}
	
	function gantiData(){
		var row = $('#dg').datagrid('getSelected');
		cleardata();
		if (row){
			$('#idx').val(row.noagenda);
			$('#nourut').html('<strong>'+row.nourut+'</strong>');
			$('#iunitkerja').val(row.unitkerja);
			$('#ikodesurat').val(row.kdsurat);
			$('#itglsurat').val(row.surattgl);
			$('#itglsurat').datepicker( "setDate", row.surattgl );
			$('#iperihalsurat').val(row.suratperihal);
			$('#itujuansurat').val(row.surattujuan);
			$('#iketsurat').val(row.ket);
			$('#dok').html(row.filedok);
			$('.selectpicker').selectpicker('refresh');
			$('#modalsurat').modal('toggle');
			$(".simpan").unbind('click');
			$(".simpan").click(function(){simpanData();})
		} else {
			swal({title: "Warning!!",text: 'Silakan Pilih Data Terlebih Dahulu.',type: "warning",});	
		}
	}

	function tambahData(){
		cleardata();
		$('#modalsurat').on('shown.bs.modal', function (e) {
			$('.selectpicker').selectpicker('refresh');
			$('#itglsurat').datepicker( "setDate", tglnow );
		})
		$('#modalsurat').modal('toggle');
		$(".simpan").unbind('click');
		$(".simpan").click(function(){simpanData();})
	}

	function simpanData(){
		var formData = new FormData($('form')[0]);
		formData.append('tipe', '<?php echo isset($tipe)?$tipe:'1'; ?>');
		formData.append('dok',$('#dok').html());
		$.ajax({
				url:  "<?php echo base_url('index.php/data/suratkeluarPost')?>",
				type: 'POST',
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				dataType: 'JSON',
				success: function (result) {
						if (result.success != ''){
							swal("Sukses", result.success, "success");
							$('.form-text').val('');
							$('#modalsurat').modal('hide');
							$('#dg').datagrid('reload');						
						} else
						if (result.error != ''){
							swal("Peringatan", result.error, "warning");
						} else {
							swal("Peringatan", "Gagal menyimpan File, pastikan ukuran dan format file sesuai!", "warning");
						}
				},
				error: function (r, s, e) {
					swal("Peringatan", "Gagal menyimpan!", "warning");
				}
		});
	}
	function cleardata(){
		$('.form-text').val('');
		$('.form-span').html('');
		$('#nourut').html('');
		$('#noagenda').hide();
		$('.select').val('');
		$('.select').selectpicker('refresh');
	}

	function formatno(val,row,index){
        return '<strong>'+val+'</strong>';
	}

	function formatdok(val,row){
		var url = '<?php echo viewdoc().str_replace('dashboard/','',base_url()) ; ?>';
		var dok = '';
		if (val != '' && val != null){
			dok = '<a target="_blank" href="'+url+val+'" class="btn btn-info" style="font-size:12px;border-radius: 50px;padding: 5px 10px;margin: 5px;" ><span class="fa fa-link fa-fw"></span>Link File</a>';
		}
		return dok;
	}

	function exportdata(){
		$.post('<?php echo base_url("index.php/export/excelSuratkeluar"); ?>',{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			tgl:sTgl.val(),
			tgl1:sTgl1.val(),
			tipe:<?php echo $tipe; ?>
		},function(result){
			exportToExcel(result,"Excel <?php echo $title;?>.xls");
		});
	}
</script>                              







