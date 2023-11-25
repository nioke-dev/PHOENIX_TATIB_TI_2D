<div class="container mt-3">

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
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
          <th scope="col">id</th>
          <th scope="col">nip</th>
          <th scope="col">nama</th>
          <th scope="col">matkul</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['dsn'] as $dsn) : ?>
          <tr>
            <th scope="row"><?= $dsn['id']; ?></th>
            <td><?= $dsn['nama']; ?></td>
            <td><?= $dsn['nip']; ?></td>
            <td><?= $dsn['matkul']; ?></td>
            <td>
              <a href="<?= BASEURL; ?>/dosen/hapus/<?= $dsn['id']; ?>" class="badge bg-danger float-right" onclick="return confirm('yakin?');">hapus</a>
              <a href="<?= BASEURL; ?>/dosen/ubah/<?= $dsn['id']; ?>" class="badge bg-success float-right tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $dsn['id']; ?>">ubah</a>
              <a href="<?= BASEURL; ?>/dosen/detail/<?= $dsn['id']; ?>" class="badge bg-primary float-right">detail</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Dosen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">

        <form action="<?= BASEURL; ?>/dosen/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="number" class="form-control" id="nim" name="nim" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
          </div>

          <div class="form-group">
            <label for="matkul">Matkul</label>
            <select class="form-control" id="matkul" name="matkul">
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Teknik Mesin">Teknik Mesin</option>
              <option value="Teknik Industri">Teknik Industri</option>
              <option value="Teknik Pangan">Teknik Pangan</option>
              <option value="Teknik Planologi">Teknik Planologi</option>
              <option value="Teknik Lingkungan">Teknik Lingkungan</option>
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