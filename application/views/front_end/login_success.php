<style>
    .getMonkeyStar
    {
        height:150px;
        float: right;
        margin-top: 35%;
        /* display: none;*/
    }
    .workerCSS
    {
        font-size: 20px;
        font-family: Luckiest Guy, cursive;color: yellow;
        text-decoration: underline;
    }
    .accountbottmline{
        border-bottom: 1px solid #c5db3b5e;
    }
    .callout .SatoshiWON
    {
        display: none !important;        
    }
    .callout .SatoshiWON
    {
        display: none !important;        
    }
    .callout .genereatedButton
    {
        display: none;
    }
    .callout .satoshiearned
    {
        display: none;
    }
    .callout .Satoshi_won_display .GeneratedSatoshi
    {
        display: none;
    }
    .callout .Satoshi_won_display .mySpeed
    {
        display: none;
    }
    .callout .Satoshi_won_display .myCapicity
    {
        display: none;
    }
    .callout_2 .Satoshi_won_display .satoshiearned
    {
        display: block;        
        color: #c5db3b !important; 
    }
    .callout_2 .satoshiearn
    {        
        float: left !important;
        color: #c5db3b !important; 
        text-align: center;
        margin-left: 100px;
    }
</style>


<section id="main-content">

    <div class="row mainbodybg">
        <div class="small-16 large-16 columns">
            <?php
            //echo "<prE>";            print_r($daily_message); die;
            foreach ($daily_message as $daily) {
                ?>
                <div class="alert alert-success alert-dismissable fade in">
                    <a href="<?php echo base_url('welcome/removeDailymsg/' . $daily['daily_message_id']); ?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $daily['daily_message_name'] ?></strong> 
                </div>
                <?php
            }
            ?>
            <h3 style="text-align:center;"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit ACCOUNT </h3>
            <hr class="accountbottmline">
            <center>
                 <?php echo $advertiseData[3]['advertise_name']; ?>
            </center>
            
            <center><iframe data-aa='873554' src='//ad.a-ads.com/873554?size=728x90' scrolling='no' style='width:728px; height:90px; border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe></center>
            
            <h6 class="text-center"> <span>YOUR WALLET : </span> <span class="walttertext"><?php echo $user[0]['bitcoin_address']; ?></span></h6>

            <center>
                <div class="button-group" >
                    <a href="<?php echo base_url('profile/edit/' . $user[0]['username']); ?>" class="button buttonaccount">Edit Profile
                    </a>
                    <a href="<?php echo base_url('bank'); ?>" class="button buttonaccount">
                        Bank
                    </a> <br>
                    <a href="<?php echo base_url('deposit'); ?>" class="button buttonaccount">Deposit
                    </a>
                    <a href="<?php echo base_url('withdraw/withdraw_history'); ?>" class="button buttonaccount">
                        withdraw history
                    </a>

<!--a href="<?php echo site_url('welcome/change_wallet/' . $user[0]['username']); ?>" class="button" style="font-size:20px; color: #20160c;
font-weight: 800;   padding: 0.7em 3em;">Change Wallet</a-->
<!--a href="<?php echo site_url('welcome/change_password/' . $user[0]['username']); ?>" class="button" style="font-size:20px; color: #20160c;
font-weight: 800;   padding: 0.7em 3em;">Change Password</a-->
                </div>
                <br>
                <br>

            </center>
            <?php
            if ($daily_gifts == 'expired' && $daily_star == 'expired') {
                ?>
                <div class="row text-center">
                    <p> 
                    <h6>
                        <span style="color:green"> 
                            Come back tomorrow :)<br>
                            Your daily limit got over for the day. Come back tomorrow for more reward's !<br>
                            Premium players(You can buy using star & funds)
                        </span>
                    </h6>
                    </p>
                </div>
                <?php
            }
            ?>

            <div class="row text-center">
                <?php
                // echo "<pre>"; print_r($getDailyEarning); die;
                //echo "<pre>";            print_r($data); die;
                if ($daily_gifts == 'not_expired') {
                    //echo 'hello'; die;
                    ?>
                    <div class="small-16 large-5 flotleft paddinggift " style="text-align:center;" >
                        <center><h5>Daily Gifts</h5></center>
                        <a href="<?php echo base_url('daily_gift'); ?>">
                            <img src="<?php echo base_url(); ?>client_assets/assets/gifts1.png" alt="" class="thumbnail1" style="">
                        </a>
                        <center class="walttertext" style="margin-top: 10px"> <h5>+120 Satoshi</h5> </center>
                    </div>
                    <?php
                } else if ($daily_gifts == 'expired') {
                    ?>                    
                    <div class="small-16 large-5 flotleft paddinggift">
                        <center><h5>Daily Gifts</h5></center>
                        <a href="javascript:void(0)">
                            <img src="<?php echo base_url(); ?>client_assets/assets/daily_gifts/gifts-1.png" alt="">
                        </a>
                        <center class="walttertext" style="margin-top: 10px"> <h5>+120 Satoshi</h5> </center>
                    </div>
                    <?php
                }
                ?>

                <?php
                // echo "<pre>"; print_r($getDailyEarning); die;
                //echo "<pre>";            print_r($data); die;
                if ($daily_star == 'not_expired') {
                    //echo 'hello'; die;
                    ?>
                    <div class="small-16 large-5 flotleft paddinggift">
                        <center><h5>Explore</h5></center>
                        <a href="<?php echo base_url('explorer'); ?>">
                            <img src="<?php echo base_url(); ?>client_assets/assets/explore1.png" alt="" class="thumbnail1" style="">
                        </a>
                        <center class="walttertext"  style="margin-top: 10px"> <h5>+1 Star</h5> </center>
                    </div>
                    <?php
                } else if ($daily_star == 'expired') {
                    ?>
                    <div class="small-16 large-5 flotleft paddinggift">
                        <center><h5>Explorer</h5></center>
                        <a href="javascript:void(0)">
                            <img src="<?php echo base_url(); ?>client_assets/assets/explore/explore.png" alt="">
                        </a>
                        <center class="walttertext"  style="margin-top: 10px"> <h5>+1 Star</h5> </center>
                    </div>
                    <?php
                }
                ?>  

                <div class="small-16 large-5 flotleft paddinggift" style="float:left;">
                    <center><h5>Foodstore</h5></center>
                    <a href="<?php echo base_url('foods'); ?>">
                        <img src="<?php echo base_url(); ?>client_assets/assets/foods.png" alt="" class="thumbnail1">
                    </a>
                    <center class="walttertext"  style="margin-top: 10px"> <h5>Your Foods &nbsp;: &nbsp;&nbsp;<?php echo $foos_total['daily_amount'] ?> </h5> </center>
                </div>  
            </div>             
        </div>
        <div class="row ">
            
            <div class="small-16 large-16 columns ">
                <div class="article-content small-16 large-16 columns" style="margin-top: 4%;">
                    
                    <div class="small-16 large-4 flotleft paddinggift ">
                          <center><?php echo $advertiseData[2]['advertise_name']; ?></center>
                    </div>
                    <div class="small-16 large-8 columns">               
                        <?php
                        //echo $imageData; die;
                        if ($imageData == 'found') {
                            ?>
                            <center> <img id="myimage" src="<?php echo base_url('admin_assets/assets/images/worker/work.png'); ?>"  class="thumbnail1"></center>
                            <center>
                                <h3 id="weAreFree">We are working</h3>
                            </center>
                            <center>        <span id="description_run"><span class="workerCSS">We're free</span> , +1 satoshi/min for <?php echo $workerDetails[0]['worker_minute']; ?> min is collected by Dholu Bholu !</span><br>Work will expire in : 10 minutes.<br>Ask Them to wok again !</center>
                            <?php
                        } else if ($imageData == 'not_found') {
                            ?>
                            <center><img id="myimage" src="<?php echo base_url('admin_assets/assets/images/worker/' . $workerDetails[0]['worker_image']); ?>" alt="" class="thumbnail1"></center>
                            <center>
                                <h3 id="clickFree">We're free</h3>
                            </center>
                            <center style="font-size: 19px;">
                                <a href="javascript:void(0);" id="clickMe" data_worker_id="<?php echo $workerDetails[0]['worker_id']; ?>" data_min_limit="<?php echo $workerDetails[0]['worker_minute']; ?>" style="color: yellow;text-decoration: underline;">
                                    Click here
                                </a> 
                                <span id="description_run">if you want Dholu Bholu to work </span></center>
                            <!--span id="time"> 10 </span-->
                            <?php
                        }
                        ?>
                    </div>
                    <div class="small-16 large-4 flotleft paddinggift ">
                      <center><?php echo $advertiseData[2]['advertise_name']; ?></center>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="small-16 large-16">
                <div class="article-content small-16 large-16 columns " style="margin-top: 4%;">
                    <?php
                    if ($monkey_status == 'monkeystar_expired') {
                        ?>
                        <div class="small-16 large-87 columns thumbnail" style="background-size: 100% 100%; height:500px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/dashboard/home-left.png'); ?>');">
                            <!--img src="<?php echo base_url(); ?>client_assets/assets/collect.png" alt="" class="thumbnail"--> <span class="withdrowspan"><br>

                                <h4 class="satoshitotalscorehome"> <?php echo $user[0]['user_attack_player_satoshi']; ?></h4>
                                <h6 class="satoshitotalscorehome"> Satoshi. (Score)</h6>

                            </span> 
                            <center> 
                                <a class="expanded lime-button" href="<?php echo base_url('withdraw'); ?>" style="margin-top:2%;">Withdraw</a>
                            </center>

                                                                                                                                                                                                                                                <!--<center><span><br>
                                                                                                                                                                                                                                                    <h4 class="satoshitotalscorehome"> <?php echo $user[0]['user_attack_player_satoshi']; ?></h4>
                                                                                                                                                                                                                                                    <h6 class="satoshitotalscorehome">Satoshi. (Score)</h6>
                                                                                                                                                                                                                                                </span></center>-->

                            <img class="getMonkeyStar" id="" src="<?php echo base_url('client_assets/assets/dashboard/monkeystar.png'); ?>" height="150px">

                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="small-16 large-87 columns thumbnail" style="background-size: 100% 100%; height:500px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/dashboard/home-left.png'); ?>');">
                            <!--img src="<?php echo base_url(); ?>client_assets/assets/collect.png" alt="" class="thumbnail"-->

                            <center> <a class="expanded lime-button" href="<?php echo base_url('withdraw'); ?>" style="margin-top:2%;">Withdraw</a></center>
                            <span style="    position: absolute;margin-top: -2%;">

                                <h4 class="satoshitotalscorehome"> <?php echo $user[0]['user_attack_player_satoshi']; ?></h4>
                                <h6 class="satoshitotalscorehome"> Satoshi. (Score)</h6>

                            </span> 
                           <!--<center><span><br>
                               <h4 class="satoshitotalscorehome"> <?php echo $user[0]['user_attack_player_satoshi']; ?></h4>
                               <h6 class="satoshitotalscorehome">Satoshi. (Score)</h6>
                           </span></center>-->
                            <span id="monkeyImage">
                                <img class="getMonkeyStar" id="getMonkeyStar" src="<?php echo base_url('client_assets/assets/monkey_extra.png'); ?>" height="150px">
                            </span>
                        </div>
                        <?php
                    }
                    ?>



                    <div class="small-16 large-87 columns thumbnail" style="background-size: 100% 100%; height:500px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/collect2.png'); ?>');">
                        <!--img src="<?php echo base_url(); ?>client_assets/assets/collect2.png" alt="" class="thumbnail"-->
                        <center><a class="expanded lime-button" href="#" style="margin-top:2%;">Collect</a> </center>
                        <div class="currunt-player-image-login">
                            <img src="<?php echo base_url('admin_assets/assets/images/player/' . $current_player_image); ?>">
                        </div>
                    </div>
                    <div class="flotleft paddinggift small-16 large-8">
                        <span id="showMonekyesage"></span>
                    </div>
                    <?php
                    if ($monkey_status == 'monkeystar_expired') {
                        ?>
                        <div class="flotleft paddinggift small-16 large-8">
                            <div style = "float: left;width: 100%;color: black; margin-top: 30px; margin-left: 10px;">
                                <h3 style = "color:white;">Your Daily Gift Expired for Today!</h3>
                            </div> &nbsp;
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="flotleft paddinggift small-16 large-8">
                            <center>
                 <?php echo $advertiseData[3]['advertise_name']; ?>
            </center>
                        </div>
                        <?php
                    }
                    ?>  
                    <div class="flotleft paddinggift small-16 large-8">
                        <div class="satoshiearn satoshi_earn" id="satoshi_earn"></div>  
                    </div>                                          
                </div>
                <!--div class="small-16 large-8 columns">

                    <img src="<?php echo base_url(); ?>client_assets/assets/collect2.png" alt="" class="thumbnail">
                    <center><a class="expanded lime-button" href="#" style="margin-top:2%;">Collect</a> </center>
                </div-->
            </div>

        </div>

        <!--//main-->

        <!--sidebar-->

        <!--//sidebar-->
    </div>

    <div class="row">
        <div class="small-16 large-16 columns">
            <h3 style="text-align:center;">Scores</h3>
            <div class="clearfix small-up-1 medium-up-2 large-up-3" data-equalizer data-equalize-on="medium">
                <div class="flotleft paddinggift small-16 large-5">
                    <div class="callout" data-equalizer-watch>
                        <ul style="font-size:18px;line-height:2.2;">
                            <li>My Satoshi Balance: <?php echo $user[0]['user_attack_player_satoshi']; ?></li>
                            <li>Satoshi Last Deposit: <?php echo $getlast; ?> BTC</li>
                            <li>Pending BTC: <?php echo $pendingbtc; ?> Satoshi </li>
                            <li>Paid BTC: <?php echo $paidbtc;?> Satoshi </li>

                        </ul>
                    </div>
                </div>
                <div class="flotleft paddinggift small-16 large-5">
                    <div class="callout" data-equalizer-watch>
                        <!--ul style="font-size:18px;line-height:2.2;">
                            <li>Generated: 37 Satoshi</li>
                            <li>My Speed: 60 Satoshi/ Hour </li>
                            <li>My Capacity: 36 Satoshi </li>

                        </ul-->
                        <div class="satoshiearn satoshi_earn" id="satoshi_earn"></div> 
                    </div>
                </div>
                <div class="flotleft paddinggift small-16 large-5">
                    <div class="callout callout_2" data-equalizer-watch>
                        <h3 style="text-align:center;">Satoshi Won </h3>
                        <!--h3 style="text-align:center;"> 37/37</h3-->
                        <div class="Satoshi_won_display satoshiearn " id="satoshi_earn">
                            <div class="satoshi_earn">

                            </div>
                        </div> 
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>  
<?php // echo "<pre>"; print_r($this->session->userdata('captcha_code'));    ?>
</section>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <?php
        echo form_open('welcome', 'id="imageCaptchaForm" name="imageCaptchaForm"');
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <!--button type="button" class="close" data-dismiss="modal">&times;</button-->                
                <h4 class="modal-title">Captcha Code From</h4>
            </div>
            <div class="modal-body">
                <p>
                    <span id="refreshCaptcha" data-attr-img="<?php echo $this->session->userdata('') ?>">
                        <?php echo $captcha_code['image']; ?>
                    </span>
                    <?php
                    echo "<a href='#' class ='refresh'>"
                    . "<img id = 'ref_symbol' src =" . base_url() . "admin_assets/assets/images/refresh.png></a>";
                    ?>
                </p>
                <p> 
                    <input type="text" name="txtCaptchCode" id="txtCaptchCode" style="color:black !important;">
                </p>
            </div>
            <div class="modal-footer">

<!--input type="submit" name="cmdSubmit" value="submit" data-attr-txtCaptchCode="<?php echo $sesion_captcha_image; ?>"  class="btn btn-default cmdSubmit" -->   

                <button type="button" name="cmdSubmit" data-attr-txtCaptchCode="<?php echo $sesion_captcha_image; ?>" class="btn btn-default cmdSubmit">Submit</button>                
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <?php
        echo form_close();
        ?>
    </div>
</div>


<div class="modal fade" id="myModal_dholubholu" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <?php
        echo form_open('welcome', 'id="imageCaptchaForm" name="imageCaptchaForm"');
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <!--button type="button" class="close" data-dismiss="modal">&times;</button-->                
                <h4 class="modal-title">Captcha Code From</h4>
            </div>
            <div class="modal-body">
                <p>
                    <span id="refreshCaptcha_dholubholu" data-attr-img_dholubholu="<?php echo $this->session->userdata('') ?>"><?php echo $captcha_code['image']; ?></span>
                    <?php
                    echo "<a href='#' class ='refresh'>"
                    . "<img id = 'ref_symbol' src =" . base_url() . "admin_assets/assets/images/refresh.png></a>";
                    ?>
                </p>
                <p> 
                    <input type="text" name="txtCaptchCode_dholubholu" id="txtCaptchCode_dholubholu" style="color:black !important;">
                </p>

            </div>
            <div class="modal-footer">

<!--input type="submit" name="cmdSubmit" value="submit" data-attr-txtCaptchCode="<?php echo $sesion_captcha_image; ?>"  class="btn btn-default cmdSubmit" -->   

                <button type="button" name="cmdSubmit_dholubholu" data-attr-txtCaptchCode="<?php echo $sesion_captcha_image; ?>" class="btn btn-default cmdSubmit_dholubholu">Submit</button>                
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <?php
        echo form_close();
        ?>
    </div>
</div>


<script>


    $('.cmdSubmit_dholubholu').click(function ()
    {
        //var type_new_image_code = $('#txtCaptchCode').val('');
        var type_new_image_code = $('#txtCaptchCode_dholubholu').val();

        $.ajax(
                {
                    url: '<?php echo base_url('welcome/get_new_session_value'); ?>',
                    type: 'post',
                    //data: '',
                    success: function (data)
                    {

                        if (data == type_new_image_code)
                        {
                            $("#myModal_dholubholu").modal("hide");
                            dholuBholu()
                        } else
                        {
                            alert('Enter Wrong Captcha !');
                        }
                    }

                });

    });

    $('.cmdSubmit').click(function ()
    {
        //var type_new_image_code = $('#txtCaptchCode').val('');
        var type_new_image_code = $('#txtCaptchCode').val();

        $.ajax(
                {
                    url: '<?php echo base_url('welcome/get_new_session_value'); ?>',
                    type: 'post',
                    //data: '',
                    success: function (data)
                    {

                        if (data == type_new_image_code)
                        {
                            $("#myModal").modal("hide");
                            earnSatoshiFinal();
                        } else
                        {
                            alert('Enter Wrong Captcha !');
                        }
                    }

                });

    });
    var earn_Satoshi = "";
    var player_daily_limit = "";
    function earnSatoshi(earn_Satoshi1, player_daily_limit1)
    {
        earn_Satoshi = earn_Satoshi1;
        player_daily_limit = player_daily_limit1;
        $("#myModal").modal("show");

        var imgData = $(this).attr("data-attr-img");

        $("a.refresh").click(function () {
            //  alert('hello');
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "welcome/captcha_refresh",
                success: function (data) {
                    if (data)
                    {
                        $("#refreshCaptcha").html(data);
                    }
                }
            });
        });

        //return false;
    }




    function earnSatoshiFinal() {

        $.ajax(
                {
                    url: '<?php echo base_url('welcome/update_current_satoshi'); ?>',
                    type: 'POST',
                    data: {earn_Satoshi: earn_Satoshi, player_daily_limit: player_daily_limit},
                    success: function (data)
                    {
                        //alert(data);
                        //$("#satoshi_earn").html(data);
                    }
                });
    }
    //Earn satoshi expired message
    function earnSatoshiFailed(failed)
    {
        alert(failed);
    }


    // using setInterval function we can call function in every 5 seconds ..
    function displaySatoshi()
    {
        $.ajax(
                {
                    url: '<?php echo base_url('welcome/getCurrentTime'); ?>',
                    type: 'POST',
                    //data: {satoshiValue: satoshiValue, data_worker_id: data_worker_id},
                    success: function (data)
                    {
                        //alert(data);
                        $(".satoshi_earn").html(data);
                    }
                });
    }
    timer = setInterval(function () {
        displaySatoshi()
    }, 1000);
    // 10000 means 10 second


    function dholuBholu()
    {
        $('#time').show();
        var min_limit = $(this).attr("data_min_limit");
        // var data_worker_id = $(this).attr("data_worker_id");
        //alert(min_limit);
        var src = $('#myimage').attr('src');

        $("#myimage").attr("src", "<?php echo base_url('admin_assets/assets/images/worker/work.png'); ?>");
        $("#description_run").empty();
        $("#clickMe").empty();
        $("#clickFree").empty();

        $("#clickFree").append("<h3>We are working</h3>");

        $("#description_run").append("<span class='workerCSS'>We're free</span> , +1 satoshi/min for " + min_limit + " min is collected by Dholu Bholu ! <br> Work will expire in : 10 minutes.<br> Ask Them to wok again !");
        var satoshiValue = <?php echo $workerDetails[0]['worker_value']; ?>;
        var data_worker_id = <?php echo $workerDetails[0]['worker_id']; ?>;
        //var satoshiValue = "10";
        $.ajax(
                {
                    url: '<?php echo base_url('welcome/satoshiStore'); ?>',
                    type: 'POST',
                    data: {satoshiValue: satoshiValue, data_worker_id: data_worker_id},
                    success: function (data)
                    {
                        //alert(data);
                        //$('#showMonekyesage').html(data);
                    }
                });


        var countdown = <?php echo $workerDetails[0]['worker_minute'] ?> * 60 * 1000;
        // var countdown = 10 * 10 * 1000;
        var timerId = setInterval(function () {
            countdown -= 1000;
            var min = Math.floor(countdown / (60 * 1000));
            //var sec = Math.floor(countdown - (min * 60 * 1000));  // wrong
            var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);  //correct

            if (countdown <= 0) {
                //alert("timeout!");
                clearInterval(timerId);

                location.reload();

                /*var src = $('#myimage').attr('src');
                 if (src == '<?php echo base_url('admin_assets/assets/images/worker/login.jpg'); ?>')
                 {
                 $("#myimage").attr("src", "<?php echo base_url('admin_assets/assets/images/worker/work.png'); ?>");
                 $("#description_run").empty();
                 $("#description_run").append("We are working, 1 satoshi/min for " + min_limit + " min is collected by dholu");
                 
                 } else if (src == "<?php echo base_url('admin_assets/assets/images/worker/work.png'); ?>")
                 {
                 $("#myimage").attr("src", "admin_assets/assets/images/worker/work.png");
                 $("#description_run").empty();
                 $("#description_run").append("We are working, 1 satoshi/min for 20min is collected by dholu");
                 }*/

                //doSomething();
            } else {
                $("#time").html(min + " : " + sec);
            }
        }, 1000); //1000ms. = 1sec.
    }

    $(document).ready(function ()
    {
        $('#time').hide();
        $('#clickMe').click(function ()
        {
            $("#myModal_dholubholu").modal("show");

            var imgData = $(this).attr("data-attr-img_dholubholu");

            $("a.refresh").click(function () {
                //  alert('hello');
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "welcome/captcha_refresh",
                    success: function (data) {
                        if (data)
                        {
                            $("#refreshCaptcha_dholubholu").html(data);
                        }
                    }
                });
            });
        });
    });

</script>

<script>
    $("#monkeyImage").css("display", "none");
    $(document).ready(function ()
    {
        //alert('log');
//        $('#monkeyImage').hide();
        // ajax call & check if daily limit not reached than ..

        $.ajax(
                {
                    url: '<?php echo base_url('welcome/check'); ?>',
                    type: 'POST',
                    // data: {id: id},
                    success: function (data)
                    {
                        var d = new Date();
                        var n = d.getHours();
                        var m = d.getMinutes();

                        // this is display in every 2 hours and for 10 seconds ..
                        //if (n % 2 == 0 && m < 0) {
                        if (n % 1 == 0 && m < 10) {
                            $("#monkeyImage").css("display", "block");
                            setTimeout(function () {
                                $("#monkeyImage").hide();
                            }, 10000);
                        } else {
                            $('#monkeyImage').hide();
                        }


                        $('#getMonkeyStar').click(function ()
                        {
                            var id = $(this).attr('id');
                            $.ajax(
                                    {
                                        url: '<?php echo base_url('welcome/getStar'); ?>',
                                        type: 'POST',
                                        data: {id: id},
                                        success: function (data)
                                        {
                                            //alert(data);
                                            $('#showMonekyesage').html(data);
                                        }
                                    });
                        });
                    }
                });
        // if ()
    });

</script>
<center><iframe data-aa='873544' src='//ad.a-ads.com/873544?size=990x90' scrolling='no' style='width:990px; height:90px; border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe></center>




