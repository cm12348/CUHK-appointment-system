<?php
    require "dbconn.php";
    $StuID = $_POST['id'];
    $statelist = json_decode(stripslashes($_POST['statelist']));

    $sql = "DELETE FROM STUCALENDAR WHERE StuID = '$StuID'";
    $result=mysqli_query($conn,$sql);

    $count = 0;
    $state = '0';
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

    echo json_encode($StuID);
?>