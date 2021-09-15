<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"><?= $title; ?></h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Landing Page
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Card -->
        <div class="card shadow mb-3 border-left-primary">
            <!-- Card Header - Dropdown -->
            <div class="card-header py d-flex flex-row align-items-center justify-content-between col-lg">
                <h6 class="m-0 font-weight-bold text-dark">
                    <?php if ($profile['role_id'] == 1) {
                        echo 'Admin';
                    } else {
                        echo 'Member';
                    }
                    ?>
                    Landing Page</h6>
            </div>

            <!-- Card Body -->
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="card-title text-center">SETUP / INSTALL PAGE</h4>
                                <br />
                                <h5 class="card-subtitle text-bold text-dark"><b>Welcome,</b></h5>
                                <h6 class="card-subtitle text-dark">Selamat datang di halaman setup / install. Silahkan lengkapi isian dan informasi di bawah ini dan Anda akan segera bisa merasakan pengalaman membuat landing page dengan sangat mudah dan cepat, sesuai kebutuhan bisnis atau produk anda.</h6>
                                <hr />
                                <h4 class="card-title text-center">INFORMASI WEBSITE</h4>
                                <h5 class="card-subtitle text-dark">Silahkan lengkapi informasi di bawah ini!</h5>
                                <form class="form-horizontal needs-validation" method="post" action="<?= base_url('landingpage'); ?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <input type="hidden" class="form-control form-control-lg" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-0 h-100">Nama Domain / URL :</span>
                                                </div>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary text-white h-100" id="basic-addon1"><i class="mdi mdi-link-variant fs-4"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-lg" id="product-url" name="product-url" placeholder="Contoh : https://weboxbuilder.com/best_template_ppt" aria-label="Product URL" aria-describedby="basic-addon1" required="" autocomplete="on" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-12 form-group">
                                            <!-- <button class="btn btn-success text-white" type="submit">
                                                <i class="mdi mdi-library-plus fs-4 me-1"></i> Submit
                                            </button> -->
                                            <a class="btn btn-success text-white" href="<?= base_url('landingpage/new'); ?>">
                                                <i class="mdi mdi-library-plus fs-4 me-1"></i> Submit
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->