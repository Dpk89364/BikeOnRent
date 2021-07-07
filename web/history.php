<?php
echo "<meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
  <title>DP-Bike Rental Service</title>
  <link rel='shortcut icon' type='image/png' href='images/dp.png'/>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link rel='stylesheet' type='text/css' href='comman.css'>
  <link rel='stylesheet' type='text/css' href='history.css'>
  <script src='js/jquery-3.3.1.min.js'></script>
  <script src='js/main.js'></script>
  <script type='text/javascript' src='scrollquery.js'></script>";
  echo"<div id='preloader'></div>
  <button onclick='topFunction()'' id='myBtn' title='Go to top'>Top</button>
  <div class='se-pre-con'></div>
  <div class='history-banner'>
    <div class='hdiv'>
      <div class='hdiv1'>
        <br>
        <a href='facebook.com'><img src='images/facebook.png' height='35px' width='35px'></a>          
        <a href='facebook.com'><img src='images/twitter.png' height='35px' width='35px'></a>            
        <a href='facebook.com'><img src='images/in.png' height='35px' width='35px'></a>            
        <a href='facebook.com'><img src='images/google.png' height='35px' width='35px'></a>  
      </div>
      <div class='hdiv1'>
        <div class='simbol'>
        <img src='images/llogo.png' width='20px' height='20px'>
        </div>
        <p style='margin-left:10px '><br>Varachha Road,Surat-395006</p> 
      </div>
      <div class='hdiv1'>
        <div class='simbol'>
        <img src='images/tlogo.png' width='20px' height='20px'>
        </div>
        <p style='margin-left:15px ''><br>Sat - Fri Day 08:00 am - 5.00 pm Sunday Holyday</p>
      </div>
      <div class='hdiv1'>
        <br>
        <select class='lang-select'>
          <option>ENG</option>
          <option>RUS</option>
          <option>BAN</option>
        </select>
      </div>
      <div class='hdiv1'>
        <br>
      </div>
    </div>
    <img src='images/dp.png' align='left' width='80px' height='80px' style='margin-left: 150px; margin-top: 8px'>
    <div id='manu'>
      <div class='manudiv'>
        <a href='home.html'><p>HOME</p></a>
      </div>
      <div class='manudiv'>
        <a href='bikes.html'><p>BIKES</p></a>
      </div>
      <div class='manudiv'>
        <a href='history.html'><p>HISTORY</p></a>
      </div>
      <div class='manudiv'>
        <a href='about.html'><p>ABOUT US</p></a>
      </div>
      <div class='manudiv'>
        <a href='contact us.html'><p>CONTACT</p></a>
      </div>
    </div>
    <br><br>
    <h1 style='color: white;margin-left: 150px'>Your History</h1>
    <p style='margin-left: 150px'><img src='images/home.png' width='10px' height='10px'>  Home   <img src='images/circle.png' width='8px' height='8px'>   History</p>
  </div>";
$email = $_POST['email'];
$password = $_POST['password'];
if (!empty($email) || !empty($password)) 
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
        $sql_query = "select count(*) as cntUser from bikerent where email='".$email."' and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $rows = mysqli_fetch_array($result);

        $count = $rows['cntUser'];

        if($count > 0)
        {
            $INSERT = mysqli_query($conn,"SELECT fname,lname,gender,phone,address,city,zip_code,bikename,pickup_location,pickup_date,pickup_time,drop_location,drop_date,drop_time FROM bikerent where email = '$email' ");
		//if ($conn->query($INSERT)) 
		//{
			echo "<h1 style='text-align: center;color: black;margin-top: 120px'>Your Reservation</h1>";
			echo "<table border='1' style='width: 700px;margin-left: 260px;margin-top: 50px'>
			<tr>
			<th>Field</th>
			<th>Data</th>
			</tr>";
			while($row = mysqli_fetch_array($INSERT))
			{
				echo "<tr>";
				echo "<td>First Name</td>";
				echo "<td>" . $row['fname'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Last Name</td>";
				echo "<td>" . $row['lname'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Gender</td>";
				echo "<td>" . $row['gender'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Phone No.</td>";
				echo "<td>" . $row['phone'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Address</td>";
				echo "<td>" . $row['address'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>City</td>";
				echo "<td>" . $row['city'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Zip Code</td>";
				echo "<td>" . $row['zip_code'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Bike Name</td>";
				echo "<td>" . $row['bikename'] . "</td>";
				echo "</tr>";
				//echo "<tr>";
				//echo "<td>Total Price</td>";
				//echo "<td>" . $row['price'] . "</td>";
				//echo "</tr>";
				echo "<tr>";
				echo "<td>Pickup Location</td>";
				echo "<td>" . $row['pickup_location'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Pickup Date</td>";
				echo "<td>" . $row['pickup_date'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Pickup Time</td>";
				echo "<td>" . $row['pickup_time'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Drop Location</td>";
				echo "<td>" . $row['drop_location'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Drop Date</td>";
				echo "<td>" . $row['drop_date'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Drop Time</td>";
				echo "<td>" . $row['drop_time'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
			echo "<from action='history.html' method='get'>";
			echo "<a href='history.html'><button class='submit' style='width: 700px;margin-left: 250px;margin-top: 50px'>Back</button></a>";
			echo "</form>";			
			echo "<div class='history-support2'>
    <img src='images/dhruvin.png' align='center' width='100px' height='100px' style='border-radius: 100px; border: outset;margin-top: 40px;margin-left: 575px;''>
    <h1 style='color: white;text-align: center'>Dhruvin Koshiya</h1>
    <p style='text-align: center;color: white; font-size: 20px'>Business Man</p>
    <p style='text-align: center;color: white; font-size: 20px'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore<br> et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas<br> accumsan lacus vel facilisis.  </p>
    <span class='fa fa-star checked' style='margin-left: 575px'></span>
    <span class='fa fa-star checked'></span>
    <span class='fa fa-star checked'></span>
    <span class='fa fa-star checked'></span>
    <span class='fa fa-star checked'></span>
  </div>
  <hr style='border-color: #CD0000'>
  <div class='last'>
    <div class='app-div5'>
      <img src='images/dp.png' style='margin-left: 20px;margin-top: 40px' width='60px' height='60px'>
      <p style='color: white; font-size: 17px;margin-left: 20px'>Lorem ipsum dolor sit amet, congue placeranec. Leo faucibus sed eleifend bibendum n vehicula nulla mauris nulla ipsum neque sed. Gravida egestas fermentum urna, velit sed.</p>
          <br>
          <a href='facebook.com'><img src='images/facebook.png' style='margin-left: 20px' height='35px' width='35px></a>   
          <a href='facebook.com'><img src='images/twitter.png' height='35px' width='35px'></a>            
          <a href='facebook.com'><img src='images/in.png' height='35px' width='35px'></a>            
          <a href='facebook.com'><img src='images/google.png' height='35px' width='35px'></a>  
    </div>
    <div class='app-div6'>
      <h2 style='color: white;margin-left: 20px;margin-top: 40px'>Our Bikes</h2>
      <br>
      <ul style='list-style-type: sidama;margin-left: 20px;color: white'>
        <li>abcdefg</li><br>
        <li>abcdefg</li><br>
        <li>abcdefg</li><br>
        <li>abcdefg</li><br>
        <li>abcdefg</li><br>
        <li>abcdefg</li>
      </ul>
    </div>
    <div class='app-div7'>
      <h2 style='color: white;margin-left: 20px;margin-top: 40px'>Useful Links</h2>
      <br>
      <ul style='list-style-type: sidama;margin-left: 20px;color: white'>
        <li>abcdefg</li><br>
        <li>abcdefg</li><br>
        <li>abcdefg</li><br>
        <li>abcdefg</li><br>
        <li>abcdefg</li><br>
        <li>abcdefg</li>
      </ul>
    </div>
    <div class='app-div8'>
      <h2 style='color: white;margin-left: 20px;margin-top: 40px'>Contact With Us</h2>
      <br>
      <div class='simbol'>
        <img src='images/llogo.png' style='margin-left: 20px;margin-top: 5px'  align='left'  width='20px' height='20px'>
      </div>
      <p style='margin-left: 60px'>Medino, NY 10012, Kitaniya Road Nikamobo Libono USA</p>
      <br>
      <div class='simbol'>
        <img src='images/message.png' style='margin-left: 20px;margin-top: 5px'  align='left'  width='20px' height='20px'>
      </div>
      <p style='margin-left: 60px'>www.carrentalinfo2457@gmail.com www.oursupport/info@gmail.com</p>
      <br>
      <div class='simbol'>
        <img src='images/phone.png' style='margin-left: 20px;margin-top: 5px'  align='left'  width='20px' height='20px'>
      </div>
      <p style='margin-left: 60px'>+88014578541-09 , +0885424-542-254 +88047859-4541</p>
    </div>
</div>";
		//}
		//else
		//{
			//echo "Error: ".$conn->error;
		//}
        }
        else
        {
        	echo '<script>alert("Invalid username and password...")</script>'; 
            //echo "Invalid username and password";
            header('Refresh:3; url=history.html');
        }
		mysqli_close($conn);
	}
}
else
 {
 	echo '<script>alert("All Field Required...")</script>'; 
	//echo "All Field Required";
	die();
 }



?>


