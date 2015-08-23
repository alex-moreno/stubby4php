<?php
// Add the autoloading mechanism of Composer
require_once __DIR__ . '/../vendor/autoload.php';

use Console
use Stubby4php\StubbyServer;

$app = new Silex\Application();
$app->register(
  new ConsoleServiceProvider(),
  array(
    'console.name' => 'Stubby4PHPConsole',
    'console.version' => '0.1',
    'console.project_directory' => __DIR__ . "/.."
  )
);

// Let's create the new Stub server.
$server = new StubbyServer();

// This should be the last line
$app->run(); // Start the application, i.e. handle the request
?>
