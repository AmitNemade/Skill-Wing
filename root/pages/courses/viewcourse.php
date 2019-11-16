<?php
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && isset($_SESSION['user_name'])) {
  $userid = $_SESSION['user_id'];
  $user_type = $_SESSION['user_type'];
  $user_name = $_SESSION['user_name'];
}
else{
  $userid = "";
  $user_type = "";
  $user_name = "";
}

if(isset($_GET['viewcourse'])){
  $c_id = $_GET['viewcourse'];
}
if(isset($_GET['cid'])){
  $c_id = $_GET['cid'];
}
if(isset($_GET['lid'])){
  $l_id = $_GET['lid'];
}
else{
  $l_id = 1;
}


// 0  no login
// 1  student
// 11 student with subscription
// 12 student without subscription
// 2  tutor
// 21 tutor's own course
// 22 other tutor's course
$status = -1;


// include('../pages/db.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id11020831_skillwing";
$usertable = "user_details";
$subscription_table = "student_subscriptions";
$tutor_courses = "tutor_courses";
$video_details = "video_details";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";




/***************CHECK STATUS ******************/

if($userid == ""){
  $status = 0;
}
else if($user_type == "Student"){
  $status = 1;

  $sql_subscription = "SELECT * FROM `$subscription_table` WHERE `user_id` = $userid AND `course_id` = $c_id";
  $result = $conn->query($sql_subscription);

  if($result)
  {
    if ($result->num_rows > 0) {
      // output data of each row
      $status = 11;
    }
    else{
      $status = 12;
    }
  }
  else{
    echo "Database Error";
  }
}
else if($user_type == "Tutor"){
  $status = 2;

  $sql_tutorcourses = "SELECT * FROM `$tutor_courses` WHERE `tutor_id` = $userid AND `course_id` = $c_id";
  $result = $conn->query($sql_tutorcourses);

  if($result)
  {
    if ($result->num_rows > 0) {
      // output data of each row
      $status = 21;
    }
    else{
      $status = 22;
    }
  }
  else{
    echo "Database Error";
  }
}



echo "<br>status: ".$status;






$sql_lectures = "SELECT `video_id`, `lecture_no`, `lecture_name`,`video_path` FROM `video_details` WHERE `course_id` = $c_id AND `lecture_no`=$l_id";
// echo $sql_lectures;
$result_lectures = $conn->query($sql_lectures);

if ($result_lectures->num_rows > 0) {
    // output data of each row
    while($row = $result_lectures->fetch_assoc()) {
        $link = $row['video_path'];
    }
} else {
    echo "0 results";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/viewcourse.css">
    <link rel="stylesheet" href="../../css/template.css">
    
    <!-- <link rel="stylesheet" href="../css/plyr.css"> -->
    <script src="https://kit.fontawesome.com/8d0d6b5845.js"></script>

    <link href="https://vjs.zencdn.net/7.6.5/video-js.css" rel="stylesheet">
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <title>View Course</title>
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
            echo "<a class='nav-item nav-link' href='../../pages/student/'>".$user_name."</a>";
          else if($user_type == "Tutor")
            echo "<a class='nav-item nav-link' href='../../pages/tutor/'>".$user_name."</a>";
        ?>
      </li>
    </ul>
</header>
  <div class="container-fluid" id="main">
    <div class="d-flex flex-row">
      <div class="d-flex flex-column col-9 justify-content-center ml-5">
        <div class="row mt-5">
          <div class=" pt-4 mx-auto ">
              <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/g3VhwXMMN4U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
              <?php
              if($status == 11 or $status == 21)
              {
                echo "
                <video id='my-video' class='video-js' controls preload='auto' width='1080' height='auto'
                poster='' data-setup='{}'>
                <source src='$link' type='video/mp4'>
                <p class='vjs-no-js'>
                  To view this video please enable JavaScript, and consider upgrading to a web browser that
                  <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
                </p>
                </video>
                ";

              }
              else
              {
                echo "
                <video id='my-video' class='video-js' controls preload='auto' width='1080' height='auto'
                poster='' data-setup='{}'>
                <p class='vjs-no-js'>
                  To view this video please subscribe to the course
                  <a class='btn btn-outline-dark' href='../courses/buy.php?cid=$c_id'>Buy</a>
                </p>
                </video>
                ";
                echo "<script>alert('To view this video please subscribe to the course')</script>";

              }

              ?>
              <!-- <video id='my-video' class='video-js' controls preload='auto' width='1080' height='auto'
              poster='' data-setup='{}'>
                <source src='<?php echo $link; ?>' type='video/mp4'>
                <p class='vjs-no-js'>
                  To view this video please enable JavaScript, and consider upgrading to a web browser that
                  <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
                </p>
              </video> -->
          </div>
        </div>
        <div class="row mt-3 ml-1 ">
          <ul class="nav container nav-tabs d-flex flex-row justify-content-start" style="background:white">
            <li class="nav-item flex-column">
              <a class="nav-link" id="overview-tab" name="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="false">Overview</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" id="qna-tab" name="qna-tab" data-toggle="tab" href="#qna" role="tab" aria-controls="qna" aria-selected="false">Q&A</a>
            </li> -->
            <li class="nav-item flex-column">
              <a class="nav-link" id="update-tab" name="updates-tab" data-toggle="tab" href="#updates" role="tab" aria-controls="updates" aria-selected="false">Updates</a>
            </li>
            <li class="nav-item flex-column">
              <a class="nav-link" id="videolist-tab" name="videolist-tab" data-toggle="tab" href="#videolist" role="tab" aria-controls="videolist" aria-selected="true"><span style="font-size:16px;cursor:pointer" onclick="openNav()">&#9776; Course List</span></a>
            </li>
            
          </ul>
          <div class="container p-0 tab-content" id="myTabContent">
            <div id="overview" class="tab-pane fade show " role="tabpanel" aria-labelledby="overview-tab">
              <?php
              $sql_coursedetails = "SELECT `category_id`, `course_name`, `tutor_id`, `description`, 
                        `total_lectures`, `price`, `ratings`, `total_students` FROM `all_courses` WHERE `course_id`=$c_id ";
              $result = $conn->query($sql_coursedetails);
              
              
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  $sql_tutordetails = "SELECT `fname`, `lname` FROM `user_details` WHERE `user_id`=".$row['tutor_id'];
                  // echo "<br>".$sql_tutordetails."<br>";
                    echo "
                      <div class='d-flex flex-row ml-4 pt-3'>
                        <div class='flex-column inline mr-5'>
                          <p class='pb-0 mb-0'><b>Course Name</b></p>
                          <p>".$row['course_name']."</p>
                        </div>
                        <div class='flex-column inline'>
                          <p class='pb-0 mb-0'><b>Tutor:</b></p>
                          ";
                          $result1 = $conn->query($sql_tutordetails);
                          
                          if ($result1->num_rows > 0) {
                            // output data of each row
                            while($row1 = $result1->fetch_assoc()) {
                              echo "<p>".$row1['fname']." ".$row1['lname']."</p>";
                            }
                          }
                          else{
                            echo "Nothing";
                          }
                      echo "</div></div>";
                  }
              } else {
                  echo "0 results";
              }
              

              ?>
            </div>
            <div id="updates" class="tab-pane fade show" role="tabpanel" aria-labelledby="updates-tab">
              <h3>Menu 2</h3>
              <p>Some content in menu 2.</p>
            </div>
            <div id="videolist" class="tab-pane fade show active" role="tabpanel" aria-labelledby="videolist-tab">
              <div class="container">
                <ul>
                <?php
                  $sql_lectures = "SELECT `course_id`,`video_id`, `lecture_no`, `lecture_name`,`video_path` FROM `video_details` WHERE `course_id` = $c_id";
                  // echo $sql_lectures;
                  $result_lectures = $conn->query($sql_lectures);
                  
                  if ($result_lectures->num_rows > 0) {
                      // output data of each row
                      while($row = $result_lectures->fetch_assoc()) {
                          echo "
                            <li class='p-1 video-link'> <a href=./viewcourse.php?viewcourse=".$row['course_id']."&lid=".$row['lecture_no'].">".$row['lecture_no'].".&nbsp&nbsp".$row['lecture_name']."</a></li>
                          ";
                      }
                  } else {
                      echo "0 results";
                  }                         
                ?>
                </ul>
                
              </div>
            </div>
          </div>
        </div>    
      </div>
      <!-- // 0  no login
      // 1  student
      // 11 student with subscription
      // 12 student without subscription
      // 2  tutor
      // 21 tutor's own course
      // 22 other tutor's course -->
      <div class="d-flex flex-column col-3">
        <p class="mt-5 pt-5">
        <?php
          
          if($status == 11)
          {
            echo "You brought this course";
          }
          else if($status == 12 or $status == 22)
          {
            echo "<a class='btn btn-outline-dark' href='../courses/buy.php?cid=$c_id'>Buy</a>";
          }
          else if($status == 21)
          {
            echo  "<a class='btn btn-outline-dark' href='../tutor/updatecourse.php?cid=$c_id'>Edit</a>";
          }
          else if($status == 0)
          {
            echo "<a class='btn btn-outline-dark' href='../courses/buy.php?cid=$c_id'>Buy</a>";
          }
        ?>
        </p>
      </div>
    </div>
</div>











<!-- g3VhwXMMN4U -->
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




    <!-- <script src="../scripts/plyr.js"> -->
    <!-- plyr.setup("#plyr-youtube");</script> -->
    <script src='https://vjs.zencdn.net/7.6.5/video.js'></script>
    <script src="../../scripts/viewcourse.js"></script>
</body>
</html>