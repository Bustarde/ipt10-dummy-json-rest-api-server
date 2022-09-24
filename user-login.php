<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://dummyjson.com/'
]);

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
    <form method="POST" action="">
    <div class="mb-3">
        <label for="InputName" class="form-label">Username</label>
        <input name="username" type="name" class="form-control" id="InputName">
    </div> 
    <div class="mb-3">
        <label for="InputPassword" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="InputPassword">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    
    <?php
    if (isset($_POST['submit'])){

        try{
            $user = [
                'json' => [
                    'username' => $_POST['username'],
                    'password' => $_POST['password']
                ]
                ];
        
            
        $response = $client->post('https://dummyjson.com/auth/login', $user);
        $code = $response->getStatusCode();
        $body = $response->getBody();
        $user = json_decode($body, true);?>
        <div class="alert alert-success" role="alert">
        <?php echo "Your Token is: " . $user['token']; ?>
        </div>
    

        <?php
        } catch (Exception $e) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo "Failed to login. Please try again." ?>
        </div>
        
        <?php
        }
    }
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>