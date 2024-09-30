<!-- ======= Footer ======= -->
  

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
  <script type='text/javascript' src="<?php echo base_url('assets/js/datepicker.js')?>"></script>  
  <script src="<?php echo base_url('assets/js/off-canvas.js')?>"></script>
  <script src="<?php echo base_url('assets/js/misc.js')?>"></script>
  <script src="<?php echo base_url('assets/easyui/jquery.easyui.min.js')?>"></script>
  <script src="<?php echo base_url('assets/easyui/datagrid-export.js')?>"></script>
     <script src="<?php echo base_url('assets/pwabuilder-sw.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert2.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js')?>"></script>  
  <script src="<?php echo base_url('assets/leaflet.js'); ?>"></script>
  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/ld/js/main.js'); ?>"></script>
<script>
    $(document).ready(function() {
         $('.js-example-basic-single').select2();
        
    $(".js-example-basic-single").select2({
      containerCss : {"display":"block"}
        });
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
  
    
</script>
  <script>
    var map = L.map('map').setView([-7.442855981454138, 111.38391772446673], 12); // Set initial view to one of the coordinates

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Define the custom icon
    var customIcon = L.icon({
        iconUrl: '<?php echo base_url('assets/ld/img/kua.png'); ?>',
        iconSize: [35, 35], // size of the icon
        iconAnchor: [16, 32], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -32] // point from which the popup should open relative to the iconAnchor
    });

    <?php
    foreach ($kua as $row) {
        $latitude = $row->Latitude;
        $longitude = $row->Longitude;
        $nama_kua = $row->Nama_KUA;
        $alamat = $row->Alamat;
    ?>
        L.marker([<?php echo $latitude; ?>, <?php echo $longitude; ?>], {icon: customIcon}).addTo(map)
            .bindPopup('<?php echo $nama_kua."</br>".$alamat; ?>');
    <?php
    }
    ?>
</script>

    
    
