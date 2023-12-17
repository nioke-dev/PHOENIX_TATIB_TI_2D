<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h4 class="m-0 font-weight-bold text-dark">Daftar DPA</h4>
    <div class="row" style="margin-right: 1px;">
      <button type="button" class="btn btn-primary tombolTambahDataDpa" data-bs-toggle="modal" data-bs-target="#formModalDpa">
        Tambah Data DPA
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
              <th scope="col">No</th>
              <th scope="col">NIP</th>
              <th scope="col">Nama</th>
              <th scope="col">Kelas</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($data['dp'] as $dpa) : ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $dpa['nip_dpa']; ?></td>
                <td><?= $dpa['nama_dpa']; ?></td>
                <td><?= $dpa['kelas_dpa']; ?></td>
                <td><?= $dpa['email_dpa']; ?></td>
                <td>
                  <a href="<?= BASEURL; ?>/AdminControllers/dpa/detail/<?= $dpa['nip_dpa']; ?>" class="badge bg-primary float-right tampilModalDetailDpa" data-bs-toggle="modal" data-bs-target="#detailModalDpa" data-nip_dpa="<?= $dpa['nip_dpa']; ?>">Detail</a>
                  <a href="<?= BASEURL; ?>/AdminControllers/dpa/ubah/<?= $dpa['nip_dpa']; ?>" class="badge bg-success float-right tampilModalUbahDpa" data-bs-toggle="modal" data-bs-target="#formModalDpaUbah" data-nip_dpa="<?= $dpa['nip_dpa']; ?>">Ubah</a>
                  <a href="<?= BASEURL; ?>/AdminControllers/dpa/hapus/<?= $dpa['nip_dpa']; ?>" class="badge bg-danger float-right" onclick="return confirmAction('<?= BASEURL; ?>/AdminControllers/dpa/hapus/<?= $dpa['nip_dpa']; ?>')">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detail DPA -->
<div class="modal fade" id="detailModalDpa" tabindex="-1" aria-labelledby="detailModalDpaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalDpaLabel">Detail Data DPA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <td><strong>NIP</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailNipDpa"></span></td>
          </tr>
          <tr>
            <td><strong>Nama</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailNamaDpa"></span></td>
          </tr>
          <tr>
            <td><strong>Kelas</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailKelasDpa"></span></td>
          </tr>
          <tr>
            <td><strong>Email</strong></td>
            <td><strong>:</strong></td>
            <td><span id="detailEmailDpa"></span></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Tambah/Edit DPA -->
<div class="modal fade" id="formModalDpa" tabindex="-1" aria-labelledby="formModalDpaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalDpaLabel">Tambah Data DPA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/AdminControllers/dpa/tambah" method="post">
          <input type="hidden" name="id_user" id="id_user">
          <div class="form-group">
            <label for="nip_dpa">NIP</label>
            <select class="form-control choices-single select-dosen-adminRole" id="nip_dpa" name="nip_dpa" autocomplete="off" required>
              <option></option>
              <?php
              foreach ($data['dsn'] as $dosen) : ?>
                <option value="<?= $dosen['nip_dosen']; ?>"><?= $dosen['nip_dosen']; ?> - <?= $dosen['nama_dosen']; ?></option>
              <?php endforeach; ?>
            </select>
            <input type="hidden" class="form-control" id="nip_dpa_lama" name="nip_dpa_lama" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="kelas_dpa">Kelas</label>
            <input type="text" class="form-control" id="kelas_dpa" name="kelas_dpa" autocomplete="off" required>
            <input type="hidden" class="form-control" id="kelas_dpa_lama" name="kelas_dpa_lama" autocomplete="off" required>
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

<div class="modal fade" id="formModalDpaUbah" tabindex="-1" aria-labelledby="formModalDpaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalDpaLabel">Ubah Data DPA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/AdminControllers/dpa/ubah" method="post">
          <input type="hidden" name="nip_dpa_ubah" id="nip_dpa_ubah">
          <div class="form-group">
            <label for="kelas_dpa">Kelas</label>
            <input type="text" class="form-control" id="kelas_dpa_ubah" name="kelas_dpa_ubah" autocomplete="off" required>
            <input type="hidden" class="form-control" id="kelas_dpa_ubah_Lama" name="kelas_dpa_ubah_Lama" autocomplete="off" required>
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