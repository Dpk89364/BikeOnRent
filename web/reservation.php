<?php
$email = $_POST['email'];
$bikename = $_POST['bikename'];
$pickup_location = $_POST['pickup_location'];
$drop_location = $_POST['drop_location'];
$pickup_date = $_POST['pickup_date'];
$drop_date = $_POST['drop_date'];
$pickup_time = $_POST['pickup_time'];
$drop_time = $_POST['drop_time'];
//$price = $_POST['price'];
$zip_code = $_POST['zip_code'];
$city = $_POST['city'];
$gender = $_POST['gender'];


if(!empty($email) || !empty($bikename) || !empty($pickup_location) || !empty($drop_location) || !empty($pickup_date) || !empty($drop_date) || !empty($pickup_time) || !empty($drop_time)/* || !empty($price)*/ || !empty($zip_code) || !empty($city) || !empty($gender))
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
		//$sql_query = "select count(*) as cntUser from bikerent where email='".$email."'";
        //$result = mysqli_query($con,$sql_query);
        //$row = mysqli_fetch_array($result);
        //$count = $row['cntUser'];
        //if($count > 0)
        //{
        	$UPDATE ="UPDATE bikerent SET bikename='$bikename', pickup_location='$pickup_location', drop_location='$drop_location', pickup_date='$pickup_date', drop_date='$drop_date', pickup_time='$pickup_time', drop_time='$drop_time', zip_code='$zip_code', city='$city', gender='$gender' where email='$email' ";
			if ($conn->query($UPDATE))
			{
				echo '<script>alert("Your Reservation Has Been Done...")</script>'; 
					//echo "New record is inserted successfully...";
					header('Location:home.html');
			}
			else
			{
				echo '<script>alert("Please Create Your Account...")</script>'; 
					//echo "Please Try Again.";
					echo "Error: ".$conn->error;

			}
        //}
        //else
        //{
            //echo "Create Your Account.";
			//header('Location:signup.html');
        //}
        //$conn->close();
	}
}
else{
	echo '<script>alert("All Field Required...")</script>'; 
	//echo "All Field Required";
	die();
}
?>