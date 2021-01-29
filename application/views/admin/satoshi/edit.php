<script>
    $(document).ready(function ()
    {
        $('#editSatoshi').validate(
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
                    <h4 class="page-title">Edit  Satoshi</h4>                    
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
    $formEdit = array(
        'id' => 'editSatoshi',
        'name' => 'editSatoshi'
    );
    echo form_open_multipart('admin/satoshi/edit/' . $editSatoshi['0']['satoshi_id'], $formEdit);
    ?>
    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Satoshi  Min. Limit
                </div>
                <div class="col-md-3">
                    <?php
                    $dataMinlimit = array(
                        'id' => 'txtMinLimit',
                        'name' => 'txtMinLimit',
                        'class' => 'form-control',
                        'value' => $editSatoshi['0']['satoshi_min']
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
                        'class' => 'form-control',
                        'value' => $editSatoshi['0']['satoshi_max']
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