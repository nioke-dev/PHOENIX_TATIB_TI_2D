<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataMatkulDosen" data-bs-toggle="modal" data-bs-target="#formModalMatkulDosen">
                Tambah Data Matkul Dosen
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/matkul/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Matkul.." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
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
                    <th scope="col">NIP Dosen</th>
                    <th scope="col">Nama Matkul</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                if(empty($data['matkul'])) : ?>
                    <tr>
                      <td colspan="7">
                        <div class="alert alert-danger" role="alert">
                          Tidak ada data terkait.
                        </div>
                      </td>
                    </tr>
                  <?php else:
                foreach ($data['matkul'] as $matkul) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $matkul['nip_dosen']; ?></td>
                        <td><?= $matkul['matkul']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/matkul/ubah/<?= $matkul['id_matkul']; ?>" class="badge bg-success float-right tampilModalUbahMatkul" data-bs-toggle="modal" data-bs-target="#formModalMatkulDosen" data-id_matkul="<?= $matkul['id_matkul']; ?>">ubah</a>
                            <a href="<?= BASEURL; ?>/matkul/hapus/<?= $matkul['id_matkul']; ?>" class="badge bg-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                        </td>
                    </tr>
                <?php endforeach; 
                endif; ?>
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
<div class="modal fade" id="formModalMatkulDosen" tabindex="-1" aria-labelledby="formModalMatkulDosenLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalMatkulDosenLabel">Tambah Data Matkul</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/matkul/tambah" method="post">
                    <input type="hidden" name="id_matkul" id="id_matkul">
                    <div class="form-group">
                        <label for="nip_dosen">NIP Dosen</label>
                        <input type="text" class="form-control" id="nip_dosen" name="nip_dosen" autocomplete="off">
                        <input type="hidden" class="form-control" id="nip_dosen_lama" name="nip_dosen_lama" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="matkul">Nama Matkul</label>
                        <input type="text" class="form-control" id="matkul" name="matkul" autocomplete="off" required>
                        <input type="hidden" class="form-control" id="matkul_lama" name="matkul_lama" autocomplete="off" required>
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