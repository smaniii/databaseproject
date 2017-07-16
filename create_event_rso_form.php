<?php
if(!isset($_SESSION))
{
    session_start();
}
/**
 * Created by PhpStorm.
 * User: s
 * Date: 7/13/2017
 * Time: 12:31 PM
 */
?>
<!DOCTYPE html>
<html>
<body>
<p>
    Create an RSO event. Only the admin may create an RSO event.
</p>
<form action="create_event_rso.php" method="post" id="create_event_reg_form">
    <p>
        Enter location name please:
        <input type = "text" name = "location" placeholder = "location" size = "15" maxlength = "30" required/>
    </p>
    <p>
        Enter Event name:
        <input type = "text" name = "name" placeholder = "Event name" size = "15" maxlength = "30" required/>
    </p>
    <p>
        Enter Event Description:
        <textarea name="desc" form="create_event_reg_form">Enter Your Desc Here</textarea>
    </p>
    <p>
        Enter Time Stamp
        <input type="datetime-local" name="time" required>
    </p>
    <p>
        Enter contact phone number
        <input type = "text" name = "phone" placeholder = "contact phone #" size = "15" maxlength = "30" required/>
    </p>
    <p>
        Enter contact email
        <input type = "text" name = "email" placeholder = "Enter email" size = "15" maxlength = "30" required/>
    </p>
    <p>
        Enter type of event
        <input type = "text" name = "type" placeholder = "Enter type" size = "15" maxlength = "30" required/>
    </p>
    Select RSO ID
    <select name="rso_id">
        <?php
        $dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
        $dbh2 = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
        foreach($dbh->query("SELECT `rso_id` , `user_id` FROM `roster` WHERE `is_admin` = 1") as $row) {
            if($row[1] == $_SESSION["user_id"]){
                foreach ($dbh2->query("SELECT `rso_id` , `name` FROM `rso` WHERE `rso_id` = $row[0]") as  $row2) {
                    echo '<option value="' . $row2[0] . '">' . $row2[1] . '</option>';
                }
            }
        }
        ?>
    </select>

    <button type = "submit">Create Event</button>
</form>

</body>
</html>
