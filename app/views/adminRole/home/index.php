<h1 class="mb-5">Dashboard Admin</h1>
<!-- Mahasiswa -->
<div class="row">
  <div class="col">
    <div class="card shadow" style="border-width: 7px; border-color: #FA896B;">
      <div style="background-color: #FA896B">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-2">
              <div class="d-flex align-items-center">
                <i class="bi bi-people-fill text-light" style="font-size: 50px;"></i>
              </div>
            </div>
            <div class="col-6">
              <h2 class="text-light">Mahasiswa</h2>
              <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countMahasiswa']; ?></h6>
            </div>
            <div class="col-4">
              <button class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-eye me-2"></i>
                <a href="<?= BASEURL; ?>/AdminControllers/mahasiswa" style="text-decoration: none; color: white;">
                  Tampilkan
                </a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- dosen -->
  <div class="col">
    <div class="card shadow" style="border-width: 7px; border-color: #FFAE1F;">
      <div style="background-color: #FFAE1F">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-2">
              <div class="d-flex align-items-center">
                <i class="bi bi-person-lines-fill text-light" style="font-size: 50px;"></i>
              </div>
            </div>
            <div class="col-6">
              <h2 class="text-light">Dosen</h2>
              <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countDosen']; ?></h6>
            </div>
            <div class="col-4">
              <button class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-eye me-2"></i>
                <a href="<?= BASEURL; ?>/AdminControllers/dosen" style="text-decoration: none; color: white;">
                  Tampilkan
                </a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- DPA -->
  <div class="col">
    <div class="card shadow" style="border-width: 7px; border-color: #13DEB9;">
      <div style="background-color: #13DEB9">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-2">
              <div class="d-flex align-items-center">
                <i class="bi bi-person-fill text-light" style="font-size: 50px;"></i>
              </div>
            </div>
            <div class="col-6">
              <h2 class="text-light">DPA</h2>
              <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countDpa']; ?></h6>
            </div>
            <div class="col-4">
              <button class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-eye me-2"></i>
                <a href="<?= BASEURL; ?>/AdminControllers/dpa" style="text-decoration: none; color: white;">
                  Tampilkan
                </a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Admin -->
  <div class="col">
    <div class="card shadow" style="border-width: 7px; border-color: #49BEFF;">
      <div style="background-color: #49BEFF">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-2">
              <div class="d-flex align-items-center">
                <i class="bi bi-emoji-laughing-fill text-light" style="font-size: 50px;"></i>
              </div>
            </div>
            <div class="col-6">
              <h2 class="text-light">Admin</h2>
              <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countAdmin']; ?></h6>
            </div>
            <div class="col-4">
              <button class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-eye me-2"></i>
                <a href="<?= BASEURL; ?>/AdminControllers/admin" style="text-decoration: none; color: white;">
                  Tampilkan
                </a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<br><br>

<!-- Menu Pelanggaran, banding, tatib, laporan -->
<div class="row">
  <!-- Mahasiswa Melanggar -->
  <div class="col">
    <div class="card shadow" style="border-width: 7px; border-color: #FA896B;">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-2">
            <div class="d-flex align-items-center">
              <i class="bi bi-exclamation-triangle text-danger" style="font-size: 50px;"></i>
            </div>
          </div>
          <div class="col-6">
            <h3>Mahasiswa Melanggar</h3>
            <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countMahasiswaMelanggar']; ?></h6>
          </div>
          <div class="col-4">
            <button class="btn btn-primary d-flex align-items-center">
              <i class="bi bi-eye me-2"></i>
              <a href="<?= BASEURL; ?>/AdminControllers/mahasiswaMelanggar" style="text-decoration: none; color: white;">
                Tampilkan
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
          <div class="col-6">
            <h3>Banding</h3>
            <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countBanding']; ?></h6>
          </div>
          <div class="col-4">
            <button class="btn btn-primary d-flex align-items-center">
              <i class="bi bi-eye me-2"></i>
              <a href="<?= BASEURL; ?>/AdminControllers/banding" style="text-decoration: none; color: white;">
                Tampilkan
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
          <div class="col-6">
            <h3>Daftar Laporan</h3>
            <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countLaporan']; ?></h6>
          </div>
          <div class="col-4">
            <button class="btn btn-primary d-flex align-items-center">
              <i class="bi bi-eye me-2"></i>
              <a href="<?= BASEURL; ?>/AdminControllers/laporan" style="text-decoration: none; color: white;">
                Tampilkan
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Tata Tertib -->
  <div class="col">
    <div class="card shadow" style="border-width: 7px; border-color: #49BEFF;">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-2">
            <div class="d-flex align-items-center">
              <i class="bi bi-book text-info" style="font-size: 50px;"></i>
            </div>
          </div>
          <div class="col-6">
            <h3>Tata Tertib</h3>
            <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countTatib']; ?></h6>
          </div>
          <div class="col-4">
            <button class="btn btn-primary d-flex align-items-center">
              <i class="bi bi-eye me-2"></i>
              <a href="<?= BASEURL; ?>/AdminControllers/tatib" style="text-decoration: none; color: white;">
                Tampilkan
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<br><br>