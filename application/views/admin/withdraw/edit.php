<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">Edit Withdraw</h4>                    
                </div>                
                <div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/withdraw'); ?>" class="btn btn-primary">
                            List All
                        </a>
                    </h4>                    
                </div> 
                <div class="clearfix"></div>                
            </div>            
        </div>
    </div>    
    <div class="container-fluid">             
        <div class="form-group">
            <div class="row">
                <h3>User withdraw Request !</h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?php
                    if ($withdrawRequest['withdraw_status'] == 0) {
                        $RequestAccept = 'accept';
                        $RequestReject = 'reject';
                        ?>
                        <a class="btn" href="<?php echo base_url('admin/withdraw/changeRequest/' . $RequestAccept . '/' . $withdrawRequest['withdraw_id']); ?>">Accept</a>
                        <a class="btn" href="<?php echo base_url('admin/withdraw/changeRequest/' . $RequestReject . '/' . $withdrawRequest['withdraw_id']); ?>">Reject</a>
                        <?php
                    } else if ($withdrawRequest['withdraw_status'] == 1) {
                        echo '<br><span style="color:green"><h4>Request Approve Success !</h4></span>';
                    } else if ($withdrawRequest['withdraw_status'] == 2) {
                        echo '<br><span style="color:green"><h4>Request Rejected !</h4></span>';
                    }
                    ?>
                </div>   
                <div class="col-md-2">

                </div>
            </div>            
        </div>
    </div>
    <div class="container-fluid">             
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Username : 
                </div>   
                <div class="col-md-2">
                    <?php
                    echo $withdrawRequest['username']
                    ?>
                </div>
            </div>            
        </div>
    </div>
    <div class="container-fluid">             
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    BTC Address : 
                </div>   
                <div class="col-md-2">
                    <?php
                    echo $withdrawRequest['bitcoin_address']
                    ?>
                </div>
            </div>            
        </div>
    </div>
    <div class="container-fluid">             
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Email : 
                </div>   
                <div class="col-md-2">
                    <?php
                    echo $withdrawRequest['email']
                    ?>
                </div>
            </div>            
        </div>
    </div>
    <div class="container-fluid">             
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Username : 
                </div>   
                <div class="col-md-2">
                    <?php
                    echo $withdrawRequest['username']
                    ?>
                </div>
            </div>            
        </div>
    </div>
    <div class="container-fluid">             
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Type : 
                </div>   
                <div class="col-md-2">
                    <?php
                    if ($withdrawRequest['withdrawl_type'] == 1) {
                        echo 'bloackchain';
                    } else if ($withdrawRequest['withdrawl_type'] == 2) {
                        echo 'facethub';
                    }
                    ?>
                </div>
            </div>            
        </div>
    </div>
    <!--div class="container-fluid">             
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Total Satoshi : 
                </div>   
                <div class="col-md-2">
    <?php
    echo $withdrawRequest['user_attack_player_satoshi']
    ?>
                </div>
            </div>            
        </div>
    </div-->
    <div class="container-fluid">             
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    withdraw btc value : 
                </div>   
                <div class="col-md-2">
                    <?php
                    echo $withdrawRequest['withdraw_btc_amount']
                    ?>
                </div>
            </div>            
        </div>
    </div>    
</div>