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
<html>
     <head>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
     </head>
     <body>
	 <div id="container">
  <div id="header"> <img src="images/logo.jpg" width="171" height="30" alt="" id="logo"/> <img src="images/slogan.jpg" width="457" height="38" alt="" id="slogan"/>
    <ul class="menu">
      <li class="btn_1"><a href="index.html">home</a></li>
      <li class="line"></li>
      <li class="btn_3"><a href="services.html">services</a></li>
      <li class="line"></li>
      <li class="btn_4"><a href="loginn.php">booking</a></li>
      <li class="line"></li>
      <li class="btn_5"><a href="contacts.html">contacts</a></li>
    </ul>
  </div>
	 <div id="content"><br><center>
      <h1>Customer Registration</h1>
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
     </table>
        <input type="submit" value="submit" name="submit"/>
      </form></center>

		 </div>
	  <?php
        }
      ?>
     </body>
    </html>
