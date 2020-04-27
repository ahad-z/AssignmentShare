<<<<<<< HEAD
<?php
require '../admin/dbcon.php';

$msg ="";
if(isset($_POST['submit'])){
	$name = $_POST['user_name'];
	$comment = mysqli_real_escape_string($link, $_POST['comment']);
	$post_id = $_POST['post_id'];
	$user_id = $_POST['user_id'];
	$user_type = $_POST['user_type'];
	$date = date("Y-m-d");


	$sql = "INSERT INTO `comment_table` (`user_id`, `post_id`, `user_type`,`name`, `comment`, `cur_date`) VALUES ('$user_id','$post_id', '$user_type', '$name','$comment','$date')";

	$query = mysqli_query($link, $sql);
	if($query){
		$msg = "Comment Successfully!";
	}else{
		$msg = "Something is Wrong!";
	}
}
?>
=======
<?php
require '../admin/dbcon.php';

$msg ="";
if(isset($_POST['submit'])){
	$name = $_POST['user_name'];
	$comment = mysqli_real_escape_string($link, $_POST['comment']);
	$post_id = $_POST['post_id'];
	$user_id = $_POST['user_id'];
	$user_type = $_POST['user_type'];
	$date = date("Y-m-d");


	$sql = "INSERT INTO `comment_table` (`user_id`, `post_id`, `user_type`,`name`, `comment`, `cur_date`) VALUES ('$user_id','$post_id', '$user_type', '$name','$comment','$date')";

	$query = mysqli_query($link, $sql);
	if($query){
		$msg = "Comment Successfully!";
	}else{
		$msg = "Something is Wrong!";
	}
}
?>
>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
