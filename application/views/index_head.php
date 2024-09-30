

<head>
  <meta charset="utf-8">
   <meta name="author" content="MAHFUD DUWI SAPUTRO" />
   <meta name="email" content="mahfudds@gmail.com" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="com.websantun.ngawi">
  <!--<link rel="manifest" href="https://ptsp.kemenagngawi.or.id/manifest.json">-->
  <link rel="manifest" href="<?php echo base_url('assets/manifest.json')?>">
  <meta name="theme-color" content="#4caf50">
  <link rel="icon" sizes="192x192" href="https://ptsp.kemenagngawi.or.id/assets/images/icon-192x192.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo isset($title)?$title:'SANTUN KEMENAG KAB NGAWI';?></title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/theme.css?q=13')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css?q=2')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/animate/animate.min.css')?>">
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert2.min.css')?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/font-awesome/css/font-awesome.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/bootstrap-select.min.css')?>">
    <link href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet">

  <style>
  body{padding-top: 60px;}h1, h2, h3, h4, h5, h6{font-family: 'arial', sans-serif;color: #111;font-weight: 600;} .nav.nav-tabs li .active{color: #fff;background-color: #008877;}.nav.nav-tabs li a{color: #008877;}.form-control {border: 1px solid #d9d9d9 !important;color: #000;}.form-control:focus {border: 1px solid #008877 !important;color: #000;}.form-control.input-sm{ height: 30px; padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px;}.fa-fw{line-height: 1.4;}.btn.dropdown-toggle.btn-light{border: 0;font-size: 0.75rem;font-weight: normal; padding: 0; }#menu .dropdown-submenu{ position: relative}#menu .dropdown-submenu>.dropdown-menu{ top: 0; left: 100%; margin-top: -6px; margin-left: -1px; -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px}#menu .dropdown-submenu:hover>.dropdown-menu{ display: block}#menu .dropdown-submenu>a:after{ display: block; content: " "; float: right; width: 0; height: 0; border-color: transparent; border-style: solid; border-width: 5px 0 5px 5px; border-left-color: #ccc; margin-top: 5px; margin-right: -10px}#menu .dropdown-submenu:hover>a:after{ border-left-color: #fff}#menu .dropdown-submenu.pull-left{ float: none}#menu .dropdown-submenu.pull-left>.dropdown-menu{ left: -100%; margin-left: 10px; -webkit-border-radius: 6px 0 6px 6px; -moz-border-radius: 6px 0 6px 6px; border-radius: 6px 0 6px 6px}#menu .dropdown-menu{padding: 10px;width: 200px;font-size: 14px;font-weight: normal}#menu .dropdown-menu li{padding: 5px;color: #004d40;border-bottom: 1px solid #d9d9d9}#menu .dropdown-menu li a{color: #004d40;text-decoration: none}#menu .dropdown-menu li a:hover{color: #f2da00;text-decoration: none}.bootstrap-select{color: #000}.bootstrap-select.show-tick .dropdown-menu li a.dropdown-item{font-size: 12px}.bootstrap-select.show-tick .dropdown-menu li a.dropdown-item:active{background-color: #004d40}.bootstrap-select>.dropdown-toggle{color: #000}.docs-logo-wrapper{top:0 !important}.card-menu{min-height: 228px !important;cursor:pointer;margin-bottom: 30px !important;box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);border: 0 !important}.card-menu-title{font-size: .8rem !important;margin-bottom: .4rem !important;font-weight: bold;color: #111 !important;opacity: .7}.card-menu-subtitle{font-size: .7rem !important;letter-spacing: .5px;opacity: .8}.card-menulayanan{min-height: 210px !important;cursor:pointer;margin-bottom: 30px !important;box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);border: 0 !important}.card-menulayanan-title{font-size: .8rem !important;margin-bottom: .4rem !important;font-weight: bold;color: #111 !important; letter-spacing: 0.5px; opacity: .7}.navbar .active .nav-link{ color: #1e672f}.navbar .nav-link{ color: #1e672f; font-weight: 500}.navbar .active .nav-link:hover{ color: #1e672f}.navbar .nav-link:hover{ color: #1e672f; font-weight: 500}.navbar-toggler span{ display: block; background-color: #1e672f; height: 3px; width: 24px; margin-top: 5px; margin-bottom: 5px; transform: rotate(0deg); position: relative; left: 0; -webkit-opacity: 1; -moz-opacity: 1; opacity: 1; border-radius: 1px}.vison{opacity: 1; height: auto; transition: opacity 300ms ease-in;}.visoff{transition: opacity 1s ease-out; opacity: 0; height: 0; overflow: hidden;}.btnmenu{border: 2px solid #004d40; padding: 5px; border-radius: 5px; margin-left: 5px; font-size: 14px; width: 150px; text-align: center;}.dropdown-submenu{ position: relative}.dropdown-submenu>.dropdown-menu{ top: 0; left: 100%; margin-top: -6px; margin-left: -1px; -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px}.dropdown-submenu:hover>.dropdown-menu{ display: block}.dropdown-submenu>a:after{ display: block; content: " "; float: right; width: 0; height: 0; border-color: transparent; border-style: solid; border-width: 5px 0 5px 5px; border-left-color: #ccc; margin-top: 5px; margin-right: -10px}.dropdown-submenu:hover>a:after{ border-left-color: #fff}.dropdown-submenu.pull-left{ float: none}.dropdown-submenu.pull-left>.dropdown-menu{ left: -100%; margin-left: 10px; -webkit-border-radius: 6px 0 6px 6px; -moz-border-radius: 6px 0 6px 6px; border-radius: 6px 0 6px 6px}.dropdown-menu{padding: 10px;width: 200px;font-size: 14px;font-weight: normal}.dropdown-menu li{padding: 5px;color: #004d40;border-bottom: 1px solid #d9d9d9}.dropdown-menu li a{color: #004d40;text-decoration: none}.dropdown-menu li a:hover{color: #f2da00;text-decoration: none}.logo-icon{width: 60%;padding: 2px 20px; border-radius: 0 0 20px 20px;}@media (max-width: 1200px){.site-logo{width: 90%;}.logo-icon{width: 100%;}}*:focus{ outline: none}.sunrise{background: #FF512F !important;background: -webkit-linear-gradient(to right, #F09819, #FF512F) !important; background: linear-gradient(to right, #F09819, #FF512F) !important;}.megatron{background: #C6FFDD !important; background: -webkit-linear-gradient(to right, #f7797d, #FBD786, #C6FFDD) !important; background: linear-gradient(to right, #f7797d, #FBD786, #C6FFDD) !important;}.quepal{background: #11998e !important; background: -webkit-linear-gradient(to right, #29ce67, #11998e) !important; background: linear-gradient(to right, #29ce67, #11998e) !important;}.section-header h3{font-size: 32px;color: #111;text-transform: uppercase;text-align: center;font-weight: 700;position: relative;padding-bottom: 15px;}.section-header h3::before{content: '';position: absolute;display: block;width: 120px;height: 1px;background: #ddd;bottom: 1px;left: calc(50% - 60px);}.section-header h3::after{content: '';position: absolute;display: block;width: 40px;height: 3px;background: #18d26e;bottom: 0;left: calc(50% - 20px);}.section-header p{text-align: center;padding-bottom: 30px;color: #333;}#intro{display: table;width: 100%;height: 91vh;background: #000;}.carousel-inner{position: relative;width: 100%;height: 91vh;overflow: hidden;}#intro .carousel-item{ width: 100%; height: 91vh; background-size: cover; background-position: center; background-repeat: no-repeat}#intro .carousel-item::before{ content: ''; background-color: rgba(0, 0, 0, 0.7); position: absolute; height: 100%; width: 100%; top: 0; right: 0; left: 0; bottom: 0}#intro .carousel-container{ display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -webkit-justify-content: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -webkit-align-items: center; -ms-flex-align: center; align-items: center; position: absolute; bottom: 0; top: 0; left: 0; right: 0}#intro .carousel-background img{ width: 100%;height: 91vh;object-fit: cover}#intro .carousel-content{ text-align: center}#intro h2{ color: #fff; margin-bottom: 30px; font-size: 42px; font-weight: 700}#intro p{ width: 80%; margin: 0 auto 30px auto; color: #fff}#intro .carousel-fade{ overflow: hidden}#intro .carousel-fade .carousel-inner .carousel-item{ transition-property: opacity}#intro .carousel-fade .carousel-inner .carousel-item,#intro .carousel-fade .carousel-inner .active.carousel-item-left,#intro .carousel-fade .carousel-inner .active.carousel-item-right{ opacity: 0}#intro .carousel-fade .carousel-inner .active,#intro .carousel-fade .carousel-inner .carousel-item-next.carousel-item-left,#intro .carousel-fade .carousel-inner .carousel-item-prev.carousel-item-right{ opacity: 1; transition: 0.5s}#intro .carousel-fade .carousel-inner .carousel-item-next,#intro .carousel-fade .carousel-inner .carousel-item-prev,#intro .carousel-fade .carousel-inner .active.carousel-item-left,#intro .carousel-fade .carousel-inner .active.carousel-item-right{ left: 0; -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0)}#intro .carousel-control-prev,#intro .carousel-control-next{ width: 10%}#intro .carousel-control-next-icon,#intro .carousel-control-prev-icon{ font-size: 32px; line-height: 1}#intro .carousel-indicators li{ cursor: pointer}#intro .btn-get-started{ font-family: "Montserrat", sans-serif; font-weight: 500; font-size: 16px; letter-spacing: 1px; display: inline-block; padding: 8px 32px; border-radius: 50px; transition: 0.5s; margin: 10px; color: #fff; background: #18d26e}#intro .btn-get-started:hover{ background: #fff !important; color: #18d26e !important}.header:has(.navbar-collapse.show){height:unset}.checkbox{padding-left:20px}.checkbox label{display:inline-block;position:relative;padding-left:5px}.checkbox label::before{content:"";display:inline-block;position:absolute;width:20px;height:20px;left:0;margin-left:-20px;border:1px solid #ccc;border-radius:3px;background-color:#fff;-webkit-transition:border .15s ease-in-out,color .15s ease-in-out;-o-transition:border .15s ease-in-out,color .15s ease-in-out;transition:border .15s ease-in-out,color .15s ease-in-out}.checkbox label::after{display:inline-block;position:absolute;width:16px;height:16px;left:0;top:0;margin-left:-20px;padding-left:4px;padding-top:1px;font-size:13px;color:#555}.checkbox input[type=checkbox]{opacity:0}.checkbox input[type=checkbox]:focus+label::before{outline:thin dotted}.checkbox input[type=checkbox]:checked+label::after{font-family:fontawesome;content:"\f00c"}.checkbox input[type=checkbox]:disabled+label{opacity:.65}.checkbox input[type=checkbox]:disabled+label::before{background-color:#eee;cursor:not-allowed}.checkbox.checkbox-circle label::before{border-radius:50%}.checkbox.checkbox-inline{margin-top:0}.checkbox-primary input[type=checkbox]:checked+label::before{background-color:#428bca;border-color:#428bca}.checkbox-primary input[type=checkbox]:checked+label::after{color:#fff}.checkbox-danger input[type=checkbox]:checked+label::before{background-color:#d9534f;border-color:#d9534f}.checkbox-danger input[type=checkbox]:checked+label::after{color:#fff}.checkbox-info input[type=checkbox]:checked+label::before{background-color:#5bc0de;border-color:#5bc0de}.checkbox-info input[type=checkbox]:checked+label::after{color:#fff}.checkbox-warning input[type=checkbox]:checked+label::before{background-color:#f0ad4e;border-color:#f0ad4e}.checkbox-warning input[type=checkbox]:checked+label::after{color:#fff}.checkbox-success input[type=checkbox]:checked+label::before{background-color:#5cb85c;border-color:#5cb85c}.checkbox-success input[type=checkbox]:checked+label::after{color:#fff}.radio{padding-left:20px}.radio label{display:inline-block;position:relative;padding-left:5px}.radio label::before{content:"";display:inline-block;position:absolute;width:17px;height:17px;left:0;margin-left:-20px;border:1px solid #ccc;border-radius:50%;background-color:#fff;-webkit-transition:border .15s ease-in-out;-o-transition:border .15s ease-in-out;transition:border .15s ease-in-out}.radio label::after{display:inline-block;position:absolute;content:" ";width:11px;height:11px;left:3px;top:3px;margin-left:-20px;border-radius:50%;background-color:#555;-webkit-transform:scale(0,0);-ms-transform:scale(0,0);-o-transform:scale(0,0);transform:scale(0,0);-webkit-transition:-webkit-transform .1s cubic-bezier(.8,-.33,.2,1.33);-moz-transition:-moz-transform .1s cubic-bezier(.8,-.33,.2,1.33);-o-transition:-o-transform .1s cubic-bezier(.8,-.33,.2,1.33);transition:transform .1s cubic-bezier(.8,-.33,.2,1.33)}.radio input[type=radio]{opacity:0}.radio input[type=radio]:focus+label::before{outline:thin dotted;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}.radio input[type=radio]:checked+label::after{-webkit-transform:scale(1,1);-ms-transform:scale(1,1);-o-transform:scale(1,1);transform:scale(1,1)}.radio input[type=radio]:disabled+label{opacity:.65}.radio input[type=radio]:disabled+label::before{cursor:not-allowed}.radio.radio-inline{margin-top:0}.radio-primary input[type=radio]+label::after{background-color:#428bca}.radio-primary input[type=radio]:checked+label::before{border-color:#428bca}.radio-primary input[type=radio]:checked+label::after{background-color:#428bca}.radio-danger input[type=radio]+label::after{background-color:#d9534f}.radio-danger input[type=radio]:checked+label::before{border-color:#d9534f}.radio-danger input[type=radio]:checked+label::after{background-color:#d9534f}.radio-info input[type=radio]+label::after{background-color:#5bc0de}.radio-info input[type=radio]:checked+label::before{border-color:#5bc0de}.radio-info input[type=radio]:checked+label::after{background-color:#5bc0de}.radio-warning input[type=radio]+label::after{background-color:#f0ad4e}.radio-warning input[type=radio]:checked+label::before{border-color:#f0ad4e}.radio-warning input[type=radio]:checked+label::after{background-color:#f0ad4e}.radio-success input[type=radio]+label::after{background-color:#5cb85c}.radio-success input[type=radio]:checked+label::before{border-color:#5cb85c}.radio-success input[type=radio]:checked+label::after{background-color:#5cb85c} .containerrating{ position: relative; width: 100%; background: #111; padding: 10px 10px; border: 1px solid #444; border-radius: 5px; display: flex; align-items: center; justify-content: center; flex-direction: column}.containerrating .star-widget input{ display: none}.star-widget label{ font-size: 38px; color: #444; padding: 10px; float: right; transition: all 0.2s ease}input:not(:checked) ~ label:hover,input:not(:checked) ~ label:hover ~ label{ color: #fd4}input:checked ~ label{ color: #fd4}input#rate-5:checked ~ label,input#drate-5:checked ~ label{ color: #fe7; text-shadow: 0 0 20px #952}#rate-1:checked ~ form header:before,#drate-1:checked ~ form header:before{ content: "Sangat Tidak Puas 😡"}#rate-2:checked ~ form header:before,#drate-2:checked ~ form header:before{ content: "Tidak Puas 😠"}#rate-3:checked ~ form header:before,#drate-3:checked ~ form header:before{ content: "Cukup Puas 🙂"}#rate-4:checked ~ form header:before,#drate-4:checked ~ form header:before{ content: "Puas 😘"}#rate-5:checked ~ form header:before,#drate-5:checked ~ form header:before{ content: "Sangat Puas 😍"}input:checked ~ form{ display: block}.star-widget form header{ width: 100%; font-size: 25px; color: #fe7; font-weight: 500; margin: 5px 0 20px 0; text-align: center; transition: all 0.2s ease}.textarearating{ height: 150px; width: 100%; overflow: hidden}.textarearating textarea{ height: 100%; width: 100%; outline: none; color: #eee; border: 1px solid #333; background: #222; padding: 10px; font-size: 17px; resize: none}.textarearating textarea:focus{ border-color: #444}#frmdok ol > li,#frmdok ul > li {color: #000;font-size: 12.8px;font-weight: 400;}#frmdok ol li::marker,#frmdok ul > li::marker {color: #000;}
  </style>
<head>
  <meta charset="utf-8">
   <meta name="author" content="MAHFUD DUWI SAPUTRO" />
   <meta name="email" content="mahfudds@gmail.com" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="com.websantun.ngawi">
  <!--<link rel="manifest" href="https://ptsp.kemenagngawi.or.id/manifest.json">-->
  <link rel="manifest" href="<?php echo base_url('assets/manifest.json')?>">
  <meta name="theme-color" content="#4caf50">
  <link rel="icon" sizes="192x192" href="https://ptsp.kemenagngawi.or.id/assets/images/icon-192x192.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo isset($title)?$title:'KANWIL KEMENAG JATIM';?></title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/theme.css?q=13')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css?q=2')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/animate/animate.min.css')?>">
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert2.min.css')?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/font-awesome/css/font-awesome.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/bootstrap-select.min.css')?>">
	<!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
  <style>
  body{padding-top: 60px;}h1, h2, h3, h4, h5, h6{font-family: 'arial', sans-serif;color: #111;font-weight: 600;} .nav.nav-tabs li .active{color: #fff;background-color: #008877;}.nav.nav-tabs li a{color: #008877;}.form-control {border: 1px solid #d9d9d9 !important;color: #000;}.form-control:focus {border: 1px solid #008877 !important;color: #000;}.form-control.input-sm{ height: 30px; padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px;}.fa-fw{line-height: 1.4;}.btn.dropdown-toggle.btn-light{border: 0;font-size: 0.75rem;font-weight: normal; padding: 0; }#menu .dropdown-submenu{ position: relative}#menu .dropdown-submenu>.dropdown-menu{ top: 0; left: 100%; margin-top: -6px; margin-left: -1px; -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px}#menu .dropdown-submenu:hover>.dropdown-menu{ display: block}#menu .dropdown-submenu>a:after{ display: block; content: " "; float: right; width: 0; height: 0; border-color: transparent; border-style: solid; border-width: 5px 0 5px 5px; border-left-color: #ccc; margin-top: 5px; margin-right: -10px}#menu .dropdown-submenu:hover>a:after{ border-left-color: #fff}#menu .dropdown-submenu.pull-left{ float: none}#menu .dropdown-submenu.pull-left>.dropdown-menu{ left: -100%; margin-left: 10px; -webkit-border-radius: 6px 0 6px 6px; -moz-border-radius: 6px 0 6px 6px; border-radius: 6px 0 6px 6px}#menu .dropdown-menu{padding: 10px;width: 200px;font-size: 14px;font-weight: normal}#menu .dropdown-menu li{padding: 5px;color: #004d40;border-bottom: 1px solid #d9d9d9}#menu .dropdown-menu li a{color: #004d40;text-decoration: none}#menu .dropdown-menu li a:hover{color: #f2da00;text-decoration: none}.bootstrap-select{color: #000}.bootstrap-select.show-tick .dropdown-menu li a.dropdown-item{font-size: 12px}.bootstrap-select.show-tick .dropdown-menu li a.dropdown-item:active{background-color: #004d40}.bootstrap-select>.dropdown-toggle{color: #000}.docs-logo-wrapper{top:0 !important}.card-menu{min-height: 228px !important;cursor:pointer;margin-bottom: 30px !important;box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);border: 0 !important}.card-menu-title{font-size: .8rem !important;margin-bottom: .4rem !important;font-weight: bold;color: #111 !important;opacity: .7}.card-menu-subtitle{font-size: .7rem !important;letter-spacing: .5px;opacity: .8}.card-menulayanan{min-height: 210px !important;cursor:pointer;margin-bottom: 30px !important;box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);border: 0 !important}.card-menulayanan-title{font-size: .8rem !important;margin-bottom: .4rem !important;font-weight: bold;color: #111 !important; letter-spacing: 0.5px; opacity: .7}.navbar .active .nav-link{ color: #1e672f}.navbar .nav-link{ color: #1e672f; font-weight: 500}.navbar .active .nav-link:hover{ color: #1e672f}.navbar .nav-link:hover{ color: #1e672f; font-weight: 500}.navbar-toggler span{ display: block; background-color: #1e672f; height: 3px; width: 24px; margin-top: 5px; margin-bottom: 5px; transform: rotate(0deg); position: relative; left: 0; -webkit-opacity: 1; -moz-opacity: 1; opacity: 1; border-radius: 1px}.vison{opacity: 1; height: auto; transition: opacity 300ms ease-in;}.visoff{transition: opacity 1s ease-out; opacity: 0; height: 0; overflow: hidden;}.btnmenu{border: 2px solid #004d40; padding: 5px; border-radius: 5px; margin-left: 5px; font-size: 14px; width: 150px; text-align: center;}.dropdown-submenu{ position: relative}.dropdown-submenu>.dropdown-menu{ top: 0; left: 100%; margin-top: -6px; margin-left: -1px; -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px}.dropdown-submenu:hover>.dropdown-menu{ display: block}.dropdown-submenu>a:after{ display: block; content: " "; float: right; width: 0; height: 0; border-color: transparent; border-style: solid; border-width: 5px 0 5px 5px; border-left-color: #ccc; margin-top: 5px; margin-right: -10px}.dropdown-submenu:hover>a:after{ border-left-color: #fff}.dropdown-submenu.pull-left{ float: none}.dropdown-submenu.pull-left>.dropdown-menu{ left: -100%; margin-left: 10px; -webkit-border-radius: 6px 0 6px 6px; -moz-border-radius: 6px 0 6px 6px; border-radius: 6px 0 6px 6px}.dropdown-menu{padding: 10px;width: 200px;font-size: 14px;font-weight: normal}.dropdown-menu li{padding: 5px;color: #004d40;border-bottom: 1px solid #d9d9d9}.dropdown-menu li a{color: #004d40;text-decoration: none}.dropdown-menu li a:hover{color: #f2da00;text-decoration: none}.logo-icon{width: 60%;padding: 2px 20px; border-radius: 0 0 20px 20px;}@media (max-width: 1200px){.site-logo{width: 90%;}.logo-icon{width: 100%;}}*:focus{ outline: none}.sunrise{background: #FF512F !important;background: -webkit-linear-gradient(to right, #F09819, #FF512F) !important; background: linear-gradient(to right, #F09819, #FF512F) !important;}.megatron{background: #C6FFDD !important; background: -webkit-linear-gradient(to right, #f7797d, #FBD786, #C6FFDD) !important; background: linear-gradient(to right, #f7797d, #FBD786, #C6FFDD) !important;}.quepal{background: #11998e !important; background: -webkit-linear-gradient(to right, #29ce67, #11998e) !important; background: linear-gradient(to right, #29ce67, #11998e) !important;}.section-header h3{font-size: 32px;color: #111;text-transform: uppercase;text-align: center;font-weight: 700;position: relative;padding-bottom: 15px;}.section-header h3::before{content: '';position: absolute;display: block;width: 120px;height: 1px;background: #ddd;bottom: 1px;left: calc(50% - 60px);}.section-header h3::after{content: '';position: absolute;display: block;width: 40px;height: 3px;background: #18d26e;bottom: 0;left: calc(50% - 20px);}.section-header p{text-align: center;padding-bottom: 30px;color: #333;}#intro{display: table;width: 100%;height: 91vh;background: #000;}.carousel-inner{position: relative;width: 100%;height: 91vh;overflow: hidden;}#intro .carousel-item{ width: 100%; height: 91vh; background-size: cover; background-position: center; background-repeat: no-repeat}#intro .carousel-item::before{ content: ''; background-color: rgba(0, 0, 0, 0.7); position: absolute; height: 100%; width: 100%; top: 0; right: 0; left: 0; bottom: 0}#intro .carousel-container{ display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -webkit-justify-content: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -webkit-align-items: center; -ms-flex-align: center; align-items: center; position: absolute; bottom: 0; top: 0; left: 0; right: 0}#intro .carousel-background img{ width: 100%;height: 91vh;object-fit: cover}#intro .carousel-content{ text-align: center}#intro h2{ color: #fff; margin-bottom: 30px; font-size: 42px; font-weight: 700}#intro p{ width: 80%; margin: 0 auto 30px auto; color: #fff}#intro .carousel-fade{ overflow: hidden}#intro .carousel-fade .carousel-inner .carousel-item{ transition-property: opacity}#intro .carousel-fade .carousel-inner .carousel-item,#intro .carousel-fade .carousel-inner .active.carousel-item-left,#intro .carousel-fade .carousel-inner .active.carousel-item-right{ opacity: 0}#intro .carousel-fade .carousel-inner .active,#intro .carousel-fade .carousel-inner .carousel-item-next.carousel-item-left,#intro .carousel-fade .carousel-inner .carousel-item-prev.carousel-item-right{ opacity: 1; transition: 0.5s}#intro .carousel-fade .carousel-inner .carousel-item-next,#intro .carousel-fade .carousel-inner .carousel-item-prev,#intro .carousel-fade .carousel-inner .active.carousel-item-left,#intro .carousel-fade .carousel-inner .active.carousel-item-right{ left: 0; -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0)}#intro .carousel-control-prev,#intro .carousel-control-next{ width: 10%}#intro .carousel-control-next-icon,#intro .carousel-control-prev-icon{ font-size: 32px; line-height: 1}#intro .carousel-indicators li{ cursor: pointer}#intro .btn-get-started{ font-family: "Montserrat", sans-serif; font-weight: 500; font-size: 16px; letter-spacing: 1px; display: inline-block; padding: 8px 32px; border-radius: 50px; transition: 0.5s; margin: 10px; color: #fff; background: #18d26e}#intro .btn-get-started:hover{ background: #fff !important; color: #18d26e !important}.header:has(.navbar-collapse.show){height:unset}.checkbox{padding-left:20px}.checkbox label{display:inline-block;position:relative;padding-left:5px}.checkbox label::before{content:"";display:inline-block;position:absolute;width:20px;height:20px;left:0;margin-left:-20px;border:1px solid #ccc;border-radius:3px;background-color:#fff;-webkit-transition:border .15s ease-in-out,color .15s ease-in-out;-o-transition:border .15s ease-in-out,color .15s ease-in-out;transition:border .15s ease-in-out,color .15s ease-in-out}.checkbox label::after{display:inline-block;position:absolute;width:16px;height:16px;left:0;top:0;margin-left:-20px;padding-left:4px;padding-top:1px;font-size:13px;color:#555}.checkbox input[type=checkbox]{opacity:0}.checkbox input[type=checkbox]:focus+label::before{outline:thin dotted}.checkbox input[type=checkbox]:checked+label::after{font-family:fontawesome;content:"\f00c"}.checkbox input[type=checkbox]:disabled+label{opacity:.65}.checkbox input[type=checkbox]:disabled+label::before{background-color:#eee;cursor:not-allowed}.checkbox.checkbox-circle label::before{border-radius:50%}.checkbox.checkbox-inline{margin-top:0}.checkbox-primary input[type=checkbox]:checked+label::before{background-color:#428bca;border-color:#428bca}.checkbox-primary input[type=checkbox]:checked+label::after{color:#fff}.checkbox-danger input[type=checkbox]:checked+label::before{background-color:#d9534f;border-color:#d9534f}.checkbox-danger input[type=checkbox]:checked+label::after{color:#fff}.checkbox-info input[type=checkbox]:checked+label::before{background-color:#5bc0de;border-color:#5bc0de}.checkbox-info input[type=checkbox]:checked+label::after{color:#fff}.checkbox-warning input[type=checkbox]:checked+label::before{background-color:#f0ad4e;border-color:#f0ad4e}.checkbox-warning input[type=checkbox]:checked+label::after{color:#fff}.checkbox-success input[type=checkbox]:checked+label::before{background-color:#5cb85c;border-color:#5cb85c}.checkbox-success input[type=checkbox]:checked+label::after{color:#fff}.radio{padding-left:20px}.radio label{display:inline-block;position:relative;padding-left:5px}.radio label::before{content:"";display:inline-block;position:absolute;width:17px;height:17px;left:0;margin-left:-20px;border:1px solid #ccc;border-radius:50%;background-color:#fff;-webkit-transition:border .15s ease-in-out;-o-transition:border .15s ease-in-out;transition:border .15s ease-in-out}.radio label::after{display:inline-block;position:absolute;content:" ";width:11px;height:11px;left:3px;top:3px;margin-left:-20px;border-radius:50%;background-color:#555;-webkit-transform:scale(0,0);-ms-transform:scale(0,0);-o-transform:scale(0,0);transform:scale(0,0);-webkit-transition:-webkit-transform .1s cubic-bezier(.8,-.33,.2,1.33);-moz-transition:-moz-transform .1s cubic-bezier(.8,-.33,.2,1.33);-o-transition:-o-transform .1s cubic-bezier(.8,-.33,.2,1.33);transition:transform .1s cubic-bezier(.8,-.33,.2,1.33)}.radio input[type=radio]{opacity:0}.radio input[type=radio]:focus+label::before{outline:thin dotted;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}.radio input[type=radio]:checked+label::after{-webkit-transform:scale(1,1);-ms-transform:scale(1,1);-o-transform:scale(1,1);transform:scale(1,1)}.radio input[type=radio]:disabled+label{opacity:.65}.radio input[type=radio]:disabled+label::before{cursor:not-allowed}.radio.radio-inline{margin-top:0}.radio-primary input[type=radio]+label::after{background-color:#428bca}.radio-primary input[type=radio]:checked+label::before{border-color:#428bca}.radio-primary input[type=radio]:checked+label::after{background-color:#428bca}.radio-danger input[type=radio]+label::after{background-color:#d9534f}.radio-danger input[type=radio]:checked+label::before{border-color:#d9534f}.radio-danger input[type=radio]:checked+label::after{background-color:#d9534f}.radio-info input[type=radio]+label::after{background-color:#5bc0de}.radio-info input[type=radio]:checked+label::before{border-color:#5bc0de}.radio-info input[type=radio]:checked+label::after{background-color:#5bc0de}.radio-warning input[type=radio]+label::after{background-color:#f0ad4e}.radio-warning input[type=radio]:checked+label::before{border-color:#f0ad4e}.radio-warning input[type=radio]:checked+label::after{background-color:#f0ad4e}.radio-success input[type=radio]+label::after{background-color:#5cb85c}.radio-success input[type=radio]:checked+label::before{border-color:#5cb85c}.radio-success input[type=radio]:checked+label::after{background-color:#5cb85c} .containerrating{ position: relative; width: 100%; background: #111; padding: 10px 10px; border: 1px solid #444; border-radius: 5px; display: flex; align-items: center; justify-content: center; flex-direction: column}.containerrating .star-widget input{ display: none}.star-widget label{ font-size: 38px; color: #444; padding: 10px; float: right; transition: all 0.2s ease}input:not(:checked) ~ label:hover,input:not(:checked) ~ label:hover ~ label{ color: #fd4}input:checked ~ label{ color: #fd4}input#rate-5:checked ~ label,input#drate-5:checked ~ label{ color: #fe7; text-shadow: 0 0 20px #952}#rate-1:checked ~ form header:before,#drate-1:checked ~ form header:before{ content: "Sangat Tidak Puas 😡"}#rate-2:checked ~ form header:before,#drate-2:checked ~ form header:before{ content: "Tidak Puas 😠"}#rate-3:checked ~ form header:before,#drate-3:checked ~ form header:before{ content: "Cukup Puas 🙂"}#rate-4:checked ~ form header:before,#drate-4:checked ~ form header:before{ content: "Puas 😘"}#rate-5:checked ~ form header:before,#drate-5:checked ~ form header:before{ content: "Sangat Puas 😍"}input:checked ~ form{ display: block}.star-widget form header{ width: 100%; font-size: 25px; color: #fe7; font-weight: 500; margin: 5px 0 20px 0; text-align: center; transition: all 0.2s ease}.textarearating{ height: 150px; width: 100%; overflow: hidden}.textarearating textarea{ height: 100%; width: 100%; outline: none; color: #eee; border: 1px solid #333; background: #222; padding: 10px; font-size: 17px; resize: none}.textarearating textarea:focus{ border-color: #444}#frmdok ol > li,#frmdok ul > li {color: #000;font-size: 12.8px;font-weight: 400;}#frmdok ol li::marker,#frmdok ul > li::marker {color: #000;}
  </style>

</head>