<?php
// Add the autoloading mechanism of Composer
require_once __DIR__ . '/../bootstrap.php';

error_reporting(E_ERROR | E_PARSE);

use Silex\Application;
use Stubby4php\Command\StubbyCommand;

// Silex Console.
$silexCLI = $app['console'];
$silexCLI->add(new StubbyCommand());
$silexCLI->run();

?>
