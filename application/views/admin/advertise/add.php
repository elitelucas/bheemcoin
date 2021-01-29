<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">Add  Advertise</h4>                    
                </div>                
                <div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/advertise'); ?>" class="btn btn-primary">
                            List All
                        </a>
                    </h4>                    
                </div> 
                <div class="clearfix"></div>                
            </div>            
        </div>
    </div> 
    <?php
    $formAdd = array(
        'id' => 'addAdvertise',
        'name' => 'addAdvertise'
    );
    echo form_open_multipart('admin/advertise/add', $formAdd);
    ?>
    <?php
    echo validation_errors();
    ?>
    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Advertise Name
                </div>
                <div class="col-md-3">
                    <?php
                    $dataTextarea = array(
                        'id' => 'txtAddname',
                        'name' => 'txtAddname',
                        'rows' => '10',
                        'cols' => '10',
                        'class' => 'form-control'
                    );

                    echo form_textarea($dataTextarea);
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
                echo form_submit('cmdSubmit', 'Submit', $submit);
                ?>
            </div>
        </div>
    </div>
    <?php
    echo form_close();
    ?>
</div>

<script>
    $(document).ready(function ()
    {
        $('#addAdvertise').validate(
                {
                    rules:
                            {
                                txtAddname:
                                        {
                                            required: true
                                        }
                            },
                    messages:
                            {
                                txtAddname:
                                        {
                                            required: 'Plz enter this field !'
                                        }
                            }
                });
    });
</script>