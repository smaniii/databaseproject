<!DOCTYPE html>
<html>
<body>

<?php
    $dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');

    foreach($dbh->query("SELECT `univ_id`, `name` FROM `university` WHERE name = 'UCF'") as $row) {
        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
        echo '<br><br>';
    }
?>

</body>
</html>
