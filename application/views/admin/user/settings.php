<script>
    $(document).ready(function ()
    {
        $('#apiForm').validate(
                {
                    rules:
                            {
                                txtPassword:
                                        {
                                            required: true
                                        }
                            },
                    messages:
                            {
                                txtPassword:
                                        {
                                            required: ''
                                        }
                            }
                });

        $('#api_name').change(function ()
        {
            //alert($(this).val());

            $("#remove_data").remove();
            var current_value = $(this).val();
            $.ajax(
                    {
                        url: '<?php echo base_url('admin/login/get_api_settings_data'); ?>',
                        data: {current_value: current_value},
                        type: 'post',
                        success: function (data) {                            
                            $('#add_data').html(data);
                        }
                    });
        });
    });
</script>
<div class="col-lg-12">
    <div class="card-box">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3 col-md-2"></div>
                <div class="col-sm-4 offset-sm-4 col-md-3 offset-md-0">
                    <h2 class="header-title ">Api</h2>
                </div>
            </div>               

            <?php
            $formData = array('name' => 'apiForm', 'id' => 'apiForm', 'class' => 'form-horizontal');
            echo form_open('admin/login/api', $formData);
            ?>
            <?php
            if ($this->session->flashdata('failed')) {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('failed'); ?>
                </div>
                <?php
            }
            ?>
            <div class="form-group row">
                <label for="hori-pass1" class="col-2 col-form-label">Settings<span class="text-danger">*</span></label>
                <div class="col-7">                    
                    <?php
                    $options = array(
                        'coin_payment' => 'Coin Payment',
                        'faset_hub' => 'Faset Hub'
                    );
                    $api_data = array(
                        'id' => 'api_name',
                        'class' => 'form-control',
                    );
                    echo form_dropdown('api_name', $options, $select_data['api_name'], $api_data);
                    ?>
                </div>
            </div>
            <span id="remove_data" name="remove_data">
                <div class="form-group row">
                    <label for="hori-pass1" class="col-2 col-form-label">Private Key<span class="text-danger">*</span></label>

                    <div class="col-7">                    
                        <?php
                        $dataPrivate = array(
                            'id' => 'private_key',
                            'class' => 'form-control',
                            'name' => 'private_key',
                            'value' => $select_data['api_public']
                        );
                        echo form_input($dataPrivate);
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hori-pass1" class="col-2 col-form-label">Public Key<span class="text-danger">*</span></label>

                    <div class="col-7">                    
                        <?php
                        $dataPublic = array(
                            'id' => 'public_key',
                            'class' => 'form-control',
                            'name' => 'public_key',
                            'value' => $select_data['api_private']
                        );
                        echo form_input($dataPublic);
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hori-pass1" class="col-2 col-form-label">Settings<span class="text-danger">*</span></label>
                    <div class="col-7">                    
                        <?php
                        $options = array(
                            '1' => 'Yes',
                            '0' => 'No'
                        );
                        $api_curent_value = array(
                            'id' => 'api_current_value',
                            'class' => 'form-control'
                        );
                        echo form_dropdown('api_current_value', $options, $select_data['current'], $api_curent_value);

                        // hidden data send for changing setting value .                    
                        ?>
                        <input type="hidden" value="<?php echo $select_data['api_id'] ?>" name="api_id" id="api_id">
                    </div>
                </div>
            </span>
            <span id="add_data" name="add_data">

            </span>
            <div class="row">
                <div class="col-sm-3 col-md-2"></div>
                <div class="col-sm-3 offset-sm-3 col-md-3 offset-md-0">
                    <div class="col-sm-offset-1">   

                        <?php
                        $userSubmit = array(
                            'name' => 'cmdSubmit',
                            'value' => 'UPDATE',
                            'id' => 'cmdSubmit',
                            'class' => 'btn btn-primary btn-custom w-md waves-light'
                        );
                        echo form_submit($userSubmit);
                        ?>                                                
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>

            <div class="visible-lg" style="height: 79px;"></div>
        </div>
    </div>
</div>