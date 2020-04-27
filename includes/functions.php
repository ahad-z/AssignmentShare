<?php
function validate($fields, $data)
{
	$status = true;
	$messages = [];
	foreach ($fields as $name => $rule) {
		if($rule == 'required'){
			if (!isset($data[$name])) {
				$status = false;
				$messages[$name] = $name . ' field is required';
			}else{
				if($data[$name] == ''){
					$status = false;
					$messages[$name] = $name . ' field is required';
				}
			}
		}
	}

	return ['status' => $status, 'messages' => $messages];
}

function post(){
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$username= $_POST['usernam'];
		$sql = "INSERT INTO tabele_name (`nmae`,`username`) values (`$naem`, `$username`)";
		$query = mysqli_query($link,$sql);
	}
	
}


function createPost($data)
{
	$rules = [
		'title' => 'required'
	];

	$validation = validate($data, $rules);
	print_r($validation);
	
	if ($validation['status'] == false) {
		print_r($validation['messages']);
	}else{
		echo "Post created";
		return;
		$name = $data['name'];
		$username= $data['usernam'];
		$sql = "INSERT INTO tabele_name (`nmae`,`username`) values (`$naem`, `$username`)";
		$query = mysqli_query($link,$sql);
	}
}