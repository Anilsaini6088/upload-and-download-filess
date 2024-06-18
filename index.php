
<?php
require_once  "./helpers.php/db-connection.php";

if($conn)
{
    $query = "SELECT id,title,mrp,offer_price,image FROM products ";

    $queryOutput = $conn->query($query);

    $queryResult = $queryOutput->fetchAll(PDO::FETCH_ASSOC);

    // print_r($queryResult[0]['title']);




    $query2 = "SELECT id,title,mrp,offer_price,image FROM pdf ";

    $queryOutput2 = $conn->query($query2);

    $queryResult2 = $queryOutput2->fetchAll(PDO::FETCH_ASSOC);
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
    <div class="container">
     
    <button><a href="admin.php"><button  class="style-btn" style="background:#36f;color:white;font-size:15px;">Add New Product / PDF</button></a>

    <div class="cards">
    <div>
    <h2 style="color:#36f;font-family:arial;">Products :</h2>
    </div>

    <div style="flex-direction:row" class="cards" >
     <?php
     
     if(!empty($queryResult))
     {
        for($i =0;$i<count($queryResult);$i++)
        {
            echo "<div class='card'>";
            echo "<h4>";
            echo $queryResult[$i]['title'];
            echo "</h4>";

            echo  "<img class='card-img' src='".$queryResult[$i]['image']."'>";
            
        
            echo "<p><s>MRP:".$queryResult[$i]['mrp']."</s></p>";
            echo "<p>Offer Price:".$queryResult[$i]['offer_price']."</p>";

            // echo "<a href='#'>sdf</a>";
            echo "<div style='display:flex:gap:5px'><a href='#'><button class='buy-now-btn' >Buy Now</button></a> <a href='#'><button class='add-cart-btn' >Add To Cart</button></a></div>";

            echo "</div>";
        }

    
     }
     
     ?>
     </div>
    </div>





    <div class="cards">
    <div>
    <h2 style="color:#36f;font-family:arial;">PDF'S :</h2>
    </div>

    <div style="flex-direction:row" class="cards" >
     <?php
     
     if(!empty($queryResult2))
     {
        for($i =0;$i<count($queryResult2);$i++)
        {
            echo "<div class='card' style='display:flex;width:100%;align-items:center;gap:30px;padding:10px 20px;justify-content:space-between;'>";
            echo "<h4>";
            echo $queryResult2[$i]['title'];
            echo "</h4>";

            echo  "<a class='card-img style-btn' target='_blank' download  href='".$queryResult2[$i]['image']."'  style='width:auto;background:#36f;color:white;font-size:13px;'>download PDF</a>";
            
        
            echo "<div style='display:flex;gap:20px''><s><p>MRP:".$queryResult2[$i]['mrp']."</s></p>";
            echo "<p>Offer Price:".$queryResult2[$i]['offer_price']."</p></div>";

            // echo "<a href='#'>sdf</a>";
            echo "<div style='display:flex;gap:5px'><a href='#'><button class='buy-now-btn' >Buy Now</button></a> <a href='#'><button class='add-cart-btn' >Add To Cart</button></a></div>";

            echo "</div>";
        }

    
     }
     
     ?>
     </div>
    </div>




    </div>
</body>
</html>