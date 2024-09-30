<?php $this->load->view('index_js'); ?>	
<h3 class="page-heading mb-4"><?php echo $title;?></h3>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div role="tabpanel">
                            <ul id="tabnya" class="nav nav-tabs" role="tablist">
                                <li class="active">
                                    <a href="#tab1" role="tab" data-toggle="tab" class="brown-text text-darken-4"><strong><span class="fa fa-male fa-fw"></span> Identitas</strong></a>
                                </li>
                                <li>
                                    <a href="#tab2" role="tab" data-toggle="tab" class="brown-text text-darken-4"><strong><span class="fa fa-picture-o fa-fw"></span> Photo Profil</strong></a>
                                </li>
                                <li>
                                    <a href="#tab3" role="tab" data-toggle="tab" class="brown-text text-darken-4"><strong><span class="fa fa-key fa-fw"></span> Password</strong></a>
                                </li>
                                <li>
                                    <a href="#tab4" role="tab" data-toggle="tab" class="brown-text text-darken-4"><strong><span class="fa fa-database fa-fw"></span> DATA SIMPEG</strong></a>
                                </li>
                                <?php if ($userSess['userType'] == 4) { ?>
                                    <li>
                                        <a href="#tab5" role="tab" data-toggle="tab" class="brown-text text-darken-4"><strong><span class="fa fa-building fa-fw"></span> Tempat Tugas</strong></a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <?php $this->load->view('admin/data_gantipass_identitas'); ?>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <form method="post" enctype="multipart/form-data" id="formprofil" class="form-horizontal">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="col-md-5 col-xs-5 control-label">Photo Profil .jpg | .png | .jpeg Max Size: 1MB</label>
                                                    <div class="col-md-3 col-xs-7">
                                                        <div id="user_image">
                                                            <img src="<?php
                                                                $photo = isset($userSess['userPhoto']) ? $userSess['userPhoto'] : '';
                                                                echo $photo ? base_url('media/user/photo/profil/' . $photo) . '?nocache=' . time() : base_url('assets/img/users/no-image.jpg') . '?nocache=' . time();
                                                            ?>" class="img-thumbnail" />
                                                        </div>
                                                        <input type="file" name="upload_photo" class="file-upload-default">
                                                        <div class="input-group col-xs-6">
                                                            <input type="text" class="form-control file-upload-primary" disabled placeholder="Upload Photo">
                                                            <span class="input-group-append">
                                                                <button class="file-upload-browse btn btn-primary" type="button">Pilih Photo</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-offset-3 col-md-4 col-xs-4">
                                                        <button id="btngantiphoto" type="button" class="btn btn-primary btn-block btn-rounded">Ganti Photo</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <form method="post" enctype="multipart/form-data" id="formprofilpass" class="form-horizontal">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-5 control-label">Password Lama</label>
                                                    <div class="col-md-6 col-xs-7">
                                                        <input id="passlama" type="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-5 control-label">Password Baru</label>
                                                    <div class="col-md-6 col-xs-7">
                                                        <input id="passbaru" type="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-5 control-label">Ulangi Password Baru</label>
                                                    <div class="col-md-6 col-xs-7">
                                                        <input id="passbaruu" type="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-offset-3 col-md-4 col-xs-4">
                                                        <button type="button" id="btnsimpan" class="btn btn-danger btn-block btn-rounded">Ganti Password</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tab4">
                                    <form method="post" enctype="multipart/form-data" id="formdatasimpeg" class="form-horizontal">
                                        <div class="card">
                                            <div class="card-body">
											<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="NIP">NIP</label>
													<input type="text" class="form-control" id="NIP" name="NIP" value="<?php echo $tbuserData['NIP']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="NIP_BARU">NIP Baru</label>
													<input type="text" class="form-control" id="NIP_BARU" name="NIP_BARU" value="<?php echo $tbuserData['NIP_BARU']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="NAMA">Nama</label>
													<input type="text" class="form-control" id="NAMA" name="NAMA" value="<?php echo $tbuserData['NAMA']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="NAMA_LENGKAP">Nama Lengkap</label>
													<input type="text" class="form-control" id="NAMA_LENGKAP" name="NAMA_LENGKAP" value="<?php echo $tbuserData['NAMA_LENGKAP']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="AGAMA">Agama</label>
													<input type="text" class="form-control" id="AGAMA" name="AGAMA" value="<?php echo $tbuserData['AGAMA']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="TEMPAT_LAHIR">Tempat Lahir</label>
													<input type="text" class="form-control" id="TEMPAT_LAHIR" name="TEMPAT_LAHIR" value="<?php echo $tbuserData['TEMPAT_LAHIR']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="TANGGAL_LAHIR">Tanggal Lahir</label>
													<input type="date" class="form-control" id="TANGGAL_LAHIR" name="TANGGAL_LAHIR" value="<?php echo $tbuserData['TANGGAL_LAHIR']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="JENIS_KELAMIN">Jenis Kelamin</label>
													<input type="text" class="form-control" id="JENIS_KELAMIN" name="JENIS_KELAMIN" value="<?php echo $tbuserData['JENIS_KELAMIN']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="PENDIDIKAN">Pendidikan</label>
													<input type="text" class="form-control" id="PENDIDIKAN" name="PENDIDIKAN" value="<?php echo $tbuserData['PENDIDIKAN']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="KODE_LEVEL_JABATAN">Kode Level Jabatan</label>
													<input type="text" class="form-control" id="KODE_LEVEL_JABATAN" name="KODE_LEVEL_JABATAN" value="<?php echo $tbuserData['KODE_LEVEL_JABATAN']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="LEVEL_JABATAN">Level Jabatan</label>
													<input type="text" class="form-control" id="LEVEL_JABATAN" name="LEVEL_JABATAN" value="<?php echo $tbuserData['LEVEL_JABATAN']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="PANGKAT">Pangkat</label>
													<input type="text" class="form-control" id="PANGKAT" name="PANGKAT" value="<?php echo $tbuserData['PANGKAT']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="GOL_RUANG">Golongan/Ruang</label>
													<input type="text" class="form-control" id="GOL_RUANG" name="GOL_RUANG" value="<?php echo $tbuserData['GOL_RUANG']; ?>" disabled>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="TMT_CPNS">TMT CPNS</label>
													<input type="date" class="form-control" id="TMT_CPNS" name="TMT_CPNS" value="<?php echo $tbuserData['TMT_CPNS']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="TMT_PANGKAT">TMT Pangkat</label>
													<input type="date" class="form-control" id="TMT_PANGKAT" name="TMT_PANGKAT" value="<?php echo $tbuserData['TMT_PANGKAT']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="MASAKERJA_TAHUN">Masa Kerja (Tahun)</label>
													<input type="text" class="form-control" id="MASAKERJA_TAHUN" name="MASAKERJA_TAHUN" value="<?php echo $tbuserData['MASAKERJA_TAHUN']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="MASAKERJA_BULAN">Masa Kerja (Bulan)</label>
													<input type="text" class="form-control" id="MASAKERJA_BULAN" name="MASAKERJA_BULAN" value="<?php echo $tbuserData['MASAKERJA_BULAN']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="TIPE_JABATAN">Tipe Jabatan</label>
													<input type="text" class="form-control" id="TIPE_JABATAN" name="TIPE_JABATAN" value="<?php echo $tbuserData['TIPE_JABATAN']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="KODE_JABATAN">Kode Jabatan</label>
													<input type="text" class="form-control" id="KODE_JABATAN" name="KODE_JABATAN" value="<?php echo $tbuserData['KODE_JABATAN']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="TAMPIL_JABATAN">Tampil Jabatan</label>
													<input type="text" class="form-control" id="TAMPIL_JABATAN" name="TAMPIL_JABATAN" value="<?php echo $tbuserData['TAMPIL_JABATAN']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="TMT_JABATAN">TMT Jabatan</label>
													<input type="date" class="form-control" id="TMT_JABATAN" name="TMT_JABATAN" value="<?php echo $tbuserData['TMT_JABATAN']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="KODE_SATKER_1">Kode Satker 1</label>
													<input type="text" class="form-control" id="KODE_SATKER_1" name="KODE_SATKER_1" value="<?php echo $tbuserData['KODE_SATKER_1']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="SATKER_1">Satker 1</label>
													<input type="text" class="form-control" id="SATKER_1" name="SATKER_1" value="<?php echo $tbuserData['SATKER_1']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="KODE_SATKER_2">Kode Satker 2</label>
													<input type="text" class="form-control" id="KODE_SATKER_2" name="KODE_SATKER_2" value="<?php echo $tbuserData['KODE_SATKER_2']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="SATKER_2">Satker 2</label>
													<input type="text" class="form-control" id="SATKER_2" name="SATKER_2" value="<?php echo $tbuserData['SATKER_2']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="KODE_SATKER_3">Kode Satker 3</label>
													<input type="text" class="form-control" id="KODE_SATKER_3" name="KODE_SATKER_3" value="<?php echo $tbuserData['KODE_SATKER_3']; ?>" disabled>
												</div>
												<div class="form-group">
													<label for="SATKER_3">Satker 3</label>
													<input type="text" class="form-control" id="SATKER_3" name="SATKER_3" value="<?php echo $tbuserData['SATKER_3']; ?>" disabled>
												</div>
											</div>
											
										</div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php if ($userSess['userType'] == 4) { ?>
                                    <div class="tab-pane" id="tab5">
                                        <?php $this->load->view('admin/data_gantipass_tempattugas'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script type="text/javascript">
	var selected = '';
	var nama = $("#nama"),
		passbaru = $("#passbaru"),
	    passlama = $("#passlama"),
	    passbaruu = $("#passbaruu"),
	    btnsimpan = $('#btnsimpan'),
	    btngantiphoto = $('#btngantiphoto');
	$(document).ready(function(){
		btnsimpan.click(function(e){
		   e.preventDefault();
		   simpandata();
		});
		btngantiphoto.click(function(e){
		   e.preventDefault();
		   simpanphoto();
		});
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		  var target = $(e.target).attr("href");
		  $('a[data-toggle="tab"]').parent().removeClass('active');
		  $('a[href="'+target+'"]').parent().addClass('active');
		});
	})
	function simpanphoto(){
		var cek = new FormData($('#formprofil')[0]);
	  	 $.ajax({
		        url:  "<?php echo base_url('index.php/user/gantiphoto')?>",
		        type: 'POST',
		        data: cek,
		        async: false,
			    cache: false,
			    contentType: false,
			    processData: false,
		        dataType: 'JSON',
		        success: function (result) {
		        	if (result.error != '' && result.error != undefined){
							swal({title: "ERROR!!",text: result.error,type: "error",},
							function(){
							  //grecaptcha.reset();
							});					
						} else {
							swal({title: 'SUKSES!!',text: result.success,type: "success",});
						}
		        }
		    });
	}
	function simpandata(url){
		if (passlama.val() != '' && passbaruu.val() != '' && passbaru.val() != ''){
			if (passbaru.val() == passbaruu.val()){
				$.post("<?php echo base_url('index.php/user/gantipasspost')?>",{
					passbaru : passbaru.val(),
			    	passlama : passlama.val(),
			    	passbaruu : passbaruu.val(),
					},function(result){
						swal({title: result.title,text: result.text,type: result.type});	
				},'json');			
			} else {
				swal({title: 'ERROR !!',text: 'Password Lama dan Ulangi Password Lama Tidak Sama',type: 'error'});
			}
		} else {
			swal({title: 'ERROR !!',text: 'Password Tidak Boleh Kosong',type: 'error'});
		}

	}
	
	
</script>                              







