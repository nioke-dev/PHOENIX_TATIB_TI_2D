<!-- Flash message -->
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>

<!-- Daftar Pelanggaran -->
<div class="row">
    <h3>Daftar Pelanggaran</h3>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Laporan</th>
                <th>Nim Mahasiswa</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Status Sanksi</th>
                <th>Tingkat Sanksi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($data['pelanggaran'] as $pelanggaran) : ?>
                <tr>
                    <th><?= $no++; ?></th>
                    <td><?= $pelanggaran['id_laporan']; ?></td>
                    <td><?= $pelanggaran['nim_mahasiswa']; ?></td>
                    <td><?= $pelanggaran['nama_mahasiswa']; ?></td>
                    <td><?= $pelanggaran['kelas_mahasiswa']; ?></td>
                    <td><?= $pelanggaran['status_sanksi']; ?></td>
                    <td><?= $pelanggaran['tingkat_sanksi']; ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/DpaControllers/mahasiswaMelanggar/detail/<?= $pelanggaran['nim_mahasiswa']; ?>" class="badge bg-primary float-right tampilModalDetailMahasiswaMelanggar" data-bs-toggle="modal" data-bs-target="#detailModalMahasiswaMelanggar" data-id_laporan="<?= $pelanggaran['id_laporan']; ?>">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>

<!-- Modal Detail Mahasiswa -->
<div class="modal fade" id="detailModalMahasiswaMelanggar" tabindex="-1" aria-labelledby="detailModalMahasiswaMelanggarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalMahasiswaMelanggarLabel">Detail Data Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p><strong>NIM Mahasiswa:</strong> <span id="detailNimMahasiswaMelanggar"></span></p>
                </div>
                <div class="form-group">
                    <p><strong>Nama Mahasiswa:</strong> <span id="detailNamaMahasiswaMelanggar"></span></p>
                </div>
                <div class="form-group">
                    <p><strong>Kelas Mahasiswa:</strong> <span id="detailKelasMahasiswaMelanggar"></span></p>
                </div>
                <div class="form-group">
                    <p><strong>Program Studi Mahasiswa:</strong> <span id="detailProdiMahasiswaMelanggar"></span></p>
                </div>
                <div class="form-group">
                    <p><strong>Email Mahasiswa:</strong> <span id="detailEmailMahasiswaMelanggar"></span></p>
                </div>
                <div class="form-group">
                    <p><strong>Status Sanksi Mahasiswa:</strong> <span id="detailStatusSanksiMahasiswaMelanggar"></span></p>
                </div>
                <div class="form-group">
                    <p><strong>Tingkat Sanksi Mahasiswa:</strong> <span id="detailTingkatSanksiMahasiswaMelanggar"></span></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>