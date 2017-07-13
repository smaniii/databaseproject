<?php
session_start();
/**
 * Created by PhpStorm.
 * User: s
 * Date: 7/13/2017
 * Time: 2:16 PM
 */?>
<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE html>
<html>
<body>
<p>
    Join an already made RSO
</p>
<form action="jRSO.php" method="post" >
    Select RSO to Join:
    <select name="rso">
        <?php
        $school_id = $_SESSION["univ_id"];
        $dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
        $i = 0;
        foreach($dbh->query("SELECT `name`, `rso_id` FROM `rso` WHERE `univ_id` = '$school_id'") as $row) {
            echo '<option value="'.$row[1].'">'.$row[0].'</option>';
        }
        ?>
    </select>
    <button type = "submit">Join</button>
</form>

</body>
</html>

