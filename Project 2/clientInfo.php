



<?php

session_start();

require_once "db_connect.php";

if (!isset($_SESSION["RepID"])) 

{

    header("Location: index.php");

    exit();

}

$clientID = $_GET["clientID"];

if ($_SERVER["REQUEST_METHOD"] == "POST") 

{

    $phone = $_POST["phone"];

    $street = $_POST["street"];

    $city = $_POST["city"];

    $state = $_POST["state"];

    $zip = $_POST["zip"];

    $sql = "UPDATE Clients
            SET Phone = '$phone',
                Street = '$street',
                City = '$city',
                State = '$state',
                Zip = '$zip'
            WHERE ClientID = '$clientID'";

    if ($conn->query($sql)) 

    {

        echo "<script>
        alert('Client personal information saved successfully!');

        window.location.href = 'menu.php';

        </script>";

    } 

    else 

    {

        echo "Error saving client information.";

    }

}

else

{

?>



<!DOCTYPE html>

<html>

<head>

    <title>Client Personal Information</title>

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


<h2>Enter Client Personal Information</h2>

<form method="POST" action="clientInfo.php?clientID=<?php echo $clientID; ?>">

    Phone:

    <input type="text" name="phone" required><br><br>

    Street:

    <input type="text" name="street" required><br><br>

    City:

    <input type="text" name="city" required><br><br>

    State:

    <input type="text" name="state" required><br><br>

    ZIP:

    <input type="text" name="zip" required><br><br>

    <input type="submit" value="Save Information">

</form>

<br><br>

<a href="index.php">Return to Login</a>


</body>

</html>

<?php

}



$conn->close();

?>





