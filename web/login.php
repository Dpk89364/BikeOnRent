<?php
$email = $_POST["email"];
$password = $_POST["password"];
if (!empty($email) || !empty($password)) 
{
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "data";
	$con = new mysqli($host,$dbusername,$dbpassword,$dbname);
	if (mysqli_connect_error()) 
	{
		die('connect Error('. mysqli_connect_errno(). ')'. mysqli_connect_error());
	}
	else
	{

		if ($email != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from bikerent where email='".$email."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['email'] = $email;
            header('Location:home.html');
        }else
        {
        	echo '<script>alert("Invalid username and password...")</script>'; 
            //echo "Invalid username and password";
            header('Refresh:3; url=login.html');
        }

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