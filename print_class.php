<?php


class url_list
{
public function Print_List($row_print){
	$servername = "localhost";
$username = "dburke";
$password = "";
$dbname = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);}
					$sql = "
SELECT url_from.url_from_name, url_from.url_from_id, url_to.url_to_name
FROM url_to  
INNER JOIN url_from 
ON url_to.url_from_id = url_from.url_from_id
Order By url_to_name";
$result = $conn->query($sql);

echo "<table border='0' p class ='style15' align='center' cellpadding='5'> ";

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>" . $row[$row_print] . "</td>";
		echo "</tr>";
		
	}
	echo "</table>";
} else {
	echo "0 results";
} $conn->close();	
}


public function Print_Deletes(){
$servername = "localhost";
$username = "dburke";
$password = "";
$dbname = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);}
					$sql = "
SELECT url_from.url_from_name, url_from.url_from_id, url_to.url_to_name
FROM url_to  
INNER JOIN url_from 
ON url_to.url_from_id = url_from.url_from_id
Order By url_to_name";
$result = $conn->query($sql);

echo "<table border='0' p class ='style15' align='center' cellpadding='5'> ";
	
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td><a href='delete.php?id=". $row['url_from_id'] ."'><span class='glyphicon glyphicon-trash'></span></a></td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
} $conn->close();	
}


public function Print_Edits(){
	
$servername = "localhost";
$username = "dburke";
$password = "";
$dbname = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);}
					$sql = "
SELECT url_from.url_from_name, url_from.url_from_id, url_to.url_to_name, url_to.url_to_id
FROM url_to  
INNER JOIN url_from 
ON url_to.url_from_id = url_from.url_from_id
Order By url_to_name";
$result = $conn->query($sql);

echo "<table border='0' p class ='style15' align='center' cellpadding='5'> ";
	
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td><a href='edit.php?id_from=".$row['url_from_id']."&id_to=".$row['url_to_id']."'><span class='glyphicon glyphicon-edit'></span></a></td>";
		echo "</tr>";
		
	}
	echo "</table>";
} else {
	echo "0 results";
} $conn->close();	
}

public function Print_url_to($row_print){
	$servername = "localhost";
$username = "dburke";
$password = "";
$dbname = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);}
					$url_to_count = "
SELECT url_to_name, COUNT(*) AS count FROM url_to GROUP BY url_to_name ORDER BY count DESC";
$result = $conn->query($url_to_count);

echo "<table border='0' p class ='style15' align='center' cellpadding='5'> ";

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>" . $row[$row_print] . "</td>";
		echo "</tr>";
		
	}
	echo "</table>";
} else {
	echo "0 results";
} $conn->close();	
}

public function Print_Deletes_url_to(){
$servername = "localhost";
$username = "dburke";
$password = "";
$dbname = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);}
					$sql = "
SELECT url_to_name, COUNT(*) AS count FROM url_to GROUP BY url_to_name ORDER BY count DESC";
$result = $conn->query($sql);

echo "<table border='0' p class ='style15' align='center' cellpadding='5'> ";
	
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td><a href='delete.php?name=". $row['url_to_name'] ."'><span class='glyphicon glyphicon-trash'></span></a></td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
} 


$check = "
DELETE FROM url_from
WHERE url_from_id
NOT IN
(SELECT url_from_id FROM url_to)
";
$conn->query($check);
$conn->close();	
}



public function Print_edits_url_to(){
$servername = "localhost";
$username = "dburke";
$password = "";
$dbname = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);}
					$sql = "
SELECT url_to_name, COUNT(*) AS count FROM url_to GROUP BY url_to_name ORDER BY count DESC";
$result = $conn->query($sql);

echo "<table border='0' p class ='style15' align='center' cellpadding='5'> ";
	
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td><a href='edit-to-url.php?name=". $row['url_to_name'] ."'><span class='glyphicon glyphicon-edit'></span></a></td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
} $conn->close();	
}

}
	?>
















