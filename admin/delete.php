<<<<<<< HEAD
<?php
require 'dbcon.php';

$id = base64_decode($_GET['id']);

$delete = mysqli_query($link, "DELETE FROM `file` WHERE `id` = '$id'");
if($delete){
	header('location:index.php?page=cse');
	}

=======
<?php
require 'dbcon.php';

$id = base64_decode($_GET['id']);

$delete = mysqli_query($link, "DELETE FROM `file` WHERE `id` = '$id'");
if($delete){
	header('location:index.php?page=cse');
	}

>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
?>