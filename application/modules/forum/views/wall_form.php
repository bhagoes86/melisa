<fieldset class="feed" style="margin-top: 5px;padding-top: 0px;padding-right: 0px;margin-right: 6px;">
    <legend>Hi, Wanna Share Something ?</legend><br/>
    <form action="#" method="post">
        <div class="input-control text">
            <input type="text" id="feedtext" placeholder=""/>
        </div>
        <div class="input-control textarea hide">
            <input type="file" id="postimage" class="hide" />
            <input type="url" id="posturl" class="hide" />
            <textarea name="feedpost" id="feedpost" placeholder="Wanna Share Something ?"></textarea>
            <div class="toolbar place-left">
                <button title="Upload image" class="btn-shortcut fg-color-white bg-color-blueDark" id="image">
                    <i class="icon-pictures"></i>
                </button>
                <button title="Tautan Youtube" class="btn-shortcut fg-color-white bg-color-red" id="youtube">
                    <i class="icon-youtube"></i>
                </button>
                <button title="Tautan Vimeo" class="btn-shortcut fg-color-white bg-color-blue" id="vimeo">
                    <i class="icon-vimeo"></i>
                </button>
                <button title="Tautan Sideshare" class="btn-shortcut fg-color-white bg-color-orange" id="slideshare">
                    <i class="icon-file-powerpoint"></i>
                </button>
                <button title="Tautan Scribd" class="btn-shortcut fg-color-white bg-color-purple" id="scribd">
                    <i class="icon-file-pdf"></i>
                </button>
                <button title="Tautan Docstoc" class="btn-shortcut fg-color-white bg-color-pink" id="docstoc">
                    <i class="icon-file-word"></i>
                </button>
                <button title="Tautan SoundCloud" class="btn-shortcut fg-color-white bg-color-orangeDark" id="soundcloud">
                    <i class="icon-soundcloud"></i>
                </button>
            </div>
            <div class="toolbar place-right" style="padding-right: 0px;">
                <input id="cancelpost" type="button" value="BATAL"/>
                <input id="cancelpost" class="bg-color-green" type="submit" value="BAGI" style="margin-right: 0px;"/>
            </div>
            <div class="clearfix"></div>
        </div>
    </form>
</fieldset>