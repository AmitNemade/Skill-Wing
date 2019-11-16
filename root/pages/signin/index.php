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
<body cass="animsition" style="background-color: #cecdcd !important" >
    <div class="container-fluid">
        <div class="login-wrap mt-5" >
            <div class="login-content">
                <div class="login-logo">
                    <h1 class="font-2" >Skill Wing</h1>
                </div>
                <div class="login-form">
                    <form action="../signin/logincheck.php" method="post">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                        </div>
                        <span style="color:red; font-family: 'Martel Sans', sans-serif; font-size: 15px;">
                        <?php
                            if(isset($_SESSION["error"])){
                                $error = $_SESSION["error"];
                                echo "<span>$error</span>";
                            }
                        ?>  
                        </span>
                        <input type="submit" value="Log in" class="au-btn au-btn--block au-btn--green m-b-20" >
                        <div class="d-flex flex-row justify-content-center form-group">
                            <span>or &nbsp;</span>
                            <a class="sign-link" href="../signin/forget-pass.html" data-purpose="forgot-password">Forgot password</a>
                        </div>
                        <div class="form-group">
                            Don't have an account?
                            <a class="sign-link" href="../signin/signup.php" data-purpose="sign-up">
                            Sign up
                            </a>
                        </div>
                    </form>
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

</body>

</html>
<!-- end document-->

<?php
    unset($_SESSION["error"]);
?>