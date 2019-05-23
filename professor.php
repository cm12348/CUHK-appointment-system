<?php
    $host = 'localhost';
    $username = 'zlx';
    $password = 'Zlx@8687';
    $dbname = 'appointment';
    $end = '3306';
    $charset='utf8';
    include("db.php");
$db = db::getInstance(array('dsn'=>"mysql:dbname=$dbname;host=$host","username"=>$username,'password'=>$password,'charset'=>$charset));
$keyword = isset($_GET['keyword'])?$_GET['keyword']:'';
$shuzi = 0;
$keywords = "";
$sql = "SELECT * FROM professor where PROFNAME like '%$keyword%'";
$len = strlen($keyword)/3;
if ($len==1){
    $data = $db->getAll($sql);
}
if ($len>1){
    $sql = "SELECT * FROM professor where (PROFNAME like '%$keyword%'";
    while ($shuzi+1 <= $len){
        $keywords = mb_substr($keyword,$shuzi,1,'utf-8');
        $sql .= " or PROFNAME like '%$keywords%'";
        $shuzi += 1;
    }
    $sql .=")";
    $data = $db->getAll($sql);
}

$Chinese2PingYin = array('徐杨生' => 'xuyangsheng',
                        '蔡玮' => 'caiwei',
                        '王亚坤' => 'wangyakun' );

// if($keyword){

//     $data = $db->getAll("SELECT * FROM professor where PROFNAME like '%$keyword%'");
// }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Professor</title>

    <link rel="stylesheet" type="text/css" href="./test.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script
        type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
    <!-- //Custom Theme files -->
    <link href="css/custom.css" type="text/css" rel="stylesheet" media="all">
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- web-fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
    <link
        href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- //web-fonts -->

    <style>
        body {
            text-align: center
        }

        #divcss5 {
            margin: 0 auto;
            border: 1px solid #000;
            width: 300px;
            height: 100px
        }

        a {
            color: #333;
            font-weight: 700;
            font-size: 13px;
        }

        /*居中样式**/
        .center {
            margin: 0 auto;
            text-align: center;
        }

        /*搜索框样式**/
        .search_form {
            text-align: center;
            margin: 0 auto;
            min-height: 175px;
        }

        .show_result {
            text-align: center;
            margin: 0 auto;
            min-height: 200px;
        }

        .search_form input[type="text"] {
            width: 500px;
            height: 40px;
            font-size: 15px;
        }

        .search_form input[type="submit"] {
            width: 100px;
            height: 50px;
            background: #3385FF;
            color: #fff;
            border-bottom: 0px solid #2d78f4;
            -webkit-appearance: none;
            -webkit-border-radius: 0;
            outline: medium;
            margin-left: -6px;
            font-size: 20px;
        }

        .head-text {
            font-size: -webkit-xxx-large;
            font-family: sans-serif;
            color: #64a2d8
        }

        body {
            text-align: center
        }

        #divcss5 {
            margin: 0 auto
        }
    </style>


</head>

<body>
    <!-- banner -->
    <div class="agileits-banner">
        <!-- navigation -->
        <div class="top-nav w3-agiletop">
            <div class="container">
                <div class="navbar-header w3llogo">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a href="index.html"> Easy-Time</a></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="w3menu navbar-left">
                        <ul class="nav navbar">
                            <li><a href="index.html">Log in </a></li>
                            <li><a href="Professor.php" class="active">Professor</a></li>
                            <li><a href="Student.html">Student</a></li>
                            <li>
                                <ul class="dropdown-menu">
                                    <li><a href="icons.html">Web Icons</a></li>
                                    <li><a href="codes.html">Short Codes</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Reservation</a></li>
                        </ul>
                    </div>
                    <div class="w3ls-bnr-icons social-icon navbar-right">
                        <a href="#" class="social-button twitter"></a>
                        <a href="#" class="social-button facebook"></a>
                        <a href="#" class="social-button google"></a>
                        <a href="#" class="social-button dribbble"></a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //navigation -->
        <!-- Professor -->
        <div>
            <div class="banner-w3text w3layouts aboutw3l-bnrtext">
                <h2><span>Professor</span></h2>
            </div>

        </div>
            <!-- 搜索框 -->
        <div class="search_form">
            <form action="" method="get" role="form">
                <input type="text" name="keyword" value="<?php echo $keyword;?>">
                <input type="submit" value="Search">
            </form>
        </div>


        <!-- 呈现搜索结果 -->
        <script src="./test.js" type="text/javascript"></script>
        <div class="get_result" style="text-align:center">
            <table class='show_result' width="1000" border="0" cellspacing="0" cellpadding="0"
                style="text-align:center">
                <thread>
                    <tr style="text-align:center">
                        <td width="500" align="center">Professor Name</td>
                        <td width="500" align="center">Office</td>
                        <td width="500" align="center">Email</td>
                        <td width="500" align="center">School Name</td>
                        <td width="500" align="center">Prof ID</td>

                    </tr>
                </thread>
                <tbody style="text-align: center">

                    <?php if(isset($data) && $data){
                foreach($data as $k=>$v){
                    ?>
                    <tr>
                        <td width="500" align="center"><?php 
                                $str = $v['ProfName'];
                                echo "<a href='".$Chinese2PingYin[$str].".html'> $str"
                            ?></a></td>
                        <td width="500"><?php echo $v['Office']?></td>
                        <td width="500"><?php
                                $emails = $v['ProfMail'];
                                echo "<a href='mailto:'.$emails> $emails"
                            ?></a></td>
                        <td width="500"><?php echo $v['SchoolID']?></td>
                        <td width="500"><?php echo $v['ProfID']?></td>

                    </tr>
                    <?php }
            } ?>
                </tbody>
            </table>

        </div>

        <!-- footer -->
        <div class="footer">
            <div class="container">
                <div class="footer-row w3l-newsletter">
                    <div class="col-md-6 w3_agile_newsletter_left">
                        <h4>CSC3170</h4>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="footer-bottom"> </div>
            </div>
        </div>
        <!-- footer -->

</body>

</html>