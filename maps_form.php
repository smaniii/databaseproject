<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 7/16/2017
 * Time: 4:52 PM
 */?>
<!DOCTYPE html>
<html>
<body>

<form action="maps.php" method="post">
    <select name="loname">
        <?php
        $dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');

        foreach($dbh->query("SELECT `name` FROM `location`") as $row) {
            echo '<option value="'.$row[0].'">'.$row[0].'</option>';
            echo '<br><br>';
        }
        ?>
    </select>
    <button type = "submit">See map</button>
</form>

</body>
</html>

