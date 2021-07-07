<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
$phone = $_POST["phone"];
$address = $_POST["address"];
if (!empty($fname) || !empty($lname) || !empty($email) || !empty($password1) || !empty($password2) || !empty($phone) || !empty($address)) 
 {
 	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "data";
	$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
	if (mysqli_connect_error()) 
	{
		die('connect Error('. mysqli_connect_errno(). ')'. mysqli_connect_error());
	}
	else
	{
		if ($password1 == $password2) 
		{
			$INSERT ="INSERT Into bikerent (fname, lname, email, password, phone, address) values('$fname', '$lname', '$email', '$password1', '$phone', '$address')";
			if ($conn->query($INSERT))
			{
				echo '<script>alert("Your Account Has Been Created...")</script>'; 
				//echo "Your Account Has Been Created.";
				header('Location:home.html');
			}
			else
			{
				echo '<script>alert("Someone already register using this email..."")</script>'; 
				//echo "Someone already register using this email.";
				header('Refresh:3; url=signup.html');
			}
			$conn->close();
		}
		else
		{
			echo '<script>alert("re-entered password must be same...")</script>'; 
			//echo "re-entered password must be same.";
			header('Refresh:3; url=signup.html');
		}
	}
 } 
 else
 {
 	echo '<script>alert("All Field Required...")</script>'; 
	//echo "All Field Required";
	die();
 }

?>