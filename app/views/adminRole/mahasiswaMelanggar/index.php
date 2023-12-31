<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-dark">Daftar Mahasiswa Melanggar</h4>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-auto" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nim Mahasiswa</th>
                            <th>Nama</th>
                            <th>Kelas</th>
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
                                <td><?= $mhs_melanggar['tingkat_sanksi']; ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/AdminControllers/mahasiswaMelanggar/detail/<?= $mhs_melanggar['nim_mahasiswa']; ?>" class="badge bg-primary float-right tampilModalDetailMahasiswaMelanggar" data-bs-toggle="modal" data-bs-target="#detailModalMahasiswaMelanggar" data-nim_mahasiswa="<?= $mhs_melanggar['nim_mahasiswa']; ?>">Detail</a>
                                    <a href="<?= BASEURL; ?>/AdminControllers/mahasiswaMelanggar/ubah/<?= $mhs_melanggar['nim_mahasiswa']; ?>" class="badge bg-success float-right tampilModalUbahMahasiswaMelanggar" data-bs-toggle="modal" data-bs-target="#formModalMahasiswaMelanggar" data-nim_mahasiswa="<?= $mhs_melanggar['nim_mahasiswa']; ?>">Ubah</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
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
                        <td><strong>Jumlah Pelanggaran</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailJumlahPelanggaranMahasiswaMelanggar"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah/Edit Mahasiswa -->
<div class="modal fade" id="formModalMahasiswaMelanggar" tabindex="-1" aria-labelledby="formModalMahasiswaMelanggarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalMahasiswaMelanggarLabel">Ubah Data Mahasiswa Melanggar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/AdminControllers/mahasiswaMelanggar/ubah" method="post">
                    <input type="hidden" name="nim_mahasiswa" id="nim_mahasiswa">
                    <div class="form-group">
                        <label for="id_tingkatSanksi">Tingkat Sanksi</label>
                        <select class="form-control choices-single" id="id_tingkatSanksi" name="id_tingkatSanksi" autocomplete="off" required>
                            <option></option>
                            <option value="6">V</option>
                            <option value="5">IV</option>
                            <option value="4">III</option>
                            <option value="3">II</option>
                            <option value="2">I/II</option>
                            <option value="1">I</option>
                        </select>
                        <input type="hidden" name="id_tingkatSanksiLama" id="id_tingkatSanksiLama">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>