<h1 class="mb-5">Dashboard Mahasiswa</h1>
<div class="row">
  <div class="col">
    <div class="card shadow" style="border-width: 7px; border-color: #FA896B">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-2">
            <div class="d-flex align-items-center">
              <i class="bi bi-exclamation-triangle text-danger" style="font-size: 50px;"></i>
            </div>
          </div>
          <div class="col-6">
            <h5 class="card-title">Pelanggaran</h5>
            <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countPelanggaran']; ?></h6>
          </div>
          <div class="col-4">
            <button class="btn btn-primary d-flex align-items-center">
              <i class="bi bi-eye me-2"></i>
              <a href="<?= BASEURL; ?>/MahasiswaControllers/pelanggaran" style="text-decoration: none; color: white;">
                Tampilkan
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card shadow" style="border-width: 7px; border-color: #FFAE1F;">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-2">
            <div class="d-flex align-items-center">
              <i class="bi bi-chat-left-text text-warning" style="font-size: 50px;"></i>
            </div>
          </div>
          <div class="col-6">
            <h5 class="card-title">Banding</h5>
            <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countBanding']; ?></h6>
          </div>
          <div class="col-4">
            <button class="btn btn-primary d-flex align-items-center">
              <i class="bi bi-eye me-2"></i>
              <a href="<?= BASEURL; ?>/MahasiswaControllers/banding" style="text-decoration: none; color: white;">
                Tampilkan
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>