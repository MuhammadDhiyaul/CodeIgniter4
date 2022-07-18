<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
          <h1 class="mt-2">Daftar Buku</h1>
          <a href="/buku/create" class="btn btn-primary mb-3">Tambah Data Buku</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Sampul</th>
                <th scope="col">Judul</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach($buku as $buku) : ?>
                <tr>
                  <th scope="row"><?= $no++;?></th>
                  <td><img src="/img/<?= $buku['sampul']; ?>" alt="" class="sampul"></td>
                  <td><?= $buku['judul']; ?></td>
                  <td><a href="/buku/<?= $buku['slug']; ?>" class="btn btn-success">Detail</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>