<!-- Flash message -->
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>

<!-- Daftar Pelanggaran -->
<div class="row">
    <h3>Daftar Pelanggaran</h3>
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
                        <td>
                            <span class="badge text-bg-primary"><?= $pelanggaran['status_sanksi']; ?></span>
                        </td>
                        <td><?= $pelanggaran['tingkat_sanksi']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/MahasiswaControllers/pelanggaran/detail/<?= $pelanggaran['id_laporan']; ?>" class="badge bg-primary float-right tampilModalDetailPelanggaran" data-bs-toggle="modal" data-bs-target="#detailModalPelanggaran" data-id_laporan="<?= $pelanggaran['id_laporan']; ?>">Detail</a>
                            <a href="<?= BASEURL; ?>/MahasiswaControllers/pelanggaran/setuju/<?= $pelanggaran['id_laporan']; ?>" onclick="return confirmAction('<?= BASEURL; ?>/MahasiswaControllers/pelanggaran/setuju/<?= $pelanggaran['id_laporan']; ?>')" class="badge bg-primary float-right" data-id_laporan="<?= $pelanggaran['id_laporan']; ?>">Setuju</a>
                            <a href="<?= BASEURL; ?>/MahasiswaControllers/pelanggaran/kerjakan/<?= $pelanggaran['id_laporan']; ?>" class="badge bg-info float-right tampilModalUploadSuratSanksi" data-bs-toggle="modal" data-bs-target="#detailModalKerjakanSanksi" data-id_laporan="<?= $pelanggaran['id_laporan']; ?>">Kerjakan</a>
                            <?php if ($pelanggaran['id_statusSanksi'] == '6' || $pelanggaran['id_statusSanksi'] == '2') : ?>
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

<!-- Modal Kerjakan Sanksi Mahasiswa -->
<div class="modal fade" id="detailModalKerjakanSanksi" tabindex="-1" aria-labelledby="detailModalKerjakanSanksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalKerjakanSanksiLabel">Detail Pengerjaan Sanksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Silahkan Download Surat Sanksi Dibawah Ini Lalu Upload Pada Tempat Pengumpulan Dibawah, Proses 1x24 jam pada hari kerja untuk update status</p>

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