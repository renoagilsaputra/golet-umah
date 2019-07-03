<!-- Card Header  -->
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary">Rumah</h6>

</div>
<!-- Card Body -->
<div class="card-body">
	<h1>Rumah</h1>
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
					<th scope="col">Tipe</th>
					<th scope="col">Ukuran</th>
					<th scope="col">Keterangan</th>
					<th scope="col">Harga</th>
					<th scope="col">Gambar</th>
					<th scope="col">ID Perumahan</th>
					<th scope="col">Perumahan</th>
					<th class="text-center" scope="col"><i class="fa fa-cogs"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach($rumah as $rm) :
				?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $rm['id_rumah']; ?></td>
					<td><?= $rm['nama_rumah']; ?></td>
					<td><?= $rm['tipe']; ?></td>
					<td><?= $rm['ukuran']; ?></td>
					<td><?= $rm['keterangan']; ?></td>
					<td>Rp <?= number_format($rm['harga'],0,',','.'); ?></td>
					<td>
						<img width="100px" height="100px" src="<?= base_url('assets/img/uploaded/rumah/').$rm['gambar']; ?>" alt="">
					</td>
					<td><?= $rm['id_perumahan'];  ?></td>
					<td>
						<?php
							foreach($perumahan as $pr) {
								if($rm['id_perumahan'] == $pr['id_perumahan']) {
									echo ucfirst($pr ['nama_perumahan']);
								}
							}
						?>
					</td>
					<td>
							<div class="btn-group">
							
							<a href="<?= base_url('pemilik/rumah_del/').$rm ['id_rumah']; ?>" onclick="return confirm('Yakin?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							<a href="<?= base_url('pemilik/rumah/edit/').$rm ['id_rumah']; ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
							</div>
					</td>
				</tr>
				<?php endforeach; ?>
				<?php if(empty($rumah)) : ?>
				<tr>
					<td colspan="11" align="center">Data tidak ditemukan</td>
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
					<h5 class="modal-title" id="exampleModalLabel">Tambah Rumah</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('pemilik/rumah_add') ?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">

						<input class="form-control mb-2" type="text" name="nama_rumah" placeholder="Nama Rumah">
						<input class="form-control mb-2" type="text" name="tipe" placeholder="Tipe">
						<input class="form-control" type="text" name="ukuran" placeholder="Ukuran">
						<small class="text text-danger">*)Ukuran dalam meter. Contoh inputan 3x3</small>
						<textarea class="form-control mb-2" name="keterangan" placeholder="Keterangan"></textarea>
						<input class="form-control mb-2" type="number" name="harga" placeholder="Harga">
						<label>Pilih Gambar</label>

						<img id="image-preview" alt="image preview" class="img-thumbnail" />
						<br />
						<input type="file" class="form-control mb-2" name="gambar" id="image-source"
							onchange="previewImage();" />
						<select class="form-control mb-2" name="id_perumahan">
							<option value="">Pilih Perumahan</option>
							<?php foreach($perumahan as $rl) : ?>
							<option value="<?= $rl ['id_perumahan']; ?>"><?= ucfirst($rl['nama_perumahan']); ?></option>
							<?php endforeach; ?>
						</select>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>