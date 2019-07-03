<!-- Jumbotron Header -->

<header class="jumbotron my-4" style="margin-bottom: 400px !important;">
	<?= $this->session->flashdata('message'); ?>
	<div class="text-center">
		
		<img width="400px" src="<?= base_url('assets/') ?>img/logo.png" class="img-fluid" alt="">
	</div>

	<p class="lead mt-4 mb-5 text-justify">Golet Umah merupakan salah satu penyedia layanan untuk menyediakan informasi tentang
		property rumah/perumahan.
		Disini juga kami juga memberikan informasi tentang daftar harga dan tipe rumah yang sesuai dengan category.
		Dan disini juga kami memberikan potongan harga jika pembelian melalui jasa kami baik pembayaran cash, kredit,
		ataupun pembayaran jangka panjang sesuai dengan kesepakatan bersama.</p>
	<div class="text-center">

		<a href="<?= base_url('register/user'); ?>" class="btn btn-primary mb-2 btn-lg">Daftar User</a>
		<a href="<?= base_url('register/pemilik'); ?>" class="btn btn-success mb-2 btn-lg">Daftar Pemilik</a>
	</div>
</header>

<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php
              $no = 0;
              foreach($header as $hd) :
            ?>
			<li data-target="#carouselExampleIndicators" data-slide-to="<?= $no; ?>"
				class="<?= ($no++ == 0) ? "active" : ""; ?>"></li>
			<?php endforeach; ?>
			<!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
		</ol>
		<div class="carousel-inner" role="listbox">
			<?php
              $noo = 0;
              foreach($header as $he) :
            ?>
			<div class="carousel-item <?= ($noo++ == 0) ? "active" : ""; ?>">
				<img class="d-block img-fluid" width="100%"
					src="<?= base_url('assets/img/uploaded/rumah/').$he['gambar']; ?>" alt="">
			</div>
			<?php endforeach; ?>

		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

<!-- Page Features -->
<div class="row text-center">
	<?php foreach($rumah as $rm): ?>
	<div class="col-lg-3 col-md-6 mb-4">
		<div class="card h-100">
			<img class="card-img-top" src="<?= base_url('assets/img/uploaded/rumah/').$rm['gambar']; ?>" alt="">
			<div class="card-body">
				<h4 class="card-title"><?= $rm['nama_rumah']; ?></h4>
				<p>Tipe : <?= $rm['tipe'];  ?></p>
				<p>Harga : <?= number_format($rm['harga'],0,',','.'); ?></p>
			</div>
			<div class="card-footer">
				<a href="" data-toggle="modal" data-target="#addModal" class="btn btn-primary">Find Out More!</a>
			</div>
		</div>
	</div>
	<?php endforeach; ?>

</div>
<?php if(empty($rumah)) : ?>
<br><br><br><br><br><br>
<?php endif; ?>