<h1 class="mb-5">Dashboard Dosen</h1>

<!-- Menu Laporan dan banding -->
<div class="row">
  <!-- Daftar Laporan -->
  <div class="col">
    <div class="card shadow" style="border-width: 7px; border-color: #13DEB9;">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-2">
            <div class="d-flex align-items-center">
              <i class="bi bi-list-task text-success" style="font-size: 50px;"></i>
            </div>
          </div>
          <div class="col-7">
            <h3>Daftar Laporan</h3>
            <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countLaporan']; ?></h6>
          </div>
          <div class="col-3">
            <button class="btn btn-primary d-flex align-items-center">
              <i class="bi bi-eye me-2"></i>
              <a href="<?= BASEURL; ?>/AdminControllers/laporan" style="text-decoration: none; color: white;">
                show
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Banding -->
  <div class="col">
    <div class="card shadow" style="border-width: 7px; border-color: #FFAE1F;">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-2">
            <div class="d-flex align-items-center">
              <i class="bi bi-chat-left-text text-warning" style="font-size: 50px;"></i>
            </div>
          </div>
          <div class="col-7">
            <h3>Banding</h3>
            <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countBanding']; ?></h6>
          </div>
          <div class="col-3">
            <button class="btn btn-primary d-flex align-items-center">
              <i class="bi bi-eye me-2"></i>
              <a href="<?= BASEURL; ?>/AdminControllers/banding" style="text-decoration: none; color: white;">
                show
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>