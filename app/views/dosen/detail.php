<div class="container mt-5">

  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?= $data['dsn']['nama']; ?></h5>
      <h6 class="card-subtitle mb-2 text-muted"><?= $data['dsn']['nip']; ?></h6>
      <p class="card-text"><?= $data['dsn']['email']; ?></p>
      <p class="card-text"><?= $data['dsn']['jurusan']; ?></p>
      <a href="<?= BASEURL; ?>/dosen" class="card-link">Kembali</a>
    </div>
  </div>

</div>