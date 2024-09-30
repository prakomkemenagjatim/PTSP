<!DOCTYPE html>
<html lang="id">

<?php $this->load->view('ld/head.php')?>
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
</style>
  <!-- ======= Header ======= -->
<?php $this->load->view('ld/menu.php')?>

<?php 
      $content = isset($content)?$content:'';
      if ($content != ''){
	  		$this->load->view($content);
	  }                         
  ?>

<?php $this->load->view('ld/footer.php')?>

</body>

</html>