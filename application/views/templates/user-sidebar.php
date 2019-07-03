
    <div class="col-lg-3 per-hidden">

        <h1 class="my-4">Perumahan</h1>
        <div class="list-group">
            <?php foreach($perumahan as $pe) : ?>
            <a href="<?= base_url('user/perumahan/').$pe['slug']; ?>"
                class="list-group-item"><?= $pe ['nama_perumahan']; ?></a>
            <?php endforeach; ?>

        </div>

    </div>
    <!-- /.col-lg-3 -->