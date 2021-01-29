<style>
    .main_div
    {
        /* margin-left: 300px;
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
        <div class="row" id="player_change" width="100%">
            <div class="small-16 large-8 flotleft paddinggift">        
                <p><h3>
                    Your Stars </h3>
                <img src="<?php echo base_url('client_assets/assets/star.png'); ?>"> <br>
                <h3 class="greencolor"> <span class="userstar">x</span>0</h3>
                </p>
            </div>
            <div class="small-16 large-8 flotleft paddinggift">
                <p><h3>
                    Your Score</h3>
                <img  src="<?php echo base_url('client_assets/assets/money.png'); ?>"><br>
                <h3 class="greencolorfont" style="margin-top:20px;">0.00</h3>
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
                        <div style="min-height: 142px; margin-bottom: 80px;"> 
                            <img style="" src="<?php echo base_url('client_assets/assets/players/bar' . $i . '.png'); ?>"><br>                            
                        </div>

                        <a href="javascript:void(0)" player_curent_image="<?php echo $player['player_image']; ?>" class="player" data_satoshi_price_type ="<?php echo $player['player_price_type']; ?>" data-satoshi="<?php echo $player['player_price']; ?>" data-cur="<?php echo $player['player_id']; ?>" class="players">

                            <img style="height:230px;" class="playermainimage <?php
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
        <div class="row" id="backButton" width="100%">               
            <div  style=" margin-top: 30px; ">
                <a class="button btndailygift" href="<?php echo base_url('welcome'); ?>">Back</a>
            </div>                   
        </div>
    </div>
</div>
<script>
    $(document).ready(function ()
    {
        $('.player').click(function ()
        {
            $.ajax(
                    {
                        url: '<?php echo base_url('welcome/checkUserlogin'); ?>',
                        type: 'post',
                        data: '',
                        success: function (data)
                        {
                            if (data == 'false')
                            {
                                window.location.href = "<?php echo base_url('welcome/login'); ?>";
                            }
                        }

                    });
        });
    });
</script>