


<?php

$host = "mysql01.arcs.njit.edu";

$username = "ca496";

$password = "Qv;+63S(9>9tD;vfK-6N";

$database = "ca496";

$conn = new mysqli("sql1.njit.edu", "ca496", "Qv;+63S(9>9tD;vfK-6N", "ca496");


if ($conn->connect_error) 
    
{
    die("Database connection failed: " . $conn->connect_error);
}

?>




