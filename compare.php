<?php
    header('Content-type: text/plain; charset=utf-8');
    require "dbconn.php";
    
    $professorname = $_POST['professorname'];
    $studentId = $_POST['studentid'];

    $prof_statelist = array();
    $stu_statelist = array();
    $prof_record_num = 0;
    $stu_record_num = 0;

    $sql = "SELECT weekday, hourblocknum, hourblockstate FROM PROFCALENDAR pc, professor p WHERE p.ProfName= '$professorname' and p.ProfID = pc.ProfID ORDER BY hourblocknum, weekday";
    $result = mysqli_query($conn,$sql);

    
    $prof_record_num = mysqli_num_rows($result);
    if ($prof_record_num > 0) {
        // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
            array_push($prof_statelist, $row["hourblockstate"]);
        }
    }

    $sql = "SELECT weekday, hourblocknum, hourblockstate FROM STUCALENDAR WHERE StuId= '$studentId' ORDER BY hourblocknum, weekday;";
    $result = mysqli_query($conn,$sql);

    $stu_record_num = mysqli_num_rows($result);
    if ($stu_record_num > 0) {
        // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
            array_push($stu_statelist, $row["hourblockstate"]);
        }
    }

    json_encode($prof_statelist);
    json_encode($stu_statelist);

    // 请使用UTF-8编码，否则会出错！
    $array=array(
        "status"=>"200",
        "query"=>"$sql",
        "record_num"=>array(
            "prof_record_num"=>"$prof_record_num",
            "stu_record_num"=>"$stu_record_num",
        ),
        "result"=>array(
            "data1"=>"$stu_statelist[0]",
            // "get"=>"GET提交数据为[".$_POST["data"]."]",
        ),
        "stu_statelist"=>$stu_statelist,
        "prof_statelist"=>$prof_statelist,
        "error"=>"我是报错信息"
    );

    // $array = array(
    //     "status"=>"200"
    // );
    echo json_encode($array);
?>