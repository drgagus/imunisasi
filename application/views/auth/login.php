<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $tittle ; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/auth/') ; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/auth/') ; ?>sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">

                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><a class="text-danger" href="<?= base_url('auth');?>">Imunisasi</a></h1>
                  </div>

                  <?= $this->session->flashdata('message'); ?>
                  <form class="user" action="<?= base_url(); ?>auth" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>" >
                      <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>


                </div>
              </div>
            </div>
<footer class="" style="background:#000">
    <div class="container-fluid">
      <small>
      <p class="m-0 text-center text-white">Admin:M.Adlin | CreatedBy:<a href="http://www.drgagus.com" class="text-decoration-none text-white" target=_blank >drg.agus</a></p>
    </small>
    </div>
</footer>
          </div>
        </div>

      </div>

    </div>



  </div>

 <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/auth/') ; ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/auth/') ; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/auth/') ; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/auth') ; ?>js/sb-admin-2.min.js"></script>

</body>

</html>
