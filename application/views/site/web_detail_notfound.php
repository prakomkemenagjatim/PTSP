<?php $this->load->view('site/web_header.php')?>
    
    
    <div class="page-header  py-5 text-center position-relative teal darken-2">
	    <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div>
	    <div class="container">
		    <h1 class="page-heading single-col-max mx-auto white-text"><?php echo $head; ?></h1>
		    <div class="offset-md-4 col-md-4 margin-t-15">  
            	<a href="<?php echo base_url('index.php')?>" class="btn btn-primary btn-block teal darken-4" style="border-radius: 40px;font-weight: normal;font-size: 14px;" onclick="caridata();return false;"><span class="fa fa-chevron-circle-left fa-fw" aria-hidden="true"></span> Beranda</a>
            </div> 
	    </div>
    </div>
<?php $this->load->view('index_js'); ?> 





