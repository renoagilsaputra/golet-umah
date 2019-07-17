<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Golet Umah</title>
	<link rel="shortcut icon" href="<?= base_url('assets/img/icon.png'); ?>">
	<!-- Bootstrap core CSS -->
	<link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?= base_url('assets/'); ?>css/shop-homepage.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>css/user.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>vendor/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>vendor/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/css/'); ?>style.css" rel="stylesheet">


</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url('user'); ?>">
				<img src="<?= base_url('assets'); ?>/img/icon-outline-dark.png" width="50px" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
				aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?= base_url('user'); ?>">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perumahan</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<?php foreach($perumahan as $pp) : ?>
							<a class="dropdown-item"
								href="<?= base_url('user/perumahan/').$pp['slug']; ?>"><?= $pp['nama_perumahan']; ?></a>
							<?php endforeach; ?>
						</div>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('user/contact'); ?>">Bukutamu</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php foreach($username as $ur) : ?>
							<?php if($this->session->userdata('id_user') == $ur['id_user']) : ?>
							<span
								class="mr-2 d-none d-lg-inline text-light small"><?= ucfirst($ur['username']); ?></span>
							<img width="20px" height="20px" class="img-profile rounded-circle"
								src="<?= base_url('assets/img/uploaded/user/').$ur['gambar']; ?>">
							<?php endif; ?>
							<?php endforeach; ?>
						</a>
						<!-- Dropdown - User Information -->
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
							aria-labelledby="userDropdown">


							<a class="dropdown-item" href="<?= base_url('user/profile'); ?>">
								<i class="fa fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
								Edit Profil
							</a>
							<a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
								<i class="fa fa-sign-out fa-sm fa-fw mr-2 text-gray-400"></i>
								Logout
							</a>
						</div>
					</li>

				</ul>
			</div>
		</div>
	</nav>

	<!-- Page Content -->
	<div class="container">
		<div class="row">