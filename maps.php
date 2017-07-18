
<!DOCTYPE html>
<html>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 7/16/2017
 * Time: 3:45 PM
 */
$name = $_POST["loname"];
$dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
$i = 0;
foreach($dbh->query("SELECT  `latitude`,longitude FROM `location` WHERE `name` = '$name'") as $row) {

    echo $name;
    echo": ";
    echo "<p id='lat'>$row[0]</p>";
    echo "<p id='lon'>$row[1]</p>";
}
?>
<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
    function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(document.getElementById("lat").innerHTML,document.getElementById("lon").innerHTML),
            zoom:15,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCsLghbSDkMpohovycONY3GUHlrwe9XnY&callback=myMap"></script>

 <a href = "test.php">Dashboard</a>

</body>
</html>

