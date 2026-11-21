
<?php

session_start();

require_once "db_connect.php";



$first = $_POST["first"];

$last = $_POST["last"];

$password = $_POST["password"];

$repID = $_POST["repID"];



if (isset($_POST["confirm"])) 

    {

    $email = $_POST["email"];

    $sql = "SELECT * FROM MovingRep
            WHERE FirstName = '$first'
            AND LastName = '$last'
            AND Password = '$password'
            AND RepID = '$repID'
            AND Email = '$email'";

} 

else 

{

    $sql = "SELECT * FROM MovingRep
            WHERE FirstName = '$first'
            AND LastName = '$last'
            AND Password = '$password'
            AND RepID = '$repID'";
}


$result = $conn->query($sql);



if ($result->num_rows > 0) 
    
    {

    $_SESSION["RepID"] = $repID;

    $transaction = $_POST["transaction"];

    if ($transaction == "search") 
        
        {

        header("Location: find.php");

        exit();

    } 
    
    elseif ($transaction == "book") 
    
    {

        header("Location: booking.php");

        exit();

    } 
    
    elseif ($transaction == "cancel") 
    
    {

        header("Location: canceling.php");

        exit();

    } 
    
    elseif ($transaction == "special") 
    
    {

        header("Location: special.php");

        exit();

    } 
    
    elseif ($transaction == "update") 
    
    {

        header("Location: updateSpecial.php");

        exit();

    } 
    
    elseif ($transaction == "create") 
    
    {

        header("Location: newClient.php");

        exit();

    } 
    
    else 
    
    {

        header("Location: menu.php");

        exit();

    }

} 

else 

{
    echo "Incorrect login information.";

    echo '<br><a href="index.php">Try Again</a>';
}



$conn->close();

?>




