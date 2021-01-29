<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">Add  Daily_message</h4>                    
                </div>                
                <div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/daily_message'); ?>" class="btn btn-primary">
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
        'id' => 'addDaily_message',
        'name' => 'addDaily_message'
    );
    echo form_open_multipart('admin/daily_message/add', $formAdd);
    ?>
    <?php
    echo validation_errors();
    ?>
    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Daily_message Name
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
        $('#addDaily_message').validate(
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