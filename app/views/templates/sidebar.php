  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <!-- Sidebar Start -->
      <aside class="left-sidebar">
          <!-- Sidebar scroll-->
          <div>
              <div class="brand-logo d-flex align-items-center justify-content-between">
                  <a href="./index.html" class="text-nowrap logo-img">
                      <img src="<?= BASEURL; ?>/assets/images/logos/logos.png" width="180" alt="" />
                  </a>
                  <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                      <i class="ti ti-x fs-8"></i>
                  </div>
              </div>
              <!-- Sidebar navigation-->
              <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                  <ul id="sidebarnav">
                      <li class="nav-small-cap">
                          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                          <span class="hide-menu">Home</span>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="<?= BASEURL; ?>/home" aria-expanded="false">
                              <span>
                                  <i class="ti ti-layout-dashboard"></i>
                              </span>
                              <span class="hide-menu">Dashboard</span>
                          </a>
                      </li>
                      <li class="nav-small-cap">
                          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                          <span class="hide-menu">Menu</span>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="<?= BASEURL; ?>/mahasiswa" aria-expanded="false">
                              <span>
                                  <!-- <i class="bi bi-people"></i> -->
                                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-people" viewBox="0 0 17 17">
  <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
</svg>
                              </span>
                              <span class="hide-menu">Mahasiswa</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="<?= BASEURL; ?>/dosen" aria-expanded="false">
                              <span>
                                  <!-- <i class="ti ti-cards"></i> -->
                                  <i class="ti ti-id"></i>
                              </span>
                              <span class="hide-menu">Dosen</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="<?= BASEURL; ?>/dpa" aria-expanded="false">
                              <span>
                                  <i class="ti ti-cards"></i>
                              </span>
                              <span class="hide-menu">DPA</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="<?= BASEURL; ?>/matkul" aria-expanded="false">
                              <span>
                                  <i class="ti ti-file-description"></i>
                              </span>
                              <span class="hide-menu">Matkul Dosen</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="<?= BASEURL; ?>/admin" aria-expanded="false">
                              <span>
                                  <i class="ti ti-file-description"></i>
                              </span>
                              <span class="hide-menu">Admin</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="<?= BASEURL; ?>/tatib" aria-expanded="false">
                              <span>
                                  <!-- <i class="ti ti-typography"></i> -->
                                  <i class="ti ti-article"></i>
                              </span>
                              <span class="hide-menu">Tata Tertib</span>
                          </a>
                      </li>
                      <li class="nav-small-cap">
                          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                          <span class="hide-menu">SETTINGS</span>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                              <span>
                                  <i class="ti ti-mood-happy"></i>
                              </span>
                              <span class="hide-menu">Login</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                              <span>
                                  <i class="ti ti-user-plus"></i>
                              </span>
                              <span class="hide-menu">Register</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="<?= BASEURL; ?>/about" aria-expanded="false">
                              <span>
                                  <i class="ti ti-alert-circle"></i>
                              </span>
                              <span class="hide-menu">About</span>
                          </a>
                      </li>
                      <li class="nav-small-cap">
                          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                          <span class="hide-menu">EXTRA</span>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                              <span>
                                  <i class="ti ti-mood-happy"></i>
                              </span>
                              <span class="hide-menu">Icons</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                              <span>
                                  <i class="ti ti-aperture"></i>
                              </span>
                              <span class="hide-menu">Sample Page</span>
                          </a>
                      </li>
                  </ul>
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