<style>
    .main_div
    {
        /*margin-left: 300px;
        margin-right: 300px;*/
        /*        background-color: #E5E5E5;*/
        color:black;
        text-align: center;
    }

</style>

<div class="container main_div">     
    <div class="row mainbodybgdailygift padding30both">
        <div class="row" width="100%" style="align-content: center;background-color: #0782C0">
            <h2>Refrigerator</h2>
        </div>
        <div class="row" width="100%">               

        </div> 
        <div class="row margintop30" id="imageId" width="100%">
            <div  style="float: left;width: 100%;color: black; margin-bottom: 25px;">          
                <span class="foodtext">Do more collects to find more Foods!</span><br>
                <span class="foodtext">You can find up to 5 items every day!</span><br>
                <span class="foodtext">Food can be used to make your player happy and healthy!</span>            
            </div>
            <div  style="float: left;width: 100%;color: white;font-size: 27px;">          
                Your Health  
                <?php
                $health = '';
                if ($playerHealth['user_player_health'] <= 100) {
                    $health = $playerHealth['user_player_health'];
                } else {
                    $health = 100;
                }
                ?>
                <div class="progress lifeprogress" style="">
                    <div class="progress-bar progress-bar-striped active progressheight" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $playerHealth['user_player_health'] . '%'; ?>">
                        <span class="sr-only"><?php echo $health . '%'; ?> Complete</span>
                    </div>
                </div> 
                <div  style="float: left;width: 100%;color: black; margin-bottom: 25px;">
                    <?php
                    if ($health >= 100) {
                        ?>
                        <a href="javascript:void(0)" user-satoshi ="<?php echo $playerHealth['user_attack_player_satoshi']; ?>" user-health ="<?php echo $playerHealth['user_player_health']; ?>" id="attackSatoshi" class="button">Attacking gain Satoshi</a><br>
                        <?php
                    }
                    ?>

                <!--<img style="height:150px" src="<?php echo base_url('client_assets/assets/food_store/food-player-background.png'); ?>">-->
                </div>
                <div  class="row " style="color: black;align-content: center">   
                <center><img class="food-player" style="padding-bottom:3%;"src="<?php echo base_url(); ?>client_assets/assets/food_store/food-player-background.png"/>  </center>
                
                    <center>     <h5> My Foods </h5>
                        <h5> Feed up your Player</h5></center>
                    <div class="panel">
                        <table class="table-condensed tablehealth">
                            <tr>
                                <?php
                                foreach ($foodDetails as $details) {
                                    ?>
                                    <td>
                                        <img style="height:70px;" src="<?php echo base_url('admin_assets/assets/images/foods/' . $details['foods_image']); ?>"><br>
                                        <?php
                                        if ($details['count_foods'] > 1) {
                                            echo "Available : " . $details['count_foods'];
                                        } else {
                                            echo "Available : " . $details['count_foods'];
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $details['foods_name']; ?><br>
                                        HP: +<?php echo $details['foods_health_capicity']; ?><br>
                                        <a id="eatFood" user_health_capicity ="<?php echo $playerHealth['user_player_health']; ?>" food_health_Capicity ="<?php echo $details['foods_health_capicity']; ?>"  data_food_id ="<?php echo $details['daily_id']; ?>" class="button eatFood" href="javascript:void(0)">Eat</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>                        

                        </table>
                    </div>
                </div>
            </div>        
        </div>

        <div class="row" id="showSecond" width="100%" style=" background-size: 100% 100%; height:500px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/food_store/food-eating-page.png'); ?>');">
            <div  style="float: left;width: 100%;color: black; margin-top: 200px; margin-left:300px;">      
                <div>
                    <h1>
                        Eating Food <br>(<span id="time"> ( -- ) </span>)
                    </h1>
                    <img style="height:150px;" id="new_img" src="" height="150px" >
                </div>
            </div>        
        </div>

        <div class="row" id="countDownId" width="100%" style="background-size: 100% 100%; height:500px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/food_store/food-eating-page.png'); ?>');">
            <div  style="float: left;width: 100%;color: black; margin-top: 100px; margin-left: 50px;">
                <h3 style="color:white;">
                    Yum Yum! Very Delicious! <br>
                    <a  class="button" href="<?php echo base_url('foods'); ?>">Eat Something Else!</a>
                </h3>
            </div>
        </div>
        <!-- Show second when attacking player and gain satoshi  -->
        <div class="row" id="showSecondAttack" width="100%" style=" background-size: 100% 100%; height:500px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/food_store/food-eating-page.png'); ?>');">
            <div  style="float: left;width: 100%;color: black; margin-bottom: 100px; margin-top: 200px; margin-left:300px;">      
                <div>
                    <h4>
                        Attacking Gain Satoshi <br>(<span id="timeAttack"> ( -- ) </span>)
                    </h4>
                    <img style="height:150px;" id="new_img" src="" height="150px" >
                </div>
            </div>        
        </div>

        <div class="row" id="countDownIdAttack" width="100%" style="background-size: 100% 100%; height:500px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/food_store/winsatoshi-player-raju.png'); ?>');">
            <div  style="float: left;width: 100%;color: black; margin-top: 100px; margin-left: 50px;">

                <h3 style="color:white;">
                    <span id="showWinSatoshi"></span>
                </h3>
                </span>

            </div>
        </div>


        <div class="row" id="countDownsatoshi" width="100%">               
            <div  style="color: black; margin-top: 30px;">
                <a class="button btndailygift" href="<?php echo base_url('welcome'); ?>">Back</a>
            </div>                   
        </div>    
    </div>
</div>
<script>
    $(document).ready(function ()
    {
        $('#countDownId').hide();
        $('#showSecond').hide();
        $('#showSecondAttack').hide();
        $('#countDownIdAttack').hide();

        $('#attackSatoshi').click(function ()
        {
            $('#imageId').hide();
            $('#showSecondAttack').show();
            $('#countDownIdAttack').hide();
            var user_health = $(this).attr("user-health");
            var user_satoshi = $(this).attr("user-satoshi");

            //alert(user_satoshi)
            $.ajax(
                    {
                        url: '<?php echo base_url('foods/updateUserHealth'); ?>',
                        type: 'POST',
                        data: {user_health: user_health, user_satoshi: user_satoshi},
                        success: function (data)
                        {
                            $('#showWinSatoshi').html(data);
                        }
                    });


            var fiveMinutes = 5,
                    display = document.querySelector('#timeAttack');
            startTimerAttack(fiveMinutes, display);

        });

        $('.eatFood').click(function ()
        {
            $('#imageId').hide();
            $('#showSecond').show();

            var getFoodid = $(this).attr("data_food_id");
            var food_health_Capicity = $(this).attr("food_health_Capicity");
            var user_health_capicity = $(this).attr("user_health_capicity");

            // alert(user_health_capicity);

            $.ajax(
                    {
                        url: '<?php echo base_url('foods/getImage'); ?>',
                        type: 'POST',
                        data: {getFoodid: getFoodid},
                        success: function (response)
                        {
                            var foodImage = response;
                            // alert(foodImage);
                            $("#new_img").attr('src', 'admin_assets/assets/images/foods/' + foodImage);
                            if (foodImage)
                            {
                                $.ajax(
                                        {
                                            url: '<?php echo base_url('foods/changeDailyEarningStatus'); ?>',
                                            type: 'POST',
                                            data: {getFoodid: getFoodid, food_health_Capicity: food_health_Capicity, user_health_capicity: user_health_capicity},
                                            success: function (response)
                                            {
                                                // alert(response);
                                            }
                                        });
                            }

                        }
                    });

            var fiveMinutes = 5,
                    display = document.querySelector('#time');
            startTimer(fiveMinutes, display);

        });

        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            var end = setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                //display.textContent = minutes + ":" + seconds;
                display.textContent = seconds;

                if (--timer < 0) {
                    //window.location = "http://www.example.com";

                    $('#showSecond').hide();
                    $('#countDownId').show();

                    clearInterval(end);
                }
            }, 1000);
        }

        function startTimerAttack(duration, display) {
            var timer = duration, minutes, seconds;
            var end = setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                //display.textContent = minutes + ":" + seconds;
                display.textContent = seconds;

                if (--timer < 0) {
                    //window.location = "http://www.example.com";

                    $('#showSecondAttack').hide();
                    $('#countDownIdAttack').show();

                    clearInterval(end);
                }
            }, 1000);
        }

    });
</script>