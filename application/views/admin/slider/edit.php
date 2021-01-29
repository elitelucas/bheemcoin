<script>
    $(document).ready(function ()
    {
        $('#editSlider').validate(
                {
                    rules:
                            {
                                imgUplods:
                                        {
                                            required: true
                                        }
                            },
                    messages:
                            {
                                imgUplods:
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
                        <a href="<?php echo base_url('admin/slider'); ?>" class="btn btn-primary">
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
        'id' => 'editSlider',
        'name' => 'editSlider'
    );
    echo form_open_multipart('admin/slider/edit/' . $editSlider['0']['slider_id'], $formEdit);
    ?>
    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Image
                </div>                
                <div class="col-md-3">
                    <img src="<?php echo base_url() . '/admin_assets/assets/images/slider/' . $editSlider[0]['slider_image'] ?>" width="100px">
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
                    content
                </div>
                <div class="col-md-3">
                    <?php
                    $fileContent = array(
                        'name' => 'content_text',
                        'id' => 'content_text',
                        'rows' => '10',
                        'cols' => '20',
                        'style' => 'width:100%',
                        'value' => $editSlider[0]['slider_content']
                    );

                    echo form_textarea($fileContent);
                    ?>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    Slider Display
                </div>
                <div class="col-md-3">
                    <?php
                    $dataAdmin = array(
                        'id' => 'cmbAdmin',
                        'class' => 'form-control'
                    );

                    $slider_value = array(
                        '1' => 'Before Login',
                        '2' => 'After Login',
                    );

                    echo form_dropdown('cmbAdmin', $slider_value, $editSlider[0]['slider_view'], $dataAdmin);
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
                    'id' => 'imgUplod',
                    'name' => 'imgUplod'
                );
                echo form_submit('cmdSubmit', 'Submit', $submit);
                ?>
                <input type="hidden" id="imgHiddenId" name="imgHiddenId" value="<?php echo $editSlider[0]['slider_id'] ?>">
            </div>
        </div>
    </div>
    <?php
    echo form_close();
    ?>
</div>