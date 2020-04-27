<<<<<<< HEAD
<?php
require_once './dbcon.php';
session_start();
if(!isset($_SESSION['user_login'])){

header('location:login.php');
}

if (isset($_POST['registration']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $photo = explode('.', $_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username . '.' . $photo;
if (empty($name))
    {
        $_SESSION['validation']['name'] = "This feild is required";
    }
    if (empty($email))
    {
        $_SESSION['validation']['email'] = "This feild is required";
    }
    if (empty($username))
    {
        $_SESSION['validation']['username'] = "This feild is required";
    }
    if (empty($password))
    {
        $_SESSION['validation']['password'] = "This feild is required";
    }
    if (empty($c_password)){
        $_SESSION['validation']['c_password'] = "This feild is required";
    }
    if (empty($photo))
    {
        $_SESSION['validation']['photo'] = "This feild is required";
    }
       if(!isset($_SESSION['validation'])) 
    {

        $email_check = mysqli_query($link, "SELECT * FROM `admin` WHERE `email` = '$email'");

        if (mysqli_num_rows($email_check) == 0)
        {

            $username_check = mysqli_query($link, "SELECT * FROM `admin` WHERE `username` = '$username'");
            if (mysqli_num_rows($username_check) == 0)
            {
                if (strlen($username) > 7)
                {

                    if (strlen($password) > 7)
                    {

                        if ($password == $c_password)
                        {

                            $password = md5($password);

                            $query = "INSERT INTO `admin`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email', '$username', '$password', '$photo_name', 'inactive')";
                            $result = mysqli_query($link, $query);

                            if ($result)
                            {

                                move_uploaded_file($_FILES['photo']['tmp_name'], '../home/ad_img/' . $photo_name);

                                $_SESSION['message'] = "Data Insert SucessFully!";

                            }
                            else
                            {
                                $_SESSION['message'] = "Data Insert Error!";
                            }
                          header('Location:add_admin.php');
                            exit();

                        }
                        else
                        {
                            $c_password_match = "Re-Type password dosen't match!";
                        }
                    }
                    else
                    {
                        $password_length = "Password more than 8 character";
                    }
                }
                else
                {
                    $user_length = "User-Name more than 8 character";
                }
            }
            else
            {
                $username_error = "This User-Name is already Exist!";
            }

        }
        else
        {
            $email_error = "This email is already taken!";
        }

    }
    else
    {
        echo '<br>'.'<div class="alert alert-info col-sm-offset-1 text-center">' . "Something Is Wrong!" .'</div>';
    }

   


    
}

?>

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Registration Form</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Admin Pannel</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li style="margin-top: 15px"><i class="fa fa-user"></i> Welcome:
                            <?= $_SESSION['user_login'];?>
                        </li>
                        <li><a href="add_admin.php"><i class="fa fa-user-plus"></i> Add Admin</a></li>
                        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div class="container">
            <h1 class="col-md-offset-2">Admin Registration Form!</h1>
            <?php 
                if(isset($_SESSION['message'])){
                  echo '<div class="alert alert-info">' . $_SESSION['message'].'</div>';
                  unset($_SESSION['message']);
                }
                ?>

                <hr />
                <div class="row">
                    <div class="col-md-12 col-md-offset-2">
                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">

                            <div class="form-group">
                                <label for="name" class="control-label col-sm-1">Name</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="name" type="text" name="name" placeholder="Enter ur Name" value="<?php if(isset($name)){echo $name;} ?>" />
                                </div>
                                <label class="error">
                                    <?php

                              if(isset($_SESSION['validation']['name']))
                              {
                                echo $_SESSION['validation']['name'];
                              }

                            ?>
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="email" class="control-label col-sm-1">Email</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="email" type="email" name="email" placeholder="Enter ur Email" value="<?php if(isset($email)){echo $email;} ?>" />
                                </div>
                                <label class="error">
                                    <?php

                              if(isset($_SESSION['validation']['email']))
                              {
                                echo $_SESSION['validation']['email'];
                              }

                            ?>
                                </label>
                                <label class="error">
                                    <?php

                            if(isset($email_error))
                              {
                               echo $email_error;
                              }
                            ?>
                                </label>

                            </div>
                            <div class="form-group">
                                <label for="username" class="control-label col-sm-1">User Name</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="username" type="text" name="username" placeholder="Enter ur UserName" value="<?php if(isset($username)){echo $username;} ?>" />
                                </div>
                                <label class="error ">
                                    <?php

                              if(isset($_SESSION['validation']['username']))
                              {
                                echo $_SESSION['validation']['username'];
                              }

                            ?>
                                </label>
                                <label class="error ">
                                    <?php

                              if(isset($username_error))
                              {
                                echo $username_error;
                              }

                            ?>
                                </label>
                                <label class="error ">
                                    <?php

                              if(isset($user_length))
                              {
                                echo $user_length;
                              }

                            ?>
                                </label>
                            </div>
                            <div class="form-group ">
                                <label for="password " class="control-label col-sm-1 ">Password</label>
                                <div class="col-sm-4 ">
                                    <input class="form-control" id="password" type="password" name="password" placeholder="Enter ur Password " value="<?php if(isset($password)){echo $password;} ?>" />
                                </div>
                                <label class="error">
                                    <?php

                              if(isset($_SESSION['validation']['password']))
                              {
                                echo $_SESSION['validation']['password'];
                              }

                            ?>
                                </label>
                                <label class="error">
                                    <?php

                              if(isset($password_length))
                              {
                                echo $password_length;
                              }

                            ?>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="c_password" class="control-label col-sm-1">Confram Password</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="c_password" type="password" name="c_password" placeholder="Re-Type Ur password" value="<?php if(isset($c_password)){echo $c_password;} ?>" />
                                </div>
                                <label class="error">
                                    <?php

                              if(isset($_SESSION['validation']['c_password']))
                              {
                                echo $_SESSION['validation']['c_password'];
                              }

                            ?>
                                </label>
                                <label class="error">
                                    <?php

                              if(isset($c_password_match))
                              {
                                echo $c_password_match;
                              }

                            ?>
                                </label>

                            </div>
                            <div class="form-group">
                                <label for="photo" class="control-label col-sm-1">photo</label>
                                <div class="col-sm-4">
                                    <input id="photo" type="file" name="photo" />
                                </div>
                                <label class="error">
                                    <?php
                                        if(isset($_SESSION['validation']['photo'])){
                                            echo $_SESSION['validation']['photo'];
                                        }

                                         ?>

                                </label>

                            </div>

                            <div class="col-sm-4 col-sm-offset-1">
                                <input type="submit" value="Registration" name="registration" class="btn btn-primary">

                            </div>
                        </form>

                    </div>

                </div>
                <br/>
                <div class="col-md-offset-1">
                    <hr />
                    <footer class="footer-area">
                        <p>copyright &copy: 2019-
                            <?= date('Y') ?> All Right Reseverd</p>

                    </footer>
                </div>
        </div>

    </body>

</html>
<?php

unset($_SESSION['validation']);
=======
<?php
require_once './dbcon.php';
session_start();
if(!isset($_SESSION['user_login'])){

header('location:login.php');
}

if (isset($_POST['registration']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $photo = explode('.', $_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username . '.' . $photo;
if (empty($name))
    {
        $_SESSION['validation']['name'] = "This feild is required";
    }
    if (empty($email))
    {
        $_SESSION['validation']['email'] = "This feild is required";
    }
    if (empty($username))
    {
        $_SESSION['validation']['username'] = "This feild is required";
    }
    if (empty($password))
    {
        $_SESSION['validation']['password'] = "This feild is required";
    }
    if (empty($c_password)){
        $_SESSION['validation']['c_password'] = "This feild is required";
    }
    if (empty($photo))
    {
        $_SESSION['validation']['photo'] = "This feild is required";
    }
       if(!isset($_SESSION['validation'])) 
    {

        $email_check = mysqli_query($link, "SELECT * FROM `admin` WHERE `email` = '$email'");

        if (mysqli_num_rows($email_check) == 0)
        {

            $username_check = mysqli_query($link, "SELECT * FROM `admin` WHERE `username` = '$username'");
            if (mysqli_num_rows($username_check) == 0)
            {
                if (strlen($username) > 7)
                {

                    if (strlen($password) > 7)
                    {

                        if ($password == $c_password)
                        {

                            $password = md5($password);

                            $query = "INSERT INTO `admin`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email', '$username', '$password', '$photo_name', 'inactive')";
                            $result = mysqli_query($link, $query);

                            if ($result)
                            {

                                move_uploaded_file($_FILES['photo']['tmp_name'], '../home/ad_img/' . $photo_name);

                                $_SESSION['message'] = "Data Insert SucessFully!";

                            }
                            else
                            {
                                $_SESSION['message'] = "Data Insert Error!";
                            }
                          header('Location:add_admin.php');
                            exit();

                        }
                        else
                        {
                            $c_password_match = "Re-Type password dosen't match!";
                        }
                    }
                    else
                    {
                        $password_length = "Password more than 8 character";
                    }
                }
                else
                {
                    $user_length = "User-Name more than 8 character";
                }
            }
            else
            {
                $username_error = "This User-Name is already Exist!";
            }

        }
        else
        {
            $email_error = "This email is already taken!";
        }

    }
    else
    {
        echo '<br>'.'<div class="alert alert-info col-sm-offset-1 text-center">' . "Something Is Wrong!" .'</div>';
    }

   


    
}

?>

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Registration Form</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Admin Pannel</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li style="margin-top: 15px"><i class="fa fa-user"></i> Welcome:
                            <?= $_SESSION['user_login'];?>
                        </li>
                        <li><a href="add_admin.php"><i class="fa fa-user-plus"></i> Add Admin</a></li>
                        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div class="container">
            <h1 class="col-md-offset-2">Admin Registration Form!</h1>
            <?php 
                if(isset($_SESSION['message'])){
                  echo '<div class="alert alert-info">' . $_SESSION['message'].'</div>';
                  unset($_SESSION['message']);
                }
                ?>

                <hr />
                <div class="row">
                    <div class="col-md-12 col-md-offset-2">
                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">

                            <div class="form-group">
                                <label for="name" class="control-label col-sm-1">Name</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="name" type="text" name="name" placeholder="Enter ur Name" value="<?php if(isset($name)){echo $name;} ?>" />
                                </div>
                                <label class="error">
                                    <?php

                              if(isset($_SESSION['validation']['name']))
                              {
                                echo $_SESSION['validation']['name'];
                              }

                            ?>
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="email" class="control-label col-sm-1">Email</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="email" type="email" name="email" placeholder="Enter ur Email" value="<?php if(isset($email)){echo $email;} ?>" />
                                </div>
                                <label class="error">
                                    <?php

                              if(isset($_SESSION['validation']['email']))
                              {
                                echo $_SESSION['validation']['email'];
                              }

                            ?>
                                </label>
                                <label class="error">
                                    <?php

                            if(isset($email_error))
                              {
                               echo $email_error;
                              }
                            ?>
                                </label>

                            </div>
                            <div class="form-group">
                                <label for="username" class="control-label col-sm-1">User Name</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="username" type="text" name="username" placeholder="Enter ur UserName" value="<?php if(isset($username)){echo $username;} ?>" />
                                </div>
                                <label class="error ">
                                    <?php

                              if(isset($_SESSION['validation']['username']))
                              {
                                echo $_SESSION['validation']['username'];
                              }

                            ?>
                                </label>
                                <label class="error ">
                                    <?php

                              if(isset($username_error))
                              {
                                echo $username_error;
                              }

                            ?>
                                </label>
                                <label class="error ">
                                    <?php

                              if(isset($user_length))
                              {
                                echo $user_length;
                              }

                            ?>
                                </label>
                            </div>
                            <div class="form-group ">
                                <label for="password " class="control-label col-sm-1 ">Password</label>
                                <div class="col-sm-4 ">
                                    <input class="form-control" id="password" type="password" name="password" placeholder="Enter ur Password " value="<?php if(isset($password)){echo $password;} ?>" />
                                </div>
                                <label class="error">
                                    <?php

                              if(isset($_SESSION['validation']['password']))
                              {
                                echo $_SESSION['validation']['password'];
                              }

                            ?>
                                </label>
                                <label class="error">
                                    <?php

                              if(isset($password_length))
                              {
                                echo $password_length;
                              }

                            ?>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="c_password" class="control-label col-sm-1">Confram Password</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="c_password" type="password" name="c_password" placeholder="Re-Type Ur password" value="<?php if(isset($c_password)){echo $c_password;} ?>" />
                                </div>
                                <label class="error">
                                    <?php

                              if(isset($_SESSION['validation']['c_password']))
                              {
                                echo $_SESSION['validation']['c_password'];
                              }

                            ?>
                                </label>
                                <label class="error">
                                    <?php

                              if(isset($c_password_match))
                              {
                                echo $c_password_match;
                              }

                            ?>
                                </label>

                            </div>
                            <div class="form-group">
                                <label for="photo" class="control-label col-sm-1">photo</label>
                                <div class="col-sm-4">
                                    <input id="photo" type="file" name="photo" />
                                </div>
                                <label class="error">
                                    <?php
                                        if(isset($_SESSION['validation']['photo'])){
                                            echo $_SESSION['validation']['photo'];
                                        }

                                         ?>

                                </label>

                            </div>

                            <div class="col-sm-4 col-sm-offset-1">
                                <input type="submit" value="Registration" name="registration" class="btn btn-primary">

                            </div>
                        </form>

                    </div>

                </div>
                <br/>
                <div class="col-md-offset-1">
                    <hr />
                    <footer class="footer-area">
                        <p>copyright &copy: 2019-
                            <?= date('Y') ?> All Right Reseverd</p>

                    </footer>
                </div>
        </div>

    </body>

</html>
<?php

unset($_SESSION['validation']);
>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
?>