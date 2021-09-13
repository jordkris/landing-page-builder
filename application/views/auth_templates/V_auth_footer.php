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
<script src="<?= base_url('public'); ?>/dist/js/password.js"></script>
<script>
    $(".preloader").fadeOut();
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