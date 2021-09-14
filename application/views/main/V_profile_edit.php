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
                            <li class="breadcrumb-item"><a href="<?= base_url('profile'); ?>">Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?= $title; ?>
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
                    Profile</h6>
            </div>

            <!-- Card Body -->
            <div class="row no-gutters">
                <div class="col-md-3">
                    <img style="width: 100%; height: auto;" src="<?= base_url('public/assets/images/users/') . $profile['image']; ?>" class="card-img-left">
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row text-center">
                            <div class="col-4 form-group">
                                <a href="<?= base_url('change_image'); ?>" class="btn btn-primary text-white">
                                    <i class="mdi mdi-image-area"></i> Edit Foto Profil
                                </a>
                            </div>
                            <div class="col-4 form-group"></div>
                            <div class="col-4 form-group">
                                <a href="<?= base_url('profile/changepassword'); ?>" class="btn btn-primary text-white">
                                    <i class="mdi mdi-key"></i> Edit Password
                                </a>
                            </div>
                        </div>
                        <!-- Form -->
                        <form class="form-horizontal needs-validation" method="post" action="<?= base_url('profile/edit'); ?>">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <input type="hidden" class="form-control form-control-lg" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" name="username" value="<?= $profile['username']; ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="" autocomplete="on" />
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" name="name" value="<?= $profile['name']; ?>" placeholder="Nama" aria-label="Name" aria-describedby="basic-addon1" required="" autocomplete="on" />
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-12 form-group">
                                    <button class="btn btn-success text-white" type="submit">
                                        <i class="mdi mdi-account-edit fs-4 me-1"></i> Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->