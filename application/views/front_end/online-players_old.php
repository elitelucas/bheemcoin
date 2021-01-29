<!doctype html>
<html class="no-js" lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BheemCoin.com : Welcome To Bheemcoin.com</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Luckiest+Guy|Bitter:700|Open+Sans:400,600,600italic">
    <link rel="stylesheet" href="<?php echo base_url();?>client_assets/assets/stylesheets/style-min.css">
	 <script type="text/javascript" src="<?php echo base_url();?>client_assets/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>client_assets/js/jssor.slider.mini.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>client_assets/path/to/font-awesome/css/font-awesome.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_SlideoTransitions = [
              [{b:5500,d:3000,o:-1,r:240,e:{r:2}}],
              [{b:-1,d:1,o:-1,c:{x:51.0,t:-51.0}},{b:0,d:1000,o:1,c:{x:-51.0,t:51.0},e:{o:7,c:{x:7,t:7}}}],
              [{b:-1,d:1,o:-1,sX:9,sY:9},{b:1000,d:1000,o:1,sX:-9,sY:-9,e:{sX:2,sY:2}}],
              [{b:-1,d:1,o:-1,r:-180,sX:9,sY:9},{b:2000,d:1000,o:1,r:180,sX:-9,sY:-9,e:{r:2,sX:2,sY:2}}],
              [{b:-1,d:1,o:-1},{b:3000,d:2000,y:180,o:1,e:{y:16}}],
              [{b:-1,d:1,o:-1,r:-150},{b:7500,d:1600,o:1,r:150,e:{r:3}}],
              [{b:10000,d:2000,x:-379,e:{x:7}}],
              [{b:10000,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:9100,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:10000,d:1600,x:-200,o:-1,e:{x:16}}]
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>

    <style>
        
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('<?php echo base_url();?>client_assets/img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 22 css */
        /*
        .jssora22l                  (normal)
        .jssora22r                  (normal)
        .jssora22l:hover            (normal mouseover)
        .jssora22r:hover            (normal mouseover)
        .jssora22l.jssora22ldn      (mousedown)
        .jssora22r.jssora22rdn      (mousedown)
        */
        .jssora22l, .jssora22r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 58px;
            cursor: pointer;
            background: url('<?php echo base_url();?>client_assets/img/a22.png') center center no-repeat;
            overflow: hidden;
        }
        .jssora22l { background-position: -10px -31px; }
        .jssora22r { background-position: -70px -31px; }
        .jssora22l:hover { background-position: -130px -31px; }
        .jssora22r:hover { background-position: -190px -31px; }
        .jssora22l.jssora22ldn { background-position: -250px -31px; }
        .jssora22r.jssora22rdn { background-position: -310px -31px; }
    </style>
	
	<style>
	@media only screen and (max-width: 767px){
		
	#myCarousel{
		    top: -122px !important;
		
		
	}	
	.content-top {
    height: 52px;
    margin-top: -148px  !important;
    position: relative;
    z-index: 1000;
}	


.carousel-caption{
	
	    font-size: 12px !important;
    bottom: 13px !important;
    right: 20px !important;
}
#main-header .logo {
    margin-top: -17px  !important;
}
	}
	html{
		
		overflow-x:hidden;
	}
	</style>
	<link rel="stylesheet" href="<?php echo base_url();?>client_assets/css/bootstrap.min.css">
  </head>
  <body style="background: url(<?php echo  base_url();?>client_assets/assets/bg-soil.jpg) repeat top left;">

    <?php $this->load->view('front_end/header');?>

         <div id="myCarousel" class="carousel slide" data-ride="carousel" style="    position: relative;
    top: -252px;
    width: 100%;
    z-index: 500;">
   

      <div class="carousel-inner" role="listbox">
   
      <div id="carousel-example-generic81" class="carousel slide" data-ride="carousel" data-interval="false">
  

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo  base_url();?>client_assets/assets/banners/background.png" alt="Doddamani residence">
      <div class="carousel-caption" style="    background: linear-gradient(to bottom, #c5db3b 0, #8ab52d 100%);
    color: #1f1005;
    box-shadow: 0 1px #ffc600;
    font-size: 23px;
    text-align: center;
    text-decoration: none;
    text-shadow: 0 1px #ffc600;
    padding: 8px 3px 9px 5px;
    margin-top: 18rem;
    margin-left: 46%;
    font-family: Luckiest Guy, cursive;">
       GET STARTED
      </div>
    </div>
    
  </div>

 
</div>

     
    
     
    </div>

  </div>
  
    <div class="content-top"></div>

    <section id="main-content"  >
     
      
      <div class="row">

        <div id="featured-games" class="small-16 large-16 columns">
          <h2 class="title" style="padding-bottom:2%;text-align:center;">Welcome to BheemCoin.com !</h2>
		  <p style="text-align:center;padding-bottom:2%;    color: #c5db3b;
    font-size: 20px;">Bheemcoin is Bitcoin Generator Game to get bitcoins every minute. Try it !Refer your friends, enemies and everyone else and receive 20% lifetime commission on all their claims. We have no minimum payout, and always instant !</p>
          <div id="jssor_1" style="    border: 3px solid #c5db3b;position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1920px; height: 650px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('<?php echo base_url();?>client_assets/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1920px; height: 650px;  overflow: hidden;">
          
		    <div data-p="225.00" style="display: none;">
                <img data-u="image" src="<?php echo base_url();?>client_assets/assets/banners/b1.png" />
			
                <div style="position: absolute;
        top: 313px;
    left: 37px;
    padding: 3%;
    width: 639px;
    text-shadow: 2px 1px 4px #171716;
    height: 286px;
    font-weight: bold;
    background-color: rgba(197, 219, 59, 0.61);
    text-transform: uppercase;
    font-size: 50px;
    color: #241707;
    line-height: 71px;">Instantly Free </br><span style=" color: #d21510;text-shadow: 3px 4px 2px #000;">Bitcoin Generator</span></br><span style=" color: #fff;text-shadow: 3px 4px 2px #000;">Game For all !</span></div>
                
                
                
          
            </div>
		  
		  
		     <div data-p="225.00" style="display: none;">
                <img data-u="image" src="<?php echo base_url();?>client_assets/assets/banners/b2.png" />
				<div style="position: absolute;
    top: 64px;
    left: 1218px;
    padding: 3%;
    width: 639px;
    text-shadow: 2px 1px 4px #171716;
    height: 531px;
    font-weight: bold;
    background-color: rgba(197, 219, 59, 0.61);
    text-transform: uppercase;
    font-size: 50px;
    color: #241707;
    line-height: 75px;">Free Members </br><span style=" color: #d21510;text-shadow: 3px 4px 2px #000;">Get 2 or 5 Satoshi's</span></br><span style=" color: #fff;text-shadow: 3px 4px 2px #000;">Every 5 Minutes</span> </br><span>Upgraded</b> Get</span></br><span>Up to <b>10</b> Satoshi's</span></br><span style="color: #fff;">Every 5 Minutes</span></div>
                
                
            </div>
        <div data-p="225.00" style="display: none;">
                <img data-u="image" src="<?php echo base_url();?>client_assets/assets/banners/b3.png" />
				<div style="position: absolute;
    top: 64px;
    left:50px;
    padding: 3%;
    width: 639px;
    text-shadow: 2px 1px 4px #171716;
    height: 481px;
    font-weight: bold;
    background-color: rgba(197, 219, 59, 0.61);
    text-transform: uppercase;
    font-size: 50px;
    color: #241707;
    line-height: 75px;">Win Free Daily Gifts</br><span style=" color: #d21510;text-shadow: 3px 4px 2px #000;">upto (~500 Satoshi)</span></br><span style=" text-shadow: 3px 4px 2px #000;">based on</span> </br><span  style=" color: #fff;text-shadow: 3px 4px 2px #000;">Bitcoin price</span></div>
                
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
        <a href="http://www.jssor.com" style="display:none">Slideshow Maker</a>
    </div>
        </div>



      </div>
	   <div class="row game-presentation" style="padding-top:5%;">
       
        <div class="small-16 large-16 columns">
          <div class="game-description">
            <h2 style="    font-size: 35px;text-align:center;">Join and have fun with games inside!</h2>
            <p style="text-align:center;">
              Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
             
            </p>
			<div class="details-link">
            <center><a href="<?php echo site_url('welcome/register');?>" style="color:#261100">Register now</a></center>
          </div>
          </div>
          
        </div>
      </div>
	  
	  
	  
	  
	  
	  
	  
	   <div class="row team">
	   <h3 style="text-align:center;padding-bottom:3%;">Read funny chhota bheem comics and magazines, Have fun with other players online</h3>
        <div class="small-16 columns">
          <div class="row small-up-1 medium-up-2 large-up-4">

            <!--team-member-->
            <div class="column team-member">
              <div class="photo">
                <img src="<?php echo base_url();?>client_assets/assets/book2.png" class="" alt="">
              </div>
            
             
              
            </div>
            <!--//team-member-->
<div class="column team-member">
              <div class="photo">
                <img src="<?php echo base_url();?>client_assets/assets/book1.png" class="" alt="">
              </div>
             
              
            </div>
            <!--team-member-->
            <div class="column team-member">
              <div class="photo">
                <img src="<?php echo base_url();?>client_assets/assets/book3.png" class="" alt="">
              </div>
             
            </div>
            <!--//team-member-->

            <!--team-member-->
            <div class="column team-member">
              <div class="photo">
                <img src="<?php echo base_url();?>client_assets/assets/book4.png" class="" alt="">
              </div>
           
            </div>
            <!--//team-member-->

          
          </div>
        </div>
      </div>
	   <div class="row game-presentation">
        <div class="small-16 large-9 columns">
          <img src="<?php echo base_url();?>client_assets/assets/game.png" alt="" class="thumbnail"/>
         
        </div>
        <div class="small-16 large-7 columns">
          <div class="game-description">
            <h2>Play <span style="color:#5254c6;">Bheem</span> <span style="color:#3c9f3e;">Coin</span></h2>
			<h4 style="color:yellow">On your mobile Phone !</h4>
            <p style="text-align:justify;">
             Chhota Bheem is an Indian animated comedy adventure television series created by Rajiv Chilaka. Premiered in 2008 on Pogo TV, it focuses on adventures of a boy named Bheem and his friends in the fictional kingdom of Dholakpur. In this series, Bheem and his friends are usually involved in protecting Raja Indravarma, the king of Dholakpur and his kingdom from various evil forces. Sometimes they also help other kingdoms. It is one of the most popular animated series for children in India.</p>
          </p>
		  
		  
		  <ul style="font-weight:bold;color:yellow;list-style:none;line-height:2;">
		  <li><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Mobile Friendly game</li>
		  <li><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Play it for free</li>
		  <li><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Instant account Creation</li>
		  
		  </ul>
		  
		  </div>
          
        </div>
      </div>	

</section>

<section style="margin-top:3%; margin-bottom:3%;   background-color:rgba(50, 34, 9, 0.64);
    padding: 5%">
	<h2 style="text-align:center;padding-bottom:2%;">Join and have fun with games inside!</h2>
<div class="row ">
   <div class="small-16 large-4 columns">

  <img src="<?php echo base_url();?>client_assets/assets/Animation/animation1.gif" alt="" style="border: 1px solid #e8cb38;
    padding: 5px;"/>




</div>
<div class="small-16 large-4 columns">
  <img src="<?php echo base_url();?>client_assets/assets/Animation/animation2.gif" alt="" style="border: 1px solid #e8cb38;
    padding: 5px;"/>






</div>
<div class="small-16 large-4 columns">

  <img src="<?php echo base_url();?>client_assets/assets/Animation/animation3.gif" alt="" style="border: 1px solid #e8cb38;
    padding: 5px;"/>





</div>
<div class="small-16 large-4 columns">

  <img src="<?php echo base_url();?>client_assets/assets/Animation/animation4.gif" alt="" style="border: 1px solid #e8cb38;
    padding: 5px;"/>


</div>
</div>


<div class="row " style="padding-top:4%;">
   <div class="small-16 large-4 columns">

  <img src="<?php echo base_url();?>client_assets/assets/Animation/animation5.gif" alt="" style="border: 1px solid #e8cb38;
    padding: 5px;"/>




</div>
<div class="small-16 large-4 columns">
  <img src="<?php echo base_url();?>client_assets/assets/Animation/animation6.gif" alt="" style="border: 1px solid #e8cb38;
    padding: 5px;"/>






</div>
<div class="small-16 large-4 columns">

  <img src="<?php echo base_url();?>client_assets/assets/Animation/animation7.gif" alt="" style="border: 1px solid #e8cb38;
    padding: 5px;"/>





</div>
<div class="small-16 large-4 columns">

  <img src="<?php echo base_url();?>client_assets/assets/Animation/animation8.gif" alt="" style="border: 1px solid #e8cb38;
    padding: 5px;"/>


</div>
</div>




</section>







		<?php 
			$this->load->view('front_end/footer');
		?>
		  <script src="<?php echo base_url();?>client_assets/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>client_assets/assets/js/app-min.js"></script>
    <script src="<?php echo base_url();?>client_assets/assets/js/functions.js"></script>
    <script src="<?php echo base_url();?>client_assets/assets/js/bootstrap.min.js"></script>
  </body>

</html>
