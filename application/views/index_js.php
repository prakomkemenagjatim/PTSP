  <script src="<?php echo base_url('assets/node_modules/jquery/dist/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/node_modules/popper.js/dist/umd/popper.min.js')?>"></script>
  <script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap-select.min.js')?>"></script>
  <script type='text/javascript' src="<?php echo base_url('assets/js/datepicker.js')?>"></script>  
  <script src="<?php echo base_url('assets/js/off-canvas.js')?>"></script>
  <script src="<?php echo base_url('assets/js/misc.js')?>"></script>
  <script src="<?php echo base_url('assets/easyui/jquery.easyui.min.js')?>"></script>
  <script src="<?php echo base_url('assets/easyui/datagrid-export.js')?>"></script>
     <script src="<?php echo base_url('assets/pwabuilder-sw.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert2.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js')?>"></script>  
   <script type="text/javascript">
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
              csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
   	$(document).ready(function(){
	   	if($(".datepicker").length > 0){
	        $(".datepicker").datepicker({format: 'dd-mm-yyyy',autoclose: true});
	    }
      $('.navbar-collapse').on('show.bs.collapse', function() {
        $(".header").css("height", "unset");
      });

      $('.navbar-collapse').on('hidden.bs.collapse', function() {
        $(".header").css("height", "60px");
      });

      $('.bukutamu').click(function(e){
        e.preventDefault();
        $('#mdbukutamu').modal({
          keyboard: false,
          backdrop:false
        });
      });
      $('#mdbukutamu').on('shown.bs.modal', function (e) {
        $('.bttxt').val('');
      });
      $('#mdbukutamu').on('hidden.bs.modal', function (e) {
        $('.bttxt').val('');
        $('body').removeAttr('style');
      });
      $('#mdrating').on('shown.bs.modal', function (e) {
          $('#ikm_saran').val('');
          $("input[type='radio'][name='rate']").prop("checked", false);
      });
      $('#mdrating').on('hidden.bs.modal', function (e) {
        $('#ikm_saran').val('');
        $("input[type='radio'][name='rate']").prop("checked", false);
      });
      $('.simpanrating').click(function(){
          var rate0 = $("input[type='radio'][name='rate']:checked").val();
          var ikm_saran = $('#ikm_saran').val();
          if(rate0 == undefined){
            swal("Peringatan", "Tingkat kepuasan layanan belum dipilih.", "warning");
            return false;
          }
          $.post('<?php echo base_url(); ?>index.php/ajax/simpanrating',{[csrfName]: csrfHash,rate:rate0,ikm_saran:ikm_saran},function(result){
            if (result.status == 1){
                  $('#mdrating').modal('hide');
                  
                  swal({
                    title: "Terima kasih atas waktu dan penilainnya 😍",
                    text: "",
                    type: "success",
                    timer: 10000
                    });
                    var urlikm = '<?php echo base_url(); ?>index.php/data/grafikikm';
                    if (urlikm ==  window.location.href){
                      setTimeout(function(){
                        location.reload();
                      },5000);
                    } else {
                      setTimeout(function(){
                        window.open(urlikm, '_blank');
                      },3000);
                      
                    }
                } else {
                  swal("Peringatan", "Gagal menyampaikan penilaian", "warning");
                }
          },'json')
          .fail(function(response) {
            swal("Peringatan", "Gagal menyampaikan penilaian", "warning");
        });
      });

      $('#bt_layanan').change(function(){
        $('#bt_layananlain').val('');
          if ($(this).val() == '99') {
             $('#glayananlain').fadeIn(500); 
          } else {
            $('#glayananlain').fadeOut(500); 
          }
      })

      $('.simpanbukutamu').click(function(){
          var bt_nama = $('#bt_nama').val();
          var bt_alamat = $('#bt_alamat').val();
          var bt_hp = $('#bt_hp').val();
          var bt_email = $('#bt_email').val();
          var bt_pesan = $('#bt_pesan').val();
          var bt_layanan = $('#bt_layanan').val();
          var bt_layananlain = $('#bt_layananlain').val();
          if(bt_nama == ""){
            swal("Peringatan", "Nama lengkap harus diisi.", "warning");
            return false;
          } else if(bt_alamat == ""){
            swal("Peringatan", "Alamat lengkap harus diisi.", "warning");
            return false;
          } else if(bt_hp == ""){
            swal("Peringatan", "Nomor HP/WA harus diisi.", "warning");
            return false;
          } else if(bt_layanan == "" || bt_layanan == "0"){
            swal("Peringatan", "Layanan belum dipilih.", "warning");
            return false;
          } else if(bt_layanan == "99" && bt_layananlain == "" ){
            swal("Peringatan", "Layanan lainnya harus diisi.", "warning");
            return false;
          }
          $.post('<?php echo base_url(); ?>index.php/ajax/simpanbukutamu',{
            [csrfName]: csrfHash,
            bt_nama:bt_nama,
            bt_alamat:bt_alamat,
            bt_hp:bt_hp,
            bt_email:bt_email,
            bt_pesan:bt_pesan,
            bt_layanan:bt_layanan,
            bt_layananlain:bt_layananlain
          },function(result){
            if (result.status == 1){
                  
                  swal({
                    title: "Terima kasih atas kunjungannya 😍",
                    text: "",
                    type: "success",
                    timer: 10000
                    }).then(function(value) {
                      if(value === true) {
                        $('#mdbukutamu').modal('hide');
                      }
                    });
                } else {
                  swal("Peringatan", "Gagal menyimpan buku tamu.", "warning");
                }
          },'json')
          .fail(function(response) {
            swal("Peringatan", "Gagal menyimpan buku tamu.", "warning");
        });
      });
     });
      
    function exportexcel(dg,jdl){
      dg.datagrid('toExcel',{
          filename: jdl+'.xls',
          worksheet: jdl
      }); 
    }
    function printgrid(dg,jdl){
      dg.datagrid('print',jdl); 
    }

   </script>   
   
   
   <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/654c4b70f2439e1631ed50a0/1hep0dc4p';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
   
