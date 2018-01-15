 
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
echo (" \nConnected successfully there \n ");

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

$sql = "INSERT INTO Myuser (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}














$conn->close();



?> 

</body>
</html>





 