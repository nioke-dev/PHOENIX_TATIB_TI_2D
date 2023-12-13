<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TATIB</title>
    <link rel="shortcut icon" type="image/png" href="<?= BASEURL; ?>/assets/images/logos/tatib_icon.png" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/styles.min.css" />

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="<?= BASEURL; ?>/login" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="<?= BASEURL; ?>/assets/images/logos/new_logo.png" width="180" alt="">
                                </a>
                                <div class="alert alert-danger mb-3" id="alert-login" style="text-align:center;margin-bottom: 0;">
                                    Masukkan Username dan Password <br> (Menggunakan NIM / NIP &amp; Password : rahasia)</div>

                                <?php if (isset($data['error'])) : ?>
                                    <p style="color: red;"><?php echo $data['error']; ?></p>
                                <?php endif; ?>
                                <form action="<?= BASEURL; ?>/login/processLogin" method="post">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="username" class="form-control" id="username" placeholder="Masukkan NIM / NIP" name="username" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= BASEURL; ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sweetalert Declaration -->
    <script>
        <?php if (isset($_SESSION['sweetalert'])) : ?>
            Swal.fire({
                icon: '<?php echo $_SESSION['sweetalert']['icon']; ?>',
                title: '<?php echo $_SESSION['sweetalert']['title']; ?>',
                text: '<?php echo $_SESSION['sweetalert']['text']; ?>',
            });
            <?php unset($_SESSION['sweetalert']); ?>
        <?php endif; ?>
    </script>
</body>

</html>