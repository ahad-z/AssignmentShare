<<<<<<< HEAD
<?php
require_once './dbcon.php';
if(!isset($_SESSION['user_login'])){

header('location:login.php');
}
?>
<h1 class="text-primary"><i class="fa fa-user"></i> Update Informationl</h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-User"></i> Update</li>
</ol>

<?php
$user_name = base64_decode($_GET['username']);
$result = mysqli_query($link, "SELECT * FROM `admin` WHERE `username` = '$user_name'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
		 $name = $_POST['name'];
		 $email = $_POST['email'];
		 $status = $_POST['status'];
         
		 $data = "UPDATE `admin` SET `name`='$name',`email`='$email'  WHERE `username` = '$user_name'";
		 $result = mysqli_query($link, $data);
		if($result) {

			echo '<div class="alert alert-info">'. "Update Successfully" .'</div>';
		 	}

	 }

?>
    <div class="row">

        <div class="col-sm-6">
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
                            <label for="email">Email</td>
                        <td>
                            <input type="text" id="email" class="form form-control" name="email" value="<?= $row['email'];?>">
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <label for="status">Status</td>
                        <td>
                            <input type="text" name="status" value="<?= $row['status']; ?>" />
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

=======
<?php
require_once './dbcon.php';
if(!isset($_SESSION['user_login'])){

header('location:login.php');
}
?>
<h1 class="text-primary"><i class="fa fa-user"></i> Update Informationl</h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-User"></i> Update</li>
</ol>

<?php
$user_name = base64_decode($_GET['username']);
$result = mysqli_query($link, "SELECT * FROM `admin` WHERE `username` = '$user_name'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
		 $name = $_POST['name'];
		 $email = $_POST['email'];
		 $status = $_POST['status'];
         
		 $data = "UPDATE `admin` SET `name`='$name',`email`='$email'  WHERE `username` = '$user_name'";
		 $result = mysqli_query($link, $data);
		if($result) {

			echo '<div class="alert alert-info">'. "Update Successfully" .'</div>';
		 	}

	 }

?>
    <div class="row">

        <div class="col-sm-6">
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
                            <label for="email">Email</td>
                        <td>
                            <input type="text" id="email" class="form form-control" name="email" value="<?= $row['email'];?>">
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <label for="status">Status</td>
                        <td>
                            <input type="text" name="status" value="<?= $row['status']; ?>" />
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

>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
    </div>