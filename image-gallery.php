<?php require_once 'inc/functions.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4 - Image Gallery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container px-0">
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
            <input class="form-control-file" type="file" name="file_upload">
            <input class="btn btn-primary" type="submit" name="submit" value="Upload Image">
        </form>
    </div>

    <div class="container special">
        <div class="row">
            <div class="col-12 d-flex flex-wrap flex-row align-items-center justify-content-between">
                <?php display_images(); ?>
            </div>
        </div>
    </div>

    <?php
        require_once 'inc/logic.inc.php';
    ?>
</body>
</html>