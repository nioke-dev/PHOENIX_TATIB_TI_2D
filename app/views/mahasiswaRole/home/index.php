<div class="jumbotron mt-4">
  <h1 class="display-4">Selamat Datang di Website Kami !</h1>
  <p class="lead">Halo, nama saya <?php foreach ($data['nama'] as $nama) : ?>
      <?= $nama; ?>
    <?php endforeach; ?></p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>