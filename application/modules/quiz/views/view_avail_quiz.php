<?php

foreach($list_quiz as $quiz){
    echo "<a href='".site_url('quiz/gate_avail_quiz/'.$quiz->id_quiz)."' target='_blank'>$quiz->title</a> <br />";
}

?>