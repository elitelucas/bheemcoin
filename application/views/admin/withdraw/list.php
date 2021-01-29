
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">List All Player</h4>                    
                </div>                
                <!--div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/WithDetails/add'); ?>" class="btn btn-primary">
                            Add Player
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
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&nbsp;&nbsp;×</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        </div>
        <?php
    }
    ?>
    <table id="listPlayer" class="cell-border datatables" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Sr.no</th>                
                <th>Address</th>
                <th>Amount</th> 
                <th>Status</th>    
                <th>Type</th>    
                <th>Change Request</th>
                <!--th>Delete</th-->
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Sr.no</th>                
                <th>Address</th>
                <th>Amount</th> 
                <th>Status</th>   
                <th>Type</th>
                <th>Change Request</th>
                <!--th>Delete</th-->
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <?php
                $i = 1;
                foreach ($withdrawDetails as $WithDetails) {
                    ?>
                    <td width = "5%" style="text-align: center"><?php echo $i ?></td>                    
                    <td width = "10%"><?php echo $WithDetails['withdraw_btc_address']; ?></td>
                    <td width = "10%">
                        <?php echo $WithDetails['withdraw_btc_amount']; ?>
                    </td>
                    <td width = "10%">
                        <?php
                        if ($WithDetails['withdraw_status'] == 0) {
                            echo 'pending';
                        } else if ($WithDetails['withdraw_status'] == 1) {
                            echo 'approve';
                        }if ($WithDetails['withdraw_status'] == 2) {
                            echo 'reject';
                        }
                        ?>
                    </td>  
                    <td width = "10%">
                        <?php
                        if ($WithDetails['withdrawl_type'] == 1) {
                            echo 'bloackchain';
                        } else if ($WithDetails['withdrawl_type'] == 2) {
                            echo 'facethub';
                        }
                        ?>
                    </td>
                    <td width = "10%">
                        <a href="<?php echo base_url('admin/withdraw/userRequest/' . $WithDetails['withdraw_id']); ?>">
                            <!--i class="fa fa-pencil-square-o" aria-hidden="true"></i-->
                            View
                        </a>
                    </td>
                    <!--td width = "5%">
                        <a href="<?php echo base_url('admin/withdraw/delete/' . $WithDetails['withdraw_id']); ?>">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </td-->                
                </tr>
                <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>