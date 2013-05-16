<?php if ($type == 1) { ?>
    <div class="bg-color-green" style="padding: 1px 1px 1px 10px;margin-bottom: 10px;">
        <h3>
        <?php } elseif ($type == 2) { ?>
            <div class="bg-color-orangeDark" style="padding: 1px 1px 1px 10px;margin-bottom: 10px;">
                <h3>
                <?php } elseif ($type == 3) { ?>
                    <div class="bg-color-red" style="padding: 1px 1px 1px 10px;margin-bottom: 10px;">
                        <h3>
                        <?php } ?>
                        <a class="fg-color-white">
                            <?php if ($type == 1) { ?>
                                <i class="icon-calendar"></i>
                                Info Terbaru
                            <?php } elseif ($type == 2) { ?>
                                <i class="icon-clipboard"></i>
                                Beasiswa
                            <?php } elseif ($type == 3) { ?>
                                <i class="icon-equalizer"></i>
                                Update Sistem
                            <?php } ?>

                        </a>
                    </h3>
                </div>
                <?php foreach ($content as $row): ?>
                    <div style="display: block;margin-top: 0px;padding-top: 0px;">
                        <i class="icon-play-alt" style="width: 24px;position: absolute;"></i> 
                        <div style="margin-left: 25px;">
                            <a href="<?php echo site_url('news' . '/' . $row->id_news . '/' . $row->type); ?>" style="color: #004444;"><?php echo $row->title; ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
