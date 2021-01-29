<script>
    $(document).ready(function ()
    {
        $('#addplayer').validate(
                {
                    rules:
                            {
                                imgUplod:
                                        {
                                            required: true
                                        },
                                txtPlayerName:
                                        {
                                            required: true
                                        },
                                txtMinute:
                                        {
                                            required: true,
                                            number: true
                                        },
                                txtCapicity:
                                        {
                                            required: true,
                                            number: true
                                        },
                                txtPrice:
                                        {
                                            required: true
                                        },
                                cmbPriceType:
                                        {
                                            required: true
                                        },
                                cmbMembership:
                                        {
                                            required: true
                                        },
                                txtPlayerlimit:
                                        {
                                            required: true,
                                            number:true
                                        },
                                cmbPlayerStatus:
                                        {
                                            required: true
                                        }
                            },
                    messages:
                            {
                                imgUplod:
                                        {
                                            required: ''
                                        },
                                txtPlayerName:
                                        {
                                            required: ''
                                        },
                                txtMinute:
                                        {
                                            required: ''
                                        },
                                txtCapicity:
                                        {
                                            required: ''
                                        },
                                txtPrice:
                                        {
                                            required: ''
                                        },                                        
                                cmbPriceType:
                                        {
                                            required: ''
                                        },
                                cmbMembership:
                                        {
                                            required: ''
                                        },
                                txtPlayerlimit:
                                        {
                                            required: ''
                                        },
                                cmbPlayerStatus:
                                        {
                                            required: ''
                                        }
                            }
                });
    });
</script>
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">Edit Player</h4>                    
                </div>                
                <div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/player'); ?>" class="btn btn-primary">
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
        'id' => 'editPlayer',
        'name' => 'editPlayer'
    );
    echo form_open_multipart('admin/player/edit/' . $editPlayer['0']['player_id'], $formEdit);
    ?>
    <div class="container-fluid">        
        <div class="row">
            <div class="col-md-2">
                Image
            </div>                
            <div class="col-md-3">
                <img src="<?php echo base_url() . '/admin_assets/assets/images/player/' . $editPlayer[0]['player_image'] ?>" width="100px">
            </div>                
        </div>       
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Image
                </div>
                <div class="col-md-3">
                    <?php
                    $fileData = array(
                        'id' => 'imgUplod',
                        'name' => 'imgUplod',
                        'class' => 'form-control'
                    );

                    echo form_upload($fileData);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">

                </div>
                <!--div class="col-md-3">
                    image size should be (1920 * 650)
                </div-->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Player Name
                </div>
                <div class="col-md-3">
                    <?php
                    $dataFoodname = array(
                        'id' => 'txtPlayerName',
                        'name' => 'txtPlayerName',
                        'class' => 'form-control',
                        'value' => $editPlayer[0]['player_name']
                    );
                    echo form_input($dataFoodname);
                    ?>
                </div>
            </div>            
        </div>
    </div>
    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Player Satoshi <b>(Minute)</b> 
                </div>
                <div class="col-md-3">
                    <?php
                    $dataPlayerMinute = array(
                        'id' => 'txtMinute',
                        'name' => 'txtMinute',
                        'class' => 'form-control',
                        'value' => $editPlayer[0]['player_satoshi_minute']
                    );
                    echo form_input($dataPlayerMinute);
                    ?>
                </div>
            </div>            
        </div>
    </div>

    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Player Capicity <b></b> 
                </div>
                <div class="col-md-3">
                    <?php
                    $dataPlayerCapicity = array(
                        'id' => 'txtCapicity',
                        'name' => 'txtCapicity',
                        'class' => 'form-control',
                        'value' => $editPlayer[0]['player_capicity']
                    );
                    echo form_input($dataPlayerCapicity);
                    ?>
                </div>
            </div>            
        </div>
    </div>

    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Player Price <b></b> 
                </div>
                <div class="col-md-3">
                    <?php
                    $dataPlayerPrice = array(
                        'id' => 'txtPrice',
                        'name' => 'txtPrice',
                        'class' => 'form-control',
                        'value' => $editPlayer[0]['player_price']
                    );
                    echo form_input($dataPlayerPrice);
                    ?>
                </div>
                <div class="col-md-3">
                    <?php
                    $datapriceType = array(
                        '' => 'Select Price Type',
                        '1' => 'Satoshi',
                        '2' => 'Star',
                        '3' => 'Btc'
                    );

                    $dataprice = array(
                        'id' => 'cmbPriceType',
                        'class' => 'form-control'
                    );
                    echo form_dropdown('cmbPriceType', $datapriceType, $editPlayer[0]['player_price_type'], $dataprice);
                    ?>
                </div>
            </div>            
        </div>
    </div>

    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Player Membership (Days)
                </div>
                <div class="col-md-3">
                    <?php
                    $dataPlayermembership = array(
                        'id' => 'cmbMembership',
                        'class' => 'form-control',
                        'name' => 'cmbMembership',
                        'value' => $editPlayer[0]['player_membership']
                    );
                    /* $player_membership = array(
                      'lifetime' => 'Lifetime',
                      'two_days' => '2 days',
                      ''

                      ); */

                    echo form_input($dataPlayermembership);
                    ?>
                </div>
            </div>            
        </div>
    </div>

    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Player Daily Limit (Satoshi)<b></b> 
                </div>
                <div class="col-md-3">
                    <?php
                    $dataPlayerDLimit = array(
                        'id' => 'txtPlayerlimit',
                        'name' => 'txtPlayerlimit',
                        'class' => 'form-control',
                        'value' => $editPlayer[0]['player_daily_limit']
                    );
                    echo form_input($dataPlayerDLimit);
                    ?>
                </div>
            </div>            
        </div>
    </div>


    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Player Status
                </div>
                <div class="col-md-3">
                    <?php
                    $dataPlayerStatus = array(
                        'id' => 'cmbPlayerStatus',
                        'class' => 'form-control'
                    );

                    $player_value = array(
                        '1' => 'Enable',
                        '0' => 'Disable',
                    );

                    echo form_dropdown('cmbPlayerStatus', $player_value, $editPlayer[0]['player_status'], $dataPlayerStatus);
                    ?>
                </div>
            </div>            
        </div>
    </div>


    <div class="container-fluid">
        <div class="form-group">
            <div class="row">                
                <div class="offset-md-2 col-md-3">
                    <?php
                    $submit = array(
                        'id' => 'cmdSubmit',
                        'class' => 'btn btn-default',
                    );
                    echo form_submit('cmdSubmit', 'Submit', $submit);
                    ?>
                    <input type="hidden" id="imgHiddenId" name="imgHiddenId" value="<?php echo $editPlayer[0]['player_id'] ?>">
                </div>
            </div>
        </div>
    </div>
    <?php
    echo form_close();
    ?>