<script src="<?php echo base_url('assets/tinymce/tinymce.min.js')?>"></script> 
<h3 class="page-heading mb-4"><?php echo $title;?></h3>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-xs-6 padding-lr-5 margin-t-10">
                    <input id="search_cari" class="easyui-searchbox padding-r-5" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch" style="width:100%;height: 40px;"></input>
                    <div id="mm" style="width:150px">
                        <div data-options="name:'layananJenis'">Jenis Layanan</div>
                        <div data-options="name:'menuJudul'">Judul Menu</div>
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
                    <div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
                        <button id="btndel" class="btn btn-success btn-block" onclick="prosesData(3)"><i class="fa fa-book" aria-hidden="true"></i>Keterangan</button>
                    </div>
                    <div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
                        <button id="btndel" class="btn btn-info btn-block" onclick="prosesData(4)"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Lampiran</button>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12 padding-lr-5 margin-t-10 easyui-layout">
                    <table id="dg" class="easyui-datagrid" style="height:600px"
                        url="<?php echo base_url('index.php/referensi/getDatalayanan')?>" striped="true"
                        toolbar="#toolbar" pagination="true"
                        rownumbers="true" nowrap="false" singleSelect="true" fitColumns="true">
                        <thead>
                            <tr>
                                <!-- <th data-options="field:'id',width:50" sortable="true">ID</th> -->
                                <th data-options="field:'menuJudul',width:150" sortable="true">Menu</th>
                                <th data-options="field:'layananKode',width:50" sortable="true">Layanan Kode</th>
                                <th data-options="field:'layananJenis',width:750" sortable="true">Jenis Layanan</th>
                                <th data-options="field:'layananView',width:300" sortable="true">Layanan View</th>
                                <th data-options="field:'layananTemplate',width:100" sortable="true">Layanan Template</th>
                                <th data-options="field:'layananAktif',width:50" sortable="true">Layanan Aktif</th>
                                <!-- <th data-options="field:'layananHref',width:200" sortable="true">Layanan Href</th>
                                <th data-options="field:'layananImg',width:100" sortable="true">Layanan Img</th>
                                <th data-options="field:'ketpermohonan',width:200" sortable="true">Keterangan Permohonan</th> -->
                                <!-- <th data-options="field:'ketlampiran',width:200" sortable="true">Keterangan Lampiran</th> -->
                                <!-- <th data-options="field:'layananket',width:200" sortable="true">Layanan Ket</th> -->
                            </tr>
                        </thead>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="mdllampiran" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="border: 0">
            <div class="modal-header teal darken-3" style="border-radius: 0;background-color: #33414e;">
                <h4 class="modal-title white-text">
                    Detail Layanan 
                </h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="row">           
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input id="id3" name="i3" type="hidden" class="form-control">
                                    <textarea id="ketlampiran2" name="ketlampiran2" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <input id="fnmInput" type="text" class="form-control" placeholder="Nama File">
                                </div>
                                <div class="col-sm-6">
                                    <input id="ketInput" type="text" class="form-control" placeholder="Keterangan">
                                </div>
                                <div class="col-sm-3">
                                    <select id="reqInput" class="form-control">
                                        <option value="1">Wajib</option>
                                        <option value="0">Tidak Wajib</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <button type="button" id="addDataBtn" class="btn btn-primary">Tambah Data</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <table id="tabelKetlampiran" class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Nama File</th>
                                                <th>Keterangan</th>
                                                <th>Requirement</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data akan ditambahkan melalui JavaScript -->
                                        </tbody>
                                    </table>
                                     Silahkan update salah satu syarat hingga muncul tombol hapus baru menambah data
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


<div id="modaluser" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="border: 0">
            <div class="modal-header teal darken-3" style="border-radius: 0;background-color: #33414e;">
                <h4 class="modal-title white-text">
                    Detail Layanan 
                </h4>
            </div>
            
            <div class="modal-body">
                <form role="form">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- <div class="form-group row">
                                <label for="id" class="col-sm-4 col-form-label col-form-label-sm">ID</label>
                                <div class="col-sm-8">
                                    <input id="id" name="id" type="hiden" class="form-control">
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="menuKode" class="col-sm-4 col-form-label col-form-label-sm">Menu Kode</label>
                                <div class="col-sm-8">
                                <input id="id" name="id" type="hidden" class="form-control">
                                <select id="menuKode" name="menuKode" class="form-control">
                                    <option value="">Pilih Menu</option>
                                    <?php foreach ($pilihanmenu as $menu): ?>
                                        <option value="<?= $menu['menuKode']; ?>"><?= $menu['menuJudul']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="layananKode" class="col-sm-4 col-form-label col-form-label-sm">Layanan Kode</label>
                                <div class="col-sm-8">
                                    <input id="layananKode" name="layananKode" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="layananJenis" class="col-sm-4 col-form-label col-form-label-sm">Jenis Layanan</label>
                                <div class="col-sm-8">
                                    <input id="layananJenis" name="layananJenis" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="layananView" class="col-sm-4 col-form-label col-form-label-sm">Layanan View</label>
                                <div class="col-sm-8">
                                    <input id="layananView" name="layananView" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="layananTemplate" class="col-sm-4 col-form-label col-form-label-sm">Layanan Template</label>
                                <div class="col-sm-8">
                                    <input id="layananTemplate" name="layananTemplate" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="layananAktif" class="col-sm-4 col-form-label col-form-label-sm">Layanan Aktif</label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="layananAktif" id="layananAktifYes" value="1">
                                        <label class="form-check-label" for="layananAktifYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="layananAktif" id="layananAktifNo" value="0">
                                        <label class="form-check-label" for="layananAktifNo">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="layananHref" class="col-sm-4 col-form-label col-form-label-sm">Layanan Href</label>
                                <div class="col-sm-8">
                                    <input id="layananHref" name="layananHref" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="layananImg" class="col-sm-4 col-form-label col-form-label-sm">Layanan Img</label>
                                <div class="col-sm-8">
                                    <input id="layananImg" name="layananImg" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ketpermohonan" class="col-sm-4 col-form-label col-form-label-sm">Keterangan Permohonan</label>
                                <div class="col-sm-8">
                                    <textarea id="ketpermohonan" name="ketpermohonan" class="form-control" rows="1"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="ketlampiran" class="col-sm-12 col-form-label col-form-label-sm">Keterangan Lampiran</label>
                                <div class="col-sm-12">
                                    <textarea id="ketlampiran" name="ketlampiran" class="form-control" rows="7"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="layananket" class="col-sm-12 col-form-label col-form-label-sm">Layanan Ket</label>
                                <div class="col-sm-12">
                                    <textarea id="layananket" name="layananket" class="form-control" rows="5"></textarea>
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
<div id="modalket" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="border: 0">
            <div class="modal-header teal darken-3" style="border-radius: 0;background-color: #33414e;">
                <h4 class="modal-title white-text">
                    Detail Layanan 
                </h4>
            </div>
            
            <div class="modal-body">
                <form role="form">
                    <div class="row">           
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                <input id="id2" name="id" type="hidden" class="form-control">
                                    <textarea id="layananket2" name="layananket2" class="form-control" rows="15"></textarea>
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
	  
        $('#dg').datagrid({url:"<?php echo base_url('index.php/referensi/getDatalayanan')?>",queryParams:{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			},onError: function(index,row){
	    		alert(row.message)
	  }});
		btncari.click(function(){
		   loaddata();
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
                text: 'Apakah anda ingin menghapus data ini? ' + row.id,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Tidak',
                confirmButtonText: 'Ya'
            }).then(function () {
                var jpost = $.post("<?php echo base_url('index.php/referensi/delDatalayanan')?>", {
                    id: row.id
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
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#modaluser').modal('toggle');
                $('#id').val(row.id);
                $('#menuKode').val(row.menuKode);
                $('#layananKode').val(row.layananKode);
                $('#layananJenis').val(row.layananJenis);
                $('#layananView').val(row.layananView);
                $('#layananTemplate').val(row.layananTemplate);
                $('input[name="layananAktif"][value="' + row.layananAktif + '"]').prop('checked', true);
                $('#layananHref').val(row.layananHref);
                $('#layananImg').val(row.layananImg);
                $('#ketpermohonan').val(row.ketpermohonan);
                $('#ketlampiran').val(row.ketlampiran);
                
                // Set content of TinyMCE editor
                tinymce.get('layananket').setContent(row.layananket);
                
                $(".simpan").unbind('click');
                $(".simpan").click(function () {
                    $.post("<?php echo base_url('index.php/referensi/editDatalayanan')?>", {
                        id: $('#id').val(),
                        menuKode: $('#menuKode').val(),
                        layananKode: $('#layananKode').val(),
                        layananJenis: $('#layananJenis').val(),
                        layananView: $('#layananView').val(),
                        layananTemplate: $('#layananTemplate').val(),
                        layananAktif: $('input[name="layananAktif"]:checked').val(),
                        layananHref: $('#layananHref').val(),
                        layananImg: $('#layananImg').val(),
                        ketpermohonan: $('#ketpermohonan').val(),
                        ketlampiran: $('#ketlampiran').val(),
                        layananket: tinymce.get('layananket').getContent()
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
        } else if (id == 3) {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#modalket').modal('toggle');
                $('#id2').val(row.id);
                $('#layananJenis').val(row.layananJenis);
                // Set content of TinyMCE editor
                tinymce.get('layananket2').setContent(row.layananket);
                $('#modalket .modal-header h4').text($('#layananJenis').val());

                $(".simpan").unbind('click');
                $(".simpan").click(function () {
                    $.post("<?php echo base_url('index.php/referensi/editKet')?>", {
                        id: $('#id2').val(),
                        layananket: tinymce.get('layananket2').getContent()
                    }, function (result) {
                        if (result.status == 1) {
                            swal({ title: "SUKSES!!", text: 'Data Sukses Tersimpan.', type: "success", });
                            $('#dg').datagrid('reload');
                            $('#modalket').modal('toggle');  // Change to #modalket
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
        } else if (id == 4) {
            var row = $('#dg').datagrid('getSelected');
    if (row) {
        console.log("Opening mdllampiran modal");
        $('#mdllampiran').modal('toggle');
        $('#id3').val(row.id);
       
        // Parse JSON string to JavaScript object
        var ketlampiranData = JSON.parse(row.ketlampiran);
        
        // Set textarea value with parsed JSON
        $('#ketlampiran2').val(JSON.stringify(ketlampiranData, null, 2));
        
        // Clear existing table rows
        $('#tabelKetlampiran tbody').empty();
        
        // Populate table with parsed JSON data
        ketlampiranData.forEach(function(item) {
            var rowHtml = `<tr>
                               <td>${item.fnm}</td>
                               <td>${item.ket}</td>
                               <td>${item.req == '1' ? 'Wajib' : 'Tidak Wajib'}</td>
                               <td></td>
                           </tr>`;
            $('#tabelKetlampiran tbody').append(rowHtml);
        });
        
       
        $('#fnmInput').val('');
            $('#ketInput').val('');
            $('#reqInput').val('');
        $('#layananJenis').val(row.layananJenis);
        $('#mdllampiran .modal-header h4').text($('#layananJenis').val());

        $(".simpan").unbind('click');
        $(".simpan").click(function () {
            $.post("<?php echo base_url('index.php/referensi/editLampiran')?>", {
                id: $('#id3').val(),
                ketlampiran: $('#ketlampiran2').val(),
            }, function (result) {
                if (result.status == 1) {
                    swal({ title: "SUKSES!!", text: 'Data Sukses Tersimpan.', type: "success", });
                    $('#dg').datagrid('reload');
                    $('#mdllampiran').modal('toggle');
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
                $.post("<?php echo base_url('index.php/referensi/postDatalayanan')?>", {
                    id: $('#id').val(),
                    menuKode: $('#menuKode').val(),
                    layananKode: $('#layananKode').val(),
                    layananJenis: $('#layananJenis').val(),
                    layananView: $('#layananView').val(),
                    layananTemplate: $('#layananTemplate').val(),
                    layananAktif: $('input[name="layananAktif"]:checked').val(),
                    layananHref: $('#layananHref').val(),
                    layananImg: $('#layananImg').val(),
                    ketpermohonan: $('#ketpermohonan').val(),
                    ketlampiran: $('#ketlampiran').val(),
                    layananket: tinymce.get('layananket').getContent()
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
    $('#id').val('');
    $('#menuKode').val('');
    $('#layananKode').val('');
    $('#layananJenis').val('');
    $('#layananView').val('');
    $('#layananTemplate').val('web_suratmasuk');
    $('input[name="layananAktif"]').prop('checked', false);
    $('#layananHref').val('');
    $('#layananImg').val('defaultlayanan.png');
    $('#ketpermohonan').val('');
    $('#ketlampiran').val('');
    $('#layananket').val('');
}



</script>
<script>
        tinymce.init({
            selector: '#layananket',
            plugins: 'lists link image preview',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | bullist numlist | link image | preview',
            height: 300
        });
        tinymce.init({
            
            selector: '#layananket2',
            extended_valid_elements: 'i[class]',
            plugins: 'lists link image preview',
            toolbar: 'undo redo fontfamily fontsize | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | bullist numlist | link image | preview',
            height: 700
        });
    </script>
<script>
$(document).ready(function() {
    var ketlampiranData = []; // Initialize ketlampiranData array

    // Function to update textarea and table with current ketlampiranData
    function updateTextareaAndTable() {
        $('#ketlampiran2').val(JSON.stringify(ketlampiranData, null, 2)); // Update textarea

        $('#tabelKetlampiran tbody').empty(); // Clear table body

        ketlampiranData.forEach(function(item, index) {
            var rowHtml = `<tr>
                               <td>${item.fnm}</td>
                               <td>${item.ket}</td>
                               <td>${item.req == '1' ? 'Wajib' : 'Tidak Wajib'}</td>
                               <td><button type="button" class="btn btn-danger btn-sm delete-row" data-index="${index}">Delete</button></td>
                           </tr>`;
            $('#tabelKetlampiran tbody').append(rowHtml); // Append row to table body
        });

        // Add event listener for delete button
        $('.delete-row').click(function() {
            var index = $(this).data('index');
            ketlampiranData.splice(index, 1); // Remove item from array based on index
            updateTextareaAndTable(); // Update table and textarea after deletion
        });
    }

    // When "Tambah Data" button is clicked
    $('#addDataBtn').click(function() {
        var fnm = $('#fnmInput').val().trim();
        var ket = $('#ketInput').val().trim();
        var req = $('#reqInput').val().trim();

        if (fnm !== '' && ket !== '' && req !== '') {
            // Check if entry with the same 'fnm' already exists
            var existingIndex = ketlampiranData.findIndex(function(item) {
                return item.fnm === fnm;
            });

            if (existingIndex !== -1) {
                // Update existing entry (optional, based on requirements)
                ketlampiranData[existingIndex] = {
                    fnm: fnm,
                    ket: ket,
                    req: req
                };
            } else {
                // Add new entry
                var newData = {
                    fnm: fnm,
                    ket: ket,
                    req: req
                };
                ketlampiranData.push(newData); // Add newData to ketlampiranData array
            }

            updateTextareaAndTable(); // Update table and textarea
            $('#fnmInput').val(''); // Clear input fields after adding
            $('#ketInput').val('');
            $('#reqInput').val('');
        } else {
            alert('Silakan isi semua kolom input.'); // Show alert if any input is empty
        }
    });

    // When textarea #ketlampiran2 is updated (e.g., by user input)
    $('#ketlampiran2').on('input', function() {
        var textValue = $(this).val();
        try {
            ketlampiranData = JSON.parse(textValue); // Parse textarea value to update ketlampiranData
            updateTextareaAndTable(); // Update table based on new ketlampiranData
        } catch (error) {
            console.error('Error parsing JSON:', error); // Handle JSON parse error if any
        }
    });

    // When "Simpan" button is clicked
    $('.simpan').click(function() {
        // Perform save operation (assuming an AJAX post to save ketlampiranData)
        $.post("<?php echo base_url('index.php/referensi/editLampiran')?>", {
            id: $('#id3').val(),
            ketlampiran: $('#ketlampiran2').val(),
        }, function(result) {
            if (result.status == 1) {
                swal({
                    title: "SUKSES!!",
                    text: 'Data Sukses Tersimpan.',
                    type: "success",
                });
                $('#dg').datagrid('reload'); // Reload data grid
                $('#mdllampiran').modal('toggle'); // Close modal
            } else if (result.status == 2) {
                swal({
                    title: "ERROR!!",
                    text: 'Data Tidak Lengkap.',
                    type: "error",
                });
            } else {
                swal({
                    title: "ERROR!!",
                    text: 'Data Tidak Dapat Diproses.',
                    type: "error",
                });
            }
        }, 'json');
    });
});
</script>

