<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 7/13/2017
 * Time: 2:28 PM
 */
    $rso = $_POST["rso"];
    $user = $_SESSION["user_id"];
    $dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
    $query = "INSERT INTO `roster` (`user_id`, `rso_id`, `is_admin`) VALUES ('.$user.', '.$rso.', '0')";
    if($dbh->exec($query)){
        echo "You have joined the RSO";
    }
    else{
        echo "You either are part of this RSO and can't join it";
    }
?>