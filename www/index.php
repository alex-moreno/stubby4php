<?php
// Add the autoloading mechanism of Composer
require_once __DIR__ . '/../vendor/autoload.php';

use Stubby4php\StubbyServer;

$app = new Silex\Application();

// Let's create the new Stub server.
$server = new StubbyServer();

$app->run($request);

// This should be the last line
$app->run(); // Start the application, i.e. handle the request
?>
