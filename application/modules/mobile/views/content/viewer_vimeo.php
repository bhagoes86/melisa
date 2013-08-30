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
                var num_podcast = <?php echo $num_podcast ?>;
                var loaded_podcast = 0;
                $("button#more_button").tap(function() {
                    loaded_podcast += 10;
                    $.get("<?php echo site_url('mobile/get_podcast') ?>/" + loaded_podcast, function(data) {
                        $("#main_content").append(data);
                    });
                    if (loaded_podcast >= num_podcast - 10)
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
        <div data-role="page" id="page" data-theme="d">
            <!--Header-->
            <div data-role="header" data-tap-toggle="false" data-theme='b'>
                <a href="#left-panel" data-ajax="false"><i class='icon-ellipsis-vertical'></i></a>
                <h1 style="position: absolute;">Viewer</h1>
                <a href="javascript:void(0)" id="form-submit-activator"><i class='icon-plus-sign' style="margin-right: 10px;"></i></a>
            </div>
            <!--Panel-->
            <?php echo $this->load->view('panel_left'); ?>
            <!--Content-->
            <div data-role="content">
                <?php
                $media = analyze_media($content->file);
                $trace = explode('^^^', $media);
                echo eksternal_viewer_youtube($trace[1]);
                ?>
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