<form method="post" enctype="multipart/form-data" id="formnama" class="form-horizontal">
    <div class="card">
		<div class="card-body">                             
        <div class="form-group">
            <label class="col-md-3 col-xs-5 control-label">Username</label>
            <div class="col-md-6 col-xs-7">
                <input type="text" value="<?php $userSess = userSess();echo $userSess['userId'];?>" class="form-control" disabled/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 col-xs-5 control-label">Nama Lengkap</label>
            <div class="col-md-6 col-xs-7">
                <input id="nama" type="text" class="form-control" value="<?php echo $userSess['userNama'];?>">
            </div>
        </div>
        <div class="form-group">                                        
            <div class="col-md-offset-3 col-md-4 col-xs-4">
                <button type="button" id="btnsimpannama" class="btn btn-success btn-block btn-rounded">Ganti Nama</button>
            </div>
        </div>
	</div>
</div>
</form>
<script type="text/javascript">
	var btnsimpannama = $('#btnsimpannama');
	$(document).ready(function(){
		btnsimpannama.click(function(e){
		   e.preventDefault();
		   simpandatanama();
		});
	})
		function simpandatanama(url){
		if (nama.val() != ''){
			$.post("<?php echo base_url('index.php/user/gantinamapost')?>",{
				nama : nama.val(),
				},function(result){
					swal({title: result.title,text: result.text,type: result.type});	
			},'json');
		} else {
			swal({title: 'ERROR !!',text: 'Nama User Tidak Boleh Kosong',type: 'error'});
		}

	}
</script>
