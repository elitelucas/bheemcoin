<header id="main-header">
    <div class="row">
        <div class="small-11 large-7 columns">
            <a href="<?php echo site_url('welcome/index'); ?>">
                <img src="<?php echo base_url(); ?>client_assets/assets/logo1.png"  style="margin-left: -9%;"alt="gamedevs" class="logo">

            </a>
        </div>
        <nav id="main-nav" class="small-16 large-9 columns">
            <ul class="main-menu">
                <li><a href="<?php echo site_url('welcome/index'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('welcome/howtoplay'); ?>">How to play</a></li>
                <li><a href="<?php echo site_url('welcome/players'); ?>"> Players</a></li>
                <!--li><a href="#">Games</a></li-->
                <?php
                //echo "<pre>";                print_r($this->session->userdata()); die; 
                if ($this->session->userdata('user_login') == "true") {
                    echo '
					<li><a href="' . site_url('welcome/logout') . '">Logout</a></li>';
                } else {
                    echo '
				<li><a href="' . site_url('welcome/register') . '">Register</a></li>
				<li><a href="' . site_url('welcome/login') . '">Login</a></li>';
                }
                ?>

            </ul>
            <ul class="mobile-menu"></ul>
        </nav>
    </div>
</header>

