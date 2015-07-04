<?php

$servername = "localhost";
$username = "dburke";
$password = "";
$dbname = "myfirstdb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (isset($_GET['id']) AND $_GET['id'] > 0) 
{ 
     $from_id = $_GET['id'];
	
	 $sql = "Select url_to.url_to_id 
	 FROM url_to 
	 INNER JOIN url_from
	 ON url_to.url_from_id = url_from.url_from_id
	 WHERE url_to.url_from_id = '$from_id'";
	 
	 $result = $conn->query($sql);
		 if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
				 $to_id = $row['url_to_id'];}}
				 
	$drop_to = "DELETE FROM url_to WHERE url_to_id = '$to_id'";
	$drop_from = "DELETE FROM url_from WHERE url_from_id = '$from_id'";
	$conn->query($drop_to);
	$conn->query($drop_from);
	$conn->close();
	header('Location:index.php');
			 
} 

if (isset($_GET['name']) AND $_GET['name'] != ""){
	
	$url_to_name = $_GET['name'];
	
	$sql = "DELETE FROM url_to WHERE url_to_name = '$url_to_name'";
	
	$conn->query($sql);
	$conn->close();
	header('Location:edit-to-urls.php');
	
	
	
}


?>