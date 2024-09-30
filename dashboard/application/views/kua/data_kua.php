<h3 class="page-heading mb-4"><?php echo $title;?></h3>
<div class="row">
  <div class="col-md-12 stretch-card">
        <div class="card">
		<div class="card-body">
			<div class="row">
                <div class="col-md-6 col-xs-6 padding-lr-5 margin-t-10">
				<input id="search_cari" class="easyui-searchbox padding-r-5" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch" style="width:100%;height: 40px;"></input>
				<div id="mm" style="width:150px">
                    <div data-options="name:'Nama_KUA'">Nama KUA</div>
					<div data-options="name:'Kodefikasi_KUA'">Kodefikasi KUA</div>
					<div data-options="name:'Alamat'">Alamat</div>
				</div>
				</div>
        	</div>
			<div class="row">
				<div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
	            	<button id="btnadd" class="btn btn-primary btn-block" onclick="prosesData(0)"><i class="fa fa-plus" aria-hidden="true"></i>Tambah</button>
	       		</div>	
	       		<div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
	            	<button id="btnedit" class="btn btn-warning btn-block" onclick="prosesData(1)"><i class="fa fa-pencil" aria-hidden="true"></i>Ganti</button>
	       		</div>
	       		<div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
	            	<button id="btndel" class="btn btn-danger btn-block" onclick="prosesData(2)"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</button>
	       		</div>
	       		
			</div>
			<div class="row">
				<div class="col-md-12 padding-lr-5 margin-t-10 easyui-layout">
					<table id="dg" class="easyui-datagrid" style="height:600px"
					        url="<?php echo base_url('index.php/kua/getDatakua')?>" striped="true"
					        toolbar="#toolbar" pagination="true"
					        rownumbers="true"  nowrap="false" singleSelect="true">
							<thead>
					            <tr>
                                <th data-options="field:'Kodefikasi_KUA',width:90" sortable="true">Kodefikasi KUA</th>
					                <th data-options="field:'Kode_Satker',width:90" sortable="true">Kode Satker</th>
					                <th data-options="field:'Kode_Kanwil',width:90" sortable="true">Kode Kanwil</th>
					                <th data-options="field:'Nama_KUA',width:200" sortable="true">Nama KUA</th>
					                <th data-options="field:'Nama_Provinsi',width:200" sortable="true">Nama Provinsi</th>
					                <th data-options="field:'Nama_Kabupaten',width:200" sortable="true">Nama Kabupaten</th>
					                <th data-options="field:'Nama_Kecamatan',width:200" sortable="true">Nama Kecamatan</th>
					                <th data-options="field:'Alamat',width:305" sortable="true">Alamat</th>
					                <th data-options="field:'Latitude',width:90" sortable="true">Latitude</th>
					                <th data-options="field:'Longitude',width:90" sortable="true">Longitude</th>
					                <th data-options="field:'Luas_Tanah',width:90" sortable="true">Luas Tanah</th>
					                <th data-options="field:'Status_Tanah',width:90" sortable="true">Status Tanah</th>
					                <th data-options="field:'Tipologi_KUA',width:90" sortable="true">Tipologi KUA</th>
					                <th data-options="field:'Nomor_Telpon',width:90" sortable="true">Nomor Telpon</th>
					                <th data-options="field:'Email',width:200" sortable="true">Email</th>
					                <th data-options="field:'admin',width:150" sortable="true">Admin</th>
					                <th data-options="field:'nomor_wa',width:90" sortable="true">Nomor WA</th>
					            </tr>
					        </thead>
					</table>
				</div>
			</div>
		</div>
    </div>
</div>
</div>

<div id="modaluser" class="modal fade" role="dialog">
<div class="modal-dialog">
    <div class="modal-content" style="border: 0">
        <div class="modal-header teal darken-3" style="border-radius: 0;background-color: #33414e;">
            <h4 class="modal-title white-text">
                Detail KUA
            </h4>
        </div>
        
        <div class="modal-body">
    <form role="form">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group row">
                    <label for="Kodefikasi_KUA" class="col-sm-2 col-form-label col-form-label-sm">Kodefikasi KUA</label>
                    <div class="col-sm-10">
                        <input id="Kodefikasi_KUA" name="Kodefikasi_KUA" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Kode_Satker" class="col-sm-2 col-form-label col-form-label-sm">Kode Satker</label>
                    <div class="col-sm-10">
                        <input id="Kode_Satker" name="Kode_Satker" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Kode_Kanwil" class="col-sm-2 col-form-label col-form-label-sm">Kode Kanwil</label>
                    <div class="col-sm-10">
                        <input id="Kode_Kanwil" name="Kode_Kanwil" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nama_KUA" class="col-sm-2 col-form-label col-form-label-sm">Nama KUA</label>
                    <div class="col-sm-10">
                        <input id="Nama_KUA" name="Nama_KUA" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nama_Provinsi" class="col-sm-2 col-form-label col-form-label-sm">Nama Provinsi</label>
                    <div class="col-sm-10">
                        <input id="Nama_Provinsi" name="Nama_Provinsi" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nama_Kabupaten" class="col-sm-2 col-form-label col-form-label-sm">Nama Kabupaten</label>
                    <div class="col-sm-10">
                        <input id="Nama_Kabupaten" name="Nama_Kabupaten" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nama_Kecamatan" class="col-sm-2 col-form-label col-form-label-sm">Nama Kecamatan</label>
                    <div class="col-sm-10">
                        <input id="Nama_Kecamatan" name="Nama_Kecamatan" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Alamat" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
                    <div class="col-sm-10">
                        <input id="Alamat" name="Alamat" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group row">
                    <label for="Latitude" class="col-sm-2 col-form-label col-form-label-sm">Latitude</label>
                    <div class="col-sm-10">
                        <input id="Latitude" name="Latitude" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Longitude" class="col-sm-2 col-form-label col-form-label-sm">Longitude</label>
                    <div class="col-sm-10">
                        <input id="Longitude" name="Longitude" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Luas_Tanah" class="col-sm-2 col-form-label col-form-label-sm">Luas Tanah</label>
                    <div class="col-sm-10">
                        <input id="Luas_Tanah" name="Luas_Tanah" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Status_Tanah" class="col-sm-2 col-form-label col-form-label-sm">Status Tanah</label>
                    <div class="col-sm-10">
                        <input id="Status_Tanah" name="Status_Tanah" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tipologi_KUA" class="col-sm-2 col-form-label col-form-label-sm">Tipologi KUA</label>
                    <div class="col-sm-10">
                        <input id="Tipologi_KUA" name="Tipologi_KUA" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nomor_Telpon" class="col-sm-2 col-form-label col-form-label-sm">Nomor Telpon</label>
                    <div class="col-sm-10">
                        <input id="Nomor_Telpon" name="Nomor_Telpon" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                    <div class="col-sm-10">
                        <input id="Email" name="Email" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="admin" class="col-sm-2 col-form-label col-form-label-sm">Admin</label>
                    <div class="col-sm-10">
                        <input id="admin" name="admin" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomor_wa" class="col-sm-2 col-form-label col-form-label-sm">Nomor WA</label>
                    <div class="col-sm-10">
                        <input id="nomor_wa" name="nomor_wa" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary pull-right margin-l-5" data-dismiss="modal">
                Batal
            </button>
            <button type="button" class="btn btn-success pull-right simpan">
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
	  
        $('#dg').datagrid({url:"<?php echo base_url('index.php/kua/getDatakua')?>",queryParams:{
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

	function prosesData(id) {
    if (id == 2) {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            swal({
                title: '',
                text: 'Apakah anda ingin menghapus data ini?'+row.Nama_KUA,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Tidak',
                confirmButtonText: 'Ya'
            }).then(function () {
                var jpost = $.post("<?php echo base_url('index.php/kua/delKua')?>", {
                    Kodefikasi_KUA: row.Kodefikasi_KUA
                },
                function (result) {
                    if (result.status == 1) {
                        swal({ title: "SUKSES!!", text: 'Data Sukses Terhapus.', type: "success", });
                        $('#dg').datagrid('reload');
                    } else if (result.status == 2) {
                        swal({ title: "ERROR!!", text: 'Data Tidak Lengkap.', type: "error", });
                    } else {
                        swal({ title: "ERROR!!", text: 'Data Tidak Dapat Diproses.', type: "error", });
                    }
                }, 'json');
                jpost.fail(function (e) { swal({ title: "ERROR!!", text: 'Proses Gagal.', type: "error", }) })
            })
        } else {
            swal({ title: "Warning!!", text: 'Silakan Pilih Data Terlebih Dahulu.', type: "warning", });
        }
    } else {
        cleardata();
        if (id == 1) {
            $('#iId').attr('readonly', true);
            $('#iPass').attr('readonly', true);
        } else {
            $('#iId').attr('readonly', false);
            $('#iPass').attr('readonly', false);
        }

        if (id == 1) {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#modaluser').modal('toggle');
                $('#Kodefikasi_KUA').val(row.Kodefikasi_KUA);
                $('#Kode_Satker').val(row.Kode_Satker);
                $('#Kode_Kanwil').val(row.Kode_Kanwil);
                $('#Nama_KUA').val(row.Nama_KUA);
                $('#Nama_Provinsi').val(row.Nama_Provinsi);
                $('#Nama_Kabupaten').val(row.Nama_Kabupaten);
                $('#Nama_Kecamatan').val(row.Nama_Kecamatan);
                $('#Alamat').val(row.Alamat);
                $('#Latitude').val(row.Latitude);
                $('#Longitude').val(row.Longitude);
                $('#Luas_Tanah').val(row.Luas_Tanah);
                $('#Status_Tanah').val(row.Status_Tanah);
                $('#Tipologi_KUA').val(row.Tipologi_KUA);
                $('#Nomor_Telpon').val(row.Nomor_Telpon);
                $('#Email').val(row.Email);
                $('#admin').val(row.admin);
                $('#nomor_wa').val(row.nomor_wa);
                $(".simpan").unbind('click');
                $(".simpan").click(function () {
                    $.post("<?php echo base_url('index.php/kua/editKua')?>", {
                        Kodefikasi_KUA: $('#Kodefikasi_KUA').val(),
                        Kode_Satker: $('#Kode_Satker').val(),
                        Kode_Kanwil: $('#Kode_Kanwil').val(),
                        Nama_KUA: $('#Nama_KUA').val(),
                        Nama_Provinsi: $('#Nama_Provinsi').val(),
                        Nama_Kabupaten: $('#Nama_Kabupaten').val(),
                        Nama_Kecamatan: $('#Nama_Kecamatan').val(),
                        Alamat: $('#Alamat').val(),
                        Latitude: $('#Latitude').val(),
                        Longitude: $('#Longitude').val(),
                        Luas_Tanah: $('#Luas_Tanah').val(),
                        Status_Tanah: $('#Status_Tanah').val(),
                        Tipologi_KUA: $('#Tipologi_KUA').val(),
                        Nomor_Telpon: $('#Nomor_Telpon').val(),
                        Email: $('#Email').val(),
                        admin: $('#admin').val(),
                        nomor_wa: $('#nomor_wa').val()
                    }, function (result) {
                        if (result.status == 1) {
                            swal({ title: "SUKSES!!", text: 'Data Sukses Tersimpan.', type: "success", });
                            $('#dg').datagrid('reload');
                            $('#modaluser').modal('toggle');
                        } else if (result.status == 2) {
                            swal({ title: "ERROR!!", text: 'Data Tidak Lengkap.', type: "error", });
                        } else {
                            swal({ title: "ERROR!!", text: 'Data Tidak Dapat Diproses.', type: "error", });
                        }
                    }, 'json');
                })
            } else {
                swal({ title: "Warning!!", text: 'Silakan Pilih Data Terlebih Dahulu.', type: "warning", });
            }
        } else {
            $('#modaluser').modal('toggle');
            $(".simpan").unbind('click');
            $(".simpan").click(function () {
                $.post("<?php echo base_url('index.php/kua/postKua')?>", {
                    Kodefikasi_KUA: $('#Kodefikasi_KUA').val(),
                    Kode_Satker: $('#Kode_Satker').val(),
                    Kode_Kanwil: $('#Kode_Kanwil').val(),
                    Nama_KUA: $('#Nama_KUA').val(),
                    Nama_Provinsi: $('#Nama_Provinsi').val(),
                    Nama_Kabupaten: $('#Nama_Kabupaten').val(),
                    Nama_Kecamatan: $('#Nama_Kecamatan').val(),
                    Alamat: $('#Alamat').val(),
                    Latitude: $('#Latitude').val(),
                    Longitude: $('#Longitude').val(),
                    Luas_Tanah: $('#Luas_Tanah').val(),
                    Status_Tanah: $('#Status_Tanah').val(),
                    Tipologi_KUA: $('#Tipologi_KUA').val(),
                    Nomor_Telpon: $('#Nomor_Telpon').val(),
                    Email: $('#Email').val(),
                    admin: $('#admin').val(),
                    nomor_wa: $('#nomor_wa').val()
                }, function (result) {
                    if (result.status == 1) {
                        swal({ title: "SUKSES!!", text: 'Data Sukses Tersimpan.', type: "success", });
                        $('#dg').datagrid('reload');
                        $('#modaluser').modal('toggle');
                    } else if (result.status == 2) {
                        swal({ title: "ERROR!!", text: 'Data Tidak Lengkap.', type: "error", });
                    } else {
                        swal({ title: "ERROR!!", text: 'Data Tidak Dapat Diproses.', type: "error", });
                    }
                }, 'json');
            })
        }
    }
}


     
    function cleardata() {
    $('#Kodefikasi_KUA').val('');
    $('#Kode_Satker').val('');
    $('#Kode_Kanwil').val('');
    $('#Nama_KUA').val('');
    $('#Nama_Provinsi').val('');
    $('#Nama_Kabupaten').val('');
    $('#Nama_Kecamatan').val('');
    $('#Alamat').val('');
    $('#Latitude').val('');
    $('#Longitude').val('');
    $('#Luas_Tanah').val('');
    $('#Status_Tanah').val('');
    $('#Tipologi_KUA').val('');
    $('#Nomor_Telpon').val('');
    $('#Email').val('');
    $('#admin').val('');
    $('#nomor_wa').val('');
}

	function resetpassword(){
		var row = $('#dg').datagrid('getSelected');
		if (row){
			swal({
			  title:'',
			  text: 'Apakah anda ingin mereset password untuk data ini?',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  cancelButtonText: 'Tidak',
			  confirmButtonText: 'Ya'
			}).then(function () {
			  var jpost = $.post("<?php echo base_url('index.php/user/resetPasswordUseradmin')?>",
								{
									idx:row.userId
								},
								function(result){
									if (result.status == 1){
										swal({title: "SUKSES!!",text: 'Password Sukses Direset.',type: "success",});
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
