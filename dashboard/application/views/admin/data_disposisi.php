 <style>
.uk-timeline .uk-timeline-item .uk-card {
	max-height: auto;
}

.uk-timeline .uk-timeline-item {
    display: flex;
    position: relative;
}

.uk-timeline .uk-timeline-item::before {
    background: #dadee4;
    content: "";
    height: 100%;
    left: 19px;
    position: absolute;
    top: 20px;
    width: 2px;
		z-index: -1;
}

.uk-timeline .uk-timeline-item .uk-timeline-icon .uk-badge {
		margin-top: 20px;
    width: 40px;
    height: 40px;
}

.uk-timeline .uk-timeline-item .uk-timeline-content {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 0 0 0 1rem;
}
 </style>
<div class="" style="width:100%!important">
    <div class="uk-timeline">
         <?php   
            if (count($disp)===0){
                echo("<h1><span class='uk-text-background'></span></h1>");
            }
                foreach ($disp as $key => $value) {
                   
              ?>
        <div class="uk-timeline-item">
            <div class="uk-timeline-icon">
                <span class="uk-badge"><span uk-icon="mail"></span></span>
            </div>
            <div class="uk-timeline-content">
                <div class="uk-card uk-card-default uk-margin-medium-bottom uk-overflow-auto">
                    <div class="uk-card-header" style="background-color:#d1d1d1">
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            <h3 class="uk-card-title"><time datetime="<?= date('d-M-Y',strtotime($value->createtgl)); ?>"><?= date('d-M-Y',strtotime($value->createtgl)); ?></time></h3>
                            <span class="uk-label uk-label-success uk-margin-auto-left"></span>
                        </div>
                    </div>
                    <div class="uk-card-body">
					
					<table class="uk-table uk-table-small">
					    <tr>
					        <td>Dari</td>
					        <td><?= $value->suratinstansi;?></td>
					    </tr>
					    <tr>
					        <td width="10%">Hal</td>
					        <td>: <?php echo $value->suratperihal; ?></td>
					    </tr>
					    <tr>
					        <td>Nomor Surat</td>
					        <td>: <?php echo $value->suratno; ?></td>
					    </tr>
					    <tr>
					        <td>Tanggal Surat</td>
					        <td>: <?php echo $value->tglsurat; ?></td>
					    </tr>
					</table>
					 
                    
                    <a class="uk-button uk-button-primary" target="_blank" href="<?php echo viewdoc().str_replace('dashboard/','',base_url()).$value->filedok ; ?>">Lihat</a>
                    <a class="uk-button uk-button-secondary" style="color:#fff" data-toggle="modal" data-target="#exampleModal2"  data-id="<?php echo $value->noreg;?>" data-pengirim="<?php echo $value->suratinstansi;?>" data-perihal="<?php echo $value->suratperihal;?>">Disposisi</a>
                   
                    </div>
                </div>
            </div>
        </div>
        
        <?php } ?>
       
    </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <form method="POST" action="<?= base_url('index.php/disposisi_aksi'); ?>" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Isi Disposisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label text-primary">Dari:</label>
            <!-- <label for="recipient-name" class="col-form-label text-info" name="dari"></label> -->
            <input type="text" class="form-control" id="recipient-name" name="dari" disabled="disabled">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label text-primary">Perihal:</label>
            <!-- <label for="recipient-name" class="col-form-label text-info" name="tentang"></label> -->
            <input type="text" class="form-control" id="recipient-name" name="tentang" disabled="disabled">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label text-danger">Kepada:</label>
            <!-- <div class="custom-control custom-checkbox">
                <?php echo optionDispojab(); ?>
              </div> -->

            <?php foreach($unit as $u){ ?>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="<?php echo $u->typeId;?>" name="check_list[]" value="<?php echo $u->typeId;?>">
                <label class="custom-control-label" for="<?php echo $u->typeId;?>"><?php echo $u->typeJab;?></label>
              </div>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label text-danger">Isi Perintah:</label>
            <!-- <input type="text" class="form-control" id="message-text" name="isi" required="required"> -->
            <textarea class="form-control" id="message-text" name="isi" rows="3" required="required"></textarea>
            <input type="hidden" name="surat_id" required>
            <input type="hidden" name="dari" required>
            <input type="hidden" name="tentang" required>
            <input type="hidden" name="dok" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Proses Tindak lanjut?')">Proses</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <script src="<?php echo base_url('assets/js/exportexcel.js')?>"></script>  
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 

   <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/js/uikit.min.js"></script>  
     <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/js/uikit-icons.min.js"></script>  
     
     <script type="text/javascript">
  $('#exampleModal2').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('pengirim') 
    var ttg = button.data('perihal')
    var key = button.data('id')
    var file = button.data('dok')
    var modal = $(this)
    // modal.find('.modal-title').text('Tindak Lanjut Surat ' + nama)
    // modal.find('.modal-body input').val(recipient)
    $('[name="dari"]').val(recipient)
    $('[name="tentang"]').val(ttg)
    $('[name="surat_id"]').val(key)
    $('[name="dok"]').val(file)
  })
</script>