<?php foreach ($presentation as $rowpresentation): ?>
    <li data-cards-type='text'>
        <h2><i class="icon-film"></i> Video Content</h2>
        <p><?php echo $rowpresentation->title ?></p>
    </li>
<?php endforeach; ?>