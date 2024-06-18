<?php

// print_r($_FILES);
require_once "./helpers.php/db-connection.php";

$productCategory = $_POST['category'];
$productTitle = $_POST['title'];
$productMRP = $_POST['mrp'];
$productOfferPrice = $_POST['offer-price'];

$targetDirectory = "uploads/images/products/";

   $targetFile = $targetDirectory.basename($_FILES['file']['name']);
   $imgFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));


if($conn)
{

   if($imgFileType !== "pdf")
   {
   $query = "INSERT  INTO products (category_id,title,mrp,offer_price) VALUES('$productCategory','$productTitle','$productMRP','$productOfferPrice')";

   $queryOutput = $conn->query($query);

   $productId = $conn->lastInsertId();

   // print_r($productId);
  }
  if($imgFileType == "pdf")
  {
     $query2 = "INSERT  INTO pdf (category_id,title,mrp,offer_price) VALUES('$productCategory','$productTitle','$productMRP','$productOfferPrice')";

     $queryOutput2 = $conn->query($query2);

     $productId2 = $conn->lastInsertId();
  }




$checkImgSize = getimageSize($_FILES['file']['tmp_name']);

// echo "file size";
// print_r($checkImgSize);


$uploadOk = 1;

$uploadOk2 = 1;

if(true)
{


if($imgFileType !== "pdf")
  {
   


  if($uploadOk == 0)
  {
   echo "sorry this file is not upload";
  }
  else
  {
     
   if(move_uploaded_file($_FILES['file']['tmp_name'] , $targetFile))
   {
      
      $updateProductQuery = "UPDATE `products` SET `image`='$targetFile' WHERE `id`='$productId'";

      $updateQueryOutput = $conn->query( $updateProductQuery);


      $response = [];

      $response['status'] = "success";
      // header('Content-Type: appliction/json; charset=utf-8');
      header("location: index.php");
      echo json_encode($response);
      
   }
   else
   {
      echo "this was an error file not uploaded";
   }
  }

}
else
{
   $uploadOk = 0;
}




 if($imgFileType == "pdf")
{
   if($uploadOk2 == 0)
  {
   echo "sorry this file is not upload";
  }
  else
  {
     
   if(move_uploaded_file($_FILES['file']['tmp_name'] , $targetFile))
   {
      
      $updateProductQuery2 = "UPDATE `pdf` SET `image`='$targetFile' WHERE `id`='$productId2'";

      $updateQueryOutput2 = $conn->query($updateProductQuery2);


      $response2 = [];

      $response2['status'] = "success";
      // header('Content-Type: appliction/json; charset=utf-8');
      header("location: index.php");
      echo json_encode($response2);
      
   }
   else
   {
      echo "this was an error file not uploaded";
   }
  }
}
else
{
   $uploadOk2 = 0;
}




}
}


?>