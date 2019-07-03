<div class="col-lg-9">
    <h1 class="my-4">Perumahan</h1>
	<table>
        <tr>
            <th>Nama Perumahan</th>
            <td>:</td>
            <td><?= $perum['nama_perumahan']; ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>:</td>
            <td><?= $perum['alamat']; ?></td>
        </tr>
        <tr>
            <th>Pemilik</th>
            <td>:</td>
            <td><?= $perum['nama']; ?></td>
        </tr>
        <tr>
            <th>WA</th>
            <td>:</td>
            <td><?= $perum['telp']; ?></td>
        </tr>
    </table>
    <div class="text-center mt-4">
        <a target="_blank" href="<?= $perum['embed']; ?>" class="btn btn-success"><i class="fa fa-map"></i></a>
        <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= $perum['telp'] ?>&text=[GOLET-UMAH]%0AHay saya mau bertanya" class="btn btn-info"><i class="fa fa-phone"></i></a>
        
    </div>
	<h1 class="my-4">Rumah</h1>
	<form action="" method="post" enctype="multipart/form-data">

	<div class="input-group mb-3">
		
		<input type="text" name="keyword" class="form-control" placeholder="Search">
		<div class="input-group-append">
			<button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
		</div>
	</div>
	</form>
	<div class="row">

		<?php
              foreach($rumah as $rm) :
            ?>
		<div class="col-lg-4 col-md-6 mb-4">
			<div class="card h-100">
				<a href="" data-toggle="modal" data-target="#myModal<?= $rm['id_rumah']; ?>">
					<img class="card-img-top" src="<?= base_url('assets/img/uploaded/rumah/').$rm['gbr_rumah']; ?>"
						alt="">
				</a>
				<div class="card-body">
					<h4 class="card-title">
						<a href="" data-toggle="modal"
							data-target="#myModal<?= $rm['id_rumah']; ?>"><?= $rm['nama_rumah']; ?></a>
					</h4>
					<h5>Rp <?= number_format($rm ['harga'],0,',','.') ?></h5>
					<p class="card-text"><?= $rm ['keterangan']; ?></p>
				</div>
				<div class="card-footer text-center">
					<a target="_blank" href="<?= $rm['embed']; ?>" class="btn btn-success"><i class="fa fa-map"></i></a>
					<a target="_blank"
						href="<?= base_url('user/send/transaksi/').$rm['id_user'].'/'.$rm['id_rumah'].'/'.$rm['id_perumahan'].'/'.$this->session->userdata('id_user'); ?>"
						class="btn btn-primary"><i class="fa fa-paper-plane"></i></a>
				</div>
			</div>

		</div>
		<?php endforeach; ?>
		<?php if(empty($rumah)) : ?>
			<div class="mx-auto" style="margin-bottom: 500px">
			
			<h1>Data Tidak ditemukan</h1>
			</div>
			
		<?php endif; ?>


	</div>
	<!-- /.row -->

</div>
<!-- /.col-lg-9 -->


<!-- Modal -->
<?php foreach($rumah as $rr) : ?>
<div class="modal fade" id="myModal<?= $rr['id_rumah'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><?= $rr['nama_rumah']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>


			</div>
			<form role="form" action="<?= base_url('register') ?>" method="POST">
				<div class="modal-body">
					<img src="<?= base_url('assets/img/uploaded/rumah/').$rr['gbr_rumah']; ?>" alt=""
						class="img-thumbnail">


					<table class="mt-3">

						<tr>
							<th>Tipe</th>
							<td>:</td>
							<td><?= $rr['tipe']; ?></td>
						</tr>
						<tr>
							<th>Ukuran</th>
							<td>:</td>
							<td><?= $rr['ukuran']; ?></td>
						</tr>
						<tr>
							<th>Harga</th>
							<td>:</td>
							<td>Rp <?= number_format($rr['harga'],0,',','.') ?></td>
						</tr>
						<tr>
							<th>Perumahan</th>
							<td>:</td>
							<td><?= $rr['nama_perumahan']; ?></td>
						</tr>
					</table>
					<p class="font-weight-bold">Keterangan</p>
					<p><?= $rr['keterangan']; ?></p>

				</div>
				<div class="modal-footer">
					<a target="_blank" href="<?= $rr['embed']; ?>" class="btn btn-success"><i class="fa fa-map"></i></a>
					<a target="_blank"
						href="<?= base_url('user/send/transaksi/').$rr['id_user'].'/'.$rr['id_rumah'].'/'.$rr['id_perumahan'].'/'.$this->session->userdata('id_user'); ?>"
						class="btn btn-primary"><i class="fa fa-paper-plane"></i></a>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>