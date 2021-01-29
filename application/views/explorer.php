<style>
    .main_div
    {
       /* margin-left: 300px;
        margin-right: 300px;*/
       
        color: black;
        text-align: center;
    }

</style>
<script>
    $(document).ready(function ()
    {
        $('#countDownId').hide();
        $('#tryAnother').hide();
        $('#getStar').hide();

        // using this we can get random number.
        $('.explorerStar').click(function ()
        {
            var randomnumber = Math.floor(Math.random() * (5 - 1 + 1)) + 1;
            var cur_img = $(this).attr("data-cur");

            if (randomnumber == cur_img) {
                $('#imageId').hide();
                $('#getStar').show();
                $('#tryAnother').hide();

                var star = 1;
                $.ajax(
                        {
                            type: 'POST',
                            url: '<?php echo base_url('explorer/saveStar') ?>',
                            data: {star: star},
                            success: function (data)
                            {
                                $('#imageId').hide();
                                $('#getStar').show();
                                $('#getStarS').html(data);
                            }
                        });
            } else {
                $('#getStar').hide();
                $('#tryAnother').show();
                $('#imageId').hide();

            }
        });     

        $('#findStar').click(function ()
        {
            $('#tryAnother').hide();
            $('#imageId').show();
            $('#getStar').hide();
        });
    });
</script>

<div class="container main_div">  
     <div class="row mainbodybgdailygift padding30both">
    <?php
    $dataForm = array(
        'name' => 'explorerStarForm',
        'id' => 'explorerStarForm'
    );
    echo form_open('daily_gift', $dataForm);
    ?>
    <div class="row" width="100%" style="align-content: center;background-color: #0782C0">
        <h2>Explore Star</h2>
    </div>
    
     <center><ins class="bmadblock-5a9c25c5a2f1090010f2a8ae" style="display:inline-block;width:728px;height:90px;"></ins>
<script async type="application/javascript" src="//ad.bitmedia.io/js/adbybm.js/5a9c25c5a2f1090010f2a8ae"></script></center>

    <div id="getStarS" class="row" width="100%" style="align-content: center;/*background-color: gray*/">
        
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

    <div class="row" id="imageId" width="100%" style="background-size: 100% 100%;     height: 740px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/explore/findstarimage.png'); ?>');">               
        <div  style="float: left;width: 100%;color: black; margin-bottom: 100px;" class="explorefoods">          
            <a href="javascript:void(0)" data-cur="1" class="explorerStar">
                <img style="height:100px" src="<?php echo base_url('client_assets/assets/explore/ladoo.png'); ?>">
            </a>
            <a href="javascript:void(0)" data-cur="2" class="explorerStar" >
                <img style="height:100px" src="<?php echo base_url('client_assets/assets/explore/ladoo.png'); ?>" height="150px">
            </a>
            <a href="javascript:void(0)" data-cur="3" class="explorerStar">
                <img style="height:100px" src="<?php echo base_url('client_assets/assets/explore/ladoo.png'); ?>" height="150px">
            </a>
            <a href="javascript:void(0)" data-cur="4" class="explorerStar">
                <img style="height:100px" src="<?php echo base_url('client_assets/assets/explore/ladoo.png'); ?>" height="150px">
            </a>
            <a href="javascript:void(0)" data-cur="5" class="explorerStar">
                <img style="height:100px" src="<?php echo base_url('client_assets/assets/explore/ladoo.png'); ?>" height="150px">
            </a>

        </div>        
    </div>

    <div class="row" id="tryAnother" width="100%" style="background-size: 100% 100%;     height: 740px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/explore/tryanother-nothingfound.png'); ?>');">
        <div  style="float: left;width: 100%;color: black; margin-bottom: 100px; margin-top: 100px;">       
            <div><h1>Try Another </h1></div>
        </div>        
    </div>

    <div class="row" id="getStar" width="100%" style="background-size: 100% 100%;    height: 740px; background-position:100%; background-image: url('<?php echo base_url('client_assets/assets/explore/gotstar.png'); ?>');">
        <div  style="float: left;width: 100%;color: black; margin-bottom: 100px; margin-top: 100px;">       

        </div>        
    </div>


    <div class="row" id="countDownsatoshi" width="100%">               
        <div  style="color: black; margin-top: 30px;">
            <a id="tryAnother" class="button btndailygift" href="<?php echo base_url('welcome'); ?>">Back</a>
            <a id="findStar" class="button btndailygift" href="javascript:void(0)">Try Another</a>
        </div>                   

    </div>
    <br>

    <?php echo form_close(); ?>
</div>
</div>