<nav class="navbar navbar-dark col-lg-12 col-12 p-0 fixed-top d-flex flex-row  box-shadow-dark" style="background-color: #066051;">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center " style="height: 70px;background-color: #066051;">
    <a class="navbar-brand brand-logo  pt-0 pr-2 pl-2 pb-2" href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/images/santun4.png')?>" alt="logo"  class=" box-shadow-dark" style="height: 75px;width: auto;padding: 2px 20px;border-radius: 0 0 20px 20px;background-color:#f5f5f5"/></a>
    <a class="navbar-brand brand-logo-mini pt-0 pr-2 pl-2 pb-2" href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/images/santun4.png')?>" alt="logo"  class=" box-shadow-dark" style="height: 80px;width: auto;padding: 3px;border-radius: 0 0 20px 20px;background-color:#f5f5f5" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center " style="background-color: #066051;">
    <ul class="navbar-nav navbar-nav-right" style="background-color: #066051;">
      <li class="nav-item d-none d-lg-block dropdown">
        <a class="nav-link" href="#" id="notificationDropdown" data-toggle="dropdown" >
          <?php echo $userSess['userNama'];?> 
          <img class="img-xs rounded-circle" src="<?php 
                            $photo = isset($userSess['userPhoto'])?$userSess['userPhoto']:'';
                            if ($photo == ''){
								echo base_url('assets/img/users/no-image.jpg').'?nocache='.time();
							}  else {
								echo base_url('media/user/photo/profil/'.$userSess['userPhoto']).'?nocache='.time();
							}
                            ?>" alt="">
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown" style="background-color: #066051;">
          <a class="dropdown-item padding-10" href="<?php echo base_url('index.php/user/profil')?>">
            <div class="">
              <h6 class="fz-12 fw-500"><i class="fa fa-user-circle"></i> Edit Profil</h6>
            </div>
          </a>
          <a class="dropdown-item padding-10" href="<?php echo base_url('index.php/page/logout')?>">
            <div class="">
              <h6 class="fz-12 fw-500"><i class="fa fa-power-off"></i> Sign Out</h6>
            </div>
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>