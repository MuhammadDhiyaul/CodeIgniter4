<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row" align="center">
        <div class="col">
            <h2 class="mt-3">Detail Buku</h2>
            <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/img/<?= $buku['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $buku['judul']; ?></h5>
                        <p class="card-text">Penulis : <?= $buku['penulis']; ?></p>
                        <p class="card-text"><small class="text-muted">Penerbit : <?= $buku['penerbit']; ?></small></p>

                        <a href="" class="btn btn-warning">Edit</a>
                        <a href=""class="btn btn-danger">Hapus</a>
                        <a href="/buku" class="btn btn-secondary">Kembali ke daftar buku !</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>