<script src="<?php echo base_url('assets/tinymce/tinymce.min.js')?>"></script> 
<h3 class="page-heading mb-4"><?php echo $title;?></h3>
<div class="row">
  <div class="col-md-12 stretch-card">
        <div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-2 col-xs-12 padding-r-5 margin-t-10">
					<div class="form-group">
                          <label for="search_tgl"><sup>Periode</sup></label>
                          <input id="search_tgl" name="search_tgl" type="text" value="" class="form-control input-sm datepicker " placeholder="Tanggal">
                    </div>
                </div>
				<div class="col-md-2 col-xs-12 padding-r-5 margin-t-10">
					<div class="form-group">
                          <label for="search_tgl1"><sup>s/d</sup></label>
                          <input id="search_tgl1" name="search_tgl1" type="text" value="" class="form-control input-sm datepicker " placeholder="Tanggal">
                    </div>
                </div>
				<div class="col-md-3 col-xs-12 padding-r-5 margin-t-10">
					<div class="form-group">
                          <label for="search_tgl1"><sup>Status</sup></label>
                          <select class="form-control form-text input-sm" id="search_status" name="search_status">
							  	<option value="">- Semua status  -</option>
								<?php echo optionStatus(); ?>
							</select>
                    </div>
                </div>
                <div class="col-md-4 padding-r-5 margin-t-10">
					<div class="form-group">
						<label for="search_cari"><sup>Kata Kunci Pencarian</sup></label>
						<input id = "search_cari" class="easyui-searchbox" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch" style="width:100%;height: 35px;"></input>
						<div id="mm" style="width:200px">
							<div data-options="name:'noreg'">Nomor Layanan</div>
							<div data-options="name:'suratno'">Nomor PT/CV</div>
							<div data-options="name:'suratinstansi'">Nomor SPK</div>
							<div data-options="name:'pemohonnama'">Nama Pemohon</div>
							<div data-options="name:'pemohonnowa'">No. WA/HP Pemohon</div>
						</div>
					</div>
				</div>
        	</div>
				<div class="row">
				<div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
	            	<button class="btn btn-primary btn-block" onclick="progressLay(0)"><i class="fa fa-pencil" aria-hidden="true"></i> Detail Layanan</button>
	       		</div>
				<div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10">
					<button class="btn btn-success btn-block margin-r-0" plain="true" onclick="exportdata()">
						<i class="fa fa-file-excel-o" aria-hidden="true"></i>
						Export Excel
					</button>
				</div>	
			</div>
			<div class="row">
				<div class="col-md-12 padding-lr-5 margin-t-10 easyui-layout">
					<table id="dg" class="easyui-datagrid" style="height:550px"
					        url="" striped="true"
					        toolbar="#toolbar" pagination="true"
					        rownumbers="true"  nowrap="false" singleSelect="true" checkOnSelect="true", selectOnCheck="true">
							<thead>
					            <tr>
								<th  rowspan="2" data-options="field:'ck',checkbox:true"></th>
									<th rowspan="2" data-options="field:'noreg',width:90,align:'center'" sortable="true">NOMOR LAYANAN</th>
									<th rowspan="2" data-options="field:'tgl',width:120,align:'center'" sortable="true">TANGGAL</th>
									<th rowspan="2" data-options="field:'hasildok',width:150,align:'center',formatter:formatdok" sortable="true">LINK DOK</th>
					                <th colspan="2">STATUS</th>
									<th rowspan="2" data-options="field:'suratno',width:200" sortable="true">NOMOR PT/CV</th>
									<th rowspan="2" data-options="field:'suratinstansi',width:300" sortable="true">NOMOR SPK</th>
									<th rowspan="2" data-options="field:'pemohonnama',width:300" sortable="true">NAMA PEMOHON</th>
									<th rowspan="2" data-options="field:'pemohonnowa',width:200" sortable="true">NO.HP/WA PEMOHON</th>
					            </tr>
								<tr>
									<th data-options="field:'nmstatus',width:150" sortable="true">STATUS</th>
									<th data-options="field:'ket',width:200" sortable="true">KET</th>
								</tr>
					        </thead>
					</table>
				</div>
			</div>
				<style>
					#box1 {
						display: flex;
						align-items: center;
						font-size: 12px;
					}
					div#box1:before {
						content: '';
						background-color: #fff;
						border-radius: 50%;
						border-width: 5px;
						height: 20px;
						width: 20px;
					}
					#box2 {
						display: flex;
						align-items: center;
						font-size: 12px;
					}
					div#box2:before {
						content: '';
						background-color: #f0f4c3;
						border-radius: 50%;
						border-width: 5px;
						height: 20px;
						width: 20px;
					}
					#box3 {
						display: flex;
						align-items: center;
						font-size: 12px;
					}
					div#box3:before {
						content: '';
						background-color: #bbdefb;
						border-radius: 50%;
						border-width: 5px;
						height: 20px;
						width: 20px;
					}
					#box4 {
						display: flex;
						align-items: center;
						font-size: 12px;
					}
					div#box4:before {
						content: '';
						background-color: #ffcdd2;
						border-radius: 50%;
						border-width: 5px;
						height: 20px;
						width: 20px;
					}
					#box5 {
						display: flex;
						align-items: center;
						font-size: 12px;
					}
					div#box5:before {
						content: '';
						background-color: #c8e6c9;
						border-radius: 50%;
						border-width: 5px;
						height: 20px;
						width: 20px;
					}
				</style>
			<div class="row">
				<div class="col-md-12 margin-t-10" style="font-size: 12px;">
					<strong>Keterangan warna baris pada tabel:</strong>
				</div>
				<div class="col-md-12 margin-t-5">
					<div id="box1">&nbsp;Menunggu Persetujuan</div>
				</div>
				<div class="col-md-12 margin-t-5">
					<div id="box2">&nbsp;Diterima</div>
				</div>
				<div class="col-md-12 margin-t-5">
					<div id="box3">&nbsp; Masih Dalam Proses</div>
				</div>
				<div class="col-md-12 margin-t-5">
					<div id="box4">&nbsp; Ditolak</div>
				</div>
				<div class="col-md-12 margin-t-5">
					<div id="box5">&nbsp; Selesai</div>
				</div>
			</div>
			 
		</div>
    </div>
</div>
</div>


<div id="modalinputdata" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-lg" style="width: 100%;">
		<div class="modal-content">
			<div class="modal-header  bg-dark modal-header-primary border-btm">
				<!-- <button type="button" class="close red-text" data-dismiss="modal" style="font-size: 40px;opacity: 1;text-shadow: none;line-height: 28px;">&times;</button> -->
				<h4 class="modal-title white-text">
					<?php echo $caption ?>
				</h4>
			</div>
			<div class="modal-body">
			<div class="row">
					<div class="col-lg-12">
							<div class="row">
								<div id="panelinp" class="col-lg-6">
									<div class="panel-info margin-b-10 padding-10">
										<div class="row margin-b-15">
											<div class="col-lg-12 padding-l-5">
												<div class="form-group head margin-t-15 margin-b-10">
													<label for="inputdefault" class="head">
														<i class="fa fa-address-card fa-fw" aria-hidden="true"></i>
														Data Layanan
													</label>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group margin-b-15">
													<label for="inputdefault">
														Nomor Layanan
													</label>
													<div class="row">
														<div class="col-lg-12">
															<span id="noreg" class="form-control frmtxt"></span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group margin-b-15">
													<label for="inputdefault">
														Tanggal Layanan
													</label>
													<div class="row">
														<div class="col-lg-12">
															<span id="tgl" class="form-control frmtxt">dadada sds dsa d</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group margin-b-15">
													<label for="inputdefault">
														Nama Pemohon/Pengirim
													</label>
													<div class="row">
														<div class="col-lg-12">
															<span id="nama" name="nama" class="form-control frmtxt"></span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group margin-b-15">
													<label for="inputdefault">
														Nomor WA/HP Pemohon/Pengirim
													</label>
													<div class="row">
														<div class="col-lg-12">
															<span id="nowa" name="nowa" class="form-control frmtxt"></span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group margin-b-15">
													<label for="inputdefault">
														Nomor PT/CV
													</label>
													<div class="row">
														<div class="col-lg-12">
															<span id="nomorsurat" name="nomorsurat" class="form-control frmtxt"></span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group margin-b-15">
													<label for="inputdefault">
														Nomor SPK
													</label>
													<div class="row">
														<div class="col-lg-12">
															<span id="instansisurat" name="instansisurat" class="form-control frmtxt"></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="paneldok" class="col-lg-6">
									<form id="frmdok" action="" method="POST" enctype="multipart/form-data" >
										<div class="col-lg-12 margin-t-15  padding-l-5 margin-b-10 nodispo" style="margin-top: 50px !important;">
											<div class="form-group head margin-t-15 margin-b-10">
												<label for="inputdefault" class="head">
													<i class="fa fa-hourglass-start  fa-fw" aria-hidden="true"></i>
													Status
												</label>
											</div>
										</div>
										<div class="col-lg-12 nodispo">
											<div class="form-group">   
												<select class="form-control select"  id="status" name="status">
													<?php echo optionStatus(); ?>
												</select>
											</div>
										</div>
										
										<div class="col-lg-12 padding-l-5 margin-b-10 nodispo" style="margin-top: 50px !important;">
											<div class="form-group head margin-t-15 margin-b-10">
												<span id="dok" style="display: none;"></span>
												<label for="inputdefault" class="head">
													<i class="fa fa-file fa-fw" aria-hidden="true"></i>
													Link Dokumen
												</label>
											</div>
										</div>
										<div class='col-sm-12 nodispo'>
											<div class="form-group">
											<input type="text" class="form-control form-text" id="hasildok" name="hasildok">
											</div>    
										</div>
										<div class="col-lg-12 margin-t-15  padding-l-5 margin-b-10 nodispo" style="margin-top: 50px !important;">
											<div class="form-group head margin-t-15 margin-b-10">
												<label for="inputdefault" class="head">
													<i class="fa fa-file-o  fa-fw" aria-hidden="true"></i>
													Keterangan <i>(internal & eksternal)</i>
												</label>
											</div>
										</div>
										<div class="col-lg-12 nodispo">
												<div class="form-group margin-b-15">
													<div class="row">
														<div class="col-lg-12">
															<input type="text" class="form-control form-text" id="ket" name="ket">
														</div>
													</div>
												</div>
											</div>
									</form>
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn pull-right margin-l-5 btn-danger  btn-lg" data-dismiss="modal">
				<i class="fa fa-times" aria-hidden="true"></i> Tutup
				</button>
				<button type="button" class="btn btn-success  pull-right  btn-lg simpan nodispo" onclick="simpandata();return false;">
				<i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan
				</button>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('index_js'); ?>
<script type="text/javascript">
	var selected = '';
	var baseurl = '<?php echo str_replace('dashboard/','',base_url()) ; ?>';
	var sTgl = $('#search_tgl'),
		sTgl1 = $('#search_tgl1'),
		scari  = $('#search_cari'),
		sStatus  = $('#search_status'),
		btncari = $('#btncari'),
		kd='<?php echo $kd; ?>',
		kd1='<?php echo $kd1; ?>';
		var tglnow = new Date();
	var tgl30 = addDay(tglnow, - 30);
	$(document).ready(function(){ 
		sStatus.change(function(){loaddata();})
		sTgl.datepicker( "setDate", tgl30 );
		sTgl1.datepicker( "setDate", tglnow );
		sTgl.change(function(){loaddata();})
		sTgl1.change(function(){loaddata();})
		$('#dg').datagrid({
			rowStyler:function(index,row){
				if (row.status == 2){
					return 'background-color:#f0f4c3;';
				} else
				if (row.status == 3){
					return 'background-color:#bbdefb;';
				} else if (row.status == 4){
					return 'background-color:#ffcdd2;';
				} else if (row.status == 5){
					return 'background-color:#c8e6c9;';
				}
			}
		});
	  $('#dg').datagrid({url:"<?php echo base_url('index.php/data/getPengadaan')?>",queryParams:{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			kd:kd,
			kd1:kd1,
			tgl:sTgl.val(),
			tgl1:sTgl1.val(),
			status:sStatus.val()
			},onError: function(index,row){
	    		alert(row.message)
	  }});
		btncari.click(function(){
		   loaddata();
		});
		$("#modalinputdata").on("hidden.bs.modal", function () { 
			<?php if ($userSess['userType'] <= 1 ){?>
				$("input[name='disposisi[]']").prop('checked',false);	
			<?php } ?>
		});
		tinymce.init({
					selector:'textarea.tiny',
					height: 300,
					skin: "oxide-dark",
    				content_css: "dark",
					plugins: "lists advlist | link | code",
					toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | link | code"
				});
	})

	function loaddata(){
		$('#dg').datagrid('load',{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			kd:kd,
			kd1:kd1,
			tgl:sTgl.val(),
			tgl1:sTgl1.val(),
			status:sStatus.val()
		});
	}
	
	function doSearch(ivalue,iname){
		loaddata();
	}

	function formatlink(val,row){
		
		var dok = '';
		if (val != '' && val != null){
			dok = '<a target="_blank" href="'+baseurl+val+'" class="btn btn-info" style="font-size:12px;border-radius: 50px;padding: 5px 10px;margin: 5px;" ><span class="fa fa-link fa-fw"></span>Link File</a>'
		}
		return dok;
	}

	function formatdok(val,row){
		var dok = '';
		var urldok = '';
		if (val != '' && val != null){
			var res = val.substring(0, 4);
			if (res == 'http'){
				urldok = val;
			} else {
				urldok = baseurl+val;
			}
			dok = '<a target="_blank" href="'+urldok+'" class="btn btn-info" style="font-size:12px;border-radius: 50px;padding: 5px 10px;margin: 5px;" ><span class="fa fa-link fa-fw"></span>Link Dok</a>';
		}
		return dok;
	}

	function addDay(date, days) {
		var result = new Date();
		result.setDate(date.getDate() + days);
		return result;
	}

	function progressLay(dispo){
		var row = $('#dg').datagrid('getSelected');
		if (row){
			hitlay(row.noreg,row.disposisi_dari,row.disposisi_ke);
			$('#noreg').html(row.noreg);
			$('#tgl').html(row.tgl);
			$('#nama').html(row.pemohonnama);
			$('#nowa').html(row.pemohonnowa);
			$('#nomorsurat').html(row.suratno);
			$('#instansisurat').html(row.suratinstansi);
			$('#status').val(row.status);
			$('#ket').val(row.ket);
			var val = row.hasildok;
			var urldok = '';
			if (val != '' && val != null){
				var res = val.substring(0, 4);
				if (res == 'http'){
					urldok = val;
				} else {
					urldok = baseurl+val;
				}
			}
			$('#dok').html(urldok);
			$('#hasildok').val(urldok);
			$('#modalinputdata').modal({backdrop: 'static',keyboard: false});
		} else {
			swal("Peringatan", 'Silakan pilih data terlebih dahulu.', "warning");
		}
		
	}
	function hitlay(noreg,dispo1,dispo2){
		$.post("<?php echo base_url('index.php/data/hitlay')?>",{noreg:noreg,dispo1:dispo1,dispo2:dispo2},function(){})
	}
	function simpandata(){
		var formData = new FormData($('#frmdok')[0]);
		formData.append('noreg',$('#noreg').html());
		formData.append('kd', '<?php echo isset($kd)?$kd:''; ?>');
		formData.append('kd1', '<?php echo isset($kd1)?$kd1:''; ?>');
		formData.append('dok',$('#dok').html());
		$.ajax({
				url:  "<?php echo base_url('index.php/data/smPost')?>",
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
							$('#modalinputdata').modal('hide');
							$('#dg').datagrid('reload');	
							getlayjml();					
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
	function simpanket(){
		$.post("<?php echo base_url('index.php/data/ketlayPost')?>",{
			kd:'<?php echo isset($kd)?$kd:''; ?>',
			kd1:'<?php echo isset($kd1)?$kd1:''; ?>',
			konten:tinymce.get('iketlay').getContent()
		},function(result){
			var msg = result.msg;
			if (result.status == 1){
				swal({title: "SUKSES!!",text: msg,type: "success",});									
			} else
			if (result.status == 2){
				msg='Data Tidak Lengkap.';
				if (result.msg != ''){
					msg = result.msg;
				}
				swal({title: "ERROR!!",text: msg,type: "error",});	
			} 
			else {
				swal({title: "ERROR!!",text: 'Data tidak dapat disimpan.',type: "error",});	
			}
		},'json');
	}

	function exportdata(){
		$.post('<?php echo base_url("index.php/export/excelPengadaan"); ?>',{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			kd:kd,
			kd1:kd1,
			tgl:sTgl.val(),
			tgl1:sTgl1.val(),
			status:sStatus.val()
		},function(result){
			exportToExcel(result,"Excel <?php echo $title;?>.xls");
		});
	}
</script>                              







