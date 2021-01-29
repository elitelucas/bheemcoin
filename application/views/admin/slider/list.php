
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">List All Slider</h4>                    
                </div>                
                <div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/slider/add'); ?>" class="btn btn-primary">
                            Add Slider
                        </a>
                    </h4>                    
                </div> 
                <div class="clearfix"></div>                
            </div>            
        </div>
    </div>

    <?php
    if ($this->session->flashdata('imageUpload')) {
        ?><div class="row">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&nbsp;&nbsp;×</button>
                <?php echo $this->session->flashdata('imageUpload'); ?>
            </div>
        </div>
        <?php
    }

    if ($this->session->flashdata('successUplod')) {
        ?><div class="row">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&nbsp;&nbsp;×</button>
                <?php echo $this->session->flashdata('successUplod'); ?>
            </div>
        </div>
        <?php
    }


    if ($this->session->flashdata('imageDelete')) {
        ?><div class="row">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&nbsp;&nbsp;×</button>
                <?php echo $this->session->flashdata('imageDelete'); ?>
            </div>
        </div>
        <?php
    }
    ?>
    <table id="listSlider" class="cell-border datatables" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Sr.no</th>
                <th>Images</th>   
                <th>Display</th> 
                <th>Edit</th>
                <th>Delete</th>                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Sr.no</th>
                <th>Images</th>  
                <th>Display</th> 
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <?php
                $i = 1;

                foreach ($sliderDetails as $slider) {
                    ?>
                    <td width = "5%" style="text-align: center"><?php echo $i ?></td>
                    <td width = "15%">

                        <img src="<?php echo base_url() . '/admin_assets/assets/images/slider/' . $slider['slider_image'] ?>" width="100px">
                    </td>
                    <td width = "75%">
                        <?php
                        if ($slider['slider_view'] == 1) {
                            echo 'Before Login';
                        } else if ($slider['slider_view'] == 2) {
                            echo 'After Login';
                        }
                        ?>
                    </td>
                    <td width = "5%">
                        <a href="<?php echo base_url('admin/slider/edit/' . $slider['slider_id']); ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td width = "5%">
                        <a href="<?php echo base_url('admin/slider/delete/' . $slider['slider_id']); ?>">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </td>                
                </tr>
                <?php
                $i++;
            }
            ?>


        </tbody>
    </table>


</div>