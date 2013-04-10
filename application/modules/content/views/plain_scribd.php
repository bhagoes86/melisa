<script type='text/javascript' src='http://www.scribd.com/javascripts/scribd_api.js'></script>
<div id='embedded_doc'></div>
<?php
$media = analyze_media($content->file);
$trace = explode('^^^', $media);
?>
<script type="text/javascript">
        var scribd_doc = scribd.Document.getDoc(<?php echo $trace[1]; ?>, '1fhdiwc4twksqw4h6ezzo');
        var onDocReady = function(e){
            // scribd_doc.api.setPage(3);
        }
        scribd_doc.addParam('jsapi_version', 2);
        scribd_doc.addEventListener('docReady', onDocReady);
        scribd_doc.write('embedded_doc');
</script>