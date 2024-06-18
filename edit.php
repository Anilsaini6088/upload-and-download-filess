<?php
require_once "./helpers.php/db-connection.php";

// print_r($_POST);
$selectedId = $_GET['id'];
$title = $_POST['title'];
$mrp = $_POST['mrp'];
$offerprice = $_POST['offer-price'];
print_r($_FILES);


$targetDirectory = "uploads/images/products/";

$targetFile = $targetDirectory.$_FILES['file']['name'];


$uploadOk = 1;


if($conn)
{


if(true)
{


//   if($imgFileType !== "png" && $imgFileType !== "jpg" && $imgFileType !== "jpeg" && $imgFileType !== "gif")
//   {
//    $uploadOk = 0;
//   }


  if($uploadOk == 0)
  {
   echo "sorry this file is not upload";
  }
  else
  {
     
   if(move_uploaded_file($_FILES['file']['tmp_name'] , $targetFile))
   {
      // echo "file upload successfully";

      
    $query = "UPDATE products SET title='$title',mrp='$mrp',offer_price='$offerprice',image=' $targetFile' WHERE id='$selectedId'";

    $queryOutput = $conn->query($query);

   


      $response = [];

      $response['status'] = "success";
      // header('Content-Type: appliction/json; charset=utf-8');
      header("location: ./index.php");
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
   $uploadOk = 1;
}


}


?>