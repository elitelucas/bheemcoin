<script>
    $(document).ready(function ()
    {
        $('#addworker').validate(
                {
                    rules:
                            {
                                imgUplod:
                                        {
                                            required: true
                                        },
                                txtWorkerName:
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
                                txtWorkerName:
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
                        <a href="<?php echo base_url('admin/worker'); ?>" class="btn btn-primary">
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
        'id' => 'editWorker',
        'name' => 'editWorker'
    );
    echo form_open_multipart('admin/worker/edit/' . $editWorker['0']['worker_id'], $formEdit);
    ?>
    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Image
                </div>                
                <div class="col-md-3">
                    <img src="<?php echo base_url() . '/admin_assets/assets/images/worker/' . $editWorker[0]['worker_image'] ?>" width="100px">
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
                    Worker Name
                </div>
                <div class="col-md-3">
                    <?php
                    $dataFoodname = array(
                        'id' => 'txtWorkerName',
                        'name' => 'txtWorkerName',
                        'class' => 'form-control',
                        'value' => $editWorker[0]['worker_name']
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
                    Worker Limit <b>(Minute)</b> 
                </div>
                <div class="col-md-3">
                    <?php
                    $dataWorkerMinute = array(
                        'id' => 'txtMinute',
                        'name' => 'txtMinute',
                        'class' => 'form-control',
                        'value' => $editWorker[0]['worker_minute']
                    );
                    echo form_input($dataWorkerMinute);
                    ?>
                </div>
            </div>            
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Worker Value
                </div>
                <div class="col-md-3">
                    <?php
                    $dataWorkerValue = array(
                        'id' => 'txtValue',
                        'name' => 'txtValue',
                        'class' => 'form-control',
                        'value' => $editWorker[0]['worker_value']
                    );
                    echo form_input($dataWorkerValue);
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
                    $worker_value = array(
                        '1' => 'Enable',
                        '0' => 'Disable',
                    );
                    echo form_dropdown('cmbStatus', $worker_value, $editWorker[0]['worker_status'], $dataStatus);
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
                <input type="hidden" id="imgHiddenId" name="imgHiddenId" value="<?php echo $editWorker[0]['worker_id'] ?>">
            </div>
        </div>
    </div>
    <?php
    echo form_close();
    ?>
</div>