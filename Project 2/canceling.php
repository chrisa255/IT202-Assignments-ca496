



<?php

session_start();

require_once "db_connect.php";

if (!isset($_SESSION["RepID"])) 
    
    {

    header("Location: index.php");

    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
    
    {

    $movingID = $_POST["movingID"];

    $sql = "SELECT * FROM MovingInfo WHERE MovingID = '$movingID'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
        
        {

        $conn->query("DELETE FROM SpecialInstructions WHERE MovingID = '$movingID'");

        $sql = "DELETE FROM MovingInfo WHERE MovingID = '$movingID'";

        $conn->query($sql);

        $message = "Moving event cancelled successfully!";

        $details = "Cancelled Moving ID: $movingID";

    } 
    
    else 
    
    {

        $message = "Moving ID not found.";

        $details = "";

    }

?>

<!DOCTYPE html>

<html>

<head>

    <title>Cancel Moving Event</title>

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

    <h2><?php echo $message; ?></h2>

    <p><?php echo $details; ?></p>

    <a href="menu.php">Return to Menu</a>

</div>

</body>

</html>

<?php


} 

else 

{

?>


<!DOCTYPE html>

<html>

<head>

    <title>Cancel Moving Event</title>

    <link rel="stylesheet" href="fonts.css">

</head>

<body>

<h1>Moving On Up</h1>

<nav>

    <a href="find.php">Client Accounts</a>

    <a href="booking.php">Booking</a>

    <a href="canceling.php">Canceling</a>

    <a href="special.php">Special Instructions</a>

    <a href="updateSpecial.php">Update Special Instructions</a>

    <a href="newClient.php">Create Client</a>

    <a href="menu.php">Menu</a>

</nav>

<h2>Cancel a Client's Moving Event</h2>

<form method="POST" action="canceling.php"
onsubmit="return confirm('Are you sure you want to cancel this moving event? Any special instructions will also be deleted.')">

    Moving ID:

    <input type="text" name="movingID" required><br><br>

    <input type="submit" value="Cancel Moving Event">

</form>

<br><br>

<a href="index.php">Return to Login</a>

</body>

</html>

<?php

}


$conn->close();

?>




