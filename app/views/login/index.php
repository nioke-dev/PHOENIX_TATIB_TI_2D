<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="<?= BASEURL; ?>/assets/images/logos/favicon.png" />
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
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="<?= BASEURL; ?>/assets/images/logos/dark-logo.svg" width="180" alt="">
                                </a>
                                <p class="text-center">Your Social Campaigns</p>

                                <?php if (isset($data['error'])) : ?>
                                    <p style="color: red;"><?php echo $data['error']; ?></p>
                                <?php endif; ?>
                                <form action="<?= BASEURL; ?>/login/processLogin" method="post">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="username" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                Remeber this Device
                                            </label>
                                        </div>
                                        <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                                        <a class="text-primary fw-bold ms-2" href="./authentication-register.html">Create an account</a>
                                    </div>
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