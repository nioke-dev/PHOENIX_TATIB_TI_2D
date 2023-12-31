<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center">
        <div class="col-6">
            <h4 class="m-0 font-weight-bold text-dark">Daftar Tata Tertib</h4>
        </div>
        <div class="col-6 text-end">
            <button type="button" class="btn btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#formModalUploadTatib">
                Upload Tata Tertib
            </button>
            <button type="button" class="btn btn-primary tombolTambahDataTatib" data-bs-toggle="modal" data-bs-target="#formModalTatib">
                Tambah Tata Tertib
            </button>
        </div>
    </div>

    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-auto" style="width:100%; table-layout: auto;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="width: 65%;">Deskripsi Tata Tertib</th>
                            <th>Tingkat Sanksi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data['tatib'] as $tatib) : ?>
                            <tr>
                                <th><?= $no++; ?></th>
                                <td><?= $tatib['deskripsi']; ?></td>
                                <td><?= $tatib['tingkat_sanksi']; ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/AdminControllers/tatib/detail/<?= $tatib['id_tatib']; ?>" class="badge bg-primary float-right tampilModalDetailTatib" data-bs-toggle="modal" data-bs-target="#detailModalTatib" data-id_tatib="<?= $tatib['id_tatib']; ?>">Detail</a>
                                    <a href="<?= BASEURL; ?>/AdminControllers/tatib/ubah/<?= $tatib['id_tatib']; ?>" class="badge bg-success float-right tampilModalUbahTatib" data-bs-toggle="modal" data-bs-target="#formModalTatib" data-id_tatib="<?= $tatib['id_tatib']; ?>">Ubah</a>
                                    <a href="<?= BASEURL; ?>/AdminControllers/tatib/hapus/<?= $tatib['id_tatib']; ?>" class="badge bg-danger float-right" onclick="return confirmAction('<?= BASEURL; ?>/AdminControllers/tatib/hapus/<?= $tatib['id_tatib']; ?>')">Hapus</a>
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
<div class="modal fade" id="detailModalTatib" tabindex="-1" aria-labelledby="detailModalTatibLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalTatibLabel">Detail Data Tata Tertib</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td><strong>Deskripsi Tata Tertib</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailDeskripsi"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Tingkat Sanksi</strong></td>
                        <td><strong>:</strong></td>
                        <td><span id="detailTingkatSanksi"></span></td>
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
<div class="modal fade" id="formModalTatib" tabindex="-1" aria-labelledby="formModalTatibLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalTatibLabel">Tambah Data Tatib</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/AdminControllers/tatib/tambah" method="post">
                    <input type="hidden" name="id_tatib" id="id_tatib">
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Tata Tertib</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" autocomplete="off" cols="30" rows="10" required></textarea>
                        <input type="hidden" id="deskripsiLama" name="deskripsiLama">
                    </div>
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
                        <input type="hidden" id="id_tingkatSanksiLama" name="id_tingkatSanksiLama">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Upload Tatib -->
<div class="modal fade" id="formModalUploadTatib" tabindex="-1" aria-labelledby="formModalTatibLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalTatibLabel">Upload Data Tatib</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/AdminControllers/tatib/upload" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fileTatib" class="form-label">Upload File Tata Tertib Terbaru</label>
                        <input type="file" class="form-control" id="fileTatib" name="fileTatib">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Upload</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </form>
            </div>
        </div>
    </div>
</div>