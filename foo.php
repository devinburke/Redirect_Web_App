<?php

	

$servername = "localhost";
$username = "dburke";
$password = "";
$dbname = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$url_from = $_POST['redirect_from'];
$url_to = $_POST['redirect_to'];
$sql = "INSERT INTO url_from (url_from_name, start_from, end_from) VALUES ('$url_from', NOW(), NOW())";

if ($conn->query($sql) == TRUE )
{$last_id = $conn->insert_id;
}
$insert_to = "INSERT INTO url_to (url_to_name, url_from_id, start_to, end_to) VALUES ('$url_to','$last_id',NOW(),NOW())";
$conn->query($insert_to);
$conn->close();
header('Location:index.php');
?>

