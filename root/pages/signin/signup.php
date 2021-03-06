<?php
    session_start();

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
    <link rel="stylesheet" href="../../css/template.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/signin.css">
    <script src="https://kit.fontawesome.com/8d0d6b5845.js"></script>

    <!-- Title Page-->
    <title>Skill Wing</title>

    <!-- Fontfaces CSS-->
    <link href="../../required/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../required/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../required/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../required/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../required/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

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
    <div class="container-fluid">
        <div class="login-wrap " style="padding-bottom: 8vh">
            <div class="login-content">
                <div class="login-logo">
                    <h1 class="font-2" >Skill Wing</h1>
                </div>
                <div class="login-form">
                    <form method="POST" onsubmit="return validate();" action="signupcheck.php" >
                        <div class="form-group d-flex flex-row justify-content-center">    
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="usertype" id="user1radio" value="Student">
                                <label class="form-check-label" for="user1radio">Student</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="usertype" id="user2radio" value="Tutor">
                                <label class="form-check-label" for="user2radio">Tutor</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="d-flex flex-row justify-content-between">
                                <div class="col col-6 pl-0" >
                                    <label style="margin-bottom: 0.2rem;">First Name</label>
                                    <input class="au-input au-input--full" required title="Field can't be empty" pattern="\w+" type="text" name="fname" id="fname" placeholder="First Name">                                        </div>
                                <div class="col col-6 pr-0">
                                    <label style="margin-bottom: 0.2rem;">Last Names</label>
                                    <input class="au-input au-input--full" required title="Field can't be empty" pattern="\w+" type="text" name="lname" id="lname" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="au-input au-input--full" required type="email" name="email" id="email" placeholder="Email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        
                        <div class="form-group password">
                            <label>Password</label>
                            <input class="au-input au-input--full" title="Password must contain at least 8 characters,1 uppercase, 1 lowercase and 1 numbers" type="password" name="password" id="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="form.cnfpassword.pattern = RegExp.escape(this.value);">
                            <small id="emailHelp" class="form-text text-muted">Your privacy is our first priority</small>
                        </div>
                        
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input class="au-input au-input--full" required title="Please enter the same Password as above." type="password" name="cnfpassword" placeholder="Confirm Password">
                        </div>

                        <div class="form-group upload-group">
                            <label>Select image to upload:</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <!-- <input type="submit" value="Upload" name="submit"> -->
                        </div>

                        <span style="color:red; font-family: 'Martel Sans', sans-serif; font-size: 15px;">
                        <?php
                            if(isset($_SESSION["error"])){
                                $error = $_SESSION["error"];
                                echo "<span>$error</span>";
                            }
                        ?>  
                        </span>

                        <input class="au-btn au-btn--block au-btn--green m-b-20" name="submit" type="submit" id="submit">
                    </form>    
                    <div class="form-group">
                        Already had an account?
                        <a class="sign-link" href="../signin/" data-purpose="log-in">
                        Log in
                        </a>
                    </div>
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
    <script src="../../required/vendor/slick/slick.min.js"></script>
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

    <script type="text/javascript" src="../../scripts/signup.js"></script>

</body>

</html>
<!-- end document-->


<?php
    unset($_SESSION["error"]);
?>