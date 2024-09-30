
<!DOCTYPE html>
<html lang="id">

<?php $this->load->view('index_head.php')?>
<body class="" style="background-color: #b1dcbe;">
  <?php 
      $content = isset($content)?$content:'';
      if ($content != ''){
	  		$this->load->view($content);
	  } else {
	  	//$this->load->view('admin/data_dashboard');
	  }
                                   
  ?>
  <?php $this->load->view('index_footer.php')?>

</body>

</html>