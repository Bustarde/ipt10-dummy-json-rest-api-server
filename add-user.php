<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://dummyjson.com/'
]);

$user = [
	'json' => [
		'firstName' => 'Muhammad',
        'lastName' => 'Ovi'
	]
];

$response = $client->post('https://dummyjson.com/users/add', $user);
$code = $response->getStatusCode();
$body = $response->getBody();
$user = json_decode($body, true);
var_dump($user)
?>