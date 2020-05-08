<?php
function display_images() {
    // starting at current directory
    $dir = "uploads";
    if (is_dir($dir)) {
        if ($dir_handle = opendir($dir)) {
            while ($filename = readdir($dir_handle)) {
                if (!is_dir($filename) && $filename != '.DS_Store') {
                    $filename = urlencode($filename);
                    echo "<div><img src=\"uploads/$filename\" alt=\"A photo\" height=\"500\"</div>";
                    echo "<p><a href=\"?file=$filename\">Delete picture</a>";
                }
            } // end while
            // close directory now that we no longer need it
            closedir($dir_handle);
        } // end if
    } // end if
}