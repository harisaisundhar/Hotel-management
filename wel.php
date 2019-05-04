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
                    <a class="menu-item" href="bmi.html">BMI</a>
                    <a class="menu-item" href="timetables.html">Timetables</a>
                    <a class="menu-item" href="news.html">News</a>
                    <a class="menu-item" href="contact.html">Contact</a>
                    <a class="menu-item" href="register.php">Regiser</a>

            </nav>

        </header>


        <?php
        $username="root";
        $password="root";
        $database="account";
        $mysqli = new mysqli("localhost", $username, $password, $database); @mysql_select_db($database) or die( "Unable to select database");
        $query2="SELECT * FROM WorkoutDesc";
        $result=$mysqli->query($query2);
        $num=$mysqli->mysqli_num_rows($result);?>
        <table border="0" cellspacing="2" cellpadding="2">
        <tr>
        <td>
        <font face="Arial, Helvetica, sans-serif">Value1</font>
        </td>
        <td>
        <font face="Arial, Helvetica, sans-serif">Value2</font>
        </td>
        <td>
        <font face="Arial, Helvetica, sans-serif">Value3</font>
        </td>
        <td>
        <font face="Arial, Helvetica, sans-serif">Value4</font>
        </td>
        </tr>
        <?php
        $i=0;
        while ($i < $num) {
        $f1=mysql_result($result,$i,"field1");
        $f2=mysql_result($result,$i,"field2");
        $f3=mysql_result($result,$i,"field3");
        $f4=mysql_result($result,$i,"field4");?>
        <tr>
        <td>
        <font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font>
        </td>
        <td>
        <font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font>
        </td>
        <td>
        <font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font>
        </td>
        <td>
        <font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font>
        </td>
        </tr>
        <?php
        $i++;
        }?></section>

</div></div>
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
