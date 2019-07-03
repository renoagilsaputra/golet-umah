<!-- Card Header  -->
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary">User</h6>

</div>
<!-- Card Body -->
<div class="card-body">
	<h1>User</h1>
	<?= $this->session->flashdata('message'); ?>
	<a href="" data-toggle="modal" data-target="#addModal" class="btn btn-success mb-2"><i
			class="fas fa-pencil-alt"></i></a>
	<div class="table-responsive">

		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">ID_User</th>
					<th scope="col">Nama</th>
					<th scope="col">Email</th>
					<th scope="col">Username</th>
					<th scope="col">Gender</th>
					<th scope="col">Telp</th>
					<th scope="col">Role ID</th>
					<th scope="col">Gambar</th>
					<th class="text-center" scope="col"><i class="fa fa-cogs"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach($user as $us) :
				?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $us['id_user']; ?></td>
					<td><?= $us['nama']; ?></td>
					<td><?= $us['email']; ?></td>
					<td><?= $us['username']; ?></td>
					<td><?= $us['gender']; ?></td>
					<td><?= $us['telp']; ?></td>
					<td>
						<?php
							foreach($role_id as $rl) {
								if($us['role_id'] == $rl['id']) {
									echo ucfirst($rl['role_id']);
								}
							}
						?>
					</td>
					<td>
						<img width="100px" height="100px"
							src="<?= base_url('assets/img/uploaded/user/').$us['gambar']; ?>" alt="">
					</td>
					<td align="center">
						<div class="btn-group">
						
						<a onclick="return confirm('Yakin?')" href="<?= base_url('admin/user_del/').$us['id_user']; ?>"
							class="btn btn-danger"><i class="fa fa-trash"></i></a>
						<a href="<?= base_url('admin/user/edit/').$us['id_user']; ?>" class="btn btn-info"><i
								class="fa fa-edit"></i></a>
						<a href="<?= base_url('admin/user/changepassword/').$us['id_user']; ?>"
							class="btn btn-warning"><i class="fa fa-user-lock"></i></a>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
				<?php if(empty($user)) : ?>
				<tr>
					<td colspan="9" align="center">Tidak ada data</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/user_add') ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">

					<input class="form-control mb-2" type="text" name="nama" placeholder="Nama">
					<input class="form-control mb-2" type="text" name="email" placeholder="Email">
					<input class="form-control mb-2" type="text" name="username" placeholder="Username">
					<select class="form-control mb-2" name="gender">
						<option value="">Pilih Gender</option>

						<option value="l">Laki - laki</option>
						<option value="p">Perempuan</option>

					</select>
					<input class="form-control mb-2" type="text" name="telp" placeholder="Telp">
					<div class="row mb-2">
						<div class="col-lg-6">
							<input class="form-control mb-2" type="password" name="password1" placeholder="Password">
						</div>
						<div class="col-lg-6">
							<input class="form-control mb-2" type="password" name="password2"
								placeholder="Ulangi Password">
						</div>
					</div>
					<select class="form-control mb-2" name="role_id">
						<option value="">Pilih Role ID</option>
						<?php foreach($role_id as $rl) : ?>
						<option value="<?= $rl ['id']; ?>"><?= ucfirst($rl['role_id']); ?></option>
						<?php endforeach; ?>
					</select>
					<label>Pilih Gambar</label>

					<img id="image-preview" alt="image preview" class="img-thumbnail" />
					<br />
					<input type="file" class="form-control mb-2" name="gambar" id="image-source"
						onchange="previewImage();" />

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>