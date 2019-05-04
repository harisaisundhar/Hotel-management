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

$sql = "SELECT sw_cost+laundry_cost+meals_cost as sum from bill LIMIT 0, 30 ";
$result = $conn->query($sql);

			if (mysqli_num_rows($result) == 0) {
				die('could not'.$conn->connect_error);

			}
			else {
			while ($row = $result->fetch_assoc()) {
					$sum=$row["sum"];
					echo "Total BILL: "; echo $sum; echo "<br>";
}

			}
$conn->close();
 }
 else {
?>
<html>
     <head>
	<link rel="stylesheet" type="text/css" href="styles.css">
     </head>
     <body>
	 <div id="content">
      <center>
	  <h1>Display BILL</h1>
      <form action ="<?php $_PHP_SELF ?>" method="post">

        <input type="submit" value="Display" name="submit"/>
      </form>
		</center>
	  <?php
        }
      ?>
	  </div>

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
