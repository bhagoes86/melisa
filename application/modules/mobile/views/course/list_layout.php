<?php foreach ($course as $rowcourse): ?>
    <li data-cards-type='text'>
        <h2><?php echo $rowcourse->first_name ?> - <?php echo nicetime(strtotime($rowcourse->date)) ?></h2>
        <div><img src="<?php echo base_url() . 'resource/' . $rowcourse->picture ?>" style="width: 100%;"/></div>
        <p style="align: justify;"><div style="max-width: 100%;text-align: justify;"><?php echo $rowcourse->course ?></div></p>
    </li>
<?php endforeach; ?>