<<<<<<< HEAD
 <?php
 session_start();
require_once './dbcon.php';

if(!isset($_SESSION['user_login'])){

header('location:login.php');
}


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Assignment Share</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        

    </head>

    <body>
        
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Admin</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li style="margin-top: 15px"><img class="img-circle" style="width:40px;height: 40px; margin-top: -9px;" src="../home/ad_img/<?=$_SESSION['activeUser']['photo'];?>"> Welcome:
                          <?= $_SESSION['user_login'];?>
                        </li>
                        <li><a href="add_admin.php"><i class="fa fa-users"></i> Add admin</a></li>
                        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="list-group">
                        <a href="index.php?page=dashboard" class="list-group-item active"><i class="fa fa-dashboard"></i> DashBoard</a>
                        <a href="index.php?page=cse" class="list-group-item"><i class="fa fa-file"></i> CSE</a>
                        <a href="index.php?page=eee" class="list-group-item"><i class="fa fa-file"></i></i> EEE</a>
                        <a href="index.php?page=ece" class="list-group-item"><i class="fa fa-file"></i> ECE</a>
                        <a href="index.php?page=civil" class="list-group-item"><i class="fa fa-file"></i> CIVIL</a>
                        <a href="index.php?page=bba" class="list-group-item"><i class="fa fa-file"></i> BBA</a>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="content">

                        <?php 

                     if (isset($_GET['page'])) {

                        $page = $_GET['page'] .'.php';

                     }else{
                        $page ="dashboard.php";
                     }

                     if (file_exists($page)) {
                        require_once $page;
                     }else{
                        require_once '404.php';
                     }

                 ?>

                    </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer-area">
            <p>copyright &copy: 2019-
                <?= date('Y') ?> Assignment Share.All Right Reseverd</p>

        </footer>
    </body>

    </html>
=======
 <?php
 session_start();
require_once './dbcon.php';
if(!isset($_SESSION['user_login'])){

header('location:login.php');
}


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Assignment Share</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">

    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Admin</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li style="margin-top: 15px"><img class="img-circle" style="width:40px;height: 40px; margin-top: -9px;" src="../home/ad_img/<?=$_SESSION['activeUser']['photo'];?>"> Welcome:
                          <?= $_SESSION['user_login'];?>
                        <li><a href="add_admin.php"><i class="fa fa-users"></i> Add admin</a></li>
                        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="list-group">
                        <a href="index.php?page=dashboard" class="list-group-item active"><i class="fa fa-dashboard"></i> DashBoard</a>
                        <a href="index.php?page=cse" class="list-group-item"><i class="fa fa-file"></i> CSE</a>
                        <a href="index.php?page=eee" class="list-group-item"><i class="fa fa-file"></i></i> EEE</a>
                        <a href="index.php?page=ece" class="list-group-item"><i class="fa fa-file"></i> ECE</a>
                        <a href="index.php?page=civil" class="list-group-item"><i class="fa fa-file"></i> CIVIL</a>
                        <a href="index.php?page=bba" class="list-group-item"><i class="fa fa-file"></i> BBA</a>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="content">

                        <?php 

                     if (isset($_GET['page'])) {

                        $page = $_GET['page'] .'.php';

                     }else{
                        $page ="dashboard.php";
                     }

                     if (file_exists($page)) {
                        require_once $page;
                     }else{
                        require_once '404.php';
                     }

                 ?>

                    </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer-area">
            <p>copyright &copy: 2019-
                <?= date('Y') ?> Assignment Share.All Right Reseverd</p>

        </footer>
    </body>

    </html>
>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
