<?php

require_once "./helpers.php/db-connection.php";
$productSelectedId = $_GET['id'];

if($conn)
{
    $query = "SELECT id,category_name FROM categorys";

    $queryOutput = $conn->query($query);

    $queryResult = $queryOutput->fetchAll(PDO::FETCH_ASSOC);



    $query2 = "SELECT id,title,mrp,offer_price,image FROM pdf WHERE id='$productSelectedId'";

    $queryOutput2 = $conn->query($query2);

    $queryResult2 = $queryOutput2->fetchAll(PDO::FETCH_ASSOC);

    // print_r($queryResult2);
    $id = $queryResult2[0]['id'];
    $title = $queryResult2[0]['title'];
    $mrp = $queryResult2[0]['mrp'];
    $offerPrice = $queryResult2[0]['offer_price'];
    $image = $queryResult2[0]['image'];


}


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
    
<div class="container" style="margin-top:50px;width:auto;">
   <form action="editPdf.php?id=<?=$id?>" method="post" enctype="multipart/form-data">

   <select name="category" style='width:200px' id="">
     
   <?php
   for($i=0;$i<count($queryResult);$i++)
   {

    $categoryId = $queryResult[$i]['id'];
    $categoryName = $queryResult[$i]['category_name'];

    print_r($categoryName);
    echo "<option  value=' $categoryId '>$categoryName</option>";
   }

   ?>
   </select>

   <p>select Image for uplode:</p>

   <div class="">
    <h5 style="text-align:start;">Title:</h5>
    <input type="text" required name="title" value="<?=$title?>">
   </div>

   <div class="">
    <h5 style="text-align:start;">MRP:</h5>
    <input type="text"  required name="mrp"  value="<?=$mrp?>">
   </div>

   <div class="">
    <h5 style="text-align:start;">Offer Price:</h5>
    <input type="text"  required name="offer-price"  value="<?=$offerPrice?>">
   </div>

   <input style="margin-top:20px;"  value="<?=$image?>"   type="file" name="file">

   <input type="submit" value="Edit">
   </form>

   </div>
</body>
</html>