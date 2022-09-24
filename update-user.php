<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://dummyjson.com/'
]);

$update = [
	'json' => [
		'firstName' => 'Muhatma',
        'lastName' => 'Gandos'
	]
];

$response = $client->put('https://dummyjson.com/users/1', $update);
$code = $response->getStatusCode();
$body = $response->getBody();
$update = json_decode($body, true);
var_dump($update)
?>