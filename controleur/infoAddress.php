<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Retrieve the number of addresses and form data from the session
$numAddress = $_SESSION['TMP_NUMADR'];
$form = $_SESSION["TMP_FORM"];
$retour = false;

$lignes = [];
for ($i = 0; $i < $numAddress; $i++) {
    // Create HTML sections for displaying address information
    $lignes[] = '<section class="inputAddress">';
    $lignes[] = '<pre>' . $form[$i . ':streetType'] . " : ";
    $lignes[] = $form[$i . ':streetNumber'] . " ";
    $lignes[] = $form[$i . ':streetName'] . ", ";
    $lignes[] = $form[$i . ':city'] . " ";
    $lignes[] = $form[$i . ':zipCode'] . " </pre>";
    $lignes[] = '</section>';
}

if (isset($_POST['confirm'])) {
    // Send data to the database
    for ($i = 0; $i < $numAddress; $i++) {
        // The prepared SQL query (assuming there's a field ID USER) :
        $req = "INSERT INTO address (id_user, type, street_nb, street, city, zipcode) VALUES (:id, :type, :nbStreet, :streetName, :city, :zip)";
        // The parameters for this query :
        $params = [":id" => 1, ":type" => $form[$i . ':streetType'], ":nbStreet" => $form[$i . ':streetNumber'], ":streetName" => $form[$i . ':streetName'], ":city" => $form[$i . ':city'], ":zip" => $form[$i . ':zipCode']];
    }
    // Clear session variables and return to index.php
    $retour = true;
} elseif (isset($_POST['cancel'])) {
    // Clear session variables and return to index.php
    $retour = true;
}

if ($retour) {
    unset($_SESSION["TMP_FORM"]);
    unset($_SESSION["TMP_NUMADR"]);
    header("location: ./index.php");
}

// Include the view to display the address information
require_once "../vue/infoAddress.view.php";
?>
