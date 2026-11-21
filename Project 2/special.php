
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

    $instructions = $_POST["instructions"];

    $sql = "SELECT * FROM MovingInfo WHERE MovingID = '$movingID'";

    $result = $conn->query($sql);

    if ($result->num_rows == 0) 
        
        {

        echo "<script>
        alert('Moving ID not found. Please check and try again.');

        window.location.href = 'special.php';

        </script>";

    } 
    
    else 
    
    {

        $sql = "SELECT * FROM SpecialInstructions WHERE MovingID = '$movingID'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
            
            {

            echo "<script>
            alert('Special instructions already exist.');

            window.location.href = 'updateSpecial.php?movingID=$movingID';

            </script>";

        } 
        
        else 
        
        {

            if (isset($_POST["confirmed"])) 
                
                {

                $sql = "INSERT INTO SpecialInstructions
                        (MovingID, Instructions)
                        VALUES ('$movingID', '$instructions')";

                if ($conn->query($sql)) 
                    
                    {

                    echo "<script>
                    alert('Special instructions added successfully!');

                    window.location.href = 'special.php';

                    </script>";

                } 
                
                else 
                
                {

                    echo "Error adding instructions.";

                }

            } 
            
            else 
            
            {

                ?>

                <form id="confirmForm" method="POST" action="special.php">

                    <input type="hidden" name="movingID" value="<?php echo htmlspecialchars($movingID); ?>">

                    <input type="hidden" name="instructions" value="<?php echo htmlspecialchars($instructions); ?>">

                    <input type="hidden" name="confirmed" value="yes">

                </form>

                <script>

                if (confirm('Do you want to add special instructions for this move?')) 
                
                {

                    document.getElementById("confirmForm").submit();

                }

                else 
                
                {

                    window.location.href = 'special.php';

                }

                </script>

                <?php

            }

        }

    }

} 

else 

{



?>

<!DOCTYPE html>

<html>

<head>

    <title>Special Instructions</title>

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



<h2>Special Instructions for the Move</h2>

<form method="POST" action="special.php">

    Moving ID:

    <input type="text" name="movingID" value="<?php echo isset($_GET['movingID']) ? htmlspecialchars($_GET['movingID']) : ''; ?>" required><br><br>

    Special Instructions:

    <textarea name="instructions" required></textarea><br><br>

    <input type="submit" value="Submit Instructions">

</form>

<br><br>


<a href="index.php">Return to Login</a>


</body>

</html>



<?php

}



$conn->close();

?>




