<?php
session_start();
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
    Please create an RSO the current user will be made the admin by default
</p>
    <form action="createrso.php" method="post" id="createrso_form">
        <p>
            Enter RSO name please:
            <input type = "text" name = "name" placeholder = "Enter RSO name" size = "15" maxlength = "30" required/>
        </p>
        <p>
            Enter RSO Description:
            <textarea name="desc" form="createrso_form">Enter Your Desc Here</textarea>
        </p>
        <p>
            Enter email2:
            <input type = "text" name = "email2" placeholder = "Enter email2" size = "15" maxlength = "30" required/>
        </p>
        <p>
            Enter email3:
            <input type = "text" name = "email3" placeholder = "Enter email3" size = "15" maxlength = "30" required/>
        </p>
        <p>
            Enter email4:
            <input type = "text" name = "email4" placeholder = "Enter email4" size = "15" maxlength = "30" required/>
        </p>
        <p>
            Enter email5:
            <input type = "text" name = "email5" placeholder = "Enter email5" size = "15" maxlength = "30" required/>
        </p>
        <button type = "submit">Create RSO</button>
    </form>

</body>
</html>
