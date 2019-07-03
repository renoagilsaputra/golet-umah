<!-- Card Header  -->
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary">Edit Rumah</h6>

</div>
<!-- Card Body -->
<div class="card-body">
	<div class="col-lg-5">
		<h1>Edit Rumah</h1>
		<?= $this->session->flashdata('message'); ?>
		<form action="<?= base_url('admin/rumah_edit_act') ?>" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id_rumah" value="<?= $rumah['id_rumah']; ?>">
            <label>Nama Rumah</label>
			<input class="form-control mb-2" type="text" name="nama_rumah" placeholder="Nama Perumahan" value="<?= $rumah['nama_rumah']; ?>">
            <?= form_error('nama_rumah', '<small class="text-danger pl-1">','</small>'); ?>
            <label>Tipe</label>
			<input class="form-control mb-2" type="text" name="tipe" placeholder="Tipe" value="<?= $rumah['tipe']; ?>">
            <?= form_error('tipe', '<small class="text-danger pl-1">','</small>'); ?>
            <label>Ukuran</label>
			<input class="form-control" type="text" name="ukuran" placeholder="Ukuran" value="<?= $rumah['ukuran']; ?>">
			<small class="text text-danger">*)Ukuran dalam meter. Contoh inputan 3x3</small>
            <?= form_error('ukuran', '<small class="text-danger pl-1">','</small>'); ?>
            <br>
            <label>Keterangan</label>
			<textarea class="form-control mb-2" name="keterangan" placeholder="Keterangan"><?= $rumah['keterangan']; ?></textarea>
            <label>Harga</label>
			<input class="form-control mb-2" type="number" name="harga" placeholder="Harga" value="<?= $rumah['harga']; ?>">
            <?= form_error('harga', '<small class="text-danger pl-1">','</small>'); ?>
			<label>Pilih Gambar</label>

			<img id="image-preview" alt="image preview" class="img-thumbnail" />
			<br />
			<input type="file" class="form-control mb-2" name="gambar" id="image-source" onchange="previewImage();" />
			<select class="form-control mb-2" name="id_perumahan">
				<option value="">Pilih Perumahan</option>
				<?php foreach($perumahan as $rl) : ?>
                    <?php if($rumah['id_perumahan'] == $rl['id_perumahan']): ?>
                        <option value="<?= $rl ['id_perumahan']; ?>" selected><?= ucfirst($rl['nama_perumahan']); ?></option>
                    <?php else: ?>
                        <option value="<?= $rl ['id_perumahan']; ?>"><?= ucfirst($rl['nama_perumahan']); ?></option>
                    <?php endif; ?>
				<?php endforeach; ?>
			</select>
            <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i></button>
		</form>
	</div>
</div>