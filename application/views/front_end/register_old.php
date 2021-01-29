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
	  <script>
		$(document).ready(function () 
		{
		   $("#name").keypress(function (e) 
				{
					if(e.which==32)
					{
						return true;
					}
				else if (e.which > 31 && (e.which < 65 || e.which > 90) && (e.which < 97 || e.which > 122) || e.which==13)
					{
						
						return false;
					}
				});
         });
	 </script>
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
	
	
	
	<script>
			function check_answer()
			{
				user_answer=parseInt($("#answer").val());
				result=parseInt($("#result").val());
				if(user_answer !=result)
				{
					alert("Wrong Answer");
					$("#answer").val("");
					$("#answer").focus();
				}
			}
			function check_captcha_answer()
			{
				user_answer=$("#answer_captcha").val();
				result=$("#result_captcha").val();
				if(user_answer !=result)
				{
					alert("Wrong Answer");
					$("#answer_captcha").val("");
					$("#answer_captcha").focus();
				}
			}
			function check_smart_captcha_answer()
			{
				user_answer=$("#smart_answer_captcha").val();
				result=$("#result_smart_captcha").val();
				
				if(user_answer !=result)
				{
					alert("Wrong Answer");
					$("#smart_answer_captcha").val("");
					$("#smart_answer_captcha").focus();
				}
			}
			function validate_password()
			{
				pass=$("#pass").val();
				c_pass=$("#cpass").val();
				
				if(pass !=c_pass)
				{
					alert("Password Mismatch");
					$("#pass").val("");
					$("#cpass").val("");
				}
			}
			function check_username()
			{
				name=$("#name").val();
				jQuery.ajax({
						type:"POST",
						url:"<?php echo base_url(); ?>" + "index.php/welcome/check_username_availability",
						datatype:"text",
						data:{name:name},
						success:function(response)
						{
							
							if(response=="false")
							{
								alert("Username already exist, try another username");
								$("#name").val("");
								$("#name").focus();
							}
						},
						error:function (xhr, ajaxOptions, thrownError){}
						});
			}
			function validate_reference()
			{
				refer_data=$("#reference").val();
				
				jQuery.ajax({
						type:"POST",
						url:"<?php echo base_url(); ?>" + "index.php/welcome/validate_reference",
						datatype:"text",
						data:{refer_data:refer_data},
						success:function(response)
						{
							if(response=="false")
							{
								alert("Invalid Reference Code");
								$("#reference").val("");
							}
						},
						error:function (xhr, ajaxOptions, thrownError){}
						});
			}
			function check_email()
			{
				email=$("#email").val();
				jQuery.ajax({
						type:"POST",
						url:"<?php echo base_url(); ?>" + "index.php/welcome/check_email_availability",
						datatype:"text",
						data:{email:email},
						success:function(response)
						{
							
							if(response=="false")
							{
								alert("Email ID already exist, try another email");
								$("#email").val("");
								$("#email").focus();
							}
						},
						error:function (xhr, ajaxOptions, thrownError){}
						});
			}
	</script>
	<script src="<?php echo base_url();?>client_assets/pop/jquery-loader.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>client_assets/pop/qunit/qunit/qunit.css" media="screen">
    <script src="<?php echo base_url();?>client_assets/pop/qunit/qunit/qunit.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>client_assets/pop/remodal.css">
    <link rel="stylesheet" href="<?php echo base_url();?>client_assets/pop/remodal-default-theme.css">
    <script src="<?php echo base_url();?>client_assets/pop/remodal.js"></script>
    <script src="<?php echo base_url();?>client_assets/popremodal_test.js"></script>
    <style>
        .remodal-overlay.without-animation.remodal-is-opening,
        .remodal-overlay.without-animation.remodal-is-closing,
        .remodal.without-animation.remodal-is-opening,
        .remodal.without-animation.remodal-is-closing,
        .remodal-bg.without-animation.remodal-is-opening,
        .remodal-bg.without-animation.remodal-is-closing {
            animation: none;
        }
    </style>
  </head>
  <body style="background: url(<?php echo base_url();?>client_assets/assets/bg-soil.jpg) repeat top left;">

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
      <img src="<?php echo  base_url();?>client_assets/assets/banners/inner-header.png" alt="Doddamani residence">
     
    </div>
    
  </div>

 
</div>

     
    
     
    </div>

  </div>
	
	
	
	
    <div class="content-top"></div>

    <section id="main-content"  >
     
       
      <div class="row">
	   <div class="small-16 large-11 columns">
      <div class="container" style="background-color: rgba(107, 63, 15, 0.63);
    padding: 3%;">
      <h3>Account Details </h3>
    <form action="<?php echo site_url('welcome/process_register');?>" method="POST">

      <label>Username
        <input type="text" name="name" id="name" onchange="check_username();" required placeholder="Please select a unique username. You may only use letters and numbers." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
      </label>
     

	  <label>Password
        <input type="password" name="pass" id="pass" required placeholder="Please choose a unique password for your account." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
      </label>
     
<label>Verify Password
        <input type="password" name="cpass" id="cpass" required placeholder="Please re-enter your password." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;" onchange="validate_password();">
      </label>
     
	  
	<label>Referrer
        <input type="text" name="refer" id="reference" onchange="validate_reference();" placeholder="The member who referred you." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
      </label>
	</div> 
	</div> 
	
	
	 <div class="small-16 large-5 columns">
	 <img src="<?php echo base_url();?>client_assets/assets/1.png"/>
	</div> 
	</div> 
	
	
	
	<div class="row" style="padding-top:3%;">
	<div class="small-16 large-5 columns">
	 <img src="<?php echo base_url();?>client_assets/assets/2.png"/>
	</div>
	<div class="small-16 large-11 columns">
      <div class="container" style="    background-color: rgba(107, 63, 15, 0.63);
    padding: 3%;">
      <h3>Personal Details</h3>
    

      <label>Your Bitcoin Address
        <input type="text" name="bitcoin" id="bitcoin" required placeholder="Please enter your bitcoin wallet address." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
      </label>
     

	  <label>Your Email Address
        <input type="email" name="email" id="email" onchange="check_email();" required placeholder="We will send you an activation email so be sure to enter a valid and current address." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
      </label>
     
<label>How did you find us?
        <input type="text" name="find" id="find" required placeholder="Write anything from where you come, this will help us on site promoting." aria-describedby="exampleHelpText" style="margin-top:1%;color: black;">
      </label>
     
	  <p style="text-align:center;color: #ea5050;font-weight:bold;">Notice* : only one account is allowed per Person /house/ location!</p>
	  <p style="text-align:center;color: #ea5050;font-weight:bold;">Multi-Accounts are Not Allowed.</p>

	  
	  
	  
	  <h4 style="text-align:center;margin-top:4%;">Please solve the simple math :</h4>
	  <h5 style="text-align:center;letter-spacing:2px;"><?php echo $f_number." ".$operation." ".$s_number;?></h5>
       <center>
			<input type="text" required id="answer" name="answer" placeholder="" aria-describedby="exampleHelpText" style="margin-top:1%;margin-bottom:5%;width: 70%;color:black;" onchange="check_answer();">
			<input type="hidden" name="result" id="result" placeholder="" value="<?php echo $result;?>">
		
	   </center>
       
	   <h4 style="text-align:center;margin-top:4%;">Enter text of the Image:</h4>
	   <center><p style="text-align:center;letter-spacing:2px;background-image: url(<?php echo base_url();?>/client_assets/cap_bg.jpg);width:25%;color:#000;"><?php echo $image_captcha;?></p></center>
       <center>
			<input type="text" required id="answer_captcha" name="answer_captcha" placeholder="" aria-describedby="exampleHelpText" style="margin-top:1%;margin-bottom:5%;width: 70%;color:black;" onchange="check_captcha_answer();">
			<input type="hidden" name="result_captcha" id="result_captcha" placeholder=""  value="<?php echo $image_captcha;?>">
	   </center>
	  
		<h4 style="text-align:center;margin-top:4%;">Smart Captcha</h4>
	   <center><p style="text-align:center;letter-spacing:2px;font-size: 31px;background-image: url(<?php echo base_url();?>/client_assets/captcha.png);width:25%;color:#7d8061;"><?php echo $smart_captcha;?></p></center>
	  
       <center>
			<input type="text" required id="smart_answer_captcha" name="smart_answer_captcha" placeholder="" aria-describedby="exampleHelpText" style="margin-top:1%;margin-bottom:5%;width: 70%;color:black;" onchange="check_smart_captcha_answer();">
			<input type="hidden" name="result_smart_captcha" id="result_smart_captcha" placeholder=""  value="<?php echo $smart_captcha;?>">
	   </center>
	   
	  
		<center><input type="submit" value="Create Account" class="expanded lime-button"></center>
    </form>
	  
	</div> 
	</div> 
	
	</div>
	
	
	
	
	
	
	
	
	
	
    </section>
	
<?php $this->load->view("front_end/footer");?>
    <script src="<?php echo base_url();?>client_assets/assets/js/app-min.js"></script>
    <script src="<?php echo base_url();?>client_assets/assets/js/functions.js"></script>
	
	    <script src="<?php echo base_url();?>client_assets/assets/js/bootstrap.min.js"></script>
		
	<div class="remodal" data-remodal-id="not-allowed" style="border: 3px solid #f5be2a;background:white;">
							
						<a data-remodal-action="close" class="remodal-close"></a>
					<br>	
				<img src="<?php echo base_url();?>client_assets/assets/logo1.png" alt="logo" width="400">
				<p style="line-height:1.8;font-size:20px;"><b>You have already registered from this ip address..!</b></br>
						
				  <p style="line-height:1.8;font-size:16px;">Notice* : only one account is allowed per Person /house/ location!,
						Multi-Accounts are Not Allowed.</br>
				  
				  
		</div>
  </body>

</html>
