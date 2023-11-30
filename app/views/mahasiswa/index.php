<div class="container mt-3">

  <!-- Flash message -->
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <!-- Tambah Data Mahasiswa -->
  <div class="row mb-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary tombolTambahDataMahasiswa" data-bs-toggle="modal" data-bs-target="#formModalMahasiswa">
        Tambah Data Mahasiswa
      </button>
    </div>
  </div>

  <!-- Form Cari Mahasiswa -->
  <div class="row mb-3">
    <div class="col-lg-6">
      <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari mahasiswa.." name="keyword" id="keyword" autocomplete="off">
          <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Daftar Mahasiswa -->
  <div class="row">
    <h3>Daftar Mahasiswa</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">NIM</th>
          <th scope="col">Nama</th>
          <th scope="col">Kelas</th>
          <th scope="col">Prodi</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($data['mhs'] as $mhs) : ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $mhs['nim_mahasiswa']; ?></td>
            <td><?= $mhs['nama_mahasiswa']; ?></td>
            <td><?= $mhs['kelas_mahasiswa']; ?></td>
            <td><?= $mhs['prodi_mahasiswa']; ?></td>
            <td><?= $mhs['email_mahasiswa']; ?></td>
            <td>
              <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['nim_mahasiswa']; ?>" class="badge bg-danger float-right" onclick="return confirm('yakin?');">hapus</a>
              <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['nim_mahasiswa']; ?>" class="badge bg-success float-right tampilModalUbahMahasiswa" data-bs-toggle="modal" data-bs-target="#formModalMahasiswa" data-nim_mahasiswa="<?= $mhs['nim_mahasiswa']; ?>">ubah</a>
              <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['nim_mahasiswa']; ?>" class="badge bg-primary float-right tampilModalDetailMahasiswa" data-bs-toggle="modal" data-bs-target="#detailModalMahasiswa" data-nim_mahasiswa="<?= $mhs['nim_mahasiswa']; ?>">Detail</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
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
        <div class="form-group">
          <p><strong>NIM:</strong> <span id="detailNimMahasiswa"></span></p>
        </div>
        <div class="form-group">
          <p><strong>Nama:</strong> <span id="detailNamaMahasiswa"></span></p>
        </div>
        <div class="form-group">
          <p><strong>Kelas:</strong> <span id="detailKelasMahasiswa"></span></p>
        </div>
        <div class="form-group">
          <p><strong>Program Studi:</strong> <span id="detailProdiMahasiswa"></span></p>
        </div>
        <div class="form-group">
          <p><strong>Email:</strong> <span id="detailEmailMahasiswa"></span></p>
        </div>
        <div class="form-group">
          <p><strong>Password:</strong> <span id="detailPasswordMahasiswa"></span></p>
        </div>
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
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
          <input type="text" name="id_user" id="id_user">
          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="number" class="form-control" id="nim" name="nim" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="prodi">Program Studi</label>
            <input type="text" class="form-control" id="prodi" name="prodi" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="password">password</label>
            <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>