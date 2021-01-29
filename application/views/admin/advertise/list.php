
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">List All Advertise</h4>                    
                </div>                
                <div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/advertise/add'); ?>" class="btn btn-primary">
                            Add  Advertise Limit
                        </a>
                    </h4>                    
                </div> 
                <div class="clearfix"></div>                
            </div>            
        </div>
    </div>

    <?php
    if ($this->session->flashdata('success')) {
        ?><div class="row">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&nbsp;&nbsp;Ã</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    echo validation_errors();
    ?>
    <table id="listSlider" class="cell-border datatables" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Sr.no</th>                  
                <th>Advertise Name</th> 
                <th>Edit</th>
                <!--th>Delete</th-->
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Sr.no</th>                 
                <th>Advertise Name</th> 
                <th>Edit</th>
                <!--th>Delete</th-->
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <?php
                $i = 1;

                foreach ($AdvertiseDetails as $listDetails) {
                    ?>
                    <td width = "5%" style="text-align: center"><?php echo $i ?></td>                    
                    <td width = "75%">
                        <?php echo $listDetails['advertise_name']; ?>
                    </td>
                    <td width = "5%">
                        <a href="<?php echo base_url('admin/advertise/edit/' . $listDetails['advertise_id']); ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                    <!--td width = "5%">
                        <a href="<?php echo base_url('admin/advertise/delete/' . $listDetails['advertise_id']); ?>">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </td-->                
                </tr>
                <?php
                $i++;
            }
            ?>

        </tbody>
    </table>


</div>