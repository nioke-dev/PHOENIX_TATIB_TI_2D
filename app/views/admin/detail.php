<div class="container mt-5">

  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?= $data['adm']['nama']; ?></h5>
      <h6 class="card-subtitle mb-2 text-muted"><?= $data['adm']['nip']; ?></h6>
      <p class="card-text"><?= $data['adm']['email']; ?></p>
      
      <a href="<?= BASEURL; ?>/admin" class="card-link">Kembali</a>
    </div>
  </div>

</div>