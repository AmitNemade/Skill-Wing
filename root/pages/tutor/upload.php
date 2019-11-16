<?php
// include('../pages/db.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id11020831_skillwing";
$usertable = "user_details";

$c_id = $_GET['cid'];
echo $c_id."<br>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if(isset($_POST['submit'])){
    
    $name = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];
    $type = $_FILES['file']['type'];
    $size = $_FILES['file']['size'];

    $lecture_no = $_POST['lecture_no'];
    $video_name = $_POST['video_name'];



    // $ext = end((explode(".", $name)));
    
    if($type == "video/mp4")
    {
        $ext = str_replace("video/","",$type);
        $Location = "../../../video/$video_name.$ext";
        if($size>"1024000" && $size<"20000000")
        {
            if(move_uploaded_file($temp,$Location))
            {
                $url = "http://localhost/Skill%20It/video/$video_name.$ext";
                echo "<br>".$url;

                $vid = -1;

                $sql_vid = "SELECT `video_id` FROM `video_details` ORDER BY `video_id` DESC LIMIT 1";
                $result = $conn->query($sql_vid);
                echo "$sql_vid";
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $vid =$row["video_id"];
                    }
                    $vid += 1;
                }

                $sql_upload = "INSERT INTO `video_details` VALUES($c_id,$vid,$lecture_no,'$video_name','$url')";
                if ($conn->query($sql_upload) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $conn->$sql_upload . "<br>" . $conn->error;
                }

                $uri="../tutor/updatecourse.php?cid=".$c_id;
                header('Location:'.$uri);



            }
            else{
                echo "Invalid File <br>";
                echo $_FILES['file']['error']."<br>";
            }
        }
        else{
            echo "Invalid File size<br>";
            echo $_FILES['file']['error']."<br>";
        }
    }
    else{
        echo "Invalid File type<br>";
        echo $_FILES['file']['error']."<br>";
    }

    print_r($_FILES);
}





    // $doc_name = $_POST['doc_name'];
    // $pid = $_POST['pid'];
    // $name = $_FILES['myfile']['name'];
    // $tmp_name = $_FILES['myfile']['tmp_name'];
    
    // if($name && $doc_name) {
    //     $ext = end((explode(".", $name)));
    //     $Location = "../../video/$doc_name"."."."$ext";
    //     move_uploaded_file($tmp_name,$Location);
    //     echo $tmp_name."<br>".$Location;
    //     // $query = mysqli_query($con,"INSERT INTO documents (pid,name,path) VALUES ('$pid','$doc_name','$Location')");
    //     header("Location:../pages/updatecourse.php/?cid=1");
        
    // } else {
    //     die("Please select a file");
    // }

?>
