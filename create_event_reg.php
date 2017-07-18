<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 7/13/2017
 * Time: 3:47 PM
 */
    if(!isset($_SESSION))
    {
        session_start();
    }
    $dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
    $location = $_POST["location"];
    foreach($dbh->query("SELECT `location_id` FROM `location` WHERE `name` = '$location'") as $row) {
        $location_id = $row[0];
    }
    $uni = $_SESSION["univ_id"];
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $time = $_POST["time"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $type = $_POST["type"];
    $access = $_POST["access"];

    $query = "INSERT INTO `event`(`event_id`, `location_id`, `univ_id`, `name`, `description`, `time`, `contact_phone`, `contact_email`, `type`, `access`, `pending_status`) 
    VALUES ('','.$location_id.','.$uni.','$name','$desc','$time','$phone','$email','$type','$access','0')";

    if($dbh->exec($query)){
        echo "You have added an event";
        header("location: test.php");
    }
    else{
        echo "The event date-time and location are the same";
    }
    

?>