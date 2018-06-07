<?php
    
    $paster_name = "PasteR";
    $paster_url = "https://paster.gstd.eu";
    $paster_webpath = "/";
    $paster_directory = "/var/www/paster.gstd.eu/";
    
    $str_ = "";
    
    // Formularübermittlung
	if(isset($_POST["submit"])) {
		
		if($_POST["title"] != "" && $_POST["content"] != "" && $_POST["solution"] != "") {
			
            if(sha1($_POST["solution"]) == $_POST["result"]) {
                
                $checker = true;
                $rand;
                
                while($checker == true) {
                    
                    $rand = rand(10, 99);
                    
                    if(file_exists($paster_directory.$rand)) {
                        
                        $checker = true;
                    } else {
                        
                        $checker = false;
                        mkdir($paster_directory.$rand);
                        $fp = fopen($paster_directory.$rand."/index.html", "w+");
                        $content_streamer = $_POST["content"];
                        $content_streamer = str_replace("&", "&amp;", $content_streamer);
                        $content_streamer = str_replace("<", "&lt;", $content_streamer);
                        $content_streamer = str_replace(">", "&gt;", $content_streamer);
                        $content_streamer = str_replace("\"", "&quot;", $content_streamer);
                        fwrite($fp, "<!doctype html>\r\n".
                                    "<html>\r\n".
                                    "\t<head>\r\n".
                                    "\t\t<meta charset=\"utf-8\" />\r\n".
                                    "\t\t<meta name=\"keywords\" content=\"PasteR, PasteR, PasteR, PasteR, PasteR, PasteR, PasteR, PasteR, PasteR, PasteR\" />\r\n".
                                    "\t\t<meta name=\"description\" content=\"PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR PasteR \" />\r\n".
                                    "\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />\r\n".
                                    "\t\t<title>PasteR</title>\r\n".
                                    "\t\t<style type=\"text/css\">\r\n".
                                    "\t\t\t.f{font-size:14px;font-family:\"Courier New\",monospace;word-wrap:break-word;}\r\n".
                                    "\t\t\t.m{width:50%;margin:auto;text-align:center;}\r\n".
                                    "\t\t\t.p{border:1px solid black;text-align:left;white-space:pre;white-space:pre-wrap;width:100%;padding:3px;}".
                                    "\t\t\t@media only screen and (max-width:480px){.m{width: 90%}}\r\n".
                                    "\t\t\t@media only screen and (min-width: 480px) and (max-width: 960px){.m{width: 90%}}\r\n".
                                    "\t\t\t@media only print{.m{width: 80%;}}".
                                    "\t\t</style>\r\n".
                                    "\t</head>\r\n".
                                    "\t<body>\r\n".
                                    "\t\t<div class=\"m f\">\r\n".
                                    "\t\t\t<h1>\r\n".
                                    "\t\t\t\tPasteR\r\n".
                                    "\t\t\t</h1>\r\n".
                                    "\t\t\t<div class=\"p f\">".$_POST["title"]."</div>\r\n".
                                    "\t\t\t<br />\r\n".
                                    "\t\t\t<div class=\"p f\">".$content_streamer."</div>\r\n".
                                    "\t\t\t<br />\r\n".
                                    "\t\t\t".$paster_name." #<a href=\"".$paster_url.$paster_webpath.$rand."\">".$rand."</a>.\r\n".
                                    "\t\t\t<br />\r\n".
                                    "\t\t\t<br />\r\n".
                                    "\t\t\t<a href=\"".$paster_url.$paster_webpath."\">".$paster_name."</a>\r\n".
                                    "\t\t\t<br />\r\n".
                                    "\t\t\t<br />\r\n".
                                    "\t\t\tCopyright &copy; <a href=\"https://joestr.xyz\" target=\"_blank\">joestr.xyz</a> - Alle Rechte vorbehalten.\r\n".
                                    "\t\t\t<br />\r\n".
                                    "\t\t</div>".
                                    "\t</body>\r\n".
                                    "</html>");
                        fclose($fp);
                        
                        $str_ = $paster_name." #<a href=\"".$paster_url.$paster_webpath.$rand."\">".$rand."</a> generated.";
                    }
                }
            } else {
                
                $str_ = "Captcha wrong.";
            }
		} else {
            
            $str_ = "Please fill out all fields.";
        }
	}
    
	$num1=intval(rand(1, 9));
	$num2=intval(rand(1, 9));
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
                    <?php if(isset($str_) && !empty($str_)): ?>
                        <p id="topNotification">
                            <div class="card">
                                <div class="card-header">Information</div>
                                <div class="card-body"><span><?php echo $str_; ?></span></div>
                                <!--<div class="panel-footer"></div>-->
                            </div>
                        </p>
                        <hr />
                    <?php else: ?>
                    <?php endif; ?>
                    <form action="index.php" method="post" class="form-group">
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
                            <textarea type="text" name="content" placeholder="Content" rows="20" class="form-control" ></textarea>
                        </div>
                        <br />
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <?php echo $num1; ?> + <?php echo $num2; ?> = <input type="hidden" name="result" value="<?php echo sha1(($num1 + $num2)); ?>" />
                                </div>
                            </div>
                            <input type="text"  name="solution" autocomplete="off" class="form-control" />
                        </div>
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
