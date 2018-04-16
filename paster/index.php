<?php
    
    $paster_name = "PasteR";
    $paster_webpath = "/paster/";
    $paster_directory = "/var/www/html/paster/";
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
                                    "\t\t\t".$paster_name." #<a href=\"http://repo.joestr.xyz".$paster_webpath.$rand."\">".$rand."</a>.\r\n".
                                    "\t\t\t<br />\r\n".
                                    "\t\t\t<br />\r\n".
                                    "\t\t\t<a href=\"https://repo.joestr.xyz".$paster_webpath."\">".$paster_name."</a>\r\n".
                                    "\t\t\t<br />\r\n".
                                    "\t\t\t<br />\r\n".
                                    "\t\t\tCopyright &copy; <a href=\"https://joestr.xyz\" target=\"_blank\">joestr.xyz</a> - Alle Rechte vorbehalten.\r\n".
                                    "\t\t\t<br />\r\n".
                                    "\t\t</div>".
                                    "\t</body>\r\n".
                                    "</html>");
                        fclose($fp);
                        
                        $str_ = $paster_name." #<a href=\"http://repo.joestr.xyz".$paster_webpath.$rand."\">".$rand."</a> generated.";
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
		<title><?php echo $paster_name; ?></title>
        <style type="text/css">
            .f{font-size:14px;font-family: "Courier New", monospace;}
            .m{width:50%;}
            .p{width:100%;}
            @media only screen and (max-width:480px){.m{width:90%}}
            @media only screen and (min-width:480px) and (max-width: 960px){.m{width:90%}}
            @media only print{.m{width:80%;}}
        </style>
	</head>
	<body>
        <div class="m f" style="text-align:center;margin:auto;">
            <h1>
                <?php echo $paster_name; ?>
            </h1>
            <!-- Formular -->
            <form action="index.php" method="post">
                <textarea type="text" name="title" placeholder="Title" rows="1" class="p f"></textarea>
                <br />
                <br />
                <textarea type="text" name="content" placeholder="Content" rows="25" class="p f"></textarea>
                <br />
                <br />
                <?php echo $num1; ?> + <?php echo $num2; ?> = <input type="hidden" name="result" value="<?php echo sha1(($num1 + $num2)); ?>" />
                <br />
                <input type="text"  name="solution" autocomplete="off" class="f" />
                <br />
                <br />
                <input type="submit" name="submit" value="Create" class="f" />
            </form>
            <br />
            <?php echo "\t\t\t".$str_; ?>
            <br />
            <br />
            <a href="https://repo.joestr.xyz<?php echo $paster_webpath; ?>"><?php echo $paster_name; ?></a>
            <br />
            <br />
            Copyright &copy; <a href="https://joestr.xyz/" target="_blank">joestr.xyz</a> - Alle Rechte vorbehalten.
            <br />
        </div>
	</body>
</html>
