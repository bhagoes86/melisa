<!DOCTYPE html> 
<html> 
    <?php $this->load->view('mobile/head'); ?>
    <body> 
        <div data-role="page">
            <!--header-->
            <div data-role="header">
                <a href="<?php echo site_url('mobile') ?>" data-icon="home">Depan</a>
                <h1>Video</h1>
                <a href="javascript:void(0)" data-icon="grid">Loker</a>
                <?php $this->load->view('mobile/header'); ?>
            </div>
            <!--content-->
            <div data-role="content">
                <ul data-role="listview" data-filter="true"> 
                    <?php foreach ($video as $row): ?>
                        <?php if ($row->type == 0) { ?><!--Video-->
                            <li>
                                <a href="<?php echo site_url('mobile/video_view' . '/' . $row->id_content) ?>"  >
                                    <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="height: 118px;"/>
                                    <h3><?php echo $row->title; ?></h3> 
                                    <p><?php echo $row->description; ?></p> 
                                </a>
                            </li>
                        <?php } elseif ($row->type == 2) { ?><!--Youtube-->
                            <?php
                            $media = analyze_media($row->file);
                            $extract_id = explode('^^^', $media);
                            ?>
                            <li><a href="<?php echo site_url('mobile/youtube' . '/' . $row->id_content) ?>"  >
                                    <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="height: 118px">
                                    <h3><?php echo $row->title; ?></h3> 
                                    <p><?php echo $row->description; ?></p> 
                                </a></li>
                        <?php } elseif ($row->type == 3) { ?><!--Vimeo-->
                            ;)
                        <?php } ?>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </body>
</html>