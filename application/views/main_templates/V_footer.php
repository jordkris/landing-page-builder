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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
<script src="<?= base_url('public'); ?>/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
<script src="<?= base_url('public'); ?>/assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?= base_url('public'); ?>/assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    localStorage.setItem('base_url', '<?= base_url(''); ?>');
    localStorage.setItem('user_id','<?= $profile['id']; ?>');
    localStorage.setItem('role_id','<?= $profile['role_id']; ?>');
</script>
<script src="<?= base_url('public'); ?>/dist/js/user.js"></script>
<script src="<?= base_url('public'); ?>/dist/js/password.js"></script>
<script src="<?= base_url('public'); ?>/dist/js/custom-datatables.js"></script>
<script src="<?= base_url('public'); ?>/dist/js/wizard-form.js"></script>

</body>

</html>