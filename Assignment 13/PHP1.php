



<!DOCTYPE html>

<html>

<body>


<form method="POST">

    Student Name:

    <input type="text" name="name">

    <input type="submit" value="Submit">

</form>

<?php



$conn = new mysqli("sql1.njit.edu", "ca496", "Qv;+63S(9>9tD;vfK-6N", "ca496");

if (isset($_POST['name'])) 
    
    {

    $name = $_POST['name'];

    $sql = "SELECT * FROM Students WHERE Name = '$name'";

    $result = $conn->query($sql);

    echo "<table border='1'>";

    echo "<tr><th>Name</th><th>ID</th><th>Major</th></tr>";

    while ($row = $result->fetch_assoc()) 
        
        {

        echo "<tr>";

        echo "<td>" . $row['Name'] . "</td>";

        echo "<td>" . $row['ID'] . "</td>";

        echo "<td>" . $row['Major'] . "</td>";

        echo "</tr>";

    }

    echo "</table>";

}

$conn->close();

?>


</body>

</html>


