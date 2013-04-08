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
                <td width="170">
            <?php
           echo "course :".$list_ticket[$temp]->course_id."<br>";
           echo "quiz :".$list_ticket[$temp]->quiz_id."<br>";
           echo "group :".$list_ticket[$temp]->group_id."<br>";
           echo "<br>";
           echo "password : <br />".$list_ticket[$temp]->password;

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




