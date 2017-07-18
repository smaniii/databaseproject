<?php
    session_start();
?>
<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 7/13/2017
 * Time: 12:07 PM
 */
try {
    $user_id = $_SESSION["user_id"];
    $uni_id = $_SESSION["univ_id"];
    $rso_name = $_POST["name"];
    $rso_desc = $_POST["desc"];
    $user_id_admin = $user_id;
    $email2 = $_POST["email2"];
    $email3 = $_POST["email3"];
    $email4 = $_POST["email4"];
    $email5 = $_POST["email5"];
    $dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
    foreach ($dbh->query("SELECT `user_id` FROM `user` WHERE `email` = '$email2'") as $row) {
        $user_id_2 = $row[0];
    }
    foreach ($dbh->query("SELECT `user_id` FROM `user` WHERE `email` = '$email3'") as $row) {
        $user_id_3 = $row[0];
    }
    foreach ($dbh->query("SELECT `user_id` FROM `user` WHERE `email` = '$email4'") as $row) {
        $user_id_4 = $row[0];
    }
    foreach ($dbh->query("SELECT `user_id` FROM `user` WHERE `email` = '$email5'") as $row) {
        $user_id_5 = $row[0];
    }
    $query = "INSERT INTO `rso` (`rso_id`, `univ_id`, `name`, `description`) VALUES (NULL, '.$uni_id.', '$rso_name','$rso_desc')";
    $dbh->exec($query);
    foreach ($dbh->query("SELECT `rso_id` FROM `rso`") as $row) {
        $rso_id = $row[0];
    }
    //echo $rso_id;
    $is_admin = 1;
    $is_not_admin = 0;
    $query = "INSERT INTO `roster` (`user_id`, `rso_id`, `is_admin`) VALUES ('.$user_id.', '.$rso_id.','.$is_admin.')";
    $dbh->exec($query);
    $query = "INSERT INTO `roster` (`user_id`, `rso_id`, `is_admin`) VALUES ('.$user_id_2.', '.$rso_id.', '.$is_not_admin.')";
    $dbh->exec($query);
    $query = "INSERT INTO `roster` (`user_id`, `rso_id`, `is_admin`) VALUES ('.$user_id_3.', '.$rso_id.', '.$is_not_admin.')";
    $dbh->exec($query);
    $query = "INSERT INTO `roster` (`user_id`, `rso_id`, `is_admin`) VALUES ('.$user_id_4.', '.$rso_id.', '.$is_not_admin.')";
    $dbh->exec($query);
    $query = "INSERT INTO `roster` (`user_id`, `rso_id`, `is_admin`) VALUES ('.$user_id_5.', '.$rso_id.', '.$is_not_admin.')";

    if($dbh->exec($query)){
        echo "your rso has been added thank you";
        header("location: test.php");
    }
    else {
        echo "your rso name is already taken please type in something else";
    }

}
catch(PDOException $e)
{
    echo $query . "<br>" . $e->getMessage();
    echo '<br><br>';
    echo "please go back and fix the problem";
}

$dbh = null;
?>