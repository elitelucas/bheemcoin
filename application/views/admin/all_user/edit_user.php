<script src="<?php echo base_url('ckeditor/ckeditor.js'); ?>"></script>
<link rel="stylesheet" href="<?php base_url('style/format.css'); ?>">
<style>
table.dataTable {
	width: 49% !important;
	margin: 0 auto;
	clear: both;
	border-collapse: separate;
	border-spacing: 0;
}
</style>    
</style>
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class=""  style="float:left">
                    <h4 class="page-title">Edit User</h4>                    
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
    <form name="edituser" id="edituser" method="post">
    <table id="listSlider" class="cell-border datatables" width="100%" cellspacing="0">
       
       
    <tbody>
    <tr>
        <td>Username</td>
        <td width = "10%">
        <input type="text" name="username" id="username" value="<?php echo $All_userDetails[0]['username']; ?>"></td>
    </tr>
    <tr>
        <td>Email</td>  
        <td width = "10%"><input type="text" name="email" id="email" value="<?php echo $All_userDetails[0]['email']; ?>"></td>
    </tr>    
    <tr>
        <td>Satoshi </td> 
        <td width = "15%"><input type="text" name="satoshi" id="satoshi" value="<?php echo $All_userDetails[0]['user_attack_player_satoshi']; ?>"></td>
    <tr>    
            <td>Bitcoin Address</td>        
            <td width = "20%">
                        <input size="35" type="text" name="bitcoin_address" id="bitcoin_address" value="<?php echo $All_userDetails[0]['bitcoin_address']; ?>">
                    </td>
    </tr>        
    <tr>           <td>Status</td>       <td width = "10%">
                         <select name="status" id="status">
                         
                        <?php
                        $block='';
                        $active='';
                        if ($All_userDetails[0]['status'] == 0) {
                        $block="selected='selected'";
                            
                        }else{
                            
                            $active="selected='selected'";
                        }
                            ?>
                            <option <?php echo $block;?> value='0'>Block</option>
                            <option <?php echo $active;?> value='1'>Active</option>
                        
                        </select>
                    </td>
        </tr>        
  
          <tr><td></td><td><input  type="submit" name="update" id="update" value="Update"></td></tr> 
        </tbody>
    </table>
    </form>
</div>