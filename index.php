<?php
    /**
     * This is the the main URL Redirection page
     */
?>
<!DOCTYPE html>
<html>
<head>
    <title>URL Redirection</title>
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
        h4 span.glyphicon{
            font-size: .75em;
        }
        .margin-bottom-small{
            margin-bottom: 10px;
        }
		tr {
			height:40px;
		}
    </style>
</head>
<body>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center" >URL Redirection</h1>
    </div>
</div>
<br>

<div class="row ">
    <?php
        /**
         * Form to add a redirect.
         * Do not implement Dates unless you have time.
         */
    ?>
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-12 margin-bottom-small">
                <h2>Add Redirect</h2>
            </div>
        </div>

        <div class="row">
            <form method="post" action="foo.php">
                <div class="col-md-12 form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="redirect_from">Redirect From</label>
                        </div>
                        <div class="col-md-8">
                            <input name="redirect_from" class="form-control" type="text"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="redirect_from">Redirect To</label>
                        </div>
                        <div class="col-md-8">
                            <input name="redirect_to" class="form-control" type="text"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-9">
                            <input type="submit" class="form-control"  value="Add Redirect"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-md-12">
                <h2>Redirect List</h2>
            </div>
        </div>

        <?php
            /**
             * List all redirects here, ordered by the to-url
             */
        ?>
        <div class="row">
            <div class="col-md-5">
                <h4 class="titleUnderline">Url To <a href="edit-to-urls.php"><span class="glyphicon glyphicon-pencil pull-right"></span></a></h4>
            </div>
            <div class="col-md-5">
                <h4 class="titleUnderline">Url From</h4>
            </div>
            <div class="col-md-2">
                <h4 class="titleUnderline">Actions</h4>
            </div>
        </div>

        <div class="redirect-listings">
            <div class="row">
                <div class="col-md-5">
                    <?php 
					include_once 'print_class.php';
					$to_print = "url_to_name";
					$to_print_test = new url_list();
					$to_print_test->Print_List($to_print);
					?>
                </div>
                <div class="col-md-5">
                   <?php 
					$print_from = "url_from_name";
					$from_print_test = new url_list();
					$from_print_test->Print_List($print_from);
				  ?>
                </div>
                <div class="col-md-1">
                    <!-- feel free to chane this href as needed -->
					<?php
					$delete = new url_list();
					$delete->Print_Edits();
					?>
				
					
                </div>
                <div class="col-md-1">
                    <!-- feel free to chane this href as needed -->
					<?php
					$delete = new url_list();
					$delete->Print_Deletes();
					?>
				
				
				</div>
            </div>
        </div>
    </div>
</div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../vendor/twbs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

