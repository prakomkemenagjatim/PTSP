<!DOCTYPE html>
<html lang="id">

<?php $this->load->view('kua/head.php')?>
<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">
<style>
    .bg-secondary {
    --bs-bg-opacity: 1;
   
    background-image: url('<?php echo base_url('assets/ld/img/bglayanan3.png'); ?>');
    background-size: cover; /* Menyebarkan gambar secara proporsional untuk mencakup seluruh area */
    background-position: center center; /* Posisikan gambar di tengah-tengah */
    background-repeat: no-repeat; /* Hindari pengulangan gambar */
    background-color: rgba(0, 0, 0, 0.2);
    }
    .box-shadow-dark{
        text-align: left;
    background-color: #F5F5DC;
    border-radius: 15px;
    padding: 15px;
    }
    .text-warning{
        color: #000 !important;
        font-weight: bold;
    }
    .justify-content-center{
       
    }
    /* Style the list */
ul.breadcrumb {
  padding: 10px 16px;
  list-style: none;
  background-color: #eee;
}

/* Display list items side by side */
ul.breadcrumb li {
  display: inline;
  font-size: 18px;
}

/* Add a slash symbol (/) before/behind each list item */
ul.breadcrumb li+li:before {
  padding: 8px;
  color: black;
  content: "/\00a0";
}

/* Add a color to all links inside the list */
ul.breadcrumb li a {
  color: #0275d8;
  text-decoration: none;
}

/* Add a color on mouse-over */
ul.breadcrumb li a:hover {
  color: #01447e;
  text-decoration: underline;
}

/*--------------------------------------------------------------
# Back to top button
--------------------------------------------------------------*/
.back-to-top {
  position: fixed;
  visibility: hidden;
  opacity: 0;
  right: 15px;
  bottom: 15px;
  z-index: 996;
  background: #5777ba;
  width: 40px;
  height: 40px;
  border-radius: 50px;
  transition: all 0.4s;
}
.back-to-top i {
  font-size: 24px;
  color: #fff;
  line-height: 0;
}
.back-to-top:hover {
  background: #748ec6;
  color: #fff;
}
.back-to-top.active {
  visibility: visible;
  opacity: 1;
}

/*--------------------------------------------------------------
# Disable aos animation delay on mobile devices
--------------------------------------------------------------*/
@media screen and (max-width: 768px) {
  [data-aos-delay] {
    transition-delay: 0 !important;
  }
}
/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
#header {
  transition: all 0.5s;
  z-index: 997;
  transition: all 0.5s;
  padding: 15px 0;
  background: rgba(255, 255, 255, 0.95);
}
#header.header-transparent {
  background: transparent;
}
#header.header-scrolled {
  background: rgba(255, 255, 255, 0.95);
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}
#header .logo h1 {
  font-size: 30px;
  margin: 0;
  line-height: 1;
  font-weight: 400;
  letter-spacing: 2px;
}
#header .logo h1 a, #header .logo h1 a:hover {
  color: #5777ba;
  text-decoration: none;
}
#header .logo img {
  margin: 0;
  max-height: 40px;
}

/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
/**
* Desktop Navigation 
*/
.navbar {
  padding: 0;
}
.navbar ul {
  margin: 0;
  padding: 0;
  display: flex;
  list-style: none;
  align-items: center;
}
.navbar li {
  position: relative;
}
.navbar a, .navbar a:focus {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 0 10px 30px;
  font-family: "Raleway", sans-serif;
  font-size: 15px;
  color: #47536e;
  white-space: nowrap;
  transition: 0.3s;
}
.navbar a i, .navbar a:focus i {
  font-size: 12px;
  line-height: 0;
  margin-left: 5px;
}
.navbar a:hover, .navbar .active, .navbar .active:focus, .navbar li:hover > a {
  color: #5777ba;
}
.navbar .getstarted, .navbar .getstarted:focus {
  background: #5777ba;
  color: #fff;
  padding: 12px 25px;
  margin-left: 30px;
  color: #fff;
  line-height: 1;
  border-radius: 50px;
}
.navbar .getstarted:hover, .navbar .getstarted:focus:hover {
  background: #748ec6;
  color: #fff;
}
.navbar .dropdown ul {
  display: block;
  position: absolute;
  left: 14px;
  top: calc(100% + 30px);
  margin: 0;
  padding: 10px 0;
  z-index: 99;
  opacity: 0;
  visibility: hidden;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
  transition: 0.3s;
  border-radius: 4px;
}
.navbar .dropdown ul li {
  min-width: 200px;
}
.navbar .dropdown ul a {
  padding: 10px 20px;
  font-size: 15px;
  text-transform: none;
  font-weight: 600;
}
.navbar .dropdown ul a i {
  font-size: 12px;
}
.navbar .dropdown ul a:hover, .navbar .dropdown ul .active:hover, .navbar .dropdown ul li:hover > a {
  color: #5777ba;
}
.navbar .dropdown:hover > ul {
  opacity: 1;
  top: 100%;
  visibility: visible;
}
.navbar .dropdown .dropdown ul {
  top: 0;
  left: calc(100% - 30px);
  visibility: hidden;
}
.navbar .dropdown .dropdown:hover > ul {
  opacity: 1;
  top: 0;
  left: 100%;
  visibility: visible;
}
@media (max-width: 1366px) {
  .navbar .dropdown .dropdown ul {
    left: -90%;
  }
  .navbar .dropdown .dropdown:hover > ul {
    left: -100%;
  }
}

/**
* Mobile Navigation 
*/
.mobile-nav-toggle {
  color: #47536e;
  font-size: 28px;
  cursor: pointer;
  display: none;
  line-height: 0;
  transition: 0.5s;
}
.mobile-nav-toggle.bi-x {
  color: #fff;
}

@media (max-width: 991px) {
  .mobile-nav-toggle {
    display: block;
  }

  .navbar ul {
    display: none;
  }
}
.navbar-mobile {
  position: fixed;
  overflow: hidden;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  background: rgba(51, 60, 79, 0.9);
  transition: 0.3s;
  z-index: 999;
}
.navbar-mobile .mobile-nav-toggle {
  position: absolute;
  top: 15px;
  right: 15px;
}
.navbar-mobile ul {
  display: block;
  position: absolute;
  top: 55px;
  right: 15px;
  bottom: 15px;
  left: 15px;
  padding: 10px 0;
  border-radius: 6px;
  background-color: #fff;
  overflow-y: auto;
  transition: 0.3s;
}
.navbar-mobile a, .navbar-mobile a:focus {
  padding: 10px 20px;
  font-size: 15px;
  color: #47536e;
}
.navbar-mobile a:hover, .navbar-mobile .active, .navbar-mobile li:hover > a {
  color: #5777ba;
}
.navbar-mobile .getstarted, .navbar-mobile .getstarted:focus {
  margin: 15px;
}
.navbar-mobile .dropdown ul {
  position: static;
  display: none;
  margin: 10px 20px;
  padding: 10px 0;
  z-index: 99;
  opacity: 1;
  visibility: visible;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
}
.navbar-mobile .dropdown ul li {
  min-width: 200px;
}
.navbar-mobile .dropdown ul a {
  padding: 10px 20px;
}
.navbar-mobile .dropdown ul a i {
  font-size: 12px;
}
.navbar-mobile .dropdown ul a:hover, .navbar-mobile .dropdown ul .active:hover, .navbar-mobile .dropdown ul li:hover > a {
  color: #5777ba;
}
.navbar-mobile .dropdown > .dropdown-active {
  display: block;
}

/*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
#hero {
  width: 100%;
  position: relative;
  overflow: hidden;
  padding: 140px 0 100px 0;
}
#hero::before {
  content: "";
  position: absolute;
  right: -100%;
  top: 20%;
  width: 250%;
  height: 200%;
  z-index: -1;
  background-color: #e8ecf5;
  transform: skewY(135deg);
}
#hero h1 {
  margin: 0 0 10px 0;
  font-size: 48px;
  font-weight: 500;
  line-height: 56px;
  color: #5777ba;
  font-family: "Poppins", sans-serif;
}
#hero h2 {
  color: #515f7d;
  margin-bottom: 50px;
  font-size: 20px;
}
#hero .download-btn {
  font-family: "Raleway", sans-serif;
  font-weight: 500;
  font-size: 15px;
  display: inline-block;
  padding: 8px 24px 10px 46px;
  border-radius: 3px;
  transition: 0.5s;
  color: #fff;
  background: #47536e;
  position: relative;
}
#hero .download-btn:hover {
  background: #5777ba;
}
#hero .download-btn i {
  font-size: 20px;
  position: absolute;
  left: 18px;
  top: 8.5px;
}
#hero .download-btn + .download-btn {
  margin-left: 20px;
}
@media (max-width: 991px) {
  #hero {
    text-align: center;
  }
  #hero .download-btn + .download-btn {
    margin: 0 10px;
  }
  #hero .hero-img {
    text-align: center;
  }
  #hero .hero-img img {
    width: 60%;
  }
}
@media (max-width: 768px) {
  #hero h1 {
    font-size: 28px;
    line-height: 36px;
  }
  #hero h2 {
    font-size: 18px;
    line-height: 24px;
    margin-bottom: 30px;
  }
  #hero .hero-img img {
    width: 70%;
  }
}
@media (max-width: 575px) {
  #hero .hero-img img {
    width: 80%;
  }
}

/*--------------------------------------------------------------
# Sections General
--------------------------------------------------------------*/
section {
  padding: 60px 0;
  overflow: hidden;
}

.section-bg {
  background-color: #f2f5fa;
}

.section-title {
  text-align: center;
  padding-bottom: 30px;
}
.section-title h2 {
  font-size: 32px;
  font-weight: 400;
  margin-bottom: 20px;
  padding-bottom: 0;
  color: #5777ba;
  font-family: "Poppins", sans-serif;
}
.section-title p {
  margin-bottom: 0;
}

/*--------------------------------------------------------------
# Breadcrumbs
--------------------------------------------------------------*/
.breadcrumbs {
  padding: 15px 0;
  background-color: #f6f8fb;
  min-height: 40px;
}
.breadcrumbs h2 {
  font-size: 24px;
  font-weight: 300;
}
.breadcrumbs ol {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  padding: 0;
  margin: 0;
  font-size: 14px;
}
.breadcrumbs ol li + li {
  padding-left: 10px;
}
.breadcrumbs ol li + li::before {
  display: inline-block;
  padding-right: 10px;
  color: #6c757d;
  content: "/";
}
@media (max-width: 768px) {
  .breadcrumbs .d-flex {
    display: block !important;
  }
  .breadcrumbs ol {
    display: block;
  }
  .breadcrumbs ol li {
    display: inline-block;
  }
}

/*--------------------------------------------------------------
# App Features
--------------------------------------------------------------*/
.features .content {
  padding: 30px 0;
}
.features .content .icon-box {
  margin-top: 25px;
}
.features .content .icon-box h4 {
  font-size: 20px;
  font-weight: 700;
  margin: 5px 0 10px 60px;
}
.features .content .icon-box i {
  font-size: 48px;
  float: left;
  color: #5777ba;
}
.features .content .icon-box p {
  font-size: 15px;
  color: #979aa1;
  margin-left: 60px;
}
@media (max-width: 991px) {
  .features .image {
    text-align: center;
  }
  .features .image img {
    max-width: 80%;
  }
}
@media (max-width: 667px) {
  .features .image img {
    max-width: 100%;
  }
}

/*--------------------------------------------------------------
# Details
--------------------------------------------------------------*/
.details .content + .content {
  margin-top: 100px;
}
.details .content h3 {
  font-weight: 700;
  font-size: 32px;
  color: #47536e;
}
.details .content ul {
  list-style: none;
  padding: 0;
}
.details .content ul li {
  padding-bottom: 10px;
}
.details .content ul i {
  font-size: 24px;
  padding-right: 2px;
  color: #5777ba;
  line-height: 0;
}
.details .content p:last-child {
  margin-bottom: 0;
}

/*--------------------------------------------------------------
# Gallery
--------------------------------------------------------------*/
.gallery {
  overflow: hidden;
}
.gallery .swiper-slide {
  transition: 0.3s;
}
.gallery .swiper-pagination {
  margin-top: 20px;
  position: relative;
}
.gallery .swiper-pagination .swiper-pagination-bullet {
  width: 12px;
  height: 12px;
  background-color: #fff;
  opacity: 1;
  border: 1px solid #5777ba;
}
.gallery .swiper-pagination .swiper-pagination-bullet-active {
  background-color: #5777ba;
}
.gallery .swiper-slide-active {
  text-align: center;
}
@media (min-width: 992px) {
  .gallery .swiper-wrapper {
    padding: 40px 0;
  }
  .gallery .swiper-slide-active {
    border: 6px solid #5777ba;
    padding: 4px;
    background: #fff;
    z-index: 1;
    transform: scale(1.2);
    margin-top: 10px;
    border-radius: 25px;
  }
}

/*--------------------------------------------------------------
# Testimonials
--------------------------------------------------------------*/
.testimonials .testimonials-carousel, .testimonials .testimonials-slider {
  overflow: hidden;
}
.testimonials .testimonial-item {
  box-sizing: content-box;
  padding: 30px 30px 30px 60px;
  margin: 30px 10px 30px 50px;
  min-height: 200px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.08);
  position: relative;
  background: #fff;
}
.testimonials .testimonial-item .testimonial-img {
  width: 90px;
  border-radius: 10px;
  border: 6px solid #fff;
  position: absolute;
  left: -45px;
}
.testimonials .testimonial-item h3 {
  font-size: 18px;
  font-weight: bold;
  margin: 10px 0 5px 0;
  color: #111;
}
.testimonials .testimonial-item h4 {
  font-size: 14px;
  color: #999;
  margin: 0;
}
.testimonials .testimonial-item .quote-icon-left, .testimonials .testimonial-item .quote-icon-right {
  color: #e8ecf5;
  font-size: 26px;
}
.testimonials .testimonial-item .quote-icon-left {
  display: inline-block;
  left: -5px;
  position: relative;
}
.testimonials .testimonial-item .quote-icon-right {
  display: inline-block;
  right: -5px;
  position: relative;
  top: 10px;
}
.testimonials .testimonial-item p {
  font-style: italic;
  margin: 15px auto 15px auto;
}
.testimonials .swiper-pagination {
  margin-top: 20px;
  position: relative;
}
.testimonials .swiper-pagination .swiper-pagination-bullet {
  width: 12px;
  height: 12px;
  background-color: #fff;
  opacity: 1;
  border: 1px solid #5777ba;
}
.testimonials .swiper-pagination .swiper-pagination-bullet-active {
  background-color: #5777ba;
}

/*--------------------------------------------------------------
# Pricing
--------------------------------------------------------------*/
.pricing .row {
  padding-top: 40px;
}
.pricing .box {
  padding: 40px;
  margin-bottom: 30px;
  box-shadow: 0px 0px 30px rgba(73, 78, 92, 0.15);
  background: #fff;
  text-align: center;
}
.pricing h3 {
  font-weight: 300;
  margin-bottom: 15px;
  font-size: 28px;
}
.pricing h4 {
  font-size: 46px;
  color: #5777ba;
  font-weight: 400;
  font-family: "Open Sans", sans-serif;
  margin-bottom: 25px;
}
.pricing h4 span {
  color: #bababa;
  font-size: 18px;
  display: block;
}
.pricing ul {
  padding: 0;
  list-style: none;
  color: #999;
  text-align: left;
  line-height: 20px;
}
.pricing ul li {
  padding-bottom: 12px;
}
.pricing ul i {
  color: #5777ba;
  font-size: 18px;
  padding-right: 4px;
}
.pricing ul .na {
  color: #ccc;
}
.pricing ul .na i {
  color: #ccc;
}
.pricing ul .na span {
  text-decoration: line-through;
}
.pricing .get-started-btn {
  background: #47536e;
  display: inline-block;
  padding: 8px 30px;
  border-radius: 20px;
  color: #fff;
  transition: none;
  font-size: 14px;
  font-weight: 400;
  font-family: "Raleway", sans-serif;
  transition: 0.3s;
}
.pricing .get-started-btn:hover {
  background: #5777ba;
}
.pricing .featured {
  z-index: 10;
  margin: -30px -5px 0 -5px;
}
.pricing .featured .get-started-btn {
  background: #5777ba;
}
.pricing .featured .get-started-btn:hover {
  background: #748ec6;
}
@media (max-width: 992px) {
  .pricing .box {
    max-width: 60%;
    margin: 0 auto 30px auto;
  }
}
@media (max-width: 767px) {
  .pricing .box {
    max-width: 80%;
    margin: 0 auto 30px auto;
  }
}
@media (max-width: 420px) {
  .pricing .box {
    max-width: 100%;
    margin: 0 auto 30px auto;
  }
}

/*--------------------------------------------------------------
# Frequently Asked Questions
--------------------------------------------------------------*/
.faq .accordion-list {
  padding: 0 100px;
}
.faq .accordion-list ul {
  padding: 0;
  list-style: none;
}
.faq .accordion-list ul li {
  padding-bottom: 10px;
}
.faq .accordion-list li + li {
  margin-top: 5px;
}
.faq .accordion-list li {
  padding: 10px;
  background: #fff;
  border-radius: 4px;
  position: relative;
}

.faq .accordion-list a {
  display: block;
  position: relative;
  font-family: "Poppins", sans-serif;
  font-size: 16px;
  line-height: 16px;
  font-weight: 500;
  padding: 0 50px;
  outline: none;
  cursor: pointer;
}
.faq .accordion-list .icon-help {
  font-size: 24px;
  position: absolute;
  right: 0;
  left: 20px;
  color: #b1c0df;
}
.faq .accordion-list .icon-show, .faq .accordion-list .icon-close {
  font-size: 24px;
  position: absolute;
  right: 0;
  top: 0;
}
.faq .accordion-list p {
  margin-bottom: 0;
  padding: 10px 0 0 0;
}
.faq .accordion-list .icon-show {
  display: none;
}
.faq .accordion-list a.collapsed {
  color: #343a40;
}
.faq .accordion-list a.collapsed:hover {
  color: #5777ba;
}
.faq .accordion-list a.collapsed .icon-show {
  display: inline-block;
}
.faq .accordion-list a.collapsed .icon-close {
  display: none;
}
@media (max-width: 1200px) {
  .faq .accordion-list {
    padding: 0;
  }
}

/*--------------------------------------------------------------
# Contact
--------------------------------------------------------------*/
.contact .info {
  padding: 20px 40px;
  background: #f1f3f6;
  color: #47536e;
  text-align: center;
  border: 1px solid #fff;
}
.contact .info i {
  font-size: 48px;
  color: #9fb2d8;
  margin-bottom: 15px;
}
.contact .info h4 {
  padding: 0;
  margin: 0 0 10px 0;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  font-family: "Poppins", sans-serif;
}
.contact .info p {
  font-size: 15px;
}
.contact .php-email-form {
  width: 100%;
}
.contact .php-email-form .error-message {
  display: none;
  color: #fff;
  background: #ed3c0d;
  text-align: left;
  padding: 15px;
  font-weight: 600;
}
.contact .php-email-form .error-message br + br {
  margin-top: 25px;
}
.contact .php-email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}
.contact .php-email-form .loading {
  display: none;
  background: #fff;
  text-align: center;
  padding: 15px;
}
.contact .php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid #18d26e;
  border-top-color: #eee;
  -webkit-animation: animate-loading 1s linear infinite;
  animation: animate-loading 1s linear infinite;
}
.contact .php-email-form label {
  font-family: "Poppins", sans-serif;
  margin-bottom: 5px;
  color: #8a8c95;
}
.contact .php-email-form input, .contact .php-email-form textarea {
  border-radius: 0;
  box-shadow: none;
  font-size: 14px;
}
.contact .php-email-form input:focus, .contact .php-email-form textarea:focus {
  border-color: #5777ba;
}
.contact .php-email-form input {
  padding: 10px 15px;
}
.contact .php-email-form textarea {
  padding: 12px 15px;
}
.contact .php-email-form button[type=submit] {
  background: #fff;
  border: 2px solid #5777ba;
  padding: 10px 24px;
  color: #5777ba;
  transition: 0.4s;
  border-radius: 50px;
  margin-top: 5px;
}
.contact .php-email-form button[type=submit]:hover {
  background: #5777ba;
  color: #fff;
}
@media (max-width: 1024px) {
  .contact .php-email-form {
    padding: 30px 15px 15px 15px;
  }
}
@media (max-width: 768px) {
  .contact .php-email-form {
    padding: 15px 0 0 0;
  }
}
@-webkit-keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
#footer {
  background: #fff;
  padding: 0 0 30px 0;
  color: #47536e;
  font-size: 14px;
  background: #eff2f8;
}
#footer .footer-newsletter {
  padding: 50px 0;
  background: #eff2f8;
  text-align: center;
  font-size: 15px;
}
#footer .footer-newsletter h4 {
  font-size: 24px;
  margin: 0 0 20px 0;
  padding: 0;
  line-height: 1;
  font-weight: 600;
  color: #47536e;
}
#footer .footer-newsletter form {
  margin-top: 30px;
  background: #fff;
  padding: 6px 10px;
  position: relative;
  border-radius: 50px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  text-align: left;
}
#footer .footer-newsletter form input[type=email] {
  border: 0;
  padding: 4px 8px;
  width: calc(100% - 100px);
}
#footer .footer-newsletter form input[type=submit] {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  border: 0;
  background: none;
  font-size: 16px;
  padding: 0 20px;
  background: #5777ba;
  color: #fff;
  transition: 0.3s;
  border-radius: 50px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}
#footer .footer-newsletter form input[type=submit]:hover {
  background: #415f9d;
}
#footer .footer-top {
  padding: 60px 0 30px 0;
  background: #fff;
}
#footer .footer-top .footer-contact {
  margin-bottom: 30px;
}
#footer .footer-top .footer-contact h4 {
  font-size: 22px;
  margin: 0 0 30px 0;
  padding: 2px 0 2px 0;
  line-height: 1;
  font-weight: 700;
  color: #47536e;
}
#footer .footer-top .footer-contact p {
  font-size: 14px;
  line-height: 24px;
  margin-bottom: 0;
  font-family: "Raleway", sans-serif;
  color: #8a8c95;
}
#footer .footer-top h4 {
  font-size: 16px;
  font-weight: bold;
  color: #47536e;
  position: relative;
  padding-bottom: 12px;
}
#footer .footer-top .footer-links {
  margin-bottom: 30px;
}
#footer .footer-top .footer-links ul {
  list-style: none;
  padding: 0;
  margin: 0;
}
#footer .footer-top .footer-links ul i {
  padding-right: 2px;
  color: #9fb2d8;
  font-size: 18px;
  line-height: 1;
}
#footer .footer-top .footer-links ul li {
  padding: 10px 0;
  display: flex;
  align-items: center;
}
#footer .footer-top .footer-links ul li:first-child {
  padding-top: 0;
}
#footer .footer-top .footer-links ul a {
  color: #8a8c95;
  transition: 0.3s;
  display: inline-block;
  line-height: 1;
}
#footer .footer-top .footer-links ul a:hover {
  text-decoration: none;
  color: #5777ba;
}
#footer .footer-top .social-links a {
  font-size: 18px;
  display: inline-block;
  background: #5777ba;
  color: #fff;
  line-height: 1;
  padding: 8px 0;
  margin-right: 4px;
  border-radius: 50%;
  text-align: center;
  width: 36px;
  height: 36px;
  transition: 0.3s;
}
#footer .footer-top .social-links a:hover {
  background: #27282c;
  color: #fff;
  text-decoration: none;
}
#footer .copyright {
  text-align: center;
  float: left;
  color: #47536e;
}
#footer .credits {
  float: right;
  text-align: center;
  font-size: 13px;
  color: #47536e;
}
@media (max-width: 768px) {
  #footer .copyright, #footer .credits {
    float: none;
    text-align: center;
    padding: 5px 0;
  }
}
/*--------------------------------------------------------------
# Counts
--------------------------------------------------------------*/
.counts {
  padding: 70px 0 60px;
}
.counts .count-box {
  display: flex;
  align-items: center;
  padding: 30px;
  width: 100%;
  background: #fff;
  box-shadow: 0px 0 30px rgba(1, 41, 112, 0.08);
}
.counts .count-box i {
  font-size: 42px;
  line-height: 0;
  margin-right: 20px;
  color: #4154f1;
}
.counts .count-box span {
  font-size: 36px;
  display: block;
  font-weight: 600;
  color: #0b198f;
}
.counts .count-box p {
  padding: 0;
  margin: 0;
  font-family: "Nunito", sans-serif;
  font-size: 14px;
}

</style>
  <!-- ======= Header ======= -->
<?php $this->load->view('kua/menu.php')?>

<?php 
      $content = isset($content)?$content:'';
      if ($content != ''){
	  		$this->load->view($content);
	  }                         
  ?>

<?php $this->load->view('kua/footer.php')?>
</body>

</html>