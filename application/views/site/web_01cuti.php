<form class="form" action="modules.php?name=Layanan" method="post" enctype="multipart/form-data">	
		<div class="row mb-4">
				<div class="col-sm-12">
					<h6>Silakan isi data dibawah ini (max ukuran file <?php echo sizeupload(); ?>) </h6>                       	
				</div>		
		</div>		
			<div class="row">
                <div class='col-sm-12'>
                     <div class="form-group">
                        <label for="nip" class="control-label">MASUKKAN NIP ANDA</label>
                         <input type="text" class="form-control" id="nip" name="nip" required onkeyup="PegHasil(this.value)">
                      </div>                        	
                </div>			
          	<hr>									
			
			</div>
			<div class="row">			
					<div class="col-md-12">				
<div id="HasilCariPeg"></div>			    
					</div>
			</div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
					<label>Mulai Cuti</label>
						<div class="input-group">
								<input name="starti" type="text" class="form-control pull-right" placeholder="Mulai Cuti" id="datepickered1" required>	
						</div>
                  </div>
                </div>				
                <div class="col-sm-6">
                  <div class="form-group">
					<label>Selesai Cuti</label>
						<div class="input-group">
							<!--div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
							</div-->
								<input name="endi" type="text" class="form-control pull-right" placeholder="Selesai Cuti" id="datepickered" required>	
						</div><!-- /.input group -->
                  </div><!-- /.form-group -->
                </div><!-- /.col -->				
              </div><!-- /.row -->				
			
			<div class="row">
					<div class="col-md-12">
	                    <div class="form-group">
                            <label for="progress">Pilih Jenis Cuti</label>	
							
                    <select name="jenis" class="form-control select2" style="width: 100%;" required>
						<option value="">- Pilih Jenis Cuti -</option>
						<option value="Cuti Tahunan">- Cuti Tahunan -</option>
						<option value="Cuti Sakit">- Cuti Sakit -</option>
						<option value="Cuti Besar">- Cuti Besar -</option>
						<option value="Cuti Melahirkan">- Cuti Melahirkan -</option>
						<option value="Cuti Karena Alasan Penting">- Cuti Karena Alasan Penting -</option>
						<option value="Cuti diluar Tanggungan Negara">- Cuti diluar Tanggungan Negara -</option>					
					</select>
				    	</div>	
				    	
            <div class="form-group">
                <label for="alasan">Alasan Cuti</label>
                    <input type="text" class="form-control" id="alasan" name="alasan" required>
            </div>	    
            <div class="form-group">
                <label for="alamat">Alamat Selama Menjalankan Cuti</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="tlp">Nomor Telpon yang bisa di kontak</label>
                    <input type="text" class="form-control" id="tlp" name="tlp" required>
            </div>	
            <div class="form-group">
                <label for="file">Upload File Lembar Persetujuan/Pertimbangan Atasan Langsung</label>
                    <input type="file" class="form-control" id="file" name="file" accept="pdf, jpg, jpeg" required>
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