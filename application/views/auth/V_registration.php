<div class="auth-box bg-dark border-top border-secondary py-3 px-3 mx-2">
    <div>
        <div class="text-center text-white">
            <span class="db"><img id="img-logo" src="<?= base_url('public'); ?>/assets/images/webox-logo.png" alt="logo" /></span>
            <h3>WebOX Builder</h3>
        </div>
        <!-- Form -->
        <form class="form-horizontal needs-validation mt-3" method="post" action="<?= base_url('auth/registration'); ?>">
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3" >
                        <input type="hidden" class="form-control form-control-lg" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i class="mdi mdi-face-profile fs-4"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg <?php if (isset($this->form_validation->error_array()['name'])) echo 'is-invalid'; ?>" name="name" value="<?= set_value('name'); ?>" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1" required />
                        <?= form_error('name', '<div class="d-flex invalid-feedback">', '</div>'); ?>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg <?php if (isset($this->form_validation->error_array()['username'])) echo 'is-invalid'; ?>" name="username" value="<?= set_value('username'); ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required />
                        <?= form_error('username', '<div class="d-flex invalid-feedback">', '</div>'); ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-lg <?php if (isset($this->form_validation->error_array()['password1'])) echo 'is-invalid'; ?>" id="password1" name="password1" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required />
                                <div id="password1-eye" class="input-group-prepend">
                                    <span class="input-group-text h-100" id="basic-addon2"><i class="mdi mdi-eye-off fs-4"></i></span>
                                </div>
                                <?= form_error('password1', '<div class="d-flex invalid-feedback">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-lg <?php if (isset($this->form_validation->error_array()['password2'])) echo 'is-invalid'; ?>" id="password2" name="password2" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="basic-addon1" required />
                                <div id="password2-eye" class="input-group-prepend">
                                    <span class="input-group-text h-100" id="basic-addon2"><i class="mdi mdi-eye-off fs-4"></i></span>
                                </div>
                                <?= form_error('password2', '<div class="d-flex invalid-feedback">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-success text-white" type="submit">
                            <i class="mdi mdi-account-plus fs-4 me-1"></i> Register
                        </button>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12">
                    <div class="form-group">
                        <a href="<?= base_url('auth'); ?>" class="text-white">
                            <i class="mdi mdi-account-key fs-4 me-1"></i> Login
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>