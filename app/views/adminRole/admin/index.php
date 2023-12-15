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

  <div class="row">
    <h3>Daftar Admin</h3>
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
                  <a href="<?= BASEURL; ?>/AdminControllers/admin/ubah/<?= $adm['nip_admin']; ?>" class="badge bg-success float-right tampilModalUbahAdmin" data-bs-toggle="modal" data-bs-target="#formModalAdmin" data-nip_admin="<?= $adm['nip_admin']; ?>">Ubah</a>
                  <a href="<?= BASEURL; ?>/AdminControllers/admin/hapus/<?= $adm['nip_admin']; ?>" class="badge bg-danger float-right" onclick="return confirmAction('<?= BASEURL; ?>/AdminControllers/admin/hapus/<?= $adm['nip_admin']; ?>')">Hapus</a>
                </td>
              </tr>
          <?php endforeach;
          endif; ?>
        </tbody>
      </table>
    </div>
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
        <table class="table">
          <tr>
            <td><strong>NIP</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailNipAdmin"></span></td>
          </tr>
          <tr>
            <td><strong>Nama</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailNamaAdmin"></span></td>
          </tr>
          <tr>
            <td><strong>Email</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailEmailAdmin"></span></td>
          </tr>
          <tr>
            <td><strong>Username</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailUsernameAdmin"></span></td>
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