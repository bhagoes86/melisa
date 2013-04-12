<!-- <pre><?php //print_r($list_quiz); ?> </pre> -->
<?php if ($list_quiz == null){
    ?>
    
    <p style="margin-top: 0px; padding-top: 0px;color: rgb(94,94,94);font-size: 14px;">
        Saat ini tidak ada kuis yang tersedia untuk kuliah ini
    </p>
        
    <?php
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
                            <a title="Maaf Sedang Ditutup" href="javascript:void(0)" id="btn-preview" data-id="<?php echo $quiz->id_group; ?>"><i class="icon-locked fg-color-red"></i></a>
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
                            
                            $today = getdate();
                            $waktu1 = date_parse($quiz->start_time);
                            $waktu2 = date_parse($quiz->end_time);

                            $temp_interval1 = strtotime($today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':00') - strtotime($waktu1['year'].'-'.$waktu1['month'].'-'.$waktu1['day'].' '.$waktu1['hour'].':'.$waktu1['minute'].':00');
                            $temp_interval2 = strtotime($today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':00') - strtotime($waktu2['year'].'-'.$waktu2['month'].'-'.$waktu2['day'].' '.$waktu2['hour'].':'.$waktu2['minute'].':00');

                            if ($temp_interval1 > 0 && $temp_interval2 < 0){
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
