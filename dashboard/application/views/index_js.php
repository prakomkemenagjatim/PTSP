  <script src="<?php echo base_url('assets/node_modules/jquery312/dist/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/node_modules/popper.js/dist/umd/popper.min.js')?>"></script>
  <script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap-select.min.js')?>"></script>
  <script type='text/javascript' src="<?php echo base_url('assets/js/datepicker.js')?>"></script>  
  <script src="<?php echo base_url('assets/js/off-canvas.js')?>"></script>
  <script src="<?php echo base_url('assets/js/misc.js')?>"></script>
  <script src="<?php echo base_url('assets/jquery-easyui-1.9.15/jquery.easyui.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert2.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/exportexcel.js')?>"></script>  
  <script src="<?php echo base_url('assets/js/file-upload.js')?>"></script> 

   <script type="text/javascript">
   	$(document).ready(function(){ 
	   	if($(".datepicker").length > 0){
	        $(".datepicker").datepicker({format: 'yyyy-mm-dd'});
	    }
      getlayjml();
    })

    function getlayjml(){
      var url="<?php echo base_url('index.php/data/getlayjml')?>";
      $.post(url,{},function(result){
        var jmlmn = 0;
        var mno = '';
        $.each(result , function(idx, val) { 
            mmenu = val.mmenu;
            menu = val.menu;
            jml = val.jml;
            if (jml > 0){
              if ($('.m'+menu).length > 0){
                $('.m'+menu).show();
                $('.c'+menu).html(jml);
              }
              if ($('.m'+mmenu).length > 0){
                $('.m'+mmenu).show();
              }
            } else {
              if ($('.m'+menu).length > 0){
                $('.m'+menu).hide();
                $('.c'+menu).html("0");
              }
            }
            if (mno == ''){
              jmlmn = jml;
            } else
            if (mno != mmenu){
              jmlmn = 0;
            } else {
              jmlmn = jmlmn+jml;
            }
            if (jmlmn > 0){
              if ($('.m'+mmenu).length > 0){
                $('.m'+mmenu).show();
              }
            } else {
              if ($('.m'+mmenu).length > 0){
                $('.m'+mmenu).hide();
              }
            }
            mno = mmenu;
        });
      },'json')
    }
   </script>             