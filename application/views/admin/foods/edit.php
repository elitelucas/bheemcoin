<script>
    $(document).ready(function ()
    {
        $('#editFoods').validate(
                {
                    rules:
                            {
                                imgUplod:
                                        {
                                            required: true
                                        },
                                txtFoodsName:
                                        {
                                            required: true
                                        },
                                txtHealth:
                                        {
                                            required: true
                                        },
                                cmbStatus:
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
                                txtFoodsName:
                                        {
                                            required: ''
                                        },
                                txtHealth:
                                        {
                                            required: ''
                                        },
                                cmbStatus:
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
                    <h4 class="page-title">Edit Slider</h4>                    
                </div>                
                <div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/foods'); ?>" class="btn btn-primary">
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
        'id' => 'editFoods',
        'name' => 'editFoods'
    );
    echo form_open_multipart('admin/foods/edit/' . $editFoods['0']['foods_id'], $formEdit);
    ?>
    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Image
                </div>                
                <div class="col-md-3">
                    <img src="<?php echo base_url() . '/admin_assets/assets/images/foods/' . $editFoods[0]['foods_image'] ?>" width="100px">
                </div>                
            </div>            
        </div>
        <div class="form-group">
            <div class="row">

                <div class="offset-md-2 col-md-3">
                    <?php
                    $fileData = array(
                        'id' => 'imgUplod',
                        'name' => 'imgUplod'
                    );

                    echo form_upload($fileData);
                    ?>
                </div>                
            </div>            
        </div>
    </div>

    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Foods Name
                </div>
                <div class="col-md-3">
                    <?php
                    $dataFoodname = array(
                        'id' => 'txtFoodsName',
                        'name' => 'txtFoodsName',
                        'class' => 'form-control'
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
                    Foods Health
                </div>
                <div class="col-md-3">
                    <?php
                    $dataFoodHealth = array(
                        'id' => 'txtHealth',
                        'name' => 'txtHealth',
                        'class' => 'form-control'
                    );
                    echo form_input($dataFoodHealth);
                    ?>
                </div>
            </div>            
        </div>
    </div>

    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Status
                </div>
                <div class="col-md-3">
                    <?php
                    $dataStatus = array(
                        'id' => 'cmbStatus',
                        'class' => 'form-control'
                    );                    
                    $foods_value = array(
                        '1' => 'Enable',
                        '0' => 'Disable',
                    );
                    echo form_dropdown('cmbStatus', $foods_value, '', $dataStatus);
                    ?>
                </div>
            </div>            
        </div>
    </div>

    <div class="container-fluid">        
        <div class="row">                
            <div class="offset-md-2 col-md-3">
                <?php
                $submit = array(
                    'id' => 'imgUplod',
                    'name' => 'imgUplod'
                );
                echo form_submit('cmdSubmit', 'Submit', $submit);
                ?>
                <input type="hidden" id="imgHiddenId" name="imgHiddenId" value="<?php echo $editFoods[0]['foods_id'] ?>">
            </div>
        </div>
    </div>
    <?php
    echo form_close();
    ?>
</div>