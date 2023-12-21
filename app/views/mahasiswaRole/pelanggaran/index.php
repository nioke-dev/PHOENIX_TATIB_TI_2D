<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-dark">Daftar Pelanggaran</h4>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-auto">
                    <thead>
                        <tr>
                            <th scope="col" scope="col">No</th>
                            <th scope="col">ID Laporan</th>
                            <th scope="col">Nip Dosen</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">Status Sanksi</th>
                            <th scope="col">Tingkat Sanksi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data['pelanggaran'] as $pelanggaran) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $pelanggaran['id_laporan']; ?></td>
                                <td><?= $pelanggaran['nip_dosen']; ?></td>
                                <td><?= $pelanggaran['nama_dosen']; ?></td>
                                <?php if ($pelanggaran['status_sanksi'] == 'Disetujui') : ?>
                                    <td><span class="badge text-bg-success"><?= $pelanggaran['status_sanksi']; ?></span></td>
                                <?php elseif ($pelanggaran['status_sanksi'] == 'Ditolak') : ?>
                                    <td><span class="badge text-bg-danger"><?= $pelanggaran['status_sanksi']; ?></span></td>
                                <?php elseif ($pelanggaran['status_sanksi'] == 'Dikerjakan') : ?>
                                    <td><span class="badge text-bg-dark"><?= $pelanggaran['status_sanksi']; ?></span></td>
                                <?php elseif ($pelanggaran['status_sanksi'] == 'Tertunda') : ?>
                                    <td><span class="badge text-bg-warning"><?= $pelanggaran['status_sanksi']; ?></span></td>
                                <?php elseif ($pelanggaran['status_sanksi'] == 'Selesai') : ?>
                                    <td><span class="badge text-bg-secondary"><?= $pelanggaran['status_sanksi']; ?></span></td>
                                <?php elseif ($pelanggaran['status_sanksi'] == 'Baru') : ?>
                                    <td><span class="badge text-bg-primary"><?= $pelanggaran['status_sanksi']; ?></span></td>
                                <?php endif; ?>
                                <td><?= $pelanggaran['tingkat_sanksi']; ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/MahasiswaControllers/pelanggaran/detail/<?= $pelanggaran['id_laporan']; ?>" class="badge bg-primary float-right tampilModalDetailPelanggaran" data-bs-toggle="modal" data-bs-target="#detailModalPelanggaran" data-id_laporan="<?= $pelanggaran['id_laporan']; ?>">Detail</a>
                                    <?php if ($pelanggaran['id_statusSanksi'] == '1') : ?>
                                        <a href="<?= BASEURL; ?>/MahasiswaControllers/pelanggaran/setuju/<?= $pelanggaran['id_laporan']; ?>" onclick="return confirmActionSetujuLaporan('<?= BASEURL; ?>/MahasiswaControllers/pelanggaran/setuju/<?= $pelanggaran['id_laporan']; ?>')" class="badge bg-primary float-right" data-id_laporan="<?= $pelanggaran['id_laporan']; ?>">Setuju</a>
                                    <?php endif; ?>
                                    <?php if ($pelanggaran['id_statusSanksi'] == '2') : ?>
                                        <?php if ($data['getTingkatSanksi']['id_tingkatSanksi'] == '1' || $data['getTingkatSanksi']['id_tingkatSanksi'] == '2') : ?>
                                            <a href="<?= BASEURL; ?>/MahasiswaControllers/pelanggaran/kerjakan/<?= $pelanggaran['id_laporan']; ?>" class="badge bg-info float-right tampilModalUploadSuratSanksi" data-bs-toggle="modal" data-bs-target="#detailModalKerjakanSanksiKhusus" data-id_laporan="<?= $pelanggaran['id_laporan']; ?>">Kerjakan</a>
                                        <?php elseif ($data['getTingkatSanksi']['id_tingkatSanksi'] == '3') : ?>
                                            <a href="<?= BASEURL; ?>/MahasiswaControllers/pelanggaran/kerjakan/<?= $pelanggaran['id_laporan']; ?>" class="badge bg-info float-right tampilModalUploadSuratSanksiKhusus" data-bs-toggle="modal" data-bs-target="#detailModalKerjakanSanksiKhususTingkatTiga" data-id_laporan="<?= $pelanggaran['id_laporan']; ?>">Kerjakan</a>
                                        <?php else : ?>
                                            <a href="<?= BASEURL; ?>/MahasiswaControllers/pelanggaran/kerjakan/<?= $pelanggaran['id_laporan']; ?>" class="badge bg-info float-right tampilModalUploadSuratSanksi" data-bs-toggle="modal" data-bs-target="#detailModalKerjakanSanksi" data-id_laporan="<?= $pelanggaran['id_laporan']; ?>">Kerjakan</a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if ($pelanggaran['id_statusSanksi'] == '6' || $pelanggaran['id_statusSanksi'] == '2' || $pelanggaran['id_statusSanksi'] !== '5') : ?>
                                    <?php else : ?>
                                        <a href="<?= BASEURL; ?>/MahasiswaControllers/banding/tambah/<?= $pelanggaran['id_laporan']; ?>" class="badge bg-danger float-right tampilTambahDataBanding" data-bs-toggle="modal" data-bs-target="#formModalAjukanBanding" data-id_laporan="<?= $pelanggaran['id_laporan']; ?>">Banding</a>
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

<!-- Modal Kerjakan Sanksi Mahasiswa -->
<div class="modal fade" id="detailModalKerjakanSanksi" tabindex="-1" aria-labelledby="detailModalKerjakanSanksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalKerjakanSanksiLabel">Detail Pengerjaan Sanksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Silahkan Download Surat Sanksi Dibawah Ini Lalu Upload Pada Tempat Pengumpulan Dibawah, Proses 1x24 jam pada hari kerja untuk update status.</p>

                <button class="btn btn-primary mb-5"><a href="<?= BASEURL; ?>/assets/file/Surat_Peringatan.doc" style="color: white;">Download Surat Sanksi</a></button>
                <form action="<?= BASEURL; ?>/MahasiswaControllers/pelanggaran/uploadSuratSanksi" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_laporanKerjakanSanksi" id="id_laporanKerjakanSanksi">
                    <div class="form-group">
                        <label for="file_kumpulSanksi" class="form-label">Upload Surat Sanksi</label>
                        <input type="file" class="form-control" name="file_kumpulSanksi" id="file_kumpulSanksi" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Upload</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Kerjakan Sanksi Mahasiswa Tingkat 3 Saja -->
<div class="modal fade" id="detailModalKerjakanSanksiKhususTingkatTiga" tabindex="-1" aria-labelledby="detailModalKerjakanSanksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalKerjakanSanksiLabel">Detail Pengerjaan Sanksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Silahkan Download Surat Sanksi Dibawah Ini Lalu Upload Pada Tempat Pengumpulan Dibawah, Proses 1x24 jam pada hari kerja untuk update status.</p>

                <button class="btn btn-primary mb-5"><a href="<?= BASEURL; ?>/assets/file/Surat_Peringatan.doc" style="color: white;">Download Surat Sanksi</a></button>
                <form action="<?= BASEURL; ?>/MahasiswaControllers/pelanggaran/uploadSuratSanksiKhusus" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_laporanKerjakanSanksiKhusus" id="id_laporanKerjakanSanksiKhusus">
                    <div class="form-group">
                        <label for="file_kumpulSanksi" class="form-label">Upload Surat Sanksi</label>
                        <input type="file" class="form-control" name="file_kumpulSanksi" id="file_kumpulSanksi" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="file_buktiSanksiKhusus" class="form-label">Upload Bukti Sanksi</label>
                        <input type="file" class="form-control" name="file_buktiSanksiKhusus" id="file_buktiSanksiKhusus" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Upload</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Kerjakan Sanksi Mahasiswa tingkat pelanggaran 1 dan 2 -->
<div class="modal fade" id="detailModalKerjakanSanksiKhusus" tabindex="-1" aria-labelledby="detailModalKerjakanSanksiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalKerjakanSanksiLabel">Detail Pengerjaan Sanksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Silahkan Temui Admin Jurusan dan Dpa Anda</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Detail Mahasiswa Pelanggaran -->
<div class="modal fade" id="detailModalPelanggaran" tabindex="-1" aria-labelledby="detailModalPelanggaranLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalPelanggaranLabel">Detail Data Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td><strong>Keterangan</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailDeskripsiMahasiswaMelanggar"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Bukti Pelanggaran</strong></td>
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
                <form action="<?= BASEURL; ?>/MahasiswaControllers/banding/tambah" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_laporan" id="id_laporan">
                    <div class="form-group">
                        <label for="alasan_banding" class="form-label">Alasan Banding</label>
                        <textarea name="alasan_banding" class="form-control" id="alasan_banding" cols="30" rows="10" autocomplete="off" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file_bukti" class="form-label">Upload Bukti Banding</label>
                        <input type="file" class="form-control" name="file_bukti" id="file_bukti" required>
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