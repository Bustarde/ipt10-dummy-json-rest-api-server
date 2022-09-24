<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://dummyjson.com/'
]);

$id = $_GET['user_id'];
$response = $client->get('https://dummyjson.com/users/1' . $id);
$code = $response->getStatusCode();
$body = $response->getBody();
$user = json_decode($body, true);
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
    
  <?php
     $name = $user['firstName'] . ' ' . $user['lastName']; ?>

    <div class="card border-primary mx-auto" style="max-width: 22rem;">
        <img src="<?php echo $user['image']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
        <h4 class="card-title"><?php echo $name?></h4>
            <p class="card-text"><?php echo $user['age'];?></p>
            <p class="card-text"><?php echo $user['gender'];?></p>
            <p class="card-text"><?php echo $user['email'];?></p>
            <p class="card-text"><?php echo $user['phone'];?></p>
            <p class="card-text"><?php echo $user['bloodGroup'];?></p>
            <button type="button" class="btn btn-primary">Show Details</button>
        </div>
    </div>


    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>