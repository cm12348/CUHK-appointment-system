<?php
    $host = '127.0.0.1';
    $user = 'root';
    $password = '';
    $database = 'appointment';
    $end = '3306';

    $conn=mysqli_connect($host,$user,$password,$database,$end);

    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }
    
    mysqli_query($conn,'set names utf8');
?>