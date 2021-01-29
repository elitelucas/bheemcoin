
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">List All Satoshi</h4>                    
                </div>                
                <!--div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/satoshi/add'); ?>" class="btn btn-primary">
                            Add  Satoshi Limit
                        </a>
                    </h4>                    
                </div--> 
                <div class="clearfix"></div>                
            </div>            
        </div>
    </div>

    <?php
    if ($this->session->flashdata('success')) {
        ?><div class="row">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&nbsp;&nbsp;×</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        </div>
        <?php
    }
    ?>
    <table id="listSlider" class="cell-border datatables" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Sr.no</th>
                <th>Min Satoshi </th>   
                <th>Max Satoshi </th> 
                <th>Edit</th>
                <!--th>Delete</th-->                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Sr.no</th>
                <th>Min Satoshi </th>   
                <th>Max Satoshi </th> 
                <th>Edit</th>
                <!--th>Delete</th-->
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <?php
                $i = 1;

                foreach ($SatoshiDetails as $listDetails) {
                    ?>
                    <td width = "5%" style="text-align: center"><?php echo $i ?></td>
                    <td width = "15%">
                        <?php echo $listDetails['satoshi_min']; ?>
                    </td>
                    <td width = "75%">
                        <?php echo $listDetails['satoshi_max']; ?>
                    </td>
                    <td width = "5%">
                        <a href="<?php echo base_url('admin/satoshi/edit/' . $listDetails['satoshi_id']); ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                    <!--td width = "5%">
                        <a href="<?php echo base_url('admin/satoshi/delete/' . $listDetails['satoshi_id']); ?>">
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