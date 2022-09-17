<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->get('https://dummyjson.com/');
$code = $response->getStatusCode();
$body = $response->getBody();
var_dump($body);

$options = [
	'json' => [
		'key' => 'value'
	]
];
$response = $client->post('https://dummyjson.com/products/add', $options);
$code = $response->getStatusCode();
$body = $response->getBody();
var_dump($body);

$options = [
	'json' => [
		'key' => 'value'
	]
];
$response = $client->put('https://dummyjson.com/products/1', $options);

$response = $client->delete('https://dummyjson.com/products/1');

?>