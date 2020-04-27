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
    <title>Share ur Assignment Here!</title>
     <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
    body{
        background-color: #343A40;
    }
</style>
<body>
     <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><i class="fa fa-home"></i> Home</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li style="margin-top: 15px; color: black;"><img class="rounded" style="width:40px;height: 40px; margin-top: -9px;" src="../home/tea_img/<?=$_SESSION['activeUser']['user_photo'];?>"> <?=$_SESSION['user_login'];?> </li>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="message.php"><i class="fa fa-comments"></i>&nbsp<span class="badge">0</span> Message</a>
                  </li>
                        <li><a href="post_write.php"><i class="fa fa-user"></i> Write_ur Post Here</a></li>
                        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    <div class="container">
        <h1 class="text-center" style="color: white;">Find Ur<b>Assignment!</b></h1>
        </br>

        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">

                <form action="" method="POST">

                    <table class="table table-bordered" style="color: white;">
                        <tr>
                            <td colspan="2" class="text-center">
                                <label>Find ur Assignment Here!</label>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="faculty">choose Faculty</label>
                            </td>
                            <td>
                                <select class="form-control" id="faculty" name="faculty">
                                    <option value="">select</option>
                                    <option value="cse">CSE</option>
                                    <option value="eee">EEE</option>
                                    <option value="civil">CIVI</option>
                                    <option value="ece">ECE</option>
                                    <option value="bba">BBA</option>
                                </select>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="code">Subject Code</label>
                            </td>
                            <td>
                                <input class="form-control" id="code" type="text" name="code"  placeholder="Write Ur subject code here" />
                            </td>
                        </tr>
                        <tr>
                            <td class=" text-center" colspan="2">
                                <input class="btn btn-info btn-lg" type="submit" value="Find!" name="showfile" />
                            </td>
                        </tr>

                    </table>
                </form>
                
    <!-- <div class="form-group">
        
<a class="btn btn-primary" href="profile.php">Back To Profile</a>


    </div> -->
    </div>
</div>
<?php
        require'../admin/dbcon.php';
              if(isset($_POST['showfile'])){
                $sub_cod = $_POST['code'];
                $faculty = $_POST['faculty'];
                $query = "SELECT * FROM `file` WHERE `sub_code` = '$sub_cod' AND `faculty` = '$faculty'";
                $result = mysqli_query($link, $query);

?>

                    
<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered table-striped">
        <thead>
             <?php



    if ($result->num_rows > 0){
      

            ?>
            <tr style="color: white;">
                <th>Uploded BY</th>
                <th>Faculty</th>
                <th>Subject Code</th>
                <th>File</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>
           
            <?php

                     $result = mysqli_query($link,$query);
                     while ($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td>
                        <?= $row['name'];?>
                    </td>
                    <td>
                        <?= $row['faculty'];?>
                    </td>
                    <td>
                        <?= $row['sub_code'];?>
                    </td>
                    <td>
                       <a href="../file/<?=$row['file'];?>"><?=$row['file'];?></a>
                    </td>
                  <td>
                <a href="download.php?id=<?=base64_encode($row['id']);?>" class="btn btn-primary"><i class="fa fa-download"></i> DownLod</a> &nbsp;&nbsp;&nbsp;
                 </td> 
                </tr>

                <?php

                        }
                    }else{
                        ?>
                        <tr>
          <td colspan="8" class="text-danger" style="text-align: center;font-size: 40px;">No Data Available!</td>
        </tr>
    <?php
    } ?>
                        

        </tbody>

    </table>
<?php
                    
}
            
?>
<footer class="footer-area" style="margin-top: 200px;">
            <p>copyright &copy: 2019-
                <?= date('Y') ?> Assignment Share.All Right Reseverd</p>

        </footer>
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
    <title>Share ur Assignment Here!</title>
     <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
    body{
        background-color: #343A40;
    }
</style>
<body>
     <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><i class="fa fa-home"></i> Home</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li style="margin-top: 15px; color: black;"><img class="rounded" style="width:40px;height: 40px; margin-top: -9px;" src="../home/tea_img/<?=$_SESSION['activeUser']['user_photo'];?>"> <?=$_SESSION['user_login'];?> </li>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="message.php"><i class="fa fa-comments"></i>&nbsp<span class="badge">0</span> Message</a>
                  </li>
                        <li><a href="post_write.php"><i class="fa fa-user"></i> Write_ur Post Here</a></li>
                        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    <div class="container">
        <h1 class="text-center" style="color: white;">Find Ur<b>Assignment!</b></h1>
        </br>

        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">

                <form action="" method="POST">

                    <table class="table table-bordered" style="color: white;">
                        <tr>
                            <td colspan="2" class="text-center">
                                <label>Find ur Assignment Here!</label>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="faculty">choose Faculty</label>
                            </td>
                            <td>
                                <select class="form-control" id="faculty" name="faculty">
                                    <option value="">select</option>
                                    <option value="cse">CSE</option>
                                    <option value="eee">EEE</option>
                                    <option value="civil">CIVI</option>
                                    <option value="ece">ECE</option>
                                    <option value="bba">BBA</option>
                                </select>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="code">Subject Code</label>
                            </td>
                            <td>
                                <input class="form-control" id="code" type="text" name="code"  placeholder="Write Ur subject code here" />
                            </td>
                        </tr>
                        <tr>
                            <td class=" text-center" colspan="2">
                                <input class="btn btn-info btn-lg" type="submit" value="Find!" name="showfile" />
                            </td>
                        </tr>

                    </table>
                </form>
                
    <!-- <div class="form-group">
        
<a class="btn btn-primary" href="profile.php">Back To Profile</a>


    </div> -->
    </div>
</div>
<?php
        require'../admin/dbcon.php';
              if(isset($_POST['showfile'])){
                $sub_cod = $_POST['code'];
                $faculty = $_POST['faculty'];
                $query = "SELECT * FROM `file` WHERE `sub_code` = '$sub_cod' AND `faculty` = '$faculty'";
                $result = mysqli_query($link, $query);

?>

                    
<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered table-striped">
        <thead>
             <?php



    if ($result->num_rows > 0){
      

            ?>
            <tr>
                <th>Uploded BY</th>
                <th>Faculty</th>
                <th>Subject Code</th>
                <th>File</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>
           
            <?php

                     $result = mysqli_query($link,$query);
                     while ($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td>
                        <?= $row['name'];?>
                    </td>
                    <td>
                        <?= $row['faculty'];?>
                    </td>
                    <td>
                        <?= $row['sub_code'];?>
                    </td>
                    <td>
                       <a href="../file/<?=$row['file'];?>"><?=$row['file'];?></a>
                    </td>
                  <td>
                <a href="download.php?id=<?=base64_encode($row['id']);?>" class="btn btn-primary"><i class="fa fa-download"></i> DownLod</a> &nbsp;&nbsp;&nbsp;
                 </td> 
                </tr>

                <?php

                        }
                    }else{
                        ?>
                        <tr>
          <td colspan="8" class="text-danger" style="text-align: center;font-size: 40px;">No Data Available!</td>
        </tr>
    <?php
    } ?>
                        

        </tbody>

    </table>
<?php
                    
}
            
?>
<footer class="footer-area" style="margin-top: 200px;">
            <p>copyright &copy: 2019-
                <?= date('Y') ?> Assignment Share.All Right Reseverd</p>

        </footer>
</body>

>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
</html>