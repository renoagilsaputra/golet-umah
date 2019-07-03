  <!-- Jumbotron Header -->
  <header class="jumbotron my-4 mb-5">
  <div class="text-center">
        <img src="<?= base_url('assets/img/logo.png'); ?>" class="img-fluid" width="400px" alt="">
    </div>
  	<div class="col-lg-12">
  		<h1 class="mb-4 text-center">Register</h1>
  		<?= $this->session->flashdata('message'); ?>
  		<form action="" method="post" enctype="multipart/form-data">
  			<input type="text" class="form-control mb-2" name="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
  			<?= form_error('nama', '<small class="text-danger pl-1">','</small>'); ?>
  			<input type="text" class="form-control mt-2 mb-2" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
  			<?= form_error('email', '<small class="text-danger pl-1">','</small>'); ?>
  			<input type="text" class="form-control mt-2 mb-2" name="username" placeholder="Username" value="<?= set_value('email'); ?>">
  			<?= form_error('username', '<small class="text-danger pl-1">','</small>'); ?>
  			<div class="row">
  				<div class="col-lg-6">
  					<input type="password" name="password1" class="form-control mb-2" placeholder="Password" value="<?= set_value('password1'); ?>">
  					<?= form_error('password1', '<small class="text-danger pl-1">','</small>'); ?>
  				</div>
  				<div class="col-lg-6">
  					<input type="password" name="password2" class="form-control mb-2" placeholder="Ulangi Password" value="<?= set_value('password2'); ?>">
  					<?= form_error('password2', '<small class="text-danger pl-1">','</small>'); ?>
  				</div>
  			</div>
              <label>Pilih Gender</label>
  			<select name="gender" class="form-control">
  				<option></option>
  				<option value="l">Laki - laki</option>
  				<option value="p">Perempuan</option>
  			</select>
  			<?= form_error('gender', '<small class="text-danger pl-1">','</small>'); ?>
  			<input type="number" class="form-control mt-2 mb-2" name="telp" placeholder="Telp" value="<?= set_value('telp'); ?>">
  			<?= form_error('telp', '<small class="text-danger pl-1">','</small>'); ?>
            <br>
  			<label>Foto Profil</label>

  			<img id="image-preview" alt="image preview" class="img-thumbnail" />
  			<br />
  			<input type="file" class="form-control mb-2" name="gambar" id="image-source" onchange="previewImage();" />
              <?= form_error('gambar', '<small class="text-danger pl-1">','</small>'); ?>
  			<button type="submit" class="btn btn-primary mt-4 btn-lg btn-block"><i class="fa fa-pencil"></i>
  				Daftar</button>
  		</form>
  	</div>
  </header>