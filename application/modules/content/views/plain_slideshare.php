<script type="text/javascript" src="<?php echo base_url() ?>asset/slideshare/swfobject.js"></script>    
<script type="text/javascript">
    var flashMovie;

    //Load the flash player. Properties for the player can be changed here.
    //    function loadPlayer() {
        //    }
        //allowScriptAccess from other domains
        var params = { allowScriptAccess: "always" };
        var atts = { id: "player" };

        //doc: The path of the file to be used
        //startSlide: The number of the slide to start from
        //rel: Whether to show a screen with related slideshows at the end or not. 0 means false and 1 is true..
        var flashvars = { doc : "<?php print_r($presentation['3']) ?>", startSlide : 1, rel : 0 };

        //Generate the embed SWF file
        swfobject.embedSWF("http://static.slidesharecdn.com/swf/ssplayer2.swf", "player", "100%", "100%", "8", null, flashvars, params, atts);

        //Get a reference to the player
        flashMovie = document.getElementById("player");

    //Jump to the appropriate slide
    function jumpTo(){
        flashMovie.jumpTo(parseInt(document.getElementById("slidenumber").value));
    }

    //Update the slide number in the field for the same
    function updateSlideNumber(){
        document.getElementById("slidenumber").value = flashMovie.getCurrentSlide();
    }
</script>
<div onload="loadPlayer();" id="player" style="background: #e5e5e5;">You need Flash player 8+ and JavaScript enabled to view this video.</div>