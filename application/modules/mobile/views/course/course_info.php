<li data-cards-type='text'>
    <img src="<?php echo base_url() . 'resource' . '/' . $course->picture ?>" style="width: 100%;"/>
    <h1><?php echo $course->course; ?></h1>
</li>
<li data-cards-type='text'>
    <p style="align: justify;"><div style="max-width: 100%;"><?php echo nl2br($course->description) ?></div></p>
</li>
<li data-cards-type='text'>
    <p style="align: justify;"><div style="max-width: 100%;"><?php echo nl2br($course->pemdasar) ?></div></p>
</li>
<li data-cards-type='text'>
    <p style="align: justify;"><div style="max-width: 100%;"><?php echo nl2br($course->dipelajari) ?></div></p>
</li>