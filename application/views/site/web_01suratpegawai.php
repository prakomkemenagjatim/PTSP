			
        <form class="form" action="modules.php?name=Layanan" method="post" enctype="multipart/form-data">
				<div class="row mb-4">
						<div class="col-sm-12">
							<h6>Silakan isi data dibawah ini (max ukuran file <?php echo sizeupload(); ?>) </h6>                       	
						</div>		
				</div>			
				<div class="row">
		
						<div class="col-sm-12">
							 <div class="form-group">
								<label for="nama_pemohon" class="control-label">Nama Pemohon</label>
								<input id="jml_1'" name="jml[]" value="1" type="hidden">
								<input id="takon_1'" value="nama_pemohon" name="takon[]" type="hidden">
								<input id="reg_1'" value="708" name="reg[]" type="hidden">
								 <input type="text" class="form-control" id="jml_1" name="cont[]" required>
							  </div>                        	
						</div>		
				</div>
				<div class="row">
		
						<div class="col-sm-12">
							 <div class="form-group">
								<label for="instansi" class="control-label">Nama Instansi</label>
								<input id="jml_2'" name="jml[]" value="2" type="hidden">
								<input id="takon_2'" value="instansi" name="takon[]" type="hidden">
								<input id="reg_2'" value="709" name="reg[]" type="hidden">
								 <input type="text" class="form-control" id="jml_2" name="cont[]" required>
							  </div>                        	
						</div>		
				</div><div class="row">
						
						<div class="col-sm-12">
							 <div class="form-group">
								<label for="file_surat" class="control-label">Upload Berkas / Dokumen</label>
								<input id="jmli_3'" name="jmli[]" value="3" type="hidden">			
								<input id="takon_3'" value="file_surat" name="takon[]" type="hidden">
								<input id="regi_3'" value="710" name="regi[]" type="hidden">
								 <input type="file" class="form-control" id="jmli_3" name="conti[]" accept="pdf, jpg, docx, xlsx" required>
								 <!--span class="ui-icon ft-camera"></span><input type="file" class="form-control" id="jmli_3" name="conti[]" accept="image/*" capture="camera"-->
							  </div>                        	
						</div>	
				</div>
				<div class="row justify-content-end">
					<div class="col-lg-4 col-md-4 margin-t-15">  
						<button class="btn btn-primary btn-block teal darken-4" style="border-radius: 40px;font-weight: normal;font-size: 14px;" onclick="simpandata();return false;">
						<span class="fa fa-paper-plane fa-fw" aria-hidden="true"></span> Kirim</button>
					</div> 
				</div>
		</form>
		