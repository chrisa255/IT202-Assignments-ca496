


<?php

session_start();

require_once "db_connect.php";

if (!isset($_SESSION["RepID"])) 

{

    header("Location: index.php");

    exit();

}

?>


<!DOCTYPE html>


<html>

<head>

    <title>Update Special Instructions</title>

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


<h2>Update Special Instructions</h2>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") 

{

    $movingID = $_POST["movingID"];

    if (isset($_POST["instructions"])) 

    {

        $newInstructions = $_POST["instructions"];

        $sql = "SELECT Instructions FROM SpecialInstructions
                WHERE MovingID = '$movingID'";


        $result = $conn->query($sql);

        if ($result->num_rows > 0) 

        {

            $row = $result->fetch_assoc();

            $oldInstructions = $row["Instructions"];

            $instructions = $oldInstructions . " " . $newInstructions;

            $sql = "UPDATE SpecialInstructions
                    SET Instructions = '$instructions'
                    WHERE MovingID = '$movingID'";

            if ($conn->query($sql)) 

            {

                echo "<script>
                alert('Special instructions updated successfully!');

                window.location.href = 'updateSpecial.php';

                </script>";

            } 

            else 

            {

                echo "<script>
                alert('Error updating instructions.');

                window.location.href = 'updateSpecial.php';

                </script>";

            }


        } 

        else
            
        {

            echo "<script>
            alert('No special instructions found.');

            window.location.href = 'updateSpecial.php';

            </script>";

        }

    } 

    else 

    {

        $sql = "SELECT * FROM SpecialInstructions
                WHERE MovingID = '$movingID'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) 

        {

            $row = $result->fetch_assoc();

            ?>

            <form method="POST" action="updateSpecial.php"
            onsubmit="return confirm('Are you sure you want to update the special instructions?')">

                <input type="hidden" name="movingID"
                value="<?php echo $movingID; ?>">

                <textarea name="instructions" required></textarea><br><br>

                <input type="submit" value="Update Instructions">

            </form>

            <?php

        } 

        else 

        {

            echo "<script>
            alert('No special instructions found for this Moving ID.');

            window.location.href = 'updateSpecial.php';

            </script>";

        }

    }

} 

elseif (isset($_GET["movingID"])) 

{
    $movingID = $_GET["movingID"];

    $sql = "SELECT * FROM SpecialInstructions
            WHERE MovingID = '$movingID'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) 

    {

        ?>

        <form method="POST" action="updateSpecial.php"
        onsubmit="return confirm('Are you sure you want to update the special instructions?')">

            <input type="hidden" name="movingID"
            value="<?php echo $movingID; ?>">

            <textarea name="instructions" required></textarea><br><br>

            <input type="submit" value="Update Instructions">

        </form>

        <?php

    } 

    else 

    {

        echo "<script>
        alert('No special instructions found.');

        window.location.href = 'updateSpecial.php';

        </script>";

    }

}

else

{

    ?>

    <form method="POST" action="updateSpecial.php">

        Moving ID:

        <input type="text" name="movingID" required><br><br>

        <input type="submit" value="Find Instructions">

    </form>

    <?php

}


?>

<br><br>

<a href="index.php">Return to Login</a>

</body>

</html>

<?php



$conn->close();

?>





