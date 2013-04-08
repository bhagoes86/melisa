<script src="//connect.soundcloud.com/sdk.js"></script>
<script>
    SC.initialize({
        client_id: "938418853596f90572983f377348dc57"
    });
</script>
<div id="putTheWidgetHere"></div>
<script type="text/JavaScript">
    SC.oEmbed("<?php echo $content->file ?>", {color: "ff0066"},  document.getElementById("putTheWidgetHere"));
</script>