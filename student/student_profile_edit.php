<<<<<<< HEAD
 <?php
 require '../admin/dbcon.php';
session_start();
if(!isset($_SESSION['user_login'])){
    header('location:login.php');
}

$user_name = base64_decode($_GET['username']);
$result = mysqli_query($link, "SELECT * FROM `student` WHERE `username` = '$user_name'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
         $name = $_POST['name'];
         $email = $_POST['email'];
         $data = "UPDATE `student` SET `name`='$name',`email`='$email'  WHERE `username` = '$user_name'";
         $result = mysqli_query($link, $data);
        if($result) {

            echo '<div class="alert alert-info">'. "Update Successfully" .'</div>';
            }

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
        <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>

    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Student</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li style="margin-top: 15px"><i class="fa fa-user"></i> Welcome: <?= $row['username'];?>
                        </li>
                        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
<h1 class="text-primary text-center"><i class="fa fa-user"></i>Update ur Info</h1>
<ol class="breadcrumb text-center">
    <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
    <li class="active"><i class="fa fa-User"></i> Update</li>
</ol>
    <div class="row">

        <div class="col-sm-6 col-sm-offset-4">
            <form action="" method="POST">

                <table class="table table-bordered">
                    <tr>
                        <td>User ID</td>
                        <td>
                            <?=$row['id']; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="name">Name</label>
                        </td>
                        <td>
                            <input type="text" id="name" class="form form-control" name="name" value="<?= $row['name'];?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="username"> User Name</label>
                        </td>
                        <td>
                          <?= $row['username'];?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="email">Email</label>
                        </td>
                        <td>
                            <input type="text" id="email" class="form form-control" name="email" value="<?= $row['email'];?>">
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <label for="status">Status</label>
                            </td>
                           
                        <td>
                            <?= $row['status']; ?>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <label for="datetime">Sign-up date</label>
                        </td>
                        <td>
                            <?= $row['datetime'];?>
                        </td>

                    </tr>
                </table>
                <input type="submit" name="update" value="update" class="btn btn-primary pull-right">

            </form>

        </div>

    </div>


=======
 <?php
 require '../admin/dbcon.php';
session_start();
if(!isset($_SESSION['user_login'])){
    header('location:login.php');
}
$user_name = base64_decode($_GET['username']);
$result = mysqli_query($link, "SELECT * FROM `student` WHERE `username` = '$user_name'");
$row = mysqli_fetch_assoc($result);
if(isset($_POST['update'])){
         $name = $_POST['name'];
         $email = $_POST['email'];
         $data = "UPDATE `student` SET `name`='$name',`email`='$email'  WHERE `username` = '$user_name'";
         $result = mysqli_query($link, $data);
        if($result) {

            echo '<div class="alert alert-info">'. "Update Successfully" .'</div>';
            }

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
        <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>

    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Student</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li style="margin-top: 15px"><i class="fa fa-user"></i> Welcome: <?= $row['username'];?>
                        </li>
                        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
<h1 class="text-primary text-center"><i class="fa fa-user"></i>Update ur Info</h1>
<ol class="breadcrumb text-center">
    <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
    <li class="active"><i class="fa fa-User"></i> Update</li>
</ol>
    <div class="row">

        <div class="col-sm-6 col-sm-offset-4">
            <form action="" method="POST">

                <table class="table table-bordered">
                    <tr>
                        <td>User ID</td>
                        <td>
                            <?=$row['id']; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="name">Name</label>
                        </td>
                        <td>
                            <input type="text" id="name" class="form form-control" name="name" value="<?= $row['name'];?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="username"> User Name</label>
                        </td>
                        <td>
                          <?= $row['username'];?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="email">Email</label>
                        </td>
                        <td>
                            <input type="text" id="email" class="form form-control" name="email" value="<?= $row['email'];?>">
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <label for="status">Status</label>
                            </td>
                           
                        <td>
                            <?= $row['status']; ?>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <label for="datetime">Sign-up date</label>
                        </td>
                        <td>
                            <?= $row['datetime'];?>
                        </td>

                    </tr>
                </table>
                <input type="submit" name="update" value="update" class="btn btn-primary pull-right">

            </form>

        </div>

    </div>


>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
