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
        <script type="text/javascript">
            $(document).ready(function() {
                var num_course = <?php echo $num_course ?>;
                var loaded_course = 0;
                $("button#more_button").tap(function() {
                    loaded_course += 10;
                    $.get("<?php echo site_url('mobile/get_course') ?>/" + loaded_course, function(data) {
                        $("#main_content").append(data);
                    });
                    if (loaded_course >= num_course - 10)
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
                <h1 style="position: absolute;">Course Detail</h1>
                <a href="#right-panel"><i class='icon-ellipsis-horizontal' style="margin-right: 10px;"></i></a>
            </div>
            <!--Left Panel-->
            <?php echo $this->load->view('panel_left'); ?>
            <!--Right Panel-->
            <?php $detail['id_course'] = $course->id_course; ?>
            <?php echo $this->load->view('mobile/course/panel_detail_course', $detail); ?>
            <!--Content-->
            <div data-role="content">
                <ul data-nativedroid-plugin='cards' id="main_content">
                    <fieldset class="ui-grid-solo" style="padding: 6px 7px 6px 6px;">
                        <div class="ui-block-a"><button type="reset" data-theme="a" style="background:rgb(0,0,0);"><i class="icon-check"></i> Subscribe</button></div>
                    </fieldset>
                    <li data-cards-type='text'>
                        <img src="<?php echo base_url() . 'resource' . '/' . $course->picture ?>" style="width: 100%;"/>
                        <h1><?php echo $course->course; ?></h1>
                    </li>
                    <li data-cards-type='text'>
                        <p style="align: justify;"><div style="max-width: 100%;"><?php echo nl2br($course->description) ?></div></p>
                    </li>
                    <li data-cards-type='text'>
                        <p style="align: justify;"><div style="max-width: 100%;"><?php echo nl2br($course->pemdasar) ?></div></p>
                    </li>
                    <li data-cards-type='text'>
                        <p style="align: justify;"><div style="max-width: 100%;"><?php echo nl2br($course->dipelajari) ?></div></p>
                    </li>
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