<?php

// grabs images from uploads folder and displays them on page
function display_images() {
    if(isset($_SESSION['username'])) {
        $dir = "uploads/{$_SESSION['username']}";
    } else {
        $dir = 'uploads';
    }
    
    if (is_dir($dir)) {
        if ($dir_handle = opendir($dir)) {
            while ($filename = readdir($dir_handle)) {
                if (!is_dir($filename) && $filename != '.DS_Store') {
                    $filename = rawurlencode($filename);
                    echo "<div><img src=\"uploads/{$_SESSION['username']}/{$filename}\" alt=\"A photo\"><a class=\"btn text-info\" href=\"?file=$filename\">Delete picture</a></div>";
                }
            } // end while
            // close directory now that we no longer need it
            closedir($dir_handle);
        } // end if
    } // end if
}

// creates folder for logged-in user if not already in existence
function folder_checker($username) {
    if (!is_dir($username)) {
        mkdir('uploads/' . $username);
    }
}

?>