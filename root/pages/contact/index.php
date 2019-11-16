<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id11020831_skillwing";
$categorytable = "category_detail";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
session_start();

if(isset($_SESSION['user_id'])) {
  $userid = $_SESSION['user_id'];
  $user_type = $_SESSION['user_type'];
  $username = $_SESSION['user_name'];
}
else {
  $userid = "";
  $user_type = "";
  $username = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/template.css">
    <script src="https://kit.fontawesome.com/8d0d6b5845.js"></script>
    <title>Contact Us | Skill Wing</title>
</head>
<body>
  <header class="container header mt-2 ">
    <h1 class="logo"><a class="navbar-brand" href="../pages/">Skill Wing</a></h1>
    <ul class="main-nav">
      <li><a class="nav-item nav-link" href="../../pages/">Home</a></li>
      <li><a class="nav-item nav-link" href="../../pages/courses/">Courses</a></li>
      <li><a class="nav-item nav-link" href="../../pages/contact/">Contact Us<span class="sr-only">(current)</span></a></li>
      <li>
        <a class="nav-item btn1 nav-link btn" href="#">
          <span><i class="fas fa-shopping-cart"></i></span> Cart <span id="cartbadge" class="badge badge-light">0</span>
        </a>
      </li>
      <li>
        <?php
          if($userid == "")
            echo "<a class='nav-item nav-link' href='../../pages/signin/'>Login/SignUp</a>";
          else if($user_type == "Student")
            echo "<a class='nav-item nav-link' href='../../pages/student/'>".$username."</a>";
          else if($user_type == "Tutor")
            echo "<a class='nav-item nav-link' href='../../pages/tutor/'>".$username."</a>";
        ?>
      </li>
    </ul>
  </header>

  <div class=" pt-5 mt-5">
    <div class="container d-flex flex-row justify-content-center mt-5" style="background:white; border-radius:10px">
      <div class="d-flex flex-column pt-4 pb-4 align-items-center" >
        <h3>Have any doubts?</h3>
        <p style ="letter-spacing:2px">Feel Free to contact us on:</p>
        <a href="mailto:skillwingofficial@gmail.com" style="color: #FFA500">skillwingofficial@gmail.com</a>
      </div>
    </div>
  </div>



  <footer class="mt-3 mb-3">
    <div class="container">
      <ul class="footer-ul align-items-center">
        <li class="footer-li"><a class="footer-link" href="../../pages/">Home</a></li>
        <li class="footer-li"><a class="footer-link" href="../../pages/courses/">Course</a></li>
        <li class="footer-li"><a class="footer-link" href="../../pages/contact/">Contact</a></li>
      </ul>
      <div class="d-flex">
        <div class="mr-auto ml-auto">
          <a href="mailto:skillwingofficial@gmail.com" style="color: #FFA500">skillwingofficial@gmail.com</a>
        </div>
      </div>
      <div class="d-flex">
        <div class="mr-auto ml-auto">
          Connect Us:
        </div>
      </div>      
      <div class="d-flex flex-row bd-highlight pb-3 justify-content-center align-items-start">
        <div class="mr-3">
          <a class="footer-icon" href="https://www.facebook.com/skillwingofficial" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-facebook-f"></i></a>
        </div>
        <div class="mr-3">
          <a class="footer-icon" href="https://www.instagram.com/skillwingofficial" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-instagram"></i></a>
        </div>
        <div class="mr-3">
          <a class="footer-icon" href="https://www.youtube.com/channel/UCQDpP--OQplVbgy8wXIYlZQ" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-youtube-play"></i></a>
        </div>
      </div>
    </div>
  </footer>
  
    

           
    <script src="https://code.jquery.com/jquery-3.4.1.slim.js"
        integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    
</body>
</html>