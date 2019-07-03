<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GU | Pemilik</title>
  <link rel="shortcut icon" href="<?= base_url('assets/img/icon.png'); ?>">
  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/vendor/sb-admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/vendor/sb-admin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/css/'); ?>style.css" rel="stylesheet">
  
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('pemilik'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Golet Umah</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('pemilik'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('pemilik/perumahan'); ?>">
          <i class="fas fa-fw fa-igloo"></i>
          <span>Perumahan</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('pemilik/rumah'); ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Rumah</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('pemilik/bukutamu') ?>">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Buku Tamu</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('pemilik/user'); ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Edit Profile</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">

    


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

     

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          

           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php foreach($username as $ur) : ?>
                  <?php if($this->session->userdata('id_user') == $ur['id_user']) : ?>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= ucfirst($ur['username']); ?></span>
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/uploaded/user/').$ur['gambar']; ?>">
                  <?php endif; ?>
                <?php endforeach; ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               
               
                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
           
          </div>

          <!-- Content Row -->
          <div class="row">

         
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
