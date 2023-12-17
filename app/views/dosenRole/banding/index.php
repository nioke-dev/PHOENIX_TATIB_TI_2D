<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-dark">Daftar Banding</h4>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-auto" style="width:100%">
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
                                    <a href="<?= BASEURL; ?>/DosenControllers/banding/detail/<?= $banding['id_banding']; ?>" class="badge bg-primary float-right tampilModalDetailBandingDosenRole" data-bs-toggle="modal" data-bs-target="#detailModalBanding" data-id_banding="<?= $banding['id_banding']; ?>">Detail</a>
                                    <?php if ($banding['status_sanksi'] !== 'Disetujui' && $banding['status_sanksi'] !== 'Ditolak') : ?>
                                        <a href="<?= BASEURL; ?>/DosenControllers/banding/setujuBanding/<?= $banding['id_banding']; ?>" class="badge bg-success float-right" onclick="return confirmActionSetujuBanding('<?= BASEURL; ?>/DosenControllers/banding/setujuBanding/<?= $banding['id_banding']; ?>')">Setuju</a>
                                        <a href="<?= BASEURL; ?>/DosenControllers/banding/tolakBanding/<?= $banding['id_banding']; ?>" class="badge bg-danger float-right" onclick="return confirmActionTolakBanding('<?= BASEURL; ?>/DosenControllers/banding/tolakBanding/<?= $banding['id_banding']; ?>')">Tolak</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
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
                        <td><strong>Keterangan</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailDeskripsi"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Bukti Banding</strong></td>
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