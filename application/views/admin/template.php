<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <link rel="shortcut icon" href="assets/images/favicon_1.ico">
        <title>Bhim Admin</title>
        <style>
            input.error{
                border:1px solid red;
            }
            table.center-all td,th{
                text-align :center !important;
            }
            .textarea.error
            {
                border:1px solid red;
            }

        </style>
        <link href="<?php echo base_url('admin_assets'); ?>/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
        <link href="<?php echo base_url('admin_assets'); ?>/assets/plugins/jquery-circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('admin_assets/'); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('admin_assets/'); ?>assets/css/bootstrap_alpha.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('admin_assets/'); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('admin_assets/'); ?>assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('admin_assets/'); ?>assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <!--link href="<?php echo base_url('admin_assets/'); ?>assets/css/dataTables.min.css" rel="stylesheet" type="text/css"-->
        <link href="<?php echo base_url('admin_assets/'); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">        
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/jquery.dataTables.min.js"></script>
    </head>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <?php $this->load->view('admin/header'); ?>
            <!-- Top Bar End -->
            <!-- ========== Left Sidebar Start ========== -->
            <?php $this->load->view('admin/left_sidebar'); ?>
            <!-- ============================================================== -->            
            <!-- Start Top content -->
            <div class="content-page">           
                <div class="content">
                    <div class="container-fluid">
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Welcome !</h4>
                                    <!--ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">Minton</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol-->
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <?php $this->load->view($middle); ?>                        
                    </div>

                </div>

                <!-- end content -->
                <?php $this->load->view('admin/footer'); ?>
            </div>            
        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- Plugins  -->

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
        <script src="<?php echo base_url('admin_assets'); ?>/assets/plugins/switchery/switchery.min.js"></script>

        <!-- Counter Up  -->
        <script src="<?php echo base_url('admin_assets'); ?>/assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url('admin_assets'); ?>/assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- circliful Chart -->
        <script src="<?php echo base_url('admin_assets'); ?>/assets/plugins/jquery-circliful/js/jquery.circliful.min.js"></script>
        <script src="<?php echo base_url('admin_assets'); ?>/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- skycons -->
        <script src="<?php echo base_url('admin_assets'); ?>/assets/plugins/skyicons/skycons.min.js" type="text/javascript"></script>

        <!-- Page js  -->
        <script src="<?php echo base_url('admin_assets'); ?>/assets/pages/jquery.dashboard.js"></script>

        <!-- Custom main Js -->
        <script src="<?php echo base_url('admin_assets'); ?>/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url('admin_assets'); ?>/assets/js/jquery.app.js"></script>


        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
                $('.circliful-chart').circliful();
            });

            // BEGIN SVG WEATHER ICON
            if (typeof Skycons !== 'undefined') {
                var icons = new Skycons(
                        {"color": "#3bafda"},
                        {"resizeClear": true}
                ),
                        list = [
                            "clear-day", "clear-night", "partly-cloudy-day",
                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                            "fog"
                        ],
                        i;

                for (i = list.length; i--; )
                    icons.set(list[i], list[i]);
                icons.play();
            }
            ;
        </script>
        <script src="<?php echo base_url('admin_assets'); ?>/assets/js/dataTables.min.js"></script> 
        <script src="<?php echo base_url('admin_assets'); ?>/assets/js/jquery_validation.js"></script> 
        <script>
            $(document).ready(function () {
                $('.datatables').DataTable();
            });
        </script>
    </body>
</html> 