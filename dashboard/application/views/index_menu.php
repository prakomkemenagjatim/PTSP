<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
 
  
  
  
  <li class="nav-item"><a class="nav-link nav-head" href="<?php echo base_url()?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/bar-chart.png')?>" alt="menu icon"><span class="menu-title">Dashboard</span></a></li>
  <?php if ($userSess['userType'] <=2  ){?>
  <li class="nav-item"><a class="nav-link nav-head" href="<?php echo base_url('index.php/data/arahan')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/project-manager.png')?>" alt="menu icon"><span class="menu-title">Menunggu Arahan </span></a></li>
  <?php }?>  
  
  
  
  <?php if ($userSess['userType'] <=2  ){?>
  <li class="nav-item"><a class="nav-link nav-head" href="<?php echo base_url('index.php/data/rekapsuratmasuk')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/email.png')?>" alt="menu icon"><span class="menu-title">Rekap Surat Masuk  </span></a></li>
  <?php }?>  
  <!-- <i>{Beta}</i> -->
  <!-- <li class="nav-item"><a class="nav-link nav-head" href="<?php echo base_url('index.php/data/suratkeluar')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/mail.png')?>" alt="menu icon"><span class="menu-title">Surat Keluar</span></a></li> -->
  <!--<li class="nav-item"><a class="nav-link nav-head" href="<?php echo base_url('index.php/data/notadinas')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/notes.png')?>" alt="menu icon"><span class="menu-title">Nota Dinas</span></a></li>-->
  <li class="nav-item"><a class="nav-link nav-head" href="<?php echo base_url('index.php/data/ikm')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/rating.png')?>" alt="menu icon"><span class="menu-title">IKM</span></a></li>
  <?php if ($userSess['userType'] < 20  ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#Sekretariat" aria-expanded="false" aria-controls="Sekretariat"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/banking.png')?>" alt="menu icon"> <span class="menu-title">Sekretariat <i class="fa fa-envelope red-text m01" style="display:none" aria-hidden="true"></i></span><i class="menu-arrow"></i></a>
    <div class="collapse" id="Sekretariat">
      <ul class="nav flex-column sub-menu">
  <?php 
      $sql = $this->db->query('select * from tblayanan where menuKode = "01"');

      foreach ($sql->result() as $row) {
  ?>
    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/data/suratmasuk/').$row->layananView;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucwords(strtolower($row->layananJenis));?>&nbsp;<i class="m<?php echo $row->menuKode.$row->layananKode;?>" style="display:none" aria-hidden="true"> <span class="count-indicator"><span class="count c<?php echo $row->menuKode.$row->layananKode;?>">0</span></span></i></span></a></li>
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
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/mosque.png')?>" alt="menu icon"> <span class="menu-title">Bimas Islam <i class="fa fa-envelope red-text m02" style="display:none" aria-hidden="true"></i></span><i class="menu-arrow"></i></a>
    <div class="collapse" id="Bimas">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '02' and not layananKode in ('08','09') AND IFNULL(layananTemplate,'') <> '' ");
  
  foreach ($sqlpendma->result() as $key => $val) {
    $href = base_url('index.php/data/bimas-islam/').$val->layananView;

?> 
  <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?>&nbsp;<i class="m<?php echo $val->menuKode.$val->layananKode;?>" style="display:none" aria-hidden="true"> <span class="count-indicator"><span class="count c<?php echo $val->menuKode.$val->layananKode;?>">0</span></span></i></span></a></li>
  <?php }?>
      </ul>
    </div>
  </li>
  <?php }?>
  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 7 ){?>
  <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#Haji" aria-expanded="false" aria-controls="Haji"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/kaaba.png')?>" alt="menu icon"> <span class="menu-title">Haji & Umrah <i class="fa fa-envelope red-text m03" style="display:none" aria-hidden="true"></i></span><i class="menu-arrow"></i></a>
    <div class="collapse" id="Haji">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '03' AND IFNULL(layananTemplate,'') <> '' ");
  
  foreach ($sqlpendma->result() as $key => $val) {
    $href = base_url('index.php/data/haji-umrah/').$val->layananView;

?> 
  <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?>&nbsp;<i class="m<?php echo $val->menuKode.$val->layananKode;?>" style="display:none" aria-hidden="true"> <span class="count-indicator"><span class="count c<?php echo $val->menuKode.$val->layananKode;?>">0</span></span></i></span></a></li>
  <?php }?>
      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/data/travel');?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title">Master Data Travel</span></a></li>
      </ul>
    </div>
  </li>
  <?php }?>
  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 4 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#PENMA" aria-expanded="false" aria-controls="PENMA"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/quran3.png')?>" alt="menu icon">
    <span class="menu-title">PENMA <i class="fa fa-envelope red-text m04" style="display:none" aria-hidden="true"></i></span><i class="menu-arrow"></i></a>
    <div class="collapse" id="PENMA">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '04' AND IFNULL(layananTemplate,'') <> '' ");
  
    foreach ($sqlpendma->result() as $key => $val) {
      $href = base_url('index.php/data/pendma/').$val->layananView;

  ?> 
    <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?>&nbsp;<i class="m<?php echo $val->menuKode.$val->layananKode;?>" style="display:none" aria-hidden="true"> <span class="count-indicator"><span class="count c<?php echo $val->menuKode.$val->layananKode;?>">0</span></span></i></span></a></li>
    <?php }?>
    </ul>
    </div>
  </li>
  <?php }?>

  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 16 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#kepegawaian" aria-expanded="false" aria-controls="PEkepegawaianMA"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/planning.png')?>" alt="menu icon">
    <span class="menu-title">KEPEGAWAIAN <i class="fa fa-envelope red-text m04" style="display:none" aria-hidden="true"></i></span><i class="menu-arrow"></i></a>
    <div class="collapse" id="kepegawaian">
      <ul class="nav flex-column sub-menu">
  <?php $sqlup = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '16' AND IFNULL(layananTemplate,'') <> '' ");
  
    foreach ($sqlup->result() as $key => $val) {
      $href = base_url('index.php/data/kepegawaian/').$val->layananView;

  ?> 
    <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?>&nbsp;<i class="m<?php echo $val->menuKode.$val->layananKode;?>" style="display:none" aria-hidden="true"> <span class="count-indicator"><span class="count c<?php echo $val->menuKode.$val->layananKode;?>">0</span></span></i></span></a></li>
    <?php }?>
    </ul>
    </div>
  </li>
  <?php }?>

  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 5 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#PAIS" aria-expanded="false" aria-controls="PAIS"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/koran.png')?>" alt="menu icon">
    <span class="menu-title">PAIS <i class="fa fa-envelope red-text m05" style="display:none" aria-hidden="true"></i></span><i class="menu-arrow"></i></a>
    <div class="collapse" id="PAIS">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '05' AND IFNULL(layananTemplate,'') <> '' ");
  
    foreach ($sqlpendma->result() as $key => $val) {
      $href = base_url('index.php/data/pais/').$val->layananView;

  ?> 
    <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?>&nbsp;<i class="m<?php echo $val->menuKode.$val->layananKode;?>" style="display:none" aria-hidden="true"> <span class="count-indicator"><span class="count c<?php echo $val->menuKode.$val->layananKode;?>">0</span></span></i></span></a></li>
    <?php }?>
    </ul>
    </div>
  </li>
  <?php }?>

  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 6 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#PONTREN" aria-expanded="false" aria-controls="PONTREN"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/shalat.png')?>" alt="menu icon">
    <span class="menu-title">PD PONTREN <i class="fa fa-envelope red-text m06" style="display:none" aria-hidden="true"></i></span><i class="menu-arrow"></i></a>
    <div class="collapse" id="PONTREN">
      <ul class="nav flex-column sub-menu">
  <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '06' AND IFNULL(layananTemplate,'') <> '' ");
  
    foreach ($sqlpendma->result() as $key => $val) {
      $href = base_url('index.php/data/pd-pontren/').$val->layananView;

  ?> 
    <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?>&nbsp;<i class="m<?php echo $val->menuKode.$val->layananKode;?>" style="display:none" aria-hidden="true"> <span class="count-indicator"><span class="count c<?php echo $val->menuKode.$val->layananKode;?>">0</span></span></i></span></a></li>
    <?php }?>
    </ul>
    </div>
  </li>
  <?php }?>
  <?php if ($userSess['userType'] < 2 ||  $userSess['userType'] == 8 ){?>
  <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#zakat" aria-expanded="false" aria-controls="zakat"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/zakat.png')?>" alt="menu icon"> <span class="menu-title">Zakat & Wakaf <i class="fa fa-envelope red-text m07" style="display:none" aria-hidden="true"></i></span><i class="menu-arrow"></i></a>
    <div class="collapse" id="zakat">
<ul class="nav flex-column sub-menu">
    <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '07' AND IFNULL(layananTemplate,'') <> '' ");
      foreach ($sqlpendma->result() as $key => $val) {
      $href = base_url('index.php/data/zakat-wakaf/').$val->layananView;
    ?> 
    <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?>&nbsp;<i class="m<?php echo $val->menuKode.$val->layananKode;?>" style="display:none" aria-hidden="true"> <span class="count-indicator"><span class="count c<?php echo $val->menuKode.$val->layananKode;?>">0</span></span></i></span></a></li>
    <?php }?>
</ul>
    </div>
  </li>
  <?php }?>


  
 
 
  <?php if ($userSess['userType'] <= 2  ||  $userSess['userType'] == 12 ){?>
    <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#Pengadaan" aria-expanded="false" aria-controls="Pengadaan"> 
    <img class="menu-iconx" src="<?php echo base_url('../assets/images/menu_icons/v3/study.png')?>" alt="menu icon">
    <span class="menu-title">Pengadaan <i class="fa fa-envelope red-text m12" style="display:none" aria-hidden="true"></i></span><i class="menu-arrow"></i></a>
    <div class="collapse" id="Pengadaan">
      <ul class="nav flex-column sub-menu">
  <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/data/pengadaan')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/04.png')?>" alt="menu icon"><span class="menu-title">Pengadaan&nbsp;<i class="m1201" style="display:none" aria-hidden="true"> <span class="count-indicator"><span class="count c1201">0</span></span></i></span></a></li>
  </ul>
    </div>
  </li>
  <?php }?>
  <?php if ($userSess['userType'] == 0 ||  $userSess['userType'] == 20 ){?>
  <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#kua" aria-expanded="false" aria-controls="kua"> 
    <img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/kua.png')?>" alt="menu icon">
    <span class="menu-title">KUA Keren</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="kua">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/kua/datakua')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/check.png')?>" alt="menu icon"><span class="menu-title">Data KUA</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/kua/layanankua')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/check.png')?>" alt="menu icon"><span class="menu-title">Layanan KUA</span></a></li>
        <?php $sqlpendma = $this->db->query("SELECT * FROM tblayanan WHERE menuKode = '17' AND IFNULL(layananTemplate,'') <> '' ");
          foreach ($sqlpendma->result() as $key => $val) {
          $href = base_url('index.php/data/kua-keren/').$val->layananView;
          ?> 
          <li class="nav-item"><a class="nav-link" href="<?php echo $href;?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/check.png')?>" alt="menu icon"><span class="menu-title"><?php echo ucfirst(strtolower($val->layananJenis));?>&nbsp;<i class="m<?php echo $val->menuKode.$val->layananKode;?>" style="display:none" aria-hidden="true"> <span class="count-indicator"><span class="count c<?php echo $val->menuKode.$val->layananKode;?>">0</span></span></i></span></a></li>
        <?php }?>
      </ul>
    </div>
  </li>
  <?php }?>
  <!-- <?php if ($userSess['userType'] == 0 ){?>
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
  <?php }?> -->
  
  <?php if ($userSess['userType'] == 0 && $userSess['userTingkat'] == 1 ){?>
  <li class="nav-item">
    <a class="nav-link nav-head" data-toggle="collapse" href="#refrensi" aria-expanded="false" aria-controls="Master"> 
    <img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/app-development.png')?>" alt="menu icon">
    <span class="menu-title">Refrensi</span><i class="menu-arrow"></i></a>
    <div class="collapse" id="refrensi">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/referensi/datamainmenu')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/web.png')?>" alt="menu icon"><span class="menu-title">Main Menu</span></a></li>
      </ul>
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/referensi/datalayanan')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/customer-service.png')?>" alt="menu icon"><span class="menu-title">Data Layanan</span></a></li>
      </ul>
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/user/administrator')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/settings.png')?>" alt="menu icon"><span class="menu-title">Ref Status Layanan</span></a></li>
      </ul>
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/user/administrator')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/management.png')?>" alt="menu icon"><span class="menu-title">Jenis User</span></a></li>
      </ul>
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/user/administrator')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/teamwork.png')?>" alt="menu icon"><span class="menu-title">User Manager</span></a></li>
      </ul>
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/update')?>"><img class="menu-iconx" src="<?php echo base_url('assets/images/menu_icons/update.png')?>" alt="menu icon"><span class="menu-title">Update Aplikasi</span></a></li>
      </ul>
    </div>
  </li>
  <?php }?>

  
  <!-- <li class="nav-item"> -->
  <a href="<?php echo base_url('index.php/page/logout')?>" type="button" class="btn btn-danger btn-rounded btn-fw m-2"><i class="fa fa-power-off"></i> Sign Out</a>
  <!-- </li> -->
</ul>
</nav>