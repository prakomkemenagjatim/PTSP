<?php $this->load->view('site/web_headlayanan')?>
 <style>
 .counter {
    background-color:#f5f5f5;
    padding: 10px 0;
    border-radius: 5px;
}

.count-title {
    font-size: 30px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.count-text {
    font-size: 13px;
    font-weight: normal;
    margin-bottom: 0;
    text-align: center;
}

.fa-2x {
    margin: 0 auto;
    float: none;
    display: table;
    color: #4CAF50;
}
 </style>
    <div class="page-header  py-5 text-center position-relative bg-secondary  box-shadow-dark">
	    <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div>
	    <div class="container "style="padding-bottom:3rem">
			<h1 class="page-heading single-col-max mx-auto white-text"><?php echo $head; ?></h1>
			<div class="page-intro single-col-max mx-auto yellow-text"><?php echo $subhead; ?></div>
			<div class="d-block mx-auto" style="padding-top: 1rem;padding-bottom:3rem">
			
			<div class="w-100">
				<header class="section-header">
					<h3 class="mt-5 mb-5 green-text" style="font-size: 22px;" ><?php echo $subhead1; ?></h3>
				</header>
				<?php $norekom =  isset($norekom)?$norekom:'';
					 if ($norekom != ''){
				?>
				<div class="row justify-content-center">

					<div class="col-12 col-lg-6 py-2">
						<div class="card bg-secondary  box-shadow-dark">
							<div class="card-body padding-10 black-text " style="text-align: left;font-size: 12px;">
								<div class='col-sm-12  mt-4'>
									<div class="form-group">
										<label for="nolayanan" class="control-label green-text">Nomor Rekom</label>
										<span class="form-control form-text" style="height:auto"><?php echo isset($norekom)?$norekom:''; ?> </span>
									</div>    
								</div>  
								<div class='col-sm-12'>
									<div class="form-group">
										<label for="nama" class="control-label green-text">Nama</label>
										<span class="form-control form-text" style="height:auto"><?php echo isset($nama)?$nama:''; ?> </span>
									</div>    
								</div> 
								<div class='col-sm-12'>
									<div class="form-group">
										<label for="layanan" class="control-label green-text">Tempat, Tgl. Lahir</label>
										<span class="form-control form-text" style="height:auto"><?php echo isset($lahir)?$lahir:''; ?></span>
									</div>    
								</div>
								<div class='col-sm-12'>
									<div class="form-group">
										<label for="layanan" class="control-label green-text">Alamat</label>
										<span class="form-control form-text" style="height:auto"><?php echo isset($alamat)?$alamat:''; ?></span>
									</div>    
								</div>
								<div class='col-sm-12'>
									<div class="form-group">
										<label for="layanan" class="control-label green-text">No. Handphone</label>
										<span class="form-control form-text" style="height:auto"><?php echo isset($hp)?$hp:''; ?></span>
									</div>    
								</div>
								<div class='col-sm-12'>
									<div class="form-group">
										<label for="layanan" class="control-label green-text">Travel</label>
										<span class="form-control form-text" style="height:auto"><?php echo isset($travel)?$travel:''; ?></span>
									</div>    
								</div>
								<div class='col-sm-12'>
									<div class="form-group">
										<label for="layanan" class="control-label green-text">Tanggal Rekom</label>
										<span class="form-control form-text" style="height:auto"><?php echo isset($tglrekom)?$tglrekom:''; ?></span>
									</div>    
								</div>
								<div class='col-sm-12 text-warning'>
								<div class="rounded bg-dark p-3 mt-5">
									<span class="text-warning" style="font-size: 14px;">
									Pastikan alamat website pada browser Anda adalah <span class="white-text"><?php echo base_url(); ?></span>.
Jika Data Jamaah Umroh pada Surat Rekomendasi <span class="white-text">sesuai dengan data tersebut diatas</span> dan <span class="white-text">telah dibubuhi stempel</span>, maka Kantor Kementerian Agama Kota Malang menyatakan keabsahan pada Surat Rekomendasi tersebut.   
								
									</span>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } else { echo '<div class="row justify-content-center"><div class="mt-5 mb-5"></div></div>';}?>
			 </div>
		</div>
	    </div>
    </div>                       
<?php $this->load->view('index_js'); ?> 


