<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo isset($title)?$title:'SANTUN dashboard';?></title>
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/easyui/style.css?q=13')?>"> -->
<link rel="stylesheet" href="<?php echo base_url('assets/eu10/themes/material-blue/easyui.css?q=13')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/mdi/css/materialdesignicons.min.css?s=11')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/simple-line-icons/css/simple-line-icons.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css?q=32')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/app.css')?>">
<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert2.min.css')?>"/>
<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/font-awesome/css/font-awesome.min.css')?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/bootstrap-select.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/LineIcons.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/uikit.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">


<style>
      @font-face {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 100;
    src: url('<?php echo base_url('assets/fonts/Lato-Thin.ttf'); ?>') format('truetype');
}

/* Add more @font-face rules for other styles and weights */

@font-face {
    font-family: 'Amiri';
    font-style: normal;
    font-weight: 400;
    src: url('<?php echo base_url('assets/fonts/Amiri-Regular.ttf'); ?>') format('truetype');
}

/* Add more @font-face rules for other styles and weights */

@font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 300;
    src: url('<?php echo base_url('assets/fonts/OpenSans-Light.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 400;
    src: url('<?php echo base_url('assets/fonts/OpenSans-Regular.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 600;
    src: url('<?php echo base_url('assets/fonts/OpenSans-SemiBold.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 700;
    src: url('<?php echo base_url('assets/fonts/OpenSans-Bold.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 800;
    src: url('<?php echo base_url('assets/fonts/OpenSans-ExtraBold.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 300;
    src: url('<?php echo base_url('assets/fonts/Montserrat-Light.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 400;
    src: url('<?php echo base_url('assets/fonts/Montserrat-Regular.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    src: url('<?php echo base_url('assets/fonts/Montserrat-Medium.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 600;
    src: url('<?php echo base_url('assets/fonts/Montserrat-SemiBold.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    src: url('<?php echo base_url('assets/fonts/Montserrat-Bold.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 800;
    src: url('<?php echo base_url('assets/fonts/Montserrat-ExtraBold.ttf'); ?>') format('truetype');
}
@media (max-width: 768px) {
.container-fluid {
padding: 0 !important;
margin: 0 !important;
}
}
body, .container, .main-panel, .content-wrapper {
background-color: #F5EFE6;
}

.nav.nav-tabs li .active{
color: #fff;
background-color: #008877;
}
.nav.nav-tabs li a{
color: #008877;
}
#sidebar {
background-color: #E8DFCA;
}
.footer {
background-color: #F5EFE6;
}


.sidebar .nav .nav-item .nav-link{
white-space: unset !important;
margin-bottom: 2px;
}
.sidebar .nav .nav-item .nav-link .menu-title {font-size: 0.8rem !important;line-height: 1.3  !important;}
.form-control {
border: 1px solid #d9d9d9 !important;
}
.sidebar .nav.sub-menu {
padding: 0 !important;
}
.sidebar .nav .nav-item .nav-link{
height: 100% !important;
padding: 0.1rem 0.1rem 0.1rem 1rem !important;
}
.sidebar .nav .nav-item .nav-head {
padding-left: 15px !important;
padding-bottom: .4rem !important;
}
.btn.dropdown-toggle.btn-light{
border: 0;
font-size: 0.75rem;/*
padding: 0.4375rem 0.75rem;
height: calc(2.25rem + 2px);*/
}
select.form-control:not([size]):not([multiple]) {
height: calc(2rem + 2px) !important;
}
select.form-control {
margin: 0 !important;
}
.footer .copyright {
font-size: 0.875rem;
}
.datagrid-header-row .datagrid-cell{
line-height:normal;
height:auto;
white-space:normal;
}
.datagrid-header-row, .datagrid-row{
height:40px;
}
.datagrid-header-rownumber,
.datagrid-cell-rownumber {
width: 40px !important;
}
.btn {
font-size: 0.775rem !important;
padding: 10px !important;
}
.count-indicator {
position: relative;
text-align: center;
}
.count-indicator .count{
position: absolute;
left: 50%;
width: 1rem;
height: 1rem;
border-radius: 100%;
background: #FF0017;
font-size: 75%;
top: 5px;
font-weight: 600;
line-height: 1rem;
border: none;
text-align: center;
color:#fff;
margin-top: -5px;
}


.modal {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 1050; /* Sit on top */
left: 0;
top: 0;
width: 100% !important;  /* Full width */
height: 100vh !important; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgba(0, 0, 0, 0.8); /* Black background with opacity */
align-items: center;
justify-content: center;
-webkit-overflow-scrolling: touch; /* Enable touch scrolling */
padding-right: 0px !important;
}

.modal.fade.show {
display: flex;
}

.modal-dialog {
width: 100%;
max-width: none;
margin: 0;
}

.modal-content {
position: relative;
background-color: #F5EFE6;
margin: auto;
padding: 20px;
border: 1px solid #888;
width: 100%;
height: 100%;

border-radius: 0;
overflow-y: auto;
}

.modal-header {
display: flex;
justify-content: space-between;
align-items: center;
background-color: #E8DFCA;
color: white;
padding: 10px 20px;
}

.modal-header .close {
color: #fff;
font-size: 28px;
font-weight: bold;
cursor: pointer;
}

.modal-body {
padding: 20px;
background-color: #F5EFE6;
}

.modal-footer {
display: flex;
justify-content: flex-end;
padding: 10px 20px;
background-color: #F5EFE6;
}
input[type="checkbox"] {
margin: 0 !important;
}

.panel-group .panel-heading{
background-color:#E8DFCA !important;
}

  </style>
</head>