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
    <h1 class="display-4"><a href="<?= base_url('guest')?>" class="text-decoration-none">Program Imunisasi</a></h1>
    <p class="lead"><?= $user ;?></p>
  </div>
</div>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="<?= base_url('guest');?>">Beranda</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('auth/logout');?>" data-toggle="modal" data-target="#exampleModal" >Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    
  </div>
</nav>