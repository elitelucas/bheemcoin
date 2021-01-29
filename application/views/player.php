<style>
    .main_div
    {
        /*margin-left: 300px;
        margin-right: 300px;
         background-color: #E5E5E5;            */
        color: black;
        text-align: center;
    }

</style>
<div class="container main_div">  
    <div class="row mainbodybg padding30both mainbodybgdailygift ">
        <?php
        $dataForm = array(
            'name' => 'dailyGiftForm',
            'id' => 'dailyGiftForm'
        );
        echo form_open('daily_gift', $dataForm);
        ?>
        <div class="row" width="100%" style="align-content: center;background-color: #0782C0">
            <h2>Change Players</h2>
        </div>

        <!--  ajax data call and fetch the image data -->

        <div class="row" id="player_upgrade" width="100%">
            <div class="erromain">          
                <p style="display:inline-block; text-align: center;">
                    <span class="errormessage"> Error : No enough STARS! </span> <BR>
                    Please make sure you have enough stars to rent this player.
                </p>

            </div>
        </div>

        <!-- Upgrade Done if enough satoshi or stars -->
        <div class="row" id="player_upgrade_done" width="100%">
            <div style="    padding-top: 30px;padding-bottom: 30px;color: white;text-shadow: 2px 2px 2px #0782c0;background: #000000b0;margin-top: 30px;">          
                <p style="display:inline-block;text-align: center;">
                    <span style="font-size: 20px;font-weight: 800;color:"> Upgrade Completed ! </span> <BR>
                <p >
                    Play more and do collects to find a new STARS !<br>
                    You can find up 3 STARS every day !<br>
                    STARS can be used to rent new players !
                </p>
                </p>
            </div>
        </div>

        <div class="row" id="player_change" width="100%">

            <div class="small-16 large-8 flotleft paddinggift">        
                <p><h3>
                    Your Stars </h3>
                <img src="<?php echo base_url('client_assets/assets/star.png'); ?>"> <br>
                <h3 class="greencolor"> <span class="userstar">x</span><?php echo $user_Data['user_star']; ?>                </h3>
                </p>

            </div>

            <div class="small-16 large-8 flotleft paddinggift">
                <p><h3>
                    Your Score</h3>
                <img  src="<?php echo base_url('client_assets/assets/money.png'); ?>"><br>
                <h3 class="greencolorfont">   <?php
                    $player_satoshi = $user_Data['user_attack_player_satoshi'];
                    echo $player_satoshi;
                    $BTC = number_format($player_satoshi / 100000000, 8);
                    ?> Satoshi <br>
                    <?php echo $BTC . ' ' . 'Btc'; ?>               </h3>
                </p>
            </div>

        </div>
        <div class="row pad30" id="player_changes" width="100%">

        </div>
        <div class="row" id="imageId" width="100%" style="background-size:cover;  background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/players.jpg'); ?>');">
            <div  style="float: left;width: 100%;color: black; margin-bottom: 30px; margin-top: 30px;">
                <?php
                $i = 0;
                foreach ($player_data as $player) {
                    $i++;
                    ?>
                    <div style="display:inline-block;color: white;font-weight: 800;">
                        <div style="min-height: 142px;"> 
                            <img style="" src="<?php echo base_url('client_assets/assets/players/bar' . $i . '.png'); ?>"><br>
                            <div style="    margin-top: 80px;height: 50px;">
                                <?php
                                if ($user_Data['user_current_player'] == $i) {
                                    if ($user_Data['user_current_player'] == 1 || $user_Data['user_current_player'] == 2) {
                                        ?>
                                        <h6>
                                            <center style="margin-top: 30px;">
                                                <span>Duration : Lifetime</span><br>
                                                <!--span>Price : <?php ?></span-->
                                            </center>
                                        </h6>
                                        <?php
                                    }

                                    if ($user_Data['user_current_player'] == 3 || $user_Data['user_current_player'] == 4 || $user_Data['user_current_player'] == 5) {
                                        ?>
                                        <h6>
                                            <center style="margin-top: 30px;">
                                                <span>Duration : <?php echo $pending_days . " Days Left"; ?></span><br>
                                                <!--span>Price : <?php echo $player_price; ?> </span-->
                                            </center>
                                        </h6>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <a href="javascript:void(0)" player_curent_image="<?php echo $player['player_image']; ?>" class="player" data_satoshi_price_type ="<?php echo $player['player_price_type']; ?>" data-satoshi="<?php echo $player['player_price']; ?>" data-cur="<?php echo $player['player_id']; ?>" class="players">

                            <img class="playermainimage <?php
                            if ($user_Data['user_current_player'] == $i) {
                                echo 'selectedplayermainimage';
                            }
                            ?>"  
                                 src="<?php echo base_url('admin_assets/assets/images/player/' . $player['player_image']); ?>">
                        </a><br>
                        <?php
                        if ($player['player_price_type'] == 1) {
                            $price_type = 'satoshi';
                        } else if ($player['player_price_type'] == 2) {
                            $price_type = 'star';
                        } else if ($player['player_price_type'] == 3) {
                            $price_type = 'btc';
                        }
                        ?> <h6> <?php echo $player['player_price'] . ' ' . $price_type; ?> </h6> <?php
                        ?>
                    </div>
                    <?php
                }
                ?>

            </div>        
        </div>
        <div class="small-16 large-16 columns" style=" margin-bottom:4%;   background-color: none;margin-top: 2%;padding-bottom:3%;"> 
	<h3 style="text-align:center;padding-top:2%;">Player Change </h3>
<p style="text-align:center;line-height:2;font-size:20px;color:yellow;">Make sure you have enough starts and funds to change your player. </br>
Players for stars will remain 2 days only, then will swich back to Jaggu player as default. </br>
Jaggu and Kalia players will remain for lifetime.</p>

<center><ins class="bmadblock-5a9c2429a2f1090010f2a831" style="display:inline-block;width:728px;height:90px;"></ins>
<script async type="application/javascript" src="//ad.bitmedia.io/js/adbybm.js/5a9c2429a2f1090010f2a831"></script></center>
<center><iframe data-aa='873544' src='//ad.a-ads.com/873544?size=990x90' scrolling='no' style='width:990px; height:90px; border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe></center>
	 	</div>
        <div class="row" id="backButton" width="100%">               
            <div  style=" margin-top: 30px; ">
                <a class="button btndailygift" href="<?php echo base_url('welcome'); ?>">Back</a>
            </div>                   
        </div>
    </div>
</div>
<script>
    // if player not enough star or satoshi they will not upgrade player.
    function playerChangeYes(elem, satoshi, price_type, old_player_id) {

        if (elem == 'not_done')
        {
            //player_upgrade_done
            $('#player_changes').hide();
            $('#player_upgrade').show();
            //$('#player_changes').hide();
        } else if (elem == 'done')
        {
            $.ajax(
                    {
                        url: '<?php echo base_url('player/updateUserSatoshi'); ?>',
                        type: 'POST',
                        data: {satoshi: satoshi, price_type: price_type, old_player_id: old_player_id},
                        success: function (data)
                        {
                            //alert(data);
                            //alert('done');
                            $('#player_changes').hide();
                            $('#player_upgrade_done').show();

                            //$('#player_changes').hide();
                            // page reload after 2 seconds
                            window.setTimeout(function () {
                                location.reload()
                            }, 1000)
                        }
                    });
        }

    }

    function playerChangeNo() {
        $('#player_changes').hide();
        $('#player_upgrade').hide();
        $('#player_upgrade_done').hide();

    }

    $(document).ready(function ()
    {
        $('#player_upgrade').hide();
        //$('#player_change').hide();
        $('#player_upgrade_done').hide();

        $('.player').click(function ()
        {
            $('#player_upgrade_done').hide();
            $('#player_upgrade').hide();
            var player_id = $(this).attr("data-cur");
            var satoshi_balance = $(this).attr("data-satoshi");
            var data_satoshi_price_type = $(this).attr("data_satoshi_price_type");
            var player_curent_image = $(this).attr("player_curent_image");


            $.ajax(
                    {
                        url: '<?php echo base_url('player/get_player'); ?>',
                        type: 'POST',
                        data: {player_id: player_id, satoshi_balance: satoshi_balance, data_satoshi_price_type: data_satoshi_price_type, player_curent_image: player_curent_image},
                        success: function (data)
                        {
                            if (data == 'not_done')
                            {
                                alert('not done');
                            } else
                            {
                                console.log('hello');

                                $('#player_change').show();
                                $('#player_changes').show();
                                $('#player_changes').html(data);


                            }
                        }
                    });
        });


    });
</script>