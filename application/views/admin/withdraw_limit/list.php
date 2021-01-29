
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">List All Withdraw limit</h4>                    
                </div>                
                <!--div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/withdraw_limit/add'); ?>" class="btn btn-primary">
                            Add  Withdraw_limit Limit
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
    <table id="listSlider" class="cell-border datatables" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Sr.no</th>
                <th>Type </th>
                <th>Min Withdraw Fees </th>   
                <th>Min Withdraw limit </th>   
                <th>Max Withdraw limit </th> 
                <th>Edit</th>
                <!--th>Delete</th-->                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Sr.no</th>
                <th>Type </th>
                <th>Min Withdraw Fees </th>   
                <th>Min Withdraw limit </th>   
                <th>Max Withdraw limit </th> 
                <th>Edit</th>
                <!--th>Delete</th-->
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <?php
                $i = 1;

                foreach ($Withdraw_limitDetails as $listDetails) {
                    ?>
                    <td width = "5%" style="text-align: center"><?php echo $i ?></td>
                    <td width = "15%">
                        <?php
                        if ($listDetails['withdraw_limit_type'] == 1) {
                            echo 'blockchain';
                        } else if ($listDetails['withdraw_limit_type'] == 2) {
                            echo 'facethub';
                        }
                        ?>
                    </td>
                    <td width = "15%">
                        <?php echo $listDetails['withdraw_limit_fees']; ?>
                    </td>
                    <td width = "15%">
                        <?php echo $listDetails['withdraw_limit_min']; ?>
                    </td>
                    <td width = "45%">
                        <?php echo $listDetails['withdraw_limit_max']; ?>
                    </td>
                    <td width = "5%">
                        <a href="<?php echo base_url('admin/withdraw_limit/edit/' . $listDetails['withdraw_limit_id']); ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                    <!--td width = "5%">
                        <a href="<?php echo base_url('admin/withdraw_limit/delete/' . $listDetails['withdraw_limit_id']); ?>">
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