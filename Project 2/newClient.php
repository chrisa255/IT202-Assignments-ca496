



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

    $first = $_POST["first"];

    $last = $_POST["last"];

    $sql = "SELECT * FROM Clients WHERE ClientID = '$clientID'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
        
        {

        echo "Client ID already exists.";

    } 
    
    else 
    
    {

        $sql = "INSERT INTO Clients
        (ClientID, FirstName, LastName, Phone, Street, City, State, Zip)
        VALUES
        ('$clientID', '$first', '$last', '', '', '', '', '')";

        if ($conn->query($sql)) 
            
            {

            $repID = $_SESSION["RepID"];

            $sql = "INSERT INTO RepClients (RepID, ClientID)
                    VALUES ('$repID', '$clientID')";

            if ($conn->query($sql)) 
                
                {

                header("Location: clientInfo.php?clientID=$clientID");

                exit();

            } else 
            
            {

                echo "Error connecting client to representative.";

            }

        } 
        
        else 
        
        {

            echo "Error creating client: " . $conn->error;

        }

    }

} 

else 

{




?>

<!DOCTYPE html>

<html>

<head>

    <title>Create Client Account</title>

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



<h2>Create a New Client Account</h2>

<form method="POST" action="newClient.php">

    Client ID:

    <input type="text" name="clientID" required><br><br>

    First Name:

    <input type="text" name="first" required><br><br>

    Last Name:

    <input type="text" name="last" required><br><br>

    <input type="submit" value="Create Client">

</form>

<br><br>



<a href="index.php">Return to Login</a>

</body>

</html>

<?php


}

$conn->close();

?>





