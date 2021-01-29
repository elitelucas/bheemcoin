<script>
    $(document).ready(function ()
    {
        $('#profileForm').validate(
                {
                    rules:
                            {
                                txtOldPassword:
                                        {
                                            required: true,
                                            remote: {
                                                url: "<?php echo base_url('admin/login/verifyOldPassword'); ?>",
                                                type: "POST",
                                                data: {
                                                    txtOldPassword: function () {
                                                        return $("#txtOldPassword").val();
                                                    }
                                                }
                                            }
                                        },
                                txtUsername:
                                        {
                                            required: true
                                        },
                                txtPassword:
                                        {
                                            required: true
                                        },
                                txtCPassword:
                                        {
                                            required: true,
                                            equalTo: "#txtPassword"
                                        }
                            },
                    messages:
                            {
                                txtOldPassword:
                                        {
                                            required: '',
                                            remote: 'Old Password not match'
                                        },
                                txtUsername:
                                        {
                                            required: ''
                                        },
                                txtPassword:
                                        {
                                            required: ''
                                        },
                                txtCPassword:
                                        {
                                            required: '',
                                            equalTo: 'Password Not Match'
                                        }
                            }
                });
    });
</script>
<div class="col-lg-12">
    <div class="card-box">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3 col-md-2"></div>
                <div class="col-sm-4 offset-sm-4 col-md-3 offset-md-0">
                    <h2 class="header-title ">Profile</h2>
                </div>
            </div>               

            <?php
            $formData = array('name' => 'profileForm', 'id' => 'profileForm');
            echo form_open('admin/login/profile', $formData);
            ?>
            <?php
            if ($this->session->flashdata('failed')) {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('failed'); ?>
                </div>
                <?php
            }
            ?>
            <div class="form-group row">
                <label for="hori-pass1" class="col-2 col-form-label">Old Password<span class="text-danger">*</span></label>
                <div class="col-7">                    
                    <?php
                    $passwordOldData = array(
                        'name' => 'txtOldPassword',
                        'id' => 'txtOldPassword',
                        'class' => 'form-control required',
                        'placeholder' => 'Old Password'
                    );
                    echo form_password($passwordOldData);
                    ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="hori-pass1" class="col-2 col-form-label">Password<span class="text-danger">*</span></label>
                <div class="col-7">                    
                    <?php
                    $passwordData = array(
                        'name' => 'txtPassword',
                        'id' => 'txtPassword',
                        'class' => 'form-control required',
                        'placeholder' => 'Password'
                    );
                    echo form_password($passwordData);
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="hori-pass2" class="col-2 col-form-label">Confirm Password
                    <span class="text-danger">*</span></label>
                <div class="col-7">                    
                    <?php
                    $passwordConfirmData = array(
                        'name' => 'txtCPassword',
                        'id' => 'txtCPassword',
                        'class' => 'form-control required',
                        'placeholder' => 'Confirm Password'
                    );
                    echo form_password($passwordConfirmData);
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-2 col-form-label">Bitcoin Address<span class="text-danger">*</span></label>
                <div class="col-7">                   
                    <?php
                    //echo "<pre>";                    print_r($profileData); die;

                    $userBitcoin_address = array(
                        'name' => 'txtbitcoin_address',
                        'id' => 'txtbitcoin_address',
                        'class' => 'form-control',
                        'placeholder' => 'Bitcoin Address',
                        'value' => $profileData['bitcoin_address']
                    );
                    echo form_input($userBitcoin_address);
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-2 col-form-label">email<span class="text-danger">*</span></label>
                <div class="col-7">                   
                    <?php
                    $userEmail = array(
                        'name' => 'txtEmail',
                        'id' => 'txtEmail',
                        'class' => 'form-control',
                        'placeholder' => 'Email',
                        'value' => $profileData['email']
                    );
                    echo form_input($userEmail);
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 col-md-2"></div>
                <div class="col-sm-3 offset-sm-3 col-md-3 offset-md-0">
                    <div class="col-sm-offset-1">                                                
                        <?php
                        $userSubmit = array(
                            'name' => 'cmdSubmit',
                            'value' => 'UPDATE',
                            'id' => 'cmdSubmit',
                            'class' => 'btn btn-primary btn-custom w-md waves-light'
                        );
                        echo form_submit($userSubmit);
                        ?>                        
                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                            CANCEL
                        </button>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>

            <div class="visible-lg" style="height: 79px;"></div>
        </div>
    </div>
</div>