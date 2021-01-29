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
                    <h4 class="page-title">Add worker</h4>                    
                </div>                
                <div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/worker'); ?>" class="btn btn-primary">
                            List All
                        </a>
                    </h4>                    
                </div> 
                <div class="clearfix">

                </div>                
            </div>            
        </div>
    </div> 
</div>
<?php
$formAdd = array(
    'id' => 'addworker',
    'name' => 'addworker'
);
echo form_open_multipart('admin/worker/add', $formAdd);
?>
<div class="container-fluid">
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
                Worker Name
            </div>
            <div class="col-md-3">
                <?php
                $dataFoodname = array(
                    'id' => 'txtWorkerName',
                    'name' => 'txtWorkerName',
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
                Worker Limit <b>(Minute)</b> 
            </div>
            <div class="col-md-3">
                <?php
                $dataWorkerMinute = array(
                    'id' => 'txtMinute',
                    'name' => 'txtMinute',
                    'class' => 'form-control'
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

                echo form_dropdown('cmbStatus', $worker_value, '', $dataStatus);
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
            </div>
        </div>
    </div>
</div>
<?php
echo form_close();
?>
</div>