<?php
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && isset($_SESSION['user_name'])) {
  $userid = $_SESSION['user_id'];
  $user_type = $_SESSION['user_type'];
  $user_name = $_SESSION['user_name'];

  if(isset($_GET['cid']))
  {
      $cid = $_GET['cid'];
  }
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "id11020831_skillwing";
  $subscription_table = "student_subscriptions";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  // echo "Connected successfully";
  
  $sql_insert = "INSERT INTO `$subscription_table` VALUES('$userid','$cid')";
  
  if ($conn->query($sql_insert) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $uri="../courses/viewcourse.php?cid=$cid";
  header('Location:'.$uri);
}
else{
    $uri="../signin/";
    header('Location:'.$uri);
}

?>