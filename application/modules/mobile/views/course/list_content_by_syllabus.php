<?php foreach ($content as $rowcontent): ?>
    <li data-cards-type='text'>
        <h2><?php echo $rowcontent->title ?></h2>
        <p style="align: justify;"><div><?php echo $rowcontent->description ?></div></p>
    </li>
<?php endforeach; ?>