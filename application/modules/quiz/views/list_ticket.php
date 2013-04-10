<?php if ($list_avail_ticket > 0) {?>

    <?php

    $temp = 1;
    for ($i = 1; $i <= $list_avail_ticket / 4; $i++) {
        
        ?>

        <table border="1">
            <tr>
                
        
        <?php
        for ($j = 1; $j <= 4; $j++) {
            ?>
                <td  style="padding:5px 5px;word-wrap: break-word;table-layout: fixed;width:160px">
            <?php
           echo "<h4>Sakola.net - Tiket Try Out</h4><hr >";
           echo "course :".$list_ticket[$temp]->course_id."Kuliah Open Source<br><br>";
           echo "quiz :".$list_ticket[$temp]->quiz_id."Kuis Linux Dasar<br><br>";
           echo "group :".$list_ticket[$temp]->group_id."Kelas A<br><br>";
           echo "<h3>".$list_ticket[$temp]->password."</h3>";

           ?>
                </td>
            <?php
           $temp ++;
        }
        ?>
            </tr>
        </table>
        <br /><br />
        <?php
    }

    ?>


<?php } else { ?>
<h1>Tidak ada tiket untuk Try Out ...</h1>
<?php }?>




