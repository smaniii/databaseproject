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
    Please create a public or private event. This event must be approved by the super admin.
</p>
<form action="create_event_reg.php" method="post" id="create_event_reg_form">
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

    <select name = "access">
        <option value = "0">Public</option>
        <option value = "1">Private</option>
    </select>

    <button type = "submit">Create Event</button>
</form>

</body>
</html>
