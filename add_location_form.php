<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 7/13/2017
 * Time: 3:55 PM
 */
if(!isset($_SESSION))
{
    session_start();
}
?>
<form action="add_location.php" method="post" >
    <p>
    Type in name of the location:
    <input type = "text" name = "name" placeholder = "Enter location name" size = "15" maxlength = "30" required/>
    </p>
    <p>
    Type in location longitude degree North:
    <input type = "text" name = "lon" placeholder = "Enter location longitude" size = "15" maxlength = "30" required type="number" step="0.01"/>
    </p>
    <p>
    Enter location latitude degree West:
    <input type = "text" name = "lat" placeholder = "Enter location latitude" size = "15" maxlength = "30" required type="number" step="0.01"/>
    </p>
    <button type = "submit">Add location</button>
</form>
