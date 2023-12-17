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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        .password-container {
            width: 100%;
            position: relative;
        }

        .password-container input[type="password"],
        .password-container input[type="text"] {
            width: 100%;
            padding: 12px 36px 12px 12px;
            box-sizing: border-box;
        }

        .fa-eye {
            position: absolute;
            top: 35%;
            right: 4%;
            cursor: pointer;
            color: lightgray;
        }
    </style>

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
                                    Masukkan Nama Pengguna dan Kata Sandi <br> (Menggunakan NIM / NIP &amp; Kata Sandi : rahasia)</div>

                                <?php if (isset($data['error'])) : ?>
                                    <p style="color: red;"><?php echo $data['error']; ?></p>
                                <?php endif; ?>
                                <form action="<?= BASEURL; ?>/login/processLogin" method="post">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Nama Pengguna</label>
                                        <input type="username" class="form-control" id="username" placeholder="Masukkan NIM / NIP" name="username" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Kata Sandi</label>
                                        <div class="password-container">
                                            <div class="password-container">
                                                <input type="password" class="form-control" id="password" placeholder="Masukkan Kata Sandi" name="password">
                                                <i class="fa-solid fa-eye fa-eye-slash" id="eye"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">LOGIN</button>
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


        const passwordField = document.querySelector("#password");
        const eyeIcon = document.querySelector("#eye");

        eye.addEventListener("click", function() {
            this.classList.toggle("fa-eye-slash");
            const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);
        })
    </script>
</body>

</html>