<?php
try{
    $dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $email = htmlentities($_POST["email"]);
    $pass = $_POST["password"];
    session_start();
    foreach ($dbh->query("SELECT `user_id` , `univ_id` , `pass`, `email` FROM `user`") as $row){
        if($row[3] == $email && $row[2] == $pass) {
            $_SESSION["user_id"] = $row[0];
            $_SESSION["univ_id"] = $row[1];
        }
    }
    //print_r($_SESSION);
    if(!empty($_SESSION["user_id"])) {
        echo "You have been logged in";
        //echo $_SESSION["user_id"];
        echo '<a href="logout.php">logout</a>';
    }
    else {
        echo "invalid username or pass";
    }
}
catch(PDOException $e)
{
    echo $query . "<br>" . $e->getMessage();
    echo '<br><br>';
    echo "invalid username or password";
}

$dbh = null;
//header('Location: website.php');
?>