
<?php

require_once "./helpers.php/db-connection.php";

if($conn)
{
    // print_r($_POST[0]['id']);
    // echo "connected";

    $query = "SELECT id,category_name FROM categorys";

    $queryOutput = $conn->query($query);

    $queryResult = $queryOutput->fetchAll(PDO::FETCH_ASSOC);
     
    // print_r($queryResult);



    $query2 = "SELECT id,title,mrp,offer_price,image FROM products";

    $queryOutput2 = $conn->query($query2);

    $queryResult2 = $queryOutput2->fetchAll(PDO::FETCH_ASSOC);

    // print_r($queryResult2);



    $query3 = "SELECT id,category_name FROM categorys";

    $queryOutput3 = $conn->query($query3);

    $queryResult3 = $queryOutput3->fetchAll(PDO::FETCH_ASSOC);



    $query4 = "SELECT id,title,mrp,offer_price,image FROM pdf";

    $queryOutput4 = $conn->query($query4);

    $queryResult4 = $queryOutput4->fetchAll(PDO::FETCH_ASSOC);

     
    
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
<body style="display:flex;flex-direction:row;">
    <a href="./index.php"><button class="style-btn " style="position:absolute;left:10px">Home</button></a>
    <div style="display:flex;flex-direction:row">
    <div class="container" >
   <form action="uplode.php" method="post" enctype="multipart/form-data">

   <select name="category" style='width:200px' id="">
     
   <?php
   for($i=0;$i<count($queryResult);$i++)
   {

    $categoryId = $queryResult[$i]['id'];
    $categoryName = $queryResult[$i]['category_name'];

    print_r($categoryName);
    echo "<option   value=' $categoryId '>$categoryName</option>";
   }

   ?>
   </select>

   <p>select file for uplode:</p>

   <div class="title-field">
    <h5>Title:</h5>
    <input type="text" required name="title" placeholder="Enter Title">
   </div>

   <div class="title-field">
    <h5>MRP:</h5>
    <input type="text"  required name="mrp" placeholder="Enter MRP">
   </div>

   <div class="title-field">
    <h5>Offer Price:</h5>
    <input type="text"  required name="offer-price" placeholder="Enter Offer Price">
   </div>

   <input style="margin-top:20px;"  required type="file" name="file">

   <input type="submit" class="save-btn" style="margin-top:20px;" value="save">
   </form>

   </div>
   
   <div class="category-container container">
   <h4 >add new category</4>
   <form action="./new_category.php" method="post" style="margin-top:20px;">
    <input type="text" name="category" required placeholder="Enter New Category">
    <input type="submit" class="save-btn" value="save">
    </form>
</div>
</div>

<div class="container" >


<table class="data-table">
    <h3 style="padding:20px;border-bottom:1px solid black">Products Data</h3>
<tr >
  <th >Id</th>
  <th>Title</th>
  <th>MRP</th>
  <th>Offer-Price</th>
  <th>Image</th>
  <th>Edit/Delete</th>
</tr>

<?php

$counter = 0;
for($i=0;$i<count($queryResult2);$i++)
{
    $counter++;
    $product_id = $queryResult2[$i]['id'];
    $product_title = $queryResult2[$i]['title'];
    $product_mrp = $queryResult2[$i]['mrp'];
    $product_offerPrice= $queryResult2[$i]['offer_price'];
    $product_image = $queryResult2[$i]['image'];


  echo "<tr>";
  echo "<td>$counter</td>";
  echo "<td>$product_title</td>";
  echo "<td>$product_mrp </td>";
  echo "<td>$product_offerPrice</td>";
  echo "<td> $product_image</td>";
  echo "<td> <a href='./editForm.php?id=$product_id'><button class='edit-btn'>Edit</button></a>
        <a href='./delete.php?id=$product_id' class='delete-btn'><button class='delete-btns'>Delete</button></td></a>";
  echo "</tr>";
  
//   echo '</table>';
}

?>


</table>
</div>





<div class="container" >


<table class="data-table">
    <h3 style="padding:20px;border-bottom:1px solid black">PDF'S Data</h3>
<tr >
  <th >Id</th>
  <th>Title</th>
  <th>MRP</th>
  <th>Offer-price</th>
  <th>PDF</th>
  <th>Edit/Delete</th>
</tr>

<?php

$counter3 = 0;
for($i=0;$i<count($queryResult4);$i++)
{
    $counter3++;
    $product_id2 = $queryResult4[$i]['id'];
    $product_title2 = $queryResult4[$i]['title'];
    $product_mrp2 = $queryResult4[$i]['mrp'];
    $product_offerPrice2= $queryResult4[$i]['offer_price'];
    $product_image2 = $queryResult4[$i]['image'];


  echo "<tr>";
  echo "<td>$counter3</td>";
  echo "<td>$product_title2</td>";
  echo "<td>$product_mrp2 </td>";
  echo "<td>$product_offerPrice2</td>";
  echo "<td> $product_image2</td>";
  echo "<td> <a href='./editPdfForm.php?id=$product_id2'><button class='edit-btn'>Edit</button></a>
        <a href='./deletePdf.php?id=$product_id2' class='delete-btn'><button class='delete-btns'>Delete</button></td></a>";
  echo "</tr>";
  
//   echo '</table>';
}

?>


</table>
</div>





<div class="container" >


<table class="data-table">
    <h3 style="padding:20px;border-bottom:1px solid black">Category Data</h3>
<tr style="displa:flex;">
  <th >Id</th>
  <th >Category</th>
  <th>Edit/Delete</th>
</tr>

<?php

$counter2 = 0;

for($i=0;$i<count($queryResult3);$i++)
{
    $counter2++;
    $productCategory_id = $queryResult3[$i]['id'];
    $productCategory = $queryResult3[$i]['category_name'];
    


  echo "<tr>";
  echo "<td>$counter2</td>";
  echo "<td>$productCategory</td>";
  echo "<td> <a href='./editCategoryForm.php?id=$productCategory_id'><button class='edit-btn'>Edit</button></a>
        <a href='./deleteCategory.php?id=$productCategory_id' class='delete-btn'><button class='delete-btns'>Delete</button></td></a>";
  echo "</tr>";
  
//   echo '</table>';
}

?>


</table>
</div>


<script src="assets/js/app.js"></script>
</body>
</html>