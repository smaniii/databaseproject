<?php
if(!isset($_SESSION))
{
    session_start();
}
/**
 * Created by PhpStorm.
 * User: s
 * Date: 7/13/2017
 * Time: 12:31 PM
 */
?>
<?php
    echo "Events that you can go to" . "<br>";
    echo "Events open to all people". "<br>";
?>
<?php
    $dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');

    foreach($dbh->query("SELECT `name`, `description`, `time`, `contact_phone`,`contact_email`, `type`, `access`, `pending_status` , `event_id` , location_id FROM `event`") as $row) {
        if($row[7] == 1 && $row[6] == 0){
            echo "<div>";
            echo "name: ". $row[0]. "<br>";
            echo "description :".$row[1]. "<br>";
            echo "time: ".$row[2]. "<br>";
            echo "contact_phone: ".$row[3]. "<br>";
            echo "contact_email: ".$row[4]. "<br>";
            echo "type: ".$row[5]. "<br>";
            echo "</div>";
            echo "<br>";
            foreach($dbh->query("SELECT `location_id`,`name`
            FROM `location`") as $row3) {
                if($row3[0] == $row[9]){
                    echo "location: ";
                    echo " $row3[1]";
                    echo "<br>";
                }
            }
            echo "<br>";
            echo "comments and ratings for this event";
            echo "<br>";
            $dbh2 = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
            foreach($dbh->query("SELECT `comment`, `rating` , `event_id`
            FROM `comment`") as $row3) {
                if($row3[2] == $row[8]){
                    echo "the comment and rating is: ";
                    echo "$row3[0] ". " $row3[1]";
                    echo "<br>";
                }
            }


            echo '<form action = "add_comments.php" method="post" id = "comment_uni_only1">';
            echo '<textarea name="comment" form="comment_uni_only1">Enter Your Comment Here</textarea>';
            echo '<select name = "ratting">
                    <option value = "1">1 star</option>
                    <option value = "2">2 star</option>
                    <option value = "3">3 star</option>
                    <option value = "4">4 star</option>
                    <option value = "5">5 star</option>
            </select>';
            echo "<input type=hidden name=event_id value=$row[8]>";
            echo '<button type = "submit">Add comment</button>';
            echo '</form>';
        }
    }
    echo "Events Only avaliable to your uni". "<br>";
    foreach($dbh->query("SELECT `name`,`univ_id`, `description`, `time`, `contact_phone`,`contact_email`, `type`, `access`, `pending_status`, `event_id`, `location_id` FROM `event`") as $row) {
        $uni = $_SESSION["univ_id"];
        if($row[1] == $uni && $row[7] == 1 && $row[8] == 1){
            echo "<div>";
            echo "name: ". $row[0]. "<br>";
            echo "description :".$row[2]. "<br>";
            echo "time: ".$row[3]. "<br>";
            echo "contact_phone: ".$row[4]. "<br>";
            echo "contact_email: ".$row[5]. "<br>";
            echo "type: ".$row[6]. "<br>";
            echo "</div>";
            echo "<br>";
            foreach($dbh->query("SELECT `location_id`,`name`
            FROM `location`") as $row3) {
                if($row3[0] == $row[10]){
                    echo "location: ";
                    echo " $row3[1]";
                    echo "<br>";
                }
            }
            echo "comments and ratings for this event";
            echo "<br>";
            foreach($dbh->query("SELECT `comment`, `rating`, `event_id`
            FROM `comment`") as $row3) {
                if($row3[2] == $row[9]){
                    echo "the comment and rating is: ";
                    echo "$row3[0] ". " $row3[1]";
                    echo "<br>";
                }

            }
            foreach($dbh->query("SELECT `name`
            FROM `location`") as $row3) {
                if($row3[0] == $row[9]){
                    echo "location: ";
                    echo " $row3[0]";
                    echo "<br>";
                }
            }

            echo"Add your comment and ratting to this event";
            echo "<br>";
            echo '<form action = "add_comments.php" method="post" id = "comment_uni_only">';
            echo '<textarea name="comment" form="comment_uni_only">Enter Your Comment Here</textarea>';
            echo '<select name = "ratting">
                    <option value = "1">1 star</option>
                    <option value = "2">2 star</option>
                    <option value = "3">3 star</option>
                    <option value = "4">4 star</option>
                    <option value = "5">5 star</option>
            </select>';
            echo "<input type=hidden name=event_id value=$row[9]>";
            echo '<button type = "submit">Add comment</button>';
            echo '</form>';
        }
    }
    echo "Events Created by your rso". "<br>";
    foreach($dbh->query("SELECT `name`,`rso_id`, `description`, `time`, `contact_phone`,`contact_email`, `type`, `rso_event_id`, `location_id` FROM `rso_event`") as $row) {
        $user_id = $_SESSION["user_id"];
        $dbh2 = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
        foreach($dbh2->query("SELECT `user_id`,`rso_id` FROM `roster`") as $row2) {
            if($row2[0] == $user_id && $row2[1] == $row[1]) {
                echo "<div>";
                echo "name: " . $row[0] . "<br>";
                echo "description :" . $row[2] . "<br>";
                echo "time: " . $row[3] . "<br>";
                echo "contact_phone: " . $row[4] . "<br>";
                echo "contact_email: " . $row[5] . "<br>";
                echo "type: " . $row[6] . "<br>";
                echo "</div>";
                echo "<br>";
                foreach($dbh->query("SELECT `location_id`,`name`
            FROM `location`") as $row3) {
                    if($row3[0] == $row[8]){
                        echo "location: ";
                        echo " $row3[1]";
                        echo "<br>";
                    }
                }
                echo "comments and ratings for this event";
                echo "<br>";
                foreach($dbh->query("SELECT `comment`, `rating`, `rso_event_id`
            FROM `rso_comment`") as $row3) {
                    if($row3[2] == $row[7]){
                        echo "the comment and rating is: ";
                        echo "$row3[0] ". " $row3[1]";
                        echo "<br>";
                    }

                }

                echo"Add your comment and ratting to this event";
                echo "<br>";
                $i=0;
                echo '<form action = "add_comments_rso.php" method="post" id = "comment_rso_only">';
                echo '<input type = "text" name = "comment" placeholder = "Enter comment" size = "500" maxlength = "500" required>';
                echo '<select name = "ratting">
                    <option value = "1">1 star</option>
                    <option value = "2">2 star</option>
                    <option value = "3">3 star</option>
                    <option value = "4">4 star</option>
                    <option value = "5">5 star</option>
            </select>';
                echo "<input type=hidden name=event_id value=$row[7]>";
                echo '<button type = "submit">Add comment</button>';
                echo '</form>';

            }
        }
    }
?>