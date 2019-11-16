<?php
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
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/template.css">
  <link rel="stylesheet" href="../css/magicscroll.css">
  <script src="https://kit.fontawesome.com/8d0d6b5845.js"></script>
  <title>Home | Skill Wing</title>
</head>

<body>
  <header class="container header mt-2 ">
    <h1 class="logo"><a class="navbar-brand" href="../pages/">Skill Wing</a></h1>
    <ul class="main-nav">
      <li><a class="nav-item nav-link" href="../pages/">Home<span class="sr-only">(current)</span></a></li>
      <li><a class="nav-item nav-link" href="../pages/courses/">Courses</a></li>
      <li><a class="nav-item nav-link" href="../pages/contact/">Contact Us</a></li>
      <li>
        <a class="nav-item btn1 nav-link btn" href="#">
          <span><i class="fas fa-shopping-cart"></i></span> Cart <span id="cartbadge" class="badge badge-light">0</span>
        </a>
      </li>
      <li>
        <?php
          if($userid == "")
            echo "<a class='nav-item nav-link' href='../pages/signin/'>Login/SignUp</a>";
          else if($user_type == "Student")
            echo "<a class='nav-item nav-link' href='../pages/student/'>".$username."</a>";
          else if($user_type == "Tutor")
            echo "<a class='nav-item nav-link' href='../pages/tutor/'>".$username."</a>";
        ?>
      </li>
    </ul>
  </header>

  <!--  Home, About, Courses, Contact, Login/Sign Up,Cart. -->
  <section class="main-body">
    <div class="container">
      <div class="welcome-text my-3 ">
        <h1 class="font-1"><i class="border-bottom border-dark px-2">Welcome to <span class="font-2" >Skill Wing</span></i></h1>
  
      </div>
    </div>
  
    <div class="container py-4">
      <div class="bestseller">
        <h3 class="font1 ">Best Seller</h3>
        <div class=" py-2 container d-flex" style="background: #cecdcd;">
          <div class="MagicScroll mx-0 my-0" style=" background: #cecdcd; max-height: 300px" data-z-index="1"
            style="z-index: -1" data-options="step: 0; speed: 10000;">
            <div class="card mx-2 my-5" style="width: 18rem;">
              <img width="650px" height="200px" style="background-size: contain" src="../images/javaimage.jpeg"
                class="card-img-top" alt="...">
              <div class="card-body">
                <a href="#" target="_blank" rel="noopener noreferrer" class="stretched-link" style="color: #000000">
                  <h6 class="card-title">Complete java MasterClass</h6>
                </a>
                <p class="card-text" style="font-size: 12px; text-align: center; ">1.Learn Full Java Course from Beginner
                  to advanced</p>
              </div>
            </div>
            <div class="card mx-2 my-5" style="width: 18rem;">
              <img width="650px" height="200px" style="background-size: contain" src="../images/javaimage.jpeg"
                class="card-img-top" alt="...">
              <div class="card-body">
                <a href="#" target="_blank" rel="noopener noreferrer" class="stretched-link" style="color: #000000">
                  <h6 class="card-title">Complete java MasterClass</h6>
                </a>
                <p class="card-text" style="font-size: 12px">Learn Full Java Course from Beginner to advanced</p>
              </div>
            </div>
            <div class="card mx-2 my-5" style="width: 18rem;">
              <img width="650px" height="200px" style="background-size: contain" src="../images/javaimage.jpeg"
                class="card-img-top" alt="...">
              <div class="card-body">
                <a href="#" target="_blank" rel="noopener noreferrer" class="stretched-link" style="color: #000000">
                  <h6 class="card-title">Complete java MasterClass</h6>
                </a>
                <p class="card-text" style="font-size: 12px">Learn Full Java Course from Beginner to advanced</p>
              </div>
            </div>
            <div class="card mx-2 my-5" style="width: 18rem;">
              <img width="650px" height="200px" style="background-size: contain" src="../images/javaimage.jpeg"
                class="card-img-top" alt="...">
              <div class="card-body">
                <a href="#" target="_blank" rel="noopener noreferrer" class="stretched-link" style="color: #000000">
                  <h6 class="card-title">Complete java MasterClass</h6>
                </a>
                <p class="card-text" style="font-size: 12px">Learn Full Java Course from Beginner to advanced</p>
              </div>
            </div>
            <div class="card mx-2 my-5" style="width: 18rem;">
              <img width="650px" height="200px" style="background-size: contain" src="../images/javaimage.jpeg"
                class="card-img-top" alt="...">
              <div class="card-body">
                <a href="#" target="_blank" rel="noopener noreferrer" class="stretched-link" style="color: #000000">
                  <h6 class="card-title">Complete java MasterClass</h6>
                </a>
                <p class="card-text" style="font-size: 12px">Learn Full Java Course from Beginner to advanced</p>
              </div>
            </div>
            <div class="card mx-2 my-5" style="width: 18rem;">
              <img width="650px" height="200px" style="background-size: contain" src="../images/javaimage.jpeg"
                class="card-img-top" alt="...">
              <div class="card-body">
                <a href="#" target="_blank" rel="noopener noreferrer" class="stretched-link" style="color: #000000">
                  <h6 class="card-title">Complete java MasterClass</h6>
                </a>
                <p class="card-text" style="font-size: 12px">Learn Full Java Course from Beginner to advanced</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  
  
  </section>

  <footer class="mt-3 mb-3">
    <div class="container">
      <ul class="footer-ul">
        <li class="footer-li"><a class="footer-link" href="../pages/">Home</a></li>
        <li class="footer-li"><a class="footer-link" href="../pages/courses/">Course</a></li>
        <li class="footer-li"><a class="footer-link" href="../pages/contact/">Contact</a></li>
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
            <i class="fab fa-youtube"></i></a>
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

  <script src="../scripts/index.js"></script>
  <script src="../scripts/magicscroll.js"></script>

  <script>
    $(document).on("ready",function(){
      if($("a").attr("href", "http://www.magictoolbox.com/magicscroll/"))
          this.$("a").css("display","none");
    });// $("div.MagicScroll div").css("display", "none");


  </script>

</body>

</html>