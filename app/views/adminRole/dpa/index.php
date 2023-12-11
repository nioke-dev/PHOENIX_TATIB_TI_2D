<div class="container mt-3">

  <!-- Flash message -->
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <!-- Tambah Data DPA -->
  <div class="row mb-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary tombolTambahDataDpa" data-bs-toggle="modal" data-bs-target="#formModalDpa">
        Tambah Data DPA
      </button>
    </div>
  </div>

  <!-- Form Cari DPA -->
  <!-- <div class="row mb-3">
    <div class="col-lg-6">
      <form action="<?= BASEURL; ?>/AdminControllers/AdminControllers/dpa/cari" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari dpa.." name="keyword" id="keyword" autocomplete="off">
          <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
        </div>
      </form>
    </div>
  </div> -->

  <!-- Daftar DPA -->
  <div class="row">
    <h3>Daftar DPA</h3>
    <table id="example" class="table table-striped" style="width:100%">
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
        if (empty($data['dp'])) : ?>
          <tr>
            <td colspan="7">
              <div class="alert alert-danger" role="alert">
                Tidak ada data terkait.
              </div>
            </td>
          </tr>
          <?php else :
          foreach ($data['dp'] as $dpa) : ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= $dpa['nip_dpa']; ?></td>
              <td><?= $dpa['nama_dpa']; ?></td>
              <td><?= $dpa['kelas_dpa']; ?></td>
              <td><?= $dpa['email_dpa']; ?></td>
              <td>
                <a href="<?= BASEURL; ?>/AdminControllers/dpa/detail/<?= $dpa['nip_dpa']; ?>" class="badge bg-primary float-right tampilModalDetailDpa" data-bs-toggle="modal" data-bs-target="#detailModalDpa" data-nip_dpa="<?= $dpa['nip_dpa']; ?>">Detail</a>
                <a href="<?= BASEURL; ?>/AdminControllers/dpa/ubah/<?= $dpa['nip_dpa']; ?>" class="badge bg-success float-right tampilModalUbahDpa" data-bs-toggle="modal" data-bs-target="#formModalDpa" data-nip_dpa="<?= $dpa['nip_dpa']; ?>">Ubah</a>
                <a href="<?= BASEURL; ?>/AdminControllers/dpa/hapus/<?= $dpa['nip_dpa']; ?>" class="badge bg-danger float-right" onclick="return confirm('Apakah Anda yakin untuk menghapus Data DPA berikut?');">Hapus</a>
              </td>
            </tr>
        <?php endforeach;
        endif; ?>
      </tbody>
    </table>
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
        <div class="form-group">
          <p><strong>NIP:</strong> <span id="detailNipDpa"></span></p>
        </div>
        <div class="form-group">
          <p><strong>Nama:</strong> <span id="detailNamaDpa"></span></p>
        </div>
        <div class="form-group">
          <p><strong>Kelas:</strong> <span id="detailKelasDpa"></span></p>
        </div>
        <div class="form-group">
          <p><strong>Email:</strong> <span id="detailEmailDpa"></span></p>
        </div>
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