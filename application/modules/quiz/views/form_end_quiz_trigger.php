<script type="text/javascript">
      <?php

            if ($quiz_result->status == 0){
      ?>
          $('#end-quiz').load('<?php echo site_url('quiz/quiz_submit_wtro')."/".$tiket_quiz."/".$quiz_id."/".$course_id; ?>');
           $('#content-quiz').hide();
      <?php
            }
            else {
      ?>
          $('#end-quiz').empty();
          $('#content-quiz').empty();
          
      <?php
            }
      ?>
      
      
</script>