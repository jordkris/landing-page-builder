</div>
</div>
</div>
<!-- ============================================================== -->
<!-- Login box.scss -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper scss in scafholding.scss -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper scss in scafholding.scss -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right Sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right Sidebar -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- All Required js -->
<!-- ============================================================== -->
<script src="<?= base_url('public'); ?>/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url('public'); ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script>
    $(".preloader").fadeOut();
    let passwordIds = ['#password1', '#password2'];
    passwordIds.forEach((passwordId) => {
        $(passwordId+'-eye').click(() => {
            let icon = passwordId+'-eye > span > i';
            if ($(icon).hasClass('mdi-eye')) {
                $(icon).removeClass('mdi-eye').addClass('mdi-eye-off');
                $(passwordId).attr('type', 'password');
            } else if ($(icon).hasClass('mdi-eye-off')) {
                $(icon).removeClass('mdi-eye-off').addClass('mdi-eye');
                $(passwordId).attr('type', 'text');
            }
        });
    });
</script>
</body>

</html>