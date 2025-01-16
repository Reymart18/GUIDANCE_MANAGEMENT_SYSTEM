<?php
// Include the database connection file
include('db_connection.php');

// Start the session to store user data upon successful login
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input values
    $adminId = mysqli_real_escape_string($con, $_POST['adminId']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to check if the admin credentials match the database
    $sql = "SELECT * FROM ADMIN_ACC WHERE ADMIN_ID = '$adminId' AND PASSWORD = '$password'";
    $result = $con->query($sql);

    // If the admin credentials are correct
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Set session variables
        $_SESSION['adminId'] = $row['ADMIN_ID'];
        $_SESSION['email'] = $row['EMAIL'];

        // Redirect to the admin dashboard
        header("Location: admin_dashboard.php");
        exit;
    } else {
        // If credentials are invalid, show an error message
        $error_message = "Invalid Admin ID or Password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="ADMIN_LOGIN.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <img src="./images/AICS LOGO.png">
        <p>Asian Institute of<br>Computer Studies</p>
    </div>

    <div class="main-content">
        <div class="text-cover">
            <h2>AICS</h2>
            <h1>STUDENT VIOLATION</h1>
            <h1>MONITORING</h1>
            <h1>SYSTEM</h1>
            <p>"A web based Student Violation Tracking and Monitoring System"</p>
        </div>

        <div class="login-container">
            <img src="/images/adminreal.png" style="height:15%;">
            <h2>ADMIN LOGIN</h2>
            <p> Asian Institute of Computer Studies - Bacoor </p> <Br>

            <!-- Display error message if credentials are invalid -->
            <?php if (isset($error_message)) { ?>
                <div style="color: red; font-weight: bold;">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>

            <!-- Login Form -->
            <form method="POST" action="admin_login.php">
                <div class="form-group">
                    <label for="adminId">ADMIN ID</label>
                    <div class="input-wrapper">
                        <input type="text" id="adminId" name="adminId" placeholder="Enter your Admin ID" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">PASSWORD</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>
                <p style="color:blue;"> Forgot password ? </p> <Br><Br>
                <button type="submit" style="width: 100%;">Login</button>
            </form>

            <div class="help">
                <img src="/images/quesmark.png"> 
                <a href="#" style="text-decoration:none;"> Help </a>
            </div>
        </div>
    </div>
</body>

</html>
