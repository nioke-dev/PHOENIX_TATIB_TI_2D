<!-- Flash message -->
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>

<!-- Daftar Mahasiswa -->
<div class="row">
    <h3>Daftar Mahasiswa Melanggar</h3>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
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
            foreach ($data['mhs_melanggar'] as $mhs_melanggar) : ?>
                <tr>
                    <th><?= $no++; ?></th>
                    <td><?= $mhs_melanggar['nim_mahasiswa']; ?></td>
                    <td><?= $mhs_melanggar['nama_mahasiswa']; ?></td>
                    <td><?= $mhs_melanggar['kelas_mahasiswa']; ?></td>
                    <td><?= $mhs_melanggar['status_sanksi']; ?></td>
                    <td><?= $mhs_melanggar['tingkat_sanksi']; ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/DpaControllers/mahasiswaMelanggar/detail/<?= $mhs_melanggar['nim_mahasiswa']; ?>" class="badge bg-primary float-right tampilModalDetailMahasiswaMelanggar" data-bs-toggle="modal" data-bs-target="#detailModalMahasiswaMelanggar" data-nim_mahasiswa="<?= $mhs_melanggar['nim_mahasiswa']; ?>">Detail</a>
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
                <table class="table">
                    <tr>
                        <td><strong>NIM Mahasiswa</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailNimMahasiswaMelanggar"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Mahasiswa</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailNamaMahasiswaMelanggar"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Kelas Mahasiswa</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailKelasMahasiswaMelanggar"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Program Studi Mahasiswa</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailProdiMahasiswaMelanggar"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Email Mahasiswa</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailEmailMahasiswaMelanggar"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Status Sanksi Mahasiswa</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailStatusSanksiMahasiswaMelanggar"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Tingkat Sanksi Mahasiswa</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailTingkatSanksiMahasiswaMelanggar"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Bukti Laporan</strong></td>
                        <td><strong>:</strong></td>
                        <td><img id="detailBuktiLaporan" alt="Bukti Laporan" style="max-width: 100%;" /></td>
                    </tr>
                </table>

                <!-- <div class="form-group">
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
                    <p><strong>Keterangan:</strong> <span id="detailDeskripsi"></span></p>
                </div>
                <div class="form-group">
                    <p><strong>Status Sanksi Mahasiswa:</strong> <span id="detailStatusSanksiMahasiswaMelanggar"></span></p>
                </div>
                <div class="form-group">
                    <p><strong>Tingkat Sanksi Mahasiswa:</strong> <span id="detailTingkatSanksiMahasiswaMelanggar"></span></p>
                </div>
                <div class="form-group">
                    <p><strong>Bukti Laporan:</strong></p>
                    <img id="detailBuktiLaporan" alt="Bukti Laporan" style="max-width: 100%;" />
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>