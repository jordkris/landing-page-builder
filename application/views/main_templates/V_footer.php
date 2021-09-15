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

<script src="<?= base_url('public'); ?>/dist/js/password.js"></script>
<script src="<?= base_url('public'); ?>/dist/js/custom-datatables.js"></script>
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
    $('#product-url').keyup(function(e) {
        var prefix = 'https://weboxbuilder.com/';
        if (this.value.length < prefix.length) {
            this.value = prefix;
        } else if (this.value.indexOf(prefix) !== 0) {
            this.value = prefix + String.fromCharCode(e.which);
        }
    });
    var form = $("#landingpage-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {},
    });
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            alert("Submitted!");
        },
    });
    $('.product-background-color').css('display', 'none');
    $('.product-background-image').css('display', 'none');
    $('input[name=radio-product-background]').change(() => {
        let val = $('input:radio:checked').val();
        if (val == 1) {
            $('.product-background-color').css('display', '');
            $('.product-background-image').css('display', 'none');
        } else {
            $('.product-background-color').css('display', 'none');
            $('.product-background-image').css('display', '');
        }
    });
    //custom steps
    $('[role="tablist"] li').addClass('d-inline-block col-lg-4');
    $('.steps').css('max-height', '188px').css('border', '1px solid #ccc').css('overflow', 'auto');
    // handle prev,next,finish button
    $('[role="menu"]').children().eq(0).attr('id', 'previous-button');
    $('#previous-button a').html('<i class="fas fa-chevron-circle-left"></i> Previous');
    $('[role="menu"]').children().eq(1).attr('id', 'next-button');
    $('#next-button a').html('Next <i class="fas fa-chevron-circle-right"></i>');
    $('[role="menu"]').children().eq(2).attr('id', 'finish-button');
    $('#finish-button a').html('Create & Publish <i class="mdi mdi-content-save"></i>');

    //handle price
    function number_format(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
    $(".number-input").inputFilter((value) => {
        return /^\d*$/.test(value); // Allow digits only, using a RegExp
    });
</script>
</body>

</html>