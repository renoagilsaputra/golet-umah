<div class="col-lg-12" style="margin-bottom: 400px">
    <h1 class="my-4">Bukutamu</h1>
    <?= $this->session->flashdata('message'); ?>
    <form action="" method="post">
        <input type="hidden" name="nama" value="<?= $user['nama']; ?>">
        <input type="hidden" name="email" value="<?= $user['email']; ?>">
        <textarea name="pesan" class="form-control mb-2" cols="30" rows="10" placeholder="Pesan"></textarea>
        <?= form_error('pesan', '<small class="text-danger pl-1">','</small>') ?>
        <br>
        <button type="submit" class="btn btn-block btn-lg btn-primary"><i class="fa fa-paper-plane"></i> Kirim</button>
    </form>
</div>