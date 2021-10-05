<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('dashboard'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <hr class="sidebar-divider">
                <?php if ($profile['role_id'] == 1) { ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('profile/manage'); ?>" aria-expanded="false"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Manage Account</span></a>
                    </li>
                <?php } ?>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('profile/u/') . $profile['id']; ?>" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">My Profile</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('profile/edit'); ?>" aria-expanded="false"><i class="mdi mdi-account-edit"></i><span class="hide-menu">Edit Profile</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('profile/changepassword'); ?>" aria-expanded="false"><i class="mdi mdi-key"></i><span class="hide-menu">Ubah password</span></a>
                </li>
                <hr class="sidebar-divider">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('landingpage'); ?>" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Create New Landing Page</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('landingpage/lists'); ?>" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">List Landing Page</span></a>
                </li>
                <hr class="sidebar-divider">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('auth/logout'); ?>" aria-expanded="false"><i class="mdi mdi-logout"></i><span class="hide-menu">Log out</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->