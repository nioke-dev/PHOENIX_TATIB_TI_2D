<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <h3>Daftar Banding</h3>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Laporan</th>
                    <th scope="col">NIP Dosen</th>
                    <th scope="col">NIM Mahasiswa</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($data['bd'] as $banding) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $banding['id_laporan']; ?></td>
                        <td><?= $banding['nip_dosen']; ?></td>
                        <td><?= $banding['nim_mahasiswa']; ?></td>
                        <td><?= $banding['nama_mahasiswa']; ?></td>
                        <?php if ($banding['status_sanksi'] == 'Disetujui') : ?>
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
                            <a href="<?= BASEURL; ?>/DosenControllers/banding/detail/<?= $banding['id_banding']; ?>" class="badge bg-primary float-right tampilModalDetailBanding" data-bs-toggle="modal" data-bs-target="#detailModalBanding" data-id_banding="<?= $banding['id_banding']; ?>">detail</a>
                            <?php if ($banding['status_sanksi'] !== 'Disetujui' && $banding['status_sanksi'] !== 'Ditolak') : ?>
                                <a href="<?= BASEURL; ?>/DosenControllers/banding/setujuBanding/<?= $banding['id_banding']; ?>" class="badge bg-success float-right" onclick="return confirmActionSetuju()">Setuju</a>
                                <a href="<?= BASEURL; ?>/DosenControllers/banding/tolakBanding/<?= $banding['id_banding']; ?>" class="badge bg-danger float-right" onclick="return confirmActionTolak()">Tolak</a>
                            <?php endif; ?>

                            <script>
                                function confirmActionSetuju() {
                                    Swal.fire({
                                        title: "Apakah Anda Yakin?",
                                        text: "Anda Tidak Dapat Membatalkan Pilihan",
                                        icon: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#3085d6",
                                        cancelButtonColor: "#d33",
                                        confirmButtonText: "Ya",
                                        cancelButtonText: "Batal"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Redirect to the delete URL if the user confirms
                                            window.location.href = "<?= BASEURL; ?>/DosenControllers/banding/setujuBanding/<?= $banding['id_banding']; ?>";
                                        }
                                    });

                                    // Prevent the default behavior of the anchor tag
                                    return false;
                                }

                                function confirmActionTolak() {
                                    Swal.fire({
                                        title: "Apakah Anda Yakin?",
                                        text: "Anda Tidak Dapat Membatalkan Pilihan Ini",
                                        icon: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#3085d6",
                                        cancelButtonColor: "#d33",
                                        confirmButtonText: "Ya",
                                        cancelButtonText: "Batal"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Redirect to the delete URL if the user confirms
                                            window.location.href = "<?= BASEURL; ?>/DosenControllers/banding/tolakBanding/<?= $banding['id_banding']; ?>";
                                        }
                                    });

                                    // Prevent the default behavior of the anchor tag
                                    return false;
                                }
                            </script>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModalBanding" tabindex="-1" aria-labelledby="detailModalBandingLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalBandingLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td><strong>NIP Dosen</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailNipDosen"></span></td>
                    </tr>
                    <tr>
                        <td><strong>NIM Mahasiswa</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailNimMahasiswa"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Mahasiswa</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailNamaMahasiswa"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Deskripsi</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailDeskripsi"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Bukti Pelanggaran</strong></td>
                        <td><strong>:</strong></td>
                        <td><img id="detailBuktiBanding" alt="Bukti Banding" style="max-width: 100%;" /></td>
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