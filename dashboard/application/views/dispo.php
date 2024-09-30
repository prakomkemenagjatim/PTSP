<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('index_head.php')?>
<body>
  <div class="container-scroller">
    <?php $this->load->view('index_navbar.php')?>
    <div class="container-fluid page-body-wrapper" style="padding-top: 70px">
      <?php $this->load->view('index_menu.php')?>
      <div class="main-panel">
        <div class="content-wrapper">
			<?php 
             
			  	$this->load->view('admin/data_disposisi');
			                          
			  ?>
        </div>
        <?php $this->load->view('index_footer.php')?>
      </div>
    </div>
  </div>

</body>

</html>