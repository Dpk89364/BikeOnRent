<?php
$email = $_POST['email'];
$comment = $_POST['comment'];

if(!empty($email) || !empty($comment))
{
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "data";
	$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
	if (mysqli_connect_error()) {
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
        	$UPDATE ="UPDATE bikerent SET comment='$comment' where email = '$email' ";
			if ($conn->query($UPDATE))
			{
				echo '<script>alert("Your Response Has Been Submited...")</script>'; 
					//echo "New record is inserted successfully...";
					header('Refresh:3; url=contact us.html');
			}
			else
			{
				echo '<script>alert("Create Your Account...")</script>'; 
					//echo "Please Try Again.";
					header('Refresh:3; url=contact us.html');

			}
        //}
        //else
        //{
            //echo "Create Your Account.";
			//header('Location:signup.html');
        //}
		$conn->close();
	}
}
else{
	echo '<script>alert("All Field Required...")</script>'; 
	//echo "All Field Required";
	die();
}
?>