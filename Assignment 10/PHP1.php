
<?php
session_start();

$conn = mysqli_connect("sql1.njit.edu", "ca496", "Qv;+63S(9>9tD;vfK-6N", "ca496");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

    $id = $_POST['student_id'];

    $sql = "SELECT * FROM Student WHERE ID = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {

        $_SESSION['student_id'] = $id;

        header("Location: PHP2.php");

        exit();

    } else 
    
    {
        echo "<script>alert('Student ID can not be found');</script>";
    }

}
?>

<html>

<body>


<form method="POST">

    Student ID:

    <input type="text" name="student_id">

    <input type="submit" name="submit" value="Submit">

</form>

</body>

</html>
