<?php
session_start();

if(isset($_SESSION['user_id']))
    $user_id = $_SESSION['user_id'];
else{
    $uri="../pages/login.php";
    header('Location:'.$uri);
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id11020831_skillwing";
$usertable = "user_details";
$tutor_courses="tutor_courses";
$allcourses= "all_courses";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT `user_id`,`fname`,`lname`,`email` FROM `$usertable` WHERE `user_id`= $user_id";
$result = $conn->query($sql);
if($result)
{
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];

            echo $fname." ".$lname." ".$email;
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
    <link rel="stylesheet" href="../../css/tutordash.css">
    <link rel="stylesheet" href="../../css/template.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Title Page-->
    <title>Dashboard @tutor</title>

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
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="" href="../pages/tutor/"><h3 class="font-1"><i class="fas fa-tachometer-alt" style="padding-right: 10px"></i>Dashboard</h3></a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#profile"><i class="fas fa-tachometer-alt"></i>View Profile</a>                            
                        </li>
                        <li>
                            <a href="#courses"><i class="fas fa-book-reader"></i>Courses</a>
                        </li>
                        <li>
                            <a href="#performance"><i class="zmdi zmdi-trending-up"></i></i>Performance</a>
                        </li>
                        <li>
                            <a href="#earning"><i class="fas fa-hand-holding-usd"></i>Earning Details</a>
                        </li>
                        <!-- <li>
                            <a href="#q&a"><i class="far fa-question-circle"></i>Q & A</a>
                        </li> -->
                        <!-- <li>
                            <a href="#reviews"><i class="far fa-comments"></i>Reviews</a>
                        </li> -->
                        <li>
                            <a href="map.html"><i class="fas fa-user-cog"></i>Settings</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Account</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="../../signin/forget-pass.html">Forget Password</a>
                                </li>
                                <li>
                                    <a href="../../signin/logout.php">Logout</a>
                                </li>
                                <li>
                                    <a href="../../signin/register.html">Close Accout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a class="" href="../pages/tutordash.php"><h2 class="font-1"><i class="fas fa-tachometer-alt" style="padding-right: 10px"></i>Dashboard</h2></a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#profile"><i class="fa fa-user"></i>View Profile</a>
                        </li>
                        <li>
                            <a href="#course"><i class="fas fa-book-reader"></i>Courses</a>
                        </li>
                        <li>
                            <a href="#performance"><i class="zmdi zmdi-trending-up"></i>Performance</a>
                        </li>
                        <li>
                            <a href="#earning"><i class="fas fa-hand-holding-usd"></i>Earning Details</a>
                        </li>
                        <!-- <li>
                            <a href="#q&a"><i class="far fa-question-circle"></i>Q & A</a>
                        </li> -->
                        <!-- <li>
                            <a href="#reviews"><i class="far fa-comments"></i>Reviews</a>
                        </li> -->
                        <li>
                            <a href="#"><i class="fas fa-user-cog"></i>Settings</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Account</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="../pages/forget-pass.html">Forget Password</a>
                                </li>
                                <li>
                                    <a href="../pages/logout.php">Logout</a>
                                </li>
                                <li>
                                    <a href="../register.html">Close Account</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="logo">
                                <h1 style="padding-left: 40px"><a class="navbar-brand" href="../../pages/">Skill Wing</a></h1>
                            </div>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../../required/images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../../required/images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../../required/images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../../required/images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../../required/images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../../required/images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $fname." ".$lname ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../../required/images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $fname." ".$lname ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $email ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Profile</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Setting</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../signin/logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div id="profile" class="d-flex flex-row justify-content-start ">
                            <div class="col">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <i class="fa fa-user"></i>
                                            <strong class="card-title pl-2">
                                                Profile
                                                <a class="js-acc-btn" href="#"><i class="fas fa-edit"></i></a>
                                            </strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="mx-auto d-block">
                                                <img class="rounded-circle mx-auto d-block" src="../../required/images/icon/avatar-01.jpg" alt="Card image cap">
                                                <h5 class="text-sm-center mt-2 mb-1"><?php echo $fname." ".$lname ?></h5>
                                                <div class="location text-sm-center">
                                                        <i class="zmdi zmdi-email"></i><span class="email"><?php echo $email ?></span></div>
                                                        
                                                <div class="location text-sm-center">
                                                    <i class="fa fa-map-marker"></i> California, United States</div>
                                            </div>
                                            <hr>
                                            <div class="card-text text-sm-center">
                                                <a href="#">
                                                        <i class="zmdi zmdi-facebook pr-1"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="zmdi zmdi-twitter pr-1"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="zmdi zmdi-linkedin pr-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>

                        <hr>

                        <div id="#courses" class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Courses</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-25">
                        <?php

                            $sql_searchcourses = "SELECT `course_id` FROM `$tutor_courses` WHERE `tutor_id`=$user_id";
                            $sql_courses = "SELECT * FROM $allcourses WHERE `course_id` IN ($sql_searchcourses) ORDER BY `course_id`";
                            $result = $conn->query($sql_courses);
                            // echo $sql_courses;
                            $total_courses = 0;
                            if($result)
                            {
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $total_courses += 1;
                                        echo "
                                        <div class='col-md-4'>
                                            <div class='card'>
                                                <img class='card-img-top' src='../../required/images/bg-title-01.jpg' alt='Card image cap'>
                                                <div class='card-body'>
                                                    <h4 class='card-title mb-3'>".$row['course_id']."</h4>
                                                    <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's
                                                        content.
                                                    </p>
                                                    <a href='../tutor/updatecourse.php?cid=".$row['course_id']."' class='btn btn-outline-info' target='_blank' rel='noopener noreferrer'>Update Course</a>
                                                    <a href='../courses/viewcourse.php?viewcourse=".$row['course_id']."&lid=1' class='btn btn-outline-success' target='_blank' rel='noopener noreferrer'>View Course</a>
                                                </div>
                                            </div>
                                        </div>  
                                        ";
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

                        <hr>

                        <div id="performance" class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Performance</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                    $student_count = "SELECT COUNT(`user_id`) AS `total` FROM `student_subscriptions` WHERE `course_id` IN ($sql_searchcourses)";
                                                    $result = $conn->query($student_count);
                                                    // echo "$student_count";
                                                    if($result)
                                                    {
                                                        if ($result->num_rows > 0) {
                                                            while($row = $result->fetch_assoc()) {
                                                                $total_student = $row['total'];
                                                            }
                                                        }
                                                    }
                                                    else{
                                                        echo "Database error";
                                                    }
                                                ?>



                                                <h2 id="#totalstudents"><?php echo "$total_student" ?></h2>
                                                <span>total students</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-star-circle"></i>
                                            </div>
                                            <div class="text">
                                                <h2>3.5/5</h2>
                                                <span>Ratings</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo "$total_courses"; ?></h2>
                                                <span>total courses</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-rupee-sign"></i>
                                            </div>
                                            <div class="text">
                                                <h2><i class="fas fa-rupee"></i>1,060,386</h2>
                                                <span>total earnings</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h3 class="title-2">Yearly reports</h3>
                                        <div class="chart-info">
                                            <div class="chart-info__left">
                                                <div class="chart-note">
                                                    <span class="dot dot--blue"></span>
                                                    <span>Course 1</span>
                                                </div>
                                                <div class="chart-note mr-0">
                                                    <span class="dot dot--green"></span>
                                                    <span>Course 2</span>
                                                </div>
                                            </div>
                                            <div class="chart-info__right">
                                                <div class="chart-statis">
                                                    <span class="index incre">
                                                        <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                                    <span class="label">Course 1</span>
                                                </div>
                                                <div class="chart-statis mr-0">
                                                    <span class="index decre">
                                                        <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                                    <span class="label">Course 2</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="recent-report__chart">
                                            <canvas id="recent-rep-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">Student Distribution</h3>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--blue"></span>
                                                        <span>Course 1</span>
                                                    </div>
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--red"></span>
                                                        <span>Course 2</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="percent-chart">
                                                    <canvas id="percent-chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="earning" class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Earning Details</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>date</th>
                                                <th>order ID</th>
                                                <th>Student ID</th>
                                                <th class="text-right">Course ID</th>
                                                <th class="text-right">price</th>
                                                <th class="text-right">total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2018-09-29 05:57</td>
                                                <td>100398</td>
                                                <td>iPhone X 64Gb Grey</td>
                                                <td class="text-right">$999.00</td>
                                                <td class="text-right">1</td>
                                                <td class="text-right">$999.00</td>
                                            </tr>                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <!-- <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- modal scroll -->
            <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="scrollmodalLabel">Scrolling Long Content Modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal scroll -->
                            
            <!-- END PAGE CONTAINER-->
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

    <script src="https://kit.fontawesome.com/8d0d6b5845.js"></script>


</body>

</html>
<!-- end document-->
