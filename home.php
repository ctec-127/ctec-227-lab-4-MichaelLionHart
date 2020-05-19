<?php

// home.php
// start session
session_start();
// set page title defined in inc/header.inc.php 
$pageTitle = 'Home';
// include header
require_once 'inc/header.inc.php';
require_once 'inc/nav.inc.php';
?>
<!-- display welcome message -->
<h1>Hello <?= isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'New User!' ?></h1>
<h2>Register or login to create your own image gallery!</h2>
<div id="message"></div>
<!-- <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<!-- defer tells browser to load js after page is loaded -->
<script defer src="js/script.js"></script>

<!-- load footer -->
<?php require 'inc/footer.inc.php' ?>