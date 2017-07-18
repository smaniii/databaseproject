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
$name = $_POST["name"];
$lat = $_POST["lat"];
$lon = $_POST["lon"];
$lat = 0-$lat;
$dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
$query = "INSERT INTO `location` (`location_id`, `name`, `latitude`, `longitude`) VALUES ('','$name', '$lon', '$lat')";
if($dbh->exec($query)){
    echo "You have added a location";
    header("location: test.php");
}
else{
    echo "The location is already added to the db";
    header("location: add_location_form.php");

}
?>