<?php

    // if (empty($_POST)) {
    //     exit("您提交的表单数据超过post_max_size! <br>");
    // }

    require "dbconn.php";
    $StuID = $_POST['id']; //获取索引
	$StuName = $_POST['name'];
	$StuMail = $_POST['email'];
	$SchoolID = $_POST['school'];
    $statelist = json_decode(stripslashes($_POST['jsonarr']));
    // $statelist = $_POST['arr']; //now it's a string
 
    // $json= json_encode($json_array);  //将数组转换成json对象
    // echo json_encode($statelist[0]);

    $sql = "SELECT FROM STUDENT WHERE StuID='$StuID'";
    $result = mysqli_query($conn, $sql);
    // //2.定义sql语句
    // $sql='select * from professor';
        
    // //3.发送SQL语句
    //     $result=mysqli_query($conn,$sql);
    //     $arr=array();//定义空数组
    //     while($row = mysqli_fetch_array($result)){
    //         //var_dump($row);
    //             //array_push(要存入的数组，要存的值)
    //         array_push($arr,$row);
    //     }
    //     // var_dump($arr);

    $sql = "INSERT INTO STUDENT VALUES('$StuID','$StuName','$StuMail','$SchoolID')";
    $result=mysqli_query($conn,$sql);
    $count = 0;
    for ($j = 0; $j < 12; $j++) {   //hour block
        for ($i = 0; $i < 7; $i++) {   //weekday
            if ($statelist[$count] == 1) {
                $state = '1';
            } else {
                $state = '0';
            }
            $sql = "INSERT INTO STUCALENDAR VALUES('$StuID','$i','$j','$state')";
            $result=mysqli_query($conn,$sql);
            $count++;
        }
    }

    echo json_encode($StuName);
    // header("Location: professor.html"); 
?>