<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">Edit  Withdraw_limit</h4>                    
                </div>                
                <div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/withdraw_limit'); ?>" class="btn btn-primary">
                            List All
                        </a>
                    </h4>                    
                </div> 
                <div class="clearfix"></div>                
            </div>            
        </div>
    </div> 
    <?php
    $formEdit = array(
        'id' => 'editWithdraw_limit',
        'name' => 'editWithdraw_limit'
    );
    echo form_open_multipart('admin/withdraw_limit/edit/' . $editWithdraw_limit['0']['withdraw_limit_id'], $formEdit);
    ?>
    <div class="container-fluid">
        <div class="form-group">
            <?php
            if ($editWithdraw_limit['0']['withdraw_limit_type'] == '1') {
                ?>
                <h1><?php echo 'Blockchain'; ?></h1>
                <?php
            } else {
                ?>
                <h1><?php echo 'faucet hub'; ?></h1>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Admin Fees
                </div>
                <div class="col-md-3">
                    <?php
                    $dataWithLimFees = array(
                        'id' => 'txtWithLimFees',
                        'name' => 'txtWithLimFees',
                        'class' => 'form-control',
                        'value' => $editWithdraw_limit['0']['withdraw_limit_fees']
                    );

                    echo form_input($dataWithLimFees);
                    ?>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Withdraw limit  Min. Limit
                </div>
                <div class="col-md-3">
                    <?php
                    $dataMinlimit = array(
                        'id' => 'txtMinLimit',
                        'name' => 'txtMinLimit',
                        'class' => 'form-control',
                        'value' => $editWithdraw_limit['0']['withdraw_limit_min']
                    );

                    echo form_input($dataMinlimit);
                    ?>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Withdraw_limit  Max. Limit
                </div>
                <div class="col-md-3">
                    <?php
                    $dataMaxlimit = array(
                        'id' => 'txtMaxLimit',
                        'name' => 'txtMaxLimit',
                        'class' => 'form-control',
                        'value' => $editWithdraw_limit['0']['withdraw_limit_max']
                    );
                    echo form_input($dataMaxlimit);
                    ?>
                </div>
            </div>

        </div>
    </div>
    <div class="container">        
        <div class="row">                
            <div class="offset-md-2 col-md-3">
                <?php
                $submit = array(
                    'id' => 'cmdSubmit',
                    'class' => 'btn'
                );
                echo form_submit('cmdSubmit', 'Update', $submit);
                ?>
            </div>
        </div>
    </div>

    <?php
    echo form_close();
    ?>
</div>