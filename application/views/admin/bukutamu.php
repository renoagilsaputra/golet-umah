<!-- Card Header  -->
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary">Buku Tamu</h6>

</div>
<!-- Card Body -->
<div class="card-body">
	<h1>Buku Tamu</h1>
	<?= $this->session->flashdata('message'); ?>

	<div class="table-responsive">

		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">ID</th>
					<th scope="col">Nama</th>
					<th scope="col">Email</th>
					<th scope="col">Pesan</th>
					
					<th class="text-center" scope="col"><i class="fa fa-cogs"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php
                    $no = 1;
                    foreach($bukutamu as $bk) :
                ?>
				<tr>
                    <td><?= $no++; ?></td>
                    <td><?= $bk['id_bukutamu']; ?></td>
                    <td><?= $bk['nama']; ?></td>
                    <td><?= $bk['email']; ?></td>
                    <td><?= $bk['pesan']; ?></td>
                    <td>
                        <a href="<?= base_url('admin/bukutamu_del/').$bk['id_bukutamu']; ?>" onclick="return confirm('Yakin?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>	
			</tbody>
		</table>
	</div>
