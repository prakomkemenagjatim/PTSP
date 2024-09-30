<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Santun v2 Kemenag Ngawi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

     <link rel="shortcut icon" href="<?php echo base_url('assets/images/santunkecil.ico'); ?>" type="image/ico">
     <link rel="shortcut icon" href="<?php echo base_url('assets/images/icon-192x192.png'); ?>" type="image/png">
     

  <!-- Favicons -->

  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="<?php echo base_url('assets/leaflet.css'); ?>" />
  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/css/bootstrap-datepicker.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/ld/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/ld//vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/ld/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/ld/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/ld/vendor/aos/aos.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/select2.css'); ?>" rel="stylesheet" />
  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/ld/css/main.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert2.min.css')?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/font-awesome/css/font-awesome.min.css')?>" />
  <link href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet">
  

  <!-- =======================================================
  * Template Name: Append
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
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

 /* Star Rating Widget */
.containerrating .star-widget input {
  display: none;
}

.star-widget label {
  font-size: 42px;
  color: #444;
  padding: 10px;
  float: right;
  transition: all 0.2s ease;
}

.star-widget input:not(:checked) ~ label:hover,
.star-widget input:not(:checked) ~ label:hover ~ label {
  color: #fd4;
}

.star-widget input:checked ~ label {
  color: #fd4;
}

.star-widget input#rate-5:checked ~ label {
  color: #fe7;
  text-shadow: 0 0 20px #952;
}

.star-widget input#rate-1:checked ~ form header:before {
  content: "Sangat Tidak Puas 😡";
}

.star-widget input#rate-2:checked ~ form header:before {
  content: "Tidak Puas 😠";
}

.star-widget input#rate-3:checked ~ form header:before {
  content: "Cukup Puas 🙂";
}

.star-widget input#rate-4:checked ~ form header:before {
  content: "Puas 😘";
}

.star-widget input#rate-5:checked ~ form header:before {
  content: "Sangat Puas 😍";
}

.star-widget input:checked ~ form {
  display: block;
}

.star-widget form header {
  width: 100%;
  font-size: 25px;
  color: #fe7;
  font-weight: 500;
  margin: 5px 0 20px 0;
  text-align: center;
  transition: all 0.2s ease;
}

/* Textarea Rating */
.textarearating {
  height: 150px;
  width: 100%;
  overflow: hidden;
}

.textarearating textarea {
  height: 100%;
  width: 100%;
  outline: none;
  color: #eee;
  border: 1px solid #333;
  background: #222;
  padding: 10px;
  font-size: 17px;
  resize: none;
}

.textarearating textarea:focus {
  border-color: #444;
}

</style>
