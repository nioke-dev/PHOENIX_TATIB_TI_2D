<div class="container mt-3">


    <div class="row">
        <h3>Daftar Pelanggaran</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Laporan</th>
                    <th scope="col">NIP Dosen</th>
                    <th scope="col">NIM Mahasiswa</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                if (empty($data['pelanggaran'])) : ?>
                    <tr>
                        <td colspan="7">
                            <div class="alert alert-danger" role="alert">
                                Tidak ada data terkait.
                            </div>
                        </td>
                    </tr>
                    <?php else :

                    foreach ($data['pelanggaran'] as $pelanggaran) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $pelanggaran['id_laporan']; ?></td>
                            <td><?= $pelanggaran['nip_dosen']; ?></td>
                            <td><?= $pelanggaran['nim_mahasiswa']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/pelanggaran/detail/<?= $pelanggaran['id_laporan']; ?>" class="badge bg-success float-right tampilModalDetailBanding" data-bs-toggle="modal" data-bs-target="#detailModalBanding" data-id_banding="<?= $banding['id_banding']; ?>">Detail</a>
                                <a href="<?= BASEURL; ?>/pelanggaran/detail/<?= $pelanggaran['id_laporan']; ?>" class="badge bg-danger float-right tampilModalDetailBanding" data-bs-toggle="modal" data-bs-target="#detailModalBanding" data-id_banding="<?= $banding['id_banding']; ?>">Banding</a>
                            </td>
                        </tr>
                <?php endforeach;
                endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModalBanding" tabindex="-1" aria-labelledby="detailModalBandingLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalBandingLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <p><strong>NIP Dosen:</strong> <span id="detailNipDosen"></span></p>
                </div>

                <div class="form-group">
                    <p><strong>NIM Mahasiswa:</strong> <span id="detailNimMahasiswa"></span></p>
                </div>

                <div class="form-group">
                    <p><strong>Deskripsi:</strong> <span id="detailDeskripsi"></span></p>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal Add and Edit -->
<div class="modal fade" id="formModalAjukanBanding" tabindex="-1" aria-labelledby="formModalBandingLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalBandingLabel">Ajukan Banding</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/banding/tambah" method="post">
                    <input type="hidden" name="id_banding" id="id_banding">
                    <div class="form-group">
                        <label for="deskripsi">Alasan Banding</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" autocomplete="off" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Ajukan Banding</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>