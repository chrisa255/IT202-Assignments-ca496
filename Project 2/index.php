


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Moving On Up</title>

    <link rel="stylesheet" href="fonts.css">

    <script src="script.js" defer></script>

</head>

<body>

    <h1>Moving On Up</h1>

    <form id="loginForm" action="login.php" method="POST">

        <label for="first">First Name:</label>
        
        <input type="text" id="first" name="first">


        <label for="last">Last Name:</label>

        <input type="text" id="last" name="last">


        <label for="phone">Phone Number + Extension:</label>

        <input type="text" id="phone" name="phone" placeholder="201-111-0001 ext 1">


        <label for="repID">Representative ID:</label>

        <input type="text" id="repID" name="repID" maxlength="4" placeholder="4-digit ID">


        <label for="email">Representative Email:</label>

        <input type="text" id="email" name="email">


        <label for="password">Password:</label>

        <input type="password" id="password" name="password">

        <label>

            <input type="checkbox" id="confirm" name="confirm" value="yes">




            Email Verification

        </label>

        <label for="transaction">Transaction:</label>

        <select id="transaction" name="transaction">


            <option value="">Choose a transaction</option>

            <option value="search">Search a Moving Representative's Account</option>

            <option value="book">Book a Client's Moving Event</option>

            <option value="cancel">Cancel a Client's Moving Event</option>

            <option value="special">Special Instructions for the Move</option>

            <option value="update">Update Special Instructions for Move</option>

            <option value="create">Create a New Client Account</option>

        </select>

        <input type="submit" id="submit" value="Submit">

        <input type="reset" id="reset" value="Reset">

    </form>

</body>

</html>




