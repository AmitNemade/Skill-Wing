<?php
session_start();
$_SESSION['user_id']="";
$_SESSION['user_type']="";



if( isset( $_POST['submit'] ) )
{

    $usertype = $_POST['usertype'];
    $fname = ucfirst($_POST['fname']);
    $lname = ucfirst($_POST['lname']);
    $email = $_POST['email'];
    
    $password = $_POST['password'];
    $options = [
        'cost' => 12,
    ];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

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
    echo "Connected successfully";
    
    $sql = "";

    $sql = "SELECT `email` FROM `$usertable` WHERE `email`='$email'";
    $result = $conn->query($sql);
    if($result)
    {
        if ($result->num_rows > 0) {
            // output data of each row            
            $_SESSION['error'] = "Email Address entered is already registered with the system!!";
            $uri="../pages/signup.php";
            header('Location:'.$uri);
        }    
        else {
            $id = 0;
            $sql = "SELECT `user_id` FROM `$usertable` ORDER BY `user_id` DESC LIMIT 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $id = $row['user_id'];
                }
            }

            $id += 1;

            $sql = "INSERT INTO `$usertable` (`user_id`,`user_type`,`fname`, `lname`, `email`, `password`) VALUES ($id,'$usertype','$fname', '$lname', '$email', '$hashed_password')";
        
            if ($conn->query($sql) === TRUE) {
                $_SESSION['user_id']= $id;
                $_SESSION['user_type']= $user_type;
    
                echo '<br>Redirecting to Dashboard<br>'. $_SESSION['user_id']."<br>".$_SESSION['user_type'];
    
                if($user_type == "Student")
                {
                    $uri="../pages/studentdash.php";
                    header('Location:'.$uri);
                }
                else
                {
                    $uri="../pages/tutordash.php";
                    header('Location:'.$uri);
                }
            } 
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    else{
        echo "Database error";
    }

}
else{
    echo "error";
}
?>