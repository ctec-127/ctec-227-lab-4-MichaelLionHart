<?php
    // start session
    session_start();
    // set username to a session variable
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
    
    // if upload button clicked
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // get handle to file we are moving
        $tmp_file = $_FILES['file_upload']['tmp_name'];
        // set target file name
        $target_file = basename($_FILES['file_upload']['name']);
        // set upload folder name
        $uploads = "uploads/" . $_SESSION['username'];    
        // if file uploaded successfully
        if (move_uploaded_file($tmp_file, $uploads . "/" . $target_file)) {
            // diplay success message
            $message = "Image uploaded successfully";
        // otherwise display error message
        } else {
            $error = $_FILES['file_upload']['error'];
            $message = $upload_errors[$error];
        }
    }

    // if delete image button clicked
    if (isset($_GET['file'])){
        // copy file to backup directory
        copy("uploads/" . $_SESSION['username'] . "/" . $_GET['file'],'backup/'.$_GET['file']);
        // delete file from uploads folder and return browser to the same page
        if(unlink("uploads/" . $_SESSION['username'] . "/" . $_GET['file'])){
            header('Location: image-gallery.php');
        // otherwise display error message
        } else {
            echo '<p>Sorry, I could not delete the file you selected.</p>';
        }
    }

    
    
?>