<!DOCTYPE HTML>
<html>
    <head>
        <title>E-Office</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- FontAwesome - http://fortawesome.github.io/Font-Awesome/ -->
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/font-awesome.min.css" />
        <!-- jQueryMobileCSS - original without styling -->
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/jquerymobile.css" />
        <!-- nativeDroid core CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/jquerymobile.nativedroid.css" />
        <!-- nativeDroid: Light/Dark -->
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/jquerymobile.nativedroid.dark.css"  id='jQMnDTheme' />
        <!-- nativeDroid: Color Schemes -->
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/jquerymobile.nativedroid.color.green.css" id='jQMnDColor' />
        <!-- jQuery / jQueryMobile Scripts -->
        <script src="<?php echo base_url() ?>mobileasset/js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url() ?>mobileasset/js/jquery.mobile-1.3.2.min.js"></script>
    </head>
    <body>
        <div data-role="page" data-theme='b'>

            <div data-role="content">                   
                <!--Home Screen-->
                <div data-nativedroid-plugin="homescreen" data-nativedroid-background="http://farm9.staticflickr.com/8457/8064313210_507341f269_z.jpg">

                    <!--Slide 1-->
                    <div data-nativedroid-role='screenslide'>  

                        <div data-nativedroid-role='widget' 
                             data-nativedroid-widget-type="clock"
                             data-nativedroid-widget-clock-lang="en"
                             data-nativedroid-widget-clock-format="short"
                             data-nativedroid-widget-width='2'
                             data-nativedroid-widget-height='1' 
                             data-nativedroid-widget-offset-top='1' 
                             data-nativedroid-widget-offset-left='1'>                            
                        </div>

                        <div data-nativedroid-role='widget'
                             data-nativedroid-widget-type='icon' 
                             data-nativedroid-widget-icon-type='text'
                             data-nativedroid-widget-icon-class='icon-signin'
                             data-nativedroid-widget-icon-title='Login'
                             data-nativedroid-widget-icon-link='<?php echo site_url('mobile/form_login') ?>'
                             data-nativedroid-widget-width='1'
                             data-nativedroid-widget-height='1'
                             data-nativedroid-widget-offset-top='4'
                             data-nativedroid-widget-offset-left='0'>
                        </div>

                        <div data-nativedroid-role='widget'
                             data-nativedroid-widget-type='icon' 
                             data-nativedroid-widget-icon-type='text'
                             data-nativedroid-widget-icon-class='icon-book'
                             data-nativedroid-widget-icon-title='Course'
                             data-nativedroid-widget-icon-link='<?php echo site_url('mobile/list_course_new') ?>'
                             data-nativedroid-widget-width='1'
                             data-nativedroid-widget-height='1'
                             data-nativedroid-widget-offset-top='4'
                             data-nativedroid-widget-offset-left='1'>
                        </div>

                        <div data-nativedroid-role='widget'
                             data-nativedroid-widget-type='icon' 
                             data-nativedroid-widget-icon-type='text'
                             data-nativedroid-widget-icon-class='icon-picture'
                             data-nativedroid-widget-icon-title='Library'
                             data-nativedroid-widget-icon-link='<?php echo site_url('agenda/list_content_new') ?>'
                             data-nativedroid-widget-width='1'
                             data-nativedroid-widget-height='1'
                             data-nativedroid-widget-offset-top='4'
                             data-nativedroid-widget-offset-left='2'>
                        </div>  

                        <div data-nativedroid-role='widget'
                             data-nativedroid-widget-type='icon' 
                             data-nativedroid-widget-icon-type='text'
                             data-nativedroid-widget-icon-class='icon-bar-chart'
                             data-nativedroid-widget-icon-title='Statistik'
                             data-nativedroid-widget-icon-link='<?php echo site_url('mobile/statistic') ?>'
                             data-nativedroid-widget-width='1'
                             data-nativedroid-widget-height='1'
                             data-nativedroid-widget-offset-top='4'
                             data-nativedroid-widget-offset-left='3'>
                        </div>

                    </div>

                </div>				
            </div>

        </div>
        <script src="<?php echo base_url() ?>mobileasset/js/nativedroid.script.js"></script>
    </body>
</html>