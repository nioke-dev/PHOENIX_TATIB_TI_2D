<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-dark">Profil Admin</h4>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <img src="<?= BASEURL; ?>/assets/images/profile/user-1.jpg" alt="" class="rounded-circle img-fluid">
                </div>
                <div class="col">
                    <h3>Informasi Pengguna</h3>
                    <div class="row">
                        <div class="col-6 mb-5">
                            <div class="form-group">
                                <label for="nip_admin" class="form-label">NIP :</label>
                                <input type="text" class="form-control" name="nip_admin" id="nip_admin" value="<?= $data['adm']['nip_admin']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-6 mb-5">
                            <div class="form-group">
                                <label for="nama_admin" class="form-label">Nama :</label>
                                <input type="text" class="form-control" name="nama_admin" id="nama_admin" value="<?= $data['adm']['nama_admin']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-6 mb-5">
                            <div class="form-group">
                                <label for="email_admin" class="form-label">Email :</label>
                                <input type="text" class="form-control" name="email_admin" id="email_admin" value="<?= $data['adm']['email_admin']; ?>" readonly>
                            </div>
                        </div>
                        <h3>Yuk Perbarui Kata Sandi Anda!</h3>
                        <div class="col-6 mb-5">
                            <form action="<?= BASEURL; ?>/AdminControllers/profile/changePassword" method="POST">
                                <div class="form-group">
                                    <label for="oldPassword" class="form-label">Kata Sandi Lama :</label>
                                    <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Masukkan Kata Sandi Lama" required autofocus>
                                </div>
                        </div>
                        <br>
                        <div class="col-6 mb-5">
                            <div class="form-group">
                                <label for="password" class="form-label">Kata Sandi Baru :</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Kata Sandi Baru" required autofocus>
                            </div>
                        </div>
                        <div class="col-6 mb-5">
                            <div class="form-group">
                                <label for="confirmPassword" class="form-label">Konfirmasi Kata Sandi :</label>
                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Masukkan Kata Sandi Baru Sekali Lagi" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-danger"><span><i class="bi bi-gear me-2"></i></span>Perbarui Kata Sandi</button>
        </form>
    </div>
</div>