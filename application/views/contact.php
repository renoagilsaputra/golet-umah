  <!-- Jumbotron Header -->
  <header class="jumbotron my-4 mb-5">
    <div class="text-center">
        <img src="<?= base_url('assets/img/logo.png'); ?>" class="img-fluid" width="400px" alt="">
    </div>

    <div class="col-lg-12">
      <h1 class="mb-4 text-center">Kontak</h1>
      <?= $this->session->flashdata('message'); ?>
      <form action="" method="post">
        <input type="text" class="form-control mb-2" name="nama" placeholder="Nama" id="">
        <?= form_error('nama', '<small class="text-danger pl-1">','</small>'); ?>
        <input type="text" class="form-control mt-2 mb-2" name="email" placeholder="Email" id="">
        <?= form_error('email', '<small class="text-danger pl-1">','</small>'); ?>
        <textarea class="form-control mt-2 mb-2" name="pesan" placeholder="Pesan" id="" cols="30" rows="10"></textarea>
        <?= form_error('pesan', '<small class="text-danger pl-1">','</small>'); ?>
        <button type="submit" class="btn btn-primary mt-2 btn-lg btn-block"><i class="fa fa-paper-plane"></i> Kirim</button>
      </form>
    </div>
  </header>