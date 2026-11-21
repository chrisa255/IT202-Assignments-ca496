


<?php

session_start();

if (!isset($_SESSION["RepID"])) 

    {

    header("Location: index.php");

    exit();
}

?>


<!DOCTYPE html>

<html>

<head>

    <title>Moving On Up Menu</title>

    <link rel="stylesheet" href="fonts.css">

</head>

<body>

<nav>

    <a href="find.php">Client Accounts</a>

    <a href="booking.php">Booking</a>

    <a href="canceling.php">Canceling</a>

    <a href="special.php">Special Instructions</a>

    <a href="updateSpecial.php">Update Special Instructions</a>

    <a href="newClient.php">Create Client</a>

    <a href="menu.php">Menu</a>

</nav>

<div class="menu-container">


<h1>Moving On Up</h1>

<h2>Welcome!</h2>

<p>Representative ID: <?php echo $_SESSION["RepID"]; ?></p>

<h3>Select a Transaction</h3>


<ul>
    <li><a href="find.php">Search a Moving Company Representative's Account</a></li>

    <li><a href="booking.php">Book a Client's Moving Event</a></li>

    <li><a href="canceling.php">Cancel a Client's Moving Event</a></li>

    <li><a href="special.php">Special Instructions for the Move</a></li>

    <li><a href="updateSpecial.php">Update Special Instructions for Move</a></li>

    <li><a href="newClient.php">Create a New Client Account</a></li>

</ul>


<a href="index.php">Return to Login</a>


</div>

</body>

</html>



