<?php 
session_start();
$_SESSION['user_id']="";
$_SESSION['user_type']="";
$_SESSION['user_name']="";




// if( isset( $_POST['submit'] ) )
// {
    $email = $_POST['email'];
    $password_inputted_by_user = $_POST['password'];



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
    
    $password_encrypted = "";
    $user_id =-1;
    $sql = "SELECT `user_id`,`user_type`,`fname`,`lname`,`email`,`password` FROM `$usertable` WHERE `email`='$email' ORDER BY `user_id` DESC LIMIT 1";
    echo $sql;
    $result = $conn->query($sql);

    if($result)
    {
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
                $user_type = $row['user_type'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $password_encrypted = $row['password'];
            }
        }
        else{
            echo "0 rows";
        }
    }
    else{
        echo "Database error";
    }

    if($user_id != -1 || $password_encrypted != "")
    {
        if (password_verify($password_inputted_by_user, $password_encrypted)) {
            // Success!
            $_SESSION['user_id']= $user_id;
            $_SESSION['user_type']= $user_type;
            $_SESSION['user_name'] = $fname." ".$lname;

            echo '<br>Redirecting to Dashboard<br>'. $_SESSION['user_id']."<br>".$_SESSION['user_type'];

            if($user_type == "Student")
            {
                $uri="../../pages/student/";
                header('Location:'.$uri);
            }
            else
            {
                $uri="../../pages/tutor/";
                header('Location:'.$uri);
            }
        }else {
            // Invalid credentials
            echo 'Password Mismatch';
            $_SESSION['error'] = "Please check if email or password is entered correctly!!";
            $uri="../signin/";
            header('Location:'.$uri);
        }
    }
    else{
        $_SESSION['error'] = "<p >Your email address is not registered with the system!!</p>";
        $uri="../signin/";
        header('Location:'.$uri);
    }


// }
// else{
//     echo "error";
// }
?>