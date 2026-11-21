


<?php

session_start();

require_once "db_connect.php";

if (!isset($_SESSION["RepID"]))

{

    header("Location: index.php");
    exit();

}


$repID = $_SESSION["RepID"];

$sql = "SELECT
        MovingRep.FirstName,
        MovingRep.LastName,
        MovingRep.RepID,
        MovingRep.Phone,
        MovingRep.Email,

        Clients.FirstName AS ClientFirstName,
        Clients.LastName AS ClientLastName,
        Clients.ClientID,
        Clients.Street,
        Clients.City,
        Clients.State,
        Clients.Zip,
        Clients.Phone AS ClientPhone,

        MovingInfo.MovingID,
        MovingInfo.StreetDest,
        MovingInfo.CityDest,
        MovingInfo.StateDest,
        MovingInfo.ZipDest,
        MovingInfo.MovingDate,
        MovingInfo.Weight,
        MovingInfo.Cost,

        SpecialInstructions.Instructions

        FROM MovingRep

        JOIN RepClients
        ON MovingRep.RepID = RepClients.RepID

        JOIN Clients
        ON RepClients.ClientID = Clients.ClientID

        LEFT JOIN MovingInfo
        ON Clients.ClientID = MovingInfo.ClientID

        LEFT JOIN SpecialInstructions
        ON MovingInfo.MovingID = SpecialInstructions.MovingID

        WHERE MovingRep.RepID = '$repID'";

$result = $conn->query($sql);

?>



<!DOCTYPE html>

<html>

<head>

    <title>Search Client Accounts</title>

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


<h2>Client Accounts</h2>

<table border="1">

<tr>

    <th>Representative First Name</th>

    <th>Representative Last Name</th>

    <th>Representative ID</th>

    <th>Representative Phone</th>

    <th>Representative Email</th>


    <th>Client First Name</th>

    <th>Client Last Name</th>

    <th>Client ID</th>

    <th>Client Street</th>

    <th>Client City</th>

    <th>Client State</th>

    <th>Client ZIP</th>

    <th>Client Phone</th>


    <th>Moving ID</th>

    <th>Destination Street</th>

    <th>Destination City</th>

    <th>Destination State</th>

    <th>Destination ZIP</th>

    <th>Moving Date</th>

    <th>Weight</th>

    <th>Cost</th>

    <th>Special Instructions</th>

</tr>

<?php



if ($result->num_rows > 0)

{

    while ($row = $result->fetch_assoc())

    {

        echo "<tr>";

        echo "<td>" . $row["FirstName"] . "</td>";

        echo "<td>" . $row["LastName"] . "</td>";

        echo "<td>" . $row["RepID"] . "</td>";

        echo "<td>" . $row["Phone"] . "</td>";

        echo "<td>" . $row["Email"] . "</td>";

        echo "<td>" . $row["ClientFirstName"] . "</td>";

        echo "<td>" . $row["ClientLastName"] . "</td>";

        echo "<td>" . $row["ClientID"] . "</td>";

        echo "<td>" . $row["Street"] . "</td>";

        echo "<td>" . $row["City"] . "</td>";

        echo "<td>" . $row["State"] . "</td>";

        echo "<td>" . $row["Zip"] . "</td>";

        echo "<td>" . $row["ClientPhone"] . "</td>";

        echo "<td>" . $row["MovingID"] . "</td>";

        echo "<td>" . $row["StreetDest"] . "</td>";

        echo "<td>" . $row["CityDest"] . "</td>";

        echo "<td>" . $row["StateDest"] . "</td>";

        echo "<td>" . $row["ZipDest"] . "</td>";

        echo "<td>" . $row["MovingDate"] . "</td>";

        echo "<td>" . $row["Weight"] . "</td>";

        echo "<td>" . $row["Cost"] . "</td>";

        echo "<td>" . $row["Instructions"] . "</td>";

        echo "</tr>";

    }

}

else

{

    echo "<tr><td colspan='22'>No client accounts found.</td></tr>";

}

?>



</table>

<br>

<a href="index.php">Return to Login</a>

</body>

</html>



<?php

$conn->close();

?>




