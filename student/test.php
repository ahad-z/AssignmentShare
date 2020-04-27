<<<<<<< HEAD
<?php

include '../includes/functions.php';

$fields = [
	'age' => 'required'
];

$validations = validate($fields, $_POST);

?>

<form action="test.php" method="post">
	<?php if ($validations['status'] == 0): ?>
		<?php foreach ($validations['messages'] as $name => $msg): ?>
		<?php echo $msg; ?>
		<?php endforeach ?>
	<?php endif ?>
	<input type="text" name='age'>
	<button>submti</button>
</form>
<?php
 session_start();
require_once '../admin/dbcon.php';
require'action.php';

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
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>

<body class="bg-dark">
    <div class="container-fluid">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" style="color: white;" href="index.php"><i class="fa fa-home"></i> Home</a>
            </div>
            <div class="navbar navbar-brand">
                <ul class="nav justify-content-center">
                    <li style="margin-top: 15px; color: white;"><img class="rounded" style="width:40px;height: 40px; margin-top: -9px;" src="../home/stu_img/<?=$_SESSION['activeUser']['user_photo'];?>"> <?=$_SESSION['user_login'];?> </li>
                    <li class="nav-item"><a class="nav-link" style="color: white;" href="message.php"><i class="fa fa-comments"></i>&nbsp<span class="badge">0</span> Meassage</a>
                    </li>

                    <li class="nav-item"><a class="nav-link" style="color: white;" href="profile.php"><i class="fa fa-user"></i> Profile</a>
                    </li>

                    <li class="nav-item"><a class="nav-link" style="color: white;" href="logout.php"><i class="fa fa-lock"></i> LogOut</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-6 mx-auto rounded bg-light p-3">
                <?php if ($msg != ''): ?>
                <div class="alert alert-info" role="alert">
                    <?php echo $msg; ?>
                </div>
                <?php endif ?>
                 <!--........................................Display Post query  from here!.................... --> 
                <?php
                        $faculty= $_SESSION['activeUser']['faculty'];
                        $sql = "SELECT * FROM `post` WHERE `faculty` ='$faculty'  ORDER BY id DESC";
                        $query = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                    ?>
        <!--........................................Post Display from here!.................... -->
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
                 <!--........................................Leave a comment from here!.................... -->      
                <div class="card my-2">
                    <div class="card-header">Leave a comment Here!</div>
                    <div class="card-body">
                        <form action="index.php" method="POST" class="p-2">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['activeUser']['id']; ?>">
                            <input type="hidden" name="user_type" value="<?php echo $_SESSION['activeUser']['user_type']; ?>">
                            <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="user_name" value="<?php echo $_SESSION['activeUser']['user_name']; ?>">
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
                         <!--........................................Display Query comment from here!.................... --> 
                        <?php
                            $postID = $row['id'];
                            $commentSQL = "SELECT * FROM comment_table WHERE post_id = '$postID' ORDER BY id ASC";
                            $commentResult = mysqli_query($link, $commentSQL);
                            while ($comment = mysqli_fetch_assoc($commentResult)) {
                             $tableName = $comment['user_type'];
                            $userResult = mysqli_query($link, "SELECT * FROM $tableName WHERE id = '$comment[user_id]'");
                            $commentUser = mysqli_fetch_assoc($userResult);
                                if ($tableName == 'student') {
                                    $imgDir = 'stu_img';
                                }else{
                                    $imgDir = 'tea_img';

                                }
                        ?>
                         <!--........................................Display comment from here!.................... --> 
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

include '../includes/functions.php';

$fields = [
	'age' => 'required'
];

$validations = validate($fields, $_POST);

?>

<form action="test.php" method="post">
	<?php if ($validations['status'] == 0): ?>
		<?php foreach ($validations['messages'] as $name => $msg): ?>
		<?php echo $msg; ?>
		<?php endforeach ?>
	<?php endif ?>
	<input type="text" name='age'>
	<button>submti</button>
</form>
<?php
 session_start();
require_once '../admin/dbcon.php';
require'action.php';

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
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>

<body class="bg-dark">
    <div class="container-fluid">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" style="color: white;" href="index.php"><i class="fa fa-home"></i> Home</a>
            </div>
            <div class="navbar navbar-brand">
                <ul class="nav justify-content-center">
                    <li style="margin-top: 15px; color: white;"><img class="rounded" style="width:40px;height: 40px; margin-top: -9px;" src="../home/stu_img/<?=$_SESSION['activeUser']['user_photo'];?>"> <?=$_SESSION['user_login'];?> </li>
                    <li class="nav-item"><a class="nav-link" style="color: white;" href="message.php"><i class="fa fa-comments"></i>&nbsp<span class="badge">0</span> Meassage</a>
                    </li>

                    <li class="nav-item"><a class="nav-link" style="color: white;" href="profile.php"><i class="fa fa-user"></i> Profile</a>
                    </li>

                    <li class="nav-item"><a class="nav-link" style="color: white;" href="logout.php"><i class="fa fa-lock"></i> LogOut</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-6 mx-auto rounded bg-light p-3">
                <?php if ($msg != ''): ?>
                <div class="alert alert-info" role="alert">
                    <?php echo $msg; ?>
                </div>
                <?php endif ?>
                 <!--........................................Display Post query  from here!.................... --> 
                <?php
                        $faculty= $_SESSION['activeUser']['faculty'];
                        $sql = "SELECT * FROM `post` WHERE `faculty` ='$faculty'  ORDER BY id DESC";
                        $query = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                    ?>
        <!--........................................Post Display from here!.................... -->
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
                 <!--........................................Leave a comment from here!.................... -->      
                <div class="card my-2">
                    <div class="card-header">Leave a comment Here!</div>
                    <div class="card-body">
                        <form action="index.php" method="POST" class="p-2">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['activeUser']['id']; ?>">
                            <input type="hidden" name="user_type" value="<?php echo $_SESSION['activeUser']['user_type']; ?>">
                            <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="user_name" value="<?php echo $_SESSION['activeUser']['user_name']; ?>">
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
                         <!--........................................Display Query comment from here!.................... --> 
                        <?php
                            $postID = $row['id'];
                            $commentSQL = "SELECT * FROM comment_table WHERE post_id = '$postID' ORDER BY id ASC";
                            $commentResult = mysqli_query($link, $commentSQL);
                            while ($comment = mysqli_fetch_assoc($commentResult)) {
                             $tableName = $comment['user_type'];
                            $userResult = mysqli_query($link, "SELECT * FROM $tableName WHERE id = '$comment[user_id]'");
                            $commentUser = mysqli_fetch_assoc($userResult);
                                if ($tableName == 'student') {
                                    $imgDir = 'stu_img';
                                }else{
                                    $imgDir = 'tea_img';

                                }
                        ?>
                         <!--........................................Display comment from here!.................... --> 
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