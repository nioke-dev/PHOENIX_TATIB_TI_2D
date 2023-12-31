<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h4 class="m-0 font-weight-bold text-dark">Daftar Mahasiswa</h4>
    <div class="row" style="margin-right: 1px;">
      <button type="button" class="btn btn-primary tombolTambahDataMahasiswa" data-bs-toggle="modal" data-bs-target="#formModalMahasiswa">
        Tambah Data Mahasiswa
      </button>
    </div>
  </div>
  <!-- Card Body -->
  <div class="card-body">
    <div class="row">
      <div class="table-responsive">
        <table id="example" class="table table-striped table-auto" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Prodi</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($data['mhs'] as $mhs) : ?>
              <tr>
                <th><?= $no++; ?></th>
                <td><?= $mhs['nim_mahasiswa']; ?></td>
                <td><?= $mhs['nama_mahasiswa']; ?></td>
                <td><?= $mhs['kelas_mahasiswa']; ?></td>
                <td><?= $mhs['prodi_mahasiswa']; ?></td>
                <td><?= $mhs['email_mahasiswa']; ?></td>
                <td>
                  <a href="<?= BASEURL; ?>/AdminControllers/mahasiswa/detail/<?= $mhs['nim_mahasiswa']; ?>" class="badge bg-primary float-right tampilModalDetailMahasiswa" data-bs-toggle="modal" data-bs-target="#detailModalMahasiswa" data-nim_mahasiswa="<?= $mhs['nim_mahasiswa']; ?>">Detail</a>
                  <a href="<?= BASEURL; ?>/AdminControllers/mahasiswa/ubah/<?= $mhs['nim_mahasiswa']; ?>" class="badge bg-success float-right tampilModalUbahMahasiswa" data-bs-toggle="modal" data-bs-target="#formModalMahasiswa" data-nim_mahasiswa="<?= $mhs['nim_mahasiswa']; ?>">Ubah</a>
                  <a href="<?= BASEURL; ?>/AdminControllers/mahasiswa/hapus/<?= $mhs['nim_mahasiswa']; ?>" class="badge bg-danger float-right" onclick="return confirmAction('<?= BASEURL; ?>/AdminControllers/mahasiswa/hapus/<?= $mhs['nim_mahasiswa']; ?>')">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detail Mahasiswa -->
<div class="modal fade" id="detailModalMahasiswa" tabindex="-1" aria-labelledby="detailModalMahasiswaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalMahasiswaLabel">Detail Data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <td><strong>NIM</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailNimMahasiswa"></span></td>
          </tr>
          <tr>
            <td><strong>Nama</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailNamaMahasiswa"></span></td>
          </tr>
          <tr>
            <td><strong>Kelas</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailKelasMahasiswa"></span></td>
          </tr>
          <tr>
            <td><strong>Program Studi</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailProdiMahasiswa"></span></td>
          </tr>
          <tr>
            <td><strong>Email</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailEmailMahasiswa"></span></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Tambah/Edit Mahasiswa -->
<div class="modal fade" id="formModalMahasiswa" tabindex="-1" aria-labelledby="formModalMahasiswaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalMahasiswaLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/AdminControllers/mahasiswa/tambah" method="post">
          <input type="hidden" name="id_user" id="id_user">
          <div class="form-group">
            <label for="nim_mahasiswa">NIM</label>
            <input type="number" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa" autocomplete="off" required>
            <input type="hidden" class="form-control" id="nim_mahasiswa_lama" name="nim_mahasiswa_lama" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="nama_mahasiswa">Nama</label>
            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" autocomplete="off" required>
            <input type="hidden" class="form-control" id="nama_mahasiswa_lama" name="nama_mahasiswa_lama" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="kelas_mahasiswa">Kelas</label>
            <input type="text" class="form-control" id="kelas_mahasiswa" name="kelas_mahasiswa" autocomplete="off" required>
            <input type="hidden" class="form-control" id="kelas_mahasiswa_lama" name="kelas_mahasiswa_lama" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="prodi_mahasiswa">Program Studi</label>
            <input type="text" class="form-control" id="prodi_mahasiswa" name="prodi_mahasiswa" autocomplete="off" required>
            <input type="hidden" class="form-control" id="prodi_mahasiswa_lama" name="prodi_mahasiswa_lama" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="email_mahasiswa">Email</label>
            <input type="email" class="form-control" id="email_mahasiswa" name="email_mahasiswa" autocomplete="off" required>
            <input type="hidden" class="form-control" id="email_mahasiswa_lama" name="email_mahasiswa_lama" autocomplete="off" required>
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        </form>
      </div>
    </div>
  </div>