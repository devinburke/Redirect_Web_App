<?php
 
$servername = "localhost";
$username = "dburke";
$password = "";
$dbname = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);}

session_start();

$url_to_id = $_SESSION['url_to_id'];
$url_from_id = $_SESSION['url_from_id'];

$url_to_name = $_POST['redirect_to'];
$url_from_name = $_POST['redirect_from'];

$TO = "
UPDATE url_to
SET
url_to_name = '$url_to_name'
WHERE url_to_id = '$url_to_id'";

$FROM = "
UPDATE url_from
SET
url_from_name = '$url_from_name'
where url_from_id = '$url_from_id'";

$conn->query($TO);
$conn->query($FROM);


$check = "
DELETE FROM url_from
WHERE url_from_id
NOT IN
(SELECT url_from_id FROM url_to)
";
$conn->query($check);



$conn->close();
header('Location:index.php');


?>