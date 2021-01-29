<style>
    .getMonkeyStar
    {
        height:150px;
        float: right;
        margin-top: 250px;
        /* display: none;*/
    }
    .workerCSS
    {
        font-size: 20px;
        font-family: Luckiest Guy, cursive;color: yellow;
        text-decoration: underline;
    }

</style>


<section id="main-content">
    <div class="row">
        <div class="small-16 large-16 columns">
            <h3 style="text-align:center;"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit ACCOUNT </h3>
            <h3 style="text-align:center;">YOUR WALLET : <span style="font-family:cursive;font-size:20px;"><?php echo $user[0]['bitcoin_address']; ?></span></h3>

            <center>
                <div class="button-group" style="padding-bottom:3%;">
                    <a href="<?php echo base_url('profile/edit/' . $user[0]['username']); ?>" class="button" style="font-size:20px; color: #20160c;font-weight: 800; padding: 0.7em 3em;">Edit Profile
                    </a>
                    <a href="<?php echo base_url('bank'); ?>" class="button" style="font-size:20px; color: #20160c;font-weight: 800; padding: 0.7em 3em;">
                        Bank
                    </a> 

<!--a href="<?php echo site_url('welcome/change_wallet/' . $user[0]['username']); ?>" class="button" style="font-size:20px; color: #20160c;
font-weight: 800;   padding: 0.7em 3em;">Change Wallet</a-->
<!--a href="<?php echo site_url('welcome/change_password/' . $user[0]['username']); ?>" class="button" style="font-size:20px; color: #20160c;
font-weight: 800;   padding: 0.7em 3em;">Change Password</a-->
                </div>

                <br>
                <br>
                <div class="button-group" style="padding-bottom:3%;">

                </div>
            </center>                                   

            <?php
            // echo "<pre>"; print_r($getDailyEarning); die;
            //echo "<pre>";            print_r($data); die;
            if ($daily_gifts == 'not_expired') {
                //echo 'hello'; die;
                ?>
                <div class="small-16 large-5 columns">
                    <a href="<?php echo base_url('daily_gift'); ?>">
                        <img src="<?php echo base_url(); ?>client_assets/assets/gifts.png" alt="" class="thumbnail" style="">
                    </a>
                </div>
                <?php
            } else if ($daily_gifts == 'expired') {
                ?>
                <div class="small-16 large-5 columns">
                    <a href="javascript:void(0)">
                        <img src="<?php echo base_url(); ?>client_assets/assets/gifts.png" alt="" class="thumbnail" style="">
                    </a>
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
                <div class="small-16 large-5 columns">
                    <a href="<?php echo base_url('explorer'); ?>">
                        <img src="<?php echo base_url(); ?>client_assets/assets/explore.png" alt="" class="thumbnail" style="">
                    </a>
                </div>
                <?php
            } else if ($daily_star == 'expired') {
                ?>
                <div class="small-16 large-5 columns">
                    <a href="javascript:void(0)">
                        <img src="<?php echo base_url(); ?>client_assets/assets/explore.png" alt="" class="thumbnail">
                    </a>
                </div>
                <?php
            }
            ?>                                    
            <div class="small-16 large-5 columns" style="float:left;">
                <a href="<?php echo base_url('foods'); ?>">
                    <img src="<?php echo base_url(); ?>client_assets/assets/foodstore.png" alt="" class="thumbnail">
                </a>
            </div>            
        </div>
        <div class="row ">
            <div class="small-16 large-16 columns">
                <div class="article-content small-16 large-16 columns" style="margin-top: 4%;">
                    <div class="small-16 large-8 columns">
                    </div>
                    <div class="small-16 large-8 columns">               
                        <?php
                        //echo $imageData; die;
                        if ($imageData == 'found') {
                            ?>
                            <img id="myimage" src="<?php echo base_url('admin_assets/assets/images/worker/work.png'); ?>"  class="thumbnail">
                            <center>
                                <h3 id="weAreFree">We are working</h3>
                            </center>
                            <span id="description_run"><span class="workerCSS">We're free</span> , 1 satoshi/min for <?php echo $workerDetails[0]['worker_minute']; ?> min is collected by dholu </span></center>                            
                            <?php
                        } else if ($imageData == 'not_found') {
                            ?>
                            <img id="myimage" src="<?php echo base_url('admin_assets/assets/images/worker/' . $workerDetails[0]['worker_image']); ?>" alt="" class="thumbnail">
                            <center>
                                <h3 id="clickFree">We're free</h3>
                            </center>
                            <center style="font-size: 19px;">
                                <a href="javascript:void(0);" id="clickMe" data_worker_id="<?php echo $workerDetails[0]['worker_id']; ?>" data_min_limit="<?php echo $workerDetails[0]['worker_minute']; ?>" style="color: yellow;text-decoration: underline;">
                                    Click here
                                </a> 
                                <span id="description_run">if you want dholu bholu to run </span></center>
                            <!--span id="time"> 10 </span-->
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="small-16 large-16 columns">
                <div class="article-content small-16 large-16 columns " style="margin-top: 4%;">
                    <span id="showMonekyesage"></span>
                    <div class="small-16 large-8 columns thumbnail" style="background-size: 100% 100%; height:500px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/dashboard/home-left.png'); ?>');">
                        <!--img src="<?php echo base_url(); ?>client_assets/assets/collect.png" alt="" class="thumbnail"-->                 <span style="position:absolute">
                            <h4> <?php echo $user[0]['user_attack_player_satoshi']; ?></h4><br>
                            Satoshi. (Score)
                        </span>
                        <center> <a class="expanded lime-button" href="#" style="margin-top:2%;">Withdraw</a></center>
                        <span id="monkeyImage">
                            <img class="getMonkeyStar" id="getMonkeyStar" src="<?php echo base_url('client_assets/assets/monkey_extra.png'); ?>" height="150px">
                        </span>
                    </div>

                    <div class="small-16 large-8 columns thumbnail" style="background-size: 100% 100%; height:500px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/collect2.png'); ?>');">
                        <!--img src="<?php echo base_url(); ?>client_assets/assets/collect2.png" alt="" class="thumbnail"-->
                        <center><a class="expanded lime-button" href="#" style="margin-top:2%;">Collect</a> </center>

                    </div> 
                    <span id="satoshi_earn"></span>

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

        <div class="row" style="padding-top:8%;">
            <div class="small-16 large-16 columns">
                <h3 style="text-align:center;">Scores</h3>
                <div class="clearfix small-up-1 medium-up-2 large-up-3" data-equalizer data-equalize-on="medium">
                    <div class="column">
                        <div class="callout" data-equalizer-watch>
                            <ul style="font-size:18px;line-height:2.2;">
                                <li>My Satoshi Balance: <?php echo $user[0]['user_attack_player_satoshi']; ?></li>
                                <li>Satoshi Last Deposit: 0.0000 BTC</li>
                                <li>Pending BTC: 0 Satoshi </li>
                                <li>Paid BTC: 00,000,000 </li>

                            </ul>
                        </div>
                    </div>
                    <div class="column">
                        <div class="callout" data-equalizer-watch>
                            <ul style="font-size:18px;line-height:2.2;">
                                <li>Generated: 37 Satoshi</li>
                                <li>My Speed: 60 Satoshi/ Hour </li>
                                <li>My Capacity: 36 Satoshi </li>

                            </ul>
                        </div>
                    </div>
                    <div class="column">
                        <div class="callout" data-equalizer-watch>
                            <h3 style="text-align:center;">Satoshi Won </h3>
                            <h3 style="text-align:center;"> 37/37</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>  
</section>

<script>
    function earnSatoshi(earn_Satoshi, player_daily_limit)
    {
        var earn_Satoshi;        
        var player_daily_limit;
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
                        $("#satoshi_earn").html(data);
                    }
                });
    }
    timer = setInterval(function () {
        displaySatoshi()
    }, 1000);
    // 10000 means 10 second

    $(document).ready(function ()
    {

        $('#time').hide();
        $('#clickMe').click(function ()
        {
            $('#time').show();
            var min_limit = $(this).attr("data_min_limit");
            var data_worker_id = $(this).attr("data_worker_id");
            var src = $('#myimage').attr('src');

            $("#myimage").attr("src", "<?php echo base_url('admin_assets/assets/images/worker/work.png'); ?>");
            $("#description_run").empty();
            $("#clickMe").empty();
            $("#clickFree").empty();

            $("#clickFree").append("<h3>We are working</h3>");

            $("#description_run").append("<span class='workerCSS'>We're free</span> , 1 satoshi/min for " + min_limit + " min is collected by dholu");
            var satoshiValue = <?php echo $workerDetails[0]['worker_value']; ?>;
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
                        if (n % 2 == 0 && m < 10) {
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




