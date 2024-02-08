<?php
require_once('new-connection.php');

if (isset($_POST['upload'])) {

    $filename = $_FILES["csv_file"]["name"];
    $tmp_name = $_FILES["csv_file"]["tmp_name"];
    $path = "uploads/";
    move_uploaded_file($tmp_name, $path . $filename);
    $query = $connection->query("INSERT INTO uploaded_files (filename) VALUES ('$filename')");

    header("Location: index.php");
    exit();
}
?>