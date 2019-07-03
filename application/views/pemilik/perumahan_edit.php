<!-- Card Header  -->
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary">Edit Perumahan</h6>

</div>
<!-- Card Body -->
<div class="card-body">
	<h1>Edit Perumahan</h1>
	<?= $this->session->flashdata('message'); ?>
	<div class="col-lg-5">

		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id_perumahan" value="<?= $perumahan['id_perumahan']; ?>">
			<label>Nama</label>
			<input class="form-control mb-2" type="text" name="nama_perumahan" placeholder="Nama"
				value="<?= $perumahan['nama_perumahan']; ?>">
			<?= form_error('nama_perumahan', '<small class="text-danger pl-1">','</small>'); ?>
			<br>
			<label>Alamat</label>
			<input class="form-control mb-2" type="text" name="alamat" placeholder="Alamat"
				value="<?= $perumahan['alamat']; ?>">
			<?= form_error('alamat', '<small class="text-danger pl-1">','</small>'); ?>
			<br>
			<label>Embed</label>
			<div class="row">
				<div class="col-lg-10">

					<input class="form-control mb-2" type="text" name="embed" placeholder="Embed"
						value="<?= $perumahan['embed']; ?>">
				</div>
				<div class="col-lg-1">
					<a class="btn btn-success" target="_blank" href="https://www.google.com/maps/"><i
							class="fa fa-map"></i></a>
				</div>
			</div>

			<?= form_error('embed', '<small class="text-danger pl-1">','</small>'); ?>
			<br>
			<input type="hidden" name="id_user" value="<?= $perumahan['id_user']; ?>">


			<button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
		</form>


	</div>
</div>