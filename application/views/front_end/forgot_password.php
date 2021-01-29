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
        c_pass = $("#c_pass").val();

        if (pass != c_pass)
        {
            alert("Password Mismatch");
            $("#pass").val("");
            $("#c_pass").val("");
            $("#pass").focus();
        }
    }
</script>
<section id="main-content">
    <div class="row">
        <div class="small-16 large-11 columns">
            <div class="container" style="background-color: rgba(107, 63, 15, 0.63);
                 padding: 3%;">
                <h3>Change Password</h3>
                <form action="<?php echo site_url('welcome/do_reset_password/' . $user[0]['id']); ?>" method="POST" enctype="multipart/form-data">
                    <label>Enter Your Mail ID:
                        <input type="email" name="email" id="email" required placeholder="Email" aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                    </label>
                    <?php
                    if ($this->session->flashdata('abc')) {
                        ?>
                        <center><span class="text-semibold" style="color:#fff;">Invalid Email</span></center>
                        <?php
                    }
                    ?>
                    <label>New Password
                        <input type="password" name="password" id="pass" required placeholder="New password." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                    </label>
                    <label>Verify Password
                        <input type="password" name="cpass" id="c_pass" onchange="validate_password();" required placeholder="Confirm password." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
                    </label>
            </div>   
            <h4 style="text-align:center;margin-top:4%;">Please solve the simple math :</h4>
            <h5 style="text-align:center;letter-spacing:2px;"><?php echo $f_number . " " . $operation . " " . $s_number; ?></h5>
            <center>
                <input type="text" required id="answer" name="answer" placeholder="" aria-describedby="exampleHelpText" style="margin-top:1%;margin-bottom:5%;width: 70%;color:black;" onchange="check_answer();">
                <input type="hidden" name="result" id="result" placeholder="" value="<?php echo $result; ?>">
            </center>
            <center><input type="submit" value="Change" class="expanded lime-button"></center>
            </form>
        </div> 
        <div class="small-16 large-5 columns">
            <img src="<?php echo base_url(); ?>client_assets/assets/1.png"/>
        </div> 
    </div>
</section>
