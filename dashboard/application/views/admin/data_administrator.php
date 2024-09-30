<h3 class="page-heading mb-4"><?php echo $title;?></h3>
<div class="row">
  <div class="col-md-12 stretch-card">
        <div class="card">
		<div class="card-body">
			<div class="row">
                <div class="col-md-6 col-xs-6 padding-lr-5 margin-t-10">
				<input id="search_cari" class="easyui-searchbox padding-r-5" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch" style="width:100%;height: 40px;"></input>
				<div id="mm" style="width:200px">
					<div data-options="name:'userId'">Username</div>
					<div data-options="name:'userNama'">Nama</div>
					<div data-options="name:'userWA'">No.WA</div>
					
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
	       		<div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
	            	<button id="btndel" class="btn btn-info btn-block" onclick="resetpassword()"><i class="fa fa-key" aria-hidden="true"></i>Reset Password</button>
	       		</div>
				   <div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
	            	<button id="btndel" class="btn btn-success btn-block" onclick="profil()"><i class="fa fa-refresh" aria-hidden="true"></i>Ambil Data Simpeg</button>
	       		</div>
			</div>
			<div class="row">
				<div class="col-md-12 padding-lr-5 margin-t-10 easyui-layout">
					<table id="dg" class="easyui-datagrid" style="height:600px"
					        url="" striped="true"
					        toolbar="#toolbar" pagination="true"
					        rownumbers="true"  nowrap="false" singleSelect="true">
							<thead>
					            <tr>
					                <th data-options="field:'userId',width:200" sortable="true">USERNAME</th>
									<th data-options="field:'userNip',width:200" sortable="true">NIP</th>
					                <th data-options="field:'userNama',width:200" sortable="true">NAMA</th>
					                <th data-options="field:'typeNama',width:220" sortable="true">TIPE</th>
									
					                <th data-options="field:'userAktif',width:100,formatter:function(val){
					                	if (val == 0){
											return 'Tidak Aktif';
										} else if (val == 1){
											return 'Aktif';
										}
					                }" sortable="true">STATUS</th>
									<th data-options="field:'userWA',width:150" sortable="true">No.WA</th>
									<th data-options="field:'EMAIL',width:220" sortable="true">EMAIL</th>
									<th data-options="field:'TAMPIL_JABATAN',width:220" sortable="true">JABATAN</th>
									<th data-options="field:'SATKER_1',width:220" sortable="true">SATKER</th>
									<th data-options="field:'SATKER_2',width:220" sortable="true">SATKER</th>
									<th data-options="field:'SATKER_4',width:220" sortable="true">SATKER</th>
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
<div class="modal-dialog ">
	<div class="modal-content "  style="border: 0">
		<div class="modal-header teal darken-3" style="border-radius: 0;background-color: #33414e;">
			<h4 class="modal-title white-text">
				Detail User
			</h4>
		</div>
		
		<div class="modal-body">
			<form role="form">
			<input id="idx" name="idx" type="password" class="form-control" style="display: none">
			<div class="row">
				<div class="col-lg-12">
                    <div class="form-group">
                        <label>Username</label>
                        <input id="iId" name="iId" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama User</label>
                        <input id="iNama" name="iNama" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <input id="iNip" name="iNip" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="iPass" name="iPass" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nomor WA</label>
                        <input id="iWA" name="iWA" type="text" class="form-control">
                    </div>
                    <div class="row">
					<div class="col-lg-6">
                            <div class="form-group">
                                <label>Tingkat</label>
                                <select id="iTingkat" name="iTingkat" class="form-control">
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                    <option value="3">Provinsi</option>
                                    <option value="4">Kabupaten</option>
                                    <option value="5">Kecamatan</option>
                                    <option value="6">PTSP</option>
                                    <option value="7">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select id="iProv" name="iProv" class="form-control">
                                    <!-- Options will be populated by JavaScript -->
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Kabupaten/Kota</label>
                                        <select id="iKabko" name="iKabko" class="form-control">
                                            <!-- Options will be populated by JavaScript -->
                                        </select>
                                    </div>
                                </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>KUA</label>
                                <input id="iKua" name="iKua" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Status User</label>      
                                <select class="form-control select"  id="iStatus" name="iStatus">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tipe</label>      
                                <select class="form-control select"  id="iType" name="iType">
                                    <option value="0">-Level User-</option>
                                    <?php echo optionTipeuser(); ?>
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
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->



<script>
   $(document).ready(function() {
    // Function to populate city/district options
    function populateCities(provinceId) {
        $.ajax({
            url: '../getkabupaten/' + provinceId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var options = '<option value="">Select City/District</option>';
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                }
                $('#iKabko').html(options);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching cities/districts:', status, error);
            }
        });
    }

    // Populate province options on document ready
    $.ajax({
        url: '../getprovinsi',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var options = '<option value="">Select Province</option>';
            for (var i = 0; i < data.length; i++) {
                options += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
            }
            $('#iProv').html(options);

            // Populate city/district options when page loads
            var selectedProvinceId = $('#iProv').val();
            if (selectedProvinceId) {
                populateCities(selectedProvinceId);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching provinces:', status, error);
        }
    });

    // Handle province change event
    $('#iProv').change(function() {
        var provinceId = $(this).val();
        if (provinceId) {
            // Populate city/district options based on selected province
            populateCities(provinceId);
        } else {
            // Clear city/district options if no province is selected
            $('#iKabko').html('<option value="">Select City/District</option>');
        }
    });
});

</script>


<script type="text/javascript">
	var selected = '';
	var scari = $("#search_cari"),
		btncari = $('#btncari');
	$(document).ready(function(){ 
	  
	  $('#dg').datagrid({url:"<?php echo base_url('index.php/user/getUseradmin')?>",queryParams:{
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
			  var jpost = $.post("<?php echo base_url('index.php/user/delUseradmin')?>",
								{
									idx:row.userId
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
			$('#iId').attr('readonly',true);
			$('#iPass').attr('readonly',true);
		} else {
			$('#iId').attr('readonly',false);
			$('#iPass').attr('readonly',false);
		}
		
		if (id == 1){
			var row = $('#dg').datagrid('getSelected');
		    if (row){
		    	$('#modaluser').modal('toggle');
				$('#idx').val(row.userId);
				$('#iId').val(row.userId);
				$('#iNama').val(row.userNama);
				$('#iNip').val(row.userNip);
				// $('#iPass').val(row.userPassword); // Assuming the password should be populated
				$('#iWA').val(row.userWA);
				$('#iTingkat').val(row.userTingkat);
				$('#iProv').val(row.userProv);
				
				$('#iKua').val(row.userKua);
				$('#iStatus').val(row.userAktif);
				$('#iType').val(row.userType);
				$(".simpan").unbind('click');
				$(".simpan").click(function(){simpandata(id);})
				$.ajax({
					url: '../getkabupaten/' + row.userProv,
					type: 'GET',
					dataType: 'json',
					success: function(data) {
						var options = '<option value="">Select City/District</option>';
						for (var i = 0; i < data.length; i++) {
							options += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
						}
						$('#iKabko').html(options);
						$('#iKabko').val(row.userKabko);
					},
					error: function(xhr, status, error) {
						console.error('Error fetching cities/districts:', status, error);
					}
				});
				
		    } else {
				swal({title: "Warning!!",text: 'Silakan Pilih Data Terlebih Dahulu.',type: "warning",});	
			}
	    } else {
			$('#modaluser').modal('toggle');
			$(".simpan").unbind('click');
			$(".simpan").click(function(){simpandata(id);})
		}
	    
	}
}

function simpandata(id){
  if (id == 0){
  	url = "<?php echo base_url('index.php/user/postUseradmin')?>";
  } else {
  	url = "<?php echo base_url('index.php/user/editUseradmin')?>"
  }
	var jpost = $.post(url,
						{
							iId:$('#iId').val(),
							iNama:$('#iNama').val(),
							iNip:$('#iNip').val(),
							iPass:$('#iPass').val(),
							iStatus:$('#iStatus').val(),
							iType:$('#iType').val(),
							iWA:$('#iWA').val(),
							iTingkat:$('#iTingkat').val(),
							iProv:$('#iProv').val(),
							iKabko:$('#iKabko').val(),
							iKua:$('#iKua').val(),
							idx:$('#idx').val()
						},
						function(result){
							if (result.status == 1){
								swal("Data Berhasil di simpan", result.success, "success");
								$('#modaluser').modal('hide');
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
	$('#iId').val('');
	$('#iNama').val('');
	$('#iNip').val('');
	$('#iPass').val('');
	$('#iStatus').val('');
	$('#iType').val('');
	$('#iWA').val('');
	$('#iTingkat').val('');
	$('#iProv').val('');
	$('#iKabko').val('');
	$('#iKua').val('');
}

	

	function resetpassword(){
		var row = $('#dg').datagrid('getSelected');
		if (row){
			swal({
			  title:'',
			  text: 'Apakah anda ingin mereset password?',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  cancelButtonText: 'Tidak',
			  confirmButtonText: 'Ya'
			}).then(function () {
			  var jpost = $.post("<?php echo base_url('index.php/user/resetUseradmin')?>",
								{
									idx:row.userId
								},
								function(result){
									if (result.status == 1){
										swal({title: "SUKSES!!",html: 'Password user berhasil direset. <br />Password: <span style="font-weight: bold;">'+result.pass+'</span>',type: "success",});
										$('#dg').datagrid('reload');									
									} else
									if (result.status == 2){
										swal({title: "ERROR!!",text: 'Password user gagal direset.',type: "error",});	
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

<script>
    function profil() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            var nip = row.userNip;
            if (nip) {
                $.ajax({
                    url: '<?php echo base_url('index.php/user/getprofil/')?>' + nip,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            
                            $('#dg').datagrid('reload');
                            cleardata();
                        } else {
                            swal({title: "SUKSES!!",html: 'Berhasil mengambil data dari simpeg',type: "success",});
                            $('#dg').datagrid('reload');
                            cleardata();
                        }
                    },
                    error: function(xhr, status, error) {
                        swal({title: "ERROR!!",text: 'Data Tidak Dapat Diproses',type: "error",});
                        $('#dg').datagrid('reload');
                        cleardata();
                    }
                });
            } else {
                swal({title: "ERROR!!",text: 'NIP Harus diisi terlebih dahulu',type: "error",});
                $('#dg').datagrid('reload');
                cleardata();
            }
        } else {
            swal({title: "ERROR!!",text: 'Tidak Terkoneksi dengan API',type: "error",});
            $('#dg').datagrid('reload');
            cleardata();
        }
    }
</script>

