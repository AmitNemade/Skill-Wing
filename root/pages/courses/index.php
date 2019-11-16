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
    <link rel="stylesheet" href="../../css/courses.css">
    <link rel="stylesheet" href="../../css/antimanbtn.css">
    <link rel="stylesheet" href="../../css/template.css">
    <script src="https://kit.fontawesome.com/8d0d6b5845.js"></script>

    <title>Categories | SkillWing</title>
</head>
<body>
<header class="container header mt-2 ">
    <h1 class="logo"><a class="navbar-brand" href="../pages/">Skill Wing</a></h1>
    <ul class="main-nav">
      <li><a class="nav-item nav-link" href="../../pages/">Home</a></li>
      <li><a class="nav-item nav-link" href="../../pages/courses/">Courses<span class="sr-only">(current)</span></a></li>
      <li><a class="nav-item nav-link" href="../../pages/contact/">Contact Us</a></li>
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

    <section class="main-body">
        <div class="container">
            <h1 style="text-align: center; padding: 32px 24px">COURSE CATALOG</h1>
        </div>
        <div class="container">
            <input id="search-bar" placeholder="Search" type="text" class="search-bar" onkeyup="sortCourses()">
        </div>
        <div class="container results">

        </div>
        <div class="container-fluid mt-3">
            <div class="d-flex flex-column flex-md-row justify-content-center">
                <div class="col order-1 order-md-1 col-md-3">
                  <div class="side-panel d-none d-md-block">
                    <h6>FILTER BY</h6>
                    <div class="all-category">
                        <a href="#" class="allcategory">ALL CATEGORY</a>
                    </div>
                    <?php
                      $sql_getCategory = "SELECT * FROM `$categorytable` ORDER BY `category_id`";
                      // echo $sql_getCategory;
                      $result = $conn->query($sql_getCategory);
                      
                      $start=1;
                      if($result)
                      {
                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                if($row["subcategory"] == "Main_Category")
                                {
                                  if($start == 0)
                                  {
                                    echo "</div>";          
                                  }
                                  else{
                                    $start = 0;
                                  }
                                  echo "<div class='category'>
                                        <a href='#' class='category'>".$row['main_category']."</a>
                                  ";
                                }
                                else{
                                  echo "<div class='sub-category'>
                                          <a href='#' class='subcategory'>".$row['subcategory']."</a>
                                        </div>
                                  ";
                                }
                                  
                              }
                          }
                          else{
                              echo "0 rows";
                          }
                      }
                      else{
                          echo "Database error";
                      }
                    ?>
                  </div> 
                  
                  <div class="fliter-btn d-block d-md-none">
                    <button type="button" class="btn">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"><title>Group</title>
                          <path d="M6.345 11.5H1A.75.75 0 1 1 1 10h5.345a3.001 3.001 0 0 1 5.81 0H13a.75.75 0 1 1 0 1.5h-.845a3.001 3.001 0 0 1-5.81 0zm-4.5-9a3.001 3.001 0 0 1 5.81 0H13A.75.75 0 1 1 13 4H7.655a3.001 3.001 0 0 1-5.81 0H1a.75.75 0 0 1 0-1.5h.845zM4.75 4.75a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm4.5 7.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                      </svg><span> Filter</span>
                    </button>    
                  </div>
                
                </div>
                </div>
                
                <div class="col order-2 order-md-2 col-md-6">
                    <div class="container search-result">
                        <p class="mb-0">Results <span id="total-result"></span><br><span id="display-result"></span></p>
                    </div>

                    <div class="container" id="courses">
                    

                    </div>
                </div>
            </div>
        </div>
        
    </section>
















    <footer class="mt-3 mb-3">
    <div class="container">
      <ul class="footer-ul">
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
            <i class="fab fa-youtube"></i></a>
        </div>
      </div>
    </div>
  </footer>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
    <script src="../../scripts/courses.js"></script>

</body>
</html>