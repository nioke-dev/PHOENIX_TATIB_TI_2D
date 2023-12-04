<div class="container mt-3">

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary tombolTambahDataAdmin" data-bs-toggle="modal" data-bs-target="#formModalAdmin">
        Tambah Data Admin
      </button>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <form action="<?= BASEURL; ?>/AdminControllers/admin/cari" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari admin.." name="keyword" id="keyword" autocomplete="off">
          <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <h3>Daftar Admin</h3>
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
        if (empty($data['adm'])) : ?>
          <tr>
            <td colspan="7">
              <div class="alert alert-danger" role="alert">
                Tidak ada data terkait.
              </div>
            </td>
          </tr>
          <?php else :
          foreach ($data['adm'] as $adm) : ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= $adm['nip_admin']; ?></td>
              <td><?= $adm['nama_admin']; ?></td>
              <td><?= $adm['email_admin']; ?></td>
              <td>
                <a href="<?= BASEURL; ?>/AdminControllers/admin/detail/<?= $adm['nip_admin']; ?>" class="badge bg-primary float-right tampilModalDetail" data-bs-toggle="modal" data-bs-target="#detailModalAdmin" data-nip_admin="<?= $adm['nip_admin']; ?>">Detail</a>
                <a href="<?= BASEURL; ?>/AdminControllers/admin/ubah/<?= $adm['nip_admin']; ?>" class="badge bg-success float-right tampilModalUbahAdmin" data-bs-toggle="modal" data-bs-target="#formModalAdmin" data-nip_admin="<?= $adm['nip_admin']; ?>">ubah</a>
                <a href="<?= BASEURL; ?>/AdminControllers/admin/hapus/<?= $adm['nip_admin']; ?>" class="badge bg-danger float-right" onclick="return confirm('Apakah Anda yakin untuk menghapus Data Admin berikut?');">hapus</a>
              </td>
            </tr>
        <?php endforeach;
        endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModalAdmin" tabindex="-1" aria-labelledby="detailModalAdminLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalAdminLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <p><strong>NIP:</strong> <span id="detailNipAdmin"></span></p>
        </div>

        <div class="form-group">
          <p><strong>Nama:</strong> <span id="detailNamaAdmin"></span></p>
        </div>

        <div class="form-group">
          <p><strong>Email:</strong> <span id="detailEmailAdmin"></span></p>
        </div>

        <div class="form-group">
          <p><strong>Username:</strong> <span id="detailUsernameAdmin"></span></p>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal Add and Edit -->
<div class="modal fade" id="formModalAdmin" tabindex="-1" aria-labelledby="formModalAdminLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalAdminLabel">Tambah Data Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/AdminControllers/admin/tambah" method="post">
          <input type="hidden" name="id_user" id="id_user">
          <div class="form-group">
            <label for="nip_admin">NIP</label>
            <input type="number" class="form-control" id="nip_admin" name="nip_admin" autocomplete="off">
            <input type="hidden" class="form-control" id="nip_admin_lama" name="nip_admin_lama" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="nama_admin">Nama</label>
            <input type="text" class="form-control" id="nama_admin" name="nama_admin" autocomplete="off" required>
            <input type="hidden" class="form-control" id="nama_admin_lama" name="nama_admin_lama" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="email_admin">Email</label>
            <input type="email" class="form-control" id="email_admin" name="email_admin" autocomplete="off" required>
            <input type="hidden" class="form-control" id="email_admin_lama" name="email_admin_lama" autocomplete="off" required>
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