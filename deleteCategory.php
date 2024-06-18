<?php
require_once "./helpers.php/db-connection.php";

$product_id = $_GET['id'];

if($conn)
{
    $query = "DELETE FROM categorys WHERE id='$product_id'";

    $queryOutput  = $conn->query($query);

    header("location: ./admin.php");
}
?>