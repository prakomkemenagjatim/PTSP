<!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    

    <div class="container copyright text-center mt-4">
      <p>&copy; <span>Copyright</span> <strong class="px-1">SANTUN V2</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://ptsp.kemenagngawi.or.id/">Kemenag Ngawi</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <div aria-hidden='true' aria-labelledby='mdratingLabel' class='modal fade white-text' id='mdrating' role='dialog' tabindex='-1' style="z-index:3000">
  <div class='modal-dialog modal-dialog-centered rads box-shadow' role='document' >
    <div class='modal-content  bg-dark' style="border-width: 6px 0 0 0;border-color: #28a745;">
      <div class='modal-header bord-dot-b bg-secondary  text-center'>
        <h5 class='modal-title w-100 white-text' id='mdratingLabel'><strong><i class="fa fa-star fa-fw text-warning" aria-hidden="true"></i> Beri Rating!! <i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i></strong></h5>
        <button aria-label='Close' class='close' data-dismiss='modal' type='button'>
          <span aria-hidden='true'/>
        </button>
      </div>
      <div class='modal-body'>
        <div class="containerrating ">
          <div class="star-widget">
            <input type="radio" name="rate" id="rate-5" value="5">
            <label for="rate-5" class="fa fa-star"></label>
            <input type="radio" name="rate" id="rate-4" value="4">
            <label for="rate-4" class="fa fa-star"></label>
            <input type="radio" name="rate" id="rate-3" value="3">
            <label for="rate-3" class="fa fa-star"></label>
            <input type="radio" name="rate" id="rate-2" value="2">
            <label for="rate-2" class="fa fa-star"></label>
            <input type="radio" name="rate" id="rate-1" value="1">
            <label for="rate-1" class="fa fa-star"></label>
            <form action="#">
              <header></header>
              
            </form>
          </div>
          <div class="textarea textarearating">
                <textarea id="ikm_saran" class="form-control" cols="50" placeholder="Sampaikan apresiasi, saran, atau kritik yang membangun.."></textarea>
              </div>
          <div> <label id="cekrating-error" class="error" for="cekrating" style="display: none;">Penilaian belum dilakukan, silakan beri kami bintang.</label></div>
        </div>
      </div>
      <div class='modal-footer bord-dot-t bg-secondary'>
        <a href="<?php echo base_url(); ?>index.php/data/grafikikm" target="_blank" class='btn btn-warning ' type='button'>Grafik IKM</a>
        <button class='btn btn-success simpanrating' type='button'>Kirim</button>
        <button class='btn btn-secondary' data-dismiss='modal' type='button'>Tutup</button>
        
      </div>
    </div>
  </div>
</div>
  <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('assets/ld/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/ld/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/ld/vendor/purecounter/purecounter_vanilla.js'); ?>"></script>
  <script src="<?php echo base_url('assets/ld/vendor/imagesloaded/imagesloaded.pkgd.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/ld/vendor/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/ld/vendor/swiper/swiper-bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/ld/vendor/aos/aos.js'); ?>"></script>
  <script src="<?php echo base_url('assets/ld/vendor/php-email-form/validate.js'); ?>"></script>
  <script src="<?php echo base_url('assets/node_modules/jquery/dist/jquery.min.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
   
  <script src="<?php echo base_url('assets/node_modules/popper.js/dist/umd/popper.min.js')?>"></script>
  <script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap-select.min.js')?>"></script>
  <!-- <script type='text/javascript' src="<?php echo base_url('assets/js/datepicker.js')?>"></script>   -->
  <script src="<?php echo base_url('assets/js/off-canvas.js')?>"></script>
  <script src="<?php echo base_url('assets/js/misc.js')?>"></script>
  <script src="<?php echo base_url('assets/easyui/jquery.easyui.min.js')?>"></script>
  <script src="<?php echo base_url('assets/easyui/datagrid-export.js')?>"></script>
     <script src="<?php echo base_url('assets/pwabuilder-sw.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert2.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js')?>"></script>  
  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/ld/js/main.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
<script>
    $(document).ready(function() {
         $('.js-example-basic-single').select2();
        
    $(".js-example-basic-single").select2({
      containerCss : {"display":"block"}
        });
    });

    // $('.datepicker').datepicker();
    $(".datepicker").datepicker({
      format: "dd-mm-yyyy",
    todayBtn: true,
    language: "id",
    orientation: "bottom auto",
    autoclose: true,
    endDate: new Date() // This sets the maximum date to today
});


</script>
 <script>
 var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
              csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
    $(function() {
        $('.js-example-basic-single').on('change', function () {
            var selectedOption = $(this).val();
            if(selectedOption) {
                window.open(selectedOption, '_self');
            }
        });
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
                          $('#bt_nama').val('');
                            $('#bt_alamat').val('');
                            $('#bt_hp').val('');
                            $('#bt_email').val('');
                            $('#bt_pesan').val('');
                            $('#bt_layanan').val('');
                            $('#bt_layananlain').val('');

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
    
</script>