<?php
$servername = "localhost";
$username = "dburke";
$password = "";
$dbname = "myfirstdb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['url_to_old'])){
	$url_old = $_POST['url_to_old'];
}
if (isset($_POST['url_to_new'])){
	$url_new = $_POST['url_to_new'];
}

$sql = "
UPDATE url_to 
SET 
url_to_name = '$url_new'
WHERE url_to_name = '$url_old'";

$conn->query($sql);
$conn->close();

header('Location:edit-to-urls.php');

?>


