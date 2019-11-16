<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id11020831_skillwing";
$category_table = "category_detail";
$allcourse_table = "all_courses";
$skill_table = "course_skills";

$keyword = $_POST["find"];
$category = $_POST["category"];
$subcategory = $_POST["subcategory"];

$c_id = array();
$c_count = array();

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

if($keyword == "" && $category != "" && $subcategory == ""){
    $sql_categoryid = "SELECT `category_id` FROM `$category_table` WHERE `main_category`= '$category'";

    $sql_courses = "SELECT `course_id`,`category_id`,`course_name`,`tutor_id`,`description`,`total_lectures`,`price`,`ratings`,`total_students` FROM `$allcourse_table` WHERE `category_id` IN ($sql_categoryid) ORDER BY `course_id`";


}
elseif($keyword == "" && $category == "" && $subcategory != ""){
    $sql_subcategoryid = "SELECT `category_id` FROM `$category_table` WHERE `subcategory`= '$subcategory'";

    $sql_courses = "SELECT `course_id`,`category_id`,`course_name`,`tutor_id`,`description`,`total_lectures`,`price`,`ratings`,`total_students` FROM `$allcourse_table` WHERE `category_id` IN ($sql_subcategoryid) ORDER BY `course_id`";


}
elseif($keyword != "" && $category == "" && $subcategory == ""){
    if($keyword == "All"){
        $sql_courses = "SELECT * FROM `$allcourse_table` ORDER BY `course_id`";
    }
    else{
        $search_arr = explode(" ",$keyword);
        $len = count($search_arr);
        $i = 0;
        
        $sql_search = "SELECT course_id FROM `$skill_table` WHERE ";
        $sql_categoryid = "SELECT `category_id` FROM `$category_table` WHERE ";
        // $sql_subcategoryid = "SELECT `category_id` FROM `$category_table` WHERE `subcategory`LIKE '%".$search_arr[$i]."%'";
        // if($len >= 1)
        //     $len -= 1;
        
        while($i < $len){
            $search_arr[$i] = trim($search_arr[$i]);
            if($search_arr[$i] != ""){   
                if($i>0){
                    $sql_search = $sql_search." OR ";
                    $sql_categoryid = $sql_categoryid." OR ";
                    // $sql_subcategoryid = $sql_subcategoryid." OR ";
                }
                $sql_search = $sql_search."`skills` LIKE '%".$search_arr[$i]."%' ";
                $sql_categoryid = $sql_categoryid."`main_category` LIKE '%".$search_arr[$i]."%' OR `subcategory` LIKE '%".$search_arr[$i]."%' ";
                // $sql_subcategoryid = $sql_subcategoryid."`subcategory`LIKE '%".$search_arr[$i]."%' ";
            }
            $i += 1;
        }
    
        $sql_search = $sql_search." GROUP BY `course_id` ORDER BY `course_id`";
        $sql_categoryid = $sql_categoryid." GROUP BY `category_id` ORDER BY `category_id`";
        // $sql_subcategoryid = $sql_subcategoryid." GROUP BY `course_id` ORDER BY `category_id`";
        
    
        // echo "<br>".$sql_search."<br>";
        
        $sql_courses = "SELECT `course_id`,`category_id`,`course_name`,`tutor_id`,`description`,`total_lectures`,`price`,`ratings`,`total_students` FROM `$allcourse_table` WHERE `course_id` IN ($sql_search) OR `category_ID` IN ($sql_categoryid) ORDER BY `course_id`";
    }
}

// echo "<br>".$sql_courses."<br>";

$result = $conn->query($sql_courses);

if($result)
{
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='d-flex row course-card justify-content-start'>
                    <div class='col col-3 align-self-center'>
                        <img src='../../images/javaimage.jpeg' class='course-icon' alt='course_icon'>
                    </div>
                    <div class='col col-9 course-details'>
                        <div class='d-flex flex-row justify-content-between'>
                            <div class='col col-8'>
                                <a href='../../pages/courses/viewcourse.php?viewcourse=".$row['course_id']."' class='course-link font-1 fontsize-18'>".$row['course_name']."</a>
                            </div>
                            <div class='col col-3'>
                                <span class='font-1 fontsize-18'>".$row['price']."</span>
                            </div>
                        </div> 
                        <div class='d-flex flex-row justify-content-between'>
                            <div class='col col-8'>
                                <span class='font-1 fontsize-13'>".$row['total_lectures']." lectures</span>
                            </div>
                            <div class='col col-3'>
                                <span class='font-1 fontsize-13'>Ratings: ".$row['ratings']."</span>
                            </div>
                        </div>
                        <div class='d-flex flex-row justify-content-between pt-1'>
                        <div class='col col-8'>
                            <span class='font-1 fontsize-13'>".$row['description']."</span>
                        </div>
                        <div class='col col-3 pr-0'>
                            <span class='font-1 fontsize-13'>".$row['total_students']." students</span>
                        </div>
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