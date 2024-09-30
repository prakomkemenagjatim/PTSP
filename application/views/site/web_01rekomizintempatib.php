
        <form class="form" action="modules.php?name=Layanan" method="post" enctype="multipart/form-data">
		<div class="row mb-4">
				<div class="col-sm-12">
					<h6>Silakan isi data dibawah ini (max ukuran file <?php echo sizeupload(); ?>) </h6>                       	
				</div>		
		</div>
		<div class="row">
				<div class="col-sm-12">
						<div class="form-group">
							<label for="nama" class="control-label">Nama Lengkap Pemohon</label>
							<input type="text" class="form-control" id="jml_1" name="cont[]" required>
						</div>                        	
				</div>		
		</div>
		<div class="row">
				<div class="col-sm-12">
						<div class="form-group">
							<label for="no_identitas" class="control-label">No Identitas Pemohon ( KTP / SIM )</label>
							<input type="text" class="form-control" id="jml_2" name="cont[]" required>
						</div>                        	
				</div>		
		</div>
		<div class="row">
				<div class="col-sm-12">
						<div class="form-group">
							<label for="alamat" class="control-label">Alamat Pemohon</label>
							<input type="text" class="form-control" id="jml_3" name="cont[]" required>
						</div>                        	
				</div>		
		</div><div class="row">

				<div class="col-sm-12">
						<div class="form-group">
							<label for="telp" class="control-label">Nomor Telepon / HP</label>
							<input type="text" class="form-control" id="jml_4" name="cont[]" required>
						</div>                        	
				</div>		
		</div><div class="row">

				<div class="col-sm-12">
						<div class="form-group">
							<label for="email" class="control-label">Email</label>
							<input type="text" class="form-control" id="jml_5" name="cont[]" required>
						</div>                        	
				</div>		
		</div><div class="row">

				<div class="col-sm-12">
						<div class="form-group">
							<label for="nama_tempatibadah" class="control-label">Nama Tempat Ibadah</label>
							<input type="text" class="form-control" id="jml_6" name="cont[]" required>
						</div>                        	
				</div>		
		</div><div class="row">

				<div class="col-sm-12">
						<div class="form-group">
						<label for="alamat_tempatibadah" class="control-label">Alamat Tempat Ibadah</label>
							<input type="text" class="form-control" id="jml_7" name="cont[]" required>
						</div>                        	
				</div>		
		</div><div class="row">

				<div class="col-sm-12">
						<div class="form-group">
							<label for="pemohon" class="control-label">Pemohon</label>
							<input type="text" class="form-control" id="jml_8" name="cont[]" required>
						</div>                        	
				</div>		
		</div><div class="row">

				<div class="col-sm-12">
						<div class="form-group">
							<label for="no_sp" class="control-label">Nomor Surat Permohonan</label>
							<input type="text" class="form-control" id="jml_9" name="cont[]" required>
						</div>                        	
				</div>		
		</div><div class="row">

				<div class="col-sm-12">
						<div class="form-group">
							<label for="tgl_sp" class="control-label">Tanggal Surat Permohonan</label>
							<input type="text" class="form-control" id="jml_10" name="cont[]" required>
						</div>                        	
				</div>		
		</div><div class="row">

				<div class="col-sm-12">
						<div class="form-group">
							<label for="no_sertifikat" class="control-label">No Sertifikat Tanah</label>
							<input type="text" class="form-control" id="jml_11" name="cont[]" required>
						</div>                        	
				</div>		
		</div><div class="row">

				<div class="col-sm-12">
						<div class="form-group">
							<label for="nama_sertifikat" class="control-label">Atas Nama Sertifikat Tanah</label>
							<input type="text" class="form-control" id="jml_12" name="cont[]" required>
						</div>                        	
				</div>		
		</div><div class="row">
				
				<div class="col-sm-12">
						<div class="form-group">
							<label for="foto_ktp" class="control-label">Fotocopy KTP pemohon</label>
							<input type="file" class="form-control" id="jmli_13" name="conti[]" accept="pdf, jpg, png, gif" required>
						</div>                        	
				</div>	
		</div><div class="row">
				
				<div class="col-sm-12">
					<div class="form-group">
						<label for="surat_kuasa" class="control-label">Surat Kuasa dan fotocopy KTP penerima kuasa apabila pengurusan diwakilkan</label>
						<input type="file" class="form-control" id="jmli_14" name="conti[]" accept="pdf, jpg, png, gif" required>
					</div>                        	
				</div>	
		</div><div class="row">
				
				<div class="col-sm-12">
					<div class="form-group">
						<label for="fc_sertifikat" class="control-label">Fotocopy sertifikat tanah</label>
						<input type="file" class="form-control" id="jmli_15" name="conti[]" accept="pdf, jpg, png, gif" required>
					</div>                        	
				</div>	
		</div>
		<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="daftar_namapengguna" class="control-label">Daftar nama calon pengguna tempat ibadah beserta fotocopy ktp yang diketahui pejabat setempat sebanyak 90 orang</label>
						<input type="file" class="form-control" id="jmli_16" name="conti[]" accept="pdf, jpg, png, gif" required>
					</div>                        	
				</div>	
		</div>
		<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="daftar_namapendukung" class="control-label">Daftar nama pendukung pendirian rumah ibadah beserta fotocopy KTP yang diketahui penjabat setempat sebanyak 60 orang</label>
						<input type="file" class="form-control" id="jmli_17" name="conti[]" accept="pdf, jpg, png, gif" required>
					</div>                        	
				</div>	
		</div>
		<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="gbr_teknis" class="control-label">Gambar teknis (tampak bangunan, potongan, pondasi, atap, sanitas) atau fotocopy bangunan tampak depan, samping kanan, samping kiri, belakang</label>
						<input type="file" class="form-control" id="jmli_18" name="conti[]" accept="pdf, jpg, png, gif" required>
					</div>                        	
				</div>	
		</div>
		<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="rekom_fkub" class="control-label">Rekomendasi dari FKUB</label>
						<input type="file" class="form-control" id="jmli_19" name="conti[]" accept="pdf, jpg, png, gif" required>

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
		