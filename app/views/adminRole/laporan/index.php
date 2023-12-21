<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-dark">Daftar Laporan</h4>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-auto" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Laporan</th>
                            <th>Tanggal</th>
                            <th>NIM Mahasiswa</th>
                            <th>Nama Mahasiswa</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data['laporan'] as $laporan) : ?>
                            <tr>
                                <th><?= $no++; ?></th>
                                <td><?= $laporan['id_laporan']; ?></td>
                                <td><?= date('d-m-Y', strtotime($laporan['tgl_laporan'])); ?></td>
                                <td><?= $laporan['nim_mahasiswa']; ?></td>
                                <td><?= $laporan['nama_mahasiswa']; ?></td>
                                <td><?= $laporan['kelas_mahasiswa']; ?></td>
                                <?php if ($laporan['status_sanksi'] == 'Disetujui') : ?>
                                    <td><span class="badge text-bg-success"><?= $laporan['status_sanksi']; ?></span></td>
                                <?php elseif ($laporan['status_sanksi'] == 'Ditolak') : ?>
                                    <td><span class="badge text-bg-danger"><?= $laporan['status_sanksi']; ?></span></td>
                                <?php elseif ($laporan['status_sanksi'] == 'Dikerjakan') : ?>
                                    <td><span class="badge text-bg-dark"><?= $laporan['status_sanksi']; ?></span></td>
                                <?php elseif ($laporan['status_sanksi'] == 'Tertunda') : ?>
                                    <td><span class="badge text-bg-warning"><?= $laporan['status_sanksi']; ?></span></td>
                                <?php elseif ($laporan['status_sanksi'] == 'Selesai') : ?>
                                    <td><span class="badge text-bg-secondary"><?= $laporan['status_sanksi']; ?></span></td>
                                <?php elseif ($laporan['status_sanksi'] == 'Baru') : ?>
                                    <td><span class="badge text-bg-primary"><?= $laporan['status_sanksi']; ?></span></td>
                                <?php endif; ?>
                                <td>
                                    <a href="<?= BASEURL; ?>/AdminControllers/laporan/detail/<?= $laporan['id_laporan']; ?>" class="badge bg-primary tampilModalDetailLaporanAdminRole" data-bs-toggle="modal" data-bs-target="#detailModalLaporan" data-id_laporan="<?= $laporan['id_laporan']; ?>">Detail</a>
                                    <?php if ($laporan['file_kumpulSanksi'] !== NULL) : ?>
                                        <a href="<?= BASEURL; ?>/assets/file/suratSanksi/<?= $laporan['file_kumpulSanksi']; ?>" class="badge bg-info float-right" target="_blank">Surat</a>
                                    <?php endif; ?>
                                    <?php if ($laporan['file_buktiSanksiKhusus'] !== NULL) : ?>
                                        <a href="<?= BASEURL; ?>/assets/file/buktiTugasKhusus/<?= $laporan['file_buktiSanksiKhusus']; ?>" class="badge bg-secondary float-right" target="_blank">Bukti</a>
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


<!-- Modal Detail Laporan -->
<div class="modal fade" id="detailModalLaporan" tabindex="-1" aria-labelledby="detailModalLaporanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-vertically modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLaporanLabel">Detail Data Laporan</h5>
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
                        <td><strong>Nama Dosen</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailNamaDosen"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Keterangan</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailDeskripsi"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Tata Tertib</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailTataTertib"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Tingkat Sanksi</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailTingkatSanksi"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Bukti Laporan</strong></td>
                        <td><strong>:</strong></td>
                        <td><img id="detailBuktiLaporan" alt="Bukti Laporan" style="max-width: 100%;" /></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>