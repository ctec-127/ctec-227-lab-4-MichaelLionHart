<?php
    session_start();
    $username = $_SESSION['username'];
    // Define these errors in an array
    $upload_errors = array(
        UPLOAD_ERR_OK                 => "No errors.",
        UPLOAD_ERR_INI_SIZE          => "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE         => "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL             => "Partial upload.",
        UPLOAD_ERR_NO_FILE             => "Please select a file to upload",
        UPLOAD_ERR_NO_TMP_DIR         => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE         => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION         => "File upload stopped by extension."
    );
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // file we are moving
        $tmp_file = $_FILES['file_upload']['tmp_name'];
        // setting target file name
        $target_file = basename($_FILES['file_upload']['name']);
        // setting upload folder name
        $uploads = "uploads/" . $_SESSION['username'];    
        
        if (move_uploaded_file($tmp_file, $uploads . "/" . $target_file)) {
            $message = "Image uploaded successfully";
        } else {
            $error = $_FILES['file_upload']['error'];
            $message = $upload_errors[$error];
        }
    }

    if (isset($_GET['file'])){
        copy("uploads/" . $_SESSION['username'] . "/" . $_GET['file'],'backup/'.$_GET['file']);
        // insert code from tuesday to move the file somewhere else instead of deleting
        if(unlink("uploads/" . $_SESSION['username'] . "/" . $_GET['file'])){
            header('Location: image-gallery.php');
        } else {
            echo '<p>Sorry, I could not delete the file you selected.</p>';
        }
    }

    
    
?>