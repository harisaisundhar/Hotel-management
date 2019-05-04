<!doctype html>
<html>
<head>

    <!-- Meta Information  -->

    <meta charset="UTF-8">
    <title>Health & Fitness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Fitness, Health, Personal Training, Training ">
<!--  Stylesheets  -->

<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/style.css">

<!-- Fonts  -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<body>
    <!-- Page Container  -->
    <div id="page">

        <!-- Header and Menu  -->
        <header>

            <div id="logo-div">
                <a href="index.html" class="logo" title="Logo"></a>
            </div>

            <nav class="menu">
                    <a class="menu-item" href="index.html">Home</a>
                    <a class="menu-item" href="calc.html">Calc</a>
                    <a class="menu-item" href="queries.html">Queries</a>
                    <a class="menu-item" href="news.html">Gallery</a>
                    <a class="menu-item" href="contact.html">Contact</a>
                    <a class="menu-item" href="register.php">Register</a>

            </nav>


        </header>


<?php

if(isset($_POST['submit'])){

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "package";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$r_id=$_POST['r_id'];
$name=$_POST['name'];
$address=$_POST['address'];
$check_in_date=$_POST['check_in_date'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$nationality=$_POST['nationality'];
$check_out_date=$_POST['check_out_date'];
$room_type=$_POST['room_type'];

$sql = "INSERT INTO register (r_id,name,address,check_in_date,contact,email,nationality,check_out_date,room_type)
VALUES ('$r_id','$name','$address','$check_in_date','$contact','$email','$nationality','$check_out_date','$room_type')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->connect_error;
}


$conn->close();
}
else {

?>

	 <div id="content"><br><center>
      <h1>Room Booking</h1>
      <form action ="<?php $_PHP_SELF ?>" method="post">
	  <table>
	 <tr>
        <td>Registration ID </td>
		<td>:</td>
		<td><input type="text" name="r_id"/></td>
	</tr>
	<tr>
        <td>Name</td>
		<td>:</td>
		<td><input type="text" name="name"/></td>
	</tr>
	<tr>
		<td>Address</td>
		<td>: </td>
		<td><input type="text" name="address"/></td>
	</tr>
	<tr>
		<td>Check in date </td>
		<td>:</td>
		<td><input type="text" name="check_in_date"/></td>
	</tr>
	<tr>
		<td>Contact</td>
		<td>: </td>
		<td><input type="text" name="contact"/></td>
	</tr>
	<tr>
		<td>Email </td>
		<td>: </td>
		<td><input type="text" name="email"/></td>
	</tr>
	<tr>
		<td>Nationality </td>
		<td>: </td>
		<td><input type="text" name="nationality"/></td>
	</tr>
	<tr>
		<td>Check out date </td>
		<td>:</td>
		<td><input type="text" name="check_out_date"/></td>
	</tr>
	<tr>
		<td>Room type </td>
		<td>: </td>
		<td><input type="text" name="room_type"/></td><br><br>
	</tr>
  <br><br><br>
  <hr>
     </table>
        <input type="submit" value="submit" name="submit"/>
      </form></center>

		 </div>
	  <?php
        }
      ?>
     </body>

             <footer>

                 <aside class="column">
                     <div class="contents">
                         <h3>Developers</h3>
                         <p>Harisai 17pw13,<br>Dharani 17pw08,<br>Velu 17pw38.<br></p>
                     </div>
                 </aside>
                 <aside class="column">
                    <div class="contents">
                         <h3>Location</h3>
                         <p>PSG college of tech,<br>Peelamedu,<br>coimbatore.</p>
                     </div>
                 </aside>
                 <aside class="column">
                    <div class="contents">
                     <h3>Social Media</h3>
                         <a href="https://www.facebook.com/" target="_blank"><img src="images/facebook.png" alt="facebook" height="40" width="40"></a>
                         <a href="https://ie.linkedin.com/" target="_blank"><img src="images/linkedin.png" alt="linkedin" height="40" width="40"></a>
                         <a href="https://www.tumblr.com/" target="_blank"><img src="images/tumblr.png" alt="tumblr" height="40" width="40"></a>
                         <a href="https://www.twitter.com/" target="_blank"><img src="images/twitter.png" alt="twitter" height="40" width="40"></a>
                     </div>
                 </aside>


             </footer>

         </div>

     </body>
     </html>
