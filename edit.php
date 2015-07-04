<?php
    /**
     * This page holds the Edit redirect form.
     * When a redirection is edited, the url_redirect_from.url_from column should be updated.
     * If needed, the url_redirect_from.url_redirect_to_id should be updated as well.
     *
     * Note that no url_redirect_to table entries should be edited from this page.
     * Only new url_redirect_to records should be created, and only when neccessary.
     * Thre should never be duplicate url_redirect_to.url_to records in the url_redirect_to table.
     * 
     */
	 
$servername = "localhost";
$username = "dburke";
$password = "";
$dbname = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);}

		 $url_to_id = $_GET['id_to'];
		 $url_from_id = $_GET['id_from'];
		 
	$sql = "select url_from_name from url_from where url_from_id = '$url_from_id'";
	$result=$conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$url_from_name = $row['url_from_name'];
		}}
	$sql = "select url_to_name from url_to where url_to_id = '$url_to_id'";
	$result = $conn->query($sql);
		if ($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				$url_to_name = $row['url_to_name'];
			}
		}
	
	session_start();
	 
	 $_SESSION['url_to_id'] = $url_to_id;
	 $_SESSION['url_from_id'] = $url_from_id;

	

	 
?>
<!DOCTYPE html>
<html>
<head>
    <title>URL Redirect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <style>
        .titleUnderline{
            border-bottom: solid 1px black;
        }
        div.redirect-listings > div.row:nth-child(2){
            background-color: rgba(50,50,50,.5);
        }
        .margin-bottom-small{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center"><a href="index.php">URL Redirection</a></h1>
    </div>
</div>
<br>
<div class="row ">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-12 margin-bottom-small">
                <h2>Edit Redirect</h2>
            </div>
        </div>

        <div class="row">
            <form method="post" action="change_full.php">
                <div class="col-md-12 form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="redirect_from">Redirect From</label>
                        </div>
                        <div class="col-md-8">
                            <input name="redirect_from" class="form-control" type="text" value= "<?php echo $url_from_name; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="redirect_from">Redirect To</label>
                        </div>
                        <div class="col-md-8">
                            <input name="redirect_to" class="form-control" type="text" value= "<?php echo $url_to_name; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-9">
                            <input type="submit" class="form-control"  value="Edit Redirect"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../vendor/twbs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

