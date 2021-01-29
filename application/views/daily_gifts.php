<style>
    .main_div
    {
        /*margin-left: 300px;
        margin-right: 300px;*/
       
        color: black;
        text-align: center;
    }
</style>
<script>
    $(document).ready(function ()
    {
        $('#countDownId').hide();
        $('#countDownsatoshi').hide();
        $('#showSecond').hide();


        $('.dailyGift').click(function ()
        {
            $('#imageId').hide();
            $('#showSecond').show();

            var cur_img = $(this).attr("data-cur");
            $("#new_img").attr('src', 'client_assets/assets/daily_gifts/gift' + cur_img + '.png')
            
            var fiveMinutes = 4,
                    display = document.querySelector('#time');
            startTimer(fiveMinutes, display);

        });

        $('#giftSatoshi').click(function ()
        {
            $('#countDownId').hide();
            $('#countDownsatoshi').show();

            var id = $(this).attr('id');
            //alert(id);
            $.ajax(
                    {
                        url: '<?php echo base_url('daily_gift/get_random'); ?>',
                        type: 'POST',
                        data: {id: id},
                        success: function (data)
                        {
                            $('#countDownsatoshi').html(data);
                        }
                    });
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

    });
</script>

<div class="container main_div">  
    <div class="row mainbodybgdailygift padding30both">
    <?php
    $dataForm = array(
        'name' => 'dailyGiftForm',
        'id' => 'dailyGiftForm'
    );
    echo form_open('daily_gift', $dataForm);
    ?>
    <div class="row" width="100%" style="align-content: center;background-color: #0782C0">
        <h2>Daily Gifts</h2>
    </div>
       
       <center><ins class="bmadblock-5a9c25c5a2f1090010f2a8ae" style="display:inline-block;width:728px;height:90px;"></ins>
<script async type="application/javascript" src="//ad.bitmedia.io/js/adbybm.js/5a9c25c5a2f1090010f2a8ae"></script></center>

    <div class="row" width="100%">               
        <!--div  style="float: left;width: 100%;color: black;">
            <h4 style="text-align:center;margin-top:4%;">Please solve the simple math :</h4>
            <h5 style="text-align:center;letter-spacing:2px;"><?php echo $f_number . " " . $operation . " " . $s_number; ?></h5>
            <center>
                <input type="text" required id="answer" name="answer" placeholder="" aria-describedby="exampleHelpText" style="margin-top:1%;margin-bottom:5%;width: 20%;color:black;" onchange="check_answer();">
                <input type="hidden" name="result" id="result" placeholder="" value="<?php echo $result; ?>">

            </center>
        </div-->        
    </div>
    <!--div class="row" width="100%">
        <div  style="float: left;width: 100%;color: black;">
    <?php
    $dataSubmit = array(
        'class' => 'btn btn-default'
    );
    echo form_submit('cmdSubmit', 'Collect');
    ?>
        </div>                       
    </div-->

    <div class="row" id="imageId" width="100%" style="background-size: 100% 100%; height:500px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/daily_gifts/dailygifts.png'); ?>');">
        <div class="dailygiftmaindiv">          
            <a href="javascript:void(0)" data-cur="1" class="dailyGift">
                <img style="height:190px" class="animatebounce imggift" src="<?php echo base_url('client_assets/assets/daily_gifts/gift1.png'); ?>">
            </a>
            <a href="javascript:void(0)" data-cur="2" class="dailyGift" >
                <img style="height:190px" class="animatebounce1 imggift" src="<?php echo base_url('client_assets/assets/daily_gifts/gift2.png'); ?>" height="150px">
            </a>
            <a href="javascript:void(0)" data-cur="3" class="dailyGift">
                <img style="height:190px" class="animatebounce2 imggift" src="<?php echo base_url('client_assets/assets/daily_gifts/gift3.png'); ?>" height="150px">
            </a>
        </div>        
    </div>

    <div class="row" id="showSecond" width="100%" style="background-size: 100% 100%; height:500px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/daily_gifts/dailygifts.png'); ?>');">
        <div  style="float: left;width: 100%;color: black; margin-bottom: 100px; margin-top: 100px;">       
            <div><h1>Your Prize today is <br>(<span id="time"> 5 </span>)</h1></div>
        </div>        
    </div>




    <div class="row" id="countDownId" width="100%" style="background-size: 100% 100%; height:500px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/daily_gifts/dailygifts.png'); ?>');">
        <div  style="color: black; margin-top: 100px; ">
            <h3 style="color:black;">Open Your Prize !</h3>
        </div>        
        <div  style="color: black; margin-top: 0px; ">
            <a href="javascript:void(0)" id="giftSatoshi">                
                <img style="height:150px" id="new_img" src="" height="150px">
            </a>
        </div>        
    </div>

    <div class="row" id="countDownsatoshi" width="100%" style="    background-size: cover; height:500px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/daily_gifts/daillygiftsimage.png'); ?>');">               

    </div>

    <div class="row" id="countDownsatoshiData" width="100%">               
        <div  class="dailygiftback">
            <a class="button btndailygift" href="<?php echo base_url('welcome'); ?>"><span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span>Back</a>
        </div>                   
    </div>
   
</div>
</div>