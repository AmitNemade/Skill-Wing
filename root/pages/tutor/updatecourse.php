<?php
session_start();
if(isset($_GET['cid']))
    $c_id = $_GET['cid'];
else
    $c_id = -1;
echo $c_id."<br>";



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id11020831_skillwing";
$usertable = "user_details";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

$user_id = $_SESSION['user_id'];
$fname = "";
$lname = "";
$email = "";

$sql = "SELECT * FROM `$usertable` WHERE `user_id`= $user_id";
$result = $conn->query($sql);
if($result)
{
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];

            // echo $fname." ".$lname." ".$email;
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

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <link rel="stylesheet" href="../../css/updatecourse.css">
    <link rel="stylesheet" href="../../css/template.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Title Page-->
    <title>Update Course</title>

    <!-- Fontfaces CSS-->
    <link href="../../required/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../required/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../required/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../required/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../required/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../required/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../required/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../required/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../required/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../required/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../required/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../required/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../required/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="container">
        <div class="d-flex flex-row mb-4">
            <h1 class="logo"><a class="navbar-brand" href="../pages/">Skill Wing</a></h1>
        </div>
        


        <div class="d-flex flex-row">
            <div class="flex-column col-9">
                <div class="d-flex-flex-row">
                    <h3>ADD LECTURES</h3>
                    <div class="ml-auto">
                        <form action="../../pages/tutor/upload.php?cid=<?php echo $c_id; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="lecture_no" class="col-sm-2 col-form-label">Lecture No: </label>
                                <div class="col-sm-10">
                                    <input type="text" id="lecture_no" name="lecture_no" class="form-control-plaintext" placeholder="Enter Lecture No">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="video_name" class="col-sm-2 col-form-label">Lecture Name: </label>
                                <div class="col-sm-10">
                                    <input type="text" id="video_name" name="video_name" class="form-control-plaintext" placeholder="Enter Video Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group">
                                    <label for="upload_file" class="col-sm-3 col-form-label">Select File To Upload: </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload_file" name="file" aria-describedby="inputGroupFileAddon04">
                                        <label class="custom-file-label" for="upload_file">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success" type="submit" name="submit" id="inputGroupFileAddon04" onclick="addCourse(<?php echo $c_id ?>)">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="d-flex-flex-row">
                    <h3>EDIT LECTURE</h3>
                    <div class="ml-auto">
                        <form action="../../pages/tutor/upload.php?cid=<?php echo $c_id; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="input-group">
                                    <label for="lecture_no" class="col-sm-2 col-form-label">Lecture No: </label>
                                    <div class="input-group-append col-sm-10">
                                        <input type="text" class="form-control" name="lecture_no" placeholder="Enter Lecture No.">
                                        <span class="input-group-btn">
                                            <button class="btn btn-outline-primary" type="button" onclick="searchclicked()">search</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="video_id" class="col-sm-2 col-form-label">Video ID:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="video_id" name="video_id" class="form-control-plaintext" placeholder="Video ID ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="video_name" class="col-sm-2 col-form-label">Video Name: </label>
                                <div class="col-sm-10">
                                    <input type="text" id="video_name" name="video_name" class="form-control-plaintext" placeholder="Enter Video Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group">
                                    <label for="upload_file" class="col-sm-3 col-form-label">Select File To Upload: </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload_file" name="file" aria-describedby="inputGroupFileAddon04">
                                        <label class="custom-file-label" for="upload_file">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success" type="submit" name="submit" id="inputGroupFileAddon04" onclick="editCourse()">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
                <div class="d-flex-flex-row">
                    <h3>DELETE LECTURE</h3>
                    <div class="ml-auto">
                        <form action="../../pages/tutor/upload.php?cid=<?php echo $c_id; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="lecture_no" class="col-sm-2 col-form-label">Lecture No: </label>
                                <div class="input-group-append col-sm-10">
                                    <input type="text" class="form-control" id="delete_lecture_no" name="lecture_no" placeholder="Enter Lecture No.">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button" onclick="deletelecture(<?php echo $c_id ?>)">Delete</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="flex-column col-3">
            <div class="container">
                <h4>COURSE CONTENT</h4>
              <div id="course-content">
                  <ul style="list-style-type:none">
                  </ul>
              </div>
              <!-- <ul style="list-style-type:none;">
              <?php
                $sql_lectures = "SELECT `course_id`,`video_id`, `lecture_no`, `lecture_name`,`video_path` FROM `video_details` WHERE `course_id` = $c_id";
                // echo $sql_lectures;
                $result_lectures = $conn->query($sql_lectures);
                
                if ($result_lectures->num_rows > 0) {
                    // output data of each row
                    while($row = $result_lectures->fetch_assoc()) {
                        echo "
                          <li class='p-1 video-link'> <a href=../courses/viewcourse.php?viewcourse=".$row['course_id']."&lid=".$row['lecture_no'].">".$row['lecture_no'].".&nbsp&nbsp".$row['lecture_name']."</a></li>
                        ";
                    }
                } else {
                    echo "0 results";
                }                         
              ?>
              </ul> -->
            </div>
            </div>
        </div>














    </div>



    <!-- Jquery JS-->
    <script src="../../required/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../../required/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../required/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../../required/vendor/slick/slick.min.js">
    </script>
    <script src="../../required/vendor/wow/wow.min.js"></script>
    <script src="../../required/vendor/animsition/animsition.min.js"></script>
    <script src="../../required/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../../required/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../../required/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../../required/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../../required/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../required/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../../required/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../../required/js/main.js"></script>
    <script src="../../scripts/updatecourse.js"></script>

    <script src="https://kit.fontawesome.com/8d0d6b5845.js"></script>


</body>

</html>
<!-- end document-->
