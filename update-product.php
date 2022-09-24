<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://dummyjson.com/'
]);

$update = [
	'json' => [
		'title' => 'iPhone Galaxy +1'
	]
];

$response = $client->put('https://dummyjson.com/products/1', $update);
$code = $response->getStatusCode();
$body = $response->getBody();
$product = json_decode($body, true);
var_dump($product)
?>