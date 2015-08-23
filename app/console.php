<?php
// Add the autoloading mechanism of Composer
require_once __DIR__ . '/../bootstrap.php';

use Silex\Application;
use Stubby4php\Command\StubbyCommand;

// Silex Console.
$silexCLI = $app['console'];
$silexCLI->add(new StubbyCommand());
$silexCLI->run();

?>
