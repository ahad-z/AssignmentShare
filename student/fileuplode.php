<<<<<<< HEAD
 <?php
// require'admin/dbcon.php';
// session_start();

// if (isset($_POST['uplod']))
// {
//     $name = $_POST['name'];
//     $contrct = $_POST['contrct'];
//     $code = $_POST['code'];
//     $feculty = $_POST['feculty'];
//     # File Validation Start form Here
//     $file = $_FILES['file']['name'];
//     $file_size = $_FILES['file']['size']; #File Size Check
//     $temp = $_FILES['file']['tmp_name']; # Basically we know that File up in server into temp so then we have to retrieve from tmp folder
//     $permitted = array('jpg','jpeg','png','pdf','doc','pptx','ppt','docx','rar','zip');#check File Formate
//     $div = explode('.', $file); # We check file extension so now we take just extension
//     $file_ext = strtolower(end($div)); #sometime file Extension is capital letter sometime small that's why we convert extension into small letter
//     $uniq_file = substr(md5(time()) , 0, 10) . '.' . $file_ext; #we know user uplode same name same img but we need to change same img name bcz of if same name img up then the previous img replace that's why we make it unique
    
    

//     if (empty($name))
//     {
//         $_SESSION['validation']['name'] = "This field is required";
//     }
//     if (empty($contrct))
//     {
//         $_SESSION['validation']['contrct'] = "This field is required";
//     }
//     if (empty($code))
//     {
//         $_SESSION['validation']['code'] = "This field is required";
//     }
//     if (empty($feculty))
//     {
//         $_SESSION['validation']['feculty'] = "This field is required";
//     }
//     if (empty($file))
//     {
//         $_SESSION['validation']['file'] = "This field is required";
//     }
//     if (!isset($_SESSION['validation']))
//     {

//         if ($file_size <5000000)
//         {
//             if (in_array($file_ext, $permitted))
//             {
//                 move_uploaded_file($temp, '../file/' . $file);
//                 $query = "INSERT INTO `file`(`name`, `contract`, `sub_code`, `faculty`, `file`) VALUES ('$name', '$contrct','$code','$feculty','$file')";
//                 $result = mysqli_query($link, $query);

//                 $_SESSION['message'] = [ 'class' => 'success','message' => 'File uploded Successfully!'];
               


//             }else{
            
//                 $_SESSION['message'] = ['class' => 'danger','message' => 'File Formate Dosen\'t Support!'];
//             }
//         }
//         else{
//             $_SESSION['message'] = ['class' => 'danger','message' => 'File is larger!'];
//         }
       

//     }
//      header('location:fileuplode.php');
//         exit();


// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Registration Form</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Share Ur Assignment Here!</h1>
        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message']['class']; ?>">
            <?php echo $_SESSION['message']['message']; unset($_SESSION['message']); ?>
        </div>
        <?php endif ?>
        <hr />
        <div class="row">
            <div class="col-md-12 col-md-offset-4">
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="control-label col-sm-1">Name</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Enter ur Name" />
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
                        <label for="contrct" class="control-label col-sm-1">Contract Number</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="contrct" type="text" name="contrct" placeholder="01******" pattern="01[1|5|6|7|8|9][0-9]{8}" />
                        </div>
                        <label class="error">
                            <?php
                                if(isset($_SESSION['validation']['contrct']))
                                {
                                    echo $_SESSION['validation']['contrct'];
                                }
                            ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="code" class="control-label col-sm-1">Subject Code</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="code" type="text" name="code" placeholder="Enter ur Subject Code Number" />
                        </div>
                        <label class="error">
                            <?php
                                if(isset($_SESSION['validation']['code']))
                                {
                                echo $_SESSION['validation']['code'];
                                }
                            ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="test" class="control-label col-sm-1">Choose Ur feculty</label>
                        <div class="col-sm-4">
                            <select id="test" class="form-control" name="feculty">
                                <option value="">select</option>
                                <option value="cse">CSE</option>
                                <option value="eee">EEE</option>
                                <option value="civil">CIVIL</option>
                                <option value="ece">ECE</option>
                                <option value="bba">BBA</option>
                            </select>
                        </div>
                        <label class="error">
                            <?php
                                if(isset($_SESSION['validation']['feculty']))
                                {
                                    echo $_SESSION['validation']['feculty'];
                                }
                            ?>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="file" class="control-label col-sm-1">File</label>
                        <div class="col-sm-4">
                            <input type="file" id="file" name="file" />
                        </div>
                        <label class="error">
                            <?php

                                    if(isset($_SESSION['validation']['file']))
                                    {
                                        echo $_SESSION['validation']['file'];
                                    }
                                ?>
                        </label>
                        <label class="error">
                            <?php

                              if(isset($file_format))
                              {
                                echo $file_format;
                              }

                            ?>
                        </label>
                        <label class="error">
                            <?php

                              if(isset($files_size))
                              {
                                echo $files_size;
                              }

                            ?>
                        </label>
                    </div>
                    <div class="col-sm-1 col-sm-offset-1">
                        <input type="submit" value="Upoade" name="uplod" class="btn btn-primary">
                    </div>
                </form>
                <div class="col-sm-4 col-md-offset-2">
                    <a href="index.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <br /><br /><br />
        <div class="text-center">
            <footer>
                <p>copyright &copy: 2019- <?= date('Y') ?> All Right Reseverd</p>
            </footer>
        </div>

    </div>

</body>

</html>
<?php

unset($_SESSION['validation']);
=======
<?php
require_once '../admin/dbcon.php';
session_start();

if (isset($_POST['uplod']))
{
    $name = $_POST['name'];
    $contrct = $_POST['contrct'];
    $code = $_POST['code'];
    $feculty = $_POST['feculty'];
    # File Validation Start form Here
    $file = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size']; #File Size Check
    $temp = $_FILES['file']['tmp_name']; # Basically we know that File up in server into temp so then we have to retrieve from tmp folder
    $permitted = array('jpg','jpeg','png','pdf','doc','pptx','ppt','docx','rar','zip');#check File Formate
    $div = explode('.', $file); # We check file extension so now we take just extension
    $file_ext = strtolower(end($div)); #sometime file Extension is capital letter sometime small that's why we convert extension into small letter
    $uniq_file = substr(md5(time()) , 0, 10) . '.' . $file_ext; #we know user uplode same name same img but we need to change same img name bcz of if same name img up then the previous img replace that's why we make it unique
    
    

    if (empty($name))
    {
        $_SESSION['validation']['name'] = "This field is required";
    }
    if (empty($contrct))
    {
        $_SESSION['validation']['contrct'] = "This field is required";
    }
    if (empty($code))
    {
        $_SESSION['validation']['code'] = "This field is required";
    }
    if (empty($feculty))
    {
        $_SESSION['validation']['feculty'] = "This field is required";
    }
    if (empty($file))
    {
        $_SESSION['validation']['file'] = "This field is required";
    }
    if (!isset($_SESSION['validation']))
    {

        if ($file_size <5000000)
        {
            if (in_array($file_ext, $permitted))
            {
                move_uploaded_file($temp, './file/' . $file);
                $query = "INSERT INTO `file`(`name`, `contract`, `sub_code`, `faculty`, `file`) VALUES ('$name', '$contrct','$code','$feculty','$file')";
                $result = mysqli_query($link, $query);

                $_SESSION['message'] = [ 'class' => 'success','message' => 'File uploded Successfully!'];
               


            }else{
            
                $_SESSION['message'] = ['class' => 'danger','message' => 'File Formate Dosen\'t Support!'];
            }
        }
        else{
            $_SESSION['message'] = ['class' => 'danger','message' => 'File is larger!'];
        }
       

    }
     header('location:fileuplode.php');
        exit();


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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Share Ur Assignment Here!</h1>
        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message']['class']; ?>">
            <?php echo $_SESSION['message']['message']; unset($_SESSION['message']); ?>
        </div>
        <?php endif ?>
        <hr />
        <div class="row">
            <div class="col-md-12 col-md-offset-4">
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="control-label col-sm-1">Name</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Enter ur Name" />
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
                        <label for="contrct" class="control-label col-sm-1">Contract Number</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="contrct" type="text" name="contrct" placeholder="01******" pattern="01[1|5|6|7|8|9][0-9]{8}" />
                        </div>
                        <label class="error">
                            <?php
                                if(isset($_SESSION['validation']['contrct']))
                                {
                                    echo $_SESSION['validation']['contrct'];
                                }
                            ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="code" class="control-label col-sm-1">Subject Code</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="code" type="text" name="code" placeholder="Enter ur Subject Code Number" />
                        </div>
                        <label class="error">
                            <?php
                                if(isset($_SESSION['validation']['code']))
                                {
                                echo $_SESSION['validation']['code'];
                                }
                            ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="test" class="control-label col-sm-1">Choose Ur feculty</label>
                        <div class="col-sm-4">
                            <select id="test" class="form-control" name="feculty">
                                <option value="">select</option>
                                <option value="cse">CSE</option>
                                <option value="eee">EEE</option>
                                <option value="civil">CIVIL</option>
                                <option value="ece">ECE</option>
                                <option value="bba">BBA</option>
                            </select>
                        </div>
                        <label class="error">
                            <?php
                                if(isset($_SESSION['validation']['feculty']))
                                {
                                    echo $_SESSION['validation']['feculty'];
                                }
                            ?>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="file" class="control-label col-sm-1">File</label>
                        <div class="col-sm-4">
                            <input type="file" id="file" name="file" />
                        </div>
                        <label class="error">
                            <?php

                                    if(isset($_SESSION['validation']['file']))
                                    {
                                        echo $_SESSION['validation']['file'];
                                    }
                                ?>
                        </label>
                        <label class="error">
                            <?php

                              if(isset($file_format))
                              {
                                echo $file_format;
                              }

                            ?>
                        </label>
                        <label class="error">
                            <?php

                              if(isset($files_size))
                              {
                                echo $files_size;
                              }

                            ?>
                        </label>
                    </div>
                    <div class="col-sm-1 col-sm-offset-1">
                        <input type="submit" value="Upoade" name="uplod" class="btn btn-primary">
                    </div>
                </form>
                <div class="col-sm-4 col-md-offset-2">
                    <a href="index.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <br /><br /><br />
        <div class="text-center">
            <footer>
                <p>copyright &copy: 2019- <?= date('Y') ?> All Right Reseverd</p>
            </footer>
        </div>

    </div>

</body>

</html>
<?php

unset($_SESSION['validation']);
>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
?>