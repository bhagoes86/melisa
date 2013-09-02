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
    </head>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/slideshare/swfobject.js"></script>    
    <script type="text/javascript">
        var flashMovie;

        //Load the flash player. Properties for the player can be changed here.
        function loadPlayer() {
            //allowScriptAccess from other domains
            var params = {allowScriptAccess: "always"};
            var atts = {id: "player"};

            //doc: The path of the file to be used
            //startSlide: The number of the slide to start from
            //rel: Whether to show a screen with related slideshows at the end or not. 0 means false and 1 is true..
            var flashvars = {doc: "<?php print_r($presentation['3']) ?>", startSlide: 1, rel: 0};

            //Generate the embed SWF file
            swfobject.embedSWF("http://static.slidesharecdn.com/swf/ssplayer2.swf", "player", "598", "480", "8", null, flashvars, params, atts);

            //Get a reference to the player
            flashMovie = document.getElementById("player");
        }

        //Jump to the appropriate slide
        function jumpTo() {
            flashMovie.jumpTo(parseInt(document.getElementById("slidenumber").value));
        }

        //Update the slide number in the field for the same
        function updateSlideNumber() {
            document.getElementById("slidenumber").value = flashMovie.getCurrentSlide();
        }
    </script>
    <body onload="loadPlayer();">
        <div data-role="page" id="page" data-theme="d">
            <!--Header-->
            <div data-role="header" data-tap-toggle="false" data-theme='b'>
                <a href="#left-panel" data-ajax="false"><i class='icon-ellipsis-vertical'></i></a>
                <h1 style="position: absolute;">Viewer</h1>
                <a href="#right-panel" id="action-option"><i class='icon-ellipsis-horizontal' style="margin-right: 10px;"></i></a>
            </div>
            <!--Panel Left-->
            <?php echo $this->load->view('panel_left'); ?>
            <!--Panel Right-->
            <?php echo $this->load->view('mobile/content/panel_detail_youtube'); ?>
            <!--Content-->
            <div data-role="content">
                <iframe src="http://www.slideshare.net/slideshow/embed_code/<?php echo $slideshare->slideshow_id ?>" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:5px;width: 100%;height: 300px;" allowfullscreen webkitallowfullscreen mozallowfullscreen> </iframe> 
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