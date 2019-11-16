<?php
session_start();

$message = "You are logged out form this current session";
echo "<script type='text/javascript'>alert('$message');</script>";  


// remove all session variables
session_unset();

// destroy the session
session_destroy();
$uri="../signin/";
header('Location:'.$uri);

?>