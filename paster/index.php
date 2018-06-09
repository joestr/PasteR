<?php
    
    session_start();
    
    if(isset($_SESSION["servicename"]) && !empty($_SESSION["servicename"]) && $_SESSION["servicename"] == "PasteR_Message") {
        
        $message = $_SESSION["message"];
        session_destroy();
    }
    
    $paster_name = "PasteR";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="keywords" content="PasteR, PasteR, PasteR, PasteR, PasteR, PasteR, PasteR, PasteR, PasteR, PasteR" />
		<meta name="description" content="PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        
		<title><?php echo $paster_name; ?> - Home</title>
        
        <link rel="stylesheet" type="text/css"href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
         
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
        <script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body>
    
        <div class="jumbotron text-center" style="margin-bottom: 0;">
			<h1>PasteR</h1>
			<p>PHP Paste Tool</p> 
		</div>
        
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#">PasteR</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item active">
                        <a class="nav-link">Home</a>
                    </li>
                </ul>
			</div>
		</nav>
        
        <div class="container-fluid text-center">
            <br />
            <div class="row content">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 text-left">
                    <?php if(isset($message) && !empty($message)): ?>
                        <p id="topNotification">
                            <div class="card">
                                <div class="card-header">Information</div>
                                <div class="card-body"><span><?php echo $_SESSION["message"]; ?></span></div>
                                <!--<div class="panel-footer"></div>-->
                            </div>
                        </p>
                        <hr />
                    <?php else: ?>
                    <?php endif; ?>
                    <form action="action.php" method="post" class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Title
                                </div>
                            </div>
                            <input type="text" name="title" placeholder="Title" class="form-control" />
                        </div>
                        <br />
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Content
                                </div>
                            </div>
                            <textarea type="text" name="content" placeholder="Content" rows="15" class="form-control" ></textarea>
                        </div>
                        <br />
                        <div class="g-recaptcha" data-sitekey="6LdiMF4UAAAAALXVSrQ3meofwzaNH4ZcHgkiaxw9"></div>
                        <br />
                        <input type="submit" name="submit" value="Create" class="btn btn-primary" />
                    </form>
                </div>
                <div class="col-sm-2"></div>
            </div>
            <br />
        </div>
        
        <footer class="jumbotron text-center" style="margin-bottom: 0;">
			Copyright &copy; 2016 - 2018 <a href="https://joestr.xyz/" target="_blank">joestr.xyz</a>
		</footer>
        
	</body>
</html>
