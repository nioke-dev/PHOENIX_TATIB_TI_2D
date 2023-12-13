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
<!-- <div class="row mb-3">
  <div class="col-lg-6">
    <form action="<?= BASEURL; ?>/AdminControllers/mahasiswa/cari" method="post">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari mahasiswa.." name="keyword" id="keyword" autocomplete="off">
        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
      </div>
    </form>
  </div>
</div> -->


<!-- Daftar Mahasiswa -->
<div class="row">
  <h3>Daftar Mahasiswa</h3>
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
        if (empty($data['mhs'])) : ?>
          <tr>
            <td>
              <div class="alert alert-danger" role="alert">
                Tidak ada data terkait.
              </div>
            </td>
          </tr>
          <?php else :
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
                <a href="<?= BASEURL; ?>/AdminControllers/mahasiswa/ubah/<?= $mhs['nim_mahasiswa']; ?>" class="badge bg-success float-right tampilModalUbahMahasiswa" data-bs-toggle="modal" data-bs-target="#formModalMahasiswa" data-nim_mahasiswa="<?= $mhs['nim_mahasiswa']; ?>">ubah</a>
                <a href="<?= BASEURL; ?>/AdminControllers/mahasiswa/hapus/<?= $mhs['nim_mahasiswa']; ?>" class="badge bg-danger float-right" onclick="return confirmAction()">hapus</a>
                <script>
                  function confirmAction() {
                    Swal.fire({
                      title: "Apakah Kamu Yakin?",
                      text: "Kamu Tidak Bisa Mengembalikan Data Ini!",
                      icon: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#3085d6",
                      cancelButtonColor: "#d33",
                      confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                      if (result.isConfirmed) {
                        // Redirect to the delete URL if the user confirms
                        window.location.href = "<?= BASEURL; ?>/AdminControllers/mahasiswa/hapus/<?= $mhs['nim_mahasiswa']; ?>";
                      }
                    });

                    // Prevent the default behavior of the anchor tag
                    return false;
                  }
                </script>
              </td>
            </tr>
        <?php endforeach;
        endif; ?>
      </tbody>
    </table>
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
        <!-- <div class="form-group">
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
        </div> -->
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
            <input type="number" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa" autocomplete="off">
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