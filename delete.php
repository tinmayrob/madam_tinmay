<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "";
    $username = "";
    $password = "";
    $database = "";

    $connection = new mysqli($servername, $username, $password,
$database);

    $sql = "DELETE FROM clients WHERE id=$id";
    $connection->query($sql);

}
    header("location: /mycrud/index.php");
    exit;
?>