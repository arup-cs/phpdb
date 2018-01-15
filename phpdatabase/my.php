 
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
echo "Connected successfully there";

//$sql = "CREATE DATABASE comdata";
//if ($conn->query($sql) === TRUE) {
 //   	echo "Database created successfully";
//	} 

/*
// Create database
if(mysql_select_db('comdata',$conn)){
	echo "Database exists";
}else{
	echo "Database Does Not exist";
	$sql = "CREATE DATABASE comdata";
	if ($conn->query($sql) === TRUE) {
    	echo "Database created successfully \n ";
	} else {
    	echo "Error creating database: "; //. $conn->error;
	}
}
*/


echo "Skipped the create database";

$conn->close();



?> 

</body>
</html>





 