 
<html>
<body>



<?php
$user=$_POST["name"];
$password=$_POST["password"];

//Server credentials
$servername = "localhost";
$username = "root";
$dbpassword = "West!2017!!!";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Creating Database
$sql = "CREATE DATABASE IF NOT EXISTS comdata";
if ($conn->query($sql) === TRUE) {
   	echo "";
} else{
	//echo "Database already exists";
}

//making connection to database
mysqli_select_db($conn, 'comdata');

// create table
$sql1 = "CREATE TABLE userdata (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
password VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql1) === TRUE) {
    echo "Table Myuser created successfully";
} else {
   // echo "Error creating table: " . $conn->error;
}

/*
$sql = "INSERT INTO userdata (username, password)
VALUES ('mita', '1234')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO userdata (username, password)
VALUES ('am206', '5678')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT INTO userdata (username, password)
VALUES ('dn31', '9012')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/

/*

//Running query from user input
$stmt = $mysqli->prepare(
  "SELECT * FROM Myuser WHERE firstname = ?");
$stmt->bind_param( "s", $user); 
// "ss' is a format string, each "s" means string
$stmt->execute();

$stmt->bind_result($col1, $col2);
// then fetch and close the statement


*/
$sql = "select * from userdata where username='$user' and password='$password'";
//$result = $conn->query($sql);

//Protection should be enabled to reduce the attack surface

//$protection="REVOKE ALL ON contacts FROM 'smithj'@'localhost';"


//Executing the query

//$sql = "SELECT * FROM userdata; "."SELECT * FROM userdata;";


if(!$conn->multi_query($sql)){
    echo "Multi query failed";
}

do{
   $result=$conn->store_result();
   while($row = $result->fetch_assoc()) {
        echo "".$row[id]." ";
        echo $row["username"];
        echo "<br>";
    }
    $result->free();
} while($conn->next_result());

/*



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Welcome to the website! <br> <br> ";
        echo "log in successfull for<br>";
        echo $row[id]." - User Name: " . $row["username"]. " " . "<br>";
        echo "Welcome ". $row["username"];

    }
} else {
    echo "Log in error!! ";
    echo "invalid username or password";
}
*/
$conn->close();

?> 

</body>
</html>