
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">List All Worker</h4>                    
                </div>                
                <!--div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/worker/add'); ?>" class="btn btn-primary">
                            Add Worker
                        </a>
                    </h4>                    
                </div--> 
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
    <table id="listWorker" class="cell-border datatables" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Sr.no</th>                
                <th>Images</th>   
                <th>Name</th>
                <th>Minutes</th> 
                <th>Value</th> 
                <th>Status</th>
                <th>Edit</th>
                <!--th>Delete</th-->
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Sr.no</th>                
                <th>Images</th>   
                <th>Name</th>
                <th>Minutes</th> 
                <th>Value</th> 
                <th>Status</th>
                <th>Edit</th>
                <!--th>Delete</th-->
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <?php
                $i = 1;
                foreach ($workerDetails as $worker) {
                    ?>
                    <td width = "5%" style="text-align: center"><?php echo $i ?></td>
                    <td width = "15%">
                        <img src="<?php echo base_url() . '/admin_assets/assets/images/worker/' . $worker['worker_image'] ?>" width="75px">
                    </td>
                    <td width = "10%"><?php echo $worker['worker_name']; ?></td>
                    <td width = "10%">
                        <?php echo $worker['worker_minute']; ?>
                    </td>
                    <td width = "10%">
                        <?php echo $worker['worker_value']; ?>
                    </td>
                    <td width = "50%">
                        <?php echo $worker['worker_status']; ?>
                    </td>
                    <td width = "5%">
                        <a href="<?php echo base_url('admin/worker/edit/' . $worker['worker_id']); ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                    <!--td width = "5%">
                        <a href="<?php echo base_url('admin/worker/delete/' . $worker['worker_id']); ?>">
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