<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo $site->header . ' ' . $site->caption ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/jquerymobile.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/jquerymobile.nativedroid.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
        <link rel="stylesheet" href="<?php echo base_url() ?>mobileasset/css/jquerymobile.nativedroid.color.green.css" id='jQMnDColor' />
        <script src="<?php echo base_url() ?>mobileasset/js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url() ?>mobileasset/js/jquery.mobile-1.3.2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var num_feed = <?php echo $num_feed ?>;
                var loaded_feed = 0;
                $("button#more_button").tap(function() {
                    loaded_feed += 10;
                    $.get("<?php echo site_url('mobile/get_feed') ?>/" + loaded_feed, function(data) {
                        $("#main_content").append(data);
                    });
                    if (loaded_feed >= num_feed - 10)
                    {
                        $("button#more_button").hide();
                        $("#more_container").hide();
                    }
                });
                return false;
            });
        </script>
    </head>
    <body>
        <div data-role="page" id="page" data-theme="d" style="background-image: url('./mobileasset/images/background.png')" >
            <!--Header-->
            <div data-role="header" data-tap-toggle="false" data-theme='b'>
                <a href="#left-panel" data-ajax="false"><i class='icon-home'></i></a>
                <h1 style="position: absolute;"><?php echo $site->header ?></h1>
                <a href="<?php echo site_url('mobile/fan_page') ?>" data-ajax="false"><i class='icon-thumbs-up' style="margin-right: 10px;"></i></a>
            </div>
            <!--Content-->
            <div data-role="content">               
                <ul  data-nativedroid-plugin='cards'>
                    <li data-cards-type='text'>
                        <h1><?php echo $site->header ?></h1>
                        <h2><?php echo $site->caption ?></h2>
                        <iframe style="width: 100%;margin-top: 10px;" src="http://www.youtube.com/embed/eW3gMGqcZQc" frameborder="0" allowfullscreen></iframe>
                    </li>
                    <li data-cards-type='text'>
                        <form id="form-container" action="<?php echo site_url('mobile/login') ?>" method="POST" data-ajax="false">
                            <h2 style="padding: 0px 7px 0px 7px;">Welcome, Please Login :D</h2>
                            <fieldset class="ui-grid-solo" data-theme="b" style="padding: 0px 1px 0px 0px;">
                                <input name="username" type="text" id="username" value="" style="width:99%;border:1px solid rgb(184, 184, 184);padding-left: 5px;" placeholder="Username"/>
                            </fieldset>
                            <fieldset class="ui-grid-solo" data-theme="b" style="padding: 0px 1px 0px 0px;">
                                <input name="password" type="password" id="password" value="" style="width:99%;border:1px solid rgb(184, 184, 184);padding-left: 5px;" placeholder="Password"/>
                            </fieldset>
                            <fieldset class="ui-grid-solo">
                                <button type="submit" data-theme="a" style="background:rgb(0,0,0);">Login</button>
                            </fieldset>
                        </form>                
                    </li>
                    <li data-cards-type='text'>
                        <form id="signup" method="POST" accept-charset="utf-8" data-aja="false">
                            <h2 style="padding: 0px 7px 0px 7px;">Register New Account</h2>
                            <fieldset class="ui-grid-solo" data-theme="b" style="padding: 0px 1px 0px 0px;">
                                <input name="fullname" type="text" id="regfullname" value="" style="width:99%;border:1px solid rgb(184, 184, 184);padding-left: 5px;" placeholder="Username"/>
                            </fieldset>
                            <fieldset class="ui-grid-solo" data-theme="b" style="padding: 0px 1px 0px 0px;">
                                <input name="emails" type="email" id="regemails" value="" style="width:99%;border:1px solid rgb(184, 184, 184);padding-left: 5px;" placeholder="Email"/>
                            </fieldset>
                            <fieldset class="ui-grid-solo" data-theme="b" style="padding: 0px 1px 0px 0px;">
                                <input name="passwords" type="password" id="regpasswords" value="" style="width:99%;border:1px solid rgb(184, 184, 184);padding-left: 5px;" placeholder="Password"/>
                            </fieldset>
                            <fieldset class="ui-grid-solo" data-theme="b" style="padding: 0px 1px 0px 0px;">
                                <div style="border: 1px solid #ccc;margin: 0px 0px 0px 5px;width: 98%;height: 50px;">
                                    <select name="gender" style="padding-top: 0px;">
                                        <option value="1">Men</option>
                                        <option value="2">Women</option>
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="ui-grid-a">
                                <div class="ui-block-a"><button type="reset" data-theme="b" style="background:rgb(0,0,0);">Clear</button></div>
                                <div class="ui-block-b"><button type="submit" data-theme="b" style="background:rgb(0,0,0);">Register</button></div>
                            </fieldset>
                        </form>                
                    </li>
                </ul>
            </div>
        </div>
        <script src="<?php echo base_url() ?>mobileasset/js/nativedroid.script.js"></script>
        <script type="text/javascript">
            $(document).on("pageinit", "#page", function() {
                $(document).on("swipeleft swiperight", "#page", function(e) {
                    if ($.mobile.activePage.jqmData("panel") !== "open") {
                        if (e.type === "swipeleft") {
                            $("#right-panel").panel("open");
                        } else if (e.type === "swiperight") {
                            $("#left-panel").panel("open");
                        }
                    }
                });
            });
            $('form#signup').submit(function() {
                var fullname = $('#regfullname').val();
                var emails = $('#regemails').val();
                var passwords = $('#regpasswords').val();
                var status = 0;
                if (fullname == "" || emails == "" || passwords == "") {
                    //tampil message harus diisi semua fieldnya
                    alert('All Field Needed')
                    return false;

                }

                if (passwords.length < 8) {
                    //tampil message password dan retype mesti sama
                    alert('Password 8 Character Minimum')
                    return false;
                }

                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('authz/registrasi'); ?>",
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                    },
                    error: function(data) {
                        alert(data)
                    }
                });
                return false;
            });
        </script>
    </body>
</html>