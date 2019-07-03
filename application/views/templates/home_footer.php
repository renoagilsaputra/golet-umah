</div>
<!-- /.container -->


<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('auth'); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">

					<input class="form-control mb-2" type="text" name="username" placeholder="Username">
					<input class="form-control mb-2" type="password" name="password" placeholder="Password">

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-block btn-outline-primary mb-2"><i class="fa fa-sign-in"></i>
						Login</button>

				</div>
			</form>
		</div>
	</div>
</div>


<!-- Footer -->
<footer class="py-5 bg-dark">
	<div class="container">
		<p class="m-0 text-center text-white">Copyright &copy; GoletUmah <?= date('Y'); ?></p>
	</div>
	<!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?= base_url('assets/js/'); ?>script.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>