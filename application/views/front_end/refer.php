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
    function validate_password()
    {
        pass = $("#pass").val();
        c_pass = $("#cpass").val();

        if (pass != c_pass)
        {
            alert("Password Mismatch");
            $("#pass").val("");
            $("#cpass").val("");
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
</script>

    <section id="home-slider">

        <!--//slide 1-->
        <!--slide-2-->
        <div style="background: url('<?php echo base_url(); ?>client_assets/assets/banners/inner-header.png')">
            <div class="row">
                <div class="small-16 columns">
                    <div class="cta-text" style="">
                    </div>
                </div>
            </div>
        </div>
        <!--//slide-2-->

        <!--//slide-3-->
    </section>
    <div class="content-top"></div>
    <section id="main-content"  >
        <div class="row">
            <div class="small-16 large-11 columns">
                <div class="container" style="background-color: rgba(107, 63, 15, 0.63);
                     padding: 3%;">
                    <h3>Account Details </h3>
                    <!--form action="<?php echo site_url('welcome/process_register'); ?>" method="POST"-->
                    <form action="<?php echo base_url('welcome/register'); ?>" method="POST">
                        <label>Username
                            <input type="text" name="name" id="name" onchange="check_username();" required placeholder="Please select a unique username. You may only use letters and numbers." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                        </label>
                        <label>Password
                            <input type="password" name="pass" id="pass" required placeholder="Please choose a unique password for your account." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                        </label>
                        <label>Verify Password
                            <input type="password" name="cpass" id="cpass" required placeholder="Please re-enter your password." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;" onchange="validate_password();">
                        </label>
                        <label>Referrer
                            <input type="text" name="refer" id="reference" value="<?php echo $refer; ?>" onchange="validate_reference();" placeholder="The member who referred you." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                        </label>
                </div> 
            </div>
            <div class="small-16 large-5 columns">
                <img src="<?php echo base_url(); ?>client_assets/assets/1.png"/>
            </div> 
        </div> 	
        <div class="row" style="padding-top:3%;">
            <div class="small-16 large-5 columns">
                <img src="<?php echo base_url(); ?>client_assets/assets/2.png"/>
            </div>
            <div class="small-16 large-11 columns">
                <div class="container" style="    background-color: rgba(107, 63, 15, 0.63);
                     padding: 3%;">
                    <h3>Personal Details</h3>
                    <label>Your Bitcoin Address
                        <input type="text" name="bitcoin" id="bitcoin" required placeholder="Please enter your bitcoin wallet address." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                    </label>
                    <label>Your Email Address
                        <input type="email" name="email" id="email" required placeholder="We will send you an activation email so be sure to enter a valid and current address." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                    </label>
                    <label>How did you find us?
                        <input type="text" name="find" id="find" required placeholder="Write anything from where you come, this will help us on site promoting." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                    </label>
                    <p style="text-align:center;color: #ea5050;font-weight:bold;">Notice* : only one account is allowed per Person /house/ location!</p>
                    <p style="text-align:center;color: #ea5050;font-weight:bold;">Multi-Accounts are Not Allowed.</p>
                    <h4 style="text-align:center;margin-top:4%;">Please solve the simple math :</h4>
                    <h5 style="text-align:center;letter-spacing:2px;"><?php echo $f_number . " " . $operation . " " . $s_number; ?></h5>
                    <center>
                        <input type="text" required id="answer" name="answer" placeholder="" aria-describedby="exampleHelpText" style="margin-top:1%;margin-bottom:5%;width: 70%;color:black;" onchange="check_answer();">
                        <input type="hidden" name="result" id="result" placeholder="" value="<?php echo $result; ?>">
                    </center>
                    <center><input type="submit" value="Create Account" class="expanded lime-button" name="cmdSubmit"></center>
                    </form>
                </div> 
            </div> 
        </div>
    </section>

