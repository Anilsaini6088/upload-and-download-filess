<?php
require_once "./helpers.php/db-connection.php";


$id = $_GET['id'];

$query = "SELECT category_name FROM categorys  WHERE id='$id'";

    $queryOutput = $conn->query($query);

    $queryResult = $queryOutput->fetchAll(PDO::FETCH_ASSOC);

    // print_r($queryResult[0]['category_name']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
<div class="container" style="margin-top:50px">
<h4 >Edit Category</4>
   <form style="margin-top:20px;" action="./editCategory.php?id=<?=$id?>" method="post">
    <input type="text" name="category" value="<?=$queryResult[0]['category_name']?>">
    <input type="submit" value="Edit">
    </form>

   </div>
</body>
</html>