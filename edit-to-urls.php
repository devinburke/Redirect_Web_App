<?php
    /**
     * This page lists all of the url_redirect_to.url_to records.
     * Do not implement dates unless you have time.
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
        <h1 class="text-center" ><a href="index.php">URL Redirection</a></h1>
    </div>
</div>
<br>

<div class="row ">
    <div class="col-md-8 col-md-offset-2">

        <div class="row">
            <div class="col-md-12">
                <h2>Redirect To List</h2>
            </div>
        </div>

        <div class="row">
            <?php  //list all redirects here, ordered by the to-url ?>
            <div class="col-md-8">
                <h4 class="titleUnderline">Url To </h4>
            </div>
            <div class="col-md-2">
                <h4 class="titleUnderline"># of Redir's</h4>
            </div>
            <div class="col-md-2">
                <h4 class="titleUnderline">Actions</h4>
            </div>
        </div>

        <div class="redirect-listings">
            <?php  //list all to-urls here, ordered by the to-url ?>
            <div class="row">
                <div class="col-md-8">
                     <?php 
					include_once 'print_class.php';
					$to_print = "url_to_name";
					$to_print_test = new url_list();
					$to_print_test->Print_url_to($to_print);
					?>
                </div>
                <div class="col-md-2 text-center">
                    <!-- show number of pages linking to this URL -->
					<?php
                    $url_num = "count";
					$url_num_ob = new url_list();
					$url_num_ob->Print_url_to($url_num);?>
					
                </div>
                <div class="col-md-1">
                    <!-- feel free to chane this href as needed -->
					<?php 
					$edit = new url_list();
					$edit->Print_edits_url_to();
					?>
                </div>
                <div class="col-md-1">
                    <!-- feel free to chane this href as needed -->
					<?php
					$delete = new url_list();
					$delete->Print_Deletes_url_to(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../vendor/twbs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

