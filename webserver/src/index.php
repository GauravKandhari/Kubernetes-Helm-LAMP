<?php
echo "Inside Minikube with MySQL\n <br>";
$mysql_host = getenv('MYSQL_HOST');
$mysql_user = getenv('MYSQL_USER');
$mysql_password = getenv('MYSQL_PASSWORD');
$mysql_db = getenv('MYSQL_DATABASE');
$conn = new mysqli("$mysql_host:3306", "$mysql_user", "$mysql_password", "$mysql_db");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE IF NOT EXISTS mytable ( firstname VARCHAR(30) NOT NULL )";
if ($conn->query($sql) == TRUE) {
	echo "Table Created Successfully\n";
} else {
	echo "Error Creating table: ";
}
$sql = "INSERT INTO mytable(firstname) VALUES('Hello')";
$conn->query($sql);
$result = $conn->query("SELECT * FROM mytable");
while($row = $result->fetch_assoc())
{
	echo $row['firstname']. "<br>";
}
$conn->close();
