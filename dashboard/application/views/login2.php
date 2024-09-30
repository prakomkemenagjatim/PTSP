<?php 
  $redir = isset($_GET['redirect'])?$_GET['redirect']:'';

  if ($redir == ''){
    $redir = base_url('index.php');
  }

?>
<html lang="id" class="sizes customelements history pointerevents postmessage postmessage-structuredclones webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers fontawesome-i2svg-active fontawesome-i2svg-complete">
<head lang="id">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Santun V2 </title>
<meta name="Googlebot" content="noindex">
<meta name="description" content="Santun">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#ffffff">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Santun V2">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/icons/icon-512x512.png">
<meta name="theme-color" content="#000000">
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="Santun V2">
<link rel="icon" sizes="512x512" href="images/icons/icon-512x512.png">
<link rel="apple-touch-icon" href="images/icons/icon-512x512.png">
<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert2.min.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('assets/css/swiper-bundle.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/all.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/iziToast.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome-animation.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/ion.rangeSlider.min.css'); ?>">

<style>
.swal-modal {
background-color: rgba(63, 255, 106, 0.69);
border-radius: 10px;
}
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
    src: url('<?php echo base_url('fonts/OpenSans-Light.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 400;
    src: url('<?php echo base_url('fonts/OpenSans-Regular.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 600;
    src: url('<?php echo base_url('fonts/OpenSans-SemiBold.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 700;
    src: url('<?php echo base_url('fonts/OpenSans-Bold.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 800;
    src: url('<?php echo base_url('fonts/OpenSans-ExtraBold.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 300;
    src: url('<?php echo base_url('fonts/Montserrat-Light.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 400;
    src: url('<?php echo base_url('fonts/Montserrat-Regular.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    src: url('<?php echo base_url('fonts/Montserrat-Medium.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 600;
    src: url('<?php echo base_url('fonts/Montserrat-SemiBold.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    src: url('<?php echo base_url('fonts/Montserrat-Bold.ttf'); ?>') format('truetype');
}

@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 800;
    src: url('<?php echo base_url('fonts/Montserrat-ExtraBold.ttf'); ?>') format('truetype');
}
</style>

<script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-0E1X3YLY3E&amp;l=dataLayer&amp;cx=c"></script>
<style>
:host, :root {
--fa-font-solid: normal 900 1em/1 "Font Awesome 6 Solid";
--fa-font-regular: normal 400 1em/1 "Font Awesome 6 Regular";
--fa-font-light: normal 300 1em/1 "Font Awesome 6 Light";
--fa-font-thin: normal 100 1em/1 "Font Awesome 6 Thin";
--fa-font-duotone: normal 900 1em/1 "Font Awesome 6 Duotone";
--fa-font-sharp-solid: normal 900 1em/1 "Font Awesome 6 Sharp";
--fa-font-brands: normal 400 1em/1 "Font Awesome 6 Brands";
}

svg:not(:host).svg-inline--fa, svg:not(:root).svg-inline--fa {
overflow: visible;
box-sizing: content-box;
}

.svg-inline--fa {
display: var(--fa-display, inline-block);
height: 1em;
overflow: visible;
vertical-align: -0.125em;
}

.svg-inline--fa.fa-2xs {
vertical-align: 0.1em;
}

.svg-inline--fa.fa-xs {
vertical-align: 0;
}

.svg-inline--fa.fa-sm {
vertical-align: -0.0714285705em;
}

.svg-inline--fa.fa-lg {
vertical-align: -0.2em;
}

.svg-inline--fa.fa-xl {
vertical-align: -0.25em;
}

.svg-inline--fa.fa-2xl {
vertical-align: -0.3125em;
}

.svg-inline--fa.fa-pull-left {
margin-right: var(--fa-pull-margin, 0.3em);
width: auto;
}

.svg-inline--fa.fa-pull-right {
margin-left: var(--fa-pull-margin, 0.3em);
width: auto;
}

.svg-inline--fa.fa-li {
width: var(--fa-li-width, 2em);
top: 0.25em;
}

.svg-inline--fa.fa-fw {
width: var(--fa-fw-width, 1.25em);
}

.fa-layers svg.svg-inline--fa {
bottom: 0;
left: 0;
margin: auto;
position: absolute;
right: 0;
top: 0;
}

.fa-layers-counter, .fa-layers-text {
display: inline-block;
position: absolute;
text-align: center;
}

.fa-layers {
display: inline-block;
height: 1em;
position: relative;
text-align: center;
vertical-align: -0.125em;
width: 1em;
}

.fa-layers svg.svg-inline--fa {
-webkit-transform-origin: center center;
transform-origin: center center;
}

.fa-layers-text {
left: 50%;
top: 50%;
-webkit-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
-webkit-transform-origin: center center;
transform-origin: center center;
}

.fa-layers-counter {
background-color: var(--fa-counter-background-color, #ff253a);
border-radius: var(--fa-counter-border-radius, 1em);
box-sizing: border-box;
color: var(--fa-inverse, #fff);
line-height: var(--fa-counter-line-height, 1);
max-width: var(--fa-counter-max-width, 5em);
min-width: var(--fa-counter-min-width, 1.5em);
overflow: hidden;
padding: var(--fa-counter-padding, 0.25em 0.5em);
right: var(--fa-right, 0);
text-overflow: ellipsis;
top: var(--fa-top, 0);
-webkit-transform: scale(var(--fa-counter-scale, 0.25));
transform: scale(var(--fa-counter-scale, 0.25));
-webkit-transform-origin: top right;
transform-origin: top right;
}

.fa-layers-bottom-right {
bottom: var(--fa-bottom, 0);
right: var(--fa-right, 0);
top: auto;
-webkit-transform: scale(var(--fa-layers-scale, 0.25));
transform: scale(var(--fa-layers-scale, 0.25));
-webkit-transform-origin: bottom right;
transform-origin: bottom right;
}

.fa-layers-bottom-left {
bottom: var(--fa-bottom, 0);
left: var(--fa-left, 0);
right: auto;
top: auto;
-webkit-transform: scale(var(--fa-layers-scale, 0.25));
transform: scale(var(--fa-layers-scale, 0.25));
-webkit-transform-origin: bottom left;
transform-origin: bottom left;
}

.fa-layers-top-right {
top: var(--fa-top, 0);
right: var(--fa-right, 0);
-webkit-transform: scale(var(--fa-layers-scale, 0.25));
transform: scale(var(--fa-layers-scale, 0.25));
-webkit-transform-origin: top right;
transform-origin: top right;
}

.fa-layers-top-left {
left: var(--fa-left, 0);
right: auto;
top: var(--fa-top, 0);
-webkit-transform: scale(var(--fa-layers-scale, 0.25));
transform: scale(var(--fa-layers-scale, 0.25));
-webkit-transform-origin: top left;
transform-origin: top left;
}

.fa-1x {
font-size: 1em;
}

.fa-2x {
font-size: 2em;
}

.fa-3x {
font-size: 3em;
}

.fa-4x {
font-size: 4em;
}

.fa-5x {
font-size: 5em;
}

.fa-6x {
font-size: 6em;
}

.fa-7x {
font-size: 7em;
}

.fa-8x {
font-size: 8em;
}

.fa-9x {
font-size: 9em;
}

.fa-10x {
font-size: 10em;
}

.fa-2xs {
font-size: 0.625em;
line-height: 0.1em;
vertical-align: 0.225em;
}

.fa-xs {
font-size: 0.75em;
line-height: 0.0833333337em;
vertical-align: 0.125em;
}

.fa-sm {
font-size: 0.875em;
line-height: 0.0714285718em;
vertical-align: 0.0535714295em;
}

.fa-lg {
font-size: 1.25em;
line-height: 0.05em;
vertical-align: -0.075em;
}

.fa-xl {
font-size: 1.5em;
line-height: 0.0416666682em;
vertical-align: -0.125em;
}

.fa-2xl {
font-size: 2em;
line-height: 0.03125em;
vertical-align: -0.1875em;
}

.fa-fw {
text-align: center;
width: 1.25em;
}

.fa-ul {
list-style-type: none;
margin-left: var(--fa-li-margin, 2.5em);
padding-left: 0;
}

.fa-ul > li {
position: relative;
}

.fa-li {
left: calc(var(--fa-li-width, 2em) * -1);
position: absolute;
text-align: center;
width: var(--fa-li-width, 2em);
line-height: inherit;
}

.fa-border {
border-color: var(--fa-border-color, #eee);
border-radius: var(--fa-border-radius, 0.1em);
border-style: var(--fa-border-style, solid);
border-width: var(--fa-border-width, 0.08em);
padding: var(--fa-border-padding, 0.2em 0.25em 0.15em);
}

.fa-pull-left {
float: left;
margin-right: var(--fa-pull-margin, 0.3em);
}

.fa-pull-right {
float: right;
margin-left: var(--fa-pull-margin, 0.3em);
}

.fa-beat {
-webkit-animation-name: fa-beat;
animation-name: fa-beat;
-webkit-animation-delay: var(--fa-animation-delay, 0s);
animation-delay: var(--fa-animation-delay, 0s);
-webkit-animation-direction: var(--fa-animation-direction, normal);
animation-direction: var(--fa-animation-direction, normal);
-webkit-animation-duration: var(--fa-animation-duration, 1s);
animation-duration: var(--fa-animation-duration, 1s);
-webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
animation-iteration-count: var(--fa-animation-iteration-count, infinite);
-webkit-animation-timing-function: var(--fa-animation-timing, ease-in-out);
animation-timing-function: var(--fa-animation-timing, ease-in-out);
}

.fa-bounce {
-webkit-animation-name: fa-bounce;
animation-name: fa-bounce;
-webkit-animation-delay: var(--fa-animation-delay, 0s);
animation-delay: var(--fa-animation-delay, 0s);
-webkit-animation-direction: var(--fa-animation-direction, normal);
animation-direction: var(--fa-animation-direction, normal);
-webkit-animation-duration: var(--fa-animation-duration, 1s);
animation-duration: var(--fa-animation-duration, 1s);
-webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
animation-iteration-count: var(--fa-animation-iteration-count, infinite);
-webkit-animation-timing-function: var(--fa-animation-timing, ease-in-out);
animation-timing-function: var(--fa-animation-timing, ease-in-out);
}

.fa-fade {
-webkit-animation-name: fa-fade;
animation-name: fa-fade;
-webkit-animation-delay: var(--fa-animation-delay, 0s);
animation-delay: var(--fa-animation-delay, 0s);
-webkit-animation-direction: var(--fa-animation-direction, normal);
animation-direction: var(--fa-animation-direction, normal);
-webkit-animation-duration: var(--fa-animation-duration, 1s);
animation-duration: var(--fa-animation-duration, 1s);
-webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
animation-iteration-count: var(--fa-animation-iteration-count, infinite);
-webkit-animation-timing-function: var(--fa-animation-timing, ease-in-out);
animation-timing-function: var(--fa-animation-timing, ease-in-out);
}

.fa-flip {
-webkit-animation-name: fa-flip;
animation-name: fa-flip;
-webkit-animation-delay: var(--fa-animation-delay, 0s);
animation-delay: var(--fa-animation-delay, 0s);
-webkit-animation-direction: var(--fa-animation-direction, normal);
animation-direction: var(--fa-animation-direction, normal);
-webkit-animation-duration: var(--fa-animation-duration, 2s);
animation-duration: var(--fa-animation-duration, 2s);
-webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
animation-iteration-count: var(--fa-animation-iteration-count, infinite);
-webkit-animation-timing-function: var(--fa-animation-timing, ease-in-out);
animation-timing-function: var(--fa-animation-timing, ease-in-out);
}

.fa-shake {
-webkit-animation-name: fa-shake;
animation-name: fa-shake;
-webkit-animation-delay: var(--fa-animation-delay, 0s);
animation-delay: var(--fa-animation-delay, 0s);
-webkit-animation-direction: var(--fa-animation-direction, normal);
animation-direction: var(--fa-animation-direction, normal);
-webkit-animation-duration: var(--fa-animation-duration, 1s);
animation-duration: var(--fa-animation-duration, 1s);
-webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
animation-iteration-count: var(--fa-animation-iteration-count, infinite);
-webkit-animation-timing-function: var(--fa-animation-timing, ease-in-out);
animation-timing-function: var(--fa-animation-timing, ease-in-out);
}

.fa-spin {
-webkit-animation-name: fa-spin;
animation-name: fa-spin;
-webkit-animation-delay: var(--fa-animation-delay, 0s);
animation-delay: var(--fa-animation-delay, 0s);
-webkit-animation-direction: var(--fa-animation-direction, normal);
animation-direction: var(--fa-animation-direction, normal);
-webkit-animation-duration: var(--fa-animation-duration, 2s);
animation-duration: var(--fa-animation-duration, 2s);
-webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
animation-iteration-count: var(--fa-animation-iteration-count, infinite);
-webkit-animation-timing-function: var(--fa-animation-timing, linear);
animation-timing-function: var(--fa-animation-timing, linear);
}

.fa-pulse {
-webkit-animation-name: fa-spin;
animation-name: fa-spin;
-webkit-animation-delay: var(--fa-animation-delay, 0s);
animation-delay: var(--fa-animation-delay, 0s);
-webkit-animation-direction: var(--fa-animation-direction, normal);
animation-direction: var(--fa-animation-direction, normal);
-webkit-animation-duration: var(--fa-animation-duration, 1s);
animation-duration: var(--fa-animation-duration, 1s);
-webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
animation-iteration-count: var(--fa-animation-iteration-count, infinite);
-webkit-animation-timing-function: var(--fa-animation-timing, linear);
animation-timing-function: var(--fa-animation-timing, linear);
}

.fa-beat-fade {
-webkit-animation-name: fa-beat-fade;
animation-name: fa-beat-fade;
-webkit-animation-delay: var(--fa-animation-delay, 0s);
animation-delay: var(--fa-animation-delay, 0s);
-webkit-animation-direction: var(--fa-animation-direction, normal);
animation-direction: var(--fa-animation-direction, normal);
-webkit-animation-duration: var(--fa-animation-duration, 2s);
animation-duration: var(--fa-animation-duration, 2s);
-webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
animation-iteration-count: var(--fa-animation-iteration-count, infinite);
-webkit-animation-timing-function: var(--fa-animation-timing, ease-in-out);
animation-timing-function: var(--fa-animation-timing, ease-in-out);
}

.fa-fade-pulse {
-webkit-animation-name: fa-fade;
animation-name: fa-fade;
-webkit-animation-delay: var(--fa-animation-delay, 0s);
animation-delay: var(--fa-animation-delay, 0s);
-webkit-animation-direction: var(--fa-animation-direction, normal);
animation-direction: var(--fa-animation-direction, normal);
-webkit-animation-duration: var(--fa-animation-duration, 2s);
animation-duration: var(--fa-animation-duration, 2s);
-webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
animation-iteration-count: var(--fa-animation-iteration-count, infinite);
-webkit-animation-timing-function: var(--fa-animation-timing, ease-in-out);
animation-timing-function: var(--fa-animation-timing, ease-in-out);
}

.product-gallery-details {
padding: 20px 20px;
}

.product-gallery-details p {
margin-bottom: 20px;
}

.user-event-area,
.user-event-area .user-event--merging {
gap: 45px;
}

.horizontal-line {
display: flex;
align-items: center;
text-align: center;
color: #999;
}

.horizontal-line::before,
.horizontal-line::after {
content: "";
flex: 1;
border-bottom: 1px solid #999;
}

.horizontal-line::before {
margin-right: 1em;
}

.horizontal-line::after {
margin-left: 1em;
}
</style>

    
   

<style>
    .info_sso {
        padding: 10px 20px;
        text-align: left;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        background: #EBF8FF;
        border: 2px solid #2B6CB0;
        border-radius: 10px;
        font-size: 15px;
        width: 100%;
        color: #1A365D;
        margin-top: 10px;
        margin-bottom: 20px;
    }
</style></head>



<body>

    <main class="main-wrapper ph-15px">
        
        <div class="login-section">
            <div class="container ">
                
                <div>
                    <div class="section-content">
                        <a href="/">
                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.875 1.625L1.125 8.375M1.125 8.375L7.875 15.125M1.125 8.375H16.875" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>&nbsp;&nbsp;
                            Login
                        </a>
                    </div>
                    <div style="margin-bottom:0px; text-align: center">
                        <img width="200px"  src="<?php echo base_url('assets/images/santunkecil.png')?>" alt="Logo" style="margin-top:30px;">
                    </div>
                    <form method="POST" class="default-form-wrapper" id="form-login" data-gtm-form-interact-id="0">
                        <input type="hidden" name="_token" value="n0xP71YLueNhRSzGQWqYoFK9R0fYdtD36cNJ4Ujp">                        <div style="text-align: center">
                            Selamat datang di Santun Super APPS. <br>
                            Silakan masukkan user dan password anda untuk login sebagai pejabat atau admin Santun Kantor Kementerian Agama Kabupaten Ngawi
                        </div>
                        <br>
                        <ul class="default-form-list">

                            
                            <li class="single-form-item">
                                <input type="text" id="usernama" name="email" placeholder="Nama pengguna" data-gtm-form-interact-field-id="0">
                                <span class="icon">
                                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 0.5C6.25832 0.5 5.5333 0.719934 4.91661 1.13199C4.29993 1.54404 3.81928 2.12971 3.53545 2.81494C3.25162 3.50016 3.17736 4.25416 3.32206 4.98159C3.46675 5.70902 3.8239 6.3772 4.34835 6.90165C4.8728 7.4261 5.54098 7.78325 6.26841 7.92795C6.99584 8.07264 7.74984 7.99838 8.43506 7.71455C9.12029 7.43072 9.70596 6.95007 10.118 6.33339C10.5301 5.7167 10.75 4.99168 10.75 4.25C10.75 3.25544 10.3549 2.30161 9.65165 1.59835C8.94839 0.895088 7.99456 0.5 7 0.5ZM7 6.5C6.55499 6.5 6.11998 6.36804 5.74997 6.12081C5.37996 5.87357 5.09157 5.52217 4.92127 5.11104C4.75097 4.6999 4.70642 4.2475 4.79323 3.81105C4.88005 3.37459 5.09434 2.97368 5.40901 2.65901C5.72368 2.34434 6.12459 2.13005 6.56105 2.04323C6.9975 1.95642 7.4499 2.00097 7.86104 2.17127C8.27217 2.34157 8.62357 2.62996 8.87081 2.99997C9.11804 3.36998 9.25 3.80499 9.25 4.25C9.25 4.84674 9.01295 5.41903 8.59099 5.84099C8.16903 6.26295 7.59674 6.5 7 6.5ZM13.75 14.75V14C13.75 12.6076 13.1969 11.2723 12.2123 10.2877C11.2277 9.30312 9.89239 8.75 8.5 8.75H5.5C4.10761 8.75 2.77226 9.30312 1.78769 10.2877C0.803123 11.2723 0.25 12.6076 0.25 14V14.75H1.75V14C1.75 13.0054 2.14509 12.0516 2.84835 11.3483C3.55161 10.6451 4.50544 10.25 5.5 10.25H8.5C9.49456 10.25 10.4484 10.6451 11.1517 11.3483C11.8549 12.0516 12.25 13.0054 12.25 14V14.75H13.75Z" fill="#6370E7"></path>
                                    </svg>
                                </span>
                            </li>

                            
                            <li class="single-form-item">
                                <input type="password" name="password" placeholder="Kata Sandi" id="userpass" data-gtm-form-interact-field-id="1">
                                <span class="icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.25 7.5H3.75C2.92157 7.5 2.25 8.17157 2.25 9V15C2.25 15.8284 2.92157 16.5 3.75 16.5H14.25C15.0784 16.5 15.75 15.8284 15.75 15V9C15.75 8.17157 15.0784 7.5 14.25 7.5Z" stroke="#6370E7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M4.5 4.5C4.5 3.90326 4.73705 3.33097 5.15901 2.90901C5.58097 2.48705 6.15326 2.25 6.75 2.25H11.25C11.8467 2.25 12.419 2.48705 12.841 2.90901C13.2629 3.33097 13.5 3.90326 13.5 4.5V7.5H4.5V4.5Z" stroke="#6370E7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </li>

                           
                            
                        </ul>

                        <br>

                       

                        <button class="btn btn--block btn--radius btn--size-xlarge btn--color-white  text-center" style="margin-top:20px;width:100%;padding-top:10px;padding-bottom:10px;background-color:#319846" type="button" id="submit-login"><svg class="svg-inline--fa fa-circle-notch animated faa-spin" style="font-size: 20px; display: none;" id="loading" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-notch" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M222.7 32.1c5 16.9-4.6 34.8-21.5 39.8C121.8 95.6 64 169.1 64 256c0 106 86 192 192 192s192-86 192-192c0-86.9-57.8-160.4-137.1-184.1c-16.9-5-26.6-22.9-21.5-39.8s22.9-26.6 39.8-21.5C434.9 42.1 512 140 512 256c0 141.4-114.6 256-256 256S0 397.4 0 256C0 140 77.1 42.1 182.9 10.6c16.9-5 34.8 4.6 39.8 21.5z"></path></svg><!-- <i class="fa-solid fa-circle-notch animated faa-spin" style="font-size: 20px; display: none" id="loading"></i> Font Awesome fontawesome.com -->
                            <p id="label_masuk">Masuk</p>
                        </button>
                        
                    </form>
                    <a href="https://sso.kemenag.go.id/auth/signin?appid=28ae30444be0cc36f9e2e971c8d77350"  class="btn btn--block btn--radius btn--size-xlarge btn--color-white  text-center" style="margin-top:20px;width:100%;padding-top:10px;padding-bottom:10px;background-color:#319846"  >Login SSO Kemenag</a>
                </div>

                

            </div>
        </div>
        

    </main>



<script src="<?php echo base_url('assets/js/swiper-bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/ion.rangeSlider.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/iziToast.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/all.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/lazysizes.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.cookie.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/select2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.lazyload.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/node_modules/jquery312/dist/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert2.min.js')?>"></script>
<script>
		$(document).ready(function(){
			document.getElementById('usernama').focus();
            $('#submit-login').click(function(e){e.preventDefault();login();})
		})
		function login(){			
			$.ajax({
		        url:  "<?php echo base_url('index.php/login/auth'); ?>",
		        type: 'POST',
		        data: {user:$('#usernama').val(),pass:$('#userpass').val()},
		        cache: false,
		        dataType: 'JSON',
		        success: function (result){
		        	if (result.error != '' && result.error != undefined){
						swal({title: "ERROR!!",text: result.error,type: "error",});					
					} else {
						window.location = "<?php echo $redir; ?>";
					}
		        }
		    });
		}
	</script>


</body></html>