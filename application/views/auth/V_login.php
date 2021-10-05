<div class="auth-box bg-dark border-top border-secondary py-3 px-3 mx-2">
    <div>
        <div class="text-center text-white">
            <span class="db"><img id="img-logo" src="<?= base_url('public'); ?>/assets/images/webox-logo.png" alt="logo" width="25" /></span>
            <h3>WebOX Builder</h3>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <!-- <?= base_url(''); ?> -->
        <?php
        $path = __DIR__ . '\config.json';
        if (!file_exists($path)) {
            // echo __DIR__;
            // header('Location: ./install');
        } else {
            echo "false" . '<br />';
            // echo __DIR__ . '<br />';
            // echo $path . '<br />';
        }
        ?>
        <!-- Form -->
        <form class="form-horizontal needs-validation mt-3" method="post" action="<?= base_url('auth'); ?>">
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="hidden" class="form-control form-control-lg" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="" autocomplete="on" />
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                        </div>
                        <input type="password" id="password1" class="form-control form-control-lg" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="" autocomplete="on" />
                        <div id="password1-eye" class="input-group-prepend">
                            <span class="input-group-text h-100" id="basic-addon2"><i class="mdi mdi-eye-off fs-4"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-success text-white" type="submit">
                            <i class="mdi mdi-account-key fs-4 me-1"></i> Login
                        </button>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12">
                    <div class="form-group">
                        <a href="<?= base_url('auth/registration'); ?>" class="text-white">
                            <i class="mdi mdi-account-plus fs-4 me-1"></i> Register New Account
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>