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
                    <div data-options="name:'jenis_layanan'">Jenis Layanan</div>
					<div data-options="name:'syarat'">Syarat</div>
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
					        url="<?php echo base_url('index.php/kua/getLayanankua')?>" striped="true"
					        toolbar="#toolbar" pagination="true"
					        rownumbers="true"  nowrap="false" singleSelect="true">
							<thead>
					            <tr>
                                    <th data-options="field:'no',width:50" sortable="true">No</th>
					                <th data-options="field:'jenis_layanan',width:150" sortable="true">Jenis Layanan</th>
					                <th data-options="field:'syarat',width:990" sortable="true">Syarat</th>
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
                Detail Layanan KUA
            </h4>
        </div>
        
        <div class="modal-body">
    <form role="form">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group row">
                    <label for="no" class="col-sm-2 col-form-label col-form-label-sm">Nomor Layanan</label>
                    <div class="col-sm-10">
                        <input id="no" name="no" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_layanan" class="col-sm-2 col-form-label col-form-label-sm">Jenis Layanan</label>
                    <div class="col-sm-10">
                        <input id="jenis_layanan" name="jenis_layanan" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="syarat" class="col-sm-2 col-form-label col-form-label-sm">Syarat</label>
                    <div class="col-sm-10">
                        <textarea id="syarat" name="syarat" type="text" class="form-control" rows="10"></textarea>
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
	  
        $('#dg').datagrid({url:"<?php echo base_url('index.php/kua/getLayanankua')?>",queryParams:{
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
                text: 'Apakah anda ingin menghapus data ini? '+row.jenis_layanan,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Tidak',
                confirmButtonText: 'Ya'
            }).then(function () {
                var jpost = $.post("<?php echo base_url('index.php/kua/delLayanankua')?>", {
                    no: row.no
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
                $('#no').val(row.no);
                $('#jenis_layanan').val(row.jenis_layanan);
                $('#syarat').val(row.syarat);
                $('#syarat').text(row.syarat);
                $(".simpan").unbind('click');
                $(".simpan").click(function () {
                    $.post("<?php echo base_url('index.php/kua/editLayanankua')?>", {
                        no: $('#no').val(),
                        jenis_layanan: $('#jenis_layanan').val(),
                        syarat: $('#syarat').val(),
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
                $.post("<?php echo base_url('index.php/kua/postLayanankua')?>", {
                    no: $('#no').val(),
                    jenis_layanan: $('#jenis_layanan').val(),
                    syarat: $('#syarat').val(),
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
    $('#no').val('');
    $('#jenis_layanan').val('');
    $('#syarat').val('');
   
}


</script>
