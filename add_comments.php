<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 7/16/2017
 * Time: 2:29 PM
 */
if(!isset($_SESSION))
{
    session_start();
}
$dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
$user_id = $_SESSION["user_id"];
$comment = $_POST["comment"];
$event_id = $_POST["event_id"];
$ratting = $_POST["ratting"];
echo $user_id."<br>";
echo $comment."<br>";
echo $event_id."<br>";
echo $ratting."<br>";
$query = "INSERT INTO `comment`(`user_id`, `event_id`, `comment`, `rating`) VALUES ('.$user_id.','.$event_id.','$comment','.$ratting.')";

if($dbh->exec($query)){
    header("location: display_events.php");
}
else{
    echo "Something went wrong";
}