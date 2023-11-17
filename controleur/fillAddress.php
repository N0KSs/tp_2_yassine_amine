<?php
session_start();

$listValues = [];
$numAddress = $_SESSION['TMP_NUMADR'];

// Redirect to index.php if TMP_NUMADR is not set
if (!isset($numAddress))
    header("location: ./index.php");

// Initialize the POST["form"] array if not defined
if (!isset($_POST["form"]))
    $_POST["form"] = [];

$errMsg = "";

$lignes = [];
for ($i = 0; $i < $numAddress; $i++) {
    // Prepare fields in the POST Form

    // Initialize form fields with default values if not set
    $_POST["form"][$i . ":streetNumber"] = isset($_POST["form"][$i . ":streetNumber"]) ? $_POST["form"][$i . ":streetNumber"] : null;
    $_POST["form"][$i . ":streetName"] = isset($_POST["form"][$i . ":streetName"]) ? $_POST["form"][$i . ":streetName"] : null;
    $_POST["form"][$i . ":streetType"] = isset($_POST["form"][$i . ":streetType"]) ? $_POST["form"][$i . ":streetType"] : null;
    $_POST["form"][$i . ":city"] = isset($_POST["form"][$i . ":city"]) ? $_POST["form"][$i . ":city"] : null;
    $_POST["form"][$i . ":zipCode"] = isset($_POST["form"][$i . ":zipCode"]) ? $_POST["form"][$i . ":zipCode"] : null;

    // Form for an address:
    $section = '<section class="inputAddress">';
    $section .= '<div></div> <div style="align-self: center;"><h1> Address ' . ($i+1) . '</h1></div>';

    // ... (Form fields are generated here)

    $lignes[] = $section . "</section><br\>";
}

if (isset($_POST['confirm'])) {
    // Check if any values are missing in the form
    if (in_array(null, $_POST["form"]))
        $errMsg = "One or more values are missing, please complete all forms.";
    else {
        // Save form data to session
        $_SESSION["TMP_FORM"] = $_POST["form"];
        // Redirect to the details display page
        header("location: ./infoAddress.php");
    }
} else if(isset($_POST["cancel"])){
    // Cancel operation and redirect to index.php
    unset($_SESSION["TMP_NUMADR"]);
    header("location: ./index.php");
}

// Include the view to display the form
require_once "../vue/fillAddress.view.php";
?>
