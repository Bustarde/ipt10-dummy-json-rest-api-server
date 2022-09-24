<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->get('https://dummyjson.com/users');
$code = $response->getStatusCode();
$body = $response->getBody();
$users = json_decode($body, true);
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
    
        <div class="container text-center">
            <div class="row gap-3">
    <?php 
            foreach($users as $things){
                foreach($things as $objects){
          
    $name = $objects['firstName'] . ' ' . $objects['lastName'];


    ?>

    <div class="card" style="width: 18rem;">
        <img src="<?php echo $objects['image']?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-title"><?php echo $name?></h4>
            <p class="card-text"><?php echo $objects['age'];?></p>
            <p class="card-text"><?php echo $objects['gender'];?></p>
            <p class="card-text"><?php echo $objects['email'];?></p>
            <p class="card-text"><?php echo $objects['phone'];?></p>
            <p class="card-text"><?php echo $objects['bloodGroup'];?></p>
            <a href="single-user.php?user_id=<?php echo $objects['id']?> "class="btn btn-primary">Show Details</a>
        </div>
    </div>
  <?php
            }
        }
        ?>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>