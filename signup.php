<?php
$connect = mysqli_connect("localhost","root","","signup");
$data=json_decode(file_get_contents("php://input"));

if(count($data)>0){
	$firstname = mysqli_real_escape_string($connect, $data->firstname);
	$lastname = mysqli_real_escape_string($connect, $data->lastname);
	$email = mysqli_real_escape_string($connect, $data->email);
	$password = mysqli_real_escape_string($connect, $data->password);
	$cpassword = mysqli_real_escape_string($connect, $data->cpassword);
	$hash_pass = password_hash($password,PASSWORD_DEFAULT);
	$hash_cpass = password_hash($cpassword,PASSWORD_DEFAULT);

	if(!preg_match("/^[a-zA-Z]*$/",$firstname)) {
	 		echo "NoF";
	}
	else if(!preg_match("/^[a-zA-Z]*$/",$lastname)) {
	 		echo "NoL";
	}
	else if(!preg_match("/^[a-zA-Z]*$/",$lastname)) {
	 		echo "NoL";
	}
	else if(!preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/",$email)) {
	 		echo "NoE";
	}
	else if(!preg_match("/^[a-zA-Z\d]{8,}$/",$password)) {
	 		echo "NoP";
	}
	else if($password == $cpassword)
	{
		$query = "insert into users (u_fname,u_lname,u_email,u_pass,u_cpass) values ('$firstname','$lastname','$email','$password','$cpassword')";
		if(mysqli_query($connect,$query))
		{
			echo "Inserted";
		}
		else{
			echo "Error";
		}
	}
	else
	{
		echo "NoMatch";
	}
}
?>