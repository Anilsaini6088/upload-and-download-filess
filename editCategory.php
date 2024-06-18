<?php
require_once "./helpers.php/db-connection.php";

$selectedId = $_GET['id'];

$updatedCategoryName = $_POST['category'];

$query = "UPDATE categorys SET category_name='$updatedCategoryName' WHERE id='$selectedId'";

    $queryOutput = $conn->query($query);

    header("location: ./admin.php");

?>