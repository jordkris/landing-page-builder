<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center">
    Copyright © 2021 WebOX, All Rights Reserved
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= base_url('public'); ?>/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url('public'); ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('public'); ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url('public'); ?>/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?= base_url('public'); ?>/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?= base_url('public'); ?>/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url('public'); ?>/dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!-- <script src="<?= base_url('public'); ?>/dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<script src="<?= base_url('public'); ?>/assets/libs/flot/excanvas.js"></script>
<script src="<?= base_url('public'); ?>/assets/libs/flot/jquery.flot.js"></script>
<script src="<?= base_url('public'); ?>/assets/libs/flot/jquery.flot.pie.js"></script>
<script src="<?= base_url('public'); ?>/assets/libs/flot/jquery.flot.time.js"></script>
<script src="<?= base_url('public'); ?>/assets/libs/flot/jquery.flot.stack.js"></script>
<script src="<?= base_url('public'); ?>/assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="<?= base_url('public'); ?>/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="<?= base_url('public'); ?>/dist/js/pages/chart/chart-page-init.js"></script>

<script src="<?= base_url('public'); ?>/dist/js/password.js"></script>
<script>
    $('#flash-message').click(() => {
        let url = "<?= base_url('auth/session_destroy'); ?>";
        $.ajax({
            url: url,
            method: 'get',
            success: () => {
                console.log('Notifikasi berhasil terhapus');
            },
            error: (e) => {
                console.log(url);
                console.log(e);
            }
        });
    });
</script>
</body>

</html>