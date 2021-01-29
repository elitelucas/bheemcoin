<script>
    $(document).ready(function ()
    {
        $('#addSatoshi').validate(
                {
                    rules:
                            {
                                txtMinLimit:
                                        {
                                            required: true
                                        },
                                txtMaxLimit:
                                        {
                                            required: true
                                        }
                            },
                    messages:
                            {
                                txtMinLimit:
                                        {
                                            required: ''
                                        },
                                txtMaxLimit:
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
                    <h4 class="page-title">Add  Satoshi</h4>                    
                </div>                
                <div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/satoshi'); ?>" class="btn btn-primary">
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
        'id' => 'addSatoshi',
        'name' => 'addSatoshi'
    );
    echo form_open_multipart('admin/satoshi/add', $formAdd);
    ?>


    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Satoshi Min. Limit
                </div>
                <div class="col-md-3">
                    <?php
                    $dataMinlimit = array(
                        'id' => 'txtMinLimit',
                        'name' => 'txtMinLimit',
                        'class' => 'form-control'
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
                    Satoshi  Max. Limit
                </div>
                <div class="col-md-3">
                    <?php
                    $dataMaxlimit = array(
                        'id' => 'txtMaxLimit',
                        'name' => 'txtMaxLimit',
                        'class' => 'form-control'
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
                echo form_submit('cmdSubmit', 'Submit', $submit);
                ?>
            </div>
        </div>
    </div>
    <?php
    echo form_close();
    ?>
</div>