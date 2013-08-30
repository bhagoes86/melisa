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
        <script src="<?php echo base_url() ?>mobileasset/flowplayer-5.4.3/flowplayer.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/flowplayer/skin/minimalist.css" />
        <style type="text/css">
            .flowplayer { background-color: #222; background-size: cover; }
            .flowplayer .fp-controls { background-color: rgba(0, 0, 0, 0.4)}
            .flowplayer .fp-timeline { background-color: rgba(0, 0, 0, 0.5)}
            .flowplayer .fp-progress { background-color: rgba(219, 0, 0, 1)}
            .flowplayer .fp-buffer { background-color: rgba(249, 249, 249, 1)}
        </style>
    </head>
    <body>
        <div data-role="page" id="page" data-theme="d">
            <!--Header-->
            <div data-role="header" data-tap-toggle="false" data-theme='b'>
                <a href="#left-panel" data-ajax="false"><i class='icon-ellipsis-vertical'></i></a>
                <h1 style="position: absolute;">Viewer</h1>
                <a href="#right-panel" id="form-submit-activator"><i class='icon-ellipsis-horizontal' style="margin-right: 10px;"></i></a>
            </div>
            <!--Panel-->
            <?php echo $this->load->view('panel_left'); ?>
            <!--Content-->
            <div data-role="content">
                <script type="text/javascript">
                    $(function() {
                        $("#viewer_video").flowplayer();
                    });
                </script>
                <div id="viewer_video" alt="<?php echo $content->id_content ?>" data-swf="<?php echo base_url() ?>mobileasset/flowplayer-5.4.3/flowplayer.swf" class="flowplayer play-button" style="height:50%;width: 100%;padding: 0px;boder: 0px;" data-ratio="0.5625">
                    <video alt="<?php echo $content->id_content ?>">
                        <?php if ($content->ext == '.mp4') { ?> 
                            <source type="video/mp4" src="<?php echo base_url() . 'resource/' . $content->id_content . '.mp4'; ?>"/>
                        <?php } elseif ($content->ext == '.MP4') { ?>
                            <source type="video/mp4" src="<?php echo base_url() . 'resource/' . $content->id_content . '.MP4'; ?>"/>
                        <?php } elseif ($content->ext == '.FLV') { ?>
                            <source type="video/flv" src="<?php echo base_url() . 'resource/' . $content->id_content . '.FLV'; ?>"/>
                        <?php } elseif ($content->ext == '.flv') { ?>
                            <source type="video/flv" src="<?php echo base_url() . 'resource/' . $content->id_content . '.flv'; ?>"/>
                        <?php } elseif ($content->ext == '.MOV') { ?>
                            <source type="video/flv" src="<?php echo base_url() . 'resource/' . $content->id_content . '.flv'; ?>"/>
                        <?php } elseif ($content->ext == '.mov') { ?>
                            <source type="video/flv" src="<?php echo base_url() . 'resource/' . $content->id_content . '.flv'; ?>"/>
                        <?php } ?>
                    </video>        
                </div>
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