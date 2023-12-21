<h1 class="mb-5">Dashboard DPA</h1>

<!-- Menu Laporan dan banding DPA-->
<div class="row">
  <!-- Daftar Laporan -->
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
            <h3>Mahasiswa Melanggar</h3>
            <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countMhsMelanggarDpaRole']; ?></h6>
          </div>
          <div class="col-4">
            <button class="btn btn-primary d-flex align-items-center">
              <i class="bi bi-eye me-2"></i>
              <a href="<?= BASEURL; ?>/DpaControllers/mahasiswaMelanggar" style="text-decoration: none; color: white; font-size: 20px;">
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
            <h3>Banding Mahasiswa</h3>
            <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countBandingDpaRole']; ?></h6>
          </div>
          <div class="col-4">
            <button class="btn btn-primary d-flex align-items-center">
              <i class="bi bi-eye me-2"></i>
              <a href="<?= BASEURL; ?>/DpaControllers/banding" style="text-decoration: none; color: white; font-size: 20px;">
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

<!-- Menu Laporan dan banding DOSEN -->
<div class="row">
  <!-- Daftar Laporan -->
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
            <h3>Laporan</h3>
            <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countLaporanDosenRole']; ?></h6>
          </div>
          <div class="col-4">
            <button class="btn btn-danger d-flex align-items-center" id="laporButton">
              <a href="<?= BASEURL; ?>/DpaControllers/laporan" id="btnRedirect" style="text-decoration: none; color: white; font-size: 20px;">
                LAPOR!
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
            <h6 class="card-title text-start text-muted" style="font-size: 50px;"><?= $data['countBandingDosenRole']; ?></h6>
          </div>
          <div class="col-4">
            <button class="btn btn-primary d-flex align-items-center">
              <i class="bi bi-eye me-2"></i>
              <a href="<?= BASEURL; ?>/DpaControllers/bandingDosen" style="text-decoration: none; color: white; font-size: 20px;">
                Tampilkan
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>