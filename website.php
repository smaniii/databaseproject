<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        if(isset($_SESSION["user_id"])) {
            header('Location: http://localhost/db_project/slideshow.php');
        }
    ?>
    <meta charset="UTF-8">
    <title>eventplanner</title></title>

    <link rel = "stylesheet" href = "main.css">

</head>
<body>

<form method="post" action="login.php">
    <div class = "Log In">
        <h2>Log In</h2>
        <p>
            School Email:
            <input type = "text" name = "email" placeholder = "Enter email" size = "15" maxlength = "30" required/>
        </p>
        <p>
            Password:
            <input type = "password" name = "password" size = "15" maxlength = "30" required/>
        </p>
        <br><button type = "submit">Log In</button>
    </div>
</form>


<form action = "register.php" method="post">
    <div class = "Create New Account">
    <h2>Create Account</h2>
    <p>
        School Email:
        <input type = "text" name = "email" placeholder = "Enter email" size = "15" maxlength = "30" required>
    </p>
     <p>
         School Name:
         <select name="uni">
             <?php
                 $dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');

                 foreach($dbh->query("SELECT `univ_id`, `name` FROM `university`") as $row) {
                    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                }
             ?>
         </select>
     </p>
    <p>
        Password:
        <input type = "password" name = "password" size = "15" maxlength = "30" required/>
    </p>

    <p>
        Verify Password:
        <input type = "password" name = "password" size = "15" maxlength = "30" required/>
    </p>

    <br><button type = "submit">Create Account</button>
    </div>
</form>

</body>
</html>