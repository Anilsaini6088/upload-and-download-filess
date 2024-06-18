<?php

require_once "./helpers.php/db-connection.php";

print_r($_POST);
$categoryName = $_POST['category'];
if($conn)
{
    $query = "INSERT INTO categorys (category_name) VALUES('$categoryName')";
    $queryRuselt = $conn->query($query);

    header("location: ./admin.php");
}


?>