<style>
    .main_div
    {
       /* margin-left: 300px;
        margin-right: 300px;*/
        /*background-color: #E5E5E5;            */
        color: black;
        text-align: center;
    }
</style>


<div class="row main_div mainbodybgdailygift  padding30both">  
    <div class="row" width="100%" style="align-content: center;background-color: #0782C0">
        <h2>Referral</h2>
    </div>
    <div class="row" width="100%">               

    </div>   
    <div class="row">
        <br>
        Your Referral URL: 
        <a href="<?php echo  $reference_link; ?>"><?php echo $reference_link ?></a>
        
    </div>
    <div class="row referelmain" id="imageId" width="100%">               
        * You get %20 of your referral collects for lifetime! <br><br>
        <div>
            <center><img class="group" src="<?php echo base_url(); ?>client_assets/assets/3new.png"/></center>
        </div>
        Number of Referrals : <?php echo $referal_count; ?> Friends <a data-id="<?php echo $this->session->userdata('user_id') ?>" id="referal_view" href="<?php echo base_url('referal/show_referal'); ?>">View</a> <br>
        Score from Referrals : <?php echo $total_referal; ?> Satoshi Collect <br> 
        Total Score you got from Referrals : 
        <?php
             echo $adminData['refer_earning'];        
        ?> Satoshi <br> 
    </div>
    <center><p style="font-size:30px">
        Banners :</p></center>
          <div class="banners">
             <center><p>200x200 Banner : </p><img class="banner1" src="<?php echo base_url(); ?>banners/200x200banner.png"/><p>http://bheemcoin.com/banners/200x200banner.png</p></center>
             
                        <center><img class="banner2" src="<?php echo base_url(); ?>banners/200x200banner.gif"/><p>http://bheemcoin.com/banners/200x200banner.gif</p></center>
                        
                  <center><p>100x100 Banner : </p><img class="banner3" src="<?php echo base_url(); ?>banners/100x100banner.png"/><p>http://bheemcoin.com/banners/100x100banner.png</p></center>
    <center><p>468x60 Banner : </p><img class="banner4" src="<?php echo base_url(); ?>banners/468x60banner.png"/><p>http://bheemcoin.com/banners/468x60banner.png</p></center>
                        
                        <center><img class="banner5" src="<?php echo base_url(); ?>banners/468x60banner.gif"/><p>http://bheemcoin.com/banners/468x60banner.gif</p></center>
                        
                 <center><p>728x90 Banner : </p><img class="banner6" src="<?php echo base_url(); ?>banners/728x90banner.png"/><p>http://bheemcoin.com/banners/728x90banner.png</p></center>
                 
     <center><img class="banner7" src="<?php echo base_url(); ?>banners/728x90banner.gif"/><p>http://bheemcoin.com/banners/728x90banner.gif</p></center>
     
                        <center><p>250x250 Banner : </p><img class="banner8" src="<?php echo base_url(); ?>banners/250x250banner.png"/><p>http://bheemcoin.com/banners/250x250banner.png</p></center>
                        
                <center><p>300x250 Banner : </p><img class="banner9" src="<?php echo base_url(); ?>banners/300x250banner.png"/><p>http://bheemcoin.com/banners/300x250banner.png</p></center>
                
        <center><p>300x600 Banner : </p><img class="banner10" src="<?php echo base_url(); ?>banners/300x600banner.gif"/><p>http://bheemcoin.com/banners/300x600banner.gif</p></center>
           
        </div>
    
    <div class="row" id="showReferal_List" width="100%"> 
        
    </div>
    <div class="row" id="countDownsatoshiData" width="100%">               
    <div  style="color: black; margin-top: 30px;">
        <a class="button btndailygift" href="<?php echo base_url('welcome'); ?>">Back</a>
    </div>                   
</div>
</div>





<br>

<!--script>
    $(document).ready(function ()
    {
        $('#showReferal_List').hide();
        $('#referal_view').click(function ()
        {
            
            $('#imageId').hide();
            $('#showReferal_List').show();
            var user_id = $(this).attr("data-id");
            $.ajax(
                    {
                        url: '<?php echo base_url('referal/show_referal'); ?>',
                        type: 'POST',
                        data: {user_id: user_id},
                        success: function (data)
                        {
                           // $('#showReferal_List').html(data);
                        }
                    });
        });
    });
</script-->
