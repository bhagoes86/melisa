<!DOCTYPE HTML>
<html>
    <head>
        <title>nativeDroid - Theme for jQuery Mobile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/jquerymobile.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/jquerymobile.nativedroid.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/jquerymobile.nativedroid.color.green.css" id='jQMnDColor' />
        <script src="<?php echo base_url() ?>mobileasset/js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url() ?>mobileasset/js/jquery.mobile-1.3.2.min.js"></script>
    </head>
    <body>
        <div data-role="page" data-theme='b'>
            <!--Header-->
            <div data-role="header" data-position="fixed" data-tap-toggle="false" data-theme='b'>
                <a href="<?php echo site_url('mobile/') ?>" data-ajax="false"><i class='icon-ellipsis-vertical'></i></a>
                <h1>Login</h1>
            </div>
            <!--Content-->
            <div data-role="content">
                <form action="<?php echo site_url('mobile/login') ?>" method="POST" data-ajax="false">
                    <ul data-role="listview" data-inset="true">
                        <li data-role="devider"></li>
                        <li data-role="fieldcontain">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" value="" data-clear-btn="true" placeholder="">
                        </li>
                        <li data-role="fieldcontain">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" value="" data-clear-btn="true" placeholder="">
                        </li>
                        <li>
                            <fieldset class="ui-grid-a">
                                <div class="ui-block-a"><button type="submit" data-theme="b">Batal</button></div>
                                <div class="ui-block-b"><button type="submit" data-theme="b">Login</button></div>
                            </fieldset>
                        </li>
                    </ul>
                </form>
            </div>
        </div>        
        <script src="<?php echo base_url() ?>mobileasset/js/nativedroid.script.js"></script>
    </body>
</html>