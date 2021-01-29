
<script>
    function check_answer()
    {
        user_answer = parseInt($("#answer").val());
        result = parseInt($("#result").val());
        if (user_answer != result)
        {
            alert("Wrong Answer");
            $("#answer").val("");
            $("#answer").focus();
        }
    }
    function check_captcha_answer()
    {
        user_answer = $("#answer_captcha").val();
        result = $("#result_captcha").val();
        if (user_answer != result)
        {
            alert("Wrong Answer");
            $("#answer_captcha").val("");
            $("#answer_captcha").focus();
        }
    }
    function check_smart_captcha_answer()
    {
        user_answer = $("#smart_answer_captcha").val();
        result = $("#result_smart_captcha").val();

        if (user_answer != result)
        {
            alert("Wrong Answer");
            $("#smart_answer_captcha").val("");
            $("#smart_answer_captcha").focus();
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

                if (response == "success")
                {
                    alert("Invalid Email.....!");
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
                <h3>Lost Password </h3>
                <form action="<?php echo site_url('welcome/send_password_link'); ?>" method="POST">
                    <label>Email
                        <input type="text" name="email" id="email" onchange="check_email();" placeholder="Enter Your Email" aria-describedby="exampleHelpText" style="margin-top:1%;color: black;" required>
                    </label>

                    <h4 style="text-align:center;margin-top:4%;">Please solve the simple math :</h4>
                    <h5 style="text-align:center;letter-spacing:2px;"><?php echo $f_number . " " . $operation . " " . $s_number; ?></h5>
                    <center>
                        <input type="text" required id="answer" name="answer" placeholder="" aria-describedby="exampleHelpText" style="margin-top:1%;margin-bottom:5%;width: 70%;color:black;" onchange="check_answer();">
                        <input type="hidden" name="result" id="result" placeholder="" value="<?php echo $result; ?>">

                    </center>
                    <center>
                        <input type="submit" value="Send Link" class="expanded lime-button">
                    </center>
            </div>
        </div>

        <div class="small-16 large-5 columns">
            <img src="<?php echo base_url(); ?>client_assets/assets/1.png" />
        </div>
    </div>
</form>

</section>  

