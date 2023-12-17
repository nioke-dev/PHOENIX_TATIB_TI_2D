    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                            <i class="ti ti-bell-ringing"></i>
                            <div class="notification bg-primary rounded-circle"></div>
                        </a>
                    </li>
                </ul>
                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                        <a><?php foreach ($data['nama'] as $nama) : ?>
                                <?= $nama; ?>
                            <?php endforeach; ?></a>
                        <!-- <a href="./authentication-login.html" target="_blank" class="btn btn-primary">Log Out</a> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?= BASEURL; ?>/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                <div class="message-body">
                                    <?php if ($_SESSION['user_type'] == 'admin') : ?>
                                        <a href="<?= BASEURL; ?>/AdminControllers/profile" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">Profil</p>
                                        </a>
                                    <?php elseif ($_SESSION['user_type'] == 'dosen') : ?>
                                        <a href="<?= BASEURL; ?>/DosenControllers/profile" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">Profil</p>
                                        </a>
                                    <?php elseif ($_SESSION['user_type'] == 'dpa') : ?>
                                        <a href="<?= BASEURL; ?>/DpaControllers/profile" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">Profil</p>
                                        </a>
                                    <?php elseif ($_SESSION['user_type'] == 'mahasiswa') : ?>
                                        <a href="<?= BASEURL; ?>/MahasiswaControllers/profile" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">Profil</p>
                                        </a>
                                    <?php endif; ?>

                                    <a href="<?= BASEURL; ?>/login/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--  Header End -->
        <div class="container-fluid mb-5">