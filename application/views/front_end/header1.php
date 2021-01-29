<style>
    #main-header #main-nav ul.main-menu li {
        display: inline-block;
        margin-right: 34px;
    }

</style>
<header id="main-header">
    <div class="row">
        <div class="small-11 large-6 columns"><a href="<?php echo site_url('welcome/login_success'); ?>"><img src="<?php echo base_url(); ?>client_assets/assets/logo1.png"  style="margin-left: -9%;"alt="gamedevs" class="logo"></a></div>
        <nav id="main-nav" class="small-6 large-10 columns">
            <ul class="main-menu" style="margin: 56px 3px !important;">
                <li><a href="<?php echo base_url('referal'); ?>">Refferal</a></li>
                <li><a href="<?php echo base_url('player'); ?>"> Players</a></li>
                <!--li><a href="#">Games</a></li-->
                <li><a href="<?php echo base_url('welcome/chat'); ?>">Chat</a></li>
                <li><a href="<?php echo base_url('welcome/login_success'); ?>">Profile</a></li>
                <?php
                if ($this->session->userdata('user_login') == "true") {
                    echo '
					<li><a href="' . site_url('welcome/logout') . '">Logout</a></li>';
                } else {
                    echo '
				<li><a href="' . base_url('welcome/register') . '">Register</a></li>
				<li><a href="' . base_url('welcome/login') . '">Login</a></li>';
                }
                ?>
            </ul>
            <ul class="mobile-menu"></ul>
        </nav>
    </div>
</header>

