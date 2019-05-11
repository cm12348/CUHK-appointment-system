<?php
    session_start();
    header('Content-type: text/plain; charset=utf-8');
    require "dbconn.php";

    $username = $_POST['name'];
    $userid = $_POST['id'];


    $correct = 0; // 1 for true

    $sql = "SELECT * FROM STUDENT WHERE StuId = '$userid' and StuName = '$username';";
    $result = mysqli_query($conn,$sql);

    $record_num = mysqli_num_rows($result);
    if ($record_num != 0) {
        $correct = 1;
       
        $_SESSION['stuname'] = $username;
        $_SESSION['stuid'] = $userid;
    }

    $array=array(
        "status"=>"200",
        "query"=>"$sql",
        "correct"=>"$correct",
        "error"=>"我是报错信息"
    );
    // $array = array(
    //     "status"=>"200"
    // );
    echo json_encode($array);
?>