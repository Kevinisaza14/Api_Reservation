<?php
require_once "/config/db.php";
use Slim\Factory\AppFactory;

$app = AppFactory::create();

// Define a simple route
$app->get('/hello/{name}', function ($request, $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

// Add more routes here

// Run the app
$app->run();
?>