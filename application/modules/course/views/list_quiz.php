<!-- <pre><?php //print_r($list_quiz); ?> </pre> -->
<?php if ($list_quiz == null){
    echo "<h3>Saat ini tidak ada kuis yang tersedia untuk kuliah ini ..</h3>";
} else {
    ?>

<table class="striped" id="my-table">
    <tbody>
        <?php foreach ($list_quiz as $quiz) { 
            
            if ($quiz->group_status == 1){
        ?>
            <tr>
                <td><?php echo $quiz->quiz_title; ?> - <?php echo $quiz->group_title ?></td>
                <?php
                if ($this->session->userdata('data_quiz') != '') {
                    if ($group_id == $quiz->id_group) {
                        ?>
                        <td class="center">
                            <a title="Mulai Evaluasi" href="<?php echo site_url('quiz/gate_avail_quiz/' . $quiz->id_group.'/'.$id_course); ?>" target='_blank' id="btn-preview" data-id="<?php echo $quiz->id_group; ?>"><i class="icon-book fg-color-black"></i></a>
                        </td>
                        <?php
                    } else {
                        ?>
                        <td class="center">
                            <a title="Maaf Sudah Ditutup" href="javascript:void(0)" id="btn-preview" data-id="<?php echo $quiz->id_group; ?>"><i class="icon-locked fg-color-red"></i></a>
                        </td>
                        <?php
                    }
                } else {
                    ?>

                <?php
                        if ($quiz->is_attempt == 2){
                            ?>
                            <td class="center">
                                <a title="Maaf Sudah Ditutup" href="javascript:void(0)" id="btn-preview" data-id="<?php echo $quiz->id_group; ?>"><i class="icon-locked fg-color-red"></i></a>
                            </td>

                            <?php
                        }

                        else {
                            ?>
                            <td class="center">
                                <a title="Mulai Evaluasi" href="<?php echo site_url('quiz/gate_avail_quiz/' . $quiz->id_group.'/'.$id_course); ?>" target='_blank' id="btn-preview" data-id="<?php echo $quiz->id_group; ?>"><i class="icon-book fg-color-black"></i></a>
                            </td>
                            <?php
                        }
                ?>

                <?php } ?>
            </tr>
        <?php } 
        }
        ?>
    </tbody>
</table>




    <?php
}

?>
