<?php
// establish database connection
$servername = "localhost";
$username = "id20492573_root";
$password = "S8wCetM0~Pfo*!|_";
$dbname = "id20492573_scholaships2";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// get user details from the web form
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$Gender = $_POST['Gender'];
$Scholarship_Category = $_POST['Scholarship_Category'];
$RPassword=$_POST['RPassword'];

// insert user details into the database

if($Password==$RPassword)
{
    $sql = "INSERT INTO user_details (Firstname, Lastname, Email, Password, Gender, Scholarship_Category) VALUES ('$Fname', '$Lname', '$Email', '$Password', '$Gender', '$Scholarship_Category')";
    
if (mysqli_query($conn, $sql)) {
   echo "<script>alert('User details added successfully!')</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}


// close database connection
mysqli_close($conn);
?>

