
	<?php
         if(isset($_POST['search'])) {
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

            $r_id = $_POST['r_id'];


            $sql = "SELECT * from bill where r_id='$r_id'";

            $retval = $conn->query($sql);
			$row=$retval->fetch_assoc();

            if(mysqli_num_rows( $retval )==0)
			{
               die('Could not retrieve data: ' . $conn->connect_error);
            }
            else
			{
				$r_id=$row["r_id"];
				$name=$row["name"];
				$room_cost=$row["room_cost"];
				$laundry_cost=$row["laundry_cost"];
				$sw_cost=$row["sw_cost"];
				$meals_cost=$row["meals_cost"];


				echo "Retrieved data successfully\n";

			}
            $conn->close();
         }
		 else{
            ?>
            <html>
			<body>

               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1"
                     cellpadding = "2">

					<tr>
                        <td width = "100">Registration ID</td>
                        <td><input name = "r_id" type = "text" value="<?php echo $r_id?>"
                           id = "r_id"  ></td>
                     </tr>

                     <tr>
                        <td width = "100">Name</td>
                        <td><input name = "name" type = "text"
                           id = "name" ></td>
                     </tr>

                     <tr>
                        <td width = "100">Room charge</td>
                        <td><input name = "room_cost" type = "text"
                           id = "room_cost" ></td>
                     </tr>


					<tr>
                        <td width = "100">Laundry Charge</td>
                        <td><input name = "laundry_cost" type = "text"
                           id = "laundry_cost" ></td>
                     </tr>

					 <tr>
                        <td width = "100">Swimmimg Pool Charge</td>
                        <td><input name = "sw_cost" type = "text"
                           id = "sw_cost" ></td>
                     </tr>

					 <tr>
                        <td width = "100">Meals Charge</td>
                        <td><input name = "meals_cost" type = "text"
                           id = "meals_cost" ></td>
                     </tr>



                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>

                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "search" type = "submit" id = "search"
                              value = "search">
                        </td>
                     </tr>

                  </table>
               </form>

            <?php
		 }
      ?>


</body>
</html>
