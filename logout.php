<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 7/10/2017
 * Time: 2:38 PM
 */
session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy();
header("location: website.php");
?>