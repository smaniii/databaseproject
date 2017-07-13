<?php session_start(); ?>
<?php
try{
        $dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $email = htmlentities($_POST["email"]);
        $pass = $_POST["password"];
        $uni = $_POST["uni"];
        $query = "INSERT INTO `user` (`user_id`, `univ_id`, `pass`, `email`) VALUES (NULL, '.$uni.', '$pass','$email')";
        $dbh->exec($query);
        echo "you have been added to the db";
        echo "you are now logged in";
        foreach ($dbh->query("SELECT `user_id` , `univ_id` , `pass`, `email` FROM `user`") as $row){
                $_SESSION["user_id"] = $row[0];
                $_SESSION["univ_id"] = $row[1];

        }
        //echo $_SESSION["user_id"];
        //echo $_SESSION["univ_id"];
        echo '<a href="logout.php">logout</a>';
    }
    catch(PDOException $e)
    {
        echo $query . "<br>" . $e->getMessage();
        echo '<br><br>';
        echo "please go back and fix the problem";
    }

    $dbh = null;
    header('Location: slideshow.php');
?>