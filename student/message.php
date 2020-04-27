<<<<<<< HEAD
 <?php
 session_start();
require_once '../admin/dbcon.php';
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
     <title>SMS</title>
     <link href="../css/bootstrap.min.css" rel="stylesheet">
     <link href="../css/font-awesome.min.css" rel="stylesheet">
     <link href="style.css" rel="stylesheet">
 </head>
 <style type="text/css">
     body {
         background-image: url("chat.jpg");
         background-repeat: no-repeat;
              }

     .wrapper {
         height: 600px;
         width: 500px;
        background-color: black;
         opacity: .9;
         margin: -20px auto;
         padding: 10px;
     }

     .form-control {
         height: 47px;
         width: 76%;
     }

     .msg {
         height: 450px;
         overflow-y: scroll;

     }

     .btn-info {
         background-color: #02c5b6;

     }

     .chat {
         display: flex;
         flex-flow: row wrap;
     }

     .student .chatbox {
         height: 50px;
         width: 400px;
         padding: 13px 10px;
         background-color: #674141;
         color: white;
         border-radius: 10px;
         order: -1;
     }

     .teacher .chatbox {
         height: 50px;
         width: 400px;
         padding: 13px 10px;
         background-color: #415ca2;
         color: white;
         border-radius: 10px;

     }
 </style>

 <body>
     <nav class="navbar navbar-default">
         <div class="container-fluid">
             <div class="navbar-header">
                 <a class="navbar-brand" href="index.php">Student</a>
             </div>
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <ul class="nav navbar-nav navbar-right">
                     <li style="margin-top: 15px"><img class="img-circle" style="width:35px;height: 35px; margin-top: -9px;" src="../home/stu_img/<?=$_SESSION['activeUser']['user_photo'];?>"> <?=$_SESSION['user_login'];?> </li>
                     </li>
                     <li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span> Message</a></li>
                     <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                     <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                 </ul>
             </div>
         </div>
     </nav>
     <!-- Php Code Start From here -->
     <?php
require'../admin/dbcon.php';
 $user_id = $_SESSION['activeUser']['id'];
  $user_name = $_SESSION['activeUser']['user_name1'];
 $user_faculty =  $_SESSION['activeUser']['faculty'];
if(isset($_POST['submit'])){
    $user_id = $_POST['user_id'];
    $faculty = $_POST['faculty'];
   $msg =  mysqli_real_escape_string($link,$_POST['chat']);
    $query = "INSERT INTO `message`(`user_id`,`username`, `faculty`, `messages`, `status`, `sender`) VALUES ('$user_id','$_SESSION[user_login]','$faculty','$msg','no','student')";
     $query_run = mysqli_query($link, $query);
    $result = mysqli_query($link, "SELECT * FROM `message` WHERE `faculty` = '$user_faculty'");
 }else{
       $result = mysqli_query($link, "SELECT * FROM `message` WHERE `faculty` = '$user_faculty'");
        // $Test_img = mysqli_query($link, "SELECT * FROM `message` WHERE `user_id` = '$user_id' AND `username` = '$user_name'");
        // $Test_row = mysqli_fetch_assoc($Test_img);
        // $Test_id = $Test_row['user_id'];
        // $test_name=  $Test_row['username'];
        // $catch_img = mysqli_query($link, "SELECT * FROM `student` WHERE `id` = '$Test_id' AND `username` = '$test_name'");
        // $catch_row = mysqli_fetch_assoc($catch_img);
                 

 }
 ?>
     <div class="wrapper">
         <!-- <div style="height: 70px; width: 100%;background-color:#2eac8b;text-align: center;color: white">
            <h3 style="margin-top: -5px; padding-top: 5px;padding-top: 10px;">Fun</h3>
        </div> -->
         <div class="msg">
             <?php
                while ($row = mysqli_fetch_assoc($result)) {
                   $tableName = $row['sender'];
                   $userResult = mysqli_query($link, "SELECT * FROM $tableName WHERE id = '$row[user_id]'");
                   $MessageUser = mysqli_fetch_assoc($userResult);
                   if ($tableName == 'student') {
                        $imgDir = 'stu_img';
                        }else{
                          $imgDir = 'tea_img';
                          }
                if($row['sender'] == 'student'){
                   
            ?>
             <!-- ............................For student....... -->
             <div class="chat teacher">
                 <div style="float:left; padding-top: 5px;">
                     &nbsp
                     <img class="img-circle" style="height: 32px; width: 32px" src="../home/<?php echo $imgDir . '/' . $MessageUser['photo'] ?>" alt="...">
                     &nbsp
                 </div>
                 <div style="float: left;" class="chatbox">
                     <?= $row['messages'];?>
                 </div>
             </div>
             <?php 
             }
             else{
         
         ?>
             <div class="chat student">
                 <div style="float:left; padding-top: 5px;">
                     &nbsp
                     <img class="img-circle" style="height: 32px; width: 32px" src="../home/<?php echo $imgDir . '/' . $MessageUser['photo'] ?>" alt="...">
                     &nbsp
                 </div>
                 <div style="float: left;" class="chatbox">
                     <?= $row['messages'];?>
                 </div>
             </div>

             <?php }
      ?>
             <!-- ............................For Admin........................... -->
             <br>
             <?php 
                }
         ?>
         </div>
         <div style="height: 100px;padding-top: 10px; ">
             <form action="" method="POST">
                  <input type="hidden" name="user_id" value="<?=$_SESSION['activeUser']['id'];?>">
                 <input type="hidden" name="faculty" value="<?=$_SESSION['activeUser']['faculty'];?>">
                 <input type="text" name="chat" class="form-control" required="" placeholder="Write ur message...." style="float:left;">&nbsp
                 <button class="btn btn-info btn-lg" type="submit" name="submit"><span class="glyphicon glyphicon-send"></span> SEND</button>
             </form>
         </div>

     </div>

 </body>

=======
 <?php
 session_start();
require_once '../admin/dbcon.php';
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
     <title>SMS</title>
     <link href="../css/bootstrap.min.css" rel="stylesheet">
     <link href="../css/font-awesome.min.css" rel="stylesheet">
     <link href="style.css" rel="stylesheet">
 </head>
 <style type="text/css">
     body {
         background-image: url("chat.jpg");
         background-repeat: no-repeat;
              }

     .wrapper {
         height: 600px;
         width: 500px;
        background-color: black;
         opacity: .9;
         margin: -20px auto;
         padding: 10px;
     }

     .form-control {
         height: 47px;
         width: 76%;
     }

     .msg {
         height: 450px;
         overflow-y: scroll;

     }

     .btn-info {
         background-color: #02c5b6;

     }

     .chat {
         display: flex;
         flex-flow: row wrap;
     }

     .student .chatbox {
         height: 50px;
         width: 400px;
         padding: 13px 10px;
         background-color: #674141;
         color: white;
         border-radius: 10px;
         order: -1;
     }

     .teacher .chatbox {
         height: 50px;
         width: 400px;
         padding: 13px 10px;
         background-color: #415ca2;
         color: white;
         border-radius: 10px;

     }
 </style>

 <body>
     <nav class="navbar navbar-default">
         <div class="container-fluid">
             <div class="navbar-header">
                 <a class="navbar-brand" href="index.php">Student</a>
             </div>
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <ul class="nav navbar-nav navbar-right">
                     <li style="margin-top: 15px"><img class="img-circle" style="width:35px;height: 35px; margin-top: -9px;" src="../home/stu_img/<?=$_SESSION['activeUser']['user_photo'];?>"> <?=$_SESSION['user_login'];?> </li>
                     </li>
                     <li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span> Message</a></li>
                     <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                     <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                 </ul>
             </div>
         </div>
     </nav>
     <!-- Php Code Start From here -->
     <?php
require'../admin/dbcon.php';
 $user_id = $_SESSION['activeUser']['id'];
  $user_name = $_SESSION['activeUser']['user_name1'];
 $user_faculty =  $_SESSION['activeUser']['faculty'];
if(isset($_POST['submit'])){
    $user_id = $_POST['user_id'];
    $faculty = $_POST['faculty'];
   $msg =  mysqli_real_escape_string($link,$_POST['chat']);
    $query = "INSERT INTO `message`(`user_id`,`username`, `faculty`, `messages`, `status`, `sender`) VALUES ('$user_id','$_SESSION[user_login]','$faculty','$msg','no','student')";
     $query_run = mysqli_query($link, $query);
    $result = mysqli_query($link, "SELECT * FROM `message` WHERE `faculty` = '$user_faculty'");
 }else{
       $result = mysqli_query($link, "SELECT * FROM `message` WHERE `faculty` = '$user_faculty'");
        // $Test_img = mysqli_query($link, "SELECT * FROM `message` WHERE `user_id` = '$user_id' AND `username` = '$user_name'");
        // $Test_row = mysqli_fetch_assoc($Test_img);
        // $Test_id = $Test_row['user_id'];
        // $test_name=  $Test_row['username'];
        // $catch_img = mysqli_query($link, "SELECT * FROM `student` WHERE `id` = '$Test_id' AND `username` = '$test_name'");
        // $catch_row = mysqli_fetch_assoc($catch_img);
                 

 }
 ?>
     <div class="wrapper">
         <!-- <div style="height: 70px; width: 100%;background-color:#2eac8b;text-align: center;color: white">
            <h3 style="margin-top: -5px; padding-top: 5px;padding-top: 10px;">Fun</h3>
        </div> -->
         <div class="msg">
             <?php
                while ($row = mysqli_fetch_assoc($result)) {
                   $tableName = $row['sender'];
                   $userResult = mysqli_query($link, "SELECT * FROM $tableName WHERE id = '$row[user_id]'");
                   $MessageUser = mysqli_fetch_assoc($userResult);
                   if ($tableName == 'student') {
                        $imgDir = 'stu_img';
                        }else{
                          $imgDir = 'tea_img';
                          }
                if($row['sender'] == 'student'){
                   
            ?>
             <!-- ............................For student....... -->
             <div class="chat teacher">
                 <div style="float:left; padding-top: 5px;">
                     &nbsp
                     <img class="img-circle" style="height: 32px; width: 32px" src="../home/<?php echo $imgDir . '/' . $MessageUser['photo'] ?>" alt="...">
                     &nbsp
                 </div>
                 <div style="float: left;" class="chatbox">
                     <?= $row['messages'];?>
                 </div>
             </div>
             <?php 
             }
             else{
         
         ?>
             <div class="chat student">
                 <div style="float:left; padding-top: 5px;">
                     &nbsp
                     <img class="img-circle" style="height: 32px; width: 32px" src="../home/<?php echo $imgDir . '/' . $MessageUser['photo'] ?>" alt="...">
                     &nbsp
                 </div>
                 <div style="float: left;" class="chatbox">
                     <?= $row['messages'];?>
                 </div>
             </div>

             <?php }
      ?>
             <!-- ............................For Admin........................... -->
             <br>
             <?php 
                }
         ?>
         </div>
         <div style="height: 100px;padding-top: 10px; ">
             <form action="" method="POST">
                  <input type="hidden" name="user_id" value="<?=$_SESSION['activeUser']['id'];?>">
                 <input type="hidden" name="faculty" value="<?=$_SESSION['activeUser']['faculty'];?>">
                 <input type="text" name="chat" class="form-control" required="" placeholder="Write ur message...." style="float:left;">&nbsp
                 <button class="btn btn-info btn-lg" type="submit" name="submit"><span class="glyphicon glyphicon-send"></span> SEND</button>
             </form>
         </div>

     </div>

 </body>

>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
 </html>