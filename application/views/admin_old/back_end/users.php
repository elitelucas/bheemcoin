
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
      <link href="<?php echo base_url();?>admin_assets/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>admin_assets/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>admin_assets/assets/css/core.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>admin_assets/assets/css/components.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>admin_assets/assets/css/colors.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
      <!-- /global stylesheets -->
      <!-- Core JS files -->
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/plugins/loaders/pace.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/core/libraries/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/core/libraries/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/plugins/loaders/blockui.min.js"></script>
      <!-- /core JS files -->
      <!-- Theme JS files -->
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/plugins/forms/styling/uniform.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/core/app.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/pages/form_inputs.js"></script>
      <!-- /theme JS files -->
      <!-- Theme JS files -->
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/plugins/tables/datatables/datatables.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/pages/datatables_advanced.js"></script>
      <!-- /theme JS files -->
    <script>
	  function search_user()
	  {
		  var data=$('#search').val();
					
					
						jQuery.ajax({
						type:"POST",
						url:"<?php echo site_url('manage_ad/search_user');?>",
						datatype:"text",
						data:{data:data},
						success:function(response)
						{
							$('#get_table').empty();
							$('#get_table').append(response);
						},
						error:function (xhr, ajaxOptions, thrownError){}
						});
					
	  }
	  
	
		 
    </script>
   </head>
   <body>
      <!-- Main navbar -->
      <div class="navbar navbar-inverse">
         <div class="navbar-header">
            <a class="navbar-brand" href=""></a>
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
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Users </span>- Details</h4>
                     </div>
                     <div class="heading-elements">
                        <ul class="icons-list">
                           
                          
                        </ul>
                     </div>
                    
                   
                  </div>
               </div>
		
               <!-- /page header -->
               <div class="content">
						 <div class="panel panel-flat" >
                     <div class="panel-body" >
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                           <fieldset class="content-group">
                              <legend class="text-bold">Search</legend>
                               	 <label class="control-label col-lg-1" style="padding-top:1%">Filter</label>
							  <div class="col-md-2">
								<input type="text" class="form-control" name="search_filter" id="search" onkeyup="search_user();"  placeholder="Type of Filter"  > 
							  </div> 
                           </fieldset>
                        </form>
                     </div>
                  </div>
                  <!-- Page length options -->
                  <div class="panel panel-flat">
                     <table class="table  datatable-show-all">
                        <thead>
                           <tr>
                              <th>S No</th>
                              <th>Username</th>
                              <th>Email</th>
							  <th>Bitcoin Address</th>
							  <th>Status</th>
                              <th>Date</th>
                              
                           </tr>
                        </thead>
                        <tbody id="get_table">
                           <?php
							  $i=1;
							  foreach($users as $row)
							  {
									$id = $row['id'];
									$en_id=base64_encode($id);
									
									$a=explode('-',$row['date']);
									$date=$a['2']."-".$a['1']."-".$a['0'];
									
									$ref=$row['refered_by'];
									$status=$row['status'];
									if($ref=="")
									{
										$ref="-";
									}
									if($status==1)
									{
										$status="Online";
									}
									else
									{
										$status="Offline";
									}
									echo'
									<tr>
										<td>'.$i.'</td>
										<td>'.$row['username'].'</td>
										<td>'.$row['email'].'</td>
										<td>'.$row['bitcoin_address'].'</td>
										<td>'.$status.'</td>
										<td>'.$date.'</td>
									</tr>';
									$i++;
                              	} 
							?>
                        </tbody>
                     </table>
                     <!-- /highlighting rows and columns -->
                     <!-- Column rendering -->
                     <!-- Footer -->
					 
                     <div class="footer text-muted">
                        &copy; 2017. 
                     </div>
                     <!-- /footer -->
                  </div>
                  <!-- /content area -->
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