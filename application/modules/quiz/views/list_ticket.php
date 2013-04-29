<?php if ($list_avail_ticket > 0) {?>

    <?php

    $temp = 1;
    for ($i = 1; $i <= $list_avail_ticket / 5; $i++) {
        
        ?>

        <table border="1">
            <tr>
                
        
        <?php
        for ($j = 1; $j <= 4; $j++) {
            ?>
                <td  style="padding:5px 5px;word-wrap: break-word;table-layout: fixed;width:160px">
            <?php
           echo "<h4>Tiket Try Out</h4><hr >";
           echo "<b>course</b> :".$list_ticket[$temp]->course_id."Kuliah Open Source<br>";
           echo "<b>quiz</b> :".$list_ticket[$temp]->quiz_id."Kuis Linux Dasar<br>";
           echo "<b>group</b> :".$list_ticket[$temp]->group_id."Kelas A<br>";
           echo "<br>";
           echo "<b>Mulai </b> : 10-04-2013 11:42:00 <br />";
           echo "<b>Selesai </b> : 10-04-2013 11:42:00 <br />";
           
           echo "<br>";
           echo "<h3>".$list_ticket[$temp]->password."</h3>";

           ?>
                </td>
            <?php
           $temp ++;
        }
        ?>
            </tr>
        </table>
        <br />
        <?php
    }

    ?>


<?php } else { ?>
<h1>Tidak ada tiket untuk Try Out ...</h1>
<?php }?>




