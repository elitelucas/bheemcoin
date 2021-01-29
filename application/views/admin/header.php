
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="<?php echo base_url('admin/home'); ?>" class="logo"><i class="mdi mdi-radar"></i> <span>Bhimcoin</span></a>
        </div>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="<?php echo base_url('admin_assets/'); ?>assets/images/avatar-1.jpg" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow"><small>Welcome ! <?php echo $this->session->userdata('username'); ?></small> </h5>
                    </div>

                    <!-- item-->
                    <a href="<?php echo base_url('admin/login/profile'); ?>" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-star-variant"></i> <span>Profile</span>
                    </a>

                    <!-- item-->
                    <a href="<?php echo base_url('admin/login/api'); ?>"" class="dropdown-item notify-item">
                        <i class="mdi mdi-settings"></i> <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-lock-open"></i> <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="<?php echo base_url('admin/login/logout'); ?>" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout"></i> <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <!--li class="hide-phone app-search">
                <form role="search" class="">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </li-->
        </ul>

    </nav>

</div>


