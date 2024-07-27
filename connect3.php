<?php
    // Replace the values for host, username, password, and database_name
    // with your own database connection details
$host = "localhost";
$username = "id20492573_root";
$password = "S8wCetM0~Pfo*!|_";
$dbname = "id20492573_scholaships2";

    // Create a connection to the database
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the email and password from the login form
    $email = $_POST['email'];
    $password = $_POST['password'];


     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $num1 = $_POST['role'];
       
       if($num1=='user'){
  // Query the database for the user with the given email
    $query = "SELECT Email, Password FROM user_details WHERE Email='$email'";
    $result = mysqli_query($conn, $query);

    // Check if there is a user with the given email
    if (mysqli_num_rows($result) > 0) {
        // Get the user's email and password from the database
        $row = mysqli_fetch_assoc($result);
        $db_email = $row['Email'];
        $db_password = $row['Password'];

        // Check if the password is correct
        if ($password == $db_password) {
            // The user exists and the password is correct, so log them in
            header("Location: userhome.html");
            exit();
        } else {
            // The password is incorrect, so show an error message
            echo "<script>alert('Incorrect password.');history.back();</script>";
        }
    } else {
        // The user does not exist, so show an error message
        echo "<script>alert('Email does not exist');history.back();</script>";
    }
       }
       else
       {
           // Query the database for the user with the given email
    $query = "SELECT Email, Password FROM admin_details WHERE Email='$email'";
    $result = mysqli_query($conn, $query);

    // Check if there is a user with the given email
    if (mysqli_num_rows($result) > 0) {
        // Get the user's email and password from the database
        $row = mysqli_fetch_assoc($result);
        $db_email = $row['Email'];
        $db_password = $row['Password'];

        // Check if the password is correct
        if ($password == $db_password) {
            // The user exists and the password is correct, so log them in
            header("Location: adminhome.html");
            exit();
        } else {
            // The password is incorrect, so show an error message
            echo "<script>alert('Incorrect password.');history.back();</script>";
        }
    } else {
        // The user does not exist, so show an error message
        echo "<script>alert('Email does not exist');history.back();</script>";
    }
       }
 
}

    
    
    
    
    // Close the database connection
    mysqli_close($conn);
?>