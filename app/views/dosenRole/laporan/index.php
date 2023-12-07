<!-- Tambah Data Laporan -->
<div class="row mb-3">
    <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahDataLaporan" data-bs-toggle="modal" data-bs-target="#formModalLaporan">
            Tambah Data Laporan
        </button>
    </div>
</div>

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
                    <td>
                        <a href="<?= BASEURL; ?>/AdminControllers/laporan/detail/<?= $laporan['id_laporan']; ?>" class="badge bg-primary tampilModalDetailLaporan" data-bs-toggle="modal" data-bs-target="#detailModalLaporan" data-id_laporan="<?= $laporan['id_laporan']; ?>">Detail</a>
                        <a href="<?= BASEURL; ?>/AdminControllers/laporan/status/<?= $laporan['id_laporan']; ?>" class="badge bg-success tampilModalStatusLaporan" data-bs-toggle="modal" data-bs-target="#statusModalLaporan" data-id_laporan="<?= $laporan['id_laporan']; ?>">Status</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

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
                <div class="form-group">
                    <p><strong>ID Laporan:</strong> <span id="detailIdLaporan"></span></p>
                </div>
                <div class="form-group">
                    <p><strong>Nim Mahasiswa:</strong> <span id="detailNimMahasiswa"></span></p>
                </div>

                <div class="form-group">
                    <p><strong>Nama:</strong> <span id="detailNamaMahasiswa"></span></p>
                </div>

                <div class="form-group">
                    <p><strong>Kelas:</strong> <span id="detailKelasMahasiswa"></span></p>
                </div>

                <div class="form-group">
                    <p><strong>Nip Dosen:</strong> <span id="detailNipDosen"></span></p>
                </div>

                <div class="form-group">
                    <p><strong>Deskripsi:</strong> <span id="detailDeskripsi"></span></p>
                </div>

                <div class="form-group">
                    <p><strong>Tingkat Sanksi:</strong> <span id="detaiTingkatSaknsi"></span></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Laporan -->



<div class="modal fade" id="formModalLaporan" aria-labelledby="formModalLaporanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="formModalLaporanLabel">Tambah Data Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/DosenControllers/laporan/tambah" method="post">
                    <input type="hidden" name="id_user" id="id_user">
                    <div class="form-group">
                        <label for="nim_ahasiswa">Mahasiswa</label>
                        <select class="form-select select-mahasiswa-laporkan" id="nim_mahasiswa" name="nim_mahasiswa" autocomplete="off" required>
                            <?php
                            foreach ($data['mahasiswa'] as $mahasiswa) : ?>
                                <option value="<?= $mahasiswa['nim_mahasiswa']; ?>"><?= $mahasiswa['nama_mahasiswa']; ?> - <?= $mahasiswa['kelas_mahasiswa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tingkat_sanksi">Tingkat Pelanggaran</label>
                        <select class="form-control choices-single" id="id_tingkatSanksi" name="id_tingkatSanksi" autocomplete="off" required>
                            <option></option>
                            <option value="6">V</option>
                            <option value="5">IV</option>
                            <option value="4">III</option>
                            <option value="3">II</option>
                            <option value="2">I/II</option>
                            <option value="1">I</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi Laporan" autocomplete="off" required>
                    </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="submit" class="btn btn-success">Kirim</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Status Laporan -->
<div class="modal fade" id="statusModalLaporan" tabindex="-1" aria-labelledby="statusModalLaporanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLaporanLabel">Status Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p><strong>Status Sanksi :</strong> <span id="statusModalLaporanLabel"></span></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>