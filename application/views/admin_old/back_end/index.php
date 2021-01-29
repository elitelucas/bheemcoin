<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
           <title>Admin Panel</title>
      <!-- Global stylesheets -->
	   <link rel="shortcut icon" href="../assets/small.png" type="image/x-icon" />
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>admin_assets/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>admin_assets/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>admin_assets/assets/css/core.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>admin_assets/assets/css/components.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>admin_assets/assets/css/colors.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
      <!-- /global stylesheets -->
      <!-- Core JS files -->                                                   
      <script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/assets/js/plugins/loaders/pace.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/assets/js/core/libraries/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/assets/js/core/libraries/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/assets/js/plugins/loaders/blockui.min.js"></script>
      <!-- /core JS files -->
      <!-- Theme JS files -->
      <script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/assets/js/plugins/forms/styling/uniform.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/assets/js/core/app.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/assets/js/pages/form_inputs.js"></script>
      <!-- /theme JS files -->
      <!-- Theme JS files -->
      <script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/assets/js/plugins/tables/datatables/datatables.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/assets/js/pages/datatables_advanced.js"></script>
      <!-- /theme JS files -->
  
   </head>
   <body>
      <!-- Main navbar -->
      <div class="navbar navbar-inverse">
         <div class="navbar-header">
            <a class="navbar-brand" href="index.php"></a>
            <ul class="nav navbar-nav pull-right visible-xs-block">
               <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
               <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
         </div>
         <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
               <li>
                  <a class="sidebar-control sidebar-main-toggle hidden-xs">
                  <i class="icon-paragraph-justify3"></i>
                  </a>
               </li>
            </ul>
           <ul class="nav navbar-nav navbar-right">
               <li class="dropdown dropdown-user">
                  <a class="dropdown-toggle" data-toggle="dropdown">
                  <span>Welcome Admin</span>
                  <i class="caret"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right">
                     <li><a href="<?php echo site_url('manage_ad/logout');?>"><i class="icon-switch2"></i> Logout</a></li>
                  </ul>
               </li>
            </ul>
         </div>
      </div>
      <!-- /main navbar -->
      <!-- Page container -->
      <div class="page-container">
         <!-- Page content -->
         <div class="page-content">
            <!-- Main sidebar -->
            <?php
               $this->load->view('admin/back_end/menu');
               ?>
            <!-- /main sidebar -->
            <!-- Main content -->
            <div class="content-wrapper">
               <!-- Page header -->
               <div class="page-header">
                  <div class="page-header-content">
                     <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">DashBoard</span></h4>
                     </div>
                     
                     <?php 
                        if(isset($_SESSION['success_msg']))
                        	{  
                        ?>
                     <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                        <span class="text-semibold">Well done!</span> You successfully inserted the record!
                     </div>
                     <?php 
                        unset($_SESSION['success_msg']); 
                        	}
                        else if(isset($_SESSION['error_msg']))
                        	{
                        ?>
                     <div class="alert bg-danger alert-styled-left">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                        <span class="text-semibold">Sorry!</span> There is some error, Please check and try again!
                     </div>
                     <?php
                        unset($_SESSION['error_msg']);
                        	}
                        ?>
                  </div>
               </div>
		
              
               <!-- /main content -->
            </div>
            <!-- /page content -->
         </div>
         <!-- /page content -->
      </div>
      <!-- /page container -->
   </body>
</html>