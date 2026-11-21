


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

    $clientID = $_POST["clientID"];

    $sql = "SELECT * FROM Clients WHERE ClientID = '$clientID'";

    $result = $conn->query($sql);

    if ($result->num_rows == 0) 

        {

        echo "<script>
        if (confirm('Client does not exist. Do you want to create a new client account?')) 
        {

            window.location.href = 'newClient.php';

        }

        else 

        {

            window.location.href = 'booking.php';

        }

        </script>";

    }
    
    else 
    
    {

        $street = $_POST["street"];

        $city = $_POST["city"];

        $state = $_POST["state"];

        $zip = $_POST["zip"];

        $date = $_POST["date"];

        $miles = $_POST["miles"];

        $weight = $_POST["weight"];

        $cost = $_POST["cost"];

        $instructions = $_POST["instructions"];

        
        $movingID = rand(1000, 9999);

        $sql = "INSERT INTO MovingInfo
                (MovingID, ClientID, StreetDest, CityDest, StateDest, ZipDest,
                MovingDate, Miles, Weight, Cost)
                VALUES
                ('$movingID', '$clientID', '$street', '$city', '$state', '$zip',
                '$date', '$miles', '$weight', '$cost')";

        if ($conn->query($sql)) 
            
            {

            echo "<script>
            alert('Moving event booked successfully! Moving ID: $movingID');

            if (confirm('Does the client have any special instructions for the move?'))

            {

                window.location.href = 'special.php?movingID=$movingID';

            }

            else 

            {

                window.location.href = 'booking.php';

            }

            </script>";

        } 
        
        else 
        
        {

            echo "Error booking moving event.";

        }

    }

} 

else 

{

?>


<!DOCTYPE html>

<html>

<head>

    <title>Book a Moving Event</title>

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



<h1>Book a Client's Moving Event</h1>

<form method="POST" action="booking.php" onsubmit="return confirm('Do you want to book this moving event?')">

    Client ID:
    <input type="text" name="clientID"><br><br>

    Destination Street:
    <input type="text" name="street"><br><br>

    Destination City:
    <input type="text" name="city"><br><br>

    Destination State:
    <input type="text" name="state"><br><br>

    Destination ZIP:
    <input type="text" name="zip"><br><br>

    Moving Date:
    <input type="date" name="date"><br><br>

    Miles:
    <input type="text" name="miles"><br><br>

    Weight:
    <input type="text" name="weight"><br><br>

    Cost:
    <input type="text" name="cost"><br><br>

    Special Instructions:
    <textarea name="instructions"></textarea><br><br>

    <input type="submit" value="Book Moving Event">

</form>


<br>

<a href="index.php">Return to Login</a>

</body>

</html>

<?php

}



$conn->close();

?>










