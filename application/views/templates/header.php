<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/');?>css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/');?>css/mycss.css">

    <title><?= $title; ?></title>
  </head>
  <body>


   <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><a href="<?= base_url()?>" class="text-decoration-none">Program Imunisasi</a></h1>
    <p class="lead"><?= $user ;?></p>
  </div>
</div>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="<?= base_url('admin/kunjungan/').date('m').'/'.date('Y');?>">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin/add');?>">+Anak <span class="sr-only">(current)</span></a>
      </li> -->

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Data Anak
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('admin/dataanakdesa');?>">Data Anak/Desa</a>
          <a class="dropdown-item" href="<?= base_url('admin/dataanakposyandu');?>">Data Anak/Posyandu</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= base_url('admin/add');?>">+Anak</a>
        </div>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin/rekapitulasi/').date('Y');?>">Rekapitulasi IDL<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin/honorium');?>">Honorium Petugas<span class="sr-only">(current)</span></a>
      </li>
      
      

      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin/password');?>" >Ganti Password <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('auth/logout');?>" data-toggle="modal" data-target="#exampleModal" >Logout <span class="sr-only">(current)</span></a>
      </li>
      

    </ul>
    <form class="form-inline my-2 my-lg-0" action="<?= base_url('admin/search');?>" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Cari Data Anak/Ibu" aria-label="Search" name="keyword">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
    </form>
  </div>
</nav>