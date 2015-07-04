<?php
    /**
     * url_redirect_to table entries should be edited from this page.
     * Thre should never be duplicate url_redirect_to.url_to records in the url_redirect_to table.
     * 
     * The url_redirect_from table should not be touched in any way as a result of using this form.
     *     (there is one exception here that is optional to implement:
     *         if, when a url_redirect_to record is edited, the url_redirect_to.url_to value has changed
     *         and another url_redirect_to entry's url_to column is already equal to the value that the user
     *         wants to change this entry's url_to column to (entry B), then (instead of editing this record) you
     *         could update all url_redirect_from.url_redirect_to_id entries that point to this record to 
     *         instead point to entry B.
     *     )
     */
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
                <h2>Edit Single Redirect To Url</h2>
            </div>
        </div>

        <div class="row">
            <form method="post" action="edit_to.php">
                <div class="col-md-12 form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="redirect_from">Redirect To Old</label>
                        </div>
                        <div class="col-md-8">
                            <input name="url_to_old" class="form-control" type="text" value="<?php echo $_GET['name'];?>"/>
                        </div>
						 <div class="col-md-4">
                            <label for="redirect_from">Redirect To New</label>
                        </div>
                        <div class="col-md-8">
                            <input name="url_to_new" class="form-control" type="text" value=""/>
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

