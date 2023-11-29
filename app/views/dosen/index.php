<div class="container mt-3">

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary tombolTambahDataDosen" data-bs-toggle="modal" data-bs-target="#formModalDosen">
        Tambah Data Dosen
      </button>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <form action="<?= BASEURL; ?>/dosen/cari" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="cari dosen.." name="keyword" id="keyword" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <h3>Daftar Dosen</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">NIP</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($data['dsn'] as $dsn) : ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $dsn['nip_dosen']; ?></td>
            <td><?= $dsn['nama_dosen']; ?></td>
            <td><?= $dsn['email_dosen']; ?></td>
            <td>
              <a href="<?= BASEURL; ?>/dosen/hapus/<?= $dsn['nip_dosen']; ?>" class="badge bg-danger float-right" onclick="return confirm('yakin?');">hapus</a>
              <a href="<?= BASEURL; ?>/dosen/ubah/<?= $dsn['nip_dosen']; ?>" class="badge bg-success float-right tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModalDosen" data-nip="<?= $dsn['nip_dosen']; ?>">ubah</a>
              <a href="<?= BASEURL; ?>/dosen/detail/<?= $dsn['nip_dosen']; ?>" class="badge bg-primary float-right tampilModalDetail" data-bs-toggle="modal" data-bs-target="#detailModalDosen" data-nip_dosen="<?= $dsn['nip_dosen']; ?>">Detail</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModalDosen" tabindex="-1" aria-labelledby="detailModalDosenLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalDosenLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <p><strong>NIP:</strong> <span id="detailNip"></span></p>
        </div>

        <div class="form-group">
          <p><strong>Nama:</strong> <span id="detailNama"></span></p>
        </div>

        <div class="form-group">
          <p><strong>Email:</strong> <span id="detailEmail"></span></p>
        </div>

        <div class="form-group">
          <p><strong>Username:</strong> <span id="detailUsername"></span></p>
        </div>

        <div class="form-group">
          <p><strong>Password:</strong> <span id="detailPassword"></span></p>
        </div>

        <div class="form-group">
          <p><strong>Matkul:</strong> <span id="detailMatkul"></span></p>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal Add and Edit -->
<div class="modal fade" id="formModalDosen" tabindex="-1" aria-labelledby="formModalDosenLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalDosenLabel">Tambah Data Dosen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">

        <form action="<?= BASEURL; ?>/dosen/tambah" method="post">
          <div class="form-group">
            <label for="nip">NIP</label>
            <input type="number" class="form-control" id="nip" name="nip" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="matkul">Matkul</label>
            <select class="form-control" id="matkul" name="matkul">
              <option value="Pemrograman Dasar">Pemrograman Dasar</option>
              <option value="Basis Data">Basis Data</option>
              <option value="Pemrograman Web">Desain dan Pemrograman Web</option>
              <option value="Jaringan Komputer">Jaringan Komputer</option>
              <option value="Kecerdasan Buatan">Kecerdasan Buatan</option>
              <option value="Pengembangan Aplikasi Mobile">Pengembangan Aplikasi Mobile</option>
              <option value="Sistem Operasi">Sistem Operasi</option>
              <option value="Pengolahan Citra Digital">Pengolahan Citra Digital</option>
              <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>