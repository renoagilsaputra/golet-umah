<!-- Card Header  -->
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary">Edit User</h6>

</div>
<!-- Card Body -->
<div class="card-body">
    <h1>Edit User</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="col-lg-5">
        
        <form action="<?= base_url('admin/user_edit_act'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
            <input class="form-control mb-2" type="text" name="nama" placeholder="Nama" value="<?= $user['nama']; ?>">
            <?= form_error('nama', '<small class="text-danger pl-1">','</small>'); ?>
            <input class="form-control mb-2" type="text" name="email" placeholder="Email" value="<?= $user['email']; ?>">
            <?= form_error('email', '<small class="text-danger pl-1">','</small>'); ?>
            <input class="form-control mb-2" type="text" name="username" placeholder="Username" value="<?= $user['username']; ?>">
            <?= form_error('username', '<small class="text-danger pl-1">','</small>'); ?>
            <select class="form-control mb-2" name="gender">
                        <option value="">Pilih Gender</option>
                        <?php foreach($gender as $gd) : ?>
                        <?php if($user['gender'] == $gd) : ?>

                            <option value="<?= $gd ?>" selected><?= ($gd == 'l') ? "Laki - laki" : "Perempuan"; ?></option>
                        <?php else: ?>
                            <option value="<?= $gd ?>"><?= ($gd == 'l') ? "Laki - laki" : "Perempuan"; ?></option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        
                        
                    </select>
            <?= form_error('gender', '<small class="text-danger pl-1">','</small>'); ?>
            <input class="form-control mb-2" type="text" name="telp" placeholder="Telp" value="<?= $user['telp']; ?>">
            <?= form_error('telp', '<small class="text-danger pl-1">','</small>'); ?>
            <select class="form-control mb-2" name="role_id">
                <option value="">Pilih Role ID</option>
                <?php foreach($role_id as $rl) : ?>
                <?php if($user['role_id'] == $rl['id']) : ?>

                <option value="<?= $rl ['id']; ?>" selected><?= ucfirst($rl['role_id']); ?></option>
                <?php else: ?>
                <option value="<?= $rl ['id']; ?>"><?= ucfirst($rl['role_id']); ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <?= form_error('role_id', '<small class="text-danger pl-1">','</small>'); ?>
            <label>Pilih Gambar</label>
		
            <img id="image-preview" alt="image preview" class="img-thumbnail"/>
            <br/>
            <input type="file" class="form-control mb-2" name="gambar" id="image-source" onchange="previewImage();"/>
            
            <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>     
        </form>


    </div>
</div>