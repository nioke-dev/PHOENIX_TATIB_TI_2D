<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="./home" class="text-nowrap logo-img">
                    <img src="<?= BASEURL; ?>/assets/images/logos/new_logo.png" width="180" alt="" />
                </a>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <!-- side Bar Admin -->
                    <?php if ($_SESSION['user_type'] == 'admin') : ?>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/AdminControllers/home" aria-expanded="false">
                                <span>
                                    <i class="bi bi-house-door-fill"></i>
                                </span>
                                <span class="hide-menu">Dashboard Admin</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Menu</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/AdminControllers/mahasiswa" aria-expanded="false">
                                <span>
                                    <i class="bi bi-people-fill"></i>
                                </span>
                                <span class="hide-menu">Mahasiswa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/AdminControllers/dosen" aria-expanded="false">
                                <span>
                                    <i class="bi bi-person-lines-fill"></i>
                                </span>
                                <span class="hide-menu">Dosen</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/AdminControllers/dpa" aria-expanded="false">
                                <span>
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <span class="hide-menu">DPA</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/AdminControllers/admin" aria-expanded="false">
                                <span>
                                    <i class="bi bi-emoji-laughing-fill"></i>
                                </span>
                                <span class="hide-menu">Admin</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/AdminControllers/tatib" aria-expanded="false">
                                <span>
                                    <i class="bi bi-list-task"></i>
                                </span>
                                <span class="hide-menu">Tata Tertib</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/AdminControllers/mahasiswaMelanggar" aria-expanded="false">
                                <span>
                                    <i class="bi bi-exclamation-triangle"></i>
                                </span>
                                <span class="hide-menu">Mahasiswa Melanggar</span>
                            </a>
                        </li>
                        <!-- download tatib.pdf  -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Tata tertib</span>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= BASEURL; ?>/assets/file/Tata_tertib.pdf" class="badge bg-danger float-right" download><i class="bi bi-file-earmark-arrow-down"></i> Download .pdf</a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">More</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/AdminControllers/about" aria-expanded="false">
                                <span>
                                    <i class="bi bi-info-circle"></i>
                                </span>
                                <span class="hide-menu">About</span>
                            </a>
                        </li>


                        <!-- side Bar Mahasiswa -->
                    <?php elseif ($_SESSION['user_type'] == 'mahasiswa') : ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/MahasiswaControllers/home" aria-expanded="false">
                                <span>
                                    <i class="bi bi-house-door-fill"></i>
                                </span>
                                <span class="hide-menu">Dashboard Mahasiswa</span>
                            </a>
                        </li>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Menu</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/MahasiswaControllers/pelanggaran" aria-expanded="false">
                                <span>
                                    <i class="bi bi-exclamation-triangle"></i>
                                </span>
                                <span class="hide-menu">Pelanggaran</span>
                            </a>
                        

                        <!-- download tatib.pdf  -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Tata tertib</span>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= BASEURL; ?>/assets/file/Tata_tertib.pdf" class="badge bg-danger float-right" download><i class="bi bi-file-earmark-arrow-down"></i> Download .pdf</a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">More</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/DpaControllers/about" aria-expanded="false">
                                <span>
                                    <i class="bi bi-info-circle"></i>
                                </span>
                                <span class="hide-menu">About</span>
                            </a>
                        </li>


                        <!-- side Bar Dosen -->
                    <?php elseif ($_SESSION['user_type'] == 'dosen') : ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/DosenControllers/home" aria-expanded="false">
                                <span>
                                    <i class="bi bi-house-door-fill"></i>
                                </span>
                                <span class="hide-menu">Dashboard Dosen</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Menu</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/DosenControllers/laporan" aria-expanded="false">
                                <span>
                                    <i class="bi bi-exclamation-triangle"></i>
                                </span>
                                <span class="hide-menu">Laporkan Mahasiswa</span>
                            </a>
                        </li>
                        <!-- download tatib.pdf  -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Tata tertib</span>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= BASEURL; ?>/assets/file/Tata_tertib.pdf" class="badge bg-danger float-right" download><i class="bi bi-file-earmark-arrow-down"></i> Download .pdf</a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">More</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/DpaControllers/about" aria-expanded="false">
                                <span>
                                    <i class="bi bi-info-circle"></i>
                                </span>
                                <span class="hide-menu">About</span>
                            </a>
                        </li>

                        <!-- side Bar Dpa -->
                    <?php elseif ($_SESSION['user_type'] == 'dpa') : ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/DpaControllers/home" aria-expanded="false">
                                <span>
                                    <i class="bi bi-house-door-fill"></i>
                                </span>
                                <span class="hide-menu">Dashboard DPA</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Menu</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/DpaControllers/mahasiswaMelanggar" aria-expanded="false">
                                <span>
                                    <i class="bi bi-exclamation-triangle"></i>
                                </span>
                                <span class="hide-menu">Mahasiswa Melanggar</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Tata tertib</span>
                        </li>
                        <!-- download tatib.pdf  -->
                        <li class="sidebar-item">
                            <a href="<?= BASEURL; ?>/assets/file/Tata_tertib.pdf" class="badge bg-danger float-right" download><i class="bi bi-file-earmark-arrow-down"></i> Download .pdf</a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">More</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= BASEURL; ?>/DpaControllers/about" aria-expanded="false">
                                <span>
                                    <i class="bi bi-info-circle"></i>
                                </span>
                                <span class="hide-menu">About</span>
                            </a>
                        </li>
                        
                    <?php endif; ?>
                </ul>
                <br><br><br><br>
                <br><br><br><br>
                <!-- <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
                    <div class="d-flex">
                        <div class="unlimited-access-title me-3">
                            <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                            <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
                        </div>
                        <div class="unlimited-access-img">
                            <img src="<?= BASEURL; ?>/assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div> -->
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->