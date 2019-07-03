<!-- Card Header  -->
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary">Perumahan</h6>

</div>
<!-- Card Body -->
<div class="card-body">
	<h1>Perumahan</h1>
	<?= $this->session->flashdata('message'); ?>
	<a href="" data-toggle="modal" data-target="#addModal" class="btn btn-success mb-2"><i
			class="fas fa-pencil-alt"></i></a>
	<div class="table-responsive">

		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">ID</th>
					<th scope="col">Nama</th>
					<th scope="col">Alamat</th>
					<th scope="col">Embed</th>
					<th scope="col">Slug</th>
					<th class="text-center" scope="col"><i class="fa fa-cogs"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach($perumahan as $pr) :
				?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $pr ['id_perumahan']; ?></td>
					<td><?= $pr ['nama_perumahan']; ?></td>
					<td><?= $pr ['alamat']; ?></td>
					<td><?= substr($pr ['embed'],0, 50); ?></td>
					<td><?= $pr ['slug']; ?></td>
					<td>
							<div class="btn-group">
							
								<a onclick="return confirm('Yakin?')" href="<?= base_url('pemilik/perumahan_del/').$pr['id_perumahan']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								<a href="<?= base_url('pemilik/perumahan/edit/').$pr['id_perumahan']; ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
							</div>
					</td>
				</tr>
				<?php endforeach; ?>
				<?php if(empty($perumahan)): ?>
				<tr>
					<td colspan="8" align="center">Tidak ada data</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Perumahan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('pemilik/perumahan_add') ?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">

						<input class="form-control mb-2" type="text" name="nama_perumahan" placeholder="Nama Perumahan">
						<input class="form-control mb-2" type="text" name="alamat" placeholder="Alamat">
						<div class="row mb-2">
							<div class="col-lg-10">

								<input class="form-control mb-2" type="text" name="embed" placeholder="Embed">
							</div>
							<div class="col-lg-1">

								<a class="btn btn-success" target="_blank" href="https://www.google.com/maps/"><i
										class="fa fa-map"></i></a>
							</div>
						</div>
						<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>