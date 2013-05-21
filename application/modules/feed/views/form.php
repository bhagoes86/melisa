<fieldset>
    <legend>What's up today?</legend>
    <form action="#" method="post">
        <div class="input-control text">
            <input type="text" id="feedtext" placeholder="what's your update?" />
        </div>
        <div class="input-control textarea hide">
            <input type="file" id="postimage" class="hide" />
            <input type="url" id="posturl" class="hide" />
            <textarea name="feedpost" id="feedpost" placeholder="what's your update?"></textarea>
            <div class="toolbar place-left">
                <button title="upload image" class="btn-shortcut fg-color-white bg-color-blueDark" id="image">
                    <i class="icon-pictures"></i></button>
                <button title="post Youtube video" class="btn-shortcut fg-color-white bg-color-red" id="youtube">
                    <i class="icon-youtube"></i></button>
                <button title="post Vimeo video" class="btn-shortcut fg-color-white bg-color-blue" id="vimeo">
                    <i class="icon-vimeo"></i></button>
                <button title="post Sideshare document" class="btn-shortcut fg-color-white bg-color-orange" id="slideshare">
                    <i class="icon-file-powerpoint"></i></button>
                <button title="post Scribd document" class="btn-shortcut fg-color-white bg-color-purple" id="scribd">
                    <i class="icon-file-pdf"></i></button>
                <button title="post Docstoc document" class="btn-shortcut fg-color-white bg-color-pink" id="docstoc">
                    <i class="icon-file-word"></i></button>
                <button title="post SoundCloud stream" class="btn-shortcut fg-color-white bg-color-orangeDark" id="soundcloud">
                    <i class="icon-soundcloud"></i></button>
            </div>
            <div class="toolbar place-right">
                <input id="cancelpost" class="bg-color-yellow" type="submit" value="Post" />
                <input id="cancelpost" type="button" value="Batal" />
            </div>
            <div class="clearfix"></div>
        </div>
    </form>
</fieldset><br/> 