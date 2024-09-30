<?php 
  $redir = isset($_GET['redirect'])?$_GET['redirect']:'';

  if ($redir == ''){
    $redir = base_url('index.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="theme-color" content="#4caf50">
  <title>SANTUN ADMINISTRATOR</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/simple-line-icons/css/simple-line-icons.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css')?>">
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert2.min.css')?>"/>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth " style="background-color:#4caf50">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto mb-4">
            <div class="text-left pt-0 pl-4 pb-4 pr-4 box-shadow-dark" style="border-radius:20px 20px;background:#066051">
            <a href="https://ptsp.kemenagngawi.or.id/">
              <img src="<?php echo base_url('assets/images/santun4.png')?>" class="box-shadow-dark mb-4" style="width: 100%;height: auto;padding: 2px 20px;border-radius: 0 0 20px 20px;background:#58d8a3 "/></a>
              <h4 class="green-text mt-3">Login</h4>
              <h5 class="font-weight-light white-text">Silakan masukkan username dan password</h5>
              <form class="pt-3">
                <form>
                  <div class="form-group">
                    <label for="usernama" class="yellow-text">Username</label>
                    <input type="text" class="form-control white-text" id="usernama" placeholder="Username" autocomplete="off">
                    <i class="mdi mdi-account yellow-text"></i>
                  </div>
                  <div class="form-group">
                    <label for="userpass" class="yellow-text">Password</label>
                    <input type="password" class="form-control white-text" id="userpass" placeholder="Password">
                    <i class="mdi mdi-key yellow-text"></i>
                  </div>
                  <div class="mt-5">
                    <button class="btn btn-block btn-success green btn-lg font-weight-medium" style="border-radius:10px 10px">Login</button>
                    <a href="https://sso.kemenag.go.id/auth/signin?appid=28ae30444be0cc36f9e2e971c8d77350" class="btn btn-block btn-success green btn-lg font-weight-medium" style="border-radius:10px 10px">Login SSO Kemenag</a>
                  </div>
                </form>                  
              </form>
            </div>
          </div>
          <div class="col-lg-12 mx-auto text-center mt-4">
            <div class="row justify-content-center pb-2 m-0" >
                <img class="logo-footer float-left" src="<?php echo base_url('assets/images/logo-kemenag.png')?>" alt="kemenag" style="width: 55px;
    padding-right: 10px;margin-right: 15px;border-right: 2px solid #ffc005;" >
                <small class="copyright white-text text-darken-4 float-left text-left"><?php echo kantorapp();?><br /> <?php echo alamatapp();?></small>
            </div>
            <small class="copyright green-text" ><?php echo footerapp();?> </small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url('assets/node_modules/jquery312/dist/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert2.min.js')?>"></script>
<script>
		$(document).ready(function(){
			document.getElementById('usernama').focus();
			$('.btn').click(function(e){e.preventDefault();login();})
		})
		function login(){			
			$.ajax({
		        url:  "<?php echo base_url('index.php/login/auth'); ?>",
		        type: 'POST',
		        data: {user:$('#usernama').val(),pass:$('#userpass').val()},
		        cache: false,
		        dataType: 'JSON',
		        success: function (result){
		        	if (result.error != '' && result.error != undefined){
						swal({title: "ERROR!!",text: result.error,type: "error",});					
					} else {
						window.location = "<?php echo $redir; ?>";
					}
		        }
		    });
		}
	</script>
</body>

</html>
