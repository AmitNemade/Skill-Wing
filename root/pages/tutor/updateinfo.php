<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id11020831_skillwing";
$usertable = "user_details";

$c_id = $_POST["cid"];
if(isset($_POST["opr"]) && isset($_POST["lno"])) {
    $opr = $_POST["opr"];
    $lno = $_POST["lno"];
}
else{
    $opr = "search";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

    if($opr == "delete")
    {
        $sql_lecture = "SELECT `lecture_name` FROM `video_details` WHERE `course_id`=$c_id AND `lecture_no`=$lno";
        // echo $sql_lecture;
        $location = "";
        $result_lecture = $conn->query($sql_lecture);    
        if ($result_lecture->num_rows > 0) {
            // output data of each row
            while($row = $result_lecture->fetch_assoc()) {
               $location = "../../../video/".$row['lecture_name'].".mp4";
            }
        } else {
            echo "0 results";
        }

        if(unlink($location)){
            $sql_delete = "DELETE FROM video_details WHERE `course_id`=$c_id AND `lecture_no`=$lno";
            if ($conn->query($sql_delete) === TRUE) {
                echo "record deleted successfully";
            } else {
                echo "Error: " . $conn->$sql_delete . "<br>" . $conn->error;
            }
        }
        else{
            echo "error occured while deleting";
        }

    }
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