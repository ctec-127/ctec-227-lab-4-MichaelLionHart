<?php
$pageTitle = "Image Gallery";
require_once 'inc/logic.inc.php';
require_once 'inc/functions.inc.php';
require_once 'inc/header.inc.php';
require_once 'inc/nav.inc.php';
?>

<div class="container main">
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
        </form>

        <div class="container special">
            <div class="row">
                <div class="col-12 d-flex flex-wrap flex-row align-items-between justify-content-center">
                    <?php display_images(); ?>
                </div>
            </div>
        </div>
    </div>

    

    <script src="js/script.js"></script>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
<?php require_once 'inc/footer.inc.php'; ?>