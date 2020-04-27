<<<<<<< HEAD
<?php
require_once './dbcon.php';
session_start();
if(!isset($_SESSION['user_login'])){
    header('location:login.php');
}
$seesion_user =$_SESSION['user_login'];
$query = "SELECT * FROM `admin` WHERE `username` = '$seesion_user'";
$data = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
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
                    <li style="margin-top: 15px"><i class="fa fa-user"></i><img style="width: 50%" class="rounded-circle" src="../home/ad_img/<?php echo ($row['photo']);  ?>" alt="user images"> Welcome: <?= $seesion_user;?></li>
                    <li><a href="add_admin.php"><i class="fa fa-user-plus"></i> Add admin</a></li>
                    <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <h1 class="text-primary text-center"><i class="fa fa-user"></i> User Profile<small> My profile</small></h1>
    <ol class="breadcrumb text-center">
        <li><a href="index.php?page=dashboard" class="text-center"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-user"></i> Profile</li>
    </ol>

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-5 col-sm-offset-2">
                <table class="table table-bordered">
                    <tr>
                        <td>User ID</td>
                        <td>
                           <?php echo ($row['id']); ?>
                        </td>

                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            <?php echo ($row['name']); ?>
                        </td>

                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td>
                            <?php echo ($row['username']); ?>
                        </td>

                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <?php echo ($row['email']); ?>
                        </td>

                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <?php echo ($row['status']); ?>

                        </td>

                    </tr>
                    <tr>
                        <td>sign-up date</td>
                        <td>
                            <?php echo ($row['datetime']); ?>
                        </td>

                    </tr>
                </table>

                <a href="index.php?page=admin_update_profile&username=<?php echo base64_encode($seesion_user); ?>" class="btn btn-info pull-right">Edit Profile</a>
            </div>
            <div class="col-sm-4">
                <img style="width: 50%" class="img-thumbnail" src="../home/ad_img/<?php echo ($row['photo']);  ?>" alt="user images">
                </br>
                </br>

                <?php

                        if (isset($_POST['upload'])) {
                            $photo      = explode('.', $_FILES['photo']['name']);
                            $photo      = end($photo);
                            $photo_name = $seesion_user . '.' . $photo;
                            
                            $query  = "UPDATE `admin` SET `photo`= '$photo_name' WHERE `username` = '$seesion_user'";
                            $result = mysqli_query($link, $query);
                            if ($result) {
                                
                                move_uploaded_file($_FILES['photo']['tmp_name'], '../home/ad_img/' . $photo_name);
                            }
                        }
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="photo">profile picture</label>
                        <input type="file" name="photo" id="photo" required="">
                        </br>
                        <input type="submit" name="upload" value="upload" class="btn btn-sm btn-info ">

                    </form>

            </div>

        </div>
    </div>
</body>

</html>
=======

<?php
require_once './dbcon.php';
session_start();
if(!isset($_SESSION['user_login'])){
    header('location:login.php');
}

$seesion_user =$_SESSION['user_login'];
$query = "SELECT * FROM `admin` WHERE `username` = '$seesion_user'";
$data = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($data);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
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
                    <li style="margin-top: 15px"><i class="fa fa-user"></i> Welcome: <?= $seesion_user;?></li>
                    <li><a href="add_admin.php"><i class="fa fa-user-plus"></i> Add admin</a></li>
                    <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <h1 class="text-primary text-center"><i class="fa fa-user"></i> User Profile<small> My profile</small></h1>
    <ol class="breadcrumb text-center">
        <li><a href="index.php?page=dashboard" class="text-center"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-user"></i> Profile</li>
    </ol>

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-5 col-sm-offset-2">
                <table class="table table-bordered">
                    <tr>
                        <td>User ID</td>
                        <td>
                           <?php echo ($row['id']); ?>
                        </td>

                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            <?php echo ($row['name']); ?>
                        </td>

                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td>
                            <?php echo ($row['username']); ?>
                        </td>

                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <?php echo ($row['email']); ?>
                        </td>

                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <?php echo ($row['status']); ?>

                        </td>

                    </tr>
                    <tr>
                        <td>sign-up date</td>
                        <td>
                            <?php echo ($row['datetime']); ?>
                        </td>

                    </tr>
                </table>

                <a href="index.php?page=admin_update_profile&username=<?php echo base64_encode($seesion_user); ?>" class="btn btn-info pull-right">Edit Profile</a>
            </div>
            <div class="col-sm-4">
                <img style="width: 50%" class="img-thumbnail" src="../home/ad_img/<?php echo ($row['photo']);  ?>" alt="user images">
                </br>
                </br>

                <?php

                        if (isset($_POST['upload'])) {
                            $photo      = explode('.', $_FILES['photo']['name']);
                            $photo      = end($photo);
                            $photo_name = $seesion_user . '.' . $photo;
                            
                            $query  = "UPDATE `admin` SET `photo`= '$photo_name' WHERE `username` = '$seesion_user'";
                            $result = mysqli_query($link, $query);
                            if ($result) {
                                
                                move_uploaded_file($_FILES['photo']['tmp_name'], '../home/ad_img/' . $photo_name);
                            }
                        }
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="photo">profile picture</label>
                        <input type="file" name="photo" id="photo" required="">
                        </br>
                        <input type="submit" name="upload" value="upload" class="btn btn-sm btn-info ">

                    </form>

            </div>

        </div>
    </div>
</body>

</html>
>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
