<?php
// is_logged_in.php

// starts a session
session_start();
// checks if first_name is living
if (isset($_SESSION['first_name'])) {
    // if so, returns a JavaScript object {status: "yes"}
    echo json_encode(["status" => 'yes']);
} else {
    echo json_encode(["status" => 'no']);
}
