 
<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your password is: <?php echo $_POST["password"]; ?>

<?php
$user=$_POST["name"];
$password=$_POST["password"];

echo " \n started php script\n";
echo $user;



$servername = "localhost";
$username = "root";
$password = "West!2017!!!";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS comdata";
if ($conn->query($sql) === TRUE) {
   	echo "Database created successfully";
} else{
	echo "Database already exists";
}

mysqli_select_db($conn, 'comdata');
// Create database
/*if(mysql_select_db('comdata',$conn)){
	echo "Database exists";
}else{
	echo "Database Does Not exist";
	$sql = "CREATE DATABASE comdata";
	if ($conn->query($sql) === TRUE) {
    	echo "Database created successfully \n ";
	} else {
    	echo "Error creating database: "; //. $conn->error;
	}
}*/


// create table
$sql1 = "CREATE TABLE Myuser (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql1) === TRUE) {
    echo "Table Myuser created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

/*
$sql = "INSERT INTO Myuser (firstname, lastname, email)
VALUES ('Arup', 'Kumar', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO Myuser (firstname, lastname, email)
VALUES ('Mita', 'Das', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO Myuser (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO Myuser (firstname, lastname, email)
VALUES ('Anuva', 'Mondal', 'john@example.com')";

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
$sql = "select * from Myuser where firstname='$user' and lastname='Kumar'";
echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();



?> 

</body>
</html>





 