<!-- Card Header  -->
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary">Activity Log</h6>

</div>
<!-- Card Body -->
<div class="card-body">
	<h1>Activity Log</h1>
	<?= $this->session->flashdata('message'); ?>

	<div class="table-responsive">

		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">ID</th>
					<th scope="col">ID Pemilik</th>
					<th scope="col">Pemilik</th>
					<th scope="col">ID Rumah</th>
					<th scope="col">Rumah</th>
					<th scope="col">ID Perumahan</th>
					<th scope="col">Perumahan</th>
					<th scope="col">ID User</th>
					<th scope="col">User</th>
					<th scope="col">Waktu</th>
					
					<th class="text-center" scope="col"><i class="fa fa-cogs"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach($activity as $ac) :
				?>
				<tr>
                    <td><?= $no++; ?></td>
                    <td><?= $ac['id_al']; ?></td>
                    <td><?= $ac['id_pemilik']; ?></td>
                    <td>
						<?php
							foreach($pemilik as $pm) {
								if($pm['id_user'] == $ac['id_pemilik']) {
									echo $pm['nama'];
								}
							}
						?>
					</td>
                    <td><?= $ac['id_rumah']; ?></td>
					<td>
					<?php
							foreach($rumah as $rm) {
								if($rm['id_rumah'] == $ac['id_rumah']) {
									echo $rm['nama_rumah'];
								}
							}
						?>
					</td>
                    <td><?= $ac['id_perumahan'];  ?></td>
                    <td>
					<?php
							foreach($perumahan as $pr) {
								if($pr['id_perumahan'] == $ac['id_perumahan']) {
									echo $pr['nama_perumahan'];
								}
							}
						?>
					</td>
                    <td><?= $ac['id_user']; ?></td>
                    <td>
					<?php
							foreach($user as $us) {
								if($us['id_user'] == $ac['id_user']) {
									echo $us['nama'];
								}
							}
						?>
					</td>
                    <td><?= $ac['waktu']; ?></td>
					<td>
						<a href="<?= base_url('admin/actl_del/').$ac['id_al']; ?>" onclick="return confirm('Yakin?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
					</td>
                </tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
