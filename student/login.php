<<<<<<< HEAD
<?php
require_once '../admin/dbcon.php';
session_start();

if(isset($_SESSION['user_login'])){

header('location:index.php');
}

if (isset($_POST['login']))
{

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username_check = mysqli_query($link, "SELECT * FROM `student` WHERE `username` = '$username'");
    if (mysqli_num_rows($username_check) > 0)
    {

        $row = mysqli_fetch_assoc($username_check);
        if ($row['password'] == md5($password))
        {
            if ($row['status'] == 'active'){
                $_SESSION['activeUser'] = [
                    'id' => $row['id'],
                    'user_name' =>$row['name'],
                    'user_name1' =>$row['username'],
                    'faculty' => $row['faculty'],
                    'user_type' => 'student',
                    'username' => $row['username'],
                    'user_photo' => $row['photo'],

                ];
                
                $_SESSION['user_login'] =$username;
                header('location: index.php');
            }
            else
            {
                $status_message = "Your status Inactive!";
            }

        }
        else
        {
            $wrong_pasword = "Wrong Password!";
        }

    }
    else
    {
        $username_not_found = "This user Name not Found!";
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
        <title>Admin Login</title>

        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/animate.css" rel="stylesheet">

        <body>
            <div class="container animated lightSpeedIn">
                <h1 class="text-center">Student</h1>
                </br>

                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">

                        <h2 class="text-center">Student Login Only!</h2>
                        <form action="login.php" method="POST">
                            <div>
                                <input type="text" name="username" required="" class="form-control" placeholder="User name" value="<?php if(isset($username)) { echo($username); }?>" />

                            </div>

                            <div>
                                <input type="password" name="password" required="" class="form-control" placeholder="Password" value="<?php if(isset($password)) { echo($password);}?>" />

                            </div>
                            </br>
                            <div>
                                <input type="submit" name="login" value="login" class="btn btn-info pull-right" />

                            </div>
                            <div>
                                <button type="button" class="btn btn-light"><a href="../home/index.php" style="text-decoration:none">Back!</a></button>

                            </div>

                        </form>

                    </div>

                </div>
            </div>
            </br>
            <?php if (isset($username_not_found)) {

            echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4 text-center">'.$username_not_found . '</div>';

        }   ?>
                <?php if (isset($wrong_pasword)) {

            echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4 text-center">'.$wrong_pasword . '</div>';

        }   ?>
                    <?php if (isset($status_message)) {

            echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4 text-center">'.$status_message . '</div>';

        }   ?>

        </body>

=======
<?php
require_once '../admin/dbcon.php';
session_start();

if(isset($_SESSION['user_login'])){

header('location:index.php');
}

if (isset($_POST['login']))
{

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username_check = mysqli_query($link, "SELECT * FROM `student` WHERE `username` = '$username'");
    if (mysqli_num_rows($username_check) > 0)
    {

        $row = mysqli_fetch_assoc($username_check);
        if ($row['password'] == md5($password))
        {
            if ($row['status'] == 'active'){
                $_SESSION['activeUser'] = [
                    'id' => $row['id'],
                    'user_name' =>$row['name'],
                    'user_name1' =>$row['username'],
                    'faculty' => $row['faculty'],
                    'user_type' => 'student',
                    'username' => $row['username'],
                    'user_photo' => $row['photo'],

                ];
                
                $_SESSION['user_login'] =$username;
                header('location: index.php');
            }
            else
            {
                $status_message = "Your status Inactive!";
            }

        }
        else
        {
            $wrong_pasword = "Wrong Password!";
        }

    }
    else
    {
        $username_not_found = "This user Name not Found!";
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
        <title>Admin Login</title>

        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/animate.css" rel="stylesheet">

        <body>
            <div class="container animated lightSpeedIn">
                <h1 class="text-center">Student</h1>
                </br>

                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">

                        <h2 class="text-center">Student Login Only!</h2>
                        <form action="login.php" method="POST">
                            <div>
                                <input type="text" name="username" required="" class="form-control" placeholder="User name" value="<?php if(isset($username)) { echo($username); }?>" />

                            </div>

                            <div>
                                <input type="password" name="password" required="" class="form-control" placeholder="Password" value="<?php if(isset($password)) { echo($password);}?>" />

                            </div>
                            </br>
                            <div>
                                <input type="submit" name="login" value="login" class="btn btn-info pull-right" />

                            </div>
                            <div>
                                <button type="button" class="btn btn-light"><a href="../home/index.php" style="text-decoration:none">Back!</a></button>

                            </div>

                        </form>

                    </div>

                </div>
            </div>
            </br>
            <?php if (isset($username_not_found)) {

            echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4 text-center">'.$username_not_found . '</div>';

        }   ?>
                <?php if (isset($wrong_pasword)) {

            echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4 text-center">'.$wrong_pasword . '</div>';

        }   ?>
                    <?php if (isset($status_message)) {

            echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4 text-center">'.$status_message . '</div>';

        }   ?>

        </body>

>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
    </html>