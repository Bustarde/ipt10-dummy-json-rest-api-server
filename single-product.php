<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://dummyjson.com/'
]);

$id = $_GET['product_id'];
$response = $client->get('https://dummyjson.com/products/' . $id);
$code = $response->getStatusCode();
$body = $response->getBody();
$product = json_decode($body, true);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IPT10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>

  <body>
    
    <div class="card border-primary mx-auto" style="max-width: 22rem;">
        <img src="<?php echo $product['thumbnail']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-title"><?php echo $product['id'];?></h4>  
            <h4 class="card-title"><?php echo $product['brand'];?></h4>
            <h5 class="card-title"><?php echo $product['title'];?></h5>
            <h5 class="card-title"><?php echo $product['category'];?></h5>
            <h6 class="card-title">$<?php echo $product['price'];?></h6>
            <p class="card-text"><?php echo $product['description'];?></p>
        </div>
    </div>


    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>