</div>
<div class="py-6 px-6 text-center bg-light fixed-bottom">
    <p class="mb-0 fs-4">Design and Developed by <a href="https://www.nioke-studio.my.id/public" target="_blank" class="pe-1 text-primary text-decoration-underline">Phoenix Team</a> Distributed by <a href="https://github.com/nioke-dev/PHOENIX_TATIB_TI_2D">Phoenix Team</a></p>
</div>
</div>
</div>
<!-- old -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
<script src="<?= BASEURL; ?>/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= BASEURL; ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/sidebarmenu.js"></script>
<script src="<?= BASEURL; ?>/assets/js/app.min.js"></script>
<script src="<?= BASEURL; ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="<?= BASEURL; ?>/assets/libs/simplebar/dist/simplebar.js"></script>
<script src="<?= BASEURL; ?>/assets/js/dashboard.js"></script>
<!-- <script src="<?= BASEURL; ?>/sweetalert/sweetalert2.all.min.js"></script> -->

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

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= BASEURL; ?>/js/script.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "emptyTable": "Tidak ada data yang tersedia"
            }
        });
    });
</script>
</body>

</html>