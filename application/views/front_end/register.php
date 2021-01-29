<script>
    function check_answer()
    {
        user_answer = parseInt($("#answer").val());
        result = parseInt($("#result").val());

        $("#msg").empty();
        $("#msg").append("Wrong Answer");
        if (user_answer != result)
        {
            $("#answer").val("");
            $("#answer").focus();

            var modal = document.getElementById('myModal');
            modal.style.display = "block";
        }
    }
    function check_captcha_answer()
    {
        user_answer = $("#answer_captcha").val();
        result = $("#result_captcha").val();
        if (user_answer != result)
        {
            $("#msg").empty();
            $("#msg").append("Invalid Captcha");

            $("#answer_captcha").val("");
            $("#answer_captcha").focus();
            var modal = document.getElementById('myModal');
            modal.style.display = "block";
        }
    }
    function check_smart_captcha_answer()
    {
        user_answer = $("#smart_answer_captcha").val();
        result = $("#result_smart_captcha").val();

        if (user_answer != result)
        {
            $("#msg").empty();
            $("#msg").append("Invalid Smart Captcha");

            $("#smart_answer_captcha").val("");
            $("#smart_answer_captcha").focus();

            var modal = document.getElementById('myModal');
            modal.style.display = "block";

        }
    }
    function validate_password()
    {
        pass = $("#pass").val();
        c_pass = $("#cpass").val();
$("#msgp").empty();
        if (pass != c_pass)
        {
            $("#msgp").empty();
            $("#msgp").append("Password Mismatch");

            $("#pass").val("");
            $("#cpass").val("");

            var modal = document.getElementById('myModal');
            modal.style.display = "block";
        }
    }
    function check_username()
    {
        name = $("#name").val();
         $("#msgu").empty();
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/welcome/check_username_availability",
            datatype: "text",
            data: {name: name},
            success: function (response)
            {

                if (response == "false")
                {
                    $("#msgu").empty();
                    $("#msgu").append("Username already exist, try another username");

                    $("#name").val("");
                    $("#name").focus();

                    var modal = document.getElementById('myModal');
                    modal.style.display = "block";
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
                    $("#msg").empty();
                    $("#msg").append("Invalid Reference Code");


                    $("#reference").val("");
                    var modal = document.getElementById('myModal');
                    modal.style.display = "block";
				
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
                    $("#msg").empty();
                    $("#msg").append("Email ID already exist, try another email");

                    $("#email").val("");
                    $("#email").focus();

                    var modal = document.getElementById('myModal');
                    modal.style.display = "block";
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {}
        });
    }

    $('html').click(function ()
    {
        var modal = document.getElementById('myModal');
        modal.style.display = "none";
    });

    $('html').keypress(function ()
    {

        var modal = document.getElementById('myModal');
        modal.style.display = "none";
    });

    $('.close').click(function (e)
    {
        var modal = document.getElementById('myModal');
        modal.style.display = "none";
    });

</script>
<section id="main-content">
    <div class="row">
        <div class="small-16 large-11 columns">
            <div class="container" style="background-color: rgba(107, 63, 15, 0.63);
                 padding: 3%;">
                <h3>Account Details </h3>
                <!--form action="<?php echo site_url('welcome/process_register'); ?>" method="POST"-->
                <?php // echo validation_errors(); ?>
                <?php
                if ($this->session->flashdata('failed_ip')) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <?php echo $this->session->flashdata('failed_ip'); ?>
                    </div>
                    <?php
                }
                ?>
                <form action="<?php echo base_url('welcome/register'); ?>" method="POST">
                    <label>Username
                        <input type="text" name="name" id="name" onchange="check_username();" required placeholder="Please select a unique username. You may only use letters and numbers." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;" value="<?php echo set_value('name') ?>">
						<span style="color:red;font-weight:bold" id="msgu"></span>
					</label>

                    <label>Password
                        <input type="password" name="pass" id="pass" required placeholder="Please choose a unique password for your account." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;" value="" >
                    </label>

                    <label>Verify Password
                        <input type="password" name="cpass" id="cpass" required placeholder="Please re-enter your password." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;" onchange="validate_password();">
                    <span style="color:red;font-weight:bold" id="msgp"></span>
					</label>
                    <?php
                    $id = $this->uri->segment(3);
                    $refer = $id;
                    ?>
                    <label>Referrer
                        <input type="text" name="refer" id="reference" onchange="validate_reference();" placeholder="The member who referred you." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;" value="<?php echo $refer ?>">
                    <span style="color:red;font-weight:bold" id="msgv"></span>
					</label>
            </div>
        </div>

        <div class="small-16 large-4 columns">
            <img class="registerbheem" src="<?php echo base_url(); ?>client_assets/assets/1.png" />
        </div>
    </div>

    <div class="row" style="padding-top:3%;">
        <div class="small-16 large-4 columns">
            <img class="registerbheem" src="<?php echo base_url(); ?>client_assets/assets/2.png" />
        </div>
        <div class="small-16 large-11 columns">
            <div class="container" style="    background-color: rgba(107, 63, 15, 0.63);
                 padding: 3%;">
                <h3>Personal Details</h3>
                <label>Your Bitcoin Address
                    <input type="text" name="bitcoin" id="bitcoin" required placeholder="Please enter your bitcoin wallet address." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;" value="<?php echo set_value('bitcoin') ?>">
                </label>

                <label>Your Email Address
                    <input type="email" name="email" id="email" onchange="check_email();" required placeholder="We will send you an activation email so be sure to enter a valid and current address." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;" value="<?php echo set_value('email') ?>">
                </label>

                <label>How did you find us?
                    <input type="text" name="find" id="find" required placeholder="Write anything from where you come, this will help us on site promoting." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;" value="<?php echo set_value('find') ?>">
                </label>

                <p style="text-align:center;color: #ea5050;font-weight:bold;">Notice* : only one account is allowed per Person /house/ location!</p>
                <p style="text-align:center;color: #ea5050;font-weight:bold;">Multi-Accounts are Not Allowed.</p>

                <h4 style="text-align:center;margin-top:4%;">Please solve the simple math :</h4>
                <h5 style="text-align:center;letter-spacing:2px;"><?php echo $f_number . " " . $operation . " " . $s_number; ?></h5>
                <center>
                    <input type="text" required id="answer" name="answer" placeholder="" aria-describedby="exampleHelpText" style="margin-top:1%;margin-bottom:5%;width: 70%;color:black;" onchange="check_answer();">
                    <input type="hidden" name="result" id="result" placeholder="" value="<?php echo $result; ?>">

                </center>

                <h4 style="text-align:center;margin-top:4%;">Enter text of the Image:</h4>
                <center>
                    <p style="text-align:center;letter-spacing:2px;background-image: url(<?php echo base_url(); ?>/client_assets/cap_bg.jpg);width:25%;color:#000;">
                        <?php echo $image_captcha; ?>
                    </p>
                </center>
                <center>
                    <input type="text" required id="answer_captcha" name="answer_captcha" placeholder="" aria-describedby="exampleHelpText" style="margin-top:1%;margin-bottom:5%;width: 70%;color:black;" onchange="check_captcha_answer();">
                    <input type="hidden" name="result_captcha" id="result_captcha" placeholder="" value="<?php echo $image_captcha; ?>">
                </center>

                <h4 style="text-align:center;margin-top:4%;">Smart Captcha</h4>
                <center>
                    <p style="text-align:center;letter-spacing:2px;font-size: 31px;background-image: url(<?php echo base_url(); ?>/client_assets/captcha.png);width:25%;color:#7d8061;">
                        <?php echo $smart_captcha; ?>
                    </p>
                </center>

                <center>
                    <input type="text" required id="smart_answer_captcha" name="smart_answer_captcha" placeholder="" aria-describedby="exampleHelpText" style="margin-top:1%;margin-bottom:5%;width: 70%;color:black;" onchange="check_smart_captcha_answer();">
                    <input type="hidden" name="result_smart_captcha" id="result_smart_captcha" placeholder="" value="<?php echo $smart_captcha; ?>">
                </center>

                <center>
                    <input type="submit" value="Create Account" class="expanded lime-button" name="cmdSubmit">
                </center>
                </form>

            </div>
        </div>

    </div>
</section>