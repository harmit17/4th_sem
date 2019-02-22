<?php
$connect = mysqli_connect("localhost","root","","signup");
$data=json_decode(file_get_contents("php://input"));
$count = 0;
if(count($data)>0){
	$email = mysqli_real_escape_string($connect, $data->email);
	$password = mysqli_real_escape_string($connect, $data->password);
	$latitude = mysqli_real_escape_string($connect, $data->lat);
	$longitude = mysqli_real_escape_string($connect, $data->long);
	$admin_email= "admin@ac.com";
	$admin_passwd= "admin";
	if($email == $admin_email && $password == $admin_passwd)
	{
		echo "Admin";
		$query = "insert into login_detail (Email,Time,Latitude,Longitude,Status) values ('$email',NOW(),'$latitude','$longitude','Yes')";
		if(mysqli_query($connect,$query))
		{
						
		}
	}
	else
	{
		$sql = "SELECT u_email,u_pass FROM users where u_email='$email'";
		$result = $connect->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if($password == $row["u_pass"]){
					echo "login";
					$query = "insert into login_detail (Email,Time,Latitude,Longitude,Status) values ('$email',NOW(),'$latitude','$longitude','Yes')";
					if(mysqli_query($connect,$query))
					{
						
					}
				}
				else
				{
					$query = "insert into login_detail (Email,Time,Latitude,Longitude,Status) values ('$email',NOW(),'$latitude','$longitude','No')";
					if(mysqli_query($connect,$query))
					{
						
					}
				}
			}
		}
		else
		{
			echo "Not selected";
		}
	}
}
?>