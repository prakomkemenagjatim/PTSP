<h3 class="page-heading mb-4"><?php echo $title;?></h3>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-xs-6 padding-lr-5 margin-t-10">
                        <input id="search_cari" class="easyui-searchbox padding-r-5" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch" style="width:100%;height: 40px;"></input>
                        <div id="mm" style="width:150px">
                            <div data-options="name:'menuJudul'">Menu</div>
                            <div data-options="name:'menuSubjudul'">Keterangan</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
                        <button id="btnadd" class="btn btn-primary btn-block" onclick="prosesData(0)"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
                    </div>
                    <div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
                        <button id="btnedit" class="btn btn-warning btn-block" onclick="prosesData(1)"><i class="fa fa-pencil" aria-hidden="true"></i> Ganti</button>
                    </div>
                    <div class="col-md-2 col-xs-6 padding-lr-5 margin-t-10"> 
                        <button id="btndel" class="btn btn-danger btn-block" onclick="prosesData(2)"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 padding-lr-5 margin-t-10 easyui-layout">
                        <table id="dg" class="easyui-datagrid" style="height:600px" url="<?php echo base_url('index.php/kua/getDatamainmenu')?>" striped="true" toolbar="#toolbar" pagination="true" rownumbers="true" nowrap="false" singleSelect="true">
                            <thead>
                                <tr>
                                    <th data-options="field:'id',width:90" sortable="true">ID</th>
                                    <th data-options="field:'menuKode',width:90" sortable="true">Menu Kode</th>
                                    <th data-options="field:'menuSlug',width:90" sortable="true">Menu Slug</th>
                                    <th data-options="field:'menuJudul',width:200" sortable="true">Menu Judul</th>
                                    <th data-options="field:'menuSubjudul',width:400" sortable="true">Menu Subjudul</th>
                                    <th data-options="field:'menuImg',width:100" sortable="true">Menu Img</th>
                                    <th data-options="field:'menuAktif',width:90" sortable="true">Menu Aktif</th>
                                    <th data-options="field:'menuHref',width:200" sortable="true">Menu Href</th>
                                    <th data-options="field:'menuColor',width:90" sortable="true">Menu Color</th>
                                    <th data-options="field:'menuData',width:90" sortable="true">Menu Data</th>
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
                <h4 class="modal-title white-text">Detail Menu</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="id" class="col-sm-2 col-form-label col-form-label-sm">ID</label>
                                <div class="col-sm-10">
                                    <input id="id" name="id" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menuKode" class="col-sm-2 col-form-label col-form-label-sm">Menu Kode</label>
                                <div class="col-sm-10">
                                    <input id="menuKode" name="menuKode" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menuSlug" class="col-sm-2 col-form-label col-form-label-sm">Menu Slug</label>
                                <div class="col-sm-10">
                                    <input id="menuSlug" name="menuSlug" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menuJudul" class="col-sm-2 col-form-label col-form-label-sm">Menu Judul</label>
                                <div class="col-sm-10">
                                    <input id="menuJudul" name="menuJudul" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menuSubjudul" class="col-sm-2 col-form-label col-form-label-sm">Menu Subjudul</label>
                                <div class="col-sm-10">
                                    <input id="menuSubjudul" name="menuSubjudul" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menuImg" class="col-sm-2 col-form-label col-form-label-sm">Menu Img</label>
                                <div class="col-sm-10">
                                    <input id="menuImg" name="menuImg" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group row">
                                <label for="menuAktif" class="col-sm-2 col-form-label col-form-label-sm">Menu Aktif</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="menuAktif" id="menuAktifYes" value="1">
                                        <label class="form-check-label" for="menuAktifYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="menuAktif" id="menuAktifNo" value="0">
                                        <label class="form-check-label" for="menuAktifNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menuHref" class="col-sm-2 col-form-label col-form-label-sm">Menu Href</label>
                                <div class="col-sm-10">
                                    <input id="menuHref" name="menuHref" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menuColor" class="col-sm-2 col-form-label col-form-label-sm">Menu Color</label>
                                <div class="col-sm-10">
                                    <input id="menuColor" name="menuColor" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menuData" class="col-sm-2 col-form-label col-form-label-sm">Menu Data</label>
                                <div class="col-sm-10">
                                    <input id="menuData" name="menuData" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-right margin-l-5" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success pull-right simpan">Simpan</button>
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
	  
        $('#dg').datagrid({url:"<?php echo base_url('index.php/referensi/getDatamainmenu')?>",queryParams:{
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
                text: 'Apakah anda ingin menghapus data ini?' + row.menuJudul,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Tidak',
                confirmButtonText: 'Ya'
            }).then(function () {
                var jpost = $.post("<?php echo base_url('index.php/referensi/delMainmenu')?>", {
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
                $('#id').val(row.id);
                $('#menuKode').val(row.menuKode);
                $('#menuSlug').val(row.menuSlug);
                $('#menuJudul').val(row.menuJudul);
                $('#menuSubjudul').val(row.menuSubjudul);
                $('#menuImg').val(row.menuImg);
                $('input[name="menuAktif"][value="' + row.menuAktif + '"]').prop('checked', true);
                $('#menuHref').val(row.menuHref);
                $('#menuColor').val(row.menuColor);
                $('#menuData').val(row.menuData);
                $(".simpan").unbind('click');
                $(".simpan").click(function () {
                    $.post("<?php echo base_url('index.php/referensi/editDatamainmenu')?>", {
                        id: $('#id').val(),
                        menuKode: $('#menuKode').val(),
                        menuSlug: $('#menuSlug').val(),
                        menuJudul: $('#menuJudul').val(),
                        menuSubjudul: $('#menuSubjudul').val(),
                        menuImg: $('#menuImg').val(),
                        menuAktif: $('input[name="menuAktif"]:checked').val(),
                        menuHref: $('#menuHref').val(),
                        menuColor: $('#menuColor').val(),
                        menuData: $('#menuData').val()
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
                $.post("<?php echo base_url('index.php/referensi/postDatamainmenu')?>", {
                    id: $('#id').val(),
                    menuKode: $('#menuKode').val(),
                    menuSlug: $('#menuSlug').val(),
                    menuJudul: $('#menuJudul').val(),
                    menuSubjudul: $('#menuSubjudul').val(),
                    menuImg: $('#menuImg').val(),
                    menuAktif: $('input[name="menuAktif"]:checked').val(),
                    menuHref: $('#menuHref').val(),
                    menuColor: $('#menuColor').val(),
                    menuData: $('#menuData').val()
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
    $('#menuSlug').val('');
    $('#menuJudul').val('');
    $('#menuSubjudul').val('');
    $('#menuImg').val('');
    $('input[name="menuAktif"]').prop('checked', false);
    $('#menuHref').val('');
    $('#menuColor').val('');
    $('#menuData').val('');
}



</script>
