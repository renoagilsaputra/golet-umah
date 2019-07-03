<!-- Card Header  -->
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary">User</h6>

</div>
<!-- Card Body -->
<div class="card-body">
	<h1>Edit User</h1>
	<?= $this->session->flashdata('message'); ?>
	<div class="btn-group mb-2">
		<a href="<?= base_url('pemilik/user/edit/').$user['id_user']; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit User</a>
		<a href="<?= base_url('pemilik/changepassword/').$user['id_user']; ?>" class="btn btn-warning"><i class="fa fa-user-lock"></i> Ganti Password</a>
	</div>
    <br>
	<img src="<?= base_url('assets/img/uploaded/user/').$user['gambar']; ?>" class="img-fluid img-thumbnail" width="400px" alt="">
    <br><br>
	<div class="table-responsive">
		<table class="table table-hover">

			<tbody>
				<tr>
					<th>Nama</th>
					<td><?= $user['nama']; ?></td>
					
				</tr>
				<tr>
					<th>Email</th>
                    <td><?= $user['email']; ?></td>
				</tr>
				<tr>
					<th>Username</th>
                    <td><?= $user['username']; ?></td>
				</tr>
                <tr>
                    <th>Gender</th>
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
                <tr>
                    <th>Telp</th>
                    <td><?= $user['telp']; ?></td>
                </tr>
                <tr>
                    <th>Role ID</th>
                    <td>
                           <?php
                                foreach($role_id as $ri) {
                                    if($user['role_id'] == $ri['id']) {
                                        echo $ri['role_id'];
                                    }
                                }
                           ?>
                    </td>
                </tr>
			</tbody>
		</table>
	</div>
</div>