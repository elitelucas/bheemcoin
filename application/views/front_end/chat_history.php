<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BheemCoin.com : Welcome To Bheemcoin.com</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Luckiest+Guy|Bitter:700|Open+Sans:400,600,600italic">
        <link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/assets/stylesheets/style-min.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>client_assets/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>client_assets/js/jssor.slider.mini.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/path/to/font-awesome/css/font-awesome.min.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script>
            jQuery(document).ready(function ($) {

                var jssor_1_SlideoTransitions = [
                    [{b: 5500, d: 3000, o: -1, r: 240, e: {r: 2}}],
                    [{b: -1, d: 1, o: -1, c: {x: 51.0, t: -51.0}}, {b: 0, d: 1000, o: 1, c: {x: -51.0, t: 51.0}, e: {o: 7, c: {x: 7, t: 7}}}],
                    [{b: -1, d: 1, o: -1, sX: 9, sY: 9}, {b: 1000, d: 1000, o: 1, sX: -9, sY: -9, e: {sX: 2, sY: 2}}],
                    [{b: -1, d: 1, o: -1, r: -180, sX: 9, sY: 9}, {b: 2000, d: 1000, o: 1, r: 180, sX: -9, sY: -9, e: {r: 2, sX: 2, sY: 2}}],
                    [{b: -1, d: 1, o: -1}, {b: 3000, d: 2000, y: 180, o: 1, e: {y: 16}}],
                    [{b: -1, d: 1, o: -1, r: -150}, {b: 7500, d: 1600, o: 1, r: 150, e: {r: 3}}],
                    [{b: 10000, d: 2000, x: -379, e: {x: 7}}],
                    [{b: 10000, d: 2000, x: -379, e: {x: 7}}],
                    [{b: -1, d: 1, o: -1, r: 288, sX: 9, sY: 9}, {b: 9100, d: 900, x: -1400, y: -660, o: 1, r: -288, sX: -9, sY: -9, e: {r: 6}}, {b: 10000, d: 1600, x: -200, o: -1, e: {x: 16}}]
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
                    } else {
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
                background: url('<?php echo base_url(); ?>client_assets/img/b05.png') no-repeat;
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
                background: url('<?php echo base_url(); ?>client_assets/img/a22.png') center center no-repeat;
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
            var myVar;
            function update_chat()
            {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "index.php/welcome/update_chat_history",
                    datatype: "text",
                    data: {},
                    success: function (response)
                    {
                        $("#message_list").empty();
                        $("#message_list").append(response);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {}
                });
            }
            $(document).ready(function ()
            {
                myVar = setInterval("update_chat()", 3000);
            });
            $(document).ready(function ()
            {
                update_chat();
            });

        </script>
        <style>
            #message_list
            {
                max-height: 500px;
                overflow-y: scroll;
            }
        </style>
    </head>
    <body style="background: url(<?php echo base_url(); ?>client_assets/assets/bg-soil.jpg) repeat top left;">

        <?php $this->load->view('front_end/header1'); ?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="    position: relative;
             top: -252px;
             width: 100%;
             z-index: 500;">


            <div class="carousel-inner" role="listbox">

                <div id="carousel-example-generic81" class="carousel slide" data-ride="carousel" data-interval="false">


                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo base_url(); ?>client_assets/assets/banners/inner-header.png" alt="Doddamani residence">

                        </div>

                    </div>


                </div>




            </div>

        </div>
        <div class="content-top"></div>

        <section id="main-content"  >


            <div class="row">
                <div class="small-16 large-16 columns" >
                    <div class="notebook">
                        <header>
                            <h2 class="title">Welcome &nbsp;<span style="color:#d6614f;">
                                    <?php if ($this->session->userdata('user_name')) {
                                        echo $this->session->userdata('user_name');
                                    } ?><span>	
                                        </h2>

                                        </header>
                                        <div class="blog-entries notebook-pattern" id="message_list">


                                        </div>
                                        <form> 
                                            <center><br></br>
                                                <a href="<?php echo site_url('welcome/chat'); ?>" class="expanded lime-button" id="send" style="margin-top:1%;">GOTO Chat</a></center>
                                        </form>
                                        </div>
                                        </div> 
                                        </div> 

                                        </section>

                                        <?php
                                        $this->load->view('front_end/footer');
                                        ?>
                                        <script src="<?php echo base_url(); ?>client_assets/assets/js/app-min.js"></script>
                                        <script src="<?php echo base_url(); ?>client_assets/assets/js/functions.js"></script>
                                        <script src="<?php echo base_url(); ?>client_assets/assets/js/bootstrap.min.js"></script>
                                        </body>

                                        </html>
                   ?>
                                        <script src="<?php echo base_url(); ?>client_assets/assets/js/app-min.js"></script>
                                        <script src="<?php echo base_url(); ?>client_assets/assets/js/functions.js"></script>
                                        <script src="<?php echo base_url(); ?>client_assets/assets/js/bootstrap.min.js"></script>
                                        </body>

                                        </html>
