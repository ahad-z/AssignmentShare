<<<<<<< HEAD
 <?php
 session_start();
require'../admin/dbcon.php';
require 'action.php';
if(!isset($_SESSION['user_login'])){
header('location:login.php');
}
?>
<?php
require '../admin/dbcon.php';
if(isset($_POST['submits'])){
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $faculty = strtolower($_POST['faculty']);
    $title = mysqli_real_escape_string($link,$_POST['title']);
    $post = mysqli_real_escape_string($link,$_POST['post']);
    $date = date("Y-m-d");

    $sql = "INSERT INTO `post`(`user_id`, `teacher_name`, `faculty`, `title`, `post`, `date_time`) VALUES ('$user_id','$name','$faculty','$title','$post','$date')";

    $query = mysqli_query($link, $sql);
    if($query){
       $msg = "Posted Successfully!";
    }else{
        $msg = "Wrong";
    }
}
if(isset($_POST['replys'])){
$comment_id = $_POST['com_id'];
$Reply_User_id = $_POST['Reply_User_id'];
$user_replay = $_POST['user_replay'];
$rply = mysqli_real_escape_string($link, $_POST['rply']);
$reply_sql = "INSERT INTO replays (comment_id,user_id,replay,user_type) VALUES ('$comment_id','$Reply_User_id','$rply','$user_replay')";
$reply_query = mysqli_query($link, $reply_sql);
}
  
 ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Assignment Share</title>
        <link href="../css/font-awesome.min.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="../student/css/bootstrap.min.css">
    </head>
    <style>
        #round_p{
    border-radius: 25px;
    border: 2px solid gray;
    padding: 20px;
    width: 100%;
    height: 10%;
    }#round_rply{
    border-radius: 25px;
    border: 2px solid gray;
    padding: 20px;
    width: 100%;
    height: 15px;
    }
    </style>
    <body class="bg-dark">
        <div class="container-fluid">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" style="color: white;" href="index.php" ><i class="fa fa-home"></i> Home</a>
                </div>
                <div class="navbar navbar-brand">
                <ul class="nav justify-content-center">
                  <<li style="margin-top: 15px; color: white;"><img class="rounded" style="width:40px;height: 40px; margin-top: -9px;" src="../home/tea_img/<?=$_SESSION['activeUser']['user_photo'];?>"> <?=$_SESSION['user_login'];?> </li>
                  <li class="nav-item"><a class="nav-link" style="color: white;" href="message.php"><i class="fa fa-comments"></i>&nbsp<span class="badge bg-green">0</span> Meassage</a>
                  </li>

                  <li class="nav-item"><a class="nav-link" style="color: white;" href="profile.php"><i class="fa fa-user"></i> Profile</a>
                  </li>

                  <li class="nav-item"><a class="nav-link" style="color: white;"href="logout.php"><i class="fa fa-lock"></i> LogOut</a>
                  </li>

                </ul>
            </div>
        </nav>
                <div class="row">
                    <?php if (isset($msg)&& $msg != '' ): ?>
                <div class="col-lg-6 d-block mx-auto">
                        <div class="alert alert-info" role="alert">
                            <?php echo $msg; ?>
                        </div>
                </div>
                    <?php endif ?>
                </div>
                <!-- ........................................This section for Post written.......................................... -->
            <div class="row justify-content-center mb-2">
                <div class="col-lg-6 bg-light rounded mt-2">
                    <h4 class="text-center p-2">Enter Ur Post Here!</h4>
                    <form action="" method="POST" class="p-2">
                        <div class="form-group">
                          <input type="hidden" name="user_id" value="<?php echo $_SESSION['activeUser']['id'];?>" >
                            <input type="text" name="name" class="form-control rounded-0" placeholder="Enter your Name" required value="">
                        </div>
                        <div class="form-group">
                            <input type="text" name="faculty" class="form-control rounded-0" placeholder="Enter Ur target faculty" required ="">
                        </div>
                        <div class="form-group">
                            <input type="text" name="title" class="form-control rounded-0" placeholder="Enter Ur POst title" required ="">
                        </div>
                        <div class="form-group">
                            <textarea name="post" class="form-control rounded-0" placeholder="Enter your Comment Here!" required></textarea>
                        </div>
                        <div class="from-group">
                        <input type="submit" name="submits" class="btn btn-primary" value="Post">
                        </div>
                    </form>
                </div>
            </div>
             <!-- ..........................From this Start show all Post..........  -->
             <<div class="row justify-content-center">
                <div class="col-md-6 mx-auto rounded bg-light p-3">
                    
                    <?php
                        $faculty= $_SESSION['activeUser']['faculty'];
                        $sql = "SELECT * FROM `post` WHERE `faculty` ='$faculty'  ORDER BY id DESC";
                        $query = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                    ?>

                    <div class="card my-2 border-secondary">
                        <div class="card-header bg-secondary py-1 text-light">
                            <h5>Post Title : <span class="text-lead"><?=$row['title'];?></span></h5>
                        </div>
                        <p class="lead">Posted by
                            <a><?=$row['teacher_name'];?> Sir</a>
                        </p>
                        <hr>
                        <p>Posted on :
                            <?=$row['date_time'];?>
                        </p>
                        <hr>
                        <div class="card-body py-2">
                            <p class="lead" style="font-size: 18px; font-style: italic;">
                                <?=$row['post'];?>
                            </p>
                        </div>
                    </div>

                    <div class="card my-2">
                        <div class="card-header">Leave a comment Here!</div>
                        <div class="card-body">
                            <form action="" method="POST" class="p-2">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['activeUser']['id']; ?>">
                                <input type="hidden" name="user_type" value="<?php echo $_SESSION['activeUser']['user_type']; ?>">
                                <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="user_name" value="<?php echo $_SESSION['activeUser']['user_name'];?>">
                                <div class="form-group">
                                    <textarea name="comment" class="form-control rounded-0" placeholder="Enter your Comment Here!" required=""></textarea>
                                </div>
                                <div class="from-group">
                                    <input type="submit" name="submit" class="btn btn-primary rounded-0" value="Post Comment">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card my-2">
                        <div class="card-body">
                        <?php
                            $postID = $row['id'];
                            $commentSQL = "SELECT * FROM comment_table WHERE post_id = '$postID' ORDER BY id ASC";
                            $commentResult = mysqli_query($link, $commentSQL);
                            while ($comment = mysqli_fetch_assoc($commentResult)) {
                                $tableName = $comment['user_type'];
                                if ($tableName == 'teacher') {
                                    $imgDir = 'tea_img';
                                }else{
                                    $imgDir = 'stu_img';

                                }
                            $userResult = mysqli_query($link, "SELECT * FROM  $tableName WHERE id = '$comment[user_id]'");
                            $commentUser = mysqli_fetch_assoc($userResult);
                        ?>
                        <!-- ........................................This for show comment!.......................................... -->
                            <div class="media">
                             <img style="height: 32px; width: 32px" src="../home/<?php echo $imgDir . '/' . $commentUser['photo'] ?>" class="mr-3 rounded-circle" alt="..."> 
                                <div class="media-body">
                                    <p style="font-size: 15px;" class="mt-0">
                                        Comment By : <?= $comment['name'];?>
                                            <?php if ($comment['user_type'] == 'teacher'): ?>
                                                 <span class="badge badge-success"><?php echo $comment['user_type'] ?></span>
                                            <?php else: ?>
                                                 <span class="badge badge-info"><?php echo $comment['user_type'] ?></span>
                                            <?php endif ?> 
                                    </p>
                                    <span class="text-muted">On : <?= $comment['cur_date'];?></span>
                                    <?= $comment['comment'];?>
                                </div>
                                <button id="replyBTN_<?=$comment['id']; ?>" style="float: right; margin-top: 0px" class="btn btn-primary"><i class="fa fa-reply"></i> Replay</button>
                            </div>
                    <!-- ........................................Replay Btn JAVA Script  .......................................... -->
                        <script>
                        document.getElementById("replyBTN_<?=$comment['id']; ?>").addEventListener("click", function() {
                        var mydiv = document.getElementById("replyForm_<?=$comment['id']; ?>");
                        if (mydiv.style.display == "block") {
                        mydiv.style.display = "none";
                        } else {
                        mydiv.style.display = "block";
                        }
                        })
                        </script>
                             <!-- .......................................From here replay show ...................-->
                            <?php
                require'../admin/dbcon.php';
                $com_id = $comment['id'];
                $replay = "SELECT * FROM `replays` WHERE `comment_id` = '$com_id'  order by id ASC";
                $runs = mysqli_query($link, $replay);
                ?>
                <?php while ($replay_row = mysqli_fetch_assoc($runs)) {?>
                    <?php
                    require'../admin/dbcon.php';
                   $Catch_Comment_id = $comment['id'];
                  $Catch_table = $replay_row['user_type'];
                   if($Catch_table == 'teacher') {
                $Reply_imgDir = 'tea_img';
                }else{
                $Reply_imgDir = 'stu_img';
                }
                    $Catch_id =mysqli_query($link, "SELECT * FROM $Catch_table WHERE id ='$replay_row[user_id]'");
                    $Catch_Data = mysqli_fetch_assoc($Catch_id)
                    ?>
                <div class="media" style="margin-left: 70px; margin-top: -5px">
                    <div class="card-body ">
                        <p id="round_p" style="margin-top:-10px; background-color:#F2F3F5;"> <img style="height: 32px; width: 32px" src="../home/<?php echo $Reply_imgDir . '/' . $Catch_Data['photo'];?>" class="mr-3 rounded-circle" alt="..."> <?=$replay_row['replay'];?></p>
                    </div>
                </div>
                <?php
                } ?>
                 <div id="replyForm_<?=$comment['id']; ?>" style="display: none;" class="media-body" style="margin-left: 60px;">
                    <form action="" method="POST">
                        <input type="hidden" name="com_id" value="<?=$comment['id'];?>">
                        <input type="hidden" name="Reply_User_id" value="<?= $_SESSION['activeUser']['id']?>">
                        <input type="hidden" name="user_replay" value="teacher">
                        <input style="background-color: #F2F3F5;" id="round_rply" type="text" name="rply" class="form-control" placeholder="Write ur Replay"><br>
                        <input type="submit" name="replys" class="btn btn-primary" value="reply!">
                    </form>
                </div>
                        <?php  }?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>


    </body>
=======
 <?php
 session_start();
require'../admin/dbcon.php';
require 'action.php';
if(!isset($_SESSION['user_login'])){
header('location:login.php');
}
?>
<?php
require '../admin/dbcon.php';
if(isset($_POST['submits'])){
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $faculty = strtolower($_POST['faculty']);
    $title = mysqli_real_escape_string($link,$_POST['title']);
    $post = mysqli_real_escape_string($link,$_POST['post']);
    $date = date("Y-m-d");

    $sql = "INSERT INTO `post`(`user_id`, `teacher_name`, `faculty`, `title`, `post`, `date_time`) VALUES ('$user_id','$name','$faculty','$title','$post','$date')";

    $query = mysqli_query($link, $sql);
    if($query){
       $msg = "Posted Successfully!";
    }else{
        $msg = "Wrong";
    }
}
if(isset($_POST['replys'])){
$comment_id = $_POST['com_id'];
$Reply_User_id = $_POST['Reply_User_id'];
$user_replay = $_POST['user_replay'];
$rply = $_POST['rply'];
$reply_sql = "INSERT INTO replays (comment_id,user_id,replay,user_type) VALUES ('$comment_id','$Reply_User_id','$rply','$user_replay')";
$reply_query = mysqli_query($link, $reply_sql);
}
  
 ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Assignment Share</title>
        <link href="../css/font-awesome.min.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="../student/css/bootstrap.min.css">
    </head>
    <style>
        #round_p{
    border-radius: 25px;
    border: 2px solid gray;
    padding: 20px;
    width: 100%;
    height: 10%;
    }#round_rply{
    border-radius: 25px;
    border: 2px solid gray;
    padding: 20px;
    width: 100%;
    height: 15px;
    }
    </style>
    <body class="bg-dark">
        <div class="container-fluid">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" style="color: white;" href="index.php" ><i class="fa fa-home"></i> Home</a>
                </div>
                <div class="navbar navbar-brand">
                <ul class="nav justify-content-center">
                  <<li style="margin-top: 15px; color: white;"><img class="rounded" style="width:40px;height: 40px; margin-top: -9px;" src="../home/tea_img/<?=$_SESSION['activeUser']['user_photo'];?>"> <?=$_SESSION['user_login'];?> </li>
                  <li class="nav-item"><a class="nav-link" style="color: white;" href="message.php"><i class="fa fa-comments"></i>&nbsp<span class="badge bg-green">0</span> Meassage</a>
                  </li>

                  <li class="nav-item"><a class="nav-link" style="color: white;" href="profile.php"><i class="fa fa-user"></i> Profile</a>
                  </li>

                  <li class="nav-item"><a class="nav-link" style="color: white;"href="logout.php"><i class="fa fa-lock"></i> LogOut</a>
                  </li>

                </ul>
            </div>
        </nav>
                <div class="row">
                    <?php if (isset($msg)&& $msg != '' ): ?>
                <div class="col-lg-6 d-block mx-auto">
                        <div class="alert alert-info" role="alert">
                            <?php echo $msg; ?>
                        </div>
                </div>
                    <?php endif ?>
                </div>
                <!-- ........................................This section for Post written.......................................... -->
            <div class="row justify-content-center mb-2">
                <div class="col-lg-6 bg-light rounded mt-2">
                    <h4 class="text-center p-2">Enter Ur Post Here!</h4>
                    <form action="" method="POST" class="p-2">
                        <div class="form-group">
                          <input type="hidden" name="user_id" value="<?php echo $_SESSION['activeUser']['id'];?>" >
                            <input type="text" name="name" class="form-control rounded-0" placeholder="Enter your Name" required value="">
                        </div>
                        <div class="form-group">
                            <input type="text" name="faculty" class="form-control rounded-0" placeholder="Enter Ur target faculty" required ="">
                        </div>
                        <div class="form-group">
                            <input type="text" name="title" class="form-control rounded-0" placeholder="Enter Ur POst title" required ="">
                        </div>
                        <div class="form-group">
                            <textarea name="post" class="form-control rounded-0" placeholder="Enter your Comment Here!" required></textarea>
                        </div>
                        <div class="from-group">
                        <input type="submit" name="submits" class="btn btn-primary" value="Post">
                        </div>
                    </form>
                </div>
            </div>
             <!-- ..........................From this Start show all Post..........  -->
             <<div class="row justify-content-center">
                <div class="col-md-6 mx-auto rounded bg-light p-3">
                    
                    <?php
                        $faculty= $_SESSION['activeUser']['faculty'];
                        $sql = "SELECT * FROM `post` WHERE `faculty` ='$faculty'  ORDER BY id DESC";
                        $query = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                    ?>

                    <div class="card my-2 border-secondary">
                        <div class="card-header bg-secondary py-1 text-light">
                            <h5>Post Title : <span class="text-lead"><?=$row['title'];?></span></h5>
                        </div>
                        <p class="lead">Posted by
                            <a><?=$row['teacher_name'];?> Sir</a>
                        </p>
                        <hr>
                        <p>Posted on :
                            <?=$row['date_time'];?>
                        </p>
                        <hr>
                        <div class="card-body py-2">
                            <p class="lead" style="font-size: 18px; font-style: italic;">
                                <?=$row['post'];?>
                            </p>
                        </div>
                    </div>

                    <div class="card my-2">
                        <div class="card-header">Leave a comment Here!</div>
                        <div class="card-body">
                            <form action="" method="POST" class="p-2">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['activeUser']['id']; ?>">
                                <input type="hidden" name="user_type" value="<?php echo $_SESSION['activeUser']['user_type']; ?>">
                                <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="user_name" value="<?php echo $_SESSION['activeUser']['user_name'];?>">
                                <div class="form-group">
                                    <textarea name="comment" class="form-control rounded-0" placeholder="Enter your Comment Here!" required=""></textarea>
                                </div>
                                <div class="from-group">
                                    <input type="submit" name="submit" class="btn btn-primary rounded-0" value="Post Comment">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card my-2">
                        <div class="card-body">
                        <?php
                            $postID = $row['id'];
                            $commentSQL = "SELECT * FROM comment_table WHERE post_id = '$postID' ORDER BY id ASC";
                            $commentResult = mysqli_query($link, $commentSQL);
                            while ($comment = mysqli_fetch_assoc($commentResult)) {
                                $tableName = $comment['user_type'];
                                if ($tableName == 'teacher') {
                                    $imgDir = 'tea_img';
                                }else{
                                    $imgDir = 'stu_img';

                                }
                            $userResult = mysqli_query($link, "SELECT * FROM  $tableName WHERE id = '$comment[user_id]'");
                            $commentUser = mysqli_fetch_assoc($userResult);
                        ?>
                        <!-- ........................................This for show comment!.......................................... -->
                            <div class="media">
                             <img style="height: 32px; width: 32px" src="../home/<?php echo $imgDir . '/' . $commentUser['photo'] ?>" class="mr-3 rounded-circle" alt="..."> 
                                <div class="media-body">
                                    <p style="font-size: 15px;" class="mt-0">
                                        Comment By : <?= $comment['name'];?>
                                            <?php if ($comment['user_type'] == 'teacher'): ?>
                                                 <span class="badge badge-success"><?php echo $comment['user_type'] ?></span>
                                            <?php else: ?>
                                                 <span class="badge badge-info"><?php echo $comment['user_type'] ?></span>
                                            <?php endif ?> 
                                    </p>
                                    <span class="text-muted">On : <?= $comment['cur_date'];?></span>
                                    <?= $comment['comment'];?>
                                </div>
                                <button id="replyBTN_<?=$comment['id']; ?>" style="float: right; margin-top: 0px" class="btn btn-primary"><i class="fa fa-reply"></i> Replay</button>
                            </div>
                    <!-- ........................................Replay Btn JAVA Script  .......................................... -->
                        <script>
                        document.getElementById("replyBTN_<?=$comment['id']; ?>").addEventListener("click", function() {
                        var mydiv = document.getElementById("replyForm_<?=$comment['id']; ?>");
                        if (mydiv.style.display == "block") {
                        mydiv.style.display = "none";
                        } else {
                        mydiv.style.display = "block";
                        }
                        })
                        </script>
                             <!-- .......................................From here replay show ...................-->
                            <?php
                require'../admin/dbcon.php';
                $com_id = $comment['id'];
                $replay = "SELECT * FROM `replays` WHERE `comment_id` = '$com_id'  order by id ASC";
                $runs = mysqli_query($link, $replay);
                ?>
                <?php while ($replay_row = mysqli_fetch_assoc($runs)) {?>
                    <?php
                    require'../admin/dbcon.php';
                   $Catch_Comment_id = $comment['id'];
                  $Catch_table = $replay_row['user_type'];
                   if($Catch_table == 'teacher') {
                $Reply_imgDir = 'tea_img';
                }else{
                $Reply_imgDir = 'stu_img';
                }
                    $Catch_id =mysqli_query($link, "SELECT * FROM $Catch_table WHERE id ='$replay_row[user_id]'");
                    $Catch_Data = mysqli_fetch_assoc($Catch_id)
                    ?>
                <div class="media" style="margin-left: 70px; margin-top: -5px">
                    <div class="card-body ">
                        <p id="round_p" style="margin-top:-10px; background-color:#F2F3F5;"> <img style="height: 32px; width: 32px" src="../home/<?php echo $Reply_imgDir . '/' . $Catch_Data['photo'];?>" class="mr-3 rounded-circle" alt="..."> <?=$replay_row['replay'];?></p>
                    </div>
                </div>
                <?php
                } ?>
                 <div id="replyForm_<?=$comment['id']; ?>" style="display: none;" class="media-body" style="margin-left: 60px;">
                    <form action="" method="POST">
                        <input type="hidden" name="com_id" value="<?=$comment['id'];?>">
                        <input type="hidden" name="Reply_User_id" value="<?= $_SESSION['activeUser']['id']?>">
                        <input type="hidden" name="user_replay" value="teacher">
                        <input style="background-color: #F2F3F5;" id="round_rply" type="text" name="rply" class="form-control" placeholder="Write ur Replay"><br>
                        <input type="submit" name="replys" class="btn btn-primary" value="reply!">
                    </form>
                </div>
                        <?php  }?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>


    </body>
>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
    </html>