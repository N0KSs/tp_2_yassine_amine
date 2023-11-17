<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errMsg = "";

$values['numAddress'] = isset($_POST['numAddress']) ? $_POST['numAddress'] : 0;

// Check if the 'confirm' button is clicked
if (isset($_POST['confirm'])) {
    // Validate that the number of addresses is greater than 0
    if ($values['numAddress'] > 0) {
        // Store the number of addresses in the session
        $_SESSION['TMP_NUMADR'] = $values['numAddress'];
        // Redirect to the fillAddress.php page
        header("location: ./fillAddress.php");
    } else {
        // Display an error message if the number of addresses is not greater than 0
        $errMsg = "Please enter a number of addresses greater than 0.";
    }
}

// Include the view to display the index
require_once "../vue/index.view.php";
?>
