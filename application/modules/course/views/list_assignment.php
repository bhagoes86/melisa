<?php if ($list_assignment == null) { ?>
    <p style="margin-top: 0px; padding-top: 0px;color: rgb(94,94,94);font-size: 14px;">
        Saat ini tidak ada tugas yang tersedia untuk kuliah ini
    </p>
<?php } else { ?>
    <table class="striped" id="my-table">
        <tbody>
            <?php
            foreach ($list_assignment as $assignment) {?>
            <tr>
                <td><?php echo $assignment->assignment_title; ?> - <?php echo $assignment->group_title ?></td>
                
                                <?php
                            

                                $today = getdate();
                                $waktu1 = date_parse($assignment->start_time);
                                $waktu2 = date_parse($assignment->end_time);

                                $temp_interval1 = strtotime($today['year'] . '-' . $today['mon'] . '-' . $today['mday'] . ' ' . $today['hours'] . ':' . $today['minutes'] . ':00') - strtotime($waktu1['year'] . '-' . $waktu1['month'] . '-' . $waktu1['day'] . ' ' . $waktu1['hour'] . ':' . $waktu1['minute'] . ':00');
                                $temp_interval2 = strtotime($today['year'] . '-' . $today['mon'] . '-' . $today['mday'] . ' ' . $today['hours'] . ':' . $today['minutes'] . ':00') - strtotime($waktu2['year'] . '-' . $waktu2['month'] . '-' . $waktu2['day'] . ' ' . $waktu2['hour'] . ':' . $waktu2['minute'] . ':00');

                                if ($temp_interval1 > 0 && $temp_interval2 < 0) {
                                    ?>
                                    <td class="center">
                                        <a title="Mulai Evaluasi" href="<?php echo site_url('assignment/show_form_submit_assignment_student/' . $id_course . '/' . $assignment->group_assignment_id. '/' . $assignment->group_id); ?>" target='_blank' id="btn-preview" data-id="<?php echo $assignment->group_id; ?>"><i class="icon-book fg-color-black"></i></a>
                                    </td>
                                    <?php
                                } else {
                                    ?>
                                    <td class="center">
                                        <a title="Sudah Ditutup" href="javascript:void(0)" id="btn-preview" data-id="<?php echo $assignment->group_id; ?>"><i class="icon-locked fg-color-red"></i></a>
                                    </td>

                                    <?php
                                }
                            ?>
            </tr>
                    <?php
                
            }
            ?>
        </tbody>
    </table>
<?php } ?>
