<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataTatib" data-bs-toggle="modal" data-bs-target="#formModalTatib">
                Tambah Data Tata Tertib
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/tatib/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Tatib.." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <h3>Daftar Tata Tertib</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Deskripsi Tata Tertib</th>
                    <th scope="col">Tingkat Sanksi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                if(empty($data['tatib'])) : ?>
                    <tr>
                      <td colspan="7">
                        <div class="alert alert-danger" role="alert">
                          Tidak ada data terkait.
                        </div>
                      </td>
                    </tr>
                  <?php else:
                foreach ($data['tatib'] as $tatib) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $tatib['deskripsi']; ?></td>
                        <td><?= $tatib['id_tingkatSanksi']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/tatib/detail/<?= $tatib['id_tatib']; ?>" class="badge bg-primary float-right tampilModalDetailTatib" data-bs-toggle="modal" data-bs-target="#detailModalTatib" data-id_tatib="<?= $tatib['id_tatib']; ?>">Detail</a>
                            <a href="<?= BASEURL; ?>/tatib/ubah/<?= $tatib['id_tatib']; ?>" class="badge bg-success float-right tampilModalUbahTatib" data-bs-toggle="modal" data-bs-target="#formModalTatib" data-id_tatib="<?= $tatib['id_tatib']; ?>">ubah</a>
                            <a href="<?= BASEURL; ?>/tatib/hapus/<?= $tatib['id_tatib']; ?>" class="badge bg-danger float-right" onclick="return confirm('Apakah Anda yakin untuk menghapus Data Tata tertib berikut?');">hapus</a>
                        </td>
                    </tr>
                <?php endforeach; 
                endif; ?>
            </tbody>
        </table>
    </div>

</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModalTatib" tabindex="-1" aria-labelledby="detailModalTatibLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalTatibLabel">Detail Data Tata Tertib</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <p><strong>Deskripsi:</strong> <br> <span id="detailDeskripsi"></span></p>
                </div>
                <div class="form-group">
                    <p><strong>Tingkat Sanksi:</strong> <span id="detailTingkatSanksi"></span></p>
                </div>
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
                <form action="<?= BASEURL; ?>/tatib/tambah" method="post">
                    <input type="hidden" name="id_tatib" id="id_tatib">
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Tata Tertib</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" autocomplete="off">
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