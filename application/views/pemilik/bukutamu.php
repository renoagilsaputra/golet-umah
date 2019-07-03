<!-- Card Header  -->
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary">Bukutamu</h6>

</div>
<!-- Card Body -->
<div class="card-body">
<div class="col-lg-5">
    <?= $this->session->flashdata('message'); ?>    
    <form action="" method="post">
    <input type="hidden" name="nama" value="<?= $user['nama']; ?>">
    <input type="hidden" name="email" value="<?= $user['email']; ?>">
    <textarea name="pesan" id="" cols="30" rows="10" class="form-control" placeholder="Pesan"></textarea>
    <?= form_error('pesan', '<small class="text-danger pl-1">','</small>') ?>
    <br>
    <button type="submit" class="btn btn-info mt-4"><i class="fa fa-paper-plane"></i> Kirim</button>

    </form>
</div>
</div>