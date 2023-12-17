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
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>