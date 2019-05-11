<?php
    session_start();

    $username = $_SESSION['stuname'];
    $userid = $_SESSION['stuid'];
    $logout = json_decode($_POST['logout']);
    $login_state = 0;


    if (!empty($userid) || !empty($username)) {
        $login_state = 1;
    }

    if ($logout == "1") {
        session_unset();
        $login_state = 0;
    }

    $array=array(
        "login_state"=>"$login_state",
        "username"=>"$username",
        "userid"=>"$userid",
    );
    // $array = array(
    //     "status"=>"200"
    // );
    echo json_encode($array);
?>