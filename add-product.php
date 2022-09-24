<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://dummyjson.com/'
]);

$product = [
	'json' => [
		'title' => 'BMW Pencil'
	]
];

$response = $client->post('https://dummyjson.com/products/add', $product);
$code = $response->getStatusCode();
$body = $response->getBody();
$product = json_decode($body, true);
var_dump($product)
?>