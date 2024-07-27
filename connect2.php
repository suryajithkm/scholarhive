<!DOCTYPE html>
<html>
<head>
	<title>Scholarship Search Results</title>
	<style>
	body {
        background-image:url(cloud.jpg);
        font-family: Arial, Helvetica, sans-serif;
      }
		h1 {
			text-align: center;
		}
		table {
			margin: auto;
			border-collapse: collapse;
			width: 80%;
			border: 1px solid #ddd;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
        footer {
            position: fixed;
            bottom: 0;
            right: 0;
            padding: 5px;
            background-color: #006699; /* added footer background color */
            color: #fff;
        }
        .title
        {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding-right: 50px;
        padding-left: 10px;
        position: relative;
        top: 60px;
    }
      nav a {
        color: #000;
        text-decoration: none;
        font-size: medium;
        text-align: right;
        padding: 10px;
        position: relative;
        top: 50px;
      }
      nav a:hover {
        font-weight: bolder;
        text-decoration: underline;
      }
      .Heading
      a {
        font-size: 80px;
        color: #000;
        text-decoration: none;
        position: relative;
        bottom: 65px;
        margin-bottom: 0.5 em;
      }
	</style>
</head>
<body>
      <div class="title">
      <h1 class="Heading"><a href="#"> Scholarhive&reg; </a></h1>
      <nav class="nav">
        <a href="home.html">HOME</a>
         <a href="login.html">LOGOUT</a>
         </nav>
  </div>
  
<?php

// Set database credentials
$servername = "localhost";
$username = "id20492573_root";
$password = "S8wCetM0~Pfo*!|_";
$dbname = "id20492573_scholaships2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize user input
$Caste = $conn->real_escape_string($_POST["Caste"]);
$Gender = $conn->real_escape_string($_POST["Gender"]);
$Income = $conn->real_escape_string($_POST["Income"]);

// Prepare and execute parameterized query
$stmt = $conn->prepare("SELECT * FROM postmatric WHERE Cast = ? AND sex = ? AND Max_Income > ?");
$stmt->bind_param("sss", $Caste, $Gender, $Income);
$stmt->execute();
$result = $stmt->get_result();

// Output search results
if ($result->num_rows > 0) {
    echo "<h1>Scholarship Search Results</h1>";
    echo "<table>";
    echo "<tr><th>Scholarship ID</th><th>Name</th><th>Provider</th><th>About</th><th>Deadline</th><th>Renewal Requirements</th><th>Contact</th><th>Application Link</th><th>Currently Available?</th><th>Category</th><th>Minimum Age</th><th>Max Income</th><th>Gender</th><th>Caste</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Scholarship_ID"]. "</td><td>" . $row["Scholarship_Name"]. "</td><td>" . $row["Provider_Name"]. "</td><td>" . $row["Description"]. "</td><td>" . $row["Application_Deadline"]. "</td><td>" . $row["Renewal_Requirements"]. "</td><td>" . $row["Contact_Info"]. "</td><td><a href='" . $row["Application_Link"]. "'>" . $row["Application_Link"]. "</a></td><td>" . $row["Status"]. "</td><td>" . $row["Scholarship_Category"]. "</td><td>" . $row["Minimum_age"]. "</td><td>" . $row["Max_Income"]. "</td><td>" . $row["Sex"]. "</td><td>" . $row["Cast"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h1>No Results Found</h1>";
}

// Close MySQL database connection
$stmt->close();
$conn->close();
?>
</body>

