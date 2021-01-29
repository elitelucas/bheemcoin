<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <link rel="shortcut icon" href="assets/images/favicon_1.ico">
        <title>Login</title>
        <link href="<?php echo base_url('admin_assets/assets/'); ?>/plugins/switchery/switchery.min.css" rel="stylesheet" />
        <link href="<?php echo base_url('admin_assets/'); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('admin_assets/'); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('admin_assets/'); ?>assets/css/style.css" rel="stylesheet" type="text/css">
        <style>
            input.error{
                border: 1px solid red;
            }

        </style>
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/modernizr.min.js"></script>
    </head>
    <body>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="index.html" class="logo-lg"><!-- i class="mdi mdi-radar"--></i> <span>Bheemcoin</span> </a>
            </div>
            <!-- form class="form-horizontal m-t-20" action="index.html" -->
            <?php
            $formData = array('name' => 'userForm', 'id' => 'userForm');
            echo form_open('admin/login', $formData);
            ?>

            <div class="form-group row">
                <div class="col-12">
                    <?php echo validation_errors(); ?>
                </div>
            </div>
            <?php
            if ($this->session->flashdata('failed')) {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('failed'); ?>
                </div>
                <?php                
            }
            ?>
            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
                        <?php
                        $userData = array(
                            'name' => 'txtUsername',
                            'id' => 'txtUsername',
                            'class' => 'form-control',
                            'placeholder' => 'Username'
                        );
                        echo form_input($userData);
                        ?>
                        <!-- input class="form-control" type="text" required="" placeholder="Username"-->
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="mdi mdi-radar"></i></span>
                        <?php
                        $userPassword = array(
                            'name' => 'txtPassword',
                            'id' => 'txtPassword',
                            'class' => 'form-control',
                            'placeholder' => 'Password'
                        );
                        echo form_password($userPassword);
                        ?>
                        <!-- input class="form-control" type="text" required="" placeholder="Username"-->
                    </div>
                </div>
            </div>  

            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">

                    <?php
                    $userSubmit = array(
                        'name' => 'cmdSubmit',
                        'value' => 'Log In',
                        'id' => 'txtPassword',
                        'class' => 'btn btn-primary btn-custom w-md waves-light'
                    );
                    echo form_submit($userSubmit);
                    ?>
                    <!-- button class="btn btn-primary btn-custom w-md waves-effect waves-light form-control" type="submit">Log In
                    </button-->
                </div>
            </div>
            <?php
            echo form_close()
            ?>
        </div>
        <script>
            var resizefunc = [];
        </script>

        <!-- Plugins  -->
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/detect.js"></script>
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/fastclick.js"></script>
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url('admin_assets/assets'); ?>/plugins/switchery/switchery.min.js"></script>
        <!-- Custom main Js -->
        <script src="<?php echo base_url('admin_assets'); ?>/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url('admin_assets'); ?>/assets/js/jquery.app.js"></script>        
        <script src="<?php echo base_url('admin_assets'); ?>/assets/js/jquery_validation.js"></script>   
        <script>
            $(document).ready(function ()
            {
                $('#userForm').validate(
                        {
                            rules:
                                    {
                                        txtUsername:
                                                {
                                                    required: true
                                                },
                                        txtPassword:
                                                {
                                                    required: true
                                                }
                                    },
                            messages:
                                    {
                                        txtUsername:
                                                {
                                                    required: ''
                                                },
                                        txtPassword:
                                                {
                                                    required: ''
                                                }
                                    }
                        });
            });
        </script>
    </body>
</html>