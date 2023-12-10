<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <!-- <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolAjukanBanding" data-bs-toggle="modal" data-bs-target="#formModalAjukanBanding">
                Ajukan Banding
            </button>
        </div>
    </div> -->

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/AdminControllers/banding/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Banding.." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <h3>Daftar Banding</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Laporan</th>
                    <th scope="col">NIP Dosen</th>
                    <th scope="col">NIM Mahasiswa</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                if (empty($data['bd'])) : ?>
                    <tr>
                        <td colspan="7">
                            <div class="alert alert-danger" role="alert">
                                Tidak ada data terkait.
                            </div>
                        </td>
                    </tr>
                    <?php else :
                    foreach ($data['bd'] as $banding) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $banding['id_laporan']; ?></td>
                            <td><?= $banding['nip_dosen']; ?></td>
                            <td><?= $banding['nim_mahasiswa']; ?></td>
                            <?php if ($banding['status_sanksi'] == 'Diterima') : ?>
                                <td><span class="badge text-bg-success"><?= $banding['status_sanksi']; ?></span></td>
                            <?php elseif ($banding['status_sanksi'] == 'Ditolak') : ?>
                                <td><span class="badge text-bg-danger"><?= $banding['status_sanksi']; ?></span></td>
                            <?php elseif ($banding['status_sanksi'] == 'Dikerjakan') : ?>
                                <td><span class="badge text-bg-light"><?= $banding['status_sanksi']; ?></span></td>
                            <?php elseif ($banding['status_sanksi'] == 'Selesai') : ?>
                                <td><span class="badge text-bg-dark"><?= $banding['status_sanksi']; ?></span></td>
                            <?php elseif ($banding['status_sanksi'] == 'Baru') : ?>
                                <td><span class="badge text-bg-info"><?= $banding['status_sanksi']; ?></span></td>
                            <?php endif; ?>
                            <td>
                                <a href="<?= BASEURL; ?>/AdminControllers/banding/detail/<?= $banding['id_banding']; ?>" class="badge bg-success float-right tampilModalDetailBanding" data-bs-toggle="modal" data-bs-target="#detailModalBanding" data-id_banding="<?= $banding['id_banding']; ?>">detail</a>
                                <a href="<?= BASEURL; ?>/AdminControllers/banding/hapus/<?= $banding['id_banding']; ?>" class="badge bg-danger float-right" onclick="return confirmAction()">hapus</a>
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
                                                window.location.href = "<?= BASEURL; ?>/AdminControllers/banding/hapus/<?= $banding['id_banding']; ?>";
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
                    <p><strong>NIP Dosen :</strong> <span id="detailNipDosen"></span></p>
                </div>

                <div class="form-group">
                    <p><strong>NIM Mahasiswa :</strong> <span id="detailNimMahasiswa"></span></p>
                </div>

                <div class="form-group">
                    <p><strong>Deskripsi :</strong> <span id="detailDeskripsi"></span></p>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal Add and Edit -->
<!-- <div class="modal fade" id="formModalAjukanBanding" tabindex="-1" aria-labelledby="formModalBandingLabel" aria-hidden="true">
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
</div> -->