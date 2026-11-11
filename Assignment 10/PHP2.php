
<?php
session_start();

$conn = mysqli_connect("sql1.njit.edu", "ca496", "Qv;+63S(9>9tD;vfK-6N", "ca496");


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$id = $_SESSION['student_id'];

$sql = "SELECT *
        FROM Student
        INNER JOIN Transcript
        ON Student.ID = Transcript.ID
        WHERE Student.ID = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
?>

<html>

<body>

<h2>Student Information</h2>

<table border="1">

<tr>
    <th>Student ID</th>

    <th>Name</th>

    <th>Major</th>

    <th>Course</th>

    <th>Grade</th>

</tr>

<?php

while ($row = mysqli_fetch_assoc($result)) 
    {
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Major'] . "</td>";
    echo "<td>" . $row['Course'] . "</td>";
    echo "<td>" . $row['Grade'] . "</td>";
    echo "</tr>";
}
?>

</table>

<br>

<a href="PHP1.php">BACK</a>

</body>

</html>
