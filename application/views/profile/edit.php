<script>
    function check_answer()
    {
        user_answer = parseInt($("#answer").val());
        result = parseInt($("#result").val());
        if (user_answer != result)
        {
            alert("Wrong Answer");
            $("#answer").val("");
        }
    }
    /*function validate_password()
     {
     pass = $("#pass").val();
     c_pass = $("#cpass").val();
     
     if (pass != c_pass)
     {
     alert("Password Mismatch");
     $("#pass").val("");
     $("#cpass").val("");
     }
     }*/

    function validate_password()
    {
        pass = $("#pass").val();
        c_pass = $("#c_pass").val();

        if (pass != c_pass)
        {
            alert("Password Mismatch");
            $("#pass").val("");
            $("#c_pass").val("");
            $("#pass").focus();
        }
    }
    function check_username()
    {
        name = $("#name").val();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/welcome/check_username_availability",
            datatype: "text",
            data: {name: name},
            success: function (response)
            {

                if (response == "false")
                {
                    alert("Username already exist, try another username");
                    $("#name").val("");
                    $("#name").focus();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {}
        });
    }
    function validate_reference()
    {
        refer_data = $("#reference").val();

        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/welcome/validate_reference",
            datatype: "text",
            data: {refer_data: refer_data},
            success: function (response)
            {
                if (response == "false")
                {
                    alert("Invalid Reference Code");
                    $("#reference").val("");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {}
        });
    }
    function check_email()
    {
        email = $("#email").val();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/welcome/check_email_availability",
            datatype: "text",
            data: {email: email},
            success: function (response)
            {

                if (response == "false")
                {
                    alert("Email ID already exist, try another email");
                    $("#email").val("");
                    $("#email").focus();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {}
        });
    }
</script>

<section id="main-content">

    <div class="row">
        <div class="small-16 large-11 columns">
            <div class="container" style="background-color: rgba(107, 63, 15, 0.63);
                 padding: 3%;">
                <div class="row">
                    <h3>Account Details  <?php
                        if ($profileDetails['image'] != "") {
                            ?>
                         <img style="height: 100px;float: right;" src="<?php echo base_url('client_assets/assets/user_profile/'.$profileDetails['image']); ?>">
                                <?php
                        }
                        ?></h3>
                </div>
                <div class="row">
                    <?php
                    if ($this->session->flashdata('error')) {
                        echo $this->session->flashdata('error');
                    }
                    ?>
                </div>
                <form action="<?php echo base_url('profile/edit'); ?>" method="POST" enctype="multipart/form-data">
                    <?php
                    if ($this->session->flashdata('abc')) {
                        ?>
                        <center><span class="text-semibold" style="color:#fff;">Invalid old Password</span></center>
                        <?php
                    }
                    ?>
                    <label>Username
                        <input type="text" name="name" id="name" onchange="check_username();" value="<?php echo $profileDetails['username']; ?>" readonly required placeholder="Please select a unique username. You may only use letters and numbers." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;background-color: rgba(222, 216, 219, 0.25);">
                    </label>
                    <label>Your Bitcoin Address
                        <input type="text" name="bitcoin" id="bitcoin" required value="<?php echo $profileDetails['bitcoin_address']; ?>"  placeholder="Please enter your bitcoin wallet address." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                    </label>

                    <label>Your Email Address
                        <input type="email" name="email" id="email" onchange="check_email();" value="<?php echo $profileDetails['email']; ?>" required placeholder="We will send you an activation email so be sure to enter a valid and current address." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                    </label> 

                    <label>Old Password
                        <input type="password" name="old" id="old" required placeholder="Old password." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;" required>
                    </label>
                    <?php
                    if ($this->session->flashdata('abc')) {
                        ?>
                        <center><span class="text-semibold" style="color:#fff;">Invalid old Password</span></center>
                        <?php
                    }
                    ?>

                    <label>New Password
                        <input type="password" name="password" id="pass" placeholder="New password." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                    </label>
                    <label>Verify Password
                        <input type="password" name="cpass" id="c_pass" onchange="validate_password();" placeholder="Confirm password." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                    </label>
                        <?php
                        if ($profileDetails['image'] != "") {
                            ?>
                         <img style="height: 100px;float: left;" src="<?php echo base_url('client_assets/assets/user_profile/'.$profileDetails['image']); ?>">
                                <?php
                        }
                        ?>                                                                                               
                        <!--img style="height: 100px;" src="<?php echo base_url('client_assets/assets/user_profile/'.$profileDetails['image']); ?>"-->
                    <label>Profile Picture                        
                        <input type="file" name="imgUplod" id="imgUplod" aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                    </label>
                    <label>How did you find us?
                        <input type="text" name="find" id="find" required value="<?php echo $profileDetails['how_find']; ?>" placeholder="Write anything from where you come, this will help us on site promoting." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                    </label>
            </div>
            <h4 style="text-align:center;margin-top:4%;">Please solve the simple math :</h4>
            <h5 style="text-align:center;letter-spacing:2px;"><?php echo $f_number . " " . $operation . " " . $s_number; ?></h5>
            <center>
                <input type="text" required id="answer" name="answer" placeholder="" aria-describedby="exampleHelpText" style="margin-top:1%;margin-bottom:5%;width: 70%;color:black;" onchange="check_answer();">
                <input type="hidden" name="result" id="result" placeholder="" value="<?php echo $result; ?>">

            </center>

            <center>
                <input type="hidden" name="hiddenValue" id="hiddenValue">
                <input type="submit" value="Update" class="expanded lime-button" name="cmdSubmit">
                
            </center>
            </form>

        </div>

        <div class="small-16 large-5 columns">
            <img src="<?php echo base_url(); ?>client_assets/assets/1.png" />
        </div>
    </div>

</section>




