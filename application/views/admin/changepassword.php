<!-- Card Header  -->
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary">Ubah Password</h6>

</div>
<!-- Card Body -->
<div class="card-body">
<div class="col-lg-5">
    <?= $this->session->flashdata('message'); ?>    
    <form action="" method="post">
    <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
    <input class="form-control mb-2 mt-3" type="password" name="password_lama" placeholder="Password Lama">
    <?= form_error('password_lama', '<small class="text-danger pl-1">','</small>'); ?>
    <input class="form-control mb-2 mt-3" type="password" name="password1" placeholder="Password Baru">
    <?= form_error('password1', '<small class="text-danger pl-1">','</small>') ?>
    <input class="form-control mb-2 mt-3" type="password" name="password2" placeholder="Ulangi Password Baru">
    <?= form_error('password2', '<small class="text-danger pl-1">','</small>') ?>
    <br>
    <button type="submit" class="btn btn-info mt-4"><i class="fa fa-edit"></i> Edit</button>

    </form>
</div>
</div>