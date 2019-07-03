<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Golet Umah</title>
  <link rel="shortcut icon" href="<?= base_url('assets'); ?>/img/icon.png">
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/'); ?>css/heroic-features.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>vendor/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/css/'); ?>style.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url(); ?>">
        <img src="<?= base_url('assets'); ?>/img/icon-outline-dark.png" width="50px" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item <?= ($this->uri->segment(1) == "about") ? "active" : ""; ?>">
            <a class="nav-link" href="<?= base_url('about'); ?>">About</a>
          </li>
          
          <li class="nav-item <?= ($this->uri->segment(1) == "contact") ? "active" : ""; ?>">
            <a class="nav-link" href="<?= base_url('contact'); ?>">Contact</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="" data-toggle="modal" data-target="#addModal"><i class="fa fa-sign-in"></i> Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">