<script>

function hide_error()
{
		$(".error_login_time").fadeOut(1000);
}

    function check_login()
    {
        username = $("#username").val();
        password = $("#password").val();
        user_answer = parseInt($("#answer").val());
        result = parseInt($("#result").val());

        if (isNaN(user_answer))
        {
            alert("Invalid answer...!");
            $("#msg").empty();
            $("#msg").append("Invalid answer...!");
            $("#answer").val("");

            var modal = document.getElementById('myModal');
            modal.style.display = "block";

            return;
        }
        if (user_answer != result)
        {
            alert("Wrong Answer....!");
            $("#msg").empty();
            $("#msg").append("Wrong Answer...!");
            $("#answer").val("");

            var modal = document.getElementById('myModal');
            modal.style.display = "block";

            return;
        }
        $("#login").prop('disabled', true);
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/welcome/process_login",
            datatype: "text",
            data: {username: username, password: password},
            success: function (response)
            {
				
                if (response == "success")
                {

                    window.location = "<?php echo site_url("welcome/login_success"); ?>";

                } else
                {
					$(".error_login_time").show();
					
					
                    $("#msg").empty();
                    $("#msg").append("Invalid Username / Password");

                   /*  $("#username").val("");
                    $("#password").val(""); */
                   /*  $("#error").empty(); */

                    var modal = document.getElementById('myModal');
                    modal.style.display = "block";
                }
                $("#login").prop('disabled', false);
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

<section id="main-content"  >
    <div class="row">
        <div class="small-16 large-4 columns">
            <center><img class="registerbheem" src="<?php echo base_url(); ?>client_assets/assets/3new.png"/></center>
        </div> 
        <div class="small-16 large-11 columns">
            <div class="container" style="background-color: rgba(107, 63, 15, 0.63);
                 padding: 3%;">
                <h3>MEMBER ACCESS</h3>
				
				<span  class="error_login_time error_login_error" style="color:red;display:none;margin-left: 260px !important;">Login error!</span>				
				<br>
				<span class="error_login_time" style="color:red;margin-left: 133px;display:none;">Your account cannot be found in our database</span>
				
				
                <form action="<?php echo site_url('welcome/process_login'); ?>" method="POST">

                    <label>Username
                        <input type="text" onchange="hide_error();" onblur="hide_error();"   onkeyup="hide_error();" onblur="hide_error();"  name="username" id="username" required placeholder="" aria-describedby="exampleHelpText" style="margin-top:1%;color:black;">
                    </label>


                    <label>Password
                        <input type="password"  onchange="hide_error();" onblur="hide_error();"   onkeyup="hide_error();" name="password" id="password" required placeholder="" aria-describedby="exampleHelpText" style="color:black;margin-top:1%;margin-bottom:6%;">
                    </label>
                    <center><p id="error"></p></center>
                    <h4 style="text-align:center;margin-top:4%;">Please solve the simple math :</h4>
                    <h5 style="text-align:center;letter-spacing:2px;"><?php echo $f_number . " " . $operation . " " . $s_number; ?></h5>
                    <center>
                        <input type="text" required id="answer" name="answer" placeholder="" aria-describedby="exampleHelpText" style="margin-top:1%;margin-bottom:5%;width: 70%;color:black;" onchange="check_answer();">
                        <input type="hidden" name="result" id="result" placeholder="" value="<?php echo $result; ?>">

                    </center>

                    <input type="button" name="login" id="login" value="Login" onclick="check_login();" class="expanded lime-button">

                    <p style="margin-top: 3%;
                       float: right;

                       color: #efef85;
                       font-family: Luckiest Guy, cursive;
                       font-weight: 200;"><a href="<?php echo site_url('welcome/register'); ?>">Join Now</a> <span style="float:right;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('welcome/lost_password'); ?>">Lost Password</a></span></p>
                </form>

            </div> 
        </div> 



    </div> 	
</section>
