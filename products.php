<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->get('https://dummyjson.com/products');
$code = $response->getStatusCode();
$body = $response->getBody();
$products = json_decode($body, true);
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
    <!-- <div class="row">
        <div class="col-sm-6"> -->

        <div class="container text-center">
            <div class="row gap-3">
    <?php 
            foreach($products as $things){
                foreach($things as $objects){
            ?>
    
    <div class="card" style="width: 18rem;">
        <img src="<?php echo $objects['thumbnail']?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-title"><?php echo $objects['title'];?></h4>
            <h5 class="card-title"><?php echo $objects['category'];?></h5>
            <h6 class="card-title">$<?php echo $objects['price'];?></h6>
            <p class="card-text"><?php echo $objects['description'];?></p>
            <a href="single-product.php?product_id=<?php echo $objects['id']?> "class="btn btn-primary">Go</a>
        </div>
    </div>
  <?php
            }
        }
        ?>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>