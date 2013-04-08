<div data-role="navbar" >
    <ul>
        <?php if ($page == 'topic') { ?>
            <li><a href="<?php echo site_url('mobile/topic') ?>" class="ui-btn-active" rel="external">Kuliah</a></li>
            <li><a href="<?php echo site_url('mobile/faculty') ?>"  rel="external">Kampus</a></li>
            <li><a href="<?php echo site_url('mobile/video') ?>"  rel="external">Video</a></li>
            <li><a href="#" rel="external">Dokumen</a></li>
        <?php } else if ($page == 'faculty') { ?>
            <li><a href="<?php echo site_url('mobile/topic') ?>" rel="external">Kuliah</a></li>
            <li><a href="<?php echo site_url('mobile/faculty') ?>" class="ui-btn-active"  rel="external">Kampus</a></li>
            <li><a href="<?php echo site_url('mobile/video') ?>"  rel="external">Video</a></li>
            <li><a href="#" rel="external">Dokumen</a></li>
        <?php } else if ($page == 'video') { ?>
            <li><a href="<?php echo site_url('mobile/topic') ?>" rel="external">Kuliah</a></li>
            <li><a href="<?php echo site_url('mobile/faculty') ?>"   rel="external">Kampus</a></li>
            <li><a href="<?php echo site_url('mobile/video') ?>" class="ui-btn-active" rel="external">Video</a></li>
            <li><a href="javascript:void(0)" rel="external">Dokumen</a></li>
        <?php } else if ($page == 'none') { ?>
            <li><a href="<?php echo site_url('mobile/topic') ?>" rel="external">Kuliah</a></li>
            <li><a href="<?php echo site_url('mobile/faculty') ?>"   rel="external">Kampus</a></li>
            <li><a href="<?php echo site_url('mobile/video') ?>" rel="external">Video</a></li>
            <li><a href="javascript:void(0)" rel="external">Dokumen</a></li>
        <?php } ?>
    </ul>
</div>