<!-- Daftar Laporan -->
<div class="row">
    <h3>Daftar Laporan</h3>
    <table id="example" class="table table-striped" style="width:100%">
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
                    <td><?= $laporan['tgl_laporan']; ?></td>
                    <td><?= $laporan['nim_mahasiswa']; ?></td>
                    <td><?= $laporan['nama_mahasiswa']; ?></td>
                    <td><?= $laporan['kelas_mahasiswa']; ?></td>
                    <?php if ($laporan['status_sanksi'] == 'Baru') : ?>
                        <td><span class="badge bg-success"><?= $laporan['status_sanksi']; ?></span></td>
                    <?php endif; ?>
                    <td>
                        <a href="<?= BASEURL; ?>/AdminControllers/laporan/detail/<?= $laporan['id_laporan']; ?>" class="badge bg-primary tampilModalDetailLaporan" data-bs-toggle="modal" data-bs-target="#detailModalLaporan" data-id_laporan="<?= $laporan['id_laporan']; ?>">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- Modal Detail Laporan -->
<div class="modal fade" id="detailModalLaporan" tabindex="-1" aria-labelledby="detailModalLaporanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLaporanLabel">Detail Data Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td><strong>ID Laporan</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailIdLaporan"></span></td>
                    </tr>
                    <tr>
                        <td><strong>NIM Mahasiswa</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailNimMahasiswa"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailNamaMahasiswa"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Kelas</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailKelasMahasiswa"></span></td>
                    </tr>
                    <tr>
                        <td><strong>NIP Dosen</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailNipDosen"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Deskripsi</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailDeskripsi"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Tingkat Sanksi</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detaiTingkatSaknsi"></span></td>
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