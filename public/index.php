<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php'; //Carga todas la dependencias de composer

$app = AppFactory::create(); //Crea la aplicación

api.use("/api/v1",userRoutes, authRoutes, apiRoutes); // montamos las rutas en /api/v1
api.use((req, res) => { // 404 
    res.status(404).json({ 
        message: "Ruta no encontrada",
        error: "Error 404"
    });
});
$app->group('/api/v1', function () use ($app) {
    // Define userRoutes
    $app->get('/users', function (Request $request, Response $response, $args) {
        // Your code for user routes
        $response->getBody()->write("User routes");
        return $response;
    });

    // Define authRoutes
    $app->post('/auth', function (Request $request, Response $response, $args) {
        // Your code for auth routes
        $response->getBody()->write("Auth routes");
        return $response;
    });

    // Define apiRoutes
    $app->get('/data', function (Request $request, Response $response, $args) {
        // Your code for API routes
        $response->getBody()->write("API routes");
        return $response;
    });
});

// 404 handler
$app->map(['GET', 'POST', 'PUT', 'DELETE'], '/{routes:.+}', function (Request $request, Response $response) {
    $response->getBody()->write(json_encode([
        'message' => 'Ruta no encontrada',
        'error' => 'Error 404'
    ]));
    return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
});

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->run(); //Ejecuta la aplicación
?>