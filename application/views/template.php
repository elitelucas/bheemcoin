<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BheemCoin.com : Welcome To Bheemcoin.com</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Luckiest+Guy|Bitter:700|Open+Sans:400,600,600italic">
        <link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/assets/stylesheets/style-min.css">
        <link href="<?php echo base_url(); ?>client_assets/assets/navicon.png" rel="shortcut icon" type="image/png">
        <link href="<?php echo base_url('admin_assets/'); ?>assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?php echo base_url(); ?>client_assets/js/jquery-1.9.1.min.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url(); ?>client_assets/js/jssor.slider.mini.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/path/to/font-awesome/css/font-awesome.min.css">
        <!-- link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"-->
        <!-- Latest compiled and minified CSS -->


        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
            jQuery(document).ready(function ($) {

                var jssor_1_SlideoTransitions = [
                    [{
                            b: 5500,
                            d: 3000,
                            o: -1,
                            r: 240,
                            e: {
                                r: 2
                            }
                        }],
                    [{
                            b: -1,
                            d: 1,
                            o: -1,
                            c: {
                                x: 51.0,
                                t: -51.0
                            }
                        }, {
                            b: 0,
                            d: 1000,
                            o: 1,
                            c: {
                                x: -51.0,
                                t: 51.0
                            },
                            e: {
                                o: 7,
                                c: {
                                    x: 7,
                                    t: 7
                                }
                            }
                        }],
                    [{
                            b: -1,
                            d: 1,
                            o: -1,
                            sX: 9,
                            sY: 9
                        }, {
                            b: 1000,
                            d: 1000,
                            o: 1,
                            sX: -9,
                            sY: -9,
                            e: {
                                sX: 2,
                                sY: 2
                            }
                        }],
                    [{
                            b: -1,
                            d: 1,
                            o: -1,
                            r: -180,
                            sX: 9,
                            sY: 9
                        }, {
                            b: 2000,
                            d: 1000,
                            o: 1,
                            r: 180,
                            sX: -9,
                            sY: -9,
                            e: {
                                r: 2,
                                sX: 2,
                                sY: 2
                            }
                        }],
                    [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 3000,
                            d: 2000,
                            y: 180,
                            o: 1,
                            e: {
                                y: 16
                            }
                        }],
                    [{
                            b: -1,
                            d: 1,
                            o: -1,
                            r: -150
                        }, {
                            b: 7500,
                            d: 1600,
                            o: 1,
                            r: 150,
                            e: {
                                r: 3
                            }
                        }],
                    [{
                            b: 10000,
                            d: 2000,
                            x: -379,
                            e: {
                                x: 7
                            }
                        }],
                    [{
                            b: 10000,
                            d: 2000,
                            x: -379,
                            e: {
                                x: 7
                            }
                        }],
                    [{
                            b: -1,
                            d: 1,
                            o: -1,
                            r: 288,
                            sX: 9,
                            sY: 9
                        }, {
                            b: 9100,
                            d: 900,
                            x: -1400,
                            y: -660,
                            o: 1,
                            r: -288,
                            sX: -9,
                            sY: -9,
                            e: {
                                r: 6
                            }
                        }, {
                            b: 10000,
                            d: 1600,
                            x: -200,
                            o: -1,
                            e: {
                                x: 16
                            }
                        }]
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

            .jssorb05 div,
            .jssorb05 div:hover,
            .jssorb05 .av {
                position: absolute;
                /* size of bullet elment */
                width: 16px;
                height: 16px;
                background: url('<?php echo base_url(); ?>client_assets/img/b05.png') no-repeat;
                overflow: hidden;
                cursor: pointer;
            }

            .jssorb05 div {
                background-position: -7px -7px;
            }

            .jssorb05 div:hover,
            .jssorb05 .av:hover {
                background-position: -37px -7px;
            }

            .jssorb05 .av {
                background-position: -67px -7px;
            }

            .jssorb05 .dn,
            .jssorb05 .dn:hover {
                background-position: -97px -7px;
            }
            /* jssor slider arrow navigator skin 22 css */
            /*
                .jssora22l                  (normal)
                .jssora22r                  (normal)
                .jssora22l:hover            (normal mouseover)
                .jssora22r:hover            (normal mouseover)
                .jssora22l.jssora22ldn      (mousedown)
                .jssora22r.jssora22rdn      (mousedown)
            */

            .jssora22l,
            .jssora22r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 40px;
                height: 58px;
                cursor: pointer;
                background: url('<?php echo base_url(); ?>client_assets/img/a22.png') center center no-repeat;
                overflow: hidden;
            }

            .jssora22l {
                background-position: -10px -31px;
            }

            .jssora22r {
                background-position: -70px -31px;
            }

            .jssora22l:hover {
                background-position: -130px -31px;
            }

            .jssora22r:hover {
                background-position: -190px -31px;
            }

            .jssora22l.jssora22ldn {
                background-position: -250px -31px;
            }

            .jssora22r.jssora22rdn {
                background-position: -310px -31px;
            }
        </style>

        <style>
            @media only screen and (max-width: 767px) {
                #myCarousel {
                    top: -122px !important;
                }
                .content-top {
                    height: 52px;
                    margin-top: -148px !important;
                    position: relative;
                    z-index: 1000;
                }
                .carousel-caption {
                    font-size: 12px !important;
                    bottom: 13px !important;
                    right: 20px !important;
                }
                #main-header .logo {
                    margin-top: -17px !important;
                }
            }

            html {
                overflow-x: hidden;
            }
        </style>
        <style>
            #pagination li
            {
                border: solid;
                padding: 0px 11px 1px;
                margin-left: 5px;
                font-family: Luckiest Guy, cursive;
                font-weight: 400;
                font-style: normal;
                color: #c5db3b !important;
            }
            #pagination a
            {
                color: #c5db3b !important;

            }
            #pagination .active
            {
                background: #5a5ae6;
            }
        </style>
        <link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/bootstrap.min.css">

        <script src="<?php echo base_url(); ?>client_assets/pop/jquery-loader.js"></script>
        <!--link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/pop/qunit/qunit/qunit.css" media="screen"-->
        <!--script src="<?php echo base_url(); ?>client_assets/pop/qunit/qunit/qunit.js"></script-->
        <!--link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/pop/remodal.css"-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/pop/remodal-default-theme.css">
        <script src="<?php echo base_url(); ?>client_assets/pop/remodal.js"></script>
        <!--script src="<?php echo base_url(); ?>client_assets/pop/remodal_test.js"></script-->
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

    <!--<body style="/*background: url(<!--?php echo base_url(); ?>client_assets/assets/bg-soil.jpg) repeat top left;*/"-->
	<body style="background: url(<?php echo base_url(); ?>client_assets/assets/bg-soil.jpg) repeat top left;">
        <?php
        if ($this->session->userdata('user_login') == "true") {
            $this->load->view('front_end/header1');
        } else {
            $this->load->view('front_end/header');
        }
        ?>

        <?php
        $uri_page = $this->uri->segment(2);
        if ($uri_page != 'refer') {
            ?>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="    position: relative;
                 top: -252px;
                 width: 100%;
                 z-index: 500;">

                <div class="carousel-inner" role="listbox">
                    <div id="carousel-example-generic81" class="carousel slide" data-ride="carousel" data-interval="false">


                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <?php
// using uri segment we can get url page spesific controller function 
// if index page than different image and if players different 
                                $uri_page = $this->uri->segment(2);
                                if ($uri_page == 'index') {
                                    ?>
                                    <img src="<?php echo base_url(); ?>client_assets/assets/banners/cover1.png" alt="Doddamani residence">
                                    <?php
                                } else if ($uri_page == 'players' || $uri_page == 'login' || $uri_page == 'lost_password') {
                                    ?>
                                    <img src="<?php echo base_url(); ?>client_assets/assets/banners/inner-header.png" alt="Doddamani residence">
                                    <?php
                                } else if ($uri_page == 'register') {
                                    ?>
                                    <img src="<?php echo base_url(); ?>client_assets/assets/banners/inner-header.png" alt="Doddamani residence">
                                    <?php
                                } else if ($uri_page == 'refer') {
                                    ?>
                                    <img src="<?php echo base_url(); ?>client_assets/assets/banners/inner-header.png" alt="Doddamani residence">
                                    <?php
                                } else {
                                    ?>
                                    <img src="<?php echo base_url(); ?>client_assets/assets/banners/inner-header.png" alt="Doddamani residence">
                                    <?php
                                }
                                ?> 
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
            <?php
        }
        ?>
        <div class="content-top"></div>
        <?php $this->load->view($middle); ?>
        <?php
        $this->load->view('front_end/footer');
        ?>
        <script src="<?php echo base_url(); ?>client_assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>client_assets/assets/js/app-min.js"></script>
        <script src="<?php echo base_url(); ?>client_assets/assets/js/functions.js"></script>
        <script src="<?php echo base_url(); ?>client_assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('admin_assets/'); ?>assets/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.datatables').DataTable();
            });
        </script> 
        <div class="remodal" data-remodal-id="send_link" style="border: 3px solid #f5be2a;background:white;">
            <a data-remodal-action="close" class="remodal-close"></a>
            <br>
            <img src="<?php echo base_url(); ?>client_assets/assets/logo1.png" alt="logo">
            <p style="line-height:1.8;font-size:20px;">Password reset link successfully sent to your email...!</p>
        </div>
    </body>

</html>