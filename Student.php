<?php
	header('Content-type: text/plain; charset=utf-8');
    require "dbconn.php";
    
    $studentId = $_POST['id'];
    $stu_record_num = 0;
    $stu_statelist = array();

    $sql = "SELECT weekday, hourblocknum, hourblockstate FROM STUCALENDAR WHERE StuId= '$studentId' ORDER BY hourblocknum, weekday;";
    $result = mysqli_query($conn,$sql);

    $stu_record_num = mysqli_num_rows($result);
    if ($stu_record_num > 0) {
        // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
            array_push($stu_statelist, $row["hourblockstate"]);
        }
    }

    json_encode($stu_statelist);

    $array = array(
        "stu_statelist"=>$stu_statelist,
        "record_num"=>$stu_record_num
    );

    echo json_encode($array);
?>