
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">List All Player</h4>                    
                </div>                
                <div class=""  style="float:right">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/player/add'); ?>" class="btn btn-primary">
                            Add Player
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
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&nbsp;&nbsp;×</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        </div>
        <?php
    }    
    ?>
    <table id="listPlayer" class="cell-border datatables" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Sr.no</th>                
                <th>Images</th>   
                <th>Name</th>
                <th>Minutes</th> 
                <th>Membership</th> 
                <th>Price</th>
                <th>Type</th>
                <th>Daily Limit</th>
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
                <th>Membership</th> 
                <th>Price</th>
                <th>Type</th>
                <th>Daily Limit</th>
                <th>Edit</th>

                <!--th>Delete</th-->
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <?php
                $i = 1;
                foreach ($playerDetails as $player) {
                    ?>
                    <td width = "5%" style="text-align: center"><?php echo $i ?></td>
                    <td width = "10%">
                        <img src="<?php echo base_url() . '/admin_assets/assets/images/player/' . $player['player_image'] ?>" width="75px">
                    </td>
                    <td width = "10%"><?php echo $player['player_name']; ?></td>
                    <td width = "10%">
                        <?php echo $player['player_satoshi_minute']; ?>
                    </td>
                    <td width = "10%">
                        <?php echo $player['player_membership']; ?>
                    </td>
                    <td width = "5%">
                        <?php echo $player['player_price']; ?>
                    </td>
                    <td width = "5%">
                        <?php
                        if ($player['player_price_type'] == '1') {
                            echo 'Satoshi';
                        } else if ($player['player_price_type'] == '2') {
                            echo 'Star';
                        } else if ($player['player_price_type'] == '3'){
                            echo 'Btc';
                        }
                        ?>
                    </td>
                    <td width = "20%">
    <?php echo $player['player_daily_limit']; ?>
                    </td>
                    <td width = "10%">
                        <a href="<?php echo base_url('admin/player/edit/' . $player['player_id']); ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                    <!--td width = "5%">
                        <a href="<?php echo base_url('admin/player/delete/' . $player['player_id']); ?>">
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