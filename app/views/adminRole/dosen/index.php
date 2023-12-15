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

  <div class="row">
    <h3>Daftar Dosen</h3>
    <div class="table-responsive">
      <table id="example" class="table table-striped table-auto" style="width:100%">
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
                <a href="<?= BASEURL; ?>/AdminControllers/dosen/detail/<?= $dsn['nip_dosen']; ?>" class="badge bg-primary float-right tampilModalDetail" data-bs-toggle="modal" data-bs-target="#detailModalDosen" data-nip_dosen="<?= $dsn['nip_dosen']; ?>">Detail</a>
                <a href="<?= BASEURL; ?>/AdminControllers/dosen/ubah/<?= $dsn['nip_dosen']; ?>" class="badge bg-success float-right tampilModalUbahDosen" data-bs-toggle="modal" data-bs-target="#formModalDosen" data-nip_dosen="<?= $dsn['nip_dosen']; ?>">ubah</a>
                <a href="<?= BASEURL; ?>/AdminControllers/dosen/hapus/<?= $dsn['nip_dosen']; ?>" class="badge bg-danger float-right" onclick="return confirmAction('<?= BASEURL; ?>/AdminControllers/dosen/hapus/<?= $dsn['nip_dosen']; ?>')">hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
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
        <table class="table">
          <tr>
            <td><strong>NIP</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailNip"></span></td>
          </tr>
          <tr>
            <td><strong>Nama</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailNama"></span></td>
          </tr>
          <tr>
            <td><strong>Email</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailEmail"></span></td>
          </tr>
          <tr>
            <td><strong>Username</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailUsername"></span></td>
          </tr>
        </table>
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
        <form action="<?= BASEURL; ?>/AdminControllers/dosen/tambah" method="post">
          <input type="hidden" name="id_user" id="id_user">
          <div class="form-group">
            <label for="nip">NIP</label>
            <input type="number" class="form-control" id="nip" name="nip" autocomplete="off">
            <input type="hidden" class="form-control" id="nip_lama" name="nip_lama" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
            <input type="hidden" class="form-control" id="nama_lama" name="nama_lama" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
            <input type="hidden" class="form-control" id="email_lama" name="email_lama" autocomplete="off" required>
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        </form>
      </div>
    </div>
  </div>
</div>