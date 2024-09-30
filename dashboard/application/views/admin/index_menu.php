<style>
  .sidebar .nav .nav-item .nav-link{
    height: 100% !important;
    padding: 0.5rem 0.5rem 0.5rem 1.875rem !important;
  }
  .sidebar .nav .nav-item .nav-head {
      padding-left: 15px !important;
      padding-bottom: .4rem !important;
  }
</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
  <li class="nav-item nav-profile">
    <div class="nav-link">
      <div class="profile-image"> <img src="<?php 
                                $photo = isset($userSess['userPhoto'])?$userSess['userPhoto']:'';
	                            if ($photo == ''){
									echo base_url('assets/img/users/no-image.jpg').'?nocache='.time();
								}  else {
									echo base_url('media/user/photo/profil/'.$userSess['userPhoto']).'?nocache='.time();
								}?>" alt="image"/> <span class="online-status online"></span> </div>
      <div class="profile-name">
        <p class="name"><?php echo $userSess['userNama'];?></p>
        <p class="designation"><?php echo $userSess['typeNama'];?></p>
        <div class="badge mx-auto mt-3"><a href="<?php echo base_url('index.php/user/profil')?>" type="button" class="btn btn-inverse-primary btn-rounded btn-fw">Profil</a></div>
      </div>
    </div>
    
  </li>
  <li class="nav-item"><a class="nav-link nav-head" href="<?php echo base_url()?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/01.png')?>" alt="menu icon"><span class="menu-title">Dashboard</span></a></li>
  <?php //if ($userSess['userType'] <=2  ){?>
  <li class="nav-item"><a class="nav-link nav-head" href="<?php echo base_url('index.php/data/rekapsuratmasuk')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/07.png')?>" alt="menu icon"><span class="menu-title">Rekap Surat Masuk <i>{Beta}</i> </span></a></li>
  <?php //}?>  
  <li class="nav-item"><a class="nav-link nav-head" href="<?php echo base_url('index.php/data/suratkeluar')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/07.png')?>" alt="menu icon"><span class="menu-title">Surat Keluar</span></a></li>
  <li class="nav-item"><a class="nav-link nav-head" href="<?php echo base_url('index.php/data/ikm')?>"><i class="fa fa-star-o orange-text fa-lg fa-fw menu-iconx"></i><span class="menu-title">IKM</span></a></li>
  <?php if ($userSess['userType'] < 13  ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#Sekretariat" aria-expanded="false" aria-controls="Sekretariat"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/subagtu.png')?>" alt="menu icon"> <span class="menu-title">Sekretariat</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="Sekretariat">
      <ul class="nav flex-column sub-menu">
  <?php 
      $sql = $this->db->query('select * from tblayanan where menuKode = "01"');

      foreach ($sql->result() as $row) {
  ?>
<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/data/suratmasuk/').$row->layananView;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucwords(strtolower($row->layananJenis));?></span></a></li>
  <?php
      }
  
  ?>

  <?php if ($userSess['userType'] <= 2  ){?>
  <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/data/bukutamu')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title">Buku tamu</span></a></li>
  <!-- <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/data/ikm')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title">IKM</span></a></li> -->
  <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/data/kembangzio')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title">Kembang ZIO</span></a></li>

  <?php }?>
  </ul>
    </div>
  </li>
  <?php }?>
  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 3 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#Bimas" aria-expanded="false" aria-controls="Bimas"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/bimasislam.png')?>" alt="menu icon"> <span class="menu-title">Bimas Islam</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="Bimas">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '02' and not layananKode in ('08','09') AND IFNULL(layananTemplate,'') <> '' ");
  
  foreach ($sqlpendma->result() as $key => $val) {
    $href = base_url('index.php/data/bimas-islam/').$val->layananView;

?> 
  <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?></span></a></li>
  <?php }?>
      </ul>
    </div>
  </li>
  <?php }?>
  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 7 ){?>
  <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#Haji" aria-expanded="false" aria-controls="Haji"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/hajiumrah.png')?>" alt="menu icon"> <span class="menu-title">Haji & Umrah</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="Haji">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '03' AND IFNULL(layananTemplate,'') <> '' ");
  
  foreach ($sqlpendma->result() as $key => $val) {
    $href = base_url('index.php/data/haji-umrah/').$val->layananView;

?> 
  <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?></span></a></li>
  <?php }?>
      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/data/travel');?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title">Master Data Travel</span></a></li>
      </ul>
    </div>
  </li>
  <?php }?>
  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 4 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#PENMA" aria-expanded="false" aria-controls="PENMA"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/madrasah.png')?>" alt="menu icon">
    <span class="menu-title">PENMA</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="PENMA">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '04' AND IFNULL(layananTemplate,'') <> '' ");
  
    foreach ($sqlpendma->result() as $key => $val) {
      $href = base_url('index.php/data/pendma/').$val->layananView;

  ?> 
    <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?></span></a></li>
    <?php }?>
    </ul>
    </div>
  </li>
  <?php }?>
  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 5 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#PAIS" aria-expanded="false" aria-controls="PAIS"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/pais.png')?>" alt="menu icon">
    <span class="menu-title">PAIS</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="PAIS">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '05' AND IFNULL(layananTemplate,'') <> '' ");
  
    foreach ($sqlpendma->result() as $key => $val) {
      $href = base_url('index.php/data/pais/').$val->layananView;

  ?> 
    <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?></span></a></li>
    <?php }?>
    </ul>
    </div>
  </li>
  <?php }?>

  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 6 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#PONTREN" aria-expanded="false" aria-controls="PONTREN"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/pontren.png')?>" alt="menu icon">
    <span class="menu-title">PD PONTREN</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="PONTREN">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '06' AND IFNULL(layananTemplate,'') <> '' ");
  
    foreach ($sqlpendma->result() as $key => $val) {
      $href = base_url('index.php/data/pd-pontren/').$val->layananView;

  ?> 
    <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?></span></a></li>
    <?php }?>
    </ul>
    </div>
  </li>
  <?php }?>
  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 8 ){?>
  <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#zakat" aria-expanded="false" aria-controls="zakat"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/zakatwakaf.png')?>" alt="menu icon"> <span class="menu-title">Zakat & Wakaf</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="zakat">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '07' AND IFNULL(layananTemplate,'') <> '' ");
  
  foreach ($sqlpendma->result() as $key => $val) {
    $href = base_url('index.php/data/zakat-wakaf/').$val->layananView;

?> 
  <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?></span></a></li>
  <?php }?>
      </ul>
    </div>
  </li>
  <?php }?>
  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 10 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#KRISTEN" aria-expanded="false" aria-controls="KRISTEN"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/kristen.png')?>" alt="menu icon">
    <span class="menu-title">Layanan Kristen</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="KRISTEN">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '08' AND IFNULL(layananTemplate,'') <> '' ");
  
    foreach ($sqlpendma->result() as $key => $val) {
      $href = base_url('index.php/data/layanan-kristen/').$val->layananView;

  ?> 
    <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?></span></a></li>
    <?php }?>
    </ul>
    </div>
  </li>
  <?php }?>

  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 9 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#BUDDHA" aria-expanded="false" aria-controls="BUDDHA"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/buddha.png')?>" alt="menu icon">
    <span class="menu-title">Layanan Buddha</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="BUDDHA">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '09' AND IFNULL(layananTemplate,'') <> '' ");
  
    foreach ($sqlpendma->result() as $key => $val) {
      $href = base_url('index.php/data/layanan-buddha/').$val->layananView;

  ?> 
    <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?></span></a></li>
    <?php }?>
    </ul>
    </div>
  </li>
  <?php }?>
 
  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 11 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#KATOLIK" aria-expanded="false" aria-controls="KATOLIK"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/katolik.png')?>" alt="menu icon">
    <span class="menu-title">Layanan Katolik</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="KATOLIK">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '10' AND IFNULL(layananTemplate,'') <> '' ");
  
    foreach ($sqlpendma->result() as $key => $val) {
      $href = base_url('index.php/data/layanan-katolik/').$val->layananView;

  ?> 
    <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?></span></a></li>
    <?php }?>
    </ul>
    </div>
  </li>
  <?php }?> 
  <?php if ($userSess['userType'] <= 2  ||  $userSess['userType'] == 12 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#Pengadaan" aria-expanded="false" aria-controls="Pengadaan"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/pengadaan.png')?>" alt="menu icon">
    <span class="menu-title">Pengadaan</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="Pengadaan">
      <ul class="nav flex-column sub-menu">
  <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/data/pengadaan')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title">Pengadaan</span></a></li>
  </ul>
    </div>
  </li>
  <?php }?>
  <?php if ($userSess['userType'] == 0 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#Master" aria-expanded="false" aria-controls="Master"> 
    <img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/01.png')?>" alt="menu icon">
    <span class="menu-title">Master Data</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="Master">
      <ul class="nav flex-column sub-menu">
    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/user/administrator')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/02.png')?>" alt="menu icon"><span class="menu-title">User Manager</span></a></li>
    </ul>
    </div>
  </li>
  <?php }?>
  <!-- <li class="nav-item"> -->
  <a href="<?php echo base_url('index.php/page/logout')?>" type="button" class="btn btn-inverse-danger btn-rounded btn-fw m-4"><i class="fa fa-power-off"></i> Sign Out</a>
  <!-- </li> -->
</ul>
</nav>