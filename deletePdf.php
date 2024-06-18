<?php

// print_r($_GET)

require_once  "./helpers.php/db-connection.php";

$product_id = $_GET['id'];

if($conn)
{
    $query = "DELETE FROM pdf WHERE id='$product_id'";

    $queryOutput  = $conn->query($query);

    header("location: ./admin.php");
}


?>