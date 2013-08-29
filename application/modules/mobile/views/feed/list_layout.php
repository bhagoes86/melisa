<?php foreach ($feed as $rowfeed): ?>
    <li data-cards-type='text'>
        <h2><?php echo $rowfeed->first_name . ' ' . $rowfeed->last_name ?> - <?php echo nicetime(strtotime($rowfeed->date)) ?></h2>
        <!--<div><img src="<?php // echo base_url() . 'resource/' . $row->picture                                                              ?>" style="width: 100%;"/></div>-->
        <p style="align: justify;"><div style="max-width: 100%;text-align: justify;"><?php echo $rowfeed->message ?></div></p>
        <a href='#'><i class='icon-screenshot'></i> Navigate</a>
    </li>
<?php endforeach; ?>