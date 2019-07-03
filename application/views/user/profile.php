<div class="col-lg-12" style="margin-bottom: 400px">
    <h1 class="my-4">Profile</h1>
    <?= $this->session->flashdata('message'); ?>
	<div class="btn-group mb-2">
		<a href="<?= base_url('user/profile/edit/').$user['id_user']; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit Profile</a>
		<a href="<?= base_url('user/changepassword/').$user['id_user']; ?>" class="btn btn-warning"><i class="fa fa-lock"></i> Ganti Password</a>
	</div>
    <br>
    <img width="400px" src="<?= base_url('assets/img/uploaded/user/').$user['gambar']; ?>" class="img-fluid img-thumbnail" alt="">
    <br><br>
    <table class="table table-hover">  
        <tr>
            <th>Nama</th>
            <td>:</td>
            <td><?= $user['nama']; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td>:</td>
            <td><?= $user['email']; ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td>:</td>
            <td><?= $user['username']; ?></td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>:</td>
            <td>
            <?php
                if($user['gender'] == 'l') {
                    echo "Laki -laki";
                } else {
                    echo "Perempuan";
                }
            ?>
            </td>
        </tr>
    </table>
</div>