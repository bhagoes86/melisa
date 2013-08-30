<?php foreach ($feed as $rowfeed): ?>
    <li data-cards-type='text'>
        <h2><?php echo $rowfeed->first_name . ' ' . $rowfeed->last_name ?> - <?php echo nicetime(strtotime($rowfeed->date)) ?></h2>
        <!--<div><img src="<?php // echo base_url() . 'resource/' . $row->picture                                                               ?>" style="width: 100%;"/></div>-->
        <p><div><?php echo word_wrap(nl2br(auto_link($rowfeed->message))) ?></div></p>
    </li>
<?php endforeach; ?>