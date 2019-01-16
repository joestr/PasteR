<?php
    
    session_start();
    
    $paster_url = $_SERVER["SERVER_NAME"];
    $paster_webpath = "/";
    $paster_directory = getcwd();
    $paster_pastes_directory = "p/";
    $paster_pastes_extension = ".txt";
    
    $str_ = "";
    
    function getRandomHex($num_bytes=4) {
        
        return bin2hex(openssl_random_pseudo_bytes($num_bytes));
    }

    // Formularübermittlung
	if(isset($_POST["submit"])) {
        
        $valid = true;
        
        if($valid && (!isset($_POST["title"]) || empty($_POST["title"]))) {
            
            $str_ = "Field 'title' has to be set.";
            $valid = false;
        }
        
        if($valid && (!isset($_POST["content"]) || empty($_POST["content"]))) {
            
            $str_ = "Field 'content' has to be set.";
            $valid = false;
        }
        
        if($valid && (!isset($_POST["g-recaptcha-response"]) || empty($_POST["g-recaptcha-response"]))) {
            
            $str_ = "Cpatcha failed";
            $valid = false;
        }
        
        $checker = true;
        $counter = 0;
        $rand;
                    
        while($valid && ($checker == true && $counter < 10)) {
            
            $rand = getRandomHex(4);
           
            if(file_exists($paster_directory.$paster_pastes_directory.$rand.$paster_pastes_extension)) {
            
                $checker = true;
                $counter = $counter + 1;
            } else {
                
                $checker = false;
            }
        }
        
        if($valid && ($counter == 10)) {
            
            $str_ = "Could not find any random Hex-Code during ten tries.";
            $valid = false;
        }
        
        if($valid && ($checker == false)) {
            
            $dir = $paster_directory.$paster_webpath.$paster_pastes_directory;
            
            mkdir($dir, 0777, true);
            
            //if(!file_exists($dir) && !is_dir($dir) && !is_writable($paster_directory)) {
            //    
            //    $str_ = "Directory $dir doesn't exists and $paster_directory is not writeable.";
            //} else {
            //    
            //    mkdir($dir, 0777, true);
            //}
            
            if(!file_exists($dir) && !is_dir($dir)) {
                
                $str_ = "Directory $dir does not exists.";
            } else {
                
                if(!mkdir($dir, 0777, true)) {
                    
                    $str_ = "Directory $dir cannot be created.";
                }
            }
            
            $fp = fopen($paster_directory.$paster_webpath.$paster_pastes_directory.$rand.$paster_pastes_extension, "w+");
            
            fwrite($fp, $_POST["title"]."\r\n\r\n".$_POST["content"]."\r\n\r\n".$paster_url.$paster_webpath.$paster_pastes_directory.$rand.$paster_pastes_extension);
            
            fclose($fp);
            
            $str_ = "#<a href=\"".$paster_webpath.$paster_pastes_directory.$rand.$paster_pastes_extension."\">".$rand."</a> generated.";
        }
        
        $_SESSION["servicename"] = "PasteR_Message";
        $_SESSION["message"] = $str_;
    }    
    
    header("Location: index.php");
?>
