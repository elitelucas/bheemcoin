<?php
if ($this->session->flashdata('success_profile')) {
    ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $this->session->flashdata('success_profile'); ?>
    </div>
    <?php
}

if ($this->session->flashdata('success_settings')) {
    ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $this->session->flashdata('success_settings'); ?>
    </div>
    <?php
}
?>