<div id="twitter-div"></div>
<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url; ?>">Tweet</a>
<div class="g-plus" data-action="share" data-href="<?php echo $url; ?>"></div>
<div id="fb-root"></div>
<div class="fb-like" data-href="<?php echo $url; ?>" data-send="true" data-width="450" data-show-faces="true"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=265204106944411";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
        !function(d,s,id){
        var js,fjs=d.getElementsByTagName(s)[0];
        if(!d.getElementById(id)){js=d.createElement(s);
            js.id=id;js.src="//platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js,fjs);
        }
    }
    (document,"script","twitter-wjs");
</script>
