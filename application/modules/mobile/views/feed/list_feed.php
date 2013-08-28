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
        <div data-role="page" id="page" data-theme="d">
            <!--Header-->
            <div data-role="header" data-position="fixed" data-tap-toggle="false" data-theme='b'>
                <a href="#left-panel" data-ajax="false"><i class='icon-ellipsis-vertical'></i></a>
                <h1>Feed</h1>
                <a href="#left-panel" data-ajax="false"><i class='icon-plus-sign' style="margin-right: 10px;"></i></a>
            </div>
            <!--Panel-->
            <?php echo $this->load->view('panel_left'); ?>
            <!--Content-->
            <div data-role="content">
                <ul data-nativedroid-plugin='cards'>
                    <?php // foreach ($course as $row): ?>
                    <!--<li data-cards-type='traffic' data-cards-traffic-route='{"from":"42.350742,-71.083217","to":"42.353709,-71.053613","type" : "coords"}'>-->
                        <!--<h1><strong><?php // echo $row->course     ?></strong></h1>-->
                    <!--<h2></h2>-->
                    <!--<div><img src="<?php // echo base_url() . 'resource/' . $row->picture     ?>" style="width: 100%;"/></div>-->
                    <!--<a href='#'><i class='icon-screenshot'></i> Navigate</a>-->
                    <!--<p><?php // echo $row->description     ?></p>-->
                    <!--</li>-->
                    <?php // endforeach; ?>
                </ul>
            </div>
        </div>
        <script src="<?php echo base_url() ?>mobileasset/js/nativedroid.script.js"></script>
        <script type="text/javascript">
            $(document).on("pageinit", "#page", function() {
                //name
                $('#user_name').load("<?php echo site_url('mobile/get_name') ?>");
                //swipe left and rights
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
        </script>
    </body>
</html>