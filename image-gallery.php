<?php
// set page title
$pageTitle = "Image Gallery";
// require php logic
require_once 'inc/logic.inc.php';
// require php functions
require_once 'inc/functions.inc.php';
// load header
require_once 'inc/header.inc.php';
// load nav
require_once 'inc/nav.inc.php';
// create backup directory
if (!is_dir('backup')) {
    mkdir('backup');
}
?>

<div class="container main">
        <!-- form -->
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="container m-4">
                <div class="row">
                    <div class="col-md-12 preview-zone-hidden">
                        <br>
                        <h1>Upload Your Favorite Images</h1>
                        <div class="form-group center">                          
                            <p>Choose an image file</p>                               
                            <input type="file" name="file_upload" class="dropzone">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-left">Upload</button><br><br>
                        <?php
                        if (!empty($message)) {
                            echo "<p id=\"alert\" class=\"alert alert-primary mt-4\">{$message}</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </form> <!-- end of form -->

        <!-- container for diaplaying images -->
        <div class="container special">
            <div class="row">
                <div class="col-12 d-flex flex-wrap flex-row align-items-between justify-content-center">
                    <?php display_images(); ?>
                </div>
            </div>
        </div> <!-- end of image container -->
    </div>

    
<!-- load JavaScript -->
<script src="js/script.js"></script>

<!-- Bootstrap JavaScript -->
<script src="js/jquery-3.3.1.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<!-- load footer -->
<?php require_once 'inc/footer.inc.php'; ?>