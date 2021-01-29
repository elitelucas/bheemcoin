<script src="<?php echo base_url('ckeditor/ckeditor.js'); ?>"></script>
<link rel="stylesheet" href="<?php base_url('style/format.css'); ?>">
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">List All Daily Message</h4>                    
                </div>                
                <div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/daily_message/add'); ?>" class="btn btn-primary">
                            Add Daily Message
                        </a>
                    </h4>                    
                </div> 
                <div class="clearfix"></div>                
            </div>            
        </div>
    </div>

    <?php
    if ($this->session->flashdata('success')) {
        ?><div class="row">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&nbsp;&nbsp;Ã</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    echo validation_errors();
    ?>
    <table id="listSlider" class="cell-border datatables" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Sr.no</th>                 
                <th>Name</th> 
                <th>Email</th> 
                <th>Username</th> 
                <!--th>Edit</th-->
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Sr.no</th>                 
                <th>Name</th> 
                <th>Email</th> 
                <th>Username</th> 
                <!--th>Edit</th-->
                <th>Delete</th>
            </tr>
        </tfoot>
        <tbody>
            <?php 
            if($listUsersDailyMsg)
            {
                ?>
                <tr>
                <?php
                $i = 1;
                
                foreach ($listUsersDailyMsg as $listDetails) {
                        ?>
                        <td width = "5%" style="text-align: center"><?php echo $i ?></td>                    
                        <td width = "20%">
                            <?php echo $listDetails['daily_message_name']; ?>
                        </td>
                        <td width = "20%">
                            <?php echo $listDetails['email']; ?>
                        </td>
                        <td width = "45%">
                            <?php echo $listDetails['username']; ?>
                        </td>
                        <!--td width = "5%">
                            <a href="<?php echo base_url('admin/daily_message/edit/' . $listDetails['daily_message_id']); ?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </td-->
                        <td width = "5%">
                            <a href="<?php echo base_url('admin/daily_message/delete/' . $listDetails['daily_message_id']); ?>">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </td>                
                    </tr>
                    
                    <?php
                    $i++;
                }
                
            }
            else
            {
                ?>
                <tr>
                    <td>No Data Found</td>
                </tr>
                <?php
            }
            ?>
            
        </tbody>
    </table>
</div>