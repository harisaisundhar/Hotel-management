

	<?php

	if(isset($POST['pavi'])){
            $servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "package";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error)
			{
				 die("Connection failed: " . $conn->connect_error);
			}




            $sql ="SELECT room_no,status FROM room WHERE room_no in ( SELECT room_no FROM look_up WHERE r_id in (SELECT r_id FROM swimming_pool WHERE duration >5 ) ) ";

            $retval = $conn->query($sql);

            if(mysqli_num_rows( $retval )==0)
			{
               die('Could not retrieve data: ' . $conn->connect_error);
            }
			else
			{
			echo "<table border=1>";
				while($row=$retval->fetch_assoc())
				{
					echo "<tr>";
						echo "<td>".$row['room_no']."</td>";
						echo "<td>".$row['status']."</td>";

					echo "</tr>";

				}
			echo "</table>";
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
      <form name="pavi" action ="productlist.php"   method="post">

        <input type="submit" value="Display Room Details" name="submit"></input>

		</center>
	  <?php
			}
      ?>

	  </form>
	  </div>
     </body>

</html>
