
<?php if (count($list_avail_quiz_course_group) > 0) {?>


<?php foreach($list_quiz_course_group as $row):?>
<?php
                        if ($row->qg_status == 1){
                            ?>
                            <a title="masih aktif di kuliah ini" href="javascript:void(0)">
                                <i class="icon-unlocked fg-color-pink"></i>
                            </a>
                    <?php
                        }
                        else {
                            ?>
                            <a title="sudah dinonaktifkan dari kuliah ini" href="javascript:void(0)">
                                <i class="icon-locked fg-color-pink"></i>
                            </a>
                            <?php
                        }
                    ?>


                            <?php echo $row->group_title  ?>

            <a title="Pilih Ini" href="javascript:void(0)" id="btn-choose-result"
                       data-id-course="<?php echo $row->id_course; ?>"
                       data-id-quiz="<?php echo $row->id_quiz; ?>"
                       data-id-group="<?php echo $row->id_group; ?>"
                    >
                        <i class="icon-arrow-right fg-color-pink"></i>
                    </a>
<br />
<?php endforeach;?>

<?php } else {?>


                <h2>Tidak ada orang yang ikut quiz ini....</h2>
            
<?php } ?>


