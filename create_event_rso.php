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
    //echo $location_id."<br>";
}
$uni = $_SESSION["univ_id"];
$rso_id = $_POST["rso_id"];
$name = $_POST["name"];
$desc = $_POST["desc"];
$time = $_POST["time"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$type = $_POST["type"];
//echo $uni ."<br>".$rso_id."<br>".$name."<br>".$desc."<br>".$time."<br>".$phone."<br>".$email."<br>".$type."<br>";
$query = "INSERT INTO `rso_event`(`rso_event_id`, `location_id`, `univ_id`, `rso_id`, `name`, `description`, `time`, `contact_phone`, `contact_email`, `type`) 
    VALUES ('','.$location_id.','.$uni.','.$rso_id.','$name','$desc','$time','$phone','$email','$type')";

if($dbh->exec($query)){
    echo "You have added an event";
}
else{
    echo "The event date-time and location are the same as another event or the name of the event is already taken";
}


?>