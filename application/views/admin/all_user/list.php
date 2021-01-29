<script src="<?php echo base_url('ckeditor/ckeditor.js'); ?>"></script>
<link rel="stylesheet" href="<?php base_url('style/format.css'); ?>">
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">List All All user</h4>                    
                </div>                
                <!--div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/all_user/add'); ?>" class="btn btn-primary">
                            Add All User
                        </a>
                    </h4>                    
                </div--> 
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
                <th>Username</th> 
                <th>Email</th> 
                <th>Satoshi </th> 
                <th>bitcoin address</th> 
                <th>status</th> 
                <th>Ip Address</th> 
                <th>Edit</th>
                <th>Active/Block</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Sr.no</th>                 
                <th>Username</th> 
                <th>Email</th> 
                <th>Satoshi </th> 
                <th>bitcoin address</th> 
                <th>status</th> 
                <th>Ip Address</th>
                <th>Edit</th>
                <th>Active/Block</th>

            </tr>
        </tfoot>
        <tbody>
            <tr>
                <?php
                $i = 1;
                foreach ($All_userDetails as $listDetails) {
                    ?>
                    <td width = "5%" style="text-align: center"><?php echo $i ?></td>                    
                    <td width = "10%">
                        <?php echo $listDetails['username']; ?>
                    </td>
                    <td width = "10%">
                        <?php echo $listDetails['email']; ?>
                    </td>

                    <td width = "15%">
                        <?php echo $listDetails['user_attack_player_satoshi']; ?>
                    </td>
                    <td width = "20%">
                        <?php echo $listDetails['bitcoin_address']; ?>
                    </td>
                    <td width = "10%">
                        <?php
                        if ($listDetails['status_block'] == 0) {
                            echo 'Block';
                        } else {
                            echo 'Active';
                        }
                        ?>
                    </td>
                    <td width = "10%">
                        <?php echo $listDetails['ip_address']; ?>
                    </td>
                    <td width = "30%">
                        <a href="<?php echo base_url('admin/all_user/edit_user/' . $listDetails['id'] ); ?>">Edit</a>
                    </td>
                     
                    <td width = "30%">
                        <?php
                        if ($listDetails['status_block'] == 0) {
                            ?>
                            <a href="<?php echo base_url('admin/all_user/edit/' . $listDetails['id'] . '/' . $listDetails['status_block']); ?>">
                                Active                            
                            </a>
                            <?php
                        } else {
                            ?>
                            <a href="<?php echo base_url('admin/all_user/edit/' . $listDetails['id'] . '/' . $listDetails['status_block']); ?>">
                                Block                            
                            </a>
                            <?php
                        }
                        ?>

                    </td>

                </tr>
                <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>